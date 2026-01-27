<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, "index"])->name('dashboard');

Route::get("/myRecipe", function () {
    return view('myRecipes');
})->name("myRecipe");

require __DIR__ . '/auth.php';
