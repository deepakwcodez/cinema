@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="panel panel-default">
                <div class="panel-heading">Add Movie</div>

                <div class="panel-body">
                    {!! Form::open(['url' => route("movie_add_store"), 'role' => 'form']) !!}

        			{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection