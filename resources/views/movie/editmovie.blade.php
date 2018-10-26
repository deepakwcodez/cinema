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

                    {!! Form::open(['url' => route("movie_edit_update"), 'role' => 'form', 'files' => true]) !!}
                    <input type="hidden" name="mid" value="{{ encrypt($movie->id) }}">

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Title</label><br>
                            <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{ $movie->title }}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Description</label><br>
                            <input type="text" class="form-control" name="description" placeholder="Enter Description" value="{{ $movie->description }}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Duration</label><br>
                            <input type="text" class="form-control" name="duration" placeholder="Enter Duration" value="{{ $movie->duration }}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Movie Image</label><br>
                            <img src="{{ route('get_item',encrypt($movie->movie_image)) }}" height="150px">
                            <br><br>
                            <input type="file" class="form-control" name="movie_image">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <button class="btn btn-primary">Update Movie</button>
                            <a href="{{ route('movie_manage') }}" class="btn btn-danger">Cancle</a>
                        </div>
                    </div>

        			{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection