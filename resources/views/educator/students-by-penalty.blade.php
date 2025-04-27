@extends('layouts.staff-main')

@section('css')
    <!-- Custom Styles -->
    <style>
        /* Table Styling */
        .students-table {
            width: 100%;
            margin-top: 2rem;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .students-table th,
        .students-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .students-table th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #333;
        }

        .students-table tr:hover {
            background-color: #f5f5f5;
        }

        /* Penalty Label Styling */
        .penalty-label {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 4px;
            font-weight: 500;
        }

        /* Penalty Color Variations */
        .penalty-W { background-color: #ffeeba; }    /* Warning */
        .penalty-VW { background-color: #ffcdd2; }   /* Verbal Warning */
        .penalty-WW { background-color: #ffab91; }   /* Written Warning */
        .penalty-Pro { background-color: #ef9a9a; }  /* Probation */
        .penalty-Exp { background-color: #e57373; }  /* Expulsion */

        /* Search Bar Styling */
        .search-bar {
            margin: 2rem 0;
            display: flex;
            gap: 1rem;
        }

        .search-bar input {
            flex: 1;
            padding: 0.5rem 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        /* Back Button Styling */
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: #f8f9fa;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: #333;
            text-decoration: none;
            margin-bottom: 1rem;
        }

        .back-btn:hover {
            background: #e9ecef;
        }

        /* Content Layout */
        .content-wrapper {
            padding: 2rem;
        }

        .page-title {
            margin-bottom: 2rem;
            color: #333;
        }
    </style>
@endsection

@section('content')
    <!-- Main Content Wrapper -->
    <div class="content-wrapper">
        <!-- Back Navigation Button -->
        <a href="{{ route('educator-violation') }}" class="back-btn">
            <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
            </svg>
            Back
        </a>

        <!-- Page Title -->
        <h2 class="page-title">Students with {{ $penaltyName }} Violations</h2>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search student...">
        </div>

        <!-- Students Table -->
        <table class="students-table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Violation Count</th>
                    <th>Latest Violation</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->fname }} {{ $student->lname }}</td>
                        <td>{{ $student->violation_count }}</td>
                        <td>{{ $student->latest_violation ? \Carbon\Carbon::parse($student->latest_violation)->format('M d, Y') : 'N/A' }}</td>
                        <td>
                            <span class="penalty-label penalty-{{ $student->penalty }}">
                                {{ $student->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">No students found with {{ $penaltyName }} violations.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script>
    // =============================================
    // Search Functionality
    // =============================================
    /**
     * Filter table rows based on search input
     * Matches student information against search text
     */
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchText = this.value.toLowerCase();
        const rows = document.querySelectorAll('.students-table tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchText) ? '' : 'none';
        });
    });
</script>
@endpush
