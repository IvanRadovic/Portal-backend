@extends('layouts.layoutMaster')

@section('content')
    <div id="createArticleModal">
        <div class="modal-content">
            @include('_part.msg')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="text-xl font-bold mb-4">{{ $subcategory->name }}</h2>
                                    <!-- Delete Form -->
                                    <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Update Form -->
                            <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST" class="row g-3">
                                @csrf
                                @method('PUT')
                                <div class="col-12">
                                    <div class="">
                                        <label for="name" class="mr-2">Name:</label>
                                        <input type="text" id="name" name="name" value="{{ $subcategory->name }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="">
                                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                                        <select id="category_id" name="category_id" class="form-control" required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                        @if($subcategory->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
