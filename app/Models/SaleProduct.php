<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    use HasFactory;

    protected $table = 'sale_products';


    protected $fillable = [
        'sale_id',
        'product_id',
        'product_name',
        'sale_price',
        'buy_price_price',
        'sale_quantity',
        'total_price',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
