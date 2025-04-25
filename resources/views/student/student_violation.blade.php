@extends('layouts.student')

@section('title', 'Violation History')

@section('css')
<link rel="stylesheet" href="{{ asset('css/student-violation.css') }}">
@endsection

@section('content')
<div class="container">
    <h2>Violation History</h2>

    <div class="violation-card" onclick="this.classList.toggle('open')">
        <div class="violation-main">
            <div class="title">⚠️ Did not surrender the phone</div>
            <div class="date">01-20-25</div>
            <span class="severity medium">Medium</span>
            <div class="violation-details">
                <p>Description:</p>
                <p>Student failed to return phone at the designated time.</p>
            </div>
        </div>
        <span class="status pending">Pending</span>
    </div>

    <div class="violation-card" onclick="this.classList.toggle('open')">
        <div class="violation-main">
            <div class="title">⚠️ Curfew Time</div>
            <div class="date">01-21-25</div>
            <span class="severity low">Low</span>
            <div class="violation-details">
                Student arrived late past the 10 PM curfew.
            </div>
        </div>
        <span class="status resolved">Resolved</span>
    </div>

    <div class="violation-card" onclick="this.classList.toggle('open')">
        <div class="violation-main">
            <div class="title">⚠️ No Logbook</div>
            <div class="date">01-22-25</div>
            <span class="severity low">Low</span>
            <div class="violation-details">
                No logbook submitted during morning check-in.
            </div>
        </div>
        <span class="status resolved">Resolved</span>
    </div>

    {{-- Example duplication for testing layout --}}
    <div class="violation-card" onclick="this.classList.toggle('open')">
        <div class="violation-main">
            <div class="title">⚠️ No Logbook</div>
            <div class="date">01-22-25</div>
            <span class="severity low">Low</span>
            <div class="violation-details">
                No logbook submitted during morning check-in.
            </div>
        </div>
        <span class="status resolved">Resolved</span>
    </div>
</div>
@endsection
