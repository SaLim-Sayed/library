@extends('layout')

@section('title')
    Edit Category
@endsection

@section('content')
    @include('inc.errors')
    <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" value="{{ old('name') ?? $category->name }}"
                placeholder="name">
        </div>

        <button type="submit" class="btn btn-primary mb-2">Edit Book</button>
    </form>
@endsection
