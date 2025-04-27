@extends('layouts.staff-main')

@section('css')
    <!-- External CSS Dependencies -->
    <link rel="stylesheet" href="{{ asset('css/educator/violation.css') }}">
@endsection

@section('content')
    <!-- Page Header -->
    <h2>Violation Types</h2>

    <main>
        <!-- Action Buttons Section -->
        <div class="top-buttons">
            <a href="{{ route('educator_add_violation') }}" class="btn">+ Add Violation Type</a>
        </div>

        <!-- Violation Types Table Section -->
        <section class="violation-table">
            <!-- Search and Filter Controls -->
            <div class="search-bar">
                <input type="text" placeholder="Search violation type..." id="searchInput" />
                <select id="categoryFilter">
                    <option value="">All Categories</option>
                    @foreach($violationTypes->pluck('category_name')->unique() as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Violation Types Data Table -->
            <table>
                <thead>
                    <tr>
                        <th>Violation Name</th>
                        <th>Category</th>
                        <th>Default Penalty</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($violationTypes as $type)
                        <tr>
                            <td>{{ $type->violation_name }}</td>
                            <td>{{ $type->category_name }}</td>
                            <td>
                                @switch($type->default_penalty)
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
                            <td>{{ \Carbon\Carbon::parse($type->created_at)->format('M d, Y') }}</td>
                            <td>
                                <i class="fas fa-edit" onclick="editViolationType({{ $type->id }})"></i>
                                <i class="fas fa-trash" onclick="deleteViolationType({{ $type->id }})"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection

@push('scripts')
<script>
    // =============================================
    // Search Functionality
    // =============================================
    /**
     * Filter table rows based on search input
     * Matches violation type information against search text
     */
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchText = this.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchText) ? '' : 'none';
        });
    });

    // =============================================
    // Category Filter Functionality
    // =============================================
    /**
     * Filter table rows based on selected category
     * Shows only violation types matching the selected category
     */
    document.getElementById('categoryFilter').addEventListener('change', function() {
        const selectedCategory = this.value;
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const category = row.querySelector('td:nth-child(2)').textContent;
            row.style.display = (selectedCategory === '' || category === selectedCategory) ? '' : 'none';
        });
    });

    // =============================================
    // Violation Type Actions
    // =============================================
    /**
     * Handle edit violation type action
     * @param {number} id - The ID of the violation type to edit
     */
    function editViolationType(id) {
        // TODO: Implement edit functionality
        alert('Edit functionality coming soon!');
    }

    /**
     * Handle delete violation type action
     * @param {number} id - The ID of the violation type to delete
     */
    function deleteViolationType(id) {
        if (confirm('Are you sure you want to delete this violation type?')) {
            // TODO: Implement delete functionality
            alert('Delete functionality coming soon!');
        }
    }
</script>
@endpush 