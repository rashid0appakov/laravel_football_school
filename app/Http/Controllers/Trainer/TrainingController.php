<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
class TrainingController extends Controller
{
    public function index(){
        $trainer = auth()->user()->trainer;
        $trainings = $trainer->trainings()->with(['group', 'children'])->latest()->get();
        return view('trainers.trainings.index', compact('trainings'));
    }
    public function accept(Training $training){
        $training->accept = 1;
        $training->save();
        return back();
    }
    public function cancel(Training $training){
        $training->accept = 0;
        $training->report = $request->report;
        $training->save();
        return back();
    }
    public function show(Training $training){
        return view('trainers.trainings.show', compact('training'));
    }
    public function update(Request $request, Training $training){
        $data = $request->only('report');
        if($request->hasFile('video')){
            if($training->video) Storage::delete($training->video);
            $data['video'] = $request->file('video')->store('trainings');
        }
        if($request->hasFile('conspect')){
            if($training->conspect) Storage::delete($training->conspect);
            $data['conspect'] = $request->file('conspect')->store('trainings');
        }
        $training->update($data);
        return back();
    }
}
