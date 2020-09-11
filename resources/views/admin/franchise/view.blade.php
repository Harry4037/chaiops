@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                @include('errors.errors-and-messages')
                <div class="card-header"><i class="fa fa-align-justify"></i> View franchise</div>
                
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.franchise.view', $franchise) }}" method="post" id="franchiseForm" >
                       
                        @include('admin.franchise._form')
                        </form>
                </div>
  </div>
</div>
@endsection