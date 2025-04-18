
@extends('layouts.student')

@section('title', 'Student Account')

@section('content')
    <div class="container">
        <div class="profile-header">
            <div class="profile-pic"></div>
            <div class="profile-details">
                <h3>Jenvier Montano</h3>
                <p>Grade: 2nd Year</p>
                <p>Status: Written Warning</p>
            </div>
        </div>
        <div class="info-box">Email</div>
        <div class="info-box">Phone</div>
        <div class="info-box">Parent Contact</div>
        <div class="info-box">Parent Phone</div>
    </div>
@endsection