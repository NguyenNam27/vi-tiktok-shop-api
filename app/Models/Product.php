<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'category_id',
        'brand_id',
        'video',
        'attribute_id',
        'attribute_values_id',
        'warranty_period',
        'warranty_policy',
        'price',
        'price_purchase',
        'slug',
        'skus',
    ];

    public function getRules()
    {
        return [
            'name' => ['required', 'string'],
            'slug' => ['string', 'unique:products,slug,'.request()->id],
            'category_id' =>  ['required', 'integer', 'min:1','exists:categories,id'],
            'parent_id' =>  ['required', 'integer', 'min:1','exists:products,id'],
            'brand_id' =>  ['required', 'integer', 'min:1','exists:brands,id'],
            'video' =>  ['nullable', 'string', 'min:1'],
            'attribute_id' =>  ['required', 'integer', 'min:1','exists:attributes,id'],
            'attribute_values_id' =>  ['required', 'integer', 'min:1','exists:attribute_values,id'],
            'warranty_period' =>  ['nullable', 'integer', 'min:1'],
            'warranty_policy' =>  ['nullable', 'integer', 'min:1'],
            'price' =>  ['required', 'min:1'],
            'price_purchase' =>  ['required', 'min:1'],
            'skus' =>  ['required', 'string'],
        ];
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function attribute(){
        return $this->belongsTo(Attribute::class,'attribute_id');
    }
    public function attributeValues(){
        return $this->belongsTo(AttributeValue::class,'attribute_values_id');
    }
    public function images(){
        return $this->hasMany(Images::class,'product_id','id');
    }
    public function orderDetails(){
        return $this->belongsToMany(OrderDetail::class,'order_details','order_id ','product_id ');
    }
    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class)->withPivot(['quantity', 'receipt'])->withTimestamps();
    }



}
