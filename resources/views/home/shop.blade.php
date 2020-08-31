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
      <section class=productPage>
         <div class=container>
            <ul class="categories row">
               <li><button data-filter=* class=selected>All</button></li>
               <li><button data-filter=.type1>Coffee</button></li>
               <li><button data-filter=.type2>Beans</button></li>
               <li><button data-filter=.type3>Organic</button></li>
               <li><button data-filter=.type4>Type 4</button></li>
               <li><button data-filter=.type5>Type 5</button></li>
            </ul>
            <div class="store-product-list row">
               <div class="store-product-wrapper grid-item type1">
                  <div class=store-product>
                     <div class="imgLiquidFill imgLiquid item-image"> <img src=assets/images/blog-list/blog-img2.jpg alt="product item"> </div>
                     <div class=product-detail>
                        <div class=product-rate>$22</div>
                        <h3>Café Bombón</h3>
                        <p>1 pack 250 gm</p>
                     </div>
                     <div class="clearfix add-buy"> <a href=# class="add-cart addToCart" data-productid=1 data-productname="Café Bombón" data-productprice=22 data-productimage=images/blog-list/blog-img2.jpg>Add to Cart</a> <a href=shopcart.html class=buy-btn>Buy now</a> </div>
                  </div>
               </div>
               <div class="store-product-wrapper grid-item type3">
                  <div class=store-product>
                     <div class="imgLiquidFill imgLiquid item-image"> <img src=assets/images/book-table-img.jpg alt="product item"> </div>
                     <div class=product-detail>
                        <div class=product-rate>$29</div>
                        <h3>Irish coffee</h3>
                        <p>1 pack 250 gm</p>
                     </div>
                     <div class="clearfix add-buy"> <a href=# class="add-cart addToCart" data-productid=2 data-productname="Irish coffee" data-productprice=29 data-productimage=images/book-table-img.jpg>Add to Cart</a> <a href=shopcart.html class=buy-btn>Buy now</a> </div>
                  </div>
               </div>
               <div class="store-product-wrapper grid-item type3">
                  <div class=store-product>
                     <div class="imgLiquidFill imgLiquid item-image"> <img src=assets/images/order-type2.png alt="product item"> </div>
                     <div class=product-detail>
                        <div class=product-rate>$39</div>
                        <h3>Frappuccino</h3>
                        <p>1 pack 250 gm</p>
                     </div>
                     <div class="clearfix add-buy"> <a href=# class="add-cart addToCart" data-productid=3 data-productname=Frappuccino data-productprice=39 data-productimage=images/order-type2.png>Add to Cart</a> <a href=shopcart.html class=buy-btn>Buy now</a> </div>
                  </div>
               </div>
               <div class="store-product-wrapper grid-item type4 type3">
                  <div class=store-product>
                     <div class="imgLiquidFill imgLiquid item-image"> <img src=assets/images/store/store-product.jpg alt="product item"> </div>
                     <div class=product-detail>
                        <div class=product-rate>$20</div>
                        <h3>Eiskaffee</h3>
                        <p>1 pack 250 gm</p>
                     </div>
                     <div class="clearfix add-buy"> <a href=# class="add-cart addToCart" data-productid=4 data-productname=Eiskaffee data-productprice=20 data-productimage=images/store/store-product.jpg>Add to Cart</a> <a href=shopcart.html class=buy-btn>Buy now</a> </div>
                  </div>
               </div>
               <div class="store-product-wrapper grid-item type3">
                  <div class=store-product>
                     <div class="imgLiquidFill imgLiquid item-image"> <img src=assets/images/blog-list/blog-img1.jpg alt="product item"> </div>
                     <div class=product-detail>
                        <div class=product-rate>$19</div>
                        <h3>Iced Coffee</h3>
                        <p>1 pack 250 gm</p>
                     </div>
                     <div class="clearfix add-buy"> <a href=# class="add-cart addToCart" data-productid=5 data-productname="Iced Coffee" data-productprice=19 data-productimage=images/blog-list/blog-img1.jpg>Add to Cart</a> <a href=shopcart.html class=buy-btn>Buy now</a> </div>
                  </div>
               </div>
               <div class="store-product-wrapper grid-item type2">
                  <div class=store-product>
                     <div class="imgLiquidFill imgLiquid item-image"> <img src=assets/images/blog-list/blog-img3.jpg alt="product item"> </div>
                     <div class=product-detail>
                        <div class=product-rate>$79</div>
                        <h3>Cortado</h3>
                        <p>1 pack 250 gm</p>
                     </div>
                     <div class="clearfix add-buy"> <a href=# class="add-cart addToCart" data-productid=6 data-productname=Cortado data-productprice=79 data-productimage=images/blog-list/blog-img3.jpg>Add to Cart</a> <a href=shopcart.html class=buy-btn>Buy now</a> </div>
                  </div>
               </div>
               <div class="store-product-wrapper grid-item type2">
                  <div class=store-product>
                     <div class="imgLiquidFill imgLiquid item-image"> <img src=assets/images/blog-list/blog-img4.jpg alt="product item"> </div>
                     <div class=product-detail>
                        <div class=product-rate>$49</div>
                        <h3>Mochasippi</h3>
                        <p>1 pack 250 gm</p>
                     </div>
                     <div class="clearfix add-buy"> <a href=# class="add-cart addToCart" data-productid=7 data-productname=Mochasippi data-productprice=49 data-productimage=images/blog-list/blog-img4.jpg>Add to Cart</a> <a href=shopcart.html class=buy-btn>Buy now</a> </div>
                  </div>
               </div>
               <div class="store-product-wrapper grid-item type5 type1">
                  <div class=store-product>
                     <div class="imgLiquidFill imgLiquid item-image"> <img src=assets/images/blog-dtl/coffeebeans.jpg alt="product item"> </div>
                     <div class=product-detail>
                        <div class=product-rate>$39</div>
                        <h3>Vienna Coffee</h3>
                        <p>1 pack 250 gm</p>
                     </div>
                     <div class="clearfix add-buy"> <a href=# class="add-cart addToCart" data-productid=8 data-productname="Vienna Coffee" data-productprice=39 data-productimage=images/blog-dtl/coffeebeans.jpg>Add to Cart</a> <a href=shopcart.html class=buy-btn>Buy now</a> </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection
