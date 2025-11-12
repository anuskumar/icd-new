@include('layouts.header')
@include('layouts.topmenubar')

<style>
    .iti {
        width: 100% !important;
    }
    .form-control {
        border: 1px solid #ced4da !important; /* Added border */
        border-radius: .25rem; /* Optional: for rounded corners */
        padding: .375rem .75rem; /* Optional: for consistent padding */
    }
    .contact-form {
        background-color: #f8f9fa; /* Light background color */
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
</style>

<!-- breadcrumb-area-end -->
<section class="breadcrumb-area d-flex align-items-center"
    style="background-image: url('{{ asset('assets/img/testimonial/test-bg.png') }}');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->
<!-- contact-area -->
<section id="contact" class="contact-area after-none contact-bg pt-120 pb-120 p-relative fix">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-info">
                    <h4>Get In Touch</h4>
                    <p>Have a question or need assistance? Fill out the form below and we'll get back to you as soon as
                        possible.</p>
                    <div class="contact-info-box mt-4">
                        <div class="info-box-item d-flex align-items-start mb-3">
                            <i class="fal fa-map-marker-check me-3 mt-1"></i>
                            <span>
                                ICD<br>
                                Housing Board Junction,<br>
                                Thampanoor Thiruvananthapuram,<br>
                                Kerala
                            </span>
                        </div>
                        <div class="info-box-item d-flex align-items-start mb-3">
                            <i class="fal fa-globe me-3 mt-1"></i>
                            <a href="https://www.icdeducation.com">www.icdeducation.com</a>
                        </div>
                        <div class="info-box-item d-flex align-items-start mb-3">
                            <i class="fal fa-envelope me-3 mt-1"></i>
                            <a href="mailto:bookmyuniversity@gmail.com">bookmyuniversity@gmail.com</a>
                        </div>
                        <div class="info-box-item d-flex align-items-start">
                            <i class="fal fa-phone me-3 mt-1"></i>
                            <a href="tel:0471 4061700">0471 4061700</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
                    <h4>Contact Us</h4>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('contact.submit') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Name <span>*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email <span>*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone">Phone <span>*</span></label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="course_country_interest">Course/Country Interest <span>*</span></label>
                                    <input type="text" class="form-control" id="course_country_interest"
                                        name="course_country_interest" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="enquiry">Extra Enquiry</label>
                            <textarea class="form-control" id="enquiry" name="enquiry" rows="5"></textarea>
                        </div>

                        <button type="submit"  class="btn btn-primary mt-2" style="float: right">Submit</button>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-area-end -->

@include('layouts.footer')
@include('layouts.footer_js')
