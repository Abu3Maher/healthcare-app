<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            background-color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .register-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .register-form h2 {
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
<div class="register-form mx-auto p-4 shadow-lg rounded" style="max-width: 400px; background-color: #f9f9f9;">
    <h2 class="text-center fw-bold mb-4" style="color: #333;">Register</h2>

    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name Input -->
        <div class="mb-3">
            <label for="name" class="form-label fw-medium" style="color: #555;">Name</label>
            <input type="text" class="form-control shadow-sm @error('name') is-invalid @enderror" id="name" name="name"
                   placeholder="Enter your name" required value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Input -->
        <div class="mb-3">
            <label for="email" class="form-label fw-medium" style="color: #555;">Email</label>
            <input type="email" class="form-control shadow-sm @error('email') is-invalid @enderror" id="email"
                   name="email" placeholder="Enter your email" required value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password Input -->
        <div class="mb-3">
            <label for="password" class="form-label fw-medium" style="color: #555;">Password</label>
            <input type="password" class="form-control shadow-sm @error('password') is-invalid @enderror" id="password"
                   name="password" placeholder="Enter your password" required>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password Input -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label fw-medium" style="color: #555;">Confirm
                Password</label>
            <input type="password" class="form-control shadow-sm @error('password_confirmation') is-invalid @enderror"
                   id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Role Selection -->
        <div class="mb-3">
            <label for="role" class="form-label fw-medium" style="color: #555;">Role</label>
            <select class="form-select shadow-sm @error('role') is-invalid @enderror" id="role" name="role" required>
                <option value="" disabled selected>Select your role</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="doctor" {{ old('role') == 'doctor' ? 'selected' : '' }}>User</option>
                <option value="patient" {{ old('role') == 'patient' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Profile Image Input -->
        <div class="mb-3">
            <label for="image" class="form-label fw-medium" style="color: #555;">Profile Image (Optional)</label>
            <input type="file" class="form-control shadow-sm" id="image" name="image" accept="image/*">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100 shadow-sm" style="background-color: #007bff; border: none;">
            Register
        </button>
    </form>

    <p class="text-center mt-3">
        <a href="{{ route('login') }}" class="text-decoration-none fw-medium" style="color: #007bff;">Already have an
            account? Login</a>
    </p>
</div>
</body>
</html>
