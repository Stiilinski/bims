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

    .custom-modal-width {
        max-width: 95%; 
        width: 95%;
    }

    .card-body {
      padding: 10px;
    }

@media print {
    /* Set page size and margins */
    @page {
        size: portrait; /* Adjust for portrait mode */
        margin: 0mm;     /* Remove all margins */
    }

    /* Hide everything on the page except the modal */
    body * {
        visibility: hidden !important; 
        background-color: #fff;/* Hide all elements on the page */
    }

    /* Ensure only the modal content is visible */
    #populationModal, #populationModal * {
        visibility: visible !important; /* Make modal visible */
        box-shadow:none;
        background-color: #fff;
    }

    .labelTitle {
      visibility: visible!important;
    }

    /* Style the modal to take up the entire page */
    #populationModal {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: visible;
        background-color: #fff; 
    }

    /* Adjust card layout for print */
    .modal-content {
        width: 100%;
        max-width: none; /* Make the modal content take full width */
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        border: none;
        background-color: #fff; 
    }

    /* Make sure modal content fits correctly on the page */
    .card {
        width: 100%;  /* Ensure cards fill the page width */
        margin: 0;    /* Remove margins for the print view */
        padding: 20;   /* Adjust padding */
        background-color: #fff; /* Ensure background is white */
    }

    .card * {
      font-size: 10px;
    }

    /* Hide unnecessary elements such as headers, footers, and buttons */
    .modal-header, .modal-footer {
        display: none !important;
    }

    /* Optionally, remove background color from text elements to avoid page breaks */
    .card-body {
        padding: 10px!important;
        background-color: #fff;
    }

    .card-body h6 {
        font-size: 14px; /* Adjust font size for better print formatting */
    }

    /* Adjust other nested elements as needed */
    .card-body table {
        width: 100%;
    }

    .card-body table, .card-body th, .card-body td {
        border: 1px solid black; /* Add border to table for print */
    }

    .card-body th, .card-body td {
        padding: 5px;
        text-align: left;
    }

    #populationComparisonChart {
      width: 100%!important;
      height: 250px!important;
    }

    .col-md-4 {
      width: 250px!important;
    }

    .reportSummary {
      font-size: 10px!important;
    }
}

