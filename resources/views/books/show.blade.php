@extends('layout')
@section('title')
    Show Book
@endsection
@section('content')
    <h3>Book ID: {{ $book->id }}</h3>

    <hr>
    <div class="card m-3">
        <div class="card" style="width: 25rem;">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                    <div class="card-body">

                        <h3 class="card-title">{{ ucwords($book->title) }}</h3>

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
                        <img class="card-img-top" src="{{ asset('uploads/books/' . $book->img) }}" alt="no Img"
                            style="">
                    @else
                        <img class="card-img-top" style="flex: flex-end" src="{{ asset('uploads/books/noimage1.png') }}"
                            alt="no Img"style="width: 100px; height: 100px;">
                    @endif
                </div>
            </div>
            <div class="card-body">

                <a class="card-link" href="{{ route('books.index') }}">
                    <button type="submit" class="btn btn-primary">Back</button>
                </a>
                <a class="card-link" href="{{ route('books.edit', $book->id) }}">
                    <button type="submit" class="btn btn-success">Edit Book</button>
                </a>
                @auth
                    @if (Auth::user()->is_admin == 1)
                        <a class="card-link" href="{{ route('books.delete', $book->id) }}">
                            <button type="submit" class="btn btn-danger">Delete Book</button>
                        </a>
                    @endif
                @endauth

            </div>
        </div>
    </div>


    <hr>
    <a href="{{ route('books.index') }}">Back</a>
@endsection
