<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="{{ asset('images/profile_small.jpg') }}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="text-muted text-xs block">{{ Auth::user()->name }} <b class="caret"></b></span>
                    </a>
                </div>
            </li>
            <li>
                <a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <ul class="nav">
                @if(Auth::user()->role == 2) 
                    <li><a href="{{ route('admin.applications') }}"><i class="fa fa-user"></i> List of Application Form</a></li>
                @elseif(Auth::user()->role == 3) 
                    <li><a href="{{ route('assessor.dashboard') }}"><i class="fa fa-user"></i> Assessor Dashboard</a></li>
                @elseif(Auth::user()->role == 4) 
                    <li><a href="{{ route('department.dashboard') }}"><i class="fa fa-user"></i> Department Coordinator Dashboard</a></li>
                @elseif(Auth::user()->role == 5) 
                    <li><a href="{{ route('college.dashboard') }}"><i class="fa fa-user"></i> College Coordinator Dashboard</a></li>
                @endif
            </ul>
            
                
            
            @if(Auth::user()->role == 2)
            <li>
                <a href="{{ route('admin.accepted.applicants') }}">
                    <i class="fa fa-users"></i> <span class="nav-label">Accepted Applicants</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.announcement.create') }}">
                    <i class="fa fa-bullhorn"></i> <span class="nav-label">Post Announcement</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.slider.index') }}">
                    <i class="fa fa-image"></i> <span class="nav-label">Manage Sliders</span>
                </a>
            </li>
                   
            <li>
                <a href="{{ route('admin.settings.index') }}">
                    <i class="fa fa-cogs"></i> <span class="nav-label">System Settings</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-users"></i> <span class="nav-label">Users</span>
                </a>
            </li>
        @endif
        
            
            
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
