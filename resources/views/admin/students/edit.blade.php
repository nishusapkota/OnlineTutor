@extends('adminlte::page')
@section('content')

<div class="card">
    <div class="card-header">
    <div class="row">
                <div class="col-6">
                    <h3>Update Student Info</h3>
                </div>
                <div class="col-6">
                    <a class="btn btn-primary float-right" href="{{route('admin.students.index')}}"><i class="fas fa-arrow-circle-left mr-2"></i>Go Back</a>
                </div>
            </div>
    </div>
    <div class="card-body">
<form action="{{route('admin.students.update',$user)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Student Name</label>
        <input type="text" name="name" class="form-control" value="{{$user->name}}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" value="{{$user->email}}">
    </div>
    <div class="form-group">
        <label for="semester">Semester</label>
        <input type="text" name="semester" class="form-control" value="{{$user->semester->sem}}">
    </div>
    <div class="form-group">
        <label for="faculty">Faculty</label>
        <input type="text" name="faculty" class="form-control" value="{{$user->faculty->name}}">
    </div>
    
    <button class="btn btn-primary">Update</button>
</form>
    </div>
</div>



@endsection