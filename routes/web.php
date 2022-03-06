<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\TagsController;
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
Route::get('/plants/insert', [PlantsController::class, 'insert']);
Route::get('/plants/{id}/update', [PlantsController::class, 'update']);
Route::get('/plants/{id}/delete', [PlantsController::class, 'destroy']);
Route::get('/plants/find/{id}', [PlantsController::class, 'plant_find']);
Route::get('/plants/find_more/{id}', [PlantsController::class, 'plant_find_more']);
Route::get('/plants/basic_insert', [PlantsController::class, 'basicInsert']);
Route::get('/plants/basic_update/{id}', [PlantsController::class, 'basicUpdate']);
Route::get('/plants/basic_create', [PlantsController::class, 'basicCreate']);
Route::get('/plants/soft_delete/{id}', [PlantsController::class, 'softDelete']);
Route::get('/plants/view_trash', [PlantsController::class, 'viewTrash']);
Route::get('/plants/view_trash/{id}', [PlantsController::class, 'viewTrash']);
Route::get('/plants/restore', [PlantsController::class, 'restore']);
Route::get('/plants/restore/{id}', [PlantsController::class, 'restore']);
Route::get('/plants/permanent_delete', [PlantsController::class, 'permanentDelete']);
Route::get('/plants/permanent_delete/{id}', [PlantsController::class, 'permanentDelete']);
Route::resource('plants',PlantsController::class);

Route::get('/user/{id}/post', [PostsController::class, 'PostByUser']);
Route::get('/user/{id}/posts', [PostsController::class, 'PostsByUser']);
Route::get('/post/{id}/author', [PostsController::class, 'author']);
Route::get('/post/{id}/photos', [PostsController::class, 'photos']);
Route::get('/post/{id}/tags', [PostsController::class, 'tags']);

Route::get('/user/{id}/roles', [RoleController::class, 'RolesByUser']);
Route::get('/user/{id}/pivot', [RoleController::class, 'UserPivot']);
Route::get('/user/{id}/photos', [PhotoController::class, 'PhotosByUser']);
Route::get('/photo/{id}/owner', [PhotoController::class, 'ownerOfPhoto']);

Route::get('/role/{role_id}/users', [RoleController::class, 'UsersByRole']);

Route::get('/country/{country_id}/posts', [CountryController::class, 'postsByCountry']);

Route::get('/video/{id}/tags', [VideosController::class, 'tags']);

Route::get('/tag/{id}/posts', [TagsController::class, 'posts']);
Route::get('/tag/{id}/videos', [TagsController::class, 'videos']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
