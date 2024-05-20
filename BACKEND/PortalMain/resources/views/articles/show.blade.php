@extends('layouts.layoutMaster')

@section('title', $title)

@section('vendor-style')
    {{-- editor --}}
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
    {{-- date datumi --}}
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
@endsection

@section('vendor-script')
    {{-- editor --}}
    <script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
    {{-- date datumi --}}
    <script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
@endsection

@section('page-script')
    {{-- editor --}}
    <script>
        // Full Toolbar Editor
        // --------------------------------------------------------------------
        const fullToolbar = [
            [
                {
                    font: []
                },
                {
                    size: []
                }
            ],
            ['bold', 'italic', 'underline', 'strike'],
            [
                {
                    color: []
                },
                {
                    background: []
                }
            ],
            [
                {
                    script: 'super'
                },
                {
                    script: 'sub'
                }
            ],
            [
                {
                    header: '1'
                },
                {
                    header: '2'
                },
                'blockquote',
                'code-block'
            ],
            [
                {
                    list: 'ordered'
                },
                {
                    list: 'bullet'
                },
                {
                    indent: '-1'
                },
                {
                    indent: '+1'
                }
            ],
            [{ direction: 'rtl' }],
            ['link', 'image', 'video', 'formula'],
            ['clean']
        ];
        const quillContainer = document.querySelector('#full-editor');
        const fullEditor = new Quill(quillContainer, {
            bounds: '#full-editor',
            placeholder: 'Type Something...',
            modules: {
                formula: true,
                toolbar: fullToolbar
            },
            theme: 'snow'
        });
    </script>
    {{-- date datumi --}}
    <script>
        document.addEventListener('DOMContentLoaded', function (e) {
            (function () {
                const formValidation = document.getElementById('form');
                flatpickr(formValidation.querySelector('[name="date"]'), {
                    enableTime: true,
                    // See https://flatpickr.js.org/formatting/
                    dateFormat: 'd-m-Y H:i',
                });
            })();
        });

        document.getElementById('form').addEventListener('submit', function () {
            event.preventDefault();
            alert('asdfasdfasdf');

            const editorContent = fullEditor.root.innerHTML;
            console.log(editorContent);
            $("#hiddenArea").val(editorContent);

            document.getElementById('form').submit();
        });
    </script>
@endsection

@section('content')
    <div id="createArticleModal">
        <div class="modal-content">
            @include('_part.msg')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('articles.update', ['id' => $article->id]) }}" method="POST" class="row g-3" id="form" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-12">
                                    <div class="">
                                        <label for="date" class="block text-sm font-medium text-gray-700">Pushed at:</label>
                                        <input type="text" id="date" name="date" value="{{ $article->date }}"
                                               class="form-control" required >
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="">
                                        <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                                        <input type="text" id="title" name="title" value="{{ $article->title }}"
                                               class="form-control" required >
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="">
                                        <label for="subtitle" class="block text-sm font-medium text-gray-700">Subtitle:</label>
                                        <input type="text" id="subtitle" name="subtitle" value="{{ $article->subtitle }}"
                                               class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="">
                                        <label for="categorySelect" class="block text-sm font-medium text-gray-700">Category:</label>
                                        <div>
                                            <select id="categorySelect" name="category_id" class="form-control"
                                                    required>
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" @if($article->category_id == $category->id) selected @endif
                                                            data-subcategories="{{ json_encode($category->subcategories) }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <select id="subcategorySelect" name="subcategory_id" class="form-control">
                                                <option value="">Select Subcategory</option>
                                                @foreach($subcategories as $subcategory)
                                                    @if($subcategory->category_id == $article->category_id)
                                                        <option value="{{ $subcategory->id }}"
                                                                @if($article->subcategory_id == $subcategory->id) selected @endif>{{ $subcategory->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="">
                                        <label for="author_id" class="block text-sm font-medium text-gray-700">Author:</label>
                                        <select id="author_id" name="author_id" class="form-control" >
                                            @foreach($authors as $author)
                                                <option value="{{ $author->id }}"
                                                        @if($author->author_id == $author->id) selected @endif>{{ $author->name }} {{$author->lastname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{--
                                <label for="content" class="block text-sm font-medium text-gray-700">Content:</label>
                                <textarea id="content" name="content"
                                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                          required></textarea>
                                --}}

                                <!-- Full Editor -->
                                <div class="col-12">
                                    <div class="">
                                        <h5 class="card-header">Content</h5>
                                        <div class="card-body">
                                            <div id="full-editor">{!! $article->content !!}</div>
                                        </div>

                                        <textarea name="content" id="hiddenArea" style="visibility: hidden"></textarea>
                                    </div>
                                </div>
                                <!-- /Full Editor -->

                                <div class="col-12">
                                    <div class="">
                                        <label for="is_published" class="block text-sm font-medium text-gray-700">Is published:</label>
                                        <input type="checkbox" name="is_published" @if($article->is_published) checked @endif
                                               id="is_published" value="1" class="form-check-input"/>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="">
                                        <input type="file" name="cover" class="form-control" id="image" accept="image/*" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="">
                                        <input type="file" name="gallery[]" class="form-control" id="image" multiple>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="submitButton" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // CKEDITOR.replace('content');

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
