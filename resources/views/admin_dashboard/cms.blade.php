@extends('admin_dashboard.layouts.main')
@section('page_content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-danger text-white me-2">
                <i class="mdi mdi-comment-question-outline"></i>
            </span> Content Management System
        </h3>
        <nav aria-label="breadcrumb">
        </nav>
    </div>
    <div class="row mt-4">
        <div class="col-md-2">
            <a href="{{ route('hero-content-page') }}"><button type="button"
                    class="btn btn-gradient-danger btn-lg mb-2 w-100" style="height:70px">Hero </button></a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('seo-and-digital-marketing') }}"><button type="button"
                    class="btn btn-gradient-danger btn-lg mb-2 w-100" style="height:70px">Services
                </button></a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('cta') }}"><button type="button" class="btn btn-gradient-danger btn-lg mb-2 w-100"
                    style="height:70px">Call To Action
                </button></a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('why-choose-us') }}"><button type="button" class="btn btn-gradient-danger btn-lg mb-2 w-100"
                    style="height:70px">Why Choose Us
                </button></a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('testimonials') }}"><button type="button" class="btn btn-gradient-danger btn-lg mb-2 w-100"
                    style="height:70px">Testimonials
                </button></a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('brand-that-trust') }}"><button type="button"
                    class="btn btn-gradient-danger btn-lg mb-2 w-100" style="height:70px">Brands
                </button></a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('tools-technologies') }}"><button type="button"
                    class="btn btn-gradient-danger btn-lg mb-2 w-100" style="height:70px">Tools &
                    Technologies </button></a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('about-us') }}"><button type="button"
                    class="btn btn-gradient-danger btn-lg mb-2 w-100" style="height:70px">About Us </button></a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('faq') }}"><button type="button"
                    class="btn btn-gradient-danger btn-lg mb-2 w-100" style="height:70px">FAQs </button></a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('show-portfolio-page') }}"><button type="button"
                    class="btn btn-gradient-danger btn-lg mb-2 w-100" style="height:70px">Portfolios </button></a>
        </div>
    </div>
@endsection
