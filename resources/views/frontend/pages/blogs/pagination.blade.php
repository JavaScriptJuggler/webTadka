@if ($paginator->hasPages())
    <div class="blog-pagination">

        <ul class="justify-content-center">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active">
                                <a class="">{{ $page }}</a>
                            </li>
                        @else
                            <li class="">
                                <a class="" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            {{--  <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li> --}}
        </ul>
    </div>
@endif
