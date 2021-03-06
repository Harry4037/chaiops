@extends('layout.app')

@section('content')
<!-- Header Start -->
<header class="page-banner-area contact-page-banner">
    <div class="section-overlay d-flex">
        <div class="container">
            <div class="header-caption text-left">
                <h1 class="header-caption-heading text-capitalize wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".5s">Reset</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".5s">
                        <li class="breadcrumb-item text-capitalize"><a href="{{ route('site.index',[
                                    'subdomain' => request()->get('subdomain')
                                ])}}">Home</a></li>
                        <li class="breadcrumb-item active text-capitalize" aria-current="page">Login/SignUp</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<!-- Signup Area Start -->
<section>
    <!--    Map Part Start-->
    <div class="google-map"></div>
    <div class="container">
        <div class="contact-part">
            <div class="row">
              
                <div class="col-sm-12 col-md-6">
                    <div class="contact-wraper">
                        <div class="contact-heading">
                            <h2>Reset Password</h2>
                            <p></p>
                        </div>
                        <div class="contact-form-area">
                            <form action="{{ route('site.reset',[
                                'code' =>  request()->code,
                                    'subdomain' => request()->get('subdomain')
                                    ])}}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                <div class="col-sm-12">
                                        <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Your Password" id="user-password" name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm Password" id="user-c_password" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="contact-sub-btn">
                                            <button type="submit"  class=" btn btn-effect section-button text-uppercase"> Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if($errors->all())
                        <div style="text-align: center;
                             padding: 10px 10px 10px 10px;
                             color: white;
                             background-color: indianred;
                             margin-top: 30px;
                             font-weight: 600;">
                            @foreach($errors->all() as $message)
                            {{ $message }}
                            <br>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Our Classes Area End -->  
@endsection
