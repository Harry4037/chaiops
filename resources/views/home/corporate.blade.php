@extends('layout.app')

@section('content')
<style>
section {
    padding-bottom: 1pt;
}
</style>
<div class="banner clearfix">
    <div class="banner-img">
        <img src="{{ asset("assets/images/blogBannerImgs/banner-img1.png") }}" alt="">
    </div>
    <div class="banner-text">
        <h2>Our special & exclusive
            <span>Corporate</span></h2>
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
       <div class="order-types-available row">
                        <div class="row">
                            <div class="order-type-wrapper">
                                <div class="order-type type-one">
                                    <div class="clearfix">
                                        <div class="img-holder">
                                            <h2>PLAN 1</h2>
                                        </div>
                                        <figcaption>
                                            <p>
                                             The challenges to open & operate a food joint / outlet is tremendous, the biggest being total dependency on the skilled labour & high cost incurred in the operation of the outlet. 
                                           </p>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>

                            <div class="order-type-wrapper">
                                <div class="order-type type-two">
                                    <div>
                                        <div class="img-holder">
                                            <h2>PLAN 2</h2>
                                        </div>
                                        <figcaption>
                                            <p>
                                             The challenges to open & operate a food joint / outlet is tremendous, the biggest being total dependency on the skilled labour & high cost incurred in the operation of the outlet. 
                                           </p>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                            <div class="order-type-wrapper">
                                <div class="order-type type-three">
                                    <div>
                                        <div class="img-holder">
                                            <h2>PLAN 3</h2>
                                        </div>
                                        <figcaption>
                                            <p>
                                             The challenges to open & operate a food joint / outlet is tremendous, the biggest being total dependency on the skilled labour & high cost incurred in the operation of the outlet. 
                                           </p>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
           
                 </section>


    <section class="table-book">
                <div class="container">
                   
                    <div class="reservation-form clearfix">
                        <div class="imgLiquidFill imgLiquid">
                        <div class="clearfix">
                            <br><br>
                            <div class="event-desc">
                                <h3>Event name goes here 5</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus sed, qui
                                    quam ipsa nobis, dolore assumenda culpa earum esse accusantium quas quidem iusto
                                    in aut reiciendis, provident, deserunt iste perferendis.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum aliquam
                                    exercitationem repellat, harum minima, tenetur esse! Aut neque ex, expedita
                                    fugiat, alias animi consequatur culpa dignissimos laboriosam non. Eum, deleniti.</p>
                                
                            </div>
                        </div>
                        </div>
                        <form
                            id="revation-form"
                            class="clearfix"
                            data-parsley-validate="data-parsley-validate" action="{{route('site.corporate.form')}}" method="post">
                            {{ csrf_field() }}
                            <h3>Corporate Form
                        </h3>

                            <div class="row">
                                <div class="form-group ">
                                    <label for="name">Your Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        id="name"
                                        placeholder="Name"
                                        required="required">
                                </div>
                                <div class="form-group ">
                                    <label for="inputEmail">Your Email ID</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        id="inputEmail"
                                        placeholder="Email"
                                        required="required">
                                </div>
                                 <div class="form-group ">
                                    <label for="name">Your Phone No</label>
                                    <input
                                        type="phone"
                                        class="form-control"
                                        name="mob"
                                        id="phone"
                                        placeholder="Phone"
                                        required="required">
                                </div>
                                 

                            </div>

                             <div class="row">
                            <div class="form-group">
                                <label for="contactMessage">Leave a message</label>
                                <div>
                                    <textarea
                                        name="message"
                                        class="form-control"
                                        id="contactMessage"
                                        placeholder="Write your text"
                                        required="required"></textarea>
                                </div>
                            </div>
                         </div>
                            <button type="submit" class="button-type-three">Submit Now</button>
                            <div class="ajaxmessage for-reservation hidden"></div>
                        </form>
                    </div>
                </div>
              
            </section>

@endsection
