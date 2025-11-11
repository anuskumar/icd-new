@extends('admin_index')
@section('admin_content')
    <div class="page-wrapper" style="background-color: #f5f0fa;">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>College</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_panel.colleges') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $college_data->id ?? '' }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Institution Type<span class="text-red">*</span></label>
                                            <select class="form-control select2-select" name="institution_type_id"
                                                id="institution_type_id">
                                                <option value="">--select--</option>
                                                @foreach ($institution as $type)
                                                    <option value="{{ $type->id }}"
                                                        {{ old('institution_type_id', isset($college_data) ? $college_data->institution_type_id : '') == $type->id ? 'selected' : '' }}>
                                                        {{ $type->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('institution_type_id')
                                                <p class="text-red text-bold">{{ 'The institution type field is required.' }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>College Name<span class="text-red">*</span></label>
                                            <input type="text" name="name"
                                                value="{{ old('name', $college_data->name ?? '') }}">

                                            @error('name')
                                                <p class="text-red text-bold">{{ 'The college name field is required.' }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Courses<span class="text-red">*</span></label>
                                            <select class="select" name="course_id[]" multiple>
                                                <option value="">--select--</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}"
                                                        {{ in_array($course->id, old('course_id', isset($selected_course_ids) ? $selected_course_ids : [])) ? 'selected' : '' }}>
                                                        {{ $course->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('course_id')
                                                <p class="text-red text-bold">{{ 'The course name field is required.' }}</p>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Intake Date<span class="text-red">*</span></label>
                                            <div class="input-groupicon">
                                                <input type="text" placeholder="DD-MM-YYYY" name="intake_date"
                                                    class="datetimepicker"
                                                    value="{{ old('intake_date', isset($college_data) ? \Carbon\Carbon::parse($college_data->intake_date)->format('d-m-Y') : '') }}">

                                                <div class="addonset">
                                                    <img src="{{ asset('admin_assets/assets/img/icons/calendars.svg') }}"
                                                        alt="img">
                                                </div>
                                                @error('intake_date')
                                                    <p class="text-red text-bold">{{ 'The Intake date field is required.' }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                     {{-- <div class="col-lg-8 col-sm-8 col-8">
                                        <div class="row">
                                    <div class="row" id="course-row-wrapper">
    <!-- Initial row -->
                                <div class="course-row d-flex mb-2">
                                    <select class="form-control course-select mr-2" name="course_id[]">
                                        <option value="">-- Select Course --</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" class="form-control mr-2" name="course_amount[]" placeholder="Amount" />
                                    <button type="button" class="btn btn-danger remove-row">X</button>
                                </div>
                            </div>

<!-- Add New Button -->
                <button type="button" id="add-course-row" class="btn btn-primary mt-2">Add New Row</button>
                                     </div>
                                     </div> --}}

                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Intake Date2 (Optional)</label>
                                            <div class="input-groupicon">
                                                <input type="text" placeholder="DD-MM-YYYY" name="intake_date2"
                                                    class="datetimepicker"
                                                    value="{{ isset($college_data) && $college_data->intake_date2 ? \Carbon\Carbon::parse($college_data->intake_date2)->format('d-m-Y') : '' }}">
                                                <div class="addonset">
                                                    <img src="{{ asset('admin_assets/assets/img/icons/calendars.svg') }}"
                                                        alt="img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Intake Date3 (Optional)</label>
                                            <div class="input-groupicon">
                                                <input type="text" placeholder="DD-MM-YYYY" name="intake_date3"
                                                    class="datetimepicker"
                                                    value="{{ isset($college_data) && $college_data->intake_date3 ? \Carbon\Carbon::parse($college_data->intake_date3)->format('d-m-Y') : '' }}">
                                                <div class="addonset">
                                                    <img src="{{ asset('admin_assets/assets/img/icons/calendars.svg') }}"
                                                        alt="img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Country<span class="text-red">*</span></label>
                                            <select class="form-control select2-select" name="countryId" id="countryId">
                                                <option value="">--select--</option>
                                                @foreach ($country as $c)
                                                    <option value="{{ $c->id }}"
                                                        @if (isset($college_data) && $college_data->country_id == $c->id) selected @endif>
                                                        {{ $c->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('countryId')
                                                <p class="text-red text-bold">{{ 'The country name field is required.' }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>State<span class="text-red">*</span></label>
                                            <select name="state_id" id="state" class="form-control select2-select">
                                                <option value="">Select</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        @if (isset($college_data) && $college_data->state_id == $state->id) selected @endif>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('state_id')
                                                <p class="text-red text-bold">{{ 'The state name field is required.' }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>City</label>
                                            <select name="city_id" id="city" class="form-control select2-select">
                                                <option value="">Select</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        @if (isset($college_data) && $college_data->city_id == $city->id) selected @endif>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Graduation Marks(%)<span class="text-red">*</span></label>
                                            <div class="input-groupicon">
                                                <input type="text" name="graduation_marks"
                                                    value="{{ old('graduation_marks', $college_data->graduation_marks ?? '') }}">
                                                @error('graduation_marks')
                                                    <p class="text-red text-bold">
                                                        {{ 'The graduation mark field is required.' }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label> Status<span class="text-red">*</span></label>
                                            <select class="form-control select2-select " name="status">
                                                <option>Select</option>
                                                <option value="1"
                                                    {{ old('status', $college_data->status ?? '') == '1' ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="0"
                                                    {{ old('status', $college_data->status ?? '') == '0' ? 'selected' : '' }}>
                                                    In-Active</option>
                                            </select>
                                            @error('status')
                                                <p class="text-red text-bold">{{ 'The status field is required.' }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- for map and street view --}}
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="map_info">Map Location<span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="map_info" id="map_info"
                                                placeholder="Paste Google Maps iframe or link"
                                                value="{{ isset($college_data) ? $college_data->map_info : '' }}">
                                            @error('map_info')
                                                <p class="text-red text-bold">{{ 'The map location field is required.' }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="streetview_info">StreetView Location<span
                                                    class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="streetview_info"
                                                id="streetview_info" placeholder="Paste Google StreetView link"
                                                value="{{ isset($college_data) ? $college_data->streetview_info : '' }}">
                                            @error('streetview_info')
                                                <p class="text-red text-bold">
                                                    {{ 'The StreetView location field is required.' }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-4 col-12">
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-12">
                                    </div>
                                    @if (empty($college_data))
                                        <div class="col-lg-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label> Brochure<span class="text-red">*</span></label>
                                                <div class="">
                                                    <input type="file" name="brochure">
                                                    @error('brochure')
                                                        <p class="text-red text-bold">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>College Image<span class="text-red">*</span></label>
                                                <div class="">
                                                    <input type="file" name="image">
                                                    @error('image')
                                                        <p class="text-red text-bold">
                                                            {{ 'The college image (logo) field is required.' }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Banner Image<span class="text-red">*</span> </label>
                                                <div class="">
                                                    <input type="file" name="banner_image">
                                                    @error('banner_image')
                                                        <p class="text-red text-bold">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-lg-12 col-sm-12 col-12" style="display: inline-block">
                                    <div class="form-group">
                                        <label>Courses & Fee Amounts</label>
                                        <div id="course-row-wrapper" >
                                            <!-- Initial row -->

                                            @if ($selected_course_ids)
                                            @foreach ( $selected_course_ids as $val)
                                                     <div class="course-row d-flex mb-2" id="fee-row-{{ $val['id'] }}">
                                                        <div style="width: 70%;">
                                                        <select class="form-control course-select mr-2" name="course_id_edit[]">

                                                            @foreach ($courses as $course)
                                                                <option value="{{ $course->id }}" {{ ($course->id == $val['course_id']) ? 'selected' : '' }}>{{ $course->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                        <input type="hidden" name="selected_course_id[]" value="{{ $val['id'] }}">
                                                        <input type="number" style="width:50%" class="form-control mr-2" value="{{ $val['course_amount'] }}" name="course_amount_edit[]" placeholder="Amount" />
                                                        <button type="button" class="btn btn-danger remove-row-edit" onclick="deleteExistingFee({{ $val['id'] }})">X</button>
                                                    </div>
                                            @endforeach
                                                <br>
                                            @endif
                                            <div class="course-row d-flex mb-2">
                                                <div style="width: 70%;">
                                                <select class="form-control course-select mr-2" name="course_id[]">
                                                    <option value="">-- Select Course --</option>
                                                    @foreach ($courses as $course)
                                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                                <input type="number" style="width:50%" class="form-control mr-2" name="course_amount[]" placeholder="Amount" />
                                                <button type="button" class="btn btn-danger remove-row">X</button>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary mt-2" id="add-course-row">Add New </button>
                                    </div>
                                </div>

                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Content</label>
                                            <textarea name="content" id="editor">{{ old('content', $college_data->content ?? '') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Admission</label>
                                            <textarea name="admission" id="admission_editor">{{ old('admission', $college_data->admission ?? '') }}</textarea>
                                        </div>
                                    </div>

                                    {{-- <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Tagging with multi-value select boxes</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Set tags: true to convert select 2 in Tag mode.</p>
                                                <select class="form-control tagging" multiple="multiple">
                                                    <option>orange</option>
                                                    <option>white</option>
                                                    <option>purple</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                    {{-- <div class="col-lg-12">
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Single File Upload</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                                    <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                    <label class="custom-file-container__custom-file " >
                                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div style="margin-top: 0px!important;
                                                    margin-bottom:0px!important;
                                                    height:91px!important;
                                                    width: 25%!important;"class="custom-file-container__image-preview "></div>
                                                </div>
                                            </div>

                                    </div>
                                </div> --}}
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-submit me-2">Submit</button>
                                    <a href="{{ route('admin_panel.collegelist') }}" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('contentjs')
    <script>
        $(document).ready(function() {

            $('#countryId').on('change', function() {
                var countryId = $(this).val();
                if (countryId) {
                    $.ajax({
                        // url: ' route("getCity", ["countryId" => countryId]) ',
                        url: '/get-state/' + countryId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#state').empty().append(
                                '<option value="">Select state</option>');
                            $.each(data, function(id, name) {
                                $('#state').append('<option value="' + id + '">' +
                                    name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#state').empty().append('<option value="">Select state</option>');

                }
            });

            $('#state').on('change', function() {
                var stateId = $(this).val();
                if (stateId) {
                    $.ajax({
                        url: '/get-cities/' + stateId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {

                            $('#city').empty().append('<option value="">Select city</option>');
                            $.each(data, function(id, name) {
                                $('#city').append('<option value="' + id + '">' + name +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('#city').empty().append('<option value="">Select city</option>');
                }
            });

            // function loadSubcategories(categoryId, selectedSubcategoryId = null) {
            //     $.ajax({
            //         url: '{{ route('getSubcategories') }}',
            //         method: 'POST',
            //         data: {
            //             _token: '{{ csrf_token() }}',
            //             category_id: categoryId
            //         },
            //         success: function(response) {
            //             var subcategoryDropdown = $('#subcategory_id');
            //             subcategoryDropdown.empty();
            //             subcategoryDropdown.append('<option>--select--</option>');
            //             $.each(response, function(index, subcategory) {
            //                 subcategoryDropdown.append('<option value="' + subcategory.id +
            //                     '"' +
            //                     (subcategory.id == selectedSubcategoryId ? ' selected' :
            //                         '') + '>' + subcategory.name + '</option>');
            //             });
            //         }
            //     });
            // }

        });
    </script>
    <script>
    $(document).ready(function () {
        // Initialize Select2 on initial dropdown
        $('.course-select').select2();

        // Add New Row
        $('#add-course-row').click(function () {
            let courseOptions = @json($courses);

            let optionsHtml = `<option value="">-- Select Course --</option>`;
            courseOptions.forEach(function(course) {
                optionsHtml += `<option value="${course.id}">${course.name}</option>`;
            });

            let newRow = `
                <div class="course-row d-flex mb-2">
                    <div style="width: 70%;">
                    <select class="form-control course-select mr-2" name="course_id[]">
                        ${optionsHtml}
                    </select>
                    </div>
                    <input type="number" class="form-control mr-2" name="course_amount[]" placeholder="Amount" style="width:50%;" />
                    <button type="button" class="btn btn-danger remove-row">X</button>
                </div>
            `;

            $('#course-row-wrapper').append(newRow);

            // Reinitialize Select2 for the new select box
            $('.course-select').last().select2();
        });

        // Remove Row
        $(document).on('click', '.remove-row', function () {
            $(this).closest('.course-row').remove();
        });
    });

    function deleteExistingFee(val){


       Swal.fire({
                    title: "Are you sure ?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    // confirmButtonColor: "#3085d6",
                    // cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    reverseButtons: true
                    }).then((result) => {
                    if (result.isConfirmed) {
                $.ajax({
                    url: '{{ route('collagecourse.delete') }}',
                    method: 'delete',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: val
                    },
                    success: function(response) {
                        if(response.success === true){

                            $('#fee-row-' + val).remove();

                        }
                    }
                });

                    }
                    });


    }
</script>

@endsection
