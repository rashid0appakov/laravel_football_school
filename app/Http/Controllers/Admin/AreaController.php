<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aboniment;
use App\Models\AbonimentGroup;
use App\Models\Area;
use App\Models\Club;
use App\Models\Group;
use App\Models\Manager;
use App\Models\Notification;
use App\Models\ParentChild;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AreaController extends BaseController
{
    public function index()
    {
        $areas = Area::get();
        return view('admin/areas/index', compact('areas'));
    }

    public function show($area_id)
    {
        $area = Area::find($area_id);
        return view('admin/areas/show', compact('area'));
    }

    public function create()
    {
        $managers = Manager::get();
        return view('admin/areas/create', compact('managers'));
    }

    public function edit($area_id)
    {
        $area = Area::find($area_id);
        $managers = Manager::get();
        return view('admin/areas/edit', compact('area', 'managers'));
    }

    public function store(Request $request)
    {
        $area = new Area();
        $area->fill($request->all());
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/areas';
            $uplaod = $file->move($path,$fileName);
            $area->image = $fileName;
        }
        $area->save();

        $notification = new Notification();
        $manager = Manager::find($request->manager_id);
        $notification->user_id = $manager->user->id;
        $notification->link = "<a href='/manager/areas'>$request->name</a>";
        $notification->title = 'Администратор добавил вас в площадку: '.$notification->link;
        $notification->type = 'manager';
        $notification->save();

        $managers = Manager::get();

        return view('admin/areas/edit', compact('area', 'managers'));
    }


    public function update(Request $request)
    {
        $area = Area::find($request->area_id);
        $area->fill($request->all());
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/areas';
            $uplaod = $file->move($path,$fileName);
            $area->image = $fileName;
        }
        $area->update();

        $manager = Manager::find($request->manager_id);
        if ($manager->id != $area->manager->id)
        {
            $notification = new Notification();
            $manager = Manager::find($request->manager_id);
            $notification->user_id = $manager->user->id;
            $notification->link = "<a href='/manager/areas'>$request->name</a>";
            $notification->title = 'Администратор добавил вас в площадку: '.$notification->link;
            $notification->type = 'manager';
            $notification->save();
        }

        $managers = Manager::get();

        return view('admin/areas/edit', compact('area', 'managers'));
    }


    public function destroy(Area $area)
    {
        $area->delete();
        return redirect('/admin/areas');
    }

    public function delete($area_id)
    {
        $area = Area::find($area_id);
        $clubs = Club::where('area_id', $area->id)->get();
        $groups = Group::whereIn('club_id', $clubs->pluck('id'))->get();
        $frozen = false;
        if ($clubs->count() > 0)
        {
            foreach ($clubs as $club)
            {
                $club->frozen = 1;
                $club->update();
            }
            $frozen = true;
        }
        if ($groups->count() > 0)
        {
            foreach ($groups as $group)
            {
                $group->frozen = 1;
                $group->update();
            }
            $frozen = true;
        }
        if ($frozen)
        {
            $area->frozen = 1;
            $area->update();
            return back()->withErrors(['Площадка заморожена. Переназначте связи']);
        }
        $area->delete();
        return redirect('/admin/areas')->with('success', 'Площадка удалена');
    }
}
