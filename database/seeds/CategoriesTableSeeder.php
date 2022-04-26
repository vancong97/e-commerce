<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Factory;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 1;
        for ($i=0; $i < $limit; $i++) {
            DB::table('categories')->insert([
                'name' => $faker->name,
                'description' => $faker->text,
                'parent_id' => $faker->randomDigit,
            ]);
        }
    }
}
