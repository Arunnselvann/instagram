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
        <div class="col-lg-8">
            <h1 class="text-center">Hi, welcome {{Session::get('user')}}</h1>
        </div>
        <table class="table">
            <tr>
            <div class="container">
                <td> <a href="{{route('followers')}}" class="btn btn-info">Followers</a> </td>
                <td> <a href="{{route('following')}}" class="btn btn-info">Following</a> </td>
                <td> <a href="{{route('upload')}}" class="btn btn-primary">Upload file</a> </td>
                <td> <a href="{{route('find-friends')}}" class="btn btn-success">Find Friends</a> </td>
                <td> <a href="{{route('log-out')}}" class="btn btn-secondary">Logout</a> </td>
            </div> 
            </tr>
        </table>
        <br>
        <br>                                                                                     
        <br>

        @foreach($images as $img)
        <table class="table table-borderless container">
            <tr>
               
                <td>
                </td>
                <td>
                    <img src="{{url('/')}}/image/{{$img->image_name}}" width="500px" height="500px">
                </td>
            </tr>
        </table>
        @endforeach

          

   


    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>