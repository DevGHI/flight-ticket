<?php

use App\Http\Livewire\Counter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\AirlineController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/counter',Counter::class);
Route::get('testing',[AirlineController::class,'index']);


Route::get('dashboard',function(){
    return redirect('/admin/city');
});


Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function () {

    // city
    Route::get('city',function(){
        return view('admin.city');
    })->name('city');

    Route::get('airline',function(){
        return view('admin.airline');
    })->name('airline');


    // ticket
    Route::resource('tickets', TicketController::class);
    Route::get('ticket/create',function(){
        $cities=\App\Models\City::orderBy('name')->get();
        $airlines=\App\Models\Airline::orderBy('name')->get();
        return view('admin.ticket.create-ticket')->with([
            'cities'=>$cities,
            'airlines'=>$airlines
        ]);
    })->name('ticket-create');
    Route::post('ticket/store',[TicketController::class,'store'])->name('ticket-store');

});

Route::post('/api/login',[Controller::class,'login']);
