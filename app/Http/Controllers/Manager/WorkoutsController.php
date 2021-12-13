<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Aboniment;
use App\Models\AbonimentGroup;
use App\Models\Group;
use App\Models\Workout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WorkoutsController extends BaseController
{



    public function store(Request $request)
    {
        $workout = new Workout();
        $workout->fill($request->all());
        $workout->save();
        return redirect('manager/aboniments/'.$workout->abonement_id.'/edit');
    }


    public function update(Request $request)
    {
        $workout = Workout::find($request->workout_id);
        $workout->fill($request->all());
        $workout->update();
        return redirect('/manager/aboniments/'.$workout->abonement_id.'/edit');
    }

    public function delete($id)
    {
        $workout = Workout::find($id);
        $abonement_id = $workout->abonement_id;
        $workout->delete();
        return redirect('/manager/aboniments/'.$abonement_id.'/edit');
    }

    public function destroy(Workout $workout)
    {
        $workout->delete();
        return redirect('/manager/aboniments'.$workout->aboniment_id.'/edit');
    }
}
