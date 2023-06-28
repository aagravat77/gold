<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_pay_id',
        'card_num',
        'cvv',
        'date_card',
        'year',
        'amount',
        'date',



    ];
    public $table = 'payment';
    public $primarykey = 'p_id';
    public $incrementing = true;
    // public $timestamps = false;
    // public $directory="./image/";  
    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    } 
}
