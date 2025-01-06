@include('layouts.header')

<style>
    .portfolio-content {
        position: relative;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .image-wrapper {
        width: 100%;
        height: 200px; /* Fixed height for consistency */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        background: #fff;
    }

    .image-wrapper img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain; /* Maintains aspect ratio */
        width: auto;
        height: auto;
    }

    .portfolio-info {
        padding: 1rem;
        text-align: center;
        background: #f8f9fa;
        border-top: 1px solid #eee;
    }

    .portfolio-info p {
        margin: 0;
        font-weight: 500;
    }

    .details-link {
        position: absolute;
        right: 1rem;
        bottom: 1rem;
        color: #333;
        font-size: 1.2rem;
        transition: color 0.3s ease;
    }

    .details-link:hover {
        color: #007bff;
    }

    .cost-circle {
        width: 40px;
        height: 40px;
        /*border-radius: 50%;*/
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        /*border: 2px solid;*/
        box-sizing: border-box; /* Include padding and border in the element's total width and height */
    }

    .arrow-diagram {
        max-width: 400px;
        margin: 2rem auto;
    }

    .cost-item {
        margin-bottom: 2rem;
    }

    .circle-a {
        border-color: #00a67d;
        color: #00a67d;
    }

    .circle-b {
        border-color: #9cb70b;
        color: #9cb70b;
    }

    .circle-c {
        border-color: #0099b0;
        color: #0099b0;
    }

    .circle-d {
        border-color: #00a67d;
        color: #00a67d;
    }

    .circle-e {
        border-color: #0099b0;
        color: #0099b0;
    }

    .circle-f {
        border-color: #0099b0;
        color: #0099b0;
    }

    .process-title {
        color: #00a651;
        font-weight: bold;
    }

    .step-container {
        position: relative;
        margin-bottom: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        height: 300px; /* Ensure all containers are the same height */
    }

    .step-number {
        font-size: 1.1rem;
        font-weight: bold;
        color: #00a651;
    }

    .step-description {
        font-size: 0.9rem;
        color: #333;
        text-align: center;
        height: 80px; /* Fixed height for consistency */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .parallelogram {
        background-color: #00a651;
        width: 100%;
        height: 120px; /* Fixed height for consistency */
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        overflow: hidden;
        text-align: center;
    }

    .parallelogram-content {
        color: white;
        font-weight: 500;
        font-size: 1.1rem;
        line-height: 1.3;
    }

    .arrow {
        position: absolute;
        right: -15px;
        top: 50%;
        transform: translateY(-50%);
        width: 30px;
        height: 2px;
        background-color: #666;
        z-index: 1;
    }

    .arrow:after {
        content: '';
        position: absolute;
        right: -5px;
        top: -4px;
        width: 10px;
        height: 10px;
        border-top: 2px solid #666;
        border-right: 2px solid #666;
        transform: rotate(45deg);
    }

    @media (max-width: 768px) {
        .step-container {
            margin-bottom: 40px;
            text-align: center;
            height: auto; /* Adjust height for mobile */
        }

        .arrow {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .arrow-diagram {
            max-width: 50%;
            margin: 1rem auto;
        }
    }


    .benefits-container {
        position: relative;
        /*min-height: 100vh;*/
        padding: 4rem 0;
    }

    .curved-image {
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
        width: 50%;
        clip-path: circle(75% at 75% 50%);
        z-index: 1;
    }

    .curved-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .content-section {
        position: relative;
        z-index: 2;
    }

    .main-title {
        font-size: 4rem;
        font-weight: 800;
        line-height: 1;
        margin-bottom: 3rem;
    }

    .companies-text {
        font-size: 2.5rem;
        font-weight: 800;
    }

    .benefit-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 2rem;
        padding-right: 2rem;
    }

    .benefit-number {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: bold;
        margin-right: 1rem;
        flex-shrink: 0;
    }

    .number-1 {
        background-color: #20B2AA;
    }

    .number-2 {
        background-color: #9ACD32;
    }

    .number-3 {
        background-color: #48D1CC;
    }

    .number-4 {
        background-color: #4682B4;
    }

    .benefit-content h3 {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .benefit-content p {
        font-size: 0.9rem;
        line-height: 1.4;
        margin-bottom: 0;
    }

    @media (max-width: 768px) {
        .curved-image {
            width: 100%;
            opacity: 0.3;
        }

        .main-title {
            font-size: 3rem;
        }

        .companies-text {
            font-size: 2rem;
        }
    }


</style>
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
                        <a href="{{url('member/register')}}" class="btn-get-started">Become a Member <i
                                class="bi bi-arrow-right"></i></a>

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
                        <h3 style="font-weight: 500">A PROPOSED TRADE BODY FOR VTS LICENSE HOLDER COMPANIES</h3>
                        <p>
                            There are till date 50 BTRC approved & license holder VTS companies in Bangladesh.
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
        <div class="container section-title" data-aos="fade-up">
            <p>BENEFITS FOR COMPANIES<br></p>
        </div><!-- End Section Title -->
        <!-- Section Title -->
        <div class="benefits-container">
            <div class="curved-image">
                <img src="{{asset('assets/img/car.jpg')}}" alt="Road view">
            </div>

            <div class="container content-section">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="benefit-item">
                            <div class="benefit-number number-1">1</div>
                            <div class="benefit-content">
                                <h3>Grey Market Reporting</h3>
                                <p>There are lot of brands in the market who are selling the same device without having
                                    any license from BTRC. They are not giving revenue share to BTRC and is making the
                                    field uneven for legal license holders</p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-number number-2">2</div>
                            <div class="benefit-content">
                                <h3>Policy Advocacy</h3>
                                <p>From this platform we can work on advocating for policies that can ensure better
                                    returns for BTRC & the companies. Also we shall suggest on ensuring smooth
                                    documentation process</p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-number number-3">3</div>
                            <div class="benefit-content">
                                <h3>Collective Voice</h3>
                                <p>A lot of time it is important to act as a collective voice in order to protect
                                    national interest. This platform will help us gain better visibility and importance
                                    in stakeholder engagement</p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-number number-4">4</div>
                            <div class="benefit-content">
                                <h3>Resource Sharing & Market Development</h3>
                                <p>Through this platform new license holding companies will get to know about various
                                    processes related to legal framework from other license holder companies. As well
                                    as, we shall work together to raise awareness about the service and explore
                                    market</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /Values Section -->

    <section id="" class="values section">
        <div class="container section-title" data-aos="fade-up">
            <p>BENEFITS FOR BTRC<br></p>
        </div><!-- End Section Title -->
        <!-- Section Title -->
        <div class="benefits-container">
            <div class="curved-image">
                <img src="{{asset('assets/img/Benifites.png')}}" alt="" style="height: 100% !important; width: 100% !important;">
            </div>

            <div class="container content-section">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="benefit-item">
                            <div class="benefit-number number-1">1</div>
                            <div class="benefit-content">
                                <h3>Increase In Revenue</h3>
                                <p>If the grey market operates are held accountable and brought in the legal framework,
                                    then obviously there would be increase in revenue for BTRC. As well as if the
                                    policies
                                    are in favor of doing business then the current license holding companies can even
                                    scale and give increased revenue share to BTRC</p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-number number-2">2</div>
                            <div class="benefit-content">
                                <h3>Collective Body</h3>
                                <p>VTSPAB will act as a collective body. So in any need, if BTRC needs to sit and
                                    discuss
                                    with the VTS operators, the association will facilitate and help in every manner. As
                                    well as if there are any new policies in place which current license holders need to
                                    follow then VTSPAB can aware them accordingly </p></div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-number number-3">3</div>
                            <div class="benefit-content">
                                <h3>Information & Accessibility</h3>
                                <p>For any requirement related to VTS industry, the association will provide BTRC any
                                    data and engage with BTRC in ensuring accessibility with any of its member.
                                    Informally, the association will work closely to ensure that BTRC faces less process
                                    teaching for the operators </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section><!-- /Values Section -->


    <!-- Features Section -->
    <section id="features" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>From Setup to Support </h2>
            <p>STANDARD OPERATION PROCESS- Vehicle Tracking Service (VTS)<br></p>
        </div><!-- End Section Title -->

        <div class="container-fluid">
            <div class="row justify-content-center mt-5">
                <div class="col-md-2 col-sm-6 step-container">
                    <div class="step-number">Step 1</div>
                    <div class="step-description">
                        VTS operation starts with license acquisition from BTRC and clearing all necessary paperwork
                    </div>
                    <div class="parallelogram">
                        <div class="parallelogram-content">
                            LICENSE<br>ACQUISITION
                        </div>
                    </div>

                </div>

                <div class="col-md-2 col-sm-6 step-container">
                    <div class="step-number">Step 2</div>
                    <div class="step-description">
                        Secondly devices are brought in stock as per necessary business requirement
                    </div>
                    <div class="parallelogram">
                        <div class="parallelogram-content">
                            DEVICE<br>ACQUISITION
                        </div>
                    </div>

                </div>

                <div class="col-md-2 col-sm-6 step-container">
                    <div class="step-number">Step 3</div>
                    <div class="step-description">
                        Sales & Marketing team brings in lead from the market. Customer information are stored properly
                        for future track back
                    </div>
                    <div class="parallelogram">
                        <div class="parallelogram-content">
                            SALES &<br>MARKETING<br>LEAD
                        </div>
                    </div>

                </div>

                <div class="col-md-2 col-sm-6 step-container">
                    <div class="step-number">Step 4</div>
                    <div class="step-description">
                        Operations team takes the data from the marketing team and sends qualified team for device
                        installation
                    </div>
                    <div class="parallelogram">
                        <div class="parallelogram-content">
                            INSTALLATION<br>& ONBOARDING
                        </div>
                    </div>

                </div>

                <div class="col-md-2 col-sm-6 step-container">
                    <div class="step-number">Step 5</div>
                    <div class="step-description">
                        After installation & handover, company arranges a full pledged customer support to cater to any
                        queries
                    </div>
                    <div class="parallelogram">
                        <div class="parallelogram-content">
                            CUSTOMER<br>SUPPORT &<br>SERVICE
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section><!-- /Features Section -->

    <section id="alt-features" class="alt-features section">
        <div class="container">
            <div class="container section-title" data-aos="fade-up">
                <p>MONTHLY SUBSCRIPTION COST HEADS<br></p>
            </div>
            <!-- End Section Title -->

            <div class="row align-items-center">
                <!-- Left Column -->
                <div class="col-md-4">
                    <div class="cost-item d-flex align-items-start gap-3">
                        <div class="cost-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 2H4C2.9 2 2 2.9 2 4v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 18H4V4h16v16z"/>
                                <circle cx="6" cy="18" r="2"/>
                                <circle cx="18" cy="18" r="2"/>
                                <path d="M6 16h12V6H6v10zm2-8h8v6H8V8z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="fw-bold">Server Cost</h5>
                            <p class="small">All VTS providers need to maintain high performance servers which creates a
                                huge cost overhead each month</p>
                        </div>
                    </div>

                    <div class="cost-item d-flex align-items-start gap-3">
                        <div class="cost-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 11.5l-5-6.36V2h-3v3.08L7 2 2 7l6.45 6.47a4.49 4.49 0 1 0 6.1 0L21 11.5zM8.5 16.5a2.5 2.5 0 1 1 5 0 2.5 2.5 0 0 1-5 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="fw-bold">Maps Layer Cost</h5>
                            <p class="small">All VTS data needs to be plotted on map layer. Since we need to use third
                                party maps, there is a cost overhead on this</p>
                        </div>
                    </div>
                </div>

                <!-- Center Column with Arrow Diagram -->
                <div class="col-md-4 text-center">
                    <img src="{{asset('assets/img/rec.png')}}" alt="Circular Arrow Diagram"
                         class="arrow-diagram img-fluid">
                </div>

                <!-- Right Column -->
                <div class="col-md-4">
                    <div class="cost-item d-flex align-items-start gap-3">
                        <div class="cost-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-1.85 0-3.55-.63-4.91-1.69l12.22-12.22C19.37 8.45 20 10.15 20 12c0 5.52-4.48 10-8 10z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="fw-bold">Internet Cost (SIM)</h5>
                            <p class="small">For each connection, separate internet cost is required. It is recurring
                                cost each month</p>
                        </div>
                    </div>

                    <div class="cost-item d-flex align-items-start gap-3">
                        <div class="cost-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 2H4C2.9 2 2 2.9 2 4v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-4 18H8v-2h8v2zm0-4H8v-2h8v2zm0-4H8V8h8v4z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="fw-bold">Software Development & Extension</h5>
                            <p class="small">The software needs regular health check and periodic upgrades are required
                                from consumer ends. Which creates a significant overhead</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Row -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="cost-item d-flex align-items-start gap-3">
                        <div class="cost-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M11.99 4.22L12 2h-2v2.22C7.62 4.63 6 6.54 6 9h12c0-2.46-1.62-4.37-4-4.78zm9.5 13.28l-1.43 1.43c-1.22-1.22-2.86-2.33-4.98-3.11-.3-1.55-1.17-2.98-2.55-4.09-.13-.11-.25-.22-.38-.32V9H9v1.4c-.13.11-.26.22-.38.33-1.38 1.11-2.25 2.54-2.55 4.09-2.12.78-3.76 1.89-4.98 3.11L2.5 17.5c.84-.84 1.95-1.53 3.31-2.08.3-1.55 1.17-2.98 2.55-4.09.11-.1.23-.2.35-.29v-.5h2v.5c.12.09.24.19.35.29 1.38 1.11 2.25 2.54 2.55 4.09 1.36.55 2.47 1.24 3.31 2.08z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="fw-bold">Installation & Repair</h5>
                            <p class="small">Each connection requires periodic maintenance. For that a regular team
                                needs to be maintained.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="cost-item d-flex align-items-start gap-3">
                        <div class="cost-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="fw-bold">Company Overhead</h5>
                            <p class="small">To run the company there is a cost head which directly contributes to staff
                                salary and opex cost.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="members" class="portfolio section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>30 Licensed Companies Together as One</h2>
            <p>Leading the Telematics Industry of Bangladesh for the last 15 years</p>
        </div>

        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach($companies as $company)
                        <div class="col-lg-3 col-md-6 col-6 portfolio-item isotope-item filter-app">
                            <div class="portfolio-content h-100">
                                <div class="image-wrapper">
                                    <img src="{{Storage::url($company->logo)}}" class="img-fluid"
                                         alt="{{$company->name}}">
                                </div>
                                <div class="portfolio-info">
                                    <p>{{$company->name}}</p>
                                    <a target="_blank" href="{{$company->website}}" title="More Details"
                                       class="details-link">
                                        <i class="bi bi-link-45deg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

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
                <h2>Recent News</h2>
                <p>Recent Activities and Industry News </p>
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

                                    <a href="{{route('blog.show', $post->id)}}" class="readmore stretched-link"><span>Read More</span><i
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
                    <form action="{{route('contact-mail')}}" method="post" class="php-email-form" data-aos="fade-up"
                          data-aos-delay="200">
                        @csrf
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


@include('layouts.footer')
