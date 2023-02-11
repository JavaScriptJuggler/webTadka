@extends('admin_dashboard.layouts.main')
@section('page_content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Priority</th>
                            <th>City</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @if (count($callConnect) > 0)
                                @foreach ($callConnect as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->priority }}</td>
                                        <td>{{ $item->city }}</td>
                                        <td>{{ $item->message }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->time }}</td>
                                        <td><button class="btn btn-danger"
                                                onclick="deleteData({{ $item->id }})">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            {!! $callConnect->links() !!}
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
                            url: "/delete-subscribers",
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
