@extends('layout')

@section('title')
    All Books
@endsection

@section('content')
    @auth
        <div class="card m-2 p-2">
            <h1>Notes:</h1>
            <ul>
                @foreach (Auth::user()->notes as $note)
                    <li>{{ ucwords($note->content) }} </li>
                @endforeach
            </ul>
            <a href="{{ route('notes.create') }} " class="btn btn-info">Add new note</a>
        </div>


    @endauth
    <h1>All Books</h1>
    @auth
        <a class=" btn btn-primary mb-2" href="{{ route('books.create') }}">Creete</a>
    @endauth
    @foreach ($books as $book)
        <hr>


        <div class="card" style="width: 25rem;">
            
               <a class="btn btn-secondary" href="{{ route('books.show', $book->id) }}">
                    {{ ucwords($book->title) }}
                </a>
           
            
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                    <div class="card-body">

                        <p class="card-text">{{ ucwords($book->desc) }}</p>
                    </div>
                </div>
                <div class="col ">
                    @if ($book->img !== null)
                        <img class="card-img-top" src="{{ asset('uploads/books/' . $book->img) }}" alt="no Img"
                            style="">
                    @else
                        <img style="flex: flex-end" class="card-img-top " src="{{ asset('uploads/books/noimage1.png') }}"
                            alt="no Img" style="width: 100px; height: 100px;">
                    @endif
                </div>
            </div>
            <div class="card-body">

                <a class="btn btn-primary" href="{{ route('books.show', $book->id) }}"> Show Book</a>
                <a class="  btn btn-success" href="{{ route('books.edit', $book->id) }}">Edit Book</a>
                @auth
                    @if (Auth::user()->is_admin == 1)
                        <a class="btn btn-danger" href="{{ route('books.delete', $book->id) }}"> Delete Book</a>
                    @endif
                @endauth
            </div>
        </div>
    @endforeach

    <hr>

    <hr>

    {{ $books->render() }}
@endsection
