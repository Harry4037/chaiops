<div class="box-body">
    <div class="form-group">
        <label class="col-md-3 col-form-label">Category <span class="error">*</span></label>
        <div class="col-md-4 col-sm-6 col-xs-6">
        @if(isset($blog))
            <select class="form-control" disabled id="blog_type" name="blog_type">
                <option value="">Choose option</option>
                <option value="blog" @if($blog->type == "blog"){{'selected'}}@endif>Blog</option>
                <option value="video" @if($blog->type == "video"){{'selected'}}@endif>video</option>
           
            </select>
            @else
            <select class="form-control" required id="blog_type" name="blog_type">
                <option value="">Choose option</option>
                <option value="blog">Blog</option>
                <option value="video">Video</option>
  
            </select>
            @endif
        </div>
    </div>    
    <div class="form-group">
        <label class="col-md-3 col-form-label">Select Image</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input type="file" class="form-control" name="icon" id="icon">
        </div>
    </div>
    @if(isset($blog))
    <div class="form-group">
        <label class="col-md-3 col-form-label">Image Preview</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <img class="img-bordered" src="{{$blog->img}}" style="width: 50%">
        </div>
    </div>
    @endif
    <div class="form-group">
        <label class="col-md-3 col-form-label">Title <span class="error">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input placeholder="Name" type="text" class="form-control" name="blog_name" id="blog_name" required value="@if(isset($blog)){{$blog->title}}@endif">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-form-label">Description Or Youtube Link(Video)<span class="error">*</span></label>
        <div class="col-md-6 col-sm-8 col-xs-8">
            <textarea class="form-control" name="blog_description" id="blog_description">@if(isset($blog)){{$blog->description}}@endif</textarea>
        </div>
    </div>
  
</div>
<!-- /.box-body -->
<div class="box-footer">
    <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-4">
            <a class="btn btn-warning" href="{{ route('admin.blog.index') }}">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
<!-- /.box-footer -->