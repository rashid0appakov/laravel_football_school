<?php

use Illuminate\Support\Facades\Route;

Route::get('/rek/{url}/{tel}/{own}/{ch}/{pl}/', function($url = false, $tel = false, $own = false, $ch = false, $pl = false){
    $rek = [
        'url' => explode('_', $url)[1],
        'tel' => explode('_', $tel)[1],
        'own' => explode('_', $own)[1],
        'ch' => explode('_', $ch)[1],
        'pl' => explode('_', $pl)[1],
    ];
    session(['rek' => $rek]);
    return redirect()->route('home');
});
Auth::routes();
Route::post('/users/parents/store', [App\Http\Controllers\UserController::class, 'store_parent'])->name('parents.store');
Route::post('/sms/{number}', [App\Http\Controllers\MangoController::class, 'sms']);
Route::post('/call/{number}', [App\Http\Controllers\MangoController::class, 'call']);
Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

Route::post('ckeditor/upload', [App\Http\Controllers\CKEditorController::class, 'upload'])->name('ckeditor.image-upload');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/mango', [App\Http\Controllers\HomeController::class, 'mango'])->name('mango');

Route::group([
    'prefix' => 'trainer',
    'middleware' => 'auth',
    'as' => 'trainer.'
], function(){
    Route::get('/', [App\Http\Controllers\Trainer\IndexController::class, 'show'])->name('trainer.show');
    Route::get('/{id}/edit', [App\Http\Controllers\Trainer\TrainersController::class, 'edit'])->name('trainer.edit');
    Route::post('/update', [App\Http\Controllers\Trainer\TrainersController::class, 'update'])->name('trainer.update');

    Route::get('/tasks', [App\Http\Controllers\Trainer\TaskController::class, 'index']);
    Route::get('/task/{id}', [App\Http\Controllers\Trainer\TaskController::class, 'showTask']);

    Route::get('/trainings', [App\Http\Controllers\Trainer\TrainingController::class, 'index']);
    Route::get('/trainings/{training}', [App\Http\Controllers\Trainer\TrainingController::class, 'show'])->name('trainings.show');
    Route::put('/trainings/{training}', [App\Http\Controllers\Trainer\TrainingController::class, 'update'])->name('trainings.update');
    Route::post('/trainings/{training}/accept', [App\Http\Controllers\Trainer\TrainingController::class, 'accept'])->name('trainings.accept');
    Route::post('/trainings/{training}/cancel', [App\Http\Controllers\Trainer\TrainingController::class, 'cancel'])->name('trainings.cancel');
});

