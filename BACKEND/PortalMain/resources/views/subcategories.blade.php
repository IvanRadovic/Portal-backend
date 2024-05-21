@extends('layouts.layoutMaster')

@section('title', $title)

@section('content')
    <div class="col-md mb-4 mb-md-0">
        <div class="card">
            <h5 class="card-header">Subcategories</h5>
            <div class="card-body">
                @foreach($subcategories as $subcategory)
                    <div class="alert alert-dark" role="alert">
                        <a href="{{route('subcategories.show', ['id' => $subcategory->id])}}">
                            {{ $subcategory->name }}
                        </a>
                        -
                        <a href="{{route('categories.show', ['id' => $subcategory->category_id])}}" style="color: black">
                            {{ $subcategory->category->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
 @endsection
