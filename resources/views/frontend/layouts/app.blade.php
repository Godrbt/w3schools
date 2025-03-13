<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap"
        rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

    @yield('css')
</head>

<body>
    <!-- Modal -->
    <div style="z-index: 3000" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Contact Us</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('frontend.components.contact')
                </div>

            </div>
        </div>
    </div>

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark text-white-50 py-2 px-0 d-none d-lg-block">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-phone-alt me-2"></small>
                    <small>{{ $setting->phone }}</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="far fa-envelope-open me-2"></small>
                    <small>{{ $setting->email }}</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="far fa-clock me-2"></small>
                    <small>Mon - Sat : 09 AM - 09 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center">
                    @if ($setting->facebook)
                        <a target="_blank" class="text-white-50 ms-4" href="{{ $setting->facebook }}"><i
                                class="fab fa-facebook-f"></i></a>
                    @endif
                    @if ($setting->instagram)
                        <a target="_blank" class="text-white-50 ms-4" href="{{ $setting->instagram }}"><i
                                class="fab fa-instagram"></i></a>
                    @endif
                    @if ($setting->twitter)
                        <a target="_blank" class="text-white-50 ms-4" href="{{ $setting->twitter }}"><i
                                class="fab fa-twitter"></i></a>
                    @endif
                    @if ($setting->linkedin)
                        <a target="_blank" class="text-white-50 ms-4" href="{{ $setting->linkedin }}"><i
                                class="fab fa-linkedin-in"></i></a>
                    @endif
                    @if ($setting->youtube)
                        <a target="_blank" class="text-white-50 ms-4" href="{{ $setting->youtube }}"><i
                                class="fab fa-youtube"></i></a>
                    @endif


                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav style="z-index: 2000;" class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-2 px-lg-5">
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center py-0">
            <h1 class="m-0">
                @if ($setting->logo)
                    <img class="img-fluid me-3 d-none d-md-block" width="80"
                        src="{{ asset('uploads/images/logo/' . $setting->logo) }}" alt="" />
                @else
                <h2>{{ $setting->bname }}</h2>
                @endif
                <img class="img-fluid me-3 d-block d-md-none" width="60"
                    src="{{ asset('uploads/images/logo/' . $setting->logo) }}" alt="" />
            </h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
                <a href="{{ route('home') }}"
                    class="nav-item nav-link {{ Route::is('home') ? 'active' : '' }}">Home</a>
                <!-- <a href="{{ route('about') }}"
                    class="nav-item nav-link {{ Route::is('about') ? 'active' : '' }}">About Us</a> -->

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Courses</a>
                    <div class="dropdown-menu bg-light border-0 m-0">
                        @foreach ($course_categories as $course)
                            <a href="{{ route('course.detail', ['category_slug' => $course->slug, 'service_slug' => optional($course->services->first())->slug]) }}"
                                class="dropdown-item">{{ $course->title }}</a>
                        @endforeach
                        <a href="{{ route('course') }}" class="dropdown-item">View All</a>
                    </div>
                </div>

                <a href="{{ route('blog') }}"
                    class="nav-item nav-link {{ Route::is('blog') ? 'active' : '' }}">Blogs</a>
                <!-- <a href="{{ route('contact') }}"
                    class="nav-item nav-link {{ Route::is('contact') ? 'active' : '' }}">Contact Us</a> -->
            </div>
        </div>
        <a href="" class="btn btn-primary btn-lg rounded-1 py-1 px-4 d-none d-lg-block">
            {{ $setting->phone }}</a>
    </nav>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6">
                    <h3 class="text-white mb-4">
                        {{ $setting->bname }}
                    </h3>
                    <p>
                        Join our community today and start your journey towards becoming a skilled developer. Let's
                        build a brighter future together – one line of code at a time.
                    </p>
                    <div class="d-flex pt-2">
                        @if ($setting->facebook)
                            <a target="_blank" class="btn btn-square me-1" href="{{ $setting->facebook }}"><i
                                    class="fab fa-facebook-f"></i></a>
                        @endif
                        @if ($setting->instagram)
                            <a target="_blank" class="btn btn-square me-1" href="{{ $setting->instagram }}"><i
                                    class="fab fa-instagram"></i></a>
                        @endif
                        @if ($setting->twitter)
                            <a target="_blank" class="btn btn-square me-1" href="{{ $setting->twitter }}"><i
                                    class="fab fa-twitter"></i></a>
                        @endif
                        @if ($setting->youtube)
                            <a target="_blank" class="btn btn-square me-1" href="{{ $setting->youtube }}"><i
                                    class="fab fa-youtube"></i></a>
                        @endif
                        @if ($setting->linkedin)
                            <a target="_blank" class="btn btn-square me-0" href="{{ $setting->linkedin }}"><i
                                    class="fab fa-linkedin-in"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    @if ($setting->address)
                        <p>
                            <i class="fa fa-map-marker-alt me-3"></i>{{ $setting->address }}
                        </p>
                    @endif
                    @if ($setting->phone)
                        <p><i class="fa fa-phone-alt me-3"></i>{{ $setting->phone }}</p>
                    @endif
                    @if ($setting->phone2)
                        <p><i class="fa fa-phone-alt me-3"></i>{{ $setting->phone2 }}</p>
                    @endif
                    @if ($setting->email)
                        <p><i class="fa fa-envelope me-3"></i>{{ $setting->email }}</p>
                    @endif
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="{{ route('home') }}">Home</a>
                    <!-- <a class="btn btn-link" href="{{ route('about') }}">About Us</a> -->
                    <a class="btn btn-link" href="{{ route('course') }}">Courses</a>
                    <a class="btn btn-link" href="{{ route('blog') }}">Blogs</a>
                    <!-- <a class="btn btn-link" href="{{ route('privacy.policy') }}">Privacy Policy</a> -->
                    <!-- <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a> -->
                </div>
            </div>
        </div>
        <!-- <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">{{ $setting->bname }}</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">

                        Developed with ❤️ By <a target="_blank" href="https://www.vfixtechnology.com">VFIX
                            TECHNOLOGY</a>

                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> --}}

    <!-- JavaScript Libraries -->
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>


    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Check if the modal exists before trying to show it
                const modalElement = document.getElementById('staticBackdrop');
                if (modalElement) {
                    // Trigger the modal to display
                    $('#staticBackdrop').modal('show');
                }
            });
        </script>
    @endif

    @yield('js')


</body>

</html>
