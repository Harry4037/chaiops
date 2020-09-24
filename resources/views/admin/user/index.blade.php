@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('errors.errors-and-messages')
                <div class="card-header"><i class="fa fa-align-justify"></i> User's List</div>
                <div class="card-body">
                    <table id="list" class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Status</th>
                               
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
        ajax: "{{route('admin.user.list')}}",
        "columns": [
            {"data": null,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {"data": "name", sortable: false},
            {"data": "mobile", sortable: false},
            {"data": "email", sortable: false},
            {"data": "address", sortable: false},
            {"data": "status", sortable: false},
            
        ]
    });

    $(document).ready(function () {

        $(document).on("click", ".update_status", function () {
            var record_id = this.id;
            var th = $(this);
            var status = th.attr('data-status');
            var update_status = (status == '1') ? 0 : 1;
            $.ajax({
                url: "{{route('admin.user.status')}}",
                type: 'post',
                data: {status: update_status, record_id: record_id},
                dataType: 'json',
//                beforeSend: function () {
//                    $(".overlay").show();
//                },
                success: function (res) {
                    if (res.status) {
                        th.attr('data-status', res.data.status);
                        showSuccessMessage(res.data.message);
//                        $(".overlay").hide();
                    } else {
                        showErrorMessage(res.message);
//                        $(".overlay").hide();
                    }
                }
            });
        });

    });
</script>
@endsection