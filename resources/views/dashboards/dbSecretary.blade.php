@include('layouts.headSecretary')
<style>
    /* Dropdown Menu Styles */
    .dropdown {
        display: flex;
        justify-content: flex-end;
    }

    .dots-icon {
        background-color: transparent;
        border: none;
        font-size: 24px;
        cursor: pointer;
        padding: 10px;
        color: #333;
    }

    .dots-icon:focus {
        outline: none;
    }

    .dropdown-content {
        display: none; /* Hide the dropdown initially */
        position: absolute;
        right: 0;
        background-color: #fff;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        padding: 10px 0;
        margin-top: 5px;
    }

    .dropdown-content a {
        color: #333;
        padding: 8px 16px;
        text-decoration: none;
        display: block;
        cursor: pointer;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .show {
        display: block; /* Show the dropdown when the 'show' class is added */
    }

    /* Chart Container Styling */
    #frontServiceChart {
        max-width: 100%; /* Make sure the chart is responsive */
        height: 400px;  /* Set a height for the chart */
    }

    /* Title Styling */
    .titleCard h4 {
        font-size: 24px;
        color: #333;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: left;
    }

    /* Additional Padding and Margin for Card */
    .card-body {
        padding: 20px;
    }

    /* Styling for the Heading */
    #chartHeading {
        font-size: 20px;
        color: #333;
        font-weight: bold;
        margin-bottom: 20px;
    }

    /* Ensure the page body has enough space for the dropdown */
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
    }

    /* Card Styling */
    .card {
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin-bottom: 30px;
    }

    /* Card Body Padding */
    .card-body {
        padding: 20px;
    }

    /* Responsiveness for smaller screens */
    @media (max-width: 768px) {
        .titleCard h4 {
            font-size: 18px;  /* Smaller title on mobile */
        }

        #frontServiceChart {
            height: 300px;  /* Smaller chart on mobile */
        }

        .dropdown-content {
            min-width: 140px;  /* Adjust dropdown width for smaller screens */
        }

        .dots-icon {
            font-size: 20px;  /* Smaller dots icon on mobile */
        }
    }

</style>

