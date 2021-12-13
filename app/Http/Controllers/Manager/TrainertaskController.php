<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\ManagerTask;
use App\Models\Notification;
use App\Models\TagInTask;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\TaskTag;
use App\Models\TaskTrainer;
use App\Models\Trainer;
use App\Models\TrainerTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainertaskController extends BaseController
{
//    public function task_store(Request $request)
//    {
//        $task = new TaskTrainer();
//        $task->fill($request->all());
//        $task->save();
//
//        return back()->with('success', "Задача добавлена");
//    }
//
//    public function index($trainer_id)
//    {
//        $trainer = Trainer::find($trainer_id);
//        $tasks = TaskTrainer::where('trainer_id', $trainer_id)->get();
//        $statuses = TaskStatus::get();
//
//        return view("managers/trainers/tasks/index", compact(
//            'trainer',
//            'tasks',
//            'statuses'
//        ));
//    }

    public function index()
    {
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $tasks = TrainerTask::get();
        $trainers = Trainer::get();
        return view('managers/tasks/trainers/index', compact(
            'manager', 'tasks',
            'tasktags', 'statuses', 'trainers'
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
        $task = Task::find($task_id);
        $tasks = Task::where('manager_id', $task->manager_id)->get();
        $manager = Manager::find($task->manager_id);
        return view('managers/tasks/show-task', compact('manager', 'task', 'tasks'));
    }

    public function storeTask(Request $request)
    {
        if ($request->description == null)
        {
            return back()->withErrors(['Заполните описание'])->withInput();
        }

        $task = new TrainerTask();
        $task->fill($request->all());
        $task->deadline = \Carbon\Carbon::parse($request->deadline);
        $task->save();

        if ($request->tasktags != null)
        {
            foreach ($request->tasktags as $tag)
            {
                $tagInTask = new TagInTask();
                $tagInTask->who = "trainer";
                $tagInTask->tag_id = $tag;
                $tagInTask->task_id = $task->id;
                $tagInTask->save();
            }
        }

        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $notification = new Notification();
        $notification->user_id = $manager->user->id;
        $notification->link = "<a href='/trainer/task/$task->id/edit'>$request->title</a>";
        $notification->title = 'Администратор создал вам задачу: '.$notification->link;
        $notification->type = 'trainer';
        $notification->save();

        return back()->with('success', 'Задача добавлена');
    }

    public function updateTask(Request $request)
    {
        if ($request->description == null)
        {
            return back()->withErrors(['Заполните описание'])->withInput();
        }
        $task = TrainerTask::find($request->id);
        $task->fill($request->all());
        $task->deadline = \Carbon\Carbon::parse($request->deadline);
        $task->update();

        $tagInTaskToDelete = TagInTask::where('who', 'trainer')->where('task_id', $task->id)->get();
        foreach ($tagInTaskToDelete as $tagInTask)
        {
            $tagInTask->delete();
        }

        if ($request->tasktags != null)
        {
            foreach ($request->tasktags as $tag)
            {
                $tagInTask = new TagInTask();
                $tagInTask->who = "manager";
                $tagInTask->tag_id = $tag;
                $tagInTask->task_id = $task->id;
                $tagInTask->save();
            }
        }

        $notification = new Notification();
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $notification->user_id = $manager->user->id;
        $notification->link = "<a href='/trainer/task/$task->id/edit'>$request->title</a>";
        $notification->title = 'Администратор обновил вашу задачу: '.$notification->link;
        $notification->type = 'trainer';
        $notification->save();

        return back()->with('success', 'Задача обновлена');
    }

    public function showTasksByDate ($date)
    {
        $statuses = TaskStatus::get();
        $date = \Carbon\Carbon::parse($date);
        $tasktags  = TaskTag::get();
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $tasks = TrainerTask::whereDate('deadline' , $date)->get();
        $trainers = Trainer::get();
        return view('managers/tasks/trainers/index', compact('tasks', 'statuses', 'tasktags', 'manager', 'trainers'));
    }
}
