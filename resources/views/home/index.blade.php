@extends('layout.app')

@section('content')
<style>
.selectbox_itemlist {

    position: static;
   
}
#dropml{
border:0px;
outline:0px;
background-color:white;
background:none;
}
section.table-book .section-heading .animate {
    color: #fff;
}
.order-type {
    height: 455px;
}
</style>
<div class="banner">
    <div class="container">
    <div class="social-icons">
                  <a href="https://www.facebook.com/officialchaiops/" class="fa fa-facebook"></a>
                  <a href="https://twitter.com/officialchaiops/" class="fa fa-twitter"></a>
                  <a href="https://www.instagram.com/officialchaiops/" class="fa fa-instagram"></a>
                  <a href="https://www.linkedin.com/company/chaiops/" class="fa fa-linkedin"></a>
                </div>
        <div class="banner-image">
        
            <div class="banner-img-holder">
                <!-- <img src="/assets/images/banner/banner01.png" alt="Banner Images"> -->
                <img class="logo-cup" src="{{ asset("assets/images/banner/logo-cup.png")}}" alt="Banner Images">
                <img class="logo" src="{{ asset("assets/images/banner/logo.png")}}" alt="Banner Images">
                <img class="cup" src="{{ asset("assets/images/banner/cup.png")}}" alt="Banner Images">
                <img class="premium-text" src="{{ asset("assets/images/banner/txt2.png")}}" alt="Banner Images">
                <img class="coffee-text" src="{{ asset("assets/images/banner/txt1.png")}}" alt="Banner Images">
                <div class="coffee-drop">
                    <img src="{{ asset("assets/images/banner/coffee-drop3.png")}}" alt="Banner Images">
                </div>
            </div>
        </div>
        <a href="{{route('site.menu')}}" class="button-menu">Menu</a>
    </div>
</div>
</div>
</header>
<section class="service-section">
    <div class="container">
        <div>
            
            <div class="section-heading">
                <h1>
                    <span>About Us</span></h1>
            </div>
        </div>
        <div class="row">
            <img src="{{ asset("assets/images/Our-Story-png.png")}}" class="service-side-img" alt="">
            <div class="service-details">
                
                <p>Chaiops aims to be a leader of the food and beverage industry. We bring you a TEA that is great in healing stress and aids. We are striving to provide the original taste of tea while infusing different flavours to keep people
                 glued to our traditional beverage. Our Teas in Chaiops are processed and sourced naturally.</p>
                 <h4>A new concept of TEA</h4>                 
<p>No matter you want to have a Kadak Chai after your hectic con-calls or relish a cup of elaichi Chai, 
a romantic date with the love of your life, sipping a half-cutting chai with crispy samosa or diving deep into the 
goodness of honey-flavored tea, we at Chaiops strives to make your tea-time truly valuable.</p>
                 <h4>Keep TEA alive</h4>
<p>Chaiops aim to keep the taste and feel of having Tea or Chai alive. We have a series of tea flavours to entitle you as yet another ‘tea-lover’ of your group. To add more to the experience of having your favourite tea, we have crafted the Chaiops outlets with unique infrastructure. 

Apart from unmatched taste and beautiful colour our teas also comes with various health benefits. Along with the taste teas in Chaiops will help you to stay well, you will surely enjoy them.</p>
            </div>
        </div>
    </div>
</section>
<section class="special-menu">
    <div class="container">
        <div>
        
            <div class="section-heading">
                <h1>
                    <span>Our Special</span></h1>
                <h2>Menu</h2>
            </div>
        </div>
        <div class="pricing-table">
            <div class="pricing-detail">
                <figure>
                    <div class="image">
                        <img src="{{ asset("assets/images/coffee-cup.png")}}" alt="">
                    </div>
                    <figcaption>
                        <h3>Good Morning</h3>
                        <p>Lorem ipsum Qui mollit sit elit Ut.</p>
                    </figcaption>
                </figure>
            </div>

            @if($products)
            <div class="pricing-carte clearfix scrollbar" >
                @foreach($products as $product)
                <div class="cuisine-wrapper">
                    <div class="cuisine clearfix">
                        <div class="card-left">
                            <div class="cuisine-name">{{$product->name}}</div>
                            <div class="cuisine-detail">{{$product->description}}</div>
                        </div>
                        <div class="card-right">
                        <!-- @foreach($product->productType as $type)
                            <div class="cuisine-price" style="Display:none" >₹{{$type->price}}</div>
                            @endforeach -->
                            <!--                            <div class="cuisine-heart">{{$product->type}}</div>-->
                            <select class="cuisine-heart{{$product->id}}" id="dropml" >
                            @foreach($product->productType as $type)
