@include('layouts.header')
<main class="main">
    <section id="team" class="team section">
        <div class="container" style="margin-top: 100px">
            <div class="row sidebar-layout">
                <!-- Sidebar -->
                <div class="col-lg-3 col-md-12">
                    <div class="team-sidebar sticky-top">
                        @foreach($members as $type => $member)
                            <div class="team-sidebar-item aos-init aos-animate" data-aos="fade-up" onclick="showTeamMembers('{{$type}}')" id="sidebar-{{$type}}">
                                <p>{{$type}}s</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Content Area -->
                <div class="col-lg-9 col-md-12 team-content">
                    @foreach($members as $type => $member)
                        <div class="team-type-section" id="section-{{$type}}">
                            <div class="row gy-4">
                                @foreach($member as $m)
                                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
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
                                                <span>{{$m->designation}}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <style>
        .sidebar-layout {
            margin-top: 2rem;
        }

        .team-sidebar {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            top: 100px; /* Adjust based on your navbar height */
        }

        .team-sidebar-item {
            cursor: pointer;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .team-sidebar-item:hover {
            background: rgba(0, 146, 71, 0.1);
        }

        .team-sidebar-item.active {
            background: #009247;
            color: #fff;
        }

        .team-sidebar-item p {
            margin: 0;
            font-weight: 500;
        }

        .team-content {
            min-height: 500px;
        }

        .team-type-section {
            display: none;
        }

        .team-type-section.active {
            display: block;
        }

        @media (max-width: 991px) {
            .team-sidebar.sticky-top {
                position: relative !important;
                top: 0;
                margin-bottom: 30px;
            }

            .team-sidebar {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                padding: 15px;
            }

            .team-sidebar-item {
                margin-bottom: 0;
                flex: 1;
                min-width: 150px;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .sidebar-layout {
                margin-top: 1rem;
            }

            .team-sidebar-item {
                min-width: calc(50% - 10px);
                padding: 10px;
            }
        }
    </style>

    <script>
        function showTeamMembers(type) {
            document.querySelectorAll('.team-type-section').forEach(section => {
                section.classList.remove('active');
            });

            document.getElementById('section-' + type).classList.add('active');

            document.querySelectorAll('.team-sidebar-item').forEach(item => {
                item.classList.remove('active');
            });
            document.getElementById('sidebar-' + type).classList.add('active');
        }

        window.addEventListener('DOMContentLoaded', (event) => {
            const firstType = document.querySelector('.team-sidebar-item');
            if (firstType) {
                const type = firstType.querySelector('p').textContent.trim().slice(0, -1);
                showTeamMembers(type);
            }
        });
    </script>
</main>@include('layouts.footer')
