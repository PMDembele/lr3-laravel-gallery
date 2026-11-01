<?php

use App\Http\Controllers\PaintingController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/paintings');
Route::resource('paintings', PaintingController::class);