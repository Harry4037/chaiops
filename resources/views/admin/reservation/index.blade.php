@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('errors.errors-and-messages')
                <div class="card-header"><i class="fa fa-align-justify"></i> Reservation's List</div>
                
                <div class="card-body">
                    <table id="list" class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Ocassion</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var t = $('#list').DataTable({
        lengthMenu: [[10, 25, 50], [10, 25, 50]],
        searching: true,
        processing: true,
        serverSide: true,
        stateSave: true,
//        language: {
//            'loadingRecords': '&nbsp;',
//            'processing': '<i class="fa fa-refresh fa-spin"></i>'
//        },
        ajax: "{{route('admin.reservation.list')}}",
        "columns": [
            {"data": null,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {"data": "name", sortable: false},
            {"data": "email", sortable: false},
            {"data": "occassion", sortable: false},
            {"data": "action", sortable: false},
        ]
    });

</script>
@endsection