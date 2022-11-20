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
                <div class="card-body">
                    <h4 class="card-title">Seo & Digital Merketing Agency</h4>
                    <p class="card-description">Details here will show on services section</p>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Heading</label>
                            <input type="text" class="form-control" id="heading" placeholder="Heading" name="Heading">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Description</label>
                            <textarea class="form-control" rows="5" id="description" placeholder="Description" name="Description"></textarea>
                        </div>

                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- services --}}
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Services</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Heading</label>
                            <input type="text" class="form-control" id="heading" placeholder="Heading" name="Heading">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Description</label>
                            <textarea class="form-control" rows="5" id="description" placeholder="Description" name="Description"></textarea>
                        </div>

                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
