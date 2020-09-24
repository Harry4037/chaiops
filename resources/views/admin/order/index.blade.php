@extends('admin.layout.app')

@section('content')

<style>
    thead input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
    .btn.disabled {
        opacity: 1 !important;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('errors.errors-and-messages')
                <div class="card-header"><i class="fa fa-align-justify"></i> Order's List</div>
                
                <div class="card-body">
                    <table id="list" class="table table-striped table-hover text-center">
                        <thead>
                            
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Invoice Id</th>
                                    <!--<th>Mobile No</th>-->
                                    <th>Payment Type</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Invoice Id</th>
                                    <!--<th>Mobile No</th>-->
                                    <th>Payment Type</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script>
    // var url = site_url + "/order/list";
    // var invoice_id = $("#invoice_id").val();
    // var mobile_no = '';
    // var p_type = $("#p_type").val();
    // var p_status = $("#p_status").val();
    // var o_status = $("#o_status").val();
    // var new_url = url + "?";
    // new_url += "invoice_id=" + invoice_id;
    // new_url += "&mobile=" + mobile_no;
    // new_url += "&p_type=" + p_type;
    // new_url += "&p_status=" + p_status;
    // new_url += "&o_status=" + o_status;
    // var finalUri = new_url;

    var t = $('#list').DataTable({
        lengthMenu: [[10, 25, 50], [10, 25, 50]],
        searching: true,
        processing: true,
        serverSide: true,
        stateSave: true,
        // language: {
        //     'loadingRecords': '&nbsp;',
        //     'processing': '<i class="fa fa-refresh fa-spin"></i>'
        // },
        ajax: "{{route('admin.order.list')}}",
        "columns": [
            {"data": null,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {"data": "invoice_id", sortable: false},
//            {"data": "mobile_number", sortable: false},
            {"data": "order_type", sortable: false},
            {"data": "payment_status", sortable: false},
            {"data": "order_status", sortable: false},
            {"data": "created_at", sortable: false},
            {"data": "action", sortable: false},
        ]
    });

    // $(document).ready(function () {
    //     $(document).on('keyup change clean', '.custom_search', function () {
    //         invoice_id = $("#invoice_id").val();
    //         mobile_no = '';
    //         p_type = $("#p_type").val();
    //         p_status = $("#p_status").val();
    //         o_status = $("#o_status").val();
    //         new_url = url + "?";
    //         new_url += "invoice_id=" + invoice_id;
    //         new_url += "&mobile=" + mobile_no;
    //         new_url += "&p_type=" + p_type;
    //         new_url += "&p_status=" + p_status;
    //         new_url += "&o_status=" + o_status;
    //         finalUri = new_url;
    //         t.ajax.url(finalUri).load();
    //     });
    // });

</script>
@endsection