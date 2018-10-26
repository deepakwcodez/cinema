@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="panel panel-default">
                <div class="panel-heading">Manage Movie</div>

                <div class="panel-body">
                    <div class="block">
                        <div class="block-content">
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Duration</th>
                                        <th>Movie Image</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach($movieList as $key => $value)
                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->description }}</td>
                                            <td>{{ $value->duration }}</td>
                                            <td><img src="{{ route('get_item',encrypt($value->movie_image)) }}" height="100px"></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('movie_edit',encrypt($value->id)) }}"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Movie"><i class="fa fa-pencil"></i></button></a>
                                                    <a href="{{ route('movie_remove_store',encrypt($value->id)) }}"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Movie"><i class="fa fa-times"></i></button></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="{{ asset('css/dataTables.jqueryui.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">

<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('js/dataTables.jqueryui.min.js') }}" defer></script>

<script>
    $(document).ready(function () {
        $('.js-dataTable-full').DataTable();
    });
</script>

@endsection