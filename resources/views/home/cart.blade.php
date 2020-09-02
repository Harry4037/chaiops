@extends('layout.main')

@section('content')
<div class="banner clearfix">
    <div class=banner-img> <img src=assets/images/cup.png alt=image> </div>
    <div class=banner-text>
        <h2>Our special & exclusive <span>product</span></h2>
    </div>
</div>
</div>
<div class=social-icons> <a href=#><span class=icon-facebook></span></a> <a href=#><span class=icon-twitter></span></a>
    <a href=#><span class=icon-googleplus></span></a> <a href=#><span class=icon-dribble></span></a> </div>
</header>
<section class=cartpage>
    <div class=container>
        <div class="cartHeader clearfix">
            <h1 class=logo> <a href="/"> <img src=assets/images/logo.png alt=image> </a> </h1>
            <div class=orderId>
                <div>
                    <p class=datetime></p>
                </div>
            </div>
        </div>
        <div class=cartBody>
            <div class="heading clearfix">
                <h5>confirm your order</h5>
                <p>you have selected <span class="red caxrtitems"> @if(session()->get('cart'))
                        {{ count(session()->get('cart')) }} @endif</span> product</p>
            </div>
            <ul class=salectedProduct id=cartItems4Type2>
                <!-- Cart items will automatically be populated via javascript. -->
                <?php $total = 0 ?>

                @if(session('cart'))
                    @foreach(session('cart') as $id => $product )
                        <?php $total += $product['price'] * $product['quantity'] ?>
                        <li class="clearfix">
                            <div class="item-content">
                                <div class="item-image"><img src="{{ $product['photo'] }}"
                                        alt="image"></div>
                                <div class="item-details">
                                    <h6>{{ $product['name'] }}</h6>
                                    <div class="productQuantity"><select class="form-control update-cart">
                                            <option value="1" data-id="{{ $id }}" @if($product['quantity']==1) selected @endif>1 product
                                            </option>
                                            <option value="2" data-id="{{ $id }}" @if($product['quantity']==2) selected @endif>2 product
                                            </option>
                                            <option value="3" data-id="{{ $id }}" @if($product['quantity']==3) selected @endif>3 product
                                            </option>
                                            <option value="4" data-id="{{ $id }}" @if($product['quantity']==4) selected @endif>4 product
                                            </option>
                                        </select></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="item-price">
                                <span>{{ $product['price'] * $product['quantity'] }}</span>
                            </div>
                         
                            <a href="#" class="remove-from-cart removeProduct" data-id="{{ $id }}"><i class="fa fa-times"></i></a>

                        </li>
                    @endforeach
                @endif
            </ul>
            <div class=cart-meta>
                <div class=clearfix>
                    <div class=item-content>
                        <div>
                            <h4>your total order value is</h4>
                            <p> After added all tax</p>
                        </div>
                    </div>
                    <div class=item-price> <span id=carttoutal>{{ $total }}</span> </div>
                </div>
            </div>
            @if(auth()->check() and $total != 0)
            <div class=mail-cart>
                <h3><span>your</span> details</h3>
                <form data-parsley-validate class="formcontact row" method="post" action="/checkout" id=orderfrm>
                {{ csrf_field() }}
                    <div class=form-group> <input type=text class=form-control name=name placeholder=Name @if(auth()->check()) value="{{auth()->user()->name}}" @endif required
                            data-parsley-required-message="Please insert Name"> </div>
                    <div class=form-group> <input type=text class=form-control name=phone placeholder="Phone" @if(auth()->check()) value="{{auth()->user()->phone_number}}" @endif required
                            data-parsley-required-message="Please insert Phone No"> </div>
                    <div class=form-group> <input type=email class=form-control name=email placeholder=Email @if(auth()->check()) value="{{auth()->user()->email}}" @endif required
                            data-parsley-required-message="Please insert Email"> </div>
                    <div class=form-group> <input type=text class=form-control name=address placeholder=Address @if(auth()->check()) value="{{auth()->user()->address}}" @endif required
                            data-parsley-required-message="Please insert address"> </div>
                            <input type="hidden" name="total" value="{{ $total }}">
                     <button type=submit id=send>order now</button>
              
                    <div class="ajaxmessage for-orderform hidden container"></div>
                </form>
            </div>
            @elseif(session()->get('cart'))
            <div class="clearfix order-box">
            <div class=complete-order>
                <h2>Done with choosing?</h2>
                <h5>Well done! Now complete your order</h5>
            </div>
            <div class=selected-item-no>
                <p>You have selected <span>{{count(session()->get('cart'))}}</span> items</p>
            </div>
            <div class=order-btn> <a href='/signin' class=button-secondary>Create Account/Login In</a> </div>
        </div>
            @endif
            
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url('remove-from-cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

    $(".update-cart").change(function (e) {
           e.preventDefault();
 
           var ele = $(this);
       
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

</script>

@endsection
