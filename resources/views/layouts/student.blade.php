<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/student.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('css')
</head>
<body>

    <!-- Topbar -->
    <div class="nav-topbar">
        <img src="https://www.passerellesnumeriques.org/wp-content/uploads/2024/05/PN-Logo-English-White-Baseline.png.webp" alt="">
        <form action="{{ route('student.logout') }}" method="post" style="display:inline">
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
                <li class="p-3 {{ request()->routeIs('student.account') ? 'active' : ''}}"><a href="{{ route('student.account') }}" class="text-decoration-none"><img src="{{asset('images/account.png')}}" alt=""> Account</a></li>
                <li class="p-3 {{ request()->routeIs('student.violation') ? 'active' : ''}}"><a href="{{ route('student.violation') }}" class="text-decoration-none"><img src="{{ asset('images/warning (1).png') }}" alt=""> My Violations</a></li>
                <li class="p-3 {{ request()->routeIs('student.behavior') ? 'active' : '' }}"><a href="{{ route('student.behavior') }}" class="text-decoration-none"><img src="{{ asset('images/online-report.png') }}" alt=""> My Behavior</a></li>
                <li class="p-3 {{ request()->routeIs('student.reward') ? 'active' : '' }}"><a href="{{ route('student.reward') }}" class="text-decoration-none"><img src="{{ asset('images/giftbox.png') }}" alt=""> My Reward</a></li>
            </ul>
        </div>
    </div>
        <!-- Main Content -->
        <div class="main-content p-4 w-100">
            @yield('content')
        </div>
    
</body>
</html>
