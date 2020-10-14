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

</style>
<div class="banner clearfix">
   
    <div class=banner-text>
        <h2><span>Menu</span></h2>
    </div>
</div>
</div>
<div class=social-icons> <a href=#><span class=icon-facebook></span></a> <a href=#><span class=icon-twitter></span></a>
    <a href=#><span class=icon-googleplus></span></a> <a href=#><span class=icon-dribble></span></a> </div>
</header>
<section class="productPage">
    <div class=container>
    <ul class="categories row">
    @if($categories)
   
    <li><button data-filter=* class=selected>All</button></li>
    @foreach($categories as $category)
               
               <li><button data-filter=.type{{$category->id }}>{{ $category->description }}</button></li>
               
               @endforeach
        @endif
            </ul>
            <div class="store-product-list row">
        <?php $i = 1; ?>
        @if($categories)
        @foreach($categories as $category)
                @foreach($category->product as $product)
                <div class="store-product-wrapper grid-item type{{$category->id}}">
                  <div class=store-product>
                     <div class="imgLiquidFill imgLiquid item-image"> <img src="./assets/images/Caramel-Coffee.jpg" alt="product item"> </div>
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
@endsection
