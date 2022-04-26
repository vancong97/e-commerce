<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();
        $data = [
            [
                'name' => 'View Admin',
                'slug' => 'view-admin',
            ],
            [
                'name' => 'View Users',
                'slug' => 'view-users',
            ],
            [
                'name' => 'Add User',
                'slug' => 'add-user',
            ],
            [
                'name' => 'Edit User',
                'slug' => 'edit-user',
            ],
            [
                'name' => 'Remove User',
                'slug' => 'remove-user',
            ],
            [
                'name' => 'View Categories',
                'slug' => 'view-categories',
            ],
            [
                'name' => 'Add Category',
                'slug' => 'add-category',
            ],
            [
                'name' => 'Edit Category',
                'slug' => 'edit-category',
            ],
            [
                'name' => 'Remove Category',
                'slug' => 'remove-category',
            ],
        ];
        foreach ($data as $item) {
            Permission::create($item);
        }
    }
}
