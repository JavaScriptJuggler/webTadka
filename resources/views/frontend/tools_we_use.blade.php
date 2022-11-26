<section id="tools-we-use" class="features">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>{{ $header }}</h2>
            <p>{{ $description }}</p>
        </div>
        <div class="row">
            @if ($tools != '' && count($tools) > 0)
                @foreach ($tools as $item)
                    <div class="col-md-2 col-sm-6 col-6 mb-2 text-center">
                        <img style="object-fit: fit;" height="100px" width="200px" src="{{ asset($item->image) }}"
                            alt="" class="shadow-lg bg-white rounded">
                    </div>
                @endforeach
            @endif
        </div>

    </div>
</section>
