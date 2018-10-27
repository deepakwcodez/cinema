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
                            <input type="text" class="form-control" name="time" placeholder="Enter Time" value="{{ old('time') }}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Screen</label><br>
                            <input type="text" class="form-control" name="screen" value="{{ old('screen') }}" required>
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
@endsection