@extends('tutor.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6"> <h5>Assignments</h5></div>
            <div class="col-6"><a class="btn btn-primary float-right" href="{{route('tutor.course',$course)}}"><i class="fas fa-plus circle-left mr-2"></i>Add</a>
 </div>
        </div>
     </div>
       
    <div class="card-body">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Assignment</th>
                <th>Created_At</th>
                <th>Due_Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assignments as $assignment)
            <tr>
                <td>{{$assignment->id}}</td>
                <td>{!! $assignment->assignment !!}</td>
                <td>{{$assignment->created_at}}</td>
                <td>{{$assignment->due_date}}</td>
                <td>
                    <a href="{{route('tutor.uploaded_assignment',[$assignment])}}" class="btn btn-success">Student Solution</a>
                </td>
            </tr>
            @endforeach
            
        </tbody>


       
        </table>
        {{$assignments->links()}}
    </div>
</div>

@endsection