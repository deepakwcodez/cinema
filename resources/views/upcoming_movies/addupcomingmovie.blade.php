@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add Upcoming Movie</div>

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

                    {!! Form::open(['url' => route("upcoming_add_store"), 'role' => 'form', 'files' => true]) !!}

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Title</label><br>
                            <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{ old('title') }}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Movie Image</label><br>
                            <input type="file" class="form-control" name="upcoming_movie_image" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <button class="btn btn-primary">Add Upcoming Movie</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection