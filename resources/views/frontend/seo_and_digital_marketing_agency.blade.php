<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>{{ $header }}</h2>
            <p>{{ $description }}</p>
        </div>
        <div class="row gy-5 mt-1">
            @for ($i = 0; $i < 8; $i++)
                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item">
                        <div class="details position-relative">
                            <div class="icon">
                                <img src="https://farmonaut.com/wp-content/uploads/2020/01/white_index_results_icon.png"
                                    alt="" style="max-height: 30px">
                            </div>
                            <a href="{{ route('service-details') }}" class="stretched-link">
                                <h3>Nesciunt Mete</h3>
                            </a>
                            <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus
                                dolores
                                iure
                                perferendis.</p>
                            <button type="button" class="custom-button btn">View Services</button>
                        </div>
                    </div>
                </div><!-- End Service Item -->
            @endfor
        </div>
    </div>
</section>
