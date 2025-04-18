

@extends('layouts.student')

@section('title', 'Rewards')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/student.css') }}">
@endpush

@section('content')
<div class="balance-box">
    Your behavior points balance <br>
    <span class="points">100 points</span>
</div>

<div class="earn-history-box">
    <button onclick="location.href='{{ route('student.student_earn_points') }}'">Earn more points</button>
    <button onclick="location.href='{{ route('student.student_redemption') }}'">History</button>

</div>

<div class="rewards-container">
    <div class="reward-item">
        <h4>6 hours going out without phone</h4>
        <span class="points">100 Points</span>
        <button>redeem</button>
    </div>
    <div class="reward-item">
        <h4>6 hours of phone without going out</h4>
        <span class="points">100 Points</span>
        <button>redeem</button>
    </div>

    </div> 
</div>
@endsection
