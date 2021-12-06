<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function receivedProducts():HasMany
    {
        return $this->hasMany(ReceivedProduct::class, 'product_id', 'id');
    }

    public function soldProducts():HasMany
    {
        return $this->hasMany(SoldProduct::class, 'product_id', 'id');
    }

    public function images():BelongsToMany
    {
        return $this->belongsToMany(Images::class, 'product_images', 'product_id', 'image_id');
    }
    public function getImages():\IteratorAggregate
    {
        return $this->roles;
    }
}