@extends('tutor.layout')
@section('content')

          <div class="card-body"  style="box-shadow: 0px 2px 18px 0px rgba(0,0,0,0.2);">
          <form action="{{route('tutor.assignment.upload',$course)}}" method="POST">
              @csrf

              @if($errors->any())
              <div class="alert alert-danger">{{$errors->first()}}</div>
              @endif
<div class="form-group">
   <textarea class="form-control" id="notice" name="notice" rows="3"></textarea>
  </div>
             
              
              <button type="submit" name="submit" class="btn btn-secondary my-1">Upload</button>
            </form>
          </div>
            
          

@endsection