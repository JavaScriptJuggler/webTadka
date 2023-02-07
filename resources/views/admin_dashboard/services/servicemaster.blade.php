@extends('admin_dashboard.layouts.main')
@section('page_content')
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Service Master
        </h3>
        <nav aria-label="breadcrumb">
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex">
            <div class="form-group m-4">
                <div class="form-label">Services</div>
                <select name="service" id="services" class="form-control" onchange="getSubServices(this)">
                    <option>Select Services</option>
                    @if (count($services) > 0)
                        @foreach ($services as $item)
                            <option value="{{ $item->id }}">{{ $item->service_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group m-4">
                <div class="form-label">Sub Services</div>
                <select name="sub_service" id="sub_services" class="form-control" onchange="getData(this)">

                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover dataTable dtr-inline" id="service-table" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">phone</th>
                                <th scope="col">business name</th>
                                <th scope="col">country</th>
                                <th scope="col">state</th>
                                <th scope="col">address</th>
                                <th scope="col">project details</th>
                            </tr>
                        </thead>
                        <tbody id="tablebody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="projectdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Project Details</h5>
                </div>
                <div class="modal-body projectDetails">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var serviceid, subserviceid;


        const getSubServices = (element) => {
            serviceid = $(element).val();
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/get-sub-services",
                data: {
                    'serviceId': $(element).val(),
                },
                success: function(response) {
                    var options = '';
                    if (response.length > 0) {
                        options+='<option style="display:none">Select Sub Service</option>';
                        response.forEach(item => {
                            options += '<option value="' + item.id + '">' + item.name +
                                '</option>'
                        });
                    }
                    $('#sub_services').html(options);
                }
            });
        }
        const getData = (element) => {
            subserviceid = $(element).val();
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/get-data",
                data: {
                    'serviceId': serviceid,
                    'subserviceId': subserviceid,
                },
                success: function(response) {
                    var body = '';
                    if (response.length) {
                        response.forEach(item => {
                            body += `<tr>
                                    <td>${item.name}</td>
                                    <td>${item.email}</td>
                                    <td>${item.phone}</td>
                                    <td>${item.businessname}</td>
                                    <td>${item.country}</td>
                                    <td>${item.state}</td>
                                    <td>${item.address}</td>
                                    <td data-toggle="modal" data-target="#projectdetails" >
                                        <button class='btn btn-danger' onclick='showDetails("${item.project_details}")'>Show Project Details</button>
                                        </td>
                                </tr>`
                        });
                    }
                    $('#tablebody').html(body);
                }
            });
        }

        const showDetails = (details) => {
            $('.projectDetails').text(details);
        }
    </script>
@endsection
