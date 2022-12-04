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
    <div class="modal fade" style="font-family: var(---font-secondary)" id="letstalk_modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgba(var(--color-primary-dark-rgb), 0.9); color:white">
                    <h5 class="modal-title" id="exampleModalLabel">Let's Talk About Your Project Idea</h5>
                </div>
                <div class="modal-body">
                    <form id="letstalk" class="php-email-form" name="letstalk">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Name</label>
                                    <input required type="text" name="name" class="form-control"
                                        placeholder="Enter Your Name"></input>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Email</label>
                                    <input required type="email" name="email" class="form-control"
                                        placeholder="Enter Your Email"></input>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Phone</label>
                                    <input required type="phone" name="phone" class="form-control"
                                        placeholder="Enter Phone Number"></input>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Business Name</label>
                                    <input required type="text" name="businessname" class="form-control"
                                        placeholder="Enter Your Business Name"></input>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Country</label>
                                    <input required type="text" class="form-control"
                                        placeholder="Enter Your Country Name" name="country"></input>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="" class="form-label">State</label>
                                    <input required type="text" name="state" class="form-control"
                                        placeholder="Enter Your State Name"></input>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Address</label>
                                    <input required type="text" name="address" class="form-control"
                                        placeholder="Enter Your Address"></input>
                                </div>
                            </div>
                            <div class="col-md-13 mb-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Project Details</label>
                                    <textarea required class="form-control" name="projectdetails" rows="5"
                                        placeholder="Enter Your Project Details..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-13 mb-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault"
                                            name="subscribe">
                                        <input class="form-check-input" type="hidden" value="0" name="subscribe">
                                        <label class="form-check-label" style="font-weight:bold" for="flexCheckDefault">
                                            Yes, I’d Like to Receive Updates and Tips on Digital Marketing for My Business
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    {!! htmlFormSnippet() !!}
                                </div>
                                <p class="text-danger d-none captcha-error">Please Fill Captcha or wait some time to resubmit the form</p>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <div class="alert lets-talk-success alert-success d-none alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close d-none close-alert" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        Thank You for response !. We will contact to you as soon as possible .
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger mt-2 close-btn" data-dismiss="modal">Close</button>
                    <button type="submit" form="letstalk" class="custom-button">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#letstalk').submit(function(e) {
            e.preventDefault();
            let formdata = new FormData($('#letstalk')[0]);
            if (formdata.get('g-recaptcha-response') != '') {
                $.ajaxSetup({
                    headers: {
                        'accept': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    type: "POST",
                    url: "/save-lets-talk",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response == 1) {
                            $('.lets-talk-success').removeClass('d-none');
                            setTimeout(() => {
                                $('.close-btn').click();
                                $('.close-alert').click();
                            }, 2000);
                        }
                    }
                });
            } else {
                $('.captcha-error').removeClass('d-none');
            }
        });
    </script>
@endsection

@section('go-to-top')
    <a href="#hero-static" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
@endsection
