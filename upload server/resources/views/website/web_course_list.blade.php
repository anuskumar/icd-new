@extends('index')
@section('content')

<section class="shop-area pt-120 pb-120 p-relative " data-animation="fadeInUp animated" data-delay=".2s">
    <div class="container">
        <div class="row align-items-center class-scroll">

            @if($courses->isEmpty())
                <p>No courses found.</p>

            @else

                @foreach($courses as $course)

                    <div class="col-lg-12 col-md-12 ">
                        <!-- class-item -->
                        <div class="class-item mb-30" style="display: unset!important;">
                            <!-- class-img -->
                            <div class="class-img">
                                <div class="class-img-outer">
                                    <!-- course-meta -->
                                    <div class="course-meta" style="position:unset!important; background:#0E4389;">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 col-12">
                                                <div class="author">
                                                    <div class="thumb" style="display: contents;">
                                                        <h4 class="n-font" style="color: white">{{ $loop->iteration }}<br>
                                                            {{-- NIRF ' 23 --}}
                                                        </h4>
                                                        {{-- <img src="{{ asset('assets/img/icon/uk.png') }}" alt="image"> --}}
                                                        {{-- <img src="{{ asset('storage/' . $college->image) }}" style="border-radius: 50%;width: 75px;height: 75px;object-fit: fill;" alt="image"> --}}

                                                    </div>
                                                    {{-- <div class="text">
                                                        <a href="{{ route('website.college-details') }}">
                                                            <h4 class="n-font" style="color: white">{{ $college->name }}</h4><br>
                                                            {{ $college->city->name }},{{ $college->state->name }},{{ $college->country->name }}
                                                        </a>
                                                    </div> --}}
                                                    <div class="text">
                                                        <a href="{{ route('website.course-details', $course->id) }}"><br>
                                                            <h4 class="n-font" style="color: white">{{ $course->name }}</h4><br>
                                                            {{-- {{ $college->city->name }},{{ $college->state->name }},{{ $college->country->name }} --}}
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-6">
                                                <ul style="background: #0e4389!important;" >
                                                    {{-- <li>
                                                        <span style="color: red">Admissions</span>
                                                        <a href="{{ route('website.course-details') }}"><span class="class-size" style="color: white"> - View</span> </a>
                                                    </li>
                                                    <li>
                                                        <span style="color: red">Courses</span>
                                                        <a href="{{ route('website.course-details') }}"><span class="class-size" style="color: white"> - View</span> </a>
                                                    </li> --}}
                                                </ul>
                                            </div>
                                            {{-- <div class="col-lg-2 col-6">
                                                <img src="{{ asset('assets/img/bg/star.png') }}" alt="image">
                                                <a href="#" target="_blank" class="btn ss-btn mr-15" style="border-radius: 26px; background: #0E4389; border: 1px solid white; font-size: 14px;" data-animation="fadeInLeft" data-delay=".4s">
                                                    Brochure <i class="fal fa-long-arrow-right"></i>
                                                </a>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <!-- course-meta-end -->
                                </div>
                            </div>
                            <!-- class-img -->
                            <!-- schedule -->
                            <ul class="schedule"  >
                                {{-- <li>
                                    <span>2</span>
                                    <span class="class-age">
                                        Business Today' 23
                                    </span>
                                </li> --}}
                                <li>
                                    <span>Duration</span>
                                    <span class="class-size">{{ $course->duration }}</span>
                                </li>
                                <li>
                                    <span>Fee:</span>
                                    <span class="class-size">{{ $course->fee }}</span>
                                </li>

                                <li>
                                    <span>Exams Accepted:</span>
                                    <span class="class-size">
                                        @foreach($course->exams as $exam)
                                            {{ $exam->name }}@if(!$loop->last), @endif
                                        @endforeach
                                    </span>
                                </li>
                            </ul>
                            {{-- <div class="class-content">
                                <h4 class="title"><a href="single-courses.html">Languge Class</a></h4>
                                <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea.</p>
                            </div> --}}
                            <!-- class-content-end -->
                        </div>
                        <!-- class-item-end -->
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

