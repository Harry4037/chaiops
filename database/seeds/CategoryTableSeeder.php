<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('categories')->insert([
                [
                'description' => 'Special Menu',
                'image_name' => 'http://127.0.0.1:8000/assets/images/coffee-cup.png',
                'is_active' => 1,
            ],
        ]);
    }

}
