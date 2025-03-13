<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden rounded ps-5 pt-5 h-100" style="min-height: 400px">
                    <img class="position-absolute w-100 h-100" src="{{ asset('assets/img/about.webp') }}"
                        alt="" style="object-fit: cover" />
                    <div class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3"
                        style="width: 200px; height: 200px">
                        <div class="d-flex flex-column justify-content-center text-center bg-primary rounded h-100 p-3">
                            <h1 class="text-white mb-0">25</h1>
                            <h2 class="text-white">Years</h2>
                            <h5 class="text-white mb-0">Experience</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h1 class="display-6 mb-2">
                        Welcome to {{ $setting->bname }} – your ultimate destination to learn coding for free!
                    </h1>
                    <p class="mb-4">
                        we believe that knowledge should be accessible to everyone, regardless of their background or financial situation. Our mission is to empower aspiring developers, students, and tech enthusiasts by providing high-quality coding courses at absolutely no cost.
                    </p>
                    <p class="mb-4">
                        Join our community today and start your journey towards becoming a skilled developer. Let's build a brighter future together – one line of code at a time.
                    </p>


                    <div class="border-top mt-4 pt-4">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">
                                Call Now: <i class="fa fa-mobile"></i> <a href="tel:{{ $setting->phone }}">
                                    {{ $setting->phone }}</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
