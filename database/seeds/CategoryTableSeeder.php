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
                'description' => 'MILK CHAI',
                'image_name' => 'coffee-cup.png',
                'is_active' => 1,
            ],
                [
                'description' => 'SHAKES',
                'image_name' => 'coffee-cup.png',
                'is_active' => 1,
            ],
                [
                'description' => 'ICE TEAS',
                'image_name' => 'coffee-cup.png',
                'is_active' => 1,
            ],
                [
                'description' => 'CHAAT',
                'image_name' => 'coffee-cup.png',
                'is_active' => 1,
            ],
        ]);
    }

}
