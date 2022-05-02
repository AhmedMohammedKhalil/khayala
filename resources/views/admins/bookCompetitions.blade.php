@extends('admins.layout')
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
                                <th scope="col">إسم المسابقة</th>
                                <th scope="col">إسم المشترك</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">الإعدادات</th>
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

                                <td class="booking-name">
                                    <a href="{{ route('admin.userDetails.show',['id' => $b->user->id]) }}">{{ $b->user->name }}</a>
                                </td>

                                <td class="booking-status">
                                    @if($b->status == 0)
                                            إنتظار
                                    @elseif($b->status == 1)
                                        تم الإشتراك
                                    @else
                                        تم رفض الإشتراك
                                    @endif
                                </td>

                                <td class="d-flex">
                                    @if($b->status == 0)
                                        <a href="{{ route('admin.booking.competition.accept',['id'=>$b->id]) }}" class="accept ps-2 pe-2">قبول</a>
                                        <a href="{{ route('admin.booking.competition.reject',['id'=>$b->id]) }}" class="reject ps-2 pe-2"> رفض</a>
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
