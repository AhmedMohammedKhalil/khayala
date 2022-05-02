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
                                <th scope="col">المكان</th>
                                <th scope="col">الميعاد</th>
                                <th scope="col">الحالة</th>
                            </tr>
                            @if($bookings->count() == 0)
                                <tr>
                                    <th colspan="5" class="text-center">
                                        لا بوجد أى اشتراكات
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
                                    <a href="{{ route('competitons.show',['id' => $b->competition->id]) }}">{{ $b->competition->name }}</a>
                                </td>

                                <td class="booking-location">
                                    <span>{{ $b->competition->address }}</span>

                                </td>

                                <td class="booking-appointment">
                                    <span>{{ $b->competition->appointment }}</span>
                                </td>

                                <td class="booking-status">
                                    @if($b->status == 0)
                                            إنتظار
                                    @elseif($b->status == 1)
                                        تم الإشتراك
                                    @else
                                        تم رفض الإشتراك إشترك فى وقت اخر
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
