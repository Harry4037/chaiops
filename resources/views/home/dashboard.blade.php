@extends('layout.main')

@section('content')

<style>
        ol, ul {
   margin-top: 30px;  
}
     </style>
     <script>
  $(document).ready(function() {
   $("#Orders").hide();
});
</script>


            <div class="banner clearfix">
               <div class=banner-img> <img src=images/cup.png alt=image> </div>
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
                            <button class="tablinks" onclick="openCity('Downloads')">Downloads</button>
                        </li>
                        <li>
                            <button class="tablinks" onclick="openCity('Address')">Address</button>
                        </li>
                        <li>
                            <button class="tablinks" onclick="openCity('Account_Details')">Account Details</button>
                        </li>
                        <li>
                            <button class="tablinks" onclick="openCity('Logout')">Logout</button>
                        </li>
                    </ul>







         <div class="container1" id="Dashboard">
                   
                    <div class="reservation-form clearfix">
                       <!-- <div class="imgLiquidFill imgLiquid">
                            <img src="images/book-table-img.jpg" alt="">
                        </div>-->
                        <form
                            id="reservation-form"
                            class="clearfix"
                            data-parsley-validate="data-parsley-validate">
                            <h3>Online
                                <span>Reservation Form</span></h3>
                            <div class="row">
                                <div class="form-group reservation-for">
                                    <label for="reservationFor">Table for</label>
                                    <div class="selectbox"></div>
                                    <div class="selectbox">
                                        <div class="selectbox_toggle">
                                            All items
                                            <span class="selectbox__arrow"></span>
                                        </div>
                                        <div class="selectbox_itemlist">
                                            <span class="selectbox__item" data-value="2 person">2 person</span>
                                            <span class="selectbox__item" data-value="4 person">4 person</span>
                                            <span class="selectbox__item" data-value="6 person">6 person</span>
                                        </div>
                                        <input type="text" id="reservationFor" name="person" class="selectbox__input">
                                    </div>
                                </div>
                                <div class="form-group occassion">
                                    <label for="occassion">Occassion</label>
                                    <div class="selectbox">
                                        <div class="selectbox_toggle">
                                            All items
                                            <span class="selectbox__arrow"></span>
                                        </div>
                                        <div class="selectbox_itemlist">
                                            <span class="selectbox__item" data-value="Birthday">Birthday</span>
                                            <span class="selectbox__item" data-value="Anniversary">Anniversary</span>
                                            <span class="selectbox__item" data-value="Holiday">Holiday</span>
                                        </div>
                                        <input type="text" id="occassion" name="occassion" class="selectbox__input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group name-sectn">
                                    <label for="name">Your Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        id="name"
                                        placeholder="Name"
                                        required="required">
                                </div>
                                <div class="form-group mail-sectn">
                                    <label for="inputEmail">Your Email ID</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        name="inputEmail"
                                        id="inputEmail"
                                        placeholder="Email"
                                        required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contactMessage">Leave a message</label>
                                <div>
                                    <textarea
                                        name="contactMessage"
                                        class="form-control"
                                        id="contactMessage"
                                        placeholder="Write your text"
                                        required="required"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="button-type-three">Order Now</button>
                            <div class="ajaxmessage for-reservation hidden"></div>
                        </form>
                    </div>
                </div>


   

   <div class="container1" id="Orders" style="display:none">
                   
                    <div class="reservation-form clearfix">
                       <!-- <div class="imgLiquidFill imgLiquid">
                            <img src="images/book-table-img.jpg" alt="">
                        </div>-->
                        <form
                            id="reservation-form"
                            class="clearfix"
                            data-parsley-validate="data-parsley-validate">
                            <h3>Online
                                <span>Reservation Form</span></h3>
                            <div class="row">
                                <div class="form-group reservation-for">
                                    <label for="reservationFor">Table for</label>
                                    <div class="selectbox"></div>
                                    <div class="selectbox">
                                        <div class="selectbox_toggle">
                                            All items
                                            <span class="selectbox__arrow"></span>
                                        </div>
                                        <div class="selectbox_itemlist">
                                            <span class="selectbox__item" data-value="2 person">2 person</span>
                                            <span class="selectbox__item" data-value="4 person">4 person</span>
                                            <span class="selectbox__item" data-value="6 person">6 person</span>
                                        </div>
                                        <input type="text" id="reservationFor" name="person" class="selectbox__input">
                                    </div>
                                </div>
                                <div class="form-group occassion">
                                    <label for="occassion">Occassion</label>
                                    <div class="selectbox">
                                        <div class="selectbox_toggle">
                                            All items
                                            <span class="selectbox__arrow"></span>
                                        </div>
                                        <div class="selectbox_itemlist">
                                            <span class="selectbox__item" data-value="Birthday">Birthday</span>
                                            <span class="selectbox__item" data-value="Anniversary">Anniversary</span>
                                            <span class="selectbox__item" data-value="Holiday">Holiday</span>
                                        </div>
                                        <input type="text" id="occassion" name="occassion" class="selectbox__input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group name-sectn">
                                    <label for="name">Your Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        id="name"
                                        placeholder="Name"
                                        required="required">
                                </div>
                                <div class="form-group mail-sectn">
                                    <label for="inputEmail">Your Email ID</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        name="inputEmail"
                                        id="inputEmail"
                                        placeholder="Email"
                                        required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contactMessage">Leave a message</label>
                                <div>
                                    <textarea
                                        name="contactMessage"
                                        class="form-control"
                                        id="contactMessage"
                                        placeholder="Write your text"
                                        required="required"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="button-type-three">Order Now</button>
                            <div class="ajaxmessage for-reservation hidden"></div>
                        </form>
                    </div>
                </div>

                   <div class="container1" id="Downloads" style="display:none">
                   
                    <div class="reservation-form clearfix">
                       <!-- <div class="imgLiquidFill imgLiquid">
                            <img src="images/book-table-img.jpg" alt="">
                        </div>-->
                        <form
                            id="reservation-form"
                            class="clearfix"
                            data-parsley-validate="data-parsley-validate">
                            <h3>Online
                                <span>Reservation Form</span></h3>
                            <div class="row">
                                <div class="form-group reservation-for">
                                    <label for="reservationFor">Table for</label>
                                    <div class="selectbox"></div>
                                    <div class="selectbox">
                                        <div class="selectbox_toggle">
                                            All items
                                            <span class="selectbox__arrow"></span>
                                        </div>
                                        <div class="selectbox_itemlist">
                                            <span class="selectbox__item" data-value="2 person">2 person</span>
                                            <span class="selectbox__item" data-value="4 person">4 person</span>
                                            <span class="selectbox__item" data-value="6 person">6 person</span>
                                        </div>
                                        <input type="text" id="reservationFor" name="person" class="selectbox__input">
                                    </div>
                                </div>
                                <div class="form-group occassion">
                                    <label for="occassion">Occassion</label>
                                    <div class="selectbox">
                                        <div class="selectbox_toggle">
                                            All items
                                            <span class="selectbox__arrow"></span>
                                        </div>
                                        <div class="selectbox_itemlist">
                                            <span class="selectbox__item" data-value="Birthday">Birthday</span>
                                            <span class="selectbox__item" data-value="Anniversary">Anniversary</span>
                                            <span class="selectbox__item" data-value="Holiday">Holiday</span>
                                        </div>
                                        <input type="text" id="occassion" name="occassion" class="selectbox__input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group name-sectn">
                                    <label for="name">Your Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        id="name"
                                        placeholder="Name"
                                        required="required">
                                </div>
                                <div class="form-group mail-sectn">
                                    <label for="inputEmail">Your Email ID</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        name="inputEmail"
                                        id="inputEmail"
                                        placeholder="Email"
                                        required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contactMessage">Leave a message</label>
                                <div>
                                    <textarea
                                        name="contactMessage"
                                        class="form-control"
                                        id="contactMessage"
                                        placeholder="Write your text"
                                        required="required"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="button-type-three">Order Now</button>
                            <div class="ajaxmessage for-reservation hidden"></div>
                        </form>
                    </div>
                </div>


 

                   <div class="container1" id="Address" style="display:none">
                   
                    <div class="reservation-form clearfix">
                       <!-- <div class="imgLiquidFill imgLiquid">
                            <img src="images/book-table-img.jpg" alt="">
                        </div>-->
                        <form
                            id="reservation-form"
                            class="clearfix"
                            data-parsley-validate="data-parsley-validate">
                            <h3>Online
                                <span>Reservation Form</span></h3>
                            <div class="row">
                                <div class="form-group reservation-for">
                                    <label for="reservationFor">Table for</label>
                                    <div class="selectbox"></div>
                                    <div class="selectbox">
                                        <div class="selectbox_toggle">
                                            All items
                                            <span class="selectbox__arrow"></span>
                                        </div>
                                        <div class="selectbox_itemlist">
                                            <span class="selectbox__item" data-value="2 person">2 person</span>
                                            <span class="selectbox__item" data-value="4 person">4 person</span>
                                            <span class="selectbox__item" data-value="6 person">6 person</span>
                                        </div>
                                        <input type="text" id="reservationFor" name="person" class="selectbox__input">
                                    </div>
                                </div>
                                <div class="form-group occassion">
                                    <label for="occassion">Occassion</label>
                                    <div class="selectbox">
                                        <div class="selectbox_toggle">
                                            All items
                                            <span class="selectbox__arrow"></span>
                                        </div>
                                        <div class="selectbox_itemlist">
                                            <span class="selectbox__item" data-value="Birthday">Birthday</span>
                                            <span class="selectbox__item" data-value="Anniversary">Anniversary</span>
                                            <span class="selectbox__item" data-value="Holiday">Holiday</span>
                                        </div>
                                        <input type="text" id="occassion" name="occassion" class="selectbox__input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group name-sectn">
                                    <label for="name">Your Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        id="name"
                                        placeholder="Name"
                                        required="required">
                                </div>
                                <div class="form-group mail-sectn">
                                    <label for="inputEmail">Your Email ID</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        name="inputEmail"
                                        id="inputEmail"
                                        placeholder="Email"
                                        required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contactMessage">Leave a message</label>
                                <div>
                                    <textarea
                                        name="contactMessage"
                                        class="form-control"
                                        id="contactMessage"
                                        placeholder="Write your text"
                                        required="required"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="button-type-three">Order Now</button>
                            <div class="ajaxmessage for-reservation hidden"></div>
                        </form>
                    </div>
                </div>


                   <div class="container1" id="Account_Details" style="display:none">
                  
                    <div class="reservation-form clearfix">
                       <!-- <div class="imgLiquidFill imgLiquid">
                            <img src="images/book-table-img.jpg" alt="">
                        </div>-->
                        <form
                            id="reservation-form"
                            class="clearfix"
                            data-parsley-validate="data-parsley-validate">
                            <h3>Online
                                <span>Reservation Form</span></h3>
                            <div class="row">
                                <div class="form-group reservation-for">
                                    <label for="reservationFor">Table for</label>
                                    <div class="selectbox"></div>
                                    <div class="selectbox">
                                        <div class="selectbox_toggle">
                                            All items
                                            <span class="selectbox__arrow"></span>
                                        </div>
                                        <div class="selectbox_itemlist">
                                            <span class="selectbox__item" data-value="2 person">2 person</span>
                                            <span class="selectbox__item" data-value="4 person">4 person</span>
                                            <span class="selectbox__item" data-value="6 person">6 person</span>
                                        </div>
                                        <input type="text" id="reservationFor" name="person" class="selectbox__input">
                                    </div>
                                </div>
                                <div class="form-group occassion">
                                    <label for="occassion">Occassion</label>
                                    <div class="selectbox">
                                        <div class="selectbox_toggle">
                                            All items
                                            <span class="selectbox__arrow"></span>
                                        </div>
                                        <div class="selectbox_itemlist">
                                            <span class="selectbox__item" data-value="Birthday">Birthday</span>
                                            <span class="selectbox__item" data-value="Anniversary">Anniversary</span>
                                            <span class="selectbox__item" data-value="Holiday">Holiday</span>
                                        </div>
                                        <input type="text" id="occassion" name="occassion" class="selectbox__input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group name-sectn">
                                    <label for="name">Your Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        id="name"
                                        placeholder="Name"
                                        required="required">
                                </div>
                                <div class="form-group mail-sectn">
                                    <label for="inputEmail">Your Email ID</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        name="inputEmail"
                                        id="inputEmail"
                                        placeholder="Email"
                                        required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contactMessage">Leave a message</label>
                                <div>
                                    <textarea
                                        name="contactMessage"
                                        class="form-control"
                                        id="contactMessage"
                                        placeholder="Write your text"
                                        required="required"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="button-type-three">Order Now</button>
                            <div class="ajaxmessage for-reservation hidden"></div>
                        </form>
                    </div>
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
