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
                                <a href=""><i class="fa fa-bell" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row mx-auto mt-2">
                <div class="card" style="width:100%; max-height:370px; overflow-y:scroll">
                    <div class="card-body">
                        <h5>Posts</h5>
                        @foreach($posts as $post)
                        <div class="card my-3">
                            <div class="card-body">
                                <h5 class="card-title bg-secondary text-white">{{ $post->title }}</h5>
                                <p class="card-text">{!! $post->body !!}</p>
                                <small>Posted on {{ $post->created_at }}</small><br>
                                @if ($post->image !="null")
                                <img src="{{ asset('images/' . $post->image) }}" width="500" height="300">
                                @endif

                                <hr>
                                <h6 style="padding-left: 80px;">Comments</h6>
                                @foreach ($post->comments as $comment)
                                <div class="ml-3 mb-3">
                                    <p style="padding-left: 80px;">{{ $comment->comment }}</p>
                                    <p class="text-muted" style="padding-left: 80px;">Posted by {{ $comment->user->name }} at {{ $comment->created_at }}</p>
                                    @foreach ($comment->replies as $reply)
                                    <div class="ml-3 mb-3">
                                        <p style="padding-left: 80px;">{{ $reply->comment }}</p>
                                        <p class="text-muted" style="padding-left: 80px;">Posted by {{ $reply->user->name }} at {{ $reply->created_at }}</p>
                                    </div>
                                    @endforeach
                                    <button style="padding-left: 80px;" type="button" class="btn btn-link" data-toggle="collapse" data-target="#replyForm{{ $comment->id }}">Reply</button>
                                    <div style="padding-left: 80px;" id="replyForm{{ $comment->id }}" class="collapse mt-3">
                                        <form method="post" action="{{route('student.comment',[$post])}}">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                            <div class="form-group">
                                                <textarea class="form-control" name="comment" placeholder="Add a reply"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                                <button style="padding-left: 80px;" type="button" class="btn btn-link" data-toggle="collapse" data-target="#commentForm{{ $post->id }}">Add Comment</button>
                                <div style="padding-left: 80px;" id="commentForm{{ $post->id }}" class="collapse mt-3">
                                    <form method="post" action="{{route('student.comment',[$post])}}">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <div class="form-group">
                                            <textarea class="form-control" name="comment" placeholder="Add a comment"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @endforeach

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