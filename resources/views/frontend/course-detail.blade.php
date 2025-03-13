@extends('frontend.layouts.app')
@if ($service->meta_title)
    @section('title', $service->meta_title . ' ' . '-' . ' ' . $setting->site_title)
@else
    @section('title', $setting->bname . ' ' . '-' . ' ' . $service->title)
@endif
@if ($service->meta_description)
    @section('description', $service->meta_description)
@else
    @section('description', Str::limit($service->excerpt, 200))
@endif
@section('keywords', $service->meta_keyword)
@section('content')

    <!-- BLOG DETAILS START -->
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 order-sm-1 order-2 pe-md-5 ">
                    <div class="overflow-auto pt-5 bg-light p-2 sticky sticky-top" style="max-height: 690px;">
                        {{-- @foreach ($categories as $category)
                            <div>
                                <h2 class="h3">{{ $category->title }}</h2>
                                <ul>
                                    @foreach ($category->services as $srv)
                                        @php
                                            $scategory = $srv->scategories->last(); // Get the last category for deep-level categories
                                        @endphp
                                        @if ($scategory)
                                            <li>
                                                <a class="text-dark {{ request()->url() == route('course.detail', ['category_slug' => $category_slug, 'service_slug' => $srv->slug]) ? 'bg-primary text-white px-3 rounded my-2' : '' }}"
                                                    href="{{ route('course.detail', ['category_slug' => $category_slug, 'service_slug' => $srv->slug]) }}">
                                                    {{ $srv->title }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>


                                @if ($category->subcategory->isNotEmpty())
                                    <ul class="ms-2">
                                        @foreach ($category->subcategory as $sub)
                                            @include('frontend.components.partials.category-list', [
                                                'category' => $sub,
                                            ])
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach --}}


                        @foreach ($category->subcategory as $category)
                            @if ($category->services->count())
                                <div>
                                    <h2 class="h3">{{ $category->title }}</h2>
                                    <ul>
                                        @foreach ($category->services as $srv)
                                            @php
                                                $scategory = $srv->scategories->last(); // Get the last category for deep-level categories
                                            @endphp
                                            @if ($scategory && $srv->published == '1')
                                                <li>
                                                    <a class="text-dark {{ request()->url() == route('course.detail', ['category_slug' => $category_slug, 'service_slug' => $srv->slug]) ? 'bg-primary text-white px-3 rounded my-2' : '' }}"
                                                        href="{{ route('course.detail', ['category_slug' => $category_slug, 'service_slug' => $srv->slug]) }}">
                                                        {{ $srv->title }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endforeach

                    </div>

                </div>

                <div class="col-md-9 order-sm-2 order-1 pt-5 pe-sm-5">

                    <div class="mb-4">
                        <img class="img-fluid rounded" src="{{ asset('uploads/images/service/' . $service->image) }}"
                            alt="">
                    </div>

                    <!-- Blade view: service/show.blade.php -->

                    @php
                        // Extract video ID from YouTube URL
                        $videoUrl = $service->video; // change your variable accordingly
                        preg_match(
                            '/(?:https?:\/\/(?:www\.)?youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)([a-zA-Z0-9_-]{11}))/i',
                            $videoUrl,
                            $matches,
                        );
                        $videoId = $matches[1] ?? null;
                    @endphp


                    @if ($videoId)
                        <div class="video-container mb-4">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $videoId }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    @endif



                    <h2>{{ $service->title }}</h2>
                    <p>
                        {!! $service->body !!}
                    </p>

                    <div class="d-flex justify-content-between my-5">
                        @if ($prevService)
                            <a href="{{ route('course.detail', ['category_slug' => $category_slug, 'service_slug' => $prevService->slug]) }}"
                                class="btn btn-primary d-none d-sm-block">
                                ← Previous: {{ $prevService->title }}
                            </a>

                            <a href="{{ route('course.detail', ['category_slug' => $category_slug, 'service_slug' => $prevService->slug]) }}"
                                class="btn btn-primary d-block d-sm-none">
                                ← Previous:</span>
                            </a>
                        @endif

                        @if ($nextService)
                            <a href="{{ route('course.detail', ['category_slug' => $category_slug, 'service_slug' => $nextService->slug]) }}"
                                class="btn btn-primary d-none d-sm-block">
                                Next: {{ $nextService->title }} →
                            </a>

                            {{-- <a href="{{ route('course.detail', ['category_slug' => $category->full_slug, 'service_slug' => $nextService->slug]) }}" class="btn btn-primary">
                                Next: {{ $nextService->title }} →
                            </a> --}}


                            <a href="{{ route('course.detail', ['category_slug' => $category_slug, 'service_slug' => $nextService->slug]) }}"
                                class="btn btn-primary d-block d-sm-none">
                                Next: →
                            </a>
                        @endif
                    </div>
                  {{--
                    <div>
                        @comments(['model' => $service])
                    </div> --}}

                </div>
            </div>
        </div>
    </section>


@stop

@section('css')

    <!-- Prism CSS for syntax highlighting -->
    <link rel="stylesheet" href="{{ asset('assets/css/prism.css') }}">

    <style>
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #000;
            border-radius: 10px;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.btn[data-toggle="modal"]').on('click', function() {
                $($(this).data('target')).modal('show');
            });
        });
    </script>

    <script src="{{ asset('assets/js/prism.js') }}"></script>

    @if ($errors->any())
        <script>
            $(document).ready(function() {
                // Scroll to the error section
                var marginTop = 250;
                $('html, body').animate({
                    scrollTop: $('#error-section').offset().top - marginTop
                }, 'slow');
            });
        </script>
    @endif

@stop
