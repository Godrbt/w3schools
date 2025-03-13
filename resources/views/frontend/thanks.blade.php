@extends('frontend.layouts.app')
@section('title', 'Thanks' . ' ' . '-' . '' . $setting->site_title)
@section('keywords', $setting->site_keywords)
@section('description', $setting->site_description)
@section('content')
    <!-- Header Start -->
    <br>

    <!-- Contact Start -->
    @if (session('message'))
        <div class="container-xxl py-5" id="error-section">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    {{-- <h6 class="section-title bg-white text-center text-primary px-3">Thanks for being awesome</h6> --}}
                    <h1 class="fs-1">Thanks for being awesome</h1>
                    <p>
                        {{ session('message') }}
                    </p>
                    <div>
                        <a class="btn btn-primary mt-3" href="{{ route('home') }}">Back to home</a>
                    </div>
                </div>
            </div>
    @endif

    </div>
    <!-- Contact End -->
@stop

@section('js')
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                // Scroll to the error section
                $('html, body').animate({
                    scrollTop: $('#error-section').offset().top
                }, 'slow');
            });
        </script>
    @endif
@stop
