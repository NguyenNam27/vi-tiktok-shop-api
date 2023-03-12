<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_method_id',
        'discount',
        'coupon',
        'status',
        'total_product',
        'total_price',
        'ship_method_id',
        'customer_id',
        'staff_id',
    ];
    public function getRules()
    {
        return [
            'payment_method_id' => ['required', 'integer', 'min:1','exists:payment_methods,id'],
            'discount' => ['nullable', 'string'],
            'coupon' => ['nullable', 'string'],
            'status' => ['required', 'string'],
            'total_product' => ['required', 'integer', 'min:1'],
            'total_price' => ['required', 'integer', 'min:1'],
            'ship_method_id' => ['required', 'integer', 'min:1','exists:ship_methods,id'],
            'staff_id' => ['required', 'integer', 'min:0','exists:users,id'],
            'customer_id' => ['required', 'integer', 'min:1','exists:users,id'],
        ];
    }
    public function orderDtails(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class,'payment_method_id');
    }
    public function shipMethod(){
        return $this->belongsTo(ShipMethod::class);
    }
    public function customer(){
        return $this->belongsTo(User::class,'customer_id');
    }
    public function staff(){
        return $this->belongsTo(User::class,'staff_id');
    }

}
