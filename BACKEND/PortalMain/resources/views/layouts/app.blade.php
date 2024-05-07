<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Task list App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }
        .link {
            @apply font-medium text-gray-700 underline decoration-pink-500
        }

        body{

        }
    </style>
    {{-- blade-formatter-enable --}}
    @yield('styles')
</head>
<body class="w-full pt-10 pb-10">
<nav class="mb-4 bg-blue-500 p-3 rounded text-white sticky top-0 text-lg">
    <a class="mx-2 hover:text-gray-200" data-ajax href="{{ url('/') }}">Categories</a> |
    <a class="mx-2 hover:text-gray-200" data-ajax href="{{ url('/subcategories') }}">Subcategories</a> |
    <a class="mx-2 hover:text-gray-200" data-ajax href="{{ url('/articles') }}">Articles</a>
</nav>
<h1 class="mb-4 text-2xl mx-3 py-2">@yield('title')</h1>

<div>
    @yield('content')

</div>
    @yield('scripts')
</body>
</html>
