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

    @if(session('success_settings'))
        <div class="alert alert-success">
            <strong>{{session('success_settings')}}</strong>
        </div>
    @endif

    <form method="post" action="{{route('settings_store')}}">
        @csrf
        <div class="form-group">
            <label for="module_id">Module</label>
            <select class="form-control" name="module_id" id="module_id">
                <option>SELECT MODULE</option>
               @foreach($modules as $module)
                <option value="{{$module->id}}" @if($module->id==old('module_id')) selected @endif>{{$module->module_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="web_id">Web Site</label>
            <select class="form-control" name="web_id" id="web_id">
                <option>SELECT WEB</option>
                @foreach($webs as $web)
                    <option value="{{$web->id}}" @if($web->id==old('web_id')) selected @endif>{{$web->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="field_name">Field Name</label>
            <input type="text" class="form-control" id="field_name" placeholder="Enter settings field name" name="field_name" value="{{old('field_name')}}">
        </div>

        <div class="form-group">
            <label for="field_title">Field Title</label>
            <input type="text" class="form-control" id="field_title" placeholder="Enter settings field title" name="field_title" value="{{old('field_title')}}">
        </div>

        <div class="form-group">
            <label for="field_type">Field Type</label>
            <select class="form-control" name="field_type" id="field_type">
                <option>SELECT FIELD TYPE</option>
                @foreach($field_types as $field_type)
                    <option value="{{$field_type}}" @if($field_type==old('field_type')) selected @endif>{{$field_type}}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-default">Create settings</button>
    </form>
</div>

</body>
</html>

