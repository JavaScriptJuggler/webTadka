<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-header">
            <h2>{{ $header }}</h2>
            <p>{{ $description }}</p>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    @if (count($portfolio_category) > 0)
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach ($portfolio_category as $item)
                            <li data-filter=".filter-{{ $item->category_name }}">{{ $item->category_name }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <div class="row portfolio-container">

            @if (count($portfolio_details) > 0)
                @foreach ($portfolio_details as $item)
                    <div
                        class="col-lg-4 col-md-6 portfolio-item filter-{{ $item->category->category_name }} wow fadeInUp">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="{{ unserialize($item->images)[0] }}" class="img-fluid" alt="">
                            </figure>

                            <div class="portfolio-info">
                                <h4><a
                                        href="{{ route('portfolio-details', ['portfolioid' => Crypt::encryptString($item->id)]) }}">{{ $item->portfolio_name }}</a>
                                </h4>
                                <p>{{ $item->short_description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
