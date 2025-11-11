@extends('index')
@section('content')
    <section class="project-detail">
        <div class="container">
            <!-- Lower Content -->
            <div class="lower-content">
                <div class="row">
                    <div class="text-column col-lg-12 col-md-12 col-sm-12">
                        <h2>{{ $college->name }}</h2>

                        <div class="upper-box">
                            <div class="single-item-carousel owl-carousel owl-theme ">
                                <figure class="image" style="height: unset!important;">
                                    <img style="height: 300px!important;border-radius:5px;"
                                        src="{{ asset('storage/app/public/' . $college->banner_image) }}" alt="">
                                </figure>
                            </div>
                        </div>

                        <div class="inner-column">
                            <div class="course-meta2 review style2 clearfix mb-30">
                                <ul class="left">
                                    <li>
                                        <div class="author">
                                            <div class="thumb">
                                                <img src="{{ asset('storage/app/public/' . $college->image) }}" alt="image">
                                            </div>

                                            <div class="text">
                                                <a href="single-courses-2.html">{{ $college->name }}</a>
                                                <p>{{ $college->city->name }}, {{ $college->state->name }},
                                                    {{ $college->country->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="right">
                                    <li class="price">
                                        <img src="{{ asset('assets/img/bg/star.png') }}" alt="image">
                                        <a href="#" class="btn ss-btn mr-15"
                                            style="border-radius: 26px; background: #0E4389; border:1px solid white; font-size:14px;"
                                            data-animation="fadeInLeft" data-delay=".4s">Brochure <i
                                                class="fal fa-long-arrow-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-2">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#college"> College</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#courses"> Courses </a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#admission"> Admission </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="college">
                            {!! $college->content !!}
                        </div>
                        <div class="tab-pane" id="courses">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Courses</th>
                                                            <th>Duration</th>
                                                            <th>Tuition Fees</th>
                                                            <th>Eligibility</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($college->courses as $course)
                                                            <tr>
                                                                <td>{{ $course->name }}</td>
                                                                <td>{{ $course->duration }}</td>
                                                                <td>{{ $course->fee }}</td>
                                                                <td>Graduation: {{ $college->graduation_marks }}
                                                                    <br>
                                                                    Exams:
                                                                    @foreach ($course->exams as $exam)
                                                                        {{ $exam->name }}
                                                                    @endforeach
                                                                </td>
                                                                <td>
                                                                    @guest <button type="button" class="btn btn-primary"
                                                                            data-toggle="modal" data-target="#registerModal">
                                                                            Enroll
                                                                        </button>
                                                                    @else
                                                                        <form id="enroll-form-{{ $course->id }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="college_id"
                                                                                value="{{ $college->id }}">
                                                                            <input type="hidden" name="course_id"
                                                                                value="{{ $course->id }}">
                                                                            <button type="button"
                                                                                class="btn btn-primary enroll-button"
                                                                                onclick="submitEnrollment({{ $course->id }})">
                                                                                Enroll
                                                                            </button>
                                                                    </form>@endguest

                                                                </td>
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
                            <p> {!! $college->admission !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    //success message for enrollment
    <div id="success-modal" class="modal" style="display: none;">
        <div class="modal-content"
            style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 50%; max-width: 600px; background: #0E4389; color: white; padding: 40px; text-align: center; border-radius: 12px; box-shadow: 0px 4px 10px rgba(0,0,0,0.3);">
            <h2 style="margin-bottom: 20px; color:white; font-size: 24px;">Thank You</h2>
            <p id="success-message" style="font-size: 18px; line-height: 1.5;"></p>
            <button onclick="closeModal()"
                style="padding: 10px 20px; font-size: 16px; background: white; color: #0E4389; border: none; border-radius: 8px; cursor: pointer; margin-top: 20px;">OK</button>
        </div>
    </div>

    <script>
        function submitEnrollment(courseId) {
            const form = document.getElementById(`enroll-form-${courseId}`);
            const formData = new FormData(form);

            fetch('{{ route('enroll') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        document.getElementById('success-message').textContent = data.message;
                        document.getElementById('success-modal').style.display = 'block';
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function closeModal() {
            document.getElementById('success-modal').style.display = 'none';
        }
    </script>
@endsection
