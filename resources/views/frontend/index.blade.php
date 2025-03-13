@extends('frontend.layouts.app')
@section('title', $setting->bname . ' ' . '-' . '' . $setting->site_title)
@section('keywords', $setting->site_keywords)
@section('description', $setting->site_description)
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('assets/img/slider1.webp') }}" alt="Image" />
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h1 class="display-3 text-dark mb-4 animated slideInDown text-white"
                                        style="text-shadow: 2px 2px 4px black;">
                                        Rajagiri College of Social Sciences (Autonomous)
                                    </h1>
                                    <p class="fs-5 mb-5 text-white" style="text-shadow: 1px 1px 3px black;">
                                        
                                    </p>
                                    <a href="{{ route('course') }}" class="btn btn-primary py-3 px-5"> Courses</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="carousel-item">
                    <img class="w-100" src="{{ asset('assets/img/slider2.webp') }}" alt="Image" />
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h1 class="display-3 text-dark mb-4 animated slideInDown text-white">
                                        Enhance Your Spaces with Our Expertise
                                    </h1>
                                    <p class="fs-5 text-white mb-5">
                                        From burners to refrigerators, our range is designed to meet all your commercial
                                        kitchen needs.
                                    </p>
                                    <a href="{{ route('course') }}" class="btn btn-primary py-3 px-5">View Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('assets/img/slider3.webp') }}" alt="Image" />
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h1 class="display-3 text-dark mb-4 animated slideInDown text-white">
                                        Reliable Equipment, Seamless Performance
                                    </h1>
                                    <p class="fs-5 text-white mb-5">
                                        Engineered for durability and efficiency, our products deliver unmatched value and
                                        functionality.
                                    </p>
                                    <a href="{{ route('course') }}" class="btn btn-primary py-3 px-5">View Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('assets/img/slider4.webp') }}" alt="Image" />
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h1 class="display-3 text-dark mb-4 animated slideInDown text-white">
                                        Your Trusted Partner in Stainless Steel
                                    </h1>
                                    <p class="fs-5 text-white mb-5">
                                        Choose quality, innovation, and affordability with Balaji Enterprises – where
                                        excellence meets trust.
                                    </p>
                                    <a href="{{ route('course') }}" class="btn btn-primary py-3 px-5">View Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> --}}
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <!-- @include('frontend.components.about') -->
    <!-- About End -->

    <!-- course Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto" style="max-width: 500px">
                <h1 class="display-6 mb-5">
                    Latest Course
                </h1>
            </div>
            <div class="row g-4">
                @forelse ($courses as $course)
                    <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="blog-item bg-light rounded px-3 pt-3 pb-2"
                            style="background-image: url({{ asset('uploads/images/scategory' . $course->image) }});">
                            <div class="project-img">
                                <a
                                    href="{{ route('course.detail', ['category_slug' => $course->slug, 'service_slug' => optional($course->services->first())->slug]) }}">
                                    <img src="{{ asset('uploads/images/scategory/' . $course->image) }}"
                                        class="img-fluid w-100 rounded" alt="Image">
                                </a>
                            </div>
                            <div class="pt-2 ">
                                <a href="{{ route('course.detail', ['category_slug' => $course->slug, 'service_slug' => optional($course->services->first())->slug]) }}"
                                    class="h4">{{ $course->title }}</a>
                                <p>{{ Str::limit($course->excerpt, 140) }}</p>
                            </div>

                            </a>


                        </div>
                    </div>
                @empty
                    <p class="text-center">No data found</p>
                @endforelse
            </div>
            <div class="row mt-5">
                <a href="{{ route('course') }}" class="btn btn-primary btn-lg w-100">View All Courses</a>
            </div>
        </div>
    </div>
    <!-- Service End -->



    <!-- Appointment Start -->
    <!-- <div class="container-fluid appointment my-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-6 text-white mb-2">
                        {{ $setting->bname }}
                    </h1>
                    <p class="text-white mb-5">
                        Join our community today and start your journey towards becoming a skilled developer. Let's build a
                        brighter future together – one line of code at a time.
                    </p>
                    <div class="bg-white rounded p-3">
                        <div class="d-flex align-items-center bg-primary rounded p-3">
                            <h5 class="mb-0">
                                <span class="d-none d-md-block">Call Now: </span><i class="fa fa-mobile"></i> <a
                                    class="text-white" href="tel:{{ $setting->phone }}">
                                    {{ $setting->phone }}</a>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4">

                        <div class="row mb-3">
                            <h2>Have a Question? contact us now!</h2>
                        </div>
                        @include('frontend.components.contact')

                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Appointment End -->

    <!-- Testimonial Start -->
    @if ($testimonials->count())
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto" style="max-width: 500px">
                    <h1 class="display-6 mb-5">Student Reviews!</h1>
                </div>
                <div class="row g-5 justify-content-center">

                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="owl-carousel testimonial-carousel">
                            @foreach ($testimonials as $testimonial)
                                <div class="testimonial-item text-center">
                                    <img class="img-fluid rounded mx-auto mb-4"
                                        src="{{ asset('uploads/images/testimonial/' . $testimonial->image) }}"
                                        alt="" />
                                    <p class="fs-5">
                                        {{ $testimonial->body }}
                                    </p>
                                    <h5>{{ $testimonial->title }}</h5>
                                    <span>{{ $testimonial->star }}</span>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif
    <!-- Testimonial End -->
@endsection
