<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\PesananController;
use App\Http\Controllers\admin\ProdukController;
use App\Http\Controllers\admin\ProfilController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\website\CartController;
use App\Http\Controllers\website\DashboardController;
use App\Http\Controllers\website\RiwayatPemesananController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard-website');
Route::post('/', [DashboardController::class, 'storeId'])->name('store-id');
Route::get('/detail-menu/{id?}', [DashboardController::class, 'show'])->name('detail-website');

Route::get('/cart/{id?}', [CartController::class, 'index'])->name('index-cart');
Route::post('/cart', [CartController::class, 'store'])->name('store-cart');
Route::post('/cart/update-item/{id}', [CartController::class, 'updateItem'])->name('update-item');
Route::get('/cart/delete-item/{id}', [CartController::class, 'deleteItem'])->name('delete-item');
Route::post('/cart/checkout/', [CartController::class, 'checkout'])->name('checkout-cart');
Route::get('/cart/shipping/{id}', [CartController::class, 'shipping'])->name('shipping-cart');
Route::get('/cart/order-confirmation/{kodePesanan}', [CartController::class, 'orderConfirmation'])->name('order-confirmation');

Route::get('/riwayat-pemesanan', [RiwayatPemesananController::class, 'index'])->name('index-riwayat');
Route::get('/riwayat-pemesanan/detail/{idPesanan}', [RiwayatPemesananController::class, 'show'])->name('show-riwayat');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
    'middleware' => 'auth.custom',
], function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('index');

    Route::group([  
        'prefix' => '/produk',
        'as' => 'produk.'
    ], function () {
        Route::get('/', [ProdukController::class, 'index'])->name('index');
        Route::get('/add', [ProdukController::class, 'add'])->name('add');
        Route::post('/store', [ProdukController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ProdukController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ProdukController::class, 'delete'])->name('delete');
    });

    Route::group([  
        'prefix' => '/profil',
        'as' => 'profil.'
    ], function () {
        Route::get('/', [ProfilController::class, 'index'])->name('index');
        Route::put('/update/{id}', [ProfilController::class, 'update'])->name('update');
    });

    Route::group([  
        'prefix' => '/pesanan',
        'as' => 'pesanan.'
    ], function () {
        Route::get('/', [PesananController::class, 'index'])->name('index');
        // Route::put('/update/{id}', [PesananController::class, 'update'])->name('update');
        Route::patch('/setuju/{id}', [PesananController::class, 'setuju'])->name('setuju');
        Route::patch('/kirim/{id}', [PesananController::class, 'kirimPesanan'])->name('kirim');
        Route::patch('/selesai/{id}', [PesananController::class, 'selesai'])->name('selesai');
    });

});

Route::get('/template', function () {
    return view('template');
});
