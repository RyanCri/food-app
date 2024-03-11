<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StockController;

use App\Http\Controllers\User\ItemController as UserItemController;

use App\Http\Controllers\Admin\TypeController as AdminTypeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/stock', [StockController::class, 'stock']);

Route::resource('/item', UserItemController::class)->middleware(['auth', 'role:user,admin'])->names('user.item');

Route::resource('/admin/type', AdminTypeController::class)->middleware(['auth', 'role:admin'])->names('admin.type');

require __DIR__.'/auth.php';
