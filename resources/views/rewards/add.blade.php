<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Rewards</title>
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
            <h2>Add New Reward</h2>
        </div>

        <div class="form-container animate-fade-in">
            <form action="{{ route('rewards.store') }}" method="POST" class="reward-form">
                @csrf
                <div class="form-group">
                    <label for="student_name">Student Name</label>
                    <input type="text" id="student_name" name="student_name" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="reward_type">Reward Type</label>
                    <select id="reward_type" name="reward_type" required class="form-input">
                        <option value="">Select Reward Type</option>
                        <option value="academic">Academic Excellence</option>
                        <option value="behavior">Good Behavior</option>
                        <option value="attendance">Perfect Attendance</option>
                        <option value="leadership">Leadership</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="points">Points</label>
                    <input type="number" id="points" name="points" required class="form-input" min="1">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" required class="form-input" rows="4"></textarea>
                </div>

                <div class="form-actions">
                    <button type="button" onclick="window.location.href='{{ route('rewards') }}'" class="btn-secondary">Back</button>
                    <button type="submit" class="btn-primary">Add Reward</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .form-container {
            background: white;
            border-radius: 10px;
            padding: 30px;
            margin-top: 20px;
            transition: transform 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-5px);
        }

        .form-group {
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: transform 0.3s ease;
        }

        .form-input:focus {
            transform: translateY(-2px);
            border-color: #007bff;
            outline: none;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 30px;
        }

        .btn-primary, .btn-secondary {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .btn-primary {
            background: #007bff;
            color: white;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-primary:hover, .btn-secondary:hover {
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>

    <script src="scripts.js"></script>
</body>
</html> 