@extends('layout')
@section('title')
    Show Book
@endsection
@section('content')
    <h3 style="color: rgb(6, 58, 103) ; font-family:fantasy">Book ID: {{ $book->id }}</h3>

    <hr>
    <div class="card m-3">
        <div class="card" style="width: 25rem;">
            <h3 class="card-title bg-secondary">{{ ucwords($book->title) }}</h3>
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                    <div class="card-body">
                        <p class="card-text">{{ ucwords($book->desc) }}</p>
                        <hr>
                        <h3 class="card-title">Categories:</h3>
                        <ul>

                            @foreach ($book->categories as $category)
                                <li>{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col mb-4">
                    @if ($book->img !== null)
                        <img class="card-img-top" src="{{ asset('uploads/books/' . $book->img) }}" alt="no Img">
                    @else
                        <img class="card-img-top" style="flex: flex-end" src="{{ asset('uploads/books/noimage1.png') }}">
                    @endif
                </div>
            </div>
            <div class="card-body">

                <a class="card-link btn btn-primary" href="{{ route('books.index') }}">Back</a>
                <a class="card-link btn btn-success" href="{{ route('books.edit', $book->id) }}">Edit Book</a>
                @auth
                    @if (Auth::user()->is_admin == 1)
                        <a class="card-link btn btn-danger" href="{{ route('books.delete', $book->id) }}">Delete Book</a>
                    @endif
                @endauth

            </div>
        </div>
    </div>


    <hr>
    <a href="{{ route('books.index') }}">Back</a>
@endsection
