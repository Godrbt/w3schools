@extends('frontend.layouts.app')
@if ($search)
    @section('title', ucwords($search) . ' ' . '-' . ' ' . $setting->bname)
@elseif ($category)
    @section('title', ucwords($category) . ' ' . '-' . ' ' . $setting->site_title)
@elseif ($tag)
    @section('title', ucwords($tag) . ' ' . '-' . ' ' . $setting->site_title)
@else
    @section('title', 'Blogs' . ' ' . '-' . ' ' . $setting->site_title)
@endif
@section('description', $setting->site_description)
@section('keywords', $setting->site_keywords)
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

    <!-- Blog Start -->
    <div class="container-fluid blog py-5">
        <div class="container ">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h4 class="text-primary">Our Blogs</h4>
                <h1 class="display-4">Latest Articles & News from the Blogs</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @forelse ($posts as $post)
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="blog-item bg-light rounded p-4"
                            style="background-image: url({{ asset('uploads/images/post' . $post->image) }});">
                            <div class="project-img">
                                @if ($post->image)
                                    <img src="{{ asset('uploads/images/post/' . $post->image) }}"
                                        class="img-fluid w-100 rounded" alt="Image">
                                @else
                                    <img src="{{ asset('uploads/images/no-image.jpg') }}"
                                        class="img-fluid w-100 rounded" alt="Image">
                                @endif

                                {{-- <div class="blog-plus-icon">
                                    <a href="{{ asset('uploads/images/post/' . $post->image) }}"
                                        data-lightbox="blog-1" class="btn btn-primary btn-md-square rounded-pill"><i
                                            class="fas fa-plus fa-1x"></i></a>
                                </div> --}}
                            </div>
                            <div class="my-4">
                                <a href="{{ route('blog.detail', $post->slug) }}"
                                    class="h4">{{ Str::limit($post->title, 50) }}</a>
                                <p>{{ Str::limit($post->excerpt, 140) }}</p>
                            </div>
                            <a class="btn btn-primary rounded-pill py-2 px-4"
                                href="{{ route('blog.detail', $post->slug) }}">Explore More</a>
                        </div>
                    </div>
                @empty
                <p class="text-center">No data found</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Blog End -->





@stop
