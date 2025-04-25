<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rewards System</title>
    <link rel="stylesheet" href="{{ asset('css/style.blade.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    
    <div class="top-navbar">
        <div class="logo">
            <img src="{{ asset('images/Picture3.jpg') }}" alt="School Logo">
        </div>
    </div>

    <div class="navbar">
        <br><br>
        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="{{ route('violations') }}"><i class="fas fa-exclamation-circle"></i> Violations</a></li>
                <li><a href="{{ route('behavior') }}"><i class="fas fa-chart-line"></i> Behavior Monitoring</a></li>
                <li><a href="{{ route('rewards') }}" class="active"><i class="fas fa-award"></i> Rewards</a></li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <div class="header-controls">
            <button class="control-btn" onclick="window.location.href='{{ route('rewards.pending') }}'">Pending Rewards</button>
            <button class="control-btn primary" onclick="window.location.href='{{ route('rewards.add') }}'">+ Add Rewards</button>
        </div>

        <div class="tiles animate-fade-in">
            <div class="tile animate-slide-up" style="animation-delay: 0.1s">
                <p>Total Rewards Given</p>
                <h2>11</h2>
            </div>
            <div class="tile animate-slide-up" style="animation-delay: 0.2s">
                <p>Top Rewarded Users</p>
                <h2>4</h2>
            </div>
        </div>

        <div class="leaderboard-section animate-fade-in" style="animation-delay: 0.3s">
            <div class="search-container">
                <input type="text" placeholder="Search students..." class="search-input">
            </div>
            <div class="leaderboard">
                <h3>Leaderboard</h3>
                <div class="student-list">
                    <div class="student-item">
                        <span class="rank">1.</span>
                        <span class="name">Jenvier Montano</span>
                    </div>
                    <div class="student-item">
                        <span class="rank">2.</span>
                        <span class="name">Angelo Parrocho</span>
                    </div>
                    <div class="student-item">
                        <span class="rank">3.</span>
                        <span class="name">Dion Paner</span>
                    </div>
                    <div class="student-item">
                        <span class="rank">4.</span>
                        <span class="name">Sarah Jomued</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .header-controls {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 20px;
        }

        .control-btn {
            padding: 8px 20px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            background: #fff;
            color: #333;
            transition: all 0.3s ease;
        }

        .control-btn.primary {
            background: #007bff;
            color: white;
        }

        .control-btn:hover {
            transform: translateY(-2px);
        }

        .tiles {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .tile {
            background: white;
            border-radius: 10px;
            padding: 20px;
            flex: 1;
            text-align: center;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .tile:hover {
            transform: translateY(-5px);
        }

        .tile h2 {
            font-size: 2.5em;
            margin: 10px 0;
            color: #333;
        }

        .tile p {
            color: #666;
            margin-bottom: 5px;
        }

        .leaderboard-section {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            transition: transform 0.3s ease;
        }

        .leaderboard-section:hover {
            transform: translateY(-5px);
        }

        .search-container {
            margin-bottom: 20px;
        }

        .search-input {
            width: 100%;
            padding: 10px 20px;
            border: 1px solid #ddd;
            border-radius: 20px;
            font-size: 14px;
            transition: transform 0.3s ease;
        }

        .search-input:focus {
            transform: translateY(-2px);
            outline: none;
            border-color: #007bff;
        }

        .student-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .student-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .student-item:hover {
            transform: translateX(10px);
            background-color: #f8f9fa;
        }

        .student-item .rank {
            margin-right: 10px;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .tiles {
                flex-direction: column;
            }
            
            .tile {
                width: 100%;
                margin-bottom: 10px;
            }

            .header-controls {
                flex-direction: column;
            }

            .control-btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>

    <script src="scripts.js"></script>
</body>
</html>
