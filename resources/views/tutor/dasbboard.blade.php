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

    
  </style>
</head>

<body>
  <div class="cotainer-fluid banner">
    <div class="row" style="background:gray;background-position: top;
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

    <div class="container bg-success mt-5">
      <div class="row bg-light mb-5">
        <h6 class="text-center"><i class="fa fa-book"></i>{{$course->course}}</h6>
        <p class="text-left">Semester: {{$course->semester->sem}}</p> <br>
        <p class="text-left">Faculty: {{$course->faculty->name}}</p>
      </div>
      <div class="row mb-5">
        <div class="col-3 bg-light mr-3">
          <h5>Instructor: </h5>
          <p>{{$course->user->name}}</p>
          <h5>Class Members: </h5>
          <p>
            @foreach($users as $user)
            &#x2022;{{$user->name}}<br>
            @endforeach
          </p>
        </div>
        <div class="col-6 bg-light">Posts</div>
      </div>

    </div>










  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>