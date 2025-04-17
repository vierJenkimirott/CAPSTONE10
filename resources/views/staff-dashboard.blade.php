<!-- resources/views/staff/dashboard.blade.php -->
@extends('layouts.staff-main')

@section('content')
<h2 class="mb-5">Dashboard</h2>
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card">
                <p class="title">Violation <img src="{{ asset('images/warning-removebg-preview.png') }}" alt="" class="icon"></p>
                <h3>3</h3>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <p class="title">Reward <img src="{{ asset('images/medal-removebg-preview.png') }}" alt="" class="icon"></p>
                <h3>156</h3>
            </div>
        </div>
    </div>

    <div class="row g-3 mt-3">
        <div class="col-md-6">
            <div class="card" style="height: 300px;">
                <h2>Violation Status Overview</h2>
                <canvas id="behaviorChart"></canvas>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card" style="height: 300px;">
                <h2>Violation Report</h2>
                <select id="violation-filter" class="form-select">
                    <option value="">This Month</option>
                    <option value="">Last Month</option>
                    <option value="">Last 3 Months</option>
                </select>
                <div class="card-body"></div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card" style="height: 350px;">
                <h2 class="text-left">Top Violators</h2>
                <p><img src="{{ asset('images/newprof.png')}}" alt="" style="width: 80px; height: 80px;"> Jenvier Montano</p>
                <p><img src="{{ asset('images/newprof.png')}}" alt="" style="width: 80px; height: 80px;"> Dion Paner</p>
                <p><img src="{{ asset('images/newprof.png')}}" alt="" style="width: 80px; height: 80px;"> Angelo Parrocho</p>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById('behaviorChart').getContext('2d');

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Violator', 'Non-Violator'],
                datasets: [{
                    data: [70, 20],
                    backgroundColor: ['#4CAF50', '#FFC107'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'left'
                    }
                }
            }
        });

        const violationsData = [
            { name: "No returning of phones", count: 19, percentage: 80 },
            { name: "No Logbook", count: 20, percentage: 75 },
            { name: "Relationships", count: 20, percentage: 30 },
            { name: "Drinking Alcohol", count: 2, percentage: 15 }
        ];

        const container = document.querySelector(".card-body");
        container.innerHTML = violationsData.map(violation => `
            <div class="violation-item">
                <p>${violation.name}</p>
                <div class="progress">
                    <div class="progress-bar" style="width: ${violation.percentage}%;"></div>
                </div>
                <span>${violation.count}</span>
            </div>
        `).join("");
    });
</script>
@endpush
