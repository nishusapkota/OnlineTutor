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

  
</head>

<body>
<center>
<iframe src="{{asset('/storage/assignments/'.$assignment->student_assignment)}}" width="850px" height="600px"></iframe>
<hr style="border:1px solid gray; width:850px" >
<form action="{{route('tutor.remarks',$assignment)}}" method="post">
  @csrf
  <input type="text" name="remarks" placeholder="Remarks here...." style="display: inline-block; width: 600px;">
  <button type="submit" class="btn btn-primary" tyle="display: inline-block;">Submit</button>
</form>

</center>

 </body>

</html>