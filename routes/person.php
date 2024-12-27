<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

Route::resource('people', PersonController::class);
