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

        :root { --admin-ink: #123f50; --admin-teal: #388da8; --admin-cyan: #77b6ca; --admin-bg: #f4f9fa; }
        body { background: radial-gradient(circle at top right, rgba(119,182,202,.16), transparent 34%), var(--admin-bg); font-family: "Manrope", "Segoe UI", sans-serif; }
        .sidebar { background: linear-gradient(160deg, #0d3b4f, #145d70 70%, #1b7f95); padding: 1.25rem !important; box-shadow: 12px 0 32px rgba(13,59,79,.12); }
        .sidebar > div:first-child { padding: .8rem !important; border-bottom: 1px solid rgba(255,255,255,.14); }
        .sidebar .nav-link { padding: .75rem .85rem; margin: .22rem 0; font-weight: 600; transition: transform .2s ease, background .2s ease; }
        .sidebar .nav-link i { width: 22px; color: var(--admin-cyan); }
        .sidebar .nav-link:hover { transform: translateX(3px); }
        .sidebar .nav-link.active { background: rgba(255,255,255,.16); box-shadow: inset 3px 0 var(--admin-cyan); }
        .content-area { padding: clamp(1rem, 3vw, 2.5rem); }
        .topbar, .panel { border: 1px solid rgba(56,141,168,.14); border-radius: 16px; box-shadow: 0 14px 32px rgba(13,59,79,.07); }
        .topbar { min-height: 68px; padding: 1rem 1.35rem; }
        .topbar h2 { color: var(--admin-ink); font-weight: 800; }
        .card, .admin-content .card { border: 1px solid rgba(56,141,168,.14); border-radius: 16px; box-shadow: 0 12px 28px rgba(13,59,79,.06); }
        .btn-primary { background: linear-gradient(135deg, var(--admin-ink), var(--admin-teal)); border: 0; border-radius: 9px; box-shadow: 0 8px 18px rgba(13,59,79,.16); font-weight: 700; }
        .btn-primary:hover { background: linear-gradient(135deg, var(--admin-teal), var(--admin-ink)); transform: translateY(-1px); }
        .btn-outline-primary { color: var(--admin-teal); border-color: var(--admin-teal); border-radius: 9px; font-weight: 700; }
        .form-control, .form-select { border: 1px solid rgba(56,141,168,.22); border-radius: 9px; min-height: 44px; }
        .form-control:focus, .form-select:focus { border-color: var(--admin-teal); box-shadow: 0 0 0 .2rem rgba(56,141,168,.14); }
        .admin-content .list-group-item { border-radius: 10px; transition: background-color .2s ease, border-color .2s ease, transform .2s ease; }
        .admin-content .list-group-item:hover { background: rgba(119,182,202,.1); border-color: rgba(56,141,168,.22); transform: translateX(4px); }
        .table { --bs-table-striped-bg: rgba(119,182,202,.07); }
        .table thead th { background: var(--admin-ink); color: #fff; border: 0; font-size: .78rem; letter-spacing: .04em; text-transform: uppercase; }
        .alert { border: 0; border-radius: 12px; }
        .session-flash { transition: opacity .35s ease, transform .35s ease; }
        .session-flash.is-dismissing { opacity: 0; transform: translateY(-6px); }
        @media (max-width: 991.98px) { .sidebar { box-shadow: none; } .content-area { padding: 1rem; } .topbar { margin-top: 1rem; } }
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
        @if(session('success'))<div class="alert alert-success session-flash">{{ session('success') }}</div>@endif
        @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <div class="admin-content">{{ $slot }}</div>
    </main>
</div></div>
<script>
    window.setTimeout(() => {
        document.querySelectorAll('.session-flash').forEach((message) => {
            message.classList.add('is-dismissing');
            window.setTimeout(() => message.remove(), 350);
        });
    }, 3000);
</script>
</body>
</html>
