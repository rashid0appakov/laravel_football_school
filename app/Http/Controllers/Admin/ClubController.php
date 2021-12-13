<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Club;
use App\Models\ClubTrainer;
use App\Models\Manager;
use App\Models\Notification;
use App\Models\Trainer;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClubController extends BaseController
{
    public function index()
    {
        $clubs = Club::get();
        return view('admin/clubs/index', compact('clubs'));
    }

    public function show($club_id)
    {
        $club = Club::find($club_id);
        $warehouse = Warehouse::where('club_id', $club_id)->first();
        return view('admin/clubs/show', compact('club', 'warehouse'));
    }

    public function create()
    {
        $managers = Manager::get();
        $areas = Area::get();
        $trainers = Trainer::get();
        $clubs = Club::get();

        //$warehouse = Warehouse::where('club_id', $club_id)->first();
        return view('admin/clubs/create', compact('managers', 'areas', 'trainers'));
    }

    public function edit($club_id, Request $request)
    {

        $club = Club::find($club_id);
        $club_trainer = ClubTrainer::where('club_id', $club->id)->get();
        $trainer_id = ClubTrainer::where('club_id', $club->id)->pluck('trainer_id');
        $managers = Manager::all();
        $areas = Area::get();
        $trainers = Trainer::whereNotIn('id', $trainer_id)->get();
        $warehouses = Warehouse::where('club_id', $club->id)->get();

        $club->title1 = $request->title1;
        $club->textarea1 = $request->textarea1;
        $club->textarea12 = $request->textarea12;
        $club->title2 = $request->title2;
        $club->textarea2 = $request->textarea2;
        $club->lat = $request->lat;
        $club->lng= $request->lng;

        return view('admin/clubs/edit', compact(
            'club',
            'managers',
            'areas',
            'trainers',
            'warehouses',
        ));
    }

    public function store(Request $request)
    {

        $data = $request->except('image', 'images');
        $data['display_main_page'] = 1;
        if ($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('clubs');
        }

        $club = Club::create($data);

        if ($request->hasFile('imagess')){
            foreach($request->file('imagess') as $file){
                $club->images()->create(['src'=>$file->store('clubs')]);
            }
        }

        if (count($request->trainers) > 0)


        if ($request->trainers != null && count($request->trainers) > 0)

        {
            foreach ($request->trainers as $trainer)
            {
                $club_trainer = new ClubTrainer();
                $club_trainer->trainer_id = $trainer;
                $club_trainer->club_id = $club->id;
                $club_trainer->save();
            }
        }

        $notification = new Notification();
        $manager = Manager::find($request->manager_id);
        $notification->user_id = $manager->user->id;
        $notification->link = "<a href='/manager/clubs/$club->id/edit'>$request->name</a>";
        $notification->title = 'Администратор добавил вас в клуб: '.$notification->link;
        $notification->type = 'manager';
        $notification->save();

        return redirect('/admin/clubs/'.$club->id.'/edit');
    }


    public function update(Request $request)
    {
        $club = Club::findOrFail($request->club_id);
        $data = $request->except('image');
        if ($request->hasFile('image')){
            if($club->image) Storage::delete($club->image);
            $data['image'] = $request->file('image')->store('clubs');
        }
        if ($request->hasFile('imagess')){
            foreach($request->file('imagess') as $file){
                $club->images()->create(['src'=>$file->store('clubs')]);
            }
        }


        if ($club->frozen == 1)
        {
            $area = Area::find($request->area_id);
            if ($area->frozen == 1)
            {
                return back()->withErrors(['Площадка заморожена. Выберите другую'])->withInput();
            }
            $club->area_id = $area->id;
            $club->frozen = 0;
        }
        $club->fill($request->all());
        $club->update();


        if (count($request->trainers) > 0)
        {
            $club_trainer = ClubTrainer::where('club_id', $club->id)->get();
            foreach ($club_trainer as $ct)
            {
                $ct->delete();
            }

            foreach ($request->trainers as $trainer)
            {
                $club_trainer = new ClubTrainer();
                $club_trainer->trainer_id = $trainer;
                $club_trainer->club_id = $club->id;
                $club_trainer->save();
            }
        }

        $manager = Manager::find($request->manager_id);
        if ($manager->id != $club->manager->id)
        {
            $notification = new Notification();
            $manager = Manager::find($request->manager_id);
            $notification->user_id = $manager->user->id;
            $notification->link = "<a href='/manager/clubs/$club->id/edit'>$request->name</a>";
            $notification->title = 'Администратор добавил вас в клуб: '.$notification->link;
            $notification->type = 'manager';
            $notification->save();
        }

        return redirect('admin/clubs/'.$club->id.'/edit');
    }


    public function destroy(Club $club)
    {
        $managers = Manager::where('club_id', $club->id)->get();
        foreach ($managers as $manager)
        {
            $manager->club_id = null;
            $manager->update();
        }
        if($club->image) Storage::delete($club->image);
        $club->delete();
        return redirect('/admin/clubs');

    }

}
