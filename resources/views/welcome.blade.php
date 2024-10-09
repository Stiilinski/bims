<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>Poblacion Ward II BIMS</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
    
        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon" />
    
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect" />
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
        <link
          href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet"
        />
    
        <!-- Vendor CSS Files -->
        <link
          href="assets/vendor/bootstrap/css/bootstrap.min.css"
          rel="stylesheet"
        />
        <link
          href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
          rel="stylesheet"
        />
        <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
        <link
          href="assets/vendor/glightbox/css/glightbox.min.css"
          rel="stylesheet"
        />
        {{-- <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" /> --}}
        <link rel="stylesheet" href="https://unpkg.com/swiper@latest/swiper-bundle.min.css">
    
        <!-- Main CSS File -->
        <link href="assets/css/main.css" rel="stylesheet" />

          <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <style>
    .stretched-link {
      cursor: pointer;
    }
  </style>
  {{-- <link href="assets/css/style.css" rel="stylesheet"> --}}
    </head>
    <body class="index-page">
        <header id="header" class="header d-flex align-items-center fixed-top">
          <div
            class="container-fluid container-xl position-relative d-flex align-items-center"
          >
            <a href="index.html" class="logo d-flex align-items-center me-auto">
              <img src="assets/img/logo.png" alt="" />
              <h1 class="sitename">BIMS</h1>
            </a>
    
            <nav id="navmenu" class="navmenu">
              <ul>
                <li><a href="#hero" class="active">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#events">Events</a></li>
                <li><a href="#officials">Officials</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                  <a href="#"
                    ><span>Dropdown</span>
                    <i class="bi bi-chevron-down toggle-dropdown"></i
                  ></a>
                  <ul>
                    <li><a href="#">Search Transaction</a></li>
                    <li class="dropdown">
                      <a href="#"
                        ><span>Deep Dropdown</span>
                        <i class="bi bi-chevron-down toggle-dropdown"></i
                      ></a>
                      <ul>
                        <li><a href="#">Deep Dropdown 1</a></li>
                        <li><a href="#">Deep Dropdown 2</a></li>
                        <li><a href="#">Deep Dropdown 3</a></li>
                        <li><a href="#">Deep Dropdown 4</a></li>
                        <li><a href="#">Deep Dropdown 5</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Dropdown 2</a></li>
                    <li><a href="#">Dropdown 3</a></li>
                    <li><a href="#">Dropdown 4</a></li>
                  </ul>
                </li>
              </ul>
              <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
          </div>
        </header>
    
        <main class="main">
          <!-- Hero Section -->
          <section id="hero" class="hero section dark-background">
            <div class="container">
              <div class="row gy-4">
                <div
                  class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center"
                  data-aos="zoom-out"
                >
                  <h1>Poblacion Ward II, Minglanilla, Cebu</h1>
                  <p>Barangay Information Management System</p>
                </div>
                <div
                  class="col-lg-6 order-1 order-lg-2 hero-img"
                  data-aos="zoom-out"
                  data-aos-delay="200"
                >
                  <img
                    src="assets/img/hero-img.png"
                    class="img-fluid animated"
                    alt=""
                  />
                </div>
              </div>
            </div>
          </section>
          <!-- /Hero Section -->
    
          <!-- About Section -->
          <section id="about" class="about section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>About</h2>
            </div>
            <!-- End Section Title -->
    
            <div class="container">
              <div class="row gy-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                  <h3>VISION</h3>
                  <p>
                    A progressive barangay where constituents live in a harmonious,
                    peaceful, cleaner and greener life while instilling an active
                    participation from the constituents to barangay activities,
                    pro-active promotion of a community-based tourism and local
                    business projects through the administration of an innovative,
                    participatory and inclusive governance for empowerment and
                    development.
                  </p>
                </div>
    
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                  <h3>MISSION</h3>
                  <p>
                    Barangay Ward II shall continually work for the formulation and
                    implementation of programs, projects and activities specially
                    tailored to the needs of the constituents and are directly down
                    streamed to the puroks in the barangay. It shall strengthen
                    linkages and networking channels to both public and private
                    sector in order to hasten the delivery of basic services to the
                    community.
                  </p>
                </div>
    
                <div class="col-lg content" data-aos="fade-up" data-aos-delay="100">
                  <h3>SECTORIAL GOALS</h3>
                  <ul>
                    <li>
                      <i class="bi bi-check2-circle"></i>
                      <span
                        ><span style="font-weight: bold">Social Development</span>
                        Nurturing a God-Loving and empowered people</span
                      >
                    </li>
                    <li>
                      <i class="bi bi-check2-circle"></i>
                      <span
                        ><span style="font-weight: bold">Economic Development</span>
                        Competitive and business-friendly LGU with focus on local
                        business as a form of community-based tourism</span
                      >
                    </li>
                    <li>
                      <i class="bi bi-check2-circle"></i>
                      <span
                        ><span style="font-weight: bold"
                          >Environmental Development</span
                        >
                        Sustainable, balanced clean, and healthy environment</span
                      >
                    </li>
                    <li>
                      <i class="bi bi-check2-circle"></i>
                      <span
                        ><span style="font-weight: bold"
                          >Infrastracture Development</span
                        >
                        Balanced, high-standard, and sustainable infrastructure
                        materials and projects</span
                      >
                    </li>
                    <li>
                      <i class="bi bi-check2-circle"></i>
                      <span
                        ><span style="font-weight: bold"
                          >Institutional Development</span
                        >
                        Competitive, participatorym inclusive, efficient and
                        transparent local governance</span
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </section>
          <!-- /About Section -->
    
          <!-- Services Section -->
          <section id="services" class="services section light-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Services</h2>
            </div>
            <!-- End Section Title -->
    
            <div class="container">
              <div class="row gy-4">
                <div
                  class="col-xl-3 col-md-6 d-flex"
                  data-aos="fade-up"
                  data-aos-delay="100"
                >
                  <div class="service-item position-relative">
                    <div class="icon">
                      <img src="assets/img/services/clearance.png" alt="" />
                    </div>
                    <h4>
                      <a class="stretched-link" data-bs-toggle="modal" data-bs-target="#ExtralargeModal1">Barangay Clearance</a>
                    </h4>
                    <p>
                      View The Requirements Needed For Barangay Clearance & Acquire
                      Online Now.
                    </p>
                  </div>
                </div>
                <!-- End Service Item -->
    
                <div
                  class="col-xl-3 col-md-6 d-flex"
                  data-aos="fade-up"
                  data-aos-delay="200"
                >
                  <div class="service-item position-relative">
                    <div class="icon">
                      <img src="assets/img/services/permit.png" alt="" />
                    </div>
                    <h4><a class="stretched-link" data-bs-toggle="modal" data-bs-target="#ExtralargeModal2">Business Permit</a></h4>
                    <p>
                      View The Requirements Needed For Barangay Clearance Business
                      Permit & Acquire Online Now.
                    </p>
                  </div>
                </div>
                <!-- End Service Item -->
    
                <div
                  class="col-xl-3 col-md-6 d-flex"
                  data-aos="fade-up"
                  data-aos-delay="300"
                >
                  <div class="service-item position-relative">
                    <div class="icon">
                      <img src="assets/img/services/complaint.png" alt="" />
                    </div>
                    <h4><a class="stretched-link" data-bs-toggle="modal" data-bs-target="#ExtralargeModal3">Blotter</a></h4>
                    <p>
                      View The Requirements Needed For Blotter or Complaint &
                      Acquire Online Now.
                    </p>
                  </div>
                </div>
                <!-- End Service Item -->
    
                <div
                  class="col-xl-3 col-md-6 d-flex"
                  data-aos="fade-up"
                  data-aos-delay="400"
                >
                  <div class="service-item position-relative">
                    <div class="icon">
                      <img src="assets/img/services/certificate.png" alt="" />
                    </div>
                    <h4><a class="stretched-link" data-bs-toggle="modal" data-bs-target="#ExtralargeModal4">Certifications</a></h4>
                    <p>
                      View The Requirements Needed For Barangay Certifications &
                      Acquire Online Now.
                    </p>
                  </div>
                </div>
                <!-- End Service Item -->
              </div>
            </div>
          </section>
          <!-- /Services Section -->
    
          <!-- Events Section -->
          <section id="events" class="portfolio section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Events</h2>
            </div>
            <!-- End Section Title -->
    
            <div class="container">
              <div
                class="isotope-layout"
                data-default-filter="*"
                data-layout="masonry"
                data-sort="original-order"
              >
                <ul
                  class="portfolio-filters isotope-filters"
                  data-aos="fade-up"
                  data-aos-delay="100"
                >
                  <li data-filter="*" class="filter-active">All</li>
                  <li data-filter=".filter-today">Today</li>
                  <li data-filter=".filter-week">This Week</li>
                  <li data-filter=".filter-month">This Month</li>
                </ul>
                <!-- End Events Filters -->
    
                <div
                  class="row gy-4 isotope-container"
                  data-aos="fade-up"
                  data-aos-delay="200"
                >
                  <div
                    class="col-lg-4 col-md-6 portfolio-item isotope-item filter-week"
                  >
                    <img
                      src="assets/img/events/ev-1.jpg"
                      class="img-fluid"
                      alt=""
                    />
                    <div class="portfolio-info">
                      <h4>Feeding Program</h4>
                      <p>Lorem ipsum, dolor sit</p>
                      <a
                        href="assets/img/events/ev-1.jpg"
                        title="Event1"
                        data-gallery="portfolio-gallery-week"
                        class="glightbox preview-link"
                        ><i class="bi bi-zoom-in"></i
                      ></a>
                    </div>
                  </div>
                  <!-- End Events Item -->
    
                  <div
                    class="col-lg-4 col-md-6 portfolio-item isotope-item filter-week"
                  >
                    <img
                      src="assets/img/events/ev-2.jpeg"
                      class="img-fluid"
                      alt=""
                    />
                    <div class="portfolio-info">
                      <h4>Libreng Tuli</h4>
                      <p>Lorem ipsum, dolor sit</p>
                      <a
                        href="assets/img/events/ev-2.jpeg"
                        title="Event2"
                        data-gallery="portfolio-gallery-week"
                        class="glightbox preview-link"
                        ><i class="bi bi-zoom-in"></i
                      ></a>
                    </div>
                  </div>
                  <!-- End Events Item -->
    
                  <div
                    class="col-lg-4 col-md-6 portfolio-item isotope-item filter-month"
                  >
                    <img
                      src="assets/img/events/ev-3.jpg"
                      class="img-fluid"
                      alt=""
                    />
                    <div class="portfolio-info">
                      <h4>Barangay Meeting</h4>
                      <p>Lorem ipsum, dolor sit</p>
                      <a
                        href="assets/img/events/ev-3.jpg"
                        title="Event3"
                        data-gallery="portfolio-gallery-month"
                        class="glightbox preview-link"
                        ><i class="bi bi-zoom-in"></i
                      ></a>
                    </div>
                  </div>
                  <!-- End Events Item -->
    
                  <div
                    class="col-lg-4 col-md-6 portfolio-item isotope-item filter-week"
                  >
                    <img
                      src="assets/img/events/ev-4.jpg"
                      class="img-fluid"
                      alt=""
                    />
                    <div class="portfolio-info">
                      <h4>Fiesta</h4>
                      <p>Lorem ipsum, dolor sit</p>
                      <a
                        href="assets/img/events/ev-4.jpg"
                        title="Event4"
                        data-gallery="portfolio-gallery-week"
                        class="glightbox preview-link"
                        ><i class="bi bi-zoom-in"></i
                      ></a>
                    </div>
                  </div>
                  <!-- End Events Item -->
    
                  <div
                    class="col-lg-4 col-md-6 portfolio-item isotope-item filter-today"
                  >
                    <img
                      src="assets/img/events/ev-5.jpg"
                      class="img-fluid"
                      alt=""
                    />
                    <div class="portfolio-info">
                      <h4>Mass</h4>
                      <p>Lorem ipsum, dolor sit</p>
                      <a
                        href="assets/img/events/ev-5.jpg"
                        title="Event5"
                        data-gallery="portfolio-gallery-today"
                        class="glightbox preview-link"
                        ><i class="bi bi-zoom-in"></i
                      ></a>
                    </div>
                  </div>
                  <!-- End Events Item -->
    
                  <div
                    class="col-lg-4 col-md-6 portfolio-item isotope-item filter-month"
                  >
                    <img
                      src="assets/img/events/ev-6.jpg"
                      class="img-fluid"
                      alt=""
                    />
                    <div class="portfolio-info">
                      <h4>Christmas Eve</h4>
                      <p>Lorem ipsum, dolor sit</p>
                      <a
                        href="assets/img/events/ev-6.jpg"
                        title="Event6"
                        data-gallery="portfolio-gallery-month"
                        class="glightbox preview-link"
                        ><i class="bi bi-zoom-in"></i
                      ></a>
                    </div>
                  </div>
                  <!-- End Events Item -->
                </div>
                <!-- End Events Container -->
              </div>
            </div>
          </section>
          <!-- /Events Section -->
    
          <!-- Blogs -->
          <section id="Blogs" class="call-to-action section dark-background">
            <img src="assets/img/cta-bg.jpg" alt="" />
    
            <div class="container">
              <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-xl-9 text-center text-xl-start">
                  <h3>Blogs</h3>
                  <p>Check out the our barangays very own articles.</p>
                </div>
                <div class="col-xl-3 cta-btn-container text-center">
                  <a class="cta-btn align-middle" href="{{ action('App\Http\Controllers\regValidation@dbBlogs') }}"
                    >Proceed To Blogs</a
                  >
                </div>
              </div>
            </div>
          </section>
          <!-- /Blogs Section -->
    
          <!-- Team Section -->
          <section id="officials" class="team section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>OFFICIALS</h2>
            </div>
            <!-- End Section Title -->
    
            <div class="container">
              <div class="row gy-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/officials/off-1.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>Janjan Castañares</h4>
                      <span>Punong Barangay</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
    
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/officials/off-2.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>Jhunniel Esmeña</h4>
                      <span>Barangay Kagawad</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
    
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/officials/off-3.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>Audie Desuyo</h4>
                      <span>Barangay Kagawad</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
    
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/officials/off-4.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>Rolito Tarega</h4>
                      <span>Barangay Kagawad</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
    
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/officials/off-5.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>Aldwin Getuaban</h4>
                      <span>Barangay Kagawad</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
    
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/officials/off-6.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>Quitos Ruiz</h4>
                      <span>Barangay Kagawad</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
    
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/officials/off-7.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>Mario Parages</h4>
                      <span>Barangay Kagawad</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
    
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/officials/off-8.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>Amelito Abatayo</h4>
                      <span>Barangay Kagawad</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
              </div>
            </div>
          </section>
          <!-- /Team Section -->
    
          <!-- Team Section -->
          <section id="skoff" class="team section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>SK OFFICIALS</h2>
            </div>
            <!-- End Section Title -->
    
            <div class="container">
              <div class="row gy-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/skoff/sk-1.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>Jenniebert Padayao</h4>
                      <span>SK Chairman</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
    
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/skoff/sk-2.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>Jackie Plaresan</h4>
                      <span>SK Kagawad</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
    
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/skoff/sk-3.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>Jefferson Pugoy</h4>
                      <span>SK Kagawad</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
    
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/skoff/sk-4.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>Susen Sanchez</h4>
                      <span>SK Kagawad</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
    
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/skoff/sk-5.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>RJ Quinio</h4>
                      <span>SK Kagawad</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
    
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/skoff/sk-6.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>Mie Ann Rosalita</h4>
                      <span>SK Kagawad</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
    
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/skoff/sk-7.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>Dave Randolf Zafra</h4>
                      <span>SK Kagawad</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
    
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                  <div class="team-member d-flex align-items-start">
                    <div class="pic">
                      <img
                        src="assets/img/skoff/sk-8.png"
                        class="img-fluid"
                        alt=""
                      />
                    </div>
                    <div class="member-info">
                      <h4>Angel May Borinaga</h4>
                      <span>SK Kagawad</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Team Member -->
              </div>
            </div>
          </section>
          <!-- /Team Section -->
    
          <!-- Contact Section -->
          <section id="contact" class="contact section light-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Contact</h2>
            </div>
            <!-- End Section Title -->
    
            <div class="container" data-aos="fade-up" data-aos-delay="100">
              <div class="row gy-4">
                <div class="col-lg-5">
                  <div class="info-wrap">
                    <div
                      class="info-item d-flex"
                      data-aos="fade-up"
                      data-aos-delay="200"
                    >
                      <i class="bi bi-geo-alt flex-shrink-0"></i>
                      <div>
                        <h3>Address</h3>
                        <p>6046 Red Horse St, Minglanilla, Cebu</p>
                      </div>
                    </div>
                    <!-- End Info Item -->
    
                    <div
                      class="info-item d-flex"
                      data-aos="fade-up"
                      data-aos-delay="300"
                    >
                      <i class="bi bi-telephone flex-shrink-0"></i>
                      <div>
                        <h3>Call Us</h3>
                        <p>+63 123 456 7890</p>
                      </div>
                    </div>
                    <!-- End Info Item -->
    
                    <div
                      class="info-item d-flex"
                      data-aos="fade-up"
                      data-aos-delay="400"
                    >
                      <i class="bi bi-envelope flex-shrink-0"></i>
                      <div>
                        <h3>Email Us</h3>
                        <p>example@email.com</p>
                      </div>
                    </div>
                    <!-- End Info Item -->
                  </div>
                </div>
    
                <div class="col-lg-7">
                  <div class="info-wrap">
                    <iframe
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233.24769734888918!2d123.7938889941223!3d10.24304679821909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a977e2de7dd9eb%3A0x9d5be529bf8866e7!2sPoblacion%20Ward%20II%20Barangay%20Hall!5e1!3m2!1sen!2sph!4v1719578373558!5m2!1sen!2sph"
                      frameborder="0"
                      style="border: 0; width: 100%; height: 270px"
                      allowfullscreen=""
                      loading="lazy"
                      referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                  </div>
                </div>
                <!-- End Contact Form -->
              </div>
            </div>
          </section>
          <!-- /Contact Section -->
        </main>
    
        <footer id="footer" class="footer">
          <div class="container copyright text-center mt-4">
            <p>
              © <span>Copyright</span> <strong class="px-1 sitename">2024</strong>
              <span>All Rights Reserved</span>
            </p>
          </div>
        </footer>
    
        <!-- Scroll Top -->
        <a
          href="#"
          id="scroll-top"
          class="scroll-top d-flex align-items-center justify-content-center"
          ><i class="bi bi-arrow-up-short"></i
        ></a>

        {{-- MODALS --}}
          {{-- Barangay Clearance --}}
            <div class="modal fade" id="ExtralargeModal1" tabindex="-1">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Barangay Clearance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          {{-- Business Permit --}}
            <div class="modal fade" id="ExtralargeModal2" tabindex="-1">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Business Permit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          {{-- Blotter --}}
            <div class="modal fade" id="ExtralargeModal3" tabindex="-1">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Blotter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          {{-- Certification --}}
            <div class="modal fade" id="ExtralargeModal4" tabindex="-1">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Certification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
        {{-- END OF MODALS --}}

        <!-- Preloader -->
        <div id="preloader"></div>
    
        <!-- Vendor JS Files -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        {{-- <script src="assets/vendor/swiper/swiper-bundle.min.js"></script> --}}
        <script src="https://unpkg.com/swiper@latest/swiper-bundle.min.js"></script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    
        <!-- Main JS File -->
        <script src="assets/js/main.js"></script>
      </body>
</html>
