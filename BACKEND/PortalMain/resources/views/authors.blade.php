@extends('layouts.layoutMaster')

@section('content')
        <!-- Popular Product -->
        <div class="col-md-12 col-xl-12 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title m-0 me-2">
                        <h5 class="m-0 me-2">Authors</h5>
                        <small class="text-muted">Total {{ $total }} Authors</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="popularProduct" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="popularProduct">
                            @foreach($types as $type)
                                <a class="dropdown-item" href="{{ url('authors') }}?type={{ $type->name }}">{{ $type->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        @foreach($authors as $author)
                            <li class="d-flex mb-4 pb-1" onclick="window.location = '{{ route('authors.show', ['id' => $author->id]) }}'">
                                <div class="me-3">
                                    @foreach($author->getMedia('cover') as $file)
                                        <img src="{{ $file->getUrl() }}" alt="Author" class="rounded" width="46">
                                    @endforeach
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">{{ $author->name }} {{ $author->lastname }}</h6>
                                        <small class="text-muted d-block">Tip: {{ $author->type }}</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <p class="mb-0 fw-medium">{{ $author->articles_count }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
@endsection
