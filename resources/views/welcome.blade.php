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

    .schedule-img {
      height: 200px;
      object-fit: cover;
      width: 100%; /* Ensures the image scales with the container */
    }
    #resultContainer {
      overflow-x: scroll;
    }
  </style>
  {{-- <link href="assets/css/style.css" rel="stylesheet"> --}}
    </head>
    <body class="index-page">
        <header id="header" class="header d-flex align-items-center fixed-top">
          <div
            class="container-fluid container-xl position-relative d-flex align-items-center"
          >
            <a href="/" class="logo d-flex align-items-center me-auto">
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
                <li><a href="#transaction">Trace Transaction</a></li>
                <li class="dropdown">
                  <a href="#"
                    ><span>Ordinances and Resolution</span>
                    <i class="bi bi-chevron-down toggle-dropdown"></i
                  ></a>
                  <ul>
                    <li class="dropdown">
                      <a href="#"
                        ><span>Ordinances</span>
                        <i class="bi bi-chevron-down toggle-dropdown"></i
                      ></a>
                      <ul>
                        <li><a href="https://drive.google.com/file/d/1gSUWIPPmytMVuN7Vhlnw31imcl8LeJ0s/view?usp=sharing">Ordinance 1</a></li>
                        <li><a href="https://drive.google.com/file/d/1iCuoyc-yFVWbMGFbU_PaUQpBG71ztRW9/view?usp=sharing">Ordinance 2</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#"
                        ><span>Resolutions</span>
                        <i class="bi bi-chevron-down toggle-dropdown"></i
                      ></a>
                      <ul>
                        <li><a href="https://drive.google.com/file/d/1SYisXqyULBzkVc-YbkX_XqWluxF2JU2m/view?usp=sharing">Resolution 2</a></li>
                        <li><a href="https://drive.google.com/file/d/17i-QqaXkuz307dgHPiBYwO3N7jckFUV-/view?usp=sharing">Resolution 3</a></li>
                        <li><a href="https://drive.google.com/file/d/1H0AsFTlBEyTtoLsYcA_UaBWg7pVg56qI/view?usp=sharing">Resolution 4</a></li>
                        <li><a href="https://drive.google.com/file/d/1onDG7EyOhneM1_dnM4P7Dw0Z2OqcvUJf/view?usp=sharing">Resolution 5</a></li>
                        <li><a href="https://drive.google.com/file/d/1ZusbIxvK8M3mjChHmIiANwr9NT1K7t51/view?usp=sharing">Resolution 6</a></li>
                        <li><a href="https://drive.google.com/file/d/1WpMGIw2wQt8xR2kYKEzhMz48hSeXBJAN/view?usp=sharing">Resolution 7</a></li>
                        <li><a href="https://drive.google.com/file/d/1tHwQ3t4JCPqXZI6MkpPqQw6hDRXyA7Vg/view?usp=sharing">Resolution 8</a></li>
                        <li><a href="https://drive.google.com/file/d/1s5NKYNzxP_fnTMJYpSk7t1cyFpFPbmKB/view?usp=sharing">Resolution 9</a></li>
                        <li><a href="https://drive.google.com/file/d/1M0CHEBPIJDMwBY-0kBwK6-GoZXRJkGjM/view?usp=sharing">Resolution 10</a></li>
                      </ul>
                    </li>
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
            <div class="container section-title" data-aos="fade-up">
                <h2>Events</h2>
            </div>
            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">This Month</li>
                        <li data-filter=".filter-today">Today</li>
                        <li data-filter=".filter-week">This Upcoming Week</li>
                    </ul>
        
                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                      @foreach($schedules as $schedule)
                          @php
                              $scheduleDate = \Carbon\Carbon::parse($schedule->sched_date);
                              $currentDate = \Carbon\Carbon::now();
                              $currentYear = $currentDate->year;
                              $currentMonth = $currentDate->month;
                      
                              // Start of today and end of today for the 'Today' filter
                              $startOfToday = $currentDate->copy()->startOfDay();
                              $endOfToday = $currentDate->copy()->endOfDay();
                      
                              // Start of the current week (week starts from Sunday)
                              $startOfWeek = $currentDate->copy()->startOfWeek()->startOfDay();
                              $endOfWeek = $currentDate->copy()->endOfWeek()->endOfDay();
                      
                              // Start and end of the current month (ignoring time)
                              $startOfMonth = $currentDate->copy()->startOfMonth()->startOfDay();
                              $endOfMonth = $currentDate->copy()->endOfMonth()->endOfDay();
                      
                              // Today to the next 7 days for 'This Week' filter
                              $sevenDaysFromNow = $currentDate->copy()->addDays(7)->endOfDay();
                          @endphp
                      
                          @if ($scheduleDate->year === $currentYear && $scheduleDate->month === $currentMonth) <!-- Display only events from the current year -->
                              @php
                                  // Initialize filter class variable
                                  $filterClass = '';
                      
                                  // Check if it's today
                                  if ($scheduleDate->isToday()) {
                                      $filterClass = 'filter-today'; // Today filter
                                  }
                                  // Check if it's within the next 7 days (This Week filter)
                                  elseif ($scheduleDate->between($startOfToday, $sevenDaysFromNow)) {
                                      $filterClass = 'filter-week'; // This Week filter (from today onwards, 7 days forward)
                                  }
                                  // Check if it's within the current month (but only if it's not already covered by Today or This Week)
                                  elseif ($scheduleDate->year === $currentYear && $scheduleDate->month === $currentMonth) {
                                    if ($filterClass === '') {  // Only apply "This Month" filter if no other filter was set
                                        $filterClass = 'filter-month'; // This Month filter
                                    }
                                  }
                              @endphp
                      
                              <!-- Render the portfolio item with the appropriate filter class -->
                              <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{ $filterClass }}">
                                  <a href="/{{ str_replace('public/', '', $schedule->sched_picture) }}" 
                                      data-glightbox="title: {{ $schedule->sched_title }} <br> Date: {{ $scheduleDate->format('F j, Y') }}; description: {{ $schedule->sched_description }}"
                                      class="glightbox preview-link">
                                      <img src="{{ asset(str_replace('public/', '', $schedule->sched_picture)) }}" 
                                          class="img-fluid" alt="" style="height: 200px; width:400px; object-fit: cover;"/>
                                  </a>
                                  <div class="portfolio-info">
                                      <h4>{{ $schedule->sched_title }}</h4>
                                      <p>Date: {{ $scheduleDate->format('F j, Y') }}</p>
                                  </div>
                              </div>
                          @endif
                      @endforeach
                  </div>
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
          <section id="officials" class="testimonials section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                  {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                      "delay": 4000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                      "el": ".swiper-pagination",
                      "type": "bullets",
                      "clickable": true
                    }
                  }
                </script>
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <div class="team section">
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
                
                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
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
                
                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
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
                
                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
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
                
                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
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
                
                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
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
                
                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
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
                      </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="team section">
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
              
                          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
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
              
                          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
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
              
                          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
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
              
                          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
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
              
                          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
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
              
                          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
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
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="team section">
                      <!-- Section Title -->
                      <div class="container section-title" data-aos="fade-up">
                        <h2>HEALTH RELATED OFFICIALS</h2>
                      </div>
                      <!-- End Section Title -->
              
                      <div class="container">
                        <div class="row gy-4">
                          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="team-member d-flex align-items-start">
                              <div class="pic">
                                <img
                                  src="assets/img/ppofficials/pp9.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Maria Michelle A. Villarin</h4>
                                <span>Barangay Nutrition Scholar</span>
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
                                  src="assets/img/ppofficials/pp12.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Virgie P. Lopez</h4>
                                <span>Barangay Health Worker</span>
                                <div class="social">
                                  <a href=""><i class="bi bi-twitter-x"></i></a>
                                  <a href=""><i class="bi bi-facebook"></i></a>
                                  <a href=""><i class="bi bi-instagram"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- End Team Member -->
              
                          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="team-member d-flex align-items-start">
                              <div class="pic">
                                <img
                                  src="assets/img/BARANGAY WARD II.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Charlotte C. Sellote</h4>
                                <span>Barangay Health Worker</span>
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
                                  src="assets/img/BARANGAY WARD II.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Rubbie T. Balansag</h4>
                                <span>Barangay Health Worker</span>
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
                                  src="assets/img/ppofficials/pp11.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Lovely E. Mesitas</h4>
                                <span>Barangay Health Worker</span>
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
                                  src="assets/img/ppofficials/pp8.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Joan B. Coca</h4>
                                <span>Barangay Health Worker</span>
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
                                  src="assets/img/ppofficials/pp7.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Jennifer O. Arroyo</h4>
                                <span>Barangay Health Worker</span>
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
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="team section">
                      <!-- Section Title -->
                      <div class="container section-title" data-aos="fade-up">
                        <h2>BARANGAY TANODS</h2>
                      </div>
                      <!-- End Section Title -->
              
                      <div class="container">
                        <div class="row gy-4">
                          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="team-member d-flex align-items-start">
                              <div class="pic">
                                <img
                                  src="assets/img/ppofficials/pp4.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Jan Philip A. Tarega</h4>
                                <span>Tanod</span>
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
                                  src="assets/img/ppofficials/pp3.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Dariel P. Alivo</h4>
                                <span>Tanod</span>
                                <div class="social">
                                  <a href=""><i class="bi bi-twitter-x"></i></a>
                                  <a href=""><i class="bi bi-facebook"></i></a>
                                  <a href=""><i class="bi bi-instagram"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- End Team Member -->
              
                          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="team-member d-flex align-items-start">
                              <div class="pic">
                                <img
                                  src="assets/img/ppofficials/pp10.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Richard Rays A Encina</h4>
                                <span>Tanod</span>
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
                                  src="assets/img/ppofficials/pp1.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Alberto B. Mangubat</h4>
                                <span>Tanod</span>
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
                                  src="assets/img/BARANGAY WARD II.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Kieth Ivan C. Oberes</h4>
                                <span>Tanod</span>
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
                                  src="assets/img/ppofficials/pp5.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Marjun P. Aulestia</h4>
                                <span>Tanod</span>
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
                                  src="assets/img/BARANGAY WARD II.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Marlon T. Unabia</h4>
                                <span>Tanod</span>
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
                                  src="assets/img/BARANGAY WARD II.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Marloun C. Lapay</h4>
                                <span>Tanod</span>
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
                                  src="assets/img/BARANGAY WARD II.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Deogracias Pardillo</h4>
                                <span>Tanod</span>
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
                                  src="assets/img/BARANGAY WARD II.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Alven Abendan</h4>
                                <span>Tanod</span>
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
                                  src="assets/img/BARANGAY WARD II.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Ram Panimdim</h4>
                                <span>Tanod</span>
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
                                  src="assets/img/BARANGAY WARD II.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>George Lacia</h4>
                                <span>Tanod</span>
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
                                  src="assets/img/BARANGAY WARD II.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Rosaleo Boholst</h4>
                                <span>Tanod</span>
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
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="team section">
                      <!-- Section Title -->
                      <div class="container section-title" data-aos="fade-up">
                        <h2>BARANGAY OFFICERS</h2>
                      </div>
                      <!-- End Section Title -->
              
                      <div class="container">
                        <div class="row gy-4">
                          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="team-member d-flex align-items-start">
                              <div class="pic">
                                <img
                                  src="assets/img/ppofficials/pp14.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Gracebell M. Flores</h4>
                                <span>Brgy. Secretary</span>
                                <div class="social">
                                  <a href=""><i class="bi bi-twitter-x"></i></a>
                                  <a href=""><i class="bi bi-facebook"></i></a>
                                  <a href=""><i class="bi bi-instagram"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- End Team Member -->
              
                          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="team-member d-flex align-items-start">
                              <div class="pic">
                                <img
                                  src="assets/img/ppofficials/pp13.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Lianne Grace C. Padayao</h4>
                                <span>Brgy. Treasurer</span>
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
                                  src="assets/img/ppofficials/pp2.png"
                                  class="img-fluid"
                                  alt=""
                                />
                              </div>
                              <div class="member-info">
                                <h4>Cherrybille A. Encina</h4>
                                <span>Focal Person</span>
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
                    </div>
                  </div>
                </div>
                <div class="swiper-pagination"></div>
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

          {{-- Trace Transation --}}
          <section id="transaction" class="testimonials section">
            <div class="container d-flex" style="gap:15px; flex-direction:column;">
              <div class="container section-title" data-aos="fade-up">
                <h2>TRACK REQUESTED TRANSACTION</h2>
              </div>
              <div class="greetings">
                  <span class="trackDesc">Please input your unique transaction code below to check the current status and progress of your request. This code will provide you with real-time updates on the processing of your transaction. Thank you for choosing our service, and we look forward to assisting you further!</span>
              </div>
              <div class="traces">
                  <form action="{{ route('traceTransaction') }}" method="post" class="traceCon d-flex" style="flex-direction: column; gap:20px;">
                      @csrf
                      <div class="row g-3"></div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="transactionCode" name="transactionCode" placeholder="Input Transaction Code Here...">
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-primary" style="background-color: #f25af0">SEARCH</button>
                        </div>
                  </form>
              </div>
              <div id="resultContainer"></div>
            </div>
          </section>
          {{-- /Trace Transaction --}}
        </main>
    
        <footer id="footer" class="footer section light-background">
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
                              <option value="N/A">N/A</option>
                              <option value="I">I</option>
                              <option value="II">II</option>
                              <option value="III">III</option>
                              <option value="IV">IV</option>
                              <option value="V">V</option>
                              <option value="Jr.">Jr.</option>
                              <option value="Sr.">Sr.</option>
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
                                <option value="N/A">N/A</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                                <option value="Jr.">Jr.</option>
                                <option value="Sr.">Sr.</option>
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
                    <form method="POST" action="{{ route('regValidation.saveComplaints')}}" class="complaint" id="complaint">
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
                              <option value="N/A">N/A</option>
                              <option value="I">I</option>
                              <option value="II">II</option>
                              <option value="III">III</option>
                              <option value="IV">IV</option>
                              <option value="V">V</option>
                              <option value="Jr.">Jr.</option>
                              <option value="Sr.">Sr.</option>
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
                                      <option value="N/A">N/A</option>
                                      <option value="I">I</option>
                                      <option value="II">II</option>
                                      <option value="III">III</option>
                                      <option value="IV">IV</option>
                                      <option value="V">V</option>
                                      <option value="Jr.">Jr.</option>
                                      <option value="Sr.">Sr.</option>
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
                            <button type="submit" class="btn btn-primary">Save changes</button>
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

            // Trace Tansaction
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelector('.traceCon').addEventListener('submit', function(e) {
                    e.preventDefault(); // Prevent the default form submission

                    const transactionCode = document.getElementById('transactionCode').value;
                    const token = document.querySelector('input[name="_token"]').value;

                    fetch('{{ route('traceTransaction') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({ transactionCode: transactionCode })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Response Data:', data); // Log the response data for debugging

                        // Handle the response data
                        let resultContainer = document.getElementById('resultContainer');
                        resultContainer.innerHTML = ''; // Clear previous results

                        if (data.result) {
                            let tableHTML = '';
                            if (data.type === 'blotter') {
                                tableHTML = `
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Complainants</th>
                                                <th>Respondents</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                ${data.result.blotter_status === 'pending' ? '<th>Action</th>' : ''}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>${data.result.blotter_id}</td>
                                                <td>${data.result.res_fname} ${data.result.res_mname} ${data.result.res_lname}</td>
                                                <td>${data.result.blotter_respondents}</td>
                                                <td>${data.result.blotter_complaintMade}</td>
                                                <td>${data.result.blotter_status}</td>
                                                ${data.result.blotter_status === 'pending' ? `<td><button type="button" class="btn btn-danger" onclick="cancelBlotter(${data.result.blotter_id})">Cancel</button></td>` : ''}
                                            </tr>
                                        </tbody>
                                    </table>
                                `;
                            } else if (data.type === 'certificate') {
                                tableHTML = `
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Full Name</th>
                                                <th>Age</th>
                                                <th>Purok</th>
                                                <th>Type</th>
                                                <th>Purpose</th>
                                                <th>Status</th>
                                                ${data.result.certStatus === 'pending' ? '<th>Action</th>' : ''}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>${data.result.id}</td>
                                                <td>${data.result.res_fname} ${data.result.res_mname} ${data.result.res_lname}</td>
                                                <td>${calculateAge(data.result.res_bdate)}</td>
                                                <td>${data.result.res_purok}</td>
                                                <td>${data.result.cert_type}</td>
                                                <td>${data.result.cert_purpose}</td>
                                                <td>${data.result.certStatus}</td>
                                                ${data.result.certStatus === 'pending' ? `<td><button type="button" class="btn btn-danger" onclick="cancelCertificate(${data.result.id})">Cancel</button></td>` : ''}
                                            </tr>
                                        </tbody>
                                    </table>
                                `;
                            } else if (data.type === 'clearance') {
                                tableHTML = `
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Full Name</th>
                                                <th>Age</th>
                                                <th>Purok</th>
                                                <th>Status</th>
                                                <th>Purpose</th>
                                                ${data.result.bcl_status === 'pending' ? '<th>Action</th>' : ''}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>${data.result.bcl_id}</td>
                                                <td>${data.result.res_fname} ${data.result.res_mname} ${data.result.res_lname}</td>
                                                <td>${calculateAge(data.result.res_bdate)}</td>
                                                <td>${data.result.res_purok}</td>
                                                <td>${data.result.bcl_status}</td>
                                                <td>${data.result.bcl_purpose}</td>
                                                ${data.result.bcl_status === 'pending' ? `<td><button type="button" class="btn btn-danger" onclick="cancelClearance(${data.result.bcl_id})">Cancel</button></td>` : ''}
                                            </tr>
                                        </tbody>
                                    </table>
                                `;
                            } else if (data.type === 'business') {
                                tableHTML = `
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Full Name</th>
                                                <th>Age</th>
                                                <th>Purok</th>
                                                <th>Business Name</th>
                                                <th>Business Address</th>
                                                <th>Pick Up Date</th>
                                                <th>Status</th>
                                                ${data.result.bc_status === 'pending' ? '<th>Action</th>' : ''}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>${data.result.id}</td>
                                                <td>${data.result.res_fname} ${data.result.res_mname} ${data.result.res_lname}</td>
                                                <td>${calculateAge(data.result.res_bdate)}</td>
                                                <td>${data.result.res_purok}</td>
                                                <td>${data.result.bc_businessName}</td>
                                                <td>${data.result.bc_businessAddress}</td>
                                                <td>${data.result.bc_pickUpDate}</td>
                                                <td>${data.result.bc_status}</td>
                                                ${data.result.bc_status === 'pending' ? `<td><button type="button" class="btn btn-danger" onclick="cancelBusiness(${data.result.id})">Cancel</button></td>` : ''}
                                            </tr>
                                        </tbody>
                                    </table>
                                `;
                            }
                            resultContainer.innerHTML = tableHTML;
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching transaction data:', error);
                    });
                });

                function calculateAge(birthdate) {
                    const birthDate = new Date(birthdate);
                    const today = new Date();
                    let age = today.getFullYear() - birthDate.getFullYear();
                    const monthDifference = today.getMonth() - birthDate.getMonth();
                    if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                        age--;
                    }
                    return age;
                }

                window.cancelBlotter = function(id) {
                    sendCancellationRequest('{{ route('cancelBlotter') }}', id);
                };

                window.cancelCertificate = function(id) {
                    sendCancellationRequest('{{ route('cancelCertificate') }}', id);
                };

                window.cancelClearance = function(id) {
                    sendCancellationRequest('{{ route('cancelClearance') }}', id);
                };

                window.cancelBusiness = function(id) {
                    sendCancellationRequest('{{ route('cancelBusiness') }}', id);
                };

                function sendCancellationRequest(url, id) {
                    const token = document.querySelector('input[name="_token"]').value;

                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({ id: id })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if (data.message) {
                            alert(data.message);
                            // Optionally, refresh the data or update the UI to reflect the change
                        } else if (data.error) {
                            alert(data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error cancelling transaction:', error);
                    });
                }
            });

            

        </script>
      </body>
</html>
