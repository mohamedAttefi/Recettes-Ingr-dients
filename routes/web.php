<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, "index"])->name('dashboard');

Route::get("/myRecipe", [RecipeController::class, "showMyRecipe"])->name("myRecipe");
Route::get("/addRecipe", [RecipeController::class, "showAddRecipeForm"])->name("addRecipe");

require __DIR__ . '/auth.php';
