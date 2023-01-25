@extends('admin_dashboard.layouts.main')
@section('page_content')
    <div class="page-header"></div>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <div class="mail-box">
        <aside class="lg-side">
            <div class="inbox-head">
                <h3>Inbox ({{ $inboxName }})</h3>
                <div class="pull-right position">
                    <button class="btn btn-danger" data-toggle="modal" data-target="#composeMail">Compose</button>
                </div>
            </div>
            <div class="inbox-body" style="height:60vh;overflow-y: auto">
                <table class="table table-inbox table-hover">
                    <tbody>
                        @if (count($message_details) > 0)
                            @foreach ($message_details as $item)
                                <tr class="{{ count($item['seen']) == 0 ? 'unread' : '' }}"
                                    data-subject="{{ $item['subject'] }}" data-body="{{ $item['body'] }}"
                                    onclick="showMailDetails(this)" data-toggle="modal" data-target="#mailMessage">
                                    <td class="view-message  dont-show">{{ $item['from'] }}</td>
                                    <td class="view-message ">{{ $item['subject'] }}</td>
                                    <td class="view-message  text-right">
                                        {{ date('d/m/Y h:i a', strtotime($item['timestamp'])) }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </aside>
    </div>
    <div class="modal fade" id="mailMessage" tabindex="-1" role="dialog" aria-labelledby="mailMessageLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="mailMessageLabel"></h3>
                </div>
                <div class="modal-body mailMessageBody"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="composeMail" tabindex="-1" role="dialog" aria-labelledby="composeMailLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="composeMailLabel">Compose Mail</h3>
                </div>
                <div class="modal-body composeMailBody">
                    <form id="composeMailForm" name="composeMailForm">
                        <input type="hidden" name="sendMailFrom"
                            value="{{ $inboxName == 'support@webtadka.com' ? 'sendSupportMail' : 'sendEnquiryMail' }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-control">
                                    <label for="" class="form-label">To</label>
                                    <input type="text" name="to_mail" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-control">
                                    <label for="" class="form-label">CC</label>
                                    <input type="text" name="cc" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-control">
                                    <label for="" class="form-label">BCC</label>
                                    <input type="text" name="bcc" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-control">
                                    <label for="" class="form-label">Subject</label>
                                    <input type="text" name="subject" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-control">
                                    <label for="" class="form-label">Subject</label>
                                    <textarea name="mail_body" class="form-control" id="mailbody"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary composeMailModalClose"
                        data-dismiss="modal">Close</button>
                    <button type="submit" form="composeMailForm" class="btn btn-primary">Send Mail</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script>
        const showMailDetails = (element) => {
            $('#mailMessageLabel').text($(element).data('subject'));
            $('.mailMessageBody').html($(element).data('body'));
        }
        $(document).ready(function() {
            CKEDITOR.replace('mailbody', {
                editorplaceholder: "Compose Mail",
            });
        });

        $('#composeMailForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            formData.append('body', CKEDITOR.instances.mailbody.getData())
            holdOn();
            $.ajaxSetup({
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "post",
                url: "/send-mails",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    closeHoldOn();
                    if (response.status) {
                        toastr.success('Mail sent successfully');
                        $('.composeMailModalClose').click();
                        $('#composeMailForm').trigger('reset');
                        CKEDITOR.instances.mailbody.setData('');
                    }
                }
            });
        });
    </script>
@endsection
