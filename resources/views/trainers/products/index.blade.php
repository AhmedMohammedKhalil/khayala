@extends('trainers.layout')
@section('section')
<section class="extra-pb ptb-80">
    <div class="container">
        <div class="section-title">
            <a href="{{ route('trainer.products.create') }}" class="btn btn-primary">إضافة منتج</a>
        </div>

        <div class="row">
                @if($products->count() == 0)
                    <div>
                        <span class="d-block text-center">لا يوجد اى منتجات</span>
                    </div>
                @endif
                @foreach ($products as $p)
                <div class="col-lg-6 col-md-6">

                    <div class="single-products">
                        <div class="products-image">
                            @if($p->photo != null)
                            <img src="{{asset('img/products/'.$p->id.'/'.$p->photo)}}" alt="image">
                            @else
                            <img src="{{asset('img/products/default.jpg')}}" alt="image">
                            @endif

                        </div>

                        <div class="products-content">
                            <h3>{{ $p->name }}</h3>
                            <span>{{ $p->price }} دينار كويتى </span>
                            <div>
                                <a href="{{ route('productDetails.show',['id'=>$p->id]) }}" class="btn btn-primary">عرض</a>
                                <a href="{{ route('trainer.products.edit',['id'=>$p->id]) }}" class="btn btn-primary">تعديل</a>
                                @if($p->orders->count() == 0)
                                    <a href="{{ route('trainer.products.delete',['id'=>$p->id]) }}" class="btn btn-primary">مسح</a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
        </div>
    </div>
</section>
@endsection
