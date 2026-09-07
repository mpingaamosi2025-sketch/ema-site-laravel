<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard | EMASUITE</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background: #f4f7fb;
            color: #12263f;
            font-family: Inter, Arial, sans-serif;
            overflow-x: hidden;
        }

        .sidebar {
            background: #0d3b4f;
            min-height: 100vh;
            max-height: 100vh;
            position: sticky;
            top: 0;
            overflow-y: auto;
            overscroll-behavior: contain;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.35) transparent;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.35);
            border-radius: 8px;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.82);
            padding: 0.8rem 1rem;
            border-radius: 10px;
            margin: 0.15rem 0.5rem;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
        }

        .content-area {
            min-height: 100vh;
            padding: 2rem;
            scroll-behavior: smooth;
        }

        .topbar {
            background: #fff;
            border-radius: 16px;
            padding: 1rem 1.25rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.04);
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.04);
        }

        .btn-primary {
            background: linear-gradient(135deg, #0d3b4f, #1b7f95);
            border: none;
        }

        .empty-state {
            border: 1px dashed #c6d0db;
            border-radius: 12px;
            padding: 2rem;
            background: #fff;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                min-height: auto;
                max-height: none;
                position: relative;
            }
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

        .topbar {
            min-height: 68px;
            border: 1px solid rgba(56, 141, 168, .14);
            box-shadow: 0 14px 32px rgba(13, 59, 79, .07);
        }

        .topbar h2 {
            color: var(--admin-ink);
            font-weight: 800;
        }

        .card {
            border: 1px solid rgba(56, 141, 168, .14);
            box-shadow: 0 12px 28px rgba(13, 59, 79, .06);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 32px rgba(13, 59, 79, .1);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--admin-ink), var(--admin-teal));
            border: 0;
            border-radius: 9px;
            box-shadow: 0 8px 18px rgba(13, 59, 79, .16);
            font-weight: 700;
        }

        .form-control {
            border: 1px solid rgba(56, 141, 168, .22);
            border-radius: 9px;
        }

        .form-control:focus {
            border-color: var(--admin-teal);
            box-shadow: 0 0 0 .2rem rgba(56, 141, 168, .14);
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
                <div class="d-flex align-items-center gap-3 px-2 mb-4">
                    <img src="https://ema.co.tz/uploads/logo.png" alt="EMASUITE" style="width: 38px; height: 38px;" />
                    <div>
                        <div class="fw-bold">EMASUITE</div>
                        <small class="text-white-50">Admin</small>
                    </div>
                </div>

                <nav class="nav flex-column">
                    <a class="nav-link active" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
                    <a class="nav-link" href="{{ route('admin.pages.index') }}"><i class="bi bi-layout-text-window me-2"></i>Public Pages</a>
                    <div class="text-uppercase small text-white-50 px-2 mt-3 mb-1">Edit website</div>
                    <a class="nav-link" href="{{ route('admin.pages.visual', 'home') }}"><i class="bi bi-house me-2"></i>Home</a>
                    <a class="nav-link" href="{{ route('admin.pages.visual', 'services') }}"><i class="bi bi-grid me-2"></i>Services</a>
                    <a class="nav-link" href="{{ route('admin.pages.visual', 'about') }}"><i class="bi bi-info-circle me-2"></i>About</a>
                    <a class="nav-link" href="{{ route('admin.pages.visual', 'contact') }}"><i class="bi bi-envelope me-2"></i>Contact</a>
                    <a class="nav-link" href="{{ route('admin.services.index') }}"><i class="bi bi-briefcase me-2"></i>Manage services</a>
                    <a class="nav-link" href="{{ route('admin.profile') }}"><i class="bi bi-person me-2"></i>Profile</a>
                    <a class="nav-link" href="{{ route('admin.change-password') }}"><i class="bi bi-shield-lock me-2"></i>Change Password</a>
                    <a class="nav-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </nav>
            </aside>

            <main class="col-lg-10 content-area">
                <div class="topbar d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="mb-0">Dashboard</h2>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="fw-semibold">{{ auth()->user()->name }}</span>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success session-flash">{{ session('success') }}</div>
                @endif

                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="text-muted small">Website Name</div>
                            <div class="fs-4 fw-bold">{{ \App\Models\SiteSetting::get('site_name', 'EMASUITE') }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="text-muted small">Hero Title</div>
                            <div class="fs-4 fw-bold">{{ \Illuminate\Support\Str::limit(\App\Models\SiteSetting::get('home_hero_title', "ERP Software Built for Africa's Growth"), 26) }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="text-muted small">Services</div>
                            <div class="fs-4 fw-bold">{{ \App\Models\Service::count() }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="text-muted small">Last Updated</div>
                            <div class="fs-6 fw-bold">{{ now()->format('M d, Y') }}</div>
                        </div>
                    </div>
                </div>

                <div class="card p-4" id="settings-form">
                    <h4 class="mb-3">Website Content</h4>
                    <form method="POST" action="{{ route('admin.settings.update') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Site Name</label>
                                <input type="text" class="form-control" name="site_name" value="{{ \App\Models\SiteSetting::get('site_name', 'EMASUITE') }}" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tagline</label>
                                <input type="text" class="form-control" name="site_tagline" value="{{ \App\Models\SiteSetting::get('site_tagline', 'ERP software built for growth') }}" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Hero Title</label>
                                <input type="text" class="form-control" name="home_hero_title" value="{{ \App\Models\SiteSetting::get('home_hero_title', "ERP Software Built for Africa's Growth") }}" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Hero Description</label>
                                <textarea class="form-control" name="home_hero_description" rows="3">{{ \App\Models\SiteSetting::get('home_hero_description', 'Streamline and automate your operations with a cloud ERP solution designed for businesses across Tanzania and Africa.') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Primary CTA Text</label>
                                <input type="text" class="form-control" name="home_primary_button_text" value="{{ \App\Models\SiteSetting::get('home_primary_button_text', 'Login') }}" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Primary CTA Link</label>
                                <input type="text" class="form-control" name="home_primary_button_url" value="{{ \App\Models\SiteSetting::get('home_primary_button_url', route('login')) }}" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">About Title</label>
                                <input type="text" class="form-control" name="about_title" value="{{ \App\Models\SiteSetting::get('about_title', 'Cloud ERP suite built for smarter, leaner operations') }}" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">About Description</label>
                                <textarea class="form-control" name="about_description" rows="3">{{ \App\Models\SiteSetting::get('about_description', 'EMASUITE helps businesses streamline operations across logistics, retail, manufacturing, education, and more using affordable, modern technology.') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact Phone</label>
                                <input type="text" class="form-control" name="contact_phone" value="{{ \App\Models\SiteSetting::get('contact_phone', '+255 618 330 260') }}" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact Email</label>
                                <input type="email" class="form-control" name="contact_email" value="{{ \App\Models\SiteSetting::get('contact_email', 'info@emasuite.co.tz') }}" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Contact Address</label>
                                <input type="text" class="form-control" name="contact_address" value="{{ \App\Models\SiteSetting::get('contact_address', 'Kijitonyama, Millennium Tower, Dar es Salaam, Tanzania') }}" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Footer Copyright</label>
                                <input type="text" class="form-control" name="footer_copyright" value="{{ \App\Models\SiteSetting::get('footer_copyright', '© Copyright EMA ERP All Rights Reserved') }}" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Footer Description</label>
                                <textarea class="form-control" name="footer_description" rows="3">{{ \App\Models\SiteSetting::get('footer_description', 'Cloud ERP suite to help SMEs automate industry-specific operations for businesses across Africa.') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Facebook URL</label>
                                <input type="url" class="form-control" name="facebook_url" value="{{ \App\Models\SiteSetting::get('facebook_url', '#') }}" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Instagram URL</label>
                                <input type="url" class="form-control" name="instagram_url" value="{{ \App\Models\SiteSetting::get('instagram_url', '#') }}" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">X (Twitter) URL</label>
                                <input type="url" class="form-control" name="x_url" value="{{ \App\Models\SiteSetting::get('x_url', '#') }}" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">LinkedIn URL</label>
                                <input type="url" class="form-control" name="linkedin_url" value="{{ \App\Models\SiteSetting::get('linkedin_url', '#') }}" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">YouTube URL</label>
                                <input type="url" class="form-control" name="youtube_url" value="{{ \App\Models\SiteSetting::get('youtube_url', '#') }}" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>

    <script>
        window.setTimeout(() => {
            document.querySelectorAll('.session-flash').forEach((message) => {
                message.classList.add('is-dismissing');
                window.setTimeout(() => message.remove(), 350);
            });
        }, 3000);
    </script>
</html>