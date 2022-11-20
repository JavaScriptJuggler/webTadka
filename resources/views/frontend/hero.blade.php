<section id="hero-static" class="hero-static d-flex align-items-center"
    style="background:linear-gradient(rgba(95, 95, 95, 0.8), rgba(95, 95, 95, 0.8)), url('{{ $heroimage }}')">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
        data-aos="zoom-out">
        <h2>{{ $header }}</h2>
        <p>{{ $description }}</p>
        <div class="row mt-4 mb-4 w-100">
            @if ($contents != '')
                @foreach (unserialize($contents) as $item)
                    <div class="col-xl-2 mb-2">
                        <div class="card hero-benifits">
                            <div class="" style="background-color: #d9e7e9; height:8rem">
                                <img src="{{ $item['file'] }}" class="mt-3" alt="...">
                            </div>
                            <div class="p-2 bg-light">
                                <p class="text-dark"><b>{{ $item['text'] }}</b></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="custom-button">Request Free Quote</button>
            </div>
        </div>
    </div>
</section>
