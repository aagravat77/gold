<?php

namespace App\Exports;

use App\Models\Party_model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExportParty implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Party_model::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Party_id',
            'Party_name',
            'date',
            'Bis_license_image',
            'Address',
            'Party_logo',
            'Status',

        ];
    }
}
