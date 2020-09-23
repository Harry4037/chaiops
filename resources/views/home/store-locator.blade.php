@extends('layout.app')

@section('content')
<style>
  
    .add-buy a {
    width: 100% !important;
}
    </style>
<div class="banner clearfix">
    <div class="banner-img">
        <img src="{{ asset("assets/images/cup.png") }}" alt="">
    </div>
    <div class="banner-text">
        <h2>Our special & exclusive
            <span>Store List</span></h2>
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
<div class="container">
         <div class="store-product-list row">
		  @if($stores)
          @foreach( $stores as $store)
            <div class="col-md-4">
               <div class=store-product>
                  <div>
                     <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                           <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                           <li data-target="#myCarousel" data-slide-to="1"></li>
                           <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                           <div class="item active">
                              <img src="{{ $store->image }}" alt="Los Angeles" style="width:100%;">
                           </div>
                           <div class="item">
                              <img src="{{ $store->image }}" alt="Chicago" style="width:100%;">
                           </div>
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                        </a>
                     </div>
                  </div>
				  <div class="store-heading"><h3 style="text-align: center;">{{ $store->name }}</h3></div>
                  <div class=product-detail>
                    
                     <div class="container">
                        <div class="col-md-1">
                           <p>ADDRESS</p>
                        </div>
                        <div class="col-md-3">
                           <p style="margin-right:50px">{{ $store->address }}
                           </p>
                        </div>
                     </div>
                     <br>
                     <div class="container">
                        <div class="col-md-1">
                           <p>TIMINGS</p>
                        </div>
                        <div class="col-md-3">
                           <p style="margin-right:50px">{{ $store->timing }}
                           </p>
                        </div>
                     </div>
                     <br>
                     <div class="container">
                        <div class="col-md-1">
                           <p>EMAIL US</p>
                        </div>
                        <div class="col-md-3">
                           <p style="margin-right:50px">{{ $store->email }}</p>
                        </div>
                     </div>
                     <br>
                     <div class="container">
                        <div class="col-md-1">
                           <p>CALL US</p>
                        </div>
                        <div class="col-md-3">
                           <p style="margin-right:50px">{{ $store->phone }}</p>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix add-buy"> <a href="{{ $store->direction }}" class=buy-btn>GET DIRECTIONS</a> </div>
               </div>
            </div>
         @endforeach
         @endif
         </div>
      </div>


@endsection
