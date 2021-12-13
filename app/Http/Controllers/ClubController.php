<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Club;
use App\Models\coment;
use App\Models\Abon;
class ClubController extends Controller
{
    public function index(){
        $clubs = Club::with('groups')->get();
        if(Request::ajax()) return $clubs;
        return view('clubs.index', compact('clubs'));
    }
    public function show(Club $club){
        return view('clubs.show', compact('club'));
    }
    public function groups(Club $club){
        return $club->groups;
    }
    public function comments(Request $request, Club $club){
        $Coment = new coment();
        $Coment->fill($request->all());
        $Coment->nom = $request->nom;
        $Coment->comment = $request->comment;
        $Coment->save();
        return redirect()->back();
    }
     public function RequestAbon(Request $request, Club $club){
        $abon = new Abon();
        $abon->fill($request->all());
        $abon->name = $request->name;
        $abon->secondName = $request->secondName;
        $abon->number= $request->number;
        $abon->email = $request->email;
        $abon->save();
        return redirect()->back();
    }
}
