<div class="box-body">
    
    <div class="form-group">
        <label class="col-md-3 col-form-label">Name</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input type="text" class="form-control" readonly value="@if(isset($corporate)){{$corporate->name}}@endif">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-form-label">Email ID</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input type="text" class="form-control"  readonly value="@if(isset($corporate)){{$corporate->email}}@endif">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-form-label">Phone No</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input type="text" class="form-control" readonly value="@if(isset($corporate)){{$corporate->mob}}@endif">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-form-label">Message</label>
        <div class="col-md-6 col-sm-8 col-xs-8">
        <textarea class="form-control" >@if(isset($corporate)){{$corporate->message}}@endif</textarea>       
        </div>
    </div>
 
</div>
<!-- /.box-body -->
<div class="box-footer">
    <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-4">
            <a class="btn btn-primary" href="{{ route('admin.corporate.index') }}">Back</a>
        </div>
    </div>
</div>
<!-- /.box-footer -->