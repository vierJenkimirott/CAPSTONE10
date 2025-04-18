<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/staff-dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('css')
</head>
<body>

    <!-- Topbar -->
    <div class="nav-topbar">
        <img src="https://www.passerellesnumeriques.org/wp-content/uploads/2024/05/PN-Logo-English-White-Baseline.png.webp" alt="">
        <form action="{{ route('logout') }}" method="post" style="display:inline">
            @csrf
            <button type="submit">
                <svg class="w-6 h-6 text-gray-800" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
                </svg>
            </button>
        </form>
    </div>

    <div class="dashboard-wrapper d-flex">
        <!-- Sidebar -->
        <div class="nav-sidebar">
            <ul class="list-unstyled">
                <li class="p-3 {{ request()->routeIs('staff-dashboard') ? 'active' : ''}}"><a href="{{ route('staff-dashboard') }}" class="text-decoration-none"><img src="{{asset('images/dashboard.png')}}" alt=""> Dashboard</a></li>
                <li class="p-3 {{ request()->routeIs('educator-violation') ? 'active' : ''}}"><a href="{{ route('educator-violation') }}" class="text-decoration-none"><img src="{{ asset('images/warning (1).png') }}" alt=""> Violations</a></li>
                <li class="p-3 {{ request()->routeIs('behavior') ? 'active' : '' }}"><a href="{{ route('behavior') }}" class="text-decoration-none"><img src="{{ asset('images/online-report.png') }}" alt=""> Behavior Monitoring</li>
                <li class="p-3"><img src="{{ asset('images/giftbox.png') }}" alt=""> Reward System</a></li>
                <li class="p-3 dropdown-btn"><a href="{{ route('student-manual')}}" class="text-decoration-none"><img src="{{ asset('images/manual.png') }}" alt="" style="height: 25px; width: 25px; margin-right: 10px;">Student Violation Manual</a></li>
                <div class="dropdown-container">
                    <a href="page2.html">General Behavior</a>
                    <a href="page3.html">Schedules</a>
                    <a href="page4.html">Room Rules</a>
                    <a href="page5.html">Dress Code</a>
                    <a href="page6.html">Equipment</a>
                    <a href="page7.html">Center Tasking</a>
                </div>
            </ul>
        </div>
    </div>
        <!-- Main Content -->
        <div class="main-content p-4 w-100">
            @yield('content')
            @yield('manual')
            @yield('table-of-contents')
            @yield('behavior')
            @yield('educator-violation')
            @yield('add-violation')
            @yield('add-violator')
        </div>
    

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const dropdownBtn = document.querySelector(".dropdown-btn");
        const dropdownContainer = document.querySelector(".dropdown-container");

        dropdownBtn.addEventListener("click", function (event) {
            // Prevent the default link behavior
            event.preventDefault();
            
            // Toggle the dropdown visibility
            const isVisible = dropdownContainer.style.display === "block";
            dropdownContainer.style.display = isVisible ? "none" : "block";
            
            // Navigate to the first page in the dropdown (page2.html)
        });
    });

        // Close the dropdown if the user clicks outside of it
        window.addEventListener("click", function (event) {
            if (!dropdownBtn.contains(event.target) && !dropdownContainer.contains(event.target)) {
                dropdownContainer.style.display = "none";
            }
        });

    </script>
    @stack('scripts')
</body>
</html>
