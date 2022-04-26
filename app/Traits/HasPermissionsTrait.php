<?php

namespace App\Traits;

use App\Models\Permission;

trait HasPermissionsTrait
{
    public function permissions()
    {
        return $this->role->belongsToMany(Permission::class);
    }

    public function hasPermission($permission)
    {
        return (bool)$this->permissions->where('slug', $permission->slug)->count();
    }

    public function hasPermissionBySlug($slug)
    {
        return (bool)$this->permissions->where('slug', $slug)->count();
    }
}
?>
