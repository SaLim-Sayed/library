@extends('layout')

@section('title')
    Create Category
@endsection

@section('content')
    @include('inc.errors')

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="form-group">

            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="name">
        </div>


        <button type="submit" class="btn btn-primary mb-2">Create</button>
    </form>
@endsection
