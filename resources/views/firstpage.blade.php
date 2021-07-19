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
        <div class="col-lg-10">
            <h1 class="text-center">Hi, welcome {{session('info')}}</h1>
        </div>    
        <div class="col-lg-2">
            <a href="{{route('log-out')}}" class="btn btn-secondary">Logout</a>
        </div> 
    </div>
    <table class="table table-hover">
        <tr>
            <td>s.no</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Country</td>
            <td>Action</td>
        </tr>
        @if(isset($table))
        @foreach($table as $registered)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$registered->first_name}}</td>
            <td>{{$registered->last_name}}</td>
            <td>{{$registered->country}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('follow',$registered->id)}}">Follow</a>
        </tr>    
        @endforeach
        @endif
    </table>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>