@extends('tutor.layout')
@section('content')
<h5>Add Notes</h5>
<br>
<form action="{{route('tutor.note_store',$course)}}" method="post" enctype="multipart/form-data">
@if($errors->any())
            <div class="alert alert-danger">{{$errors->first()}}</div>
            @endif
@if(session('success'))
              <div class="alert alert-success">
                <button class="close" data-dismiss="alert">X</button>
                {{session('success')}}
              </div>
@endif
            @csrf
<div class="form-group">
    <label for="title">Enter Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
    @error('title')
      <span class="invalid-feedback" role="alert">
       <strong>{{$message}}</strong> 
      </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="chapter">Enter Chapter Number</label>
    <input type="number" class="form-control" id="chapter" name="chapter">
  </div>
 <div class="form-group">
    <label for="video">Video Link</label>
    <input type="file" class="form-control" id="video" name="video">
  </div>
  <div class="form-group">
    <label for="note">Note File</label>
    <input type="file" class="form-control" id="note" name="note">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection