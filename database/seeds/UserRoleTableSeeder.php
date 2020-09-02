<?php

use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $count = \DB::table('user_roles')->count();
        if ($count == 0) {
            $roles = [
                    [
                    'name' => 'Admin',
                ],
                    [
                    'name' => 'User',
                ]
            ];

            DB::table('user_roles')->insert($roles);
        }
    }

}
