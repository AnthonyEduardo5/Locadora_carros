<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::resource('cliente', 'App\Http\Controllers\ClienteController');
Route::prefix('v1')->middleware('jwt.auth')->group(function() {
    Route::post('me', [App\Http\Controllers\AuthController::class, 'me']);
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::apiResource('cliente', 'ClienteController');
    Route::apiResource('carro', 'CarroController');
    Route::apiResource('locacao', 'LocacaoController');
    Route::apiResource('marca', 'MarcaController');
    Route::apiResource('modelo', 'ModeloController');
});

Route::post('login',  [App\Http\Controllers\AuthController::class, 'login']);
Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);