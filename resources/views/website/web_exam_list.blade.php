@extends('index')
@section('content')

<section class="shop-area pt-120 pb-120 p-relative " data-animation="fadeInUp animated" data-delay=".2s">
    <div class="container">
        <div class="row align-items-center class-scroll">

            @if($exam->isEmpty())
                <p>No colleges found.</p>

            @else
                @foreach($exam as $exams)

                    <div class="col-lg-12 col-md-12 ">
                        <!-- class-item -->
                        <div class="class-item mb-30" style="display: unset!important;">
                            <!-- class-img -->
                            <div class="class-img">
                                <div class="class-img-outer">
                                    <!-- course-meta -->
                                    <div class="course-meta" style="position:unset!important; background:#0E4389;">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 col-6">
                                                <div class="author">
                                                    <div class="thumb" style="display: contents;">
                                                        <h4 class="n-font" style="color: white">{{ $loop->iteration }}<br>
                                                        </h4>
                                                        <a href="{{ route('website.exam-details', $exams->id) }}">
                                                            <h4 class="n-font" style="color: white">{{ $exams->name }}</h4>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-3" style="text-align: right;">
                                                <ul style="background: #0e4389!important;" >
                                                    <li>
                                                        <a href="{{ asset('storage/' . $exams->s_paper) }}" target="_blank" class="btn ss-btn mr-15" style="border-radius: 26px; background: #0E4389; border: 1px solid white; font-size: 14px;" data-animation="fadeInLeft" data-delay=".4s">
                                                            Sample Paper<i class="fal fa-long-arrow-right"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-3 col-3">
                                                <a href="{{ asset('storage/' . $exams->guide) }}" target="_blank" class="btn ss-btn mr-15" style="border-radius: 26px; background: #0E4389; border: 1px solid white; font-size: 14px;" data-animation="fadeInLeft" data-delay=".4s">
                                                    Download Guide <i class="fal fa-long-arrow-right"></i>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- course-meta-end -->
                                </div>
                            </div>
                            <!-- class-img -->
                            <!-- schedule -->
                            <ul class="schedule">
                                <li>
                                    <span>Syllabus:</span>
                                    {{-- <span class="class-size"> {{! $exams->syllabus !}} </span> --}}
                                </li>
                                <li>
                                    <span>Result:</span>
                                    <span class="class-size">  <a href="{{ $exams->result }}" target="_blank" class="btn ss-btn mr-15" style="border-radius: 26px; background: #E50418; border: 1px solid white; font-size: 14px;" data-animation="fadeInLeft" data-delay=".4s">
                                        Click to Result <i class="fal fa-long-arrow-right"></i>
                                    </a> </span>
                                </li>
                            </ul>
                    </div> <br> <br>
                @endforeach
            @endif



        </div>
		<div class="row">
            <div class="col-12">
                <div class="pagination-wrap mt-20 text-center">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                            <li class="page-item active"><a href="#">1</a></li>
                            <li class="page-item"><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
