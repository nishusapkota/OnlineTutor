@extends('adminlte::page')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Course Info</h3>
                </div>
                <div class="col-6">
                    <a class="btn btn-primary float-right" href="{{route('admin.course.index')}}"><i class="fas fa-arrow-circle-left mr-2"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-condensed" style="width:50%">
                <tr>
                    <th>ID</th>
                    <td>{{$course->id}}</td>
                </tr>
                <tr>
                    <th>Course Name</th>
                    <td>{{$course->course}}</td>
                </tr>
                <tr>
                    <th>Tutor Name</th>
                    <td>{{$course->users->name}}</td>
                </tr>
                <tr>
                    <th>Faculty</th>
                    <td>{{$course->faculty->name}}</td>
                </tr>
                <tr>
                    <th>Semester</th>
                    <td>{{$course->semester->sem}}</td>
                </tr>

            </table>
        </div>
    
    @endsection