<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
class CRMController extends BaseController
{
    public function index(){
        $leads = Lead::latest()->paginate(25);
        return view('managers.leads.index', compact('leads'));
    }
}
