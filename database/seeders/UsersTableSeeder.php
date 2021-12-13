<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [ 'name' => 'Admin', 'active' => 1, 'email' => 'admin@email.net', 'password' => bcrypt('password')],
            [ 'name' => 'manager', 'active' => 1, 'email' => 'manager@email.net', 'password' => bcrypt('password') ],
            [ 'name' => 'parent', 'active' => 1, 'email' => 'parent@email.net', 'password' => bcrypt('password') ],
        ]);
        \App\Models\User::factory(10)->create();
    }
}
