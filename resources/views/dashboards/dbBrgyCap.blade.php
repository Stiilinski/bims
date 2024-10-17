@include('layouts.head')

<body>

  <!-- ======= Header ======= -->
    @include('layouts.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('layouts.sidebar')
  <!-- End Sidebar -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
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

            </div>
          </div><!-- End Population Card -->

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

            </div>
          </div><!-- End MAle Card -->

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
            </div>

          </div><!-- End Female Card -->

          
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

            </div>
          </div><!-- End Voters Card -->

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

            </div>
          </div><!-- End Non Voters Card -->
          

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

            </div>
          </div><!-- End Certificate Card -->

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

            </div>
          </div><!-- End Clearance Card -->

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

            </div>
          </div><!-- End Permit Card -->

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

            </div>
          </div><!-- End Blotter Card -->

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
            </div>
          </div><!-- End 0-59 Months Card -->

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
            </div>
          </div><!-- End 5-12 Years Card -->

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
            </div>
          </div><!-- End 13-17 Years Card -->

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
            </div>
          </div><!-- End 18-30  Years Card -->

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
            </div>
          </div><!-- End 31-45_yearsCard -->

          <!-- 31-45_years Card -->
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
            </div>
          </div><!-- End 31-45_yearsCard -->

          <!-- 31-45_years Card -->
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
            </div>
          </div><!-- End 31-45_yearsCard -->

          <!-- Add more cards for other age groups as needed -->


          <!-- Documents Issuance  Reports -->
            <div class="col-12">
              <div class="card">
                  <div class="filter">
                      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                          <li class="dropdown-header text-start">
                              <h6>Filter</h6>
                          </li>
                          <li><a class="dropdown-item" href="{{ url('/dashboards/dbBrgyCap?filter=today') }}">Today</a></li>
                          <li><a class="dropdown-item" href="{{ url('/dashboards/dbBrgyCap?filter=monthly') }}">This Month</a></li>
                          <li><a class="dropdown-item" href="{{ url('/dashboards/dbBrgyCap?filter=yearly') }}">This Year</a></li>
                      </ul>
                  </div>
          
                  <div class="card-body">
                      <h5 class="card-title">Document Reports <span>/{{ ucfirst($filter) }}</span></h5>
          
                      <!-- Line Chart -->
                      <div id="reportsChart"></div>
          
                      <script>
                          document.addEventListener("DOMContentLoaded", () => {
                              const filter = "{{ $filter }}";
                              const seriesData = [];
                              const yearlyData = @json($yearlyData);
                              const years = yearlyData.map(data => data.year);
                              const hours = ['8AM', '9AM', '10AM', '11AM', '12PM', '1PM', '2PM', '3PM', '4PM', '5PM', '6PM', '7PM'];
          
                              if (filter === 'today') {
                                  seriesData.push({
                                      name: 'Blotters',
                                      data: @json($todayBlotters)
                                  }, {
                                      name: 'Certificates',
                                      data: @json($todayCertificates)
                                  }, {
                                      name: 'Clearances',
                                      data: @json($todayClearances)
                                  }, {
                                      name: 'Business Permits',
                                      data: @json($todayBusinessPermits)
                                  });
                              } else if (filter === 'monthly') {
                                  seriesData.push({
                                      name: 'Blotters',
                                      data: @json($monthlyBlotters)
                                  }, {
                                      name: 'Certificates',
                                      data: @json($monthlyCertificates)
                                  }, {
                                      name: 'Clearances',
                                      data: @json($monthlyClearances)
                                  }, {
                                      name: 'Business Permits',
                                      data: @json($monthlyBusinessPermits)
                                  });
                              } else if (filter === 'yearly') {
                                  seriesData.push({
                                      name: 'Blotters',
                                      data: yearlyData.map(data => data.blotters)
                                  }, {
                                      name: 'Certificates',
                                      data: yearlyData.map(data => data.certificates)
                                  }, {
                                      name: 'Clearances',
                                      data: yearlyData.map(data => data.clearances)
                                  }, {
                                      name: 'Business Permits',
                                      data: yearlyData.map(data => data.businessPermits)
                                  });
                              } else {
                                  seriesData.push({
                                      name: 'Blotters',
                                      data: [{{ $totalBlotters ?? 0 }}]
                                  }, {
                                      name: 'Certificates',
                                      data: [{{ $totalCertificates ?? 0 }}]
                                  }, {
                                      name: 'Clearances',
                                      data: [{{ $totalClearances ?? 0 }}]
                                  }, {
                                      name: 'Business Permits',
                                      data: [{{ $totalBusinessPermits ?? 0 }}]
                                  });
                              }
          
                              new ApexCharts(document.querySelector("#reportsChart"), {
                                  series: seriesData,
                                  chart: {
                                      height: 350,
                                      type: 'area',
                                      toolbar: {
                                          show: false
                                      }
                                  },
                                  markers: {
                                      size: 4
                                  },
                                  colors: ['#4154f1', '#2eca6a', '#ff771d', '#ff4560'],
                                  fill: {
                                      type: "gradient",
                                      gradient: {
                                          shadeIntensity: 1,
                                          opacityFrom: 0.3,
                                          opacityTo: 0.4,
                                          stops: [0, 90, 100]
                                      }
                                  },
                                  dataLabels: {
                                      enabled: false
                                  },
                                  stroke: {
                                      curve: 'smooth',
                                      width: 2
                                  },
                                  xaxis: {
                                      type: 'category',
                                      categories: filter === 'today' ? hours :
                                          (filter === 'monthly' ? 
                                              ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] :
                                              (filter === 'yearly' ? years : [filter, 'Today']))
                                  },
                                  tooltip: {
                                      x: {
                                          format: 'dd/MM/yy HH:mm'
                                      }
                                  }
                              }).render();
                          });
                      </script>
                      <!-- End Line Chart -->
                  </div>
              </div>
            </div>
        <!-- End Reports -->
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

  @include('layouts.footer')
</body>

</html>