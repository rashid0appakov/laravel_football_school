<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\AvailableDay;
use App\Models\Channel;
use App\Models\EntryPoint;
use App\Models\Lead;
use App\Models\LeadComment;
use App\Models\LeadLog;
use App\Models\LeadNew;
use App\Models\LeadStatus;
use App\Models\LeadType;
use App\Models\Level;
use App\Models\Manager;
use App\Models\ManagerTask;
use App\Models\Notification;
use App\Models\OfferDictionary;
use App\Models\RequestDictionary;
use App\Models\TaskStatus;
use App\Models\TaskTag;
use App\Models\Trainer;
use App\Models\Training;
use App\Models\Club;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends BaseController
{
    public function temp_users(Request $request){
        $request->validate([
            'name'  => 'required|string|max:255',
            'training_id' => 'required|numeric'
        ]);
        $training = Training::findOrFail($request->training_id);
        $training->temp_users()->create($request->all());
        return bacK();
    }

    public function index()
    {
        $user = Auth::user();
        $manager = Manager::where('user_id', $user->id)->first();
        $clubs_id = Club::where('manager_id', $manager->id)->pluck('id');
        $leads = LeadNew::whereIn('club_id', $clubs_id)->orWhere('manager_id', $manager->id)->get();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $channels = Channel::get();
        $lead_types = LeadType::get();
        $entry_points = EntryPoint::get();
        $lead_statuses = LeadStatus::get();
        $managers = Manager::get();
        $levels = Level::get();
        $requests = RequestDictionary::get();
        $offers = OfferDictionary::get();
        return view('managers/leads/create', compact(
            'channels',
            'lead_types',
            'entry_points',
            'lead_statuses',
            'managers',
            'levels',
            'requests',
            'offers'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lead = new LeadNew();
        $lead->fill($request->all());
        if ($request->manager_id == null)
        {
            $club = Club::find($request->club_id);
            $lead->manager_id = $club->manager->id;
        }
        $lead->birthday = \Carbon\Carbon::parse($request->birthday);
        $lead->save();

        $log = new LeadLog();
        $log->lead_id = $lead->id;
        $log->user_id = Auth::user()->id;
        $log->created = date('Y-m-d H:i:s');
        $log->save();

        $notification = new Notification();
        $notification->user_id = Auth::user()->id;
        $notification->type = 'lead';
        $notification->title = 'Менеджер '.Auth::user()->name.' добавил лида - '.$lead->name1;
        $notification->link = '/crm/leads/'.$lead->id.'/edit';
        $notification->save();

        return redirect('/manager/crm/leads/'.$lead->id.'/edit')->with('success', 'Запись добавлена.');
    }

    // OLD
//    public function store(Request $request)
//    {
//        $lead = new Lead();
//        $lead->fill($request->all());
//        if ($request->manager_id == null)
//        {
//            $club = Club::find($request->club_id);
//            $lead->manager_id = $club->manager->id;
//        }
//        $lead->save();
//
//        $log = new LeadLog();
//        $log->lead_id = $lead->id;
//        $log->user_id = Auth::user()->id;
//        $log->created = date('Y-m-d H:i:s');
//        $log->save();
//
//        $notification = new Notification();
//        $notification->user_id = Auth::user()->id;
//        $notification->type = 'lead';
//        $notification->title = 'Менеджер '.Auth::user()->name.' добавил лида - '.$lead->name;
//        $notification->link = '/crm/leads/'.$lead->id.'/edit';
//        $notification->save();
//
//        return redirect('/manager/crm/leads/'.$lead->id.'/edit')->with('success', 'Запись добавлена.');
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lead = LeadNew::find($id);
        $channels = Channel::get();
        $lead_types = LeadType::get();
        $entry_points = EntryPoint::get();
        $lead_statuses = LeadStatus::get();
        $clubs = Club::with('groups')->get();
        $trainings = Training::latest()->limit(10)->get();
        $managers = Manager::get();

        $statuses = TaskStatus::get();
        $tasks = ManagerTask::where('lead_id', $lead->id)->get();
        $tasktags  = TaskTag::get();
        $levels = Level::get();
        $requests = RequestDictionary::get();
        $offers = OfferDictionary::get();

        return view('managers/leads/edit', compact(
            'clubs',
            'trainings',
            'lead', 'managers',
            'channels',
            'lead_types',
            'entry_points',
            'lead_statuses', 'statuses', 'tasks', 'tasktags',
            'levels',
            'requests',
            'offers'
        ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lead = LeadNew::find($request->id);
        $lead->fill($request->all());
        $lead->birthday = \Carbon\Carbon::parse($request->birthday);
        $lead->update();

        $notification = new Notification();
        $notification->user_id = Auth::user()->id;
        $notification->type = 'lead';
        $notification->title = 'Менеджер '.Auth::user()->name.' обновил лида - '.$lead->name;
        $notification->link = '/crm/leads/'.$lead->id.'/edit';
        $notification->save();

        return redirect('/manager/crm/leads/'.$lead->id.'/edit')->with('success', 'Запись изменена.');
    }

    public function lead_comment_create(Request $request)
    {
        $comment = new LeadComment();
        $comment->fill($request->all());
        $comment->save();

        return back()->with('success', 'Запись добавлена.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
