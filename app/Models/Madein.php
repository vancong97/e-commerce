<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Madein extends Model
{
    protected $table = 'madeins';

    protected $fillable = [
        'name',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
