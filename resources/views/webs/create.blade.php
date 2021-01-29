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

    @if(session('success_web'))
        <div class="alert alert-success">
            <strong>{{session('success_web')}}</strong>
        </div>
    @endif

    <form method="post" action="{{route('web_store')}}">
        @csrf
        <div class="form-group">
            <label for="title">Web Site Name</label>
            <input type="text" class="form-control" id="title" placeholder="Enter web site name" name="title" value="{{old('title')}}">
        </div>

        <div class="form-group">
            <label for="web_url">Web Site Url</label>
            <input type="text" class="form-control" id="web_url" placeholder="Enter web site url" name="web_url" value="{{old('web_url')}}">
        </div>
        <button type="submit" class="btn btn-default">Create</button>
    </form>
</div>

</body>
</html>
