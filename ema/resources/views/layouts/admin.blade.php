<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Admin Panel' }} | EMASUITE</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <style>
        body {
            background: #f4f7fb;
            color: #12263f;
        }

        .sidebar {
            background: #0d3b4f;
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, .82);
            border-radius: 8px;
            margin: .15rem 0;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, .12);
            color: #fff;
        }

        .content-area {
            padding: 2rem;
        }

        .topbar,
        .panel {
            background: #fff;
            border: 0;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .05);
        }

        .topbar {
            padding: 1rem 1.25rem;
        }

        :root {
            --admin-ink: #123f50;
            --admin-teal: #388da8;
            --admin-cyan: #77b6ca;
        }

        body {
            background: radial-gradient(circle at top right, rgba(119, 182, 202, .16), transparent 34%), #f4f9fa;
            font-family: "Manrope", "Segoe UI", sans-serif;
        }

        .sidebar {
            background: linear-gradient(160deg, #0d3b4f, #145d70 70%, #1b7f95);
            padding: 1.25rem !important;
            box-shadow: 12px 0 32px rgba(13, 59, 79, .12);
        }

        .sidebar>div:first-child {
            padding: .8rem !important;
            border-bottom: 1px solid rgba(255, 255, 255, .14);
        }

        .sidebar .nav-link {
            padding: .75rem .85rem;
            margin: .22rem 0;
            font-weight: 600;
            transition: transform .2s ease, background .2s ease;
        }

        .sidebar .nav-link i {
            width: 22px;
            color: var(--admin-cyan);
        }

        .sidebar .nav-link:hover {
            transform: translateX(3px);
        }

        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, .16);
            box-shadow: inset 3px 0 var(--admin-cyan);
        }

        .content-area {
            padding: clamp(1rem, 3vw, 2.5rem);
        }

        .topbar,
        .panel {
            border: 1px solid rgba(56, 141, 168, .14);
            border-radius: 16px;
            box-shadow: 0 14px 32px rgba(13, 59, 79, .07);
        }

        .topbar {
            min-height: 68px;
            padding: 1rem 1.35rem;
        }

        .topbar h2 {
            color: var(--admin-ink);
            font-weight: 800;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--admin-ink), var(--admin-teal));
            border: 0;
            border-radius: 9px;
            box-shadow: 0 8px 18px rgba(13, 59, 79, .16);
            font-weight: 700;
        }

        .btn-outline-primary {
            color: var(--admin-teal);
            border-color: var(--admin-teal);
            border-radius: 9px;
            font-weight: 700;
        }

        .form-control,
        .form-select {
            border: 1px solid rgba(56, 141, 168, .22);
            border-radius: 9px;
            min-height: 44px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--admin-teal);
            box-shadow: 0 0 0 .2rem rgba(56, 141, 168, .14);
        }

        .table {
            --bs-table-striped-bg: rgba(119, 182, 202, .07);
        }

        .table thead th {
            background: var(--admin-ink);
            color: #fff;
            border: 0;
            font-size: .78rem;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .session-flash {
            transition: opacity .35s ease, transform .35s ease;
        }

        .session-flash.is-dismissing {
            opacity: 0;
            transform: translateY(-6px);
        }

        @media (max-width: 991.98px) {
            .sidebar {
                box-shadow: none;
            }

            .content-area {
                padding: 1rem;
            }

            .topbar {
                margin-top: 1rem;
            }
        }
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
                @if(session('success'))<div class="alert alert-success session-flash">{{ session('success') }}</div>@endif
                @if ($errors->any())<div class="alert alert-danger">
                    <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>@endif
                {{ $slot }}
            </main>
        </div>
    </div>
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