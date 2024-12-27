<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

Route::get('peopleWithCreator', [PersonController::class, 'index']);
Route::get('people/{id}', [PersonController::class, 'show']);
