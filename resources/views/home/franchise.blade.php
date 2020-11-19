@extends('layout.app')

@section('content')
<style>

.accordion-toggle:hover {
    text-decoration: none
}

.panel-default>.panel-heading {
    color: #fff;
    background-color: #f0c051;
    border-color: #ef715f;
    height: 45px;
}
.order-types-available .type-one {
    background-color: #ffffff00!important;
}
.order-types-available .type-two {
    background-color: #ffffff00!important;
}
.order-types-available .type-three {
    background-color: #ffffff00!important;
}

.faqHeader {
        font-size: 35px;
        margin: 20px;
        text-align: center;
    font-weight: 800;
    color: #f0c051;
    }

    .panel-heading [data-toggle="collapse"]:after {
        font-family: 'Glyphicons Halflings';
        content: "\e072"; /* "play" icon */
        float: right;
        color: #F58723;
        font-size: 18px;
        line-height: 22px;
        /* rotate "play" icon from > (right arrow) to down arrow */
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .panel-heading [data-toggle="collapse"].collapsed:after {
        /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
        color: #454444;
    }
    @media only screen and (max-width: 600px) {

.panel-default>.panel-heading {
    height:55px;
}
}
.panel-default>.panel-heading {
    color: #4e4e4e;
    background-color: #ffffff;
    padding: 15px;
    letter-spacing: .5px;
}

.panel-heading [data-toggle="collapse"]:after {
    font-size: 12px;
}

</style>
<div class="banner clearfix">
    <div class=banner-text>
        <h2><span>Franchise</span></h2>
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

<section class="midpage-banner4 banner-section" id="midpage-banner4">
    <div class="container clearfix">
        <div class="banner4-img-holder">
            <img src="{{ asset("assets/images//OUR-FAMILY.png") }}" height="473" width="581"
                class="ipad" alt="">
          
        </div>
        <div class="banner4-details">
            <h3 style="text-align: justify;">Become the Part of</h3>
            <h3 style="text-align: justify;">Our Family</h3>
            <p style="text-align: justify;">Chaiops is the best and most preferred option for tea lovers. Opening and operating an outlet has many tremendous challenges. But as a leading brand Chaiops has highly skilled and professional labours to run an outlet.</p> 
            <p style="text-align: justify;">We have overcome all these hurdles. We have developed an enormous range of delightful Chai, Coffees, Snacks & much more is to follow.
</p><p style="text-align: justify;">We have overcome all these hurdles. We have developed a huge range of delightful Chai, Coffees, Snacks &
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

         <div class="order-types-available row">
                        <div class="row">
                            <div class="order-type-wrapper">
                                <div class="order-type type-one">
                                    <div class="clearfix">
                                        <div class="img-holder">
                                            <h2 style="color: #f0c051;">Kiosk Cafe</h2>
                                        </div>
                                        <figcaption>
                                            <p>
                                             Required Carpet Area:<br> 50-150 Sq.Ft. <br>
                                             Total Investment<br>5-6L
                                           </p>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>

                            <div class="order-type-wrapper">
                                <div class="order-type type-two">
                                    <div>
                                        <div class="img-holder">
                                            <h2 style="color: #f0c051;">Compact Cafe</h2>
                                        </div>
                                        <figcaption>
                                            <p>
                                             Required Carpet Area:<br> 200-300 Sq.Ft<br>
                                             Total Investment<br>10-12L
                                           </p>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>


                            <div class="order-type-wrapper">
                                <div class="order-type type-three">
                                    <div>
                                        <div class="img-holder">
                                            <h2 style="color: #f0c051;">Standalone Cafe</h2>
                                        </div>
                                        <figcaption>
                                            <p>
                                             Required Carpet Area:<br> 350-500 Sq.Ft<br>
                                             Total Investment<br>15-16L
                                           </p>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                        </div>


    </div>
</section>
<section class="midpage-banner4 banner-section" id="midpage-banner4">
    <div class="container clearfix">
        <div class="banner4-img-holder">
            <img src="{{ asset("assets/images/franchise.png") }}" 
                class="ipad" alt="">
          
        </div>
        <div class="banner4-details">
            <h3 style="text-align: left;">How To Take Our Franchise?</h3>
            <p style="text-align: justify;">Chaiops provides all raw materials for making the best beverages at your doorstep. All you need to do is apply for our franchise.</p>
            <p style="text-align: justify;">You just have to follow instructions and fill the franchise form. You can serve customers the special tea with the name of CHAIOPS.</p> 
            <p style="text-align: justify;">Chaiops bring to you a product that is a perfect combination of the world's most favourite taste and 'TEA' for healing stress and refreshing your mood. </p>
            <p style="text-align: justify;">Chaiops is committed to bringing unbeatable chai experience to our beloved customers.</p>

        </div>
    </div>
</section>
<section class="table-book">
    <div class="container">

        <div class="reservation-form clearfix">
            <div class="imgLiquidFill imgLiquid">
                <img src="{{ asset("assets/images/franchise-form-img.jpg") }}" alt="">
            </div>
            <form id="reservationorm" class="clearfix" data-parsley-validate="data-parsley-validate" action="{{route('site.franchise.form')}}" method="post">
            {{ csrf_field() }}
                <h3>Franchise Form
                </h3>

                <div class="row">
                    <div class="form-group col-md-6 ">
                        <label for="name">Your Name*</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                            required="required">
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="inputEmail">Your Email ID*</label>
                        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email"
                            required="required">
                    </div>
                    <div class="form-group  col-md-6">
                        <label for="name">Your Phone No*</label>
                        <input type="number" class="form-control" name="mob" id="phone" placeholder="Phone" maxlength="10" pattern="[0-9]{10}"
                            required="required">
                    </div>
                    <div class="form-group  col-md-6 ">
                        <label for="name">Your Location*</label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="location"
                            required="required">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group  col-md-6 ">
                        <label for="reservationFor">Investment Plan*</label>

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
                            <input type="text" required="required" id="reservationFor" name="plan" class="selectbox__input">
                        </div>
                    </div>

                    <div class="form-group  col-md-6 ">
                        <label for="name">Your State*</label>
                        <input type="text" class="form-control" name="state" id="state" placeholder="State"
                            required="required">
                    </div>

                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="contactMessage">Leave a message*</label>
                        <div>
                            <textarea name="message" class="form-control textarea" id="area"  maxlength="200"
                                placeholder="Write your text" required="required"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="button-type-three">Submit Now</button>

                 <div id="textarea_feedback" style="color: red;"></div>
            </form>
        </div>
    </div>
</section>
<section class="class=table-book">

<div class="container">
    <br />
    <br />
   

    <div class="panel-group" id="accordion">
        <div class="faqHeader">FAQ</div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#1">Who is the potential candidate for Chaiops Franchise?</a>
                </h4>
            </div>
            <div id="1" class="panel-collapse collapse">
                <div class="panel-body">
                   A dedicated, disciplined, outgoing, positive, customer-friendly person who is passionate about people, Chai and coffee. Right prospect will be someone who believes in commitment to Chaiops system.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#2">How can I get started right away?</a>
                </h4>
            </div>
            <div id="2" class="panel-collapse collapse">
                <div class="panel-body">
                  Fill out the franchise application form online and submit it. One of Chaiops team member will contact you immediately.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#3">How much do I need to invest?</a>
                </h4>
            </div>
            <div id="3" class="panel-collapse collapse">
                <div class="panel-body">
                   The initial investment depends exclusively on the franchise model you opt for.
                </div>
            </div>
        </div>

       
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#4">How long does it take to get my store open?</a>
                </h4>
            </div>
            <div id="4" class="panel-collapse collapse">
                <div class="panel-body">
                   Depending on the inquiry, obtainability of site, its condition, reviewing, permitting and financing, it may take 60 to 90 Days.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#5">What if I want a franchise model with minimum investment?</a>
                </h4>
            </div>
            <div id="5" class="panel-collapse collapse">
                <div class="panel-body">
                    Currently, we have three unique franchise models- Standalone model, Compact model and Kiosk model. You can choose from the three in accordance with your budget.
                </div>
            </div>
        </div>

                <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#6">How much is the franchisee fee?</a>
                </h4>
            </div>
            <div id="6" class="panel-collapse collapse">
                <div class="panel-body">
                   Franchisee fee varies from model to model. Typically, it is anywhere between 1 Lacs and 8 Lacs.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#7">What business support will I receive as part of Chaiops Franchise System?</a>
                </h4>
            </div>
            <div id="7" class="panel-collapse collapse">
                <div class="panel-body">
                   You will get a step by step program for opening and operating your new store. Business support includes site selection, store launch, inventory management, store operation manuals, merchandise supply, assistance in marketing promotions, billing software and training program, etc.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#8">Do I need to have any prior experience to run my new store?</a>
                </h4>
            </div>
            <div id="8" class="panel-collapse collapse">
                <div class="panel-body">
                  All we need is customer service skills and a great passion for our products. Moreover, we provide store operations manual to help you run your new store efficiently on a regular basis.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#9">What is the minimum area required to set up the store?</a>
                </h4>
            </div>
            <div id="9" class="panel-collapse collapse">
                <div class="panel-body">
                   100-200 sq. feet. This is in reference to the Kiosk model.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#10">How much will the complete franchise investment cost me?</a>
                </h4>
            </div>
            <div id="10" class="panel-collapse collapse">
                <div class="panel-body">

                     <p>Total investment cost differs from model to model.</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Model</th>
        <th>Kiosk Cafe</th>
        <th>Compact Cafe</th>
         <th>Standalone Cafe</th>
          <th>Supper Lounge Cafe</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Total Investment</td>
        <td>7- 8 Lakhs</td>
        <td>12 -18 Lakhs</td>
        <td>25- 35 Lakhs</td>
        <td>40- 50 Lakhs</td>
      </tr>
     
    </tbody>
  </table>
                  
                </div>
            </div>
        </div>

       
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#11">Is there any royalty fee?</a>
                </h4>
            </div>
            <div id="11" class="panel-collapse collapse">
                <div class="panel-body">
                Yes. Chaiops royalty fee is 8% on net sales.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#12">Is there a direct financing available to franchisees?</a>
                </h4>
            </div>
            <div id="12" class="panel-collapse collapse">
                <div class="panel-body">
                   But we may help you find a qualified financing.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#13">What is the initial term of the franchise agreement?</a>
                </h4>
            </div>
            <div id="13" class="panel-collapse collapse">
                <div class="panel-body">
                  Five years.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#14">Are there any marketing or advertising fees?</a>
                </h4>
            </div>
            <div id="14" class="panel-collapse collapse">
                <div class="panel-body">
                  Yes. Its depend on the requirement and area.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#15">Will I receive guidance on purchase of inventory and supplies?</a>
                </h4>
            </div>
            <div id="15" class="panel-collapse collapse">
                <div class="panel-body">
                 We give guidance on buying of supplies and inventory to satisfy seasonal needs.
                </div>
            </div>
        </div>



         <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#16">What are the site requirements for Chaiops store?</a>
                </h4>
            </div>
            <div id="16" class="panel-collapse collapse">
                <div class="panel-body">
              Traffic pattern at the site, peak business hours, local residents, surrounding markets, nearby attractions, local competition, local hotels and restaurants are few of the many site requirements. We also provide guidance on selecting a suitable location. However, the final decision resides with you.
                </div>
            </div>
        </div>

         <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#17">How can I renew my Franchise Agreement?</a>
                </h4>
            </div>
            <div id="17" class="panel-collapse collapse">
                <div class="panel-body">
                After completing the initial agreement term of five years, you may renew your then agreement for another five years.
                </div>
            </div>
        </div>
         <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#18">Can I sell my franchise store? If yes, how and to whom can I sell it?</a>
                </h4>
            </div>
            <div id="18" class="panel-collapse collapse">
                <div class="panel-body">
                You can sell your store by paying a transfer fee in relation to each resale. However, the buyer must be qualified and approved by Chaiops.
                </div>
            </div>
        </div>

        </div>
    </div>
</div>


</section>
<script>
 $(document).ready(function() {
    var text_max = 200;
    $('#textarea_feedback').html(text_max + ' Characters Remaining');

    $('#area').keyup(function() {
        var text_length = $('#area').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' Characters Remaining');
    });
});

 </script>
@endsection
