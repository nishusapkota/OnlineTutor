
<html>
<head>
    <title>Online Tutor/Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>  
<body>
<div style="max-width: 550px; max-height:100%; margin:20px auto">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-center mb-0">
                Create New Account
            </h4>
        </div>
        <div class="card-body">


            <form action="{{ route('register') }}" method="post">
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
                    <label for="faculty">Faculty</label>
                    <select name="faculty" class="form-control" required>
                        <option selected>Choose faculty</option>
                        <option value="bsccsit">BSCCSIT</option>
                        <option value="bca">BCA</option>
                        <option value="bim">BIM</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <select name="semester" class="form-control" required>
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
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" class="form-control" name="password_confirmation" required>
                </div>

                <button class="btn btn-primary btn-lg">
                    Register
                </button>

            </form>
        </div>
        <div class="card-footer">
            Already have an account? <a href="{{ route('login') }}">Log In</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
</body>
</html>