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
    <div class=banner-img> <img src="{{ asset("assets/images/cup.png")}}" alt=""> </div>
    <div class=banner-text>
        <h2>Our special & exclusive <span>Menu</span></h2>
    </div>
</div>
</div>
<div class=social-icons> <a href=#><span class=icon-facebook></span></a> <a href=#><span class=icon-twitter></span></a>
    <a href=#><span class=icon-googleplus></span></a> <a href=#><span class=icon-dribble></span></a> </div>
</header>
<section class="menu-sectn menu-list-page">
    <div class=container>
        <div class=section-heading-type2>
            <h2>Choose from our variety of flavours.</h2>
            
        </div>
        <?php $i = 1; ?>
        @if($categories)
        @foreach($categories as $category)
        <div class="pricing-table type-{{ $i }}">
            <div class="pricing-detail image-not-overlap">
                <figure>
                    <div class=image> <img src="{{ $category->image_name }}" alt=""> </div>
                    <figcaption>
                        <h3>{{ $category->description }}</h3>
                        <p></p>
                    </figcaption>
                </figure>
            </div>
            <div class="pricing-carte clearfix scrollbar">

                @foreach($category->product as $product)
                <div class="cuisine-wrapper store-product">
                    <div class=cuisine>
                        <div class=clearfix>
                            <div class=card-left>
                                <div class="cuisine-name">{{ $product->name }}</div>
                                <div class="cuisine-detail">{{ $product->description }}</div>
                            </div>
                            <div class="card-right">
                                <!-- <div class="cuisine-price">₹{{ $product->price }}</div>
                               -->
                               <select class="cuisine-heart{{$product->id}}" id="dropml" >
                            @foreach($product->productType as $type)
<option value="{{$type->id}}" >₹{{$type->price}} ( {{$type->type}} )</option>
@endforeach
</select>
                            </div>
                        </div>
                        <div class="menu-btn-holder clearfix">
                            <a href="javaScript:void(0);" class="addItemCart add-cart" data-id="{{$product->id}}">Add Cart</a> 
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
        <?php $i++; ?>
        @endforeach
        @endif
        @if(session()->get('cart'))
        <div class="clearfix order-box">
            <div class=complete-order>
                <h2>Done with choosing?</h2>
                <h5>Well done! Now complete your order</h5>
            </div>
            <div class=selected-item-no>
                <p>You have selected <span>{{count(session()->get('cart'))}}</span> items</p>
            </div>
            <div class=order-btn> <a href='/cart' class=button-secondary>Order Now</a> </div>
        </div>
        @endif
    </div>
</section>
<section class=contact-sectn>
    <div class=container>
        <div>
            <div class=section-number><span>02</span></div>
            <div class=section-heading>
                <h1><span>Contact</span></h1>
                <h2>With us</h2>
            </div>
        </div>
    </div>
    <div class=contact-us>
        <div class=add>
            <div class=add-inner-wrapper>
                <h2> <img src="{{ asset("assets/images/contact-img.png")}}" alt=""> <span>Coffee and you</span> </h2>
                <h3>  <span>D- 486</span>
                    1st Floor, Sec – 7</h3>
                <p>Dwarka, New Delhi – 110075</p>
            </div>
        </div>
        <div id="map-cvas"> <iframe class="responsive-iframe"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14014.064218808973!2d77.0628016697754!3d28.58429149999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1b29ff558a3d%3A0x342e71ccc8a77e3d!2sChaiops!5e0!3m2!1sen!2sin!4v1600871787763!5m2!1sen!2sin" width="50%" height="700" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                           </div>
    </div>
</section>

@endsection
