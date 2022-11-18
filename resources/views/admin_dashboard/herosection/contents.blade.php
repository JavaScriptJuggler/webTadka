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
    <form id="submitForm">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Hero Header Content</h4>
                        <p class="card-description"> Add the header text which will show on first of your site</p>
                        <div class="form-group">
                            <label>Header Text</label>
                            <input type="text" name="header_text" class="form-control form-control-lg"
                                placeholder="Header Text" aria-label="Header Text">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body overflow-y-auto">
                        <h4 class="card-title">Contents</h4>
                        <p class="card-description">Add contents here what will display like small boxes in hero</p>
                        <div id="repeater">
                            <!-- Repeater Heading -->
                            <div class="repeater-heading">
                                <h5 class="pull-left">Repeater</h5>
                                <button type="button"
                                    class="btn btn-gradient-primary pull-right repeater-add-btn btn-rounded"
                                    style="float:right">
                                    <i class="mdi mdi-plus-circle-outline"></i> Add
                                </button>
                            </div>
                            <div class="clearfix"></div>
                            <!-- Repeater Items -->
                            <div class="items" data-group="dataset">
                                <!-- Repeater Item Content -->
                                <div class="item-content">
                                    <div class="form-group">
                                        <label>Text</label>
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="Write text here" aria-label="Write text here" data-name="text">
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Image</label>
                                            <input class="form-control" type="file" id="formFile" data-name="file">
                                        </div>
                                    </div>
                                </div>
                                <!-- Repeater Remove Btn -->
                                <div class="pull-right repeater-remove-btn">
                                    <button type="button" class="btn btn-gradient-danger btn-rounded remove-btn">
                                        <i class="mdi mdi-minus-circle-outline"></i> Remove
                                    </button>
                                </div>
                                <div class="clearfix mb-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-gradient-success">Save Changes</button>
            </div>
        </div>
    </form>
    <script src="{{ asset('assets/js/repeater.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script>
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });

        /* form submit */
        $('#submitForm').submit(function(e) {
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
                data: new FormData($('#submitForm')[0]),
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response == 1) {
                        toastr.success('Data Changed Successfully!')
                    }else{
                        toastr.danger('Something Went Wrong. Please Contact With Developer!')
                    }
                }
            });
        });
    </script>
@endsection
