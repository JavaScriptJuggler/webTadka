<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="{{ route('landing') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            {{-- <img src="assets/img/logo.png" alt=""> --}}
            <h1>WebTadka<span>.</span></h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="{{ route('landing') }}">Home</a></li>
                <li><a class="nav-link scrollto"
                        href="{{ !Request::is('/') ? route('landing') . '#services' : '#services' }}">Services</a>
                </li>
                <li><a class="nav-link scrollto"
                        href="{{ !Request::is('/') ? route('landing') . '#testimonials' : '#testimonials' }}">Testmonials</a>
                </li>
                <li><a class="nav-link scrollto"
                        href="{{ !Request::is('/') ? route('landing') . '#portfolio' : '#portfolio' }}">Portfolio</a>
                </li>
                <li><a class="nav-link scrollto" href="{{ route('blogs') }}">Blogs</a></li>
                <li><a class="nav-link scrollto" href="#about">About Us</a></li>
                <li><a class="nav-link scrollto"
                        href="{{ !Request::is('/') ? route('landing') . '#contact' : '#contact' }}">Contact Us</a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle d-none"></i>
        </nav><!-- .navbar -->
        <a class="btn-getstarted scrollto" href="#javascript:;" data-toggle="modal" data-target="#exampleModal">Lets Talk</a>
    </div>
</header>
