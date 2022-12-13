@extends('admin_dashboard.layouts.main')
@section('page_content')
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Why Choose Us
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
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="overflow-x:auto">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="card-title">Reasons to choose us</h4>
                        <p class="card-description">Press Add Button to add reasons</code></p>
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
                            <th> Reason Name </th>
                            <th> Reason Image </th>
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
                                    <td>
                                        <span
                                            style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; width:300px; display: block;">
                                            {{ $item->reason }}</span>
                                    </td>
                                    <td class="py-1">
                                        <img src="{{ $item->image }}" alt="image">
                                    </td>
                                    <td>
                                        <button class="btn btn-gradient-warning btn-rounded" data-toggle="modal"
                                            data-target="#imageAndContent" data-servicename="{{ $item->reason }}"
                                            data-serviceid={{ $item->id }}
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Reason</h5>
                </div>
                <form id="modalForm" name="modalForm" class="customForm2">
                    <input type="hidden" name="action" value="downpart">
                    <input type="hidden" id="service_id" name="service_id" value="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="form-label">Reason Name</label>
                            <input type="text" id="service_name" required name="service_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Icon</label>
                            <input type="file" name="file_input" required id="file_input" class="form-control">
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
                url: "/delete-reasons",
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
            $('#service_name').val($(element).data('servicename'));
            $('#service_id').val($(element).data('serviceid'));
            $('.modal-title').html('Edit Reason')
            $('#file_input').removeAttr('required');
        }
    </script>
@endsection
