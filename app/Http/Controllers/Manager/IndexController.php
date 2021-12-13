<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Child;
use App\Models\ClientType;
use App\Models\Club;
use App\Models\EntryPoint;
use App\Models\Lead;
use App\Models\LeadStatus;
use App\Models\LeadType;
use App\Models\Manager;
use App\Models\ParentChild;
use App\Models\Position;
use App\Models\Product;
use App\Models\Spec;
use App\Models\Task;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Sodium\compare;

class IndexController extends BaseController
{
    public function index()
    {
        $trainers = Trainer::take(10)->get();
        $parents = ParentChild::take(10)->get();
        $children = Child::take(10)->get();
        $managers = Manager::get();
        $tasks = Task::take(10)->get();
        $products = Product::take(10)->get();

        return view('/managers/index', compact(
            'trainers', 'parents',
            'children', 'managers', 'tasks',
            'products'
        ));
    }

    public function dictionaries()
    {
        $lead_statuses = LeadStatus::get();
        $lead_types = LeadType::get();
        $client_types = ClientType::get();
        $spec = Spec::get();
        $entry_points = EntryPoint::get();
        $channels = Channel::get();
        return view('managers/dictionaries/index', compact(
            'lead_statuses', 'lead_types',
            'spec', 'client_types', 'entry_points', 'channels'
        ));
    }

    public function update_profile(Request $request)
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

        $user = User::find($manager->user_id);
        $user->name = $data['name'];
        $user->active = $data['active'] == 'on' ? 1 : 0;
        $user->email = $data['email'];
        if($data['password'] != null)
        {
            $user->password = Hash::make($data['password']);
        }
        $user->update();

        return redirect("manager/edit-profile");
    }

    public function edit_profile()
    {
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        return view("managers/edit-profile", compact('manager'));
    }
}
