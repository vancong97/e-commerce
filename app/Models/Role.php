<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    protected $table = 'roles';
    protected $dates = ['deleted_at']; 

    protected $fillable = [
        'name',
        'slug',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions() 
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
}
