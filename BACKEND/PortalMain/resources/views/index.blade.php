@extends('layouts.app')

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
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="openModal()">
              Create Category
          </button>
      </div>
  @foreach($categories as $category)
         <a href="{{route('categories.show', ['id' => $category->id])}}" class="p-4 mb-4 bg-white rounded shadow flex justify-between">
             <div>
                 <h2 class="text-xl font-bold mb-2">{{ $category->name }}</h2>
             </div>
         </a>
  @endforeach

   <!-- Create Subcategory Modal -->
       <div id="createCategory" class="modal">
           <!-- Modal content -->
           <div class="modal-content">
               <span class="close" onclick="closeModal()">&times;</span>
               <h2>Create Category</h2>
               <form action="{{ route('categories.store') }}" method="POST">
                   @csrf
                   <div class="mb-4">
                       <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                       <input type="text" id="name" name="name" class="form-input mt-1 block w-full" required>
                   </div>
                   <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
               </form>
           </div>
       </div>
 </div>


   <script>
       function openModal() {
           document.getElementById('createCategory').style.display = 'block';
       }

       function closeModal() {
           document.getElementById('createCategory').style.display = 'none';
       }
   </script>

@endsection
