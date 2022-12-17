@extends('admin_dashboard.layouts.main')
@section('page_content')
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Sub Services Of <strong>{{ $getServiceDetails->service_name }}</strong>
        </h3>
        <nav aria-label="breadcrumb">
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Sub Services Header & Description</div>
                    <form id="subserviceFormSubmit">
                        <input type="hidden" name="hero_key"
                            value="service{{ str_replace(' ', '-', $getServiceDetails->service_name) }}">
                        <div class="form-group">
                            <label for="">Header Text</label>
                            <input type="text" required name="hero_header_text" value="{{ $hero_header }}"
                                class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="">Description Text</label>
                            <textarea name="hero_description_text" required rows="5" class="form-control">{{ $hero_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Hero Image</label>
                            <input type="file" name="icon" value="" class="form-control" />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-gradient-primary me-2 btn-rounded">Submit</button>
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
                            <h4 class="card-title">Sub Services List</h4>
                            <p class="card-description">Press Add Button to add sub services</code></p>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-gradient-primary btn-rounded" data-toggle="modal"
                                data-target="#imageAndContent"
                                onclick="$('#modalForm').trigger('reset');CKEDITOR.instances['features'].setData('');">Add</button>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> sl. </th>
                                <th>Name </th>
                                <th> Description </th>
                                <th> Image </th>
                                <th> Features </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($subservices) > 0)
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($subservices as $item)
                                    @php
                                        $count += 1;
                                    @endphp
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td> {{ $item->name }} </td>
                                        <td>
                                            <span
                                                style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; width:250px; display: block;">{{ $item->description }}</span>
                                        </td>
                                        <td> <img src="{{ $item->image }}" alt=""></td>
                                        <td>{!! $item->features !!}</td>
                                        <td>
                                            <button class="btn btn-gradient-warning btn-rounded" data-toggle="modal"
                                                data-target="#imageAndContent" data-name="{{ $item->name }}"
                                                data-description="{{ $item->description }}" data-id={{ $item->id }}
                                                data-features="{{ $item->features }}"
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
    </div>
    <div class="modal fade" id="imageAndContent" tabindex="-1" role="dialog" aria-labelledby="imageAndContent"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Sub Services</h5>
                </div>
                <form id="modalForm" name="modalForm" class="customForm2">
                    <input type="hidden" name="action" value="downpart">
                    <input type="hidden" id="service_sub_id" name="service_sub_id" value="">
                    <input type="hidden" id="service_id" name="service_id" value="{{ $getServiceDetails->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" id="description" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Icon</label>
                            <input type="file" name="icon" class="form-control" id="icon" required>
                            <p class="text-muted">Image size 77 X 77</p>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Features</label>
                            <textarea name="features" id="features" rows="5" class="form-control" required></textarea>
                        </div>
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
        $(document).ready(function() {
            CKEDITOR.replace('features');
        });

        $('#subserviceFormSubmit').submit(function(e) {
            e.preventDefault();
            holdOn();
            let formdata = new FormData($('#subserviceFormSubmit')[0]);
            formdata.append('action', 'toppart');
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/add-edit-subservices",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.message)
                        setTimeout(() => {
                            closeHoldOn();
                            location.reload()
                        }, 2000);
                    } else {
                        closeHoldOn();
                        toastr.error('Something Went Wrong. Please Contact With Developer!')
                    }
                }
            });
        });

        $('#modalForm').submit(function(e) {
            e.preventDefault();
            holdOn();
            let formdata = new FormData($('#modalForm')[0]);
            formdata.append('features', CKEDITOR.instances.features.getData())
            formdata.append('action', 'downpart');
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/add-edit-subservices",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.message)
                        setTimeout(() => {
                            closeHoldOn();
                            location.reload()
                        }, 2000);
                    } else {
                        closeHoldOn();
                        toastr.error('Something Went Wrong. Please Contact With Developer!')
                    }
                }
            });
        });

        $('.delete-service').click(function(e) {
            e.preventDefault();
            holdOn();
            const service_id = $(this).data('deleteid');
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/delete-subservices",
                data: {
                    'id': service_id
                },
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.message)
                        setTimeout(() => {
                            closeHoldOn();
                            location.reload()
                        }, 2000);
                    } else {
                        closeHoldOn();
                        toastr.error('Something Went Wrong. Please Contact With Developer!')
                    }
                }
            });
        });

        function onClickEdit(element) {
            $('#modalForm').trigger('reset');
            $('#name').val($(element).data('name'));
            $('#description').val($(element).data('description'));
            $('#service_sub_id').val($(element).data('id'));
            $('#icon').removeAttr('required');
            CKEDITOR.instances['features'].setData($(element).data('features'));
        }
    </script>
@endsection
