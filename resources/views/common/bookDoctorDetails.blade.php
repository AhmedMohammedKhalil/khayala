<div style="margin: 80px 0;min-height: 50vh" >
    <div class="row">
        <div class="single-feedback">
            <div class="client-info pt-3">
                <h3>{{ $booking->title }}</h3>
                <span>صاحب الحجز : {{ $booking->user->name }}</span>
                <span>الدكتور : {{ $booking->doctor->name }}</span>
                <span>ميعاد الحجز : {{ $booking->start}} - {{ $booking->end}}</span>
                <span>@if($booking->status == 1 )الميعاد متاح  @else الميعاد محجوز @endif</span>
            </div>
            <p style="font-style: normal">{{ nl2br($booking->description) }}</p>
        </div>
        @auth('user')
        @if(auth('user')->user()->id == $booking->user_id)
            <a style="    display: block; width: fit-content;margin: 20px auto;" href="{{ route('user.doctorbooking.del',['id'=>$booking->id]) }}" class="btn btn-primary">حذف الميعاد</a>
        @endif
        @endauth

    </div>
</div>
