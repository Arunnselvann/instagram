<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Followers List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <br>
    <h1 class="text-center"> Friends List </h1>
    <br>
    <table class="table table-hover">
        <tr>
            <td>s.no</td>
            <td>First Name</td>
            <td>Last name</td>
        </tr>
        @if(isset($friends))
        @foreach($friends as $followed)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$followed->user->first_name}}</td>
            <td>{{$followed->user->last_name}}</td>
        </tr>
        @endforeach
        @endif

    </table>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>