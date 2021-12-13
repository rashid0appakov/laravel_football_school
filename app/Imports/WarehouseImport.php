<?php

namespace App\Imports;

use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Cell;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\ToArray;

class WarehouseImport implements ToArray
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function array(array $rows)
    {
        foreach ($rows as $row) {
            $this->data[] = array(
                'name' => $row[1],
                'price_one' => $row[2],
                'count' => $row[3],
                'manufacturer' => $row[4],
                'color' => $row[5],
            );
        }


        foreach ($this->data as $warehous)
        {
            $warehouse = new Warehouse();
            $warehouse->name = $warehous['name'];
            $warehouse->club_id = 1;
            $warehouse->save();
        }
        return $this->data;
    }

//    public function model(Cell $row)
//    {
//
//        return new Warehouse([
//            'name' => $row['name'] ?? $row['price_one'] ?? $row['count'] ?? null,
////           'name'     => $row["name"],
////           'price_one'    => $row["price_one"],
////           'count' => $row["count"],
////           'manufacturer' => $row["manufacturer"],
////           'color' => $row["color"],
////           'link' => $row["link"],
////           'full_price' => $row["full_price"],
//        'club_id' => 1,
//        ]);
//    }
}
