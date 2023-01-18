@extends('layout')

@section('title')
    Create
@endsection

@section('content')
    @include('inc.errors')

    <form class="card p-3" method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">

            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="title">
        </div>

        <div class="form-group my-2">

            <textarea class="form-control" name="desc" placeholder="Description" rows="3">{{ old('desc') }}</textarea>
        </div>
        <div class="form-group py-2">

            <input type="file" name="img" class="form-control-file">
        </div>
        <h3>Select Categories:</h3>
        @foreach ($categories as $category)
            <div class="form-check mx-4 ">
                <input class="form-check-input" name="category_ids[]" value="{{ $category->id }} " type="checkbox" id="{{ $category->id }}">
                <label class="form-check-label " for="{{ $category->id }}">
                    -{{ $category->name }}
                </label>
            </div>
        @endforeach
        <br>
        <button type="submit" class="btn btn-primary m-2">Create</button>
    </form>
@endsection
