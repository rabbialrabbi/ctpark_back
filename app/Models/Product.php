<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'SKU',
        'price',
        'image',
        'stock_quantity',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'categories_product','product_id','category_id');
    }
}
