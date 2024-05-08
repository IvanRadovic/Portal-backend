@extends('layouts.app')

@section('title', $title)

@section('content')
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 5px;
            position: relative;
        }

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

        input[type="text"],
        textarea,
        button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>

    <div style="display:flex; align-items:center; justify-content:center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="openModal()">
            Create Article
        </button>
    </div>

    <div id="createArticleModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <form action="{{ route('articles.store') }}" method="post">
                @csrf
                <input type="text" name="title" placeholder="Title"><br><br>
                <input type="text" name="subtitle" placeholder="Subtitle"><br><br>
                <input type="text" name="author" placeholder="Author"><br><br>
                 <select id="categorySelect" name="category_id">
                     <option value="">Select Category</option>
                     @foreach($categories as $category)
                         <option value="{{ $category->id }}" data-subcategories="{{ json_encode($category->subcategories) }}">{{ $category->name }}</option>
                     @endforeach
                 </select>

                 <select id="subcategorySelect" name="subcategory_id" style="display: none;">
                     <option value="">Select Subcategory</option>
                 </select>
                <textarea name="content" placeholder="Content"></textarea><br><br>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <div class="bg-gray-100 p-4 pb-4 mb-5 rounded h-screen">
        @include('_part.msg')
        @foreach($articles as $art)
            <a href="{{ route('articles.show', $art->id) }}" class="p-4 mb-4 bg-white rounded shadow flex justify-between">
                <div>
                    <h2 class="text-xl font-bold mb-2">{{ $art->title }}</h2>
                    <p class="text-gray-700">{{ Str::limit($art->content, 200) }}</p>
                </div>
            </a>
        @endforeach
    </div>

    <script>
        function openModal() {
            document.getElementById('createArticleModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('createArticleModal').style.display = 'none';
        }

            document.addEventListener('DOMContentLoaded', function () {
                 var categorySelect = document.getElementById('categorySelect');
                 var subcategorySelect = document.getElementById('subcategorySelect');

                 categorySelect.addEventListener('change', function () {
                     var selectedCategoryId = this.value;
                     var subcategories = JSON.parse(this.options[this.selectedIndex].getAttribute('data-subcategories'));

                     if (selectedCategoryId !== '') {
                         subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';

                         subcategories.forEach(function (subcategory) {
                             var option = document.createElement('option');
                             option.value = subcategory.id;
                             option.textContent = subcategory.name;
                             subcategorySelect.appendChild(option);
                         });
                         subcategorySelect.style.display = 'block';
                     } else {
                         subcategorySelect.style.display = 'none';
                     }
                 });
             });
    </script>
@endsection
