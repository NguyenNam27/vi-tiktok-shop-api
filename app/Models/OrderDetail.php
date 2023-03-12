<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
        'status',
        'ship_status',
    ];
    public function getRules()
    {
        return [
            'order_id' => ['required', 'integer', 'min:1','exists:orders,id'],
            'product_id' => ['required', 'integer','exists:products,id'],
            'price' => ['required', 'integer'],
            'quantity' => ['required', 'integer', 'min:1'],
            'status' => ['required', 'integer', 'min:0'],
            'ship_status' => ['required', 'integer', 'min:1'],
        ];
    }
    public function products(){
        return $this->belongsTo(Product::class);
    }
}
