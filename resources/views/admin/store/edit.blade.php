@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                @include('errors.errors-and-messages')
                <div class="card-header"><i class="fa fa-align-justify"></i> Edit Store</div>
                
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.store.edit', $store) }}" method="post" id="storeForm" enctype="multipart/form-data">
                        @csrf
                        @include('admin.store._form')
                        </form>
                </div>
  </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {

        $("#storeForm").validate({
            rules: {
                icon1: {
                    accept: "image/*",
                },
                icon2: {
                  
                    accept: "image/*",
                },
                icon3: {
                
                    accept: "image/*",
                },
                store_name: {
                    required: true
                },
                phone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
               
                },
            },
            messages: {
                icon1: {
                    accept: "Not valid image type"
                },
                icon2: {
                    accept: "Not valid image type"
                },
                icon3: {
                    accept: "Not valid image type"
                },
                mobile_number: {
                    remote: 'This mobile number already in our record.',
                    digits: 'Please enter only digits.',
                    minlength: 'Please enter 10 digit mobile number.',
                    maxlength: 'Please enter 10 digit mobile number.',
                },
            }
        });
        $(document).on('keydown', "#store_name", function (e) {
        var charCode = (e.which) ? e.which : e.keyCode;
        if (((charCode == 8) || (charCode == 48) || (charCode == 57) || (charCode == 32) || (charCode == 46) || (charCode >= 35 && charCode <= 40) || (charCode >= 65 && charCode <= 90))) {
            return true;
        } else {
            return false;
        }
    });

    });
</script>
@endsection