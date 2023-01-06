@extends('adminlte::page')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h3>Add New Faculty</h3>
            </div>
            <div class="col-6">
                <a class="btn btn-primary float-right" href="{{route('admin.faculties.index')}}"><i class="fas fa-arrow-circle-left mr-2"></i>Go Back</a>
            </div>
        </div>
    </div>


<div class="card-body">

    <form action="{{route('admin.faculties.store')}}" method="post">

        @csrf

        <div class="form-group">
            <label for="name">Faculty Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <button class="btn btn-primary">Save</button>

    </form>

</div>
</div>

@endsection