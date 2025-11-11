@extends('admin_index')
@section('admin_content')
    <div class="page-wrapper" style="background-color: #f5f0fa;">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Exam</h4>
                </div>
            </div>
            <!-- /add -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_panel.manage-exam') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $exam_data->id ?? '' }}">
                        <div class="row">
                            {{-- <div class="col-lg-3 col-sm-3 col-12">
                            <div class="form-group">
                                <label>Main Menu</label>
                                <select class="form-control select2-select" name="category_id" id="category_id">
                                    <option>--select--</option>
                                    @foreach ($category as $cat)
                                    <option value="{{ $cat->id }}"
                                            @if (isset($exam_data) && $exam_data->category_id == $cat->id)
                                                selected
                                            @endif>
                                        {{ $cat->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                            {{-- <div class="col-lg-3 col-sm-3 col-12">
                            <div class="form-group">
                                <label>Sub Menu</label>
                                <select class="form-control select2-select" name="subcategory_id" id="subcategory_id">
                                    <option>--select--</option>
                                    @if (isset($subcategory))
                                        @foreach ($subcategory as $subcat)
                                        <option value="{{ $subcat->id }}"
                                                @if (isset($exam_data) && $exam_data->subcategory_id == $subcat->id)
                                                    selected
                                                @endif>
                                            {{ $subcat->name }}
                                        </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div> --}}

                            <div class="col-lg-3 col-sm-3 col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $exam_data->name ?? '' }}">
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-3 col-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control select2-select">
                                        <option>--select--</option>
                                        <option value="1"
                                            {{ old('status', $exam_data->status ?? '') == '1' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0"
                                            {{ old('status', $exam_data->status ?? '') == '0' ? 'selected' : '' }}>In-Active
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-3 col-12">
                                <div class="form-group">
                                    <label>Result Link:</label>
                                    <input type="text" name="result" value="{{ $exam_data->result ?? '' }}">
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-3 col-12">
                                <div class="form-group">
                                    <label>Sample Paper</label>
                                    <div class="">
                                        <input type="file" name="s_paper">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-12">
                                <div class="form-group">
                                    <label>Guide</label>
                                    <div class="">
                                        <input type="file" name="guide">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Syllabus</label>
                                    <textarea name="syllabus" id="syllabus_editor">{{ old('syllabus', $exam_data->syllabus ?? '') }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="content" id="editor">{{ old('content', $exam_data->content ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">

                                    <button type="submit" class="btn btn-submit me-2">Submit</button>
                                    <a href="#" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /add -->
        </div>
    </div>
@endsection

@section('contentjs')
    <script>
        $(document).ready(function() {
            $('#category_id').on('change', function() {
                var categoryId = $(this).val();
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
                            subcategoryDropdown.append('<option value="' + subcategory
                                .id + '">' + subcategory.name + '</option>');
                        });

                        // Pre-select the subcategory if editing
                        @if (isset($exam_data))
                            var selectedSubcategoryId = '{{ $exam_data->subcategory_id }}';
                            if (selectedSubcategoryId) {
                                $('#subcategory_id').val(selectedSubcategoryId);
                            }
                        @endif
                    }
                });
            });

            // Trigger the change event if editing
            @if (isset($exam_data) && $exam_data->category_id)
                $('#category_id').trigger('change');
            @endif
        });
    </script>
@endsection
