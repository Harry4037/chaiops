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
                'name' => 'Drinking Chocolate',
                'description' => 'Thik and delicious hot chocolates',
                'img' => NULL,
                'is_active' => 1,
            ],
                [
                'category_id' => 1,
                'name' => 'Khulad Chai',
                'description' => 'Our special Saffron Masala Chai',
                'img' => NULL,
                'is_active' => 1,
            ],
                [
                'category_id' => 2,
                'name' => 'Khulfi Shake',
                'description' => 'The freshness of Kulfi served',
                'img' => NULL,
                'is_active' => 1,
            ],
                [
                'category_id' => 2,
                'name' => 'Chocolate Shake',
                'description' => 'A Ultimate bliss for all the chocolate',
                'img' => NULL,
                'is_active' => 1,
            ],
                [
                'category_id' => 3,
                'name' => 'Peach Iced Tea',
                'description' => 'Peach flavoured ice Tea to refresh your mood',
                'img' => NULL,
                'is_active' => 1,
            ],
                [
                'category_id' => 3,
                'name' => 'Aam Panna Iced Tea',
                'description' => 'Goodness of mangoes with freshness of Iced Tea',
                'img' => NULL,
                'is_active' => 1,
            ],
                [
                'category_id' => 4,
                'name' => 'Veg Tikka Platter',
                'description' => 'Assorted Sabudana Tikki & Kebabs',
                'img' => NULL,
                'is_active' => 1,
            ],
        ]);
    }

}
