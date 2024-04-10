@extends('layouts.app')

@section('title', $title)

@section('content')
     <div class="bg-gray-100 p-4 rounded overflow-auto h-screen">
        @foreach($articles as $art)
            <div class="p-4 mb-4 bg-white rounded shadow">
                <h2 class="text-xl font-bold mb-2">{{ $art->title }}</h2>
                <p class="text-gray-700">{{ Str::limit($art->content, 100) }}</p>
                <a href="{{ route('articles.show', $art->id) }}" class="text-blue-500 hover:underline">Read More</a>
            </div>
        @endforeach
    </div>
@endsection
