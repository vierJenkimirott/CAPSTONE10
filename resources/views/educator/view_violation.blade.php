@extends('layouts.staff-main')

@section('content')
<div class="container">
    <h2>Violation Details</h2>
    
    <div class="violation-details">
        <div class="detail-row">
            <div class="detail-label">Student:</div>
            <div class="detail-value">{{ $violation->student->fname }} {{ $violation->student->lname }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Violation Date:</div>
            <div class="detail-value">{{ \Carbon\Carbon::parse($violation->violation_date)->format('M d, Y') }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Category:</div>
            <div class="detail-value">{{ $violation->offenseCategory->category_name }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Violation Type:</div>
            <div class="detail-value">{{ $violation->violationType->violation_name }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Severity:</div>
            <div class="detail-value {{ strtolower($violation->severity) }}">{{ $violation->severity }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Offense:</div>
            <div class="detail-value">{{ $violation->offense }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Penalty:</div>
            <div class="detail-value">
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
            </div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Consequence:</div>
            <div class="detail-value">{{ $violation->consequence }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Status:</div>
            <div class="detail-value {{ strtolower($violation->status) }}">{{ ucfirst($violation->status) }}</div>
        </div>
    </div>
    
    <div class="action-buttons">
        <a href="{{ route('educator-violation') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('educator_edit_violation', ['id' => $violation->id]) }}" class="btn btn-primary">Edit Violation</a>
    </div>
</div>

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    
    .violation-details {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }
    
    .detail-row {
        display: flex;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }
    
    .detail-row:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    
    .detail-label {
        width: 150px;
        font-weight: bold;
        color: #666;
    }
    
    .detail-value {
        flex: 1;
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
    
    .low { color: #28a745; }
    .medium { color: #ffc107; }
    .high { color: #fd7e14; }
    .very-high { color: #dc3545; }
    
    .pending { color: #ffc107; }
    .resolved { color: #28a745; }
    .cancelled { color: #dc3545; }
</style>
@endsection 