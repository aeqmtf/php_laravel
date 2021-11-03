<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'product_category_id',
        'price',
        'stock',
        'stock_defective',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function received()
    {
        return $this->hasMany(ReceivedProduct::class, 'product_id', 'id');
    }

    public function sold()
    {
        return $this->hasMany(SoldProduct::class, 'product_id', 'id');
    }
}
