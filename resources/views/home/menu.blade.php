@extends('layout.app')

@section('content')
<style>
.menu-page .pricing-carte {
    background-color: #323232;
    border: 1px dashed #3f3530;
    width: 100%!important;
}
#dropml{
border:0px;
outline:0px;
background-color:white;
background:none;
}
.categories button.selected {
    background: #f0c051;
    color: #fff;
    border-color: #f0c051;
    letter-spacing: 1px !important;
}
.product-detail h3 {
    color: #30271c;
    margin-top: 0;
    font-weight: 500;
    font-size: 15px;
}
</style>
<div class="banner clearfix">
   
    <div class=banner-text>
        <h2><span>Menu</span></h2>
    </div>
</div>
</div>
<div class="social-icons">
                  <a href="https://www.facebook.com/officialchaiops/" class="fa fa-facebook"></a>
                  <a href="https://twitter.com/officialchaiops/" class="fa fa-twitter"></a>
                  <a href="https://www.instagram.com/officialchaiops/" class="fa fa-instagram"></a>
                  <a href="https://www.linkedin.com/company/chaiops/" class="fa fa-linkedin"></a>
                </div>
</header>
<section class="productPage">
    <div class=container>
    <ul class="categories row">
    @if($categories)
   
  <?php $w=0; ?>
    @foreach($categories as $category)
               
               <li><button @if($w == 0) class=selected {{ $w++}} @endif data-filter=.type{{$category->id }}>{{ $category->description }}</button></li>
               
               @endforeach
        @endif
        <li><button data-filter=*  >All</button></li>
            </ul>
            <div class="store-product-list row">
        <?php $i = 1; ?>
        @if($categories)
        @foreach($categories as $category)
                @foreach($category->product as $product)
                <div class="store-product-wrapper grid-item type{{$category->id}}">
                  <div class=store-product>
                     <div class="imgLiquidFill imgLiquid item-image"> <img src="{{$product->img}}" alt="product item"> </div>
                     <div class=product-detail>
               
                        <h3>{{ $product->name }}</h3>
                        <select class="cuisine-heart{{$product->id}}" id="dropml" >
                            @foreach($product->productType as $type)
                        <option value="{{$type->id}}" >₹{{$type->price}} ( {{$type->type}} )</option>
                        @endforeach
                        </select>
                     </div>
                     <div class="clearfix add-buy"> <a href="javaScript:void(0);" class="add-cart addItemCart" data-id="{{$product->id}}">Add to Cart</a>
					</div>
                  </div>
               </div>
                @endforeach
       
        <?php $i++; ?>
        @endforeach
        @endif
        </div>
    </div>
</section>
    <script>
$(document).ready(function() {
    $('[data-filter=".type5"]').trigger('click');
});
</script>
@endsection
