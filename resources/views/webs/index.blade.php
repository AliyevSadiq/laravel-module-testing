<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Web Site List</h2>
    <a href="{{route('web_create')}}" class="btn btn-success">CREATE WEB SITES</a>
    <table class="table">
        <thead>
        <tr>
            <th>Web Site Name</th>
            <th>Web Site Url</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($webs as $web)
        <tr>
            <td>{{$web->title}}</td>
            <td>{{$web->web_url}}</td>
            <td>
                <a href="{{route('web_delete',['id'=>$web->id])}}">DELETE</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
