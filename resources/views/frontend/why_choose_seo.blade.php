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
                                    @if ($reasons != '' && count($reasons) > 0)
                                        @foreach ($reasons as $item)
                                            <div class="col-sm-6 col-md-4">
                                                <div class="row shadow p-3 mb-5 bg-white rounded" style="width: 100%">
                                                    <div class="col-md-3">
                                                        <div class="ico highlight">
                                                            <img src="{{ $item->image }}" style="max-height: 55px"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p>{{ $item->reason }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
