
@extends('adminlte::page')


@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Course Info</h3>
                </div>
                <div class="col-6">
                    <a class="btn btn-primary float-right" href="{{route('admin.course.create')}}"><i class="fas fa-plus circle-left mr-2"></i>Add Course</a>
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
                            <th>Course Name</th>
                            <th>Tutor Name</th>
                            <th>Faculty</th>
                            <th>Semester</th>
                            <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                @foreach ($courses as $course )
                    <tr>
                        <td>{{$course->id}}</td>
                        <td>{{$course->course}}</td>
                        <td>{{$course->user->name}}</td>
                        <td>{{$course->faculty->name}}</td>
                        <td>{{$course->semester->sem}}</td>
                        <td>
                            
                        <a class="btn btn-secondary" href="{{route('admin.course.show',$course)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning" href="{{route('admin.course.edit',$course)}}"><i class="fas fa-edit"></i>Edit</a>
                                <form class="d-inline" onclick="return confirm('Are you sure to delete this?')" action="{{route('admin.course.destroy',$course)}}" method="post">
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

@endsection