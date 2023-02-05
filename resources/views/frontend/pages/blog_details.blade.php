@extends('frontend.pages.blogs.layout', ['title' => 'Blog Details', 'blogs' => $blogs])
@section('blog_page_section')
    <article class="blog-details">

        <div class="post-img">
            <img src="{{ $blogData->image }}" alt="" class="img-fluid">
        </div>

        <h2 class="title">{{ $blogData->heading }}</h2>

        <div class="meta-top">
            @php
                $date = getDate(strtotime($blogData->created_at));
            @endphp
            <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                        href="blog-details.html">{{ $blogData->author }}</a>
                </li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time
                            datetime="2020-01-01">{{ $date['month'] }} {{ $date['mday'] }}, {{ $date['year'] }}</time></a>
                </li>
            </ul>
        </div>
        <div class="content">
            <p>{!! $blogData->description !!}</p>
        </div>
    </article>
@endsection
@section('footer')
    @include('frontend.footer', [
        'services' => $services,
        'description' => $about_us_description,
    ])
@endsection
