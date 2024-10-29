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

  .titleCard {
    width: 100%;
    display: flex;
    justify-content: center;
    padding: 10px;
  }

  .dropdown {
    display: flex;
    justify-content: flex-end;
  }

  /* Style for the 3 dots icon */
  .dots-icon {
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
      padding: 8px;
      position: relative;
  }

  /* Style for the dropdown menu */
  .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      top: 40px;
      background-color: #f9f9f9;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      min-width: 120px;
  }

  .dropdown-content a {
      color: black;
      padding: 8px 16px;
      text-decoration: none;
      display: block;
  }

  .dropdown-content a:hover {
      background-color: #ddd;
  }

  /* Show the dropdown content when .show is added */
  .show {
      display: block;
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
                {{-- POPULATION --}}
                <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                      <!-- Population Card -->
                        <!-- Card with onclick event to open modal -->
                        <div class="col-xxl-4 col-md-6">
                          <div class="card info-card sales-card" onclick="showPopulationModal()">
                              <div class="card-body">
                                  <h5 class="card-title">Population <span>Total</span></h5>
                                  <div class="d-flex align-items-center">
                                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                          <i class="bi bi-people"></i>
                                      </div>
                                      <div class="ps-3">
                                          <h6>{{ $totalPopulation }}</h6>

                                          @if ($populationChange >= 0)
                                              <span class="text-success small pt-1 fw-bold">{{ $populationChange }}%</span> 
                                              <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-up-square" style="color: #19a987"></i></span>
                                          @else
                                              <span class="text-danger small pt-1 fw-bold">{{ abs($populationChange) }}%</span> 
                                              <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-down-square" style="color: #ae344a"></i></span>
                                          @endif
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>

                        <!-- Modal for Population Details -->
                        <div class="modal fade" id="populationModal" tabindex="-1" aria-labelledby="populationModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="populationModalLabel">Population Details (Monthly Comparison)</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <canvas id="populationChart"></canvas>
                                  </div>
                              </div>
                          </div>
                        </div>
                      <!-- End Population Card -->
            
                      <!-- Male Card -->
                        {{-- MALE POPULATION CARD --}}
                          <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card" onclick="showPopMaleModal()">
                                <div class="card-body">
                                    <h5 class="card-title">Male <span>Total</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #a4c5f4; color: #012970;">
                                            <i class="bx bx-male"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalMale }}</h6>
                                            @if ($populationMaleChange >= 0)
                                                <span class="text-success small pt-1 fw-bold">{{ $populationMaleChange }}%</span>
                                                <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-up-square" style="color: #19a987"></i></span>
                                            @else
                                                <span class="text-danger small pt-1 fw-bold">{{ abs($populationMaleChange) }}%</span>
                                                <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-down-square" style="color: #ae344a"></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        {{-- MALE POPULATION MODAL --}}
                          <div class="modal fade" id="popMaleModal" tabindex="-1" aria-labelledby="popMaleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="popMaleModalLabel">Male Population Details (Monthly Comparison)</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <canvas id="populationChartMale"></canvas>
                                    </div>
                                </div>
                            </div>
                          </div>
                      <!-- End MAle Card -->
            
                      <!-- Female Card -->
                        {{-- FEMALE POPULATION CARD --}}
                          <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card" onclick="showPopFemaleModal()">
                                <div class="card-body">
                                    <h5 class="card-title">Female <span>Total</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #FFC0CB; color: #d80f30;">
                                            <i class="bx bx-female"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalFemale }}</h6>
                                            @if ($populationFemaleChange >= 0)
                                                <span class="text-success small pt-1 fw-bold">{{ $populationFemaleChange }}%</span>
                                                <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-up-square" style="color: #19a987"></i></span>
                                            @else
                                                <span class="text-danger small pt-1 fw-bold">{{ abs($populationFemaleChange) }}%</span>
                                                <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-down-square" style="color: #ae344a"></i></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        {{-- FEMALE POPULATION MODAL --}}
                          <div class="modal fade" id="popFemaleModal" tabindex="-1" aria-labelledby="popFemaleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="popFemaleModalLabel">Female Population Details (Monthly Comparison)</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <canvas id="populationChartFemale"></canvas>
                                    </div>
                                </div>
                            </div>
                          </div>
                      <!-- End Female Card -->
                    </div>

                    {{-- GRAPH --}}
                      <div class="card">
                        <div class="card-body">
                          <div class="titleCard">
                            <h4>Population as of {{ date('Y') }}</h4>
                          </div>
                          <!-- Line Chart -->
                          <div class="dropdown">
                            <button class="dots-icon" onclick="toggleDropdown()">⋮</button>
                            <div class="dropdown-content" id="dataDropdown">
                                <a href="#" onclick="loadYearlyData()">Yearly Data</a>
                                <a href="#" onclick="loadMonthlyData()">Monthly Data</a>
                            </div>
                          </div>
                          <canvas id="wholePopulationChart"></canvas>
                          <!-- End Line Chart -->
                        </div>
                      </div>

                </div>
                {{-- DISEASES --}}
                <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="row">
                    <!-- Cancer Card -->
                    <div class="col-xxl-4 col-md-6 mt-4 mb-4">
                      <div class="card info-card sales-card">
                        <div class="card-body">
                          <h5 class="card-title"> Service <span>Total</span></h5>

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
                {{-- REFERRAL --}}
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // population
      function showPopulationModal() {
          // Initialize Bootstrap modal
          const modal = new bootstrap.Modal(document.getElementById('populationModal'));
          modal.show();

          // Destroy the existing chart instance if it exists
          if (window.populationChart && typeof window.populationChart.destroy === 'function') {
              window.populationChart.destroy();
          }

          // Fetch current and previous year data
          const currentYearData = @json($currentYearData);
          const previousYearData = @json($previousYearData);

          // Get the canvas context
          const ctx = document.getElementById('populationChart').getContext('2d');

          // Create a new Chart instance
          window.populationChart = new Chart(ctx, {
              type: 'line',
              data: {
                  labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                  datasets: [
                      {
                          label: '{{ $currentYear }} Population',
                          data: currentYearData,
                          borderColor: 'blue',
                          backgroundColor: 'rgba(0, 0, 255, 0.1)',
                          fill: true
                      },
                      {
                          label: '{{ $previousYear }} Population',
                          data: previousYearData,
                          borderColor: 'red',
                          backgroundColor: 'rgba(255, 0, 0, 0.1)',
                          fill: true
                      }
                  ]
              },
              options: {
                  responsive: true,
                  plugins: {
                      tooltip: {
                          callbacks: {
                              label: function(context) {
                                  return `Registrations: ${context.raw}`;
                              }
                          }
                      },
                      legend: {
                          position: 'top'
                      }
                  },
                  scales: {
                      y: {
                          beginAtZero: true,
                          title: {
                              display: true,
                              text: 'Population Count'
                          }
                      },
                      x: {
                          title: {
                              display: true,
                              text: 'Months'
                          }
                      }
                  }
              }
          });
      }
    // Male population modal and chart
    function showPopMaleModal() {
        const maleModal = new bootstrap.Modal(document.getElementById('popMaleModal'));
        maleModal.show();
        loadPopulationChart('populationChartMale', @json($currentYearMaleData), @json($previousYearMaleData), 'Male Population');
    }

    // Female population modal and chart
    function showPopFemaleModal() {
        const femaleModal = new bootstrap.Modal(document.getElementById('popFemaleModal'));
        femaleModal.show();
        loadPopulationChart('populationChartFemale', @json($currentYearFemaleData), @json($previousYearFemaleData), 'Female Population');
    }

    // Function to load the population chart
    function loadPopulationChart(canvasId, currentYearData, previousYearData, label) {
        const ctx = document.getElementById(canvasId).getContext('2d');

        // Check if the chart instance already exists and is of type 'Chart'
        if (window[canvasId] instanceof Chart) {
            window[canvasId].destroy(); // Safely destroy the existing chart
        }

        // Create a new chart instance and store it in window[canvasId]
        window[canvasId] = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        label: `Current Year ${label}`,
                        data: currentYearData,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        fill: true,
                    },
                    {
                        label: `Previous Year ${label}`,
                        data: previousYearData,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: true,
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }




    let wholePopulationChart;

    function loadYearlyData() {
        const ctx = document.getElementById('wholePopulationChart').getContext('2d');
        const years = @json($years);
        const yearlyData = @json($yearlyData);

        if (wholePopulationChart) {
          wholePopulationChart.destroy();
        }

        wholePopulationChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: years,
                datasets: [{
                    label: 'Population',
                    data: yearlyData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Population'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Year'
                        }
                    }
                }
            }
        });
    }

    function loadMonthlyData() {
        const ctx = document.getElementById('wholePopulationChart').getContext('2d');
        const currentYearData = @json($currentYearData);
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        if (wholePopulationChart) {
          wholePopulationChart.destroy();
        }

        wholePopulationChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Population',
                    data: currentYearData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Population'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    }
                }
            }
        });
    }

    function toggleDropdown() {
        document.getElementById("dataDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dots-icon')) {
            const dropdowns = document.getElementsByClassName("dropdown-content");
            for (let i = 0; i < dropdowns.length; i++) {
                const openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

    // Load yearly data by default
    loadYearlyData();

</script>

  
</body>

</html>