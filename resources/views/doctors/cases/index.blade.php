@extends('doctors.layout')
@section('section')
<section class="extra-pb ptb-80">
    <div class="container">
        <div class="section-title">
            <a href="{{ route('doctor.cases.create') }}" class="btn btn-primary">إضافة حالة</a>
        </div>

        <div class="row">
                @if($cases->count() == 0)
                    <div>
                        <span class="d-block text-center">لا يوجد حالة</span>
                    </div>
                @endif
                @foreach ($cases as $case)
                <div class="col-lg-4 col-md-4" style="margin: 30px 10px">
                    <div class="single-feedback">
                        <div class="client-info">
                            <h3>{{ $case->title }}</h3>
                        </div>
                        <p style="font-style: normal">{!! nl2br($case->details) !!}</p>
                        <p style="font-style: normal">{!! nl2br($case->treatment) !!}</p>


                        <div>
                            <a href="{{ route('doctor.cases.edit',['id'=>$case->id]) }}" class="btn btn-primary">تعديل</a>
                            <a href="{{ route('doctor.cases.delete',['id'=>$case->id]) }}" class="btn btn-primary">حذف</a>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</section>
@endsection
