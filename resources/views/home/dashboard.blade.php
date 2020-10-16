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
            
              
            </div>
         </div>
         <div class="social-icons">
                  <a href="https://www.facebook.com/officialchaiops/" class="fa fa-facebook"></a>
                  <a href="https://twitter.com/officialchaiops/" class="fa fa-twitter"></a>
                  <a href="https://www.instagram.com/officialchaiops/" class="fa fa-instagram"></a>
                  <a href="https://www.linkedin.com/company/chaiops/" class="fa fa-linkedin"></a>
                </div>
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
                  <p>Hello {{ auth()->user()->name }}</p>
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
                        <th>Payment Status</th>
                        <th>Order Status</th>
                        <th>Total</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($orders as $i => $order)

                     <tr>
                        <td><a href=#>#{{ $order->id}}</a></td>
                        <td>{{ $order->created_at}}</td>
                        <td>{{ $order->payment_text}}</td>
                        <td>@if($order->status == 1) Pending @elseif($order->status == 2) Accepted @elseif($order->status ==3) Delivered @elseif($order->status == 4) {{$order->cancel_by}} @endif</td>
                        <td>₹{{$order->total_amount}} for {{count($order->orderItem)}} item</td>
                        <td><button type="button" onclick="openCity('vieworder{{$i}}')" class="btn btn-danger">View</button>  @if($order->status == 1)<a href="/cancel/{{$order->id}}">Cancel</a>@endif</td>
                     </tr>
                     @endforeach
               
                    
                  </tbody>
               </table>
            </div>
         </div>
         @foreach($orders as $i => $order)
         <div class="container1" id="vieworder{{$i}}" style="display:none">
            <div class="row">
               <div class="col-lg-12">
                  <p>Order #{{ $order->id}} was placed on {{ $order->created_at}} </p>
                  <h4><strong>Order Details</strong></h4>
                  <table class="table table-striped table-bordered" style>
                     <thead>
                        <tr>
                           <th colspan="4">Product</th>
                           <th> Total</th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach( $order->orderItem as $item)
                        <tr>
                           <td colspan="4">{{ $item->product_name}} × {{ $item->quantity}}</td>
                           <td>Rs {{ $item->total_price}}</td>
                        </tr>
                        @endforeach
                        <tr>
                           <td colspan="4"><strong>Subtotal</strong></td>
                           <td>Rs {{ $order->item_total_amount}}</td>
                        </tr>
                        <tr>
                           <td colspan="4"><strong>Tax(18%)</strong></td>
                           <td>Rs {{ $order->tax_amount}}</td>
                        </tr>
                        <tr>
                           <td colspan="4" ><strong>Payment Method</strong></td>
                           <td>{{ $order->order_type}}</td>
                        </tr>
                        <tr>
                           <td colspan="4" ><strong>Total</strong></td>
                           <td>Rs {{ $order->total_amount}}</td>
                        </tr>
                     </tbody>
                  </table>
                   <h4><strong>Billing Details</strong></h4>
               <div class="col-lg-12">
                  <p>
                  {{ $order->name }}<br>
                  {{ $order->mobile_number}}<br>
                  {{ $order->address}}<br>
                     {{ $order->city}}<br>
                     {{ $order->state}}<br>
                     {{ $order->pincode }}<br>
                     {{ auth()->user()->email }}<br>
                  </p>
               </div>
               </div>
            </div>
         </div>
         @endforeach
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
                           type="number"
                           class="form-control"
                           name="pincode"
                           id="pincode"
                           value="{{auth()->user()->pincode}}"
                           maxlength="6"
                           placeholder="Pincode" pattern="[0-9]{6}"
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
                  data-parsley-validate="data-parsley-validate" method="post" action="{{route('site.profile')}}">
                  {{ csrf_field() }}
                  <div class="row">
                     <div class="form-group ">
                        <label for="name">Display Name</label>
                        <input
                           type="text"
                           class="form-control"
                           name="name"
                           id="name"
                           value="{{auth()->user()->name}}"
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
                           value="{{auth()->user()->email}}"
                           placeholder="Email"
                           required="required">
                     </div>
               
                  </div>
                  <div class="row">
                  </div>
                  <button type="submit" class="button-type-three">Save Changes</button>
                 
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
