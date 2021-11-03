<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    public function transfer()
    {
        return $this->hasMany(Transfer::class, 'receiver_method_id', 'id');
        return $this->hasMany(Transfer::class, 'sender_method_id', 'id');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'payment_method_id', 'id');
    }
}
