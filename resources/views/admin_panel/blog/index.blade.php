@extends('admin_index')
@section('admin_content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Blog Posts</h4>
                <h6>Manage your blog posts</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('admin.blog.create') }}" class="btn btn-added">
                    <img src="{{ asset('admin_assets/assets/img/icons/plus.svg') }}" alt="img" class="me-1">Create New Post
                </a>
            </div>
        </div>
        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Published</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->author->name }}</td>
                                    <td>
                                        @if ($blog->featured_image)
                                            <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" style="width: 80px; height: 60px; object-fit: cover; border-radius: 4px;">
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </td>
                                    <td>{{ $blog->is_published ? 'Yes' : 'No' }}</td>
                                    <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('admin.blog.edit', $blog->id) }}" class="me-3">
                                            <img src="{{ asset('admin_assets/assets/img/icons/edit.svg') }}" alt="img">
                                        </a>
                                        <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure?')">
                                                <img src="{{ asset('admin_assets/assets/img/icons/delete.svg') }}" alt="img">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
@endsection
