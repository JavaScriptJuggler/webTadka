@extends('frontend.pages.external_pages.layout')
@section('body')
    <!-- Header-->
    <main id="main">
        <section id="hero-static" class="hero-static d-flex align-items-center"
            style="background-color:#006f83;min-height:50vh !important;">
            <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative aos-init aos-animate"
                data-aos="zoom-out">
                <h3>Disclaimer</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae minus quisquam commodi voluptates
                    voluptatum aperiam, incidunt corrupti atque autem maxime deserunt voluptatem magnam, facilis
                    reprehenderit, vitae ullam ducimus a sequi?</p>
            </div>
        </section>
        <!-- About section-->
        <section id="about">
            <div class="container px-1">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <p class="lead">The information contained in this website is only for general purposes. The
                            information is provided by WebTadka.com and while we attempt to keep all the information up to
                            date and correct, we make no representations or warranties of any type, express or implied,
                            about the completeness, accuracy, reliability, suitability or availability with respect to the
                            website; or the information, products, services, or related graphics contained in the website
                            for any purpose. Any dependence you set on such information is thus strictly at your own risk.
                            In no situation, we will be liable for any loss or damage including without limitation, indirect
                            or resultant loss or damage; or any loss or damage whatsoever arising from loss of data or
                            profits arise out of, or in connection with, the use of this website.
                            Through this website you are able to link to other websites which are not under the control of
                            WebTadka.com. We have no control over the nature, content and availability of those websites.
                            The inclusion of any links does not necessarily indicate a recommendation or endorse the views
                            expressed within them.<br>
                            Every effort is made to keep the website up and running smoothly. Yet, WebTadka.com takes no
                            responsibility for, and will not be liable for, the website being temporarily unavailable due to
                            technical issues beyond our control.</p>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
