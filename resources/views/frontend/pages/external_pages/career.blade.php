@extends('frontend.pages.external_pages.layout')
@section('body')
    <!-- Header-->
    <main id="main">
        <section id="hero-static" class="hero-static d-flex align-items-center"
            style="background-color:#006f83;min-height:80vh !important;background:url({{ asset('assets/img/career.jpg') }})">
            <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative aos-init aos-animate"
                data-aos="zoom-out">
                <h3>Career in WebTadka</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae minus quisquam commodi voluptates
                    voluptatum aperiam, incidunt corrupti atque autem maxime deserunt voluptatem magnam, facilis
                    reprehenderit, vitae ullam ducimus a sequi?</p>
            </div>
        </section>
        <!-- About section-->
        <section id="about">
            <div class="container px-2">
                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        <h3 class="text-center smallUnderline"><em>Interested in <span class="text-danger">joining</span>
                                our team!</em></h3>
                        <p class="lead" style="margin-top: 30px">
                            WebTadka has clients across the world and if you believe that you can help us conquer the skies
                            and above, then, this is a golden opportunity for you. Come, be part of generation next!
                            Please fill following form, we will seek suitable fitments! Or you can also send your C.V
                            /Resume to us at careers@webtadka.com
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact">
            <h3 class="text-center smallUnderline"><em><span class="text-danger">Post</span> Resume</em></h3>
            <div class="container px-2" style="margin-top:30px;">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <form class="php-email-form" id="careerForm">
                            <input type="hidden" name="filename" id="filename">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <input type="text" name="post" class="form-control" placeholder="Post For Apply"
                                        required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" name="fullname" class="form-control" placeholder="Your Full Name"
                                        required>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" placeholder="Email Address"
                                        required>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone Number"
                                        required>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="city" placeholder="City" required>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="skills"
                                        placeholder="Skills i.e(PHP, Python)" required>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="experience" placeholder="Experience"
                                        required>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="qualification"
                                        placeholder="Heighest Qualification" required>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="file" onchange="onChangeFileInput(this)"
                                        class="d-none form-control resume" name="resume"
                                        placeholder="Upload Your Updated Resume" required id="formdataFile">
                                    <input type="text" class="form-control" name=""
                                        placeholder="Upload Your Updated Resume" id="fakeFileBox" readonly
                                        onclick="$('.resume').click()" required style="background-color: transparent">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12 d-flex">
                                                <div class="divGenerateRandomValues" style="float:right;margin-right:5px">
                                                </div>
                                                <button type="button" onclick="refreshChaptcha()"
                                                    class="btn btn-transparent" style="margin-right:5px"><i
                                                        class="fa-solid fa-arrow-rotate-right"></i></button>
                                                <input type="text" class="form-control textInput"
                                                    placeholder="Enter The Captcha Here" style="margin-right:5px" />
                                            </div>
                                            <div class="col-md-12">
                                                <p class="text-danger d-none captcha-error">Wrong Captcha. Please Re-Enter
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-2"><button type="submit">Submit Application</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        const onChangeFileInput = (element) => {
            if ((element.value) != '') {
                $('#fakeFileBox').val(element.files[0].name);
                $('#filename').val(element.files[0].name);
            } else {
                $('#fakeFileBox').val('');
                $('#filename').val('');
            }
        }

        $('#careerForm').submit(function(e) {
            e.preventDefault();
            if ($(".textInput").val() != iNumber) {
                refreshChaptcha();
                $('.captcha-error').removeClass('d-none');
            } else {
                $('.captcha-error').addClass('d-none');
                holdOn();
                $.ajaxSetup({
                    headers: {
                        'accept': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    type: "POST",
                    url: "/send-career-mail",
                    data: new FormData($('#careerForm')[0]),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status) {
                            closeHoldOn();
                            $('#careerForm').trigger('reset');
                            swal("Thank You!", response.message, "success");
                        }
                    }
                });
            }
        });
    </script>
@endsection
