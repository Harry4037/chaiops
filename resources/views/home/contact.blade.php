@extends('layout.app')

@section('content')

<div class="banner clearfix">
    <div class="banner-img">
        <img src="{{ asset("assets/images/cup.png") }}" alt="image">
    </div>
    <div class="banner-text">
        <h2>Our special & exclusive
            <span>contact us</span></h2>
    </div>
</div>
</div>
<div class="social-icons">
    <a href="#">
        <span class="icon-facebook"></span></a>
    <a href="#">
        <span class="icon-twitter"></span></a>
    <a href="#">
        <span class="icon-googleplus"></span></a>
    <a href="#">
        <span class="icon-dribble"></span></a>
</div>
</header>
<div class="contactpage">
    <div class="container">
        <h2>contact page headng here</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        <div class="cont-wrap">
            <div class="addressbar row">
                <div class="marker clearfix">
                    <a href="#">
                        <i class="fa fa-map-marker"></i>
                    </a>
                    <div class="cont">
                        <h4>102 / Cappuccino city</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="support-mail clearfix">
                    <a href="#">
                        <i class="fa fa-envelope"></i>
                    </a>
                    <div class="cont">
                        <h4>support@cofeeshop.com</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="mapwrapper row">
                <div id="map-canvas"></div>
            </div>
        </div>


        <div class="leave-comment">
            <h4 class="headingcontact">contact us</h4>
            <form id="conactform" data-parsley-validate="daa-parsley-validate" method="post" action="{{route('site.contact.form')}}">
            {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" name="name" required="required">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email Id" name="email" required="required">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Subject" name="subject"
                        required="required">
                </div>
                <textarea placeholder="Message" class="textarea" name="message" required="required"></textarea>
                <button type="submit">Submit</button>
                <div class="hidden ajaxmessage for-contactform"></div>
            </form>
        </div>
    </div>
</div>
@endsection
