<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $fillable = ['value', 'attribute_id'];

    public function getRules()
    {
        return [
            'value' => ['required', 'string'],
            'attribute_id' => ['required', 'integer', 'min:0'],
        ];
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
    public function products(){
        return $this->hasMany(Product::class,'attribute_values','id');
    }
}
