<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'party_id ',
        'party_name',
        'date',
        'bis_license_image',
        'address',
        'party_logo',
        'status',

    ];
    public $table = 'party';
    public $primarykey = 'party_id';
    // public $incrementing = true;
    public $timestamps = false;
    // public $directory="./image/";  
    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    }  
}
