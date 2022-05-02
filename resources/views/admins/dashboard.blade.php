@extends('admins.layout')
@section('section')
    <!-- Start Funfacts Area -->
    <section class="funfacts-area bg-color ptb-80">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-6 col-md-4">
                    <div class="single-funfacts">
                        <h2 class="counter" dir="ltr">{{ $t_count }}</h2>
                        <p>المدربين</p>
                    </div>
                </div>

                <div class="col-lg-4 col-6 col-md-4">
                    <div class="single-funfacts">
                        <h2 class="counter" dir="ltr">{{ $u_count }}</h2>
                        <p>المستخدمين</p>
                    </div>
                </div>

                <div class="col-lg-4 col-6 col-md-4">
                    <div class="single-funfacts">
                        <h2 class="counter" dir="ltr">{{ $d_count }}</h2>
                        <p>الدكاترة</p>
                    </div>
                </div>

                <div class="col-lg-4 col-6 col-md-4">
                    <div class="single-funfacts">
                        <h2 class="counter" dir="ltr">{{ $p_count }}</h2>
                        <p>المنتجات</p>
                    </div>
                </div>

                <div class="col-lg-4 col-6 col-md-4">
                    <div class="single-funfacts">
                        <h2 class="counter" dir="ltr">{{ $comp_count }}</h2>
                        <p>المسابقات</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Funfacts Area -->
@endsection
