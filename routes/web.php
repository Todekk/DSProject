<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ImagesController;
use App\Actions\Fortify\CreateNewUser;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
//Image view
Route::get('/view-image',[ItemsController::class,'viewImage'])->name('images.view');  
Route::get('/item',[ItemsController::class, 'add']);
Route::post('/item',[ItemsController::class, 'create']);      
Route::get('/item/{item}', [ItemsController::class, 'edit']);
Route::get('/item/{item}', [ItemsController::class, 'delete']);
Route::post('/item/{item}', [ItemsController::class, 'update']);
Route::resource('items', 'ItemsController');
//Brands
Route::get('/brands',[BrandsController::class, 'Index'])->name('brands');
Route::get('/brand',[BrandsController::class, 'add']);
Route::post('/brand',[BrandsController::class, 'create']);      
Route::get('/brand/{brand}', [BrandsController::class, 'edit']);
Route::get('/brand/{brand}', [BrandsController::class, 'delete']);
Route::post('/brand/{brand}', [BrandsController::class, 'update']);
//Categories
Route::get('/categories',[CategoriesController::class, 'Index'])->name('categories');
Route::get('/category',[CategoriesController::class, 'add']);
Route::post('/category',[CategoriesController::class, 'create']);      
Route::get('/category/{category}', [CategoriesController::class, 'edit'])->name('edit');
Route::get('/category/{category}', [CategoriesController::class, 'delete']);
Route::post('/category/{category}', [CategoriesController::class, 'update']);
//Images
Route::get('/image',[ImagesController::class, 'Index']);
Route::get('/image',[ImagesController::class, 'add']);
Route::post('/images',[ImagesController::class, 'create']);      
Route::get('/images/{image}', [ImagesController::class, 'edit'])->name('edit');
Route::get('/images/{image}', [ImagesController::class, 'delete']);
Route::post('/images/{image}', [ImagesController::class, 'update']);
});
