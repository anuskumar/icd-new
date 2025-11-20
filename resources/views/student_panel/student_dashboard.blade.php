@extends('admin_index')
@section('admin_content')

<style>
    .sidebar {
        position: relative !important;
        top: auto !important;
        bottom: auto !important;
        left: auto !important;
    }
</style>

<div class="page-wrapper">
    <div class="content">
        <!-- Welcome Message -->
        <div class="page-header">
            <div class="page-title">
                <h4>Welcome back, {{ $student ? $student->first_name . ' ' . $student->last_name : $user->name }}!</h4>
                <p class="text-muted">Here's an overview of your enrollments and account</p>
            </div>
        </div>

        <!-- Enrollment Status Tiles -->
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('admin_assets/assets/img/icons/dash1.svg') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="{{ $totalEnrollments }}">{{ $totalEnrollments }}</span></h5>
                        <h6>Total Enrollments</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash1">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('admin_assets/assets/img/icons/dash2.svg') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="{{ $pendingEnrollments }}">{{ $pendingEnrollments }}</span></h5>
                        <h6>Pending Enrollments</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash2">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('admin_assets/assets/img/icons/dash3.svg') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="{{ $underReviewEnrollments }}">{{ $underReviewEnrollments }}</span></h5>
                        <h6>Under Review</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash3">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('admin_assets/assets/img/icons/dash4.svg') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="{{ $verifiedEnrollments }}">{{ $verifiedEnrollments }}</span></h5>
                        <h6>Verified Enrollments</h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Enrollment Status Tiles -->
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count">
                    <div class="dash-counts">
                        <h4>{{ $completedEnrollments }}</h4>
                        <h5>Completed</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="check-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das1">
                    <div class="dash-counts">
                        <h4>{{ $rejectedEnrollments }}</h4>
                        <h5>Rejected</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="x-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das2">
                    <div class="dash-counts">
                        <h4>{{ $totalCertificates }}</h4>
                        <h5>Certificates</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file-text"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Enrollments Section -->
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Recent Enrollments</h4>
                        <a href="{{ route('student.enrollment.details') }}" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive dataview">
                            @if($recentEnrollments->count() > 0)
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>College</th>
                                            <th>Course</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentEnrollments as $enrollment)
                                            <tr>
                                                <td>{{ $enrollment->college->name ?? 'N/A' }}</td>
                                                <td>{{ $enrollment->course->name ?? 'N/A' }}</td>
                                                <td class="{{ $enrollment->status === 'completed' ? 'text-success' : ($enrollment->status === 'rejected' ? 'text-danger' : ($enrollment->status === 'verified' ? 'text-info' : 'text-primary')) }}">
                                                    {{ ucfirst($enrollment->status ?? 'Pending') }}
                                                </td>
                                                <td>{{ $enrollment->created_at->format('M d, Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="text-center py-4">
                                    <p class="text-muted">No enrollments yet. <a href="{{ route('home') }}">Browse courses</a> to get started!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
