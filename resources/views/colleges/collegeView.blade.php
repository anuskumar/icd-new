@extends('index')

@section('content')
    <style>
        .banner-image {
            object-fit: fill;
            height: 400px;
            width: 100%;
        }

        .tab-link {
            cursor: pointer;
            text-decoration: none;
        }

        .tab-content-section {
            scroll-margin-top: 80px;
            padding-top: 20px;
        }

        .nav-tabs {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: white;
            padding: 10px 0;
        }

        .nav-tabs .nav-link {
            font-size: 18px;
            margin-right: 15px;
            border: none;
        }

        #btn {
            padding: 10px 20px;
            font-size: 16px;
            height: 40px;
            width: 25vh;
            background: transparent;
            color: rgb(2, 118, 191);
            border: 1px solid rgb(2, 118, 191);
            border-radius: 8px;
            cursor: pointer;
        }

        #btn:hover {
            background-color: rgb(214, 242, 254);
        }

        .program-card {
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e0e0e0;
        }

        .program-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            border-color: #007bff;
        }

        .program-logo {
            position: relative;
            top: -75px;
            background: rgb(214, 242, 254);
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        #aboutBox {
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            padding: 20px;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        #aboutText {
            max-height: 150px;
            overflow: hidden;
            transition: max-height 0.4s ease-in-out;
        }

        #aboutText.expanded {
            max-height: none;
        }

        #readMoreBtn {
            padding: 10px 20px;
            font-size: 16px;
            height: 40px;
            width: 25vh;
            background: transparent;
            color: rgb(2, 118, 191);
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        #readMoreBtn:hover {
            background-color: rgb(214, 242, 254);
        }

        @media (min-width: 992px) {
            .location-iframe {
                height: 500px !important;
            }

            .embed-responsive {
                height: 100%;
            }
        }

        @media (max-width: 768px) {
            .banner-image {
                max-height: 200px !important;
                object-fit: fill;
            }

            .nav-tabs {
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none;
            }

            .nav-tabs::-webkit-scrollbar {
                display: none;
            }

            .nav-link {
                font-size: 0.9rem;
                white-space: nowrap;
            }
        }
    </style>
    <div class="container py-5 bg-rgb(214, 242, 254)">
        <!-- College Details Section -->
        <div class="d-flex align-items-center mb-4">
            <img src="{{ asset('storage/' . $collegeShow->image) }}" alt="{{ $collegeShow->name }}" class="me-3"
                style="width: 90px; height: auto;">
            <div>
                <h1>{{ $collegeShow->name }}</h1>
                <div class="d-flex align-items-center flex-wrap">
                    <p style="margin-right: 25px;">
                        {{-- <i class="flag-icon flag-icon-ca text-md" style="border-radius: 15px;"></i> --}}
                        <i class="fas fa-globe"></i>
                        {{ $collegeShow->country->name }}
                    </p>
                    <p><i class="fas fa-map-marker-alt"></i> {{ $collegeShow->state->name }}, {{ $collegeShow->city->name }}
                    </p>
                </div>
            </div>
        </div>
        <!-- Banner Image Section -->
        <div class="row g-3">
            <div class="col">
                <div class="position-relative">
                    <img src="{{ asset('storage/' . $collegeShow->banner_image) }}" alt="{{ $collegeShow->name }}"
                        class="img-fluid rounded banner-image">
                </div>
            </div>
        </div>
        <!-- Tabs Section -->
        <ul class="nav nav-tabs mt-4 flex-nowrap overflow-auto" id="collegeTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active tab-link text-primary px-3 px-md-2" href="#overview">Overview</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link tab-link text-secondary px-3 px-md-2" href="#features">Features</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link tab-link text-secondary px-3 px-md-2" href="#location">Location</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link tab-link text-secondary px-3 px-md-2" href="#programs">Programs</a>
            </li>
        </ul>
        <!-- Tab Content (Single Page) -->
        <div id="overview" class="tab-content-section mt-4">
            <h3 class="mt-3"><i class="fas fa-home"></i> About</h3>
            <div id="aboutBox" class="p-3">
                <p id="aboutText" class="text-justify">
                    {!! $collegeShow->content !!}
                </p>
                <div class="d-flex justify-content-center">
                    <button id="readMoreBtn" class="mt-3">Show More 👇</button>
                </div>
            </div>
        </div>
        <div id="features" class="tab-content-section mt-3">
            <h3><i class="fas fa-cogs"></i> Features</h3>
            <div class="accordion mt-3" id="featuresAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="feature1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#feature1-collapse" aria-expanded="true" aria-controls="feature1-collapse">
                            Post Graduation Permit
                        </button>
                    </h2>
                    <div id="feature1-collapse" class="accordion-collapse collapse" aria-labelledby="feature1"
                        data-bs-parent="#featuresAccordion">
                        <div class="accordion-body">
                            Eligible students can apply for a work permit upon graduation.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="feature2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#feature2-collapse" aria-expanded="false" aria-controls="feature2-collapse">
                            Co-op/Internship Participation
                        </button>
                    </h2>
                    <div id="feature2-collapse" class="accordion-collapse collapse" aria-labelledby="feature2"
                        data-bs-parent="#featuresAccordion">
                        <div class="accordion-body">
                            Students can gain real-world experience through co-op programs and internships.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="location" class="tab-content-section mt-3">
            <h3><i class="fas fa-map-pin"></i> Location</h3>
            <ul class="nav nav-tabs" id="locationTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="map-tab" data-bs-toggle="tab" data-bs-target="#map-content"
                        type="button" role="tab" aria-controls="map-content" aria-selected="true">Map</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="streetview-tab" data-bs-toggle="tab" data-bs-target="#streetview-content"
                        type="button" role="tab" aria-controls="streetview-content"
                        aria-selected="false">Streetview</button>
                </li>
            </ul>
            <div class="tab-content mt-3">
                <!-- Map Tab -->
                <div class="tab-pane fade show active" id="map-content" role="tabpanel" aria-labelledby="map-tab">
                    @if (!empty($collegeShow->map_info))
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item location-iframe" src="{{ $collegeShow->map_info }}"
                                allowfullscreen loading="lazy"></iframe>
                        </div>
                    @endif
                </div>
                <!-- Street View Tab -->
                <div class="tab-pane fade" id="streetview-content" role="tabpanel" aria-labelledby="streetview-tab">
                    @if (!empty($collegeShow->streetview_info))
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item location-iframe"
                                src="{{ $collegeShow->streetview_info }}" allowfullscreen loading="lazy"></iframe>
                        </div>
                    @endif
                </div>
            </div>
            <p class="mt-3">{{ $collegeShow->country->name }}, {{ $collegeShow->state->name }},
                {{ $collegeShow->city->name }}.</p>
        </div>
        <div id="programs" class="tab-content-section mt-3">
            <h3><i class="fas fa-book-open"></i> Programs</h3>
            <p>Explore undergraduate and postgraduate programs like .</p>
            <!-- Program Card -->
            <div class="row">
                @foreach ($collegeShow->courses as $course)
                    <div class="col-lg-10 col-md-10 col-sm-12 col-12"> <!-- Full width on small screens -->
                        <div class="card program-card mb-4">
                            <div class="row no-gutters align-items-center px-3 flex-wrap flex-md-nowrap">
                                <div class="col-lg-1 col-md-2 col-sm-2 col-3 text-center mt-4">
                                    <!-- Adjusted column sizes for responsiveness -->
                                    <img src="{{ asset('assets/imgCourse/book.png') }}"
                                        class="card-img program-logo img-fluid" alt="Program Icon">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-9">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $course->name }}</h3>
                                        <h6 class="card-text">
                                            <small class="text-muted">{{ $collegeShow->name }} -
                                                {{ $collegeShow->city->name }}</small>
                                        </h6>
                                        <div class="d-flex flex-wrap justify-content-between align-items-center mt-3">
                                            <ul class="list-unstyled me-3">
                                                <li><strong>Earliest Intake</strong></li>
                                                <li><i class="fas fa-calendar-alt"></i>
                                                    {{ $collegeShow->intake_date }}</li>
                                            </ul>
                                            <ul class="list-unstyled me-3">
                                                <li><strong>Course Duration</strong></li>
                                                <li><i class="fas fa-clock"></i>

                                                    @php
                                                        $formatted = \Carbon\CarbonInterval::months(@$course->duration ?? 0)->cascade()->forHumans();
                                                    @endphp
                                                    {{  $formatted }}</li>
                                            </ul>
                                            <ul class="list-unstyled me-3">
                                                <li><strong>Gross Tuition</strong></li>
                                                <li><i class="fas fa-dollar-sign"></i>
                                                    {{ number_format($course->course_amount, 2) }}</li>
                                            </ul>
                                            <ul class="list-unstyled">
                                                <li><strong>Application Fee</strong></li>
                                                <li><i class="fas fa-dollar-sign"></i>
                                                    Not Available</li>
                                            </ul>
                                        </div>
                                        <div class="button mt-4 d-flex justify-content-center">
                                            @guest
                                                <button type="button" id="btn" data-toggle="modal"
                                                    data-target="#registerModal">Enroll Now</button>
                                            @else
                                                <form id="enroll-form-{{ $course->id }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="college_id" value="{{ $collegeShow->id }}">
                                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                    <button type="button" id="btn"
                                                        onclick="submitEnrollment({{ $course->id }})">
                                                        Enroll Now
                                                    </button>
                                                </form>
                                            @endguest
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Success Modal -->
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
        document.querySelectorAll('.tab-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            const aboutText = document.getElementById("aboutText");
            const readMoreBtn = document.getElementById("readMoreBtn");
            const initialHeight = aboutText.scrollHeight;

            readMoreBtn.addEventListener("click", function() {
                if (aboutText.style.maxHeight === initialHeight + "px") {
                    aboutText.style.maxHeight = "150px";
                    readMoreBtn.textContent = "Show More 👇";
                } else {
                    aboutText.style.maxHeight = initialHeight + "px";
                    readMoreBtn.textContent = "Show Less 👆";
                }
            });
        });
    </script>

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
                        // Show success message in the modal
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
