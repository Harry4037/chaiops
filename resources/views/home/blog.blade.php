@extends('layout.main')

@section('content')
<div class="banner clearfix">
    <div class="banner-img">
        <img src="{{ asset("assets/images/blogBannerImgs/banner-img1.png") }}" alt="">
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
<section class="blog-list-sectn">
    <div class="container">

        @if(!empty($data) && $data->count())
            @foreach($data as $key => $value)

                <div class="blog-item clearfix">
                    <div class="imgLiquid imgLiquidFill blog-img">
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
        @endif
    </div>
</section>

<center>
    {!! $data->links() !!}</center>

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

@endsection
