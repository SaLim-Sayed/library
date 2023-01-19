@extends('layout')

@section('title')
   Welcome
@endsection
@section('content')
   <div class="card">
    <h5 class=" bg-dark text-light text-center">Welcome in Our Library</h5>
    <img class="card-img" src="{{asset('uploads/library.png')}}" alt="">
   </div>
@endsection
