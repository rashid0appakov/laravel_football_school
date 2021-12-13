<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AbonimentGroup;
use App\Models\Area;
use App\Models\Club;
use App\Models\ClubTrainer;
use App\Models\Group;
use App\Models\Level;
use App\Models\Manager;
use App\Models\Spec;
use App\Models\Trainer;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class GroupsController extends BaseController
{
    public function index()
    {
        $groups = Group::get();
        $clubs = Club::get();
        return view('admin/groups/index', compact('groups','clubs'));
    }

    public function show($group_id)
    {
        $group = Group::find($group_id);
        return view('admin/groups/show', compact('group'));
    }

    public function create()
    {
        $clubs = Club::get();
        $specs = Spec::get();
        $levels = Level::get();
        return view('admin/groups/create', compact('specs', 'clubs', 'levels'));
    }

    public function edit($group_id)
    {
        $group = Group::find($group_id);
        $clubs = Club::get();
        $specs = Spec::get();
        $levels = Level::get();
        return view('admin/groups/edit', compact(
            'group',
            'specs',
            'clubs',
            'levels'
        ));
    }

    public function store(Request $request)
    {
        $group = new Group();
        $group->fill($request->all());
        if ($request->available != null && $request->available == "on")
        {
            $group->available = 1;
        }
        if ($request->individual_training != null && $request->individual_training == "on")
        {
            $group->individual_training = 1;
        }
        $group->save();
        $clubs = Club::get();

        return redirect('admin/groups/'.$group->id.'/edit/');
    }


    public function update(Request $request)
    {
        $group = Group::find($request->group_id);
        $group->fill($request->all());
        if ($request->available != null && $request->available == "on")
        {
            $group->available = 1;
        }
        if ($request->individual_training != null && $request->individual_training == "on")
        {
            $group->individual_training = 1;
        }
        $group->update();
        return redirect('admin/groups/'.$group->id.'/edit');
    }


    public function destroy(Group $group)
    {
        $ab_group = AbonimentGroup::where('group_id', $group->id)->get();
        if (count($ab_group) > 0)
        {
            return back()->withErrors(['Группа добавлена в абонимент']);
        }
        $group->delete();
        return redirect('/admin/groups');
    }
}
