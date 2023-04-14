@extends('adminlte::page')


@section('content')


    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Student Info</h3>
                </div>
                <div class="col-6">
                    <a class="btn btn-primary float-right" href="{{route('admin.student.create')}}"><i class="fas fa-plus circle-left mr-2"></i>Add Student</a>
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
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->semester->sem}}</td>
                        <td>{{$user->faculty->name}}</td>
                        
                        <td>
                        <a class="btn btn-secondary" href="{{route('admin.students.show',$user)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning" href="{{route('admin.students.edit',$user)}}"><i class="fas fa-edit"></i>Edit</a>
                                <form class="d-inline" onclick="return confirm('Are you sure to delete this?')" action="{{route('admin.students.destroy',$user)}}" method="post">
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
            {{$users->links()}}
            
        </div>
    </div>

@endsection