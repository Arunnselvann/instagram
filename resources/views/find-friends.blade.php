<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Friends</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
@if ($error = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>	
        <strong>{{ $error }}</strong>
</div>
@endif
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
            </td>
         
        </tr>    
        @endforeach
        @endif
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
</body>
</html>