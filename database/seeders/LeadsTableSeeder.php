<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class LeadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lead_types')->insert([
            ['name' => 'Заявка на пробную тренировку'],
            ['name' => 'Обратный звонок'],
            ['name' => 'Заявка на вступление в тренерский состав'],
        ]);
        DB::table('lead_statuses')->insert([
            ['color' => 'red', 'name' => 'Новый'],
            ['color' => 'blue', 'name' => 'В работе'],
            ['color' => 'green', 'name' => 'Выполнен'],
        ]);
        DB::table('channels')->insert([
            ['name' => 'Таргет'],
            ['name' => 'Контекст'],
        ]);
        DB::table('entry_points')->insert([
            [ 'name' => 'Mango'],
            [ 'name' => 'Direct']
        ]);
        DB::table('client_types')->insert([
            [ 'name' => 'Отец'],
            [ 'name' => 'Мать']
        ]);
    }
}
