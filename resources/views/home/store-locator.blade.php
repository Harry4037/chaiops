@extends('layout.app')

@section('content')
<style>
  
    .add-buy a {
    width: 100% !important;
}
.product-detail {
    background-color: #f2f2f2;
    height: 324px;
}

.store-product {
    margin-bottom: 30px;
}
    </style>
<div class="banner clearfix">
  
    <div class="banner-text">
        <h2><span>Store List</span></h2>
    </div>
</div>
</div>
<div class="social-icons">
                  <a href="https://www.facebook.com/officialchaiops/" class="fa fa-facebook"></a>
                  <a href="https://twitter.com/officialchaiops/" class="fa fa-twitter"></a>
                  <a href="https://www.instagram.com/officialchaiops/" class="fa fa-instagram"></a>
                  <a href="https://www.linkedin.com/company/chaiops/" class="fa fa-linkedin"></a>
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
                              <img src="{{ $store->image1 }}" alt="Los Angeles" style="width:100%; height:225px;">
                           </div>
                           @if($store->image2)
                           <div class="item">
                              <img src="{{ $store->image2 }}" alt="Chicago" style="width:100%; height:225px;">
                           </div>
                           @endif
                           @if( $store->image3)
                           <div class="item">
                              <img src="{{ $store->image3 }}" alt="Chicago" style="width:100%; height:225px;">
                           </div>
                           @endif
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
                           <p style="margin-right:50px">{{ $store->timings }}
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
