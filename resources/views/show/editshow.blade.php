@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="panel panel-default">
                <div class="panel-heading">Edit Movie</div>

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

                    {!! Form::open(['url' => route("show_edit_update"), 'role' => 'form', 'files' => true]) !!}
                    <input type="hidden" name="mid" value="{{ encrypt($show->id) }}">

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Movie Name</label><br>
                            <input type="text" class="form-control" name="movie_name" placeholder="Enter Title" value="{{ $show->movie_name }}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Time</label><br>
                            <input type="text" class="form-control" name="time" placeholder="Enter Time" value="{{ $show->time }}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Screen</label><br>
                            <input type="text" class="form-control" name="screen" placeholder="Enter Screen" value="{{ $show->screen }}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <button class="btn btn-primary">Update Movie</button>
                            <a href="{{ route('show_manage') }}" class="btn btn-danger">Cancle</a>
                        </div>
                    </div>

        			{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection