<?php

namespace App\Exports;

use App\Models\Contactmodel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExportContact implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contactmodel::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Email',
            'Message',
        ];
    }
}
