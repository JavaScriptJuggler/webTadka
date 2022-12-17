<section class="engagement_sec mb-4">
    <div class="container">
        <div class="section-header">
            <h2>Engagement Models</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum sequi doloribus nostrum, error eos
                vitae assumenda quas eligendi rem iste sint, dolor nesciunt esse minus aspernatur repudiandae quos earum
                ea vero accusantium veritatis provident magnam! Totam, obcaecati similique tempore dolores reprehenderit
                quibusdam eos, velit ea temporibus harum consequatur quia ipsa?</p>
        </div>
        <div class="row">
            @if (count($serviceDetails->subservices) > 0)
                @foreach ($serviceDetails->subservices as $item)
                    <div class="col-lg-4 col-md-12">
                        <div class="model_box" style="position: relative;">
                            <div class="black_bar"><img src="{{ $item->image }}">{{ $item->name }}
                            </div>
                            <div class="white_bg">
                                <p class="mb-4">{{ $item->description }}
                                    what you need. Here, expect the following:

                                    {!! $item->features !!}
                                </p>
                                <div style="height:30px"></div>
                                <button class="btn btn-dark p-2 m-2" style="position: absolute;right:0;bottom:0;left:0">Book
                                    Service</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
