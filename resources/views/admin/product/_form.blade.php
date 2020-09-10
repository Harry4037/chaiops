<div class="box-body">
<div class="form-group">
        <label class="col-md-3 col-form-label">Select Image @if(!isset($product))<span class="error">*</span>@endif</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input type="file" class="form-control" name="product_img" id="icon">
        </div>
    </div>
    @if(isset($product))
    <div class="form-group">
        <label class="col-md-3 col-form-label">Image Preview</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <img class="img-bordered" src="{{$product->img}}" style="width: 50%">
        </div>
    </div>
    @endif
<div class="form-group">
        <label class="col-md-3 col-form-label">Name <span class="error">*</span></label>
        <div class="col-md-4 col-sm-6 col-xs-6">
            <input placeholder="Name" type="text" class="form-control" name="product_name" id="product_name" required value="@if(isset($product)){{$product->name}}@endif">
        </div>
    </div>
    @if(isset($categories))
    <div class="form-group">
        <label class="col-md-3 col-form-label">Category <span class="error">*</span></label>
        <div class="col-md-4 col-sm-6 col-xs-6">
            <select class="form-control" name="category_id" id="category_id">
                <option value="">Choose Option</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" 
                        @if(isset($product))
                        @if($product->category_id == $category->id)
                        {{ 'selected' }}
                        @endif
                        @endif
                        >{{$category->description}}</option>
                @endforeach
            </select>
        </div>
    </div>    
    @endif
    <div class="form-group">
        <label class="col-md-3 col-form-label">Description </label>
        <div class="col-md-6 col-sm-8 col-xs-8">
            <textarea placeholder="Description" class="form-control" name="product_description" id="product_description">@if(isset($product)){{$product->description}}@endif</textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-form-label">Price <span class="error">*</span></label>
        <div class="col-md-4 col-sm-6 col-xs-6">
            <input placeholder="Price" type="number" class="form-control" name="product_price" id="product_price" required value="@if(isset($product)){{$product->price}}@endif">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 col-form-label">Type <span class="error">*</span></label>
        <div class="col-md-4 col-sm-6 col-xs-6">
            @if(isset($product))
            <select class="form-control" id="product_type" name="product_type">
                <option value="">Choose option</option>
                <option value="100ml" @if($product->type == "100ml"){{'selected'}}@endif>100Ml</option>
                <option value="200ml" @if($product->type == "200ml"){{'selected'}}@endif>200Ml</option>
                <option value="300ml" @if($product->type == "300ml"){{'selected'}}@endif>300Ml</option>
            </select>
            @else
            <select class="form-control" id="product_type" name="product_type">
                <option value="">Choose option</option>
                <option value="100ml">100Ml</option>
                <option value="200ml">200Ml</option>
                <option value="300ml">300Ml</option>
            </select>
            @endif
        </div>
    </div>

    <div class="box-footer">
        <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-4">
                <a class="btn btn-default" href="{{ route('admin.product.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    <!-- /.box-footer -->