@extends('admin_dashboard.layouts.main')
@section('page_content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-danger text-white me-2">
                <i class="mdi mdi-robot"></i>
            </span> Chatbot
        </h3>
        <nav aria-label="breadcrumb">
            <button class="btn btn-primary btn-sm" onclick="insertRow()">Add New Record</button>
        </nav>
    </div>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <div class="mail-box">
        <aside class="lg-side">
            <div class="inbox-body" style="height:60vh;overflow-y: auto">

                <table id="table" class="table table-inbox table-hover w-100">
                    <thead>
                        <th>Sl.</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Actions</th>
                    </thead>
                    <form id="chatBotDataForm" name="chatBotDataForm">
                        <tbody>
                            @if (count($botData) > 0)
                                @foreach ($botData as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td class="w-25"><input required type="text" name="question[]" class="form-control"
                                                value="{{ $item->question }}"></td>
                                        <td class="w-25"><input required type="text" name="answer[]" class="form-control"
                                                value="{{ $item->answer }}"></td>
                                        <td>
                                            <button class="btn btn-gradient-danger"
                                                data-key="{{ $item->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </form>
                </table>
            </div>
        </aside>
    </div>
    <div style="margin-top: 30px;" class="text-center">
        <button class="btn btn-gradient-primary btn-block" form="chatBotDataForm">Save</button>
    </div>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script>
        $('#chatBotDataForm').submit(function(e) {
            e.preventDefault();
            holdOn();
            var formdata = new FormData($('#chatBotDataForm')[0]);
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "post",
                url: "{{ route('save-bot') }}",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success('Data Changed Successfully!')
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

        var index = parseInt('{{ count($botData) }}') + 1;

        function insertRow() {
            var table = document.getElementById("table");
            var row = table.insertRow(table.rows.length);

            var cell1 = row.insertCell(0);
            cell1.append(index);

            var cell2 = row.insertCell(1);
            var t2 = document.createElement("input");
            t2.classList.add('form-control');
            t2.name = 'question[]';
            t2.setAttribute('form', 'chatBotDataForm');
            t2.setAttribute('required', 'required');
            cell2.appendChild(t2);

            var cell3 = row.insertCell(2);
            var t3 = document.createElement("input");
            t3.classList.add('form-control');
            t3.name = 'answer[]';
            t3.setAttribute('form', 'chatBotDataForm');
            t3.setAttribute('required', 'required');
            cell3.appendChild(t3);

            var cell4 = row.insertCell(3);
            var b4 = document.createElement("button");
            b4.classList.add('btn', 'btn-gradient-danger');
            b4.innerHTML = "Delete";
            b4.addEventListener("click", () => {
                table.deleteRow(table.rows.length - 1);
            })
            cell4.appendChild(b4);

            index++;
            var objDiv = document.querySelector(".inbox-body");
            objDiv.scrollTop = objDiv.scrollHeight;
        }
    </script>
@endsection
