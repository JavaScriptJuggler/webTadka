@extends('admin_dashboard.layouts.main')
@section('page_content')
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-blogger"></i>
            </span> Blogs
        </h3>
        <nav aria-label="breadcrumb">
            <a href="{{ route('create-blog') }}" class="btn btn-gradient-primary btn-sm">
                <i class="mdi mdi-plus"></i> Create New Blog
            </a>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Blog Name</th>
                        <th scope="col">Blog Author</th>
                        <th scope="col">Blog Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($blogs) > 0)
                        @foreach ($blogs as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->heading }}</td>
                                <td>{{ $item->author }}</td>
                                <td>{{ $item->blogCategory->category_name }}</td>
                                <td>
                                    <a href="{{ route('create-blog') }}?data='{{ Crypt::encryptString($item) }}'"
                                        class="btn btn-gradient-primary">Edit</a>
                                    <button class="btn btn-gradient-danger"
                                        onclick="deleteBlog({{ $item->id }})">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script>
        function deleteBlog(blogid) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        holdOn();
                        $.ajaxSetup({
                            headers: {
                                'accept': 'application/json',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        })
                        $.ajax({
                            type: "POST",
                            url: "{{ route('delete-blog') }}",
                            data: {
                                id: blogid
                            },
                            success: function(response) {
                                if (response.status) {
                                    toastr.success(response.message);
                                    setTimeout(() => {
                                        closeHoldOn();
                                        location.reload();
                                    }, 3000);
                                } else {
                                    toastr.error(response.message);
                                }
                            }
                        });

                    }
                });
        }
    </script>
@endsection
