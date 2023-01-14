<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container custom-container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>WebTadka</h3>
                        <p style="margin-bottom: 5px">{{ substr($about_us_description, 0, 200) }}</p><br>
                        <div class="row">
                            <div class="php-email-form d-flex">
                                <button type="submit" class="m-1" data-toggle="modal"
                                    data-target="#callConnectModal">
                                    <p style="text-align:left">For Enquires</p>
                                    <div class="d-flex">
                                        <h5>Contact Us <i class="fa-solid fa-circle-arrow-right"
                                                style="margin-left: 20px;"></i></h5>
                                    </div>
                                </button>
                                <button type="submit" onclick="window.location.href='{{ route('career') }}'"
                                    class="m-1" style="background-color: rgb(255, 105, 105)">
                                    <p style="text-align:left">Career Opportunities</p>
                                    <div class="d-flex">
                                        <h5>Apply Here <i class="fa-solid fa-circle-arrow-right"
                                                style="margin-left: 20px;"></i></h5>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    {{-- <ul class="ul-links">
                        <li class="php-email-form"><button style="height: 30px; background-color:rgb(255, 201, 121); color:black" type="submit" class="m-1 w-100">Policies</button></li>
                        <li class="php-email-form"><button style="height: 30px; background-color:rgb(174, 255, 75); color:black" type="submit" class="m-1 w-100">Terms & Conditions</button></li>
                        <li class="php-email-form"><button style="height: 30px; background-color:rgb(87, 255, 247); color:black" type="submit" class="m-1 w-100">Privacy Policy</button></li>
                        <li class="php-email-form"><button style="height: 30px; background-color:rgb(237, 99, 255); color:black" type="submit" class="m-1 w-100">Disclaimer</button></li>
                        <li class="php-email-form"><button style="height: 30px; background-color:rgb(255, 135, 215); color:black" type="submit" class="m-1 w-100">Refund Policies</button></li>
                    </ul> --}}
                    <ul class="useful-links">
                        <li><i class="bi bi-chevron-right"></i> <a href="javascript:;">Policies</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('terms-and-conditions') }}">Terms &
                                Conditions</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('privecy-policy') }}">Privacy
                                Policy</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="javascript:;">Disclaimer</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="javascript:;">Refund Policies</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Offices</h4>
                    <ul class="offices">
                        <li class="php-email-form"><button style="height: 30px; background-color:#0ea2bd; color:black"
                                type="submit" class="m-1 w-75">Mumbai, India</button></li>
                        <li class="php-email-form"><button style="height: 30px; background-color:#8596a7; color:black"
                                type="submit" class="m-1 w-75">Kolkata, India</button></li>
                        <li class="php-email-form"><button style="height: 30px; background-color:#0ea2bd; color:black"
                                type="submit" class="m-1 w-75">Delhi, India</button></li>
                        <li class="php-email-form"><button style="height: 30px; background-color:#8596a7; color:black"
                                type="submit" class="m-1 w-75">Gulbarga, India</button></li>
                        <li class="php-email-form"><button style="height: 30px; background-color:#0ea2bd; color:black"
                                type="submit" class="m-1 w-75">USA, UK, UAE <sup class="text-light">soon</sup>
                            </button></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Subscribe Us</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                    <img class="mt-2 mr-2" style="width: 45px; height:45px" src="{{ asset('assets/logos/logo1.png') }}"
                        alt="">
                    <img class="mt-2 mr-2" style="width: 45px; height:45px" src="{{ asset('assets/logos/logo2.png') }}"
                        alt="">
                    <img class="mt-2 mr-2" style="width: 45px; height:45px" src="{{ asset('assets/logos/logo3.png') }}"
                        alt="">
                    <img class="mt-2 mr-2" style="width: 45px; height:45px" src="{{ asset('assets/logos/logo4.png') }}"
                        alt="">
                    <img class="mt-2 mr-2" style="width: 45px; height:45px" src="{{ asset('assets/logos/logo5.png') }}"
                        alt="">
                    <img class="mt-2 mr-2" style="width: 45px; height:45px" src="{{ asset('assets/logos/logo6.png') }}"
                        alt="">
                    <img class="mt-2 mr-2" style="width: 45px; height:45px" src="{{ asset('assets/logos/logo7.png') }}"
                        alt="">
                    <img class="mt-2 mr-2" style="width: 45px; height:45px" src="{{ asset('assets/logos/logo8.png') }}"
                        alt="">
                </div>

            </div>
        </div>
    </div>

    <div class="footer-legal text-center">
        <div
            class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

            <div class="d-flex flex-column align-items-center align-items-lg-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>WebTadka</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="javascript:;">WebTadka</a>
                </div>
            </div>

            <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

        </div>
    </div>

</footer>
