<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'name',
        'details',
        'image',
        'image_path',
        'price',
        'available_quantity',
        'sold_quantity',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function productStocks()
    {
        return $this->hasMany(ProductStock::class, 'product_id');
    }
}
