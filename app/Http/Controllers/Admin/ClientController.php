<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminTask;
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

class ClientController extends BaseController
{
    public function create()
    {
        $lead = LeadNew::get();
        $channels = Channel::get();
        $lead_types = LeadType::get();
        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $managers = Manager::get();
        return view('admin/clients/create', compact(
            'channels',
            'lead_types',
            'lead_statuses',
            'entry_points',
            'lead',
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
        return view('admin/clients/create-from-lead', compact(
            'channels',
            'lead_types',
            'lead_statuses',
            'entry_points',
            'lead',
            'managers',
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

        return view('admin/clients/index', compact(
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
            return back()->withErrors(['Клиент с таким email уже существует']);
        }
        $check_phone = ParentChild::where('phone', $data['phone'])->first();
        if ($check_phone != null)
        {
            return back()->withErrors(['Клиент с таким телефоном уже существует']);
        }

        $user = new User();
        $user->name = $data['name'];
        $user->active = 1;
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        $isAdmin = Auth::user()->hasRole('Администратор');

        $client = new ParentChild();
        $client->fill($data);
        if ($isAdmin == true)
        {
            $client->who_create = null;
        } else {
            $client->who_create = $request->who_create;
        }

        $client->user_id = $user->id;
        $client->start_date = \Carbon\Carbon::parse($request->start_date);
        //$client->next_day_time_call = \Carbon\Carbon::parse($request->next_day_time_call);
        $client->save();

        $user->roles()->attach(Role::where('name', 'Родитель')->first());

        return redirect('/admin/crm/clients/'.$client->id.'/edit')->with('success', 'Запись добавлена.');
    }

    public function edit($id)
    {
        $lead = LeadNew::get();
        $channels = Channel::get();
        $lead_types = LeadType::get();
        $lead_statuses = LeadStatus::get();
        $levels = Level::get();
        $spec = Spec::get();
        $entry_points = EntryPoint::get();
        $client = ParentChild::find($id);
        $children = Child::where('parent_id', $client->id)->get();

        $managers = Manager::get();
        $statuses = TaskStatus::get();
        $tasks = ManagerTask::get();
        $tasktags  = TaskTag::get();


        return view('admin/clients/edit', compact(
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
            'tasks',
            'tasktags',
            'lead',
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

        $client = ParentChild::find($data['client_id']);
        $client->fill($request->all());
        $client->user_id = $user->id;
        $isAdmin = Auth::user()->hasRole('Администратор');
        if ($isAdmin == true)
        {
            $client->who_create = null;
        } else {
            $client->who_create = $request->who_create;
        }
        $client->start_date = \Carbon\Carbon::parse($request->start_date);
        //$client->next_day_time_call = \Carbon\Carbon::parse($request->next_day_time_call);
        $client->update();

        return redirect('/admin/crm/clients/'.$client->id.'/edit')->with('success', 'Запись изменена.');
    }

    public function status_filter(Request $request)
    {
        $leads = LeadNew::where('status_id', $request->lead_status_id)->get();
        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $channels = Channel::get();
        $managers = Manager::get();

        return view('/admin/leads/index', compact(
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

        return view('/admin/leads/index', compact(
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

        return view('/admin/leads/index', compact(
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

        return view('/admin/leads/index', compact(
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

        return view('/admin/leads/index', compact(
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

        return view('/admin/leads/index', compact(
            'leads',
            'lead_statuses',
            'entry_points',
            'channels',
            'managers'
        ));
    }

    public function when_filter(Request $request)
    {
        if ($request->when == 'yesterday')
        {
            $leads = LeadNew::where('created_at', '<', Carbon::now()->startOfDay())->get();
        }

        if ($request->when == 'tomorrow')
        {
            $leads = LeadNew::where('created_at', '>', Carbon::tomorrow())->get();
        }

        if ($request->when == 'today')
        {
            $leads = LeadNew::whereDate('created_at', Carbon::now())->get();
        }

        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $channels = Channel::get();
        $managers = Manager::get();
        $clubs = Club::get();

        return view('/admin/leads/index', compact(
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
        $lead_ids_admin = AdminTask::whereBetween('deadline', [$from, $to])->pluck('lead_id');
        $lead_ids = array_push($lead_ids, $lead_ids_admin);
        $leads = LeadNew::whereIn('id', $lead_ids)->get();

        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $channels = Channel::get();
        $managers = Manager::get();
        $clubs = Club::get();

        return view('/admin/leads/index', compact(
            'leads',
            'lead_statuses',
            'entry_points',
            'channels',
            'managers',
            'clubs'
        ));
    }

    public function type(Request $request)
    {
        $lead_types = LeadType::get();
        $clients = ParentChild::where('lead_type_id', $request->lead_type_id)->get();
        $entry_points = EntryPoint::get();

        return view('/admin/clients/index', compact(
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

        return view('/admin/clients/index', compact(
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

        return view('/admin/clients/index', compact(
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

        return view('/admin/clients/index', compact(
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

        return view('/admin/clients/index', compact(
            'lead_types',
            'entry_points',
            'clients'
        ));
    }
}
