<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\ClientAddressController;
use App\Http\Controllers\API\ClientAddressTypeController;
use App\Http\Controllers\API\LoginCOntroller;
use App\Http\Controllers\API\WorkOrderController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    //Auth Routes
    Route::post('/login',[LoginCOntroller::class,'login']);


    Route::prefix('clients')->group(function(){
        //Clients
        Route::get('/',[ClientController::class,'index']);
        
        //Client Address
        Route::get('/addresses',[ClientAddressController::class,'index']);
        
        //Client Address Type
        Route::get('/addresses/types',[ClientAddressTypeController::class,'index']);


});

Route::prefix('workorders')->group(function(){

    Route::post("/",[WorkOrderController::class,'store']);
});



