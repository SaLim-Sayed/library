@extends('layout')

@section('title')
    Register
@endsection
@section('content')
    @include('inc.errors')

    <form class="p-5" method="POST" action="{{ route('auth.handle-register') }}" enctype="multipart/form-data">
        @csrf
        <h2 class="title">Register</h2>
        <div class="form-group my-2">

            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="name">
        </div>
        <div class="form-group my-2">

            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email">
        </div>
        <div class="form-group my-2">

            <input type="password" name="pass" class="form-control" value="{{ old('pass') }}" placeholder="password">
        </div>


        <button type="submit" class="btn btn-primary mb-2">Sign Up</button>
    </form>
@endsection
