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
        @include('frontend.portfolio')
        <!-- End Portfolio Section -->

        <!-- ======= F.A.Q Section ======= -->
        @include('frontend.faq', [
            'header' => $faq_header,
            'description' => $faq_description,
            'faq' => $faqs,
        ])
        <!-- End F.A.Q Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
        @include('frontend.recent_blogs')
        <!-- End Recent Blog Posts Section -->

        <!-- ======= Contact Section ======= -->
        @include('frontend.contacts')
        <!-- End Contact Section -->

    </main><!-- End #main -->
    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Enter Your Name"></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Enter Your Email"></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Phone</label>
                                <input type="phone" class="form-control" placeholder="Enter Phone Number"></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Business Name</label>
                                <input type="text" class="form-control" placeholder="Enter Your Business Name"></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Country</label>
                                <input type="text" class="form-control" placeholder="Enter Your Country Name"></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Enter Your Name"></input>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger mt-2" data-dismiss="modal">Close</button>
                    <button type="button" class="custom-button">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('go-to-top')
    <a href="#hero-static" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
@endsection
