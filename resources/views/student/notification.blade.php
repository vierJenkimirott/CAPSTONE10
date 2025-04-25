@extends('layouts.student')

@section('title', 'Notifications')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/student-notification.css') }}">
@endpush

@section('content')
<div class="container">
    <h2>🔔 Notifications</h2>

    @if($unreadCount > 0)
        <div class="notification-card unread">
            <div class="message">
                You have {{ $unreadCount }} unread notification(s).
            </div>
        </div>
    @else
        <div class="notification-card">
            <div class="message">
                No new notifications.
            </div>
        </div>
    @endif
</div>
@endsection 