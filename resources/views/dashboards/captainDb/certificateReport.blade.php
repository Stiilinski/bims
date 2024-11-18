@include('layouts.head')
<style>

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
    #documentationModal, #documentationModal * {
        visibility: visible !important; /* Make modal visible */
        box-shadow:none;
        background-color: #fff;
    }

    .labelTitle {
      visibility: visible!important;
    }

    /* Style the modal to take up the entire page */
    #documentationModal {
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
        width: 1000px;
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
        padding: 20px;   /* Adjust padding */
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

    #monthlyDataChart {
      width: 100%!important;
      height: 250px!important;
    }

    .reportSummary {
      font-size: 10px!important;
    }

    
    .col-md-3 {
      width: 350px!important;
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
      <h1>Documentation Report</h1>
      <div class="btnArea">
        <button type="button" class="btn btn-primary" id="documentation-report-btn">Show Documents Report</button>
      </div>
    </div>

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row" style="padding-left: 10px;">
            <div class="card">
              <div class="card-body" style="width: 100%!important;">
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
              </div>
            </div>
          </div>
        </div>
            
        <!-- Right side columns -->
        
          <div class="col-lg-4">
              <!-- Private Announcement -->
              <div class="card">
                <div class="card-body pb-0">
                  <h5 class="card-title">Private Announcement <span id="currentMonthSpanPrivate">| Today</span></h5>
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
      <div class="modal fade" id="documentationModal" tabindex="-1" aria-labelledby="documentationModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-modal-width">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="documentationModalLabel">Documentation Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <strong class="labelTitle" style="visibility: hidden;">Documentation Report</strong>
              {{-- GRAPH POPULATION --}}
              <div class="card d-flex" style="justify-content: center">
                  <canvas id="monthlyDataChart"></canvas>
              </div>

                <div class="row">
                    <!-- Total Completed Blotters -->
                    <div class="col-md-3">
                        <div class="card mb-4">
                            <div class="card-header">
                                <strong>Total Completed Blotters</strong>
                            </div>
                            <div class="card-body">
                                <h6>{{ $totalCountBlotters }}</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Total Completed Certificates -->
                    <div class="col-md-3">
                        <div class="card mb-4">
                            <div class="card-header">
                                <strong>Total Completed Certificates</strong>
                            </div>
                            <div class="card-body">
                                <h6>{{ $totalCountCertificates }}</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Total Completed Permits -->
                    <div class="col-md-3">
                        <div class="card mb-4">
                            <div class="card-header">
                                <strong>Total Completed Permits</strong>
                            </div>
                            <div class="card-body">
                                <h6>{{ $totalCountBusinessPermits }}</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Total Completed Clearances -->
                    <div class="col-md-3">
                        <div class="card mb-4">
                            <div class="card-header">
                                <strong>Total Completed Clearances</strong>
                            </div>
                            <div class="card-body">
                                <h6>{{ $totalCountClearances }}</h6>
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
        const printBtn = document.getElementById('print');
    printBtn.addEventListener('click', function() {
        window.print();
    });
</script>
  <script>
    document.getElementById('documentation-report-btn').addEventListener('click', function () {
        var myModal = new bootstrap.Modal(document.getElementById('documentationModal'));
        myModal.show();
    });
  // CHART 2: Monthly Data for Certificates, Clearances, and Business Permits
  const ctx2 = document.getElementById('monthlyDataChart').getContext('2d');

  // Data for the second chart
  const data2 = {
      labels: [
          'January', 'February', 'March', 'April', 'May', 'June', 
          'July', 'August', 'September', 'October', 'November', 'December'
      ], // Months as labels
      datasets: [
          {
              label: 'Certificates', // Legend for Certificates
              data: @json($monthlyCertificates), // Monthly data for Certificates
              backgroundColor: 'rgba(75, 192, 192, 0.2)', // Line area fill color
              borderColor: 'rgba(75, 192, 192, 1)', // Line color
              borderWidth: 2, // Line thickness
              tension: 0.4, // Smooth curve
          },
          {
              label: 'Clearances', // Legend for Clearances
              data: @json($monthlyClearances), // Monthly data for Clearances
              backgroundColor: 'rgba(153, 102, 255, 0.2)', // Line area fill color
              borderColor: 'rgba(153, 102, 255, 1)', // Line color
              borderWidth: 2, // Line thickness
              tension: 0.4, // Smooth curve
          },
          {
              label: 'Business Permits', // Legend for Business Permits
              data: @json($monthlyBusinessPermits), // Monthly data for Business Permits
              backgroundColor: 'rgba(255, 159, 64, 0.2)', // Line area fill color
              borderColor: 'rgba(255, 159, 64, 1)', // Line color
              borderWidth: 2, // Line thickness
              tension: 0.4, // Smooth curve
          },
          {
              label: 'Blotter', // Legend for Business Permits
              data: @json($monthlyBlotters), // Monthly data for Business Permits
              backgroundColor: 'rgba(240,128,128, 0.2)', // Line area fill color
              borderColor: 'rgba(240,128,128, 1)', // Line color
              borderWidth: 2, // Line thickness
              tension: 0.4, // Smooth curve
          }
      ]
  };

  // Configuration for the second chart
  const config2 = {
      type: 'line', // Chart type
      data: data2, // Data object
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
                      text: 'Count', // Y-axis label
                  },
              },
              x: {
                  title: {
                      display: true,
                      text: 'Months', // X-axis label
                  },
              }
          }
      }
  };

  // Create or update the second chart (monthly data for Certificates, Clearances, and Business Permits)
  let monthlyDataChart = new Chart(ctx2, config2);

  // Handling window resize to ensure proper re-render for the second chart
  window.addEventListener('resize', function () {
      monthlyDataChart.resize();  // Resize the chart when window resizes
  });
  </script>
 <script>
  console.log("Monthly Certificates: ", @json($monthlyCertificates));
  console.log("Monthly Clearances: ", @json($monthlyClearances));
  console.log("Monthly Business Permits: ", @json($monthlyBusinessPermits));
</script>
</body>


</html>