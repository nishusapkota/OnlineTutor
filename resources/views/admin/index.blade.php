@extends('adminlte::page')

@section('title', 'OnlineTutor')
@section('content')

<div class="card">
    <div class="card-body">
        Welcome to Dashboard
        <br><br>
        
        <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3></h3>

                                    <p>Teacher</p>
                                </div>
                                
                                <a href="{{route('admin.instructor.index')}}" class="small-box-footer">View info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3></h3>

                                    <p>Student</p>
                                </div>
                                
                                <a href="{{route('admin.students.index')}}" class="small-box-footer">View info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3></h3>

                                    <p>Courses</p>
                                </div>
                                
                                <a href="{{route('admin.course.index')}}" class="small-box-footer">View info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3></h3>

                                    <p>Faculty</p>
                                </div>
                                
                                <a href="{{route('admin.faculties.index')}}" class="small-box-footer">View info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
        
        </div>
            
    
</div>  
        
 @endsection