<?php

use Illuminate\Support\Facades\Route;
use App\Models\Articles;
use App\Models\Category;
use App\Models\Subcategory;


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

Route::get('/', function () {
     $categories = Category::all();
        return view('index', ['title' => 'Categories', 'categories' => $categories]);
})->name('categories.index');
Route::get('/categories/{id}', function ($id) {
    $category = Category::find($id);
    return view('categories.show', ['category' => $category]);
})->name('categories.show');


/* ====== Subcategories ====== */
Route::get('/subcategories', function ($id) {
    return view('subcategories.show', ['subcategory' => 'Subcategories']);
})->name('subcategories.show');


/* ====== Articles ====== */
Route::get('/articles', function () {
    $articles = App\Models\Articles::all();
    return view('articles', ['title' => 'Articles','articles' => $articles]);
})->name('articles.index');

Route::get('/articles/{id}', function ($id) {
    $article = Articles::find($id);
    return view('articles.show', ['article' => $article]);
})->name('articles.show');

