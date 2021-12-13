<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\LeadStatus;
class LeadController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'phone' => 'required|string|max:20',
            'age'   => 'nullable|numeric|min:0'
        ]);
        $data = $request->all();
        if(session()->has('rek')){
            $data = array_merge($data, session('rek'));
            session()->forget('rek');
        }
        $status = LeadStatus::first();
        $data['lead_status_id'] = $status->id;
        $lead = Lead::create($data);
    }
}
