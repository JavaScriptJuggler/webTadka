<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
    <div class="container">
        <div class="section-header">
            <h2>{{ $header }}</h2>
            <p>{{ $description }}</p>
        </div>
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper mt-3" style="height: auto">
                @if ($testimonials != '' && count($testimonials) > 0)
                    @foreach ($testimonials as $item)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset($item->image) }}" class="testimonial-img" alt="">
                                <p class="mt-5">
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    {{ $item->comment }}
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <h3>{{ $item->name }}</h3>
                                <h4>{{ $item->profession }}</h4>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><!-- End Testimonials Section -->
