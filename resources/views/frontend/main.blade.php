@extends('frontend.layout')
@section('body')
    <main id="main">
        <!-- ======= Hero Section ======= -->
        @include('frontend.hero', [
            'heroimage' => $heroImage,
            'header' => $heroheader,
            'description' => $heroDescription,
            'contents' => $heroContents,
        ])
        <!-- End Hero Section -->

        <!-- ======= SEO & Digital Marketing Agency ======= -->
        @include('frontend.seo_and_digital_marketing_agency', [
            'header' => $seo_heading,
            'description' => $seo_description,
            'services' => $services,
        ])
        <!-- End SEO & Digital Marketing Agency -->

        <!-- ======= Call To Action Section ======= -->
        @include('frontend.cta', [
            'header' => $cta_heading,
            'description' => $cta_description,
        ])
        <!-- End Call To Action Section -->

        <!-- ======= Why Choose SEO Discovery ======= -->
        @include('frontend.why_choose_seo', [
            'header' => $why_choose_us_headimng,
            'description' => $why_choose_us_description,
        ])
        <!-- End Why Choose SEO Discovery -->

        <!-- ======= Our Happy Clients ======= -->
        @include('frontend.testimonials')
        <!-- End Our Happy Clients Section -->

        <!-- ======= brands Section ======= -->
        @include('frontend.brands')
        <!-- End brands Section -->

        <!-- ======= Tools Section ======= -->
        @include('frontend.tools_we_use')
        <!-- End Tools Section -->

        <!-- ======= About Section ======= -->
        @include('frontend.about')
        <!-- End About Section -->

        <!-- ======= Portfolio Section ======= -->
        @include('frontend.portfolio')
        <!-- End Portfolio Section -->

        <!-- ======= F.A.Q Section ======= -->
        @include('frontend.faq')
        <!-- End F.A.Q Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
        @include('frontend.recent_blogs')
        <!-- End Recent Blog Posts Section -->

        <!-- ======= Contact Section ======= -->
        @include('frontend.contacts')
        <!-- End Contact Section -->

    </main><!-- End #main -->
@endsection

@section('go-to-top')
    <a href="#hero-static" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
@endsection
