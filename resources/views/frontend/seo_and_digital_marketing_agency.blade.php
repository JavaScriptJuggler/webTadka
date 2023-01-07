<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>{{ $header }}</h2>
            <p style="min-width: 100%;text-align: justify;" class="text-dark">{{ $description }}</p>
        </div>
        <div class="row gy-5 mt-1">
            @if (count($services) > 0)
                @foreach ($services as $item)
                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item">
                            <div class="details position-relative">
                                <div class="icon">
                                    <img src="{{asset('images/white_index_results_icon.png')}}"
                                        alt="" style="max-height: 30px">
                                </div>
                                <a href="{{ route('service-details', ['servicename' => str_replace(' ', '-', $item->service_name)]) }}" class="stretched-link">
                                    <h3>{{ $item->service_name }}</h3>
                                </a>
                                <p>{{ $item->description }}</p>
                                <button type="button" class="custom-button btn">View Services</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
