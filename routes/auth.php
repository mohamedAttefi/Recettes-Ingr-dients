<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::post("login", [AuthController::class, "login"])->name("login");

Route::get('register', [AuthController::class, "showRegisterForm"])->name("register.form");
Route::get('login', [AuthController::class, "showLoginForm"])->name("login.form");
Route::post('register', [AuthController::class, "register"])->name("register");
