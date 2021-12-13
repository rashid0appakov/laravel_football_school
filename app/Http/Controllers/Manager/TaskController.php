<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\ClubTrainer;
use App\Models\LeadNew;
use App\Models\Manager;
use App\Models\ManagerTask;
use App\Models\Position;
use App\Models\TagInTask;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\TaskTag;
use App\Models\Trainer;
use App\Models\TrainerTask;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TaskController extends BaseController
{

    public function index()
    {
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $tasks = ManagerTask::where('manager_id', $manager->id)->get();
        $tasks = $tasks->sortBy(function ($task) {
            return $task->tags->sum('position');
        });
        $manager = Manager::find($manager->id);
        return view('managers/tasks/index', compact(
            'manager', 'tasks',
            'tasktags', 'statuses', 'clubs'
        ));
    }

    public function trainer_filter_tag(Request $request)
    {
        $ids = TagInTask::where('tag_id', $request->tag_id)->pluck('task_id');

        $tasks = TrainerTask::whereIn('id' , $ids)->get();

        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $trainers = Trainer::get();
        return view('managers/tasks/trainers/index', compact(
            'tasktags', 'clubs', 'trainers', 'tasks'
        ));
    }

    public function trainer_filter_when(Request $request)
    {
        if ($request->when == 'yesterday')
        {
            $tasks = TrainerTask::where('deadline', '<', \Carbon\Carbon::yesterday())->get();
        }

        if ($request->when == 'tomorrow')
        {
            $tasks = TrainerTask::where('deadline', '>', \Illuminate\Support\Carbon::tomorrow())->get();
        }

        if ($request->when == 'today')
        {
            $tasks = TrainerTask::whereDate('deadline', Carbon::now())->get();
        }

        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $trainers = Trainer::get();
        return view('managers/tasks/trainers/index', compact(
            'tasktags', 'tasks', 'clubs',
            'trainers'
        ));
    }

    public function editTask()
    {
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $tasks = Task::where('manager_id', $manager->id)->get();
        $manager = Manager::find($manager->id);
        return view('managers/tasks/index', compact('manager', 'tasks'));
    }

    public function showTask($task_id)
    {
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $task = ManagerTask::find($task_id);
//        $statuses = TaskStatus::get();
//        $tasktags  = TaskTag::get();
        $tasks = ManagerTask::where('manager_id', $manager->id)->get();
        $manager = Manager::find($manager->id);
        return view('managers/tasks/show-task', compact('manager', 'task', 'tasks', 'task'));
    }

    public function storeTask(Request $request)
    {
        $task = new ManagerTask();
        $task->fill($request->all());

        if ($request->manager_id == null)
        {
            $user = Auth::user();
            $manager = Manager::where('user_id', $user->id)->first();
            $task->manager_id = $manager->id;
        }
        $task->deadline = \Carbon\Carbon::parse($request->deadline);
        $task->save();

        if ($request->tasktags != null)
        {

            $uuid = Str::random(10);
            if (TagInTask::where('uuid', $uuid)->first() != null) {
                while (TagInTask::where('uuid', $uuid)->first() != null) {
                    $uuid = Str::random(10);
                }
            }
            foreach ($request->tasktags as $tag)
            {
                $tagInTask = new TagInTask();
                $tagInTask->who = "manager";
                $tagInTask->tag_id = $tag;
                $tagInTask->uuid = $uuid;
                $tagInTask->task_id = $task->id;
                $tagInTask->save();
            }
        }


        return back()->with('success', 'Задача добавлена');
    }

    public function updateTask(Request $request)
    {
        $task = ManagerTask::find($request->id);
        $task->fill($request->all());
        $deadline = "deadline_".$request->id;
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $task->manager_id = $manager->id;


        $task->deadline = \Carbon\Carbon::parse($request->deadline);
        $task->update();

        $tagInTaskToDelete = TagInTask::where('uuid', $request->uuid)->get();
        foreach ($tagInTaskToDelete as $tagInTask)
        {
            $tagInTask->delete();
        }

        if ($request->tasktags != null)
        {
            $uuid = Str::random(10);
            if (TagInTask::where('uuid', $uuid)->first() != null) {
                while (TagInTask::where('uuid', $uuid)->first() != null) {
                    $uuid = Str::random(10);
                }
            }
            foreach ($request->tasktags as $tag)
            {
                $tagInTask = new TagInTask();
                $tagInTask->who = "manager";
                $tagInTask->tag_id = $tag;
                $tagInTask->uuid = $uuid;
                $tagInTask->task_id = $task->id;
                $tagInTask->save();
            }
        }

        return back()->with('success', 'Задача обновлена');
    }

    public function showTasksByDate ($date)
    {
        $statuses = TaskStatus::get();
        $date = \Carbon\Carbon::parse($date);
        $tasktags  = TaskTag::get();
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $tasks = ManagerTask::whereDate('deadline' , $date)->get();
        return view('managers/tasks/index', compact('tasks', 'statuses', 'tasktags', 'manager'));
    }

    public function trainer_filter_club(Request $request)
    {
        $club_trainers = ClubTrainer::where('club_id', $request->club_id)->pluck('trainer_id');
        $tasks = TrainerTask::whereIn('trainer_id', $club_trainers)->get();

        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $trainers = Trainer::get();
        return view('managers/tasks/trainers/index', compact(
            'tasktags', 'tasks', 'clubs',
            'trainers'
        ));
    }

    public function trainer_filter_date_range(Request $request)
    {
        $from = \Carbon\Carbon::parse($request->start_date);
        $to = \Carbon\Carbon::parse($request->end_date);
        $tasks = TrainerTask::whereBetween('deadline' , [$from, $to])->get();

        $trainers = Trainer::get();
        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        return view('managers/tasks/trainers/index', compact(
            'tasktags', 'clubs',
            'tasks', 'trainers'
        ));
    }

    public function filter_club(Request $request)
    {
        $leads = LeadNew::where('club_id', $request->club_id)->pluck('id');
        $tasks = ManagerTask::whereIn('lead_id', $leads)->get();

        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $manager = Manager::find($manager->id);
        return view('managers/tasks/index', compact(
            'manager', 'tasks',
            'tasktags', 'statuses', 'clubs'
        ));
    }

    public function filter_tag(Request $request)
    {
        $ids = TagInTask::where('tag_id', $request->tag_id)->pluck('task_id');
        $tasks = ManagerTask::whereIn('id', $ids)->get();
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $manager = Manager::find($manager->id);
        return view('managers/tasks/index', compact(
            'manager', 'tasks',
            'tasktags', 'statuses', 'clubs'
        ));
    }

    public function filter_when(Request $request)
    {
        if ($request->when == 'yesterday')
        {
            $tasks = ManagerTask::where('deadline', '<', Carbon::yesterday())->get();
        }

        if ($request->when == 'tomorrow')
        {
            $tasks = ManagerTask::where('deadline', '>', Carbon::tomorrow())->get();
        }

        if ($request->when == 'today')
        {
            $tasks = ManagerTask::whereDate('deadline', Carbon::now())->get();
        }

        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $manager = Manager::find($manager->id);
        return view('managers/tasks/index', compact(
            'manager', 'tasks',
            'tasktags', 'statuses', 'clubs'
        ));
    }

    public function filter_date_range(Request $request)
    {
        $from = \Carbon\Carbon::parse($request->start_date);
        $to = \Carbon\Carbon::parse($request->end_date);

        $tasks = ManagerTask::whereBetween('deadline', [$from, $to])->get();

        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $manager = Manager::find($manager->id);
        return view('managers/tasks/index', compact(
            'manager', 'tasks',
            'tasktags', 'statuses', 'clubs'
        ));
    }
}