<option value="{{$type->id}}" >₹{{$type->price}} ( {{$type->type}} )</option>
@endforeach
</select>
                        </div>
                        <div class="menu-btn-holder clearfix">
                            <a style="border-color: white !important" href="javaScript:void(0);" class="addItemCart" data-id="{{$product->id}}">Add Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="order-types-available row">
            <div class="row">
            @if($categories)
            @for ($i = 0; $i < 3; $i++)
                <div class="order-type-wrapper">
                    <div class="order-type @if($i == 0)type-one @elseif($i == 1)type-two @else type-three @endif">
                        <figure class="clearfix">
                            <div class="img-holder">
                                <img src="{{ $categories[$i]->image_name }}" alt="">
                            </div>
                            <figcaption>
                                <h3>
                                    <span>{{ ucfirst(strtolower($categories[$i]->description)) }}</span>
                                    </h3>
                                <a class="button-primary btn" href="{{route('site.menu')}}">View More</a>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                @endfor
                @endif
       
            </div>
        </div>
    
    </div>
</section>
<section class="midpage-banner1 banner-section">
    <div class="container">
        <div class="img-holder">
           <img class="milk-cup" src="{{ asset("assets/images/milk-pour-cup.png")}}" alt="">
            <img class="cup" src="{{ asset("assets/images/pour-cup.png")}}" alt="">
            <div class="milk">
                <img src="{{ asset("assets/images/milk-pour2.png")}}" alt="">
            </div>
            <img class="milk-drop" src="{{ asset("assets/images/milk-drops.png")}}" alt="">
        </div>
        <!-- <img src="/assets/images/milk-pour-cup.png" alt=""> -->
        <div class="banner1-details">
            <h3>We are "Tea and You"</h3>
            <h3>A premium Tea shop</h3>
            <p>The Chaiops has developed a well-structured and unique business model to give potential franchise candidates a business opportunity with small investment.</p>
            <a href="{{route('site.about')}}" class="button-type-three">Know More</a>
        </div>
    </div>
</section>


<section class="table-book">
    <div class="container">
        <div>
           
            <div class="section-heading">
                <h1>
                    <span>Book your</span></h1>
                <h2>Table</h2>
            </div>
        </div>
        <div class="reservation-form clearfix">
            <div class="imgLiquidFill imgLiquid">
                <img src="{{ asset("assets/images/book-table-img.jpg")}}" alt="">
            </div>
            <form
                id="reservaion-form"
                class="clearfix"
                data-parsley-validate="data-parsley-validate" action="{{route('site.book.form')}}" method="post">
                {{ csrf_field() }}
                <h3>Online
                    <span>Reservation Form</span></h3>
                <div class="row">
                    <div class="form-group reservation-for">
                        <label for="reservationFor">Table for</label>
                        <div class="selectbox"></div>
                        <div class="selectbox">
                            <div class="selectbox_toggle">
                                Select No. Of Persons
                                <span class="selectbox__arrow"></span>
                            </div>
                            <div class="selectbox_itemlist">
                                <span class="selectbox__item" data-value="2 person">2 person</span>
                                <span class="selectbox__item" data-value="4 person">4 person</span>
                                <span class="selectbox__item" data-value="6 person">8 person</span>
                                <span class="selectbox__item" data-value="6 person">10 person</span>
                            </div>
                            <input type="text" id="reservationFor" name="person" class="selectbox__input">
                        </div>
                    </div>
                    <div class="form-group occassion">
                        <label for="occassion">Occassion</label>
                        <div class="selectbox">
                            <div class="selectbox_toggle">
                                Select Option
                                <span class="selectbox__arrow"></span>
                            </div>
                            <div class="selectbox_itemlist">
                                <span class="selectbox__item" data-value="Birthday">Birthday</span>
                                <span class="selectbox__item" data-value="Anniversary">Anniversary</span>
                                <span class="selectbox__item" data-value="Holiday">Holiday</span>
                            </div>
                            <input type="text" id="occassion" name="occassion" class="selectbox__input">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group name-sectn">
                        <label for="name">Your Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            id="name"
                            placeholder="Name"
                            required="required">
                    </div>
                    <div class="form-group mail-sectn">
                        <label for="inputEmail">Your Email ID</label>
                        <input
                            type="email"
                            class="form-control"
                            name="inputEmail"
                            id="inputEmail"
                            placeholder="Email"
                            required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contactMessage">Leave a message</label>
                    <div>
                        <textarea
                            name="contactMessage"
                            class="form-control"
                            id="contactMessage"
                            placeholder="Write your text"
                            required="required"></textarea>
                    </div>
                </div>
                <button type="submit" class="button-type-three">Submit</button>
                <div class="ajaxmessage for-reservation hidden"></div>
            </form>
        </div>
    </div>
</section>

