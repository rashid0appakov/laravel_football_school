<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Club;
use App\Models\Group;
use App\Models\Child;
use App\Models\Trainer;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Storage;
class TrainingController extends BaseController
{
    public function index(Request $request){
        $trainings = Training::with([
            'trainer',
            'group'
        ])->get();
        $clubs = Club::with('groups');
        if($request->club_id)
            $clubs = $clubs->whereId($request->club_id);
        $clubs = $clubs->get();
        $trainers = Trainer::all();
        return view('managers.trainings.index', compact('trainings', 'clubs', 'trainers'));
    }
    public function getData(Request$request){
        $trainings = Training::with('trainer')
        ->withCount('children')
        ->withCount('temp_users')
        ->whereBetween('date', [$request->start, $request->end])
        ->get();
        return $trainings;
    }
    public function edit(Training $training){
        $trainings = Training::withCount('children')->whereHash($training->hash)->get();
        $training->load(['children', 'temp_users', 'children.client']);
        $trainers = Trainer::all();
        $clubs = Club::with('groups')->get();
        return view('managers.trainings.edit', compact('training', 'trainings', 'trainers', 'clubs'));
    }
    public function update(Request $request, Training $training){
        $request->validate([
            'group_id'  => 'required',
            'start'      => 'required',
            'end'      => 'required'
        ]);
        $data = $request->except('video', 'conspect');
        $group = Group::findOrFail($request->group_id);
        $data['club_id'] = $group->club_id;
        if($request->hasFile('video')){
            if($training->video) Storage::delete($training->video);
            $data['video'] = $request->file('video')->store('trainings');
        }
        if($request->hasFile('conspect')){
            if($training->conspect) Storage::delete($training->conspect);
            $data['conspect'] = $request->file('conspect')->store('trainings');
        }
        $training->update($data);
        if($request->all){
            $trainings = Training::whereHash($training->hash)->get();
            foreach($trainings as $item){
                $item->update([
                    'start'     => $request->start,
                    'end'     => $request->end,
                    'group_id'  => $request->group_id
                ]);
            }
        }
        return back();
    }
    public function store(Request $request){
        $request->validate([
            'group_id' => 'required',
            'from' => 'required|date',
            'to'   => 'required|date',
            'start'  => 'required',
            'end'  => 'required'
        ]);
        $from = Carbon::parse($request->from)->subDay(7);
        $to = Carbon::parse($request->to);
        $trainings = [];
        $hash = Str::random(32);
        $group = Group::findOrFail($request->group_id);
        while($from->isBefore($to)){
            $from->addDay(7);
            $trainings[] = [
                'hash'          => $hash,
                'group_id'      => $request->group_id,
                'club_id'       => $group->club_id,
                'date'          => $from->format("Y-m-d"),
                'start'         => $request->start,
                'end'           => $request->end,
            ];
        }
        Training::insert($trainings);
        return back();
    }
    public function checkUsers(Request $request, Training $training){
        $usersIds = $request->usersIds ?? [];
        \DB::table('children_training')
        ->whereIn('children_id', $usersIds)
        ->where('training_id', $training->id)
        ->update([
            'was' => 1
        ]);
        $training->temp_users()->whereIn('id', $request->tempIds)->update(['was' => 1]);
        Child::whereIn('id', $usersIds)->decrement('workout_balance');
        Child::whereIn('id', $usersIds)->decrement('freezing_balance');
        $training->save();
        return back();
    }
    public function destroy(Training $training){
        if($training->children->count() || $training->temp_users->count()){
            $nextTraining = Training::where('id', '>', $training->id)->where('group_id', $training->group_id)->first();
            if(!$nextTraining) return back()->withError('test', 'huy');
            \DB::table('children_training')->where('training_id', $training->id)->update([
                'training_id' => $nextTraining->id
            ]);
            $training->temp_users()->update([
                'training_id' => $nextTraining->id
            ]);
        }
        if($training->video) Storage::delete($training->video);
        if($training->conspect) Storage::delete($training->conspect);
        $training->delete();
        return redirect()->route('manager.trainings.index');
    }
}
