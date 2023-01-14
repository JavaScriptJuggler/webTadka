@extends('frontend.pages.external_pages.layout')
@section('body')
    <!-- Header-->
    <main id="main">
        <section id="hero-static" class="hero-static d-flex align-items-center"
            style="background-color:#006f83;min-height:50vh !important;">
            <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative aos-init aos-animate"
                data-aos="zoom-out">
                <h3>Terms And Conditions</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae minus quisquam commodi voluptates voluptatum aperiam, incidunt corrupti atque autem maxime deserunt voluptatem magnam, facilis reprehenderit, vitae ullam ducimus a sequi?</p>
            </div>
        </section>
        <!-- About section-->
        <section id="about">
            <div class="container px-2">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <p class="lead">This is a great place to talk about your webpage. This template is purposefully
                            unstyled so you can use it as a boilerplate or starting point for you own landing page designs!
                            This template features:</p>
                        <ul>
                            <li>Clickable nav links that smooth scroll to page sections</li>
                            <li>Responsive behavior when clicking nav links perfect for a one page website</li>
                            <li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the
                                navbar</li>
                            <li>Minimal custom CSS so you are free to explore your own unique design options</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
