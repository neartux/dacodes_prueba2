<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            ['name' => 'rdzul', 'email' => 'near31_3112@hotmail.com', 'password' => '$2y$10$yMjRPsJU7hPtysmir555bu3k0vxs3yTvVNMkbACiIUGKbXiGcyyqa'],
        ];

        DB::table('users')->insert($user);
    }
}
