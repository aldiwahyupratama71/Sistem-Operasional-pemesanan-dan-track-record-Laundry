<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'birth_date',
        'gender',
        'member',
        'point',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}