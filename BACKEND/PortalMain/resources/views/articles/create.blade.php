@extends('layouts.app')

@section('title', $title)

@section('content')
    <div id="createArticleModal" class="modal">
        <div class="modal-content" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px;">
            @include('_part.msg')
            <form action="{{ route('articles.store') }}" method="POST" style="margin-top: 20px;">
                @csrf
                <div class="mb-4" style="margin-bottom: 20px;">
                    <label for="date" class="block text-sm font-medium text-gray-700">Pushed at:</label>
                    <input type="date" id="date" name="date" class="form-input mt-1 block w-full" required
                           style="border: 2px solid #6c757d; border-radius: 5px; padding: 5px;">

                    <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                    <input type="text" id="title" name="title" class="form-input mt-1 block w-full" required
                           style="border: 2px solid #6c757d; border-radius: 5px; padding: 5px;">
                    <label for="subtitle" class="block text-sm font-medium text-gray-700">Subtitle:</label>
                    <input type="text" id="subtitle" name="subtitle" class="form-input mt-1 block w-full"
                           style="border: 2px solid #6c757d; border-radius: 5px; padding: 5px;" required>
                    <label for="categorySelect" class="block text-sm font-medium text-gray-700">Category:</label>
                    <div style="display: flex; justify-content: space-between;">
                        <select id="categorySelect" name="category_id" class="form-input mt-1 block w-full"
                                style="border: 2px solid #6c757d; border-radius: 5px; padding: 5px; flex: 1; margin-right: 10px;" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        data-subcategories="{{ json_encode($category->subcategories) }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <select id="subcategorySelect" name="subcategory_id"
                                style="display: none; border: 2px solid #6c757d; border-radius: 5px; padding: 5px; flex: 1; margin-left: 10px;">
                            <option value="">Select Subcategory</option>
                        </select>
                    </div>
                    <label for="author_id" class="block text-sm font-medium text-gray-700">Author:</label>
                    <select id="author_id" name="author_id" class="form-input mt-1 block w-full"
                            style="border: 2px solid #6c757d; border-radius: 5px; padding: 5px;">
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}"
                                    @if($author->author_id == $author->id) selected @endif>{{ $author->name }} {{$author->lastname}}</option>
                        @endforeach
                    </select>
                    <label for="content" class="block text-sm font-medium text-gray-700">Content:</label>
                    <textarea id="content" name="content"
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              style="border: 2px solid #6c757d; border-radius: 5px; padding: 5px;" required></textarea>
                    <br>
                    <label for="is_published" class="block text-sm font-medium text-gray-700">Is published:</label>
                    <input type="checkbox" name="is_published" id="is_published" value="1" class="form-control"/>
                    <br>
                    <input type="file" name="cover" class="form-control" id="image" required>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        style="border: none; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">Create
                </button>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('content');

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
