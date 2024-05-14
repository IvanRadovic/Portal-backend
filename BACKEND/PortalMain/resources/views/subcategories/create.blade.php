@extends('layouts.app')

@section('title', $title)

@section('content')

<div id="createSubcategoryModal" class="modal">
    <div class="modal-content" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px;">
        <form action="{{ route('subcategories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="form-input mt-1 block w-full" required style="border: 2px solid #6c757d; border-radius: 5px; padding: 5px;">
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category_id" name="category_id" class="form-select mt-1 block w-full" required style="border: 2px solid #6c757d; border-radius: 5px; padding: 5px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.1);">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" style="border: none; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">Create</button>
        </form>
    </div>
</div>

@endsection
