<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h3 class="container">Login</h3>
        <form method="post" class="container" action="{{route('home')}}">
            @csrf
            Email:<br>
            <input type="email" name="email"><br>
            Password:<br>
            <input type="password" name="password"><br>
            <br>
            <input type="submit" name="login" value="login" class="btn btn-info"><br><br>
            <a type="submit" name="forgot" href="{{('forgot-password')}}" class="btn btn-secondary">forgot password</a>
        </form><br>
        <div class="container">
            <p> If you are not a user</a><br>
            <a class="btn btn-primary" type="submit" href="{{route('sign-up')}}">click here</a>
        </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>