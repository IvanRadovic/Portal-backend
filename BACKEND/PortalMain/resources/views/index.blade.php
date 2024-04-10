@extends('layouts.app')

@section('title', $title)

@section('content')
    @foreach($categories as $category)
        <div style="display:flex; justify-content:center; align-items:center">
            <h2>{{ $category-> name }}</h2>
          <div><a href="{{ route('categories.show', $category->id) }}">View</a></div>
        </div>
    @endforeach

@endsection
