<?php

namespace App\Imports;

use App\Device;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DevicesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Device([
            'id' => $row['id'],
            'deviceCode' => $row['deviceCode'],
            'brand_id' => $row['brand_id'],
            'category_id' => $row['category_id'],
            'user_id' => $row['user_id'],
            'country_id' => $row['country_id'],
            'name' => $row['name'],
            'model_no' => $row['model_no'],
            'model_year' => $row['model_year'],
            'cost' => $row['cost'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
        ]);
    }
}