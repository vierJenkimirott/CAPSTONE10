@extends('layouts.staff-main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rewards.css') }}">
@endsection

@section('content')
<div class="main-content">
    <div class="header-controls">
        <h2>Add New Reward</h2>
    </div>

    <div class="form-container animate-fade-in">
        <form action="{{ route('rewards.store') }}" method="POST" class="reward-form">
            @csrf
            
            <div class="form-group">
                <label for="student_name">Student Name</label>
                <input type="text" 
                       id="student_name" 
                       name="student_name" 
                       required 
                       class="form-input"
                       placeholder="Enter student name">
            </div>

            <div class="form-group">
                <label for="reward_type">Reward Type</label>
                <select id="reward_type" 
                        name="reward_type" 
                        required 
                        class="form-input">
                    <option value="">Select Reward Type</option>
                    <option value="academic">Academic Excellence</option>
                    <option value="behavior">Good Behavior</option>
                    <option value="attendance">Perfect Attendance</option>
                    <option value="leadership">Leadership</option>
                </select>
            </div>

            <div class="form-group">
                <label for="points">Points</label>
                <input type="number" 
                       id="points" 
                       name="points" 
                       required 
                       class="form-input" 
                       min="1"
                       placeholder="Enter points">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" 
                          name="description" 
                          required 
                          class="form-input" 
                          rows="4"
                          placeholder="Enter reward description"></textarea>
            </div>

            <div class="form-actions">
                <button type="button" 
                        onclick="window.location.href='{{ route('rewards') }}'" 
                        class="btn-secondary">
                    Back
                </button>
                <button type="submit" class="btn-primary">
                    Add Reward
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 