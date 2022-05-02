@extends('trainers.layout')
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
                                <th scope="col">إسم المستخدم</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">الميعاد</th>
                                <th scope="col">الإعدادات</th>
                            </tr>
                            @if($bookings->count() == 0)
                                <tr>
                                    <th colspan="5" class="text-center">
                                        لا بوجد أى حجز
                                    </th>
                                </tr>
                            @endif
                        </thead>

                        <tbody>
                            @foreach ($bookings as $b)
                            <tr>
                                <td class="booking-id">
                                    <span>{{ $loop->iteration }}</span>
                                </td>

                                <td class="booking-name">
                                    <a href="{{ route('trainer.userDetails.show',['id' => $b->user->id]) }}">{{ $b->user->name }}</a>
                                </td>

                                <td class="booking-status">
                                    @if($b->status == 0)
                                            إنتظار
                                    @elseif($b->status == 1)
                                        تم الحجز
                                    @else
                                        تم رفض الحجز
                                    @endif
                                </td>

                                <td>
                                    @if($b->status == '1')
                                        {{ $b->book_at }}
                                    @endif
                                </td>

                                <td class="d-flex">
                                    @if($b->status == 0)
                                        <a href="{{ route('trainer.booking.accept',['id'=>$b->id]) }}" class="accept ps-2 pe-2">قبول</a>
                                        <a href="{{ route('trainer.booking.reject',['id'=>$b->id]) }}" class="reject ps-2 pe-2"> رفض</a>
                                    @endif
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
