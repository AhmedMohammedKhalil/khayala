<section class="stallions-details-area ptb-80 pt-0" style="min-height: 40vh">
    <div class="container">
        <div class="tab">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <ul class="tabs p-0">
                        <li><a href="#">
                                بيانات المنتج
                            </a></li>

                        <li><a href="#">
                                بيانات صاحب المنتج
                            </a></li>
                    </ul>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="tab_content">

                        <div class="tabs_item">
                            <div class="row align-items-center">
                                <div class="col-lg-6 horse-image">
                                    @if($product->photo != null)
                                        <img style="height: 500px" src="{{asset('img/products/'.$product->id.'/'.$product->photo)}}" alt="image">
                                    @else
                                        <img style="height: 500px" src="{{asset('img/products/default.jpg')}}" alt="image">
                                    @endif
                                </div>

                                <div class="col-lg-6 horse-details">
                                    <h3>الإسم : {{ $product->name }}</h3>
                                    <h5>السعر :  {{ $product->price }} دينار كويتى </h5>
                                    @livewire('user.rating', ['rating' => $product->rating], key('rating_'.$product->id))
                                    <p>التفاصيل : {{ $product->details }}</p>
                                    @auth('user')
                                    <div class="ptb-3">
                                        @livewire('user.rate', ['rate_type' => 'product','rate_id'=>$product->id], key('rate_'.$product->id))
                                    </div>
                                    <a href="" class="btn btn-primary">شراء</a>
                                    @endauth

                                </div>
                            </div>
                        </div>
                        <div class="tabs_item">
                            <div class="row align-items-center">
                                <div class="col-lg-6 horse-image">
                                    @if($product->trainer->photo != null)
                                        <img style="height: 500px" src="{{asset('img/trainers/'.$product->trainer->id.'/'.$product->trainer->photo)}}" alt="image">
                                    @else
                                        <img style="height: 500px" src="{{asset('img/trainers/default.jpg')}}" alt="image">
                                    @endif
                                </div>

                                <div class="col-lg-6 horse-details">
                                    <h3>الإسم : {{ $product->trainer->name }}</h3>
                                    <h5>التخصص : {{ $product->trainer->specialization }}</h5>
                                    <h6>الإيميل : {{ $product->trainer->email }}</h6>
                                    <h6>الموبايل : {{ $product->trainer->phone }}</h6>
                                    <h6>التقييم : {{ $product->trainer->rating }}</h6>
                                    <a href="{{ route('trainerDetails.show',['id'=>$product->trainer->id]) }}" class="btn btn-primary">للمزيد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
