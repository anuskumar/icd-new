@extends('admin_index')
@section('admin_content')

<div class="page-wrapper" style="background-color: #f5f0fa;">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Sub Category</h4>
                <!-- <h6>Create new product Category</h6> -->
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin_panel.manage-subcategory') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $subcategory->id ?? '' }}">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $subcategory->name ?? '' }}">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2-select" name="category_id[]" multiple>
                                    <option value="">--select--</option>
                                    @foreach($category as $cat)
                                        <option value="{{ $cat->id }}"
                                            @if(isset($subcategory) && is_array($subcategory->category_id) && in_array($cat->id, $subcategory->category_id))
                                                selected
                                            @endif>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Rank</label>
                                <select name="rank" id="rank" class="form-control">
                                    <option value="">--select--</option>
                                    @for ($i = 1; $i <= 20; $i++)
                                        <option value="{{ $i }}"
                                            @if(in_array($i, $usedRanks) && (!isset($subcategory) || $subcategory->rank != $i))
                                                disabled
                                            @endif
                                            {{ (old('rank', isset($subcategory) ? $subcategory->rank : '') == $i) ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control select2-select">
                                    <option>--select--</option>
                                    <option value="1" {{ old('status', $subcategory->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $subcategory->status ?? '') == '0' ? 'selected' : '' }}>In-Active</option>
                                </select>
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
