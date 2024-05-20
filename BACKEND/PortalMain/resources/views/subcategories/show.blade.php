@extends('layouts.layoutMaster')

@section('content')
    <div class="bg-gray-100 p-4 pb-4 mb-5 rounded h-screen">
        <h2 class="text-xl font-bold mb-4">{{ $subcategory->name }}</h2>

        <!-- Update Form -->
       <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST" class="mb-4">
           @csrf
           @method('PUT')
           <div class="flex items-center">
               <label for="name" class="mr-2">Name:</label>
               <input type="text" id="name" name="name" value="{{ $subcategory->name }}" class="border border-gray-300 rounded px-2 py-1">
           </div>
            <div class="mb-4">
               <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
               <select id="category_id" name="category_id" class="form-select mt-1 block w-full" required>
                   @foreach($categories as $category)
                       <option value="{{ $category->id }}"
                       @if($subcategory->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                   @endforeach
               </select>
           </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-1 ml-2 rounded">Update</button>
       </form>


        <!-- Delete Form -->
        <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded">Delete</button>
        </form>
    </div>
@endsection
