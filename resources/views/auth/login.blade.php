@extends('layout')

@section('title')
    Login
@endsection
@section('content')
    @include('inc.errors')

    <form class="px-5 " method="POST" action="{{ route('auth.handleLogin') }}" enctype="multipart/form-data">
        @csrf

        <h2 class="title">Login</h2>
        <div class="form-group my-2">

            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email">
        </div>
        <div class="form-group my-2">

            <input type="password" name="password" class="form-control" value="{{ old('password') }}"
                placeholder="password">
        </div>

        <div class="card-body">
            <button type="submit" class="btn btn-primary mb-2">Login</button> OR
            <a class="btn btn-outline-success" href="{{ route('auth.github.redirect') }} ">Sign Up With Github</a>
            <br>
            <span class="" style="padding-left:70% ">
                <a class="btn btn-outline-danger " href="{{ route('auth.register') }}">Create New User | Sign Up</a>
            </span>
        </div>
    </form>
@endsection
