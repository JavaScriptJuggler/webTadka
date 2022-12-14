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
                    <div class="col-lg-4 col-md-12 mb-30">
                        <div class="model_box d-flex" style="flex-direction:column">
                            <div class="black_bar"><img src="{{ $item->image }}">{{ $item->name }}
                            </div>
                            <div class="white_bg">
                                <p>{{ $item->description }}
                                    what you need. Here, expect the following:</p>
                                {!! $item->features !!}
                                <button class="btn btn-dark mt-auto">Book Service</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
