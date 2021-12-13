<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Child;
use App\Models\Club;
use App\Models\EntryPoint;
use App\Models\Lead;
use App\Models\LeadNew;
use App\Models\LeadStatus;
use App\Models\LeadType;
use App\Models\Level;
use App\Models\Manager;
use App\Models\ManagerTask;
use App\Models\ParentChild;
use App\Models\Spec;
use App\Models\TaskStatus;
use App\Models\TaskTag;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\DateTime;

class ClientController extends BaseController
{
    public function create()
    {
        $managers = Manager::all();
        $channels = Channel::get();
        $lead_types = LeadType::get();
        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        return view('managers/clients/create', compact(
            'channels',
            'lead_types',
            'lead_statuses',
            'entry_points',
            'managers'
        ));
    }

    public function client_create($lead_id)
    {
        $managers = Manager::get();
        $lead = LeadNew::find($lead_id);
        $channels = Channel::get();
        $lead_types = LeadType::get();
        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $levels = Level::get();
        $spec = Spec::get();
        $clubs = Club::get();
        $level = Level::find($lead->level_id);
        return view('managers/clients/create-from-lead', compact(
            'channels',
            'lead_types',
            'lead_statuses',
            'entry_points',
            'lead',
            'managers',
            'clubs',
            'spec',
            'levels',
            'level'
        ));
    }

    public function client_delete($id)
    {
        $lead = LeadNew::find($id);
        $lead->delete();
        return back()->with('success', 'Лид удален');
    }

    public function index()
    {
        $clients = ParentChild::get();
        $lead_types = LeadType::get();
        $entry_points = EntryPoint::get();

        return view('managers/clients/index', compact(
            'clients',
            'lead_types',
            'entry_points'
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
        $lead = LeadNew::find($request->lead_id);
        if($lead){
            $data['url'] = $lead->url;
            $data['tel'] = $lead->tel;
            $data['own'] = $lead->own;
            $data['ch'] = $lead->ch;
            $data['pl'] = $lead->pl;
        }
        $check_email = User::where('email', $data['email'])->first();
        if ($check_email != null)
        {
            return back()->withErrors(['Клиент с таким email уже существует'])->withInput();
        }
        $check_phone = ParentChild::where('phone', $data['phone'])->first();
        if ($check_phone != null)
        {
            return back()->withErrors(['Клиент с таким телефоном уже существует'])->withInput();
        }

        $user = new User();
        $user->name = $data['name'];
        $user->active = 1;
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        $manager = Auth::user()->name;

        $client = new ParentChild();
        $client->fill($data);
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $client->who_create = $manager->id;
        $client->user_id = $user->id;
        $client->start_date = \Carbon\Carbon::parse($request->start_date);
        $client->next_day_time_call = \Carbon\Carbon::parse($request->next_day_time_call);
        $client->save();

        $user->roles()->attach(Role::where('name', 'Родитель')->first());

        return redirect('/manager/crm/clients/'.$client->id.'/edit')->with('success', 'Запись добавлена.');
    }

    public function create_from_lead(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);



        $data = $request->all();
        $lead = LeadNew::find($request->lead_id);
        if($lead){
            $data['url'] = $lead->url;
            $data['tel'] = $lead->tel;
            $data['own'] = $lead->own;
            $data['ch'] = $lead->ch;
            $data['pl'] = $lead->pl;
        }
        $check_email = User::where('email', $data['email'])->first();
        if ($check_email != null)
        {
            return back()->withErrors(['Клиент с таким email уже существует'])->withInput();
        }
        $check_phone = ParentChild::where('phone', $data['phone'])->first();
        if ($check_phone != null)
        {
            return back()->withErrors(['Клиент с таким телефоном уже существует'])->withInput();
        }

        $user = new User();
        $user->name = $data['name'];
        $user->active = 1;
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        $manager = Auth::user()->name;

        $client = new ParentChild();
        $client->fill($data);
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $client->who_create = $manager->id;
        $client->user_id = $user->id;
        $client->start_date = \Carbon\Carbon::parse($request->start_date);
        $client->next_day_time_call = \Carbon\Carbon::parse($request->next_day_time_call);
        $client->save();

        $user->roles()->attach(Role::where('name', 'Родитель')->first());

        $child = new Child();
        $child->fill($request->all());
        $child->birthday = \Carbon\Carbon::parse($request->birthday);
        $child->age = Carbon::parse($request->birthday)->age;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/users/children/avatars';
            $uplaod = $file->move($path,$fileName);
            $child->image = $fileName;
        } else {
            $child->image = "avatar.png";
        }
        $child->parent_id = $client->id;
        $child->club_id = $request->club_id;
        $child->save();

        return redirect('/manager/crm/clients/'.$client->id.'/edit')->with('success', 'Запись добавлена.');
    }

    public function edit($id)
    {
        $managers = Manager::get();
        $channels = Channel::get();
        $lead_types = LeadType::get();
        $lead_statuses = LeadStatus::get();
        $levels = Level::get();
        $spec = Spec::get();
        $entry_points = EntryPoint::get();
        $client = ParentChild::find($id);
        $statuses = TaskStatus::get();
        $tasktags  = TaskTag::get();
        $children = Child::where('parent_id', $client->id)->get();
        return view('managers/clients/edit', compact(
            'channels',
            'lead_types',
            'levels',
            'lead_statuses',
            'entry_points',
            'client',
            'spec',
            'children',
            'managers',
            'statuses',
            'tasktags'
        ));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = $request->all();

        $user = User::find($data['user_id']);
        $user->name = $data['name'];
        $user->active = 1;
        if($data['email'] != $user->email)
        {
            $user->email = $data['email'];
        }
        $user->password = Hash::make($data['password']);
        $user->update();

        $manager = Auth::user()->name;

        $client = ParentChild::find($data['client_id']);
        $client->fill($request->all());
        $client->user_id = $user->id;
        $client->who_create = $manager;
        $client->start_date = \Carbon\Carbon::parse($request->start_date);
        $client->next_day_time_call = \Carbon\Carbon::parse($request->next_day_time_call);
        $client->update();

        return redirect('/manager/crm/clients/'.$client->id.'/edit')->with('success', 'Запись изменена.');
    }

    public function status_filter(Request $request)
    {
        $leads = LeadNew::where('status_id', $request->lead_status_id)->get();
        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $channels = Channel::get();
        $managers = Manager::get();

        return view('/managers/leads/index', compact(
            'leads',
            'lead_statuses',
            'entry_points',
            'channels',
            'managers'
        ));
    }

    public function clubs_filter(Request $request)
    {
        $leads = LeadNew::where('club_id', $request->club_id)->get();
        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $channels = Channel::get();
        $managers = Manager::get();

        return view('/managers/leads/index', compact(
            'leads',
            'lead_statuses',
            'entry_points',
            'channels',
            'managers'
        ));
    }

    public function my_filter()
    {
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $leads = LeadNew::where('manager_id', $manager->id)->get();
        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $channels = Channel::get();
        $managers = Manager::get();

        return view('/managers/leads/index', compact(
            'leads',
            'lead_statuses',
            'entry_points',
            'channels',
            'managers'
        ));
    }

    public function start_date(Request $request)
    {
        $leads = LeadNew::whereDate('created_at', \Carbon\Carbon::parse($request->start_date))->get();
        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $channels = Channel::get();
        $managers = Manager::get();

        return view('/managers/leads/index', compact(
            'leads',
            'lead_statuses',
            'entry_points',
            'channels',
            'managers'
        ));
    }

    public function entry_point(Request $request)
    {
        $leads = LeadNew::where('entry_point_id', $request->entry_point_id)->get();
        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $channels = Channel::get();
        $managers = Manager::get();

        return view('/managers/leads/index', compact(
            'leads',
            'lead_statuses',
            'entry_points',
            'channels',
            'managers'
        ));
    }

    public function channel(Request $request)
    {
        $leads = LeadNew::where('channel_id', $request->channel_id)->get();
        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $channels = Channel::get();
        $managers = Manager::get();

        return view('/managers/leads/index', compact(
            'leads',
            'lead_statuses',
            'entry_points',
            'channels',
            'managers'
        ));
    }

    public function manager(Request $request)
    {
        $leads = LeadNew::where('manager_id', $request->manager_id)->get();
        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $channels = Channel::get();
        $managers = Manager::get();

        return view('/managers/leads/index', compact(
            'leads',
            'lead_statuses',
            'entry_points',
            'channels',
            'managers'
        ));
    }

