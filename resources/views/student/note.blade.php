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
            <div class="row mx-auto bg-success">
                <div class="card" style="width:100%; height:max-content;">
                    <div class="card-body">
                        <h5 class="text-center"><i class="fa fa-book"></i>{{$course->course}}</h5>

                        <div class="row">
                            <div class="col-5 ml-auto d-flex flex-row align-items-right" id="hyperlink1">
                                <a href="{{route('student.course',[$course])}}"><i class="fa fa-pencil-square" aria-hidden="true"></i>
                                    Assignment</a>
                                <a href="{{route('student.note',[$course])}}"><i class="fa fa-book" aria-hidden="true"></i>
                                    Notes</a>
                                <!--<a href=""><i class="fa fa-file-video-o" aria-hidden="true"></i>Video File</a>-->
                                <a href="{{route('student.post',[$course])}}"><i class="fa fa-plus" aria-hidden="true"></i>Posts
                                </a>
                                <a href=""><i class="fa fa-comments" aria-hidden="true"></i> chat</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row mx-auto mt-2">
                <div class="card" style="width:100%; max-height:370px; overflow-y:scroll">
                    <div class="card-body">
                        <h5>Notes</h5>
                        <table class="table table-bordered  mt-3" style="box-shadow: 0px 2px 18px 0px rgba(0,0,0,0.5);">
                            <tr class="bg-primary">
                                <th>ID</th>
                                <th>Chapter</th>
                                <th>Title</th>
                                <th>Videos</th>
                                <th>Notes</th>
                               
                            </tr>
                            @foreach ($notes as $note)
                            <tr>
                                <td>{{ $note->id}}</td>
                                <td>{{ $note->chapter}}</td>
                                <td>{{ $note->title}}</td>
                                <td>

                                    @if($note->video != "null")
                                    <video width="200" height="100" controls>
                                        <source src="{{ asset('Videos/'. $note->video) }}" type="video/mp4">
                                    </video>

                                    @endif
                                </td>
                                <td>
                                    @if($note->note != "null")
                                    <a href="{{ asset('Notes/' . $note->note) }}" target="_blank">
                                        @if(in_array(pathinfo($note->note, PATHINFO_EXTENSION), ['ppt', 'pptx']))
                                        <i class="fas fa-file-powerpoint"></i>
                                        @elseif(in_array(pathinfo($note->note, PATHINFO_EXTENSION), ['doc', 'docx']))
                                        <i class="fas fa-file-word"></i>
                                        @elseif(in_array(pathinfo($note->note, PATHINFO_EXTENSION), ['pdf']))
                                        <i class="fas fa-file-pdf"></i>
                                        @elseif(in_array(pathinfo($note->note, PATHINFO_EXTENSION), ['xls', 'xlsx']))
                                        <i class="fas fa-file-excel"></i>
                                        @elseif(in_array(pathinfo($note->note, PATHINFO_EXTENSION), ['txt']))
                                        <i class="fas fa-file-alt"></i>
                                        @endif
                                        {{ $note->note }}
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </table>
                        {{$notes->links()}}


                    </div>
                </div>

            </div>
        </div>






    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>