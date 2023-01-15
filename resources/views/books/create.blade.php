@extends('layout')

@section('title')
    Create
@endsection

@section('content')
<form method="POST" action="{{route('books.store')}}">
    @csrf
    <div class="form-group">
      <label >Email address</label>
      <input type="text" name="title" class="form-control" value="Web Dev"  placeholder="title">
    </div>
    
    <div class="form-group my-2">
     
      <textarea class="form-control" name="desc"  placeholder="Description"  rows="3">Description</textarea>
    </div>
    <button type="submit"  class="btn btn-primary mb-2">Create</button>
  </form>
@endsection