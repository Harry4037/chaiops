@extends('layout.app')

@section('content')
<style>
    .store-product-wrapper .product-rate {
    height: 54px !important;
    width: 90% !important;
    border-radius: 10px !important;

    }
    .add-buy a {
    width: 100% !important;
}
    </style>
<div class="banner clearfix">
    <div class="banner-img">
        <img src="{{ asset("assets/images/cup.png") }}" alt="">
    </div>
    <div class="banner-text">
        <h2>Our special & exclusive
            <span>Store List</span></h2>
    </div>
</div>
</div>
<div class="social-icons">
    <a href="#">
        <span class="icon-facebook"></span></a>
    <a href="#">
        <span class="icon-twitter"></span></a>
    <a href="#">
        <span class="icon-googleplus"></span></a>
    <a href="#">
        <span class="icon-dribble"></span></a>
</div>
</header>
<section class=productPage>
   <div class=container>
      <div class="store-product-list row">
          @if($stores)
          @foreach( $stores as $store)
         <div class="store-product-wrapper grid-item ">
            <div class=store-product>
               <div class="imgLiquidFill imgLiquid item-image"> <img src="{{ $store->image }}" alt="product item"> </div>
               <div class=product-detail>
                  <div class=product-rate>{{ $store->name }}</div>
                  <h3>{{ $store->address }}</h3>
                  <p>{{ $store->timing }}</p>
                  <p><i class="fa fa-envelope" aria-hidden="true"></i>{{ $store->email }}</p>
                  <p><i class="fa fa-phone" aria-hidden="true"></i>{{ $store->phone }}</p>
               </div>
               <div class="clearfix add-buy"><a href="{{ $store->direction }}" class=buy-btn>Get Direction</a> </div>
            </div>
         </div>
         @endforeach
         @endif
      </div>
   </div>
</section>

<section class="contact-sectn">
    <div class="container">
        <div>
            <div class="section-number">
                <span>09</span></div>
            <div class="section-heading">
                <h1>
                    <span>Contact</span></h1>
                <h2>With us</h2>
            </div>
        </div>
    </div>
    <div class="contact-us">
        <div class="add">
            <div class="add-inner-wrapper">
                <h2>
                    <img src="{{ asset("assets/images/contact-img.png") }}" alt="">
                    <span>Coffee and you</span>
                </h2>
                <h3>
                    <span>44</span>
                    Park Street</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
        </div>
        <div id="map-canvas"></div>
    </div>
</section>

@endsection
