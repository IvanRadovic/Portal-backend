@extends('layouts.app')

@section('content')
    </div>
    <div class="bg-gray-100 p-4 pb-4 mb-5 rounded overflow-auto h-screen pt-5">
        <form action="{{ route('articles.update', ['id' => $article->id]) }}"  method="POST"  class="w-full max-w-g p-3 mx-auto mt-5">
            @csrf
            @method('PUT')
            <div class="flex flex-wrap mb-8">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <input type="text" id="title" name="title" value="{{ $article->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex flex-wrap mb-6">
                <label for="subtitle" class="block text-gray-700 text-sm font-bold mb-2">Subtitle:</label>
                <input type="text" id="subtitle" name="subtitle" value="{{ $article->subtitle }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex flex-wrap mb-6">
                <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Author:</label>
                <input type="text" id="author" name="author" value="{{ $article->author }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex flex-wrap mb-6">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                <textarea id="content" name="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{!! $article->content !!}</textarea>
            </div>
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
