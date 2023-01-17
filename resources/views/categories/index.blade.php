@extends('layout')

@section('title')
    All Categories
@endsection

@section('content')
    <h1>All Categories</h1>

    @foreach ($categories as $category)
        <hr>


        <div class="card" style="width: 30rem;">

            <div class="col mb-4">
                <div class="card-body">
                    <h3 class="card-title"> <a class="card-link" href="{{ route('categories.show', $category->id) }}">
                            {{ ucwords($category->name) }}
                        </a>
                    </h3>

                </div>
            </div>


            <div class="card-body">

                <a class="card-link" href="{{ route('categories.show', $category->id) }}">
                    <button type="submit" class="btn btn-primary">Show Category</button>
                </a>
                <a class="card-link" href="{{ route('categories.edit', $category->id) }}">
                    <button type="submit" class="btn btn-success">Edit Category</button>
                </a>
                <a class="card-link" href="{{ route('categories.delete', $category->id) }}">
                    <button type="submit" class="btn btn-danger">Delete Category</button>
                </a>
            </div>
        </div>
    @endforeach

    <hr>
    <button type="submit" class=" btn btn-primary mb-2"><a class="text-light"
            href="{{ route('categories.create') }}">Creete</a></button>

    <hr>

    {{ $categories->render() }}
@endsection
