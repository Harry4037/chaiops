@extends('layout.app')

@section('content')
<style>
            responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
}

        </style>
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
        <h2></h2>
        <p></p>
        <div class="cont-wrap">
            <div class="addressbar row">
                <div class="marker clearfix">
                    <a href="#">
                        <i class="fa fa-map-marker"></i>
                    </a>
                    <div class="cont">
                                    <h4>D- 486, 1st Floor, Sec – 7 <br>Dwarka, New Delhi – 110075</h4>
                                   
                                </div>
                </div>
                <div class="support-mail clearfix">
                                <a href="#">
                                    <i class="fa fa-envelope"></i>
                                </a>
                                <div class="cont">
                                    <h4 style="padding-top: 3%">info@chaiops.com</h4>
                                   
                                </div>
                            </div>
                            <div class="marker clearfix">
                                <a href="#">
                                    <i class="fa fa-phone"></i>
                                </a>
                                <div class="cont">
                                    <h4>+91-9319-855-866<br>
+91-9319-955-944</h4>
                                    
                                </div>
                            </div>
                            <div class="marker clearfix">
                                <a href="#">
                                    <i class="fa fa-clock-o"></i>
                                </a>
                                <div class="cont">
                                    <h4>Monday - Saturday<br>
10:30 AM - 6:30 PM</h4>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="mapwrapper row">
                            <div class="">
                                
                                <iframe class="responsive-iframe"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14014.064218808973!2d77.0628016697754!3d28.58429149999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1b29ff558a3d%3A0x342e71ccc8a77e3d!2sChaiops!5e0!3m2!1sen!2sin!4v1600871787763!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
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
