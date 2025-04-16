@extends ('layouts.staff-main')

@section('title', 'Table of Contents')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/student-manual.css') }}">
@endsection

@section('tabls-of-contents')
    <div class="container">
        <h2>Table of Contents</h2>
        <h4>Category</h4>
        <ul>
            <li>General Behavior</li>
            <li>Schedules</li>
            <li>Room Rules</li>
            <li>Dress Code</li>
            <li>Equipment</li>
            <li>Center tasking</li>
        </ul>
        <h4>Severity</h4>
        <ul>
            <li>Low</li>
            <li>Medium</li>
            <li>High</li>
            <li>Very High</li>
        </ul>
        <h4>Penalties</h4>
        <ul>
            <li>Warning</li>
            <li>Verbal Warning</li>
            <li>Written Warning</li>
            <li>Probation</li>
            <li>Expulsion</li>
        </ul>
    </div>
@endsection