<section id="featured" class="featured-services">
    <div class="section-header">
        <h2>{{ $header }}</h2>
        <p>{{ $description }}</p>
    </div>
    <div class="container bootstrap snippets bootdey">
        <section id="" class="current">
            <div class="services-top">
                <div class="container bootstrap snippets bootdey">
                    <div class="row">
                        <div class="col-md-offset-1 col-sm-12 col-md-12 col-md-10">
                            <div class="services-list">
                                <div class="row">
                                    @for ($i = 0; $i < 6; $i++)
                                        <div class="col-sm-6 col-md-4">
                                            <div class="row shadow p-3 mb-5 bg-white rounded" style="width: 100%">
                                                <div class="col-md-3">
                                                    <div class="ico highlight">
                                                        <img src="https://uxwing.com/wp-content/themes/uxwing/download/17-internet-network-technology/computer-internet-network.png"
                                                            style="max-height: 55px" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod,
                                                        delectus?</p>
                                                </div>
                                            </div>
                                            {{--  <div class="service-block" style="visibility: visible;">

                                                <div class="text-block">
                                                    <div class="name">Web Design</div>
                                                    <div class="info">Beauty and function</div>
                                                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                        elit. </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
