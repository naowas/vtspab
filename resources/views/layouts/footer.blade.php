<footer id="footer" class="footer">

    <div class="footer-newsletter" style="padding: 0px">
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
                    <li><i class="bi bi-chevron-right"></i> <a href="{{url('/')}}">Home</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{url('btrc-licensed-companies')}}">BTRC Licensed Companies</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="https://www.mygov.bd/services/info?id=BDGS-1532935465">Online Application to BTRC</a></li>
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
{{--                    <a href=""><i class="bi bi-twitter-x"></i></a>--}}
                    <a href="https://www.facebook.com/vtspab"><i class="bi bi-facebook"></i></a>
{{--                    <a href=""><i class="bi bi-instagram"></i></a>--}}
{{--                    <a href=""><i class="bi bi-linkedin"></i></a>--}}
                </div>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright {{\Carbon\Carbon::now()->format('Y')}}</span> <strong class="px-1 sitename">VTSPAB</strong>
            <span>All Rights Reserved</span></p>
        <p>Website Hosted By: BDCOM Online Ltd.</p>
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
<script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
