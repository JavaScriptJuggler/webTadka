@extends('frontend.layout');
@section('body')
    <main id="main">
        @include('frontend.hero', [
            'heroimage' => $heroImage,
            'header' => $heroheader,
            'description' => $heroDescription,
            'contents' => $heroContents,
        ])

        <!-- ======= Engagement Model ======= -->
        @include('frontend.pages.services.engagement_model', [
            'serviceDetails' => $serviceDetails,
        ])
        <!-- Engagement Model -->

        <!-- ======= Call To Action Section ======= -->
        @include('frontend.cta', [
            'header' => $cta_heading,
            'description' => $cta_description,
        ])
        <!-- End Call To Action Section -->

        <!-- ======= Why Choose SEO Discovery ======= -->
        @include('frontend.why_choose_seo', [
            'header' => $why_choose_us_heading,
            'description' => $why_choose_us_description,
            'reasons' => $why_choose_us_reasons,
        ])
        <!-- End Why Choose SEO Discovery -->

        <!-- ======= Our Happy Clients ======= -->
        @include('frontend.testimonials', [
            'header' => $testimonials_heading,
            'description' => $testimonials_description,
            'testimonials' => $testimonials,
        ])
        <!-- End Our Happy Clients Section -->

        <!-- ======= brands Section ======= -->
        @include('frontend.brands', [
            'header' => $brands_heading,
            'description' => $brands_description,
            'brands' => $brands,
        ])
        <!-- End brands Section -->

        <!-- ======= Tools Section ======= -->
        @include('frontend.tools_we_use', [
            'header' => $tools_heading,
            'description' => $tools_description,
            'tools' => $tools,
        ])
        <!-- End Tools Section -->

        <!-- ======= About Section ======= -->
        @include('frontend.about', [
            'header' => $about_us_header,
            'description' => $about_us_description,
            'brands' => $aboutus,
        ])
        <!-- End About Section -->

        <!-- ======= Portfolio Section ======= -->
        @include('frontend.portfolio', [
            'header' => $portfolio_header,
            'description' => $portfolio_description,
            'portfolio_category' => $portfolio_category,
            'portfolio_details' => $portfolio_details,
        ])
        <!-- End Portfolio Section -->

        <!-- ======= F.A.Q Section ======= -->
        @include('frontend.faq', [
            'header' => $faq_header,
            'description' => $faq_description,
            'faq' => $faqs,
        ])
        <!-- End F.A.Q Section -->

        <!-- ======= Contact Section ======= -->
        @include('frontend.contacts')
        <!-- End Contact Section -->
    </main>
@section('footer')
    @include('frontend.footer', [
        'services' => $services,
        'description' => $about_us_description,
    ])
@endsection
@endsection
