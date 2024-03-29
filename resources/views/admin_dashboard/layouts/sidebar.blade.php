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
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('cms') }}">
                <span class="menu-title">CMS</span>
                <i class="mdi mdi-comment-question-outline menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('view-mails') }}">
                <span class="menu-title">Mails</span>
                <i class="mdi mdi-email-open menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Blogs</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-blogger menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('blog-list') }}">Blog List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('create-blog') }}">Add New Blog</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('botdata-list') }}">
                <span class="menu-title">Task Manager</span>
                <i class="mdi mdi-alarm-check menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('get-subscribers') }}">
                <span class="menu-title">Subscribers</span>
                <i class="mdi mdi-human-greeting menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('service-master') }}">
                <span class="menu-title">Service Master</span>
                <i class="mdi mdi-briefcase menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('quotes') }}">
                <span class="menu-title">Quote Master</span>
                <i class="mdi mdi-format-quote-close menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('get-callconnect') }}">
                <span class="menu-title">Instant Call Connect</span>
                <i class="mdi mdi-phone-classic menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('settings') }}">
                <span class="menu-title">Settings</span>
                <i class="mdi mdi-account-settings menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
