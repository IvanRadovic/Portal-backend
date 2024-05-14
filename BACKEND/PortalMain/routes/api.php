<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ArticalController;
use \App\Http\Controllers\API\CategoryController;
use \App\Http\Controllers\API\AuthorController;
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

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/latesCategories', [CategoryController::class, 'homeCategories']);
Route::get('/latesSubCategories/{id}', [CategoryController::class, 'homeSubCategories']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);


Route::get('/articles', [ArticalController::class, 'index']);
Route::get('/articles/{id}', [ArticalController::class, 'show']);
Route::post('/articles', [ArticalController::class, 'store']);
Route::put('/articles/{id}', [ArticalController::class, 'update']);
Route::delete('/articles/{id}', [ArticalController::class, 'destroy']);

Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/{id}', [AuthorController::class, 'show']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
