@extends('admin_index')
@section('admin_content')
    <div class="page-wrapper" style="background-color: #f5f0fa;">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Course</h4>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_panel.courses') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $course_data->id ?? '' }}">
                        <div class="row">
                            {{-- <div class="col-lg-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label>Main Menu</label>
                                    <select class="form-control select2-select" name="category_id" id="category_id">
                                        <option>--select--</option>
                                        @foreach ($category as $category)
                                            <option value="{{ $category->id }}"
                                                @if (isset($course_data) && $course_data->category_id == $category->id) selected @endif>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                            {{-- <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Sub Menu</label>
                                    <select class="form-control select2-select" name="subcategory_id" id="subcategory_id">
                                        <option>--select--</option>
                                        <!-- Subcategories will be loaded here -->
                                    </select>
                                </div>
                            </div> --}}

                            <div class="col-lg-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label>Course Name</label>
                                    <input type="text" name="name" value="{{ $course_data->name ?? '' }}">
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Course Type</label>
                                    <select class="form-control select2-select" name="course_type_id" id="course_type_id">
                                        <option value="">--select--</option>
                                        @foreach ($course as $type)
                                            <option value="{{ $type->id }}"
                                                @if (isset($course_data) && $course_data->course_type_id == $type->id) selected @endif>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label>Duration in Months</label>
                                    <input type="number" class="form-control" name="duration" value="{{ $course_data->duration ?? '' }}">
                                </div>
                            </div>



                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group"> <label>Qualification</label> <select
                                        class="form-control select2-select" name="qualification_id" id="qualification_id">
                                        <option value="">--select--</option>
                                        @foreach ($qualifications as $qualification)
                                            <option value="{{ $qualification->id }}"
                                                @if (isset($course_data) && $course_data->qualification_id == $qualification->id) selected @endif>
                                                {{ $qualification->name }} </option>
                                        @endforeach
                                    </select> </div>
                            </div>

                            <div class="col-lg-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label>Exams Accepted</label>
                                    <select class="select" name="exam_id[]" multiple>
                                        <option>--select--</option>
                                        @foreach ($exam as $exam)
                                            <option value="{{ $exam->id }}"
                                                {{ in_array($exam->id, $examIds) || (is_array(old('exam_id')) && in_array($exam->id, old('exam_id'))) ? 'selected' : '' }}>
                                                {{ $exam->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="select" name="status">
                                        <option>--select--</option>
                                        <option value="1"
                                            {{ old('status', $course_data->status ?? '') == '1' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0"
                                            {{ old('status', $course_data->status ?? '') == '0' ? 'selected' : '' }}>
                                            In-Active</option>
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="col-lg-12 col-sm-12 col-12"> --}}
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" required placeholder="Must Include the course description">{{ old('description', $course_data->description ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" id="editor">{{ old('content', $course_data->content ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Admission</label>
                                <textarea name="admission" id="admission_editor">{{ old('admission', $course_data->admission ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="#" class="btn btn-cancel">Cancel</a>
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
            function loadSubcategories(categoryId, selectedSubcategoryId = null) {
                $.ajax({
                    url: '{{ route('getSubcategories') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        category_id: categoryId
                    },
                    success: function(response) {
                        var subcategoryDropdown = $('#subcategory_id');
                        subcategoryDropdown.empty();
                        subcategoryDropdown.append('<option>--select--</option>');
                        $.each(response, function(index, subcategory) {
                            subcategoryDropdown.append('<option value="' + subcategory.id +
                                '"' +
                                (subcategory.id == selectedSubcategoryId ? ' selected' :
                                    '') + '>' + subcategory.name + '</option>');
                        });
                    }
                });
            }

            $('#category_id').on('change', function() {
                var categoryId = $(this).val();
                loadSubcategories(categoryId);
            });

            @if (isset($course_data))
                var initialCategoryId = {{ $course_data->category_id }};
                var initialSubcategoryId = {{ $course_data->subcategory_id }};
                loadSubcategories(initialCategoryId, initialSubcategoryId);
            @endif
        });
    </script>
@endsection
