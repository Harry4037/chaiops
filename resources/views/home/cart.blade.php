@extends('layout.main')

@section('content')
<div class="banner clearfix">
               <div class=banner-img> <img src=assets/images/cup.png alt=image> </div>
               <div class=banner-text>
                  <h2>Our special & exclusive <span>product</span></h2>
               </div>
            </div>
         </div>
         <div class=social-icons> <a href=#><span class=icon-facebook></span></a> <a href=#><span class=icon-twitter></span></a> <a href=#><span class=icon-googleplus></span></a> <a href=#><span class=icon-dribble></span></a> </div>
      </header>
      <section class=cartpage>
         <div class=container>
            <div class="cartHeader clearfix">
               <h1 class=logo> <a href="/"> <img src=assets/assetimages/logo.png alt=image> </a> </h1>
               <div class=orderId>
                  <div>
                     <p class=datetime></p>
                  </div>
               </div>
            </div>
            <div class=cartBody>
               <div class="heading clearfix">
                  <h5>confirm your order</h5>
                  <p>you have selected <span class="red cartitems"></span> product</p>
               </div>
               <ul class=salectedProduct id=cartItemsType2>
                  <!-- Cart items will automatically be populated via javascript. --> 
               </ul>
               <div class=cart-meta>
                  <div class=clearfix>
                     <div class=item-content>
                        <div>
                           <h4>your total order value is</h4>
                           <p> After added all tax</p>
                        </div>
                     </div>
                     <div class=item-price> <span id=carttotal>$44</span> </div>
                  </div>
               </div>
               <div class=mail-cart>
                  <h3><span>your</span> details</h3>
                  <form data-parsley-validate class="formcontact row" id=orderform>
                     <div class=form-group> <input type=text class=form-control name=name placeholder=Name required data-parsley-required-message="Please insert Name"> </div>
                     <div class=form-group> <input type=text class=form-control name=phone placeholder="Phone " required data-parsley-required-message="Please insert Phone No"> </div>
                     <div class=form-group> <input type=email class=form-control name=email placeholder=Email required data-parsley-required-message="Please insert Email"> </div>
                     <div class=form-group> <input type=text class=form-control name=address placeholder=Address required data-parsley-required-message="Please insert address"> </div>
                     <input type=hidden name=products id=selectedProducts> <button type=submit id=send>order now</button> 
                     <div class=checkbox> <label> <input type=checkbox>Confirm and Proceed </label> </div>
                     <div class="ajaxmessage for-orderform hidden container"></div>
                  </form>
               </div>
            </div>
         </div>
      </section>
    @endsection
