<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Imports\WarehouseImport;
use App\Models\Area;
use App\Models\Club;
use App\Models\Manager;
use App\Models\Trainer;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WarehouseController extends BaseController
{
    public function create($club_id)
    {
        return view('managers/warehouses/create', compact('club_id'));
    }

    public function store(Request $request)
    {
        $warehouse = new Warehouse();
        $warehouse->fill($request->all());
        $warehouse->save();
        return redirect('manager/warehouses/edit/'.$warehouse->id)->with('success', 'Запись добавлдена.');
    }

    public function edit($warehouse_id)
    {
        $warehouse = Warehouse::find($warehouse_id);
        return view('managers/warehouses/edit', compact('warehouse'))->with('success', 'Запись изменена.');
    }

    public function update(Request $request)
    {
        $warehouse = Warehouse::find($request->id);
        $warehouse->fill($request->all());
        $warehouse->update();
        return redirect('manager/warehouses/edit/'.$warehouse->id)->with('success', 'Запись изменена.');
    }

    public function import(Request $request)
    {
        $result = Excel::import(new WarehouseImport, request()->file('excel_file'));
        return redirect('managers/clubs/edit/'.$request->club_id)->with('success', 'Импорт выполнен.');
    }

    public function delete(Request $request)
    {
        $warehouse = Warehouse::find($request->id);
        $warehouse->delete();
        return redirect('/manager/clubs/'.$request->club_id.'/edit');
    }
}
