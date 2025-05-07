<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md" role="navigation">
        <div class="container-fluid text-end">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('inspinia/img/landing/logo.png') }}" alt="ETEEAP Logo" style="height: 60px;">
            </a>
            
            
            <div class="navbar-header page-scroll">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                
                <ul class="nav navbar-nav mx-auto">
                    <li><a class="nav-link page-scroll" href="{{ url('/') }}">Home</a></li>
                    <li><a class="nav-link page-scroll" href="{{ route('mission.vision') }}">Mission & Vision</a></li>
                    <li><a class="nav-link page-scroll" href="{{ route('admission.requirements') }}">Admission Requirements</a></li>
                    <li><a class="nav-link page-scroll" href="{{ route('qualification') }}">Qualification</a></li>
                    <li><a class="nav-link page-scroll" href="{{ route('procedures') }}">Procedures</a></li>
                    <li><a class="nav-link page-scroll" href="{{ route('courses.offered') }}">Courses Offered</a></li>
                </ul>
                <ul class="nav navbar-nav ms-auto me-3">   
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                             
                            </a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.index', Auth::user()->id) }}" style="color: black;">
                                        <i class="fas fa-file-alt" style="color: black;"></i> Application Form
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}" style="color: black;">
                                        <i class="fas fa-user-edit" style="color: black;"></i> Edit Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" style="color: black;"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
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
