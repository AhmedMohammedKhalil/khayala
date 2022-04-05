 <!-- Start Doctor Area -->
 @if(count($doctors) > 0)
 <section class="courses-area ptb-80 bg-image bg-color-none">
     <div class="container">
         <div class="section-title">
             <h2>Our Doctors</h2>
         </div>
         <div class="row">
             @if(count($doctors) > 3)
                 <div class="courses-slides owl-carousel owl-theme">
                     @foreach ($doctors as $doc)
                         <div class="col-lg-12 col-md-12">
                             <div class="single-courses">
                                 <div class="courses-image">
                                     @if($doc->photo != null)
                                     <img src="{{asset('img/doctors/'.$doc->id.'/'.$doc->photo)}}" alt="image">
                                     @else
                                     <img src="{{asset('img/doctors/default.jpg')}}" alt="image">
                                     @endif
                                 </div>

                                 <div class="courses-content">
                                     <h3><a href="#">{{ $doc->name }}</a></h3>
                                     <h4>{{ $doc->specialization }}</h4>
                                     <p class="line-clamp">{{ $doc->description }}</p>
                                     <a href="#" class="read-more">Read More</a>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 </div>
             @else
                 @foreach ($doctors as $doc)
                     <div class="col-lg-4 col-md-4">
                         <div class="single-courses">
                             <div class="courses-image">
                                 @if($doc->photo != null)
                                     <img src="{{asset('img/doctors/'.$doc->id.'/'.$doc->photo)}}" alt="image">
                                 @else
                                     <img src="{{asset('img/doctors/default.jpg')}}" alt="image">
                                 @endif
                             </div>

                             <div class="courses-content">
                                 <h3><a href="#">{{ $doc->name }}</a></h3>
                                 <h4>{{ $doc->specialization }}</h4>
                                 <p class="line-clamp">{{ $doc->description }}</p>
                                 <a href="#" class="read-more">Read More</a>
                             </div>
                         </div>
                     </div>
                 @endforeach
             @endif
         </div>
     </div>

     <div class="horse-box2 wow fadeInLeft slow"><img src="{{asset('img/1.png')}}" alt="horse"></div>
 </section>
 @endif
 <!-- End Doctor Area -->

 <!-- Start Trainer Area -->
 @if(count($trainers) > 0)
 <section class="courses-area ptb-80 bg-image">
     <div class="container">
         <div class="section-title">
             <h2>Our Trainers</h2>

         </div>

         <div class="row">
             @if(count($trainers) > 3)
                 <div class="courses-slides owl-carousel owl-theme">
                     @foreach ($trainers as $trainer)
                         <div class="col-lg-12 col-md-12">
                             <div class="single-courses">
                                 <div class="courses-image">
                                     @if($doc->photo != null)
                                     <img src="{{asset('img/trainers/'.$trainer->id.'/'.$trainer->photo)}}" alt="image">
                                     @else
                                     <img src="{{asset('img/trainers/default.jpg')}}" alt="image">
                                     @endif
                                 </div>

                                 <div class="courses-content">
                                     <h3><a href="#">{{ $trainer->name }}</a></h3>
                                     <h4>{{ $trainer->specialization }}</h4>
                                     <p class="line-clamp">{{ $trainer->description }}</p>
                                     <a href="#" class="read-more">Read More</a>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 </div>
             @else
                 @foreach ($trainers as $trainer)
                     <div class="col-lg-4 col-md-4">
                         <div class="single-courses">
                             <div class="courses-image">
                                 @if($trainer->photo != null)
                                     <img src="{{asset('img/trainers/'.$trainer->id.'/'.$trainer->photo)}}" alt="image">
                                 @else
                                 <img src="{{asset('img/trainers/default.jpg')}}" alt="image">
                                 @endif
                             </div>

                             <div class="courses-content">
                                 <h3><a href="#">{{ $trainer->name }}</a></h3>
                                 <h4>{{ $trainer->specialization }}</h4>
                                 <p class="line-clamp">{{ $trainer->description }}</p>
                                 <a href="#" class="read-more">Read More</a>
                             </div>
                         </div>
                     </div>
                 @endforeach
             @endif
         </div>
     </div>

     <div class="horse-box2 wow fadeInLeft slow"><img src="{{asset('img/1.png')}}" alt="horse"></div>
 </section>
 @endif
 <!-- End Trainer Area -->

 <!-- Start Products Area -->
 @if(count($products) > 0)
 <section class="products-area ptb-80">
     <div class="container">
         <div class="section-title">
             <h2>Our Products</h2>
         </div>
         <div class="row">
             @if(count($products) > 3)

             <div class="products-slides owl-carousel owl-theme">
                 @foreach ($products as $p)
                     <div class="col-lg-12 col-md-12">
                         <div class="single-products">
                             <div class="products-image">
                                 @if($p->photo != null)
                                     <img src="{{asset('img/products/'.$p->id.'/'.$p->photo)}}" alt="image">
                                 @else
                                 <img src="{{asset('img/products/default.jpg')}}" alt="image">
                                 @endif
                                 
                             </div>

                             <div class="products-content">
                                 <h3><a href="#">{{ $p->name }}</a></h3>
                                 <h4>{{ $p->trainer->name }}</h4>
                                 <span>{{ $p->price }} KD</span>
                                 @auth
                                     <a href="#" class="add-to-cart-btn">Buy</a>
                                 @endauth                                
                         </div>
                         </div>
                     </div>
                 @endforeach
                 
             </div>
             @else
                 @foreach ($products as $p)
                     <div class="col-lg-4 col-md-4">
                         <div class="single-products">
                             <div class="products-image">
                                 @if($p->photo != null)
                                     <img src="{{asset('img/products/'.$p->id.'/'.$p->photo)}}" alt="image">
                                 @else
                                 <img src="{{asset('img/products/default.jpg')}}" alt="image">
                                 @endif
                                 
                             </div>

                             <div class="products-content">
                                 <h3><a href="#">{{ $p->name }}</a></h3>
                                 <h4>{{ $p->trainer->name }}</h4>
                                 <span>{{ $p->price }} KD</span>
                                 @auth('user')
                                     <a href="#" class="add-to-cart-btn">Buy</a>
                                 @endauth
                             </div>
                         </div>
                     </div>
                 @endforeach
             @endif
         </div>
     </div>
 </section>
 @endif
 <!-- End Products Area -->