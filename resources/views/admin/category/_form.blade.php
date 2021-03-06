<div class="box-body">
    <div class="form-group">
        <label class="col-md-3 col-form-label">Select Image @if(!isset($category))<span class="error">*</span>@endif</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input type="file" class="form-control" name="icon" id="icon">
        </div>
    </div>
    @if(isset($category))
    <div class="form-group">
        <label class="col-md-3 col-form-label">Image Preview</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <img class="img-bordered" src="{{$category->image_name}}" style="width: 50%">
        </div>
    </div>
    @endif
    <div class="form-group">
        <label class="col-md-3 col-form-label">Name <span class="error">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input placeholder="Name" type="text" class="form-control" name="category_name" id="category_name" value="@if(isset($category)){{$category->description}}@endif">
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-4">
            <a class="btn btn-warning" href="{{ route('admin.category.index') }}">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
<!-- /.box-footer -->