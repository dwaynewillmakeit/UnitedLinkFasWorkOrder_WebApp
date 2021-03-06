<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientAddressController;
use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\HomeController;



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
    return redirect()->route('login');
});

//Auth Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Users
Route::group(['prefix'=>'users','middleware'=>'auth'],function(){

    Route::get('/', [UserController::class, 'index'])->name('users');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/update', [UserController::class, 'update'])->name('user.update');
});


Route::group(['prefix'=>'clients','middleware'=>'auth'],function () {
    //Clients
    Route::get('/', [ClientController::class, 'index'])->name('clients');
    Route::get('/{id}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/store', [ClientController::class, 'store'])->name('clients.store');
    Route::post('/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');

    //Client Addresses
    Route::get('/{client_id}/addresses/create', [ClientAddressController::class, 'create'])->name('client.addresses.create');
    Route::get('/addresses/{id}/edit', [ClientAddressController::class, 'edit'])->name('client.addresses.edit');
    Route::post('/addresses/store', [ClientAddressController::class, 'store'])->name('client.addresses.store');
    Route::post('/addresses/{id}/update', [ClientAddressController::class, 'update'])->name('client.addresses.update');
});

Route::prefix('workorders')->group(function () {

    Route::get('/', [WorkOrderController::class, 'index'])->name('workorders');

    Route::get('/pdf/{workorder}', [WorkOrderController::class,'generatePdf']);
});

Route::get('/downloads', [HomeController::class,'viewDownloads'])->name('downloads')->middleware('auth');

