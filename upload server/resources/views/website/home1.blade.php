@extends('index')
@section('content')
        <!-- main-area -->
        <main>
            <!-- slider-area -->

             <section id="home" class="slider-area fix p-relative">


                 <div class="slider-active" style="background: #141b22;">

                     <div class="single-slider slider-bg" style="background-image: url('{{ asset('assets/img/slider/slide_bg1.jpg') }}'); background-size: cover;">
                         <div class="container">
                            <div class="row">

                                 <div class="col-lg-7 col-md-7">
                                     <div class="slider-content s-slider-content mt-130">
                                          <h5 data-animation="fadeInUp" data-delay=".4s">Study In</h5>
                                          <h2 data-animation="fadeInUp" data-delay=".4s">Australia</h2>
                                         <p data-animation="fadeInUp" data-delay=".6s">Donec vitae libero non enim placerat eleifend aliquam erat volutpat. Curabitur diam ex, dapibus purus sapien, cursus sed nisl tristique, commodo gravida lectus non.</p>

                                         <div class="slider-btn mt-30">
                                            <a href="{{ route('admin_panel.signup') }}" class="btn ss-btn mr-15" style="border-radius: 26px;
                                            background: #0E4389;border:1px solid white;font-size:14px;" data-animation="fadeInLeft" data-delay=".4s">ENQUIRE NOW <i class="fal fa-long-arrow-right"></i></a>
                                            <a href="{{ route('admin_panel.showLoginForm') }}" class="btn ss-btn active" style="border-radius: 26px;
                                            background: #EF1E00;font-size:14px;border:1px solid white;" data-animation="fadeInLeft" data-delay=".4s">LOGIN <i class="fal fa-long-arrow-right"></i></a>
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
                     <div class="single-slider slider-bg" style="background-image: url('{{ asset('assets/img/slider/slide_bg2.jpg') }}'); background-size: cover;">
                         <div class="container">
                            <div class="row">

                                 <div class="col-lg-7 col-md-7">

                                     <div class="slider-content s-slider-content mt-130">
                                          <h5 data-animation="fadeInUp" data-delay=".4s">Study In</h5>
                                          <h2 data-animation="fadeInUp" data-delay=".4s">New Zealand</h2>
                                         <p data-animation="fadeInUp" data-delay=".6s">Donec vitae libero non enim placerat eleifend aliquam erat volutpat. Curabitur diam ex, dapibus purus sapien, cursus sed nisl tristique, commodo gravida lectus non.</p>

                                         <div class="slider-btn mt-30">
                                            <a href="{{ route('admin_panel.signup') }}" class="btn ss-btn mr-15" style="border-radius: 26px;
                                            background: #0E4389;border:1px solid white;font-size:14px;" data-animation="fadeInLeft" data-delay=".4s">ENQUIRE NOW <i class="fal fa-long-arrow-right"></i></a>
                                            <a href="{{ route('admin_panel.showLoginForm') }}" class="btn ss-btn active" style="border-radius: 26px;
                                            background: #EF1E00;font-size:14px;border:1px solid white;" data-animation="fadeInLeft" data-delay=".4s">LOGIN <i class="fal fa-long-arrow-right"></i></a>
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
                     <div class="single-slider slider-bg" style="background-image: url('{{ asset('assets/img/slider/slide_bg3.jpg') }}'); background-size: cover;">
                        <div class="container">
                           <div class="row">

                                <div class="col-lg-7 col-md-7">
                                    <div class="slider-content s-slider-content mt-130">
                                         <h5 data-animation="fadeInUp" data-delay=".4s">Your Bright Future is</h5>
                                         <h2 data-animation="fadeInUp" data-delay=".4s">Our success</h2>
                                        <p data-animation="fadeInUp" data-delay=".6s">Donec vitae libero non enim placerat eleifend aliquam erat volutpat. Curabitur diam ex, dapibus purus sapien, cursus sed nisl tristique, commodo gravida lectus non.</p>

                                        <div class="slider-btn mt-30">
                                            <a href="{{ route('admin_panel.signup') }}" class="btn ss-btn mr-15" style="border-radius: 26px;
                                            background: #0E4389;border:1px solid white;font-size:14px;" data-animation="fadeInLeft" data-delay=".4s">ENQUIRE NOW <i class="fal fa-long-arrow-right"></i></a>
                                            <a href="{{ route('admin_panel.showLoginForm') }}" class="btn ss-btn active" style="border-radius: 26px;
                                            background: #EF1E00;font-size:14px;border:1px solid white;" data-animation="fadeInLeft" data-delay=".4s">LOGIN <i class="fal fa-long-arrow-right"></i></a>
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
             <!-- slider-area-end -->
              <!-- service-area -->
             {{-- <section class="service-details-two p-relative">
                 <div class="container">
                     <div class="row">

                         <div class="col-lg-4 col-md-12 col-sm-12">
                             <div class="services-box07">

                              <div class="sr-contner">
                                 <div class="icon">
                                 <img src="{{ asset('assets/img/icon/sve-icon4.png') }}" alt="icon01">
                                 </div>
                                 <div class="text">
                                     <h5><a href="about.html">Education Services</a></h5>
                                     <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea sharing listically</p>
                                     <a href="about.html">Read More <i class="fal fa-long-arrow-right"></i></a>
                                 </div>
                              </div>


                             </div>
                         </div>
                          <div class="col-lg-4 col-md-12 col-sm-12">
                             <div class="services-box07 active">
                                 <div class="sr-contner">
                                 <div class="icon">
                                 <img src="{{ asset('assets/img/icon/sve-icon5.png') }}" alt="icon01">
                                 </div>
                                 <div class="text">
                                     <h5><a href="about.html">International Hubs</a></h5>
                                     <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea sharing listically</p>
                                     <a href="about.html">Read More <i class="fal fa-long-arrow-right"></i></a>
                                 </div>
                              </div>

                             </div>
                         </div>

                      <div class="col-lg-4 col-md-12 col-sm-12">
                             <div class="services-box07">
                                 <div class="sr-contner">
                                 <div class="icon">
                                 <img src="{{ asset('assets/img/icon/sve-icon6.png') }}" alt="icon01">
                                 </div>
                                 <div class="text">
                                     <h5><a href="about.html">Bachelor’s and Master’s</a></h5>
                                     <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea sharing listically</p>
                                     <a href="about.html">Read More <i class="fal fa-long-arrow-right"></i></a>
                                 </div>
                              </div>

                             </div>
                         </div>

                     </div>
                 </div>
             </section> --}}
             <!-- service-details2-area-end -->



  <!-- courses-area -->


