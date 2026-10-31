<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice',
        'customer_id',
        'laundry_package_id',
        'weight',
        'price',
        'total_price',
        'status',
        'payment_status',
        'entry_date',
        'finish_date',
        'notes',
    ];

    protected static function booted()
    {
        static::creating(function ($transaction) {

            $transaction->invoice =
                'INV-' . date('Ymd') . '-' . strtoupper(uniqid());

            $transaction->total_price =
                $transaction->weight * $transaction->price;
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function laundryPackage()
    {
        return $this->belongsTo(LaundryPackage::class);
    }
}