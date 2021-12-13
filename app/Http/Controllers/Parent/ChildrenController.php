<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Child;
use App\Models\Club;
use App\Models\Group;
use App\Models\Manager;
use App\Models\ParentChild;
use App\Models\Trainer;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ChildrenController extends BaseController
{
    public function index()
    {
        $user = Auth::user();
        $parent = ParentChild::where('user_id', $user->id)->first();
        $children = Child::where('parent_id', $parent->id)->get();
        return view('parents/children/index', compact('children'));
    }

    public function create()
    {
        $clubs = Club::get();
        return view('parents/children/create', compact('clubs'));
    }

    public function edit($child_id)
    {
        $child = Child::find($child_id);
        $clubs = Club::get();
        return view('parents/children/edit', compact(
            'child',
            'clubs'
        ));
    }
    public function abonements(Child $child){
        return view('parents.abonements', compact('child'));
    }
    public function store(Request $request)
    {
        $child = new Child();
        $child->fill($request->all());
        $bd = Carbon::parse($request->birthday);
        $child->birthday = $bd;
        $age = $bd->age;
        $child->age = $age;
        $group = Group::where('age_start', '<=', $age)->where('age_end', '>=', $age)->first();
        if($group) $child->group_id = $group->id;
        $child->parent_id = Auth::user()->parent->id;
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/users/children/avatars';
            $uplaod = $file->move($path,$fileName);
            $child->image = $fileName;
        }
        $child->save();
        return redirect('parents/children/'.$child->id.'/edit')
            ->with('success', 'Запись добавлена.');
    }


    public function update(Request $request)
    {
        $child = Child::find($request->child_id);
        $child->fill($request->all());
        $bd = Carbon::parse($request->birthday);
        $age = $bd->age;
        $child->age = $age;
        $group = Group::where('club_id', $request->club_id)->where('age_start', '<=', $age)->where('age_end', '>=', $age)->first();
        if($group) $child->group_id = $group->id;
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/users/children/avatars';
            $uplaod = $file->move($path,$fileName);
            $child->image = $fileName;
        }
        $child->update();

        return redirect('parents/children/'.$child->id.'/edit')
            ->with('success', 'Запись изменена.');
    }


    public function destroy(Child $Child)
    {
        $child->delete();
        return redirect('/parents/children');
    }
}
