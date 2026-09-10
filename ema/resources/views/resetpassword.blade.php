<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Reset Password | EMASUITE</title>
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
    <style>
      body { background: linear-gradient(135deg, rgba(16, 76, 100, 0.95), rgba(24, 120, 143, 0.9)); min-height: 100vh; }
      .reset-page { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 40px 20px; }
      .reset-card { background: linear-gradient(135deg, #0d3b4f, #15566a); border-radius: 20px; box-shadow: 0 25px 60px rgba(0, 0, 0, 0.18); padding: 50px 40px; width: 100%; max-width: 520px; }
      .reset-title { color: #ffffff; font-size: 2rem; font-weight: 700; }
      .form-control { border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.3); background: rgba(13, 59, 79, 0.72); color: #ffffff; padding: 0.9rem 1rem; min-height: 52px; }
      .reset-btn { width: 100%; border-radius: 12px; padding: 0.9rem 1rem; font-weight: 600; background: var(--button-background); border: none; }
      .back-link { color: #ffffff; text-decoration: none; }
      @media (max-width: 767px) { .reset-card { padding: 30px 22px; } }
    </style>
  </head>
  <body class="reset-page">
    <div class="reset-card">
      <h1 class="reset-title">Create a new password</h1>
      <p class="text-muted mb-4">Enter your new password to secure your administrator account.</p>
      @if ($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
      <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="mb-3"><label for="email" class="form-label">Email address</label><input type="email" class="form-control" id="email" name="email" value="{{ old('email', $email) }}" required></div>
        <div class="mb-3"><label for="password" class="form-label">New password</label><input type="password" class="form-control" id="password" name="password" required></div>
        <div class="mb-4"><label for="password_confirmation" class="form-label">Confirm new password</label><input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required></div>
        <button type="submit" class="btn btn-primary reset-btn">Reset password</button>
      </form>
      <div class="text-center mt-4"><a href="{{ route('login') }}" class="back-link">Back to login</a></div>
    </div>
  </body>
</html>