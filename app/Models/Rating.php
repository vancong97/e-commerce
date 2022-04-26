<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    protected  $fillable = [
        'product_id',
        'user_id',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product0()
    {
        return $this->belongsTo(Product::class);
    }
}
