@extends('admin_dashboard.layouts.main')
@section('page_content')
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Seo And Digital Marketing Agency
        </h3>
        <nav aria-label="breadcrumb">
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <form id="toppartForm">
                    <input type="hidden" name="action" value="toppart">
                    <div class="card-body">
                        <h4 class="card-title">Why Choose US</h4>
                        <p class="card-description">Details here will show on Why Choose Section</p>
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
    {{-- <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="overflow-x:auto">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="card-title">Services</h4>
                        <p class="card-description">Press Add Button to add services</code></p>
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
                            <th> Service Name </th>
                            <th> Service Description </th>
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
                                    <td> {{ $item->service_name }} </td>
                                    <td>
                                        <span
                                            style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; width:250px; display: block;">{{ $item->description }}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-gradient-warning btn-rounded" data-toggle="modal"
                                            data-target="#imageAndContent" data-servicename="{{ $item->service_name }}"
                                            data-description="{{ $item->description }}" data-serviceid={{ $item->id }}
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
    <div class="modal fade" id="imageAndContent" tabindex="-1" role="dialog" aria-labelledby="imageAndContent"
        aria-hidden="true">
        <div class="modal-dialog .modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Services</h5>
                </div>
                <form id="modalForm" name="modalForm" class="customForm2">
                    <input type="hidden" name="action" value="downpart">
                    <input type="hidden" id="service_id" name="service_id" value="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="form-label">Service Name</label>
                            <input type="text" id="service_name" name="service_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" id="service_description" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="modalForm" class="btn btn-gradient-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div> --}}
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script>
        $('#toppartForm').submit(function(e) {
            e.preventDefault();
            let formdata = new FormData($('#toppartForm')[0]);
            formdata.append('keyword', 'whychooseus')
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/save-why-choose-us",
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
                        toastr.danger('Something Went Wrong. Please Contact With Developer!')
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
                url: "/save-seo-and-services-content",
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
                        toastr.danger('Something Went Wrong. Please Contact With Developer!')
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
                url: "/delete-services",
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
                        toastr.danger('Something Went Wrong. Please Contact With Developer!')
                    }
                }
            });
        });

        function onClickEdit(element) {
            $('#modalForm').trigger('reset');
            $('#service_name').val($(element).data('servicename'));
            $('#service_description').val($(element).data('description'));
            $('#service_id').val($(element).data('serviceid'));
        }
    </script>
@endsection
