@extends('admin_dashboard.layouts.main')
@section('page_content')
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Blogs
        </h3>
        <nav aria-label="breadcrumb">
            <a class="btn btn-gradient-primary btn-sm">
                <i class="mdi mdi-plus"></i> Create New Blog
            </a>
        </nav>
    </div>
    <div class="row">
        <form name="saveBlogForm" id="saveBlogForm"></form>
        <input type="hidden" name="blogid" form="saveBlogForm">
        <div class="col-md-8">
            <div class="form-group">
                <label for="" class="form-label">Blog Title</label>
                <input type="text" name="blogname" required form="saveBlogForm" placeholder="Add Blog Title" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Blog Description</label>
                <textarea id="blogdescription" form="saveBlogForm" placeholder="Blog Description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Meta Title</label>
                <input type="text" name="metatitle" required form="saveBlogForm" placeholder="Add Meta Title" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Meta Description</label>
                <input type="text"  name="metadescription" required form="saveBlogForm" placeholder="Add Meta Description" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" form="saveBlogForm" class="btn btn-gradient-primary">Create Blog</button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="margin-top: 25px">
                <div class="card-body">
                    <h5 class="card-title">Blog Categories
                        <button style="position:absolute;right:10px;top:35px;" data-toggle="modal"
                            data-target="#exampleModal" class="btn btn-gradient-primary btn-sm">Add /
                            Edit</button>
                    </h5>
                    <p class="card-text mb-3">
                        Here is your blog category list.Please choose your favourite category or you can create new one.
                    </p>
                    <ul class="list-group" style="height: 250px;overflow-y:auto;">
                        @if (count($blogCategory) > 0)
                            @foreach ($blogCategory as $key => $item)
                                <li class="list-group-item">
                                    <input required form="saveBlogForm" type="radio" name="categorySelctor" value="{{ $item->id }}"
                                        class="form-check-input" id="exampleCheck{{ $key }}">
                                    <label class="form-check-label"
                                        for="exampleCheck{{ $key }}">{{ $item->category_name }}</label>
                                </li>
                            @endforeach
                        @else
                            <li class="list-group-item">No Category Found</li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="card" style="margin-top: 25px">
                <div class="card-body">
                    <h5 class="card-title">Feature Image</h5>
                    <p class="card-text mb-3">
                        Please upload your featured image. It will show on blog thumbnail
                    </p>
                    <div class="image-area mt-4">
                        <img id="imageResult" src="" alt=""
                            class="img-fluid rounded shadow-sm mx-auto d-block w-75">
                    </div>
                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                        <input id="upload" form="saveBlogForm" type="file" onchange="readURL(this);"
                            class="form-control border-0">
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
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Blog Categories</h5>
                </div>
                <div class="modal-body">
                    <div class="form-control">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" id="categoryName" class="form-control">
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Existing Categories</div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($blogCategory) > 0)
                                        @foreach ($blogCategory as $key => $item)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $item->category_name }}</td>
                                                <td>
                                                    <button class="btn btn-gradient-warning btn-sm"
                                                        data-categoryname="{{ $item->id }}"
                                                        data-categoryid="{{ $item->id }}">Edit</button>
                                                    <button class="btn btn-gradient-danger btn-sm"
                                                        data-categoryid="{{ $item->id }}">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-gradient-primary" id="saveCategory">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
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

        $(document).ready(function() {
            CKEDITOR.replace('blogdescription', {
                editorplaceholder: "Start writing new blog...",
                /* filebrowserBrowseUrl: "/document_bucket",
                filebrowserUploadUrl: '/document_bucket' */
            });
        });

        $('#saveCategory').click(function(e) {
            e.preventDefault();
            holdOn()
            var formData = new FormData();
            formData.append('category_name', $('#categoryName').val());
            formData.append('category_id', '');
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "{{ route('add-blog-category') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.message);
                        setTimeout(() => {
                            closeHoldOn();
                            location.reload();
                        }, 3000);
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        });

        $('#saveBlogForm').submit(function(e) {
            e.preventDefault();
            holdOn();
            let formData = new FormData($('#saveBlogForm')[0]);
            formData.append('category', $('input[name="categorySelctor"]:checked').val())
            formData.append('blog', CKEDITOR.instances.blogdescription.getData())
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "{{ route('save-blog') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.message);
                        setTimeout(() => {
                            closeHoldOn();
                            location.reload();
                        }, 3000);
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        });
    </script>
@endsection
