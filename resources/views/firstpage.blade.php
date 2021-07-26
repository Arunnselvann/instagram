<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <br>
    <div class="row">
        <div class="col-lg-8">
            <h1 class="text-center">Hi, welcome {{Session::get('user')}}</h1>
        </div>    
        <div class="col-lg-4">
            <a href="{{route('followers')}}" class="btn btn-info">Followers</a>
            <a href="{{route('following')}}" class="btn btn-info">Following</a>
            <a href="{{route('follow-request')}}" class="btn btn-info">Follow Request</a>
            <a href="{{route('find-friends')}}" class="btn btn-primary">Find Friends</a>
            <a href="{{route('log-out')}}" class="btn btn-secondary">Logout</a>

        </div> 
        <br>
        <br>
        <div class="col-lg-2 offset-8">
            <a href="{{route('upload')}}" class="btn btn-success">Upload file</a>
        </div>
        <br>
        <img src="C:\xampp\htdocs\instagram\public\image\s20210722141113000.dd.jpg" />

          
    </div>
   


    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>