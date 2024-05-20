@extends('layouts.layoutMaster')

@section('content')
    <div class="bg-gray-100 p-4 pb-4 mb-5 rounded h-screen">
        <h2 class="text-xl font-bold mb-4">{{ $category->name }}</h2>

        <!-- Update Form -->
       <form action="{{ route('categories.update', $category->id) }}" method="POST" class="mb-4">
           @csrf
           @method('PUT')
           <div class="flex items-center">
               <label for="name" class="mr-2">Name:</label>
               <input type="text" id="name" name="name" value="{{ $category->name }}" class="border border-gray-300 rounded px-2 py-1">
               <button type="submit" class="bg-blue-500 text-white px-4 py-1 ml-2 rounded">Update</button>
           </div>
       </form>


        <!-- Delete Form -->
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded">Delete</button>
        </form>
    </div>
@endsection
