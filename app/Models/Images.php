<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Images extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'url',
        'name',
        'w',
        'h',
        'ext',
    ];

    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_images', 'image_id', 'product_id');
    }
}