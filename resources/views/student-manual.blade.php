@extends('layouts.staff-main')

@section('title', 'Student Violation Manual')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/student-manual.css') }}">
@endsection

@section('manual')
    <div class="container">
        <div class="main-heading">
            <img src="{{ asset('images/PN-logo-removebg-preview.png') }}" alt="" style="width: 200px; height: 200px; display: block; margin: auto;">
            <h1 style="text-align: center;">PN Student Violation Manual</h1>
        </div>
        <h2 style="text-align: center;">Empowering Responsible Center Life Through Awareness and Discipline.</h2>
        <p>Welcome, scholars! This manual helps you understand the rules and expectations while living at the center. Staying informed is the first step to success and harmony!</p>
        <p>Click here for the next page: <a href="#">Page 2</a></p>
    </div>
@endsection
