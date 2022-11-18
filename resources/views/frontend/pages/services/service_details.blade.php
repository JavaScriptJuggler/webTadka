@extends('frontend.layout');
@section('body')
    <main id="main">
        @include('frontend.hero')

        <!-- ======= Engagement Model ======= -->
        @include('frontend.pages.services.engagement_model')
        <!-- Engagement Model -->

        <!-- ======= Call To Action Section ======= -->
        @include('frontend.cta')
        <!-- End Call To Action Section -->

        <!-- ======= Why Choose SEO Discovery ======= -->
        @include('frontend.why_choose_seo')
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

        <!-- ======= Portfolio Section ======= -->
        @include('frontend.portfolio')
        <!-- End Portfolio Section -->

        <!-- ======= F.A.Q Section ======= -->
        @include('frontend.faq')
        <!-- End F.A.Q Section -->

        <!-- ======= Contact Section ======= -->
        @include('frontend.contacts')
        <!-- End Contact Section -->
    </main>
@endsection
