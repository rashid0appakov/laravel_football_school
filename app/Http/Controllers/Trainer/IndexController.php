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
use App\Models\TaskTrainer;
use App\Models\User;
use App\Models\Trainer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{
    public function show()
    {
        $user = Auth::user();
        $trainer = Trainer::where('user_id', $user->id)->first();
        if ($trainer == null)
        {
            return back();
        }
        $tasks = TaskTrainer::where('trainer_id', $trainer->id)->get();
        return view('trainers/profile/show-profile-tasks', compact(
            'trainer',
            'tasks'
        ));
    }
}
