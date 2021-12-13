<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminTask;
use App\Models\Notification;
use App\Models\Role;
use App\Models\TaskTag;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    protected $user;

//    public function __construct()
//    {
//        $user = Auth::user();
//        if ($user->hasRole("Администратор"))
//        {
//            dd($user);
//        }
//        if (Gate::denies('ADMIN_ACCESS')) {
//            abort(403, 'Unauthorized action.');
//        }
//    }
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->hasRole('Администратор')) {
                abort(404);
            }
            $tasks = AdminTask::get();
            $tags = TaskTag::get();
            $notifications = Notification::get();
            View::share('tasks', $tasks);
            View::share('tags', $tags);
            View::share('notifications', $notifications);
            return $next($request);
        });
    }

}
