<?php

use App\Http\Controllers\Admin\aCategoryController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\aProductController;
use App\Http\Controllers\Admin\aProductGalleryController;
use App\Http\Controllers\Admin\aUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChekoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('pages.homePage');
// })->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('categories/{id}', [CategoryController::class, 'detail'])->name('categories-detail');
Route::get('categories', [CategoryController::class, 'index'])->name('categories');

Route::get('details/{id}', [DetailController::class, 'index'])->name('details');
Route::post('tambah/{id}', [DetailController::class, 'add'])->name('tambah-cart');



Route::post('callback', [ChekoutController::class, 'callback'])->name('midtrans-callback');

Route::get('success', [CartController::class, 'success'])->name('success');
Route::get('success-register', [RegisteredUserController::class, 'success'])->name('success-register');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route Dashboard

Route::group(['middlaware' => ['auth']], function () {
    Route::get('carts', [CartController::class, 'index'])->name('carts');
    Route::delete('/carts/{id}', [CartController::class, 'delete'])->name('delete-cart');
    Route::post('chekout', [ChekoutController::class, 'proses'])->name('chekout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dProducts', [DashboardProductController::class, 'index'])->name('dashboard-product');
    Route::get('details-product/{id}', [DashboardProductController::class, 'detail'])->name('product-detail');
    Route::get('product-create', [DashboardProductController::class, 'create'])->name('product-create');
    Route::post('product-store', [DashboardProductController::class, 'Tambah'])->name('product-store');
    Route::post('dashboard-product-update/{id}', [DashboardProductController::class, 'update'])->name('dashboard-product-update');
    Route::post('dashboard-product-gallery', [DashboardProductController::class, 'uploadGallery'])->name('upload-product-gallery');
    Route::get('dashboard-product-gallery/{id}', [DashboardProductController::class, 'deleteGallery'])->name('delete-product-gallery');
    Route::get('dashboard-transaksi', [TransaksiController::class, 'index'])->name('dashboard-transaksi');
    Route::get('dtransaksi/{id}', [TransaksiController::class, 'detailTransaksi'])->name('detail-transaksi');
    Route::post('dtransaksi-update/{id}', [TransaksiController::class, 'update'])->name('update-transaksi');
    Route::get('dashboard/settings', [DashboardSettingController::class, 'Store'])->name('dashboard-setting');
    Route::get('dashboard/account', [DashboardSettingController::class, 'Account'])->name('dashboard-account');
    Route::post('dashboard/account/update/{redirect}', [DashboardSettingController::class, 'update'])->name('dashboard-account-redirect');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Admin middlawere auth dan admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard-admin');
    // Route::resource('category',  CategoriesController::class);
    Route::resource('category', aCategoryController::class);
    Route::resource('user', aUserController::class);
    Route::resource('product', aProductController::class);
    Route::resource('product-gallery', aProductGalleryController::class);
});

require __DIR__ . '/auth.php';
