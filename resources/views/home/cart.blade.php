@extends('layout.app')

@section('content')
<style>
a.remove-from-cart.removeproduct {
    background-color: #fff;
    width: 25px;
    height: 25px;
    text-align: center;
    line-height: 24px;
    color: #dc8068;
    position: absolute;
    top: 5px;
    right: 5px;
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
                            <img src="./assets/images/Caramel-Coffee.jpg" alt="image">
                            @endif
                        </div>
                        <div class="item-details">
                            <h6>{{ $cartItem->product->name }} ({{$cartItem->productType->type}})</h6>
                            <div class="productQuantity">
                                <input type="button" value="-" class="minus" data-type="{{$cartItem->productType->id}}" data-id="{{$cartItem->product->id}}">
                                <input type="number" name="quantity" value="{{$cartItem->quantity}}" style="width: 40%;" disabled>
                                <input type="button" value="+" class="plus" data-type="{{$cartItem->productType->id}}" data-id="{{$cartItem->product->id}}">
                            </div>
                        </div>
                    </div>
                    <div class="item-price">
                        <span>₹{{$cartItem->productType->price * $cartItem->quantity}}</span>
                    </div>

                    <a href="javaScript:void(0);" class="remove-from-cart removeproduct" data-type="{{$cartItem->productType->id}}" data-id="{{$cartItem->product->id}}"/>
                        <i class="fa fa-times"></i>
                    </a>
                </li>
                <?php $total = $total + ($cartItem->productType->price * $cartItem->quantity); ?>
                @endforeach
                @endif
            </ul>

            <div class=cart-meta>
                <div class=clearfix>
                    <div class=item-content>
                        <div>
                            <h4>your total order value is</h4>
                            <?php $tax = ($total * 18)/100; ?>
                            <p> After added tax (₹{{$tax}})</p>
                          
                        </div>
                    </div>
                    <div class=item-price> 
                        <span id=carttoutal>₹{{$total+$tax}}</span> 
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