<section class="steps-area p-relative"  style="background-color: #ffffff;">
    {{-- <div class="animations-10"><img src="{{ asset('assets/img/bg/an-img-10.png') }}" alt="an-img-01"></div> --}}
    <div class="container">

        <div class="row align-items-center" style="padding-top:20px;padding-bottom:40px;">
            <div class="col-lg-6 col-md-6">
                <div class="courses-item mb-30 hover-zoomin zoo">
                    <div class="thumb fix" style="margin:20px 20px 0px 20px;">
                        <a href="single-courses.html"><img src="{{ asset('assets/img/bg/rec1.jpg') }}" alt="contact-bg-an-01"></a>
                    </div>
                    <div class="courses-content one">
                        {{-- <div class="cat"><i class="fal fa-graduation-cap"></i>1</div> --}}
                        <div class="cat">1</div>

                        <h3 style="margin-top:20px";><center><a href="single-courses.html">Book My University</a></center></h3>
                        <center><p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p><center>
                         <a href="single-courses.html" class="readmore cbtn">READ MORE<i class="fal fa-long-arrow-right"></i></a>
                         <a href="single-courses.html" class="readmore cbtn1">ENQUIRE NOW<i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    {{-- <div class="icon">
                     <img src="{{ asset('assets/img/icon/cou-icon.png') }}" alt="img">
                    </div> --}}
                </div>

            </div>
            <div class="col-lg-6 col-md-6">
                <div class="courses-item mb-30 hover-zoomin zoo" >
                    <div class="thumb fix" style="margin:20px 20px 0px 20px;">
                        <a href="single-courses.html"><img src="{{ asset('assets/img/bg/rec1.jpg') }}" alt="contact-bg-an-01"></a>
                    </div>
                    <div class="courses-content one">
                        {{-- <div class="cat"><i class="fal fa-graduation-cap"></i>1</div> --}}
                        <div class="cat">2</div>

                        <h3 style="margin-top:20px";><center><a href="single-courses.html">Book My University</a></center></h3>
                        <center><p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p><center>
                         <a href="single-courses.html" class="readmore cbtn">READ MORE<i class="fal fa-long-arrow-right"></i></a>
                         <a href="single-courses.html" class="readmore cbtn1">ENQUIRE NOW<i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    {{-- <div class="icon">
                     <img src="{{ asset('assets/img/icon/cou-icon.png') }}" alt="img">
                    </div> --}}
                </div>
            </div>
            {{-- <div class="col-lg-12 col-md-12">
                <div style="margin-left: 500px;
                margin-top: 46px;">
                    <a href="contact.html" style="border-radius: 38px; padding-left: 48px;
                        padding-right:48px;    background-color: #E50418; " class="btn">View More
                            <img src="{{ asset('assets/img/icon/youtube.png') }}" alt="img">
                        </a>
                 </div>

            </div> --}}


        </div>

    </div>
    <div class="container">

        <div class="row align-items-center" style="padding-top:20px;padding-bottom:40px;">
            <div class="col-lg-6 col-md-6">
                <div class="courses-item mb-30 hover-zoomin zoo">
                    <div class="thumb fix" style="margin:20px 20px 0px 20px;">
                        <a href="single-courses.html"><img src="{{ asset('assets/img/bg/rec1.jpg') }}" alt="contact-bg-an-01"></a>
                    </div>
                    <div class="courses-content one">
                        {{-- <div class="cat"><i class="fal fa-graduation-cap"></i>1</div> --}}
                        <div class="cat">3</div>

                        <h3 style="margin-top:20px";><center><a href="single-courses.html">Book My University</a></center></h3>
                        <center><p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p><center>
                         <a href="single-courses.html" class="readmore cbtn">READ MORE<i class="fal fa-long-arrow-right"></i></a>
                         <a href="single-courses.html" class="readmore cbtn1">ENQUIRE NOW<i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    {{-- <div class="icon">
                     <img src="{{ asset('assets/img/icon/cou-icon.png') }}" alt="img">
                    </div> --}}
                </div>

            </div>
            <div class="col-lg-6 col-md-6">
                <div class="courses-item mb-30 hover-zoomin zoo" >
                    <div class="thumb fix" style="margin:20px 20px 0px 20px;">
                        <a href="single-courses.html"><img src="{{ asset('assets/img/bg/rec1.jpg') }}" alt="contact-bg-an-01"></a>
                    </div>
                    <div class="courses-content one">
                        {{-- <div class="cat"><i class="fal fa-graduation-cap"></i>1</div> --}}
                        <div class="cat">4</div>

                        <h3 style="margin-top:20px";><center><a href="single-courses.html">Book My University</a></center></h3>
                        <center><p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p><center>
                         <a href="single-courses.html" class="readmore cbtn">READ MORE<i class="fal fa-long-arrow-right"></i></a>
                         <a href="single-courses.html" class="readmore cbtn1">ENQUIRE NOW<i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    {{-- <div class="icon">
                     <img src="{{ asset('assets/img/icon/cou-icon.png') }}" alt="img">
                    </div> --}}
                </div>
            </div>
            {{-- <div class="col-lg-12 col-md-12">
                <div style="margin-left: 500px;
                margin-top: 46px;">
                    <a href="contact.html" style="border-radius: 38px; padding-left: 48px;
                        padding-right:48px;    background-color: #E50418; " class="btn">View More
                            <img src="{{ asset('assets/img/icon/youtube.png') }}" alt="img">
                        </a>
                 </div>

            </div> --}}
            <div class="row">
                <div class="col-lg-12 p-relative">
                   <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                    <a href="contact.html" style="border-radius: 38px; padding-left: 48px;
                    padding-right:48px;    background-color: #E50418; " class="btn">View More
                        <img src="{{ asset('assets/img/icon/youtube.png') }}" alt="img">
                    </a>

                    </div>
                </div>

            </div>

        </div>

    </div>
</section>


<!-- courses-area -->
              <!-- about-area -->
             <section class="about-area about-p pt-120 pb-120 p-relative fix" style="background: #eff7ff;">
                 <div class="animations-02"><img src="{{ asset('assets/img/bg/an-img-02.png') }}" alt="contact-bg-an-01"></div>
                 <div class="container">
                     <div class="row justify-content-center align-items-center">
                          <div class="col-lg-6 col-md-12 col-sm-12">
                             <div class="s-about-img p-relative  wow fadeInLeft animated" data-animation="fadeInLeft" data-delay=".4s">
                                 <img class="abtimg" src="{{ asset('assets/img/features/About_Image.jpg') }}" alt="img">
                                <div class="about-text second-about">
                                     <span>25 <sub>+</sub></span>
                                     <p>Years of Experience</p>
                                 </div>
                             </div>

                         </div>

                     <div class="col-lg-6 col-md-12 col-sm-12">
                             <div class="about-content s-about-content pl-15 wow fadeInRight  animated" data-animation="fadeInRight" data-delay=".4s">
                                 <div class="about-title second-title pb-25">
                                     <h5> About </h5>
                                     <h2>Book My University</h2>
                                 </div>
                                    {{-- <p class="txt-clr">Our community is being called to reimagine the future. As the only university where a renowned design school comes together with premier colleges, we are making learning more relevant and transformational.</p> --}}
                                     <p>We are proud to offer top ranige in employment services such and asser payroll and benefits administrato managemen and asistance with global business range ployment employer  readings from religious texts or literature are also commonly inc compliance.</p>

                                     <div class="slider-btn mt-20">
                                        <a href="about.html" class="abtbtn ss-btn smoth-scroll"><b>READ MORE</b><i class="fal fa-long-arrow-right"></i></a>
                                   </div>
                                <br>
                                <br>



                                {{-- <div class="video-container">
                                    <!-- Replace 'YOUR_YOUTUBE_VIDEO_ID' with the actual video ID -->
                                    <iframe class="youtube-video ytp-cued-thumbnail-overlay-image" src="https://www.youtube.com/embed/YOUR_YOUTUBE_VIDEO_ID" frameborder="0" allowfullscreen></iframe>
                                </div> --}}
                                <iframe width="420" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY?controls=0">
                                </iframe>

                                     <div class="about-content2">
                                     <div class="row">
                                     <div class="col-md-12">
                                      <ul class="green2">
                                                 <li><div class="abcontent"><div class="ano"><span><img src="{{ asset('assets/img/icon/flag.png') }}" alt="img">
                                                 </span></div> <div class="text"><h5>Across 25 Countries</h5> <p>consectetur adipiscing elit sed do eiusmod tem incid idunt.</p></div></div></li>
                                                 <li><div class="abcontent"><div class="ano"><span>                                     <img src="{{ asset('assets/img/icon/people.png') }}" alt="img">
                                                 </span></div> <div class="text"><h5>Career With Us</h5> <p>consectetur adipiscing elit sed do eiusmod tem incid idunt.</p></div></div></li>

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
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="single-counter wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">

                    <div class="counter p-relative" style="background-image:url(img/bg/c-object.html);  background-repeat: no-repeat;">
                        <i class="icon cmar"><span><img src="{{ asset('assets/img/icon/1.png') }}" alt="img">
                        </span></i>
                        <span class="count">1547 </span> <span style="color:red;font-size:50px;"> + </span>
                        <p><b>Partner & Universities</b></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="single-counter wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                    <div class="counter p-relative" style="background-image:url(img/bg/c-object.html);  background-repeat: no-repeat;">
                        <i class="icon cmar"><span><img src="{{ asset('assets/img/icon/2.png') }}" alt="img">
                        </span></i>
                        <span class="count">200</span><span style="color:red;font-size:50px;"> + </span>
                        <p><b>Countries</b></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="single-counter wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                    <div class="counter p-relative" style="background-image:url(img/bg/c-object.html);  background-repeat: no-repeat;">
                        <i class="icon cmar"><span><img src="{{ asset('assets/img/icon/3.png') }}" alt="img">
                        </span></i>
                        <span class="count">1879</span> <span style="color:red;font-size:50px;"> + </span>
                        <p><b>Branches</b></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="single-counter wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                    <div class="counter p-relative" style="background-image:url(img/bg/c-object.html);  background-repeat: no-repeat;">
                        <i class="icon cmar"><span><img src="{{ asset('assets/img/icon/4.png') }}" alt="img">
                        </span></i>
                        <span class="count">2547</span>  <span style="color:red;font-size:50px;"> + </span>
                        <p><b>Global<br></b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- counter-area-end -->

<div class="counter-area " style="background:white;">
    <div class="container">
        <div class="row p-relative">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class=" wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">

                    <div class="counter p-relative" style="background-image:url('assets/img/avenu/avenu-1.jpg'); border-radius:15px; background-repeat: round; padding:15px 0px 5px 0px;">

                        <h4 style="color: white; border-radius:20px;text-align:center;">Nursing Avenues</h4>
                        <p style="color: white; border-radius:20px;text-align:center;">UK, Ireland, Australia & New Zealand </p>
                       <p style="text-align: center;"> <a href="#" class="" ><i style="color: white; border-radius:20px;" class="fal fa-long-arrow-right"></i></a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class=" wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                    <div class="counter p-relative" style="background-image:url('assets/img/avenu/avenu-2.jpg'); border-radius:15px; background-repeat: round; padding:15px 0px 5px 0px;">

                        <p style="color: white; border-radius:20px;text-align:center;">Are you ready to immigrate to canada <br>We’re here to help you Out! </p>
                       <p style="text-align: center;"> <a href="#" class="" ><i style="color: white; border-radius:20px;" class="fal fa-long-arrow-right"></i></a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class=" wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                    <div class="counter p-relative" style="background-image:url('assets/img/avenu/avenu-3.jpg'); border-radius:15px; background-repeat: round; padding:15px 0px 5px 0px;">

                        <h4 style="color: white; border-radius:20px;text-align:center;">Nursing Avenues</h4>
                        <p style="color: white; border-radius:20px;text-align:center;">UK, Ireland, Australia & New Zealand </p>
                       <p style="text-align: center;"> <a href="#" class="" ><i style="color: white; border-radius:20px;" class="fal fa-long-arrow-right"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- two-col-Our Events-start -->


