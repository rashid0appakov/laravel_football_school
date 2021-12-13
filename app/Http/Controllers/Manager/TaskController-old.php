<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Manager;
use App\Models\ManagerTask;
use App\Models\Position;
use App\Models\TagInTask;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\TaskTag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tag;

class TaskController extends BaseController
{

    public function index()
    {
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $tags  = Tag::get();
        $clubs  = Club::get();
        $tasks = ManagerTask::where('manager_id', $manager->id)->get();
        $manager = Manager::find($manager->id);
        return view('managers/tasks/index', compact(
            'manager', 'tasks',
            'tasktags', 'statuses', 'tags', 'clubs'
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
        if ($request->description == null)
        {
            return back()->withErrors(['Заполните описание'])->withInput();
        }

        $task = new ManagerTask();
        $task->fill($request->all());
        $task->deadline = \Carbon\Carbon::parse($request->deadline);
        $task->save();

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


        return back()->with('success', 'Задача добавлена');
    }

    public function updateTask(Request $request)
    {
        if ($request->description == null)
        {
            return back()->withErrors(['Заполните описание'])->withInput();
        }
        $task = ManagerTask::find($request->id);
        $task->fill($request->all());
        $deadline = "deadline_".$request->id;

        $task->deadline = \Carbon\Carbon::parse($request->$deadline);
        $task->update();

        $tagInTaskToDelete = TagInTask::where('who', 'manager')->where('task_id', $task->id)->get();
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
}
