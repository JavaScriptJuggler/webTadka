@extends('frontend.layout');
@section('body')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Project Details</h2>
                    <ol>
                        <li><a href="{{ route('landing') }}">Home</a></li>
                        <li>Project Details</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                @if (count(unserialize($portfolio_details->images)) > 0)
                                    @foreach (unserialize($portfolio_details->images) as $item)
                                        <div class="swiper-slide">
                                            <img src="{{ $item }}" alt="project images">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Project information</h3>
                            <ul>
                                <li><strong>Project Name</strong>: {{$portfolio_details->portfolio_name}}</li>
                                <li><strong>Category</strong>: {{$portfolio_details->category->category_name}}</li>
                                <li><strong>Project URL</strong>: <a target="blank" href="{{$portfolio_details->links}}">{{$portfolio_details->links}}</a></li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <h2>Project Description</h2>
                            <p>{{$portfolio_details->potrfolio_description}}</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->
@endsection
