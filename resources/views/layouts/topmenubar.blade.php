@php
    $topMbbsCountries = \App\Models\Country::select('countries.id', 'countries.name')
        ->join('colleges', 'colleges.country_id', '=', 'countries.id')
        ->join('college_course_details', 'college_course_details.college_id', '=', 'colleges.id')
        ->join('courses', 'courses.id', '=', 'college_course_details.course_id')
        ->where('courses.name', '=', 'MBBS (Bachelor of Medicine, Bachelor of Surgery)')
        ->groupBy('countries.id', 'countries.name')
        ->orderByRaw('COUNT(college_course_details.college_id) DESC')
        ->take(5)
        ->get();

    $mbbsColleges = \App\Models\College::with('country')
        ->whereHas('courses', function ($query) {
            $query->where('name', 'like', '%MBBS%');
        })
        ->get();

    $otherColleges = $mbbsColleges->filter(function ($college) use ($topMbbsCountries) {
        return !$topMbbsCountries->contains('id', $college->country_id);
    });

    $collegesByCountry = \App\Models\College::with('country')
        ->whereHas('courses', function ($query) {
            $query->where('name', 'like', '%MBBS%');
        })
        ->get()
        ->groupBy(fn($college) => $college->country->name);

    $courses = \App\Models\Course::where('name', '!=', 'MBBS (Bachelor of Medicine, Bachelor of Surgery)')->get();

    // Fetch colleges offering each course by country
    $collegesByCourseByCountry = [];
    foreach ($courses as $course) {
        $collegesByCourseByCountry[$course->name] = \App\Models\College::with('country')
            ->whereHas('courses', function ($query) use ($course) {
                $query->where('courses.id', $course->id);
            })
            ->get()
            ->groupBy(fn($college) => $college->country->name);
    }

@endphp



