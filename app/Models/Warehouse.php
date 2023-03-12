<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'code', 'phone', 'city', 'address', 'email',
    ];

    public function getRules() : array
    {
        return [
            'name' => ['required', 'string'],
            'code' => ['required', 'unique:warehouses,code,'.request()->id],
            'phone' => ['nullable'],
            'city' => ['nullable'],
            'address' => ['nullable'],
            'email' => ['nullable'],
        ];
    }

    public function users()
    {
        return $this->belongsToMany(UseR::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity', 'receipt'])->withTimestamps();
    }
}
