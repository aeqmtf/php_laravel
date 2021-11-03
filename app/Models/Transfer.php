<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sender_method_id',
        'receiver_method_id',
        'sender_amount',
        'received_amount',
        'reference',
    ];

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'receiver_method_id', 'id');
        return $this->belongsTo(PaymentMethod::class, 'sender_method_id', 'id');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'transfer_id', 'id');
    }
}
