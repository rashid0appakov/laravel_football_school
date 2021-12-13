<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\AdminTask;
use App\Models\Manager;
use App\Models\ManagerTask;
use App\Models\Notification;
use App\Models\Role;
use App\Models\TaskTag;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->hasRole('Менеджер') && !Auth::user()->hasRole('Администратор')) {
                abort(404);
            }
            $user_id = Auth::user()->id;
            $manager = Manager::where('user_id', $user_id)->first();
            $tasks = ManagerTask::where('manager_id', $manager->id)->get();
            $tags = TaskTag::get();
            $notifications = Notification::where('user_id', $user_id)->get();
            View::share('tasks', $tasks);
            View::share('tags', $tags);
            View::share('notifications', $notifications);
            return $next($request);
        });
    }

}
