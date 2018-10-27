@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="panel panel-default">
                <div class="panel-heading">Add Show</div>

                <div class="panel-body">
                    @if(session()->has('alert-success'))
                        <div class="alert alert-success">
                            {{ session()->get('alert-success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {!! Form::open(['url' => route("show_add_store"), 'role' => 'form', 'files' => true]) !!}

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Movie Name</label><br>
                            <input type="text" class="form-control" name="movie_name" placeholder="Enter Movie Name" value="{{ old('movie_name') }}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Time</label><br>
                            <input type="text" class="form-control" name="time" id="timepicker" placeholder="Enter Time" value="{{ old('time') }}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Screen</label><br>
                            <select class="form-control" name="screen" required>
                                <option value="">-- Select Screen --</option>
                                @foreach($screenList as $key => $value)
                                    <option value="{{ $value['id'] }}">{{ $value['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                    

                    <div class="row form-group">
                        <div class="col-md-12">
                            <button class="btn btn-primary">Add Show</button>
                        </div>
                    </div>

        			{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.timepicker.min.css') }}">
<script type="text/javascript" src="{{ asset('js/jquery.timepicker.min.js') }}" defer></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 1,
            minTime: '0',
            maxTime: '12:59pm',
            defaultTime: '12',
            startTime: '00:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    });
</script>

@endsection