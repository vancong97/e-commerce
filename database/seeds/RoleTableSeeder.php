<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        $data = [
            [
                'name' => 'admin',
                'slug' => 'admin',
            ],
            [
                'name' => 'manager',
                'slug' => 'manager',
            ],
            [
                'name' => 'staff',
                'slug' => 'staff',
            ],
            [
                'name' => 'user',
                'slug' => 'user',
            ],
        ];
        foreach ($data as $item) {
            Role::create($item);
        }
    }
}
