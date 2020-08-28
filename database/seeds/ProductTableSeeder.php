<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('products')->insert([
                [
                'category_id' => 1,
                'name' => 'Brandy Coffee',
                'description' => 'Brandy Coffee',
                'img' => NULL,
                'price' => 100,
                'type' => '100ml',
                'is_active' => 1,
            ],
                [
                    'category_id' => 1,
                    'name' => 'Cafe Mendoza',
                    'description' => 'Cafe Mendoza',
                    'img' => NULL,
                    'price' => 200,
                    'type' => '100ml',
                    'is_active' => 1,
            ],
                [
                    'category_id' => 1,
                    'name' => 'Calypso Coffee',
                    'description' => 'Calypso Coffee',
                    'img' => NULL,
                    'price' => 300,
                    'type' => '100ml',
                    'is_active' => 1,
            ],
        ]);
    }

}
