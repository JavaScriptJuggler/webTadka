@extends('admin_dashboard.layouts.main')
@section('page_content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Hero Image
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container py-5">

        <!-- For demo purpose -->
        <header class="text-dark text-center">
            <h1 class="display-4">Upload your Hero Image</h1>
            <p class="lead mb-0">By selecting image it will uploaded to server and started look on your site.</p>
            <!-- Uploaded image area-->
            <div class="image-area mt-4"><img id="imageResult"
                    src={{ $fileLocation != '' ? $fileLocation : '' }} alt=""
                    class="img-fluid rounded shadow-sm mx-auto d-block w-50"></div>
        </header>


        <div class="row py-4">
            <div class="col-lg-6 mx-auto">

                <!-- Upload image input-->
                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                    <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                    <div class="input-group-append">
                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
            let formdata = new FormData();
            formdata.append('file', input.files[0]);
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            formdata.append('key', 'frontendForm');
            $.ajax({
                type: "POST",
                url: "/upload-hero-image",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response)
                }
            });
        }

        $(function() {
            $('#upload').unbind().on('change', function() {
                readURL(input);
            });
        });

        var input = document.getElementById('upload');
        var infoArea = document.getElementById('upload-label');

        input.addEventListener('change', showFileName);

        function showFileName(event) {
            var input = event.srcElement;
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name: ' + fileName;
        }
    </script>
@endsection
