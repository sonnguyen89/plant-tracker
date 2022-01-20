<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/login', function () {
    return 'login';
});*/

Route::get('/plant/{id}/{name}', function ($id,$name) {
    return 'plant '. $id . ' with name '. $name;
});

Route::get('admin/plant/detail',array('as' => 'admin.home', function () {
    $url = route('admin.home');

    return 'this url is ' . $url;

}));

Route::get('/users', function () {
    return 'Welcome to the user page';
});


//Route::get('/plant', 'App\Http\Controllers\PlantsController@index');
Route::get('/plant/{id}/{name}/{password}', [PlantsController::class, 'plant_detail']);
Route::get('/plants/list', [PlantsController::class, 'plants_list_view']);

Route::resource('plants',PlantsController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
