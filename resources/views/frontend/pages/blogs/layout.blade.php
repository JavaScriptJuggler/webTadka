@extends('frontend.layout')
@section('body')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>{{ $title }}</h2>
                @if (Request::is('blogs'))
                    <select name="" id="" class="form-control blog-category-select">
                        <option value="all">All</option>
                        @if (count($blogcategories) > 0)
                            @foreach ($blogcategories as $key => $item)
                                @if (\App\Models\blogs::where('blog_category', $item->id)->count() == 0)
                                    @continue
                                @else
                                    <option value="{{ $item->id }}" {{ $category == $item->id ? 'selected' : '' }}>
                                        {{ $item->category_name }}

                                        ({{ \App\Models\blogs::where('blog_category', $item->id)->count() }})
                                    </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                @endif
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                @if (!Request::is('blogs'))

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
                                            @if (\App\Models\blogs::where('blog_category', $item->id)->count() == 0)
                                                @continue
                                            @else
                                                <li>
                                                    <a href="{{ route('blogs') }}?category={{ $item->id }}">
                                                        <span>{{ $item->category_name }}
                                                            ({{ \App\Models\blogs::where('blog_category', $item->id)->count() }})
                                                        </span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div><!-- End sidebar categories-->

                            <div class="sidebar-item recent-posts">
                                <h3 class="sidebar-title">Recent Posts</h3>

                                <div class="mt-3">
                                    @if (count($blogs) > 0)
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($blogs as $key => $item)
                                            @if ($count < 5 && $item->heading != $url)
                                                <div class="post-item mt-3">
                                                    <img src="{{ $item->image }}" alt="" class="flex-shrink-0">
                                                    <div>
                                                        <h4><a
                                                                href="{{ route('blog-details', ['blogname' => urlencode(str_replace(' ', '-', $item->heading))]) }}">{{ $item->heading }}</a>
                                                        </h4>
                                                        @php
                                                            $dateData = getDate(strtotime($item->created_at));
                                                        @endphp
                                                        <time datetime="2020-01-01">{{ $dateData['month'] }}
                                                            {{ $dateData['mday'] }}, {{ $dateData['year'] }}</time>
                                                    </div>
                                                </div>
                                                @php
                                                    $count++;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endif

                                </div>

                            </div><!-- End sidebar recent posts-->

                        </div><!-- End Blog Sidebar -->

                    </div>
                @else
                    <div class="col-lg-12">
                        @yield('blog_page_section')
                        <!-- End blog posts list -->

                        @yield('pagination')

                    </div>
                @endif

            </div>

        </div>
    </section><!-- End Blog Section -->
    <script>
        $('.blog-category-select').change(function(e) {
            e.preventDefault();
            if ($(this).val() == 'all') {
                window.location.href = '{{ route('blogs') }}';
            } else {
                window.location.href =
                    '{{ route('blogs') }}?category=' + $(this).val();
            }
        });
    </script>
@endsection
