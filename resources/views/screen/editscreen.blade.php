@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="panel panel-default">
                <div class="panel-heading">Edit Screen</div>

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

                    {!! Form::open(['url' => route("screen_edit_update"), 'role' => 'form', 'files' => true]) !!}
                    <input type="hidden" name="sid" value="{{ encrypt($screen['id']) }}">

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Title</label><br>
                            <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{ $screen['title'] }}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <button class="btn btn-primary">Update Screen</button>
                            <a href="{{ route('screen_manage') }}" class="btn btn-danger">Cancle</a>
                        </div>
                    </div>

        			{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection