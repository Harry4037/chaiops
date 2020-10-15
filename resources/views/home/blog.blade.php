@extends('layout.app')

@section('content')
<style>
        ol, ul {
   margin-top: 30px;  
}

@media screen and (min-width: 992px){
.grid-item {
    width: 33%;
  
}}
     </style>

<div class="banner clearfix">
  
    <div class="banner-text">
        <h2><span>Blog</span></h2>
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
<section class="blog-list-sectn ">
    <div class="container">
    <ul class="categories row">
               <li><button class="selected tablinks" onclick="openCity('blog')">Blog</button></li>
               <li><button class="tablinks" onclick="openCity('video')">Media</button></li>
            </ul>
        @if(!empty($data))
        <div class="container1" id="blog" style="display:block">
            @foreach($data['blog'] as $key => $value)
   
                <div class="blog-item clearfix">
                    <div class="blog-img">
                        <img src="{{ $value->img }}" alt="">
                    </div>
                    <div class="blog-excerpt">
                        <h5>{{ $value->created_at }}</h5>
                        <h2>{{ $value->title }}</h2>
                        <p>{{ $value->description }}</p>
                        <div class="author-details">
                            <div class="imgLiquid imgLiquidFill auth-icon">
                                <img src="{{ asset("assets/images/blog-list/author-icon.png") }}"
                                    alt="">
                            </div>
                            <h5>Author,
                                <span>Western</span></h5>
                            <a href="/blog/{{ $value->id }}" class="button-primary btn">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
</div>
<div class="container1" id="video" style="display:none">
            @foreach($data['video'] as $key => $value)
                <div class="store-product-wrapper grid-item" >
            <div class=store-product>
               <iframe width="320" height="245"  src="{{ $value->description }}"></iframe>               
            </div>
         </div>
         @endforeach
         </div>
        @endif
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
                    <img src="{{ asset("assets/images/contact-img.png") }}" alt="">
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
<script>
      function openCity(cityName) {
        var i;
        var x = document.getElementsByClassName("container1");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";  
        }
        document.getElementById(cityName).style.display = "block";  
      }
   </script>
@endsection
