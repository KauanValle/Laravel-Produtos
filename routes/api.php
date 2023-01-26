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


Route::prefix('/produtos')->group(function ()
    {
        Route::get('/', 'ProdutosController@index');
        Route::get('/{id}', 'ProdutosController@show');
        Route::post('/', 'ProdutosController@store');
        Route::delete('/{id}', 'ProdutosController@destroy');
        Route::put('/{id}', 'ProdutosController@update');
    });
