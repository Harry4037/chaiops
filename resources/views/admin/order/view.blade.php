@extends('admin.layout.app')

@section('content')

<style>
.btn.disabled {
        opacity: 1 !important;
    }
.col-sm-4.invoice-col.bunker {
    border-left: 1px solid #bcbcbc;
    }

small.pull-right {
    display: block;
    margin-top: 8px;
    font-size: 17px;
}
.pull-right {
    float: right!important;
}
.bunk {
    margin-left: 1.5%;
}

</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('errors.errors-and-messages')

                <div class="card-header"><i class="fa fa-align-justify"></i><h4><label>Order Status</label>
                    @if($order->status == 1)
                    <label class="btn btn-secondary disabled">Pending</label>
                    @elseif($order->status == 2)
                    <label class="btn btn-warning disabled">Accepted</label>
                    @elseif($order->status == 3)
                    <label class="btn btn-success disabled">Delivered </label>
                    @elseif($order->status == 4)
                    <label class="btn btn-danger disabled">{{$order->cancel_by}}</label>
                    @else
                    <label class="btn btn-danger disabled">Failed </label>
                    @endif
                 
                    <small class="pull-right">Date: {{$order->created_at}}</small></div>
                    </h4>
		 </div>
        <!-- info row -->
        <div class="row invoice-info">
        
            <div class="col-sm-4 invoice-col">
            <strong>From,</strong>
                <address>
                    Chaiops Restaurant<br>
                    D- 486, 1st Floor, Sec – 7 Dwarka,<br>
       
                    New Delhi – 110075<br>
                    
                    @if(auth()->user()->mobile_number)Phone: {{auth()->user()->mobile_number}}<br>@endif
                    @if(auth()->user()->email)Email: {{auth()->user()->email}}@endif
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col bunker">
            <strong>To,</strong>
                <address>
                    @if($order->name){{$order->name}}<br>@endif
                    {!! $order->address !!},
                    {{$order->state}},
                    {{$order->city}},
                    {{$order->pincode}}<br>
                    Phone: {{$order->mobile_number}}<br>
                    @if($user->email)Email: {{$user->email}}@endif
                  
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col bunker">
                <b>Invoice Id #{{$order->id}}</b><br>
                <br>
                <b>Payment Date:</b> {{$order->created_at}}<br>
                <b>Payment Type:</b> {{$order->order_type}}<br>
                <b>Payment Status:</b> 
                @if($order->payment_text == 'PENDING')
                <label class="btn btn-secondary disabled">{{$order->payment_text}}</label>
                @elseif($order->payment_text == 'CONFIRMED')
                <label class="btn btn-success disabled">{{$order->payment_text}}</label>
                @elseif($order->payment_text == 'REFUNDED')
                <label class="btn btn-info disabled">{{$order->payment_text}}</label>
                <br>
                <span style="background-color: yellow">{{$order->cancel_description}}</span> 
                @else($order->payment_text == 'FAILED')
                <label class="btn btn-danger disabled">{{$order->payment_text}}</label>
                @endif
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
        <!-- Table row -->
        <div class="card-body">
        <table id="list" class="table table-striped table-hover text-center">
                    @if($orderItems->count())
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th >Product</th>
                            <th>Qty</th>
                            <th>Original Price</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderItems as $k => $orderItem)
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>@if($orderItem->product){{$orderItem->product->name}}@endif</td>
                            <td>{{$orderItem->quantity}}</td>
                            <td><i class="fa fa-rupee"></i> {{round($orderItem->total_price,2)}}</td>
                  
                        </tr>
                        @endforeach
                      
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
       </div>

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-sm-6">

            </div>
            <!-- /.col -->
            <div class="col-sm-6">
   
                    <table class="table table-striped table-hover text-center">
                        <tbody>
                            @if($orderItems->count())
                            <tr>
                                <th style="width:50%">Subtotal :</th>
                                <td><i class="fa fa-rupee"></i> {{round($order->item_total_amount,2)}}</td>
                            </tr>
                            <tr>
                                <th>Tax :</th>
                                <td><i class="fa fa-rupee"></i> {{ round($order->tax_amount,2)}}</td>
                            </tr>
                          
                            <tr>
                                <th>Total :</th>
                                <td><i class="fa fa-rupee"></i> {{round($order->total_amount,2)}}</td>
                            </tr>
                      
                            @endif
                        </tbody>
                    </table>
             
            </div>
            <!-- /.col -->
       
        </div>
        <!-- /.row -->
  
        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-sm-12">
                @if($order->order_type == 'ONLINE' && $order->payment_text == 'FAILED')
                @else
                @if($order->status == 1)
                <input type="hidden" name="order_id" id="order_id" value="{{$order->id}}">
                <a href="javaScript:void(0)" class="btn btn-danger pull-right bunk" id="cancel_order">Cancel Order</a>
                <a href="javaScript:void(0)" class="btn btn-success pull-right" id="accept_order">Accept Order</a>
                @elseif($order->status == 2)
                <a href="javaScript:void(0)" class="btn btn-info pull-right" id="order_complete" data-order="{{$order->id}}">Mark as Delivered</a>
               
              
                @else
                @endif
                @endif
            </div>
        </div>
  
    <!-- /.content -->
 </div>
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $(document).on('click', '#accept_order', function () {
            var order_id = $('#order_id').val();
            $.ajax({
                url: "{{route('admin.order.update-status')}}",
                type: 'post',
                data: {order_id: order_id},
                // beforeSend: function () {
                //     $(".overlay").show();
                // },
                success: function (res) {
                    if (res.status) {
                        showSuccessMessage(res.message);
                        // $(".overlay").hide();
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    } else {
                        showErrorMessage(res.message);
                        // $(".overlay").hide();
                    }
                }
            });
        });

        $(document).on('click', '#cancel_order', function () {
            var order_id = $('#order_id').val();
            $.ajax({
                url: "{{route('admin.order.cancel')}}",
                type: 'post',
                data: {order_id: order_id},
                // beforeSend: function () {
                //     $(".overlay").show();
                // },
                success: function (res) {
                    if (res.status) {
                        showSuccessMessage(res.message);
                        // $(".overlay").hide();
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    } else {
                        showErrorMessage(res.message);
                        // $(".overlay").hide();
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                }
            });
        });

        $(document).on('click', '#order_complete', function () {
            var order_id = $(this).data('order');
            $.ajax({
                url: "{{route('admin.order.mark-complete')}}",
                type: 'post',
                data: {order_id: order_id},
                // beforeSend: function () {
                //     $(".overlay").show();
                // },
                success: function (res) {
                    if (res.status) {
                        showSuccessMessage(res.message);
                        // $(".overlay").hide();
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    } else {
                        showErrorMessage(res.message);
                        // $(".overlay").hide();
                    }
                }
            });
        });

    });
</script>
@endsection