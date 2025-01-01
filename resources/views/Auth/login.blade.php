<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>
        body {
            background-color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-form h2 {
            color: var(--dark);
            margin-bottom: 20px;
            font-weight: 700;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--dark);
            border-color: var(--dark);
        }
    </style>
</head>
<body>
<div class="login-form">
    <h2 class="text-center fw-bold">Login</h2>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label fw-medium">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username"
                   required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label fw-medium">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password"
                   required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label fw-medium" style="color: #555;">Name</label>
            <input type="text" class="form-control shadow-sm" id="name" name="name" placeholder="Enter your name"
                   required>
            @error('name')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>

    </form>
    <p class="text-center mt-3">
        <a href="{{ route('register') }}" class="text-decoration-none" style="color: var(--primary);">Don't have an
            account? Register</a>
    </p>
</div>
</body>
</html>
