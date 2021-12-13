<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Club;
use App\Models\Child;
use App\Models\Aboniment;
use Illuminate\Http\Request;

class AbonementsController extends Controller
{
    public function index()
    {
        $areas = Area::get();
        $clubs = Club::get();
        return view('parents/abonements/index', compact('areas', 'clubs'));
    }
    public function pay(Request $request, Child $child, Aboniment $aboniment){
        dd($request->all());
    }
}