<section class="steps-area p-relative"  style="background-color: #ffffff;">
    {{-- <div class="animations-10"><img src="{{ asset('assets/img/bg/an-img-10.png') }}" alt="an-img-01"></div> --}}
    <div class="container">

        <div class="row align-items-center" style="padding-top:40px;padding-bottom:150px;">
            <div class="col-lg-4 col-md-12" style="display: flex; font-size:64px;font-family:sans-serif;">
                {{-- <div class="section-title mb-35 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                    <h2>Our Best Features</h2>
                    <p>Special wedding garments are often worn, and the ceremony is sometimes followed by a wedding reception. Music, poetry.</p>
                </div>
                <ul class="pr-20">
                    <li>
                        <div class="step-box wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            <div class="dnumber">
                                <div class="date-box"><img src="{{ asset('assets/img/icon/fea-icon01.png') }}" alt="icon"></div>
                            </div>
                            <div class="text">
                                <h3>Skilled Teachers</h3>
                                <p>Special wedding garments are often worn, and the ceremony is sttimes followed by a wedding reception. Music, poetry, prayers, or readings from.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="step-box wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            <div class="dnumber">
                                 <div class="date-box"><img src="{{ asset('assets/img/icon/fea-icon02.png') }}" alt="icon"></div>
                            </div>
                            <div class="text">
                                <h3>Affordable Courses</h3>
                                <p>Special wedding garments are often worn, and the ceremony is sttimes followed by a wedding reception. Music, poetry, prayers, or readings from.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="step-box wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            <div class="dnumber">
                               <div class="date-box"><img src="{{ asset('assets/img/icon/fea-icon03.png') }}" alt="icon"></div>
                            </div>
                            <div class="text">
                                <h3>Efficient & Flexible</h3>
                                <p>Special wedding garments are often worn, and the ceremony is sttimes followed by a wedding reception. Music, poetry, prayers, or readings from.</p>
                            </div>
                        </div>
                    </li>
                </ul> --}}
              <p style="color:black"> Our</p><p style="color:red"> &nbsp;Events</p>

            </div>
            <div class="col-lg-8 col-md-12">
                {{-- <div class="step-img wow fadeInLeft animated" data-animation="fadeInLeft" data-delay=".4s">
                    <img src="{{ asset('assets/img/bg/steps-img.png') }}" alt="class image">
                </div> --}}
<p style="font-size:18px;color:black;font-family:sans-serif;"> Leo. Eu Vehicula, Lacus, Odio Tempor Viverra Malesuada Non Non. Ipsum Dolor Sodales. Vitae Nisi Donec Lacus, Sed Non, Nam Quis Urna Odio Risus Elementum Sed Lacus Urna Nunc Sodales. Tortor. Vestibulum Cras Dignissim, Maximus Tincidunt Nec Elit Sed Laoreet Elementum Morbi Libero, Eget Lorem Elementum Viverra Orci</p>
            </div>

        </div>

    </div>
</section>

<!-- two-col-Our Events-end -->
            <!-- two-col-youtube best study-2col-start -->

             <section class="steps-area p-relative"  style="background-color: #ffffff;">
                {{-- <div class="animations-10"><img src="{{ asset('assets/img/bg/an-img-10.png') }}" alt="an-img-01"></div> --}}
                <div class="container">

                    <div class="row align-items-center" style="padding-top:20px;padding-bottom:40px;">
                        <div class="col-lg-8 col-md-12">

                            <iframe height="400" src="https://www.youtube.com/embed/tgbNymZ7vqY?controls=0">
                            </iframe>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <img height="400" src="{{ asset('assets/img/bg/yside.png') }}" alt="class image">
                        </div>
                        {{-- <div class="col-lg-12 col-md-12">
                            <div style="margin-left: 500px;
                            margin-top: 46px;">
                                <a href="contact.html" style="border-radius: 38px; padding-left: 48px;
                                    padding-right:48px;    background-color: #E50418; " class="btn">View More
                                        <img src="{{ asset('assets/img/icon/youtube.png') }}" alt="img">
                                    </a>
                             </div>

                        </div> --}}
                        <div class="row">
                            <div class="col-lg-12 p-relative">
                               <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                                <a href="contact.html" style="border-radius: 38px; padding-left: 48px;
                                padding-right:48px;    background-color: #E50418; " class="btn">View More
                                    <img src="{{ asset('assets/img/icon/youtube.png') }}" alt="img">
                                </a>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </section>
          <!-- two-col-youtube best study-2col-end -->

<!-- class area start -->
{{-- <section class="class-area pt-120 pb-120 p-relative fix" style="background-color:#F1F1F1;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title text-center mb-50">
                    <h5>Countries</h5>
                    <h2>Choose Your Favourite Destination</h2>
                </div>
            </div>
        </div> --}}
        <section class="class-area pt-120 pb-120 p-relative fix" style="background-color:#F1F1F1;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="section-title text-center mb-50">
                            <h5>Countries</h5>
                            <h2>Choose Your Favourite Destination</h2>
                        </div>
                    </div>
                </div>
        <div class="team-active class-scroll">
                 <!-- class-item -->

                <div class="class-item mb-30">
                    <div><span><img src="{{ asset('assets/img/icon/canada.png') }}" class="countriesicon" alt="img">
                    </span></div>
                     <!-- class-content -->
                     <div class="class-content">
                        {{-- <img src="{{ asset('assets/img/bg/rec1.jpg') }}" alt="contact-bg-an-01"> --}}
                        <h4 class="title"><a href="single-courses.html">Canada</a></h4>
                        <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea.</p>
                    </div>
                   <!-- class-content-end -->
                   <!-- class-img -->
                   <div class="class-img">
                    <div class="countries">
                       <a href="single-courses-2.html"> <img src="{{ asset('assets/img/bg/rec1.jpg') }}" class="countriesborder"  alt="contact-bg-an-01"></a>
                    </div>
                </div>
                 <!-- class-img -->
               </div>
                 <!-- class-item-end -->
                  <!-- class-item -->
                 <div class="class-item mb-30">
                    <div><span><img src="{{ asset('assets/img/icon/uk.png') }}"  class="countriesicon" alt="img">
                    </span></div>
                    <!-- class-content -->
                    <div class="class-content">

                        <h4 class="title"><a href="single-courses.html">UK</a></h4>
                        <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea.</p>
                    </div>
                   <!-- class-content-end -->
                     <!-- class-img -->
                    <div class="class-img">
                        <div class="countries">
                           <a href="single-courses-2.html"> <img src="{{ asset('assets/img/bg/rec1.jpg') }}"  class="countriesborder" alt="contact-bg-an-01"></a>
                            <!-- course-meta -->

                            <!-- course-meta-end -->
                        </div>
                    </div>
                     <!-- class-img -->

                </div>
                 <!-- class-item-end -->
                 <!-- class-item -->
                 <div class="class-item mb-30">
                    <div><span><img src="{{ asset('assets/img/icon/australia.png') }}"  class="countriesicon" alt="img">
                    </span></div>
                     <!-- class-content -->
                     <div class="class-content">

                        <h4 class="title"><a href="single-courses.html">Australia</a></h4>
                        <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea.</p>
                    </div>
                   <!-- class-content-end -->
                     <!-- class-img -->
                    <div class="class-img">
                        <div class="countries">
                           <a href="single-courses-2.html"> <img src="{{ asset('assets/img/bg/rec1.jpg') }}" class="countriesborder" alt="contact-bg-an-01"></a>
                            <!-- course-meta -->

                            <!-- course-meta-end -->
                        </div>
                    </div>
                     <!-- class-img -->

                </div>
                 <!-- class-item-end -->
                 <!-- class-item -->
                 <div class="class-item mb-30">
                    <div><span><img src="{{ asset('assets/img/icon/newzealand.png') }}"  class="countriesicon" alt="img">
                    </span></div>
                     <!-- class-content -->
                     <div class="class-content">

                        <h4 class="title"><a href="single-courses.html">Newzealand</a></h4>
                        <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea.</p>
                    </div>
                   <!-- class-content-end -->
                     <!-- class-img -->
                    <div class="class-img">
                        <div class="countries">
                           <a href="single-courses-2.html"> <img src="{{ asset('assets/img/bg/rec1.jpg') }}" class="countriesborder"alt="contact-bg-an-01" ></a>
                            <!-- course-meta -->

                            <!-- course-meta-end -->
                        </div>
                    </div>
                     <!-- class-img -->

                </div>
                 <!-- class-item-end -->

            </div>
    </div>
