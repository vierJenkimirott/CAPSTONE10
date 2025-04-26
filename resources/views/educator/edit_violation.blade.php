@extends('layouts.staff-main')

@section('content')
<div class="container">
    <h2>Edit Violation</h2>
    
    <form action="{{ route('educator_update_violation', ['id' => $violation->id]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="student_id">Student</label>
            <select name="student_id" id="student_id" class="form-control" required>
                <option value="">Select Student</option>
                @foreach($students as $student)
                    <option value="{{ $student->student_id }}" {{ $violation->student_id == $student->student_id ? 'selected' : '' }}>
                        {{ $student->lname }}, {{ $student->fname }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="violation_date">Violation Date</label>
            <input type="date" name="violation_date" id="violation_date" class="form-control" 
                   value="{{ \Carbon\Carbon::parse($violation->violation_date)->format('Y-m-d') }}" required>
        </div>
        
        <div class="form-group">
            <label for="offense_category_id">Category</label>
            <select name="offense_category_id" id="offense_category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($offenseCategories as $category)
                    <option value="{{ $category->id }}" {{ $violation->offenseCategory->id == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="violation_type_id">Violation Type</label>
            <select name="violation_type_id" id="violation_type_id" class="form-control" required>
                <option value="">Select Violation Type</option>
                @foreach($violation->offenseCategory->violationTypes as $type)
                    <option value="{{ $type->id }}" {{ $violation->violation_type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->violation_name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="severity">Severity</label>
            <select name="severity" id="severity" class="form-control" required>
                <option value="Low" {{ $violation->severity == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $violation->severity == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $violation->severity == 'High' ? 'selected' : '' }}>High</option>
                <option value="Very High" {{ $violation->severity == 'Very High' ? 'selected' : '' }}>Very High</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="offense">Offense</label>
            <select name="offense" id="offense" class="form-control" required>
                <option value="1st" {{ $violation->offense == '1st' ? 'selected' : '' }}>1st Offense</option>
                <option value="2nd" {{ $violation->offense == '2nd' ? 'selected' : '' }}>2nd Offense</option>
                <option value="3rd" {{ $violation->offense == '3rd' ? 'selected' : '' }}>3rd Offense</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="penalty">Penalty</label>
            <select name="penalty" id="penalty" class="form-control" required>
                <option value="W" {{ $violation->penalty == 'W' ? 'selected' : '' }}>Warning</option>
                <option value="VW" {{ $violation->penalty == 'VW' ? 'selected' : '' }}>Verbal Warning</option>
                <option value="WW" {{ $violation->penalty == 'WW' ? 'selected' : '' }}>Written Warning</option>
                <option value="Pro" {{ $violation->penalty == 'Pro' ? 'selected' : '' }}>Probation</option>
                <option value="Exp" {{ $violation->penalty == 'Exp' ? 'selected' : '' }}>Expulsion</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="consequence">Consequence</label>
            <textarea name="consequence" id="consequence" class="form-control" rows="3" required>{{ $violation->consequence }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $violation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="resolved" {{ $violation->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                <option value="cancelled" {{ $violation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        
        <div class="action-buttons">
            <a href="{{ route('educator-violation') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Violation</button>
        </div>
    </form>
</div>

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: 500;
        color: #333;
    }
    
    .form-control {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }
    
    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }
    
    .action-buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }
    
    .btn {
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }
    
    .btn-primary {
        background: #007bff;
        color: white;
    }
    
    .btn-secondary {
        background: #6c757d;
        color: white;
    }
    
    .btn:hover {
        opacity: 0.9;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('offense_category_id');
        const violationTypeSelect = document.getElementById('violation_type_id');
        
        categorySelect.addEventListener('change', function() {
            const categoryId = this.value;
            violationTypeSelect.innerHTML = '<option value="">Select Violation Type</option>';
            
            if (categoryId) {
                fetch(`/educator/violation-types/${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(type => {
                            const option = document.createElement('option');
                            option.value = type.id;
                            option.textContent = type.name;
                            violationTypeSelect.appendChild(option);
                        });
                    });
            }
        });
    });
</script>
@endsection 