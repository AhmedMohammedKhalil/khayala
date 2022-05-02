@extends('trainers.layout')
@section('section')
<section class="extra-pb ptb-80">
    <div class="container">
        <div class="section-title">
            <a href="{{ route('trainer.works.create') }}" class="btn btn-primary">إضافة عمل</a>
        </div>

        <div class="row">
                @if($works->count() == 0)
                    <div>
                        <span class="d-block text-center">لا يوجد اى عمل</span>
                    </div>
                @endif
                @foreach ($works as $work)
                <div class="col-lg-4 col-md-4" style="margin: 30px 10px">
                    <div class="single-feedback">
                        <div class="client-info">
                            <h3>{{ $work->job_title }}</h3>
                            <span>{{ $work->placement }}</span>
                            <span>{{ $work->job_estimation }}</span>

                        </div>
                        <p style="font-style: normal">{{ nl2br($work->details) }}</p>

                        <div>
                            <a href="{{ route('trainer.works.edit',['id'=>$work->id]) }}" class="btn btn-primary">تعديل</a>
                            <a href="{{ route('trainer.works.delete',['id'=>$work->id]) }}" class="btn btn-primary">حذف</a>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</section>
@endsection
