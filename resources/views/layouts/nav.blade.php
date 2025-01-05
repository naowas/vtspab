<a href="{{url('/')}}" class="logo d-flex align-items-center me-auto">
    <!-- Uncomment the line below if you also wish to use an image logo -->
    <img src="{{asset('assets/img/logo.png')}}" alt="">
    <h1 class="sitename"></h1>
</a>

<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="{{url('/')}}#hero" class="active">Home<br></a></li>
        <li><a href="{{url('/')}}#about">Objectives</a></li>
        <li><a href="{{url('/')}}#values">Benefits</a></li>
        <li><a href="{{url('/')}}#members">Companies</a></li>
        <li><a href="{{route('member')}}">Members</a></li>
        <li><a href="{{url('/')}}#recent-posts">Activities</a></li>
        <li><a href="{{route('btrc-notice')}}">BTRC Notice</a></li>
        <a class="btn-getstarted flex-md-shrink-0" href="{{url('member/login')}}">Member Login</a>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
