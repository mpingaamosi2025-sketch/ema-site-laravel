<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>About EMASUITE</title>
    <meta name="description" content="Learn about EMA ERP, its mission, vision, and why African businesses trust EMASUITE." />
    <meta name="keywords" content="EMA ERP, EMASUITE, what is EMA, African ERP" />

    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet" />

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
  </head>

  <body class="starter-page-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
      <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="{{ route('index') }}" class="logo d-flex align-items-center me-auto">
          <img src="https://ema.co.tz/uploads/logo.png" alt="EMASUITE logo" />
          <h1 class="sitename">EMASUITE</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('services') }}">Service</a></li>
            <li><a href="{{ route('about') }}" class="active">About</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('contact') }}">Get Started</a>
      </div>
    </header>

    <main class="main">
      <div class="page-title" data-aos="fade">
        <div class="container d-lg-flex justify-content-between align-items-center">
          <h1 class="mb-2 mb-lg-0">About</h1>
          <nav class="breadcrumbs">
            <ol>
              <li><a href="{{ route('index') }}">Home</a></li>
              <li class="current">About</li>
            </ol>
          </nav>
        </div>
      </div>

      <section id="starter-section" class="starter-section section">
        <div class="container section-title" data-aos="fade-up">
          <h2>Why EMASUITE?</h2>
          <p>ERP software built for businesses to streamline and automate processes, creating a leaner, more accurate and efficient operation.</p>
        </div>

        <div class="container" data-aos="fade-up">
          <div class="row gy-5 align-items-center">
            <div class="col-lg-6">
              <img src="{{ asset('assets/img/services.jpg') }}" class="img-fluid rounded" alt="EMASUITE ERP" />
            </div>
            <div class="col-lg-6">
              <p>EMA is an enterprise resource planning solution designed to help small and medium-sized businesses automate industry-specific operations using cloud-based business systems.</p>
              <p>We have designed EMA ERP to be modular, flexible, and cost-effective so you can deploy only what you need upfront and add functionality as your business grows.</p>
              <p>Our goal is for customers to realize ROI quickly through secure, scalable systems built to match African business realities.</p>
            </div>
          </div>
        </div>
      </section>

      <section id="about" class="about section light-background">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
              <p class="who-we-are">Our Vision</p>
              <h3>To help African businesses grow with digital innovation</h3>
              <p class="fst-italic">EMA gives organizations the tools to manage their people, inventory, operations, and business intelligence with confidence.</p>
              <ul>
                <li><i class="bi bi-check-circle"></i><span>Built for Africa's operational and economic environment.</span></li>
                <li><i class="bi bi-check-circle"></i><span>Affordable solutions for SMEs and growing enterprises.</span></li>
                <li><i class="bi bi-check-circle"></i><span>Trusted by businesses across multiple industries.</span></li>
              </ul>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">
                <div class="col-lg-12">
                  <img src="{{ asset('assets/img/whyema.jpg') }}" class="img-fluid" alt="System flexibility" />
                </div>
                <div class="col-lg-12">
                  <img src="{{ asset('assets/img/africa.jpg') }}" class="img-fluid" alt="System security" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer id="footer" class="footer position-relative light-background">
      <div class="container footer-top">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 footer-about">
            <a href="{{ route('index') }}" class="logo d-flex align-items-center">
              <span class="sitename">EMASUITE</span>
            </a>
            <div class="footer-contact pt-3">
              <p>Kijitonyama, Millennium Tower</p>
              <p>Dar es Salaam, Tanzania</p>
              <p class="mt-3"><strong>Phone:</strong> <span>+255 618 330 260</span></p>
              <p><strong>Email:</strong> <span>info@emasuite.co.tz</span></p>
            </div>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Quick Links</h4>
            <ul>
              <li><a href="{{ route('index') }}">Home</a></li>
              <li><a href="{{ route('services') }}">Service</a></li>
              <li><a href="{{ route('about') }}">About</a></li>
              <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Focus Areas</h4>
            <ul>
              <li><a href="{{ route('services') }}">Logistics</a></li>
              <li><a href="{{ route('services') }}">Retail</a></li>
              <li><a href="{{ route('services') }}">Manufacturing</a></li>
              <li><a href="{{ route('services') }}">Hospitality</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-12 footer-newsletter">
            <h4>About EMA</h4>
            <p>Cloud ERP Suite to help SMEs automate industry-specific operations for businesses across Africa.</p>
          </div>
        </div>
      </div>

      <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">EMA ERP</strong><span>All Rights Reserved</span></p>
      </div>
    </footer>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
  </body>
</html>
