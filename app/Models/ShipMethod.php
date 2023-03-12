<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipMethod extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function getRules() : array
    {
        return [
            'name' => ['required','string']
        ];
    }
    public function orders(){
        return $this->hasMany(Order::class,'ship_method ','id');
    }
}
