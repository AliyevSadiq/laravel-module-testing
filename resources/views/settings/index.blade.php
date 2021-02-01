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
    <h2>Settings List</h2>
    <a href="{{route('settings_create')}}" class="btn btn-success">CREATE SETTINGS</a>
    <table class="table">
        <thead>
        <tr>
            <th>Module</th>
            <th>Web Site</th>
            <th>Field Name</th>
            <th>Field Title</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($settings as $setting)
            <tr>
                <td>{{$setting->module->module_name}}</td>
                <td>{{$setting->web->title}}</td>
                <td>{{$setting->field_name}}</td>
                <td>{{$setting->field_title}}</td>
                <td>
                    <a href="{{route('settings_delete',['id'=>$setting->id])}}">DELETE</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
