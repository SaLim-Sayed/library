@extends('layout')

@section('title')
    All Books
@endsection

@section('content')
    <h1>All Books</h1>

    @foreach ($books as $book)
        <hr>
        <a href="{{ route('books.show', $book->id) }}">
            <h3>{{ ucwords($book->title )}}</h3>
        </a>

        <p>{{ ucwords($book->desc )}}</p>
        <a href="{{ route('books.show', $book->id) }}">
           <button type="submit"  class="btn btn-primary">Show Book</button>
        </a>
        <a href="{{ route('books.edit', $book->id) }}">
           <button type="submit"  class="btn btn-success">Edit Book</button>
        </a>
        <a href="{{ route('books.delete', $book->id) }}">
           <button type="submit"  class="btn btn-danger">Delete Book</button>
        </a>
        
    @endforeach
    <hr>
    <button type="submit"  class=" btn btn-primary mb-2"><a class="text-light" href="{{ route('books.create') }}">Creete</a></button>
    
    <hr>

    {{ $books->render() }}
@endsection
