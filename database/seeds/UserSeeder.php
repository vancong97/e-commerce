<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $data = [
            [
                'name' => 'admin',
                'email' => 'congdv@toto.com',
                'phone' => '0353567890',
                'role_id' => 1,
                'password' => bcrypt('123456'), 
                'address' => 'Ha Noi',
            ],
            [
                'name' => 'nguyen van A',
                'email' => 'nguyenvanA@toto.com',
                'phone' => '0353567890',
                'role_id' => 2,
                'password' => bcrypt('123456'), 
                'address' => 'Ha Noi',
            ],
            [
                'name' => 'nguyen van A',
                'email' => 'nguyenvanB@toto.com',
                'phone' => '0353567890',
                'role_id' => 3,
                'password' => bcrypt('123456'), 
                'address' => 'Ha Noi',
            ],
            [
                'name' => 'nguyen van C',
                'email' => 'nguyenvanC@toto.com',
                'phone' => '0353567890',
                'role_id' => 4,
                'password' => bcrypt('123456'), 
                'address' => 'Ha Noi',
            ],
        ];
        foreach ($data as $item) {
            User::create($item);
        }
    }
}
