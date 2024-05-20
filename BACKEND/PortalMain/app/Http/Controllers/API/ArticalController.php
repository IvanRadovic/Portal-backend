<?php

namespace App\Http\Controllers\API;
use App\Models\Articles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
   {
       // Retrieve the query parameters from the request
       $categoryId = $request->get('category_id');
       $subcategoryId = $request->get('subcategory_id');
       $authorId = $request->get('author_id');
       $searchString = $request->get('search');
       $perPage = $request->get('per_page', 10);

       // Initialize the query
       $query = Articles::with('media');

       // Add conditions to the query
       if ($categoryId) {
           $query->where('category_id', $categoryId);
       }

       if ($authorId) {
           $query->where('author_id', $authorId);
       }

       if ($subcategoryId) {
           $query->where('subcategory_id', $subcategoryId);
       }

       if ($searchString) {
           $query->where(function ($query) use ($searchString) {
               $query->where('title', 'LIKE', "%{$searchString}%")
                     ->orWhere('subtitle', 'LIKE', "%{$searchString}%")
                     ->orWhere('content', 'LIKE', "%{$searchString}%");
           });
       }

       // Execute the query and paginate the results
       $articles = $query->where('is_published', 1)->paginate($perPage);

       // Return the results as a JSON response
       return response()->json($articles);
   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Articles::with(['media','categories','subcategories'])
            ->where('is_published', 1)
            ->find($id);

        return response()->json($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
