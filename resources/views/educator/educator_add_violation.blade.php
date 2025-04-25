@extends('layouts.staff-main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/educator/addViolation.css') }}">
@endsection

@section('content')
  <div class="content-wrapper">
    <button class="back-btn">
      <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
      </svg>Back
    </button>

    <div class="form-container">
      <h2 class="form-title">Add New Violation</h2>
      
      <form id="violationForm" class="violation-form">
        <div class="form-group">
          <label for="violationName">Violation Name</label>
          <input type="text" class="form-field" id="violationName" placeholder="Enter violation name" required/>
        </div>

        <div class="form-group">
          <label for="category">Category</label>
          <select class="form-field" id="category" required>
            <option value="" selected disabled>Select Category</option>
            <option value="academic">Academic</option>
            <option value="behavioral">Behavioral</option>
            <option value="disciplinary">Disciplinary</option>
          </select>
        </div>

        <div class="form-group">
          <label for="severity">Severity</label>
          <select class="form-field" id="severity" required>
            <option value="" selected disabled>Select Severity</option>
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
            <option value="very-high">Very High</option>
          </select>
        </div>

        <div class="form-group">
          <label for="offense">Offense</label>
          <select class="form-field" id="offense" required>
            <option value="" selected disabled>Select Offense</option>
            <option value="1st">1st Offense</option>
            <option value="2nd">2nd Offense</option>
            <option value="3rd">3rd Offense</option>
          </select>
        </div>

        <div class="form-group">
          <label for="penalty">Penalty</label>
          <select class="form-field" id="penalty" required>
            <option value="" selected disabled>Select Penalty</option>
            <option value="warning">Warning</option>
            <option value="verbal">Verbal Warning</option>
            <option value="written">Written Warning</option>
            <option value="probation">Probation</option>
            <option value="expulsion">Expulsion</option>
          </select>
        </div>

        <div class="form-actions">
          <button type="button" class="cancel-btn">
            <i class="fas fa-times"></i> Cancel
          </button>
          <button type="submit" class="submit-btn">
            <i class="fas fa-plus"></i> Add Violation
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

    document.getElementById('violationForm').addEventListener('submit', (e) => {
      e.preventDefault();
      // Add form submission logic here
    });
  </script>
@endpush