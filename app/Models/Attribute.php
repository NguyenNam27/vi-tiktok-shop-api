<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

    public function getRules() : array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'code' => ['required', 'string', 'unique:attributes,code,'.request()->id],
            'values' => ['nullable', 'array'],
        ];
    }

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class,'attribute_id','id');
    }
    public function product(){
        return $this->hasMany(Product::class,'attributes','id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
