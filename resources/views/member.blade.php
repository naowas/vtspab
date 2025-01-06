@include('layouts.header')

<main class="main">

    <section id="team" class="team section">

        <!-- Section Title -->
        <div class="container section-title aos-init aos-animate text-left" data-aos="fade-up" style="margin-top: 100px">
            <p>{{Str::plural($type)}}</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                @foreach($members as $m)
                    <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member">
                            <div class="member-img">
                                @if($m->getFirstMediaUrl('founding-member-images') !== '')
                                    <img src="{{$m->getFirstMediaUrl('founding-member-images')}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{asset('assets/img/dft.png')}}" class="img-fluid" alt="">
                                @endif
                                <div class="social">
                                    <a href="{{$m->linkedin}}"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{$m->name}}</h4>
                                <span>{{$m->designation}} </span>
                                <span>{{$m->company}} </span>
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach
            </div>

        </div>
    </section>
</main>

@include('layouts.footer')

<style>
    @media (max-width: 768px) {
        .team .team-member .member-info h4 {
            font-size: 15px;
        }
        .team .team-member .member-info span {
            font-size: 12px;
        }
    }
</style>
