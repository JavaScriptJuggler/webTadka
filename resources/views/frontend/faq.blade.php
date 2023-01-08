<section id="faq" class="faq">
    <div class="container-fluid" data-aos="fade-up">

        <div class="row gy-4">

            <div class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                <div class="content px-xl-5 text-center">
                    <h3><strong>{{ $faq_header }}</strong></h3>
                    <p>{{ $faq_description }}</p>
                </div>

                <div class="accordion accordion-flush px-xl-5" id="faqlist">
                    <div class="row">

                        @if (count($faqs) > 0)
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($faqs as $item)
                                <div class="accordion-item col-6 p-2" data-aos="fade-up" data-aos-delay="200">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq-content-{{ $count }}">
                                            <i class="bi bi-question-circle question-icon"></i>
                                            {{ $item->question }}
                                        </button>
                                    </h3>
                                    <div id="faq-content-{{ $count }}" class="accordion-collapse collapse"
                                        data-bs-parent="#faqlist">
                                        <div class="accordion-body">{{ $item->answer }}</div>
                                    </div>
                                </div><!-- # Faq item-->
                                @php
                                    $count += 1;
                                @endphp
                            @endforeach
                        @endif
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
