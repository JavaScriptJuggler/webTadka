@extends('admin_dashboard.layouts.main')
@section('page_content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile Settings</h4>
                    <p class="card-description"> Profile settings for users </p>
                    <form class="forms-sample profile_form">
                        <input type="hidden" name="action" value="nameAndEmail">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                                value="{{ $userDetails->name }}">
                            <strong><span class="text-danger error-name" style="margin-top:10px;"></span></strong>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                value="{{ $userDetails->email }}">
                            <strong><span class="text-danger error-email" style="margin-top:10px;"></span></strong>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    </form>
                    <form class="profile_form">
                        <input type="hidden" name="action" value="changePassword">
                        <h4 class="card-title mt-5 mb-3">Change Password</h4>
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="text" class="form-control" id="current_password" name="current_password"
                                placeholder="Current Password">
                            <strong><span class="text-danger error-current_password"
                                    style="margin-top:10px;"></span></strong>
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" class="form-control" id="new_password" placeholder="New Password"
                                name="password">
                            <strong><span class="text-danger error-password" style="margin-top:10px;"></span></strong>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="text" class="form-control" id="confirm_password" placeholder="Confirm Password"
                                name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.profile_form').submit(function(e) {
            let formData = new FormData($(this)[0]);
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/save-settings",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.hasOwnProperty('error')) {
                        Object.entries(response.error).forEach(element => {
                            $('.error-' + element[0]).text(element[1][0]);
                        });
                    } else {
                        if (response.status) {
                            swal("Success", response.message, "success");
                        } else {
                            swal("Error", response.message, "error");
                        }
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
                    }
                }
            });
        });
    </script>
@endsection
