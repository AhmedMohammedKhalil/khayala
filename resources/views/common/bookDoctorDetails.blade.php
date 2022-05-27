<div style="margin: 80px 0;min-height: 30vh" >
    <div class="row">
        <div class="single-feedback">
            <div class="client-info pt-3">
                <h3>{{ $booking->title }}</h3>
                <span>{{ $booking->start}}</span>
                <span>{{ $booking->end}}</span>
                <span>@if($booking->status == 1 )الميعاد متاح  @else الميعاد محجوز @endif</span>

            </div>
            <p style="font-style: normal">{{ nl2br($booking->description) }}</p>

            @auth('doctor')
                <a href="{{ route('doctor.booking.edit',['id'=>$booking->id]) }}" class="btn btn-primary">تعديل</a>
                <a href="{{ route('doctor.booking.delete',['id'=>$booking->id]) }}" class="btn btn-primary">حذف</a>
            @endauth


        </div>
    </div>
</div>