Route::group([
    'prefix' => 'manager',
    'middleware' => 'auth',
    'as' => 'manager.'
], function(){

    Route::get('/', [App\Http\Controllers\Manager\IndexController::class, 'edit_profile'])->name('edit_profile');

    Route::get('/edit-profile', [App\Http\Controllers\Manager\IndexController::class, 'edit_profile']);
    Route::post('/update-profile', [App\Http\Controllers\Manager\IndexController::class, 'update_profile']);

    Route::resources([
        '/areas' => App\Http\Controllers\Manager\AreaController::class
    ]);

    Route::get('/trainers/create-task/{trainer_id}', [App\Http\Controllers\Manager\TrainertaskController::class, 'createTasks'])->name('createTasks');
    Route::get('/trainers/tasks/edit/{id}', [App\Http\Controllers\Manager\TaskController::class, 'editTask'])->name('showTask');
    Route::get('/trainers/tasks/{trainer_id}', [App\Http\Controllers\Manager\TrainertaskController::class, 'index']);
    Route::post('/trainers/task-store', [App\Http\Controllers\Manager\TrainertaskController::class, 'task_store']);

    Route::get('/tasks', [App\Http\Controllers\Manager\TaskController::class, 'index']);
    Route::get('/tasks/{date}', [App\Http\Controllers\Manager\TaskController::class, 'showTasksByDate'])->name('showMyTask');
    Route::get('/task/{id}', [App\Http\Controllers\Manager\TaskController::class, 'showTask']);
    Route::get('/task/edit/{id}', [App\Http\Controllers\Manager\TaskController::class, 'editTask']);
    Route::post('/task/store', [App\Http\Controllers\Manager\TaskController::class, 'storeTask']);
    Route::post('/task/update', [App\Http\Controllers\Manager\TaskController::class, 'updateTask']);
    Route::post('/tasks/filter/all_filter_club', [App\Http\Controllers\Manager\TaskController::class, 'filter_club']);
    Route::post('/tasks/filter/tag', [App\Http\Controllers\Manager\TaskController::class, 'filter_tag']);
    Route::post('/tasks/filter-date-range', [App\Http\Controllers\Manager\TaskController::class, 'filter_date_range']);
    Route::post('/tasks/filter/when', [App\Http\Controllers\Manager\TaskController::class, 'filter_when']);

    Route::get('/trainer/tasks', [App\Http\Controllers\Manager\TrainertaskController::class, 'index']);
    Route::get('/trainer/tasks/{date}', [App\Http\Controllers\Manager\TrainertaskController::class, 'showTasksByDate'])->name('showTrainerTask');
    Route::get('/trainer/task/{id}', [App\Http\Controllers\Manager\TrainertaskController::class, 'showTask']);
    Route::get('/trainer/task/edit/{id}', [App\Http\Controllers\Manager\TrainertaskController::class, 'editTask']);
    Route::post('/trainer/task/store', [App\Http\Controllers\Manager\TrainertaskController::class, 'storeTask']);
    Route::post('/trainer/task/update', [App\Http\Controllers\Manager\TrainertaskController::class, 'updateTask']);
    Route::post('/tasks/trainer/filter-date-range', [App\Http\Controllers\Manager\TaskController::class, 'trainer_filter_date_range']);
    Route::post('/tasks/trainer/club', [App\Http\Controllers\Manager\TaskController::class, 'trainer_filter_club']);
    Route::post('/tasks/trainer/tag', [App\Http\Controllers\Manager\TaskController::class, 'trainer_filter_tag']);
    Route::post('/tasks/trainer/filter-when', [App\Http\Controllers\Manager\TaskController::class, 'trainer_filter_when']);

    Route::get('/warehouses/create/{club_id}', [App\Http\Controllers\Manager\WarehouseController::class, 'create']);
    Route::post('/warehouses/store', [App\Http\Controllers\Manager\WarehouseController::class, 'store']);
    Route::get('/warehouses/edit/{warehouse_id}', [App\Http\Controllers\Manager\WarehouseController::class, 'edit']);
    Route::post('/warehouses/update', [App\Http\Controllers\Manager\WarehouseController::class, 'update']);
    Route::post('/warehouses/delete', [App\Http\Controllers\Manager\WarehouseController::class, 'delete']);
    Route::post('/warehouses/import', [App\Http\Controllers\Manager\WarehouseController::class, 'import']);

    Route::get('/crm/zayavki', [App\Http\Controllers\Manager\CRMController::class, 'index']);
    Route::get('/crm/create-client/{lead_id}', [App\Http\Controllers\Manager\ClientController::class, 'create_client']);
    Route::get('/trainings/{training}/checkUsers', [App\Http\Controllers\Manager\TrainingController::class, 'checkUsers'])->name('trainings.checkUsers');
    Route::get('/trainings/getData', [App\Http\Controllers\Manager\TrainingController::class, 'getData']);
    Route::delete('/trainings/destoryMany', [App\Http\Controllers\Manager\TrainingController::class, 'destoryMany'])->name('trainings.destroyMany');
    Route::post('/crm/leads/{lead}/temp_users', [App\Http\Controllers\Manager\LeadController::class, 'temp_users'])->name('temp_users.store');
    Route::get('/groups/{group}/trainings', [App\Http\Controllers\Manager\GroupsController::class, 'trainings']);
    Route::resources([
        '/crm/clients' => App\Http\Controllers\Manager\ClientController::class,
        '/clubs' => App\Http\Controllers\Manager\ClubController::class,
        'aboniments' => App\Http\Controllers\Manager\AbonimentController::class,
        'groups' => App\Http\Controllers\Manager\GroupsController::class,
        'trainers' => App\Http\Controllers\Manager\TrainersController::class,
        'workouts' => App\Http\Controllers\Manager\WorkoutsController::class,
        '/crm/leads' => App\Http\Controllers\Manager\LeadController::class,
        '/crm/clients' => App\Http\Controllers\Manager\ClientController::class,
        '/crm/children' => App\Http\Controllers\Manager\ChildrenController::class,
        'trainings' => App\Http\Controllers\Manager\TrainingController::class,
    ]);

    Route::post('/crm/clients/create-from-lead', [App\Http\Controllers\Manager\ClientController::class, 'create_from_lead']);


    Route::post('/crm/leads/lead_comment/store', [App\Http\Controllers\Manager\LeadController::class, 'lead_comment_create'])->name('lead_comment.store');
    Route::get('/crm/leads/client-create/{lead_id}', [App\Http\Controllers\Manager\ClientController::class, 'client_create']);
    Route::get('/crm/leads/client-delete/{lead_id}', [App\Http\Controllers\Manager\ClientController::class, 'client_delete']);
    Route::post('/crm/leads/filter/status', [App\Http\Controllers\Manager\ClientController::class, 'status_filter']);
    Route::post('/crm/leads/filter/start-date', [App\Http\Controllers\Manager\ClientController::class, 'start_date']);
    Route::post('/crm/leads/filter/entry-point', [App\Http\Controllers\Manager\ClientController::class, 'entry_point']);
    Route::post('/crm/leads/filter/channel', [App\Http\Controllers\Manager\ClientController::class, 'channel']);
    Route::post('/crm/leads/filter/manager', [App\Http\Controllers\Manager\ClientController::class, 'manager']);
    Route::post('/crm/leads/filter/club', [App\Http\Controllers\Manager\ClientController::class, 'clubs_filter']);
    Route::get('/crm/leads/filter/my', [App\Http\Controllers\Manager\ClientController::class, 'my_filter']);
    Route::post('/crm/leads/filter/when', [App\Http\Controllers\Manager\ClientController::class, 'when_filter']);
    Route::post('/crm/leads/filter/date-range', [App\Http\Controllers\Manager\ClientController::class, 'date_range']);
    Route::post('/crm/leads/filter/tasks-date', [App\Http\Controllers\Manager\ClientController::class, 'tasks_date']);

    Route::post('/crm/client/filter/type', [App\Http\Controllers\Manager\ClientController::class, 'type']);
    Route::post('/crm/clients/filter/start-date', [App\Http\Controllers\Manager\ClientController::class, 'start_date_client']);
    Route::post('/crm/clients/filter/entry-point-client', [App\Http\Controllers\Manager\ClientController::class, 'entry_point_client']);
    Route::post('/crm/leads/filter/child-exist', [App\Http\Controllers\Manager\ClientController::class, 'child_exist']);
    Route::post('/crm/leads/filter/workout-balance', [App\Http\Controllers\Manager\ClientController::class, 'workout_balance']);

    Route::get('/crm/dictionaries', [App\Http\Controllers\Manager\IndexController::class, 'dictionaries'])->name('dictionaries');
    Route::post('/crm/dictionary/lead_status/edit/{lead_status_id}', [App\Http\Controllers\Manager\DictionaryController::class, 'edit_lead_status'])->name('edit_lead_status');
    Route::post('/crm/dictionary/lead_status/create', [App\Http\Controllers\Manager\DictionaryController::class, 'create_lead_status'])->name('create_lead_status');
    Route::get('/crm/dictionaries/delete-lead-status/{id}', [App\Http\Controllers\Manager\DictionaryController::class, 'delete_lead_status'])->name('delete_lead_status');

    Route::post('/crm/dictionary/lead_types/edit/{lead_status_id}', [App\Http\Controllers\Manager\DictionaryController::class, 'edit_lead_type'])->name('edit_lead_type');
    Route::post('/crm/dictionary/lead_types/create', [App\Http\Controllers\Manager\DictionaryController::class, 'create_lead_type'])->name('create_lead_type');
    Route::get('/crm/dictionaries/delete-lead-type/{id}', [App\Http\Controllers\Manager\DictionaryController::class, 'delete_lead_type'])->name('delete_lead_type');

    Route::post('/crm/dictionary/spec/edit/{spec_id}', [App\Http\Controllers\Manager\DictionaryController::class, 'edit_spec'])->name('edit_spec');
    Route::post('/crm/dictionary/spec/create', [App\Http\Controllers\Manager\DictionaryController::class, 'create_spec'])->name('create_spec');
    Route::get('/crm/dictionaries/delete-spec/{id}', [App\Http\Controllers\Manager\DictionaryController::class, 'delete_spec'])->name('delete_spec');

    Route::post('/crm/dictionary/channels/edit/{spec_id}', [App\Http\Controllers\Manager\DictionaryController::class, 'edit_channel'])->name('edit_channel');
    Route::post('/crm/dictionary/channels/create', [App\Http\Controllers\Manager\DictionaryController::class, 'create_channel'])->name('create_channel');
    Route::get('/crm/dictionaries/delete-channels/{id}', [App\Http\Controllers\Manager\DictionaryController::class, 'delete_channel'])->name('delete_channel');

    Route::post('/crm/dictionary/entry-point/edit/{spec_id}', [App\Http\Controllers\Manager\DictionaryController::class, 'edit_entry_point'])->name('edit_entry_point');
    Route::post('/crm/dictionary/entry-point/create', [App\Http\Controllers\Manager\DictionaryController::class, 'create_entry_point'])->name('create_entry_point');
    Route::get('/crm/dictionaries/delete-entry-point/{id}', [App\Http\Controllers\Manager\DictionaryController::class, 'delete_entry_point'])->name('delete_entry_point');




    Route::get('/workouts/delete/{id}', [App\Http\Controllers\Manager\WorkoutsController::class, 'delete']);

    Route::get('/trainingday/delete/{id}', [App\Http\Controllers\Manager\AbonimentController::class, 'delete_day_training']);
    Route::post('/abonements/daytraining/create-day-training', [App\Http\Controllers\Manager\AbonimentController::class, 'create_day_training']);
    Route::post('/trainingday/delete/{training_day_id}', [App\Http\Controllers\Manager\AbonimentController::class, 'delete_day_training']);
    Route::post('/trainingday/update', [App\Http\Controllers\Manager\AbonimentController::class, 'update_day_training']);
});

Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');
Route::get('/trainings/{age}', [App\Http\Controllers\HomeController::class, 'trainings'])->name('trainings')->where(['age' => '3-4|5-7|8-10|11-12|13-16']);
Route::get('/championship', [App\Http\Controllers\HomeController::class, 'championship'])->name('championship');
Route::resource('/posts', App\Http\Controllers\PostController::class)->only(['index', 'show']);
Route::get('/clubs/{club}/groups', [App\Http\Controllers\ClubController::class, 'groups']);
Route::get('/groups/{group}/abonements', [App\Http\Controllers\GroupController::class, 'abonements']);
Route::get('/groups/{group}/trainings', [App\Http\Controllers\GroupController::class, 'trainings']);
Route::resource('/clubs', App\Http\Controllers\ClubController::class, [ 'names' => 'clubs'])->only(['index', 'show']);
Route::post('/leads', [App\Http\Controllers\LeadController::class, 'store'])->name('leads.store');
Route::get('/clubs', [App\Http\Controllers\ClubController::class, 'index'])->name('clubs.index');
Route::get('/clubs/{club}', [App\Http\Controllers\ClubController::class, 'show'])->name('clubs.show');

