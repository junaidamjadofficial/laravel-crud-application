<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

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




Route::get("/", [HomeController::class, "index"])->name("home");

Route::middleware('auth')->group(function () {
    Route::get("create-post", [PostController::class, "create"])->name("posts.create");
    Route::post("store-post", [PostController::class, "store"])->name("posts.store");
    Route::get("edit-post/{id}", [PostController::class, "edit"])->name("posts.edit");
    Route::put("update-post/{id}", [PostController::class, "update"])->name("posts.update");
    Route::delete("post/{id}", [PostController::class, "destroy"])->name("posts.destroy");
    
});

require __DIR__.'/auth.php';
