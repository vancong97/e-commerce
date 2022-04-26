<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'status',
        'description',
        'category_id',
        'rating',
        'properties',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function madein()
    {
        return $this->belongsTo(Madein::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
}
