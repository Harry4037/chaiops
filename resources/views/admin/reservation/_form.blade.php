<div class="box-body">
    
    <div class="form-group">
        <label class="col-md-3 col-form-label">Name</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input type="text" class="form-control" readonly value="@if(isset($reservation)){{$reservation->name}}@endif">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-form-label">Email ID</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input type="text" class="form-control"  readonly value="@if(isset($reservation)){{$reservation->email}}@endif">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-form-label">No. of Persons</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input type="text" class="form-control" readonly value="@if(isset($reservation)){{$reservation->person}}@endif">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-form-label">Occassion</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input type="text" class="form-control" readonly value="@if(isset($reservation)){{$reservation->occassion}}@endif">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-form-label">Message</label>
        <div class="col-md-6 col-sm-8 col-xs-8">
        <p>@if(isset($reservation)){{$reservation->message}}@endif</p>       
        </div>
    </div>
 
</div>
<!-- /.box-body -->
<div class="box-footer">
    <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-4">
            <a class="btn btn-primary" href="{{ route('admin.reservation.index') }}">Back</a>
        </div>
    </div>
</div>
<!-- /.box-footer -->