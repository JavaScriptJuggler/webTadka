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
        <div class="modal-dialog php-email-form {{-- modal-xl modal-dialog-centered --}} modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-body p-4 py-5 p-md-">
                    <div class="row">
                        <div class="col-12 ">
                            <h3 class="mb-3 text-center" id="exampleModalLabel">Let's Talk About Your Project
                                Idea</h3>
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
                                        <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree to receive communications from <a
                                                href="javascrit:;">WebTadka.com</a>
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
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close-btn" data-dismiss="modal">Close</button>
                    <button type="submit" form="letstalk">Submit</button>
                </div>
            </div>
        </div>
    </div>

    {{-- client support modal --}}
    <div class="modal fade contact" style="font-family: 'Poppins';" id="clientSupportModal" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog {{-- modal-dialog-centered --}}  modal-lg php-email-form" role="document">
            <div class="modal-content">
                <div class="modal-body p-4 py-5 p-md-">
                    <div class="row">
                        <div class="col-12 ">
                            <h3 class="mb-3 text-center" id="exampleModalLabel">Happy to help you, Let's Talk About
                                your issue</h3>
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
                                        <input required class="form-check-input" type="checkbox" value="1"
                                            id="flexCheckDefault1" name="subscribe">
                                        <label class="form-check-label" for="flexCheckDefault1">
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
                                    <input type="text" class="form-control textInputModal1"
                                        placeholder="Enter The Captcha Here" style="margin-right:5px" />
                                </div>
                                <div class="col-md-12">
                                    <p class="text-danger d-none captcha-error">Wrong Captcha. Please Re-Enter</p>
                                </div>
                                {{-- {!! htmlFormSnippet() !!} --}}
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close-btn1" data-dismiss="modal">Close</button>
                    <button type="submit" form="clientSupportForm">Submit</button>
                </div>
            </div>
        </div>
    </div>

    {{-- engagement modal --}}
    <div class="modal fade contact" style="font-family: 'Poppins';" id="serviceEngagementModal" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog php-email-form {{-- modal-xl modal-dialog-centered --}} modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-4 py-5 p-md-">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="mb-3 text-center" id="exampleModalLabel">Let's Talk About Your Project
                                Idea</h3>
                        </div>
                    </div>
                    <form id="serviceEngagementForm" class="php-email-form" name="serviceEngagementForm">
                        <input type="hidden" name="subservice_name" id="subservice_name">
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
                                        <input class="form-check-input" type="checkbox" id="flexCheckDefault2">
                                        <label class="form-check-label" for="flexCheckDefault2">
                                            I agree to receive communications from WebTadka.com
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
                                    <input type="text" class="form-control textInputModal2"
                                        placeholder="Enter The Captcha Here" style="margin-right:5px" />
                                </div>
                                <div class="col-md-12">
                                    <p class="text-danger d-none captcha-error">Wrong Captcha. Please Re-Enter</p>
                                </div>
                                {{-- {!! htmlFormSnippet() !!} --}}
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close-btn" data-dismiss="modal">Close</button>
                    <button type="submit" form="serviceEngagementForm">Submit</button>
                </div>
            </div>
        </div>
    </div>

    {{-- call modal --}}
    <div class="modal fade contact" id="callConnectModal" tabindex="-1" role="dialog"
        aria-labelledby="callConnectModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered php-email-form" role="document">
            <div class="modal-content">
                <div class="modal-body p-4 py-5 p-md-5">
                    <h3 class="text-center mb-3">Instant Call Connect</h3>
                    <form id="callConnect">
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" required class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Phone Number</label>
                            <input type="text" name="phone" required class="form-control"
                                placeholder="1234567890">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Priority</label>
                            <select name="priority" required id="priority" class="form-control"
                                style="height: 45px;">
                                <option style="display: none;">Select Priority</option>
                                <option value="URGENT">Urgent</option>
                                <option value="MEDIUM">Medium</option>
                                <option value="LOW">Low</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">City</label>
                            <input type="text" required name="city" class="form-control" placeholder="City">
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Message</label>
                            <textarea required style="height:100px" name="message" class="form-control"
                                placeholder="What you want to tell us..."></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <button type="button" class="close-btn2 d-none" data-dismiss="modal">Close</button>
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Request
                                Instant Call Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#letstalk, #clientSupportForm, #serviceEngagementForm, #callConnect').submit(function(e) {
            e.preventDefault();
            holdOn();
            var targetInput = '';
            if (e.target.id == 'clientSupportForm')
                targetInput = $(".textInputModal1")
            if (e.target.id == 'letstalk')
                targetInput = $(".textInputModal")
            if (e.target.id == 'serviceEngagementForm')
                targetInput = $(".textInputModal2")
            if (e.target.id == 'clientSupportForm' && e.target.id == 'letstalk' && e.target.id ==
                'serviceEngagementForm') {
                if (targetInput.val() != iNumber) {
                    refreshChaptcha();
                    $('.captcha-error').removeClass('d-none');
                    return false;
                }
            }
            $('.captcha-error').addClass('d-none');

            if (e.target.id == 'clientSupportForm') {
                var formdata = new FormData($('#clientSupportForm')[0]);
                formdata.append('action', 'client-support');

            }
            if (e.target.id == 'letstalk') {
                var formdata = new FormData($('#letstalk')[0]);
                formdata.append('action', 'lets-talk');
                let checkValue = document.querySelector('#flexCheckDefault').checked ? 1 : 0;
                formdata.append('subscribe', checkValue);

            }
            if (e.target.id == 'serviceEngagementForm') {
                var formdata = new FormData($('#serviceEngagementForm')[0]);
                formdata.append('action', 'lets-talk');
                let checkValue = document.querySelector('#flexCheckDefault2').checked ? 1 : 0;
                formdata.append('subscribe', checkValue);

            }
            if (e.target.id == 'callConnect') {
                var formdata = new FormData($('#callConnect')[0]);
                formdata.append('action', 'callConnect');
            }
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/save-lets-talk-and-client-support",
                data: formdata,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response == 1) {
                        closeHoldOn();
                        $('.captcha-error').addClass('d-none');
                        if (e.target.id == 'letstalk') {
                            swal("Thanks !",
                                "You are very important to us, all information received will always remain confidential. We will contact you as soon as we review your message.",
                                "success");
                        }
                        if (e.target.id == 'clientSupportForm') {
                            swal("Thanks !",
                                "You are very important to us, all information received will always remain confidential. We will contact you as soon as we review your message.",
                                "success");
                        }
                        if (e.target.id == 'serviceEngagementForm') {
                            swal("Thanks !",
                                "ou are very important to us, all information received will always remain confidential. We will contact you as soon as we review your message.",
                                "success");
                        }
                        if (e.target.id == 'callConnect') {
                            swal("Thanks !",
                                "ou are very important to us, all information received will always remain confidential. We will contact you as soon as we review your message.",
                                "success");
                        }
                        setTimeout(() => {
                            if (e.target.id == 'letstalk' || e.target.id ==
                                'serviceEngagementForm') {
                                $('.close-btn').click();
                                $('.close-alert').click();
                                $('#letstalk').trigger('reset');
                                document.querySelector('.modal-dialog').scrollBy(0, -1);
                                $('#serviceEngagementForm').trigger('reset');
                            }
                            if (e.target.id == 'clientSupportForm') {
                                $('.close-btn1').click();
                                $('.close-alert1').click();
                                $('#clientSupportForm').trigger('reset');
                            }
                            if (e.target.id == 'callConnect') {
                                $('#callConnectModal').modal('hide');
                                $('.close-btn2').click();
                                $('.close-alert2').click();
                                $('#callConnect').trigger('reset');
                            }

                            refreshChaptcha();
                        }, 3000);
                    }
                }
            });
        });
    </script>
</body>

</html>
