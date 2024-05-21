@extends('layouts.layoutMaster')

@section('title', $title)

@section('content')

<div id="createCategory">
    <div class="modal-content" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px;">
        <h2 style="color: #6c757d;">Create Author</h2>
        <form action="{{ route('authors.store') }}" method="POST" style="margin-top: 20px;" enctype="multipart/form-data">
            @csrf
            <div class="mb-4" style="margin-bottom: 20px;">
                <label for="name" class="block text-sm font-medium text-gray-700">Logo:</label>
                <input type="file" id="name" name="cover" class="form-input mt-1 block w-full" required style="border: 2px solid #6c757d; border-radius: 5px; padding: 5px;">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="form-input mt-1 block w-full" required style="border: 2px solid #6c757d; border-radius: 5px; padding: 5px;">
                <label for="name" class="block text-sm font-medium text-gray-700">Lastname</label>
                <input name="lastname" type="text"  class="form-input mt-1 block w-full" style="border: 2px solid #6c757d; border-radius: 5px; padding: 5px;">
                <label for="type" class="block text-sm font-medium text-gray-700">Type of author:</label>
                <input type="text" id="type" name="type" class="form-input mt-1 block w-full" required style="border: 2px solid #6c757d; border-radius: 5px; padding: 5px;">
                <label for="name" class="block text-sm font-medium text-gray-700">Biography</label>
                <textarea id="content" name="biography" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" style="border: 2px solid #6c757d; border-radius: 5px; padding: 5px;"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" style="border: none; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">Create</button>
        </form>
    </div>
</div>
@endsection
