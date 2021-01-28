<?php

use App\Http\Livewire\Counter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\users\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AirlineController;
use App\Http\Controllers\users\DashboardController;

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
    return view('welcome');
});

Route::get('logout',function(){
    Auth::logout();
    return  redirect('/login');
});

//Mail 
Route::get('/send_mail',[MailController::class,'sendMail']);

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

    Route::get('users',function(){
        return view('admin.users');
    })->name('users');

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
    ## Update
    Route::get('ticket/store/{id}', [TicketController::class,'edit'])->name('ticket-edit');
    Route::post('ticket/update/{id}', [TicketController::class,'update'])->name('ticket-update');

    //Order List
    Route::resource('orders',OrderController::class);
    Route::post('order/confirm/{confirm}', [OrderController::class,'confirm'])->name('order-confirm');
    Route::get('order/destroy/{id}', [OrderController::class,'destroy'])->name('order-destroy');

    Route::get('logout',[Controller::class,'logout']);

});

Route::post('/api/login',[Controller::class,'login']);
Route::post('/api/register',[Controller::class,'register']);


Route::get('api/price',[TicketController::class,'price']);
Route::post('api/test',[TicketController::class,'test']);

Route::get('test',function(){
    return view('test');
});
