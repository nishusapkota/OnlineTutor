@extends('tutor.layout')
@section('content')
<h5>Add Notes</h5>

<form action="" method="" enctype="multipart/form-data">
<div class="form-group">
    <label for="title">Enter Title</label>
    <input type="text" class="form-control" id="title" name="title">
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