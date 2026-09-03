<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Admin Panel' }} | EMASUITE</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <style>
        body { background: #f4f7fb; color: #12263f; }
        .sidebar { background: #0d3b4f; min-height: 100vh; }
        .sidebar .nav-link { color: rgba(255,255,255,.82); border-radius: 8px; margin: .15rem 0; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: rgba(255,255,255,.12); color: #fff; }
        .content-area { padding: 2rem; }
        .topbar, .panel { background: #fff; border: 0; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,.05); }
        .topbar { padding: 1rem 1.25rem; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <aside class="col-lg-2 sidebar text-white p-3">
            <div class="d-flex align-items-center gap-2 px-2 mb-4">
                <img src="https://ema.co.tz/uploads/logo.png" alt="EMASUITE" style="width:38px;height:38px" />
                <strong>EMASUITE</strong>
            </div>
            <nav class="nav flex-column">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
                <a class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}" href="{{ route('admin.pages.index') }}"><i class="bi bi-layout-text-window me-2"></i>Public Pages</a>
                <a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}"><i class="bi bi-briefcase me-2"></i>Services</a>
                <a class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}" href="{{ route('admin.profile') }}"><i class="bi bi-person me-2"></i>Profile</a>
                <a class="nav-link {{ request()->routeIs('admin.change-password') ? 'active' : '' }}" href="{{ route('admin.change-password') }}"><i class="bi bi-shield-lock me-2"></i>Password</a>
                <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">@csrf<button class="nav-link border-0 bg-transparent w-100 text-start"><i class="bi bi-box-arrow-right me-2"></i>Logout</button></form>
            </nav>
        </aside>
        <main class="col-lg-10 content-area">
            <div class="topbar d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4 mb-0">{{ $title ?? 'Admin Panel' }}</h2>
                <span class="fw-semibold">{{ auth()->user()->name }}</span>
            </div>
            @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
            @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
            {{ $slot }}
        </main>
    </div>
</div>
</body>
</html>
