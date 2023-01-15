@extends('layout')
@section('title')
    Show Book
@endsection
@section('content')
    <h1>Book ID: {{ $book->id }}</h1>

    <h3>{{ $book->title }}</h3>
    <p>{{ $book->desc }}</p>
    
     <a href="{{ route('books.edit', $book->id) }}">
        <button type="submit"  class="btn btn-success">Edit Book</button>
     </a>
     <a href="{{ route('books.delete', $book->id) }}">
        <button type="submit"  class="btn btn-danger">Delete Book</button>
     </a>
     
    <hr>
    <a href="{{ route('books.index') }}">Back</a>
@endsection
