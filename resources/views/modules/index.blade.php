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
    <h2>Module List</h2>
    <a href="{{route('create_module_form')}}" class="btn btn-success">CREATE MODULE</a>
    <table class="table">
        <thead>
        <tr>
            <th>Module Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($modules as $module)
        <tr>
            <td>{{$module->module_name}}</td>
            <td>
                <a href="{{route('module_settings',['id'=>$module->id])}}">SETTINGS</a> |
                <a href="{{route('delete',['id'=>$module->id])}}">DELETE</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
