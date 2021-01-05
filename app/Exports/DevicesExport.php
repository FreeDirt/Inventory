<?php

namespace App\Exports;

use App\Device;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DevicesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Device::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'deviceCode',
            'brand_id',
            'category_id',
            'user_id',
            'country_id',
            'name',
            'model_no',
            'model_year',
            'cost',
            'created_at',
            'updated_at',
        ];
    }
}