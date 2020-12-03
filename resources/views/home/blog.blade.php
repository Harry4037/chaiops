@extends('layout.app')

@section('content')
<style>
        ol, ul {
   margin-top: 30px;  
}
.blog-excerpt .button-primary {
    float: right;
    border-radius: 10px;
    padding: 10px 28px;
}
@media screen and (min-width: 992px){
.grid-item {
    width: 33%;
  
}}
.blog-excerpt p {
    line-height: 1.8;
    margin: 9px 0;
    color: #77625a;
}

.blog-excerpt h2 {
    font-size: 32px;
}
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
