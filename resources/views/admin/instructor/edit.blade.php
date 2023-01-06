@extends('adminlte::page')
@section('content')

<div class="card">
    <div class="card-header">
    <div class="row">
                <div class="col-6">
                    <h3>Update Instructor</h3>
                </div>
                <div class="col-6">
                    <a class="btn btn-primary float-right" href="{{route('admin.instructor.index')}}"><i class="fas fa-arrow-circle-left mr-2"></i>Go Back</a>
                </div>
            </div>
    </div>
    <div class="card-body">
<form action="{{route('admin.instructor.update',$user)}}" method="Post">
@method('PUT')
                @if($errors->any())
                <div class="alert alert-danger">{{$errors->first()}}</div>
                @endif
    @csrf
    
    <div class="form-group">
        <label for="name">Instructor Name</label>
        <input type="text" name="name" class="form-control" value="{{$user->name}}">
    </div>
    <div class="form-group">
        <label for="name">Instructor Email</label>
        <input type="text" name="email" class="form-control" value="{{$user->email}}">
    </div>
    
    <button class="btn btn-primary">Update</button>
</form>
    </div>
</div>



@endsection