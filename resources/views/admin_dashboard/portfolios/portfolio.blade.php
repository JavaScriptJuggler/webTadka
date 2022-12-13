@extends('admin_dashboard.layouts.main')
@section('page_content')
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Portfolios
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <a data-toggle="modal" data-target="#exampleModal">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Add Portfolio Category <i
                            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </a>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <form id="toppartForm">
                    <input type="hidden" name="action" value="toppart">
                    <div class="card-body">
                        <h4 class="card-title">Portfolios</h4>
                        <p class="card-description">Details here will show on portfolios</p>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Heading</label>
                                <input type="text" name="heading" class="form-control" id="heading"
                                    placeholder="Heading" name="heading" value="{{ $heading }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Description</label>
                                <textarea class="form-control" rows="5" id="description" placeholder="Description" name="description">{{ $description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-gradient-primary me-2 btn-rounded">Submit</button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- services --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="overflow-x:auto">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="card-title">Portfolios</h4>
                        <p class="card-description">Press Add Button to add portfolios</code></p>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-gradient-primary btn-rounded" data-toggle="modal"
                            data-target="#imageAndContent" onclick="$('#modalForm').trigger('reset');">Add</button>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> sl. </th>
                            <th> Portfolio Name </th>
                            <th> Portfolio Long Description </th>
                            <th> Portfolio Short Description </th>
                            <th> Portfolio Category </th>
                            <th> Portfolio Link </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($services) > 0)
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($services as $item)
                                @php
                                    $count += 1;
                                @endphp
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td> {{ $item->portfolio_name }} </td>
                                    <td>
                                        <span
                                            style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; width:250px; display: block;">{{ $item->potrfolio_description }}</span>
                                    </td>
                                    <td> <span
                                            style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; width:250px; display: block;">{{ $item->short_description }}</span>
                                    </td>
                                    <td> {{ $item->category->category_name }} </td>
                                    <td> {{ $item->links }} </td>
                                    <td>
                                        <button class="btn btn-gradient-warning btn-rounded" data-toggle="modal"
                                            data-target="#imageAndContent" data-portfolioid="{{ $item->id }}"
                                            data-portfolioname="{{ $item->portfolio_name }}"
                                            data-longdescription="{{ $item->potrfolio_description }}"
                                            data-shortdescription="{{ $item->short_description }}"
                                            data-categoryid="{{ $item->category_id }}" data-links="{{ $item->links }}"
                                            onclick="onClickEdit(this)">Edit</button>
                                        <button class="btn btn-gradient-danger btn-rounded delete-service"
                                            data-deleteid="{{ $item->id }}">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Portfolio Category</h5>
                </div>
                <div class="modal-body">
                    <form id="categortAdderForm" id="categortAdderForm">
                        <div class="form-group">
                            <label for="" class="form-label">Category Name</label>
                            <input type="text" id="category_name" name="category_name" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="categortAdderForm" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="imageAndContent" tabindex="-1" role="dialog" aria-labelledby="imageAndContent"
        aria-hidden="true">
        <div class="modal-dialog .modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Portfolio</h5>
                </div>
                <form id="modalForm" name="modalForm" class="customForm2">
                    <input type="hidden" name="action" value="downpart">
                    <input type="hidden" id="portfolio_id" name="portfolio_id" value="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="form-label">Portfolio Name</label>
                            <input type="text" id="portfolio_name" name="portfolio_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Short Description</label>
                            <textarea name="portfolio_short_description" id="portfolio_short_description" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Long Description</label>
                            <textarea name="portfolio_long_description" id="portfolio_long_description" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Images</label>
                            <input type="file" name="portfolio_images[]" id="portfolio_images" rows="5"
                                class="form-control" multiple>
                            <p class="text-muted">Press CTRL + click the file to select it</p>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Link</label>
                            <input type="text" id="portfolio_link" name="portfolio_link" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="" class="d-none">Select Portfolio Category</option>
                                @if (count($category) > 0)
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="modalForm" class="btn btn-gradient-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script>
        $('#toppartForm').submit(function(e) {
            e.preventDefault();
            let formdata = new FormData($('#toppartForm')[0]);
            formdata.append('keyword', 'portfolio')
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/save-portfolio",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success('Data Changed Successfully!')
                        setTimeout(() => {
                            location.reload()
                        }, 2000);
                    } else {
                        toastr.error('Something Went Wrong. Please Contact With Developer!')
                    }
                }
            });
        });

        $('#modalForm').submit(function(e) {
            e.preventDefault();
            e.preventDefault();
            let formdata = new FormData($('#modalForm')[0]);
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/save-portfolio",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success('Data Changed Successfully!')
                        setTimeout(() => {
                            location.reload()
                        }, 2000);
                    } else {
                        toastr.error('Something Went Wrong. Please Contact With Developer!')
                    }
                }
            });
        });

        $('.delete-service').click(function(e) {
            e.preventDefault();
            const service_id = $(this).data('deleteid');
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/delete-portfolio",
                data: {
                    'id': service_id
                },
                success: function(response) {
                    if (response.status) {
                        toastr.success('Data Changed Successfully!')
                        setTimeout(() => {
                            location.reload()
                        }, 2000);
                    } else {
                        toastr.error('Something Went Wrong. Please Contact With Developer!')
                    }
                }
            });
        });

        function onClickEdit(element) {
            $('#modalForm').trigger('reset');
            $('#portfolio_id').val($(element).data('portfolioid'));
            $('#portfolio_name').val($(element).data('portfolioname'));
            $('#portfolio_short_description').val($(element).data('shortdescription'));
            $('#portfolio_long_description').val($(element).data('longdescription'));
            $('#portfolio_link').val($(element).data('links'));
            $('#category').val($(element).data('categoryid'));
        }

        $('#categortAdderForm').submit(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/save-portfolio-category",
                data: new FormData($('#categortAdderForm')[0]),
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.message)
                        setTimeout(() => {
                            location.reload()
                        }, 2000);
                    } else {
                        toastr.error(response.message)
                    }
                }
            });
        });
    </script>
@endsection
