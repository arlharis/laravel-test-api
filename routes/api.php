<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
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

// Route::resource('items', ItemController::class);

// Public Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/item/all', [ItemController::class, 'index']);
Route::get('/item/{item}', [ItemController::class, 'show']);
Route::get('/item/search/{timestamp}', [ItemController::class, 'search']);

// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/item', [ItemController::class, 'store']);
    Route::put('/item/{item}', [ItemController::class, 'update']);
    Route::delete('/item/{item}', [ItemController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
