<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Emasuite</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"
    />

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />

  </head>

  <body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="{{ route('index') }}" class="logo d-flex align-items-center me-auto">
          <img src="https://ema.co.tz/uploads/logo.png" alt="EMASUITE logo" />
          <h1 class="sitename">{{ \App\Models\SiteSetting::get('site_name', 'EMASUITE') }}</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ route('index') }}" class="active">Home</a></li>
            <li><a href="{{ route('services') }}">Service</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-md-none bi bi-list" role="button" aria-label="Open navigation" tabindex="0"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('login') }}">{{ \App\Models\SiteSetting::get('home_primary_button_text', 'Login') }}</a>
      </div>
    </header>

    <main class="main">
      <section id="hero" class="hero section">
        <div class="hero-bg">
          <img id="hero-service-image" data-cms-key="page.home.image" src="{{ asset('assets/img/logistic.jpg') }}" alt="EMA Fleet and logistics software" />
        </div>
        <div class="container">
          <div class="hero-content">
            <p class="hero-service-label" data-aos="fade-up">EMA SOFTWARE SOLUTIONS</p>
            <h1 id="hero-service-title" data-cms-key="page.home.title" data-aos="fade-up">{{ \App\Models\SiteSetting::get('home_hero_title', 'ERP Software Built for You') }}</h1>
            <p class="hero-description" data-aos="fade-up" data-aos-delay="100">
              <span id="hero-service-description" data-cms-key="page.home.intro">{{ \App\Models\SiteSetting::get('home_hero_description', 'Streamline and automate processes, creating a leaner, more accurate and efficient operation.') }}</span><br />
            </p>
            <div class="hero-actions" data-aos="fade-up" data-aos-delay="200">
              <a href="{{ route('services') }}" class="btn-get-started">Explore Solutions <i class="bi bi-arrow-right"></i></a>
              <a href="{{ route('contact') }}" class="btn-hero-secondary">Request a Demo</a>
            </div>
            <div class="hero-trust" data-aos="fade-up" data-aos-delay="300"><i class="bi bi-shield-check"></i><span>Reliable. Secure. Scalable.</span></div>
          </div>
        </div>
      </section>
      <section id="featured-services" class="featured-services section light-background">
        <div class="container">
          <div class="section-title" data-aos="fade-up">
            <p class="eyebrow">OUR SOLUTIONS</p>
            <h2>Powerful solutions for every business</h2>
          </div>
          <div class="row gy-4">
            @foreach($services->take(4) as $service)
              <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="{{ 100 * ($loop->index + 1) }}">
                <div class="service-item">
                  <div class="icon"><i class="{{ $service->icon }}"></i></div>
                  <div>
                    <h4 class="title"><a href="{{ route('services') }}" class="stretched-link">{{ $service->title }}</a></h4>
                    <p class="description">{{ $service->description }}</p>
                    <span class="solution-link">Get Started <i class="bi bi-arrow-right"></i></span>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="text-center mt-5" data-aos="fade-up"><a href="{{ route('services') }}" class="btn-hero-secondary">View All Services <i class="bi bi-arrow-right"></i></a></div>
        </div>
      </section>

      <section id="about" class="about section">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
              <p class="who-we-are">WHY EMASUITE?</p>
              <h3 data-cms-key="setting.about_title">{{ \App\Models\SiteSetting::get('about_title', 'Cloud ERP suite built for smarter, leaner operations') }}</h3>
              <p class="fst-italic" data-cms-key="setting.about_description">{{ \App\Models\SiteSetting::get('about_description', 'EMASUITE helps businesses streamline operations across logistics, retail, manufacturing, education, and more using affordable, modern technology.') }}</p>
              <ul>
                <li><i class="bi bi-check-circle"></i><span>Flexible modular ERP that grows with your business.</span></li>
                <li><i class="bi bi-check-circle"></i><span>Built to suit African business realities and industry workflows.</span></li>
                <li><i class="bi bi-check-circle"></i><span>Designed to deliver faster ROI with secure, scalable features.</span></li>
              </ul>
              <a href="{{ route('about') }}" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>

            <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
              <img src="{{ asset('assets/img/erp.jpg') }}" class="img-fluid" alt="EMA business management dashboard" />
            </div>
          </div>
        </div>
      </section>

      <section class="index-cta section">
        <div class="container">
          <div class="index-cta-inner" data-aos="fade-up">
            <div class="index-cta-icon"><i class="bi bi-headset"></i></div>
            <div>
              <p class="eyebrow">READY TO TRANSFORM YOUR BUSINESS?</p>
              <h2>Let's build the right solution for you.</h2>
              <p>Talk to our experts and discover how EMASUITE can help your business grow.</p>
            </div>
            <a href="{{ route('contact') }}" class="btn-get-started">Request a Demo <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </section>

      <section id="clients" class="clients section">
        <div class="container" data-aos="fade-up"></div>
      </section>

      <section id="features" class="features section">
        <div class="container section-title" data-aos="fade-up">
          <h2>Why businesses choose EMA</h2>
          <p>Affordable, secure, and scalable ERP systems tailored to real business needs.</p>
        </div>

        <div class="container">
          <div class="row justify-content-between">
            <div class="col-lg-5 d-flex align-items-center">
              <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
                <li class="nav-item">
                  <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                    <i class="bi bi-binoculars"></i>
                    <div>
                      <h4 class="d-none d-lg-block">System Security</h4>
                      <p>Robust security controls safeguard your data, workflows, and business operations.</p>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                    <i class="bi bi-box-seam"></i>
                    <div>
                      <h4 class="d-none d-lg-block">System Flexibility</h4>
                      <p>Deploy only what you need now, then scale modules as your business grows.</p>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                    <i class="bi bi-brightness-high"></i>
                    <div>
                      <h4 class="d-none d-lg-block">Fast ROI</h4>
                      <p>Reduce operational delays and improve visibility to achieve value quickly.</p>
                    </div>
                  </a>
                </li>
              </ul>
            </div>

            <div class="col-lg-6">
              <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                <div class="tab-pane fade active show" id="features-tab-1"><img src="{{ asset('assets/img/comment.jpg') }}" alt="" class="img-fluid" /></div>
                <div class="tab-pane fade" id="features-tab-2"><img src="{{ asset('assets/img/industries.png') }}" alt="" class="img-fluid" /></div>
                <div class="tab-pane fade" id="features-tab-3"><img src="{{ asset('assets/img/fastroi.jpg') }}" alt="" class="img-fluid" /></div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="features-details" class="features-details section">
        <div class="container">
          <div class="row gy-4 justify-content-between features-item">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100"><img src="{{ asset('assets/img/erp.jpg') }}" class="img-fluid" alt="" /></div>
            <div class="col-lg-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
              <div class="content">
                <h3>Industry-specific ERP solution</h3>
                <p>EMASUITE helps organizations automate key workflows across logistics, retail, manufacturing, and service businesses with a flexible and modern platform.</p>
                <a href="{{ route('services') }}" class="btn more-btn">Learn More</a>
              </div>
            </div>
          </div>

          <div class="row gy-4 justify-content-between features-item">
            <div class="col-lg-5 d-flex align-items-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
              <div class="content">
                <h3>Built for real business challenges</h3>
                <p>From stock control to dispatch and reporting, EMA gives teams a practical, flexible, and secure operating system.</p>
                <ul>
                  <li><i class="bi bi-easel flex-shrink-0"></i> Manage core operations in a single platform.</li>
                  <li><i class="bi bi-patch-check flex-shrink-0"></i> Improve visibility and reduce manual delays.</li>
                  <li><i class="bi bi-brightness-high flex-shrink-0"></i> Scale as your business grows.</li>
                </ul>
                <a href="{{ route('about') }}" class="btn more-btn">Learn More</a>
              </div>
            </div>

            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
              <img src="{{ asset('assets/img/emacompany.jpg') }}" class="img-fluid" alt="" />
            </div>
          </div>
        </div>
      </section>

      <section id="services" class="services section light-background">
        <div class="container section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p>Industry-specific ERP solutions built for long-term growth and efficiency.</p>
        </div>

        <div class="container">
          <div class="row g-5">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
              <div class="service-item item-cyan position-relative">
                <i class="bi bi-activity icon"></i>
                <div>
                  <h3>Transportation & Logistics</h3>
                  <p>Control fleet visibility, dispatch operations, route planning, and supply chain performance in one environment.</p>
                  <a href="{{ route('services') }}" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
              <div class="service-item item-orange position-relative">
                <i class="bi bi-broadcast icon"></i>
                <div>
                  <h3>Warehouse Management</h3>
                  <p>Improve stock movement, receiving, dispatch, and inventory accuracy with better operational control.</p>
                  <a href="{{ route('services') }}" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
              <div class="service-item item-teal position-relative">
                <i class="bi bi-easel icon"></i>
                <div>
                  <h3>Retail & POS</h3>
                  <p>Manage sales, inventory, POS, CRM, and ecommerce operations through a connected retail platform.</p>
                  <a href="{{ route('services') }}" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
              <div class="service-item item-red position-relative">
                <i class="bi bi-bounding-box-circles icon"></i>
                <div>
                  <h3>Manufacturing</h3>
                  <p>Support production planning, materials management, and quality operations with flexible system workflows.</p>
                  <a href="{{ route('services') }}" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
              <div class="service-item item-indigo position-relative">
                <i class="bi bi-calendar4-week icon"></i>
                <div>
                  <h3>Education</h3>
                  <p>Manage student records, attendance, finances, and academic administration in one dependable platform.</p>
                  <a href="{{ route('services') }}" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
              <div class="service-item item-pink position-relative">
                <i class="bi bi-chat-square-text icon"></i>
                <div>
                  <h3>Insurance</h3>
                  <p>Support policy administration, client records, and agent workflows with a secure and fully integrated platform.</p>
                  <a href="{{ route('services') }}" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="more-features" class="more-features section">
        <div class="container">
          <div class="row justify-content-around gy-4">
            <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
              <h3>Built for growth, security, and efficiency</h3>
              <p>EMA ERP gives businesses a practical foundation for modern operations, from automation and reporting to collaboration and expansion.</p>

              <div class="row">
                <div class="col-lg-6 icon-box d-flex">
                  <i class="bi bi-easel flex-shrink-0"></i>
                  <div>
                    <h4>Flexible Modules</h4>
                    <p>Start with what you need and scale as your business grows.</p>
                  </div>
                </div>

                <div class="col-lg-6 icon-box d-flex">
                  <i class="bi bi-patch-check flex-shrink-0"></i>
                  <div>
                    <h4>Secure Platform</h4>
                    <p>Protect your data and critical business processes with trusted security.</p>
                  </div>
                </div>

                <div class="col-lg-6 icon-box d-flex">
                  <i class="bi bi-brightness-high flex-shrink-0"></i>
                  <div>
                    <h4>Fast ROI</h4>
                    <p>Improve workflow accuracy, speed, and visibility with quicker returns.</p>
                  </div>
                </div>

                <div class="col-lg-6 icon-box d-flex">
                  <i class="bi bi-brightness-high flex-shrink-0"></i>
                  <div>
                    <h4>Simple Control</h4>
                    <p>Keep teams aligned with clear business data and reporting tools.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="features-image col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200"><img src="{{ asset('assets/img/logistic.jpg') }}" alt="" /></div>
          </div>
        </div>
      </section>

      <section id="pricing" class="pricing section"></section>

      <section id="faq" class="faq section">
        <div class="container section-title" data-aos="fade-up">
          <h2>Frequently Asked Questions</h2>
        </div>

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
              <div class="faq-container">
                <div class="faq-item faq-active">
                  <h3>What does the acronym EMA stand for?</h3>
                  <div class="faq-content"><p>EMA is the platform behind EMASUITE, a business and ERP system built to help African companies streamline operations.</p></div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>

                <div class="faq-item">
                  <h3>What is EMASUITE's vision and mission?</h3>
                  <div class="faq-content"><p>EMASUITE aims to deliver practical, affordable digital systems that support business growth and operational efficiency across industries.</p></div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>

                <div class="faq-item">
                  <h3>Which industries can EMASUITE ERP be used for?</h3>
                  <div class="faq-content"><p>It is designed for transportation, logistics, retail, manufacturing, hospitality, education, insurance, and many other sectors.</p></div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>

                <div class="faq-item">
                  <h3>How much does EMASUITE ERP cost?</h3>
                  <div class="faq-content"><p>Pricing depends on the type of business, modules needed, and scale of operations, but the solution is built to be affordable and scalable.</p></div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="testimonials" class="testimonials section light-background">
        <div class="container section-title" data-aos="fade-up">
          <h2>Testimonials</h2>
          <p>Business leaders trust EMA to simplify and modernize their operations.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": { "delay": 5000 },
                "slidesPerView": "auto",
                "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true },
                "breakpoints": { "320": { "slidesPerView": 1, "spaceBetween": 40 }, "1200": { "slidesPerView": 3, "spaceBetween": 1 } }
              }
            </script>
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="testimonial-item" data-aos="fade-right" data-aos-delay="100">
                  <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                  <p>EMA helped us simplify our operations and gain better visibility across inventory, sales, and daily business performance.</p>
                  <div class="profile mt-auto">
                    <img src="{{ asset('assets/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="" />
                    <h3>Saul Goodman</h3>
                    <h4>Operations Manager</h4>
                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="testimonial-item" data-aos="fade-right" data-aos-delay="200">
                  <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                  <p>The flexibility of the platform made it easier for our team to adopt and scale the system as the business evolved.</p>
                  <div class="profile mt-auto">
                    <img src="{{ asset('assets/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="" />
                    <h3>Sara Wilsson</h3>
                    <h4>Business Owner</h4>
                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="testimonial-item" data-aos="fade-right" data-aos-delay="300">
                  <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                  <p>We were able to automate several processes without losing control over our service quality or reporting needs.</p>
                  <div class="profile mt-auto">
                    <img src="{{ asset('assets/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="" />
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section>

      <section id="contact" class="contact section">
        <div class="container section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Talk to our team about the right ERP solution for your business.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-4">
            <div class="col-lg-6">
              <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>Kijitonyama, Millennium Tower, 19th Floor, Room 1906, Dar es Salaam, Tanzania</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p>+255 618 330 260</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>info@emasuite.co.tz</p>
              </div>
            </div>
          </div>

          <div class="row gy-4 mt-1">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
              <iframe src="https://www.google.com/maps?q=Dar%20es%20Salaam%2C%20Tanzania&z=12&output=embed" frameborder="0" style="border: 0; width: 100%; height: 400px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="col-lg-6">
              <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
                <div class="row gy-4">
                  <div class="col-md-6"><input type="text" name="name" class="form-control" placeholder="Your Name" required="" /></div>
                  <div class="col-md-6"><input type="email" class="form-control" name="email" placeholder="Your Email" required="" /></div>
                  <div class="col-md-12"><input type="text" class="form-control" name="subject" placeholder="Subject" required="" /></div>
                  <div class="col-md-12"><textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea></div>
                  <div class="col-md-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                    <button type="submit">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <x-custom-sections :page="$page" />
    </main>

    <footer id="footer" class="footer position-relative light-background">
      <div class="container footer-top">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 footer-about">
            <a href="{{ route('index') }}" class="logo d-flex align-items-center">
              <span class="sitename">EMA ERP</span>
            </a>
            <div class="footer-contact pt-3">
              <p>Kijitonyama, Millennium Tower</p>
              <p>Dar es Salaam, Tanzania</p>
              <p class="mt-3"><strong>Phone:</strong> <span>+255 618 330 260</span></p>
              <p><strong>Email:</strong> <span>info@emasuite.co.tz</span></p>
            </div>
            <div class="social-links d-flex mt-4">
              <a href="https://www.facebook.com/share/19kPXwHu9S/?mibextid=wwXIfr"><i class="bi bi-facebook"></i></a>
              <a href="https://x.com/emasuite"><i class="bi bi-twitter-x"></i></a>
              <a href="https://www.linkedin.com/company/emasuite/posts/?feedView=all"><i class="bi bi-linkedin"></i></a>
              <a href="https://www.youtube.com/channel/UCgWau6SH48M9PdoR1OAw3pQ"><i class="bi bi-youtube"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Quick Links</h4>
            <ul>
              <li><a href="{{ route('index') }}">Home</a></li>
              <li><a href="{{ route('services') }}">Services</a></li>
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
            <p>Cloud ERP Suite to help SMEs automate industry-specific operations across logistics, manufacturing, retail, and more.</p>
          </div>
        </div>
      </div>

      <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">EMA ERP</strong><span>All Rights Reserved</span></p>
      </div>
    </footer>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"><span>EMASUITE</span></div>

    <x-visual-overrides :page="$page" />
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
      (() =>{
        const image = document.getElementById('hero-service-image');
        const title = document.getElementById('hero-service-title');
        const description = document.getElementById('hero-service-description');
        if (!image || !title || !description) return;

        const services = [
          {
            title: 'EMA Fleet & Logistics',
            description: 'Manage trucks, cargo movements, fuel, maintenance, and delivery operations in one connected platform.',
            image: @json(asset('assets/img/logistic.jpg'))
          },
          {
            title: 'EMA Warehouse',
            description: 'Control receiving, stock movement, dispatch, and inventory accuracy with real-time warehouse visibility.',
            image: @json(asset('assets/img/industries.png'))
          },
          {
            title: 'EMA Accounting',
            description: 'Track bills, invoices, payments, and financial reports with accounting tools built for growing businesses.',
            image: @json(asset('assets/img/fastroi.jpg'))
          },
          {
            title: 'EMA Inventory',
            description: 'Gain full control of goods across stores and supply networks while improving service levels and working capital.',
            image: @json(asset('assets/img/business.jpg'))
          },
          {
            title: 'EMA HR & Payroll',
            description: 'Automate employee earnings, deductions, attendance, and statutory payroll reporting for your team.',
            image: @json(asset('assets/img/hrsoftware.jpg'))
          }
        ];
        let activeService = 0;

        window.setInterval(() => {
          activeService = (activeService + 1) % services.length;
          const service = services[activeService];
          image.classList.add('is-changing');
          title.classList.add('is-changing');
          description.classList.add('is-changing');

          window.setTimeout(() => {
            image.src = service.image;
            image.alt = service.title;
            title.textContent = service.title;
            description.textContent = service.description;
            image.classList.remove('is-changing');
            title.classList.remove('is-changing');
            description.classList.remove('is-changing');
          }, 260);
        }, 5000);
      })();
    </script>
  </body>
</html>
