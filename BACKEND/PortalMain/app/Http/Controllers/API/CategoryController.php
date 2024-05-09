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
      $categories = Category::all();

      $categories = $categories->map(function ($category) {
              $category->articles = $category->articles()->latest()->take(3)->get();
          return $category;
      });

      return response()->json($categories);
  }


}
