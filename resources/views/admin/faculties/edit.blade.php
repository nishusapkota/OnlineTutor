@extends('adminlte::page')
@section('content')

<div class="card">
    <div class="card-header">
    <div class="row">
                <div class="col-6">
                    <h3>Update Faculty</h3>
                </div>
                <div class="col-6">
                    <a class="btn btn-primary float-right" href="{{route('admin.faculties.index')}}"><i class="fas fa-arrow-circle-left mr-2"></i>Go Back</a>
                </div>
            </div>
    </div>
    <div class="card-body">
<form action="{{route('admin.faculties.update',$faculty)}}" method="post">
    @csrf
    

    <div class="form-group">
        <label for="name">Faculty Name</label>
        <input type="text" name="name" class="form-control" value="{{$faculty->name}}">
    </div>
    <button class="btn btn-primary">Update</button>
</form>
    </div>
</div>



@endsection