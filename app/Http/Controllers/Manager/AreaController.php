<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Club;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AreaController extends BaseController
{
    public function index()
    {
        $areas = Area::get();
        return view('managers/areas/index', compact('areas'));
    }

    public function show($area_id)
    {
        $area = Area::find($area_id);
        return view('managers/areas/create', compact('area'));
    }

    public function create()
    {
        return view('managers/areas/create');
    }

    public function edit($area_id)
    {
        $area = Area::find($area_id);
        return view('managers/areas/edit', compact('area'));
    }

    public function store(Request $request)
    {
        $area = new Area();
        $area->fill($request->all());
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/areas';
            $uplaod = $file->move($path,$fileName);
            $area->image = $fileName;
        }
        $area->save();
        return view('managers/areas/edit', compact('area'));
    }


    public function update(Request $request)
    {
        $area = Area::find($request->area_id);
        $area->fill($request->all());
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/areas';
            $uplaod = $file->move($path,$fileName);
            $area->image = $fileName;
        }
        $area->update();
        return view('managers/areas/edit', compact('area'));
    }


    public function destroy(Area $area)
    {
        $area->delete();
        return redirect('/managers/areas');
    }


}
