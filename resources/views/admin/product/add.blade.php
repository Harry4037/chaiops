@extends('admin.layout.app')

@section('content')
<style>
div#other_product_div .form-group ul {
    list-style: none;
}


div#other_product_div .form-group ul li {
    float: left;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                @include('errors.errors-and-messages')
                <div class="card-header"><i class="fa fa-align-justify"></i> Add Product</div>
                
                <div class="card-body">
              
                <form class="form-horizontal" action="{{ route('admin.product.add') }}" method="post" id="addProductForm" enctype="multipart/form-data">
                        @csrf
                        @include('admin.product._form')
                </form>
                </div>
  </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {

        $("#addProductForm").validate({
            rules: {
                icon: {
                    required: true,
                    accept: "image/*",
                },
                product_name: {
                    required: true
                },
            },
            messages: {
                icon: {
                    accept: "Not valid image type"
                }
            }
        });
        $(document).on('keydown', "#product_name", function (e) {
        var charCode = (e.which) ? e.which : e.keyCode;
        console.log(charCode);
        if (((charCode == 8) || (charCode == 48) || (charCode == 57) || (charCode == 32) || (charCode == 46) || (charCode >= 35 && charCode <= 40) || (charCode >= 65 && charCode <= 90))) {
            return true;
        } else {
            return false;
        }
    });

    $(document).on("click", "#add_more_product", function () {
        var product_html = "<div class='form-group'>"
                    +"<label class='control-label col-sm-6 '></label>"
                    +"<div id='other_product_div'><div class='form-group'><ul>"
                   +"<li><label class='control-label col-md-12'>Quantity Type</label>"
                    +"<div class='col-sm-12'>"
                    +"<input type='text' class='form-control' required name='other_products[]'>"                           
        +"</div></li></ul><ul>"
        +"<li><label class='control-label col-md-12'>Quantity Price</label>"
        +"<div class='col-sm-12'>"
        +"<input type='text' class='form-control' required name='other_prices[]' >"
       +"</div></li></ul><i style='cursor:pointer' class='fa fa-times delete_this_div'></i>"
       +"</div></div></div>";
$("#other_product_div").append(product_html);
});

$(document).on("click", ".delete_this_div", function () {
        $(this).parent("div").remove();
    });

    });
</script>
@endsection