<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>WebTadka</h3>
                        <div class="d-flex">
                            <img style="height: 40px" class="m-1"
                                src="https://i.pcmag.com/imagery/reviews/01dD7c6Jiwhc0I2GjnOxkdz-83..v1666885025.jpg"
                                alt="">
                            <img style="height: 40px" class="m-1"
                                src="https://i.pcmag.com/imagery/reviews/01dD7c6Jiwhc0I2GjnOxkdz-83..v1666885025.jpg"
                                alt="">
                            <img style="height: 40px" class="m-1"
                                src="https://i.pcmag.com/imagery/reviews/01dD7c6Jiwhc0I2GjnOxkdz-83..v1666885025.jpg"
                                alt="">

                        </div>
                        <br>
                        <p>
                            A2 – 502, Vibhuti Building, Anand Nagar, G.B. Road, Thane<br>
                            <strong>Email:</strong> <a href="mailto:team@webtadka.com"
                                class="text-light">team@webtadka.com</a><br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('landing') }}">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#about">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#services">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('terms-and-conditions') }}">Terms of
                                service</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('privecy-policy') }}">Privacy
                                policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        @if (count($services) > 0)
                            @foreach ($services as $item)
                                <li><i class="bi bi-chevron-right"></i> <a
                                        href="{{ route('service-details', ['servicename' => $item->service_name]) }}">{{ $item->service_name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Subscribe Us</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>

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
