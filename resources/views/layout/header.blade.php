<nav class="navbar navbar-default">
               <div class=container-fluid>
                  <div class=row>
                     <div class=navbar-header> <button type=button class="navbar-toggle collapsed" data-toggle=collapse data-target=#coffeeNavbarPrimary aria-expanded=false> <span class=sr-only>Toggle navigation</span> <span class=icon-bar></span> <span class=icon-bar></span> <span class=icon-bar></span> </button> </div>
                     <a href="/" class=header-logo>Coffee and You <img src=assets/images/small-logo.png alt=""> </a> 
                     <div class="collapse navbar-collapse" id=coffeeNavbarPrimary>
                        <ul class="nav navbar-nav navbar-right">
                           <li><a href="/">Home</a></li>
                           <li><a href=/about>About Us</a></li>
                           <li class=active><a href=/menu>Menu</a></li>
                           <li><a href=/store>store</a></li>
                           <li><a href=/contact>Contact Us</a></li>
                           <li><a href=/cart>Cart <i class="fa fa-shopping-cart"><span class=cartitems>42</span></i></a></li>
                           @if(auth()->check())
                                        <li class="button-order-now">
                                            <a href="/dashboard">{{ auth()->user()->name }}</a>
                                        </li>
                                        @else
                                        <li class="button-order-now">
                                            <a href="/signin">Login / Sign Up</a>
                                        </li>
                                        @endif
                        </ul>
                     </div>
                  </div>
               </div>
            </nav>