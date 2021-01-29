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

<div class="container mt-5">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success_module'))
        <div class="alert alert-success">
            <strong>{{session('success_module')}}</strong>
        </div>
    @endif

    <form method="post" action="{{route('create_module')}}">
        @csrf
        <div class="form-group">
            <label for="module_name">Module Name</label>
            <input type="text" class="form-control" id="module_name" placeholder="Enter module name" name="module_name" value="{{old('module_name')}}">
        </div>
        <button type="submit" class="btn btn-default">Create</button>
    </form>
</div>

</body>
</html>
