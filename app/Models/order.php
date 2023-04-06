<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'item name',
        'item price',
        'item quantity',
        'party name',
        'date',
        'address',
    ];
    public $table = 'order';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    // public $directory="./image/";  
    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    }  
}
