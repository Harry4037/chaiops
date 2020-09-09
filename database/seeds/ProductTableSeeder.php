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
                'name' => 'Drinking Chocolate(200ml)',
                'description' => 'Thik and delicious hot chocolates',
                'img' => NULL,
                'price' => 156,
                'type' => '100ml',
                'is_active' => 1,
                'is_morning' => 1,
                'is_afternoon' => 0,
                'is_cookie' => 0,
                'is_flavour' => 0,
            ],
                [
                'category_id' => 1,
                'name' => 'Khulad Chai(200ml)',
                'description' => 'Our special Saffron Masala Chai',
                'img' => NULL,
                'price' => 110,
                'type' => '100ml',
                'is_active' => 1,
                'is_morning' => 1,
                'is_afternoon' => 0,
                'is_cookie' => 0,
                'is_flavour' => 0,
            ],
                [
                'category_id' => 2,
                'name' => 'Khulfi Shake(350ml)',
                'description' => 'The freshness of Kulfi served',
                'img' => NULL,
                'price' => 194,
                'type' => '100ml',
                'is_active' => 1,
                'is_morning' => 1,
                'is_afternoon' => 0,
                'is_cookie' => 0,
                'is_flavour' => 0,
            ],
                [
                'category_id' => 2,
                'name' => 'Chocolate Shake(350ml)',
                'description' => 'A Ultimate bliss for all the chocolate',
                'img' => NULL,
                'price' => 188,
                'type' => '100ml',
                'is_active' => 1,
                'is_morning' => 0,
                'is_afternoon' => 1,
                'is_cookie' => 0,
                'is_flavour' => 0,
            ],
                [
                'category_id' => 3,
                'name' => 'Peach Iced Tea',
                'description' => 'Peach flavoured ice Tea to refresh your mood',
                'img' => NULL,
                'price' => 173,
                'type' => '100ml',
                'is_active' => 1,
                'is_morning' => 0,
                'is_afternoon' => 0,
                'is_cookie' => 1,
                'is_flavour' => 0,
            ],
                [
                'category_id' => 3,
                'name' => 'Aam Panna Iced Tea',
                'description' => 'Goodness of mangoes with freshness of Iced Tea',
                'img' => NULL,
                'price' => 167,
                'type' => '100ml',
                'is_active' => 1,
                'is_morning' => 0,
                'is_afternoon' => 0,
                'is_cookie' => 1,
                'is_flavour' => 0,
            ],
                [
                'category_id' => 4,
                'name' => 'Veg Tikka Platter',
                'description' => 'Assorted Sabudana Tikki & Kebabs',
                'img' => NULL,
                'price' => 209,
                'type' => '100ml',
                'is_active' => 1,
                'is_morning' => 0,
                'is_afternoon' => 0,
                'is_cookie' => 0,
                'is_flavour' => 1,
            ],
        ]);
    }

}
