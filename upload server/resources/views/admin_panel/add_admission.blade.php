@extends('admin_index')
@section('admin_content')

<div class="page-wrapper" style="background-color: #f5f0fa;">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Admission</h4>
                <!-- <h6>Create new product Category</h6> -->
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin_panel.manage-admission')}}" method="post" enctype="multipart/form-data">
					@csrf
                    {{-- <input type="text" name="name" > --}}
                    <input type="hidden" name="id" value="{{$admission->id ?? ''}}">
                    <div class="row">

                        <div class="col-lg-3 col-sm-3 col-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2-select" name="category_id">
                                    <option>--select--</option>
                                    @foreach($category as $category)
                                    <option value="{{ $category->id }}"
                                            @if(isset($admission) && $admission->category_id == $category->id)
                                                selected
                                            @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-3 col-12">
                            <div class="form-group">
                                <label>Course</label>
                                <select class="form-control select2-select" name="course_id">
                                    <option>--select--</option>
                                    @foreach($course as $course)
                                    <option value="{{ $course->id }}"
                                            @if(isset($admission) && $admission->course_id == $course->id)
                                                selected
                                            @endif>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-3 col-12">
                            <div class="form-group">
                                <label>College</label>
                                <select class="form-control select2-select" name="college_id">
                                    <option>--select--</option>
                                    @foreach($college as $college)
                                    <option value="{{ $college->id }}"
                                            @if(isset($admission) && $admission->college_id == $college->id)
                                                selected
                                            @endif>
                                        {{ $college->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-3 col-sm-3 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control select2-select">
                                    <option>--select--</option>
                                    <option value="1" {{ old('status', $admission->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $admission->status ?? '') == '0' ? 'selected' : '' }}>In-Active</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" id="editor">{{ old('content',$admission->content ?? '')  }}</textarea>
                            </div>
                        </div>


                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                {{-- <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a> --}}
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
