<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'image',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
