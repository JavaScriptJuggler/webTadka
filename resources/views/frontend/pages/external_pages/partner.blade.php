@extends('frontend.pages.external_pages.layout')
@section('body')
    <!-- Header-->
    <main id="main">
        <section id="hero-static" class="hero-static d-flex align-items-center"
            style="background-color:#006f83;min-height:80vh !important;background:url({{ asset('assets/img/partnership.jpg') }}); background-size:cover;">
            <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative aos-init aos-animate"
                data-aos="zoom-out">
                <img src="{{ asset('assets/img/head-img.webp') }}" alt="">
                <h3>WebTadka Partnership Program</h3>
                <h3>FOR THOSE WHO BELIEVE IN GROWING TOGETHER</h3>
            </div>
        </section>
        <!-- About section-->
        <section class="partnership-program-sec">
            <div class="container">
                <h2 class="wow fadeInDown animated" data-wow-delay="0.2s"
                    style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                    <span class="light">Join WebTadka </span> <span class="bold">Partnership Program</span>
                </h2>
                <p class="wow fadeInDown animated" data-wow-delay="0.4s"
                    style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                    SAG IPL is running a partnership program inviting companies around the world to build
                    mutually-beneficial professional relationships with us. Our partner program is aimed at creating profits
                    for our partners through our quality development and marketing services and share in the success of our
                    partners through effective collaboration.</p>
                <p class="wow fadeInDown animated" data-wow-delay="0.5s"
                    style="visibility: visible;-webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
                    <strong>SAGIPL Partner Program has been divided into the following three categories, based on the
                        different needs and eligibility of potential partners</strong>:
                </p>
                <ul class="nav nav-tabs" role="tablist">
                    <li><a class="active" href="#associate-partnership" role="tab" data-toggle="tab"
                            tabindex="-1">Associate Partnership</a></li>
                    <li><a href="#strategic-partnership" role="tab" data-toggle="tab" tabindex="-1">Strategic
                            Partnership</a></li>
                    <li><a href="#referral-partnership" role="tab" data-toggle="tab" tabindex="-1">Referral
                            Partnership</a></li>
                </ul>
            </div>
        </section>
        <section class="partnership-tab-sec">
            <div class="container">
                <div class="tab-content custom-add-mag">
                    <div class="tab-pane fadeInUp active" id="associate-partnership">
                        <div class="resource-list-block partners-page">
                            <p class="wow fadeInDown animated" data-wow-delay="0.2s"
                                style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                                As the name suggests, this program makes us your associate partner. If you need help with a
                                development project or simply want to hire skilled development, design and marketing teams,
                                we will help. SAG IPL already has dedicated teams for all development related tasks along
                                with a modern
                                infrastructure, which you can hire on a per project or hourly basis.</p>
                            <p class="wow fadeInDown animated" data-wow-delay="0.4s"
                                style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                Once you join our partnership, we will assign dedicated staff to work on your project. The
                                price for our associate partners would be lower than the standard rate. Check out the
                                eligibility and benefit details below. </p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="partnership-block">
                                        <h3 class="wow fadeInLeft animated" data-wow-delay="0.2s"
                                            style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                                            Partner Eligibility</h3>
                                        <ul>
                                            <li class="wow fadeInLeft animated" data-wow-delay="0.4s"
                                                style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                                Must have an existing development team and infrastructure to start with</li>
                                            <li class="wow fadeInLeft animated" data-wow-delay="0.5s"
                                                style="visibility: visible;-webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
                                                Must be looking for extending their development capabilities and resources
                                            </li>
                                            <li class="wow fadeInLeft animated" data-wow-delay="0.6s"
                                                style="visibility: visible;-webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">
                                                Must be willing to manage projects and close deals</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="partnership-block active">
                                        <h3 class="wow fadeInRight animated" data-wow-delay="0.2s"
                                            style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                                            Benefits</h3>
                                        <ul>
                                            <li class="wow fadeInRight animated" data-wow-delay="0.4s"
                                                style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                                A perfect-fit team for extension of your existing designing and development
                                                staff</li>
                                            <li class="wow fadeInRight animated" data-wow-delay="0.5s"
                                                style="visibility: visible;-webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
                                                Client-centric services</li>
                                            <li class="wow fadeInRight animated" data-wow-delay="0.6s"
                                                style="visibility: visible;-webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">
                                                Priority work and support</li>
                                            <li class="wow fadeInRight animated" data-wow-delay="0.7s"
                                                style="visibility: visible;-webkit-animation-delay: 0.7s; -moz-animation-delay: 0.7s; animation-delay: 0.7s;">
                                                Dedicated staff</li>
                                            <li class="wow fadeInRight animated" data-wow-delay="0.8s"
                                                style="visibility: visible;-webkit-animation-delay: 0.8s; -moz-animation-delay: 0.8s; animation-delay: 0.8s;">
                                                Discounts on standard rates</li>
                                            <li class="wow fadeInRight animated" data-wow-delay="0.9s"
                                                style="visibility: visible;-webkit-animation-delay: 0.9s; -moz-animation-delay: 0.9s; animation-delay: 0.9s;">
                                                Pay as you use</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fadeInUp" id="strategic-partnership">
                        <div class="resource-list-block partners-page">
                            <p class="wow fadeInDown animated" data-wow-delay="0.2s"
                                style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                                Simply looking to hire a temporary technical staff with all the resources and skills? Join
                                our technology/strategic partnership program to get your hands on one of the best technical
                                staff in the world. Get rid of the various responsibilities involved with the hiring of
                                technical manpower. We will do it all to ensure that you get the best team trained in the
                                latest technologies while you get more business to us. Make profits on a pre-agreed basis.
                            </p>
                            <p class="wow fadeInDown animated" data-wow-delay="0.4s"
                                style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                Our strategic partnership involves you acting as the front of the business, communicating
                                with clients and bringing projects, while we provide all the technical and development
                                support through our efficient team.</p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="partnership-block">
                                        <h3 class="wow fadeInLeft animated" data-wow-delay="0.2s"
                                            style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                                            Partner Eligibility</h3>
                                        <ul>
                                            <li class="wow fadeInLeft animated" data-wow-delay="0.4s"
                                                style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                                Must have a professional in-house sales and marketing team</li>
                                            <li class="wow fadeInLeft animated" data-wow-delay="0.5s"
                                                style="visibility: visible;-webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
                                                Have all the necessary infrastructure</li>
                                            <li class="wow fadeInLeft animated" data-wow-delay="0.6s"
                                                style="visibility: visible;-webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">
                                                Must have prior experience in making deals with clients</li>
                                            <li class="wow fadeInLeft animated" data-wow-delay="0.7s"
                                                style="visibility: visible;-webkit-animation-delay: 0.7s; -moz-animation-delay: 0.7s; animation-delay: 0.7s;">
                                                Should maintain regular communication and business</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="partnership-block active">
                                        <h3 class="wow fadeInRight animated" data-wow-delay="0.2s"
                                            style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                                            Benefits</h3>
                                        <ul>
                                            <li class="wow fadeInRight animated" data-wow-delay="0.4s"
                                                style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                                No need to hire or manage a team and projects</li>
                                            <li class="wow fadeInRight animated" data-wow-delay="0.5s"
                                                style="visibility: visible;-webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
                                                The entire focus is on bringing new clients and business</li>
                                            <li class="wow fadeInRight animated" data-wow-delay="0.6s"
                                                style="visibility: visible;-webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">
                                                Attractive profits and pricing advantages</li>
                                            <li class="wow fadeInRight animated" data-wow-delay="0.7s"
                                                style="visibility: visible;-webkit-animation-delay: 0.7s; -moz-animation-delay: 0.7s; animation-delay: 0.7s;">
                                                High-quality and reliable services through an skilled staff of designers,
                                                developers and online marketers</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fadeInUp" id="referral-partnership">
                        <div class="resource-list-block partners-page">
                            <p class="wow fadeInDown animated" data-wow-delay="0.2s"
                                style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                                This is a special partnership program, which is exclusive to those who want to make profits
                                by marketing our products, services and solutions to target customers. This is a pure
                                referral program where a partner is given a pre-agreed commission, either in the form of
                                credits or as a percentage of the project cost, for every new project they bring to us. The
                                commission will be given only for deals that are closed on our end, however, it would be our
                                responsibility to work out the details and finalize the deal.</p>
                            <p class="wow fadeInDown animated" data-wow-delay="0.4s"
                                style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                The credits given as commission can be used by our partners for future projects.</p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="partnership-block">
                                        <h3 class="wow fadeInLeft animated" data-wow-delay="0.2s"
                                            style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                                            Eligibility</h3>
                                        <ul>
                                            <li class="wow fadeInLeft animated" data-wow-delay="0.4s"
                                                style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                                Anyone can join</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="partnership-block active">
                                        <h3 class="wow fadeInRight animated" data-wow-delay="0.2s"
                                            style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                                            Benefits</h3>
                                        <ul>
                                            <li class="wow fadeInRight animated" data-wow-delay="0.4s"
                                                style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                                No actual responsibilities. Simply find and bring trusted clients to us and
                                                get rewarded</li>
                                            <li class="wow fadeInRight animated" data-wow-delay="0.5s"
                                                style="visibility: visible;-webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
                                                The responsibility to close a deal is ours</li>
                                            <li class="wow fadeInRight animated" data-wow-delay="0.6s"
                                                style="visibility: visible;-webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">
                                                Attractive commissions</li>
                                            <li class="wow fadeInRight animated" data-wow-delay="0.7s"
                                                style="visibility: visible;-webkit-animation-delay: 0.7s; -moz-animation-delay: 0.7s; animation-delay: 0.7s;">
                                                Top-quality services, guaranteed, to all your referrals</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="partnership-program-feat-sec">
            <div class="container">
                <h2 class="wow fadeInDown animated" data-wow-delay="0.2s"
                    style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                    <span class="light">WebTadka </span> <span class="bold">Partnership Program Features</span></h2>
                <p class="wow fadeInDown animated" data-wow-delay="0.4s"
                    style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                    Get engaged in a professional Partnership with a Reputed Organization</p>
                <div class="row">
                    <div class="col-md-3 wow fadeInLeft animated" data-wow-delay="0.2s"
                        style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                        <div class="part-p-f-box"> <img alt="Full-time Staff"
                                src="https://www.sagipl.com/images/partnership-program/features-01.png">
                            <h4>Full-time Staff</h4>
                            <p>Our staff consisting of 250+ skilled developers, designers, analysts and online marketers is
                                capable of serving all your professional needs.</p>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeInLeft animated" data-wow-delay="0.4s"
                        style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                        <div class="part-p-f-box"> <img alt="Great Experience"
                                src="https://www.sagipl.com/images/partnership-program/features-02.png">
                            <h4>Great Experience</h4>
                            <p>We have an experience of 15+ years in a wide range of industries and have successfully
                                delivered over 2,000 projects till date.</p>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeInLeft animated" data-wow-delay="0.4s"
                        style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                        <div class="part-p-f-box"> <img alt="Attractive Partner Benefits"
                                src="https://www.sagipl.com/images/partnership-program/features-03.png">
                            <h4>Attractive Partner Benefits</h4>
                            <p>SAG IPL partnership program offers numerous monetary and other benefits to all our partners
                                through various interesting schemes.</p>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeInLeft animated" data-wow-delay="0.2s"
                        style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                        <div class="part-p-f-box"> <img alt="Dedicated Managers"
                                src="https://www.sagipl.com/images/partnership-program/features-04.png">
                            <h4>Dedicated Managers</h4>
                            <p>We have dedicated account managers assigned for each project and for each client to ensure
                                seamless communication and satisfaction.</p>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeInRight animated" data-wow-delay="0.2s"
                        style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                        <div class="part-p-f-box"> <img alt="Better Reputation"
                                src="https://www.sagipl.com/images/partnership-program/features-05.png">
                            <h4>Better Reputation</h4>
                            <p>By partnering with an internationally-recognized firm like SAG IPL, you will acquire a better
                                reputation and more business in your respective markets.</p>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeInRight animated" data-wow-delay="0.4s"
                        style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                        <div class="part-p-f-box"> <img alt="Industry Leader"
                                src="https://www.sagipl.com/images/partnership-program/features-06.png">
                            <h4>Industry Leader</h4>
                            <p>We are an industry leader in terms of top quality services like web development, app
                                development, designing, and online marketing. </p>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeInRight animated" data-wow-delay="0.4s"
                        style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                        <div class="part-p-f-box"> <img alt="Affordable Cost"
                                src="https://www.sagipl.com/images/partnership-program/features-07.png">
                            <h4>Affordable Cost</h4>
                            <p>We provide the best price packages which are based on market analysis and research and fit
                                the budget of every type of business.</p>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeInRight animated" data-wow-delay="0.2s"
                        style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                        <div class="part-p-f-box"> <img alt="Technology-oriented Solutions"
                                src="https://www.sagipl.com/images/partnership-program/features-08.png">
                            <h4>Technology-oriented Solutions</h4>
                            <p>Out technology solutions and techniques are regularly updated to be in line with the latest
                                developments in the world of mobile and the internet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--  <section class="contact">
            <h3 class="text-center smallUnderline"><em><span class="text-danger">Post</span> Resume</em></h3>
            <div class="container px-2" style="margin-top:30px;">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <form class="php-email-form" id="careerForm">
                            <input type="hidden" name="filename" id="filename">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <input type="text" name="post" class="form-control"
                                        placeholder="Post For Apply" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" name="fullname" class="form-control"
                                        placeholder="Your Full Name" required>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Email Address" required>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone Number"
                                        required>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="city" placeholder="City"
                                        required>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="skills"
                                        placeholder="Skills i.e(PHP, Python)" required>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="experience"
                                        placeholder="Experience" required>
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
        </section> --}}
    </main>
@endsection
