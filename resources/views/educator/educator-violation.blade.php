@extends('layouts.staff-main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/educator/violation.css') }}">
@endsection

@section('content')
<h2>Violation</h2>
<main>
      <div class="top-buttons">
        <a href="{{route('educator_add_violator')}}" class="btn">+ Add Violator</a>
        <a href="{{route('educator_add_violation')}}" class="btn">+ Add Violation</a>
        <a href="violationHistory.html" class="btn">Student Violation History</a>
      </div>

      <section class="warning-section">
        <div class="column">
          <div class="warning-box tall">Warning Student<br><span>4</span></div>
          <div class="warning-box tall">Written Warning Student<br><span>4</span></div>
        </div>
        <div class="column center">
          <div class="warning-box wide">Verbal Warning Student<br><span>4</span></div>
        </div>
        <div class="column">
          <div class="warning-box tall">Probation Student<br><span>0</span></div>
          <div class="warning-box tall">Expulsion Student<br><span>0</span></div>
        </div>
      </section>

      <section class="violation-table">
        <div class="search-bar">
          <input type="text" placeholder="Search violation..." />
          <select>
            <option>All Severity</option>
            <option>Low</option>
            <option>Medium</option>
            <option>High</option>
            <option>Very High</option>
          </select>
          <button class="view-more">View More</button>
        </div>

        <table>
          <thead>
            <tr>
              <th>Violation</th>
              <th>Student</th>
              <th>Severity</th>
              <th>Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>No returning phone</td>
              <td>Dion Paner</td>
              <td class="high">High</td>
              <td>Feb 14, 2024</td>
              <td class="pending">Pending</td>
              <td><i class="fas fa-edit"></i> <i class="fas fa-eye"></i></td>
            </tr>
            <tr>
              <td>Relationship</td>
              <td>Angelo Parocho</td>
              <td class="high">High</td>
              <td>Feb 14, 2024</td>
              <td class="pending">Pending</td>
              <td><i class="fas fa-edit"></i> <i class="fas fa-eye"></i></td>
            </tr>
            <tr>
              <td>Eating inside room</td>
              <td>Sarah Jaomuad</td>
              <td class="high">High</td>
              <td>Feb 14, 2024</td>
              <td class="pending">Pending</td>
              <td><i class="fas fa-edit"></i> <i class="fas fa-eye"></i></td>
            </tr>
            <tr>
              <td>Hanging clothes in the window</td>
              <td>Jenvier Montano</td>
              <td class="high">High</td>
              <td>Feb 14, 2024</td>
              <td class="pending">Pending</td>
              <td><i class="fas fa-edit"></i> <i class="fas fa-eye"></i></td>
            </tr>
          </tbody>
        </table>
      </section>
    </main>
@endsection