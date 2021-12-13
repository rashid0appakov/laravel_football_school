<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\Club;
use App\Models\Lead;
use App\Models\Manager;
use App\Models\ManagerTask;
use App\Models\ParentChild;
use App\Models\Position;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\TaskTag;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends BaseController
{
    public function index()
    {
        $users = User::get();
        return view('admin/users/index', compact('users'));
    }

    public function managers()
    {
        $managers = Manager::get();
        return view('admin/users/managers', compact('managers'));
    }

    public function managerCreate()
    {
        $positions = Position::get();
        $clubs = Club::get();
        return view('admin/users/create-manager', compact('positions', 'clubs'));
    }

    public function managerEdit($manager_id)
    {
        $positions = Position::get();
        $clubs = Club::get();
        $manager = Manager::find($manager_id);
        return view('admin/users/edit-manager', compact('positions', 'clubs', 'manager'));
    }

    public function showManager($manager_id)
    {
        $manager = Manager::find($manager_id);
        $positions = Position::get();
        $clubs = Club::get();
        $tasks = ManagerTask::where('manager_id', $manager->id)->get();

        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();

        return view('admin/users/show-manager', compact(
            'manager','positions',
            'clubs', 'tasks', 'statuses', 'tasktags'
        ));
    }


    public function storeManager(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = $request->all();
    
        $user = new User();
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->patronymic = $data['patronymic'];
        $user->active = $data['active'] == 'on' ? 1 : 0;
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        $manager = new Manager();
        $manager->fill($data);
        $manager->user_id = $user->id;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/users/managers/avatars';
            $uplaod = $file->move($path,$fileName);
            $manager->image = $fileName;
        } else {
            $manager->image = "avatar.png";
        }

        $manager->save();

        $user_role = new UserRole();
        $user_role->user_id = $user->id;
        $user_role->role_id = 2;
        $user_role->save();

        return redirect("admin/users/managers/show-manager/$manager->id");
    }

    public function updateManager(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            
        ]);

        $data = $request->all();

        $manager = Manager::find($data['manager_id']);
        $manager->fill($data);
        if ($request->hasFile('image')){
            \File::delete("users/managers/avatars/$manager->image");
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/users/managers/avatars';
            $uplaod = $file->move($path,$fileName);
            $manager->image = $fileName;
        }
        $manager->update();
        
        $chars = ['+',' ', '(', ')', '-'];
        $numb = str_replace($chars, '', $data['phone']);
        $whatsapp = str_replace($chars, '', $data['whatsapp']);
        $telegramm = str_replace($chars, '', $data['telegramm']);
        $user = User::find($manager->user_id);
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->patronymic = $data['patronymic'];
        $user->active = $data['active'] == 'on' ? 1 : 0;
        $user->email = $data['email'];
        $user->city_number = $data['city_number'];
        $user->phone = $numb;
        $user->whatsapp = $whatsapp;
        $user->telegramm = $telegramm;
        $user->position_id = $data['position_id'];
        
        if($data['password'] != null)
        {
            $user->password = Hash::make($data['password']);
        }

        $user->update();

        return redirect("admin/users/managers/show-manager/$manager->id");
    }

    public function deleteManager($id)
    {
        $managers = Manager::get();
        $manager = Manager::find($id);
        $leads = Lead::where('manager_id', $id)->get();
        $areas = Area::where('manager_id', $id)->get();
        $clubs = Club::where('manager_id', $id)->get();
        $tasks = ManagerTask::where('manager_id', $id)->get();
        if ($leads->isEmpty()
            && $areas->isEmpty()
            && $clubs->isEmpty()
            && $tasks->isEmpty())
        {
            if ($manager != null)
            {
                $manager->delete();
            }

            return redirect('/admin/users/managers')->with('success', 'Менеджер удален');
        }

        return view('admin.users.to_delete', compact(
            'managers', 'id', 'leads',
            'areas', 'clubs', 'tasks', 'manager'
        ));
    }

    public function reassignmentManager(Request $request)
    {
        $type = $request->type;
        if ($type == "lead")
        {
            $leads = Lead::where('manager_id', $request->current_manager_id)->get();

            foreach ($leads as $lead)
            {
                $lead->manager_id = $request->manager_id;
                $lead->update();
            }

        }

        if ($type == "area")
        {
            $areas = Area::where('manager_id', $request->current_manager_id)->get();

            foreach ($areas as $area)
            {
                $area->manager_id = $request->manager_id;
                $area->update();
            }
        }

        if ($type == "club")
        {
            $clubs = Club::where('manager_id', $request->current_manager_id)->get();

            foreach ($clubs as $club)
            {
                $club->manager_id = $request->manager_id;
                $club->update();
            }
        }

        if ($type == "task")
        {
            $tasks = ManagerTask::where('manager_id', $request->current_manager_id)->get();

            foreach ($tasks as $task)
            {
                $task->manager_id = $request->manager_id;
                $task->update();
            }
        }

        return back()->with('success', 'Менеджер переназначен');
    }
}
