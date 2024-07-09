@extends('layouts.app')

@push('custom-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Permission Management</h2>
            </div>
            <div class="pull-right">
            @can('permission-create')
                <a class="btn btn-success btn-sm mb-2" href="{{ route('permissions.create') }}"><i class="fa fa-plus"></i> Create New Permission</a>
                @endcan
            </div>
        </div>
    </div>

    @session('success')
        <div class="alert alert-success" permission="alert"> 
            {{ $value }}
        </div>
    @endsession

    <table class="table table-bordered table_permission">
        <thead>
            <tr>
                <th width="100px">No</th>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    @push('custom-script')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
        <script type="text/javascript">
        $(function () {
                var table = $('.table_permission').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('permissions.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
        </script>
    @endpush

@endsection