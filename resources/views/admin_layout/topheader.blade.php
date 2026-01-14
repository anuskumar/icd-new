<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left active">
        <a href="index.html" class="logo logo-normal">
            <img src="{{ asset('admin_assets/assets/assets/img/logo.png') }}" alt="">
        </a>
        <a href="index.html" class="logo logo-white">
            <img src="{{ asset('admin_assets/assets/img/logo-white.png') }}" alt="">
        </a>
        <a href="index.html" class="logo-small">
            <img src="{{ asset('admin_assets/assets/img/logo-small.png') }}" alt="">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
            <i data-feather="chevrons-left" class="feather-16"></i>
        </a>
    </div>
    <!-- /Logo -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <!-- Search -->
        <li class="nav-item nav-searchinputs">
            <div class="top-nav-search">

                <a href="javascript:void(0);" class="responsive-search">
                    <i class="fa fa-search"></i>
                </a>
                <form action="#">
                    <div class="searchinputs">
                        <input type="text" placeholder="Search">
                        <div class="search-addon">
                            <span><i data-feather="search" class="feather-14"></i></span>
                        </div>
                    </div>
                    <!-- <a class="btn"  id="searchdiv"><img src="{{ asset('admin_assets/assets/img/icons/search.svg') }}" alt="img"></a> -->
                </form>
            </div>
        </li>
        <!-- /Search -->

        <!-- Flag -->
        <li class="nav-item dropdown has-arrow flag-nav nav-item-box">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                <i data-feather="globe"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="javascript:void(0);" class="dropdown-item active">
                    <img src="{{ asset('admin_assets/assets/img/flags/us.png') }}" alt="" height="16">
                    English
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{ asset('admin_assets/assets/img/flags/fr.png') }}" alt="" height="16"> French
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{ asset('admin_assets/assets/img/flags/es.png') }}" alt="" height="16">
                    Spanish
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{ asset('admin_assets/assets/img/flags/de.png') }}" alt="" height="16"> German
                </a>
            </div>
        </li>
        <!-- /Flag -->

        <li class="nav-item nav-item-box">
            <a href="javascript:void(0);" id="btnFullscreen">
                <i data-feather="maximize"></i>
            </a>
        </li>
        <li class="nav-item nav-item-box">
            <a href="https://mail.google.com/mail/u/0/#inbox" target="_blank">
                <i data-feather="mail"></i>
                <span class="badge rounded-pill"></span>
            </a>
        </li>
        <!-- Notifications -->
        <li class="nav-item dropdown nav-item-box">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i data-feather="bell"></i><span class="badge rounded-pill">{{ auth()->user()->unreadNotifications->count() }}</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="{{ route('notifications.markAllAsRead') }}" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        @forelse(auth()->user()->unreadNotifications as $notification)
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                        <span class="avatar flex-shrink-0">
                                            <img alt=""
                                                src="{{ asset('admin_assets/assets/img/profiles/avatar-02.jpg') }}">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">
                                                <span class="noti-title">{{ $notification->data['message'] }}</span>
                                            </p>
                                            <p class="noti-time"><span class="notification-time">{{ $notification->created_at->diffForHumans() }}</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @empty
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">
                                                <span class="noti-title">No notifications found</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="{{ route('notifications.index') }}">View all Notifications</a>
                </div>
            </div>
        </li>
        <!-- /Notifications -->

        <li class="nav-item nav-item-box">
            <a href="#"><i data-feather="settings"></i></a>
        </li>
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-info">
                    <span class="user-letter">
                        <img src="{{ asset('admin_assets/assets/img/profiles/avator1.jpg') }}" alt=""
                            class="img-fluid">
                    </span>
                    {{-- <span class="user-detail">
                        <span class="user-name">John Smilga</span>
                        <span class="user-role">Super Admin</span>
                    </span> --}}
                    @if (Auth::check())
                        <span class="user-detail">
                            <span class="user-name">{{ Auth::user()->name }}</span>
                            <span class="user-role">{{ Auth::user()->user_type }}</span>
                        </span>
                    @endif
                </span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <span class="user-img">
                            <img src="{{ asset('admin_assets/assets/img/profiles/avator1.jpg') }}" alt="">
                            <span class="status online"></span>
                        </span>
                        <div class="profilesets">
                            <h6>{{ Auth::user()->name }}</h6>
                            <h5>{{ Auth::user()->user_type == 'S' ? 'Student' : 'Admin' }}</h5>
                        </div>
                    </div>
                    @php
                        use App\Models\Student;

                        $user_id = Auth::id();
                        $student_id = Student::where('user_id', $user_id)->pluck('id')->first();
                    @endphp
                    <hr class="m-0">
                    @if (Auth::user()->user_type == 'S')
                        <a class="dropdown-item" href="{{ route('admin_panel.students', $student_id) }}">
                            <i class="me-2" data-feather="user"></i> My Profile
                        </a>
                    @else

                    @endif
                    <a class="dropdown-item" href="#">
                        <i class="me-2" data-feather="settings"></i>Settings
                    </a>
                    <hr class="m-0">
                    <a class="dropdown-item logout pb-0" href="{{ route('logout') }}">
                        <img src="{{ asset('admin_assets/assets/img/icons/log-out.svg') }}" class="me-2"
                            alt="img">Logout
                    </a>
                </div>
            </div>

        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.html">My Profile</a>
            <a class="dropdown-item" href="generalsettings.html">Settings</a>
            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>
<!-- Header -->
