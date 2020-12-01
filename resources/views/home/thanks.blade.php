@extends('layout.app')

@section('content')
<style>
.upper.thanku img {
    width: 40%;
}
</style>
</div>
</header>

                  <!-- Footer -->
                  <!-- Footer Start -->
<footer>
                <div class="upper thanku">
                    <div class="container">
					<div class="">
					  <img src="assets/images/thanku.png" >
					</div>
                        
                      
                    </div>
                </div>
				
				<div class="upper">
                    <div class="container">
                        <h4>Mom's hug with chai cup</h4>
                        <h3>Thank You!</h3>
                        
                        <a href="{{ URL::to('/') }}" class="order-btn">Back to Home</a>
                      
                    </div>
                </div>
                <script> setTimeout(function(){
            window.location.href = '{{ URL::to('/') }}';
         }, 5000);</script>
            </footer>
<!-- Footer End -->
@endsection