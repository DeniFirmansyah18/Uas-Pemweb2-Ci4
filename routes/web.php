<?php

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminCatalogController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//          USER                 //

Route::get('/home', [MovieController::class, 'showhome']);

// fitur profile dapat diakses jika user sudah login
Route::get('/profile', function () {
    return view('pages.profile');
})->middleware('auth');

// fitur about dapat diakses jika user sudah/belum login
Route::get('/about', function () {
    return view('pages.about');
});

//about
Route::get('/about', function () {
    return view('pages.about');
});



// fitur forgot password tidak bisa di akses dalam mode sudah login
Route::get('/password/reset', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');

//category
Route::get('/category', function () {
    return view('pages.category');
})->middleware('auth');

//pricing
Route::get('/pricing', function () {
    return view('pages.pricing');
})->middleware('auth');

Route::get('/genre', function () {
    return view('pages.genre');
})->middleware('auth');

Route::get('/live', function () {
    return view('pages.live');
})->middleware('auth');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->middleware('auth');

Route::get('/contacts', function () {
    return view('pages.contact');
})->middleware('auth');

Route::get('/detail', function () {
    return view('pages.detail');
})->middleware('auth');

//              ADMIN               //
Route::resource('/movie', \App\Http\Controllers\MovieController::class);
Route::get('admin', [MovieController::class, 'showadmin'])->middleware('role:admin');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [MovieController::class, 'showadmin'])->name('admin.index');
    Route::get('/admin/catalog', [MovieController::class, 'index'])->name('admin.catalog.index');
    Route::get('/admin/catalog/create', [MovieController::class, 'create'])->name('admin.catalog.create');
    Route::post('/admin/catalog', [MovieController::class, 'store'])->name('admin.catalog.store');
    Route::get('/admin/catalog/{id}', [MovieController::class, 'show'])->name('admin.catalog.show');
    Route::get('/admin/catalog/{id}/edit', [MovieController::class, 'edit'])->name('admin.catalog.edit');
    Route::put('/admin/catalog/{id}', [MovieController::class, 'update'])->name('admin.catalog.update');
    Route::delete('/admin/catalog/{id}', [MovieController::class, 'destroy'])->name('admin.catalog.destroy');
});

Route::resource('/user', \App\Http\Controllers\UserController::class);
Route::get('users', [UserController::class, 'showadmin'])->middleware('role:admin');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->middleware('role:admin');