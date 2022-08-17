<?php

use App\Http\Controllers\Api\CentroCanjeController;
use App\Http\Controllers\Api\RegaloController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Models\User;
/* Regalos*/
Route::get('verRegalos',[RegaloController::class, 'verRegalos']);
Route::get('verRegalo/{id_regalo}',[RegaloController::class, 'verRegalos']);
Route::post('agregarRegalo',[RegaloController::class, 'agregarRegalo']);
Route::delete('eliminarRegalo/{id_regalo}',[RegaloController::class, 'eliminarRegalo']);
Route::post("actualizarRegalo/{id_regalo}",[RegaloController::class,'actualizarRegalo']);

/** Canje*/
Route::get('consultarPuntos/{id_cuenta}',[CentroCanjeController::class, 'consultarPuntos']);
Route::get('consultarPrecio/{id_regalo}',[CentroCanjeController::class, 'consultarPrecio']);
Route::get('consultarCantidad/{id_regalo}',[CentroCanjeController::class, 'consultarCantidad']);
Route::post("Canjear/{id_cuenta}/{id_regalo}",[CentroCanjeController::class,'Canjear']);
Route::post("descontarCantidad/{id_regalo}",[CentroCanjeController::class,'descontarCantidad']);
Route::post("descontarPuntos/{id_cuenta}/{puntosADescontar}",[CentroCanjeController::class,'descontarPuntos']);


Route::get('consultarCanjes/{id_cuenta}',[CentroCanjeController::class, 'consultarCanjes']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
