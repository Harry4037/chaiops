@extends('layout.app')

@section('content')
<style>
    .color {
        margin-top: 20px;
    }
    .color1{
        margin-top:20%;
    }
    .col-lg-6.video-left {
        margin-top: 35px;
    }
    .banner1-details ul {
    color: #fff;
}
.midpage-banner1 {
	background: url(./assets/images/about-banner1-bg.jpg) center no-repeat;

}

</style>
<div class="banner clearfix">
   
    <div class=banner-text>
        <h2><span>About Us</span>
        </h2>
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
<!-- Start video-sec Area -->
<section class="video-sec-area pb-100 pt-40" id="about">
    <div class="container">
        <div class="row justify-content-start align-items-center">
            <div class="col-lg-6 video-right">
                <h1>Our Story</h1>
  
                <p style="text-align: justify;">
                Chaiops is India's largest company delivering the delicious taste of Chai to our customers. We bring a brewed cup of Chai to tea lovers across the nation. 
Chaiops is revolutionizing the way of consuming Chai in India. </p>
<p style="text-align: justify;">We are rapidly growing to become a must-go-to brand for tea lovers in India. </p>
<p style="text-align: justify;">Chaiops source the premium quality tea from chai estates of India to offer our customers the best ever brews.</p>
<p style="text-align: justify;">The recipes for Chai are created after thorough research. We have a variety of Chai like fruit and flower chai, non-milk chai, milk chai, chocolate chai, and many more.    
 </p>
            </div>
            <div class="col-lg-6 video-right justify-content-center align-items-center d-flex">
                <div class="color1">
                    <img class="img-fluid" style="border-radius: 12px; width: 100%;" src="{{ asset("assets/images/g5.jpg")}}" alt="">
                    </a>
                </div>
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
        <!-- <img src="images/milk-pour-cup.png" alt=""> -->
        <div class="banner1-details">
            <h3 style="float: left;">Key Features</h3>
            <br>
            <br>
            <br>
            <ul style="text-align: justify; float: left;">
                <br>
                <li>Chaiops introduce a vast variety of chai and other products to serve lovers living in every corner of the globe and entice them with their simmering pot of magic potion.</li>
                <br>
                <li>Chaiops inspires the team in crafting the finest Chai, Kada, or more healthy experience for their customers that are filled with flavors, tradition, and conversation.</li>
                <br>
                <li>Chaiops inspires the team in crafting the finest Chai, Kada, or more healthy experience for their customers that are filled with flavors, tradition, and conversation.</li>
                <br>
                <li>Flavors: The taste is distinct and empowering. They grind their spices such as cardamom, ginger and cinnamon daily and brew the chai with herbs. Their tea texture is all about creamy, spicy and goodness of aroma.</li>
            </ul>
        </div>
    </div>
</section>
<!-- Start video-sec Area -->
<section class="video-sec-area pb-100 pt-40" id="about">
    <div class="container">
        <div class="row justify-content-start align-items-center">
            <div class="col-lg-6 video-right justify-content-center align-items-center d-flex">
                <div class="color"></div>
                <img class="img-fluid"  style="border-radius: 12px; width: 100%;"src="{{ asset("assets/images/scop.jpg")}}" alt="">
                </a>
            </div>
            <div class="col-lg-6 video-left">
                <h1>Scope</h1>
                <p style="text-align:justify;">
                    Chai was and will always be the most popular drink worldwide because of its N-number of health benefits. People now a days are aware about the benefits of healthy drink and are shifting towards it. We at Chaiops have made the healthiest drink tastier and likable by all. A recent survey has found out that almost 84% people agree that it’s important to eat healthily but the main reason being the misconception that the healthy food is not good in taste. “Chaiops” aim to serve the combination of “Healthy drink yet mouth-watering”.Chai was and will always be the most popular drink worldwide because of its N-number of health benefits. People now a days are aware about the benefits of healthy drink and are shifting towards it. We at Chaiops have made the healthiest drink tastier and likable by all. A recent survey has found out that almost 84% people agree that it’s important to eat healthily but the main reason being the misconception that the healthy food is not good in taste. “Chaiops” aim to serve the combination of “Healthy drink yet mouth-watering”.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="midpage-banner2 banner-section">
    <div class="container">
        <h3>A morning without

            <span>Tea
            </span>
            is like sleep
        </h3>
      
    
    </div>
</section>
@endsection
