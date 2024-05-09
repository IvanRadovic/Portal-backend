@extends('layouts.app')

@section('content')

<style>
    input[type="text"], textarea, select {
        border: 1px solid #ccc;
        margin-bottom: 10px;
        padding: 10px;
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
</style>

    <div class="bg-gray-100 p-4 pb-4 mb-5 rounded h-screen">
        <h2 class="text-xl font-bold mb-4">AUTHOR: {{ $authors->name }} {{ $authors->lastname}}</h2>

        <!-- Update Form -->
       <form action="{{ route('authors.update', $authors->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
           @csrf
           @method('PUT')
           <div class="flex flex-col">
               <label for="avatar" class="mr-2">Avatar:</label>
               <input type="file" name="cover" class="form-control" id="image" placeholder="Image">
               <label for="name" class="mr-2">Name:</label>
               <input type="text" id="name" name="name" value="{{ $authors->name }}" class="border border-gray-300 rounded px-2 py-1">
               <label for="lastname" class="mr-2">Lastname:</label>
               <input type="text" id="lastname" name="lastname" value="{{ $authors->lastname }}" class="border border-gray-300 rounded px-2 py-1">
               <label for="name" class="mr-2">Type:</label>
               <input type="text" id="type" name="type" value="{{ $authors->type }}" class="border border-gray-300 rounded px-2 py-1">
               <label for="name" class="mr-2">Biography:</label>
               <textarea id="content" name="biography" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{!! $authors->biography !!}</textarea>
               <button type="submit" class="bg-blue-500 text-white px-4 py-1 ml-2 rounded">Update</button>
           </div>
       </form>


        <!-- Delete Form -->
        <form action="{{ route('authors.destroy', $authors->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded">Delete</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('content');
    </script>

@endsection
