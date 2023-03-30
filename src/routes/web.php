<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\NewsController;

Route::get('/', [NewsController::class, 'index'])->name('home');

Route::resource('manager', ManagerController::class);
