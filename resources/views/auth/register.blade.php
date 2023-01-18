@extends('layout')

@section('title')
    Register
@endsection
@section('content')
    @include('inc.errors')

    <form class="px-5" method="POST" action="{{ route('auth.handleRegister') }}" enctype="multipart/form-data">
        @csrf
        <h2 class="title">Register</h2>
        <div class="form-group my-2">

            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="name">
        </div>
        <div class="form-group my-2">

            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email">
        </div>
        <div class="form-group my-2">

            <input type="password" name="password" class="form-control" value="{{ old('password') }}"
                placeholder="password">
        </div>
       {{--  <div class="form-group my-2">
            <label for="">Admin</label>
            <input type="checkbox" name="is_admin" value="0" >
        </div> --}}


        <button type="submit" class="btn btn-primary mb-2">Sign Up</button>
        <hr>
        <p>{{ ucwords('you already have an account ') }}<a href="{{ route('auth.login') }}">login</a></a></p>
    </form>
@endsection
