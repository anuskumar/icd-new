@extends('index')
@section('content')
    <!-- main-area -->
    <main>
        <!-- slider-area -->

        <section id="home" class="slider-area fix p-relative">


            <div class="slider-active " style="background: #141b22;">

                <div class="single-slider slider-bg"
                    style="background-image: url('{{ asset('assets/img/slider/slide_bg1.jpg') }}'); background-size: cover;">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-7 col-md-7">

                                <div class="slider-content s-slider-content mt-130 text-center">
                                    <h5 class="mb-2" data-animation="fadeInUp" data-delay=".1s">Study In</h5>
                                    <h2 class="mb-3" data-animation="fadeInUp" data-delay=".1s">Australia</h2>
                                    <p class="mb-4" data-animation="fadeInUp" data-delay=".2s">Your Global Medical
                                        Education Partner.</p>

                                    <div
                                        class="slider-btn mt-30 d-flex flex-wrap align-items-center justify-content-center gap-3">
                                        <a href="{{ route('admin_panel.signup') }}"
                                            class="btn ss-btn mr-15 d-flex align-items-center justify-content-center"
                                            style="border-radius: 26px; background: #0E4389; border: 1px solid white; font-size: 14px; padding: 12px 20px;"
                                            data-animation="fadeInLeft" data-delay=".1s">
                                            Book Your Free Counseling Session
                                            <i class="fa fa-chevron-right ml-2" style="position: relative; top: 1px;"></i>
                                        </a>

                                        <a href="{{ route('admin_panel.showLoginForm') }}"
                                            class="btn ss-btn active d-flex align-items-center justify-content-center"
                                            style="border-radius: 26px; background: #EF1E00; font-size: 14px; border: 1px solid white; padding: 12px 20px;"
                                            data-animation="fadeInLeft" data-delay=".1s">
                                            Login
                                            <i class="fa fa-chevron-right ml-2" style="position: relative; top: 1px;"></i>
                                        </a>

                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-5 col-md-5 p-relative">
                            </div>

                            <!-- Button Column -->
                            {{-- <div class="col-lg-6 col-md-6 ">
                                    <div class="button-container">
                                        <div class="col-lg-12 col-md-12 ">
                                        <a href="#" style="background: #6F4FFB;padding:10px; color:white;" class="">OUR BRANCHES</a>
                                        <a href="#" style="background: #009C75;padding:10px; color:white;" class="">OUR PARTNERING UNIVERSITY</a>
                                        </div><br>
                                        <div class="col-lg-12 col-md-12  " style="background: black;">
                                            <a href="#" style=" color:white; padding:10px; text-align:center; font-size:24px;" >OUR DIGITAL OFFICE</a>
                                        </div>
                                    </div>
                                  </div> --}}

                        </div>
                    </div>
                </div>
                <div class="single-slider slider-bg"
                    style="background-image: url('{{ asset('assets/img/slider/slide_bg2.jpg') }}'); background-size: cover;">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-7 col-md-7">

                                <div class="slider-content s-slider-content mt-130 text-center">
                                    <h5 class="mb-2" data-animation="fadeInUp" data-delay=".1s">Study In</h5>
                                    <h2 class="mb-3" data-animation="fadeInUp" data-delay=".1s">New Zealand</h2>
                                    <p class="mb-4" data-animation="fadeInUp" data-delay=".2s">
                                        Connecting You to World-Class Universities for MBBS, Nursing, UG, PG & Allied Health
                                        Courses.
                                    </p>

                                    <div class="slider-btn mt-30 d-flex flex-wrap justify-content-center gap-3">
                                        <div class="slider-btn mt-30 d-flex flex-wrap justify-content-center">
                                            <a href="{{ route('admin_panel.signup') }}"
                                                class="btn ss-btn mr-15 d-flex align-items-center justify-content-center"
                                                style="border-radius: 26px; background: #0E4389; border: 1px solid white; font-size: 14px; padding: 12px 20px;"
                                                data-animation="fadeInLeft" data-delay=".1s">
                                                Book Your Free Counseling Session
                                                <i class="fa fa-chevron-right ml-2"></i>
                                            </a>
                                            <a href="{{ route('admin_panel.showLoginForm') }}"
                                                class="btn ss-btn active d-flex align-items-center justify-content-center"
                                                style="border-radius: 26px; background: #EF1E00; font-size: 14px; border: 1px solid white; padding: 12px 20px;"
                                                data-animation="fadeInLeft" data-delay=".1s">
                                                Login
                                                <i class="fa fa-chevron-right ml-2"></i>
                                            </a>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-5 col-md-5 p-relative">
                            </div>
                            <!-- Button Column -->
                            {{-- <div class="col-lg-6 col-md-6 ">
                                    <div class="button-container">
                                        <div class="col-lg-12 col-md-12 ">
                                        <a href="#" style="background: #6F4FFB;padding:10px; color:white;" class="">OUR BRANCHES</a>
                                        <a href="#" style="background: #009C75;padding:10px; color:white;" class="">OUR PARTNERING UNIVERSITY</a>
                                        </div><br>
                                        <div class="col-lg-12 col-md-12  " style="background: black;">
                                            <a href="#" style=" color:white; padding:10px; text-align:center; font-size:24px;" >OUR DIGITAL OFFICE</a>
                                        </div>
                                    </div>
                                  </div> --}}

                        </div>
                    </div>
                </div>
                <div class="single-slider slider-bg"
                    style="background-image: url('{{ asset('assets/img/slider/slide_bg3.jpg') }}'); background-size: cover;">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-7 col-md-7">
                                <div class="slider-content s-slider-content mt-130 text-center">
                                    <h5 class="mb-2" data-animation="fadeInUp" data-delay=".1s">Your Bright Future is</h5>
                                    <h2 class="mb-3" data-animation="fadeInUp" data-delay=".1s">Our success</h2>
                                    <p class="mb-4" data-animation="fadeInUp" data-delay=".2s"> Launch Your International
                                        Career with
                                        Confidence - Study in - United Kingdom, Canada, Australia, Germany, Russia.Seamless
                                        Admissions for MBBS, Nursing, Dental, Medical, UG & PG Programs Worldwide.

                                    </p>

                                    <div class="slider-btn mt-30 d-flex flex-wrap justify-content-center gap-3">
                                        <div class="slider-btn mt-30 d-flex flex-wrap justify-content-center">
                                            <a href="{{ route('admin_panel.signup') }}"
                                                class="btn ss-btn mr-15 d-flex align-items-center justify-content-center"
                                                style="border-radius: 26px; background: #0E4389; border: 1px solid white; font-size: 14px; padding: 12px 20px;"
                                                data-animation="fadeInLeft" data-delay=".1s">
                                                Enquire Now
                                                <i class="fa fa-chevron-right ml-2"></i>
                                            </a>
                                            <a href="{{ route('admin_panel.showLoginForm') }}"
                                                class="btn ss-btn active d-flex align-items-center justify-content-center"
                                                style="border-radius: 26px; background: #EF1E00; font-size: 14px; border: 1px solid white; padding: 12px 20px;"
                                                data-animation="fadeInLeft" data-delay=".1s">
                                                Login
                                                <i class="fa fa-chevron-right ml-2"></i>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 p-relative">
                            </div>
                            <!-- Button Column -->
                            {{-- <div class="col-lg-6 col-md-6 ">
                                    <div class="button-container">
                                        <div class="col-lg-12 col-md-12 ">
                                        <a href="#" style="background: #6F4FFB;padding:10px; color:white;" class="">OUR BRANCHES</a>
                                        <a href="#" style="background: #009C75;padding:10px; color:white;" class="">OUR PARTNERING UNIVERSITY</a>
                                        </div><br>
                                        <div class="col-lg-12 col-md-12  " style="background: black;">
                                            <a href="#" style=" color:white; padding:10px; text-align:center; font-size:24px;" >OUR DIGITAL OFFICE</a>
                                        </div>
                                    </div>
                                  </div> --}}

                        </div>
                    </div>
                </div>
            </div>

        </section>



        <section class="p-relative s-contain" style="background-color: #ffffff;">
            <div class="container">
                <div class="row align-items-stretch">
                    <!-- Card 1 -->
                    <div class="col-lg-6 col-md-6 d-flex">
                        <div class="courses-item d-flex flex-column w-100 mb-30 hover-zoomin zoo"
                            style="background-color: #E1F0FF;">
                            <div class="thumb fix p-3 pt-4">
                                <a href="" onclick="return false;">
                                    <img src="{{ asset('assets/img/university.jpg') }}" alt="university">
                                </a>
                            </div>
                            <div class="courses-content one d-flex flex-column justify-content-between flex-grow-1 px-3 pb-4"
                                style="background-color: #E1F0FF;">
                                <div class="cat">1</div>
                                <h3 class="text-center mt-3">
                                    <a href="" onclick="return false;">Secure Your Choices’ University Seat</a>
                                </h3>
                                <p class="text-center">
                                    Top universities with trusted programs. Applications, documents, and confirmations are
                                    taken care of—so all that’s left is preparing for your big move. Whether it's MBBS,
                                    Nursing, or any UG/PG program, the admission process is streamlined from start to
                                    finish.
                                </p>
                                <!--<div class="text-center mt-auto">-->
                                <!--    <a href="single-courses.html" class="readmore cbtn me-2">Read more <i-->
                                <!--            class="fal fa-chevron-right ms-2"></i></a>-->
                                <!--    <a href="single-courses.html" class="readmore cbtn1">Enquire now<i-->
                                <!--            class="fal fa-chevron-right ms-2"></i></a>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-lg-6 col-md-6 d-flex">
                        <div class="courses-item d-flex flex-column w-100 mb-30 hover-zoomin zoo"
                            style="background-color: #E5FFC4;">
                            <div class="thumb fix p-3 pt-4">
                                <a href="" onclick="return false;">
                                    <img src="{{ asset('assets/img/ticket.jpg') }}" alt="ticket">
                                </a>
                            </div>
                            <div class="courses-content one d-flex flex-column justify-content-between flex-grow-1 px-3 pb-4"
                                style="background-color: #E5FFC4;">
                                <div class="cat">2</div>
                                <h3 class="text-center mt-3">
                                    <a href="" onclick="return false;">Book Your Flight Hassle-Free</a>
                                </h3>
                                <p class="text-center">
                                    Once your admission is confirmed, we help you book your flight at the best possible
                                    rates. We ensure safe, affordable, and student-friendly travel plans.
                                </p>
                                <!--<div class="text-center mt-auto">-->
                                <!--    <a href="single-courses.html" class="readmore cbtn me-2">Read more <i-->
                                <!--            class="fal fa-chevron-right ms-2"></i></a>-->
                                <!--    <a href="single-courses.html" class="readmore cbtn1">Enquire now<i-->
                                <!--            class="fal fa-chevron-right ms-2"></i></a>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-stretch">
                    <!-- Card 3 -->
                    <div class="col-lg-6 col-md-6 d-flex">
                        <div class="courses-item d-flex flex-column w-100 mb-30 hover-zoomin zoo"
                            style="background-color: #F7FFC8;">
                            <div class="thumb fix p-3 pt-4">
                                <a href="" onclick="return false;">
                                    <img src="{{ asset('assets/img/visa.jpg') }}" alt="visa">
                                </a>
                            </div>
                            <div class="courses-content one d-flex flex-column justify-content-between flex-grow-1 px-3 pb-4"
                                style="background-color: #F7FFC8;">
                                <div class="cat">3</div>
                                <h3 class="text-center mt-3">
                                    <a href="" onclick="return false;">Get Your Visa Approved Faster</a>
                                </h3>
                                <p class="text-center">
                                    Visa approvals can be tricky—but not with us. Our expert team ensures every document is
                                    in place, prepares you for interviews, and tracks your application closely to avoid
                                    delays.
                                </p>
                                <!--<div class="text-center mt-auto">-->
                                <!--    <a href="single-courses.html" class="readmore cbtn me-2">Read more <i-->
                                <!--            class="fal fa-chevron-right ms-2"></i></a>-->
                                <!--    <a href="single-courses.html" class="readmore cbtn1">Enquire now<i-->
                                <!--            class="fal fa-chevron-right ms-2"></i></a>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-lg-6 col-md-6 d-flex">
                        <div class="courses-item d-flex flex-column w-100 mb-30 hover-zoomin zoo"
                            style="background-color: #D4FFD5;">
                            <div class="thumb fix p-3 pt-4">
                                <a href="" onclick="return false;">
                                    <img src="{{ asset('assets/img/hotel.jpg') }}" alt="hotel">
                                </a>
                            </div>
                            <div class="courses-content one d-flex flex-column justify-content-between flex-grow-1 px-3 pb-4"
                                style="background-color: #D4FFD5;">
                                <div class="cat">4</div>
                                <h3 class="text-center mt-3">
                                    <a href="" onclick="return false;">Lock My Accommodation Now / Your Home Abroad – Sorted
                                        Before You Arrive</a>
                                </h3>
                                <p class="text-center">
                                    Do not stress about where you’ll stay—we have it all ready. Be it hostels or shared
                                    apartments, we help you get safe and affordable accommodation options near your
                                    university.
                                </p>
                                <!--<div class="text-center mt-auto">-->
                                <!--    <a href="single-courses.html" class="readmore cbtn me-2">Read more <i-->
                                <!--            class="fal fa-chevron-right ms-2"></i></a>-->
                                <!--    <a href="single-courses.html" class="readmore cbtn1">Enquire now<i-->
                                <!--            class="fal fa-chevron-right ms-2"></i></a>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- courses-area -->
        <!-- about-area -->
        <section class="about-area about-p about-sec p-relative fix" style="background: #eff7ff;">
            <div class="animations-02"><img src="{{ asset('assets/img/bg/an-img-02.png') }}" alt="contact-bg-an-01">
            </div>
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="s-about-img p-relative  wow fadeInLeft animated" data-animation="fadeInLeft"
                            data-delay=".4s">
                            <img class="abtimg" src="{{ asset('assets/img/features/about1.png') }}" alt="img">

                        </div>

                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="about-content s-about-content pl-15 wow fadeInRight  animated"
                            data-animation="fadeInRight" data-delay=".4s">
                            <div class="about-title second-title pb-25">
                                <h5> <span class="text-primary"> About ICD Education: </span><br />
                                    <span class="fs-1 text-dark">Your Trusted Partner For Overseas Education and Study Abroad Opportunities</span></h5>
                            </div>
                            <p>With 20+ years of experience and 5000+ success stories, ICD Education is your trusted gateway
                                to top international universities related to Medical & Healthcare Education. We have proudly
                                partnered with more than 250 reputed universities across 30+ countries, offering a wide
                                range of programs including MBBS, Nursing, Dental, Allied Health Sciences, as well as UG,
                                PG, and Diploma courses.</p>

                            {{-- <div class="slider-btn mt-20 a-btn">
                                <a href="about.html" class="abtbtn ss-btn smoth-scroll"><b>READ MORE</b><i
                                        class="fal fa-long-arrow-right"></i></a>
                            </div> --}}
                            <br>
                            <br>
                            <iframe class="v-utube" width="420" height="345"
                                src="https://www.youtube.com/embed/fiDuteAM_KA">
                            </iframe>

                            <div class="about-content2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="green2">
                                            <li>
                                                <div class="abcontent align-items-start text-start text-md-start">
                                                    <div class="ano col-12 col-md-auto mb-2 mb-md-0 d-flex justify-content-center justify-content-md-start"><span><img
                                                                src="{{ asset('assets/img/icon/flag.png') }}"
                                                                alt="img">
                                                        </span></div>
                                                    <div class="text">
                                                        <h5>Across 25 Countries</h5>
                                                        <p>We’ve proudly guided thousands of students to pursue their dreams
                                                            in over 25 countries worldwide, including Europe, North America,
                                                            Asia, and Australia.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="abcontent align-items-start text-start text-md-start">
                                                    <div class="ano col-12 col-md-auto mb-2 mb-md-0 d-flex justify-content-center justify-content-md-start"><span> <img
                                                                src="{{ asset('assets/img/icon/people.png') }}"
                                                                alt="img">
                                                        </span></div>
                                                    <div class="text">
                                                        <h5>Career With Us</h5>
                                                        <p>Be part of a mission-driven culture that empowers students and
                                                            drives real change in the education sector.</p>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->


        <div class="counter-area " style="background:white;">
            <div class="container">
                <div class="row p-relative">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="single-counter wow fadeInUp animated " data-animation="fadeInDown animated"
                            data-delay=".2s">

                            <div class="counter p-relative"
                                style="background-image:url(img/bg/c-object.html);  background-repeat: no-repeat;">
                                <i class="icon cmar"><span><img src="{{ asset('assets/img/icon/1.png') }}"
                                            alt="img">
                                    </span></i>
                                <span class="count">1547 </span> <span style="color:red;font-size:32px;"> + </span>
                                <p><b>Partner & Universities</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="single-counter wow fadeInUp animated" data-animation="fadeInDown animated"
                            data-delay=".2s">
                            <div class="counter p-relative"
                                style="background-image:url(img/bg/c-object.html);  background-repeat: no-repeat;">
                                <i class="icon cmar"><span><img src="{{ asset('assets/img/icon/2.png') }}"
                                            alt="img">
                                    </span></i>
                                <span class="count">200</span><span style="color:red;font-size:32px;"> + </span>
                                <p><b>Countries</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="single-counter wow fadeInUp animated" data-animation="fadeInDown animated"
                            data-delay=".2s">
                            <div class="counter p-relative"
                                style="background-image:url(img/bg/c-object.html);  background-repeat: no-repeat;">
                                <i class="icon cmar"><span><img src="{{ asset('assets/img/icon/3.png') }}"
                                            alt="img">
                                    </span></i>
                                <span class="count">1879</span> <span style="color:red;font-size:32px;"> + </span>
                                <p><b>Branches</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="single-counter wow fadeInUp animated" data-animation="fadeInDown animated"
                            data-delay=".2s">
                            <div class="counter p-relative"
                                style="background-image:url(img/bg/c-object.html);  background-repeat: no-repeat;">
                                <i class="icon cmar"><span><img src="{{ asset('assets/img/icon/4.png') }}"
                                            alt="img">
                                    </span></i>
                                <span class="count">2547</span> <span style="color:red;font-size:32px;"> + </span>
                                <p><b>Global<br></b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- counter-area-end -->

        <div class="counter-area" style="background:white;">
            <div class="container">
                <div class="row d-flex align-items-stretch">
                    <!-- MBBS Avenue -->
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                        <div class="wow fadeInUp animated h-100" data-animation="fadeInDown animated" data-delay=".2s">
                            <div class="counter p-relative h-100 d-flex flex-column justify-content-between"
                                style="background-image:url('assets/img/avenu/avenu-1.jpg'); background-size: cover; background-position: center; border-radius:15px; padding:20px;">
                                <div>
                                    <h3 class="text-white text-center mb-2">MBBS Avenue</h3>
                                    <p class="text-white text-center mb-2" style="font-size: 15px; line-height: 1.4;">
                                        Study medicine in globally recognized institutions with full support on MCI/NMC
                                        approvals.
                                        Get placed in globally recognized medical universities across countries like Russia,
                                        and more.
                                    </p>
                                </div>
                                <!--<p class="text-center mb-0">-->
                                <!--    <a href="#"><i class="fal fa-long-arrow-right text-white"></i></a>-->
                                <!--</p>-->
                            </div>
                        </div>
                    </div>

                    <!-- Nursing Avenue -->
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                        <div class="wow fadeInUp animated h-100" data-animation="fadeInDown animated" data-delay=".2s">
                            <div class="counter p-relative h-100 d-flex flex-column justify-content-between"
                                style="background-image:url('assets/img/avenu/avenu-2.jpg'); background-size: cover; background-position: center; border-radius:15px; padding:20px;">
                                <div>
                                    <h3 class="text-white text-center mb-2">Nursing Avenue</h3>
                                    <p class="text-white text-center mb-2" style="font-size: 15px; line-height: 1.4;">
                                        With expert assistance in choosing the right program, understanding licensing
                                        requirements,
                                        and securing placements, you’ll step into a rewarding global nursing career.
                                    </p>
                                </div>
                                <!--<p class="text-center mb-0">-->
                                <!--    <a href="#"><i class="fal fa-long-arrow-right text-white"></i></a>-->
                                <!--</p>-->
                            </div>
                        </div>
                    </div>

                    <!-- Dental Avenue -->
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                        <div class="wow fadeInUp animated h-100" data-animation="fadeInDown animated" data-delay=".2s">
                            <div class="counter p-relative h-100 d-flex flex-column justify-content-between"
                                style="background-image:url('assets/img/avenu/avenu-3.jpg'); background-size: cover; background-position: center; border-radius:15px; padding:20px;">
                                <div>
                                    <h3 class="text-white text-center mb-2">Dental Avenue</h3>
                                    <p class="text-white text-center mb-2" style="font-size: 15px; line-height: 1.4;">
                                        Get placed in accredited dental colleges worldwide with complete admission guidance.
                                        Pursue BDS or equivalent dental programs in top-tier institutions abroad.
                                    </p>
                                </div>
                                <!--<p class="text-center mb-0">-->
                                <!--    <a href="#"><i class="fal fa-long-arrow-right text-white"></i></a>-->
                                <!--</p>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- two-col-Our Events-start -->


        <section class=" p-relative" style="background-color: #ffffff;">
            <div class="container">

                <div class="row align-items-center h-title">
                    <div class="col-lg-4 col-md-12 event-sec">

                        <h1 class="text-success fs-1">Events & Outreach</h1>

                    </div>
                    <div class="col-lg-8 col-md-12">
                        <p>At ICD Education, we believe that awareness and guidance are the first steps toward
                            transformation. That’s why we regularly conduct a wide range of events, programs, and
                            educational outreach initiatives to reach aspiring students and their families across India.
                            They stay connected to us through Seminars, Webinars, Educational Stores, and other Programs.
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <!-- two-col-Our Events-end -->
        <!-- two-col-youtube best study-2col-start -->

        <section class="steps-area p-relative" style="background-color: #ffffff;">
            {{-- <div class="animations-10"><img src="{{ asset('assets/img/bg/an-img-10.png') }}" alt="an-img-01"></div> --}}
            <div class="container">

                <div class="row align-items-center" style="padding-top:20px;padding-bottom:40px;">
                    <div class="row align-items-stretch">
                        <div class="col-lg-8 col-md-12 d-flex d-none d-lg-flex">
                            <iframe class="v-utube w-100" height="400"
                                src="https://www.youtube.com/embed/fiDuteAM_KA" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                        <div class="col-lg-4 col-md-12 d-flex">
                            <img src="{{ asset('assets/img/bg/yside.png') }}" alt="class image" class="w-100"
                                style="height:400px; object-fit:cover;">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12 p-relative">
                            <div class="section-title center-align mb-30 text-center wow fadeInDown animated"
                                data-animation="fadeInDown" data-delay=".4s">
                                <a href="https://youtube.com/@icdoverseaseducation?si=NWp78HoB2TC9p_Zu"
                                    style="border-radius: 38px; padding-left: 48px;
                                padding-right:48px;    background-color: #E50418; margin-top:50px; "
                                    class="btn">View More
                                    {{-- <img src="{{ asset('assets/img/icon/youtube.png') }}" alt="img"> --}}
                                </a>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>
        <!-- two-col-youtube best study-2col-end -->

        @php
        $countries = config('countries_mbbs.countries');
        $firstGroup = array_slice($countries, 0, ceil(count($countries) / 2));
        $secondGroup = array_slice($countries, ceil(count($countries) / 2));
    @endphp

    <section class="class-area c-padding p-relative fix" style="background-color:#E1F0FF;">
        <div class="container mar-bot">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-12 text-center text-md-start">
                    <div class="section-title mb-50 mt-50">
                        <h5>Countries</h5>
                        <h4 class="c-head" style="color: #0E4389">Choose Your Favourite Destination For MBBS</h4>
                    </div>
                </div>
            </div>

            <!-- First Carousel -->
            <div class="team-active mar-bot class-scroll">
                @foreach($firstGroup as $country)

                    <div class="class-item mb-30" style="height:550px;">
                        <a href="{{ route('listing.colleges', ['countryId' => base64_encode($country['id']), 'name' => $country['slug']]) }}">
                        <div>
                            <span>
                                <img src="{{ asset('assets/img/countires_flag/' . $country['flag']) }}" class="countriesicon" alt="{{ $country['name'] }} flag">
                            </span>
                        </div>

                        <div class="class-content">
                            <h4 class="title">

                                    {{ $country['name'] }}
                            </h4>
                            <p class="overflow-auto" style="height:120px">{{ $country['description'] }}</p>
                        </div>

                        <div class="class-img">
                            <div class="countries">
                                <a href="" onclick="return false;">
                                    <img src="{{ asset('assets/img/Countries_Images/' . $country['image']) }}" class="countriesborder" alt="{{ $country['name'] }}">
                                </a>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Second Carousel -->
            <div class="team-active class-scroll">
                @foreach($secondGroup as $country)
                    <div class="class-item mb-30" style="height:550px;">
                        <a href="{{ route('listing.colleges', ['countryId' => base64_encode($country['id']), 'name' => $country['slug']]) }}">
                        <div>

                            <span>
                                <img src="{{ asset('assets/img/countires_flag/' . $country['flag']) }}" class="countriesicon" alt="{{ $country['name'] }} flag">
                            </span>
                        </div>

                        <div class="class-content">
                            <h4 class="title">
                                    {{ $country['name'] }}
                            </h4>
                            <p class="overflow-auto" style="height:120px">{{ $country['description'] }}</p>
                        </div>

                        <div class="class-img">
                            <div class="countries">
                                <a href="" onclick="return false;">
                                    <img src="{{ asset('assets/img/Countries_Images/' . $country['image']) }}" class="countriesborder" alt="{{ $country['name'] }}">
                                </a>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @php
    $countries = config('countries_other.countries');
     @endphp

