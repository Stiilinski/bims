@include('layouts.head')
<style>
    .container {
      max-width: 100%!important;
      margin-top: 80px; 
      padding-bottom:10px; 
    }

    .toggle-sidebar-btn {
        display: none;
    }

    .card-footer {
      height: 0px!important; 
      opacity: 0; 
      visibility: hidden; 
      pointer-events: none; 
      overflow: hidden; 
      transition: height 0.3s ease, opacity 0.3s ease, visibility 0s 0.3s;
    }

    .info-card:hover .card-footer {
      height: 70px!important; 
      opacity: 1; 
      visibility: visible;
      pointer-events: auto;
      transition: height 0.3s ease, opacity 0.3s ease, visibility 0s 0s; 
    }
</style>
<body>

  <!-- ======= Header ======= -->
    @include('layouts.header')
  <!-- End Header -->


  <div id="container" class="container">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row" style="padding-left: 10px;">
            <div class="card">
              <div class="card-body" style="width: 100%!important;">
                  <!-- Bordered Tabs -->
                  <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                      <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Population</button>
                      </li>
    
                      <li class="nav-item" role="presentation">
                          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Health</button>
                      </li>
    
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="referred-tab" data-bs-toggle="tab" data-bs-target="#bordered-referred" type="button" role="tab" aria-controls="referred" aria-selected="false">Referred</button>
                    </li>
                  </ul>
      
                  <div class="tab-content pt-2" id="borderedTabContent">
                    {{-- POPULATION --}}
                      <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                            <!-- Population Card -->
                            <div class="col-xxl-4 col-md-6">
                              <div class="card info-card sales-card">
                                <div class="card-body">
                                  <h5 class="card-title">Population <span>| Total</span></h5>
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
                                <div class="card-footer d-flex" style="justify-content: flex-end;">
                                    <button class="btn btn-primary" id="modalReport">Show</button>
                                </div>
                              </div>
                            </div>
                            <!-- End Population Card -->

                            <!-- Male Card -->
                            <div class="col-xxl-4 col-md-6">
                              <div class="card info-card revenue-card">
                                <div class="card-body">
                                  <h5 class="card-title">Male <span>| Total</span></h5>

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
                                <div class="card-footer d-flex" style="justify-content: flex-end;">
                                  <button class="btn btn-primary" id="modalReport">Show</button>
                                </div>
                              </div>
                            </div>
                            <!-- End MAle Card -->

                            <!-- Female Card -->
                            <div class="col-xxl-4 col-xl-12">
                              <div class="card info-card customers-card">
                                <div class="card-body">
                                  <h5 class="card-title">Female <span>| Total</span></h5>

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
                                <div class="card-footer d-flex" style="justify-content: flex-end;">
                                  <button class="btn btn-primary" id="modalReport">Show</button>
                                </div>
                              </div>
                            </div>
                            <!-- End Female Card -->

                            <!-- Voters Card -->
                            <div class="col-xxl-4 col-md-6">
                              <div class="card info-card sales-card">
                                <div class="card-body">
                                  <h5 class="card-title">Voters <span>| Total</span></h5>

                                  <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                      <i class="bx bxs-upvote"></i>
                                    </div>
                                    <div class="ps-3">
                                      <h6>{{ $totalVoters }}</h6>
                                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                  </div>
                                </div>
                                <div class="card-footer d-flex" style="justify-content: flex-end;">
                                  <button class="btn btn-primary" id="modalReport">Show</button>
                                </div>

                              </div>
                            </div>
                            <!-- End Voters Card -->

                            <!-- Non Voters Card -->
                            <div class="col-xxl-4 col-md-6">
                              <div class="card info-card sales-card">
                                <div class="card-body">
                                  <h5 class="card-title">Non Voters <span>| Total</span></h5>

                                  <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                      <i class="bx bxs-downvote"></i>
                                    </div>
                                    <div class="ps-3">
                                      <h6>{{ $totalNonVoters }}</h6>
                                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                  </div>
                                </div>
                                <div class="card-footer d-flex" style="justify-content: flex-end;">
                                  <button class="btn btn-primary" id="modalReport">Show</button>
                                </div>

                              </div>
                            </div>
                            <!-- End Non Voters Card -->
                          </div>
                      </div>
                    {{-- CERTIFICATES --}}
                      <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <!-- Certificate Card -->
                            <div class="col-xxl-4 col-md-6">
                              <div class="card info-card sales-card">
                                <div class="card-body">
                                  <h5 class="card-title">Certificate <span>| Total</span></h5>

                                  <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                      <i class="bx bxs-certification"></i>
                                    </div>
                                    <div class="ps-3">
                                      <h6>{{ $totalCertificates }}</h6>
                                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                  </div>
                                </div>
                                <div class="card-footer d-flex" style="justify-content: flex-end;">
                                  <button class="btn btn-primary" id="modalReport">Show</button>
                                </div>

                              </div>
                            </div>
                            <!-- End Certificate Card -->

                            <!-- Clearance Card -->
                            <div class="col-xxl-4 col-md-6">
                              <div class="card info-card sales-card">
                                <div class="card-body">
                                  <h5 class="card-title">Clearance <span>| Total</span></h5>

                                  <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                      <i class="bx bxs-file-blank"></i>
                                    </div>
                                    <div class="ps-3">
                                      <h6>{{ $totalClearances }}</h6>
                                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                  </div>
                                </div>
                                <div class="card-footer d-flex" style="justify-content: flex-end;">
                                  <button class="btn btn-primary" id="modalReport">Show</button>
                                </div>

                              </div>
                            </div>
                            <!-- End Clearance Card -->

                            <!-- Permit Card -->
                            <div class="col-xxl-4 col-md-6">
                              <div class="card info-card sales-card">
                                <div class="card-body">
                                  <h5 class="card-title">Permit <span>| Total</span></h5>

                                  <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                      <i class="bx bxs-file"></i>
                                    </div>
                                    <div class="ps-3">
                                      <h6>{{ $totalBusinessPermits }}</h6>
                                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                  </div>
                                </div>
                                <div class="card-footer d-flex" style="justify-content: flex-end;">
                                  <button class="btn btn-primary" id="modalReport">Show</button>
                                </div>

                              </div>
                            </div>
                            <!-- End Permit Card -->

                            <!-- Blotter Card -->
                            <div class="col-xxl-4 col-md-6">
                              <div class="card info-card sales-card">
                                <div class="card-body">
                                  <h5 class="card-title">Blotter <span>| Total</span></h5>

                                  <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                      <i class="bx bxs-note"></i>
                                    </div>
                                    <div class="ps-3">
                                      <h6>{{ $totalBlotters }}</h6>
                                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                  </div>
                                </div>
                                <div class="card-footer d-flex" style="justify-content: flex-end;">
                                  <button class="btn btn-primary" id="modalReport">Show</button>
                                </div>

                              </div>
                            </div>
                            <!-- End Blotter Card -->
                        </div>
                      </div>
                    {{-- AGE GROUP --}}
                      <div class="tab-pane fade" id="bordered-referred" role="tabpanel" aria-labelledby="referred-tab">
                        <div class="row">
                          <!-- 0-59 Months Card -->
                          <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                              <div class="card-body">
                                <h5 class="card-title">Age Group: 0-59 Months <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bxs-child"></i>
                                  </div>
                                  <div class="ps-3">
                                    <h6>{{ $ageGroupData['0-59_months']['total'] }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Male: {{ $ageGroupData['0-59_months']['male'] }}</span><br>
                                    <span class="text-muted small pt-2 ps-1">Female: {{ $ageGroupData['0-59_months']['female'] }}</span>
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer d-flex" style="justify-content: flex-end;">
                                <button class="btn btn-primary" id="modalReport">Show</button>
                              </div>
                            </div>
                          </div>
                          <!-- End 0-59 Months Card -->

                          <!-- 5-12 Years Card -->
                          <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                              <div class="card-body">
                                <h5 class="card-title">Age Group: 5-12 Years <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bxs-child"></i>
                                  </div>
                                  <div class="ps-3">
                                    <h6>{{ $ageGroupData['5-12_years']['total'] }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Male: {{ $ageGroupData['5-12_years']['male'] }}</span><br>
                                    <span class="text-muted small pt-2 ps-1">Female: {{ $ageGroupData['5-12_years']['female'] }}</span>
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer d-flex" style="justify-content: flex-end;">
                                <button class="btn btn-primary" id="modalReport">Show</button>
                              </div>
                            </div>
                          </div>
                          <!-- End 5-12 Years Card -->

                          <!-- 13-17 Years Card -->
                          <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                              <div class="card-body">
                                <h5 class="card-title">Age Group: 13-17 Years <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bxs-child"></i>
                                  </div>
                                  <div class="ps-3">
                                    <h6>{{ $ageGroupData['13-17_years']['total'] }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Male: {{ $ageGroupData['13-17_years']['male'] }}</span><br>
                                    <span class="text-muted small pt-2 ps-1">Female: {{ $ageGroupData['13-17_years']['female'] }}</span>
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer d-flex" style="justify-content: flex-end;">
                                <button class="btn btn-primary" id="modalReport">Show</button>
                              </div>
                            </div>
                          </div>
                          <!-- End 13-17 Years Card -->

                          <!-- 18-30 Years Card -->
                          <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                              <div class="card-body">
                                <h5 class="card-title">Age Group: 18-30 Years <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bxs-child"></i>
                                  </div>
                                  <div class="ps-3">
                                    <h6>{{ $ageGroupData['18-30_years']['total'] }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Male: {{ $ageGroupData['18-30_years']['male'] }}</span><br>
                                    <span class="text-muted small pt-2 ps-1">Female: {{ $ageGroupData['18-30_years']['female'] }}</span>
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer d-flex" style="justify-content: flex-end;">
                                <button class="btn btn-primary" id="modalReport">Show</button>
                              </div>
                            </div>
                          </div>
                          <!-- End 18-30  Years Card -->

                          <!-- 31-45_years Card -->
                          <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                              <div class="card-body">
                                <h5 class="card-title">Age Group: 31-45 Years <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bxs-child"></i>
                                  </div>
                                  <div class="ps-3">
                                    <h6>{{ $ageGroupData['31-45_years']['total'] }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Male: {{ $ageGroupData['31-45_years']['male'] }}</span><br>
                                    <span class="text-muted small pt-2 ps-1">Female: {{ $ageGroupData['31-45_years']['female'] }}</span>
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer d-flex" style="justify-content: flex-end;">
                                <button class="btn btn-primary" id="modalReport">Show</button>
                              </div>
                            </div>
                          </div>
                          <!-- End 31-45_yearsCard -->

                          <!-- 45-65_years Card -->
                          <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                              <div class="card-body">
                                <h5 class="card-title">Age Group: 45 - 65 Years <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bxs-child"></i>
                                  </div>
                                  <div class="ps-3">
                                    <h6>{{ $ageGroupData['45-65_years']['total'] }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Male: {{ $ageGroupData['45-65_years']['male'] }}</span><br>
                                    <span class="text-muted small pt-2 ps-1">Female: {{ $ageGroupData['45-65_years']['female'] }}</span>
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer d-flex" style="justify-content: flex-end;">
                                <button class="btn btn-primary" id="modalReport">Show</button>
                              </div>
                            </div>
                          </div>
                          <!-- End 31-45_yearsCard -->

                          <!-- 66 above years Card -->
                          <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                              <div class="card-body">
                                <h5 class="card-title">Age Group: 66 Above Years <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bxs-child"></i>
                                  </div>
                                  <div class="ps-3">
                                    <h6>{{ $ageGroupData['66_above']['total'] }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Male: {{ $ageGroupData['66_above']['male'] }}</span><br>
                                    <span class="text-muted small pt-2 ps-1">Female: {{ $ageGroupData['66_above']['female'] }}</span>
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer d-flex" style="justify-content: flex-end;">
                                <button class="btn btn-primary" id="modalReport">Show</button>
                              </div>
                            </div>
                          </div>
                          <!-- 66 above years Card -->
                        </div>
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
              </div>
              <!-- End Public Announcement -->
          </div><!-- End Right side columns -->
    </section>




  </div><!-- End #main -->

  @include('layouts.footer')
</body>

</html>