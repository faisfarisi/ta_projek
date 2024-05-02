<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KopiController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\admin\ProdukController;
use App\Http\Controllers\Admin\PreorderController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\UserKaryawanController;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\admin\KategoriProdukController;
use App\Http\Controllers\Customer\LoginRegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::redirect('/admin', '/admin/dashboard', 301);

// Route::get('/login', function () {
//     return view('admin.pages.login', ['type_menu' => 'auth']);
// });

// Dashboard
Route::get('/', function () {
    return view('admin.pages.dashboard', ['type_menu' => '']);
});
Route::get('/dashboard', function () {
    return view('admin.pages.dashboard', ['type_menu' => '']);
});

// Users
Route::resource('/user-admin', UserAdminController::class);

// Produk
// Route::get('/produk', [KopiController::class,'index']);
Route::resource('/produk', KopiController::class);


// Kategori
Route::resource('/kategori', KategoriProdukController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
