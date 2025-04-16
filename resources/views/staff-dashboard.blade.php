<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/staff-dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Admin Dashboard</title>
</head>
<body>

    <div class="nav-topbar">
        <img src="https://www.passerellesnumeriques.org/wp-content/uploads/2024/05/PN-Logo-English-White-Baseline.png.webp" alt="">
        <p><strong>Admin User</strong></p>
        <form action="{{ route('logout') }}" method="post" style="display-inline">
            @csrf
            <button type="submit">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
            </svg>

            </button>
        </form>
    </div>

    <div class="nav-sidebar">
        <ul class="list-unstyled">
            <li class="fw-bold bg-warning p-3"><img src="{{asset('images/dashboad.png')}}" alt=""> Dashboard</li>
            <li class="p-3"><img src="{{ asset('images/violation.png') }}" alt=""> Violations</li>
            <li class="p-3"><img src="{{ asset('images/monitor.png') }}" alt=""> Behavior Monitoring</li>
            <li class="p-3"><img src="{{ asset('images/reward.png') }}" alt=""> Reward System</li>
        </ul>
    </div>

    <div class="main-content">
        <div class="container">
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
            
            <div class="row g-3">
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
                        <div class="card-body">
                            <div class="violation-item">
                                <p>No returning of phones</p>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 80%;"></div>
                                </div>
                                <span>19</span>
                            </div>
                            <div class="violation-item">
                                <p>No returning of phones</p>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 80%;"></div>
                                </div>
                                <span>19</span>
                            </div>
                            <div class="violation-item">
                                <p>No returning of phones</p>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 80%;"></div>
                                </div>
                                <span>19</span>
                            </div>
                            <div class="violation-item">
                                <p>No returning of phones</p>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 80%;"></div>
                                </div>
                                <span>19</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card" style="height: 350px;">
                        <h2 class="text-left">Top Violators</h2>
                        <p><img src="{{ asset('images/newprof.png')}}" alt="" style="width: 80px; height: 80px;"> Jenvier Montano</p>
                        <p><img src="{{ asset('images/newprof.png')}}" alt="" style="width: 80px; height: 80px;"> Dion Paner</p>
                        <p><img src="{{ asset('images/newprof.png')}}" alt="" style="width: 80px; height: 80px;"> Angelo PArrocho</p>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById('behaviorChart').getContext('2d');

            var behaviorChart = new Chart(ctx, {
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
        });

        const violationsData = [
    { name: "No returning of phones", count: 19, percentage: 80 },
    { name: "No Logbook", count: 20, percentage: 75 },
    { name: "Relationships", count: 20, percentage: 30 },
    { name: "Drinking Alcohol", count: 2, percentage: 15 }
];

function renderViolations() {
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
}

renderViolations();

    </script>
    

</body>
</html>
