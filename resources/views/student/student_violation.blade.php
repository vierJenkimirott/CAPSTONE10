@extends('layouts.student')

@section('title', 'Violation History')

@section('content')
    
        <div class="container">
            <h2>Violation History</h2>
            <div class="violation-item">
                <span>⚠️ Did not surrender the phone</span>
                <span>01-20-25</span>
            </div>
            <div class="violation-item">
                <span>⚠️ Curfew Time</span>
                <span>01-21-25</span>
            </div>
            <div class="violation-item">
                <span>⚠️ No Logbook</span>
                <span>01-22-25</span>
            </div>
            <div class="violation-item">
                <span>⚠️ No Logbook</span>
                <span>01-22-25</span>
            </div>
            {{-- <button class="view-more">View More</button> --}}
        </div>
    </div>
@endsection
