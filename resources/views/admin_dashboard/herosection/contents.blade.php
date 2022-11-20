@extends('admin_dashboard.layouts.main')
@section('page_content')
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Hero Contents
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <form class="customForm1">
            <input type="hidden" name="action" value="toppart">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Hero Header Content</h4>
                        <p class="card-description"> Add the header text which will show on first of your site</p>
                        <div class="form-group">
                            <label>Header Text</label>
                            <input type="text" value="{{ $header }}" required name="header_text"
                                class="form-control form-control-lg" placeholder="Header Text" aria-label="Header Text">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea required name="description" class="form-control form-control-lg" placeholder="Description"
                                aria-label="Description">{{ $description }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-gradient-success btn-rounded" type="submit"
                                style="float:right">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
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
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($repeater != '' && unserialize($repeater) > 0)
                            @php
                                $count = 0;
                            @endphp
                            @foreach (unserialize($repeater) as $item)
                                <tr>
                                    <td>{{ $count + 1 }}</td>
                                    <td> {{ $item['text'] }} </td>
                                    <td style="width: 40%;">
                                        <button class="btn btn-gradient-warning btn-rounded" data-toggle="modal"
                                            data-target="#imageAndContent" onclick="onClickEdit()">Edit</button>
                                        <button class="btn btn-gradient-danger btn-rounded delete-service"
                                            data-deletename="{{ $item['text'] }}">Delete</button>
                                    </td>
                                </tr>
                                @php
                                    $count += 1;
                                @endphp
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- image and content submit modal --}}
    <div class="modal fade" id="imageAndContent" tabindex="-1" role="dialog" aria-labelledby="imageAndContent"
        aria-hidden="true">
        <div class="modal-dialog .modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Services</h5>
                </div>
                <form id="modalForm" name="modalForm" class="customForm2">
                    <input type="hidden" name="action" value="downpart">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="form-label">Service Name</label>
                            <input type="text" name="service_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Image</label>
                            <input type="file" name='image' class="form-control">
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="modalForm" class="btn btn-gradient-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script>
        $('.customForm1').submit(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/save-hero-content",
                data: new FormData($('.customForm1')[0]),
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

        $('.customForm2').submit(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/save-hero-content",
                data: new FormData($('.customForm2')[0]),
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

        /* delete */
        $('.delete-service').click(function(e) {
            const service_name = $(this).data('deletename');
            // var formdata = = new FormData();
            // formdata.append('service_name', service_name);
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "post",
                url: "/delete-hero-content",
                data: {
                    'service_name': service_name
                },
                success: function(response) {
                    if (response.status) {
                        toastr.success('Data Deleted Successfully!')
                        setTimeout(() => {
                            location.reload()
                        }, 2000);
                    } else {
                        toastr.danger('Something Went Wrong. Please Contact With Developer!')
                    }
                }
            });
        });

        /* edit */
        function onClickEdit() {
            $('#modalForm').trigger('reset');
        }
    </script>
@endsection
