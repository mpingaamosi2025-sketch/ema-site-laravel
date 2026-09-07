<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Forgot Password | EMASUITE</title>
    <meta name="description" content="Reset your EMASUITE password to regain access to your workspace." />
    <meta name="keywords" content="EMASUITE forgot password, reset password" />

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
        background: linear-gradient(135deg, #0d3b4f, #15566a);
        min-height: 100vh;
      }

      .auth-page {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
      }

      .auth-page .container {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100%;
      }

      .auth-card {
        background: linear-gradient(135deg, #0d3b4f, #15566a);
        border-radius: 20px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.18);
        overflow: hidden;
        width: 100%;
        max-width: 820px;
      }

      .auth-left {
        background: linear-gradient(135deg, #0d3b4f, #186f88);
        padding: 50px 30px;
        color: #fff;
      }

      .auth-left h1 {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 18px;
      }

      .auth-left p {
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

      .auth-right {
        padding: 50px 40px;
        background: rgba(13, 59, 79, 0.7);
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
        color: #ffffff;
      }

      .auth-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: #ffffff;
      }

      .auth-subtitle {
        color: rgba(255, 255, 255, 0.82);
        margin-bottom: 28px;
      }

      .form-control {
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        background: rgba(13, 59, 79, 0.72);
        color: #ffffff;
        padding: 0.9rem 1rem;
        min-height: 52px;
      }

      .form-control:focus {
        border-color: #0d3b4f;
        box-shadow: 0 0 0 0.2rem rgba(13, 59, 79, 0.12);
      }

      .auth-page input.form-control,
      .auth-page input.form-control:focus {
        background: #0d3b4f !important;
        background-color: #0d3b4f !important;
        -webkit-text-fill-color: #ffffff !important;
        color: #ffffff !important;
        caret-color: #ffffff;
        border-color: rgba(255, 255, 255, 0.42);
      }

      .auth-page input.form-control:focus {
        border-color: #7be0c3;
        box-shadow: 0 0 0 0.2rem rgba(123, 224, 195, 0.2);
      }

      .auth-page input.form-control:-webkit-autofill,
      .auth-page input.form-control:-webkit-autofill:hover,
      .auth-page input.form-control:-webkit-autofill:focus {
        background: #0d3b4f !important;
        background-color: #0d3b4f !important;
        -webkit-box-shadow: 0 0 0 1000px #0d3b4f inset !important;
        -webkit-text-fill-color: #ffffff !important;
        color: #ffffff !important;
        caret-color: #ffffff;
      }

      .auth-page input.form-control::placeholder {
        color: rgba(255, 255, 255, 0.72) !important;
      }

      .auth-btn {
        width: 100%;
        border-radius: 12px;
        padding: 0.9rem 1rem;
        font-weight: 600;
        background: var(--button-background);
        border: none;
      }

      .auth-btn:hover {
        background: var(--button-background-hover);
      }

      .muted-link,
      .back-link {
        color: #ffffff;
        text-decoration: none;
      }

      .muted-link:hover,
      .back-link:hover {
        color: #ffffff;
      }

      .help-text {
        color: rgba(255, 255, 255, 0.82);
        margin-top: 18px;
        line-height: 1.7;
      }

      @media (max-width: 767px) {
        .auth-left,
        .auth-right {
          padding: 30px 22px;
        }
      }

      h1,.mb-0{
        color:white;
      }
    </style>
  </head>

  <body class="auth-page">
    <div class="container">
      <div class="auth-card row g-0 align-items-stretch">
        <div class="col-lg-5 auth-left">
          <div class="d-flex align-items-center gap-3 mb-4">
            <img src="https://ema.co.tz/uploads/logo.png" alt="EMASUITE logo" style="width: 52px; height: 52px; object-fit: contain;" />
            <h2 class="mb-0">EMASUITE</h2>
          </div>

          <h1>Reset your access</h1>
          <p>Need a new password? We’ll help you get back into your ERP workspace securely and quickly.</p>

          <ul class="feature-list">
            <li><i class="bi bi-check-circle-fill"></i> Secure account recovery</li>
            <li><i class="bi bi-check-circle-fill"></i> Fast password reset</li>
            <li><i class="bi bi-check-circle-fill"></i> Support for your business team</li>
          </ul>
        </div>

        <div class="col-lg-7 auth-right">
          

          <h2 class="auth-title">Forgot password</h2>
          <p class="auth-subtitle">Enter your email address and we’ll send you a reset link.</p>

          @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
          @endif
          @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
          @endif

          <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <div class="mb-4">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required />
            </div>

            <button type="submit" class="btn btn-primary auth-btn">Reset password</button>
          </form>

          <p class="help-text">
            Remembered your password?
            <a href="{{ route('login') }}" class="muted-link">Back to login</a>
          </p>

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
