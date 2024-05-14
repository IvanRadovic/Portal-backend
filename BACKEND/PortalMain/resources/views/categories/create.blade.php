@extends('layouts.app')

@section('title', $title)

@section('content')

<div id="createCategory" class="modal">
   <div class="modal-content" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px;">
       <form action="{{ route('categories.store') }}" method="POST">
           @csrf
           <div class="mb-4">
               <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
               <input type="text" id="name" name="name" class="form-input mt-1 block w-full" required style="border: 2px solid #6c757d; border-radius: 5px; padding: 5px;">
           </div>
           <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
       </form>
   </div>
</div>

@endsection
