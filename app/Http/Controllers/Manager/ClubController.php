<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Club;
use App\Models\ClubTrainer;
use App\Models\Manager;
use App\Models\Trainer;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClubController extends BaseController
{
    public function index()
    {
        $clubs = Club::get();
        return view('managers/clubs/index', compact('clubs'));
    }

    public function show($club_id)
    {
        $club = Club::find($club_id);
        $warehouse = Warehouse::where('club_id', $club_id)->first();
        return view('managers/clubs/create', compact('club', 'warehouse'));
    }

    public function create()
    {
        $managers = Manager::get();
        $areas = Area::get();
        $trainers = Trainer::get();
        return view('managers/clubs/create', compact(
            'managers',
            'areas',
            'trainers'
        ));
    }

    public function edit($club_id)
    {
        $club = Club::find($club_id);
        $club_trainer = ClubTrainer::where('club_id', $club->id)->get();
        $trainer_id = ClubTrainer::where('club_id', $club->id)->pluck('trainer_id');
        $managers = Manager::get();
        $areas = Area::get();
        $trainers = Trainer::whereNotIn('id', $trainer_id)->get();
        $warehouses = Warehouse::where('club_id', $club->id)->get();
        return view('managers/clubs/edit', compact(
            'club',
            'managers',
            'areas',
            'trainers',
            'warehouses'
        ));
    }

    public function store(Request $request)
    {
        $club = new Club();
        $club->fill($request->all());

        if ($request->hasFile('image')){
            $path = $request->file('image')->store('clubs');
            $club->image = $path;
        }
        $club->display_main_page = 1;
        $club->save();

        if (count($request->trainers) > 0)
        {
            foreach ($request->trainers as $trainer)
            {
                $club_trainer = new ClubTrainer();
                $club_trainer->trainer_id = $trainer;
                $club_trainer->club_id = $club->id;
                $club_trainer->save();
            }
        }

        return redirect('manager/clubs/'.$club->id.'/edit');
    }


    public function update(Request $request)
    {
        $club = Club::find($request->club_id);
        $club->fill($request->all());
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/areas';
            $uplaod = $file->move($path,$fileName);
            $club->image = $fileName;
        }
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

        return redirect('manager/clubs/'.$club->id.'/edit');
    }


    public function destroy(Club $club)
    {
        $managers = Manager::where('club_id', $club->id)->get();
        foreach ($managers as $manager)
        {
            $manager->club_id = null;
            $manager->update();
        }
        $club->delete();
        return redirect('/manager/clubs');
    }
}
