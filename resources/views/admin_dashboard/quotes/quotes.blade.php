@extends('admin_dashboard.layouts.main')
@section('page_content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>Sl.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Business Name</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>Address</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Project Details</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @if (count($quotes) > 0)
                                    @foreach ($quotes as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->business_name }}</td>
                                            <td>{{ $item->country }}</td>
                                            <td>{{ $item->state }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->time }}</td>
                                            <td>
                                                <textarea name="" id="" cols="30" rows="10">{{ $item->project_details }}</textarea>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger"
                                                    onclick="deleteData({{ $item->id }})">Delete</button>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            {!! $quotes->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const deleteData = (id) => {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this record!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajaxSetup({
                            headers: {
                                'accept': 'application/json',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        })
                        $.ajax({
                            type: "post",
                            url: "/delete-quotes",
                            data: {
                                deleteId: id
                            },
                            success: function(response) {
                                location.reload();
                            }
                        });
                    }
                });
        }
    </script>
@endsection
