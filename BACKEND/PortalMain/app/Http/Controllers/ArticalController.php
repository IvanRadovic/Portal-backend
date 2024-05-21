<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\DateTimeConversations;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Author;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ArticalController extends Controller
{

    private DateTimeConversations $dateTimeConversations;

    public function __construct(DateTimeConversations $dateTimeConversations) {
        $this->dateTimeConversations = $dateTimeConversations;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index(Request $request)
  {
      $search = $request->get('search');
      $query = Articles::query();

      if ($search) {
          $query->where('title', 'like', "%{$search}%");
      }

      $articles = $query->orderBy('id', 'desc')->paginate(10);
      $categories = Category::all();
      $authors = Author::all();

      return view('articles', ['title' => 'Articles','articles' => $articles, 'categories' => $categories, 'authors' => $authors]);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $authors = Author::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('articles.create', ['title'=> 'Create Article','categories' => $categories, 'subcategories' => $subcategories, 'authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'author_id' => 'required',
            'content' => 'required',
            'cover' => 'required',
        ]);

        $datum = $this->dateTimeConversations->customToStandard(request('date'));

        $article = new Articles();

        $article->date = $datum;
        $article->title = request('title');
        $article->content = request('content');
        $article->subtitle = request('subtitle');
        $article->category_id = request('category_id');
        $article->subcategory_id = request('subcategory_id');
        $article->author_id = request('author_id');
        $article->is_published = $request->is_published ? 1 : 0;

        $article->save();

        if($request->hasFile('cover')){
            if ($article->getFirstMedia('cover'))
                $article->getFirstMedia('cover')->delete();

            $article->addMedia($request->file('cover'))
                ->toMediaCollection('cover');
        }

        return redirect('/articles/'.$article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Articles::
            select('article.*', DB::raw('DATE_FORMAT(date, "%d-%m-%Y %H:%i") as date'),)
            ->find($id);
        $authors = Author::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('articles.show', ['title'=> 'Edit','article' => $article, 'categories' => $categories, 'subcategories' => $subcategories, 'authors' => $authors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        request()->validate([
            'title' => 'required',
            'author_id' => 'required',
            'content' => 'required'
        ]);

        $datum = $this->dateTimeConversations->customToStandard(request('date'));

        $article = Articles::find($id);
        $article->date = $datum;
        $article->title = request('title');
        $article->subtitle = request('subtitle');
        $article->author_id = request('author_id');
        $article->content = request('content');
        $article->is_published = $request->is_published ? 1 : 0;

        $article->save();

        if($request->hasFile('cover')){
            if ($article->getFirstMedia('cover'))
                $article->getFirstMedia('cover')->delete();

            $article->addMedia($request->file('cover'))
                    ->toMediaCollection('cover');
       }

       if($request->hasFile('gallery')){
            foreach($request->file('gallery') as $file){
                $article->addMedia($file)
                        ->toMediaCollection('gallery');
            }
       }

        return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Articles::find($id)->delete();
        // Session::flash('message', 'Successfully deleted the article!');
        Session::flash('success', 'Successfully deleted the article!');

        return redirect('/articles');
    }
}
