<?php

use App\Http\Controllers\KategoriAPIController;
use App\Http\Controllers\ProdukAPIController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('produk', [ProdukAPIController::class, 'index']);
Route::put('produk/{id}', [ProdukAPIController::class, 'update']);
Route::post('produk', [ProdukAPIController::class, 'store']);
Route::get('produk/{id}/edit', [ProdukAPIController::class, 'edit']);
Route::get('produk/{id}', [ProdukAPIController::class, 'show']);
Route::delete('produk/{id}', [ProdukAPIController::class, 'destroy']);

Route::get('kategori', [KategoriAPIController::class, 'index']);
Route::get('status', [ProdukAPIController::class, 'status']);