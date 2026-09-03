<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Admin Panel' }} | EMASUITE</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <style>
        html { scroll-behavior: smooth; }
        body { background: #f4f7fb; color: #12263f; overflow-x: hidden; }
        .sidebar { background: #0d3b4f; min-height: 100vh; max-height: 100vh; position: sticky; top: 0; overflow-y: auto; overscroll-behavior: contain; scrollbar-width: thin; scrollbar-color: rgba(255,255,255,.35) transparent; }
        .sidebar::-webkit-scrollbar { width: 6px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,.35); border-radius: 8px; }
        .sidebar .nav-link { color: rgba(255,255,255,.82); border-radius: 8px; margin: .15rem 0; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: rgba(255,255,255,.12); color: #fff; }
        .content-area { min-height: 100vh; padding: 2rem; scroll-behavior: smooth; }
        .topbar, .panel { background: #fff; border: 0; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,.05); }
        .topbar { padding: 1rem 1.25rem; }
        .admin-content { animation: adminFadeIn .25s ease-out both; }
        @keyframes adminFadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
        @media (max-width: 991.98px) { .sidebar { min-height: auto; max-height: none; position: relative; } }
    </style>
</head>
<body>
<div class="container-fluid"><div class="row">
    <aside class="col-lg-2 sidebar text-white p-3">
        <div class="d-flex align-items-center gap-2 px-2 mb-4"><img src="https://ema.co.tz/uploads/logo.png" alt="EMASUITE" style="width:38px;height:38px" /><strong>EMASUITE</strong></div>
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
            <a class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}" href="{{ route('admin.pages.index') }}"><i class="bi bi-layout-text-window me-2"></i>Public Pages</a>
            <div class="text-uppercase small text-white-50 px-2 mt-3 mb-1">Edit website</div>
            <a class="nav-link {{ request()->route('page')?->slug === 'home' ? 'active' : '' }}" href="{{ route('admin.pages.visual', 'home') }}"><i class="bi bi-house me-2"></i>Home</a>
            <a class="nav-link {{ request()->route('page')?->slug === 'services' ? 'active' : '' }}" href="{{ route('admin.pages.visual', 'services') }}"><i class="bi bi-grid me-2"></i>Services</a>
            <a class="nav-link {{ request()->route('page')?->slug === 'about' ? 'active' : '' }}" href="{{ route('admin.pages.visual', 'about') }}"><i class="bi bi-info-circle me-2"></i>About</a>
            <a class="nav-link {{ request()->route('page')?->slug === 'contact' ? 'active' : '' }}" href="{{ route('admin.pages.visual', 'contact') }}"><i class="bi bi-envelope me-2"></i>Contact</a>
            <a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}"><i class="bi bi-briefcase me-2"></i>Manage services</a>
            <a class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}" href="{{ route('admin.profile') }}"><i class="bi bi-person me-2"></i>Profile</a>
            <a class="nav-link {{ request()->routeIs('admin.change-password') ? 'active' : '' }}" href="{{ route('admin.change-password') }}"><i class="bi bi-shield-lock me-2"></i>Password</a>
            <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">@csrf<button class="nav-link border-0 bg-transparent w-100 text-start"><i class="bi bi-box-arrow-right me-2"></i>Logout</button></form>
        </nav>
    </aside>
    <main class="col-lg-10 content-area"><div class="topbar d-flex justify-content-between align-items-center mb-4"><h2 class="h4 mb-0">{{ $title ?? 'Admin Panel' }}</h2><span class="fw-semibold">{{ auth()->user()->name }}</span></div>
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <div class="admin-content">{{ $slot }}</div>
    </main>
</div></div>
</body>
</html>
