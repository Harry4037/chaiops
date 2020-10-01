<nav class="navbar navbar-default">
    <div class=container-fluid>
        <div class=row>
            @if(in_array(Route::currentRouteName(), ['site.index']))
            <div class="brand">
                <a href="{{ route('site.index') }}">
                    <p>SINCE 1939</p>
                    <img src="{{ asset("assets/images/logo.png") }}" alt="Brand Logo"
                         class="logo">
                </a>
            </div>
            @endif
            <div class=navbar-header> <button type=button class="navbar-toggle collapsed" data-toggle=collapse data-target=#coffeeNavbarPrimary aria-expanded=false> <span class=sr-only>Toggle navigation</span> <span class=icon-bar></span> <span class=icon-bar></span> <span class=icon-bar></span> </button> </div>
            <a href="{{route('site.index')}}" class=header-logo>Coffee and You <img src="{{ asset("assets/images/small-logo-header.png")}}" alt=""> </a> 
            <div class="collapse navbar-collapse" id=coffeeNavbarPrimary>
                <ul class="nav navbar-nav navbar-right">
                    <li @if(in_array(Route::currentRouteName(), ['site.index']))
                         {{ "class=active" }}
                         @endif>
                         <a href="{{route('site.index')}}">Home</a>
                    </li>
                    <li @if(in_array(Route::currentRouteName(), ['site.about']))
                         {{ "class=active" }}
                         @endif><a href="{{route('site.about')}}">About Us</a></li>
                    <li @if(in_array(Route::currentRouteName(), ['site.menu']))
                         {{ "class=active" }}
                         @endif>
                         <a href="{{route('site.menu')}}">Menu</a>
                    </li>
                    <li @if(in_array(Route::currentRouteName(), ['site.franchise']))
                         {{ "class=active" }}
                         @endif> 
                         <a href="{{route('site.franchise')}}">Franchise</a>
                    </li>
                    <li @if(in_array(Route::currentRouteName(), ['site.corporate']))
                         {{ "class=active" }}
                         @endif> 
                         <a href="{{route('site.corporate')}}">Corporate</a>
                    </li>
                    <li @if(in_array(Route::currentRouteName(), ['site.blog']))
                         {{ "class=active" }}
                         @endif>
                         <a href="{{route('site.blog')}}">Blog</a>
                    </li>
                    <li @if(in_array(Route::currentRouteName(), ['site.store']))
                         {{ "class=active" }}
                         @endif>
                         <a href="{{route('site.store')}}">Store</a>
                    </li>
                    <li @if(in_array(Route::currentRouteName(), ['site.contact']))
                         {{ "class=active" }}
                         @endif>
                         <a href="{{route('site.contact')}}">Contact Us</a>
                    </li>
                    <li @if(in_array(Route::currentRouteName(), ['site.cart']))
                         {{ "class=active" }}
                         @endif>
                         <a href="{{route('site.cart')}}">Cart
                            <i class="fa fa-shopping-cart">
                                <span class="carttems" id="cart_count">
                                    @if($cartCount)
                                    {{$cartCount}}
                                    @else
                                    0
                                    @endif
                                </span>
                            </i>
                        </a>
                    </li>
                    @if(auth()->check())
                    <li class="button-order-now">
                        <a href="{{route('site.dashboard')}}">{{ auth()->user()->name }}</a>
                    </li>
                    @else
                    <li class="button-order-now">
                        <a href="{{route('site.login')}}">Login / Sign Up</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
