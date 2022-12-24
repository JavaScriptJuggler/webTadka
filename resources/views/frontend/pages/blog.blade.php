@extends('frontend.pages.blogs.layout', ['title' => 'Blogs', 'blogs' => $blogs])
@section('blog_page_section')
    <div class="row gy-4 posts-list">
        @if (count($blogs) > 0)
            @foreach ($blogs as $item)
                <div class="col-md-6">
                    @php
                        $date = getDate(strtotime($item->created_at));
                    @endphp
                    <article class="d-flex flex-column">

                        <div class="post-img">
                            <img src="{{ $item->image }}" alt="" class="img-fluid">
                        </div>

                        <h2 class="title">
                            <a href="{{ route('blog-details', ['blogid' => $item->id]) }}">{{ $item->heading }}</a>
                        </h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="{{ route('blog-details', ['blogid' => $item->id]) }}">{{ $item->author }}</a>
                                </li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="{{ route('blog-details', ['blogid' => $item->id]) }}"><time
                                            datetime="2022-01-01">{{ $date['month'] }} {{ $date['mday'] }},
                                            {{ $date['year'] }}</time></a>
                                </li>
                                {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                        href="{{ route('blog-details', ['blogid' => $item->id]) }}">12
                                        Comments</a></li> --}}
                            </ul>
                        </div>

                        <div class="content">
                            <p>{{ str_replace('&#39', "'", preg_replace("/\n\s+/", "\n", rtrim(html_entity_decode(strip_tags(strlen($item->description) > 200 ? substr($item->description, 0, 200) . '...' : $item->description))))) }}
                            </p>
                        </div>

                        <div class="read-more mt-auto align-self-end">
                            <a href="{{ route('blog-details', ['blogid' => $item->id]) }}">Read More</a>
                        </div>

                    </article>
                </div>
            @endforeach
        @endif
    </div>
@endsection
@section('pagination')
    {!! $blogs->links() !!}
    {{-- @include('frontend.pages.blogs.pagination') --}}
@endsection
