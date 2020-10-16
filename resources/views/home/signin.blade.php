@extends('layout.app')

@section('content')
<div class="banner clearfix">
            
              
            </div>
         </div>
<div class="social-icons">
                  <a href="https://www.facebook.com/officialchaiops/" class="fa fa-facebook"></a>
                  <a href="https://twitter.com/officialchaiops/" class="fa fa-twitter"></a>
                  <a href="https://www.instagram.com/officialchaiops/" class="fa fa-instagram"></a>
                  <a href="https://www.linkedin.com/company/chaiops/" class="fa fa-linkedin"></a>
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
                                    <input type="tel" class="form-control" placeholder="Your Phone Number"
                                        id="phone_number" name="phone_number" maxlength="10" pattern="[0-9]{10}">
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