<section class="testimonial-sectn">
    <div class="container">
        <div>
         
            <div class="section-heading with-gray">
                <h1>
                    <span>Our Happy</span></h1>
                <h2>Visitors</h2>
            </div>
        </div>
        <div class="row testimonial">
            <ul class="clearfix testimonial-owl">
                <li class="testimonial-item item clearfix">
                    <div class="imgLiquidFill imgLiquid">
                        <img src="{{ asset("assets/images/testimonial/member1.jpg")}}" alt="">
                    </div>
                    <div class="name-text">
                        <h3>William</h3>
                        <p>Was there to pick up some snack and a short break. Experience was inviting. The service at the counter could have been a tad faster but on the whole it.</p>
                    </div>
                </li>
                <li class="testimonial-item item clearfix">
                    <div class="imgLiquidFill imgLiquid">
                        <img src="{{ asset("assets/images/testimonial/member02.jpg")}}" alt="image">
                    </div>
                    <div class="name-text">
                        <h3>maria</h3>
                        <p>Was there to pick up some snack and a short break. Experience was inviting. The service at the counter could have been a tad faster but on the whole it.</p>
                    </div>
                </li>
                <li class="testimonial-item item clearfix">
                    <div class="imgLiquidFill imgLiquid">
                        <img src="{{ asset("assets/images/testimonial/memeber03.jpg")}}" alt="image">
                    </div>
                    <div class="name-text">
                        <h3>jhon</h3>
                        <p>Was there to pick up some snack and a short break. Experience was inviting. The service at the counter could have been a tad faster but on the whole it.</p>
                    </div>
                </li>
                <li class="testimonial-item item clearfix">
                    <div class="imgLiquidFill imgLiquid">
                        <img src="{{ asset("assets/images/testimonial/member04.jpg")}}" alt="image">
                    </div>
                    <div class="name-text">
                        <h3>david</h3>
                        <p>Was there to pick up some snack and a short break. Experience was inviting. The service at the counter could have been a tad faster but on the whole it.</p>
                    </div>
                </li>
                <li class="testimonial-item item clearfix">
                    <div class="imgLiquidFill imgLiquid">
                        <img src="{{ asset("assets/images/testimonial/member05.jpg")}}" alt="image">
                    </div>
                    <div class="name-text">
                        <h3>maria</h3>
                        <p>Was there to pick up some snack and a short break. Experience was inviting. The service at the counter could have been a tad faster but on the whole it.</p>
                    </div>
                </li>
                <li class="testimonial-item item clearfix">
                    <div class="imgLiquidFill imgLiquid">
                        <img src="{{ asset("assets/images/testimonial/member06.jpg")}}" alt="image">
                    </div>
                    <div class="name-text">
                        <h3>luiz</h3>
                        <p>Was there to pick up some snack and a short break. Experience was inviting. The service at the counter could have been a tad faster but on the whole it.</p>
                    </div>
                </li>
            </ul>
        </div>
        
    </div>
</section>

<section class="midpage-banner4 banner-section" id="midpage-banner4">
    <div class="container clearfix">
        <div class="banner4-img-holder">
            <img
                src="{{ asset("assets/images/homepage/ipad.png")}}"
                height="473"
                width="581"
                class="ipad"
                alt="">
            <img src="{{ asset("assets/images/homepage/cap.png")}}" height="206" width="240" class="cap" alt="">
        </div>
        <div class="banner4-details">
            <h3>Our shop</h3>
            <h3>at your fingertips</h3>
            <p>Chaiops has been initiated to serve the best quality Beverages using the best ingredients. Chaiops aims to set up its outlets across the Globe &amp; reinvent the pleasure of quality herbs and masala chai. All the products that are served in Chaiops are unique in their taste. Huge efforts have gone into research of the unique taste of the Chai, Coffee &amp; Snacks that are served at our outlet. Our each product has a delightful mouthwatering taste which you can enjoy only at Chaiops outlet.</p>
            <a href="{{route('site.menu')}}" class="button-type-three download">
                <span>Shop now</span></a>
        </div>
    </div>
</section>
<section class="contact-sectn">
    <div class="container">
        <div>
           
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
                    <img src="{{ asset("assets/images/contact-img.png")}}" alt="">
                    <span>Tea and you</span>
                </h2>
                <h3>
                    <span>D- 486</span>
                    1<sup>st</sup> Floor, Sec – 7</h3>
                <p>Dwarka, New Delhi – 110075</p>
            </div>
        </div>
        <div id="map-cvas"> <iframe class="responsive-iframe"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14014.064218808973!2d77.0628016697754!3d28.58429149999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1b29ff558a3d%3A0x342e71ccc8a77e3d!2sChaiops!5e0!3m2!1sen!2sin!4v1600871787763!5m2!1sen!2sin" width="50%" height="700" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                           </div>
    </div>
</section>
@endsection
