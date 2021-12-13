<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Aboniment;
use App\Models\AbonimentGroup;
use App\Models\Area;
use App\Models\Group;
use App\Models\Level;
use App\Models\Spec;
use App\Models\TrainingDay;
use App\Models\Workout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AbonimentController extends BaseController
{
    public function index()
    {
        $abonements = Aboniment::get();
        return view('managers/aboniments/index', compact('abonements'));
    }

    public function create()
    {
        $groups = Group::get();
        return view('managers/aboniments/create', compact('groups'));
    }

    public function create_day_training(Request $request)
    {
        $training_day = new TrainingDay();
        $training_day->fill($request->all());
        $training_day->save();

        return redirect('/manager/aboniments/'.$request->abonement_id.'/edit');
    }

    public function update_day_training(Request $request)
    {
        $training_day = TrainingDay::find($request->training_day_id);
        $training_day->fill($request->all());
        $training_day->update();

        return redirect('/manager/aboniments/'.$request->abonement_id.'/edit');
    }

    public function edit($aboniment_id)
    {
        $aboniment = Aboniment::find($aboniment_id);
        $training_days = TrainingDay::where('abonement_id', $aboniment_id)->get();
        $workouts = Workout::where('abonement_id', $aboniment_id)->get();
        $ab_groups = AbonimentGroup::where('aboniment_id', $aboniment->id)->pluck('group_id');
        $groups = Group::whereNotIn('id', $ab_groups)->get();
        return view('managers/aboniments/edit', compact(
            'groups',
            'aboniment',
            'workouts',
            'training_days'
        ));
    }

    public function store(Request $request)
    {
        $aboniment = new Aboniment();
        $aboniment->fill($request->all());
        if ($request->hide_for_new != null && $request->hide_for_new == "on")
        {
            $aboniment->hide_for_new = 1;
        }
        $aboniment->save();

        foreach ($request->groups as $group)
        {
            $ab_group = new AbonimentGroup();
            $ab_group->group_id = $group;
            $ab_group->aboniment_id = $aboniment->id;
            $ab_group->save();
        }

        $groups = Group::get();
        return redirect('manager/aboniments/'.$aboniment->id.'/edit');
    }


    public function update(Request $request)
    {
        $aboniment = Aboniment::find($request->aboniment_id);
        $aboniment->fill($request->all());
        if ($request->hide_for_new != null && $request->hide_for_new == "on")
        {
            $aboniment->hide_for_new = 1;
        }
        $aboniment->update();

        $ab_groups = AbonimentGroup::where('aboniment_id', $aboniment->id)->get();
        foreach ($ab_groups as $ab_group)
        {
            $ab_group->delete();
        }

        foreach ($request->groups as $group)
        {
            $ab_group = new AbonimentGroup();
            $ab_group->group_id = $group;
            $ab_group->aboniment_id = $aboniment->id;
            $ab_group->save();
        }
        return redirect('manager/aboniments/'.$aboniment->id.'/edit');
    }

    public function destroy(Aboniment $aboniment)
    {
        $aboniment->delete();
        return redirect('/manager/aboniments');
    }

    public function delete_day_training($trainingday_id)
    {
        $trainingday = TrainingDay::find($trainingday_id);
        $trainingday->delete();
        return redirect('/manager/aboniments');
    }
}
