<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Main</h6>
                    <ul>
                        <li class="active">
                            @if(Auth::user()->user_type == 'A')
                            <a href="{{ route('admin_panel.dashboard') }}"><i data-feather="grid"></i><span>Dashboard</span></a>
                            @else
                            <a href="{{ route('student_panel.student_dashboard') }}"><i data-feather="grid"></i><span>Dashboard</span></a>

                            @endif
                        </li>

                        <li>
                            <a href="{{ route('home') }}"><i data-feather="home"></i><span>Home</span></a>
                        </li>

                        <li>
                            @php
                                use App\Models\Student;

                                $user = Auth::user();
                                $user_id = $user->id;
                                $student_id =
                                    $user->user_type === 'S' ? Student::where('user_id', $user_id)->value('id') : null;

                                $studentLinks = [
                                    [
                                        'route' => 'admin_panel.students',
                                        'icon' => 'user',
                                        'text' => 'My Profile',
                                    ],
                                    [
                                        'route' => 'student.certificates',
                                        'icon' => 'book-open',
                                        'text' => 'Certificates',
                                    ],
                                    [
                                        'route' => 'student.enrollment.details',
                                        'icon' => 'file-text',
                                        'text' => 'Enrollments',
                                    ],
                                ];
                            @endphp

                            @if ($user->user_type === 'S' && $student_id)
                                @foreach ($studentLinks as $link)
                                    <a class="dropdown-item" href="{{ route($link['route'], $student_id) }}">
                                        <i class="me-2"
                                            data-feather="{{ $link['icon'] }}"></i><span>{{ $link['text'] }}</span>
                                    </a>
                                @endforeach
                            @endif
                        </li>



                    </ul>
                </li>


                <li class="submenu-open">
                    @if (Auth::user()->user_type != 'S')
                        <h6 class="submenu-hdr">College Masters</h6>
                    @endif
                    <ul>
                        @if (Auth::user()->user_type === 'A')
                            <!-- Admin -->
                            {{-- <li><a href="{{ route('admin_panel.category') }}"><i
                                        data-feather="plus-square"></i><span>Category</span></a></li> --}}
                            {{-- <li><a href="{{ route('admin_panel.subcategory') }}"><i
                                        data-feather="plus-square"></i><span>Sub
                                        Category</span></a></li> --}}
                            <li><a href="{{ route('admin_panel.exam-accepted') }}"><i
                                        data-feather="plus-square"></i><span>Exam Accepted</span></a></li>
                            <li><a href="{{ route('admin_panel.courselist') }}"><i
                                        data-feather="plus-square"></i><span>Courses</span></a></li>
                            <li><a href="{{ route('admin_panel.collegelist') }}"><i
                                        data-feather="plus-square"></i><span>Colleges</span></a></li>
                            <li><a href="{{ route('admin_panel.studentlist') }}"><i
                                        data-feather="plus-square"></i><span>Students</span></a></li>
                            <li><a href="{{ route('enrollments.details') }}"><i
                                        data-feather="plus-square"></i><span>Enrollments</span></a></li>
                            <li>
                                <a href="{{ route('admin.documents') }}">
                                    <i data-feather="plus-square"></i><span>Student Documents</span>
                                </a>
                            </li>

                            <li><a href="{{ route('admin_panel.userlist') }}"><i
                                        data-feather="plus-square"></i><span>User
                                        Management</span></a></li>
                            {{-- elseif(Auth::user()->user_type === 'S') <!-- Student -->
                            <li><a href="{{ route('student_panel.student_dashboard') }}"><i data-feather="plus-square"></i><span>Student Dashboard</span></a></li> --}}
                        @elseif(Auth::user()->user_type === 'staff' || Auth::user()->user_type === 'sub_agent')
                            <!-- Staff and Sub Agent -->
                            <li><a href="{{ route('admin_panel.studentlist') }}"><i
                                        data-feather="plus-square"></i><span>Students</span></a></li>
                        @endif
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
