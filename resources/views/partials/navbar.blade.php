<div class="navbar-wrapper">
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: #087a29; border-bottom: 3px solid #F9B233;" role="navigation">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}" style="padding: 0.2rem 1.5rem 0.2rem 0;">
                <img src="{{ asset('inspinia/img/landing/logo.png') }}" alt="ETEEAP Logo" style="height: 100px; max-height: 16vw; width: auto; border-radius: 1000px; box-shadow: 0 6px 24px rgba(8,122,41,0.18); background: #fff; padding: 0.4rem 1.5rem; border: 3px solid #F9B233;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mx-auto mb-2 mb-md-0 w-100 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link page-scroll text-white fw-bold @if(request()->is('/')) active-nav @endif" href="{{ url('/') }}" style="font-size: 1rem;">
                            <strong>Home</strong>
                            @if(request()->is('/'))<span class="nav-indicator"></span>@endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll text-white fw-bold @if(request()->routeIs('mission.vision')) active-nav @endif" href="{{ route('mission.vision') }}" style="font-size: 1rem;">
                            <strong>Mission & Vision</strong>
                            @if(request()->routeIs('mission.vision'))<span class="nav-indicator"></span>@endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll text-white fw-bold @if(request()->routeIs('admission.requirements')) active-nav @endif" href="{{ route('admission.requirements') }}" style="font-size: 1.2rem;">
                            <strong>Admission Requirements</strong>
                            @if(request()->routeIs('admission.requirements'))<span class="nav-indicator"></span>@endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll text-white fw-bold @if(request()->routeIs('qualification')) active-nav @endif" href="{{ route('qualification') }}" style="font-size: 1rem;">
                            <strong>Qualification</strong>
                            @if(request()->routeIs('qualification'))<span class="nav-indicator"></span>@endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll text-white fw-bold @if(request()->routeIs('procedures')) active-nav @endif" href="{{ route('procedures') }}" style="font-size: 1rem;">
                            <strong>Procedures</strong>
                            @if(request()->routeIs('procedures'))<span class="nav-indicator"></span>@endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll text-white fw-bold @if(request()->routeIs('courses.offered')) active-nav @endif" href="{{ route('courses.offered') }}" style="font-size: 1rem;">
                            <strong>Courses Offered</strong>
                            @if(request()->routeIs('courses.offered'))<span class="nav-indicator"></span>@endif
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    @guest
                        <li class="nav-item">
                            <a class="btn btn-outline-success fw-bold d-flex align-items-center justify-content-center px-4 py-2 me-2" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-2"></i> Login
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-outline-warning fw-bold d-flex align-items-center justify-content-center px-4 py-2 ms-2" href="{{ route('register') }}">
                                    <i class="fas fa-user-plus me-2"></i> Register
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false" style="white-space: nowrap;">
                                <i class="fas fa-user me-2"></i> 
                                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.index', Auth::user()->id) }}">
                                        <i class="fas fa-file-alt me-2"></i> Application Form
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="fas fa-user-edit me-2"></i> Edit Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
<style>
    .navbar-wrapper {
        padding-top: 0.0rem;
        padding-bottom: 0.5rem;
    }
    .navbar {
        padding-top: 0.7rem;
        padding-bottom: 0.7rem;
    }
    .navbar-nav.mx-auto {
        gap: 0.7rem;
    }
    .navbar-nav .nav-item {
        margin: 0 0.25rem;
    }
    .nav-link {
        padding: 0.6rem 1.3rem;
        font-size: 1.08rem !important;
        border-radius: 8px;
        transition: background 0.2s, color 0.2s;
    }
    .nav-link strong {
        font-weight: 700;
    }
    .nav-link.active-nav {
        color: #F9B233 !important;
        background: rgba(255,255,255,0.08);
    }
    .nav-indicator {
        display: block;
        width: 100%;
        height: 2.5px;
        background: #F9B233;
        border-radius: 2px;
        position: absolute;
        left: 0;
        bottom: 3px;
        content: '';
    }
    .navbar-nav.ms-auto .nav-link {
        margin-left: 0.5rem;
        margin-right: 0.5rem;
    }
    @media (max-width: 991.98px) {
        .navbar-nav.mx-auto {
            gap: 0.2rem;
        }
        .nav-link {
            padding: 0.5rem 0.7rem;
            font-size: 1rem !important;
        }
    }
    @media (max-width: 767.98px) {
        .navbar-nav {
            text-align: center;
        }
        .navbar-nav .nav-item {
            margin-bottom: 0.5rem;
        }
        .navbar-nav.ms-auto {
            margin-top: 1rem;
        }
        .navbar-nav.mx-auto {
            gap: 0.1rem;
        }
    }
    /* Make dropdown menu scrollable and responsive */
    .dropdown-menu {
        max-height: 250px;
        overflow-y: auto;
        min-width: 200px;
    }
    @media (max-width: 575.98px) {
        .dropdown-menu {
            max-height: 180px;
            font-size: 0.98rem;
        }
    }
</style>
