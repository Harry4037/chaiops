@extends('layout.app')

@section('content')

<style>
         ol, ul {
         margin-top: 30px;  
         }
         .reservation-form.clearfix.animated.slideInUp {
         display: flex;
         justify-content: center;
         background-color: white;
         }
         #reservation-form{
         background-color: white;
         }
         .reservation-form1 {
         display: flex;
         justify-content: center;
         margin: 2pc 0 0;
         padding-right: 5%;
         padding-left: 5%
         }
         .reservation-form form {
         float: left;
         width: 80%;
         }
      </style>

<div class="banner clearfix">
               <div class=banner-img> <img src="{{ asset("assets/images/cup.png")}}" alt=image> </div>
               <div class=banner-text>
                  <h2>Our special & exclusive <span>My Account</span></h2>
               </div>
            </div>
         </div>
         <div class=social-icons> <a href=#><span class=icon-facebook></span></a> <a href=#><span class=icon-twitter></span></a> <a href=#><span class=icon-googleplus></span></a> <a href=#><span class=icon-dribble></span></a> </div>
      </header>
      <section>
         <div class="container">
         <ul class="categories row">
            <li>
               <button class="selected tablinks" onclick="openCity('Dashboard')">Dashboard</button>
            </li>
            <li>
               <button class="tablinks" onclick="openCity('Orders')">Orders</button>
            </li>
        
            <li>
               <button class="tablinks" onclick="openCity('Address')">Address</button>
            </li>
            <li>
               <button class="tablinks" onclick="openCity('Account_Details')">Profile</button>
            </li>
            <li>
              <a href="{{route('logout')}}">Logout</a>
            </li>
         </ul>
         <div class="container1" id="Dashboard">
            <div class="reservation-form1 clearfix">
               <!-- <div class="imgLiquidFill imgLiquid">
                  <img src="images/book-table-img.jpg" alt="">
                  </div>-->
               <div class="row ">
                  <p>Hello {{ auth()->user()->name }} (not {{ auth()->user()->name }}? <a href=#>Log out</a>)</p>
                  <p>From your account dashboard you can view your <a onclick="openCity('Orders')">recent orders</a>, manage your <a onclick="openCity('Address')"> billing address</a>, and  <a onclick="openCity('Account_Details')">edit your  account details.</a></p>
               </div>
            </div>
         </div>
         <div class="container1" id="Orders" style="display:none">
            <div class="table-responsive">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>Order</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td><a href=#>#3242</a></td>
                        <td>September 16,2020</td>
                        <td>Processing</td>
                        <td>₹4,999.00 for 1 item</td>
                        <td><button type="button" onclick="openCity('vieworder')" class="btn btn-danger">View</button></td>
                     </tr>
                     <tr>
                        <td><a href=#>#3242</a></td>
                        <td>September 16,2020</td>
                        <td>Processing</td>
                        <td>₹4,999.00 for 1 item</td>
                        <td><button type="button" onclick="openCity('vieworder')"class="btn btn-danger">View</button></td>
                     </tr>
                     <tr>
                        <td><a href=#>#3242</a></td>
                        <td>September 16,2020</td>
                        <td>Processing</td>
                        <td>₹4,999.00 for 1 item</td>
                        <td><button type="button" onclick="openCity('vieworder')"class="btn btn-danger">View</button></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="container1" id="vieworder" style="display:none">
            <div class="row">
               <div class="col-lg-12">
                  <p>Order #3883 was placed on September 16, 2020 and is currently Processing.</p>
                  <h4><strong>Order Details</strong></h4>
                  <table class="table table-striped table-bordered" style>
                     <thead>
                        <tr>
                           <th colspan="4">Product</th>
                           <th> Total</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td colspan="4">Weekly Strength Training × 1</td>
                           <td>Rs 4999</td>
                        </tr>
                        <tr>
                           <td colspan="4"><strong>Subtotal</strong></td>
                           <td>Rs 4999</td>
                        </tr>
                        <tr>
                           <td colspan="4" ><strong>Payment Method</strong></td>
                           <td>Cash on Delivery</td>
                        </tr>
                        <tr>
                           <td colspan="4" ><strong>Total</strong></td>
                           <td>Rs 4999</td>
                        </tr>
                     </tbody>
                  </table>
                   <h4><strong>Billing Details</strong></h4>
               <div class="col-lg-12">
                  <p>
                     Saurabh Singh<br>
                     Kanpur Street<br>
                     Kanpur 209801<br>
                     Uttar Pradesh<br>
                     +917084382428<br>
                     saurabhmitmanipal@gmail.com<br>
                  </p>
               </div>
               </div>
              
            </div>
         </div>
    
         <div class="container1" id="Address" style="display:none">
            <div class="row">
               <div class="col-lg-6">
                  <table class="table table-borderless" style>
                     <thead>
                        <tr>
                           <th>Billing Details</th>
                           <td> <a onclick="openCity('Billing_Details')">Edit </a></td>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>{{auth()->user()->name}}</td>
                        </tr>
                       
                        <tr>
                           <td>{{auth()->user()->email}}</td>
                        </tr>
                        @if(auth()->user()->city)
                        <tr>
                           <td>{{auth()->user()->city}}</td>
                        </tr>
                        @endif
                        @if(auth()->user()->state)
                        <tr>
                           <td>{{auth()->user()->state}}</td>
                        </tr>
                        @endif
                        @if(auth()->user()->pincode)
                        <tr>
                           <td>{{auth()->user()->pincode}}</td>
                        </tr>
                        @endif
                        <tr>
                           <td>{{auth()->user()->phone_number}}</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="container1" id="Billing_Details" style="display:none">
            <div class="reservation-form clearfix">
               <form id="reseratin-form" class="clearfix" method="post" action="{{route('site.address.form')}}" data-parsley-validate="data-parsley-validate">
               {{ csrf_field() }}
                  <div class="row">
                     <h4><strong>Billing Address</strong></h4>
                     <div class="form-group ">
                        <label for="street">Street Address</label>
                        <input
                           type="text"
                           class="form-control"
                           name="address"
                           id="street_address"
                           value="{{auth()->user()->address}}"
                           placeholder="House Number and Street Name"
                           required="required">
                     
                     </div>
                     <div class="form-group ">
                        <label for="city">City/Town</label>
                        <input
                           type="text"
                           class="form-control"
                           name="city"
                           id="city"
                           value="{{auth()->user()->city}}"
                           placeholder="City/Town"
                           required="required">
                     </div>
                     <div class="form-group ">
                        <label for="state">State</label>
                        <input
                           type="text"
                           class="form-control"
                           name="state"
                           id="state"
                           value="{{auth()->user()->state}}"
                           placeholder="State"
                           required="required">
                     </div>
                     <div class="form-group ">
                        <label for="pincode">Pincode</label>
                        <input
                           type="text"
                           class="form-control"
                           name="pincode"
                           id="pincode"
                           value="{{auth()->user()->pincode}}"
                           placeholder="Pincode"
                           required="required">
                     </div>
                  </div>
                  <div class="row">
                  </div>
                  <button type="submit" class="button-type-three">Save Address</button>
                 
               </form>
            </div>
         </div>
      
         <div class="container1" id="Account_Details" style="display:none">
            <div class="reservation-form clearfix">
               <form
                  id="reservion-form"
                  class="clearfix"
                  data-parsley-validate="data-parsley-validate">
                  <div class="row">
                     <div class="form-group ">
                        <label for="name">Display Name</label>
                        <input
                           type="text"
                           class="form-control"
                           name="name"
                           id="name"
                           value="Saurabh Singh"
                           placeholder="Name"
                           required="required">
                     </div>
                     <div class="form-group ">
                        <label for="inputEmail">Your Email ID</label>
                        <input
                           type="email"
                           class="form-control"
                           name="inputEmail"
                           id="inputEmail"
                           value="abc@gmail.com"
                           placeholder="Email"
                           required="required">
                     </div>
               
                  </div>
                  <div class="row">
                  </div>
                  <button type="submit" class="button-type-three">Save Changes</button>
                  <div class="ajaxmessage for-reservation hidden"></div>
               </form>
            </div>
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
