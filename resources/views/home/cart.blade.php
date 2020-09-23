@extends('layout.app')

@section('content')
<div class="banner clearfix">
    <div class=banner-img> <img src="{{ asset("assets/images/cup.png") }}" alt=image> </div>
    <div class=banner-text>
        <h2>Our special & exclusive <span>Cart</span></h2>
    </div>
</div>
</div>
<div class=social-icons> 
    <a href=#>
        <span class=icon-facebook></span>
    </a> 
    <a href=#>
        <span class=icon-twitter></span>
    </a>
    <a href=#>
        <span class=icon-googleplus></span>
    </a> 
    <a href=#>
        <span class=icon-dribble>

        </span>
    </a> 
</div>
</header>
<section class=cartpage>
    <div class=container>
        <div class="cartHeader clearfix">
            <h1 class=logo>
                <a href="/"> 
                    <img src="{{ asset("assets/images/logo.png") }}" alt=image>
                </a> 
            </h1>
            <div class=orderId>
                <div>
                    <p class=datetime></p>
                </div>
            </div>
        </div>
        <div class=cartBody>
            <div class="heading clearfix">
                <h5>confirm your order</h5>
                <p>you have selected 
                    <span class="red caxrtitems">
                        {{$cartCount}}
                    </span> 
                    product
                </p>
            </div>
            <ul class=salectedProduct id=cartItems4Type2>
                <?php $total = 0; ?>
                @if($cartItems)
                @foreach($cartItems as $cartItem)
                <li class="clearfix">
                    <div class="item-content">
                        <div class="item-image">
                            @if($cartItem->product && $cartItem->product->image)
                            <img src="$cartItem->product->image" alt="image">
                            @else
                            <img src="/assets/images/gallery/gallery01.jpg" alt="image">
                            @endif
                        </div>
                        <div class="item-details">
                            <h6>{{ $cartItem->product->name }}</h6>
                            <div class="productQuantity">
                                <input type="button" value="-" class="minus" data-id="{{$cartItem->product->id}}">
                                <input type="number" name="quantity" value="{{$cartItem->quantity}}" style="width: 40%;" disabled>
                                <input type="button" value="+" class="plus" data-id="{{$cartItem->product->id}}">
                            </div>
                        </div>
                    </div>
                    <div class="item-price">
                        <span>₹{{$cartItem->product->price * $cartItem->quantity}}</span>
                    </div>

                    <a href="#" class="remove-from-cart removeProduct" data-id="{{$cartItem->product->id}}">
                        <i class="fa fa-times"></i>
                    </a>
                </li>
                <?php $total = $total + ($cartItem->product->price * $cartItem->quantity); ?>
                @endforeach
                @endif
            </ul>

            <div class=cart-meta>
                <div class=clearfix>
                    <div class=item-content>
                        <div>
                            <h4>your total order value is</h4>
                      
                            <p> After added tax (₹{{($total * 18)/100}})</p>
                            <?php $total = $total + ($total * 18)/100; ?>
                        </div>
                    </div>
                    <div class=item-price> 
                        <span id=carttoutal>₹{{$total}}</span> 
                    </div>
                </div>
            </div>
            @if(auth()->check())
            <div class=mail-cart>
                <h3><span>your</span> details</h3>
                <form data-parsley-validate class="formcontact row" method="post" action="{{route('site.checkout')}}" id=orderfrm>
                    {{ csrf_field() }}
                    <div class=form-group> <input type=text class=form-control name=name placeholder=Name
                                                  @if(auth()->check()) value="{{ auth()->user()->name }}" @endif required
                                                  data-parsley-required-message="Please insert Name"> </div>
                    <div class=form-group> <input type=number class=form-control name=phone placeholder="Phone"
                                                  @if(auth()->check()) value="{{ auth()->user()->phone_number }}" @endif required
                                                  data-parsley-required-message="Please insert Phone No"> </div>
                    <div class=form-group> <input type=email class=form-control name=email placeholder=Email
                                                  @if(auth()->check()) value="{{ auth()->user()->email }}" @endif required
                                                  data-parsley-required-message="Please insert Email"> </div>
                    <div class=form-group> <input type=text class=form-control name=address placeholder=Address
                                                  @if(auth()->check()) value="{{ auth()->user()->address }}" @endif required
                                                  data-parsley-required-message="Please insert address"> </div>
                                                  <div class=form-group> <input type=text class=form-control name=state placeholder=State
                                                  @if(auth()->check()) value="{{ auth()->user()->state }}" @endif required
                                                  data-parsley-required-message="Please insert state"> </div>
                                                  <div class=form-group> <input type=text class=form-control name=city placeholder=City
                                                  @if(auth()->check()) value="{{ auth()->user()->city }}" @endif required
                                                  data-parsley-required-message="Please insert city"> </div>
                                                  <div class=form-group> <input type=number class=form-control name=pincode placeholder=Pincode
                                                  @if(auth()->check()) value="{{ auth()->user()->pincode }}" @endif required
                                                  data-parsley-required-message="Please insert pincode"> </div>
                    <input type="hidden" name="total" value="{{ $total }}">
                    <button type=submit id=send>order now</button>

                    <div class="ajaxmessage for-orderform hidden container"></div>
                </form>
            </div>
            @else
            <div class="clearfix order-box">
                <div class=complete-order>
                    <h2>Done with choosing?</h2>
                    <h5>Well done! Now complete your order</h5>
                </div>
                <div class=selected-item-no>
                    <p>You have selected <span>{{ $cartCount }}</span> items
                    </p>
                </div>
                <div class=order-btn> 
                    <a href='{{route("site.login")}}' class=button-secondary>Order Now</a> 
                </div>
            </div>
            @endif

        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function () {

        $(document).on("click", ".plus", function () {
            var _this = $(this);
            var product_id = _this.data("id");
            $.ajax({
                url: _baseUrl + '/increase-cart-quantity',
                type: 'post',
                data: {product_id: product_id},
                success: function (res) {
                    _this.prev().val(res.product_count);
                    $("#carttoutal").html(res.total);
                    location.reload();
                }
            });
        });
        $(document).on("click", ".minus", function () {
            var _this = $(this);
            var product_id = _this.data("id");
            $.ajax({
                url: _baseUrl + '/decrease-cart-quantity',
                type: 'post',
                data: {product_id: product_id},
                success: function (res) {
                    _this.next().val(res.product_count);
                    $("#carttoutal").html(res.total);
                    location.reload();
                }
            });
        });

        $(document).on("click", ".removeProduct", function () {
            var product_id = $(this).data("id");
            if (confirm("Are you sure want to delete this item.")) {
                $.ajax({
                    url: _baseUrl + '/delete-cart-product',
                    type: 'post',
                    data: {product_id: product_id},
                    beforeSend: function () {
                        //                $(".overlay").show();
                    },
                    success: function (res) {
                        location.reload();                        
                    }
                });
            }
        });

    });

</script>

@endsection
