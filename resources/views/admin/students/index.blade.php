@extends('adminlte::page')


@section('content')


    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Student Info</h3>
                </div>
               

            </div>
        </div>

        <div class="card-body">
        @if (session('success'))
              <div class="alert alert-success">
                <button class="close" data-dismiss="alert">X</button>
                {{session('success')}}
              </div>
            @endif
            <table class="table table-bordered">
                <thead class="bg-primary">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Semester</th>
                        <th>Faculty</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($users as $user )
                    <tr>
                        <th>{{$user->id}}</th>
                        <th>{{$user->name}}</th>
                        <th>{{$user->semester}}</th>
                        <th>{{$user->faculty}}</th>

                        <th>
                        <a class="btn btn-secondary" href="{{route('admin.students.show',$user)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning" href="{{route('admin.students.edit',$user)}}"><i class="fas fa-edit"></i>Edit</a>
                                <form class="d-inline" onclick="return confirm('Are you sure to delete this?')" action="{{route('admin.students.destroy',$user)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>Delete</button>
                                    </form>
                        </th>
                        
                    </tr>
                        
                    @endforeach
                    
                </tbody>

            </table>
            {{$users->links()}}
            
        </div>
    </div>

@endsection