@extends('layouts.app')

@section('content')
    </div>
    <div class="bg-gray-100 p-4 pb-4 mb-5 rounded overflow-auto h-screen pt-5">
        @include('_part.msg')
        <form action="{{ route('articles.update', ['id' => $article->id]) }}"  method="POST" enctype="multipart/form-data" class="w-full max-w-g p-3 mx-auto mt-5">
            @csrf
            @method('PUT')
            <label for="date" class="block text-sm font-medium text-gray-700">Pushed at:</label>
            <input type="date" id="date" name="date" class="form-input mt-1 block w-full" required
                   style="border: 2px solid #6c757d; border-radius: 5px; padding: 5px;" value="{{ $article->date }}">
            <div class="flex flex-wrap mb-8">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <input type="text" id="title" name="title" value="{{ $article->title }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex flex-wrap mb-6">
                <label for="subtitle" class="block text-gray-700 text-sm font-bold mb-2">Subtitle:</label>
                <input type="text" id="subtitle" name="subtitle" value="{{ $article->subtitle }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex flex-wrap mb-6">
                <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Author:</label>
                <select id="author_id" name="author_id" class="form-select mt-1 block w-full" required>
                  @foreach($authors as $author)
                   <option value="{{ $author->id }}"
                   @if($article->author_id == $author->id) selected @endif>{{ $author->name }} {{$author->lastname}}</option>
                  @endforeach
                </select>
            </div>
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                <textarea id="content" name="content"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{!! $article->content !!}</textarea>

            <br>
            <label for="is_published" class="block text-sm font-medium text-gray-700">Is published:</label>
            <input type="checkbox" name="is_published" id="is_published" value="1" class="form-control" @if($article->is_published) checked @endif />
            <br>
            <input type="file" name="cover" class="form-control" id="image">
            <input type="file" name="gallery[]" class="form-control" id="image" multiple>
            <!-- Add more fields as needed -->
            <div class="flex flex-wrap mt-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Save Changes</button>
                <button type="button" onclick="if (confirm('Are you sure you want to delete this article?')) {document.querySelector('#deleteArticle').submit()}"
                class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">delete</button>
            </div>
        </form>

        <form action="{{ route('articles.destroy', ['id' => $article->id]) }}"
            method='POST' id="deleteArticle">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('content');
    </script>

    <script>
        document.querySelector('#deleteArticle').addEventListener('click', function() {
            if (confirm('Are you sure you want to delete this article?')) {
                document.querySelector('#deleteArticle').submit();
            }
        });
    </script>
@endsection
