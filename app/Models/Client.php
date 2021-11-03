<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'document_type',
        'docunent_id',
        'name',
        'email',
        'phone',
        'last_purchase',
        'total_purchase',
        'total_paid',
        'balance',
    ];
}
