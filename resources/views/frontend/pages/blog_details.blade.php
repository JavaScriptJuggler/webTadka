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
                {{--  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12
                        Comments</a></li> --}}
            </ul>
        </div><!-- End meta top -->

        <div class="content">
            <p>{!! $blogData->description !!}</p>

            {{-- <blockquote>
                <p>
                    Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos
                    aliquam doloribus minus autem quos.
                </p>
            </blockquote> --}}
        </div><!-- End post content -->

        {{-- <div class="meta-bottom">
            <i class="bi bi-folder"></i>
            <ul class="cats">
                <li><a href="#">Business</a></li>
            </ul>

            <i class="bi bi-tags"></i>
            <ul class="tags">
                <li><a href="#">Creative</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
            </ul>
        </div> --}}
        <!-- End meta bottom -->

    </article><!-- End blog post -->

    {{-- <div class="post-author d-flex align-items-center">
        <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
        <div>
            <h4>Jane Smith</h4>
            <div class="social-links">
                <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
            </div>
            <p>
                Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas
                repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde
                voluptas.
            </p>
        </div>
    </div><!-- End post author --> --}}
@endsection
@section('footer')
    @include('frontend.footer', [
        'services' => $services,
        'description' => $about_us_description,
    ])
@endsection
