<?php

use App\Http\Controllers\ProductsController;
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

Route::post('/products', [ProductsController::class, "store"]);
Route::get('/products', [ProductsController::class, "index"]);
Route::get('/products/{product}', [ProductsController::class, "show"]);
Route::put('/products/{product}', [ProductsController::class, "update"]);
Route::delete('/products/{product}', [ProductsController::class, "destroy"]);
Route::get('/search/products/', [ProductsController::class, "search"]);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
