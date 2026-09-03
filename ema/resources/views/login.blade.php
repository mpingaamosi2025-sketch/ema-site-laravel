<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login | EMASUITE</title>
    <meta name="description" content="Login to EMASUITE and access your ERP workspace." />
    <meta name="keywords" content="EMASUITE login, ERP login" />

    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet" />

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />

    <style>
      body {
        background: linear-gradient(135deg, rgba(16, 76, 100, 0.95), rgba(24, 120, 143, 0.9));
        min-height: 100vh;
      }

      .login-page {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
      }

      .login-page .container {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100%;
      }

      .login-card {
        background: rgba(255, 255, 255, 0.96);
        border-radius: 20px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.18);
        overflow: hidden;
        width: 100%;
        max-width: 900px;
      }

      .login-left {
        background: linear-gradient(135deg, #0d3b4f, #186f88);
        padding: 50px 30px;
        color: #fff;
      }

      .login-left h1 {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 18px;
      }

      .login-left p {
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.8;
      }

      .feature-list {
        list-style: none;
        padding: 0;
        margin: 30px 0 0;
      }

      .feature-list li {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 14px;
        color: rgba(255, 255, 255, 0.88);
      }

      .feature-list i {
        color: #7be0c3;
        font-size: 1.1rem;
      }

      .login-right {
        padding: 50px 40px;
      }

      .brand {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 25px;
      }

      .brand img {
        width: 42px;
        height: 42px;
        object-fit: contain;
      }

      .brand span {
        font-size: 1.3rem;
        font-weight: 700;
        color: #0d3b4f;
      }

      .login-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: #0d3b4f;
      }

      .login-subtitle {
        color: #5d6d7d;
        margin-bottom: 28px;
      }

      .form-control {
        border-radius: 12px;
        border: 1px solid #dfe7ee;
        padding: 0.9rem 1rem;
        min-height: 52px;
      }

      .form-control:focus {
        border-color: #0d3b4f;
        box-shadow: 0 0 0 0.2rem rgba(13, 59, 79, 0.12);
      }

      .login-btn {
        width: 100%;
        border-radius: 12px;
        padding: 0.9rem 1rem;
        font-weight: 600;
        background: linear-gradient(135deg, #0d3b4f, #1b7f95);
        border: none;
      }

      .login-btn:hover {
        background: linear-gradient(135deg, #0b2f3f, #166d88);
      }

      .form-check-label,
      .muted-link,
      .back-link {
        color: #5d6d7d;
        text-decoration: none;
      }

      .muted-link:hover,
      .back-link:hover {
        color: #0d3b4f;
      }

      @media (max-width: 767px) {
        .login-left,
        .login-right {
          padding: 30px 22px;
        }
      }

      h1,.mb-0{
        color:#fff;
      }
    </style>
  </head>

  <body class="login-page">
    <div class="container">
      <div class="login-card row g-0 align-items-stretch">
        <div class="col-lg-5 login-left">
          <div class="d-flex align-items-center gap-3 mb-4">
            <img src="https://ema.co.tz/uploads/logo.png" alt="EMASUITE logo" style="width: 52px; height: 52px; object-fit: contain;" />
            <h2 class="mb-0">EMASUITE</h2>
          </div>

          <h1>Welcome back</h1>
          <p>Access your ERP workspace and manage your operations with the tools built for African growth.</p>

          <ul class="feature-list">
            <li><i class="bi bi-check-circle-fill"></i> Smart inventory and logistics tracking</li>
            <li><i class="bi bi-check-circle-fill"></i> Payroll, accounting, and reporting</li>
            <li><i class="bi bi-check-circle-fill"></i> Secure access for your business teams</li>
          </ul>
        </div>

        <div class="col-lg-7 login-right">
          

          <h2 class="login-title">Login</h2>
          <p class="login-subtitle">Sign in to continue to your dashboard</p>

          <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required />
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required />
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" value="1" id="rememberMe" />
                <label class="form-check-label" for="rememberMe">Remember me</label>
              </div>
              <a href="{{ route('forgotpassword') }}" class="muted-link">Forgot password?</a>
            </div>

            <button type="submit" class="btn btn-primary login-btn">Login</button>
          </form>

          <div class="text-center mt-4">
            <a href="{{ route('index') }}" class="back-link">← Back to home</a>
          </div>
        </div>
      </div>
    </div>

    <x-custom-sections :page="$page" />
    <x-visual-overrides :page="$page" />
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