    public function type(Request $request)
    {
        $lead_types = LeadType::get();
        $clients = ParentChild::where('lead_type_id', $request->lead_type_id)->get();
        $entry_points = EntryPoint::get();

        return view('/managers/clients/index', compact(
            'lead_types',
            'entry_points',
            'clients'
        ));
    }

    public function start_date_client(Request $request)
    {
        $lead_types = LeadType::get();
        $clients = ParentChild::whereDate('start_date', \Carbon\Carbon::parse($request->start_date))->get();
        $entry_points = EntryPoint::get();

        return view('/managers/clients/index', compact(
            'lead_types',
            'entry_points',
            'clients'
        ));
    }

    public function entry_point_client(Request $request)
    {
        $lead_types = LeadType::get();
        $clients = ParentChild::where('entry_point_id', $request->entry_point_id)->get();
        $entry_points = EntryPoint::get();

        return view('/managers/clients/index', compact(
            'lead_types',
            'entry_points',
            'clients'
        ));
    }

    public function child_exist(Request $request)
    {
        $lead_types = LeadType::get();
        $children_parent_id = Child::get()->pluck('parent_id');
        if($request->child == 1)
        {
            $clients = ParentChild::whereIn('id', $children_parent_id)->get();
        } else {
            $clients = ParentChild::whereNotIn('id', $children_parent_id)->get();
        }

        $entry_points = EntryPoint::get();

        return view('/managers/clients/index', compact(
            'lead_types',
            'entry_points',
            'clients'
        ));
    }

    public function workout_balance(Request $request)
    {
        $lead_types = LeadType::get();
        $children_parent_id = Child::where('workout_balance', $request->workout_balance)->pluck('parent_id');
        $clients = ParentChild::whereIn('id', $children_parent_id)->get();
        $entry_points = EntryPoint::get();

        return view('/managers/clients/index', compact(
            'lead_types',
            'entry_points',
            'clients'
        ));
    }


    public function when_filter(Request $request)
    {
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        if ($request->when == 'yesterday')
        {
            $lead_ids = ManagerTask::where('deadline', '<', Carbon::now())->pluck('lead_id');
            $leads = LeadNew::whereIn('id', $lead_ids)->orWhere('manager_id', $manager->id)->get();
        }

        if ($request->when == 'tomorrow')
        {
            $lead_ids = ManagerTask::where('deadline', '>', Carbon::tomorrow())->pluck('lead_id');
            $leads = LeadNew::whereIn('id', $lead_ids)->orWhere('manager_id', $manager->id)->get();
        }

        if ($request->when == 'today')
        {
            $lead_ids = ManagerTask::whereDate('deadline', Carbon::now())->pluck('lead_id');
            $leads = LeadNew::whereIn('id', $lead_ids)->orWhere('manager_id', $manager->id)->get();
        }

        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $channels = Channel::get();
        $managers = Manager::get();
        $clubs = Club::get();

        return view('/managers/leads/index', compact(
            'leads',
            'lead_statuses',
            'entry_points',
            'channels',
            'managers',
            'clubs'
        ));
    }

    public function date_range(Request $request)
    {
        $from = \Carbon\Carbon::parse($request->start_date)->startOfDay();
        $to = \Carbon\Carbon::parse($request->end_date)->endOfDay();

        $lead_ids = ManagerTask::whereBetween('deadline', [$from, $to])->pluck('lead_id');
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $leads = LeadNew::whereIn('id', $lead_ids)->orWhere('manager_id', $manager->id)->get();

        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $channels = Channel::get();
        $managers = Manager::get();
        $clubs = Club::get();

        return view('/managers/leads/index', compact(
            'leads',
            'lead_statuses',
            'entry_points',
            'channels',
            'managers',
            'clubs'
        ));
    }

    public function tasks_date(Request $request)
    {
        $lead_ids = ManagerTask::whereDate('deadline', $request->date)->pluck('lead_id');
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $leads = LeadNew::whereIn('id', $lead_ids)->orWhere('manager_id', $manager->id)->get();

        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $channels = Channel::get();
        $managers = Manager::get();
        $clubs = Club::get();

        return view('/managers/leads/index', compact(
            'leads',
            'lead_statuses',
            'entry_points',
            'channels',
            'managers',
            'clubs'
        ));
    }
}
