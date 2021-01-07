<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\admin\AirlineController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tickets',[\App\Http\Controllers\TicketController::class,'api_tickets']);

Route::apiResource('cities',\App\Http\Controllers\admin\CityController::class)->middleware('auth:sanctum');

Route::post('order',[OrderController::class,'store'])->middleware('auth:sanctum');

Route::get('airlines',[AirlineController::class,'index']);