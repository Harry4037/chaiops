<div class="box-body">
    <div class="form-group">
        <label class="col-md-3 col-form-label">Select Store Image @if(!isset($store))<span class="error">*</span>@endif</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input type="file" class="form-control" name="icon" id="icon">
        </div>
    </div>
    @if(isset($store))
    <div class="form-group">
        <label class="col-md-3 col-form-label">Store Image Preview</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <img class="img-bordered" src="{{$store->image}}" style="width: 50%">
        </div>
    </div>
    @endif
    <div class="form-group">
        <label class="col-md-3 col-form-label">Store Name <span class="error">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input placeholder="Store Name" type="text" class="form-control" name="store_name" id="store_name" required value="@if(isset($store)){{$store->name}}@endif">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-form-label">Store Address <span class="error">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input placeholder="Address" type="text" class="form-control" name="address" id="address" required value="@if(isset($store)){{$store->address}}@endif">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-form-label">Store Timing <span class="error">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input placeholder="Timing" type="text" class="form-control" name="timings" id="timings" required value="@if(isset($store)){{$store->timings}}@endif">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-form-label">Store Email <span class="error">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input placeholder="Email" type="email" class="form-control" name="email" id="email" required value="@if(isset($store)){{$store->email}}@endif">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-form-label">Store Phone <span class="error">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input placeholder="Phone Number" type="number" class="form-control" name="phone" id="phone" required value="@if(isset($store)){{$store->phone}}@endif">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-form-label">Store Direction <span class="error">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input placeholder="Direction" type="text" class="form-control" name="direction" id="direction" required  value="@if(isset($store)){{$store->direction}}@endif">
        </div>
    </div>
    
</div>
<!-- /.box-body -->
<div class="box-footer">
    <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-4">
            <a class="btn btn-warning" href="{{ route('admin.store.index') }}">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
<!-- /.box-footer -->