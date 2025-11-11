@extends('admin_index')
@section('admin_content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Import Students</h4>
                    <h6>Bulk upload your students</h6>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="requiredfield">
                        <h4>Field must be in CSV format</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <a href="{{ route('download-sample-file') }}" class="btn btn-submit w-100">Download Sample
                                    File</a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('import-students') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Upload CSV File</label>
                                <div class="image-upload">
                                    <input type="file" name="import_file" required>
                                    <div class="image-uploads">
                                        <img src="{{ asset('admin_assets/assets/img/icons/upload.svg') }}" alt="img">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
