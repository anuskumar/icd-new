@extends('index')

@push('styles')
<style>
    .blog-content {
        line-height: 1.8;
        color: #4a4a4a;
    }

    .blog-content h1,
    .blog-content h2,
    .blog-content h3,
    .blog-content h4,
    .blog-content h5,
    .blog-content h6 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        color: #1a1a1a;
        font-weight: 600;
    }

    .blog-content h1 { font-size: 2.2rem; }
    .blog-content h2 { font-size: 1.8rem; }
    .blog-content h3 { font-size: 1.5rem; }
    .blog-content h4 { font-size: 1.3rem; }
    .blog-content h5 { font-size: 1.1rem; }
    .blog-content h6 { font-size: 1rem; }

    .blog-content p {
        margin-bottom: 1.5rem;
    }

    .blog-content ul,
    .blog-content ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }

    .blog-content ul {
        list-style-type: disc;
    }

    .blog-content ol {
        list-style-type: decimal;
    }

    .blog-content table {
        width: 100%;
        margin-bottom: 1.5rem;
        border-collapse: collapse;
    }

    .blog-content table th,
    .blog-content table td {
        padding: 0.75rem;
        border: 1px solid #dee2e6;
    }

    .blog-content img {
        max-width: 100%;
        height: auto;
        margin: 1.5rem 0;
        border-radius: 0.5rem;
    }

    .blog-content a {
        color: #4e73df;
        text-decoration: none;
    }

    .blog-content a:hover {
        text-decoration: underline;
    }

    .blog-content blockquote {
        margin: 1.5rem 0;
        padding: 1rem 1.5rem;
        border-left: 4px solid #4e73df;
        background-color: #f8f9fc;
        font-style: italic;
    }
</style>
@endpush

@section('content')
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex align-items-center" style="background-image:url({{ asset('assets/img/testimonial/test-bg.png') }})">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>{{ $blog->title }}</h2>
                                <div class="breadcrumb-wrap">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- inner-blog -->
        <section class="inner-blog pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="bs-blog-post-details">
                            <div class="bs-blog-thumb">
                                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" style="height: 400px; width: 100%; object-fit: cover;">
                            </div>
                            <div class="bs-blog-content">
                                <div class="blog-meta mb-4">
                                    <ul class="list-unstyled d-flex gap-4">
                                        <li><i class="fas fa-user me-2"></i> {{ $blog->author->name }}</li>
                                        <li><i class="fas fa-calendar-alt me-2"></i> {{ $blog->published_at->format('d M Y') }}</li>
                                    </ul>
                                </div>
                                <div class="blog-content">
                                    {!! $blog->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="sidebar-widget">
                            <section id="search-3" class="widget widget_search">
                                <h2 class="widget-title">Search</h2>
                                <form role="search" method="get" class="search-form" action="#">
                                    <label>
                                        <span class="screen-reader-text">Search for:</span>
                                        <input type="search" class="search-field" placeholder="Search &hellip;" value="" name="s" />
                                    </label>
                                    <input type="submit" class="search-submit" value="Search" />
                                </form>
                            </section>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- inner-blog-end -->
    </main>
@endsection
