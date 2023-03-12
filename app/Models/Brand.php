<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];
    
    public function getRules() : array
    {
        return [
            'name' => ['required', 'string'],
            'slug' => ['required', 'string'],
        ];
    }
    public function products(){
        return $this->hasMany(Product::class,'brand_id','id');
    }
}