<section class="class-area c-padding p-relative fix" style="background-color:#F1F1F1;">
    <div class="container mar-bot">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-12 text-center text-md-start">
                <div class="section-title mb-50 mt-50">
                    <h5>Countries</h5>
                    <h4 class="c-head" style="color: #0E4389">Choose Your Favourite Destination For Other Courses</h4>
                </div>
            </div>
        </div>

        <div class="team-active class-scroll">
            @foreach($countries as $country)
                <div class="class-item mb-30" style="height:550px;">
                    <a href="{{ route('listing.colleges', ['countryId' => base64_encode($country['id']), 'name' => $country['slug']]) }}">
                    <div>
                        <span>
                            <img src="{{ asset('assets/img/countires_flag/' . $country['flag']) }}" class="countriesicon" alt="{{ $country['name'] }} flag">
                        </span>
                    </div>

                    <div class="class-content">
                        <h4 class="title">

                                {{ $country['name'] }}

                        </h4>
                        <p class="overflow-auto" style="height:100px">{{ $country['description'] }}</p>
                    </div>

                    <div class="class-img">
                        <div class="countries">
                            <a href="" onclick="return false;">
                                <img src="{{ asset('assets/img/Countries_Images/' . $country['image']) }}" class="countriesborder" alt="{{ $country['name'] }}">
                            </a>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>



        <section class=" cta-bg bann-sec dn " style="background-image:url('{{ asset('assets/img/bg/study.png') }}');">
            <div class="container">
                <div class="row justify-content-center  align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="section-title cta-title video-title wow fadeInLeft animated"
                            data-animation="fadeInDown animated" data-delay=".2s">

                            <h2 style="color:rgb(255, 255, 255)">MBBS Destination</h2>
                            <p class="banner-para">Now Accepting Applications – Study MBBS Abroad Without NEET. <br />
                                Explore top
                                foreign universities offering high-quality medical education.These countries offer
                                high-quality medical education with modern classrooms, advanced labs, and amazing campus
                                facilities.</p>
                            <!--<button class="ssbtn ss-btn"><span>Read more</span> </button>-->

                        </div>

                    </div>
                    {{-- <div class="col-lg-2 col-md-2">
                        </div> --}}
                    <div class="col-lg-6">


                    </div>
                </div>
            </div>
        </section>


        <section class=" cta-bg bann-sec wd" style="background-color: #1B2945;">
            <div class="container">
                <div class="row justify-content-center  align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="section-title cta-title video-title wow fadeInLeft animated"
                            data-animation="fadeInDown animated" data-delay=".2s">

                            <h2 style="color:rgb(255, 255, 255)">MBBS Destination</h2>
                            <p class="banner-para">Now Accepting Applications – Study MBBS Abroad Without NEET. <br />
                                Explore top
                                foreign universities offering high-quality medical education.These countries offer
                                high-quality medical education with modern classrooms, advanced labs, and amazing campus
                                facilities.</p>

                        </div>

                    </div>
                    {{-- <div class="col-lg-2 col-md-2">
                        </div> --}}
                    <div class="col-lg-6">

                        <div class="s-video-content">
                            <img src="{{ asset('assets/img/bg/mbbs_dest.png') }}" alt="circle_right">
                            <!--<button class="ssbtn ss-btn  back-trans"><span>Read more</span> <i-->
                            <!--        class="fal fa-long-arrow-right"></i></button>-->


                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class=" cta-bg bann-sec" style="background-image:url('{{ asset('assets/img/bg/loan-bg.png') }}');">
            <div class="container">
                <div class="row justify-content-center  align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="section-title cta-title video-title wow fadeInLeft animated"
                            data-animation="fadeInDown animated" data-delay=".2s">

                            <h2 style="color: rgb(255, 255, 255);"> Nurses <br class="dn"> Opportunity</h2>
                            <p class="banner-para">Studying nursing overseas is a smart and empowering choice, especially
                                for Indian female students. It opens the door to exciting global career opportunities. After
                                completing your course, you can work in top government and private hospitals in India and
                                abroad.</p>
                            <!--<button class="ssbtn ss-btn dn back-trans"><span>Read more</span></button>-->

                        </div>

                    </div>
                    {{-- <div class="col-lg-2 col-md-2">
                        </div> --}}
                    <div class="col-lg-6">

                        <div class="s-video-content">
                            <img src="{{ asset('assets/img/bg/loan.png') }}" alt="circle_right">
                            <!--<button class="ssbtn ss-btn dw back-trans"><span>Read more</span> <i-->
                            <!--        class="fal fa-long-arrow-right"></i></button>-->


                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class=" cta-bg bann-sec" style="background-color: #C1D8E5;">
            <div class="container">
                <div class="row justify-content-center  align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="section-title cta-title video-title wow fadeInLeft animated"
                            data-animation="fadeInDown animated" data-delay=".2s">
                            {{-- <h2> We're <span>Qeducato</span> & We're Diffirent</h2> --}}
                            <h2 style="color: black;"> PR Process </h2>
                            <p style="color: black;" class="banner-para">This can also be your stepping stone to
                                Permanent
                                Residency (PR). Countries like Canada, Australia, and New Zealand offer clear PR pathways
                                for international students who complete their studies and gain relevant work experience.</p>
                            <!--<button class="ssbtn ss-btn dn back-trans co-btn"><span>Read more</span></button>-->

                        </div>

                    </div>
                    {{-- <div class="col-lg-2 col-md-2">
                        </div> --}}
                    <div class="col-lg-6">

                        <div class="s-video-content">
                            <img src="{{ asset('assets/img/bg/pr.png') }}" alt="circle_right">
                            <!--<button class="ssbtn ss-btn dw back-trans co-btn"><span>Read more</span> <i-->
                            <!--        class="fal fa-long-arrow-right"></i></button>-->

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class=" cta-bg bann-sec">
            <div class="container">
                <div class="row justify-content-center  align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="section-title cta-title video-title wow fadeInLeft animated"
                            data-animation="fadeInDown animated" data-delay=".2s">
                            {{-- <h2> We're <span>Qeducato</span> & We're Diffirent</h2> --}}
                            <h2 style="color: black;"> Education Loan</h2>
                            <p style="color: black;" class="banner-para">Financing your dreams shouldn't feel
                                overwhelming. At MBBS Experts, we not only guide you academically but also support your
                                financial planning. Our team helps you explore education loan options to cover tuition fees,
                                living expenses, travel costs, and more.</p>
                            <!--<button class="ssbtn ss-btn dn back-trans co-btn"><span>Read more</span></button>-->

                        </div>

                    </div>
                    {{-- <div class="col-lg-2 col-md-2">
                        </div> --}}
                    <div class="col-lg-6">

                        <div class="s-video-content">
                            <img src="{{ asset('assets/img/bg/education_loan1.png') }}" alt="circle_right">
                            <!--<button class="ssbtn ss-btn dw back-trans co-btn"><span>Read more</span> <i-->
                            <!--        class="fal fa-long-arrow-right"></i></button>-->

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- admission-area-end -->
        <section class="shop-area academy p-relative " data-animation="fadeInUp animated" data-delay=".2s"
            style="background-color:#F1F1F1;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-relative">
                        <div class="section-title center-align mb-50 text-center wow fadeInDown animated"
                            data-animation="fadeInDown" data-delay=".4s">
                            {{-- <h5><i class="fal fa-graduation-cap"></i> Our Events</h5> --}}
                            <h2 style="color:red;">
                                Our Services
                            </h2>


                        </div>

                    </div>

                </div>
                <div class="row">
                    @php
                        $services = [
                            [
                                'title' => 'Expert Counseling & Mentorship',
                                'desc' =>
                                    'Our experienced education experts, practicing doctors, and ex-students who’ve been there, have done that.',
                                'image' => 'assets/img/bg/expert_counsil.jpg',
                            ],
                            [
                                'title' => 'Admission & Documentation Support',
                                'desc' =>
                                    'Forget the paperwork panic. We handle your forms, documents, and admission process. We make the application process smooth and stress-free.',
                                'image' => 'assets/img/bg/admission_document.jpg',
                            ],
                            [
                                'title' => 'Passport & Visa Assistance',
                                'desc' =>
                                    'From applying for your passport to guiding you through the visa process. Our team keeps things simple, quick, and compliant with the latest embassy rules.',
                                'image' => 'assets/img/bg/Passport_Visa.jpg',
                            ],
                            [
                                'title' => 'Scholarships That Change Lives',
                                'desc' =>
                                    'At ICD, we believe no student should ever step back because of finance. That’s why we’ve helped 1,800+ students secure scholarships.',
                                'image' => 'assets/img/bg/Scholarships.jpg',
                            ],
                            [
                                'title' => 'Flight-Ready Support',
                                'desc' =>
                                    'We will support you with flight bookings, coordinating travel dates, and even helping you find the most student-friendly pickups to departure prep.',
                                'image' => 'assets/img/bg/Flight_Ready.jpg',
                            ],
                            [
                                'title' => 'Accommodation Arrangements',
                                'desc' =>
                                    'Worried about where you’ll stay? Don’t be. We assist with finding the right accommodation — whether it’s a university hostel or otherwise.',
                                'image' => 'assets/img/bg/accommodation_arrangement.jpg',
                            ],
                        ];
                    @endphp

                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="courses-item mb-4 hover-zoomin hovnew w-100 d-flex flex-column">
                                <div class="thumb fix">
                                    <a href="#" onclick="return false;"><img src="{{ asset($service['image']) }}" alt="service-img"
                                            class="img-fluid"></a>
                                </div>
                                <div class="courses-content flex-grow-1 d-flex flex-column p-3">
                                    <h3 class="fs-5"><a href="#" onclick="return false;">{{ $service['title'] }}</a></h3>
                                    <p class="flex-grow-1">{{ $service['desc'] }}</p>
                                    <hr class="mt-auto">
                                    <!--<a href="#" class="readmore mt-2" style="color: #000000;" onclick="return false;">LEARN MORE</a>-->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </section>

        <section class=" cta-bg bann-sec dn " style="background-color:#04070F;">
            <div class="container">
                <div class="row justify-content-center  align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="section-title cta-title video-title wow fadeInLeft animated"
                            data-animation="fadeInDown animated" data-delay=".2s">

                            <h2 style="color:rgb(255, 255, 255)">Study Abroad</h2>
                            <p class="banner-para">Over 2,500+ students have chosen to pursue their MBBS abroad through
                                ICD
                                Education —Many of our students are now practicing medicine across Europe, the USA, and
                                beyond. Once you're settled in, begin your MBBS studies!</p>
                            <!--<button class="ssbtn ss-btn"><span>Read more</span></button>-->

                        </div>

                    </div>
                    {{-- <div class="col-lg-2 col-md-2">
                        </div> --}}
                    <div class="col-lg-6">
                    <div class="s-video-content">
                            <img src="{{ asset('assets/img/bg/study_abrod.png') }}" alt="circle_right">
                            <!--<button class="ssbtn ss-btn  back-trans dw "><span>Read more</span></button>-->

                        </div>

                    </div>
                </div>
            </div>
        </section>


        <section class=" cta-bg bann-sec wd" style="background-color: #1B2945;">
            <div class="container">
                <div class="row justify-content-center  align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="section-title cta-title video-title wow fadeInLeft animated"
                            data-animation="fadeInDown animated" data-delay=".2s">

                            <h2 style="color:rgb(255, 255, 255)">Study Abroad</h2>
                            <p class="banner-para">Over 2,500+ students have chosen to pursue their MBBS abroad through
                                ICD
                                Education —Many of our students are now practicing medicine across Europe, the USA, and
                                beyond. Once you're settled in, begin your MBBS studies!</p>

                        </div>

                    </div>
                    {{-- <div class="col-lg-2 col-md-2">
                        </div> --}}
                    <div class="col-lg-6">

                        <div class="s-video-content mt-2">
                            <img src="{{ asset('assets/img/bg/study_abrod.png') }}" alt="circle_right">
                            <!--<button class="ssbtn ss-btn  back-trans"><span>Read more</span></button>-->


                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class=" cta-bg bann-sec" style="background-color:#9C2F20;">
            <div class="container">
                <div class="row justify-content-center  align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="section-title cta-title video-title wow fadeInLeft animated"
                            data-animation="fadeInDown animated" data-delay=".2s">
                            {{-- <h2> We're <span>Qeducato</span> & We're Diffirent</h2> --}}
                            <h2 style="color: rgb(255, 255, 255);"> Scholarship <br> Assistance </h2>
                            <p style="color: rgb(255, 255, 255);" class="banner-para"> We Offer Scholarships for
                                Academic
                                Excellence, Financial Assistance for Deserving Students, Scholarships for Specific Countries
                                and Universities.
                            </p>
                            <!--<button class="ssbtn ss-btn dn back-trans "><span>Read more</span></button>-->

                        </div>

                    </div>
                    {{-- <div class="col-lg-2 col-md-2">
                        </div> --}}
                    <div class="col-lg-6">

                        <div class="s-video-content">
                            <img src="{{ asset('assets/img/bg/newside.png') }}" alt="circle_right">
                            <!--<button class="ssbtn ss-btn  back-trans dw "><span>Read more</span></button>-->

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class=" cta-bg bann-sec" style="background-color:#C1D8E5;)">
            <div class="container">
                <div class="row justify-content-center  align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="section-title cta-title video-title wow fadeInLeft animated"
                            data-animation="fadeInDown animated" data-delay=".2s">
                            {{-- <h2> We're <span>Qeducato</span> & We're Diffirent</h2> --}}
                            <h2 style="color:black">Pre Departure <br> Guidance / Support</h2>
                            <p style="color: rgb(0, 0, 0);" class="banner-para"> We walk with you until you’re
                                confidently
                                settled abroad. Through our dedicated pre-departure assistance, we ensure you're fully
                                prepared—mentally, emotionally, and practically—for this exciting transition.
                            </p>
                            <!--<button class="ssbtn ss-btn dn back-trans co-btn"><span>Read more</span></button>-->

                        </div>

                    </div>
                    {{-- <div class="col-lg-2 col-md-2">
                        </div> --}}
                    <div class="col-lg-6">

                        <div class="s-video-content">
                            <img src="{{ asset('assets/img/bg/sside.png') }}" alt="circle_right">
                            <!--<button class="ssbtn ss-btn dw back-trans co-btn"><span>Read more</span></button>-->

                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class=" cta-bg academy" style="background-color:#E9F2FF;)">
            <div class="container">
                <div class="row justify-content-center  align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="section-title cta-title video-title wow fadeInLeft animated"
                            data-animation="fadeInDown animated" data-delay=".2s">
                            {{-- <h2> We're <span>Qeducato</span> & We're Diffirent</h2> --}}
                            <h5 style="color:red">VALUE FOR PERSONALISED COACHING FOR EXAMS</h5>
                            <h4 style="color:#0E4389;" class="academy-header">Get High Band Score With</h4>
                            <h5 style="color:black;" class="academy-name">ICD Academy</h5>
                            <p style="font-size: 16px;line-height:30px;color:black;">Personalized coaching offers
                                one-on-one coaching tailored to your life and goals. Also provides students with a dedicated
                                mentor who can help them set goals, stay motivated, and track their progress. Whether you're
                                struggling or excelling academically, personalized coaching can enhance your learning
                                experience by tailoring it to your needs, strengths, and goals. This, in turn, positively
                                impacts diversity by giving others a role model.</p>
                            <!--<button class="sssbtn ss-btn"><span>Submit Now</span> <i-->
                                    <!--class="fal fa-chevron-right"></i></button>-->

                        </div>

                    </div>
                    {{-- <div class="col-lg-2 col-md-2">
                        </div> --}}
                    <div class="col-lg-6">

                        <div class="row">
                            <div class="col-lg-2  col-md-12">


                            </div>
                            <div class="col-lg-4 col-sm-6 col-6 santa">
                                <img src="{{ asset('assets/img/bg/toefl1.png') }}" alt="circle_right">

                            </div>
                            <div class="col-lg-4 col-sm-6 col-6 santa">
                                {{-- <div class="santa"> --}}
                                <img src="{{ asset('assets/img/bg/toefl2.png') }}" alt="circle_right">
                                {{-- </div> --}}
                            </div>
                            <div class="col-lg-2">
                            </div>

                            <div class="col-lg-4 col-sm-6 col-6 santa">
                                {{-- <div class="santa"> --}}
                                <img src="{{ asset('assets/img/bg/toefl3.png') }}" alt="circle_right">
                                {{-- </div> --}}
                            </div>
                            <div class="col-lg-4 col-sm-6 col-6 santa">
                                <img src="{{ asset('assets/img/bg/toefl4.png') }}" alt="circle_right">
                            </div>
                            <div class="col-lg-4 col-sm-6 col-6 santa">
                                <img src="{{ asset('assets/img/bg/toefl5.png') }}" alt="circle_right">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- blog-area -->
        <section id="blog" class="blog-area p-relative fix academy"
            style="background-image:url('{{ asset('assets/img/bg/blgbg.jpg') }}'); background-repeat: no-repeat; background-position:top;background-size: cover;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="section-title center-align mb-50 text-center wow fadeInDown animated"
                            data-animation="fadeInDown" data-delay=".4s">
                            {{-- <h6 style="color: #E50418">Latest Blog & News</h6> --}}
                            <h3 style="color: #0E4389">
                                Read Our Latest Articles
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="date-active class-scroll">



                    <div class=" class-item b-para col-lg-4 col-md-6 col-sm-12">

                        <div class="blog-content2">
                            <div class="row">
                                <div class="col-lg-6 cal">
                                    <div class="date-home">
                                        <i class="fal fa-calendar-alt"></i> Dec 29, 2023
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h4 style="color: #0E4389">Uzbekistan - Top Choice for MBBS Abroad</h4>
                            <p>A Smart Move for Indian Medical Aspirants</p>
                            <hr>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class=" blog-icon">
                                        <img src="{{ asset('assets/img/testimonial/flag.png') }}" alt="img">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <p> ICD Education</p>
                                </div>

                                <!--<div class="col-lg-4">-->
                                <!--    <div class="blog-btn"><a href="blog-details.html"><span style="color: black;">Read-->
                                <!--                More</span> <i class="fal fa-long-arrow-right"></i></a></div>-->

                                <!--</div>-->

                            </div>
                        </div>
                    </div>


                    <div class=" class-item b-para col-lg-4 col-md-6 col-sm-12">

                        <div class="blog-content2">
                            <div class="row">
                                <div class="col-lg-6 cal">
                                    <div class="date-home">
                                        <i class="fal fa-calendar-alt"></i> Dec 29, 2023
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h4 style="color: #0E4389">Sharpening Your Clinical Skills and Diagnostic Precision</h4>
                            <p>A Smart Move for Indian Medical Aspirants</p>
                            <hr>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class=" blog-icon">
                                        <img src="{{ asset('assets/img/testimonial/flag.png') }}" alt="img">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <p> ICD Education</p>
                                </div>

                                <!--<div class="col-lg-4">-->
                                <!--    <div class="blog-btn"><a href="blog-details.html"><span style="color: black;">Read-->
                                <!--                More</span> <i class="fal fa-long-arrow-right"></i></a></div>-->

                                <!--</div>-->

                            </div>
                        </div>
                    </div>


                    <div class=" class-item b-para col-lg-4 col-md-6 col-sm-12">


                        <div class="blog-content2">
                            <div class="row">
                                <div class="col-lg-6 cal">
                                    <div class="date-home">
                                        <i class="fal fa-calendar-alt"></i> Dec 29, 2023
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h4 style="color: #0E4389">Crack NEET 2025 with Confidence and Clarity</h4>
                            <p>Ultimate Guide for Aspiring Doctors</p>
                            <hr>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class=" blog-icon">
                                        <img src="{{ asset('assets/img/testimonial/flag.png') }}" alt="img">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <p> ICD Education </p>
                                </div>

                                <!--<div class="col-lg-4">-->
                                <!--    <div class="blog-btn"><a href="blog-details.html"><span style="color: black;">Read-->
                                <!--                More</span> <i class="fal fa-long-arrow-right"></i></a></div>-->

                                <!--</div>-->


                            </div>
                        </div>
                    </div>




                </div>

                {{-- ////////// --}}

                {{--
                     <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                             <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">


                                 <div class="blog-content2">
                                    <div class="row">
                                        <div class="col-lg-6 cal">
                                            <div class="date-home">
                                                <i class="fal fa-calendar-alt"></i> Dec 29, 2023
                                            </div>
                                        </div>
                                    </div>
                                        <br>
                                     <h4 style="color: #0E4389">Batumi Shota Rustaveli State University</h4>
                                     <p>leo. eu vehicula, lacus, odio tempor viverra malesuadanon non.</p>
                                     <hr>
                                     <div class="row">
                                        <div class="col-lg-2">
                                            <div class=" blog-icon">
                                              <img src="{{ asset('assets/img/testimonial/flag.png') }}" alt="img">
                                            </div>
                                         </div>
                                        <div class="col-lg-6">
                                            Jason P Laforce
                                        </div>

                                        <!--<div class="col-lg-4">-->
                                        <!--  <div class="blog-btn"><a href="blog-details.html"><span style="color: black;">Read More</span> <i class="fal fa-long-arrow-right"></i></a></div>-->

                                        <!--</div>-->

                                  </div>
                                 </div>
                             </div>
                         </div>
                          <div class="col-lg-4 col-md-6 col-sm-12">
                             <div class="single-post2 mb-30 hover-zoomin wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">

                                 <div class="blog-content2">
                                    <div class="row">
                                        <div class="col-lg-6 cal">
                                            <div class="date-home">
                                                <i class="fal fa-calendar-alt"></i> Dec 29, 2023
                                            </div>
                                        </div>
                                    </div>
                                        <br>
                                     <h4 style="color: #0E4389">Batumi Shota Rustaveli State University</h4>
                                     <p>leo. eu vehicula, lacus, odio tempor viverra malesuadanon non.</p>
                                     <hr>
                                     <div class="row">
                                        <div class="col-lg-2">
                                            <div class=" blog-icon">
                                              <img src="{{ asset('assets/img/testimonial/flag.png') }}" alt="img">
                                            </div>
                                         </div>
                                        <div class="col-lg-6">
                                            Jason P Laforce
                                        </div>

                                        <!--<div class="col-lg-4">-->
                                        <!--  <div class="blog-btn"><a href="blog-details.html"><span style="color: black;">Read More</span> <i class="fal fa-long-arrow-right"></i></a></div>-->

                                        <!--</div>-->

                                  </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-4 col-md-6 col-sm-12">
                             <div class="single-post2 mb-30 hover-zoomin wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">

                                 <div class="blog-content2">
                                    <div class="row">
                                        <div class="col-lg-6 cal">
                                            <div class="date-home">
                                                <i class="fal fa-calendar-alt"></i> Dec 29, 2023
                                            </div>
                                        </div>
                                    </div>
                                        <br>
                                     <h4 style="color: #0E4389">Batumi Shota Rustaveli State University</h4>
                                     <p>leo. eu vehicula, lacus, odio tempor viverra malesuadanon non.</p>
                                     <hr>
                                     <div class="row">
                                        <div class="col-lg-2">
                                            <div class=" blog-icon">
                                              <img src="{{ asset('assets/img/testimonial/flag.png') }}" alt="img">
                                            </div>
                                         </div>
                                        <div class="col-lg-6">
                                            Jason P Laforce
                                        </div>

                                        <!--<div class="col-lg-4">-->
                                        <!--  <div class="blog-btn"><a href="blog-details.html"><span style="color: black;">Read More</span> <i class="fal fa-long-arrow-right"></i></a></div>-->

                                        <!--</div>-->

                                  </div>
                                 </div>
                             </div>
                         </div>


                     </div> --}}

                <!--<div class="section-title center-align mb-50 text-center wow fadeInDown animated"-->
                <!--    data-animation="fadeInDown" data-delay=".4s">-->
                <!--    {{-- <h5><i class="fal fa-graduation-cap"></i> Our Events</h5> --}}-->
                <!--    <div class="blog-btn "><a class="tstbtn" href="blog-details.html">Read More <i-->
                <!--                class="fal fa-chevron-right"></i></a></div>-->

                <!--</div>-->
            </div>

        </section>
        <!-- blog-area-end -->

        <!-- brand-area -->
        <div class="brand-area pt-60 pb-60"
            style="background-image:url('{{ asset('assets/img/bg/blgbg.jpg') }}'); background-repeat: no-repeat; background-position:top;background-size: cover;">
            <div class="container">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <h2>Youtube Video</h2>
                </div>
                <div class="row brand-active">
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <div onclick="playVideo(this, '9vOx_vpIMQc')" style="cursor: pointer;">
                                <img class="img-fluid" style="max-height: 400px; object-fit: cover;" src="{{ asset('assets/img/brand/VishnupriyaRajeevan.jpg') }}" alt="img">
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <div onclick="playVideo(this, 'R1QFoXkG6Og')" style="cursor: pointer;">
                                <img class="img-fluid" style="max-height: 400px; object-fit: cover;" src="{{ asset('assets/img/brand/AiswaryaRavi.jpg') }}" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <a href="https://youtube.com/@icdoverseaseducation?si=NWp78HoB2TC9p_Zu" target="_blank">
                                <img class="img-fluid" style="max-height: 400px; object-fit: cover;"  src="{{ asset('assets/img/brand/AksaStephen.jpg') }}" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2">
                       <div class="single-brand">
                            <a href="https://youtube.com/@icdoverseaseducation?si=NWp78HoB2TC9p_Zu" target="_blank">
                                <img class="img-fluid" style="max-height: 400px; object-fit: cover;"  src="{{ asset('assets/img/brand/AnaswaraVJ.jpg') }}" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <div onclick="playVideo(this, 'TR3PG0Tv8YM')" style="cursor: pointer;">
                                <img class="img-fluid" style="max-height: 400px; object-fit: cover;"  src="{{ asset('assets/img/brand/DiyaDileepT.jpg') }}" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <a href="https://youtube.com/@icdoverseaseducation?si=NWp78HoB2TC9p_Zu" target="_blank">
                                <img class="img-fluid" style="max-height: 400px; object-fit: cover;"  src="{{ asset('assets/img/brand/MahimaMili.jpg') }}" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <div onclick="playVideo(this, 'FUVnT-QN9Bw')" style="cursor: pointer;">
                                <img class="img-fluid" style="max-height: 400px; object-fit: cover;"  src="{{ asset('assets/img/brand/AbhisyaBose.jpg') }}" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <a href="https://youtube.com/@icdoverseaseducation?si=NWp78HoB2TC9p_Zu" target="_blank">
                                <img class="img-fluid" style="max-height: 400px; object-fit: cover;"  src="{{ asset('assets/img/brand/Sebastian.jpg') }}" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <a href="https://youtube.com/@icdoverseaseducation?si=NWp78HoB2TC9p_Zu" target="_blank">
                                <img class="img-fluid" style="max-height: 400px; object-fit: cover;"  src="{{ asset('assets/img/brand/GiftyPhilip.jpg') }}" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <div onclick="playVideo(this, '-c90vmddeq8')" style="cursor: pointer;">
                                <img class="img-fluid" style="max-height: 400px; object-fit: cover;"  src="{{ asset('assets/img/brand/MuhammadFahad.jpg') }}" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <a href="https://youtube.com/@icdoverseaseducation?si=NWp78HoB2TC9p_Zu" target="_blank">
                                <img class="img-fluid" style="max-height: 400px; object-fit: cover;"  src="{{ asset('assets/img/brand/ShihanaFathima.jpg') }}" alt="img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand-area-end -->


<script>
    function playVideo(container, videoId) {
        container.innerHTML = `
            <iframe width="100%" height="400"
                src="https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1"
                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
            </iframe>`;
    }
</script>






        <!-- circle-area -->
        <div class="brand-area pt-60 pb-60"
            style="background-image:url('{{ asset('assets/img/bg/blgbg.jpg') }}'); background-repeat: no-repeat; background-position:top;background-size: cover;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="section-title center-align mb-50 text-center wow fadeInDown animated"
                            data-animation="fadeInDown" data-delay=".4s">

                            <h2>
                                <p>Our Branches</p>
                            </h2>
                        </div>

                    </div>
                </div>
                <div class="row ">
                    <div class="col-xl-3 p-img">
                        <div>
                            <img src="{{ asset('assets/img/brand/2.png') }}" alt="img">
                            <h4 style="text-align: center;">
                                <u>Trivandrum -
                                    ICD, Housing Board Junction, Thampanoor, Thiruvananthapuram
                                </u>
                            </h4>
                        </div>
                    </div>
                    <div class="col-xl-3 p-img">
                        <div>
                            <img src="{{ asset('assets/img/brand/3.png') }}" alt="img">
                            <h4 style="text-align: center;">
                                <u>Kochi-
                                    ICD Overseas Education - <br />
                                    094003 06111
                                    https://g.co/kgs/f9WiH4y
                                </u>
                            </h4>
                        </div>
                    </div>
                    <div class="col-xl-3 p-img">
                        <div>
                            <img src="{{ asset('assets/img/brand/4.png') }}" alt="img">
                            <h4 style="text-align: center;">
                                <u>Ernakulam-
                                    ICD, DD Corner Stone Building, Kadavanthra, Ernakulam, Kerala
                                    0484 4061700
                                </u>
                            </h4>
                        </div>
                    </div>
                    <div class="col-xl-3 p-img">
                        <div>
                            <img src="{{ asset('assets/img/brand/1.png') }}" alt="img">
                            <h4 style="text-align: center;">
                                <u>Delhi-
                                    D - 35, 2nd Floor, Acharya Niketan, Mayur Vihar Phase I, Delhi - 110091 <br />
                                    Ph: 011 43095958
                                </u>
                            </h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- start events-->
        <section class="shop-area academy p-relative " data-animation="fadeInUp animated" data-delay=".2s"
            style="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-relative">
                        <div class="section-title center-align mb-50 text-center wow fadeInDown animated"
                            data-animation="fadeInDown" data-delay=".4s">

                            <h3 style="color:red;" class="u-head">MEET UNIVERSITY/ INSTITUTION OFFICIALS @ ICD
                            </h3>
                            <h1 style="color: #0E4389;" class="u-name">Study Abroad - Events</h1>
                        </div>
                    </div>
                </div>


                <div class="team-active class-scroll">


                    <div class="col-lg-3 col-md-6">
                        <div class="blog-content2">
                            <div class="row study-b">
                                <div class="thumb fix">
                                    <a href="#">
                                        <img style="border-radius:18px;"
                                            src="{{ asset('assets/img/events/event_1.jpg') }}"
                                            alt="Doctors&Dentist-event">
                                    </a>
                                </div>
                                <div class="event">
                                    <p>Contemporary Issues <br/> in <br/> Education</p>
                                    <!--<hr>-->
                                    <!--<div class="event-btn">-->
                                    <!--    <p><a href="#" class="readmore">-->
                                    <!--            READ MORE-->
                                    <!--            <span>→</span>-->
                                    <!--        </a></p>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-3 col-md-6">
                        <div class="blog-content2">
                            <div class="row study-b">
                                <div class="thumb fix">
                                    <a href="#">
                                        <img style="border-radius:18px;"
                                            src="{{ asset('assets/img/events/event_2.jpg') }}"
                                            alt="Doctors&Dentist-event">
                                    </a>
                                </div>
                                <div class="event">
                                    <p>AI's Role in <br/> Transforming <br/> Education</p>
                                    <!--<hr>-->
                                    <!--<div class="event-btn">-->
                                    <!--    <p><a href="#" class="readmore">-->
                                    <!--            READ MORE-->
                                    <!--            <span>→</span>-->
                                    <!--        </a></p>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-lg-3 col-md-6">
                        <div class="blog-content2">
                            <div class="row study-b">
                                <div class="thumb fix">
                                    <a href="#">
                                        <img style="border-radius:18px;"
                                            src="{{ asset('assets/img/events/event_3.jpg') }}"
                                            alt="Doctors&Dentist-event">
                                    </a>
                                </div>
                                <div class="event">
                                    <p>Webinar: Education in the digital age–strategies for success</p>
                                    <!--<hr>-->
                                    <!--<div class="event-btn">-->
                                    <!--    <p><a href="#" class="readmore">-->
                                    <!--            READ MORE-->
                                    <!--            <span>→</span>-->
                                    <!--        </a></p>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-lg-3 col-md-6">
                        <div class="blog-content2">
                            <div class="row study-b">
                                <div class="thumb fix">
                                    <a href="#">
                                        <img style="border-radius:18px;"
                                            src="{{ asset('assets/img/events/event_4.jpg') }}"
                                            alt="Doctors&Dentist-event">
                                    </a>
                                </div>
                                <div class="event">
                                    <p>Education <br/> & <br/> Schooling Series </p>
                                    <!--<hr>-->
                                    <!--<div class="event-btn">-->
                                    <!--    <p><a href="#" class="readmore">-->
                                    <!--            READ MORE-->
                                    <!--            <span>→</span>-->
                                    <!--        </a></p>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-lg-3 col-md-6">
                        <div class="blog-content2">
                            <div class="row study-b">
                                <div class="thumb fix">
                                    <a href="#">
                                        <img style="border-radius:18px;"
                                            src="{{ asset('assets/img/events/event_5.jpg') }}"
                                            alt="Doctors&Dentist-event">
                                    </a>
                                </div>
                                <div class="event">
                                    <p>Campus Orientaion <br/> and <br/> Cleaning</p>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                {{-- <div class="row align-items-center">
            <div class="col-lg-3 col-md-6">
                <div class="single-post2 mb-30 hover-zoomin wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                    <div class="blog-content2">
                       <div class="row">
                            <div class="thumb fix">
                                <a href="#">
                                    <img style="border-radius:18px;" src="{{ asset('assets/img/events/event-1.png') }}" alt="Doctors&Dentist-event">
                                </a>
                            </div>
                            <div class="event">
                                <p>  Doctors & Dentist Free Live Webinar & Interactive </p>
                                <!-- <hr>-->
                                <!--<div class="event-btn">-->
                                <!--    <p><a href="#" class="readmore">-->
                                <!--    READ MORE-->
                                <!-- <span>→</span>-->
                                <!--   </a></p>-->
                                <!--</div>-->
                            </div>
                       </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-post2 mb-30 hover-zoomin wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                    <div class="blog-content2">
                       <div class="row">
                            <div class="thumb fix">
                                <a href="#">
                                    <img style="border-radius:18px;" src="{{ asset('assets/img/events/event-2.jpg') }}" alt="Doctors&Dentist-event">
                                </a>
                            </div>
                            <div class="event">
                                <p>Study In Canada,<br> UK, USA<br> Australia</p>
                                <!-- <hr>-->
                                <!--<div class="event-btn">-->
                                <!--    <p><a href="#" class="readmore">-->
                                <!--    READ MORE-->
                                <!-- <span>→</span>-->
                                <!--   </a></p>-->
                                <!--</div>-->
                            </div>
                       </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-post2 mb-30 hover-zoomin wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                    <div class="blog-content2">
                       <div class="row">
                            <div class="thumb fix">
                                <a href="#">
                                    <img style="border-radius:18px;" src="{{ asset('assets/img/events/event-3.jpg') }}" alt="Doctors&Dentist-event">
                                </a>
                            </div>
                            <div class="event">
                                <p>South India ‘s Largest Study Abroad Expo- Calicut</p>
                                <!-- <hr>-->
                                <!--<div class="event-btn">-->
                                <!--    <p><a href="#" class="readmore">-->
                                <!--    READ MORE-->
                                <!-- <span>→</span>-->
                                <!--   </a></p>-->
                                <!--</div>-->
                            </div>
                       </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-3 col-md-6">
                <div class="single-post2 mb-30 hover-zoomin wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                    <div class="blog-content2">
                       <div class="row">
                            <div class="thumb fix">
                                <a href="#">
                                    <img style="border-radius:18px;" src="{{ asset('assets/img/events/event-4.jpg') }}" alt="Doctors&Dentist-event">
                                </a>
                            </div>
                            <div class="event">
                                <p>
                                Doctors & Dentist Free Live Webinar & Interactive
                                </p>
                                <!-- <hr>-->
                                <!--<div class="event-btn">-->
                                <!--    <p><a href="#" class="readmore">-->
                                <!--    READ MORE-->
                                <!-- <span>→</span>-->
                                <!--   </a></p>-->
                                <!--</div>-->
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>   --}}
            </div>
        </section>
        <!--end events -->


        <section class=" cta-bg academy" style="background-image:url('{{ asset('assets/img/bg/bgg.png') }}')">
            <div class="container">
                <div class="row justify-content-center  align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title cta-title video-title wow fadeInLeft animated"
                                    data-animation="fadeInDown animated" data-delay=".2s">

                                    <h2 style="color:black;" class="s-text">We Are Glad To Have You Around</h2>
                                    <h2 style="color:red";>Our Students</h2>
                                    <p class="s-para" style="color:black;">We extend our warmest welcome and heartfelt
                                        appreciation for your presence among our students. Your involvement is not just
                                        valued—it’s truly impactful. Whether you’re here as a guest speaker, mentor,
                                        educator, or collaborator, your contributions bring fresh perspectives, inspire
                                        growth, and enrich the educational journey of every student you interact with.</p>
                                </div>
                            </div>

                            <!--<div class="col-lg-6 col-md-6 col-sm-6 col-6 col-sm-12 d-flex justify-content-center gap-3">-->
                            <!--    <button class="stdbt1"><span>Book A Consultation</span> </i></button>-->
                            <!--</div>-->
                            <div class="col-12 d-flex justify-content-md-start justify-content-center">
                                <a href="https://youtube.com/@icdoverseaseducation?si=NWp78HoB2TC9p_Zu" class="stdbt2 btn-center">
                                    <span>Subscribe Now</span>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 u-sec">

                        <iframe class="v-utube" height="400"
                            src="https://www.youtube.com/embed/fiDuteAM_KA">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>

        <!-- newslater-aread-end -->
        <!--<div class="col-lg-12 col-md-12">-->
        <!--    <div class="section-title text-center mb-50 mt-50">-->
        <!--        <h5 style="font-size: 39px;">Testimonials</h5>-->
        <!--    </div>-->
        <!--</div>-->


        <!--<section class="class-area  p-relative fix" style="background-color:#ffffff!important;">-->
        <!--    <div class="container">-->
        <!--        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false"-->
        <!--            data-bs-interval="false">-->
        <!--            <div class="carousel-inner">-->
        <!--                <div class="carousel-item active">-->
        <!--                    <div class="row" style="display: flex;">-->
        <!--                        <div class="col-lg-3 col-md-3 col-sm-6 col-6 t-bot mar-sec s-1">-->
        <!--                            <div>-->
        <!--                                <a href=""> <img class="t-img" style="float: right;"-->
        <!--                                        src="{{ asset('assets/img/testimonial/testimonial-sec-1.jpg') }}"-->
        <!--                                        class="" alt="contact-bg-an-01"></a>-->
        <!--                            </div>-->
        <!--                        </div>-->



        <!--                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 t-bottom s-2 ">-->

        <!--                            <div>-->
        <!--                                <a href=""> <img style=""-->
        <!--                                        src="{{ asset('assets/img/testimonial/testimonial-sec-2.jpg') }}"-->
        <!--                                        class="img-fluid w-75 w-md-100" alt="contact-bg-an-01"></a>-->
        <!--                            </div>-->
        <!--                        </div>-->



        <!--                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 t-bottom mar-sec s-3">-->

        <!--                            <div>-->
        <!--                                <p>I had no idea where to start with applying for undergraduate health programs-->
        <!--                                    abroad, but ICD made the whole process clear. They helped me prepare a solid-->
        <!--                                    application, complete with SOP and scholarship submissions. I got accepted into-->
        <!--                                    a top university in New Zealand, and they even guided me through pre-departure-->
        <!--                                    and travel. The cultural orientation was very helpful—it felt like they thought-->
        <!--                                    of everything. My parents felt reassured too, which mattered a lot to me. Today,-->
        <!--                                    I’m happily settled and thriving in my program.-->
        <!--                                </p>-->
        <!--                                <h4 style="color:#7B7B7B" class="title">Undergraduate Student - Riya M. (New-->
        <!--                                    Zealand – Business Studies)</h4>-->
        <!--                            </div>-->
        <!--                        </div>-->


        <!--                        <div class="col-lg-3 col-md-3 col-sm-6 col-6 t-bot  mar-sec s-4">-->

        <!--                            <div>-->
        <!--                                <a href=""> <img class="t-img"-->
        <!--                                        src="{{ asset('assets/img/testimonial/testimonial-sec-3.jpg') }}"-->
        <!--                                        class="" alt="contact-bg-an-01"></a>-->
        <!--                            </div>-->
        <!--                        </div>-->



        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="carousel-item">-->
        <!--                    <div class="row" style="display: flex;">-->
        <!--                        <div class="col-lg-3 col-md-3 col-sm-6 col-6 t-bot mar-sec s-1">-->
        <!--                            <div>-->
        <!--                                <a href=""> <img class="t-img" style="float: right;"-->
        <!--                                        src="{{ asset('assets/img/testimonial/testimonial-sec-1.jpg') }}"-->
        <!--                                        class="" alt="contact-bg-an-01"></a>-->
        <!--                            </div>-->
        <!--                        </div>-->







        <!--                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 t-bottom mar-sec s-3">-->

        <!--                            <div>-->
        <!--                                <p>Choosing ICD for my MBBS journey was the best decision I made. Their counseling-->
        <!--                                    team was extremely helpful and answered every little query I had, from NEET-->
        <!--                                    eligibility to visa processing. I was guided with transparency and care-->
        <!--                                    throughout the admission process. The university they helped me get into in-->
        <!--                                    Russia is fantastic—modern labs, friendly professors, and a great mix of-->
        <!--                                    international students. I didn’t feel like I was alone at any point thanks to-->
        <!--                                    the ICD team constantly checking in even after my arrival. I’m now confident and-->
        <!--                                    happy, pursuing my dream of becoming a doctor.</p>-->
        <!--                                <h4 style="color:#7B7B7B" class="title">MBBS Student - Aanya R. (Russia)</h4>-->
        <!--                            </div>-->
        <!--                        </div>-->

        <!--                        <div class="col-lg-3 col-md-3 col-sm-12 t-bottom col-12 s-2 ">-->

        <!--                            <div>-->
        <!--                                <a href=""> <img style=""-->
        <!--                                        src="{{ asset('assets/img/testimonial/testimonial-sec-2.jpg') }}"-->
        <!--                                        class="img-fluid w-75 w-md-100" alt="contact-bg-an-01"></a>-->
        <!--                            </div>-->
        <!--                        </div>-->


        <!--                        <div class="col-lg-3 col-md-3 col-sm-6 col-6 t-bot  mar-sec s-4">-->

        <!--                            <div>-->
        <!--                                <a href=""> <img class="t-img"-->
        <!--                                        src="{{ asset('assets/img/testimonial/testimonial-sec-3.jpg') }}"-->
        <!--                                        class="" alt="contact-bg-an-01"></a>-->
        <!--                            </div>-->
        <!--                        </div>-->



        <!--                    </div>-->
        <!--                </div>-->

        <!--                <button class="carousel-control-prev tb-padd" type="button"-->
        <!--                    data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">-->
        <!--                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
        <!--                    <span class="visually">Previous</span>-->
        <!--                </button>-->
        <!--                <button class="carousel-control-next tb-padd" type="button"-->
        <!--                    data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">-->
        <!--                    <span class="visually">Next</span>-->
        <!--                    <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
        <!--                </button>-->

        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->





        <!--end-testimonials -->
    </main>
    <!-- main-area-end -->
       <div class="mobile-action-buttons">
        <a href="tel:+919400306111" class="call-button">
            <i class="fa fa-phone"></i> Call Us
        </a>
        <a href="https://wa.me/919400306111" class="whatsapp-button">
            <i class="fa fa-whatsapp"></i> WhatsApp Us
        </a>
    </div>

    <style>
        .mobile-action-buttons {
            display: none;
        }

        @media (max-width: 767px) {
            .mobile-action-buttons {
                display: flex;
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                z-index: 1000;
            }

            .mobile-action-buttons a {
                flex: 1;
                text-align: center;
                padding: 15px;
                color: white;
                text-decoration: none;
                font-size: 16px;
            }

            .call-button {
                background-color: #0E4389;
            }

            .whatsapp-button {
                background-color: #25D366;
            }
        }
    </style>



@endsection
