<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminTask;
use App\Models\ClientTask;
use App\Models\Club;
use App\Models\ClubTrainer;
use App\Models\LeadNew;
use App\Models\Manager;
use App\Models\ManagerTask;
use App\Models\Notification;
use App\Models\ParentChild;
use App\Models\Position;
use App\Models\TagInTask;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\TaskTag;
use App\Models\Trainer;
use App\Models\TrainerTask;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TaskController extends BaseController
{
    public function myTasks()
    {
        $statuses = TaskStatus::get();
        $adminTasks = AdminTask::get();
        $managerTasks = [];
        $trainerTasks = [];

        $tasktags  = TaskTag::get();
        return view('admin/tasks/my/index', compact(
            'adminTasks',
            'statuses',
            'tasktags',
            'managerTasks',
            'trainerTasks'
        ));
    }

    public function allTasks()
    {
        $statuses = TaskStatus::get();
        $adminTasks = AdminTask::get();
        $managerTasks = ManagerTask::get();
        $trainerTasks = TrainerTask::get();

        $tasktags  = TaskTag::get();
        return view('admin/tasks/my/index', compact(
            'adminTasks',
            'statuses',
            'tasktags',
            'managerTasks',
            'trainerTasks'
        ));
    }

    public function managerTasks()
    {
        $statuses = TaskStatus::get();
        $tasks = ManagerTask::get();
        $tasktags  = TaskTag::get();
        $managers = Manager::get();
        return view('admin/tasks/manager/index', compact('tasks', 'statuses', 'tasktags', 'managers'));
    }

    public function trainerTasks()
    {
        $statuses = TaskStatus::get();
        $tasks = TrainerTask::get();
        $tasktags  = TaskTag::get();
        $trainers = Trainer::get();
        return view('admin/tasks/trainer/index', compact('tasks', 'statuses', 'tasktags', 'trainers'));
    }

    public function clientTasks()
    {
        $statuses = TaskStatus::get();
        $tasks = ClientTask::get();
        $tasktags  = TaskTag::get();
        $clients = ParentChild::get();
        return view('admin/tasks/client/index', compact('tasks', 'statuses', 'tasktags', 'clients'));
    }

    public function myTasksByDate($date)
    {
        $statuses = TaskStatus::get();
        $date = \Carbon\Carbon::parse($date);
        $tasktags  = TaskTag::get();
        $adminTasks = AdminTask::whereDate('deadline' , $date)->get();
        $managerTasks = null;
        $trainerTasks = null;
        return view('admin/tasks/my/index', compact('statuses',
            'tasktags',
            'adminTasks',
            'managerTasks',
            'trainerTasks'));
    }

    public function allTasksByDate($date)
    {
        $statuses = TaskStatus::get();
        $date = \Carbon\Carbon::parse($date);
        $tasktags  = TaskTag::get();
        $adminTasks = AdminTask::whereDate('deadline' , $date)->get();
        $managerTasks = ManagerTask::whereDate('deadline' , $date)->get();
        $trainerTasks = TrainerTask::whereDate('deadline' , $date)->get();
        return view('admin/tasks/my/index', compact('statuses',
            'tasktags',
            'adminTasks',
            'managerTasks',
            'trainerTasks'));
    }

    public function managerTasksByDate($date)
    {
        $statuses = TaskStatus::get();
        $date = \Carbon\Carbon::parse($date);
        $tasktags  = TaskTag::get();
        $managers = Manager::get();
        $tasks = ManagerTask::whereDate('deadline' , $date)->get();
        return view('admin/tasks/manager/index', compact('tasks', 'statuses', 'tasktags', 'managers'));
    }

    public function clientTasksByDate($date)
    {
        $statuses = TaskStatus::get();
        $date = \Carbon\Carbon::parse($date);
        $tasktags  = TaskTag::get();
        $clients = ParentChild::get();
        $tasks = ClientTask::whereDate('deadline' , $date)->get();
        return view('admin/tasks/client/index', compact('tasks', 'statuses', 'tasktags', 'clients'));
    }

    public function trainerTasksByDate($date)
    {
        $statuses = TaskStatus::get();
        $date = \Carbon\Carbon::parse($date);
        $tasktags  = TaskTag::get();
        $trainers = Trainer::get();
        $tasks = TrainerTask::whereDate('deadline' , $date)->get();
        return view('admin/tasks/trainer/index', compact('tasks', 'statuses', 'tasktags', 'trainers'));
    }

    public function myTaskStore(Request $request)
    {
        $task = new AdminTask();
        $task->fill($request->all());
        $task->deadline = \Carbon\Carbon::parse($request->deadline);
        $task->user_id = Auth::user()->id;
        if ($request->lead_id != null)
        {
            $task->lead_id = $request->lead_id;
        }
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
                $tagInTask->who = "admin";
                $tagInTask->tag_id = $tag;
                $tagInTask->uuid = $uuid;
                $tagInTask->task_id = $task->id;
                $tagInTask->save();
            }
        }
        return back()->with('success', 'Задача добавлена');
    }

    public function managerTaskStore(Request $request)
    {

        $task = new ManagerTask();
        $task->fill($request->all());
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

        $notification = new Notification();
        $manager = Manager::find($request->manager_id);
        $notification->user_id = $manager->user->id;
        $notification->link = "<a href='/manager/tasks'>$request->title</a>";
        $notification->title = 'Администратор создал вам задачу: '.$notification->link;
        $notification->type = 'manager';
        $notification->save();

        return back()->with('success', 'Задача добавлена');
    }


    public function trainerTaskStore(Request $request)
    {
        $task = new TrainerTask();
        $task->fill($request->all());
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
                $tagInTask->who = 'trainer';
                $tagInTask->tag_id = $tag;
                $tagInTask->uuid = $uuid;
                $tagInTask->task_id = $task->id;
                $tagInTask->save();
            }
        }

        $notification = new Notification();
        $notification->user_id = $task->trainer->user->id;
        $notification->link = "<a href='/trainer/task/$task->id/edit'>$request->title</a>";
        $notification->title = 'Администратор создал вам задачу: '.$notification->link;
        $notification->type = 'trainer';
        $notification->save();
        return back()->with('success', 'Задача добавлена');
    }

    public function clientTaskStore(Request $request)
    {
        if ($request->description == null)
        {
            return back()->withErrors(['Заполните описание'])->withInput();
        }
        $task = new ClientTask();
        $task->fill($request->all());
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

        $notification = new Notification();
        $parent = ParentChild::find($request->parent_id);
        $notification->user_id = $parent->user->id;
        $notification->link = "<a href='/parent/task/$task->id/edit'>$request->title</a>";
        $notification->title = 'Администратор создал вам задачу: '.$notification->link;
        $notification->type = 'client';
        $notification->save();


        return back()->with('success', 'Задача добавлена');
    }

    public function myTaskUpdate(Request $request)
    {
//        if ($request->description == null)
//        {
//            return back()->withErrors(['Заполните описание'])->withInput();
//        }
        $task = AdminTask::find($request->id);
        $task->fill($request->all());
        $deadline = "deadline".$task->id;
        $task->deadline = \Carbon\Carbon::parse($request->$deadline);
        $task->user_id = Auth::user()->id;
        $task->update();

        $tagInTaskToDelete = TagInTask::where('uuid', $request->uuid)->get();

        foreach ($tagInTaskToDelete as $tagInTask)
        {
            $tagInTask->delete();
        }

        if ($request->tasktags != null)
        {

//            $uuid = Str::random(10);
//            if (TagInTask::where('uuid', $uuid)->first() != null) {
//                while (TagInTask::where('uuid', $uuid)->first() != null) {
//                    $uuid = Str::random(10);
//                }
//            }
            foreach ($request->tasktags as $tag)
            {
                $tagInTask = new TagInTask();
                $tagInTask->who = "manager";
                $tagInTask->tag_id = $tag;
                $tagInTask->uuid = $request->uuid;
                $tagInTask->task_id = $task->id;
                $tagInTask->save();
            }
        }

        return back()->with('success', 'Задача обновлена');
    }

    public function clientTaskUpdate(Request $request)
    {
        if ($request->description == null)
        {
            return back()->withErrors(['Заполните описание'])->withInput();
        }
        $task = ClientTask::find($request->id);
        $task->fill($request->all());
        $task->deadline = \Carbon\Carbon::parse($request->deadline);
        $task->update();

        $tagInTaskToDelete = TagInTask::where('who', 'client')->where('task_id', $task->id)->get();
        foreach ($tagInTaskToDelete as $tagInTask)
        {
            $tagInTask->delete();
        }

        if ($request->tasktags != null)
        {
            foreach ($request->tasktags as $tag)
            {
                $tagInTask = new TagInTask();
                $tagInTask->who = "client";
                $tagInTask->tag_id = $tag;
                $tagInTask->task_id = $task->id;
                $tagInTask->save();
            }
        }

        $notification = new Notification();
        $manager = Manager::find($request->manager_id);
        $notification->user_id = $manager->user->id;
        $notification->link = "<a href='/parent/task/$task->id/edit'>$request->title</a>";
        $notification->title = 'Администратор обновил вашу задачу: '.$notification->link;
        $notification->type = 'client';
        $notification->save();


        return back()->with('success', 'Задача добавлена');
    }

    public function trainerTaskUpdate(Request $request)
    {

        $task = TrainerTask::find($request->id);
        $task->fill($request->all());
        $task->deadline = \Carbon\Carbon::parse($request->deadline);
        $task->update();

        $tagInTaskToDelete = TagInTask::where('uuid', $request->uuid)->get();
        foreach ($tagInTaskToDelete as $tagInTask)
        {
            $tagInTask->delete();
        }

        if ($request->tasktags != null)
        {
            foreach ($request->tasktags as $tag)
            {
                $tagInTask = new TagInTask();
                $tagInTask->who = "client";
                $tagInTask->tag_id = $tag;
                $tagInTask->uuid = $request->uuid;
                $tagInTask->task_id = $task->id;
                $tagInTask->save();
            }
        }

        $notification = new Notification();
        $trainer = Trainer::find($request->trainer_id);
        $notification->user_id = $trainer->user->id;
        $notification->link = "<a href='/manager/tasks/$task->id'>$request->title</a>";
        $notification->title = 'Администратор обновил вашу задачу: '.$notification->link;
        $notification->type = 'trainer';
        $notification->save();

        return back()->with('success', 'Задача обновлена');
    }

    public function managerTaskUpdate(Request $request)
    {
        if ($request->description == null)
        {
            return back()->withErrors(['Заполните описание'])->withInput();
        }
        $task = ManagerTask::find($request->id);
        $task->fill($request->all());
        $task->deadline = \Carbon\Carbon::parse($request->deadline);
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

        $notification = new Notification();
        $manager = Manager::find($request->manager_id);
        $notification->user_id = $manager->user->id;
        $notification->link = "<a href='/manager/tasks'>$request->title</a>";
        $notification->title = 'Администратор обновил вашу задачу: '.$notification->link;
        $notification->type = 'manager';
        $notification->save();

        return back()->with('success', 'Задача обновлена');
    }

    public function createTask($manager_id)
    {
        $statuses = TaskStatus::get();
        $manager = Manager::find($manager_id);
        return view('admin/tasks/create-task', compact('manager', 'statuses'));
    }

    public function showTask($task_id)
    {
        $task = Task::find($task_id);
        $tasks = Task::where('manager_id', $task->manager_id)->get();
        $manager = Manager::find($task->manager_id);
        return view('admin/tasks/show-task', compact('manager', 'task', 'tasks'));
    }

    public function storeTask(Request $request)
    {
        $task = new Task();
        $task->fill($request->all());
        $task->deadline = Carbon::parse($request->deadline);
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
                $tagInTask->who = "admin";
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
        $task = Task::find($request->task_id);
        $task->fill($request->all());
        $task->deadline = Carbon::parse($request->deadline);
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


    public function editTask($task_id)
    {
        $task = Task::find($task_id);
        $manager = Manager::find($task->manager_id);
        $tasks = Task::where('manager_id', $manager->id)->get();
        $statuses = TaskStatus::get();
        return view('admin/tasks/edit-task', compact('manager','task', 'tasks', 'statuses'));
    }

    public function my_filter_date_range(Request $request)
    {
        $from = \Carbon\Carbon::parse($request->start_date);
        $to = \Carbon\Carbon::parse($request->end_date);
        $adminTasks = AdminTask::whereBetween('deadline' , [$from, $to])->get();

        $managerTasks = null;
        $trainerTasks = null;

        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $manager = Manager::find($manager->id);
        return view('admin/tasks/my/index', compact(
            'manager',
            'tasktags', 'statuses', 'clubs',
            'adminTasks', 'managerTasks', 'trainerTasks'
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
        return view('admin/tasks/trainer/index', compact(
            'tasktags', 'clubs',
            'tasks', 'trainers'
        ));
    }

    public function manager_filter_date_range(Request $request)
    {
        $from = \Carbon\Carbon::parse($request->start_date);
        $to = \Carbon\Carbon::parse($request->end_date);
        $tasks = ManagerTask::whereBetween('deadline' , [$from, $to])->get();

        $managers = Manager::get();
        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        return view('admin/tasks/manager/index', compact(
            'tasktags', 'clubs',
            'tasks', 'managers'
        ));
    }

    public function all_filter_club(Request $request)
    {
        $leads = LeadNew::where('club_id', $request->club_id)->pluck('id');
        $adminTasks = AdminTask::whereIn('lead_id' , $leads)->get();
        $managerTasks = ManagerTask::whereIn('lead_id' , $leads)->get();
        $trainerTasks = TrainerTask::get();

        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $manager = Manager::find($manager->id);
        return view('admin/tasks/my/index', compact(
            'manager',
            'tasktags', 'statuses', 'clubs',
            'adminTasks', 'managerTasks', 'trainerTasks'
        ));
    }

    public function my_filter_tag(Request $request)
    {
        $ids = TagInTask::where('tag_id', $request->tag_id)->pluck('task_id');

        $adminTasks = AdminTask::whereIn('id' , $ids)->get();
        $managerTasks = null;
        $trainerTasks = null;

        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $manager = Manager::find($manager->id);
        return view('admin/tasks/my/index', compact(
            'manager',
            'tasktags', 'statuses', 'clubs',
            'adminTasks', 'managerTasks', 'trainerTasks'
        ));
    }

    public function trainer_filter_tag(Request $request)
    {
        $ids = TagInTask::where('tag_id', $request->tag_id)->pluck('task_id');

        $tasks = TrainerTask::whereIn('id' , $ids)->get();

        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $trainers = Trainer::get();
        return view('admin/tasks/trainer/index', compact(
            'tasktags', 'clubs', 'trainers', 'tasks'
        ));
    }

    public function manager_filter_tag(Request $request)
    {
        $ids = TagInTask::where('tag_id', $request->tag_id)->pluck('task_id');

        $tasks = ManagerTask::whereIn('id' , $ids)->get();

        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $managers = Manager::get();
        return view('admin/tasks/manager/index', compact(
            'tasktags', 'clubs', 'managers', 'tasks'
        ));
    }

    public function my_filter_when(Request $request)
    {
        if ($request->when == 'yesterday')
        {
            $adminTasks = AdminTask::where('deadline', '<', \Carbon\Carbon::yesterday())->get();
        }

        if ($request->when == 'tomorrow')
        {
            $adminTasks = AdminTask::where('deadline', '>', Carbon::tomorrow())->get();
        }

        if ($request->when == 'today')
        {
            $adminTasks = AdminTask::whereDate('deadline', Carbon::now())->get();
        }

        $managerTasks = null;
        $trainerTasks = null;

        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $manager = Manager::find($manager->id);
        return view('admin/tasks/my/index', compact(
            'manager',
            'tasktags', 'statuses', 'clubs',
            'adminTasks', 'managerTasks', 'trainerTasks'
        ));
    }

    public function all_filter_when(Request $request)
    {
        if ($request->when == 'yesterday')
        {
            $adminTasks = AdminTask::where('deadline', '<', \Carbon\Carbon::yesterday())->get();
            $managerTasks = ManagerTask::where('deadline', '<', \Carbon\Carbon::yesterday())->get();
            $trainerTasks = TrainerTask::where('deadline', '<', \Carbon\Carbon::yesterday())->get();
        }

        if ($request->when == 'tomorrow')
        {
            $adminTasks = AdminTask::where('deadline', '>', Carbon::tomorrow())->get();
            $managerTasks = ManagerTask::where('deadline', '>', Carbon::tomorrow())->get();
            $trainerTasks = TrainerTask::where('deadline', '>', Carbon::tomorrow())->get();
        }

        if ($request->when == 'today')
        {
            $adminTasks = AdminTask::whereDate('deadline', Carbon::now())->get();
            $managerTasks = ManagerTask::whereDate('deadline', Carbon::now())->get();
            $trainerTasks = TrainerTask::whereDate('deadline', Carbon::now())->get();
        }

        $managerTasks = null;
        $trainerTasks = null;

        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $manager = Manager::find($manager->id);
        return view('admin/tasks/my/index', compact(
            'manager',
            'tasktags', 'statuses', 'clubs',
            'adminTasks', 'managerTasks', 'trainerTasks'
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
            $tasks = TrainerTask::where('deadline', '>', Carbon::tomorrow())->get();
        }

        if ($request->when == 'today')
        {
            $tasks = TrainerTask::whereDate('deadline', Carbon::now())->get();
        }

        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $trainers = Trainer::get();
        return view('admin/tasks/trainer/index', compact(
            'tasktags', 'tasks', 'clubs',
            'trainers'
        ));
    }

    public function manager_filter_when(Request $request)
    {
        if ($request->when == 'yesterday')
        {
            $tasks = ManagerTask::where('deadline', '<', \Carbon\Carbon::yesterday())->get();
        }

        if ($request->when == 'tomorrow')
        {
            $tasks = ManagerTask::where('deadline', '>', Carbon::tomorrow())->get();
        }

        if ($request->when == 'today')
        {
            $tasks = ManagerTask::whereDate('deadline', Carbon::now())->get();
        }

        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $managers = Manager::get();
        return view('admin/tasks/manager/index', compact(
            'tasktags', 'tasks', 'clubs',
            'managers'
        ));
    }

    public function all_filter_tag(Request $request)
    {
        $ids = TagInTask::where('tag_id', $request->tag_id)->pluck('task_id');

        $adminTasks = AdminTask::whereIn('id' , $ids)->get();
        $managerTasks = ManagerTask::whereIn('id' , $ids)->get();
        $trainerTasks = TrainerTask::whereIn('id' , $ids)->get();

        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $manager = Manager::find($manager->id);
        return view('admin/tasks/my/index', compact(
            'manager',
            'tasktags', 'statuses', 'clubs',
            'adminTasks', 'managerTasks', 'trainerTasks'
        ));
    }


    public function my_filter_club(Request $request)
    {
        $leads = LeadNew::where('club_id', $request->club_id)->pluck('id');
        $adminTasks = AdminTask::whereIn('lead_id' , $leads)->get();
        $managerTasks = null;
        $trainerTasks = null;

        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $manager = Manager::find($manager->id);
        return view('admin/tasks/my/index', compact(
            'manager',
            'tasktags', 'statuses', 'clubs',
            'adminTasks', 'managerTasks', 'trainerTasks'
        ));
    }

    public function filter_club(Request $request)
    {
        $club_trainers = ClubTrainer::where('club_id', $request->club_id)->pluck('trainer_id');
        $tasks = TrainerTask::whereIn('trainer_id', $club_trainers)->get();

        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $trainers = Trainer::get();
        return view('admin/tasks/trainer/index', compact(
            'tasktags', 'tasks', 'clubs',
            'trainers'
        ));
    }

    public function manager_filter_club(Request $request)
    {
        $club_trainers = ClubTrainer::where('club_id', $request->club_id)->pluck('trainer_id');
        $tasks = ManagerTask::whereIn('manager_id', $club_trainers)->get();

        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $managers = Manager::get();
        return view('admin/tasks/manager/index', compact(
            'tasktags', 'tasks', 'clubs',
            'managers'
        ));
    }

    public function all_filter_date_range(Request $request)
    {
        $from = \Carbon\Carbon::parse($request->start_date);
        $to = \Carbon\Carbon::parse($request->end_date);
        $adminTasks = AdminTask::whereBetween('deadline' , [$from, $to])->get();
        $managerTasks = ManagerTask::whereBetween('deadline' , [$from, $to])->get();
        $trainerTasks = TrainerTask::whereBetween('deadline' , [$from, $to])->get();

        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $clubs  = Club::get();
        $manager = Manager::find($manager->id);
        return view('admin/tasks/my/index', compact(
            'manager',
            'tasktags', 'statuses', 'clubs',
            'adminTasks', 'managerTasks', 'trainerTasks'
        ));
    }
}
