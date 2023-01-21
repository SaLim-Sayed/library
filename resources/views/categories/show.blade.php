@extends('layout')
@section('title')
    Show Category
@endsection
@section('content')
    <h3 style="color: rgb(6, 58, 103) ; font-family:fantasy">Category ID: {{ $category->id }}</h3>

    <hr>
    <div class="card m-3">
        <div class="card" style="width: 30rem;">

            <div class="col">
                <div class="card">

                    <h3 class="card-title btn btn-secondary">{{ ucwords($category->name) }}</h3>
                    <h3 class="card-title">Books:</h3>
                    <ul>

                        @foreach ($category->books as $book)
                            <li>{{ $book->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="card-body">

                <a class="card-link" href="{{ route('categories.index') }}">
                    <button type="submit" class="btn btn-primary">Back</button>
                </a>
                <a class="card-link" href="{{ route('categories.edit', $category->id) }}">
                    <button type="submit" class="btn btn-success">Edit Category</button>
                </a>
                <a class="card-link" href="{{ route('categories.delete', $category->id) }}">
                    <button type="submit" class="btn btn-danger">Delete Category</button>
                </a>

            </div>
        </div>
    </div>


    <hr>
    <a href="{{ route('categories.index') }}">Back</a>
@endsection
