<!DOCTYPE html>
<html lang="en">

@include('frontend.head')

<body>
    <!-- ======= Header ======= -->
    @include('frontend.header')
    <!-- End Header -->
    @yield('body')
    <!-- ======= Footer ======= -->
    @include('frontend.footer')
    <!-- End Footer -->

    @yield('go-to-top')
    <div id="preloader"></div>

    @include('frontend.scripts')
    {{-- modal --}}
    <div class="modal fade contact" style="font-family: 'Poppins';" id="letstalk_modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog php-email-form {{-- modal-xl modal-dialog-centered --}}  modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-10 ">
                            <h4 class="modal-title mb-4" id="exampleModalLabel">Let's Talk About Your Project
                                Idea</h4>
                        </div>
                        <div class="col-2">
                            <button type="button" style="float: right" class="btn-close" data-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                    </div>
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
                                    <input required type="text" name="phone" class="form-control"
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
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Address</label>
                                    <input required type="text" name="address" class="form-control"
                                        placeholder="Enter Your Address"></input>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Project Details</label>
                                    <textarea required class="form-control" name="projectdetails" rows="5"
                                        placeholder="Enter Your Project Details..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-13 mb-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="flexCheckDefault" name="subscribe">
                                        <input class="form-check-input" type="hidden" value="0"
                                            name="subscribe">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Yes, I’d Like to Receive Updates and Tips on Digital Marketing for My
                                            Business
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="col-md-12 d-flex">
                                    <div class="divGenerateRandomValues" style="float:right;margin-right:5px"></div>
                                    <button type="button" onclick="refreshChaptcha()" class="btn btn-transparent"
                                        style="margin-right:5px"><i
                                            class="fa-solid fa-arrow-rotate-right"></i></button>
                                    <input type="text" class="form-control textInputModal"
                                        placeholder="Enter The Captcha Here" style="margin-right:5px" />
                                </div>
                                <div class="col-md-12">
                                    <p class="text-danger d-none captcha-error">Wrong Captcha. Please Re-Enter</p>
                                </div>
                                {{-- {!! htmlFormSnippet() !!} --}}
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
                    <button type="button" class="close-btn" data-dismiss="modal">Close</button>
                    <button type="submit" form="letstalk" >Save changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- client support modal --}}
    <div class="modal fade contact" style="font-family: 'Poppins';" id="clientSupportModal" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen {{-- modal-dialog-centered --}} php-email-form" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-10 ">
                            <h4 class="modal-title mb-4" id="exampleModalLabel">Happy to help you, Let's Talk About
                                your issue</h4>
                        </div>
                        <div class="col-2">
                            <button type="button" style="float: right" class="btn-close" data-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                    </div>
                    <form id="clientSupportForm" class="php-email-form" name="clientSupportForm">
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
                                    <input required type="text" name="phone" class="form-control"
                                        placeholder="Enter Phone Number"></input>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Project Name</label>
                                    <input required type="text" name="project_name" class="form-control"
                                        placeholder="Project Name"></input>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Service Details</label>
                                    <textarea required class="form-control" name="serviceDetails" rows="3" placeholder="Enter service details..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-13 mb-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="flexCheckDefault" name="subscribe">
                                        <input class="form-check-input" required type="hidden" value="0"
                                            name="subscribe">
                                        <label class="form-check-label" for="flexCheckDefault">
                                           I'm Accepting <a href="#">Terms & Conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="col-md-12 d-flex">
                                    <div class="divGenerateRandomValues" style="float:right;margin-right:5px"></div>
                                    <button type="button" onclick="refreshChaptcha()" class="btn btn-transparent"
                                        style="margin-right:5px"><i
                                            class="fa-solid fa-arrow-rotate-right"></i></button>
                                    <input type="text" class="form-control textInputModal"
                                        placeholder="Enter The Captcha Here" style="margin-right:5px" />
                                </div>
                                <div class="col-md-12">
                                    <p class="text-danger d-none captcha-error">Wrong Captcha. Please Re-Enter</p>
                                </div>
                                {{-- {!! htmlFormSnippet() !!} --}}
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
                    <button type="button" class="close-btn" data-dismiss="modal">Close</button>
                    <button type="submit" form="letstalk">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        $('#letstalk').submit(function(e) {
            e.preventDefault();
            if ($(".textInputModal").val() != iNumber) {
                refreshChaptcha();
                $('.captcha-error').removeClass('d-none');
            } else {
                $('.captcha-error').addClass('d-none');
                let formdata = new FormData($('#letstalk')[0]);
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
                            $('.captcha-error').addClass('d-none');
                            $('.lets-talk-success').removeClass('d-none');
                            setTimeout(() => {
                                $('.close-btn').click();
                                $('.close-alert').click();
                                $('#letstalk').trigger('reset');
                                refreshChaptcha();
                            }, 2000);
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>
