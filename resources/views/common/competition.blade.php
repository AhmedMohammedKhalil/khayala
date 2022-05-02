<section class="stallions-details-area ptb-80">
    <div class="container">
        <div class="tab">
            <div class="row">
                <div class="tabs_item">
                    <div class="row">
                        <div class="col-lg-6 horse-image">
                            @if($competition->photo != null)
                            <img src="{{asset('img/competitions/'.$ccompetition->id.'/'.$ccompetition->photo)}}" alt="image">
                            @else
                                <img src="{{asset('img/competitions/default.jpg')}}" alt="image">
                            @endif
                        </div>

                        <div class="col-lg-6 horse-details">
                            <h3>{{ $competition->name }}</h3>
                            <h4>المنظمة : {{ $competition->organization }}</h4>
                            <h6>الميعاد : {{ $competition->appointment }}</h6>
                            <h6>العدد الكلى للمشتركين : {{ $competition->total }}</h6>

                            @if(auth('admin')->check())
                                <h3>أسماء المشتركين</h3>
                                <ul class="horse-pedigree">
                                    @foreach ($competition->userBooking as $user)
                                        <li><a href="{{ route('admin.userDetails.show',['id'=>$user->id]) }}">{{ $user->name }}</a></li>
                                    @endforeach
                                    @if($competition->userBooking->count() == 0)
                                        <li>لا يوجد</li>
                                    @endif
                                </ul>

                            @endif
                            <p>المكان : {{ $competition->address }}</p>
                            <p>التفاصيل : {{ $competition->description }}</p>
                            @auth('user')
                                @if($competition->appointment > $now )
                                    <a href="{{ route('user.booking.competition',['id'=>$competition->id]) }}" class="btn btn-primary">شارك الأن</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
