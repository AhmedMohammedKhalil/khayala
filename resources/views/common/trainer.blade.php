<section class="stallions-details-area ptb-80 pt-0" style="min-height: 40vh">
    <div class="container">
        <div class="tab">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <ul class="tabs p-0">
                        <li><a href="#">
                                بيانات المدرب
                            </a></li>

                        <li><a href="#">
                                الاعمال
                            </a></li>

                        <li><a href="#">
                                المنتجات
                            </a></li>
                    </ul>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="tab_content">

                        <div class="tabs_item">
                            <div class="row align-items-center">
                                <div class="col-lg-6 horse-image">
                                    @if($trainer->photo != null)
                                        <img style="height: 500px" src="{{asset('img/trainers/'.$trainer->id.'/'.$trainer->photo)}}" alt="image">
                                    @else
                                        <img style="height: 500px" src="{{asset('img/trainers/default.jpg')}}" alt="image">
                                    @endif
                                </div>

                                <div class="col-lg-6 horse-details">
                                    <h3>الإسم : {{ $trainer->name }}</h3>
                                    <h5>التخصص : {{ $trainer->specialization }}</h5>
                                    <h6>الإيميل : {{ $trainer->email }}</h6>
                                    <h6>الموبايل : {{ $trainer->phone }}</h6>
                                    @livewire('user.rating', ['rating' => $trainer->rating], key('rating_'.$trainer->id))
                                    <p>التفاصيل : {{ $trainer->description }}</p>
                                    <p>العنوان : {{ $trainer->address }}</p>
                                    @auth('user')
                                    <div class="ptb-3">
                                        @livewire('user.rate', ['rate_type' => 'trainer','rate_id'=>$trainer->id], key('rate_'.$trainer->id))
                                    </div>
                                    <a href="{{ route('user.booking.trainer',['id'=>$trainer->id]) }}" class="btn btn-primary">حجز ميعاد</a>
                                    @endauth

                                </div>
                            </div>
                        </div>
                        <div class="tabs_item">
                            <div class="">
                                <div class="row">
                                    @if($trainer->works->count() == 0)
                                        <div>
                                            <span class="d-block text-center">لا يوجد اى عمل</span>
                                        </div>
                                    @endif
                                    @foreach ($trainer->works as $work)
                                    <div class="col-lg-4 col-md-4" style="margin: 30px 10px">
                                        <div class="single-feedback">
                                            <div class="client-info">
                                                <h3>{{ $work->job_title }}</h3>
                                                <span>{{ $work->placement }}</span>
                                                <span>{{ $work->job_estimation }}</span>

                                            </div>
                                            <p class="" style="font-style: normal">{{ nl2br($work->details) }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tabs_item">
                            <div class="">
                                <div class="row">
                                    @if($trainer->products->count() == 0)
                                        <div>
                                            <span class="d-block text-center">لا يوجد اى منتج</span>
                                        </div>
                                    @endif
                                    @foreach ($trainer->products as $p)
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
                                                    <h3><a href="{{ route('productDetails.show',['id'=>$p->id]) }}">{{ $p->name }}</a></h3>
                                                    <span>{{ $p->price }} دينار كويتى </span>
                                                    @auth('user')
                                                        <a href="{{ route('user.buy',['id'=>$p->id]) }}" class="add-to-cart-btn">اشترى الأن</a>
                                                    @endauth
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
