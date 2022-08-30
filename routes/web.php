<?php

use App\Http\Controllers\ItemImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ImagesController;
use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\ItemPreviewController;

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
Route::get('/dashboard',[ItemsController::class, 'Index'])->name('dashboard');

//Filters
Route::get('/filterName',[ItemsController::class, 'filterName']);
Route::get('/filterPrice',[ItemsController::class, 'filterPrice']);
Route::get('/filterBySearch',[ItemsController::class, 'filterBySearch']);
Route::get('/filterByCategory',[ItemsController::class, 'filterByCategory']);

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
//Items
Route::get('/item',[ItemsController::class, 'add']);
Route::post('/item',[ItemsController::class, 'create']);
Route::get('/item/{item}', [ItemsController::class, 'delete']);
Route::post('/item/{item}', [ItemsController::class, 'update']);
Route::resource('items', 'ItemsController');
//Brands
Route::get('/brands',[BrandsController::class, 'Index'])->name('brands');
Route::get('/brand',[BrandsController::class, 'add']);
Route::post('/brand',[BrandsController::class, 'create']);
Route::get('/brand/{brand}', [BrandsController::class, 'delete']);
Route::post('/brand/{brand}', [BrandsController::class, 'update']);
//Categories
Route::get('/categories',[CategoriesController::class, 'Index'])->name('categories');
Route::get('/category',[CategoriesController::class, 'add']);
Route::post('/category',[CategoriesController::class, 'create']);
Route::get('/category/{category}', [CategoriesController::class, 'delete']);
Route::post('/category/{category}', [CategoriesController::class, 'update']);
//Images
Route::get('/images', [ImagesController::class, 'Index']);
Route::get('/image',[ImagesController::class, 'add']);
Route::post('/images',[ImagesController::class, 'create']);
Route::get('/image/{image}',[ImagesController::class, 'delete']);
Route::post('/image/{image}',[ImagesController::class, 'update']);
Route::post('/itemimages',[ItemImageController::class, 'create']);
Route::get('/itemimage/{image}',[ItemImageController::class, 'delete']);
Route::post('/itemimage/{image}',[ItemImageController::class, 'update']);
//Item Preview
Route::get('/itempreview', [ItemPreviewController::class, 'Index']);
//Favourites
Route::get('/filterByFavourite', [ItemsController::class, 'filterByFavourite']);
Route::patch('/{item}',[ItemsController::class, 'saveFavourite']);
Route::get('session/get',[ItemsController::class, 'accessSession']);
Route::get('session/remove',[ItemsController::class, 'deleteFavourite']);
//Categories
Route::get('/filterByCategory', [ItemsController::class, 'filterByCategory']);
});
