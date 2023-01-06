@extends('adminlte::page')


@section('content')

<div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Faculties</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <a class=" btn btn-primary float-right" href="{{route('admin.faculties.create')}}">
                                <i class="fas fa-plus-circle mr-2"></i>Add Faculty
                            </a>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            

    
        <div class="card-body">
            @if (session('success'))
              <div class="alert alert-success">
                <button class="close" data-dismiss="alert">X</button>
                {{session('success')}}
              </div>
            @endif
            <div class="row">
                <table class="table table-bordered">
                    <thead class="bg-primary">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faculties as $faculty)
                        <tr>
                            <td>{{$faculty->id}}</td>
                            <td>{{$faculty->name}}</td>
                            <td>
                                <a class="btn btn-secondary" href="{{route('admin.faculties.show',$faculty)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning" href="{{route('admin.faculties.edit',$faculty)}}"><i class="fas fa-edit"></i>Edit</a>
                                <form class="d-inline" onclick="return confirm('Are you sure to delete this?')" action="{{route('admin.faculties.destroy',$faculty)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>Delete</button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        </div>



@endsection