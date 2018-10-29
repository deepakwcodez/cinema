@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="panel panel-default">
                <div class="panel-heading">Change Password</div>
                <div class="panel-body">
                	@if(session()->has('alert-success'))
                        <div class="alert alert-success">
                            {{ session()->get('alert-success') }}
                        </div>
                    @endif
                    @if(session()->has('alert-danger'))
                        <div class="alert alert-danger">
                            {{ session()->get('alert-danger') }}
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

                	{!! Form::open(['url' => route("profile_changepass"), 'role' => 'form', 'files' => true]) !!}

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Current Password</label><br>
                            <input type="password" class="form-control" name="current_password" placeholder="Enter Current Password" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>New Password</label><br>
                            <input type="password" class="form-control" name="new_password" placeholder="Enter New Password" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Confirm New Password</label><br>
                            <input type="password" class="form-control" name="confirm_new_password" placeholder="Confirm New Password" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <button class="btn btn-primary">Change</button>
                        </div>
                    </div>

        			{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection