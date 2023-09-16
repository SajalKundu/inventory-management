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
        'note',
        'total_amount',
        'total_sub_amount',
        'total_paid',
        'total_due',
        'discount_amount',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
