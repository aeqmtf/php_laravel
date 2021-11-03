<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'paymentinfo',
        'email',
        'phone',
    ];

    public function receipt()
    {
        return $this->hasMany(Receipt::class, 'provider_id', 'id');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'provider_id', 'id');
    }
}
