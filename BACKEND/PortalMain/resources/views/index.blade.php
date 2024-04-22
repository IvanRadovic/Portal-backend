@extends('layouts.app')

@section('title', $title)

@section('content')

 <div class="bg-gray-100 p-4 pb-4 mb-5 rounded h-screen">
  @foreach($categories as $category)
         <a href="{{route('categories.show', ['id' => $category->id])}}" class="p-4 mb-4 bg-white rounded shadow flex justify-between">
             <div>
                 <h2 class="text-xl font-bold mb-2">{{ $category->name }}</h2>
             </div>
         </a>
     @endforeach
 </div>

@endsection
