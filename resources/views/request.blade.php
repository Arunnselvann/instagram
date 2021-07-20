<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requested</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <table class="table table-hover">
        <tr>
            <td>s.no</td>
            <td>Follower_id</td>
            <td>Action</td>
        </tr>
        @if(isset($follower))
        @foreach($follower as $requested)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$requested->user->first_name}}</td>
            <td>
                <a href="{{route('follow-back',$requested->follower_id)}}" class="btn btn-primary">follow back</a>
            </td>
        </tr>
        @endforeach
        @endif
    </table>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>