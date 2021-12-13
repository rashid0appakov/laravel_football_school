<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\ParentChild;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChildrenController extends BaseController
{
    public function store(Request $request)
    {
        if ($request->level_id == null)
        {
            return back()->withErrors(['Укажите уровень ребенка']);
        }
        $child = new Child();
        $child->fill($request->all());
        $child->birthday = \Carbon\Carbon::parse($request->birthday);
        $child->age = Carbon::parse($request->birthday)->age;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/users/children/avatars';
            $uplaod = $file->move($path,$fileName);
            $child->image = $fileName;
        } else {
            $child->image = "avatar.png";
        }
        $child->save();

        return redirect('/manager/crm/clients/'.$request->parent_id.'/edit')->with('success', 'Запись добавлена.');
    }

    public function update(Request $request)
    {
        if ($request->level_id == null)
        {
            return back()->withErrors(['Укажите уровень ребенка']);
        }
        $child = Child::find($request->id);
        $child->fill($request->all());
        $child->birthday = \Carbon\Carbon::parse($request->birthday);
        $child->age = Carbon::parse($request->birthday)->age;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/users/children/avatars';
            $uplaod = $file->move($path,$fileName);
            $child->image = $fileName;
        }
        $child->update();

        return redirect('/manager/crm/clients/'.$request->parent_id.'/edit')->with('success', 'Запись изменена.');
    }
}
