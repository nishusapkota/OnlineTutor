@extends('adminlte::page')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6"><h3>Faculty information</h3></div>
            <div class="col-6"><a class="btn btn-primary float-right" href="{{route('admin.faculties.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>Go Back
        </a></div>
        </div>
    </div>
    
</div>

    <div class="card-body">
        <div class="row">
            <table class="table table-bordered table-condensed" style="width:50%">
                <tr>
                    <th>ID</th>
                    <td>{{$faculty->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$faculty->name}}</td>
                </tr>
                <tr>
                    <th>Created</th>
                    <td>{{$faculty->created_at}}</td>
                </tr>
                <tr>
                    <th>Updated</th>
                    <td>{{$faculty->updated_at}}</td>
                </tr>

            </table>
        </div>
    </div>
</div>

@endsection


    