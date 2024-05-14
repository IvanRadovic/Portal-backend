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
           <a href="{{ route('authors.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
             Create Author
           </a>
        </div>

        @foreach($authors as $author)
            <a href="{{ route('authors.show', ['id' => $author->id]) }}" class="p-4 mb-4 bg-white rounded shadow flex justify-between">
                    <div style="width:100%; display:flex; justify-content:space-between; align-items:center;">
                      <h2 class="text-xl font-bold mb-2">{{ $author->name }} {{ $author->lastname }}</h2>
                    </div>
                </a>
        @endforeach

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
