@extends('layout.app')

@section('content')
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
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur
                adipisicing elit.</p>
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
                                <div class="cuisine-price">${{ $product->price }}</div>
                                <div class="cuisine-heart">{{ $product->type }}</div>
                            </div>
                        </div>
                        <div class="menu-btn-holder clearfix">
                            <a href="/add-to-cart/{{ $product->id }}" class="add-cart addTroCart">Add Cart</a> 
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
            <div class=section-number><span>09</span></div>
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
                <h3><span>44</span> Park Street</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
        </div>
        <div id=map-canvas></div>
    </div>
</section>

@endsection
