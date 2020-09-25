@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                @include('errors.errors-and-messages')
                <div class="card-header"><i class="fa fa-align-justify"></i> View Reservation</div>
                
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.reservation.view', $reservation) }}" method="post" id="reservationForm" >
                       
                        @include('admin.reservation._form')
                        </form>
                </div>
  </div>
</div>
@endsection