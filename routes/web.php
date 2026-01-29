<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, "index"])->name('dashboard');
Route::get("/recipe/myRecipe", [RecipeController::class, "showMyRecipe"])->name("myRecipe");
Route::get("/recipe/addRecipe", [RecipeController::class, "showAddRecipeForm"])->name("addRecipe.form");
Route::get("/recipe/showRecipe", [RecipeController::class, "showRecipe"])->name("showRecipe");
Route::get("/recipe/editRecipe", [RecipeController::class, "showEditRecipe"])->name("showEditRecipeForm");
Route::post("/recipe/editRecipe", [RecipeController::class, "update"])->name("update");
Route::post("/recipe/addRecipe", [RecipeController::class, "store"])->name("addRecipe");
Route::get("/recipe/All", [RecipeController::class, "index"])->name("allRecipes");

require __DIR__ . '/auth.php';
