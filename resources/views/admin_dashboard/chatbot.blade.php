@extends('admin_dashboard.layouts.main')
@section('page_content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-danger text-white me-2">
                <i class="mdi mdi-alarm-check"></i>
            </span> Task Manager
        </h3>
        <nav aria-label="breadcrumb">
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#task_adder"
                onclick="$('#taskid').val('')">Add New Task</button>
        </nav>
    </div>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <div class="mail-box">
        <aside class="lg-side">
            <div class="inbox-body" style="height:60vh;overflow-y: auto">

                <table id="table" class="table table-inbox table-hover w-100">
                    <thead>
                        <th>Sl.</th>
                        <th>Project</th>
                        <th>Project Details</th>
                        <th>Contact Info</th>
                        <th>Project Assigned</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Follow Up</th>
                        <th>Stage</th>
                        <th>Remark</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @if (count($botData) > 0)
                            @foreach ($botData as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->project }}</td>
                                    <td>
                                        <span
                                            style="white-space: nowrap;
                                       width: 200px;
                                       overflow: hidden;
                                       text-overflow: ellipsis;
                                       display:block;
                                       ">
                                            {{ $item->project_details }}</span>
                                    </td>
                                    <td>{{ $item->contact_info }}</td>
                                    <td>{{ $item->project_assigned }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td>{{ $item->follow_up }}</td>
                                    <td>
                                        @if ($item->stage == 'Proposal')
                                            <span class="badge badge-pill badge-primary w-100">{{ $item->stage }}</span>
                                        @elseif ($item->stage == 'Review')
                                            <span class="badge badge-pill w-100"
                                                style="background-color: rgb(0, 255, 229);color:black">{{ $item->stage }}</span>
                                        @elseif ($item->stage == 'Negotiation')
                                            <span class="badge badge-pill w-100"
                                                style="background-color: rgb(246, 205, 0);color:black">{{ $item->stage }}</span>
                                        @elseif ($item->stage == 'In Progress')
                                            <span class="badge badge-pill w-100"
                                                style="background-color: rgb(32, 0, 172)">{{ $item->stage }}</span>
                                        @elseif ($item->stage == 'Qualified')
                                            <span class="badge badge-pill w-100"
                                                style="background-color: rgb(0, 172, 0)">{{ $item->stage }}</span>
                                        @elseif ($item->stage == 'Post Sale Service')
                                            <span class="badge badge-pill w-100"
                                                style="background-color: rgb(219, 0, 84)">{{ $item->stage }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            style="white-space: nowrap;
                                   width: 100px;
                                   overflow: hidden;
                                   text-overflow: ellipsis;
                                   display:block;
                                   ">
                                            {{ $item->remark }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($item->status == 'Ongoing')
                                            <span class="badge badge-pill w-100"
                                                style="background-color: rgb(255, 213, 0);color:black">
                                                {{ $item->status }}
                                            </span>
                                        @elseif ($item->status == 'Finished')
                                            <span class="badge badge-pill w-100"
                                                style="background-color: rgb(0, 219, 4);color:black">
                                                {{ $item->status }}
                                            </span>
                                        @elseif ($item->status == 'On Hold')
                                            <span class="badge badge-pill w-100" style="background-color: rgb(32, 0, 172)">
                                                {{ $item->status }}
                                            </span>
                                        @elseif ($item->status == 'Decline')
                                            <span class="badge badge-pill w-100" style="background-color: rgb(219, 0, 84)">
                                                {{ $item->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#task_adder"
                                            class="btn btn-sm" onclick="viewEditTask(this)"
                                            style="background-color: rgb(0, 159, 164);color:white;"
                                            data-id="{{ $item->id }}" data-project="{{ $item->project }}"
                                            data-project_details="{{ $item->project_details }}"
                                            data-contact_info="{{ $item->contact_info }}"
                                            data-follow_up="{{ $item->follow_up }}" data-remark="{{ $item->remark }}"
                                            data-project_assigned="{{ $item->project_assigned }}"
                                            data-start_date="{{ $item->start_date }}"
                                            data-end_date="{{ $item->end_date }}" data-follow_up="{{ $item->follow_up }}"
                                            data-stage="{{ $item->stage }}" data-remark="{{ $item->remark }}"
                                            data-status="{{ $item->status }}"><i class="mdi mdi-eye"></i></button>
                                        <button type="button" data-toggle="modal" data-target="#task_adder"
                                            class="btn btn-sm" onclick="viewEditTask(this)"
                                            style="background-color: rgb(245, 167, 0);color:white;"
                                            data-id="{{ $item->id }}" data-project="{{ $item->project }}"
                                            data-project_details="{{ $item->project_details }}"
                                            data-follow_up="{{ $item->follow_up }}" data-remark="{{ $item->remark }}"
                                            data-contact_info="{{ $item->contact_info }}"
                                            data-project_assigned="{{ $item->project_assigned }}"
                                            data-start_date="{{ $item->start_date }}"
                                            data-end_date="{{ $item->end_date }}" data-follow_up="{{ $item->follow_up }}"
                                            data-stage="{{ $item->stage }}" data-remark="{{ $item->remark }}"
                                            data-status="{{ $item->status }}"><i class="mdi mdi-table-edit"></i></button>
                                        <button type="button" class="btn btn-sm"
                                            style="background-color: rgb(255, 0, 132);color:white;"><i
                                                class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </aside>
    </div>
    <div class="modal fade" id="task_adder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tasks</h5>
                </div>
                <div class="modal-body">
                    <form id="task_submit_form" name="task_submit_form">
                        <input type="hidden" name="id" id="taskid">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Project</label>
                                    <input type="text" name="project" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Contact Info</label>
                                    <input type="text" name="contactinfo" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Project Assigned</label>
                                    <input type="text" name="project_assigned" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Project Details</label>
                                    <textarea class="form-control" name="project_details" name="" id="" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Start Date</label>
                                    <input type="text" id="startdate" name="startdate" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">End Date</label>
                                    <input type="text" id="enddate" name="enddate" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Follow Up</label>
                                    <input type="text" name="followup" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Stage</label>
                                <select name="stage" style="height:3rem;background-color:white;color:black;"
                                    id="stage" class="form-control">
                                    <option value="" style="display:none">Select Stage</option>
                                    <option value="Proposal">Proposal</option>
                                    <option value="Review">Review</option>
                                    <option value="Negotiation">Negotiation</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Qualified">Qualified</option>
                                    <option value="Post Sale Service">Post Sale Service</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Remarks</label>
                                    <input type="text" name="remarks" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Status</label>
                                    <select name="status" style="height:3rem;background-color:white;color:black;"
                                        id="status" class="form-control">
                                        <option value="" style="display:none">Select Status</option>
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="On Hold">On Hold</option>
                                        <option value="Decline">Decline</option>
                                        <option value="Finished">Finished</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="task_submit_form">Create Task</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script>
        const viewEditTask = (element) => {
            $('input[name=id]').val($(element).data('id'));
            $('input[name=project]').val($(element).data('project'));
            $('input[name=contactinfo]').val($(element).data('contact_info'));
            $('input[name=project_assigned]').val($(element).data('project_assigned'));
            $('textarea[name=project_details]').val($(element).data('project_details'));
            $('input[name=startdate]').val($(element).data('start_date'));
            $('input[name=enddate]').val($(element).data('end_date'));
            $('select[name=stage]').val($(element).data('stage'));
            $('select[name=status]').val($(element).data('status'));
            $('input[name=followup]').val($(element).data('follow_up'));
            $('input[name=remarks]').val($(element).data('remark'));
        }
        $(document).ready(function() {
            $("#startdate,#enddate").datepicker({
                dateFormat: 'dd-mm-yy'
            });
        });
        $('#task_submit_form').submit(function(e) {
            e.preventDefault();
            holdOn();
            let formdata = new FormData($('#task_submit_form')[0]);
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "POST",
                url: "/save-task",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 1) {
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
    </script>
@endsection
