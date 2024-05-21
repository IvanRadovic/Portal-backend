@extends('layouts.layoutMaster')

@section('title', $title)

@section('content')
    <div class="col-md mb-4 mb-md-0">
        <div class="card">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
                @foreach($categories as $category)
                <div class="alert alert-dark" role="alert">
                    <a href="{{route('categories.show', ['id' => $category->id])}}">
                    {{ $category->name }}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
