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

<body class="blog-details-page">

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
                {{--                <li><a href="#team">Notice</a></li>--}}
                <li><a href="#recent-posts">Blog</a></li>
                <a class="btn-getstarted flex-md-shrink-0" href="{{url('member')}}">Login/Register</a>
            </ul>
        </nav>
    </div>
</header>
<main class="main">

    <!-- Page Title -->
    <div class="page-title" style="margin-top: 20px">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">

{{--                        <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>--}}

                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container">

                        <article class="article">
                            <div class="post-img">
                                <img src="{{Storage::url($post->banner)}}" alt="" class="img-fluid">
                            </div>

                            <h2 class="title">{{$post->title}}</h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{$post->author->name}}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="{{\Carbon\Carbon::parse($post->published_at)->format('D M Y')}}">{{\Carbon\Carbon::parse($post->published_at)->format('D M Y')}}</time></a></li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                               {!! $post->content !!}

                            </div><!-- End post content -->

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">{{$post->category->name}}</a></li>
                                </ul>

{{--                                <i class="bi bi-tags"></i>--}}
{{--                                <ul class="tags">--}}
{{--                                    <li><a href="#">Creative</a></li>--}}
{{--                                    <li><a href="#">Tips</a></li>--}}
{{--                                    <li><a href="#">Marketing</a></li>--}}
{{--                                </ul>--}}
                            </div><!-- End meta bottom -->

                        </article>

                    </div>
                </section><!-- /Blog Details Section -->

            </div>

        </div>
    </div>

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


</body>

</html>
