@extends('admin.layout.app')

@section('content')

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

    });
</script>
@endsection