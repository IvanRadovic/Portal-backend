@extends('layouts/layoutMaster')

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
        <a href="{{ route('articles.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
             Create Article
        </a>
    </div>

    <!-- Search form -->
    <div style="display:flex; align-items:center; justify-content:center; margin-top: 20px;">
        <form action="{{ request()->url() }}" method="GET">
            <input type="text" name="search" placeholder="Search for articles" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
        </form>
    </div>

    <div class="bg-gray-100 p-4 pb-4 mb-5 rounded h-screen">
        @include('_part.msg')

        <div class="row mb-5">
        @foreach($articles as $art)
            {{--<a href="{{ route('articles.show', $art->id) }}" class="p-4 mb-4 bg-white rounded shadow flex justify-between">
                <div>
                    <h2 class="text-xl font-bold mb-2">{{ $art->title }}</h2>
                   <p class="text-gray-700">{{ Str::limit(strip_tags($art->content), 200) }}</p>
                </div>
            </a>--}}
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        @foreach($art->getMedia('cover') as $file)
                            <img class="card-img-top" src="{{ $file->getUrl() }}" alt="Card image cap">
                        @endforeach
                        <div class="card-body">
                            <h5 class="card-title">{{ $art->title }}</h5>
                            <p class="card-text">
                                {{ Str::limit(strip_tags($art->content), 200) }}
                            </p>
                            <a href="{{ route('articles.show', $art->id) }}" class="btn btn-outline-primary waves-effect">Edit</a>
                        </div>
                    </div>
                </div>
        @endforeach
        </div>
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
