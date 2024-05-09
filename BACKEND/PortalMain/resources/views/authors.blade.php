@extends('layouts.app')

@section('content')
<style>
/* Modal Styles */
.modal {
    display: none; /* Hidden by default */
    position: fixed;
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 50%; /* Could be more or less, adjust as needed */
}

/* Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

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
        <h1 class="mb-5">{{ $title }}</h1>
        <div style=" display:flex; align-items:center; justify-content:center;">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="openModal()">
               Create Author
            </button>
        </div>

        @foreach($authors as $author)
            <a href="{{ route('authors.show', ['id' => $author->id]) }}" class="p-4 mb-4 bg-white rounded shadow flex justify-between">
                    <div style="width:100%; display:flex; justify-content:space-between; align-items:center;">
                      <h2 class="text-xl font-bold mb-2">{{ $author->name }} {{ $author->lastname }}</h2>
                    </div>
                </a>
        @endforeach

        <div id="createCategory" class="modal">
                   <!-- Modal content -->
                   <div class="modal-content">
                       <span class="close" onclick="closeModal()">&times;</span>
                       <h2>Create Category</h2>
                       <form action="{{ route('authors.store') }}" method="POST">
                           @csrf
                           <div class="mb-4">
                               <label for="name" class="block text-sm font-medium text-gray-700">Logo:</label>
                               <input type="file" id="name" name="cover" class="form-input mt-1 block w-full" required>
                               <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                               <input type="text" id="name" name="name" class="form-input mt-1 block w-full" required>
                               <label for="name" class="block text-sm font-medium text-gray-700">Lastname</label>
                               <input name="lastname" type="text"  class="form-input mt-1 block w-full">
                               <label for="type" class="block text-sm font-medium text-gray-700">Type of author:</label>
                               <input type="text" id="type" name="type" class="form-input mt-1 block w-full" required>
                               <label for="name" class="block text-sm font-medium text-gray-700">Biography</label>
                               <textarea id="content" name="biography" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                           </div>
                           <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
                       </form>
                   </div>
               </div>
    </div>

       <script>
            CKEDITOR.replace('content');

           function openModal() {
               document.getElementById('createCategory').style.display = 'block';
           }

           function closeModal() {
               document.getElementById('createCategory').style.display = 'none';
           }
       </script>
@endsection
