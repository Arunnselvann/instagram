<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link href="{{asset('app.css')}}" rel="stylesheet">
</head>
<body>
    <br>
    <h1 class="text-center">Spark Out</h1>
    <br>
    <br>

    <div class="card p-1 container float-left" style="width: 20rem;">
        <div class="card-header">
            <h2>Registration Form</h2>
        </div>
            <form class="container" method="post" action="{{route('add-user')}}">
            
                @csrf
                First Name:<br>
                <input type="text" name="first_name" value="{{old('first_name')}}"><br>
                Last Name:<br>
                <input type="text" name="last_name" value="{{old('last_name')}}"><br>
                Email:<br>
                <input type="email" name="email" value="{{old('email')}}"><br>
                Password:<br>
                <input type="password" name="password" value="{{old('password')}}"><br>
                Country:<br>
                <input type="text" name="country" value="{{old('country')}}"><br><br>
                <input type="submit" class="btn btn-primary" name="submit">
            </form>
    
        <div class="container">
            If already a user?
            <a class="btn btn-primary" href="{{route('sign-in')}}">click here</a>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>