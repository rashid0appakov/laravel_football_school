<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('posts')->truncate();
        DB::table('lead_types')->truncate();
        DB::table('lead_statuses')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(LeadsTableSeeder::class);
        $this->call(PostsTableSeeder::class);

        DB::table('positions')->insert([
            [ 'name' => 'Должность 1'],
            [ 'name' => 'Должность 2'],
            [ 'name' => 'Должность 3']
        ]);

        DB::table('request_dictionaries')->insert([
            [ 'name' => 'Запрос 1'],
            [ 'name' => 'Запрос 2'],
            [ 'name' => 'Запрос 3']
        ]);

        DB::table('offer_dictionaries')->insert([
            [ 'name' => 'Предложение 1'],
            [ 'name' => 'Предложение 2'],
            [ 'name' => 'Предложение 3']
        ]);

        DB::table('task_statuses')->insert([
            [ 'name' => 'Активна'],
            [ 'name' => 'Поставлена'],
            [ 'name' => 'Отменена'],
            [ 'name' => 'Выполнена'],
        ]);
        DB::table('trainers')->insert([
            [
                'user_id' => 4,
                'name' => 'Илья',
                'surname' => 'Илья',
                'patronymic' => 'Ильин',
                'phone' => '79999999999',
                'image' => 'avatar.png',
            ],
            [
                'user_id' => 5,
                'name' => 'Василий',
                'surname' => 'Василий',
                'patronymic' => 'Васильевич',
                'phone' => '73333333333',
                'image' => 'avatar.png',
            ],
            [
                'user_id' => 6,
                'name' => 'Ивано',
                'surname' => 'Иван',
                'patronymic' => 'Ивавнович',
                'phone' => '744444444444',
                'image' => 'avatar.png',
            ],
        ]);
        DB::table('users_roles')->insert([
            [
                'role_id' => 4, 'user_id' => 4,
            ],
            [
                'role_id' => 4, 'user_id' => 5,
            ],
            [
                'role_id' => 4, 'user_id' => 6,
            ],

        ]);
        DB::table('levels')->insert([
            [ 'name' => 'Любители'],
            [ 'name' => 'ДЮСШ']
        ]);
        DB::table('task_tags')->insert([
            [ 'name' => 'В работе', 'color' => '#2196f3', 'position' => 1],
            [ 'name' => 'Важно', 'color' => '#ffa000', 'position' => 2],
            [ 'name' => 'На обработке', 'color' => '#0097a7', 'position' => 3],
            [ 'name' => 'Завершена', 'color' => '#7cb342', 'position' => 4],
            [ 'name' => 'Срочно', 'color' => '#e53935', 'position' => 5],
        ]);
        DB::table('crm_statuses')->insert([
            [ 'name' => 'привлечение'],
            [ 'name' => 'клиент'],
            [ 'name' => 'отскочил'],
        ]);
        DB::table('specs')->insert([
            [ 'name' => 'Полевые игроки'],
            [ 'name' => 'Вратари']
        ]);
        DB::table('managers')->insert([
            [
                'user_id' => 1,
                'name' => 'Александр',
                'image' => 'avatar.png',
                'phone' => '+7 (999) 677-42-20',
                'whatsapp' => '+7(967)243-60-98',
                'telegramm' => '+7(967)243-60-98',
                'city_number' =>  '4993223067',
                'position_id' => 1,
                'club_id' => 1,
                'info' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки'
            ],
            [
                'user_id' => 2,
                'name' => 'Светлана',
                'image' => 'avatar.png',
                'phone' => '+7 (999) 677-42-20',
                'whatsapp' => '+7 (999) 677-42-20',
                'telegramm' => '+7 (999) 677-42-20',
                'city_number' =>  '4951206006',
                'position_id' => 1,
                'club_id' => 2,
                'info' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки'
            ],
            [
                'user_id' => 3,
                'name' => 'Андрей',
                'image' => 'avatar.png',
                'phone' => '+7 (985) 753-60-06',
                'whatsapp' => '+7 (985) 753-60-06',
                'telegramm' => '+7 (985) 753-60-06',
                'city_number' =>  '4951206006',
                'position_id' => 1,
                'club_id' => 3,
                'info' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки'
            ],

        ]);

        DB::table('areas')->insert([
            [
                'name' => 'Футбольный манеж "Европа"',
                'image' => 'pole.jpg',
                'address' => 'Футбольный манеж "Европа"',
                'description' => 'Метро "Киевская"',
                'mini_map' => '',
                'size' => '50х25',
                'coating' => 'Искусственный газон',
                'capacity' => '60',
                'rent_price' => '5000 руб./час',
                'manager_id' => 2,
                'email' => 'nikita@email.com',
                'phone' => '+7 (234) 543 48 11',
            ],
            [
                'name' => 'Спорткомплекс МИРЭА"',
                'image' => 'pole.jpg',
                'address' => 'Проспект Вернадского, 78с5"',
                'description' => 'Метро "Юго-Западная"',
                'mini_map' => '',
                'size' => '40х30м',
                'coating' => 'Каучук',
                'capacity' => '90',
                'rent_price' => '3500 руб/час',
                'manager_id' => 2,
                'email' => 'marina@email.com',
                'phone' => '+7 (965) 366 60 79',
            ],
            [
                'name' => 'Футбольный манеж CitySport на Лобачевского',
                'image' => 'pole.jpg',
                'address' => 'Лобачевского, 114',
                'description' => 'Метро "Мичуринский проспект"',
                'mini_map' => '',
                'size' => '50х80м',
                'coating' => 'Каучук',
                'capacity' => '70',
                'rent_price' => '2500 руб/час',
                'manager_id' => 2,
                'email' => 'viktor@email.com',
                'phone' => '+7 (965) 277 33 98',
            ],
        ]);

        DB::table('clubs')->insert([
            [
                'name' => 'Флагман',
                'image' => 'placeholder.jpg',
                'description' => 'Флагманский клуб сети школ "Школа мяча"',
                'manager_id' => 1,
                'area_id' => 1,
                'display_main_page' => 1
            ],
            [
                'name' => 'Вершина',
                'image' => 'placeholder.jpg',
                'description' => 'Это реальный клуб!',
                'manager_id' => 2,
                'area_id' => 2,
                'display_main_page' => 1
            ],
            [
                'name' => 'Гладиатор',
                'image' => 'placeholder.jpg',
                'description' => 'Метро "Мичуринский проспект"',
                'manager_id' => 3,
                'area_id' => 3,
                'display_main_page' => 1
            ],
        ]);

        DB::table('club_trainers')->insert([
            [
                'club_id' => 1,
                'trainer_id' => 1
            ],
            [
                'club_id' => 1,
                'trainer_id' => 2
            ],
            [
                'club_id' => 2,
                'trainer_id' => 2
            ],
            [
                'club_id' => 2,
                'trainer_id' => 3
            ],
            [
                'club_id' => 3,
                'trainer_id' => 3
            ],
        ]);

        DB::table('tasks')->insert([
            [
                'user_id' => 1,
                'status_id' => 1,
                'title' => "Задачая 1",
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt",
                'deadline' => "2021-07-08 22:46:00",
            ],
            [
                'user_id' => 1,
                'status_id' => 2,
                'title' => "Задачая 2",
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt",
                'deadline' => "2021-07-08 22:46:00",
            ],
            [
                'user_id' => 1,
                'status_id' => 3,
                'title' => "Задачая 3",
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt",
                'deadline' => "2021-07-08 22:46:00",
            ],
            [
                'user_id' => 2,
                'status_id' => 1,
                'title' => "Задачая 1",
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt",
                'deadline' => "2021-07-08 22:46:00",
            ],
            [
                'user_id' => 2,
                'status_id' => 1,
                'title' => "Задачая 1",
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt",
                'deadline' => "2021-07-08 22:46:00",
            ],
            [
                'user_id' => 3,
                'status_id' => 1,
                'title' => "Задачая 1",
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt",
                'deadline' => "2021-07-08 22:46:00",
            ],
        ]);

        DB::table('groups')->insert([
            [
                'name' => "Первая группа",
                'club_id' => 1,
                'spec_id' => 1,
                'level_id' => 1,
                'age_start' => 5,
                'age_end' => 8,
                'area_on_group' => 1000,
                'available' => 1,
                'individual_training' => 1,

            ],
            [
                'name' => "Вторая группа",
                'club_id' => 2,
                'spec_id' => 2,
                'level_id' => 2,
                'age_start' => 7,
                'age_end' => 12,
                'area_on_group' => 1500,
                'available' => 0,
                'individual_training' => 1,

            ],
            [
                'name' => "Третья группа",
                'club_id' => 3,
                'spec_id' => 1,
                'level_id' => 2,
                'age_start' => 8,
                'age_end' => 18,
                'area_on_group' => 2500,
                'available' => 0,
                'individual_training' => 0,

            ],
        ]);

        DB::table('aboniments')->insert([
            [
                'name' => "Абонимент 1",
                'hide_for_new' => 1
            ],
            [
                'name' => "Абонимент 1",
                'hide_for_new' => 0
            ],
            [
                'name' => "Абонимент 1",
                'hide_for_new' => 1
            ],
        ]);

        DB::table('abonement_workouts')->insert([
            [
                'abonement_id' => 1,
                'number_workouts' => 5,
                'price_workouts' => 2500,
                'number_freezing' => 3,
            ],
            [
                'abonement_id' => 2,
                'number_workouts' => 15,
                'price_workouts' => 1500,
                'number_freezing' => 5,
            ],
            [
                'abonement_id' => 3,
                'number_workouts' => 15,
                'price_workouts' => 25500,
                'number_freezing' => 8,
            ],
        ]);

        DB::table('aboniment_groups')->insert([
            [
                'group_id' => 1,
                'aboniment_id' => 1
            ],
            [
                'group_id' => 1,
                'aboniment_id' => 2
            ],
            [
                'group_id' => 1,
                'aboniment_id' => 3
            ],
            [
                'group_id' => 2,
                'aboniment_id' => 2
            ],
            [
                'group_id' => 2,
                'aboniment_id' => 3
            ],
            [
                'group_id' => 3,
                'aboniment_id' => 3
            ],

        ]);

        DB::table('available_days')->insert([
            [
                'day_name' => "Понедельник",
                'alias' => "d1",
            ],
            [

                'day_name' => "Вторник",
                'alias' => "d2",
            ],
            [
                'day_name' => "Среда",
                'alias' => "d3",
            ],
            [
                'day_name' => "Четверг",
                'alias' => "d4",
            ],
            [
                'day_name' => "Пятница",
                'alias' => "d5",
            ],
            [
                'day_name' => "Суббота",
                'alias' => "d6",
            ],
            [
                'day_name' => "Воскресенье",
                'alias' => "d7",
            ],
        ]);

        DB::table('group_products')->insert([
            [
                'name' => "Категория 1",
            ],
            [
                'name' => "Категория 2",
            ],
            [
                'name' => "Категория 3",
            ],
            [
                'name' => "Категория 4",
            ],
        ]);
        DB::table('delivery_methods')->insert([
            [
                'name' => "Вариант 1 (6-18 дней) - Бесплатно",
            ],
            [
                'name' => "Вариант 2 (3-5 дней) - 700р",
            ],
        ]);
        DB::table('payment_methods')->insert([
            [
                'name' => "visa",
                'icon' => "/payment-icon/Visa.png"
            ],
            [
                'name' => "paypal",
                'icon' => "/payment-icon/PayPal.png"
            ],
        ]);
        DB::table('products')->insert([
            [
                'name' => "Мяч",
                'group_product_id' => 1,
                'price' => 1000,
                'cost_price' => 800,
                'description' => '
                    Lorem Ipsum - это текст-"рыба", часто используемый в
                    печати и вэб-дизайне. Lorem Ipsum является стандартной
                    "рыбой" для текстов на латинице с начала XVI века. В то
                    время некий безымянный печатник создал большую коллекцию
                    размеров и форм шрифтов, используя Lorem Ipsum для распечатки
                    образцовой вёрстки
                ',
                'image' => '1626503296.jpg',
                'uuid' => '1283767',
            ],
            [
                'name' => "Футболка",
                'group_product_id' => 2,
                'price' => 1500,
                'cost_price' => 1200,
                'description' => '
                    Lorem Ipsum - это текст-"рыба", часто используемый в
                    печати и вэб-дизайне. Lorem Ipsum является стандартной
                    "рыбой" для текстов на латинице с начала XVI века. В то
                    время некий безымянный печатник создал большую коллекцию
                    размеров и форм шрифтов, используя Lorem Ipsum для распечатки
                    образцовой вёрстки
                ',
                'image' => '1626503296.jpg',
                'uuid' => '12333767',
            ],

            [
                'name' => "Бутсы",
                'group_product_id' => 3,
                'price' => 2500,
                'cost_price' => 2200,
                'description' => '
                    Lorem Ipsum - это текст-"рыба", часто используемый в
                    печати и вэб-дизайне. Lorem Ipsum является стандартной
                    "рыбой" для текстов на латинице с начала XVI века. В то
                    время некий безымянный печатник создал большую коллекцию
                    размеров и форм шрифтов, используя Lorem Ipsum для распечатки
                    образцовой вёрстки
                ',
                'image' => '1626503296.jpg',
                'uuid' => '121233767',
            ],
        ]);


    }
}