Route::resource('/admin/news', App\Http\Controllers\NewsController::class);
Route::post('/admin/news', [App\Http\Controllers\NewsController::class,'store']);
Route::get('/admin/clubs', [App\Http\Controllers\Manager\ClubController::class, 'index'])->name('club.index');





    Route::group([
        'prefix' => 'admin',
        'middleware' => 'auth',
        'as' => 'admin.'
    ], function(){
    Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'managers'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\Admin\IndexController::class, 'index']);
    Route::post('/search', [App\Http\Controllers\Admin\IndexController::class, 'search']);
    //Route::get('/search/result', [App\Http\Controllers\Admin\IndexController::class, 'searchResult']);

    Route::get('/users/managers', [App\Http\Controllers\Admin\UserController::class, 'managers'])->name('managers');
    Route::get('/users/manager/create', [App\Http\Controllers\Admin\UserController::class, 'managerCreate'])->name('manager.create');
    Route::get('/users/managers/show-manager/{id}', [App\Http\Controllers\Admin\UserController::class, 'showManager'])->name('manager.show');
    Route::get('/users/managers/delete-manager/{id}', [App\Http\Controllers\Admin\UserController::class, 'deleteManager'])->name('manager.delete');
    Route::get('/users/manager-edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'managerEdit'])->name('manager.edit');
    Route::post('/users/manager/store-manager', [App\Http\Controllers\Admin\UserController::class, 'storeManager'])->name('manager.store');
    Route::post('/users/manager/update-manager', [App\Http\Controllers\Admin\UserController::class, 'updateManager'])->name('manager.update');
    Route::post('/users/manager/reassignment', [App\Http\Controllers\Admin\UserController::class, 'reassignmentManager'])->name('manager.reassignment');

    Route::get('/manager/task/task-edit/{task_id}', [App\Http\Controllers\Admin\TaskController::class, 'editTask'])->name('task.edit');
    Route::get('/manager/task/{task_id}', [App\Http\Controllers\Admin\TaskController::class, 'showTask'])->name('task.show');
    Route::get('/manager/create-task/{manager_id}', [App\Http\Controllers\Admin\TaskController::class, 'createTask'])->name('task.create');
    Route::post('/manager/store-task', [App\Http\Controllers\Admin\TaskController::class, 'storeTask'])->name('task.store');
    Route::post('/manager/update-task', [App\Http\Controllers\Admin\TaskController::class, 'updateTask'])->name('task.update');

    Route::get('/users/trainers', [App\Http\Controllers\Admin\UserController::class, 'trainers'])->name('trainers');
    Route::get('/users/parents', [App\Http\Controllers\Admin\UserController::class, 'parents'])->name('parents');
    Route::get('/users/children', [App\Http\Controllers\Admin\UserController::class, 'children'])->name('children');
    Route::get('/children', [App\Http\Controllers\Admin\ChildrenController::class, 'index']);

    Route::get('/trainers/delete-trainers/{trainer_id}', [App\Http\Controllers\Admin\TrainersController::class, 'deleteTrainer']);
    Route::get('/trainings/{training}/checkUsers', [App\Http\Controllers\Admin\TrainingController::class, 'checkUsers'])->name('trainings.checkUsers');
    Route::get('/trainings/getData', [App\Http\Controllers\Admin\TrainingController::class, 'getData']);
    Route::delete('/trainings/destoryMany', [App\Http\Controllers\Admin\TrainingController::class, 'destoryMany'])->name('trainings.destroyMany');
    Route::resources([
        '/crm/leads' => App\Http\Controllers\Admin\LeadController::class,
        '/crm/clients' => App\Http\Controllers\Admin\ClientController::class,
        '/crm/children' => App\Http\Controllers\Admin\ChildrenController::class,
        'trainings' => App\Http\Controllers\Admin\TrainingController::class,
    ]);

    Route::get('/tasks/my', [App\Http\Controllers\Admin\TaskController::class, 'myTasks'])->name('myTasks');
    Route::get('/tasks/all', [App\Http\Controllers\Admin\TaskController::class, 'allTasks'])->name('allTasks');
    Route::get('/tasks/my/{date}', [App\Http\Controllers\Admin\TaskController::class, 'myTasksByDate'])->name('myTasksByDate');
    Route::get('/tasks/all/{date}', [App\Http\Controllers\Admin\TaskController::class, 'allTasksByDate'])->name('allTasksByDate');
    Route::post('/tasks/my/myTaskStore', [App\Http\Controllers\Admin\TaskController::class, 'myTaskStore'])->name('myTaskStore');
    Route::post('/tasks/my/myTaskUpdate', [App\Http\Controllers\Admin\TaskController::class, 'myTaskUpdate'])->name('myTaskUpdate');
    Route::post('/task/get-admin-tasks-by-date', [App\Http\Controllers\Admin\TaskController::class, 'getAdminTasksByDate'])->name('getAdminTasksByDate');
    Route::post('/tasks/my/filter-date-range', [App\Http\Controllers\Admin\TaskController::class, 'my_filter_date_range'])->name('my_filter_date_range');
    Route::post('/tasks/all/filter-date-range', [App\Http\Controllers\Admin\TaskController::class, 'all_filter_date_range'])->name('all_filter_date_range');
    Route::post('/tasks/all/club', [App\Http\Controllers\Admin\TaskController::class, 'all_filter_club'])->name('all_filter_club');
    Route::post('/tasks/my/club', [App\Http\Controllers\Admin\TaskController::class, 'my_filter_club'])->name('my_filter_club');
    Route::post('/tasks/my/tag', [App\Http\Controllers\Admin\TaskController::class, 'my_filter_tag'])->name('my_filter_tag');
    Route::post('/tasks/all/tag', [App\Http\Controllers\Admin\TaskController::class, 'all_filter_tag'])->name('all_filter_tag');
    Route::post('/tasks/all/filter-when', [App\Http\Controllers\Admin\TaskController::class, 'all_filter_when'])->name('all_filter_when');
    Route::post('/tasks/my/filter-when', [App\Http\Controllers\Admin\TaskController::class, 'my_filter_when'])->name('my_filter_when');


    Route::get('/tasks/manager', [App\Http\Controllers\Admin\TaskController::class, 'managerTasks'])->name('managerTasks');
    Route::get('/tasks/manager/{date}', [App\Http\Controllers\Admin\TaskController::class, 'managerTasksByDate'])->name('managerTasksByDate');
    Route::post('/tasks/manager/managerTaskStore', [App\Http\Controllers\Admin\TaskController::class, 'managerTaskStore'])->name('managerTaskStore');
    Route::post('/tasks/manager/managerTaskUpdate', [App\Http\Controllers\Admin\TaskController::class, 'managerTaskUpdate'])->name('managerTaskUpdate');

    Route::get('/tasks/trainer', [App\Http\Controllers\Admin\TaskController::class, 'trainerTasks'])->name('trainerTasks');
    Route::get('/tasks/trainer/{date}', [App\Http\Controllers\Admin\TaskController::class, 'trainerTasksByDate'])->name('trainerTasksByDate');
    Route::post('/tasks/trainer/trainerTaskStore', [App\Http\Controllers\Admin\TaskController::class, 'trainerTaskStore'])->name('trainerTaskStore');
    Route::post('/tasks/trainer/trainerTaskUpdate', [App\Http\Controllers\Admin\TaskController::class, 'trainerTaskUpdate'])->name('trainerTaskUpdate');
        Route::post('/tasks/trainer/filter-date-range', [App\Http\Controllers\Admin\TaskController::class, 'trainer_filter_date_range']);
        Route::post('/tasks/manager/filter-date-range', [App\Http\Controllers\Admin\TaskController::class, 'manager_filter_date_range']);
        Route::post('/tasks/trainer/club', [App\Http\Controllers\Admin\TaskController::class, 'filter_club']);
        Route::post('/tasks/manager/club', [App\Http\Controllers\Admin\TaskController::class, 'manager_filter_club']);
        Route::post('/tasks/trainer/tag', [App\Http\Controllers\Admin\TaskController::class, 'trainer_filter_tag']);
        Route::post('/tasks/manager/tag', [App\Http\Controllers\Admin\TaskController::class, 'manager_filter_tag']);
        Route::post('/tasks/trainer/filter-when', [App\Http\Controllers\Admin\TaskController::class, 'trainer_filter_when']);
        Route::post('/tasks/manager/filter-when', [App\Http\Controllers\Admin\TaskController::class, 'manager_filter_when']);

    Route::get('/tasks/client', [App\Http\Controllers\Admin\TaskController::class, 'clientTasks'])->name('clientTasks');
    Route::get('/tasks/client/{date}', [App\Http\Controllers\Admin\TaskController::class, 'clientTasksByDate'])->name('clientTasksByDate');
    Route::post('/tasks/client/clientTaskStore', [App\Http\Controllers\Admin\TaskController::class, 'clientTaskStore'])->name('clientTaskStore');
    Route::post('/tasks/client/clientTaskUpdate', [App\Http\Controllers\Admin\TaskController::class, 'clientTaskUpdate'])->name('clientTaskUpdate');

    Route::post('/tasks/client/clientTaskStore', [App\Http\Controllers\Admin\TaskController::class, 'clientTaskStore'])->name('clientTaskStore');
    Route::post('/tasks/client/clientTaskUpdate', [App\Http\Controllers\Admin\TaskController::class, 'clientTaskUpdate'])->name('clientTaskUpdate');


    Route::get('/crm/leads/client-create/{lead_id}', [App\Http\Controllers\Admin\ClientController::class, 'client_create'])->name('client_create');
    Route::get('/crm/leads/client-delete/{lead_id}', [App\Http\Controllers\Admin\ClientController::class, 'client_delete'])->name('client_delete');
    Route::post('/crm/leads/filter/status', [App\Http\Controllers\Admin\ClientController::class, 'status_filter']);
    Route::post('/crm/leads/filter/start-date', [App\Http\Controllers\Admin\ClientController::class, 'start_date']);
    Route::post('/crm/leads/filter/entry-point', [App\Http\Controllers\Admin\ClientController::class, 'entry_point']);
    Route::post('/crm/leads/filter/channel', [App\Http\Controllers\Admin\ClientController::class, 'channel']);
    Route::post('/crm/leads/filter/manager', [App\Http\Controllers\Admin\ClientController::class, 'manager']);
    Route::post('/crm/leads/filter/club', [App\Http\Controllers\Admin\ClientController::class, 'clubs_filter']);
    Route::post('/crm/leads/filter/when', [App\Http\Controllers\Admin\ClientController::class, 'when_filter']);
    Route::post('/crm/leads/filter/date-range', [App\Http\Controllers\Admin\ClientController::class, 'date_range']);

    Route::post('/crm/client/filter/type', [App\Http\Controllers\Admin\ClientController::class, 'type']);
    Route::post('/crm/clients/filter/start-date', [App\Http\Controllers\Admin\ClientController::class, 'start_date_client']);
    Route::post('/crm/clients/filter/entry-point-client', [App\Http\Controllers\Admin\ClientController::class, 'entry_point_client']);
    Route::post('/crm/leads/filter/child-exist', [App\Http\Controllers\Admin\ClientController::class, 'child_exist']);
    Route::post('/crm/leads/filter/workout-balance', [App\Http\Controllers\Admin\ClientController::class, 'workout_balance']);
    Route::post('/crm/leads/lead_comment/store', [App\Http\Controllers\Manager\LeadController::class, 'lead_comment_create'])->name('lead_comment.store');

    Route::get('/crm/dictionaries', [App\Http\Controllers\Admin\IndexController::class, 'dictionaries'])->name('dictionaries');
    Route::post('/crm/dictionary/lead_status/edit/{lead_status_id}', [App\Http\Controllers\Admin\DictionaryController::class, 'edit_lead_status'])->name('edit_lead_status');
    Route::post('/crm/dictionary/lead_status/create', [App\Http\Controllers\Admin\DictionaryController::class, 'create_lead_status'])->name('create_lead_status');
    Route::get('/crm/dictionaries/delete-lead-status/{id}', [App\Http\Controllers\Admin\DictionaryController::class, 'delete_lead_status'])->name('delete_lead_status');

    Route::post('/crm/dictionary/lead_types/edit/{lead_status_id}', [App\Http\Controllers\Admin\DictionaryController::class, 'edit_lead_type'])->name('edit_lead_type');
    Route::post('/crm/dictionary/lead_types/create', [App\Http\Controllers\Admin\DictionaryController::class, 'create_lead_type'])->name('create_lead_type');
    Route::get('/crm/dictionaries/delete-lead-type/{id}', [App\Http\Controllers\Admin\DictionaryController::class, 'delete_lead_type'])->name('delete_lead_type');

    Route::post('/crm/dictionary/task_tag/edit/{lead_status_id}', [App\Http\Controllers\Admin\DictionaryController::class, 'edit_task_tag'])->name('edit_task_tag');
    Route::post('/crm/dictionary/task_tag/create', [App\Http\Controllers\Admin\DictionaryController::class, 'create_task_tag'])->name('create_task_tag');
    Route::get('/crm/dictionaries/delete-task-tag/{id}', [App\Http\Controllers\Admin\DictionaryController::class, 'delete_task_tag'])->name('delete_task_tag');

    Route::post('/crm/dictionary/spec/edit/{spec_id}', [App\Http\Controllers\Admin\DictionaryController::class, 'edit_spec'])->name('edit_spec');
    Route::post('/crm/dictionary/spec/create', [App\Http\Controllers\Admin\DictionaryController::class, 'create_spec'])->name('create_spec');
    Route::get('/crm/dictionaries/delete-spec/{id}', [App\Http\Controllers\Admin\DictionaryController::class, 'delete_spec'])->name('delete_spec');

    Route::post('/crm/dictionary/channels/edit/{spec_id}', [App\Http\Controllers\Admin\DictionaryController::class, 'edit_channel'])->name('edit_channel');
    Route::post('/crm/dictionary/channels/create', [App\Http\Controllers\Admin\DictionaryController::class, 'create_channel'])->name('create_channel');
    Route::get('/crm/dictionaries/delete-channels/{id}', [App\Http\Controllers\Admin\DictionaryController::class, 'delete_channel'])->name('delete_channel');

    Route::post('/crm/dictionary/entry-point/edit/{spec_id}', [App\Http\Controllers\Admin\DictionaryController::class, 'edit_entry_point'])->name('edit_entry_point');
    Route::post('/crm/dictionary/entry-point/create', [App\Http\Controllers\Admin\DictionaryController::class, 'create_entry_point'])->name('create_entry_point');
    Route::get('/crm/dictionaries/delete-entry-point/{id}', [App\Http\Controllers\Admin\DictionaryController::class, 'delete_entry_point'])->name('delete_entry_point');

    Route::post('/crm/dictionary/position/edit/{position_id}', [App\Http\Controllers\Admin\DictionaryController::class, 'edit_position'])->name('edit_position');
    Route::post('/crm/dictionary/position/create', [App\Http\Controllers\Admin\DictionaryController::class, 'create_position'])->name('create_position');
    Route::get('/crm/dictionaries/delete-position/{id}', [App\Http\Controllers\Admin\DictionaryController::class, 'delete_position'])->name('delete_position');

    Route::resources([
        '/areas' => App\Http\Controllers\Admin\AreaController::class
    ]);

    Route::get('/areas/delete/{id}', [App\Http\Controllers\Admin\AreaController::class, 'delete']);
    Route::get('/product/delete/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'delete']);

    Route::resources([
        '/clubs' => App\Http\Controllers\Admin\ClubController::class
    ]);

    Route::get('/warehouses/create/{club_id}', [App\Http\Controllers\Admin\WarehouseController::class, 'create']);
    Route::post('/warehouses/store', [App\Http\Controllers\Admin\WarehouseController::class, 'store']);
    Route::get('/warehouses/edit/{warehouse_id}', [App\Http\Controllers\Admin\WarehouseController::class, 'edit']);
    Route::post('/warehouses/update', [App\Http\Controllers\Admin\WarehouseController::class, 'update']);
    Route::post('/warehouses/delete', [App\Http\Controllers\Admin\WarehouseController::class, 'delete']);
    Route::post('/warehouses/import', [App\Http\Controllers\Admin\WarehouseController::class, 'import']);


    Route::resources([
        'users' => App\Http\Controllers\Admin\UserController::class,
        'aboniments' => App\Http\Controllers\Admin\AbonimentController::class,
        'groups' => App\Http\Controllers\Admin\GroupsController::class,
        'trainers' => App\Http\Controllers\Admin\TrainersController::class,
        'products' => App\Http\Controllers\Admin\ProductsController::class,
        'workouts' => App\Http\Controllers\Admin\WorkoutsController::class,
    ]);
    Route::get('/workouts/delete/{id}', [App\Http\Controllers\Admin\WorkoutsController::class, 'delete']);


    Route::get('/trainingday/delete/{id}', [App\Http\Controllers\Admin\AbonimentController::class, 'delete_day_training']);
    Route::post('/abonements/daytraining/create-day-training', [App\Http\Controllers\Admin\AbonimentController::class, 'create_day_training']);
    Route::post('/trainingday/delete/{training_day_id}', [App\Http\Controllers\Admin\AbonimentController::class, 'delete_day_training']);
    Route::post('/trainingday/update', [App\Http\Controllers\Admin\AbonimentController::class, 'update_day_training']);
});

