<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('images/faces/face1.jpg') }}" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                    <span class="text-secondary text-small">Administrator</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Hero</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-anchor menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('change-hero-image') }}">Change Image</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('hero-content-page') }}">Contents</a>
                    </li>
                </ul>
            </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('seo-and-digital-marketing') }}"">
                <span class="menu-title">Services</span>
                <i class="mdi mdi-google-earth menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
