@extends('frontend.layouts.app')
@section('title', 'Contact Us' . ' ' . '-' . ' ' . $setting->site_title)
@section('keywords', $setting->site_keywords)
@section('description', $setting->site_description)
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-4 animated slideInDown mb-4 text-white">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Contact Us
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-6 mb-5">
                        If You Have Any Query, Please Contact Us
                    </h1>
                    <p class="mb-4">
                        If you have any questions or need assistance, feel free to reach out to us. We're here to help!
                    </p>
                    @include('frontend.components.contact')
                </div>
                @if ($setting->map)
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px">
                        <div class="position-relative rounded overflow-hidden h-100">
                            {!! $setting->map !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Contact End -->

@stop

@section('js')

@stop
