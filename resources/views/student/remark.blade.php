<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Online Tutor</title>

  <style>
    body {
      margin: 0;
      padding: 0;
      background: #fff;
    }

    .banner {
      width: 100%;
      height: 100vh;
      background: url('/images/tutorbg.jpg');
      background-position: top;
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    .banner.navbar {
      margin-top: 2%;
    }

    .banner .navbar-brand {
      color: black;
      font-size: 20px;
      font-weight: bold;
      margin-left: 10px;
    }

    .banner .nav {
      margin-right: 10px;
    }

    .banner .nav li a {

      color: #e8c784;
      font-size: 20px;
    }

    #hyperlink {
      margin-right: 100px;
      text-align: right;
    }

    #hyperlink1 a {
      margin-left: 20px;
      color: gray;
      text-decoration: none;
    }

    #hyperlink1 a:hover {

      color: black;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="cotainer-fluid banner">
    <div class="row mb-3" style="background:gray;background-position: top;
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;">
      <div class="col-md-12">
        <nav class="navbar navbar-md">
          <a class="navbar-brand" href="#">
            <img src="/images/logo.png" width="30" height="30" class="d-inline-block align-top" alt=""><span class="pl-2 mt-2">Online Tutor</span>
          </a>
          <ul class="nav">
            <li class="nav-item">
              <a href="{{route('logout')}}" class="nav-link ">

                <p>
                  Log Out
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>

    <div class="container bg-light mt-5 py-3">
      <div class="row mx-auto">
        <div class="card mx-auto" style="width:100%;">
          <div class="card-body">
            <h5 class="text-center"><i class="fa fa-book"></i>{{$name}}</h5>
            <p class="text-left"><b>Semester:</b>{{$sem}}</p>
            <p class="text-left"><b>Faculty:</b>{{$faculty}}</p>
            <div class="row ml-5 mb-2">
              <div class="col-6"></div>
              <div class="col d-flex flex-row" id="hyperlink1">
                <a href="{{route('tutor.assignment.index',$course)}}"><i class="fa fa-pencil-square" aria-hidden="true"></i>
                  Assignment</a>
                <a href="{{route('tutor.note_create',$course)}}"><i class="fa fa-book" aria-hidden="true"></i>
                  Notes</a>

                <a href="{{route('tutor.create_post',$course)}}"><i class="fa fa-plus" aria-hidden="true"></i>Posts
                </a>
                <a href="" class="dropdown-toogle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                    <span class="badge badge-light" style="position: relative; left: -5px; background-color: red">
                                        {{ auth()->user()->unreadNotifications()->count() }}
                                    </span>
                                </a>

                                

                                <ul class="dropdown-menu">
                                    @forelse(auth()->user()->unreadNotifications as $notification)
                                    <li>
                                        <a href="{{ $notification->data['url'] }}" class="dropdown-item"  onclick="event.preventDefault(); document.getElementById('mark-notification-as-read-form-{{ $notification->id }}').submit();">
                                            {{ $notification->data['message'] }}
                                        </a>
                                        <form id="mark-notification-as-read-form-{{ $notification->id }}" action="{{ route('student.mark.notification.as.read', [$notification->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('PUT')
                                </form>
                                    </li>
                                    @empty
                                    <li class="dropdown-item">No Notification</li>
                                    @endforelse
                                </ul>


              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="row mx-auto mt-3">
        <div class="col-12 bg-light">
          <div class="card">
            <div class="card-body" style="box-shadow: 0px 2px 18px 0px rgba(0,0,0,0.2);max-height:280px; overflow-y:scroll">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-6">
                      <h5>Student Assignments</h5>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Id</th>
                      
                      <th>Submitted_At</th>
                      <th>Due_Date</th>
                      <th>Assignment</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      <td>{{$student_assignment->id}}</td>
                      <td>{{$student_assignment->created_at}}</td>
                      <td>{{$student_assignment->assignment->due_date}}</td>
                      <td>
                        <a href="{{ asset('student_assignment/'.$student_assignment->student_assignment) }}" target="_blank">
                          @if(in_array(pathinfo($student_assignment->student_assignment, PATHINFO_EXTENSION), ['ppt', 'pptx']))
                          <i class="fas fa-file-powerpoint"></i>
                          @elseif(in_array(pathinfo($student_assignment->student_assignment, PATHINFO_EXTENSION), ['doc', 'docx']))
                          <i class="fas fa-file-word"></i>
                          @elseif(in_array(pathinfo($student_assignment->student_assignment, PATHINFO_EXTENSION), ['pdf']))
                          <i class="fas fa-file-pdf"></i>
                          @elseif(in_array(pathinfo($student_assignment->student_assignment, PATHINFO_EXTENSION), ['xls', 'xlsx']))
                          <i class="fas fa-file-excel"></i>
                          @elseif(in_array(pathinfo($student_assignment->student_assignment, PATHINFO_EXTENSION), ['txt']))
                          <i class="fas fa-file-alt"></i>
                          @endif
                          {{ $student_assignment->student_assignment }}
                        </a>
                      </td>
                      <td>
                        {{$remark->remark}}
                      </td>
                    </tr>
                    

                  </tbody>

                </table>

              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
  </div>






  </div>
  <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
  <script>
    ClassicEditor
      .create(document.querySelector(''), {

        licenseKey: '',



      })
      .then(editor => {
        window.editor = editor;




      })
      .catch(error => {
        console.error('Oops, something went wrong!');
        console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
        console.warn('Build id: ympsfd2pd8k0-o86wbtxp1mvj');
        console.error(error);
      });
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>