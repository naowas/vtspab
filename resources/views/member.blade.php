@include('layouts.header')
<main class="main">
    <section id="team" class="team section">
        <div class="container" style="margin-top: 100px">
            <div class="row sidebar-layout">
                <!-- Sidebar -->
                <div class="col-lg-3 col-md-12">
                    <div class="team-sidebar sticky-top">
                        <div class="mobile-team-select">
                            <select class="form-select d-lg-none" onchange="showTeamMembers(this.value)">
                                @foreach($members as $type => $member)
                                    <option value="{{$type}}">{{$type}}s</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="desktop-sidebar d-none d-lg-block">
                            @foreach($members as $type => $member)
                                <div class="team-sidebar-item aos-init aos-animate" data-aos="fade-up" onclick="showTeamMembers('{{$type}}')" id="sidebar-{{$type}}">
                                    <p>{{$type}}s</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="col-lg-9 col-md-12 team-content">
                    @foreach($members as $type => $member)
                        <div class="team-type-section" id="section-{{$type}}">
                            <div class="row gy-4">
                                @foreach($member as $m)
                                    <div class="col-6 col-lg-4 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
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
            top: 100px;
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

        .mobile-team-select select {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ddd;
            background-color: #fff;
            color: #009247;
            font-weight: 500;
            cursor: pointer;
        }

        .mobile-team-select select:focus {
            border-color: #009247;
            box-shadow: 0 0 0 0.2rem rgba(0, 146, 71, 0.25);
            outline: none;
        }

        .team-member {
            width: 100%;
        }

        @media (max-width: 991px) {
            .team-sidebar.sticky-top {
                position: relative !important;
                top: 0;
                margin-bottom: 30px;
                background: transparent;
                padding: 0;
            }

            .team-sidebar {
                box-shadow: none;
            }
        }

        @media (max-width: 768px) {
            .sidebar-layout {
                margin-top: 1rem;
            }

            .team-member {
                margin-bottom: 20px;
            }

            .member-img {
                height: 200px;
                overflow: hidden;
            }

            .member-img img {
                height: 100%;
                object-fit: cover;
            }

            .member-info {
                padding: 15px 10px;
            }

            .member-info h4 {
                font-size: 16px;
                margin-bottom: 5px;
            }

            .member-info span {
                font-size: 14px;
            }
        }

        /* Improve social icons touch targets on mobile */
        @media (max-width: 576px) {
            .social {
                padding: 10px 0;
            }

            .social a {
                padding: 8px;
                margin: 0 5px;
            }
        }
    </style>

    <script>
        function showTeamMembers(type) {
            // Update sections
            document.querySelectorAll('.team-type-section').forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById('section-' + type).classList.add('active');

            // Update sidebar items
            document.querySelectorAll('.team-sidebar-item').forEach(item => {
                item.classList.remove('active');
            });
            document.getElementById('sidebar-' + type)?.classList.add('active');

            // Update mobile select
            const mobileSelect = document.querySelector('.mobile-team-select select');
            if (mobileSelect) {
                mobileSelect.value = type;
            }
        }

        window.addEventListener('DOMContentLoaded', (event) => {
            const firstType = document.querySelector('.team-sidebar-item');
            if (firstType) {
                const type = firstType.querySelector('p').textContent.trim().slice(0, -1);
                showTeamMembers(type);
            }
        });
    </script>
</main>
@include('layouts.footer')
