@include('layouts.headHealthWorkers')
<body>
<style>
  .sales-card {
    height: 100%;
  }

  .tab-content>.active {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .card-title {
    display: flex;
    flex-direction: column;
  }

</style>
  <!-- ======= Header ======= -->
    @include('layouts.headerHealthWorkers')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('layouts.sidebarHealthWorkers')
  <!-- End Sidebar -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="card">
          <div class="card-body" style="width: 100%!important;">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                  <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Population</button>
                  </li>

                  <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Diseases</button>
                  </li>

                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="referred-tab" data-bs-toggle="tab" data-bs-target="#bordered-referred" type="button" role="tab" aria-controls="referred" aria-selected="false">Referred</button>
                </li>
              </ul>
  
              <div class="tab-content pt-2" id="borderedTabContent">
                <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                      <!-- Population Card -->
                      <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                          <div class="card-body">
                            <h5 class="card-title">Population <span>Total</span></h5>
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                              </div>
                              <div class="ps-3">
                                <h6>{{ $totalPopulation }}</h6>
                                <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
            
                              </div>
                            </div>
                          </div>
            
                        </div>
                      </div><!-- End Population Card -->
            
                      <!-- Male Card -->
                      <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                          <div class="card-body">
                            <h5 class="card-title">Male <span>Total</span></h5>
            
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #a4c5f4; color: #012970; ">
                                <i class="bx bx-male"></i>
                              </div>
                              <div class="ps-3">
                                <h6>{{ $totalMale }}</h6>
                                <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>
            
                              </div>
                            </div>
                          </div>
            
                        </div>
                      </div><!-- End MAle Card -->
            
                      <!-- Female Card -->
                      <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card sales-card">
                          <div class="card-body">
                            <h5 class="card-title">Female <span>Total</span></h5>
            
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #FFC0CB!important; color: #d80f30!important">
                                <i class="bx bx-female"></i>
                              </div>
                              <div class="ps-3">
                                <h6>{{ $totalFemale }}</h6>
                                <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
            
                              </div>
                            </div>
            
                          </div>
                        </div>
            
                      </div><!-- End Female Card -->
                    </div>

                    <div class="card">
                      <div class="card-body">
                        <!-- Line Chart -->
                        <div id="lineChart1"></div>

                        <script>
                          document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#lineChart1"), {
                              series: [{
                                name: "Desktops",
                                data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
                              }],
                              chart: {
                                height: 350,
                                type: 'line',
                                zoom: {
                                  enabled: false
                                }
                              },
                              dataLabels: {
                                enabled: false
                              },
                              stroke: {
                                curve: 'straight'
                              },
                              grid: {
                                row: {
                                  colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                  opacity: 0.5
                                },
                              },
                              xaxis: {
                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                              }
                            }).render();
                          });
                        </script>
                        <!-- End Line Chart -->
                      </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="row">
                    <!-- Cancer Card -->
                    <div class="col-xxl-4 col-md-6 mt-4 mb-4">
                      <div class="card info-card sales-card">
                        <div class="card-body">
                          <h5 class="card-title"> Cancer <span>Total</span></h5>

                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="ri-health-book-fill"></i>
                            </div>
                            <div class="ps-3">
                              {{-- <h6>{{ $totalVoters }}</h6> --}}
                              <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                            </div>
                          </div>
                        </div>

                      </div>
                    </div><!-- End Cancer Card -->

                    <!-- Diabetes Card -->
                    <div class="col-xxl-4 col-md-6 mt-4 mb-4">
                      <div class="card info-card sales-card">
                        <div class="card-body">
                          <h5 class="card-title">Diabetes <span>Total</span></h5>

                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="ri-heart-2-fill"></i>
                            </div>
                            <div class="ps-3">
                              <h6>{{ $totalDiabetes }}</h6>
                              <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div><!-- End Diabetes Card -->
                    
                    <!-- Family Planning Card -->
                    <div class="col-xxl-4 col-md-6 mt-4 mb-4">
                      <div class="card info-card sales-card">
                        <div class="card-body">
                          <h5 class="card-title">Family Planning <span>Total</span></h5>

                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="ri-heart-add-fill"></i>
                            </div>
                            <div class="ps-3">
                              <h6>{{ $totalFamilyPlanning }}</h6>
                              <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div><!-- End Family Planning Card -->

                    <!-- Pregnancy Card -->
                    <div class="col-xxl-4 col-md-6 mt-4 mb-4">
                      <div class="card info-card sales-card">
                        <div class="card-body">
                          <h5 class="card-title">Pregnancy Cases <span>Total</span></h5>

                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="ri-hearts-fill"></i>
                            </div>
                            <div class="ps-3">
                              {{-- <h6>{{ $totalClearances }}</h6> --}}
                              <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                            </div>
                          </div>
                        </div>

                      </div>
                    </div><!-- End Pregnancy Card -->

                    <!-- TB Card -->
                    <div class="col-xxl-4 col-md-6 mt-4 mb-4">
                      <div class="card info-card sales-card">
                        <div class="card-body">
                          <h5 class="card-title">TB Cases <span>Total</span></h5>

                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="ri-lungs-fill"></i>
                            </div>
                            <div class="ps-3">
                              <h6>{{ $tb }}</h6>
                              <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                            </div>
                          </div>
                        </div>

                      </div>
                    </div><!-- End TB Card -->

                    <!-- Dengue Card -->
                    <div class="col-xxl-4 col-md-6 mt-4 mb-4">
                      <div class="card info-card sales-card">
                        <div class="card-body">
                          <h5 class="card-title">Dengue Cases <span>Total</span></h5>

                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="ri-heart-pulse-fill"></i>
                            </div>
                            <div class="ps-3">
                              <h6>{{ $dengue }}</h6>
                              <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                            </div>
                          </div>
                        </div>

                      </div>
                    </div><!-- End Dengue Card -->

                     <!-- Line Chart -->
                      <div id="lineChart"></div>

                      <script>
                        document.addEventListener("DOMContentLoaded", () => {
                          new ApexCharts(document.querySelector("#lineChart"), {
                            series: [{
                              name: "Desktops",
                              data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
                            }],
                            chart: {
                              height: 350,
                              type: 'line',
                              zoom: {
                                enabled: false
                              }
                            },
                            dataLabels: {
                              enabled: false
                            },
                            stroke: {
                              curve: 'straight'
                            },
                            grid: {
                              row: {
                                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                opacity: 0.5
                              },
                            },
                            xaxis: {
                              categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                            }
                          }).render();
                        });
                      </script>
                      <!-- End Line Chart -->
                  </div>
                </div>

                <div class="tab-pane fade" id="bordered-referred" role="tabpanel" aria-labelledby="referred-tab">
                  <div class="row">
                    <!-- RHU Card -->
                    <div class="col-xxl-4 col-md-6 mt-4 mb-4">
                      <div class="card info-card sales-card">
                        <div class="card-body">
                          <h5 class="card-title"> RHU <span>Total</span></h5>

                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bx bx-health"></i>
                            </div>
                            <div class="ps-3">
                              <h6>{{ $totalRhu }}</h6>
                              <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div><!-- End RHU Card -->

                    <!-- Destrict Card -->
                    <div class="col-xxl-4 col-md-6 mt-4 mb-4">
                      <div class="card info-card sales-card">
                        <div class="card-body">
                          <h5 class="card-title">Destrict <span>Total</span></h5>

                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class=" ri-hospital-fill"></i>
                            </div>
                            <div class="ps-3">
                              <h6>{{ $totalDes }}</h6>
                              <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div><!-- End Destrict Card -->
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>



         <!-- Right side columns -->
         <div class="col-lg-4">

          <!-- Private Announcement -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Private Announcement <span>| Today</span></h5>
              <div class="news" id="schedules-container">

              </div><!-- End sidebar recent posts-->

            </div>
          </div>
          <!-- End Private Announcement -->

          <!-- Public Announcement -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Public Announcement <span id="currentMonthSpan">| Today</span></h5>
              <div class="news" id="publicSchedules-container">

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End Public Announcement -->

        </div><!-- End Right side columns -->
        </section>




  </main><!-- End #main -->

  @include('layouts.footerHealthWorkers')
</body>

</html>