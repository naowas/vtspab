@include('layouts.header')

<main class="main">

    <section id="team" class="team section">

        @foreach($members as $type => $member)


        <!-- Section Title -->
        <div class="container section-title aos-init aos-animate text-left" data-aos="fade-up" style="margin-top: 100px" >
            <p>{{$type}}s</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                @foreach($member as $m)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member">
                            <div class="member-img">
                                @if($m->getFirstMediaUrl('founding-member-images') !== '')
                                <img src="{{$m->getFirstMediaUrl('founding-member-images')}}" class="img-fluid" alt="">
                                @else
                                <img src="{{asset('assets/img/dft.png')}}" class="img-fluid" alt="">
                                @endif
                                <div class="social">
                                    <a href="{{$m->twitter}}"><i class="bi bi-twitter-x"></i></a>
                                    <a href="{{$m->facebook}}"><i class="bi bi-facebook"></i></a>
                                    <a href="{{$m->instagram}}"><i class="bi bi-instagram"></i></a>
                                    <a href="{{$m->linkedin}}"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{$m->name}}</h4>
{{--                                <span>{{$m->designation}}, </span> <span>{{$m->company}}</span>--}}
                                <span>{{$m->designation}} </span>
{{--                                <p></p>--}}
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach
            </div>

        </div>


        @endforeach
    </section>
</main>

@include('layouts.footer')
