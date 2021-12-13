<?php

namespace App\Http\Controllers\Trainer;

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
use App\Models\User;
use App\Models\Trainer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TrainersController extends BaseController
{
    public function index()
    {
        $trainers = Trainer::get();
        return view('trainers/index', compact('trainers'));
    }

    public function show($group_id)
    {
        $trainer = Trainer::find($group_id);
        return view('trainers/create', compact('trainer'));
    }

    public function edit($id)
    {
        $trainer = Trainer::find($id);
        $available_days = AvailableDay::whereNotIn('id', $trainer->availableDay->pluck('id'))->get();
        return view('trainers/profile/edit', compact('trainer', 'available_days'));
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
        return redirect('trainer/'.$trainer->id.'/edit');
    }
}