<style>
    /* Top navbar refresh */
    .header-top {
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }

    .menu-area {
        background: #ffffff;
        border-bottom: 1px solid #e5e7eb;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06);
    }

    .second-menu {
        padding: 10px 0;
    }

    .header-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        flex: 0 0 auto;
    }
    .header-user {
        white-space: nowrap;
    }

    .header-top .header-social span {
        color: #334155;
        font-size: 13px;
        letter-spacing: 0.3px;
        font-weight: 600;
    }

    .header-top .header-cta a img {
        filter: saturate(0.95);
        transition: transform 0.2s ease;
    }

    .header-top .header-cta a:hover img {
        transform: translateY(-1px);
    }

    .main-menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
        position: relative;
    }

    .main-menu ul li {
        position: relative;
        display: inline-block;
        margin-right: 6px;
        border: none;
    }

    .main-menu ul li a {
        text-decoration: none;
        color: #1f2937;
        padding: 10px 12px;
        display: block;
        font-family: 'Arial', sans-serif;
        font-weight: 600;
        font-size: 13.5px;
        letter-spacing: 0.2px;
        border-radius: 6px;
        transition: background-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
    }

    .main-menu ul li:hover>a {
        background-color: #f5f7fb;
        color: #0f4c81;
        transform: translateY(-1px);
    }

    .mega-menu .dropdown-content {
        display: none;
        position: absolute;
        top: calc(100% + 6px);
        left: 0;
        background-color: #fff;
        box-shadow: 0 16px 40px rgba(15, 23, 42, 0.12);
        z-index: 1000;
        width: 650px;
        max-height: auto;
        flex-direction: row;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 16px 14px;
    }

    .mega-menu .dropdown-content a {
        font-size: 12px;
    }

    .mega-menu .dropdown-content .course-list a:hover {
        text-decoration: underline #007bff;
        color: #007bff;
    }


    .mega-menu:hover .dropdown-content {
        display: flex;
    }

    .mega-menu .column-left {
        width: 40%;
    }

    .mega-menu .column-right {
        background: #f8fafc;
        width: 100%;
        padding-left: 12px;
        border-left: 1px solid #e5e7eb;
    }

    /* Country links */
    .mega-menu .column-left ul {
        list-style: none;
        padding: 0;
        margin: 0;
        border: none;
    }

    .mega-menu .column-left ul li {
        margin-bottom: 5px;
        margin-left: 10px;
        border: none;
    }

    .mega-menu .column-right ul li {
        border: none;
    }

    .mega-menu .column-left ul li a {
        color: #1f2937;
        text-decoration: none;
        transition: color 0.3s ease;
        padding: 8px 10px;
    }

    .mega-menu .column-right ul li a {
        padding: 8px 10px;
        border: none;
    }

    .mega-menu .column-left ul li a:hover {
        color: #0f4c81;
    }

    /* Course lists initially hidden */
    .mega-menu .column-right .course-list {
        display: none;
    }

    .mega-menu .column-right .course-list.active {
        display: block;
    }

    .mega-menu .column-right .course-list ul {
        list-style: none;
        padding: 0;
        margin: 0;
        border: none;
    }

    .mega-menu .column-right .course-list ul li a {
        color: #1f2937;
        text-decoration: none;
        border: none;
    }

    .mega-menu .column-right .course-list ul li a:hover {
        color: #0f4c81;
    }

    .second-header-btn .btn {
        background: #0f4c81;
        color: #ffffff;
        border-radius: 999px;
        padding: 9px 16px;
        font-weight: 600;
        font-size: 11.5px;
        letter-spacing: 0.4px;
        border: none;
        box-shadow: 0 10px 20px rgba(15, 76, 129, 0.2);
    }

    .second-header-btn .btn:hover {
        background: #0c3e68;
        color: #ffffff;
        transform: translateY(-1px);
    }

    .header-user .dropdown-toggle {
        color: #0f172a;
        font-weight: 600;
        padding: 8px 12px;
        border-radius: 999px;
        border: 1px solid #e5e7eb;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #ffffff;
    }

    .header-user .dropdown-toggle:hover {
        color: #0f4c81;
        border-color: #cbd5f5;
        background: #f8fafc;
    }

    .header-user .dropdown-menu {
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.12);
        padding: 8px 0;
    }

    .header-user .dropdown-menu li a {
        padding: 8px 18px;
        display: block;
        color: #1f2937;
    }

    .header-user .dropdown-menu li a:hover {
        background: #f8fafc;
        color: #0f4c81;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .mega-menu .dropdown-content {
            width: 100%;
            position: static;
            box-shadow: none;
            padding: 5px 0;
            display: block;
            flex-direction: column;
            gap: 3px;
        }

        .mega-menu .column-left,
        .mega-menu .column-right {
            width: 100%;
        }

        .mega-menu .column-left ul li {
            margin-bottom: 5px;
        }

        .mega-menu .column-left ul li a,
        .mega-menu .column-right .course-list ul li a {
            font-size: 14px;
        }
    }

    /* Add these styles */
    .mobile-menu-toggle {
        cursor: pointer;
        padding: 3px;
        position: absolute;
        right: 15px;
        top: 8px;
    }

    .mobile-menu-toggle span {
        display: block;
        width: 25px;
        height: 3px;
        background: #333;
        margin: 5px 0;
        transition: 0.3s;
    }

    .mobile-nav {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        z-index: 1000;
        background: #fff;
        padding: 15px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .mobile-nav.active {
        display: block;
    }

    .mobile-nav ul {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }

    .mobile-nav li {
        position: relative;
        margin-bottom: 10px;
    }

    .mobile-nav li a {
        padding: 10px 0;
        display: block;
        color: #333;
        text-decoration: none;
    }

    .mobile-nav .submenu-toggle {
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        padding: 0 15px;
        cursor: pointer;
    }

    .mobile-nav .submenu {
        display: none;
        padding-left: 15px;
    }

    .mobile-nav .submenu.active {
        display: block;
    }

    .mobile-nav .has-submenu.open>a {
        color: #007bff;
    }

    .social-icon {
        width: 32px;
        height: 32px;
        object-fit: cover;
    }

    .youtube {
        width: 39px;
    }

    /* Hide desktop menu on mobile */
    @media (max-width: 768px) {
        .main-menu {
            display: none;
        }
    }
</style>


<!-- header -->
<header class="header-area header-three">
    <div class="header-top second-header d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-8 col-md-8 d-none d-lg-block ">
                    <div class="header-social">
                        <span>
                            Talk to Admission Team : 0471 4061700
                        </span>
                        <!--  /social media icon redux -->
                    </div>
                </div>

                <div class="col-lg-4 col-md-2 text-right">
                    <div class="header-cta">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <div class="header-social d-flex justify-content-end">
                                   <a href="https://www.facebook.com/allindia.nursesassociation.9" target="_blank" > <img src="{{ asset('assets/img/icon/facebook.png') }}" alt="img"
                                        class="social-icon"></a>

                                    <a href="https://www.instagram.com/icd_india/" target="_blank" >
                                    <img src="{{ asset('assets/img/icon/instagram.png') }}" alt="img"
                                        class="social-icon"></a>
                                        <a href="https://www.youtube.com/@ICDOverseasEducation" target="_blank" >
                                    <img src="{{ asset('assets/img/icon/youtube.png') }}"
                                        alt="img"class="social-icon youtube"></a>
                                    <!--  /social media icon redux -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="header-sticky" class="menu-area">
        <div class="container">
            <div class="second-menu">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="logo">
                            <a href="{{ route('home') }}"><img style="max-width:100%; height:auto;"
                                    src="{{ asset('assets/img/logo/logo.webp') }}" alt="logo"></a>
                        </div>
                    </div>

                    <div class="col">
                        <div class="main-menu text-left text-xl-left">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="has-sub mega-menu">
                                        <a href="#">MBBS</a>
                                        <div class="dropdown-content">
                                            <div class="column-left">
                                                <ul>
                                                    @foreach ($topMbbsCountries as $country)
                                                        <li class="has-sub">
                                                            <a href="#"
                                                                data-target="{{ strtolower(str_replace(' ', '-', $country->name)) }}-courses">
                                                                STUDY IN
                                                                {{ $country->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    <li class="has-sub">
                                                        <a href="#" data-target="more-countries">MORE UNIVERSITIES
                                                            <i class="fa fa-arrow-right"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="column-right">
                                                @foreach ($collegesByCountry as $countryName => $colleges)
                                                    @php
                                                        $limitedColleges = $colleges->take(5);
                                                        $hasMoreColleges = $colleges->count() > 5;
                                                    @endphp

                                                    <div class="course-list"
                                                        id="{{ strtolower(str_replace(' ', '-', $countryName)) }}-courses">
                                                        <ul>
                                                            @foreach ($limitedColleges as $college)
                                                                <li>
                                                                    <a
                                                                        href="{{ route('college.show', ['id' => base64_encode($college->id), 'name' => Str::slug($college->name)]) }}">
                                                                        MBBS in {{ $college->name }}
                                                                    </a>
                                                                </li>
                                                            @endforeach

                                                            @if ($hasMoreColleges)
                                                                <li>
                                                                    <a
                                                                        href="{{ route('listing.colleges', ['countryId' =>base64_encode(@$colleges->first()->country->id)]) }}">
                                                                        More Colleges in {{ $countryName }}

                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                    <li class="has-sub mega-menu">
                                        <a href="#">Courses</a>
                                        <div class="dropdown-content">
                                            <div class="column-left">
                                                <ul>
                                                    @foreach ($courses as $course)
                                                        <li class="has-sub">
                                                            <a href="#"
                                                                data-target="{{ strtolower(str_replace(' ', '-', $course->name)) }}-countries">
                                                                {{ $course->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="column-right">
                                                @foreach ($collegesByCourseByCountry as $courseName => $collegesByCountry)
                                                    <div class="course-list"
                                                        id="{{ strtolower(str_replace(' ', '-', $courseName)) }}-countries">
                                                        @foreach ($collegesByCountry as $countryName => $colleges)
                                                            <ul>
                                                                @foreach ($colleges as $college)
                                                                    <li>
                                                                        <a
                                                                            href="{{ route('listing.colleges', ['countryId' => base64_encode($college->country_id)]) }}">
                                                                            TOP COLLEGES IN
                                                                            {{ $countryName }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                    <li style="margin: unset;"><a href="{{ route('contact.show') }}">Contact Us</a></li>
                                    <li style="margin: unset;"><a href="{{ route('blog.index') }}">Blogs</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-auto d-none d-lg-flex header-actions">
                        <div class="second-header-btn">
                            <a href="#" class="btn tst">LANGUAGE TEST SERIES</a>
                        </div>
                        <div class="second-header-btn">
                            <a href="#" class="btn neet">NEET COACHING</a>
                        </div>
                    </div>

                    <div class="col-auto d-none d-lg-block header-user">
                        @auth
                            <div class="dropdown">
                                <a class="dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                    @if (Auth::user()->user_type == 'A')
                                        <li style="padding-left:30px; "><a
                                                href="{{ route('admin_panel.dashboard') }}">Dashboard</a></li>
                                        <li style="padding-left:30px;"><a href="{{ route('logout') }}">Logout</a></li>
                                    @endif
                                    @if (Auth::user()->user_type == 'S')
                                        <li style="padding-left:30px; "><a
                                                href="{{ route('student_panel.student_dashboard') }}">Dashboard</a></li>
                                        <li style="padding-left:30px;"><a href="{{ route('logout') }}">Logout</a></li>
                                    @endif
                                    @if (Auth::user()->user_type == 'staff')
                                        <li style="padding-left:30px; "><a
                                                href="{{ route('admin_panel.dashboard') }}">Dashboard</a></li>
                                        <li style="padding-left:30px;"><a href="{{ route('logout') }}">Logout</a></li>
                                    @endif
                                    @if (Auth::user()->user_type == 'sub_agent')
                                        <li style="padding-left:30px; "><a
                                                href="{{ route('admin_panel.dashboard') }}">Dashboard</a></li>
                                        <li style="padding-left:30px;"><a href="{{ route('logout') }}">Logout</a></li>
                                    @endif
                                </ul>
                            </div>
                        @else
                            <a data-toggle="modal" data-target="#registerModal">
                                Sign Up
                            </a>
                            |
                            <a href="{{ route('admin_panel.showLoginForm') }}">
                                Login
                            </a>
                        @endauth
                    </div>

                    <div class="col-12">
                        <div class="mobile-menu-toggle d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="mobile-nav">
                        <ul>
                            <!-- MBBS Section -->
                            <li class="has-submenu">
                                <a href="javascript:void(0)">MBBS <span class="submenu-toggle">›</span></a>
                                <ul class="submenu">
                                    @foreach ($topMbbsCountries as $country)
                                        <li>
                                            <a href="{{ route('listing.colleges', ['countryId' => $country->id]) }}">
                                                Study in {{ $country->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <!-- Courses Section -->
                            <li class="has-submenu">
                                <a href="javascript:void(0)">Courses <span class="submenu-toggle">›</span></a>
                                <ul class="submenu">
                                    @foreach ($courses as $course)
                                        <li class="has-submenu">
                                            <a href="javascript:void(0)">{{ $course->name }} <span
                                                    class="submenu-toggle">›</span></a>
                                            <ul class="submenu">
                                                @foreach ($collegesByCourseByCountry[$course->name] ?? [] as $countryName => $colleges)
                                                    <li>
                                                        <a
                                                            href="{{ route('listing.colleges', ['countryId' => base64_encode($colleges[0]->country_id)]) }}">
                                                            TOP COLLEGES IN {{ $countryName }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ route('contact.show') }}">Contact Us</a></li>
                            <li><a href="{{ route('blog.index') }}">Blog</a></li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
<!-- Mobile Navigation -->
<style>
    .phone-link {
      position: relative;
      margin-left: 15px;
      font-size: 22px;
      text-decoration: none;
      color: #333;
    }
    .phone-link span {
        position: absolute;
    top: -1px;
    right: 32px;
    /* background: red; */
    color: #fff;
    /* border-radius: 50%; */
    font-size: 12px;

    }
    </style>
<!-- header-end -->
<div class="sidenav">
    <a href="https://wa.me/919400306111" target="_blank"><i class="fab fa-whatsapp"></i></i></a>
    {{-- <a href="#" onclick="return false;"><i class="fa fa-calendar"></i></a> --}}
    <a href="mailto:icdgroupkera@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a>
    <!-- Landline -->
    <a href="tel:04714061700" class="phone-link" title="Phone 1">
        <i class="fa fa-phone"></i><span>1</span>
      </a>

      <!-- Phone 2 -->
      <a href="tel:04844061700" class="phone-link" title="Phone 2">
        <i class="fa fa-phone"></i><span>2</span>
      </a>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // User Dropdown Toggle
        var dropdownToggle = document.getElementById('userDropdown');
        var dropdownMenu = document.querySelector('.dropdown-menu');

        if (dropdownToggle && dropdownMenu) {
            dropdownToggle.addEventListener('click', function(event) {
                event.stopPropagation(); // Prevents the click from closing immediately
                dropdownMenu.classList.toggle('show');
            });

            window.addEventListener('click', function(event) {
                if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        }

        // Mega Menu Hover & Click for MBBS and Courses
        const countryLinks = document.querySelectorAll('.mega-menu .column-left ul li a');
        const courseLists = document.querySelectorAll('.mega-menu .column-right .course-list');

        if (courseLists.length > 0) {
            courseLists[0].classList.add('active');
        }

        countryLinks.forEach(link => {
            const targetId = link.getAttribute('data-target');

            link.addEventListener('mouseover', function() {
                showCourseList(targetId);
            });
        });

        function showCourseList(targetId) {
            courseLists.forEach(list => {
                list.classList.toggle('active', list.id === targetId);
            });
        }

        // Mobile Menu Toggle
        const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        const mobileNav = document.querySelector('.mobile-nav');

        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                mobileNav.classList.toggle('active');
            });
        }

        // Mobile Submenu Toggle
        document.querySelectorAll('.has-submenu > a').forEach(item => {
            item.addEventListener('click', function(e) {
                const submenu = this.nextElementSibling; // Get the submenu

                if (submenu && submenu.classList.contains('submenu')) {
                    // Prevent default only if submenu exists
                    e.preventDefault();
                    submenu.classList.toggle('active');
                    item.parentElement.classList.toggle('open');
                }
            });
        });

        //Allow redirection for final links
        document.querySelectorAll('.submenu a').forEach(link => {
            link.addEventListener('click', function(e) {
                // Ensure it's a final link (without submenu)
                if (!this.nextElementSibling || !this.nextElementSibling.classList.contains(
                        'submenu')) {
                    window.location.href = this.getAttribute('href');
                }
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!mobileNav.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                mobileNav.classList.remove('active');
            }
        });
    });
</script>
