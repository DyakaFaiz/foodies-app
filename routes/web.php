<?php

use App\Http\Controllers\website\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard-website');
Route::get('/detail-menu/{id?}', [DashboardController::class, 'show'])->name('detail-website');

Route::get('/template', function () {
    return view('template');
});
