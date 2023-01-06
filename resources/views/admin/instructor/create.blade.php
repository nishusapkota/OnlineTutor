@extends('adminlte::page')


@section('content')


    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Instructor Info</h3>
                </div>
                <div class="col-6">
                    <a class="btn btn-primary float-right" href="{{route('admin.instructor.index')}}"><i class="fas fa-arrow-circle-left mr-2"></i>Back</a>
                </div>

            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.instructor.store')}}" method="post">
                @if($errors->any())
                <div class="alert alert-danger">{{$errors->first()}}</div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                
                
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" class="form-control" name="role">
                </div>
                <button class="btn btn-primary">Save</button>
            </form>

        </div>
    </div>

@endsection