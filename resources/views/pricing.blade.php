@extends('layouts.app')

@section('content')

<!-- Slider Area Start-->
<div class="services-area">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-80">
                    <h2>Our Pricing Plan</h2>
                    <span>A Simple Plan For You</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Area End-->

<main>

    <!--Choose Best start-->
    <div class="choose-best choose-padding">
        <div class="container">
            <!-- Section-tittle -->
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="single-choose text-center mb-30">
                        <div class="do-icon">
                            <span  class="flaticon-growth"></span>
                        </div>
                        <div class="do-caption">
                            <h4>&#8358; {{ $webSettings->transaction_fee }}</h4>
                            <p>Transaction Fee for Parents.</p>
                            <br>
                            <h4>&#8358; {{ $webSettings->withdrawal_fee }}</h4>
                            <p>Withdrawal Fee for Schools.</p>
                            <p>Smart Dashboard for Schools.</p>
                            <p>24/7 Support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Choose Best do End-->

</main>

@endsection
