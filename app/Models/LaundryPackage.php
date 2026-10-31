<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaundryPackage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'unit',
        'estimated_days',
        'description',
        'is_active',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}