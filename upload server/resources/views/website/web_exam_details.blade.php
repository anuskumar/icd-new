@extends('index')
@section('content')

<section class="project-detail">
    <div class="container">
        <!-- Lower Content -->
        <div class="lower-content">
            <div class="class-item mb-30" style="display: unset!important;">
                <!-- class-img -->
                <div class="class-img">
                    <div class="class-img-outer">
                        <!-- course-meta -->
                        <div class="course-meta" style="position:unset!important; background:#0E4389;">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-6">
                                    <div class="author">
                                        <div class="thumb" style="display: contents;">
                                            <a href="{{ route('website.exam-details', $exam->id) }}">
                                                <h4 class="n-font" style="color: white">{{ $exam->name }}</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-3">
                                    <ul class="schedule">
                                        <li>
                                            <span>Result:</span>
                                            <span class="class-size">
                                                <a href="{{ $exam->result }}" target="_blank" class="btn ss-btn mr-15" style="border-radius: 26px; background: #E50418; border: 1px solid white; font-size: 14px;" data-animation="fadeInLeft" data-delay=".4s">
                                                    Click to Result <i class="fal fa-long-arrow-right"></i>
                                                </a>
                                            </span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-lg-2 col-6" style="text-align: right;">
                                    <ul style="background: #0e4389!important;">
                                        <li>
                                            <a href="{{ asset('storage/' . $exam->s_paper) }}" target="_blank" class="btn ss-btn mr-15" style="border-radius: 26px; background: #0E4389; border: 1px solid white; font-size: 14px;" data-animation="fadeInLeft" data-delay=".4s">
                                                Sample Paper<i class="fal fa-long-arrow-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-6">
                                    <a href="{{ asset('storage/' . $exam->guide) }}" target="_blank" class="btn ss-btn mr-15" style="border-radius: 26px; background: #0E4389; border: 1px solid white; font-size: 14px;" data-animation="fadeInLeft" data-delay=".4s">
                                        Download Guide <i class="fal fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- course-meta-end -->
                    </div>
                </div>
                <!-- class-img -->
            </div>
        </div>

        <br><br>
        <div class="container mt-2">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#college">Overview</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#syllabus">Syllabus</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="college">

                    {!! $exam->content !!}
                </div>

                <div class="tab-pane" id="syllabus">
                    {{-- <div id="syllabus-content"></div> --}}
                    {!! $exam->syllabus!!}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('contentjs')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const syllabusTab = document.querySelector('a[href="#syllabus"]');
        syllabusTab.addEventListener('shown.bs.tab', function() {
            const syllabusContent = `{!! old('syllabus', $exam->syllabus ?? '') !!}`;
            document.getElementById('syllabus-content').innerHTML = syllabusContent;
        });
    });
</script>
@endsection
