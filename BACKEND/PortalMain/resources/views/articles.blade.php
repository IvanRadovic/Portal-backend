@extends('layouts/layoutMaster')

@section('title', $title)

@section('vendor-style')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection

@section('content')
    <!-- Search form -->
    <div style="display:flex; align-items:center; justify-content:center; margin-top: 20px;">
        <form action="{{ request()->url() }}" method="GET">
            <input type="text" name="search" placeholder="Search for articles" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <button type="submit" class="btn btn-primary">Search</button>
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

            {{ $articles->links() }}
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
