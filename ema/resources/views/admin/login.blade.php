<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login | EMASUITE</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <style>
        body { background: linear-gradient(135deg, #0d3b4f, #1b7f95); min-height: 100vh; display: flex; align-items: center; justify-content: center; font-family: Inter, Arial, sans-serif; }
        .login-card { width: min(100%, 920px); background: rgba(255,255,255,0.96); border-radius: 20px; box-shadow: 0 30px 80px rgba(0,0,0,0.22); overflow: hidden; }
        .login-panel { padding: 3rem; }
        .brand { display:flex; align-items:center; gap:12px; margin-bottom: 1.5rem; }
        .brand img { width: 44px; height: 44px; }
        .brand span { font-size: 1.3rem; font-weight: 700; color: #0d3b4f; }
        .btn-primary { background: linear-gradient(135deg, #0d3b4f, #1b7f95); border:none; }
        .info-panel { background: linear-gradient(145deg, #0d3b4f, #186f88); color: #fff; padding: 3rem 2rem; }
        .info-panel ul { list-style: none; padding: 0; margin-top: 2rem; }
        .info-panel li { margin-bottom: 0.9rem; color: rgba(255,255,255,0.9); }
        .form-control { min-height: 52px; border-radius: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-card row g-0">
            <div class="col-lg-5 info-panel">
                <div class="brand">
                    <img src="https://ema.co.tz/uploads/logo.png" alt="EMASUITE logo" />
                    <span>EMASUITE</span>
                </div>
                <h1 class="mb-3">Admin Panel</h1>
                <p class="mb-0">Manage your website content without touching code.</p>
                <ul>
                    <li><i class="bi bi-check-circle-fill me-2"></i> Update homepage content</li>
                    <li><i class="bi bi-check-circle-fill me-2"></i> Edit about and contact details</li>
                    <li><i class="bi bi-check-circle-fill me-2"></i> Manage services and settings</li>
                </ul>
            </div>
            <div class="col-lg-7 login-panel">
                <h2 class="mb-3">Sign in</h2>
                <p class="text-muted mb-4">Use your administrator account to access the dashboard.</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="name@example.com" required />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required />
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" />
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a href="{{ route('index') }}" class="text-decoration-none">Back to website</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
