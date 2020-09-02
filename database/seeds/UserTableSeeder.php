<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
                [
                'name' => 'Admin',
                'email' => 'admin@chaiops.com',
                'password' => bcrypt(123456),
                'user_role_id' => 1,
            ],
               [
               'name' => 'User',
               'email' => 'user@mail.com',
               'password' => bcrypt(123456),
               'user_role_id' => 2,
           ],
        ]);
    }

}
