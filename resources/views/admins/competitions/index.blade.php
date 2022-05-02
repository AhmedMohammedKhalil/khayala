@extends('admins.layout')
@section('section')
    <div class="section-title">
        <a href="{{ route('admin.competitions.create') }}" class="btn btn-primary">إضافة مسابقة</a>
    </div>
    <section class="stallions-area ptb-80">
        @if(count($competitions) > 0)
            <div class="container">
                <div class="row">
                    @foreach ($competitions as $c)
                        <div class="col-lg-6 col-md-6">
                            <div class="single-stallions">
                                @if($c->photo != null)
                                <img src="{{asset('img/competitions/'.$c->id.'/'.$c->photo)}}" alt="image">
                                @else
                                    <img src="{{asset('img/competitions/default.jpg')}}" alt="image">
                                @endif
                                <div class="stallions-content">
                                    <h3>{{ $c->name }}</h3>
                                    <h4>{{ $c->organization }}</h4>
                                    <h6>{{ $c->appointment }}</h6>
                                    <p class="line-clamp">{{ $c->address }}</p>
                                    <div>
                                        <a href="{{ route('admin.competitions.show',['id'=>$c->id]) }}" class="btn btn-primary">عرض</a>
                                        <a href="{{ route('admin.competitions.edit',['id'=>$c->id]) }}" class="btn btn-primary">تعديل</a>
                                        @if($c->user_booking->count() == 0)
                                            <a href="{{ route('admin.competitions.delete',['id'=>$c->id]) }}" class="btn btn-primary">حذف</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @else
            <div>
                <p>لايوجد</p>
            </div>
        @endif
        <div class="horse-box3 wow fadeInLeft slow"><img src="{{asset('img/2.png')}}" alt="horse"></div>
        <div class="horse-box4 wow fadeInLeft slow"><img src="{{asset('img/3.png')}}" alt="horse"></div>
    </section>
@endsection
