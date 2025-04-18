<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/educator/staff-login.css') }}">
</head>
<body>

    <div class="login-container">
        <img src="{{ asset('images/NEWLOGOPN.png') }}" alt="Logo" class="logo">  

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ url('/staff-login') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="id">Faculty ID / Student ID</label>
                <input type="text" id="id" name="id" placeholder="Enter your email" style="border-radius: 5px" required>
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" style="border-radius: 5px"required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
            <a href="">Forgot password?</a>
        </form>
    </div>

</body>
</html>