</style>
<body>

  <!-- ======= Header ======= -->
    @include('layouts.header')
  <!-- End Header -->
  @include('layouts.sidebarCap')

  <main id="main" class="main">

    <div class="pagetitle d-flex" style="justify-content: space-between; align-items:center;">
      <h1>Population Report</h1>
      <div class="btnArea">
        <button type="button" class="btn btn-primary" id="population-report-btn">Show Population Report</button>
      </div>
    </div>

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row" style="padding-left: 10px;">
            <div class="card">
              <div class="card-body" style="width: 100%!important;">
                  <div class="tab-content pt-2" id="borderedTabContent">
                    {{-- POPULATION --}}
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
                                
                              </div>
                            </div>
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
                                

                              </div>
                            </div>
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
                                

                              </div>
                            </div>
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
                                

                              </div>
                            </div>
                          </div>


                        </div>
                      </div>
                      <!-- End Non Voters Card -->
                    </div>

                    {{-- CERTIFICATES --}}
                      {{-- <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
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
                                      

                                    </div>
                                  </div>
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
                                      

                                    </div>
                                  </div>
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
                                      

                                    </div>
                                  </div>
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
                                      

                                    </div>
                                  </div>
                                </div>


                              </div>
                            </div>
                            <!-- End Blotter Card -->
                        </div>
                      </div> --}}
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
  </main>


      {{-- MODALS REPORT --}}
      <div class="modal fade" id="populationModal" tabindex="-1" aria-labelledby="populationModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-modal-width">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="populationModalLabel">Population Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <strong class="labelTitle" style="visibility: hidden;">Population Report</strong>
              {{-- GRAPH POPULATION --}}
              <div class="card d-flex" style="justify-content: center">
                  <canvas id="populationComparisonChart"></canvas>
              </div>

              <div class="row">
                <!-- Card for Total Population -->
                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-header">
                      <strong>Total Population</strong>
                    </div>
                    <div class="card-body">
                      <h6>{{ $totalPopulation }}</h6>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-header">
                      <strong>This Year's Population</strong>
                    </div>
                    <div class="card-body">
                      <h6>{{ $totalCurrentPopulation }}</h6>
                    </div>
                  </div>
                </div>

                <!-- Card for Percentage Change -->
                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-header">
                      <strong>Population Percentage Change</strong>
                    </div>
                    <div class="card-body">
                      <h6>{{ number_format($percentageChange, 2) }}%</h6>
                    </div>
                  </div>
                </div>

                <!-- Card for Male Percentage -->
                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-header">
                      <strong>Male Percentage</strong>
                    </div>
                    <div class="card-body">
                      <h6>{{ number_format($malePercentage, 2) }}%</h6>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-header">
                      <strong>Total Male Count</strong>
                    </div>
                    <div class="card-body">
                      <h6>{{ number_format($totalMale) }}</h6>
                    </div>
                  </div>
                </div>
            
                <!-- Card for Female Percentage -->
                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-header">
                        <strong>Female Percentage</strong>
                    </div>
                    <div class="card-body">
                        <h6>{{ number_format($femalePercentage, 2) }}%</h6>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-header">
                        <strong>Total Female Count</strong>
                    </div>
                    <div class="card-body">
                        <h6>{{ number_format($totalFemale) }}</h6>
                    </div>
                  </div>
                </div>
            
                        
                <!-- Card for Eligible Voters -->
                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-header">
                        <strong>Eligible Voters</strong>
                    </div>
                    <div class="card-body">
                        <h6>{{ $eligibleVoters }}</h6>
                    </div>
                  </div>
                </div>
        
                <!-- Card for Ineligible Voters -->
                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-header">
                        <strong>Ineligible Voters</strong>
                    </div>
                    <div class="card-body">
                        <h6>{{ $ineligibleVoters }}</h6>
                    </div>
                  </div>
                </div>
                <!-- Card for Eligible Voter Percentage -->
                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-header">
                        <strong>Eligible Voter Percentage</strong>
                    </div>
                    <div class="card-body">
                        <h6>{{ number_format($eligibleVotersPercentage, 2) }}%</h6>
                    </div>
                  </div>
                </div>
                <!-- Card for Ineligible Voter Percentage -->
                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-header">
                        <strong>Ineligible Voter Percentage</strong>
                    </div>
                    <div class="card-body">
                        <h6>{{ number_format($ineligibleVotersPercentage, 2) }}%</h6>
                    </div>
                  </div>
                </div>
              </div>

              <div style="page-break-before: always;"></div>

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-header">
                        <strong>Age Distribution Per Year</strong>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Birth Year</th>
                            <th>Total Residents</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($ageDistributionByYear as $data)
                            <tr>
                              <td>{{ $data->birthYear }}</td>
                              <td>{{ $data->total }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
                
              <div class="row">
                <div class="col-md-12">
                  <div class="card-header">
                    <strong>Summary</strong>
                  </div>
                  <textarea name="reportSummary" maxlength="1404" id="reportSummary" style="width:100%; height:450px; border:none; outline:none; resize:none;" ></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="print">print</button>
            </div>
          </div>
        </div>
      </div>



  @include('layouts.footer')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    // POPULATION
    const printBtn = document.getElementById('print');
        printBtn.addEventListener('click', function() {
            window.print();
        }); 

  </script>
  <script>
    document.getElementById('population-report-btn').addEventListener('click', function () {
        var myModal = new bootstrap.Modal(document.getElementById('populationModal'));
        myModal.show();
    });


// POPULATION REPORT
    // CHARTS
      const ctx = document.getElementById('populationComparisonChart').getContext('2d');

      // Data for the chart
      const data = {
          labels: [
              'January', 'February', 'March', 'April', 'May', 'June', 
              'July', 'August', 'September', 'October', 'November', 'December'
          ], // Months as labels
          datasets: [
              {
                  label: 'Current Year', // Legend for current year
                  data: @json($monthlyPopulationCurrentYear), // Monthly data for current year
                  backgroundColor: 'rgba(75, 192, 192, 0.2)', // Line area fill color
                  borderColor: 'rgba(75, 192, 192, 1)', // Line color
                  borderWidth: 2, // Line thickness
                  tension: 0.4, // Smooth curve
              },
              {
                  label: 'Previous Year', // Legend for previous year
                  data: @json($monthlyPopulationPreviousYear), // Monthly data for previous year
                  backgroundColor: 'rgba(255, 99, 132, 0.2)', // Line area fill color
                  borderColor: 'rgba(255, 99, 132, 1)', // Line color
                  borderWidth: 2, // Line thickness
                  tension: 0.4, // Smooth curve
              },
          ],
      };

      // Configuration for the chart
      const config = {
          type: 'line', // Chart type
          data: data, // Data object
          options: {
              responsive: true, // Make chart responsive
              maintainAspectRatio: false, // Do not maintain aspect ratio
              plugins: {
                  legend: {
                      display: true, // Show legend
                      position: 'top', // Position of the legend
                  },
                  tooltip: {
                      enabled: true, // Ensure tooltips are enabled
                      mode: 'point', // Tooltip will appear when hovering over a point
                      intersect: true, // Tooltip only appears when the cursor intersects a point
                      callbacks: {
                          label: function(tooltipItem) {
                              let label = tooltipItem.dataset.label || '';
                              if (label) {
                                  label += ': ';
                              }
                              label += tooltipItem.raw; // Display value of the data point
                              return label;
                          }
                      }
                  },
              },
              scales: {
                  y: {
                      beginAtZero: true, // Start Y-axis at zero
                      title: {
                          display: true,
                          text: 'Population', // Y-axis label
                      },
                  },
                  x: {
                      title: {
                          display: true,
                          text: 'Months', // X-axis label
                      },
                  },
              },
          },
      };

      // Create or update the chart
      let populationComparisonChart = new Chart(ctx, config);

      // Handling window resize to ensure proper re-render
      window.addEventListener('resize', function () {
          populationComparisonChart.resize();  // Resize the chart when window resizes
      });



      const textarea = document.getElementById('reportSummary');
      const charCount = document.getElementById('charCount');
      const maxLength = 1404;

      textarea.addEventListener('input', function() {
        const remaining = maxLength - textarea.value.length;
        charCount.textContent = `Characters remaining: ${remaining}`;
      });

  </script>
</body>


</html>