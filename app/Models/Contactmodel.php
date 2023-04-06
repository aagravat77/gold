<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactmodel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'message',
    ];
    public $table = 'contactmodel';
    public $primarykey = 'id';
    public $incrementing = true;
    // public $timestamps = false;
    // public $directory="./image/";  
    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    }  
}
