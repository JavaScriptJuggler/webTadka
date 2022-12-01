@extends('admin_dashboard.layouts.main')
@section('page_content')
    <div class="page-header"></div>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <div class="mail-box">
        <aside class="lg-side">
            <div class="inbox-head">
                <h3>Inbox</h3>
                <div class="pull-right position">
                    <button class="btn btn-danger">Compose</button>
                </div>
            </div>
            <div class="inbox-body" style="height:60vh;overflow-y: auto">
                <table class="table table-inbox table-hover">
                    <tbody>
                        @if (count($message_details) > 0)
                            @foreach ($message_details as $item)
                                <tr class="{{ count($item['seen']) == 0 ? 'unread' : '' }}">
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
@endsection
