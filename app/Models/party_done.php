<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class party_done extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_done_id',
        'karat',
        'gold',
        'other',
        'tax',
        'total',
        'date_done',



    ];
    public $table = 'party_done';
    public $primarykey = 'done_id';
    public $incrementing = true;
    // public $timestamps = false;
    // public $directory="./image/";  
    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    } 
}
