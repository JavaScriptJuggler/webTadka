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
                        <div class="sidebar-item categories">
                            <h3 class="sidebar-title">Categories</h3>
                            <ul class="mt-3">
                                <li>
                                    <a href="{{ route('blogs') }}">
                                        <span>All
                                            ({{ \App\Models\blogs::all()->count() }})
                                        </span>
                                    </a>
                                </li>
                                @if (count($blogcategories) > 0)
                                    @foreach ($blogcategories as $key => $item)
                                        <li>
                                            <a href="{{ route('blogs') }}?category={{ Crypt::encryptString($item->id) }}">
                                                <span>{{ $item->category_name }}
                                                    ({{ \App\Models\blogs::where('blog_category', $item->id)->count() }})
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
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
                                                    <time datetime="2020-01-01">{{ $dateData['month'] }}
                                                        {{ $dateData['mday'] }}, {{ $dateData['year'] }}</time>
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
