@extends('front.layout')
@section('content')
    <section>
        <!-- Start Hero Section -->
        <div class="hero">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5">
                        <div class="intro-excerpt">
                            <h1>Manage your people,
                                <span clsas="d-block">all in one place</span>
                            </h1>
                            <p class="mb-4">We simplify HR by providing you with one platform to manage
                                your payroll, benefits, employee information and much more.</p>
                            <p><a href="" class="btn btn-secondary me-2">Get Started</a><a href="#"
                                    class="btn btn-white-outline">Explore</a></p>
                        </div>
                    </div>
                    <div class="col-lg-7 mb-3">
                        <div class="hero-img-wrap">
                            {{-- <img src="{{ asset('img/illustration/Hero Image.svg') }}" class="img-thumbnail"> --}}
                           <img src="{{asset('img/payroll1.webp')}}" alt="" srcset="" class="img-thumbnail" width="720" height="800">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero Section -->

        <section>
            <!-- Start Features Section -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">

                            <h3 class="mb-5 mt-5">
                                MAKE YOUR PEOPLE HAPPY <br>
                                WITH KAKITANGAN.COM</h3>

                            <p>
                                HR made simple - all your people, platforms and payrolls in one place.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-2 ">
                        <div class="feature-box">
                            <div class="feature-icon text-center">
                                <i class=" text-center fa fa-mobile" style="font-size:60px;color:rgb(58, 151, 179);"></i>
                            </div>
                            <div class="feature-content  text-center">

                                <p>Pay your employees on time, every time.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 ">
                        <div class="feature-box">
                            <div class="feature-icon text-center">
                                <i class=" text-center fa fa-clock" style="font-size:60px;color:rgb(58, 151, 179);"></i>
                            </div>
                            <div class="feature-content  text-center">

                                <p>Pay your employees on time, every time.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 ">
                        <div class="feature-box">
                            <div class="feature-icon text-center">
                                <i class=" text-center fas fa-shield-alt"
                                    style="font-size:60px;color:rgb(58, 151, 179);"></i>
                            </div>
                            <div class="feature-content  text-center">

                                <p>Pay your employees on time, every time.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 ">
                        <div class="feature-box">
                            <div class="feature-icon text-center">
                                <i class=" text-center fas fa-lock" style="font-size:60px;color:rgb(58, 151, 179);"></i>
                            </div>
                            <div class="feature-content  text-center">

                                <p>Pay your employees on time, every time.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 ">
                        <div class="feature-box">
                            <div class="feature-icon text-center">
                                <i class=" text-center fa fa-check-square"
                                    style="font-size:60px;color:rgb(58, 151, 179);"></i>
                            </div>
                            <div class="feature-content  text-center">

                                <p>Pay your employees on time, every time.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </section>


        <section class="mt-5" style="background: url('{{ asset('img/overlay.jpg') }}')">
            <div class="container">
                <div class="row  justify-content-center">
                    <div class="col-4 text-capitalize text-center">
                        <p class="mt-4 text-light">updated</p>
                        <h3
                            style="    color: #42b4ce;
                font-size: 62px;
                font-weight: 700;
                margin-top: -6px;">
                            12,000</h3>
                        <h5 class="mt-4 text-light">companies</h5>
                    </div>
                    <div class="col-3 text-capitalize text-center">
                        <p class="mt-4 text-light">motivated</p>
                        <h3
                            style="    color: #42b4ce;
                font-size: 62px;
                font-weight: 700;
                margin-top: -6px;">
                            60,000</h3>
                        <h5 class="mt-4 text-light">Employees</h5>
                    </div>
                    <div class="col-3 text-capitalize text-center">
                        <p class="mt-4 text-light">saved</p>
                        <h3
                            style="    color: #42b4ce;
                font-size: 62px;
                font-weight: 700;
                margin-top: -6px;">
                            50,000</h3>
                        <h5 class="mt-4 text-light">hours</h5>
                    </div>
                </div>
            </div>
        </section>


        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5 mt-5">


                        <h1 class="mb-5 mt-5 text-bold" style="font-weight: 900;color: #42b4ce;">
                            Whatever you need,
                            <br> we’re here to help
                        </h1>
                        <p class=" lead">
                            Whether you're having trouble with our system or thought of a feature that would benefit
                            everyone, we're only a message away.
                        </p>


                    </div>
                    <div class="col-5">
                        {{-- <img src="{{asset("img/illustration/Hero Image.svg")}}" alt="" srcset=""> --}}
                        <img src="{{asset('img/banner.webp')}}" class="img-thumbnail" alt="" srcset="">
                    </div>
                </div>
            </div>

        </section>
    @endsection
