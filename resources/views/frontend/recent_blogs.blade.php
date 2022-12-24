<section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Blog</h2>
            <p>Recent posts form WebTadka</p>
        </div>

        <div class="row">

            @if (count($blogs) > 0)
                @foreach ($blogs as $key => $item)
                    @if ($key < 3)
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="post-box">
                                <div class="post-img"><img src="{{ $item->image }}" class="img-fluid" alt="">
                                </div>
                                <div class="meta">
                                    @php
                                        $dateData = getDate(strtotime($item->created_at));
                                    @endphp
                                    <span class="post-date">{{ $dateData['weekday'] }} ,{{ $dateData['month'] }}
                                        {{ $dateData['mday'] }}</span>
                                    <span class="post-author"> / {{ $item->author }}</span>
                                </div>
                                <h3 class="post-title">{{ $item->heading }}</h3>
                                <p>{{ str_replace('&#39', "'", preg_replace("/\n\s+/", "\n", rtrim(html_entity_decode(strip_tags(strlen($item->description) > 200 ? substr($item->description, 0, 200) . '...' : $item->description))))) }}
                                </p>
                                <a href="{{ route('blog-details', ['blogid' => $item->id]) }}"
                                    class="readmore stretched-link"><span>Read More</span><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif

        </div>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <a class="custom-button" href="{{ route('blogs') }}">Show All Blogs <i
                        class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>

</section>
