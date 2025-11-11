<!-- resources/views/website/college_list_partial.blade.php -->

@if ($colleges->isEmpty())
    <p>No colleges found.</p>
@else
    @foreach ($colleges as $college)
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
                                        <img src="{{ asset('storage/' . $college->image) }}"
                                            style="border-radius: 50%;width: 75px;height: 75px;object-fit: fill;"
                                            alt="image">
                                    </div>
                                    <div class="text">
                                        <a href="{{ route('website.college-details', $college->id) }}">
                                            <h4 class="n-font" style="color: white">{{ $college->name }}</h4><br>
                                            {{ $college->city->name }}, {{ $college->state->name }},
                                            {{ $college->country->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <ul style="background: #0e4389!important;">
                                    <li>
                                        <span style="color: red">Admissions</span>
                                        <a href="{{ route('website.college-details', $college->id) }}#admission"><span
                                                class="class-size" style="color: white"> - View</span></a>
                                    </li>

                                    <li>
                                        <span style="color: red">Courses</span>
                                        <a href="{{ route('website.college-details', $college->id) }}#courses"><span
                                                class="class-size" style="color: white"> - View</span></a>
                                    </li>
                                </ul>
                            </div>
                            {{-- <div class="col-lg-2 col-6">
                                    <img src="{{ asset('assets/img/bg/star.png') }}" alt="image">
                                    <a href="{{ asset('storage/' . $college->brochure) }}" target="_blank" class="btn ss-btn mr-15" style="border-radius: 26px; background: #0E4389; border: 1px solid white; font-size: 14px;" data-animation="fadeInLeft" data-delay=".4s">
                                        Brochure <i class="fal fa-long-arrow-right"></i>
                                    </a>
                                </div> --}}

                            <div class="col-lg-2 col-6">
                                <img src="{{ asset('assets/img/bg/star.png') }}" alt="image">

                                @auth
                                    <a href="{{ asset('storage/' . $college->brochure) }}" target="_blank"
                                        class="btn ss-btn mr-15"
                                        style="border-radius: 26px; background: #0E4389; border: 1px solid white; font-size: 14px;"
                                        data-animation="fadeInLeft" data-delay=".4s">
                                        Brochure <i class="fal fa-long-arrow-right"></i>
                                    </a>
                                @else
                                    <a data-toggle="modal" data-target="#registerModal" target="_blank"
                                        class="btn ss-btn mr-15"
                                        style="border-radius: 26px; background: #0E4389; border: 1px solid white; font-size: 14px;"
                                        data-animation="fadeInLeft" data-delay=".4s">
                                        Brochure <i class="fal fa-long-arrow-right"></i>
                                    </a>
                                @endauth
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
                    <span>Intake Date</span>
                    <span class="class-size">{{ $college->intake_date }}</span>
                </li>
                <li>
                    <span>graduation_marks:</span>
                    <span class="class-size">{{ $college->graduation_marks }}</span>
                </li>
            </ul>
        </div>
        <!-- class-item-end -->
    @endforeach
@endif
