@extends('layout')

@section('title')
    All Books
@endsection

@section('content')
    
    @auth
    <div class="card bg-success m-2 p-2">
        <input type="text" class="container   form-control" placeholder="Search for a Book" style="width: 50rem;" id="keyword">
    </div>
        

    @endauth
   
    <div class="card" id="allBooks">
        @auth
        <div class="card  m-2 p-2">

            <h1 style="color: rgb(6, 58, 103) ; font-family:cursive">Notes:</h1>
            <ul>
                @foreach (Auth::user()->notes as $note)
                    <li>{{ ucwords($note->content) }} </li>
                @endforeach
            </ul>
            <a href="{{ route('notes.create') }} "style="width: 50rem;" class=" container btn btn-info">Add new note</a>
        </div>
        @endauth
        
        @auth
            {{-- <a class=" container btn btn-primary mb-2" style="width: 20rem;" href="{{ route('books.create') }}">Creete New Book</a> --}}
        @endauth
        <h1><span style="color: rgb(6, 58, 103) ; font-family:fantasy"> All Books: </span>
            <a class="  btn btn-primary mb-2" style="width: 20rem;margin-left:470px" href="{{ route('books.create') }}">Creete New Book</a>
        </h1>
        @foreach ($books as $book)
           
         <div class="card container my-2" style="width: 50rem;">
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
                            <img style="flex: flex-end" class="card-img-top "
                                src="{{ asset('uploads/books/noimage1.png') }}" alt="no Img"
                                style="width: 100px; height: 100px;">
                        @endif
                    </div>
                </div>

                <div class=" card-body">
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
    </div>

    <hr>

    <hr>

    {{-- {{ $books->render() }} --}}
@endsection
@section('scripts')
    <script>
        $('#keyword').keyup(function() {
            let keyword = $(this).val()
            let url = "{{ route('books.search') }}" + "?keyword=" + keyword

            $.ajax({
                type: "GET",
                url: url,
                contentType: false,
                processData: false,
                success: function(data) {

                    $('#allBooks').empty()
                    for (book of data) {
                        // console.log(book.id, book.title)
                        $('#allBooks').append(`
                        <h5 style="color: rgb(6, 58, 103) ; font-family:fantasy"> Book ID :${book.id}</h5>
                             <div class="card container" style="width: 50rem;">
                                <h3 class="btn btn-secondary">${book.title}</h3>
                                <div class="row row-cols-1 row-cols-md-2">
                                    <div class="col mb-4">
                                        <div class="card-body">
                                            <p class="card-text">${book.desc}</p>
                                        </div>
                                    </div>
                                    <div class="col ">
                                        <img class="card-img-top" src="{{asset('uploads/books/${book.img}')}}">
                                    </div>
                                </div>
                                <div class=" card-body">
                                    <a class="btn btn-primary" href="{{ route('books.show', $book->id) }}"> Show Book</a>
                                    <a class="  btn btn-success" href="{{ route('books.edit', $book->id) }}">Edit Book</a>
                                    @auth
                                        @if (Auth::user()->is_admin == 1)
                                            <a class="btn btn-danger" href="{{ route('books.delete', $book->id) }}"> Delete Book</a>
                                        @endif
                                    @endauth
                                </div>
                                <hr />
                            </div>
          `)
                    }
                }
            })
        })
    </script>
@endsection
