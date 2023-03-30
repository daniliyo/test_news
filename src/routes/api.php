<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;

Route::get('/news/{news}', [NewsController::class, 'show']);