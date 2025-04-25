@extends('layouts.staff-main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/educator/addViolator.css') }}">
@endsection

@section('content')
  <div class="content-wrapper">
    <button class="back-btn">
      <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
      </svg>Back
    </button>

    <div class="form-container">
      <h2 class="form-title">Add New Violator</h2>
      
      <form id="violatorForm" class="violation-form">
        <div class="form-group">
          <label for="student-select">Student</label>
          <select class="form-field" id="student-select" required>
            <option value="" selected disabled>Select Student</option>
            <option>Dion Paner</option>
            <option>Angelo Parocho</option>
            <option>Jenvier Montano</option>
            <option>Sarah Jomuad</option>
          </select>
        </div>

        <div class="form-group">
          <label for="violation-date">Violation Date</label>
          <input type="date" class="form-field" id="violation-date" required />
        </div>

        <div class="form-group">
          <label for="violation-type">Type of Violation</label>
          <select class="form-field" id="violation-type" required>
            <option value="" selected disabled>Select Violation Type</option>
            <option value="phone">Not returning phone</option>
            <option value="relationship">Relationship</option>
          </select>
        </div>

        <div class="form-group" id="severity-group">
          <label for="severity">Severity</label>
          <select class="form-field" id="severity" required>
            <option value="" selected disabled>Select Severity</option>
            <option>Low</option>
            <option>Medium</option>
            <option>High</option>
            <option>Very High</option>
          </select>
        </div>

        <div class="form-group" id="offense-group">
          <label for="offense">Offense</label>
          <select class="form-field" id="offense" required>
            <option value="" selected disabled>Select Offense</option>
            <option>1st Offense</option>
            <option>2nd Offense</option>
            <option>3rd Offense</option>
          </select>
        </div>

        <div class="form-group" id="penalty-group">
          <label for="penalty">Penalty</label>
          <select class="form-field" id="penalty" required>
            <option value="" selected disabled>Select Penalty</option>
            <option>Warning</option>
            <option>Verbal Warning</option>
            <option>Written Warning</option>
            <option>Probation</option>
            <option>Expulsion</option>
          </select>
        </div>

        <div class="form-group" id="consequence-group">
          <label for="consequence">Consequence</label>
          <input type="text" class="form-field" id="consequence" placeholder="Enter consequence" required />
        </div>

        <div class="form-actions">
          <button type="button" class="cancel-btn">
            <i class="fas fa-times"></i> Cancel
          </button>
          <button type="submit" class="submit-btn">
            <i class="fas fa-plus"></i> Add Violator
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    document.querySelector('.back-btn').addEventListener('click', () => {
      window.history.back();
    });

    document.querySelector('.cancel-btn').addEventListener('click', () => {
      window.history.back();
    });

    document.getElementById('violatorForm').addEventListener('submit', (e) => {
      e.preventDefault();
      // Add form submission logic here
    });
  </script>
@endpush