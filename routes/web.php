<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminMainController;
use App\Http\Controllers\home\HomeMainController;
use App\Http\Controllers\CategoryController;

//home
Route::controller(HomeMainController::class)->group(function () {
   Route::get('/', 'index')->name('home.index'); 
});

//home

//Route::middleware(['auth', 'verified','rolemanager:user'])->group(function () {
//    Route::controller(HomeMainController::class)->group(function () {
//    Route::prefix('home')->group(function () {
//   
//});
//
//});
// });









Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','rolemanager:user'])->name('dashboard');
//admin
Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
     Route::prefix('admin')->group(function () {

    Route::controller(AdminMainController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('admin.dashboard'); 
});

 Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/create', 'create')->name('admin.category.create'); 
Route::post('/category/store', 'store')->name('admin.category.store');

});


});
 });









Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
