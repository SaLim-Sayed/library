@extends('layout')

@section('title')
    Edit Book-{{$book->title}} 
@endsection

@section('content')
<form method="POST" action="{{route('books.update',$book->id)}}">
    @csrf
    <div class="form-group">
      <label >Email address</label>
      <input type="text" name="title" class="form-control" value="{{$book->title}}"  placeholder="title">
    </div>
    
    <div class="form-group my-2">
     
      <textarea class="form-control" name="desc"  placeholder="Description"  rows="3">{{$book->desc}}</textarea>
    </div>
    <button type="submit"  class="btn btn-primary mb-2">Edit Book</button>
  </form>
@endsection