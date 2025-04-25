@extends('layouts.student')

@section('title', 'Student Account')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/student.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="profile-header">
                    <img src="{{ asset('images/newprof.png') }}" alt="Profile Picture" class="profile-picture">
                    <div class="profile-info">
                        <h1>Emily Johnson</h1>
                        <div class="student-details">
                            <span>Student ID: STU-78291</span>
                            <span class="status-badge">Good Standing</span>
                        </div>
                        <p class="grade">Grade 11</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <h2>Contact Information</h2>
                <div class="info-section">
                    <label>Email Address</label>
                    <div class="info-value">emily.johnson@student.scholarsync.edu</div>
                </div>

                <div class="info-section">
                    <label>Phone Number</label>
                    <div class="info-value">(555) 123-4567</div>
                </div>

                <div class="info-section">
                    <label>Parent Contact</label>
                    <div class="info-value">Sarah Johnson</div>
                </div>

                <div class="info-section">
                    <label>Parent Phone</label>
                    <div class="info-value">(555) 987-6543</div>
                </div>
            </div>
        </div>
    </div>
@endsection