</section>
<!-- class area end -->

			<!-- shop-area -->
            <section class="shop-area pt-120 pb-120 p-relative " data-animation="fadeInUp animated" data-delay=".2s" style="background-color:#F1F1F1;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 p-relative">
                           <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                                 {{-- <h5><i class="fal fa-graduation-cap"></i> Our Events</h5> --}}
                                <h2 style="color:red;">
                                  Our Services
                                </h2>
                                <h6 >
                                    Leo. Eu Vehicula, Lacus, Odio Tempor Viverra Malesuada Non Non. Ipsum Dolor Sodales. </p>

                                  </h6>

                            </div>

                        </div>

                    </div>
                    <div class="row align-items-center">
                         <div class="col-lg-4 col-md-6 ">
                            <div class="courses-item mb-30 hover-zoomin hovnew">
                                <div class="thumb fix">
                                    <a href="single-courses.html"><img src="{{ asset('assets/img/bg/recc1.png') }}" alt="contact-bg-an-01"></a>
                                </div>
                                <div class="courses-content">
                                    {{-- <div class="cat"><i class="fal fa-graduation-cap"></i> Sciences</div> --}}
                                    <h3><a href="single-courses.html">Study Abroad Counselling</a></h3>
                                     <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p>
                                     <hr>

                                     <a href="single-courses.html" class="readmore">LEARN MORE</a>
                                </div>
                                {{-- <div class="icon">
                                 <img src="img/icon/cou-icon.png" alt="img">
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="courses-item mb-30 hover-zoomin hovnew">
                                <div class="thumb fix">
                                    <a href="single-courses.html"><img src="{{ asset('assets/img/bg/recc1.png') }}" alt="contact-bg-an-01"></a>
                                </div>
                                <div class="courses-content">
                                    {{-- <div class="cat"><i class="fal fa-graduation-cap"></i> Economics</div> --}}
                                    <h3><a href="single-courses.html">Course Advice</a></h3>
                                     <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p>
                                     <hr>
                                    <a href="single-courses.html" class="readmore">LEARN MORE</a>
                                </div>
                                {{-- <div class="icon">
                                 <img src="img/icon/cou-icon.png" alt="img">
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="courses-item mb-30 hover-zoomin hovnew">
                                <div class="thumb fix">
                                    <a href="single-courses.html"><img src="{{ asset('assets/img/bg/recc1.png') }}" alt="contact-bg-an-01"></a>
                                </div>
                                <div class="courses-content">
                                    {{-- <div class="cat"><i class="fal fa-graduation-cap"></i> Media</div> --}}
                                    <h3><a href="single-courses.html">Application Processing</a></h3>
                                     <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p>
                                     <hr>
                                    <a href="single-courses.html" class="readmore">LEARN MORE</a>
                                </div>
                                {{-- <div class="icon">
                                 <img src="img/icon/cou-icon.png" alt="img">
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="courses-item mb-30 hover-zoomin hovnew">
                                <div class="thumb fix">
                                    <a href="single-courses.html"><img src="{{ asset('assets/img/bg/recc1.png') }}" alt="contact-bg-an-01"></a>
                                </div>
                                <div class="courses-content">
                                    {{-- <div class="cat"><i class="fal fa-graduation-cap"></i> Public</div> --}}
                                    <h3><a href="single-courses.html">Visa Application Assistance</a></h3>
                                    <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p>
                                    <hr>
                                    <a href="single-courses.html" class="readmore">LEARN MORE</a>
                                </div>
                                {{-- <div class="icon">
                                 <img src="img/icon/cou-icon.png" alt="img">
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 ">
                            <div class="courses-item mb-30 hover-zoomin hovnew">
                                <div class="thumb fix">
                                    <a href="single-courses.html"><img src="{{ asset('assets/img/bg/recc1.png') }}" alt="contact-bg-an-01"></a>
                                </div>
                                <div class="courses-content">
                                    {{-- <div class="cat"><i class="fal fa-graduation-cap"></i> Sciences</div> --}}
                                    <h3><a href="single-courses.html">Scholarship Assistance</a></h3>
                                    <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p>
                                    <hr>
                                    <a href="single-courses.html" class="readmore">LEARN MORE</a>
                                </div>
                                {{-- <div class="icon">
                                 <img src="img/icon/cou-icon.png" alt="img">
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6  ">
                            <div class="courses-item mb-30 hover-zoomin hovnew">
                                <div class="thumb fix">
                                    <a href="single-courses.html"><img src="{{ asset('assets/img/bg/recc1.png') }}" alt="contact-bg-an-01"></a>
                                </div>
                                <div class="courses-content">
                                    {{-- <div class="cat"><i class="fal fa-graduation-cap"></i> Finance</div> --}}
                                    <h3><a href="single-courses.html">Pre Departure Guidance</a></h3>
                                     <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p>
                                     <hr>
                                    <a href="single-courses.html" class="readmore">LEARN MORE</a>
                                </div>
                                {{-- <div class="icon">
                                 <img src="img/icon/cou-icon.png" alt="img">
                                </div> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- shop-area-end -->

              <!-- event-area -->
             <section class="event pt-120 pb-90 p-relative fix">
                  <div class="animations-06"><img src="{{ asset('assets/img/bg/an-img-06.png') }}" alt="an-img-01"></div>
                 <div class="animations-07"><img src="{{ asset('assets/img/bg/an-img-07.png') }}" alt="contact-bg-an-01"></div>
                 <div class="animations-08"><img src="{{ asset('assets/img/bg/an-img-08.png') }}" alt="contact-bg-an-01"></div>
                 <div class="animations-09"><img src="{{ asset('assets/img/bg/an-img-09.png') }}" alt="contact-bg-an-01"></div>
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-12 p-relative">
                            <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                                  <h5><i class="fal fa-graduation-cap"></i> Our Events</h5>
                                 <h2>
                                   Upcoming Events
                                 </h2>

                             </div>
                         </div>

                     </div>
                     <div class="row">

                           <div class="col-lg-4 col-md-6  wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                             <div class="event-item mb-30 hover-zoomin">
                                 <div class="thumb">
                                     <a href="single-event.html"><img src="{{ asset('assets/img/bg/evn-img-1.jpg') }}" alt="contact-bg-an-01"></a>
                                 </div>
                                 <div class="event-content">
                                     <div class="date"><strong>18</strong> March, 2023</div>
                                     <h3><a href="single-event.html"> Basic UI & UX Design for new development</a></h3>
                                      <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p>
                                     <div class="time">3:30 pm - 4:30 pm <i class="fal fa-long-arrow-right"></i> <strong>United Kingdom</strong></div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-4 col-md-6  wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                             <div class="event-item mb-30 hover-zoomin">
                                 <div class="thumb">
                                     <a href="single-event.html"><img src="{{ asset('assets/img/bg/evn-img-2.jpg') }}" alt="contact-bg-an-01"></a>
                                 </div>
                                 <div class="event-content">
                                     <div class="date"><strong>20</strong> March, 2023</div>
                                      <h3><a href="single-event.html">Digital Education Market Briefing: Minnesota 2023</a></h3>
                                      <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p>
                                     <div class="time">3:30 pm - 4:30 pm <i class="fal fa-long-arrow-right"></i> <strong>United Kingdom</strong></div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-4 col-md-6  wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                             <div class="event-item mb-30 hover-zoomin">
                                 <div class="thumb">
                                     <a href="single-event.html"><img src="{{ asset('assets/img/bg/evn-img-3.jpg') }}" alt="contact-bg-an-01"></a>
                                 </div>
                                 <div class="event-content">
                                     <div class="date"><strong>22</strong> March, 2023</div>
                                      <h3><a href="single-event.html"> Learning Network Webinars for Music Teachers</a></h3>
                                      <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p>
                                     <div class="time">3:30 pm - 4:30 pm <i class="fal fa-long-arrow-right"></i> <strong>United Kingdom</strong></div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-4 col-md-6  wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                             <div class="event-item mb-30 hover-zoomin">
                                 <div class="thumb">
                                     <a href="single-event.html"><img src="{{ asset('assets/img/bg/evn-img-4.jpg') }}" alt="contact-bg-an-01"></a>
                                 </div>
                                 <div class="event-content">
                                     <div class="date"><strong>22</strong> March, 2023</div>
                                     <h3><a href="single-event.html"> Next-Gen Higher Education Students Have Arrived?</a></h3>
                                      <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p>
                                     <div class="time">3:30 pm - 4:30 pm <i class="fal fa-long-arrow-right"></i> <strong>United Kingdom</strong></div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-4 col-md-6  wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                             <div class="event-item mb-30 hover-zoomin">
                                 <div class="thumb">
                                     <a href="single-event.html"><img src="{{ asset('assets/img/bg/evn-img-5.jpg') }}" alt="contact-bg-an-01"></a>
                                 </div>
                                 <div class="event-content">
                                     <div class="date"><strong>24</strong> March, 2023</div>
                                      <h3><a href="single-event.html"> Digital Art & 3D Model – a future for film company</a></h3>
                                      <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p>
                                     <div class="time">3:30 pm - 4:30 pm <i class="fal fa-long-arrow-right"></i> <strong>United Kingdom</strong></div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-4 col-md-6  wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                             <div class="event-item mb-30 hover-zoomin">
                                 <div class="thumb">
                                     <a href="single-event.html"><img src="{{ asset('assets/img/bg/evn-img-6.jpg') }}" alt="contact-bg-an-01"></a>
                                 </div>
                                 <div class="event-content">
                                     <div class="date"><strong>30</strong> March, 2023</div>
                                    <h3><a href="single-event.html"> Conscious Discipline Summer Institute</a></h3>
                                      <p>Seamlessly visualize quality ellectual capital without superior collaboration and idea tically</p>
                                     <div class="time">3:30 pm - 4:30 pm <i class="fal fa-long-arrow-right"></i> <strong>United Kingdom</strong></div>
                                 </div>
                             </div>
                         </div>
                     </div>


                 </div>
             </section>
            <!-- courses-area -->
             <!-- cta-area -->
             <section class="cta-area cta-bg pt-50 pb-50" style="background-image:url('{{ asset('assets/img/bg/cta_bg02.png') }}')">
                 <div class="container">
                     <div class="row justify-content-center">
                         <div class="col-lg-8">
                             <div class="section-title cta-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
                                 <h2>Scholarship Programs</h2>
                                 <p>At Estuidar University, we prepare you to launch your career by providing a supportive, creative, and professional environment from which to learn practical skills and build a network of industry contacts.</p>
                             </div>

                         </div>
                         <div class="col-lg-4 text-right">
                             <div class="cta-btn s-cta-btn wow fadeInRight animated mt-30" data-animation="fadeInDown animated" data-delay=".2s">
                                       <a href="about.html" class="btn ss-btn smoth-scroll">Financial Aid <i class="fal fa-long-arrow-right"></i></a>
                                 </div>
                         </div>

                     </div>
                 </div>
             </section>




             <!-- cta-area-end -->
             <!-- frequently-area -->
             <section class="faq-area pt-120 pb-120 p-relative fix">
                 <div class="animations-10"><img src="{{ asset('assets/img/bg/an-img-04.png') }}" alt="an-img-01"></div>
                 <div class="animations-08"><img src="{{ asset('assets/img/bg/an-img-05.png') }}" alt="contact-bg-an-01"></div>
                 <div class="container">
                     <div class="row justify-content-center  align-items-center">

                         <div class="col-lg-7">
                             <div class="section-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
                                 <h2>Get every single answer here.</h2>
                                 <p>A business or organization established to provide a particular service, typically one that involves a organizing transactions.</p>
                             </div>
                                <div class="faq-wrap mt-30 pr-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                 <div class="accordion" id="accordionExample">
                                     <div class="card">
                                         <div class="card-header" id="headingThree">
                                             <h2 class="mb-0">
                                                 <button class="faq-btn" type="button" data-bs-toggle="collapse"
                                                     data-bs-target="#collapseThree"  >
                                                    01 Cras turpis felis, elementum sed mi at arcu ?
                                                 </button>
                                             </h2>
                                         </div>
                                         <div id="collapseThree" class="collapse show"
                                             data-bs-parent="#accordionExample">
                                             <div class="card-body">
                                                 Our community is being called to reimagine the future. As the only university where a renowned design school comes together with premier colleges, we are making learning more relevant and transformational. We are enriched by the wide range.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="card">
                                         <div class="card-header" id="headingOne">
                                             <h2 class="mb-0">
                                                 <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse"
                                                     data-bs-target="#collapseOne"  >
                                                    02 Vestibulum nibh risus, in neque eleifendulputate sem ?
                                                 </button>
                                             </h2>
                                         </div>
                                         <div id="collapseOne" class="collapse" data-bs-parent="#accordionExample">
                                             <div class="card-body">
                                                 Our community is being called to reimagine the future. As the only university where a renowned design school comes together with premier colleges, we are making learning more relevant and transformational. We are enriched by the wide range.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="card">
                                         <div class="card-header" id="headingTwo">
                                             <h2 class="mb-0">
                                                 <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse"
                                                     data-bs-target="#collapseTwo"  >
                                                   03 Donec maximus, sapien id auctor ornare ?
                                                 </button>
                                             </h2>
                                         </div>
                                         <div id="collapseTwo" class="collapse" data-bs-parent="#accordionExample">
                                             <div class="card-body">
                                               Our community is being called to reimagine the future. As the only university where a renowned design school comes together with premier colleges, we are making learning more relevant and transformational. We are enriched by the wide range.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="card">
                                         <div class="card-header">
                                             <h2 class="mb-0">
                                                 <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse"
                                                     data-bs-target="#collapseFour"  >
                                                 04 Vestibulum nibh risus, in neque eleifendulputate sem ?
                                                 </button>
                                             </h2>
                                         </div>
                                         <div id="collapseFour" class="collapse" data-bs-parent="#accordionExample">
                                             <div class="card-body">
                                                 Our community is being called to reimagine the future. As the only university where a renowned design school comes together with premier colleges, we are making learning more relevant and transformational. We are enriched by the wide range.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="card">
                                         <div class="card-header" id="headingFour">
                                             <h2 class="mb-0">
                                                 <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse"
                                                     data-bs-target="#collapseFive"  >
                                                 05 Donec maximus, sapien id auctor ornare ?
                                                 </button>
                                             </h2>
                                         </div>
                                         <div id="collapseFive" class="collapse" data-bs-parent="#accordionExample">
                                             <div class="card-body">
                                                 Our community is being called to reimagine the future. As the only university where a renowned design school comes together with premier colleges, we are making learning more relevant and transformational. We are enriched by the wide range.
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-5">
                             <div class="contact-bg02">
                             <div class="section-title wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                                 <h2>
                                   Make An Contact
                                 </h2>

                             </div>

                         <form action="http://htmldemo.zcubethemes.com/qeducato/mail.php" method="post" class="contact-form mt-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                             <div class="row">
                             <div class="col-lg-12">
                                 <div class="contact-field p-relative c-name mb-20">
                                     <input type="text" id="firstn" name="firstn" placeholder="First Name" required>
                                 </div>
                             </div>

                             <div class="col-lg-12">
                                 <div class="contact-field p-relative c-subject mb-20">
                                     <input type="text" id="email" name="email" placeholder="Email" required>
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="contact-field p-relative c-subject mb-20">
                                     <input type="text" id="phone" name="phone" placeholder="Phone No." required>
                                 </div>
                             </div>

                             <div class="col-lg-12">
                                 <div class="contact-field p-relative c-message mb-30">
                                     <textarea name="message" id="message" cols="30" rows="10" placeholder="Write comments"></textarea>
                                 </div>
                                 <div class="slider-btn">
                                             <button class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s"><span>Submit Now</span> <i class="fal fa-long-arrow-right"></i></button>
                                         </div>
                             </div>
                             </div>

                     </form>

                             </div>
                         </div>
                     </div>
                 </div>
             </section>
             <!-- frequently-area-end -->



             <!-- video-area -->
             <section class="cta-area cta-bg pt-160 pb-160" style="background-image:url('{{ asset('assets/img/bg/cta_bg.png') }}')">
                 <div class="container">
                     <div class="row justify-content-center  align-items-center">
                         <div class="col-xl-6 col-lg-6 col-md-12">
                             <div class="section-title cta-title video-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
                                 <h2> We're <span>Qeducato</span> & We're Diffirent</h2>
                                 <p>Our community is being called to reimagine the future. As the only university where a renowned design school  colleges, </p>
                             </div>

                         </div>
                         <div class="col-lg-2 col-md-2">
                         </div>
                        <div class="col-lg-4">

                                 <div class="s-video-content">
                                     <a href="https://www.youtube.com/watch?v=gyGsPlt06bo" class="popup-video mb-50"><img src="{{ asset('assets/img/bg/play-button.png') }}" alt="circle_right"></a>

                                 </div>
                         </div>
                     </div>
                 </div>
             </section>
             <!-- video-area-end -->


<!-- video-area 1-->



             <!-- testimonial-area -->
             <section class="testimonial-area pt-120 pb-115 p-relative fix">
                  <div class="animations-01"><img src="{{ asset('assets/img/bg/an-img-03.png') }}" alt="an-img-01"></div>
                 <div class="animations-02"><img src="{{ asset('assets/img/bg/an-img-04.png') }}" alt="contact-bg-an-01"></div>
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="section-title text-center mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                                 <h5><i class="fal fa-graduation-cap"></i> Testimonial</h5>
                                 <h2>
                                  What Our Clients Says
                                 </h2>

                             </div>

                         </div>

                         <div class="col-lg-12">
                             <div class="testimonial-active wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                 <div class="single-testimonial text-center">
                                      <div class="qt-img">
                                     <img src="{{ asset('assets/img/testimonial/qt-icon.png') }}" alt="img">
                                     </div>
                                     <p>Curabitur ac tortor ante. Sed quis iaculis risus. Ut ultrices ligula aliquet odio tristique euismod. Donec efficitur dolor in turpis aliquet, at mollis.</p>
                                     <div class="testi-author">
                                         <img src="{{ asset('assets/img/testimonial/testi_avatar.png') }}" alt="img">
                                     </div>
                                     <div class="ta-info">
                                             <h6>Margie Dose</h6>
                                             <span>Web Developer</span>
                                         </div>
                                 </div>
                                 <div class="single-testimonial text-center">
                                      <div class="qt-img">
                                     <img src="{{ asset('assets/img/testimonial/qt-icon.png') }}" alt="img">
                                     </div>
                                     <p>Curabitur ac tortor ante. Sed quis iaculis risus. Ut ultrices ligula aliquet odio tristique euismod. Donec efficitur dolor in turpis aliquet, at mollis.</p>
                                     <div class="testi-author">
                                         <img src="{{ asset('assets/img/testimonial/testi_avatar_02.png') }}" alt="img">
                                     </div>
                                     <div class="ta-info">
                                             <h6>Rock Dloder</h6>
                                             <span>Web Developer</span>
                                         </div>
                                 </div>
                               <div class="single-testimonial text-center">
                                      <div class="qt-img">
                                     <img src="{{ asset('assets/img/testimonial/qt-icon.png') }}" alt="img">
                                     </div>
                                     <p>Curabitur ac tortor ante. Sed quis iaculis risus. Ut ultrices ligula aliquet odio tristique euismod. Donec efficitur dolor in turpis aliquet, at mollis.</p>
                                     <div class="testi-author">
                                         <img src="{{ asset('assets/img/testimonial/testi_avatar_03.png') }}" alt="img">
                                     </div>
                                     <div class="ta-info">
                                             <h6>Roboto Eorure</h6>
                                             <span>Web Developer</span>
                                         </div>
                                 </div>
                                 <div class="single-testimonial text-center">
                                      <div class="qt-img">
                                     <img src="{{ asset('assets/img/testimonial/qt-icon.png') }}" alt="img">
                                     </div>
                                     <p>Curabitur ac tortor ante. Sed quis iaculis risus. Ut ultrices ligula aliquet odio tristique euismod. Donec efficitur dolor in turpis aliquet, at mollis.</p>
                                     <div class="testi-author">
                                         <img src="{{ asset('assets/img/testimonial/testi_avatar.png') }}" alt="img">
                                     </div>
                                     <div class="ta-info">
                                             <h6>Margie Dose</h6>
                                             <span>Web Developer</span>
                                         </div>
                                 </div>
                                <div class="single-testimonial text-center">
                                      <div class="qt-img">
                                     <img src="{{ asset('assets/img/testimonial/qt-icon.png') }}" alt="img">
                                     </div>
                                     <p>Curabitur ac tortor ante. Sed quis iaculis risus. Ut ultrices ligula aliquet odio tristique euismod. Donec efficitur dolor in turpis aliquet, at mollis.</p>
                                     <div class="testi-author">
                                         <img src="{{ asset('assets/img/testimonial/testi_avatar_02.png') }}" alt="img">
                                     </div>
                                     <div class="ta-info">
                                             <h6>Rock Dloder</h6>
                                             <span>Web Developer</span>
                                         </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
             <!-- testimonial-area-end -->
           <!-- search-area -->
             <section class="search-area pt-120 pb-120 p-relative fix" style="background-image:url('{{ asset('assets/img/bg/search_bg.png') }}');  background-position: center center; background-repeat: no-repeat; background-size: cover;">
                 <div class="animations-10"><img src="{{ asset('assets/img/bg/an-img-04.png') }}" alt="an-img-01"></div>
                 <div class="animations-08"><img src="{{ asset('assets/img/bg/an-img-05.png') }}" alt="contact-bg-an-01"></div>
                 <div class="container">
                     <div class="row justify-content-center  align-items-center">
                           <div class="col-lg-8">
                             <div class="contact-bg">
                             <div class="section-title wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                                 <h2>
                                   Search For Courses
                                 </h2>
                                 <p>Our community is being called to reimagine the future. As the only university where a renowned design school comes together with premier colleges, we are making learning more relevant and transformational.</p>
                             </div>

                         <form action="http://htmldemo.zcubethemes.com/qeducato/mail.php" method="post" class="contact-form mt-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                             <div class="row">
                             <div class="col-lg-6">
                                 <div class="contact-field p-relative c-name mb-20">
                                     <input type="text" id="firstn2" name="firstn" placeholder="First Name" required>
                                 </div>
                             </div>

                             <div class="col-lg-6">
                                 <div class="contact-field p-relative c-subject mb-20">
                                     <input type="text" id="email3" name="email" placeholder="Email" required>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="contact-field p-relative c-option mb-20">
                                     <select name="instructor" id="instructor">
                                       <option value="instructore">Instructor</option>
                                       <option value="hot-stone-message">Hot Stone Message</option>
                                       <option value="facil-therophy">Facil & Therophy</option>
                                     </select>
                                 </div>
                             </div>
                                 <div class="col-lg-6">
                                     <div class="contact-field p-relative c-option mb-20">
                                         <select name="department" id="department">
                                           <option value="department">Department</option>
                                           <option value="hot-stone-message">Hot Stone Message</option>
                                           <option value="facil-therophy">Facil & Therophy</option>
                                         </select>
                                     </div>
                                 </div>
                           <div class="col-lg-6">
                                 <div class="contact-field p-relative c-option mb-20">
                                         <select name="campus" id="campus">
                                           <option value="campus">Campus</option>
                                           <option value="hot-stone-message">Hot Stone Message</option>
                                           <option value="facil-therophy">Facil & Therophy</option>
                                         </select>
                                     </div>
                             </div>
                                 <div class="col-lg-6">
                                 <div class="contact-field p-relative c-option mb-20">
                                         <select name="level" id="level">
                                           <option value="level">Level</option>
                                           <option value="hot-stone-message">Hot Stone Message</option>
                                           <option value="facil-therophy">Facil & Therophy</option>
                                         </select>
                                     </div>
                                 </div>
                             <div class="col-lg-12">

                                 <div class="slider-btn">
                                             <button class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s">Search Courses Here  <i class="fal fa-long-arrow-right"></i></button>
                                         </div>
                             </div>
                             </div>

                     </form>

                             </div>
                         </div>
                         <div class="col-lg-4">
                         </div>
                     </div>
                 </div>
             </section>
             <!-- search-area-end -->
             <!-- admission-area -->
             <section class="about-area about-p pt-120 pb-120 p-relative fix" style="background-image:url('{{ asset('assets/img/bg/admission_bg.png') }}'); background-repeat: no-repeat; background-position: top;">
                 <div class="container">
                     <div class="row justify-content-center align-items-center">
                          <div class="col-lg-6 col-md-12 col-sm-12">
                             <div class="s-about-img p-relative  wow fadeInLeft animated" data-animation="fadeInLeft" data-delay=".4s">
                                 <img src="{{ asset('assets/img/features/about_img.png') }}" alt="img">
                             </div>
                         </div>

                     <div class="col-lg-6 col-md-12 col-sm-12">
                             <div class="about-content s-about-content pl-15 wow fadeInRight  animated" data-animation="fadeInRight" data-delay=".4s">
                                 <div class="about-title second-title pb-25">
                                     <h2>Admission & Aid</h2>
                                 </div>
                                    <p class="txt-clr">Our community is being called to reimagine the future. As the only university where a renowned design school comes together with premier colleges, we are making learning more relevant and transformational.</p>
                                    <p class="txt-clr">At Estuidar University, we prepare you to launch your career by pro supportive, creative, and professional environment from which to learn practical skills, build a network of industry contacts.</p>
                                  <div class="slider-btn mt-20">
                                      <a href="about.html" class="btn ss-btn smoth-scroll">Read More <i class="fal fa-long-arrow-right"></i></a>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
             </section>
             <!-- admission-area-end -->

             <section class="cta-area cta-bg pt-160 pb-160" style="background-image:url('{{ asset('assets/img/bg/study.png') }}');">
                <div class="container">
                    <div class="row justify-content-center  align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="section-title cta-title video-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
                                {{-- <h2> We're <span>Qeducato</span> & We're Diffirent</h2> --}}
                                <h2 style="color:rgb(255, 255, 255)">Study abroad  <br>counselling</h2>
                                <p style="font-size: 32px;line-height:52px;color:rgb(255, 255, 255);">Our experienced counsellors helps students identify a program that perfectly matches both their educational and financial background.` </p>
                                <button class="ssbtn ss-btn" ><span>Read more</span> <i class="fal fa-long-arrow-right"></i></button>

                            </div>

                        </div>
                        {{-- <div class="col-lg-2 col-md-2">
                        </div> --}}
                       <div class="col-lg-6">


                        </div>
                    </div>
                </div>
            </section>


             <section class="cta-area cta-bg pt-160 pb-160" style="background-color:#9C2F20;)">
                <div class="container">
                    <div class="row justify-content-center  align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="section-title cta-title video-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
                                {{-- <h2> We're <span>Qeducato</span> & We're Diffirent</h2> --}}
                                <h2> Scholarship <br> Assistance</h2>
                                <p style="font-size: 32px;line-height:52px;">Our community is being called to reimagine the future. As the only university where a renowned design school  colleges, </p>
                                <button class="sbtn ss-btn" ><span>Read more</span> <i class="fal fa-long-arrow-right"></i></button>

                            </div>

                        </div>
                        {{-- <div class="col-lg-2 col-md-2">
                        </div> --}}
                       <div class="col-lg-6">

                                <div class="s-video-content">
                                    <img src="{{ asset('assets/img/bg/newside.png') }}" alt="circle_right">

                                </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- video-area 1-end -->


            <!-- video-area 2-->
            <section class="cta-area cta-bg pt-160 pb-160" style="background-color:#C1D8E5;)">
                <div class="container">
                    <div class="row justify-content-center  align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="section-title cta-title video-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
                                {{-- <h2> We're <span>Qeducato</span> & We're Diffirent</h2> --}}
                                <h2 style="color:black">Pre Departure <br> Guidance / Support</h2>
                                <p style="font-size: 32px;line-height:52px;color:black;">Our community is being called to reimagine the future. As the only university where a renowned design school  colleges, </p>
                                <button class="ssbtn ss-btn" ><span>Read more</span> <i class="fal fa-long-arrow-right"></i></button>

                            </div>

                        </div>
                        {{-- <div class="col-lg-2 col-md-2">
                        </div> --}}
                       <div class="col-lg-6">

                                <div class="s-video-content">
                                    <img src="{{ asset('assets/img/bg/sside.png') }}" alt="circle_right">

                                </div>
                        </div>
                    </div>
                </div>
            </section>

             <section class="cta-area cta-bg pt-160 pb-160" style="background-color:#E9F2FF;)">
                <div class="container">
                    <div class="row justify-content-center  align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="section-title cta-title video-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
                                {{-- <h2> We're <span>Qeducato</span> & We're Diffirent</h2> --}}
                                <h5 style="color:red">VALUE FOR PERSONALISED COACHING FOR EXAMS</h5>
                                <h4 style="color:#0E4389;font-size:42px;">Get High Band Score With</h4>
                                <h5 style="color:black;font-size:42px;">Santamonica Academy</h5>
                                <p style="font-size: 20px;line-height:30px;color:black;">Our community is being called to reimagine the future. As the only university where a renowned design school  colleges, Our community is being called to reimagine the future. As the only university where a renowned design school  colleges, Our community is being called to reimagine the future. As the only university where a renowned design school  colleges, Our community is being called to reimagine the future. As the only university where a renowned design school  colleges, </p>
                                <button class="sssbtn ss-btn" ><span>Submit Now</span> <i class="fal fa-long-arrow-right"></i></button>

                            </div>

                        </div>
                        {{-- <div class="col-lg-2 col-md-2">
                        </div> --}}
                       <div class="col-lg-6">

                        <div class="row">
                            <div class="col-lg-2">


                            </div>
                            <div class="col-lg-4 santa">
                                <img src="{{ asset('assets/img/bg/toefl1.png') }}" alt="circle_right">

                            </div>
                            <div class="col-lg-4 santa">
                                {{-- <div class="santa"> --}}
                                <img src="{{ asset('assets/img/bg/toefl2.png') }}" alt="circle_right">
                                {{-- </div> --}}
                            </div>
                            <div class="col-lg-2">
                            </div>

                            <div class="col-lg-4 santa">
                                {{-- <div class="santa"> --}}
                                <img src="{{ asset('assets/img/bg/toefl3.png') }}" alt="circle_right">
                                {{-- </div> --}}
                            </div>
                            <div class="col-lg-4 santa">
                                <img src="{{ asset('assets/img/bg/toefl4.png') }}" alt="circle_right">
                            </div>
                            <div class="col-lg-4 santa">
                                <img src="{{ asset('assets/img/bg/toefl5.png') }}" alt="circle_right">
                            </div>

                        </div>
                        </div>
                    </div>
                </div>
            </section>

               <!-- blog-area -->
               <section id="blog" class="blog-area p-relative fix pt-120 pb-90" style="background-image:url('{{ asset('assets/img/bg/blgbg.jpg') }}'); background-repeat: no-repeat; background-position:top;background-size: cover;">
                 <div class="container">
                     <div class="row align-items-center">
                         <div class="col-lg-12">
                             <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                                 {{-- <h6>Latest Blog & News</h6> --}}
                                 <h3>
                                  Read Our Latest Articles
                                 </h3>

                             </div>

                         </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4 col-md-6">
                             <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                 {{-- <div class="blog-thumb2">
                                     <a href="blog-details.html"><img src="{{ asset('assets/img/blog/inner_b1.jpg') }}" alt="img"></a>

                                 </div> --}}

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
                                            <div class="">
                                              <img src="{{ asset('assets/img/testimonial/flag.png') }}" alt="img">
                                            </div>
                                         </div>
                                        <div class="col-lg-6">
                                            Jason P Laforce
                                        </div>

                                        <div class="col-lg-4">
                                          <div class="blog-btn"><a href="blog-details.html"><span style="color: black;">Read More</span> <i class="fal fa-long-arrow-right"></i></a></div>

                                        </div>

                                  </div>
                                 </div>
                             </div>
                         </div>
                          <div class="col-lg-4 col-md-6">
                             <div class="single-post2 mb-30 hover-zoomin wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                 {{-- <div class="blog-thumb2">
                                     <a href="blog-details.html"><img src="{{ asset('assets/img/blog/inner_b2.jpg') }}" alt="img"></a>

                                 </div> --}}
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
                                            <div class="">
                                              <img src="{{ asset('assets/img/testimonial/flag.png') }}" alt="img">
                                            </div>
                                         </div>
                                        <div class="col-lg-6">
                                            Jason P Laforce
                                        </div>

                                        <div class="col-lg-4">
                                          <div class="blog-btn"><a href="blog-details.html"><span style="color: black;">Read More</span> <i class="fal fa-long-arrow-right"></i></a></div>

                                        </div>

                                  </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-4 col-md-6">
                             <div class="single-post2 mb-30 hover-zoomin wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                 {{-- <div class="blog-thumb2">
                                     <a href="blog-details.html"><img src="{{ asset('assets/img/blog/inner_b3.jpg') }}" alt="img"></a>

                                 </div> --}}
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
                                            <div class="">
                                              <img src="{{ asset('assets/img/testimonial/flag.png') }}" alt="img">
                                            </div>
                                         </div>
                                        <div class="col-lg-6">
                                            Jason P Laforce
                                        </div>

                                        <div class="col-lg-4">
                                          <div class="blog-btn"><a href="blog-details.html"><span style="color: black;">Read More</span> <i class="fal fa-long-arrow-right"></i></a></div>

                                        </div>

                                  </div>
                                 </div>
                             </div>
                         </div>


                     </div>

                     <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                        {{-- <h5><i class="fal fa-graduation-cap"></i> Our Events</h5> --}}
                        <div class="blog-btn "><a class="tstbtn" href="blog-details.html">Read More <i class="fal fa-long-arrow-right"></i></a></div>

                   </div>
                 </div>

                </section>
              <!-- blog-area-end -->

 <!-- brand-area -->
 <div class="brand-area pt-60 pb-60" style="background-image:url('{{ asset('assets/img/bg/blgbg.jpg') }}'); background-repeat: no-repeat; background-position:top;background-size: cover;">
    <div class="container">
        <div class="col-xl-6 col-lg-6 col-md-12">
            <h2>Youtube Video</h2>
        </div>
        <div class="row brand-active">
            <div class="col-xl-2">
                <div class="single-brand">
                    <img  style="height: 180px;" src="{{ asset('assets/img/brand/lg2.png') }}" alt="img">
                </div>
            </div>
            <div class="col-xl-2">
                <div class="single-brand">
                     <img  style="height: 180px;" src="{{ asset('assets/img/brand/lg1.png') }}" alt="img">
                </div>
            </div>
            <div class="col-xl-2">
                <div class="single-brand">
                     <img style="height: 180px;"  src="{{ asset('assets/img/brand/lg2.png') }}" alt="img">
                </div>
            </div>
            <div class="col-xl-2">
                <div class="single-brand">
                      <img style="height: 180px;"  src="{{ asset('assets/img/brand/lg3.png') }}" alt="img">
                </div>
            </div>
            <div class="col-xl-2">
                <div class="single-brand">
                     <img style="height: 180px;"  src="{{ asset('assets/img/brand/lg2.png') }}" alt="img">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- brand-area-end -->







<!-- circle-area -->
<div class="brand-area pt-60 pb-60" style="background-image:url('{{ asset('assets/img/bg/blgbg.jpg') }}'); background-repeat: no-repeat; background-position:top;background-size: cover;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">

                    <h3>
                        <u>Our Branches</u>
                    </h3>
                    <p style="font-size: 18px;color:black;">Curabitur sagittis libero tincidunt tempor finibus. Curabitur sagittis libero tincidunt tempor finibus. Mauris at dignissim Curabitur sagittis libero tincidunt tempor finibus. Mauris at dignissim Curabitur sagittis libero tincidunt tempor finibus. Mauris at dignissimMauris at dignissim ligula, nec tristique orci.</p>

                </div>

            </div>
        </div>
        <div class="row ">
            <div class="col-xl-3">
                <div>
                    <img  src="{{ asset('assets/img/brand/2.png') }}" alt="img">
                </div>
            </div>
            <div class="col-xl-3">
                <div>
                     <img   src="{{ asset('assets/img/brand/3.png') }}" alt="img">
                </div>
            </div>
            <div class="col-xl-3">
                <div>
                     <img  src="{{ asset('assets/img/brand/4.png') }}" alt="img">
                </div>
            </div>
            <div class="col-xl-3">
                <div>
                      <img   src="{{ asset('assets/img/brand/1.png') }}" alt="img">
                </div>
            </div>

        </div>
    </div>
</div>
<!-- circle-area-end -->






<!-- blog-area -->
{{-- <section id="blog" class="blog-area p-relative fix pt-120 pb-90" style="background-image:url('{{ asset('assets/img/bg/blog_bg.png') }}'); background-repeat: no-repeat; background-position: top;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                    <h5><i class="fal fa-graduation-cap"></i> Our Blog</h5>
                    <h2>
                     Latest Blog & News
                    </h2>

                </div>

            </div>
        </div>
        <div class="row">
           <div class="col-lg-4 col-md-6">
                <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                    <div class="blog-thumb2">
                        <a href="blog-details.html"><img src="{{ asset('assets/img/blog/inner_b1.jpg') }}" alt="img"></a>
                         <div class="date-home">
                            <i class="fal fa-calendar-alt"></i> 24th March 2023
                        </div>
                    </div>
                    <div class="blog-content2">
                       <div class="b-meta">
                            <div class="meta-info">
                                <ul>
                                    <li><i class="fal fa-user"></i> By Admin </li>
                                    <li><i class="fal fa-comments"></i> 3 Comments</li>
                                </ul>
                            </div>
                        </div>
                        <h4><a href="blog-details.html">Cras accumsan nulla nec lacus ultricies placerat.</a></h4>
                        <p>Curabitur sagittis libero tincidunt tempor finibus. Mauris at dignissim ligula, nec tristique orci.</p>
                        <div class="blog-btn"><a href="blog-details.html">Read More <i class="fal fa-long-arrow-right"></i></a></div>
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-6">
                <div class="single-post2 mb-30 hover-zoomin wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                    <div class="blog-thumb2">
                        <a href="blog-details.html"><img src="{{ asset('assets/img/blog/inner_b2.jpg') }}" alt="img"></a>
                         <div class="date-home">
                            <i class="fal fa-calendar-alt"></i> 24th March 2023
                        </div>
                    </div>
                    <div class="blog-content2">

                       <div class="b-meta">
                            <div class="meta-info">
                                <ul>
                                    <li><i class="fal fa-user"></i> By Admin </li>
                                    <li><i class="fal fa-comments"></i> 3 Comments</li>
                                </ul>
                            </div>
                        </div>
                        <h4><a href="blog-details.html">Dras accumsan nulla nec lacus ultricies placerat.</a></h4>
                        <p>Curabitur sagittis libero tincidunt tempor finibus. Mauris at dignissim ligula, nec tristique orci.</p>
                        <div class="blog-btn"><a href="blog-details.html">Read More <i class="fal fa-long-arrow-right"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-post2 mb-30 hover-zoomin wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                    <div class="blog-thumb2">
                        <a href="blog-details.html"><img src="{{ asset('assets/img/blog/inner_b3.jpg') }}" alt="img"></a>
                         <div class="date-home">
                            <i class="fal fa-calendar-alt"></i> 24th March 2023
                        </div>
                    </div>
                    <div class="blog-content2">

                       <div class="b-meta">
                            <div class="meta-info">
                                <ul>
                                    <li><i class="fal fa-user"></i> By Admin </li>
                                    <li><i class="fal fa-comments"></i> 3 Comments</li>
                                </ul>
                            </div>
                        </div>
                        <h4><a href="blog-details.html">Seas accumsan nulla nec lacus ultricies placerat.</a></h4>
                        <p>Curabitur sagittis libero tincidunt tempor finibus. Mauris at dignissim ligula, nec tristique orci.</p>
                        <div class="blog-btn"><a href="blog-details.html">Read More <i class="fal fa-long-arrow-right"></i></a></div>

                    </div>
                </div>
            </div>


        </div>
    </div>
  </section> --}}



 <!-- blog-area-end -->

 <!-- start events-->
 <section class="shop-area pt-120 pb-120 p-relative " data-animation="fadeInUp animated" data-delay=".2s" style="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-relative">
               <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                     {{-- <h5><i class="fal fa-graduation-cap"></i> Our Events</h5> --}}
                    <h3 style="color:red;">MEET UNIVERSITY/ INSTITUTION OFFICIALS @ SANTAMONICA</h3>
                    <h1 style="color: #0E4389;">Study Abroad - Events</h1>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
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
                                 <hr>
                                <div class="event-btn">
                                    <p><a href="#" class="readmore">
                                    READ MORE
                                 <span>→</span>
                                   </a></p>
                                </div>
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
                                 <hr>
                                <div class="event-btn">
                                    <p><a href="#" class="readmore">
                                    READ MORE
                                 <span>→</span>
                                   </a></p>
                                </div>
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
                                 <hr>
                                <div class="event-btn">
                                    <p><a href="#" class="readmore">
                                    READ MORE
                                 <span>→</span>
                                   </a></p>
                                </div>
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
                                 <hr>
                                <div class="event-btn">
                                    <p><a href="#" class="readmore">
                                    READ MORE
                                 <span>→</span>
                                   </a></p>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
</section>
 <!--end events -->


              <!-- newslater-area -->
              <!--<section class="newslater-area pt-60 pb-60" style="background-color: #125875;">
                 <div class="container" >
                     <div class="row align-items-center">
                         <div class="col-xl-7 col-lg-7">
                             <div class="section-title newslater-title">
                                 <div class="icon">
                                     <img src="{{ asset('assets/img/icon/send-mail.png') }}" alt="img">
                                 </div>
                                 <div class="text">
                                     <h2>Subscribe for Newsletter</h2>
                                     <p>Manage Your Business With Our Software</p>
                                 </div>

                             </div>
                         </div>
                         <div class="col-xl-5 col-lg-5">
                              <form name="ajax-form" id="contact-form4" action="#" method="post" class="contact-form newslater">
                                <div class="form-group p-relative">
                                   <input class="form-control" id="email2" name="email" type="email" placeholder="Email Address..." value="" required="">
                                   <button type="submit" class="btn btn-custom" id="send2">Subscribe Now</button>
                                </div>

                             </form>
                         </div>
                     </div>

                 </div>
             </section>-->
             <section class="cta-area cta-bg pt-160 pb-160" style="background-image:url('{{ asset('assets/img/bg/bgg.png') }}')">
                <div class="container">
                    <div class="row justify-content-center  align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title cta-title video-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
                                        {{-- <h2> We're <span>Qeducato</span> & We're Diffirent</h2> --}}
                                        <h2 style="color:black;font-size:32px;">We Are Glad To Have You Around</h2>
                                        <h2 style="color:red";>Our Students</h2>
                                        <p style="font-size:22px;line-height:32px;color:black;">Our community is being called to reimagine the future. As the only university where a renowned design school  colleges,Our community is being called to reimagine the future. As the only university where a renowned design school  colleges,Our community is being called to reimagine the future. As the only university where a renowned design school  colleges,Our community is being called to reimagine the future. As the only university where a renowned design school  colleges, </p>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <button class="stdbt1" ><span>Book A Consultation</span> </i></button>
                                </div>
                                <div class="col-lg-6">
                                    <button class="stdbt2" ><span>Subscribe Now</span><img src="{{ asset('assets/img/icon/youtube.png') }}" alt="img">
                                    </button>
                                </div>
                        </div>

                        </div>
                        {{-- <div class="col-lg-2 col-md-2">
                        </div> --}}
                       <div class="col-lg-6">

                        <iframe height="400" src="https://www.youtube.com/embed/tgbNymZ7vqY?controls=0">
                        </iframe>
                        </div>
                    </div>
                </div>
            </section>

             <!-- newslater-aread-end -->
             <div class="col-lg-12 col-md-12">
                <div class="section-title text-center mb-50">
                    <h5 style="font-size: 39px;">Testimonials</h5>
                </div>
                <div style="text-align: center;"><span><img src="{{ asset('assets/img/testimonial/testimonial.png') }}" class="" alt="img">
                </span></div>
            </div>
             <!--start-testimonials -->
             <section class="class-area pt-120 pb-120 p-relative fix" style="background-color:#ffffff!important;">
                <div class="container">
                    <div class="row">

                    </div>
                     <!-- class-item -->
                     <div class="row">
                        <div style="position: relative" class="col-lg-3 col-md-3">
                    <div class=" mb-30">
                       <div class="class-img">
                        <div class="countries">
                           <a href="single-courses-2.html"> <img style="height: 300px;width:200px;position: absolute;
                            bottom: 0;right:10%;" src="{{ asset('assets/img/testimonial/testimonial-sec-1.jpg') }}" class=""  alt="contact-bg-an-01"></a>
                        </div>
                    </div></div> </div>


                    <div style="position: relative" class="col-lg-3 col-md-3">
                        <div class=" mb-30">
                           <div class="class-img">
                            <div class="countries">
                               <a href="single-courses-2.html"> <img style="position: absolute;
                                bottom: 0;left:0;" src="{{ asset('assets/img/testimonial/testimonial-sec-2.jpg') }}" class=""  alt="contact-bg-an-01"></a>
                            </div>
                        </div></div> </div>


                        <div class="col-lg-3 col-md-3">
                            <div class=" mb-30">
                                 <div class="class-content">
                                    <p>Lorem ipsum dolor sit amet consectetur. Massa sed dapibus adipiscing felis at.
                                        Integer at dictum ullamcorper magna nam eget. Elementum semper ultrices quam elementum dignissim
                                        etiam velit molestie diam. Netus arcu varius lectus dignissim mollis lorem pulvinar tortor arcu.</p>
                                        <h4 style="color:#7B7B7B" class="title">Carolyn Willms</h4>
                                        <span>Global Accountability Officer</span>
                                </div>
                              </div> </div>


                              <div style="position: relative" class="col-lg-3 col-md-3">
                                <div class=" mb-30">
                                   <div class="class-img">
                                    <div class="countries">
                                       <a href="single-courses-2.html"> <img style="height: 300px;width:200px;position: absolute;
                                        bottom: 0;left:0;" src="{{ asset('assets/img/testimonial/testimonial-sec-3.jpg') }}" class=""  alt="contact-bg-an-01"></a>
                                    </div>
                                </div></div> </div>

                     <!-- class-img -->
                   </div>
        </div>
    </section>


             <!--end-testimonials -->
         </main>
         <!-- main-area-end -->
@endsection
