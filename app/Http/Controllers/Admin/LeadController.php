<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminTask;
use App\Models\AvailableDay;
use App\Models\Channel;
use App\Models\Club;
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
use App\Models\OfferDictionary;
use App\Models\RequestDictionary;
use App\Models\TaskStatus;
use App\Models\TaskTag;
use App\Models\Trainer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LeadController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = LeadNew::get();
        $lead_statuses = LeadStatus::get();
        $entry_points = EntryPoint::get();
        $channels = Channel::get();
        $managers = Manager::get();

        return view('/admin/leads/index', compact(
            'leads',
            'lead_statuses',
            'entry_points',
            'channels',
            'managers',
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
        return view('admin/leads/create', compact(
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
        $lead->manager_id = null;
        $lead->save();

        $log = new LeadLog();
        $log->lead_id = $lead->id;
        $log->user_id = Auth::user()->id;
        $log->created = date('Y-m-d H:i:s');
        $log->save();

        return redirect('/admin/crm/leads/'.$lead->id.'/edit')->with('success', 'Запись добавлена.');
    }

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
        $managers = Manager::get();

        $statuses = TaskStatus::get();
        $tasks = AdminTask::where('lead_id', $lead->id)->get();
        $tasktags  = TaskTag::get();
        $levels = Level::get();
        $requests = RequestDictionary::get();
        $offers = OfferDictionary::get();

        return view('admin/leads/edit', compact(
            'lead',
            'channels',
            'lead_types',
            'entry_points',
            'lead_statuses',
            'managers', 'statuses', 'tasks', 'tasktags',
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

        return redirect('/admin/crm/leads/'.$lead->id.'/edit')->with('success', 'Запись изменена.');
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
