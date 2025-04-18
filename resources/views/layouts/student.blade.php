<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ScholarSync')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/student.css') }}"> <!-- Optional: move styles to CSS -->
    @stack('styles')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <button class="menu-btn" onclick="toggleSidebar()">☰</button>
        <div class="logo">LOGO</div>
        <div class="header-buttons">
            <button onclick="toggleNotificationPanel()">🔔 Notifications</button>
            <button onclick="logout()">🚪 Logout</button>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <a href="{{ route('student.student_account') }}">Account</a>
        <a href="{{ route('student.student_violation') }}">Violations</a>
        <a href="{{ route('student.student_behavior') }}">Behavior</a>
        <a href="{{ route('student.student_reward') }}">Reward </a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Notification Panel -->
    <div class="notification-panel" id="notificationPanel">
        <div class="notification-header">Notifications</div>
        <div class="notification-item">📢 Phone not returned <br> Yesterday at 10:00pm</div>
        <div class="notification-item">📢 Curfew Time <br> Yesterday at 10:30pm</div>
        <div class="notification-item">📢 No Logbook <br> Today at 9:00am</div>
        <div class="notification-item">📢 Room Cleaning <br> Today at 9:00am</div>
        <button class="close-btn" onclick="closeNotificationPanel()">Close</button>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
        }

        function toggleNotificationPanel() {
            var panel = document.getElementById("notificationPanel");
            panel.style.display = panel.style.display === "block" ? "none" : "block";
        }

        function closeNotificationPanel() {
            document.getElementById('notificationPanel').style.display = 'none';
        }

        function logout() {
            alert("Logging out...");
            window.location.href = "{{ url('/logout') }}";
        }
    </script>
    @stack('scripts')
</body>
</html>