Route::group([
    'prefix' => 'parents',
    'middleware' => 'auth',
    'as' => 'parents.'
], function(){
    Route::get('/', [App\Http\Controllers\Parent\ChildrenController::class, 'index']);
    Route::post('/chidlren/{child}/abonements/{abonement}/pay', [App\Http\Controllers\Parent\AbonementsController::class, 'pay']);
    Route::get('/chidlren/{child}/abonements', [App\Http\Controllers\Parent\ChildrenController::class, 'abonements'])->name('abonements');
    Route::resources([
        'children' => App\Http\Controllers\Parent\ChildrenController::class
    ]);
    Route::get('/products', [App\Http\Controllers\Parent\ProductController::class, 'index']);
    Route::get('/products/{product_id}/show', [App\Http\Controllers\Parent\ProductController::class, 'details']);
    Route::get('/products/payment/create/{product_id}', [App\Http\Controllers\Parent\ProductController::class, 'payment']);
    Route::get('/products/payments/success', [App\Http\Controllers\Parent\ProductController::class, 'success']);
    Route::post('/products/payments/purchase', [App\Http\Controllers\Parent\ProductController::class, 'purchase']);
    Route::get('/calendar', [App\Http\Controllers\Parent\CalendarController::class, 'index']);

});

 Route::post('comment', [App\Http\Controllers\ClubController::class, 'comments'])->name('club_comment');
 Route::post('abon', [App\Http\Controllers\ClubController::class, 'RequestAbon'])->name('club_abon');

