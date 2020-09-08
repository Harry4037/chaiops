@extends('layout.main')

@section('content')
<div class="banner clearfix">
    <div class="banner-img">
        <img src="{{ asset("assets/images/cup.png")}}" alt="image">
    </div>
    <div class="banner-text">
        <h2>
            <span>My Account</span></h2>
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
        <div class="contact-part">
            <div class="row">
                <div class="col-sm-12 col-md-6">


                    <h4 class="headingcontact" style="margin-left: 10%;">Sign Up</h4>
                    <form  data-parsley-validate="data-parsley-validate"
                        action="{{ route('site.signup') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name" id="name"
                                        name="name" required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email" id="user-email"
                                        name="email" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Your Password"
                                        id="user-password" name="password" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password"
                                        id="user-c_password" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Your Phone Number"
                                        id="phone_number" name="phone_number">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="contact-sub-btn">
                                    <button type="submit" class=" btn btn-effect section-button text-uppercase">
                                        Register </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-sm-12 col-md-6">

                    <h4 class="headingcontact" style="margin-left: 10%;">Log In</h4>
                    <form data-parsley-validate="data-parsley-validate"
                        action="{{ route('site.signin') }}" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Email/Mobile Number"
                                        id="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Your Password"
                                        id="password" name="password" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="contact-sub-btn">
                                    <button type="submit" class=" btn btn-effect section-button text-uppercase"> Sign
                                        In</button>
                                </div>

                            </div>
                        
                        </div>
                    </form>
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
@endsection
