<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\AbonimentGroup;
use App\Models\Area;
use App\Models\AvailableDay;
use App\Models\AvailableDayTrainer;
use App\Models\Club;
use App\Models\ClubTrainer;
use App\Models\Group;
use App\Models\Level;
use App\Models\Spec;
use App\Models\TaskStatus;
use App\Models\TaskTrainer;
use App\Models\User;
use App\Models\Trainer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TrainersController extends BaseController
{
    public function index()
    {
        $trainers = Trainer::get();
        return view('managers/trainers/index', compact('trainers'));
    }

    public function show($group_id)
    {
        $trainer = Trainer::find($group_id);
        return view('managers/trainers/create', compact('trainer'));
    }

    public function create()
    {
        $available_days = AvailableDay::get();
        return view('managers/trainers/create', compact('available_days'));
    }

    public function edit($trainer_id)
    {
        $trainer = Trainer::find($trainer_id);
        $tasks = TaskTrainer::where('trainer_id', $trainer_id)->get();
        $statuses = TaskStatus::get();
        $available_days = AvailableDay::whereNotIn('id', $trainer->availableDay->pluck('id'))->get();
        return view('managers/trainers/edit', compact(
            'trainer', 'available_days',
            'tasks', 'statuses'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->active = true;
        $user->name = $request->name." ".$request->surname;
        if ($request->password != $request->password_confirmation)
        {
            return back()->withErrors(['Пароли не совпадают']);
        }
        $user->password =  $request->password;
        $user->save();

        $trainer = new Trainer();
        $trainer->fill($request->all());
        $trainer->user_id = $user->id;
        $trainer->birthday = \Carbon\Carbon::parse($request->birthday);
        if ($request->show_on_main != null && $request->show_on_main == "on")
        {
            $trainer->show_on_main = 1;
        }

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/users/trainers/avatar/';
            $uplaod = $file->move($path,$fileName);
            $trainer->image = $fileName;
        }
        $trainer->save();

        if ($request->available_day != null)
        {
            foreach ($request->available_day as $ad)
            {
                $adt = new AvailableDayTrainer();
                $adt->trainer_id = $trainer->id;
                $adt->checked = 1;
                $adt->available_day_id = AvailableDay::where('alias', $ad)->first()->id;
                $adt->save();
            }
        }

        return redirect('manager/trainers/'.$trainer->id.'/edit/');
    }


    public function update(Request $request)
    {
        $user = User::find($request->user_id);
        if ($user->email != $request->email)
        {
            $user->email = $request->email;
        }

        if($request->active == "on")
        {
            $user->active = 1;
        }

        $user->name = $request->name." ".$request->surname;

        if ($user->password != null)
        {
            if ($request->password != $request->password_confirmation)
            {
                return back()->withErrors(['Пароли не совпадают']);
            }
            if($request->password != null)
            {
                $user->password =  $request->password;
            }
        }
        $user->update();

        $trainer = Trainer::find($request->trainer_id);
        $trainer->fill($request->all());
        $trainer->birthday = \Carbon\Carbon::parse($request->birthday);
        if ($request->show_on_main != null && $request->show_on_main == "on")
        {
            $trainer->show_on_main = 1;
        } else {
            $trainer->show_on_main = 0;
        }

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/users/trainers/avatar/';
            $uplaod = $file->move($path,$fileName);
            $trainer->image = $fileName;
        }
        $trainer->update();

        $availableDayTrainers = AvailableDayTrainer::where('trainer_id', $trainer->id)->get();

        foreach ($availableDayTrainers as $availableDayTrainer)
        {
            $availableDayTrainer->delete();
        }

        if ($request->available_day != null)
        {
            foreach ($request->available_day as $ad)
            {
                $adt = new AvailableDayTrainer();
                $adt->trainer_id = $trainer->id;
                $adt->checked = 1;
                $adt->available_day_id = AvailableDay::where('alias', $ad)->first()->id;
                $adt->save();
            }
        }
        return redirect('manager/trainers/'.$trainer->id.'/edit');
    }


    public function destroy(Trainer $trainer)
    {
        $ab_group = ClubTrainer::where('trainer_id', $trainer->id)->get();
        if (count($ab_group) > 0)
        {
            return back()->withErrors(['Тренер добавлен в клуб. Сначала удалите его из клуба']);
        }
        $user = User::find($trainer->user_id);
        $trainer->delete();
        $user->delete();
        return redirect('/manager/trainers');
    }
}
