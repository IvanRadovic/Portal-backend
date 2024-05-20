<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Articles;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $categories =  Category::class::with('subCategories')->get();

         foreach($categories as $category){
            $category->path = '/'.str_replace(' ','_',$category->name);
            foreach($category->subCategories as $subCategory){
                $subCategory->path = '/'.str_replace(' ','_',$subCategory->name);
            }
         }


         return response()->json($categories);
    }

  function homeCategories(){
      $categories = Category::with('subCategories')->get();

      $categories = $categories->map(function ($category) {
              $category->path = '/'.str_replace(' ','_',$category->name);
              $category->articles = $category->articles()->orderBy('date', 'desc')->take(3)->get();
              foreach($category->articles as $article){
                  $article->subcategories = $article->subcategories;
                  $article->getMedia();
              }
          return $category;
      });

      return response()->json($categories);
  }

  function homeSubCategories($id){
      $category =
        Category::with(['subCategories.articles' => function ($query) {
              $query->orderBy('date', 'desc')->take(3); // Limit the number of articles to 3
          }])->find($id);

      $category->path = '/'.str_replace(' ','_',$category->name);

      foreach($category->subCategories as $subCategory){
          $subCategory->path = '/'.str_replace(' ','_',$subCategory->name);

          foreach($subCategory->articles as $article){
              $article->getMedia();
          }
      }

      return response()->json($category);
  }


}
