<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $fillable = [
        'height',
        'product_id',
        'width',
        'thumb_url_list',
        'url_list'
    ];

    public function getRules()
    {
        return [
            'height' => ['required', 'integer', 'min:1'],
            'product_id' => ['required', 'integer', 'min:1','exists:products,id'],
            'width' => ['required', 'integer', 'min:1'],
            'thumb_url_list' => ['required', 'string'],
            'url_list' => ['required', 'string'],
        ];
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
