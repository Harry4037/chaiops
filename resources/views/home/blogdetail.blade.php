@extends('layout.main')

@section('content')
<div class="banner clearfix">
                        <div class="banner-img">
                            <img src="/assets/images/blogBannerImgs/banner-img1.png" alt="">
                        </div>
                        <div class="banner-text">
                            <h2>Our special & exclusive
                                <span>Blog</span></h2>
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
         
            @if(!empty($data))
            <section class=blog-details-sectn>
         
                <div class="container">
         <div class=container>
            <div class=section-heading-type2>
               <h5>{{$data->created_at}} </h5>
               <h2>{{$data->title}}</h2>
            </div>
            <div class=author-details>
               <div class="imgLiquid imgLiquidFill auth-icon"> <img src=/assets/images/blog-list/author-icon.png alt=""> </div>
               <h5>Author, <span>Western</span></h5>
            </div>
            <div class=blog-details-wrap>
               <div class=blog-img-wrap> <img src="{{$data->img}}" alt="" height=351 width=1141> </div>
             
               <div class=content-entry>
                 
                  <p>{{$data->description}}</p>
                 </div>
             
            </div>
         </div>
      </section>   
      @endif      
            <section class="contact-sectn">
                <div class="container">
                    <div>
                        <div class="section-number">
                            <span>09</span></div>
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
                                <img src="/assets/images/contact-img.png" alt="">
                                <span>Coffee and you</span>
                            </h2>
                            <h3>
                                <span>44</span>
                                Park Street</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div id="map-canvas"></div>
                </div>
            </section>

@endsection
