@extends('index')
@section('content')

<section class="project-detail">
    <div class="container">
        <!-- Lower Content -->
        <div class="lower-content">
            <div class="row">
                <div class="text-column col-lg-12 col-md-12 col-sm-12">
                    <h2>{{ $course->name }}</h2>
                    <div class="inner-column">
                        <div class="course-meta2 review style2 clearfix mb-30">
                            <ul class="left">
                                <li>
                                    <div class="author">
                                        <div class="text">
                                            <a href="single-courses-2.html">{{ $course->name }}</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#college">Overview</a></li>
                    <li class="nav-item"><a class="nav-link"  data-bs-toggle="tab" href="#courses"> Colleges </a></li>
                    <li class="nav-item"><a class="nav-link"  data-bs-toggle="tab" href="#admission"> Admission </a> </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="college">
                        {!! $course->content !!}
                    </div>
                    <div class="tab-pane" id="courses">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>College Name</th>
                                                        <th>Image</th>
                                                        <th>Institution Type</th>
                                                        <th>Intake Date</th>
                                                        <th>Graduation Marks</th>
                                                        <th>Brochure</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($course->colleges as $college)
                                                        <tr>
                                                            <td>{{ $college->name }}</td>
                                                            <td>
                                                                <img src="{{ asset('storage/'.$college->image) }}" alt="College Image" width="50">
                                                            </td>
                                                            <td>{{ $college->institutionType->name ?? 'N/A' }}</td>
                                                            <td>{{ $college->intake_date }}</td>
                                                            <td>{{ $college->graduation_marks }}</td>
                                                            <td><a href="{{ asset('storage/'.$college->brochure) }}" target="_blank">Download Brochure</a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="admission">
                        <p>{!! $course->admission !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
