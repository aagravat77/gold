<?php

namespace App\Exports;

use App\Models\order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExportOrder implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return order::all();
    }

    public function headings(): array
    {
        return [
            'Party_id',
            'Item_id',
            'Item_name',
            'Item_price',
            'Item_quantity',
            'Item_weight',
            'Item_image',
            'Date',
            'Status',


        ];
    }
}
