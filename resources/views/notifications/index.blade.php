@extends('admin_index')

@section('admin_content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Notifications</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-group">
                                    @forelse($notifications as $notification)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $notification->data['message'] }}
                                            @if ($notification->unread())
                                                <a href="{{ route('notifications.mark-as-read', $notification->id) }}" class="btn btn-primary btn-sm">Mark as Read</a>
                                            @endif
                                        </li>
                                    @empty
                                        <li class="list-group-item">No notifications found.</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
