<section id="contact" class="contact">
    <div class="container">

        <div class="section-header">
            <h2>Contact Us</h2>
            <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad
                dolores adipisci aliquam.</p>
        </div>

    </div>
    <div class="container">

        <div class="row gy-5 gx-lg-5">

            <div class="col-lg-4">

                <div class="info">
                    <h3>Get in touch</h3>
                    <p>Et id eius voluptates atque nihil voluptatem enim in tempore minima sit ad mollitia
                        commodi minus.</p>

                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>Location:</h4>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

            </div>

            <div class="col-lg-8">
                <form class="php-email-form" id="contactform">
                    <input type="hidden" name="subscribe" value="1">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Your Phone Number"
                                required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="text" class="form-control" name="businessname"
                                placeholder="Your Business Name" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="text" class="form-control" name="services"
                                placeholder="Your Requested Service" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <input required type="text" class="form-control" placeholder="Enter Your Country Name"
                                name="country"></input>
                        </div>
                        <div class="col-md-6 form-group">
                            <input required type="text" name="state" class="form-control"
                                placeholder="Enter Your State Name"></input>
                        </div>
                        <div class="col-md-6 form-group">
                            <input required type="text" name="address" class="form-control"
                                placeholder="Enter Your Address"></input>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="projectdetails" placeholder="Project Details" required></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 d-flex">
                                    <div class="divGenerateRandomValues" style="float:right;margin-right:5px"></div>
                                    <button type="button" onclick="refreshChaptcha()" class="btn btn-transparent"
                                        style="margin-right:5px"><i class="fa-solid fa-arrow-rotate-right"></i></button>
                                    <input type="text" class="form-control textInput"
                                        placeholder="Enter The Captcha Here" style="margin-right:5px" />
                                </div>
                                <div class="col-md-12">
                                    <p class="text-danger d-none captcha-error">Wrong Captcha. Please Re-Enter</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-3">
                        <div class="loading d-none">Loading</div>
                        <div class="error-message d-none"></div>
                        <div class="sent-message d-none">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div><!-- End Contact Form -->

        </div>

    </div>
</section>
