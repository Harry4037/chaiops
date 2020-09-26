<?php

use Illuminate\Database\Seeder;

class ProductTypeTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('product_types')->insert([
                [
                'product_id' => 1,
                'price' => 100,
                'type' => '100ml',
         
            ],
                [
                'product_id' => 2,
                'price' => 200,
                'type' => '300ml',
               
            ],
                [
                'product_id' => 3,
                'price' => 300,
                'type' => '500ml',
            ],
                [
                'product_id' => 4,
                'price' => 188,
                'type' => '200ml',
            ],
                [
                'product_id' => 5,
                'price' => 273,
                'type' => '400ml',
            ],
                [
                'product_id' => 6,
                'price' => 167,
                'type' => '100ml',
            ],
                [
                'product_id' => 7,
                'price' => 209,
                'type' => '1Pc',
            ],
        ]);
    }

}
