@extends('admin_index')
@section('admin_content')

<script>
    // Hide loader as soon as possible
    (function() {
        function hideLoader() {
            var loader = document.getElementById('global-loader');
            if (loader) {
                loader.style.display = 'none';
            }
        }
        if (document.readyState === 'complete') {
            hideLoader();
        } else {
            window.addEventListener('load', hideLoader);
            setTimeout(hideLoader, 1000); // Fallback after 1 second
        }
    })();
</script>

<div class="page-wrapper">
    <div class="content">
        <!-- Welcome Message -->
        <div class="page-header">
            <div class="page-title">
                <h4>Admin Dashboard</h4>
                <p class="text-muted">Welcome back! Here's an overview of your system</p>
            </div>
        </div>

        <!-- Stats Cards Row 1 -->
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('admin_assets/assets/img/icons/dash1.svg') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="{{ $totalStudents }}">{{ $totalStudents }}</span></h5>
                        <h6>Total Students</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash1">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('admin_assets/assets/img/icons/dash2.svg') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="{{ $totalEnrollments }}">{{ $totalEnrollments }}</span></h5>
                        <h6>Total Enrollments</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash2">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('admin_assets/assets/img/icons/dash3.svg') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="{{ $pendingEnrollments }}">{{ $pendingEnrollments }}</span></h5>
                        <h6>Pending Enrollments</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash3">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('admin_assets/assets/img/icons/dash4.svg') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="{{ $pendingDocumentApprovals }}">{{ $pendingDocumentApprovals }}</span></h5>
                        <h6>Pending Approvals</h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards Row 2 -->
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count">
                    <div class="dash-counts">
                        <h4>{{ $totalColleges }}</h4>
                        <h5>Colleges</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="building"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das1">
                    <div class="dash-counts">
                        <h4>{{ $totalCourses }}</h4>
                        <h5>Courses</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="book"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das2">
                    <div class="dash-counts">
                        <h4>{{ $totalExams }}</h4>
                        <h5>Exams</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file-text"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das3">
                    <div class="dash-counts">
                        <h4>{{ $totalUsers }}</h4>
                        <h5>Users</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="users"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enrollment Status Summary -->
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0">Enrollment Status Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="text-center p-3 border rounded">
                                    <h3 class="text-primary mb-1">{{ $verifiedEnrollments }}</h3>
                                    <p class="mb-0">Verified</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="text-center p-3 border rounded">
                                    <h3 class="text-success mb-1">{{ $completedEnrollments }}</h3>
                                    <p class="mb-0">Completed</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="text-center p-3 border rounded">
                                    <h3 class="text-warning mb-1">{{ $pendingEnrollments }}</h3>
                                    <p class="mb-0">Pending</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="text-center p-3 border rounded">
                                    <h3 class="text-danger mb-1">{{ $rejectedEnrollments }}</h3>
                                    <p class="mb-0">Rejected</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Recent Activity Row -->
        <div class="row">
            <!-- Enrollment Trends Chart -->
            <div class="col-lg-7 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Enrollment Trends (Last 6 Months)</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="enrollmentChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="col-lg-5 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Recent Activity</h5>
                    </div>
                    <div class="card-body">
                        <div class="activity-feed">
                            @if($recentActivity->count() > 0)
                                @foreach($recentActivity as $activity)
                                    <div class="activity-item mb-3 pb-3 border-bottom">
                                        <div class="d-flex align-items-start">
                                            <div class="activity-icon me-3">
                                                <i data-feather="{{ $activity['icon'] }}" class="text-primary"></i>
                                            </div>
                                            <div class="activity-content flex-grow-1">
                                                <p class="mb-1">{{ $activity['message'] }}</p>
                                                <small class="text-muted">{{ $activity['date']->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted text-center py-4">No recent activity</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Enrollments and Quick Actions Row -->
        <div class="row">
            <!-- Recent Enrollments -->
            <div class="col-lg-8 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Recent Enrollments</h5>
                        <a href="{{ route('enrollments.details') }}" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <div class="card-body">
                        @if($recentEnrollments->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Student</th>
                                            <th>College</th>
                                            <th>Course</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentEnrollments->take(5) as $enrollment)
                                            <tr>
                                                <td>{{ $enrollment->user->name ?? 'N/A' }}</td>
                                                <td>{{ \Illuminate\Support\Str::limit($enrollment->college->name ?? 'N/A', 20) }}</td>
                                                <td>{{ \Illuminate\Support\Str::limit($enrollment->course->name ?? 'N/A', 20) }}</td>
                                                <td class="{{ $enrollment->status === 'completed' ? 'text-success' : ($enrollment->status === 'rejected' ? 'text-danger' : ($enrollment->status === 'verified' ? 'text-info' : 'text-primary')) }}">
                                                    {{ ucfirst($enrollment->status ?? 'Pending') }}
                                                </td>
                                                <td>{{ $enrollment->created_at->format('M d, Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted text-center py-4">No enrollments yet</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="col-lg-4 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('admin_panel.studentlist') }}" class="btn btn-outline-primary">
                                <i data-feather="users" class="me-2"></i>Manage Students
                            </a>
                            <a href="{{ route('enrollments.details') }}" class="btn btn-outline-success">
                                <i data-feather="file-text" class="me-2"></i>View Enrollments
                            </a>
                            <a href="{{ route('admin.documents') }}" class="btn btn-outline-info">
                                <i data-feather="file" class="me-2"></i>Student Documents
                            </a>
                            <a href="{{ route('admin_panel.collegelist') }}" class="btn btn-outline-warning">
                                <i data-feather="building" class="me-2"></i>Manage Colleges
                            </a>
                            <a href="{{ route('admin_panel.courselist') }}" class="btn btn-outline-secondary">
                                <i data-feather="book" class="me-2"></i>Manage Courses
                            </a>
                            <a href="{{ route('admin_panel.exam-accepted') }}" class="btn btn-outline-dark">
                                <i data-feather="clipboard" class="me-2"></i>Manage Exams
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('contentjs')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
    // Ensure loader is hidden
    window.addEventListener('load', function() {
        setTimeout(function() {
            var loader = document.getElementById('global-loader');
            if (loader) {
                loader.style.display = 'none';
            }
        }, 500);
    });

    $(document).ready(function() {
        // Hide loader immediately when jQuery is ready
        setTimeout(function() {
            $('#global-loader').fadeOut('slow');
        }, 100);

        try {
            // Initialize counters animation
            $('.counters').each(function() {
                var $this = $(this);
                var countTo = $this.attr('data-count');
                if (countTo) {
                    $({ countNum: parseInt($this.text()) || 0 }).animate({
                        countNum: parseInt(countTo)
                    }, {
                        duration: 2000,
                        easing: 'linear',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                        }
                    });
                }
            });

            // Initialize Feather Icons
            if (typeof feather !== 'undefined') {
                feather.replace();
            }

            // Enrollment Trends Chart - Wait for Chart.js to load
            function initChart() {
                try {
                    var enrollmentTrendsData = @json($enrollmentTrends ?? []);
                    var ctx = document.getElementById('enrollmentChart');
                    
                    if (!ctx) {
                        console.error('Chart canvas element not found');
                        return;
                    }
                    
                    if (typeof Chart === 'undefined') {
                        console.error('Chart.js library not loaded');
                        // Retry after a short delay
                        setTimeout(initChart, 500);
                        return;
                    }
                    
                    if (!enrollmentTrendsData || enrollmentTrendsData.length === 0) {
                        console.warn('No enrollment trends data available');
                        ctx.parentElement.innerHTML = '<p class="text-muted text-center py-4">No enrollment data available for chart</p>';
                        return;
                    }
                    
                    // Destroy existing chart if it exists
                    if (window.enrollmentChartInstance) {
                        window.enrollmentChartInstance.destroy();
                    }
                    
                    window.enrollmentChartInstance = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: enrollmentTrendsData.map(function(item) { return item.month; }),
                            datasets: [{
                                label: 'Enrollments',
                                data: enrollmentTrendsData.map(function(item) { return item.count; }),
                                borderColor: 'rgb(75, 192, 192)',
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                tension: 0.1,
                                fill: true,
                                pointRadius: 4,
                                pointHoverRadius: 6
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'top'
                                },
                                tooltip: {
                                    enabled: true
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 1,
                                        precision: 0
                                    }
                                }
                            }
                        }
                    });
                } catch (chartError) {
                    console.error('Chart initialization error:', chartError);
                    var ctx = document.getElementById('enrollmentChart');
                    if (ctx && ctx.parentElement) {
                        ctx.parentElement.innerHTML = '<p class="text-danger text-center py-4">Error loading chart. Please refresh the page.</p>';
                    }
                }
            }
            
            // Initialize chart after a short delay to ensure Chart.js is loaded
            setTimeout(initChart, 300);
            
        } catch (error) {
            console.error('Dashboard initialization error:', error);
        }
    });
</script>
@endsection
