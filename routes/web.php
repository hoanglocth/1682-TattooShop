<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function(){
	
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.index');


	Route::group(['prefix' => 'categories'], function(){
		Route::get('/',  [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');
		Route::get('/create',  [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
		Route::post('/create',  [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
		Route::get('/remove/{id}',  [App\Http\Controllers\Admin\CategoryController::class, 'remove'])->name('admin.category.remove');
	});

	Route::group(['prefix' => 'tattoos'], function(){
		Route::get('/',  [App\Http\Controllers\Admin\TattooController::class, 'index'])->name('admin.tattoo.index');
		Route::get('/create',  [App\Http\Controllers\Admin\TattooController::class, 'create'])->name('admin.tattoo.create');
		Route::post('/create',  [App\Http\Controllers\Admin\TattooController::class, 'store'])->name('admin.tattoo.store');
	});
	Route::group(['prefix' => 'artists'], function(){
		Route::get('/',  [App\Http\Controllers\Admin\ArtistController::class, 'index'])->name('admin.artist.index');
		Route::get('/create',  [App\Http\Controllers\Admin\ArtistController::class, 'create'])->name('admin.artist.create');
		Route::post('/create',  [App\Http\Controllers\Admin\ArtistController::class, 'store'])->name('admin.artist.store');
	});

});