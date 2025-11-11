@extends('admin_index')
@section('admin_content')
    <div class="page-wrapper cardhead">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Form Wizard</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Form Wizard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">

                <!-- Lightbox -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Basic Wizard</h4>
                        </div>
                        <div class="card-body">
                            <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                <ul class="twitter-bs-wizard-nav">
                                    <li class="nav-item">
                                        <a href="#seller-details" id="basic-info-tab" class="nav-link" data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Seller Details">
                                                <i class="far fa-user"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#company-document" id="address-info-tab" class="nav-link"
                                            data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Company Document">
                                                <i class="fas fa-map-pin"></i>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#bank-detail" id="education-info-tab" class="nav-link" data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Bank Details">
                                                <i class="fas fa-credit-card"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <!-- wizard-nav -->

                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    <div class="tab-pane" id="seller-details">
                                        <div class="mb-4">
                                            <h5>Enter Your Personal Details</h5>
                                        </div>
                                        <form id="basic-info-form" action="{{ route('admin_panel.students') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id"
                                                value="{{ old('id', $student_data->id ?? '') }}">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="basicpill-firstname-input" class="form-label">First
                                                            name</label>
                                                        <input type="text" name="first_name" class="form-control"
                                                            value="{{ $student_data->first_name ?? '' }}"
                                                            id="basicpill-firstname-input">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="basicpill-lastname-input" class="form-label">Last
                                                            name</label>
                                                        <input type="text" name="last_name" class="form-control"
                                                            value="{{ $student_data->last_name ?? '' }}"
                                                            id="basicpill-lastname-input">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="basicpill-dob-input" class="form-label">Date of
                                                            Birth</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <img src="{{ asset('admin_assets/assets/img/icons/calendars.svg') }}"
                                                                    alt="Calendar Icon" style="width: 16px; height: 16px;">
                                                            </span>
                                                            <input type="text" class="form-control datetimepicker"
                                                                placeholder="DD-MM-YYYY" id="basicpill-dob-input"
                                                                name="birth_date"
                                                                value="{{ isset($student_data) ? \Carbon\Carbon::parse($student_data->birth_date)->format('d-m-Y') : '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="basicpill-country-input" class="form-label">Counrty of
                                                            Citizenship</label>
                                                        <select class="form-control select2-select" name="countryId"
                                                            id="countryId">
                                                            <option value="">--select--</option>
                                                            @foreach ($country as $c)
                                                                <option value="{{ $c->id }}"
                                                                    @if (isset($student_data) && $student_data->country_id == $c->id) selected @endif>
                                                                    {{ $c->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="basicpill-passport_number-input"
                                                            class="form-label">Passport
                                                            Number</label>
                                                        <input type="text" name="passport_number" class="form-control"
                                                            value="{{ $student_data->passport_number ?? '' }}"
                                                            id="basicpill-passport_number-input">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="basicpill-passport_exp-input"
                                                            class="form-label">Passport Expiry Date</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <img src="{{ asset('admin_assets/assets/img/icons/calendars.svg') }}"
                                                                    alt="Calendar Icon"
                                                                    style="width: 16px; height: 16px;">
                                                            </span>
                                                            <input type="text" name="passport_expiry"
                                                                placeholder="DD-MM-YYYY"
                                                                class="form-control datetimepicker"
                                                                id="basicpill-passport_exp-input"
                                                                value="{{ isset($student_data) ? \Carbon\Carbon::parse($student_data->passport_expiry)->format('d-m-Y') : '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="basicpill-gender-input"
                                                            class="form-label">Gender</label>
                                                        <select class="form-control select2-select" name="gender">
                                                            {{-- <option>--select--</option> --}}
                                                            <option value="1"
                                                                {{ old('gender', $student_data->gender ?? '') == 'Male' ? 'selected' : '' }}>
                                                                Male</option>
                                                            <option value="2"
                                                                {{ old('gender', $student_data->gender ?? '') == 'Female' ? 'selected' : '' }}>
                                                                Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="basicpill-email-input"
                                                            class="form-label">Email</label>
                                                        <input type="email" name="email"
                                                            class="form-control select2-select"
                                                            value="{{ $student_data->email ?? '' }}"
                                                            id="basicpill-email-input">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="basicpill-phone-input" class="form-label">Phone
                                                            Number</label>
                                                        <input type="text" name="phone"
                                                            class="form-control select2-select"
                                                            value="{{ $student_data->phone ?? '' }}"
                                                            id="basicpill-phone-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-check form-switch"> <input class="form-check-input"
                                                            type="checkbox" id="togglePasswordVisibility"> <label
                                                            class="form-check-label" for="togglePasswordVisibility">Show
                                                            Passwords</label> </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3"> <label for="password"
                                                            class="form-label">Password</label> <input type="password"
                                                            name="password" id="password" class="form-control"
                                                            value="{{ $student_data->user ? $student_data->user->password2 : '' }}"
                                                            required> </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3"> <label for="password_confirmation"
                                                            class="form-label">Confirm Password</label> <input
                                                            type="password" name="password_confirmation"
                                                            id="password_confirmation" class="form-control"
                                                            value="{{ $student_data->user ? $student_data->user->password2 : '' }}"
                                                            required> </div>
                                                </div>
                                            </div>

                                            <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                <li class="next">
                                                    <button type="submit" id="saveAndNextBtn" class="btn btn-primary">
                                                        Save & Next <i class="bx bx-chevron-right ms-1"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </form>

                                    </div>
                                    <!-- tab pane -->

                                    <div class="tab-pane" id="company-document">
                                        <div>
                                            <div class="mb-4">
                                                <h5>Enter Your Address Details</h5>
                                            </div>
                                            <form id="address-info-form" action="{{ route('admin_panel.students') }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="id"
                                                    value="{{ old('id', $student_data->id ?? '') }}">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-address-input"
                                                                class="form-label">Address
                                                            </label>
                                                            <input type="text" name="address" class="form-control"
                                                                value="{{ $student_data->student_address->address ?? '' }}"
                                                                required id="basicpill-address-input">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-city-input" class="form-label">City /
                                                                Town</label>
                                                            <input type="text" name="city" class="form-control"
                                                                value="{{ $student_data->student_address->city ?? '' }}"
                                                                id="basicpill-city-input" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="country_add" class="form-label">Counrty</label>
                                                            <select name="country_add" id="country_add"
                                                                class="form-control" required>
                                                                @foreach ($country as $ctry)
                                                                    <option value="{{ $ctry->id }}"
                                                                        {{ $student_data->student_address && $student_data->student_address->country == $ctry->id ? 'selected' : '' }}>
                                                                        {{ $ctry->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="state_add" class="form-label">Province /
                                                                State</label>
                                                            <select class="form-control select2-select" name="state_add"
                                                                id="state_add" required>
                                                                <option>--select--</option>
                                                                @if ($student_data->student_address)
                                                                    @foreach ($states as $state)
                                                                        <option value="{{ $state->id }}"
                                                                            {{ $student_data->student_address->state == $state->id ? 'selected' : '' }}>
                                                                            {{ $state->name }} </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-cstno-input" class="form-label">Postal /
                                                                ZipCode</label>
                                                            <input type="text" name="zipcode" id="zipcode"
                                                                value="{{ $student_data->student_address->zipcode ?? '' }}"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                    <li class="previous"> <a href="javascript: void(0);"
                                                            class="btn btn-primary" onclick="prevTab()"> <i
                                                                class="bx bx-chevron-left me-1"></i> Previous </a> </li>
                                                    <li class="next"> <button type="submit" id="saveAndNextBtn"
                                                            class="btn btn-primary"> Save & Next <i
                                                                class="bx bx-chevron-right ms-1"></i> </button> </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- tab pane -->
                                    <div class="tab-pane" id="bank-detail">
                                        <div>
                                            <div class="mb-4">
                                                <h5>Education Summary</h5>
                                            </div>
                                            <form id="education-info-form" action="{{ route('admin_panel.students') }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="id"
                                                    value="{{ old('id', $student_data->id ?? '') }}">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-education-input"
                                                                class="form-label">Country Of Education</label>
                                                            <select name="country_edu" id="country_edu"
                                                                class="form-control">
                                                                @foreach ($country as $cntry)
                                                                    <option value="{{ $cntry->id }}"
                                                                        {{ $student_data->student_education && $student_data->student_education->country_of_education == $cntry->id ? 'selected' : '' }}>
                                                                        {{ $cntry->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="highest_level_of_education"
                                                                class="form-label">Highest Level of Education</label>
                                                            <select class="form-control select2-select"
                                                                name="highest_level_of_education"
                                                                id="highest_level_of_education" required>
                                                                <option value="">--select--</option>
                                                                @foreach ($qualifications as $qualification)
                                                                    <option  value="{{ $qualification->id }}"
                                                                        {{ $student_data->student_education && $student_data->student_education->highest_education == $qualification->id ? 'selected' : '' }}>
                                                                        {{ $qualification->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-cardno-input" class="form-label">Grading
                                                                Scheme</label>
                                                            <input type="text" name="grading_scheme"
                                                                class="form-control" id="basicpill-cardno-input"
                                                                value="{{ $student_data->student_education->grading_scheme ?? '' }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="grade_scale">Grade Scale</label>
                                                            <select name="grade_scale" class="form-control"
                                                                id="grade_scale" required>
                                                                <option value="">Select Scale</option>
                                                                <option value="A-F"
                                                                    {{ $student_data->student_education && $student_data->student_education->grade_scale == 'A-F' ? 'selected' : '' }}>
                                                                    A-F</option>
                                                                <option value="1-10"
                                                                    {{ $student_data->student_education && $student_data->student_education->grade_scale == '1-10' ? 'selected' : '' }}>
                                                                    1-10</option>
                                                                <option value="Percentage"
                                                                    {{ $student_data->student_education && $student_data->student_education->grade_scale == 'Percentage' ? 'selected' : '' }}>
                                                                    Percentage</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-average-input" class="form-label">Grade
                                                                Average</label>
                                                            <input type="number" name="grade_average"
                                                                class="form-control" id="basicpill-average-input"
                                                                value="{{ $student_data->student_education->grade_average ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                    <li class="previous">
                                                        <a href="javascript: void(0);" class="btn btn-primary"
                                                            onclick="prevTab()">
                                                            <i class="bx bx-chevron-left me-1"></i> Previous
                                                        </a>
                                                    </li>
                                                    <li class="float-end">
                                                        <!-- Save Changes Button with Modal Trigger -->
                                                        <button type="submit" id="saveChangesBtn"
                                                            class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target=".confirmModal">
                                                            Save Changes
                                                        </button>
                                                    </li>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- tab pane -->
                                </div>
                                <!-- end tab content -->
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                </div>
                <!-- /Wizard -->

            </div>

        </div>

    </div>
@endsection

@section('contentjs')
    <script>
        $(document).ready(function() {
            function submitForm(formId, successMessage) {
                $(document).on('submit', formId, function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log('Response:', response);
                            if (response.success) {
                                // alert(successMessage || response.message ||
                                //     'Data saved successfully');
                                 toastr.success(successMessage || response.message ||'Data saved successfully');

                                if (formId === '#basic-info-form') {
                                    $('#address-info-tab').tab('show');
                                    $('#address-info-form').find('input[name="id"]').val(
                                        response.student_id);
                                } else if (formId === '#address-info-form') {
                                    $('#education-info-tab').tab('show');
                                    $('#education-info-form').find('input[name="id"]').val(
                                        response.student_id);
                                }
                            } else {
                                alert('Error: ' + (response.message ||
                                    'An unexpected error occurred.'));
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error occurred:', xhr.responseText);
                            alert('An error occurred while processing the request.');
                        }
                    });
                });
            }

            submitForm('#basic-info-form', 'Student data saved successfully');
            submitForm('#address-info-form', 'Address data saved successfully');
            submitForm('#education-info-form', 'Education data saved successfully');

            $('.twitter-bs-wizard-nav .nav-link').first().tab('show');

            $('#country_add').on('change', function() {
                var countryID = $(this).val();
                if (countryID) {
                    $.ajax({
                        url: '/getStates/' + countryID,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#state_add').empty().append('<option>--select--</option>');
                            $.each(data, function(key, value) {
                                $('#state_add').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });

                            var selectedStateID =
                                "{{ $student_data->student_address ? $student_data->student_address->state : '' }}";
                            if (selectedStateID) {
                                $('#state_add').val(selectedStateID);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error occurred:', xhr.responseText);
                            // alert('An error occurred while fetching the states.');
                toastr.error('An error occurred while fetching the states.');

                        }
                    });
                } else {
                    $('#state_add').empty().append('<option>--select--</option>');
                }
            });

            var initialCountryID = $('#country_add').val();
            if (initialCountryID) {
                $('#country_add').trigger('change');
            }

            const togglePasswordVisibility = document.querySelector('#togglePasswordVisibility');
            const passwordField = document.querySelector('#password');
            const confirmPasswordField = document.querySelector('#password_confirmation');
            togglePasswordVisibility.addEventListener('change', function() {
                const type = this.checked ? 'text' : 'password';
                passwordField.type = type;
                confirmPasswordField.type = type;
            });
        });
    </script>
@endsection
