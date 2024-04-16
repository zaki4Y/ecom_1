<?php

use App\Http\Controllers\CreatController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\ProductMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/',[ProductController::class , "index"])->name("welcome");



Route::get("/", [ProductController::class,"index" ])->name("home.index");
Route::get("/create", [CreatController::class,"index" ])->name("create.index");
Route::post('/product/', [ProductController::class, "store"])->name("product.store");
Route::delete("/product/delete/{product}", [ProductController::class, "destroy"])->name("product.delete");
Route::get("/edit/{product}", [EditController::class,"index" ])->name("edit.index");
Route::put("/product/update/{product}", [ProductController::class,"update"])->name("product.update");



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(ProductMiddleware::class)->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
