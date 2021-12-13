<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\ParentChild;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function store_parent(Request $request)
    {
        if ($request->password != $request->password_confirmation)
        {
            return back()->with('error', 'Пароли не совпадают.')->withInput();
        }

        $data = $request->except('password');
        if(session()->has('rek')){
            $data = array_merge($data, session()->get('rek'));
            session()->forget('rek');
        }
        $user = User::create($data);
        Auth::login($user);

        $user->roles()->attach(Role::where('name', 'Родитель')->first());
        $user->update();

        $parent = new ParentChild();
        $parent->fill($request->all());
        $parent->user_id = $user->id;
        $parent->save();


        $child = new Child();
        $child->fill($request->all());
        $child->parent_id = $parent->id;
        $child->workout_balance = 0;
        $child->image = "avatar.png";
        $child->birthday = \Carbon\Carbon::parse($request->birthday);
        $child->age = \Carbon\Carbon::parse($request->birthday)->age;
        $child->save();

        $user_role = new UserRole();
        $user_role->user_id = $user->id;
        $user_role->role_id = 3;
        $user_role->save();

        return redirect('/parents')->with('success', 'Вы успешно зарегистрировались');

    }
}
