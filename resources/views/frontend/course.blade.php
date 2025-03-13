@extends('frontend.layouts.app')
@if ($search)
    @section('title', ucwords($search) . ' ' . '-' . ' ' . $setting->bname)
@elseif ($category)
    @section('title', ucwords($category) . ' ' . '-' . ' ' . $setting->site_title)
@else
    @section('title', 'Courses' . ' ' . '-' . ' ' . $setting->site_title)
@endif
@section('description', $setting->site_description)
@section('keywords', $setting->site_keywords)
@section('content')




    <div class="container-fluid blog pb-5 mt-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h4 class="text-primary">{{ $setting->bname }}</h4>
                <h1 class="display-4">
                    @if ($search)
                        {{ $search }}
                    @elseif ($category)
                        {{ str_replace('-', ' ', ucfirst($category)) }}
                    @else
                        Our Courses
                    @endif

                </h1>
            </div>
            @if ($category)
                <div class="row g-4 justify-content-center">
                    <div class="col-md-12">
                        <div class="row g-4 mb-5">
                            @foreach ($services as $service)
                                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="blog-item bg-light rounded p-3"
                                        style="background-image: url({{ asset('uploads/images/services' . $service->image) }});">
                                        @if ($service->image)
                                            <div class="project-img">
                                                <img src="{{ asset('uploads/images/service/' . $service->image) }}"
                                                    class="img-fluid w-100 rounded" alt="Image">
                                            </div>
                                        @endif
                                        <div class="my-4">
                                            <a href="{{ route('course.detail', ['category_slug' => $service->scategories->first()->slug, 'service_slug' => $service->slug]) }}"
                                                class="h4">{{ $service->title }}</a>
                                            <p>{{ Str::limit($service->excerpt, 140) }}</p>
                                        </div>
                                        <a class="btn btn-primary rounded-pill py-2 px-4"
                                            href="{{ route('course.detail', ['category_slug' => $service->scategories->first()->slug, 'service_slug' => $service->slug]) }}">Explore
                                            More</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{ $services->links() }}
                    </div>
                </div>
            @else
                <div class="row g-4 justify-content-center">
                    <div class="col-md-12">
                        <div class="row g-4 mb-5">
                            @forelse ($services as $course)
                                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="blog-item bg-light rounded px-3 pt-3 pb-2"
                                        style="background-image: url({{ asset('uploads/images/scategory/' . $course->image) }});">
                                        <div class="project-img">
                                            <a
                                                href="{{ route('course.detail', ['category_slug' => $course->slug, 'service_slug' => optional($course->services->first())->slug]) }}">
                                                <img src="{{ asset('uploads/images/scategory/' . $course->image) }}"
                                                    class="img-fluid w-100 rounded" alt="Image">
                                            </a>
                                        </div>
                                        <div class="pt-2">
                                            <a href="{{ route('course.detail', ['category_slug' => $course->slug, 'service_slug' => optional($course->services->first())->slug]) }}"
                                                class="h4">
                                                {{ $course->title }}
                                            </a>
                                            <p>{{ Str::limit($course->excerpt, 140) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center">
                                    <h4>No Data Found</h4>
                                </div>
                            @endforelse

                        </div>

                        {{ $services->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>


    <!-- Service End -->

@stop

@section('css')

    <style>
        .sticky-sidebar {
            position: sticky;
            top: 0;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: 100vh;
        }
    </style>

@stop
