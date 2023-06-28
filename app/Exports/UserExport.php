<?php

namespace App\Exports;

use App\Models\User;
use App\Models\User as ModelsUser;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(User::getAllUser());
        // return User::all();
    }
    public function headings():array{
        return [
            'Id',
            'Name',
            'Number',
            'Email',
            'Password',
            'Role',
            'Status',
        ];
    }
}
