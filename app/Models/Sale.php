<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = [
        'invoice_id',
        'customer_id',
        'invoice_create_date',
        'customer_name',
        'customer_mobile',
        'customer_address',
        'grand_total_amount',
        'advanced_amount',
        'due_amount',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function saleProducts()
    {
        return $this->hasMany(SaleProduct::class);
    }


}
