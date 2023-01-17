@extends('layout')

@section('title')
    Create
@endsection

@section('content')
    @include('inc.errors')

    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
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
        <button type="submit" class="btn btn-primary mb-2">Create</button>
    </form>
@endsection
