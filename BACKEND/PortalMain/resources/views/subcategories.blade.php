@extends('layouts.layoutMaster')

@section('title', $title)

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

</style>

 <div class="bg-gray-100 p-4 pb-4 mb-5 rounded h-screen">

     <div style="display:flex; align-items:center; justify-content:center">
         <a href="{{ route('subcategories.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              Create Subcategory
          </a>
     </div>

     @foreach($subcategories as $subcat)
     <a href="{{ route('subcategories.show', ['id' => $subcat->id]) }}" class="p-4 mb-4 bg-white rounded shadow flex justify-between">
         <div>
             <h2 class="text-xl font-bold mb-2">{{ $subcat->name }}</h2>
         </div>
     </a>
     @endforeach

 </div>

 <script>
     function openModal() {
         document.getElementById('createSubcategoryModal').style.display = 'block';
     }

     function closeModal() {
         document.getElementById('createSubcategoryModal').style.display = 'none';
     }
 </script>

 @endsection
