<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>VTSPAB - Vehicle Tracking Service Provider Associations of Bangladesh</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Include FullCalendar CSS and JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

    <!-- Main CSS File -->
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
</head>

<body class="index-page">

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{url('/')}}" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{asset('assets/img/logo.png')}}" alt="">
            <h1 class="sitename"></h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home<br></a></li>
                <li><a href="#about">Objects</a></li>
                <li><a href="#values">Benifites</a></li>
                <li><a href="#members">Members</a></li>
                <li><a href="#team">Notice</a></li>
                <li><a href="blog.html"></a></li>
                <a class="btn-getstarted flex-md-shrink-0" href="{{url('member')}}">Login/Register</a>
            </ul>
        </nav>
    </div>
</header>

<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Vehicle Tracking Service Providers Association Of Bangladesh</h1>
                    <p data-aos="fade-up" data-aos-delay="100">All BTRC issued VTS License Holder companies under one
                        common umbrella </p>
                    <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                        <a href="#about" class="btn-get-started">Get Registered <i class="bi bi-arrow-right"></i></a>

                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="{{asset('assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up">
            <div class="row gx-0">

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h1>What is VTSPAB</h1>
                        <h3>A PROPOSED TRADE BODY FOR VTS LICENSE HOLDER COMPANIES.</h3>
                        <p>
                            There are till date 34 BTRC approved & license holder VTS companies in Bangladesh.
                            To ensure level playing field for all companies and work together in terms of policy
                            advocacy, grey market abolishment and market development together we are proposing to form a
                            trade body named as
                            Vehicle Tracking Service Providers Association of Bangladesh (VTSPAB).
                        </p>
                        <div class="text-center text-lg-start">
                            <a href="#"
                               class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Read More</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/about.jpeg" class="img-fluid" alt="">
                </div>

            </div>
        </div>

    </section><!-- /About Section -->

    <!-- Values Section -->
    <section id="values" class="values section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Our Values</h2>
            <p>Benefits for Companies<br></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-2">

                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <img src="assets/img/values-1.png" class="img-fluid" alt="">
                        <h3>Grey Market Reporting</h3>
                        <p>There are lot of brands in the market who are selling the same device without having any
                            license from BTRC. They are not giving revenue
                            share to BTRC and is making the field uneven for legal license holders</p>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                        <img src="assets/img/values-2.png" class="img-fluid" alt="">
                        <h3>Collective Body</h3>
                        <p>VTSPAB will act as a collective body. So in any need, if BTRC needs to sit and discuss with
                            the VTS operators, the association will facilitate and help in every manner. As well as if
                            there are any new policies in place which current license holders need to follow then VTSPAB
                            can aware them accordingly .</p>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                        <img src="assets/img/values-3.png" class="img-fluid" alt="">
                        <h3>Collective Voice</h3>
                        <p>A lot of time it is important to act as a collective voice in order to protect national
                            interest. This platform will helo us gain better visibility and importance in stakeholder
                            engagement.</p>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                        <img src="assets/img/values-3.png" class="img-fluid" alt="">
                        <h3>Resource Sharing & Market Development</h3>
                        <p>Through this platform new license holding companies will get to know about various processes
                            related to legal framework from other
                            license holder companies. As well as, we shall work together to raise awareness about the
                            service and explore market

                        </p>
                    </div>
                </div><!-- End Card Item -->


            </div>

        </div>

    </section><!-- /Values Section -->


    </section><!-- /Stats Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>From Setup to Support </h2>
            <p>STANDARD OPERATION PROCESS:VTS<br></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-5">

                <div class="col-xl-6" data-aos="zoom-out" data-aos-delay="100">
                    <img src="assets/img/features.png" class="img-fluid" alt="">
                </div>

                <div class="col-xl-6 d-flex">
                    <div class="row align-self-center gy-4">

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>License Acquisition</h3>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Device Acquisition</h3>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Sales & Marketing Lead</h3>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Installation & Onboarding</h3>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Customer Support & Service</h3>
                            </div>
                        </div><!-- End Feature Item -->


                    </div><!-- End Feature Item -->

                </div>
            </div>

        </div>


    </section><!-- /Features Section -->

    <!-- Alt Features Section -->
    <section id="alt-features" class="alt-features section">
        <div class="container section-title" data-aos="fade-up">

            <p>MONTHLY SUBSCRIPTION COST HEAD<br></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-5">

                <div class="col-xl-7 d-flex order-2 order-xl-1" data-aos="fade-up" data-aos-delay="200">

                    <div class="row align-self-center gy-5">

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-award"></i>
                            <div>
                                <h4>Server Cost</h4>
                                <p>All VTS providers need to maintain high performance servers which creates a huge cost
                                    overhead each month</p>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-card-checklist"></i>
                            <div>
                                <h4>Internet Cost (SIM)</h4>
                                <p>For each connection, separate internet cost is required. It is recurring cost each
                                    month.</p>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-dribbble"></i>
                            <div>
                                <h4>Software Development & Extension</h4>
                                <p>The software needs regular health check and preiodic upgrades are required from
                                    consumer ends. Which creates a significat overhead</p>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-filter-circle"></i>
                            <div>
                                <h4>Maps Layer Cost</h4>
                                <p>All VTS data needs to be poltted on map layer. Since we need to use third party maps,
                                    there is a cost overhead on this.</p>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-lightning-charge"></i>
                            <div>
                                <h4>Installation & Repair</h4>
                                <p>Each connection requires periodic maintenance. For that a regular team needs to be
                                    maintained. </p>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-patch-check"></i>
                            <div>
                                <h4>Company Overhead</h4>
                                <p>To run the company there is a cost head which directly contributes to staff salary
                                    and opex cost.s</p>
                            </div>
                        </div><!-- End Feature Item -->

                    </div>

                </div>

                <div class="col-xl-5 d-flex align-items-center order-1 order-xl-2" data-aos="fade-up"
                     data-aos-delay="100">
                    <img src="assets/img/alt-features.png" class="img-fluid" alt="">
                </div>

            </div>

        </div>

    </section><!-- /Alt Features Section -->


    <!-- Portfolio Section -->
    <section id="members" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>24 Licensed Companies Together as One.</h2>
            <p>Leading the telemtics industry of Bangladesh for last 15 years.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                {{--                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">--}}
                {{--                    <li data-filter="*" class="filter-active">All</li>--}}
                {{--                    <li data-filter=".filter-app">App</li>--}}
                {{--                    <li data-filter=".filter-product">Product</li>--}}
                {{--                    <li data-filter=".filter-branding">Branding</li>--}}
                {{--                    <li data-filter=".filter-books">Books</li>--}}
                {{--                </ul><!-- End Portfolio Filters -->--}}

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach($companies as $company)
                        <div class="col-lg-3 col-md-6 portfolio-item isotope-item filter-app">
                            <div class="portfolio-content h-100">
                                <img src="{{Storage::url($company->logo)}}" class="img-fluid" alt="{{$company->name}}">
                                <div class="portfolio-info">
                                    <p>{{$company->name}}</p>
                                    <a target="_blank" href="{{$company->website}}" title="More Details"
                                       class="details-link"><i class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->
                    @endforeach
                </div><!-- End Portfolio Container -->

            </div>

        </div>

    </section><!-- /Portfolio Section -->

    <!-- Upcoming Events and Calendar Section -->
    <section id="events-calendar" class="events-calendar section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Upcoming Events & Calendar</h2>
        </div>
        <div class="container">
            <div class="row g-4" style="min-height: 600px;">
                <!-- Event List Column -->
                <div class="col-lg-6">
                    <div class="event-list h-100 bg-white p-4 shadow-sm">
                        <ul class="list-group">
                            @foreach($events as $event)
                                <li class="list-group-item border-0" data-aos="fade-up" data-aos-delay="100">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ Storage::url($event->event_banner) }}" class="img-fluid me-3"
                                             alt="{{ $event->title }}" style="width: 50px; height: 50px;">
                                        <div>
                                            <h5>{{ $event->title }}</h5>
                                            <p><strong>Date:</strong> {{ $event->start_date }} - {{ $event->end_date }}
                                            </p>
                                            <p><strong>Location:</strong> {{ $event->location }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                            @if($events->count() == 0)
                                <li class="list-group-item border-0" data-aos="fade-up" data-aos-delay="100">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5>No Upcoming Events</h5>
                                        </div>
                                    </div>
                                </li>

                            @endif

                        </ul>
                    </div>
                </div>
                <!-- Calendar Column -->
                <div class="col-lg-6">
                    <div id="calendar" class="h-100 bg-white p-4 shadow-sm"></div>
                </div>
            </div>
        </div>
    </section>


    @if(count($posts) > 0)
        <!-- blog Section -->
        <section id="recent-posts" class="recent-posts section">
            <!-- Section Title -->
            <div class="container section-title aos-init aos-animate" data-aos="fade-up">
                <h2>Recent Posts</h2>
                <p>Recent posts form our Blog</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-5">

                    @foreach($posts as $post)
                        <div class="col-xl-4 col-md-6">
                            <div class="post-item position-relative h-100 aos-init aos-animate" data-aos="fade-up"
                                 data-aos-delay="100">
                                <div class="post-img position-relative overflow-hidden">
                                    <img src="{{Storage::url($post->banner)}}" class="img-fluid" alt="">
                                    <span
                                        class="post-date">{{\Carbon\Carbon::parse($post->published_at)->format('D M Y')}}</span>
                                </div>

                                <div class="post-content d-flex flex-column">

                                    <h3 class="post-title">{{$post->title}}</h3>

                                    <div class="meta d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person"></i> <span
                                                class="ps-2">{{$post->author->name}}</span>
                                        </div>
                                        <span class="px-3 text-black-50">/</span>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-folder2"></i> <span
                                                class="ps-2">{{$post->category->name}}</span>
                                        </div>
                                    </div>

                                    <hr>

                                    <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                            class="bi bi-arrow-right"></i></a>

                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>

            </div>

        </section>
    @endif

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact Us</h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="200">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>South Breeze Center, 9th Floor, House#5 Road#11, Block#G,</p>
                                <p> Banani, Dhaka-1213, Bangladesh</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="500">
                                <i class="bi bi-clock"></i>
                                <h3>Open Hours</h3>
                                <p>Monday - Friday</p>
                                <p>9:00AM - 05:00PM</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="300">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>09666 887722</p>
                                <p></p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="400">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>info@vtspab.org</p>
                            </div>
                        </div><!-- End Info Item -->


                    </div>

                </div>

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                          data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email"
                                       required="">
                            </div>

                            <div class="col-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                       required="">
                            </div>

                            <div class="col-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message"
                                          required=""></textarea>
                            </div>

                            <div class="col-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

</main>

<footer id="footer" class="footer">

    <div class="footer-newsletter">
        {{--        <div class="container">--}}
        {{--            <div class="row justify-content-center text-center">--}}
        {{--                <div class="col-lg-6">--}}
        {{--                    <h4>Join Our Newsletter</h4>--}}
        {{--                    <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>--}}
        {{--                    <form action="forms/newsletter.php" method="post" class="php-email-form">--}}
        {{--                        <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>--}}
        {{--                        <div class="loading">Loading</div>--}}
        {{--                        <div class="error-message"></div>--}}
        {{--                        <div class="sent-message">Your subscription request has been sent. Thank you!</div>--}}
        {{--                    </form>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="{{url('/')}}" class="d-flex align-items-center">
                    <img src="{{asset('assets/img/logo.png')}}" alt="">
                </a>
                <div class="footer-contact pt-3">
                    <p>South Breeze Center, 9th Floor, House#5 Road#11, Block#G,</p>
                    <p>Banani, Dhaka-1213, Bangladesh</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>09666 887722</span></p>
                    <p><strong>Email:</strong> <span>info@vtspab.org</span></p>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                </ul>
            </div>

            {{--            <div class="col-lg-2 col-md-3 footer-links">--}}
            {{--                <h4>Our Services</h4>--}}
            {{--                <ul>--}}
            {{--                    <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>--}}
            {{--                    <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>--}}
            {{--                    <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>--}}
            {{--                    <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>--}}
            {{--                </ul>--}}
            {{--            </div>--}}

            <div class="col-lg-5 col-md-12">
                <h4>Follow Us</h4>
                <p>All BTRC issued VTS License Holder companies under one common umbrella</p>
                <div class="social-links d-flex">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright {{\Carbon\Carbon::now()->format('Y')}}</span> <strong class="px-1 sitename">VTSPAB</strong>
            <span>All Rights Reserved</span></p>
        <div class="credits">
            Developed by <a href="https://vtspab.org/">Autonemo Limited</a>
        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: [
                    @foreach($events as $event)
                {
                    title: '{{ $event->title }}',
                    start: '{{ $event->start_date }}',
                    end: '{{ $event->end_date }}',
                    url: '{{ url('events/' . $event->id) }}'
                },
                @endforeach
            ]
        });
        calendar.render();
    });
</script>

</body>

</html>
