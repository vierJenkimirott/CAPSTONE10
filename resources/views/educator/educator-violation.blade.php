@extends('layouts.staff-main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/educator/violation.css') }}">
    <script src="https://kit.fontawesome.com/4e45d9ad8d.js" crossorigin="anonymous"></script>
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
        </div>

        <table>
          <thead>
            <tr>
              <th>Violation</th>
              <th>Category</th>
              <th>Student</th>
              <th>Severity</th>
              <th>Offense</th>
              <th>Penalty</th>
              <th>Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <tbody>
            @foreach ($violations as $violation)
              <tr>
                <td>{{ $violation->violationType->violation_name }}</td>
                <td>{{ $violation->offenseCategory->category_name }}</td>
                <td>{{ $violation->student->fname }} {{ $violation->student->lname }}</td>
                <td class="{{ strtolower($violation->severity) }}">{{ $violation->severity }}</td>
                <td>{{ $violation->offense }}</td>
                <td>
                    @switch($violation->penalty)
                        @case('W')
                            Warning
                            @break
                        @case('VW')
                            Verbal Warning
                            @break
                        @case('WW')
                            Written Warning
                            @break
                        @case('Pro')
                            Probation
                            @break
                        @case('Exp')
                            Expulsion
                            @break
                    @endswitch
                </td>
                <td>{{ \Carbon\Carbon::parse($violation->violation_date)->format('M d, Y') }}</td>
                <td class="{{ strtolower($violation->status) }}">{{ ucfirst($violation->status) }}</td>
                <td>
                  <a href="{{ route('educator_edit_violation', ['id' => $violation->id]) }}" class="action-icon" title="Edit Violation">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="{{ route('educator_view_violation', ['id' => $violation->id]) }}" class="action-icon" title="View Details">
                    <i class="fas fa-eye"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </section>
    </main>
@endsection