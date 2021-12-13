<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{
    public function index()
    {
        return view('parents/index');
    }

    public function children()
    {
        $children = Child::where('parent_id', Auth::user()->parent->id)->get();
        return view('parents/children/index', compact('children'));
    }
}
