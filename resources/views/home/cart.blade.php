@extends('layout.app')

@section('content')
<style>
a.remove-from-cart.removeproduct {
  
    width: 25px;
    height: 25px;
    text-align: center;
    line-height: 24px;
    color: #dc8068;
    position: absolute;
    top: 5px;
    right: 5px;
}
a.remove-from-cart.removeproduct:hover {
  color: #333;
}
.movingContainer .cartItemContainer {
    margin-right: 1%;
    margin-bottom: 0;
    border-bottom: #f4f4f4 1px solid;
    padding: 15px;
}
.support-mail.clearfix {
background: #fbfbfb;
padding: 26px 26px 20px;
border: 1px solid #d8d8d8;
border-radius: 6px;
}
.rel {
    position: relative;
}
.cartItemContainer .rupeeIcon {
    margin-right: 5px;
}
.cartItemContainer .qtyWrapper .incr, .cartItemContainer .qtyWrapper .dcr {
    text-align: center;
    display: inline-block;
    color: #5e7e47;
    background-color: #fff;
    width: 35px;
    height: 35px;
    line-height: 37px;
    font-size: 27px;
}
.cartItemContainer .qtyWrapper .qty {
    display: inline-block;
    text-align: center;
    color: #fff;
    background: #5e7e47;
    width: 36px;
    line-height: 35px;
}
.cartItemContainer .qtyWrapper .incr, .cartItemContainer .qtyWrapper .dcr {
    text-align: center;
    display: inline-block;
    color: #5e7e47;
    background-color: #fff;
    width: 35px;
    height: 35px;
    line-height: 37px;
    font-size: 27px;
}
.cartItemContainer .qtyWrapper {
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 100px;
    background: #5e7e47;
    box-shadow: 0 1px 2px 0 #c8c8c3;
    border: solid 2px #5e7e47;
    width: 110px;
}
.cartItemContainer .removeItem {
    color: #368101;
    text-decoration: underline;
    display: inline-block;
    float: right;
    font-size: 14px;
    line-height: 18px;
    padding: 10px 0 5px;
    cursor: pointer;
}
.cartItemContainer .itemDetail {
    color: #62635e;
    margin: 5px 115px 5px 0;
    font-size: 12px;
    min-height: 40px;
    line-height: 16px;
}
.cartItemContainer .rupeeIcon {
    height: 12px;
    margin: 0 3px -1px 0;
}
.cartItemContainer .itemPrice {
    position: absolute;
    top: 8px;
    right: 5px;
    text-align: right;
    width: 70px;
    font-size: 14px;
    line-height: 18px;
}
.cartItemContainer .itemTitle {
    color: #292826;
    margin: 0 80px 0 0;
    font-size: 14px;
    line-height: 18px;
    padding: 9px 0;
}
.cartItemContainer .pic {
    display: inline-block;
    background-size: cover;
    background-position: center;
    float: left;
    width: 32px;
    height: 32px;
    margin: 0 8px 8px 0;
}
     </style>
<div class="banner clearfix">
  
    <div class=banner-text>
        <h2><span>Cart</span></h2>
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
<section class=cartpage>
    <div class=container>
       
        <div class=cartBody>
            <div class="heading clearfix">
                <h5>My Cart</h5>
                <p>
                    <span class="red caxrtitems">
                        {{$cartCount}}
                    </span> 
                    items
                </p>
            </div>
            <?php $total = 0; ?>
                @if($cartItems)
                @foreach($cartItems as $cartItem)
            <div class="cartBox cartItemContainer">
            <div class="rel">
            <div class="pic" style="background-image: url({{$cartItem->product->img}});">
            </div>
            <div class="itemTitle ellipsis">{{ $cartItem->product->name }}</div>
            <div class="itemPrice">
            <img class="rupeeIcon" src="../../img/rupee.png">
            <!-- react-text: 1990 -->{{$cartItem->productType->price * $cartItem->quantity}}<!-- /react-text --></div>
            <div class="rel"><div class="itemDetail"><div>
            </div><div><span>{{$cartItem->productType->type}}</span></div>
            <div class="removeItem" style="float: left;">Remove</div>
            </div><div class="qtyWrapper"><div class="incr">+</div>
            <div class="qty">{{$cartItem->quantity}}</div><div class="dcr">-</div></div>
            </div>
            </div></div>
         
            <?php $total = $total + ($cartItem->productType->price * $cartItem->quantity); ?>
                @endforeach
                @endif
         
     

            <div class=cart-meta>
                <div class=clearfix>
                    <div class=item-content>
                        <div>
                            <h4>Your total order value is</h4>
                            <?php $tax = ($total * 5)/100; ?>
                            <p> After added 5% tax (₹{{$tax}})</p>
                          
                        </div>
                    </div>
                    <div class=item-price> 
                        <span id=carttoutal>₹{{max(round($total+$tax), 0)}}</span>
                    </div>
                </div>
            </div>
            @if(auth()->check())
            @if($total != 0)
            <div class=mail-cart>
                <h3><span>your</span> details</h3>
                <form data-parsley-validate class="formcontact row" method="post" action="{{route('site.checkout')}}" id=orderfrm>
                    {{ csrf_field() }}
                    <div class=form-group> <input type=text class=form-control name=name placeholder=Name
                                                  @if(auth()->check()) value="{{ auth()->user()->name }}" @endif required
                                                  data-parsley-required-message="Please insert Name"> </div>
                    <div class=form-group> <input type=number class=form-control name=phone placeholder="Phone" maxlength="10" pattern="[0-9]{10}"
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
                    <input type="hidden" name="tax" value="{{ $tax }}">
                    <button type=submit id=send>order now</button>

                    <div class="ajaxmessage for-orderform hidden container"></div>
                </form>
            </div>
            @else
            <div class="clearfix order-box">
                <div class=complete-order>
                    <h2>Cart Is Empty</h2>
               
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
                    <a href='{{route("site.menu")}}' class=button-secondary>Order Now</a> 
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
            var product_type_id = _this.data("type");
            $.ajax({
                url: _baseUrl + '/increase-cart-quantity',
                type: 'post',
                data: {'product_id': product_id, 'product_type_id': product_type_id},
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
            var product_type_id = _this.data("type");
            $.ajax({
                url: _baseUrl + '/decrease-cart-quantity',
                type: 'post',
                data: {'product_id': product_id, 'product_type_id': product_type_id},
                success: function (res) {
                    _this.next().val(res.product_count);
                    $("#carttoutal").html(res.total);
                    location.reload();
                }
            });
        });

        $(document).on("click", ".removeproduct", function () {
            var product_id = $(this).data("id");
            var product_type_id =$(this).data("type");
            if (confirm("Are you sure want to delete this item.")) {
                $.ajax({
                    url: _baseUrl + '/delete-cart-product',
                    type: 'post',
                    data: {'product_id': product_id, 'product_type_id': product_type_id},
                    success: function (res) {
                        location.reload();                        
                    }
                });
            }
        });

    });

</script>

@endsection
