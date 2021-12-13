<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'Администратор'],
            ['name' => 'Менеджер'],
            ['name' => 'Родитель'],
            ['name' => 'Тренер'],
        ]);
        DB::table('permissions')->insert([
            [ 'name' => 'view-user', 'slug' => 'Просмотр пользователей' ],
            [ 'name' => 'create-user', 'slug' => 'Добавление пользователей' ],
            [ 'name' => 'update-user', 'slug' => 'Изменение пользователей' ],
            [ 'name' => 'delete-user', 'slug' => 'Удаление пользователей' ],
        ]);
        
        DB::table('users_roles')->insert([
            [
                'user_id' => 1,
                'role_id' => 1,
            ],
            [
                'user_id' => 2,
                'role_id' => 2,
            ],
            [
                'user_id' => 3,
                'role_id' => 3,
            ],
        ]);
    }
}
