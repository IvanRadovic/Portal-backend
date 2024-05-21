@extends('layouts.layoutMaster')

@section('title', $title)

@section('content')
    <div id="createArticleModal">
        <div class="modal-content">
            @include('_part.msg')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('categories.store') }}" method="POST" class="row g-3">
                                @csrf
                                <div class="col-12">
                                    <div class="">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
