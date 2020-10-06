<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Invoice</title>
      <style>
         .clearfix:after {
         content: "";
         display: table;
         clear: both;
         }
         a {
         color: #5D6975;
         text-decoration: underline;
         }
         body {
         position: relative;
         margin-left: 150px; 
         margin-right: 150px; 
         margin-bottom: 40px;
         color: #001028;
         background: #FFFFFF; 
         font-family: Arial, sans-serif; 
         font-size: 18px; 
         font-family: Arial;
         }
         header {
         padding: 10px 0;
         margin-bottom: 30px;
         margin-top: 5%;
         }
         .logo
         {
         position: absolute;
         left: 40%;
         top: -5%;
         padding-top: 5px;
         padding-bottom: 5px;
         color: #fff;
         width: 20%;
         height: 5%;
         margin: 0 0 10px 0;
         }
         .logo img{
         width: 100%;
         float: right;
         height:auto;
         }
         .cg {
         padding-top: 5px;
         padding-bottom:5px;
         color: #fff;
         font-size: 1.0em;
         line-height: 2.4em;
         font-weight: 400;
         text-align: center;
         margin: 0 0 20px 0;
         background: linear-gradient(90deg,#ffdb18,#7f2f05);
         border-radius: 25px;
         }
         .hg{
         padding-top: 5px;
         padding-bottom:5px;
         color: #fff;
         height: 20px;
         font-size: 1.0em;
         line-height: 3.4em;
         font-weight: 800;
         text-align: center;
         margin: 0 0 20px 0;
         border-radius: 25px;
         background: linear-gradient(90deg,#ffdb18,#7f2f05);
         }
         }
         #project {
         float: left;
         }
         #project span {
         color: #5D6975;
         text-align: right;
         width: 52px;
         margin-right: 10px;
         display: inline-block;
         font-size: 0.8em;
         }
         #company span {
         color: #5D6975;
         text-align: right;
         width: 52px;
         margin-right: 10px;
         display: inline-block;
         font-size: 0.8em;
         }
         table {
         width: 100%;
         border-collapse: collapse;
         border-spacing: 0;
         margin-bottom: 20px;
         }
         table tr:nth-child(2n-1) td {
         background: #F5F5F5;
         }
         table th,
         table td {
         text-align: center;
         }
         table th {
         padding: 5px 20px;
         color: #5D6975;
         border-bottom: 1px solid #C1CED9;
         white-space: nowrap;        
         font-weight: normal;
         }
         table td {
         padding: 20px;
         text-align: left;
         }
         table td.grand {
         border-top: 1px solid #5D6975;;
         }
         #notices .notice {
         color: #5D6975;
         font-size: 1.2em;
         }
         footer {
         color: #5D6975;
         width: 100%;
         height: 30px;
         position: absolute;
         bottom: 0;
         border-top: 1px solid #C1CED9;
         padding: 8px 0;
         text-align: center;
         }
         .padding {
         padding: 2rem !important
         }
         .left{
         text-align: right;
         }
         h3 {
         font-size: 20px
         }
         h5 {
         font-size: 15px;
         line-height: 26px;
         color: #3d405c;
         margin: 0px 0px 15px 0px;
         font-family: 'Circular Std Medium'
         }
         .text-dark {
         color: #3d405c !important
         }
         .container{
         width: 100%;
         margin: 0 auto;
         text-align: left;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <header>
            <div class="logo">
               <img src="https://www.chaiops.com/wp-content/uploads/2019/06/logo1.png"  alt="logo" width="300" height="200" >
            </div>
      </div>
      <div class="cg">Thank You For Choosing Us</div>
      </header>
      <main>
         <h2 align="center";>INVOICE FOR PURCHASE #{{$data['order']->id}}</h2>
         <hr>
         <div class="table-responsive-sm">
            <table class="table table-striped" style="font-size: 16px;">
               <thead>
                  <tr>
                     <h3>BILLING DETAILS</h3>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td class="center">Name</td>
                     <td class="left strong">@if($data['order']->name){{$data['order']->name}} @endif</td>
                  </tr>
                  <tr>
                     <td class="center">Email</td>
                     <td class="left">{{$data['user']->email}}</td>
                  </tr>
                  <tr>
                     <td class="center">Mobile No</td>
                     <td class="left">{{$data['order']->mobile_number}}</td>
                  </tr>
                  <tr>
                  </tr>
               </tbody>
            </table>
         </div>
         <hr>
         <div class="table-responsive-sm">
            <table class="table table-striped" style="font-size: 16px;">
               <thead>
                  <tr>
                     <h3>SHIPPING DETAILS</h3>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td class="center">Address</td>
                     <td class="left strong"> {!! $data['order']->address !!}</td>
                  </tr>
                  <tr>
                     <td class="center">City</td>
                     <td class="left"> {{$data['order']->city}}</td>
                  </tr>
                  <tr>
                     <td class="center">Pincode</td>
                     <td class="left">  {{$data['order']->pincode}}</td>
                  </tr>
               </tbody>
            </table>
         </div>
         <hr>
         <div class="table-responsive-sm">
            <table class="table table-striped" style="font-size: 16px;">
               <thead>
                  <tr>
                     <h3 style="text-align: center;">ORDER SUMMARY</h3>
                  </tr>
               </thead>
               <tbody>
                  <tr style="font-weight: 700;">
                  <td class="center">Sr No.</td>
                     <td class="center">Item Name</td>
                     <td class="center">Item Price</td>
                     <td class="center">Item Quantity</td>
                     <td class="left strong">Total</td>
                  </tr>
                  @foreach($data['orderItem'] as $k => $orderItem)
                  <tr>
                  <td class="center">{{$k+1}}</td>
                     <td class="center">@if($orderItem->product){{$orderItem->product->name}}@endif</td>
                     <td class="center">Rs. {{$orderItem->per_item_price}}</td>
                     <td class="center">{{$orderItem->quantity}}</td>
                     <td class="left strong">Rs. {{round($orderItem->total_price,2)}}</td>
                  </tr>
                  @endforeach
                  <tr>
                     <td colspan="4" class="left strong" style="font-weight: 700;">Subtotal</td>
                     <td class="left strong">Rs. {{round($data['order']->item_total_amount,2)}}</td>
                  </tr>
                  <tr>
                     <td colspan="4" class="left strong" style="font-weight: 700;">GST(18%)</td>
                     <td class="left strong">Rs. {{ round($data['order']->tax_amount,2)}}</td>
                  </tr>
                  <tr>
                     <td colspan="4" class="left strong" style="font-weight: 700;">Total</td>
                     <td class="left strong">Rs. {{round($data['order']->total_amount,2)}}</td>
                  </tr>
               </tbody>
            </table>
         </div>
         <hr>
         <p>Thanks<br>Chaiops Team.</p>
         <br>
         </div>
      </main>
      <br>
      <div class="hg"></div>
      <p style="text-align: center; font-size: 15px;">D- 486, 1st Floor, Sec – 7
         Dwarka, New Delhi – 110075<br>Phone:+91-9319-855-866/
         +91-9319-955-944<br>Email:info@chaiops.com
      </p>
      </div>
   </body>
</html>