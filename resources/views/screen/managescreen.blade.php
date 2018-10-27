@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="panel panel-default">
                <div class="panel-heading">Manage Screen</div>

                <div class="panel-body">
                    <div class="block">
                        <div class="block-content">
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Title</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>

                                    @foreach($screenList as $key => $value)
                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            <td>{{ $value['title'] }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default updateScreen" type="button" data-toggle="tooltip" title="Edit Screen"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default deleteScreen" type="button" data-toggle="tooltip" title="Remove Screen"><i class="fa fa-times"></i></button>
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
    $(document).on('click', '.deleteScreen', function(e) {
        if(confirm('Are you sure you want to delete screen?')) {
            window.location='{{ route("screen_delete", $value['id']) }}';
        }
    });
    $(document).on('click', '.updateScreen', function(e) {
        window.location='{{ route('screen_edit',encrypt($value['id'])) }}';
    });
    
</script>

@endsection