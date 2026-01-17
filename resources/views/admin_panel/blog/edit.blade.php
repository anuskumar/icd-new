@extends('admin_index')
@section('admin_content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Edit Blog Post</h4>
                <h6>Update your blog post</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form role="form" action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $blog->title) }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="is_published">Publish</label>
                                <select class="form-control" id="is_published" name="is_published">
                                    <option value="0" @if(old('is_published', $blog->is_published) == 0) selected @endif>No</option>
                                    <option value="1" @if(old('is_published', $blog->is_published) == 1) selected @endif>Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="blog_content" name="content" rows="5">{{ old('content', $blog->content) }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="featured_image">Featured Image</label>
                                <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image">
                                @error('featured_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            @if ($blog->featured_image)
                                <div class="form-group">
                                    <label>Current Image</label>
                                    <img id="featured-image-preview" src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" width="200">
                                </div>
                            @else
                                <div class="form-group" style="display: none;">
                                    <label>Current Image</label>
                                    <img id="featured-image-preview" src="" alt="Featured image preview" width="200">
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- CKEditor Script -->
<script src="https://cdn.ckeditor.com/4.25.1-lts/standard/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('featured_image');
        const previewImage = document.getElementById('featured-image-preview');

        if (fileInput && previewImage) {
            fileInput.addEventListener('change', function() {
                const file = this.files && this.files[0];
                if (!file) {
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    const wrapper = previewImage.closest('.form-group');
                    if (wrapper) {
                        wrapper.style.display = '';
                    }
                };
                reader.readAsDataURL(file);
            });
        }

        // Check if CKEDITOR is defined
        if (typeof CKEDITOR !== 'undefined') {
            CKEDITOR.replace('blog_content', {
                height: 400,
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form',
                toolbar: [
                    { name: 'document', items: ['Source', '-', 'Save', 'NewPage', 'ExportPdf', 'Preview', 'Print', '-', 'Templates'] },
                    { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
                    { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'] },
                    { name: 'forms', items: ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'] },
                    '/',
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat'] },
                    { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language'] },
                    { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
                    { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe'] },
                    '/',
                    { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
                    { name: 'colors', items: ['TextColor', 'BGColor'] },
                    { name: 'tools', items: ['Maximize', 'ShowBlocks'] },
                    { name: 'about', items: ['About'] }
                ]
            });
        } else {
            console.error('CKEditor not loaded. Please check if the script is properly included.');
        }
    });
</script>
@endpush
