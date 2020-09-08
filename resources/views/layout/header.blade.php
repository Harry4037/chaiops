<nav class="navbar navbar-default">
               <div class=container-fluid>
                  <div class=row>
                     <div class=navbar-header> <button type=button class="navbar-toggle collapsed" data-toggle=collapse data-target=#coffeeNavbarPrimary aria-expanded=false> <span class=sr-only>Toggle navigation</span> <span class=icon-bar></span> <span class=icon-bar></span> <span class=icon-bar></span> </button> </div>
                     <a href="{{route('site.index')}}" class=header-logo>Coffee and You <img src="{{ asset("assets/images/small-logo.png")}}" alt=""> </a> 
                     <div class="collapse navbar-collapse" id=coffeeNavbarPrimary>
                     <ul class="nav navbar-nav navbar-right">
                                    <li class="active">
                                        <a href="{{route('site.index')}}">Home</a>
                                    </li>
                                    <li><a href="{{route('site.about')}}">About Us</a></li>
                                    <li>
                                        <a href="{{route('site.menu')}}">Menu</a>
                                    </li>
                                    <li>
                                        <a href="{{route('site.franchise')}}">Franchise</a>
                                    </li>
                                    <li>
                                        <a href="{{route('site.blog')}}">Blog</a>
                                    </li>
                                    <li>
                                        <a href="{{route('site.store')}}">store</a>
                                    </li>
                                    <li>
                                        <a href="{{route('site.contact')}}">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="{{route('site.cart')}}">Cart
                                            <i class="fa fa-shopping-cart">
                                                @if(session()->get('cart')) <span class="carttems">{{count(session()->get('cart'))}}</span>  @endif</i>
                                        </a>
                                    </li>
                                    @if(auth()->check())
                                    <li class="button-order-now">
                                        <a href="{{route('site.dashboard')}}">{{ auth()->user()->name }}</a>
                                    </li>
                                    @else
                                    <li class="button-order-now">
                                        <a href="{{route('site.signin')}}">Login / Sign Up</a>
                                    </li>
                                    @endif
                                </ul>
                     </div>
                  </div>
               </div>
            </nav>