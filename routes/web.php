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
Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::post('/category/{id}', [App\Http\Controllers\CategoryController::class, 'listTatooPaginate'])->name('category.paginate');


Route::group(['middleware' => 'auth'], function () {
	Route::group(['prefix' => 'account'], function () {
		Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('account.index');
		Route::get('/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('account.edit');
		Route::post('/edit', [App\Http\Controllers\UserController::class, 'store'])->name('account.store');
	}
	);

	Route::group(['prefix' => 'order'], function () {
		Route::get('/wait', [App\Http\Controllers\OrderController::class, 'wait'])->name('order.wait');
		Route::get('/confirmed', [App\Http\Controllers\OrderController::class, 'confirmed'])->name('order.confirmed');
		Route::get('/history', [App\Http\Controllers\OrderController::class, 'history'])->name('order.history');
		Route::delete('/remove',[App\Http\Controllers\OrderController::class, 'remove'])->name('order.remove');
		Route::get('/detail/{id}', [App\Http\Controllers\OrderController::class, 'detail'])->name('order.detail');
	}
	);

});

Route::group(['prefix' => 'cart'], function () {
	Route::get('/', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
	Route::get('/add/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('card.add');
	Route::delete('/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
	Route::post('submit', [App\Http\Controllers\CartController::class, 'submit'])->name('cart.submit')->middleware('auth');
});


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
	Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.index');


	Route::group(['prefix' => 'categories'], function () {
		Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');
		Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
		Route::post('/create', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
		Route::get('/remove/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'remove'])->name('admin.category.remove');
		Route::get('/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
		Route::post('/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
	}
	);

	Route::group(['prefix' => 'tattoos'], function () {
		Route::get('/', [App\Http\Controllers\Admin\TattooController::class, 'index'])->name('admin.tattoo.index');
		Route::get('/create', [App\Http\Controllers\Admin\TattooController::class, 'create'])->name('admin.tattoo.create');
		Route::post('/create', [App\Http\Controllers\Admin\TattooController::class, 'store'])->name('admin.tattoo.store');
		Route::get('/remove/{id}', [App\Http\Controllers\Admin\TattooController::class, 'remove'])->name('admin.tattoo.remove');
		Route::get('/edit/{id}', [App\Http\Controllers\Admin\TattooController::class, 'edit'])->name('admin.tattoo.edit');
		Route::post('/update/{id}', [App\Http\Controllers\Admin\TattooController::class, 'update'])->name('admin.tattoo.update');
	}
	);

	Route::group(['prefix' => 'artists'], function () {
		Route::get('/', [App\Http\Controllers\Admin\ArtistController::class, 'index'])->name('admin.artist.index');
		Route::get('/create', [App\Http\Controllers\Admin\ArtistController::class, 'create'])->name('admin.artist.create');
		Route::post('/create', [App\Http\Controllers\Admin\ArtistController::class, 'store'])->name('admin.artist.store');
		Route::get('/remove/{id}', [App\Http\Controllers\Admin\ArtistController::class, 'remove'])->name('admin.artist.remove');
		Route::get('/edit/{id}', [App\Http\Controllers\Admin\ArtistController::class, 'edit'])->name('admin.artist.edit');
		Route::post('/update/{id}', [App\Http\Controllers\Admin\ArtistController::class, 'update'])->name('admin.artist.update');
	}
	);

	Route::group(['prefix' => 'orders'], function () {
		Route::get('/', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.order.index');
		Route::get('/confirm/{id}', [App\Http\Controllers\Admin\OrderController::class, 'confirm'])->name('admin.order.confirm');
		Route::get('/finish/{id}', [App\Http\Controllers\Admin\OrderController::class, 'finish'])->name('admin.order.finish');
		Route::get('/cancel/{id}', [App\Http\Controllers\Admin\OrderController::class, 'cancel'])->name('admin.order.cancel');
	}
	);

});