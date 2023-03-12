<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'slug',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function getRules()
    {
        return [
            'name' => ['required', 'string'],
            'slug' => ['required', 'string', 'unique:categories,slug,'.request()->id],
            'parent_id' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'boolean'],
        ];
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }

    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('childCategories');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

}
