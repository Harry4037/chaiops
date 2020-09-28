@extends('layout.app')

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
                  <a href="https://www.facebook.com/officialchaiops/" class="fa fa-facebook"></a>
                  <a href="https://twitter.com/officialchaiops/" class="fa fa-twitter"></a>
                  <a href="https://www.instagram.com/officialchaiops/" class="fa fa-instagram"></a>
                  <a href="https://www.linkedin.com/company/chaiops/" class="fa fa-linkedin"></a>
                </div>
</header>

@if(!empty($data))
    <section class=blog-details-sectn>

        <div class="container">
            <div class=container>
                <div class=section-heading-type2>
                    <h5>{{ $data->created_at }} </h5>
                    <h2>{{ $data->title }}</h2>
                </div>
                <div class=author-details>
                    <div class="imgLiquid imgLiquidFill auth-icon"> <img
                            src="{{ asset("assets/images/blog-list/author-icon.png") }}" alt="">
                    </div>
                    <h5>Author, <span>Western</span></h5>
                </div>
                <div class=blog-details-wrap>
                    <div class=blog-img-wrap> <img src="{{ $data->img }}" alt="" height=351 width=1141> </div>

                    <div class=content-entry>

                        <p>{{ $data->description }}</p>
                    </div>
                    <div class=leave-comment>
                  <h4>Leave a comment</h4>
                  <form method="post" action="{{route('site.blog.comment')}}">
            {{ csrf_field() }}
                     <div class=form-group> <input type=text class=form-control placeholder="Name" name="name"> </div>
                     <div class=form-group> <input type=email class=form-control placeholder="Email" name="email"> </div>
                     <br>
                     <textarea name="message" class="form-control textarea" id="area"  maxlength="200"
                                placeholder="Write your comment" required="required"></textarea>
                                <input type="hidden" name="blog_id" value="{{ $data->id }}">
                     <button type=submit>post comment</button> 
                     <div id="textarea_feedback" style="color: red;"></div>
                  </form>
               </div>
                </div>
            </div>

            @if(!empty($data->blogComment))
            <div class="container">
          <div class=leave-comment>
                  <h4>Comments</h4>
               </div>
               <div class=col-md-12>
                   <div class="panel-body">
                                     
                    <div class="clearfix"></div>
                    <hr>
                    <ul class="media-list">
                 @foreach($data->blogComment as $mess)
                        <li class="media">
                            <a href="#" class="pull-left">
                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted">{{ Carbon\Carbon::parse($mess->created_at)->isoFormat('dddd D') }}</small>
                                </span>
                                <strong class="text-success">{{$mess->name}}</strong>
                                <p>
                                    {{$mess->message}}
                                </p>
                            </div>
                        </li>
                  
                  @endforeach
                    </ul>
                </div>

                  <div>


            </div>
            @endif
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
