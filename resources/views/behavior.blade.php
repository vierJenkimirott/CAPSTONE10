<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Design</title>
    <link rel="stylesheet" href="{{ asset('css/style.blade.css') }}">
    <script src="https://kit.fontawesome.com/yourkitcode.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="top-navbar">
        <div class="logo">
            LOGO
        </div>
    </div>

    <div class="navbar">
        <br><br>
        <nav>
            <ul>
                <li><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="#"><i class="fas fa-exclamation-triangle"></i> Violations</a></li>
                <li><a href="#" class="active"><i class="fas fa-chart-line"></i> Behavior Monitoring</a></li>
                <li><a href="#"><i class="fas fa-gift"></i> Rewards</a></li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <div class="tiles">
            <div class="tile">
                <p>Total Students</p>
                <h2>120</h2>
            </div>
            <div class="tile">
                <p>Need Attention</p>
                <h2>5</h2>
            </div>
        </div>

        <div class="behavior-report-controls">
            <div class="behavior-labels">
                <span class="behavior-label" style="background: blue;"></span>
                <span>Boys Behavior</span>
                <span class="behavior-label" style="background: pink;"></span>
                <span>Girls Behavior</span>
            </div>
            <div class="time-select-container">
                <select class="time-select" id="timeSelect">
                    <option value="monthly" selected>Monthly</option>
                </select>
            </div>
        </div>

        <div class="behavior-report">
            <canvas id="behaviorChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const monthlyData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Boys Behavior',
                data: [65, 59, 80, 81, 56, 55, 40, 60, 50, 70, 80, 90],
                fill: false,
                borderColor: 'blue',
                backgroundColor: 'blue',
                tension: 0.1
            },
            {
                label: 'Girls Behavior',
                data: [28, 48, 40, 19, 86, 27, 90, 30, 40, 50, 60, 70],
                fill: false,
                borderColor: 'pink',
                backgroundColor: 'pink',
                tension: 0.1
            }]
        };

        const ctx = document.getElementById('behaviorChart').getContext('2d');

        const config = {
            type: 'line',
            data: monthlyData,  
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            usePointStyle: true,  
                            pointStyle: 'circle',
                            padding: 20  
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: true
                        }
                    },
                    y: {
                        grid: {
                            display: true
                        }
                    }
                }
            }
        };

        const behaviorChart = new Chart(ctx, config);

        document.getElementById('timeSelect').addEventListener('change', function() {
            const selectedValue = this.value;
            let selectedData;

            switch (selectedValue) {
                case 'monthly':
                    selectedData = monthlyData;
                    break;
                default:
                    selectedData = monthlyData;
            }

            behaviorChart.data = selectedData;
            behaviorChart.update();
        });
    </script>
    <script src="scripts.js"></script>
</body>
</html>