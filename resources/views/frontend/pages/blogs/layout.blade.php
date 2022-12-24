@extends('frontend.layout')
@section('body')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>{{ $title }}</h2>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8">
                    @yield('blog_page_section')
                    <!-- End blog posts list -->

                    @yield('pagination')

                </div>

                <div class="col-lg-4">

                    <div class="sidebar">

                        <div class="sidebar-item search-form">
                            <h3 class="sidebar-title">Search</h3>
                            <form action="" class="mt-3">
                                <input type="text">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->

                        <div class="sidebar-item categories">
                            <h3 class="sidebar-title">Categories</h3>
                            <ul class="mt-3">
                                <li><a href="#">General <span>(25)</span></a></li>
                                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                                <li><a href="#">Travel <span>(5)</span></a></li>
                                <li><a href="#">Design <span>(22)</span></a></li>
                                <li><a href="#">Creative <span>(8)</span></a></li>
                                <li><a href="#">Educaion <span>(14)</span></a></li>
                            </ul>
                        </div><!-- End sidebar categories-->

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Recent Posts</h3>

                            <div class="mt-3">
                                @if (count($blogs) > 0)
                                    @foreach ($blogs as $key => $item)
                                        @if ($key < 5)
                                            <div class="post-item mt-3">
                                                <img src="{{ $item->image }}" alt="" class="flex-shrink-0">
                                                <div>
                                                    <h4><a
                                                            href="{{ route('blog-details', ['blogid' => $item->id]) }}">{{ $item->heading }}</a>
                                                    </h4>
                                                    @php
                                                        $dateData = getDate(strtotime($item->created_at));
                                                    @endphp
                                                    <time datetime="2020-01-01">{{ $dateData['month'] }} {{ $dateData['mday'] }}, {{ $dateData['year'] }}</time>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif

                            </div>

                        </div><!-- End sidebar recent posts-->

                    </div><!-- End Blog Sidebar -->

                </div>

            </div>

        </div>
    </section><!-- End Blog Section -->
@endsection
