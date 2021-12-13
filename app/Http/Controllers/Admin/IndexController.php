<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminTask;
use App\Models\Channel;
use App\Models\Child;
use App\Models\ClientType;
use App\Models\EntryPoint;
use App\Models\Lead;
use App\Models\LeadStatus;
use App\Models\LeadType;
use App\Models\Manager;
use App\Models\ParentChild;
use App\Models\Position;
use App\Models\Product;
use App\Models\ProductPurchase;
use App\Models\Spec;
use App\Models\Task;
use App\Models\TaskTag;
use App\Models\Trainer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function index()
    {
        $trainers = Trainer::take(10)->get();
        $parents = ParentChild::take(10)->get();
        $children = Child::take(10)->get();
        $managers = Manager::get();
        $tasks = AdminTask::take(10)->get();
        $products = Product::take(10)->get();
        $purchases = ProductPurchase::take(10)->get();
        $dayLeads = Lead::whereDate('created_at', \Carbon\Carbon::now())->get();
        $weekLeads = Lead::whereBetween('created_at', [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()])->get();
        $monthLeads = Lead::whereMonth('created_at', Carbon::now()->format('m'))->get();
        return view('admin/index', compact(
            'trainers', 'parents',
            'children', 'managers', 'tasks',
            'products', 'dayLeads', 'weekLeads', 'monthLeads',
            'purchases'
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
        $tags = TaskTag::get();
        $positions = Position::get();
        return view('admin/dictionaries/index', compact(
            'lead_statuses', 'lead_types',
            'spec', 'client_types', 'entry_points', 'channels',
            'tags', 'positions'
        ));
    }

    public function search(Request $request)
        {
            $searchPerson = [];
            $search = $request->search;

            $searchPerson['managers'] = Manager::where('name', 'like', "%$search%")
                ->whereOr('surname', 'like', "%$search%")
                ->whereOr('patronymic', 'like', "%$search%")
                ->get();

            $searchPerson['trainer'] = Trainer::where('name', 'like', "%$search%")
                ->whereOr('surname', 'like', "%$search%")
                ->whereOr('patronymic', 'like', "%$search%")
                ->get();

            $searchPerson['client'] = User::where('name', 'like', "%$search%")
                ->whereOr('surname', 'like', "%$search%")
                ->whereOr('patronymic', 'like', "%$search%")
                ->get();


            return view('/admin/search/index', compact("searchPerson"));
        }

//    public function searchResult()
//    {
//        $searchPersen = [];
//        $search = $request->search;
//        $searchPersen['managers'] = Manager::whereLike('name', $search)
//            ->whereLike('surname', $search)
//            ->whereLike('patronymic', $search);
//
//        $searchPersen['trainer'] = Trainer::whereLike('name', $search)
//            ->whereLike('surname', $search)
//            ->whereLike('patronymic', $search);
//
//        $searchPersen['client'] = ParentChild::whereLike('name', $search)
//            ->whereLike('surname', $search)
//            ->whereLike('patronymic', $search);
//
//        return view('admin/dictionaries/index', compact('searchPersen'));
//    }
}
