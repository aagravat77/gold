<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'party_id',
        'item_id',
        'item_name',
        'item_price',
        'item_quantity',
        'item_weight',
        'item_image',
    ];
    public $table = 'order';
    public $primarykey = 'item_id';
    public $incrementing = true;
    public $timestamps = false;
    // public $directory="./image/";  
    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    }  
}
