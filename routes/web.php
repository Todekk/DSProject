<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\UsersController;

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

//User
Route::get('/registeruser', [UsersController::class, 'register_form'])->name('register_url');
Route::post('/registeruser', [UsersController::class, 'register']);

Route::get('/dashboard',[ItemsController::class, 'Index'])->name('dashboard');
//Filters
Route::get('/filterName',[ItemsController::class, 'filterName']);
Route::get('/filterPrice',[ItemsController::class, 'filterPrice']);
Route::get('/filterBySearch',[ItemsController::class, 'filterBySearch']);
//Image view
Route::get('/view-image',[ItemsController::class,'viewImage'])->name('images.view');  
Route::get('/item',[ItemsController::class, 'add']);
Route::post('/item',[ItemsController::class, 'create']);      
Route::get('/item/{item}', [ItemsController::class, 'edit']);
Route::get('/item/{item}', [ItemsController::class, 'delete']);
Route::post('/item/{item}', [ItemsController::class, 'update']);
Route::resource('items', 'ItemsController');
