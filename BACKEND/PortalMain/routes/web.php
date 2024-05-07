<?php

use Illuminate\Support\Facades\Route;
use App\Models\Articles;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Controllers\ArticalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* ====== Categories ====== */
Route::get('/', [CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/{id}',[CategoryController::class,'show'])->name('categories.show');
Route::post('/categories',[CategoryController::class,'store'])->name('categories.store');
Route::put('/categories/{id}',[CategoryController::class,'update'])->name('categories.update');
Route::delete('/categories/{id}',[CategoryController::class,'destroy'])->name('categories.destroy');


/* ====== Subcategories ====== */
Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories.index');
Route::get('/subcategories/{id}', [SubCategoryController::class, 'show'])->name('subcategories.show');
Route::post('/subcategories', [SubCategoryController::class, 'store'])->name('subcategories.store');
Route::put('/subcategories/{id}', [SubCategoryController::class, 'update'])->name('subcategories.update');
Route::delete('/subcategories/{id}', [SubCategoryController::class, 'destroy'])->name('subcategories.destroy');


/* ====== Articles ====== */
Route::get('/articles', [ArticalController::class,'index'])->name('articles.index');
Route::get('/articles/{id}', [ArticalController::class,'show'])->name('articles.show');
Route::post('/articles', [ArticalController::class, 'store'])->name('articles.store');
Route::delete('/articles/{id}/delete', [ArticalController::class,'destroy'])->name('articles.destroy');
Route::put('/articles/{id}/edit', [ArticalController::class,'update'])->name('articles.update');

Route::get('/test', function () {
    return view('test');
});

