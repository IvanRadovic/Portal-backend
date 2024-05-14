<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        $title = 'Authors';

        return view('authors', compact('authors', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('authors.create', ['title' => 'Create Author']);
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
        $author = new Author();
        $author->name = request('name');
        $author->lastname = request('lastname');
        $author->biography = request('biography');
        $author->type = request('type');

        $author->save();

         if($request->hasFile('cover')){
              $author->addMedia($request->file('cover'))
                     ->toMediaCollection('cover');
         }

        return redirect('/authors');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $authors = Author::find($id);
        $title = 'Author';

        return view('authors.show', compact('authors', 'title'));
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
        //

         request()->validate([
            'name' => 'required',
            'lastname' => 'required',
            'type' => 'required',
            'biography' => 'required'
         ]);

        $author = Author::find($id);
        $author->name = request('name');
        $author->lastname = request('lastname');
        $author->biography = request('biography');
        $author->type = request('type');

        $author->save();

         if($request->hasFile('cover')){
              $author->getFirstMedia('cover')->delete();

              $author->addMedia($request->file('cover'))
                     ->toMediaCollection('cover');
          }

        return redirect('/authors');
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
        $author = Author::find($id)->delete();

        return redirect('/authors');
    }
}
