@extends('layout')

@section('title')
All Books
@endsection

@section('content')
<h1>All Books</h1>

@foreach ($books as $book)
<hr>


<div class="card" style="width: 25rem;">
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col mb-4">
            <div class="card-body">
                <h3 class="card-title"> <a class="card-link" href="{{ route('books.show', $book->id) }}">
                        {{ ucwords($book->title) }}
                    </a>
                </h3>
                <p class="card-text">{{ ucwords($book->desc) }}</p>
            </div>
        </div>
        <div class="col ">
            @if ($book->img !== null)
            <img class="card-img-top" src="{{ asset('uploads/books/' . $book->img) }}" alt="no Img" style="">
            @else
            <img style="flex: flex-end" class="card-img-top " src="{{ asset('uploads/books/noimage1.png') }}"
                alt="no Img" style="width: 100px; height: 100px;">
            @endif
        </div>
    </div>
    <div class="card-body">

        <a class="card-link" href="{{ route('books.show', $book->id) }}">
            <button type="submit" class="btn btn-primary">Show Book</button>
        </a>
        <a class="card-link" href="{{ route('books.edit', $book->id) }}">
            <button type="submit" class="btn btn-success">Edit Book</button>
        </a>
        <a class="card-link" href="{{ route('books.delete', $book->id) }}">
            <button type="submit" class="btn btn-danger">Delete Book</button>
        </a>
    </div>
</div>
@endforeach

<hr>
<button type="submit" class=" btn btn-primary mb-2"><a class="text-light"
        href="{{ route('books.create') }}">Creete</a></button>

<hr>

{{ $books->render() }}
@endsection
