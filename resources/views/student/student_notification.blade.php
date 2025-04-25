@extends('layouts.student')

@section('title', 'Notifications')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/student_notification.css') }}">
@endpush

@section('content')
<div class="container">
    <h2>🔔 Notifications</h2>

    {{-- Example Notifications --}}
    <div class="notification-card unread">
        <div class="message">
            ⚠️ You received a new violation: <strong>No Logbook</strong>.
        </div>
        <div class="meta">
            Jan 22, 2025 • Behavior Update
        </div>
    </div>

    <div class="notification-card">
        <div class="message">
            🎁 You earned 100 points for consistent positive behavior!
        </div>
        <div class="meta">
            Jan 21, 2025 • Rewards
        </div>
    </div>

    <div class="notification-card">
        <div class="message">
            📢 Center reminder: General cleaning on Jan 25, 2025.
        </div>
        <div class="meta">
            Jan 20, 2025 • Announcement
        </div>
    </div>
</div>
@endsection
