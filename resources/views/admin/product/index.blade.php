@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('errors.errors-and-messages')
                <div class="card-header"><i class="fa fa-align-justify"></i> Product's List<div class="pull-right">
                            <a href="{{route('admin.product.add')}}" class="btn btn-block btn-primary">Add</a>
                        </div></div>
                
                <div class="card-body">
                    <table id="list" class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                            <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                 
                                    <th>Status</th>
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
        ajax: "{{route('admin.product.list')}}",
        "columns": [
            {"data": null,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {"data": "name", sortable: false},
            {"data": "category", sortable: false},
      
            {"data": "status", sortable: false},
            {"data": "action", sortable: false},
        ]
    });

    $(document).ready(function () {

        $(document).on("click", ".delete", function () {
            var record_id = this.id;
            deletePopup(
                    "Deleting Product",
                    "Are you sure want to delete this product?",
                    record_id,
                    "{{route('admin.product.delete')}}"
                    );
        });

        $(document).on("click", ".update_status", function () {
            var record_id = this.id;
            var th = $(this);
            var status = th.attr('data-status');
            var update_status = (status == '1') ? 0 : 1;
            $.ajax({
                url: "{{route('admin.product.status')}}",
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