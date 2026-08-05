<?php

use App\Http\Controllers\NovelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NovelController::class, 'index']);
