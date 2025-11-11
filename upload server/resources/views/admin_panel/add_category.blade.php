@extends('admin_index')
@section('admin_content')

<div class="page-wrapper" style="background-color: #f5f0fa;">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Category</h4>
                <!-- <h6>Create new product Category</h6> -->
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin_panel.manage-category')}}" method="post" enctype="multipart/form-data">
					@csrf
                    {{-- <input type="text" name="name" > --}}
                    <input type="hidden" name="id" value="{{$category->id ?? ''}}">
                    <div class="row">

                        <div class="col-lg-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$category->name ?? ''}}">
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control select2-select">
                                    <option>--select--</option>
                                    <option value="1" {{ old('status', $category->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $category->status ?? '') == '0' ? 'selected' : '' }}>In-Active</option>
                                </select>
                            </div>
                        </div>

                        {{-- <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="content" id="editor"></textarea>

                            </div>
                        </div> --}}



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
