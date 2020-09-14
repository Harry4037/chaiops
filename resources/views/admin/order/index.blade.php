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
                                    <th><input placeholder="search invoice id" class="custom_search" type="text" id="invoice_id"></th>
                                    <!--<th><input placeholder="search mobile no." class="custom_search" type="text" id="mobile_no"></th>-->
                                    <th>
                                        <select class="form-control custom_search" id="p_type">
                                            <option value="">--SELECT OPTION--</option>
                                            <option value="COD">COD</option>
                                            <option value="ONLINE">ONLINE</option>
                    
                                        </select>
                                    </th>
                                    <th>
                                        <select class="form-control custom_search" id="p_status">
                                            <option value="">--SELECT OPTION--</option>
                                            <option value="PENDING">PENDING</option>
                                            <option value="CONFIRMED">CONFIRMED</option>
                                            <option value="FAILED">FAILED</option>
                                            <option value="REFUNDED">REFUNDED</option>
                                        </select>
                                    </th>
                                    <th>
                                        <select class="form-control custom_search" id="o_status">
                                            <option value="">--SELECT OPTION--</option>
                                            <option value="1">PENDING</option>
                                            <option value="2">ACCEPTED</option>
                                            <option value="3">ASSIGNED</option>
                                            <option value="4">DELIVERED</option>
                                            <option value="5">CANCELLED</option>
                                        </select>
                                    </th>
                                    <th></th>
                                    <th></th>
                                </tr>
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
    var url = site_url + "/order/list";
    var invoice_id = $("#invoice_id").val();
    var mobile_no = '';
    var p_type = $("#p_type").val();
    var p_status = $("#p_status").val();
    var o_status = $("#o_status").val();
    var new_url = url + "?";
    new_url += "invoice_id=" + invoice_id;
    new_url += "&mobile=" + mobile_no;
    new_url += "&p_type=" + p_type;
    new_url += "&p_status=" + p_status;
    new_url += "&o_status=" + o_status;
    var finalUri = new_url;

    var t = $('#list').DataTable({
        lengthMenu: [[10, 25, 50], [10, 25, 50]],
        searching: false,
        processing: true,
        serverSide: true,
        stateSave: true,
        // language: {
        //     'loadingRecords': '&nbsp;',
        //     'processing': '<i class="fa fa-refresh fa-spin"></i>'
        // },
        ajax: finalUri,
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

    $(document).ready(function () {
        $(document).on('keyup change clean', '.custom_search', function () {
            invoice_id = $("#invoice_id").val();
            mobile_no = '';
            p_type = $("#p_type").val();
            p_status = $("#p_status").val();
            o_status = $("#o_status").val();
            new_url = url + "?";
            new_url += "invoice_id=" + invoice_id;
            new_url += "&mobile=" + mobile_no;
            new_url += "&p_type=" + p_type;
            new_url += "&p_status=" + p_status;
            new_url += "&o_status=" + o_status;
            finalUri = new_url;
            t.ajax.url(finalUri).load();
        });
    });

</script>
@endsection