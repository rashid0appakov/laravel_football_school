<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AbonimentGroup;
use App\Models\AdminTask;
use App\Models\Area;
use App\Models\AvailableDay;
use App\Models\AvailableDayTrainer;
use App\Models\Club;
use App\Models\ClubTrainer;
use App\Models\Group;
use App\Models\Level;
use App\Models\Spec;
use App\Models\TaskStatus;
use App\Models\TaskTag;
use App\Models\TrainerTask;
use App\Models\User;
use App\Models\Trainer;
use App\Models\UserRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TrainersController extends BaseController
{
    public function index()
    {
        $trainers = Trainer::get();
        return view('admin/trainers/index', compact('trainers'));
    }

    public function show($group_id)
    {
        $trainer = Trainer::find($group_id);
        return view('admin/trainers/show', compact('trainer'));
    }

    public function create()
    {
        $available_days = AvailableDay::get();
        return view('admin/trainers/create', compact('available_days'));
    }

    public function edit($trainer_id)
    {
        $trainer = Trainer::find($trainer_id);
        $available_days = AvailableDay::whereNotIn('id', $trainer->availableDay->pluck('id'))->get();
        $statuses = TaskStatus::get();
        $tasks = TrainerTask::where('trainer_id', $trainer_id)->get();
        $tasktags  = TaskTag::get();
        return view('admin/trainers/edit', compact(
            'trainer', 'available_days',
            'statuses', 'tasks', 'tasktags'
        ));
    }

    public function store(Request $request)
    {
         $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = $request->all();

        $trainer = new Trainer();
        $users = new User();

        $user = User::find($users->id);
        $trainer->name = $data['name'];
        $trainer->surname = $data['surname'];
        $trainer->patronymic = $data['patronymic'];
        $trainer->birthday = $data['birthday'];
        $trainer->phone = $data['phone'];
        $trainer->vk = $data['address'];
        $trainer->instagram = $data['instagram'];
        $trainer->education = $data['education'];
        $trainer->license = $data['license'];
        $trainer->experience = $data['experience'];
        $trainer->family_status = $data['family_status'];
        $trainer->children = $data['children'];
        $trainer->career = $data['career'];
        $trainer->password = Hash::make($data['password']);
        $trainer->password_confirmation = Hash::make($data['password_confirmation']);
          if ($request->password != $request->password_confirmation)
        {
            return back()->withErrors(['Пароли не совпадают']);
        }
        $trainer->user_id = 1;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/trainer/avatarss';
            $uplaod = $file->move($path,$fileName);
            $trainer->image = $fileName;
        } else {
            $trainer->image = "avatar.png";
        }

        $trainer->save();


    }


    public function update(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed']
        ]);

        $data = $request->all();


        $trainer = Trainer::find($request->trainer_id);
        $user = User::find($trainer->user_id);
        $trainer->fill($data);
        if ($request->hasFile('image')){
            \File::delete("/trainer/avatars/$trainer->image");
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/trainer/avatars';
            $uplaod = $file->move($path,$fileName);
            $trainer->image = $fileName;
        }

        $chars = ['+',' ', '(', ')', '-'];
        $numb = str_replace($chars, '', $data['phone']);
        $trainer->user_id = $user->id;
        $trainer->name = $data['name'];
        $trainer->surname = $data['surname'];
        $trainer->patronymic = $data['patronymic'];
        $user->email = $data['email'];
        $trainer->gender = $data['gender'];
        $trainer->birthday = \Carbon\Carbon::parse($data['birthday']);
        $trainer->phone = $numb;
        $trainer->vk = $data['address'];
        $trainer->instagram = $data['instagram'];
        $trainer->education = $data['education'];
        $trainer->license = $data['license'];
        $trainer->experience = $data['experience'];
        $trainer->family_status = $data['family_status'];
        $trainer->children = $data['children'];
        $trainer->career = $data['career'];

        if($data['password'] != null)
        {
            $user->password = Hash::make($data['password']);
        }
        $user->update();
        $trainer->update();
        return redirect('admin/trainers/'.$trainer->id.'/edit');

    }


    public function destroy(Trainer $trainer)
    {
        $ab_group = ClubTrainer::where('trainer_id', $trainer->id)->get();
        if (count($ab_group) > 0)
        {
            return back()->withErrors(['Тренер добавлен в клуб. Сначала удалите его из клуба']);
        }
        $user = User::find($trainer->user_id);
        $trainer->delete();
        $user->delete();
        return redirect('/admin/trainers');
    }

    public function deleteTrainer($trainer_id)
    {
        $club_trainers = ClubTrainer::where('trainer_id', $trainer_id)->get();
        if (count($club_trainers) > 0)
        {
            foreach ($club_trainers as $club_trainer)
            {
                $club_trainer->delete();
            }
        }
        $trainer = Trainer::find($trainer_id);
        $user = User::find($trainer->user_id);

        $user_role = UserRole::where('user_id', $user->id)->first();
        $user_role->delete();

        $trainer->delete();
        $user->delete();

        return redirect('/admin/trainers')->with('success', 'Тренер удален');
    }
}
