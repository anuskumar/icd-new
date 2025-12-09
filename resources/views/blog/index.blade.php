@extends('index')

@section('content')
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex align-items-center" style="background-image:url({{ asset('assets/img/testimonial/test-bg.png') }})">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>Blogs</h2>
                                <div class="breadcrumb-wrap">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
                        @forelse ($blogs as $blog)
                            <div class="bs-blog-post mb-40">
                                <div class="bs-blog-thumb">
                                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" style="height: 400px; width: 100%; object-fit: cover;">
                                </div>
                                <div class="bs-blog-content">
                                    <div class="blog-meta">
                                        <ul>
                                            <li><i class="fas fa-user"></i> {{ $blog->author->name }}</li>
                                            <li><i class="fas fa-calendar-alt"></i> {{ $blog->published_at->format('d M Y') }}</li>
                                        </ul>
                                    </div>
                                    <h3><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                    <p>{{ Str::limit($blog->content, 200) }}</p>
                                    <div class="blog-btn">
                                        <a href="{{ route('blog.show', $blog->slug) }}" class="btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No blog posts found.</p>
                        @endforelse
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
