@extends('layout')

@section('title')
    Welcome
@endsection
@section('content')
    <div class="">
        @auth
            <h2 style="font-family:serif" class=" bg-dark text-light text-center nav-link btn btn-outline-info">
                Welcome <span style="font-family:cursive;color:aqua">"{{ Auth::user()->name }}" </span> in Our Library

                <img class="card-img" src="{{ asset('uploads/library.png') }}" alt="">
            </h2>
        @endauth
        @guest
            <h5 class=" bg-dark text-light text-center nav-link btn btn-outline-info">
                <a href="{{route('auth.login')}}">Join to Our Library</a>
                <img class="card-img" src="{{ asset('uploads/library.png') }}" alt="">
            </h5>
        @endguest
    </div>
@endsection
