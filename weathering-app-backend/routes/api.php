<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TravelInfoController;

Route::get('/weather', [TravelInfoController::class, 'weather']);
Route::get('/places', [TravelInfoController::class, 'places']);
