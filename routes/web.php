<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/register/seeker', [UserController::class, 'createSeeker'])->name('create.seeker');

Route::get('/register/employer', [UserController::class, 'createEmployer'])->name('create.employer');
