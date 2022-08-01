<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Models\User;

//rutas con acceso público
Route::post('register',[UserController::class, 'register']);
Route::post('login',[UserController::class, 'login']);
//rutas protegidas para usuarios del sistema
Route::group(['middleware'=>["auth:sanctum"]],function(){
    //rutas
    Route::get('user-profile',[UserController::class, 'userProfile']);
    Route::get('logout',[UserController::class, 'logout']);
    Route::put("updateUser",[UserController::class,'updateUser']);
    Route::delete("deleteUser",[UserController::class,'deleteUser']);
    
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
