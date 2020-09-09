@extends('layout.main')

@section('content')

<div class="banner clearfix">
    <div class=banner-img> <img src="{{ asset("assets/images/cup.png") }}" alt=image> </div>
    <div class=banner-text>
        <h2>Our special & exclusive <span>Franchise</span></h2>
    </div>
</div>
</div>
<div class=social-icons> <a href=#><span class=icon-facebook></span></a> <a href=#><span class=icon-twitter></span></a>
    <a href=#><span class=icon-googleplus></span></a> <a href=#><span class=icon-dribble></span></a> </div>
</header>

<section class="midpage-banner4 banner-section" id="midpage-banner4">
    <div class="container clearfix">
        <div class="banner4-img-holder">
            <img src="{{ asset("assets/images/homepage/ipad.png") }}" height="473" width="581"
                class="ipad" alt="">
            <img src="{{ asset("assets/images/homepage/cap.png") }}" height="206" width="240"
                class="cap" alt="">
        </div>
        <div class="banner4-details">
            <h3>Become the Part of</h3>
            <h3>Our Family</h3>
            <p>The challenges to open & operate a food joint / outlet is tremendous, the biggest being total dependency
                on the skilled labour & high cost incurred in the operation of the outlet. All the core raw material is
                provided by the company at the door step. All you have to do is follow the instructions provided & your
                product is ready to be served & enjoyed. To operate a food joint / outlet the owner has to take care of
                many things at the same time like:-</p>

            <p>We have overcome all these hurdles. We have developed a huge range of delightful Chai, Coffees, Snacks &
                much more is to follow</p>

        </div>
    </div>
</section>

<section class="midpage-banner2 banner-section">
    <div class="container">
        <h3>Choose your own
            <span>Franchise
            </span>
            Module</h3>
        <p><strong>Kiosk Cafe</strong> – Required Carpet Area: 100-200 Sq.Ft.</p>
        <p><strong>Compact Cafe</strong>– Required Carpet Area: 500-700 Sq.Ft.</p>
        <p><strong>Standalone Cafe</strong> – Required Carpet Area: 800-1200 Sq.Ft.</p>
        <p><strong>Supper Lounge Cafe</strong> – Required Carpet Area: 1500-2000 Sq.Ft.</p>

    </div>
</section>

<section class="table-book">
    <div class="container">

        <div class="reservation-form clearfix">
            <div class="imgLiquidFill imgLiquid">
                <img src="{{ asset("assets/images/book-table-img.jpg") }}" alt="">
            </div>
            <form id="reservationorm" class="clearfix" data-parsley-validate="data-parsley-validate" action="\franchise" method="post">
            {{ csrf_field() }}
                <h3>Franchise Form
                </h3>

                <div class="row">
                    <div class="form-group ">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                            required="required">
                    </div>
                    <div class="form-group ">
                        <label for="inputEmail">Your Email ID</label>
                        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email"
                            required="required">
                    </div>
                    <div class="form-group ">
                        <label for="name">Your Phone No</label>
                        <input type="phone" class="form-control" name="mob" id="phone" placeholder="Phone"
                            required="required">
                    </div>
                    <div class="form-group ">
                        <label for="name">Your Location</label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="location"
                            required="required">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group ">
                        <label for="reservationFor">Investment Plan</label>

                        <div class="selectbox">
                            <div class="selectbox_toggle">
                                Investment Plan
                                <span class="selectbox__arrow"></span>
                            </div>
                            <div class="selectbox_itemlist">
                                <span class="selectbox__item" data-value="7-8 lakh">7-8 Lakh</span>
                                <span class="selectbox__item" data-value="12-15 lakh">12-15 Lakh</span>
                                <span class="selectbox__item" data-value="23-35 lakh">23-35 lakh</span>
                                <span class="selectbox__item" data-value="45&above lakh">45&above lakh</span>
                            </div>
                            <input type="text" id="reservationFor" name="plan" class="selectbox__input">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="name">Your State</label>
                        <input type="text" class="form-control" name="state" id="state" placeholder="State"
                            required="required">
                    </div>

                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="contactMessage">Leave a message</label>
                        <div>
                            <textarea name="message" class="form-control" id="contactMessage"
                                placeholder="Write your text" required="required"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="button-type-three">Submit Now</button>
                <div class="ajaxmessage for-reservation hidden"></div>
            </form>
        </div>
    </div>
</section>
@endsection
