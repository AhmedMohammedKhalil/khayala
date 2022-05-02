@extends('users.layout')
@section('section')
<section class="cart-area ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">إسم المشترى</th>
                                <th scope="col">إسم المنتج</th>
                                <th scope="col">سعر المنتج</th>

                                @if($orders->count() == 0)
                                    <tr>
                                        <th colspan="5" class="text-center">
                                            لا يوجد أى طلبات
                                        </th>
                                    </tr>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td class="order-id">
                                    <span>{{ $loop->iteration }}</span>
                                </td>

                                <td class="order-user">
                                    <a href="{{ route('trainer.userDetails.show',['id' => $order->user->id]) }}">{{ $order->user->name }}</a>
                                </td>
                                <td class="order-name">
                                    <a href="{{ route('productDetails.show',['id' => $order->product->id]) }}">{{ $order->product->name }}</a>
                                </td>

                                <td class="order-phone">
                                    <span>{{ $order->product->price }}</span>

                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