<body>
    @include('layouts.headerSecretary')

    @include('layouts.sidebarSecretary')
    
    <main id="main" class="main">
        <div class="containerCon">

            <div class="pagetitle">
                <h1>Dashboard</h1>
            </div>
          
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
          
                      </div>
                    </div>
                    <!-- End Blotter Card -->  

                    <!-- Add more cards for other age groups as needed -->
                    <!-- Documents Issuance  Reports -->
                    <div class="card mt-4 mb-4">
                        <div class="card-body">
                            <div class="titleCard">
                                <h4 id="chartHeading">Document Reports | Today</h4>
                            </div>
                        
                            <!-- Dropdown for Data Selection -->
                            <div class="dropdown">
                                <button id="dropdownButton" class="dots-icon">⋮</button>
                                <div class="dropdown-content" id="dataDropdownRef">
                                    <a href="#" id="todayData">Today Data</a>
                                    <a href="#" id="monthlyData">Monthly Data</a>
                                    <a href="#" id="yearlyData">Yearly Data</a>
                                </div>
                            </div>
                        
                            <!-- Line Chart -->
                            <canvas id="frontServiceChart"></canvas>
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

                    </div>
                    <!-- End sidebar recent posts-->
                    </div>
                </div>
                <!-- End Public Announcement -->
                </div>
                <!-- End Right side columns -->
            </section>
        </div>
    </main>
    @include('layouts.footerSecretary')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const filter = "{{ $filter }}";  

        // Data from the backend
        const todayBlotters = @json($todayBlotters);
        const todayCertificates = @json($todayCertificates);
        const todayClearances = @json($todayClearances);
        const todayBusinessPermits = @json($todayBusinessPermits);

        const monthlyBlotters = @json($monthlyBlotters);
        const monthlyCertificates = @json($monthlyCertificates);
        const monthlyClearances = @json($monthlyClearances);
        const monthlyBusinessPermits = @json($monthlyBusinessPermits);

        const yearlyData = @json($yearlyData); 

        // Function to toggle dropdown visibility
        function toggleDropdownRef() {
            const dropdown = document.getElementById('dataDropdownRef');
            dropdown.classList.toggle('show');
        }

        // Function to update chart data based on selected filter
        function updateChartData(filter) {
            let labels = [];
            let blottersData = [];
            let certificatesData = [];
            let clearancesData = [];
            let businessPermitsData = [];

            if (filter === 'today') {
                labels = ['8AM', '9AM', '10AM', '11AM', '12PM', '1PM', '2PM', '3PM', '4PM', '5PM', '6PM', '7PM'];
                blottersData = todayBlotters;
                certificatesData = todayCertificates;
                clearancesData = todayClearances;
                businessPermitsData = todayBusinessPermits;
            }
            else if (filter === 'monthly') {
                // Ensure we are using the correct labels (months)
                labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                blottersData = monthlyBlotters;
                certificatesData = monthlyCertificates;
                clearancesData = monthlyClearances;
                businessPermitsData = monthlyBusinessPermits;
            }
            else if (filter === 'yearly') {
                labels = yearlyData.map(data => data.year);
                blottersData = yearlyData.map(data => data.blotters);
                certificatesData = yearlyData.map(data => data.certificates);
                clearancesData = yearlyData.map(data => data.clearances);
                businessPermitsData = yearlyData.map(data => data.businessPermits);
            }

            // Check if data is available for the current filter
            if (blottersData.length === 0 || certificatesData.length === 0 || clearancesData.length === 0 || businessPermitsData.length === 0) {
                console.warn('No data available for ' + filter);
                return; // Exit if there's no data to show
            }

            // Update the chart
            myChart.data.labels = labels;
            myChart.data.datasets[0].data = blottersData;
            myChart.data.datasets[1].data = certificatesData;
            myChart.data.datasets[2].data = clearancesData;
            myChart.data.datasets[3].data = businessPermitsData;
            myChart.update();
        }


        // Function to update the heading text based on selected filter
        function updateHeadingText(filter) {
            const heading = document.getElementById('chartHeading');
            if (filter === 'today') {
                heading.innerHTML = 'Document Reports | Today';
            } else if (filter === 'monthly') {
                heading.innerHTML = 'Document Reports | Monthly Data';
            } else if (filter === 'yearly') {
                heading.innerHTML = 'Document Reports | Yearly Data';
            }
        }

        // Initialize the chart with default data (Today)
        const ctx = document.getElementById('frontServiceChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],  // Labels will be updated dynamically
                datasets: [
                    {
                        label: 'Blotters',
                        data: [],
                        borderColor: '#4154f1',
                        fill: false,
                        tension: 0.1
                    },
                    {
                        label: 'Certificates',
                        data: [],
                        borderColor: '#2eca6a',
                        fill: false,
                        tension: 0.1
                    },
                    {
                        label: 'Clearances',
                        data: [],
                        borderColor: '#ff771d',
                        fill: false,
                        tension: 0.1
                    },
                    {
                        label: 'Business Permits',
                        data: [],
                        borderColor: '#ff4560',
                        fill: false,
                        tension: 0.1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItems) {
                                return tooltipItems[0].label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Time / Date'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Number of Documents'
                        }
                    }
                }
            }
        });

        // Load the chart data based on the default filter (today)
        updateChartData('today'); // Default filter is 'today'

        // Event listeners for the filter selection
        document.getElementById('todayData').addEventListener('click', function() {
            updateChartData('today');
        });

        document.getElementById('monthlyData').addEventListener('click', function() {
            updateChartData('monthly');
        });

        document.getElementById('yearlyData').addEventListener('click', function() {
            updateChartData('yearly');
        });

        // Attach the dropdown toggle event listener to the button
        const dropdownButton = document.getElementById('dropdownButton');
        dropdownButton.addEventListener('click', toggleDropdownRef);
    });


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
    </script>
    
</body>


