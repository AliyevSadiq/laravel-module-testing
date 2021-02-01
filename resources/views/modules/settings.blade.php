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
    @if(count($module_settings)>0)
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        @if(session('success_setting_module'))
            <div class="alert alert-success">
                <strong>{{session('success_setting_module')}}</strong>
            </div>
        @endif


    <form method="post" action="{{route('module_settings_store')}}">
        @csrf
        @method('put')
        @foreach($module_settings as $setting)
        <div class="form-group">
            <label for="{{$setting->field_name}}">{{ucfirst($setting->field_title)}}  for {{ucfirst($setting->web->title)}}</label>
            <input type="text" class="form-control" id="{{$setting->field_name}}" placeholder="Enter {{$setting->field_title}}"  value="{{$setting->field_value}}"   name="field_value[]" >
            <input type="hidden" name="field_name[]" value="{{$setting->field_name}}">
        </div>
        @endforeach
        <button type="submit" class="btn btn-default">Create</button>
    </form>

        @else
       <div class="alert alert-danger">
           <strong><a href="{{route('settings_list')}}">CREATE NEW SETTINGS FOR THIS MODULE</a></strong>
       </div>
        @endif
</div>

</body>
</html>
