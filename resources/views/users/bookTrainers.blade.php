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
                                <th scope="col">الإسم</th>
                                <th scope="col">الموبايل</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">الميعاد</th>
                                @if($bookings->count() == 0)
                                    <tr>
                                        <th colspan="5" class="text-center">
                                            لا بوجد أى حجز مواعيد
                                        </th>
                                    </tr>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($bookings as $b)
                            <tr>
                                <td class="booking-id">
                                    <span>{{ $loop->iteration }}</span>
                                </td>

                                <td class="booking-name">
                                    <a href="{{ route('trainerDetails.show',['id' => $b->trainer->id]) }}">{{ $b->trainer->name }}</a>
                                </td>

                                <td class="booking-phone">
                                    <span>{{ $b->trainer->phone }}</span>

                                </td>

                                <td class="booking-status">
                                    @if($b->status == 0)
                                            إنتظار
                                    @elseif($b->status == 1)
                                        تم الحجز
                                    @else
                                        تم رفض الحجز إحجز فى وقت اخر
                                    @endif
                                </td>


                                <td class="booking-appointment">

                                    @if($b->status == 1)
                                        <span>{{ $b->book_at }}</span>
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
