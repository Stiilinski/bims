<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BIMS - Blogs</title>
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link rel="stylesheet" href="assets/css/blogs.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div id="topContainer">
      <div class="top-container-content">
        <div class="container mt-4">
          <div class="row">
            <div class="text-end">
              <i
                class="bi bi-x-lg fs-1 custom-button-white"
                id="closeTopContainer"
              ></i>
            </div>
          </div>
          <div class="col-lg-10 mt-2">
            <div class="card mb-4 no-border-card">
              <div class="card-body">
                <div class="input-group border-bb">
                  <input
                    class="form-control borderless"
                    type="text"
                    placeholder="Search the Barangay's Blog"
                  />
                  <i class="bi bi-search fs-1 custom-button-white"></i>
                </div>
              </div>
            </div>

            <div class="card mb-4 no-border-card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <b style="font-weight: 1000; color: white;">Explore Blogs</b>
                    <ul class="list-unstyled mb-0 top-container-link">
                      <li>
                        <a href="#!" class="top-container-link">Web Design</a>
                      </li>
                      <li><a href="#!" class="top-container-link">HTML</a></li>
                      <li>
                        <a href="#!" class="top-container-link">Freebies</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-sm-3">
                    <b style="font-weight: 1000; color: white;">Popular Topics</b>
                    <ul class="list-unstyled mb-0">
                      <li>
                        <a href="#!" class="top-container-link">Events</a>
                      </li>
                      <li>
                        <a href="#!" class="top-container-link">Leadership</a>
                      </li>
                      <li>
                        <a href="#!" class="top-container-link">Strategies</a>
                      </li>
                      <li>
                        <a href="#!" class="top-container-link">Innovation</a>
                      </li>
                      <li>
                        <a href="#!" class="top-container-link"
                          >Work-life Balance</a
                        >
                      </li>
                      <li>
                        <a href="#!" class="top-container-link">All Topics</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-sm-3">
                    <b style="font-weight: 1000; color: white;">Explore The Barangay</b>
                    <ul class="list-unstyled mb-0 top-container-link">
                      <li>
                        <a href="#!" class="top-container-link">Officials</a>
                      </li>
                      <li>
                        <a href="#!" class="top-container-link">Ordinances</a>
                      </li>
                      <li>
                        <a href="#!" class="top-container-link"
                          >Barangay Ordinance</a
                        >
                      </li>
                      <li>
                        <a href="#!" class="top-container-link">Updates</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-sm-3">
                    <ul class="list-unstyled mb-0">
                      <li><i class="bi bi-facebook fs-3 custom-button-white"></i></li>
                      <li>
                        <i class="bi bi-twitter-x fs-3 custom-button-white"></i>
                      </li>
                      <li><i class="bi bi-linkedin fs-3 custom-button-white"></i></li>
                      <li>
                        <i class="bi bi-instagram fs-3 custom-button-white"></i>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="main-container">
      <nav class="navbar navbar-expand-lg mb-4 border-b">
        <div class="container">
          <a href="index.html">
            <img
              src="assets/img/logo.png"
              style="height: 75px; padding-right: 10px"
              alt=""
            />
          </a>
          <a class="navbar-brand">
            <span style="font-weight: 1000; color: white">Barangay</span>
            <br />
            <span style="font-weight: 1000; color: white">Blogs</span>
          </a>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <i
                class="bi bi-list fs-1 custom-button-white"
                id="toggleContainerBtn"
              ></i>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container">
        <div class="row">
          <h1><b>The Latest News</b></h1>
        </div>
      </div>

      <div class="video-container">
        <video autoplay muted loop>
          <source src="assets/img/blue wave.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <a href="#!"
                  ><img
                    class="card-img-top"
                    src="assets/img/blog1.png"
                    alt="..."
                /></a>
                <div class="card-body">
                  <h5><b>CURRENT</b> ISSUE</h5>
                  <h1><b>September 4, 2024</b></h1>
                  <h6><b>Oplan Kontra Dengue: Activation of Anti-Dengue Surveillance</b></h6>
                  <p class="card-text card-text-fixed">
                    Sugod ugma, September 5, ipatuman nato ang Executive Order No. 12 Series of 2024 diin matag alas 4 sa hapon, atong i-activate ang anti-dengue surveillance through simultaneous search and destroy operations in all puroks in all barangays.
                  </p>
                  <a class="btn btn-secondary" href="{{ action('App\Http\Controllers\regValidation@dbBlogsRead') }}">Read more →</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      

      <div class="container mt-4">
        <div class="row">
          <h1><b>Read Past Blogs and News</b></h1>
        </div>

        <div class="row mt-4">
          <div class="col-lg-12">
              <!-- other blogs -->
              <div class="card mb-4">
                <a href="#!"
                  ><img
                    class="card-img-top"
                    src="assets/img/blog2.png"
                    alt="..."
                /></a>
                <div class="card-body">
                  <h1><b>September 2, 2024</b></h1>
                  <h6><b>Overseas and Local Voter’s Registration:</b>The due date</h6>
                  <p class="card-text card-text-fixed">
                    Hanggang September 30, 2024 na lang ang local at overseas voter registration. Bisitahin ang official COMELEC Facebook Page para sa available na schedule ng satellite registration. Maaari ring i-click ang link na ito para sa mga address ng OEOs sa buong bansa.
                  </p>
                  <a class="btn btn-secondary" href="#!">Read more →</a>
                </div>
              </div>

              <div class="card mb-4">
                <a href="#!"
                  ><img
                    class="card-img-top"
                    src="assets/img/blog3.png"
                    alt="..."
                /></a>
                <div class="card-body">
                  <h1><b>August 27, 2024</b></h1>
                  <h6><b>Sugat Kabanhawan Festival: Winner takes cash prizes.</b></h6>
                  <p class="card-text card-text-fixed">
                    Big congratulations to Kyra Rei Hopkins sa iyang kadaugan as Pasigarbo sa Sugbo Festival Queen 2nd runner-up! For representing the Sugat Kabanhawan Festival well, Kyra received a generous cash prize, gift packs from GCash, and a WiFi router from PLDT.
                  </p>
                  <a class="btn btn-secondary" href="#!">Read more →</a>
                </div>
              </div>

              <div class="card mb-4">
                <a href="#!"
                  ><img
                    class="card-img-top"
                    src="assets/img/blog4.png"
                    alt="..."
                /></a>
                <div class="card-body">
                  <h1><b>July 2, 2024</b></h1>
                  <h6><b>Awarding ceremony for the six barangays in the municipality of Minglanilla</b></h6>
                  <p class="card-text card-text-fixed">
                    This activity significantly impacts the community by reinforcing the importance of maintaining a drug-free environment. It acknowledges the hard work and dedication of local leaders and residents in combating drug-related issues. The recognition serves as a motivation for other barangays to strive for a drug-free status, fostering a safer and healthier community for all.
                  </p>
                  <a class="btn btn-secondary" href="#!">Read more →</a>
                </div>
              </div>
          </div>
        </div>

        <div class="mt-4 black-bar-top">
          <b>Recommended For You</b>
        </div>
        <div class="row mt-4">
          <div class="col-lg-3">
            <div class="container mb-4">
              <img src="assets/img/blog5.png" alt="" class="rec-img"><br>
              <a href="" class="black-link"><b>Alice Gou:</b> arrested in Tangerang City</a>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="container mb-4">
              <img src="assets/img/blog6.png" alt="" class="rec-img"><br>
              <a href="" class="black-link"><b>Marcos:</b> Quiboloy's conditions 'immaterial</a>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="container mb-4">
              <img src="assets/img/blog7.png" alt="" class="rec-img"><br>
              <a href="" class="black-link"><b>SC rolls out 'Justice Zones' to combat online abuse of kids in Northern Mindanao</b></a>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="container mb-4">
              <img src="assets/img/blog8.png" alt="" class="rec-img"><br>
              <a href="" class="black-link"><b>FACT CHECK:</b> NO order to arrest Sara, remove OVP's 2025 budget</a>
            </div>
          </div>
        </div>
      </div>
      <footer class="py-5 bg-dark">
        <div class="container">
          <p class="m-0 text-center text-white">
            Copyright <b>2024</b> All Rights Reserved
          </p>
        </div>
      </footer>
    </div>

    <!-- Add this in your body section -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/blogs.js"></script>
  </body>
</html>
