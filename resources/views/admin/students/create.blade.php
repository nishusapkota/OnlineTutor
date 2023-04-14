@extends('adminlte::page')


@section('content')


    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Creating Student Account</h3>
                </div>
                <div class="col-6">
                    <a class="btn btn-primary float-right" href="{{route('admin.students.index')}}"><i class="fas fa-arrow-circle-left mr-2"></i>Back</a>
                </div>

            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.student.store')}}" method="post">
                
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" required >
                    @error('name')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
                </div>
               

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="faculty_id">Faculty</label>
                    <select name="faculty_id" class="form-control" required>
                        <option selected>Choose faculty</option>
                        
                        <option value="1">BscCsit</option>
                        <option value="2">BCA</option>
                        <option value="3">BIM</option>

                       

                    </select>
                </div>
                <div class="form-group">
                    <label for="semester_id">Semester</label>
                    <select name="semester_id" class="form-control" required>
                        <option selected>Choose semester</option>
                        <option value="1">First</option>
                        <option value="2">Second</option>
                        <option value="3">Third</option>
                        <option value="4">Fourth</option>
                        <option value="5">Fifth</option>
                        <option value="6">Sixth</option>
                        <option value="7">Seventh</option>
                        <option value="8">Eight</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password" required>
                </div>
                
                
                
                
                
                <button class="btn btn-primary">Save</button>
            </form>

        </div>
    </div>

@endsection










