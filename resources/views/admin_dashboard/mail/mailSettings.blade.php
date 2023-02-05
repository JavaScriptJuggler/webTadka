@extends('admin_dashboard.layouts.main')
@section('page_content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-danger text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Mail Master
        </h3>
        <nav aria-label="breadcrumb">
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <th>Sl</th>
                    <th>Mail Id</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>team@webtadka.com</td>
                        <td><a href="{{route('view-mail-details',['inboxid'=>Crypt::encryptString('imap_teamWebtadka')])}}" class="btn btn-gradient-danger">Mail Box</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>support@webtadka.com</td>
                        <td><a href="{{route('view-mail-details',['inboxid'=>Crypt::encryptString('imap_supportWebtadka')])}}" class="btn btn-gradient-danger">Mail Box</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>services@webtadka.com</td>
                        <td><a href="{{route('view-mail-details',['inboxid'=>Crypt::encryptString('imap_servicesWebtadka')])}}" class="btn btn-gradient-danger">Mail Box</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>career@webtadka.com</td>
                        <td><a href="{{route('view-mail-details',['inboxid'=>Crypt::encryptString('imap_careerWebtadka')])}}" class="btn btn-gradient-danger">Mail Box</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>partner@webtadka.com</td>
                        <td><a href="{{route('view-mail-details',['inboxid'=>Crypt::encryptString('imap_partnerWebtadka')])}}" class="btn btn-gradient-danger">Mail Box</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
