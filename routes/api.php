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
/*Apartado para los Productos*/
Route::get("/productos/{id?}", "API\ProductoController@index")->where("id","[0-9]+");
Route::post("/productos","API\ProductoController@guardar");
Route::put("/productos/{id?}", "API\ProductoController@Cambiar")->where("id","[0-9]+");
Route::delete("/productos/{id?}", "API\ProductoController@Eliminar")->where("id","[0-9]+");

/*Apartado para los comentarios*/
Route::get("/comentarios/{id?}", "API\ComentarioController@mostrar")->where("id","[0-9]+");
Route::post("/comentarios","API\ComentarioController@guardarC");
Route::put("/comentarios/{id?}","API\ComentarioController@CambiarCom")->where("id","[0-9]+");
Route::delete("/comentarios/{id?}","API\ComentarioController@EliminarCom")->where("id","[0-9]+");