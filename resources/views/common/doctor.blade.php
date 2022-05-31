<section class="stallions-details-area ptb-80 pt-0" style="min-height: 40vh">
    <div class="container">
        <div class="tab">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <ul class="tabs p-0">
                        <li><a href="#">
                                بيانات الدكتور
                            </a></li>

                        <li><a href="#">
                                الحالات
                            </a></li>
                    </ul>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="tab_content">

                        <div class="tabs_item">
                            <div class="row align-items-center">
                                <div class="col-lg-6 horse-image">
                                    @if($doctor->photo != null)
                                        <img style="height: 500px" src="{{asset('img/doctors/'.$doctor->id.'/'.$doctor->photo)}}" alt="image">
                                    @else
                                        <img style="height: 500px" src="{{asset('img/doctors/default.jpg')}}" alt="image">
                                    @endif
                                </div>

                                <div class="col-lg-6 horse-details">
                                    <h3>الإسم : {{ $doctor->name }}</h3>
                                    <h5>التخصص : {{ $doctor->specialization }}</h5>
                                    <h6>الإيميل : {{ $doctor->email }}</h6>
                                    <h6>الموبايل : {{ $doctor->phone }}</h6>
                                    @livewire('user.rating', ['rating' => $doctor->rating], key('rating_'.$doctor->id))
                                    <p>التفاصيل : {{ $doctor->description }}</p>
                                    <p>العنوان : {{ $doctor->address }}</p>
                                    @auth('user')
                                        <div class="ptb-3">
                                            @livewire('user.rate', ['rate_type' => 'doctor','rate_id'=>$doctor->id], key('rate_'.$doctor->id))
                                        </div>
                                    @endauth
                                    <a href="{{ route('booking.doctor',['id'=>$doctor->id]) }}" class="btn btn-primary">جدول المواعيد</a>

                                </div>
                            </div>
                        </div>
                        <div class="tabs_item">
                            <div class="">
                                <div class="row">
                                    @if($doctor->cases->count() == 0)
                                        <div>
                                            <span class="d-block text-center">لا يوجد حالة</span>
                                        </div>
                                    @endif
                                    @foreach ($doctor->cases as $case)
                                    <div class="col-lg-4 col-md-4" style="margin: 30px 10px">
                                        <div class="single-feedback">
                                            <div class="client-info">
                                                <h3>{{ $case->title }}</h3>
                                            </div>
                                            <p style="font-style: normal">{!! nl2br($case->details) !!}</p>
                                            <p style="font-style: normal">{!! nl2br($case->treatment) !!}</p>
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
