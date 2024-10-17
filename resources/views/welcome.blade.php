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
            <img src="assets/img/cta-bg.jpg" class="hero-img-bg"alt="" />
            <div class="container">
              <div class="row gy-4">
                <div
                  class="col-lg-7 order-2 order-lg-1 d-flex flex-column justify-content-center"
                  data-aos="zoom-out"
                >
                  <h1>Poblacion Ward II, Minglanilla, Cebu</h1>
                  <p>Barangay Information Management System</p>
                </div>
                <div
                  class="col-lg-5 order-1 order-lg-2 hero-img"
                  data-aos="zoom-out"
                  data-aos-delay="200"
                >
                  <img
                    src="assets/img/ward2logo.png"
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
                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-month">
                    <a href="assets/img/events/ev-1.jpg" data-glightbox="title: Feeding Program <br> Date: January 1, 2000; description: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.;" class="glightbox preview-link">
                      <img src="assets/img/events/ev-1.jpg" class="img-fluid" alt=""/>
                    </a>
                    <div class="portfolio-info">
                      <h4>Feeding Program</h4>
                      <p>Date: January 1, 2000</p>
                    </div>
                  </div>
                  <!-- End Events Item -->

                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-week">
                    <a href="assets/img/events/ev-2.jpg" data-glightbox="title: Libreng Tuli <br> Date: January 1, 2000; description: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.;" class="glightbox preview-link">
                      <img src="assets/img/events/ev-2.jpg" class="img-fluid" alt=""/>
                    </a>
                    <div class="portfolio-info">
                    <h4>Libreng Tuli</h4>
                    <p>Date: January 1, 2000</p>
                  </div>
                  </div>
                  <!-- End Events Item -->
    
                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-week">
                    <a href="assets/img/events/ev-3.jpg" data-glightbox="title: Meeting <br> Date: January 1, 2000; description: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.;" class="glightbox preview-link">
                      <img src="assets/img/events/ev-3.jpg" class="img-fluid" alt=""/>
                    </a>
                    <div class="portfolio-info">
                      <h4>Meeting</h4>
                      <p>Date: January 1, 2000</p>
                    </div>
                  </div>
                  <!-- End Events Item -->
    
                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-today">
                    <a href="assets/img/events/ev-4.jpg" data-glightbox="title: Parade <br> Date: January 1, 2000; description: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.;" class="glightbox preview-link">
                      <img src="assets/img/events/ev-4.jpg" class="img-fluid" alt=""/>
                    </a>
                    <div class="portfolio-info">
                      <h4>Parade</h4>
                      <p>Date: January 1, 2000</p>
                    </div>
                  </div>
                  <!-- End Events Item -->
    
                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-month">
                    <a href="assets/img/events/ev-5.jpg" data-glightbox="title: Fiesta <br> Date: January 1, 2000; description: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.;" class="glightbox preview-link">
                      <img src="assets/img/events/ev-5.jpg" class="img-fluid" alt=""/>
                    </a>
                    <div class="portfolio-info">
                      <h4>Fiesta</h4>
                      <p>Date: January 1, 2000</p>
                    </div>
                  </div>
                  <!-- End Events Item -->
    
                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-month">
                    <a href="assets/img/events/ev-6.jpg" data-glightbox="title: Christmas Eve <br> Date: January 1, 2000; description: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.;" class="glightbox preview-link">
                      <img src="assets/img/events/ev-6.jpg" class="img-fluid" alt=""/>
                    </a>
                    <div class="portfolio-info">
                      <h4>Christmas Eve</h4>
                      <p>Date: January 1, 2000</p>
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
                  <form method="POST" action="{{ route('regValidation.saveBrgyClearance')}}" class="brgyClearance" id="brgy_clearanceMult">
                    @csrf
                    <div class="modal-body">
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label for="tcode1" class="form-label">Transaction Code</label>
                          <input type="text" class="form-control" id="tcode1" name="tcode1" readonly>
                          <span class="text-danger error-text tcode1_error"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="fName1" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fName1" name="fName1">
                            <span class="text-danger error-text fName1_error"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="mName1" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="mName1" name="mName1">
                            <span class="text-danger error-text mName1_error"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="lName1" class="form-label">Family Name</label>
                            <input type="text" class="form-control" id="lName1" name="lName1">
                            <span class="text-danger error-text lName1_error"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="suffix1" class="form-label">Suffix (Leave It If None)</label>
                            <select name="suffix1" id="suffix1"  class="form-control">
                                <option value="">N/A</option>
                                <option value="1">I</option>
                                <option value="2">II</option>
                                <option value="3">III</option>
                                <option value="4">IV</option>
                                <option value="5">V</option>
                                <option value="jr">Jr.</option>
                                <option value="sr">Sr.</option>
                            </select>
                            <span class="text-danger error-text suffix1_error"></span>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="bDate1" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="bDate1" name="bDate1">
                            <span class="text-danger error-text bDate1_error"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="clearancePurpose" class="form-label">Purpose</label>
                            <input type="text" class="form-control" id="clearancePurpose" name="clearancePurpose">
                            <span class="text-danger error-text clearancePurpose_error"></span>
                        </div>
        
                        <div class="col-md-6">
                            <label for="dateIssued1" class="form-label">Date Issued</label>
                            <input type="date" class="form-control" id="dateIssued1" name="dateIssued1" readonly>
                            <span class="text-danger error-text dateIssued1_error"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="pickUp1" class="form-label">Pick Up Date</label>
                            <input type="date" class="form-control" id="pickUp1" name="pickUp1">
                            <span class="text-danger error-text pickUp1_error"></span>
                        </div>
                      </div>
                    </div>
                    <div class="alertCon">
                      <div id="alert-container"></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
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
                    <form method="POST" action="{{ route('regValidation.saveBusinessClearance')}}" class="brgyClearance" id="brgy_clearance">
                      @csrf 
                        <div class="row g-3">
                          <div class="col-md-6">
                              <label for="tcode2" class="form-label">Transaction Code</label>
                              <input type="text" class="form-control" id="tcode2" name="tcode2" readonly>
                              <span class="text-danger error-text tcode2_error"></span>
                          </div>
                          <div class="col-md-6">
                              <label for="fName2" class="form-label">First Name</label>
                              <input type="text" class="form-control" id="fName2" name="fName2">
                              <span class="text-danger error-text fName2_error"></span>
                          </div>
                          <div class="col-md-6">
                              <label for="mName2" class="form-label">Middle Name</label>
                              <input type="text" class="form-control" id="mName2" name="mName2">
                              <span class="text-danger error-text mName2_error"></span>
                          </div>
                          <div class="col-md-6">
                              <label for="lName2" class="form-label">Family Name</label>
                              <input type="text" class="form-control" id="lName2" name="lName2">
                              <span class="text-danger error-text lName2_error"></span>
                          </div>
                          <div class="col-md-6">
                              <label for="suffix2" class="form-label">Suffix (Leave It If None)</label>
                              <select name="suffix2" id="suffix2" class="form-control">
                                  <option value="">N/A</option>
                                  <option value="1">I</option>
                                  <option value="2">II</option>
                                  <option value="3">III</option>
                                  <option value="4">IV</option>
                                  <option value="5">V</option>
                                  <option value="Jr.">Jr.</option>
                              </select>
                              <span class="text-danger error-text suffix2_error"></span>
                          </div>
                          <div class="col-md-6">
                              <label for="bDate2" class="form-label">Birth Date</label>
                              <input type="date" class="form-control" id="bDate2" name="bDate2">
                              <span class="text-danger error-text bDate2_error"></span>
                          </div>
                          <div class="col-md-6">
                            <label for="businessName" class="form-label">Business Name</label>
                            <input type="text" class="form-control" id="businessName" name="businessName">
                            <span class="text-danger error-text businessName_error"></span>
                          </div>
          
                          <div class="col-md-6">
                              <label for="businessAddress" class="form-label">Business Address</label>
                              <input type="text" class="form-control" id="businessAddress" name="businessAddress">
                              <span class="text-danger error-text businessAddress_error"></span>
                          </div>
                          
                          <div class="col-md-6">
                              <label for="businessType" class="form-label">Type of Business</label>
                              <input type="text" class="form-control" id="businessType" name="businessType">
                              <span class="text-danger error-text businessType_error"></span>
                          </div>
          
                          <div class="col-md-6">
                              <label for="dateIssued2" class="form-label">Date Issued</label>
                              <input type="date" class="form-control" id="dateIssued2" name="dateIssued2" readonly>
                              <span class="text-danger error-text dateIssued2_error"></span>
                          </div>
                          <div class="col-md-6">
                              <label for="pickUp2" class="form-label">Pick Up Date</label>
                              <input type="date" class="form-control" id="pickUp2" name="pickUp2">
                              <span class="text-danger error-text pickUp2_error"></span>
                          </div>
                          <div class="col-md-6">
                            <label for="businessNature" class="form-label">Nature of Business Activities</label>
                            <textarea name="businessNature" id="businessNature" class="form-control"></textarea>
                            <span class="text-danger error-text businessNature_error"></span>
                          </div>
                        </div>
                        <div class="alertCon">
                          <div id="alert-container1"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
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
                    <form method="POST" action="{{ route('regValidation.saveComplaints')}}" class="certificate" id="complaint">
                      @csrf
                      <div class="row g-3">
                          <div class="col-md-6">
                            <label for="tcode4" class="form-label">Transaction Code</label>
                            <input type="text" class="form-control" id="tcode4" name="tcode4" readonly>
                            <span class="text-danger error-text tcode4_error"></span>
                          </div>
                          <div class="col-md-6">
                            <label for="fName4" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fName4" name="fName4">
                            <span class="text-danger error-text fName4_error"></span>
                          </div>
                          <div class="col-md-6">
                            <label for="mName4" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="mName4" name="mName4">
                            <span class="text-danger error-text mName4_error"></span>
                          </div>
                          <div class="col-md-6">
                            <label for="lName3" class="form-label">Family Name</label>
                            <input type="text" class="form-control" id="lName4" name="lName4">
                            <span class="text-danger error-text lName4_error"></span>
                          </div>
                          <div class="col-md-6">
                            <label for="suffix4" class="form-label">Suffix (Leave It If None)</label>
                            <select name="suffix4" id="suffix4"  class="form-control">
                                <option value="">N/A</option>
                                <option value="1">I</option>
                                <option value="2">II</option>
                                <option value="3">III</option>
                                <option value="4">IV</option>
                                <option value="5">V</option>
                                <option value="Jr.">Jr.</option>
                            </select>
                            <span class="text-danger error-text suffix4_error"></span>
                          </div>
                          <div class="col-md-6">
                            <label for="bDate4" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="bDate4" name="bDate4">
                            <span class="text-danger error-text bDate4_error"></span>
                        </div>
                        <div class="col-md-6">
                          <label for="respondents" class="form-label">Respondent's Name (The one whom you complained about)</label>
                          <input type="text" class="form-control" id="respondents" name="respondents" >
                          <span class="text-danger error-text respondents_error"></span>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="complaint" class="form-label">Complaints</label>
                            <textarea name="complaint" id="complaint" class="form-control"></textarea>
                            <span class="text-danger error-text complaint_error"></span>
                        </div>
        
                        <div class="col-md-6">
                            <label for="resolution" class="form-label">Desired Resolution</label>
                            <textarea name="resolution" id="resolution" class="form-control"></textarea>
                            <span class="text-danger error-text resolution_error"></span>
                        </div>
        
                        <div class="col-md-6">
                            <label for="dateIssued4" class="form-label">Date Made</label>
                            <input type="date" class="form-control" id="dateIssued4" name="dateIssued4" readonly>
                        </div>
                      </div>  
                  </div>
                  <div class="alertCon">
                    <div id="alert-container2"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </form>
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
                        <form method="POST" action="{{ route('regValidation.saveCertificate')}}" class="certificate" id="certificate">
                          <div class="row g-3">
                            <div class="col-md-6">
                                <label for="tcode3" class="form-label">Transaction Code</label>
                                <input type="text" class="form-control" id="tcode3" name="tcode3" readonly>
                                <span class="text-danger error-text tcode3_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="fName3" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fName3" name="fName3">
                                <span class="text-danger error-text fName3_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="mName3" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="mName3" name="mName3">
                                <span class="text-danger error-text mName3_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="lName3" class="form-label">Family Name</label>
                                <input type="text" class="form-control" id="lName3" name="lName3">
                                <span class="text-danger error-text lName3_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="suffix3" class="form-label">Suffix (Leave It If None)</label>
                                <select name="suffix3" id="suffix3"  class="form-control">
                                    <option value="">N/A</option>
                                    <option value="1">I</option>
                                    <option value="2">II</option>
                                    <option value="3">III</option>
                                    <option value="4">IV</option>
                                    <option value="5">V</option>
                                    <option value="Jr.">Jr.</option>
                                </select>
                                <span class="text-danger error-text suffix3_error"></span>
                            </div>
            
                            <div class="col-md-6">
                                <label for="bDate3" class="form-label">Birth Date</label>
                                <input type="date" class="form-control" id="bDate3" name="bDate3">
                                <span class="text-danger error-text bDate3_error"></span>
                            </div>

                            <div class="col-md-6">
                              <label for="purposeCertificate3" class="form-label">Purpose</label>
                              <input type="text" class="form-control" id="purposeCertificate3" name="purposeCertificate3" >
                              <span class="text-danger error-text purposeCertificate3_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="dateIssued3" class="form-label">Date Issued</label>
                                <input type="date" class="form-control" id="dateIssued3" name="dateIssued3" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="pickUp3" class="form-label">Pick Up Date</label>
                                <input type="date" class="form-control" id="pickUp3" name="pickUp3">
                                <span class="text-danger error-text pickUp3_error"></span>
                            </div>
                          </div>
                      </div>
                      <div class="alertCon">
                        <div id="alert-container3"></div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script>
            function generateTrackingCode() {
                var code = '';
                for (var i = 0; i < 6; i++) {
                    // Generate 3 random letters
                    var letters = String.fromCharCode(Math.floor(Math.random() * 26) + 65) +
                                  String.fromCharCode(Math.floor(Math.random() * 26) + 65) +
                                  String.fromCharCode(Math.floor(Math.random() * 26) + 65);
                    // Generate 2 random numbers
                    var numbers = ('0' + Math.floor(Math.random() * 100)).slice(-2);
                    // Concatenate letters, numbers, and hyphen
                    code += letters + numbers + '-';
                }
                // Remove the last hyphen
                code = code.slice(0, -1);
                // Convert code to uppercase
                code = code.toUpperCase();
                return code;
            }

            // Set the generated tracking code to the input field
            document.getElementById('tcode1').value = generateTrackingCode();
            document.getElementById('tcode2').value = generateTrackingCode();
            document.getElementById('tcode3').value = generateTrackingCode();
            document.getElementById('tcode4').value = generateTrackingCode();


            function setCurrentDate() {
                var currentDate = new Date().toISOString().slice(0, 10);
                document.getElementById('dateIssued1').value = currentDate;
                document.getElementById('dateIssued2').value = currentDate;
                document.getElementById('dateIssued3').value = currentDate;
                document.getElementById('dateIssued4').value = currentDate;
            }


            // Set current date and tracking code when the page fully loads
            window.addEventListener('load', function() {
              setCurrentDate();
              document.getElementById('tcode1').value = generateTrackingCode();
              document.getElementById('tcode2').value = generateTrackingCode();
              document.getElementById('tcode3').value = generateTrackingCode();
              document.getElementById('tcode4').value = generateTrackingCode();
            });
        </script>
      </body>
</html>
