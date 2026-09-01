<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>EMA ERP Services</title>
    <meta name="description" content="EMA ERP services for logistics, manufacturing, retail, hospitality, education, insurance and more." />
    <meta name="keywords" content="EMA, EMASUITE, ERP services, logistics software, retail software, manufacturing software" />

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

  <body class="service-details-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
      <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="{{ route('index') }}" class="logo d-flex align-items-center me-auto">
          <img src="https://ema.co.tz/uploads/logo.png" alt="EMA ERP logo" />
          <h1 class="sitename">EMASUITE</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('services') }}" class="active">Service</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
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
          <h1 class="mb-2 mb-lg-0">Our Services</h1>
          <nav class="breadcrumbs">
            <ol>
              <li><a href="{{ route('index') }}">Home</a></li>
              <li class="current">Services</li>
            </ol>
          </nav>
        </div>
      </div>

      <section id="services" class="services section light-background">
        <div class="container">
          <div class="row g-5">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
              <div class="service-item item-cyan position-relative">
                <i class="bi bi-truck icon"></i>
                <div>
                  <h3>Transportation & Logistics</h3>
                  <p>EMASUITE Transportation Management (ETM) offers a comprehensive platform for businesses to seamlessly oversee all transportation aspects of their supply chains.</p>
                  <a href="{{ route('contact') }}" class="read-more stretched-link">Get Started <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
              <div class="service-item item-orange position-relative">
                <i class="bi bi-send icon"></i>
                <div>
                  <h3>Courier Services</h3>
                  <p>Courier Services Management Software, Delivery Management Software, ERP for courier companies and distribution industries.</p>
                  <a href="{{ route('contact') }}" class="read-more stretched-link">Get Started <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
              <div class="service-item item-teal position-relative">
                <i class="bi bi-shop icon"></i>
                <div>
                  <h3>Restaurant & Hospitality</h3>
                  <p>Manage orders, inventory, reservations, billing, and operations in fast-paced hospitality environments.</p>
                  <a href="{{ route('contact') }}" class="read-more stretched-link">Get Started <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
              <div class="service-item item-red position-relative">
                <i class="bi bi-box-seam icon"></i>
                <div>
                  <h3>Warehouse Management</h3>
                  <p>The best warehouse management system for businesses that need visibility, control, and efficiency across operations.</p>
                  <a href="{{ route('contact') }}" class="read-more stretched-link">Get Started <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
              <div class="service-item item-indigo position-relative">
                <i class="bi bi-file-earmark-text icon"></i>
                <div>
                  <h3>Clearing & Forwarding</h3>
                  <p>Automate freight forwarding activities, documentation, tracking, and operational workflows with lower costs and fewer errors.</p>
                  <a href="{{ route('contact') }}" class="read-more stretched-link">Get Started <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
              <div class="service-item item-pink position-relative">
                <i class="bi bi-cpu icon"></i>
                <div>
                  <h3>Manufacturing</h3>
                  <p>Get customizable manufacturing software based on your specific requirements and business processes.</p>
                  <a href="{{ route('contact') }}" class="read-more stretched-link">Get Started <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="700">
              <div class="service-item item-cyan position-relative">
                <i class="bi bi-mortarboard icon"></i>
                <div>
                  <h3>Education</h3>
                  <p>School ERP and college ERP software with e-learning, attendance, payroll, and academic workflow automation.</p>
                  <a href="{{ route('contact') }}" class="read-more stretched-link">Get Started <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="800">
              <div class="service-item item-orange position-relative">
                <i class="bi bi-shield-check icon"></i>
                <div>
                  <h3>Insurance</h3>
                  <p>Advanced insurance software designed for professionals, agents, and brokers with powerful process automation.</p>
                  <a href="{{ route('contact') }}" class="read-more stretched-link">Get Started <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="900">
              <div class="service-item item-green position-relative">
                <i class="bi bi-bag icon"></i>
                <div>
                  <h3>Retail</h3>
                  <p>End-to-end retail operations covering inventory, ecommerce, POS, CRM, financials, and business intelligence.</p>
                  <a href="{{ route('contact') }}" class="read-more stretched-link">Get Started <i class="bi bi-arrow-right"></i></a>
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
              <span class="sitename">EMA ERP</span>
            </a>
            <div class="footer-contact pt-3">
              <p>Kijitonyama, Millenium Tower</p>
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
