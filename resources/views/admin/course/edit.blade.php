@extends('adminlte::page')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Update Course</h3>
                </div>
                <div class="col-6">
                    <a class="btn btn-primary float-right" href="{{route('admin.course.index')}}"><i class="fas fa-arrow-circle-left mr-2"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.course.update',$course)}}" method="POST">
                @method('PUT')
                @if($errors->any())
                <div class="alert alert-danger">{{$errors->first()}}</div>
                @endif
                @csrf

                <div class="form-group">
                    <label for="course">Course Name</label>
                    <input type="text" name="course" class="form-control" value="{{$course->course}}">
                </div>
                <div class="form-group">
                    <label for="user_id">Tutor Name</label>
                    <select name="user_id" class="form-control">
                    <option value="">-----select tutor-----</option>
                    @foreach ($users as $user)
                    <option value="{{$user->id}}" {{$course->user_id ==$user->id ? 'selected':''}} >
                        {{$user->name}}
                    </option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="faculty_id">Faculty</label>
                    <select name="faculty_id" id="faculty_id" class="form-control">
                        <option value="">----select faculty-----</option>
                        @foreach ($faculties as $faculty)
                            <option value="{{$faculty->id}}" {{$course->faculty_id == $faculty->id ?'selected' :''}} >
                                {{$faculty->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="semester_id">Semester</label>
                    <select name="semester_id" id="semester_id" class="form-control">
                        <option value="">----select semester-----</option>
                        @foreach ($semesters as $semester)
                            <option value="{{$semester->id}}" {{$course->semester_id == $semester->id ?'selected' :''}} >
                                {{$semester->sem}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>



@endsection