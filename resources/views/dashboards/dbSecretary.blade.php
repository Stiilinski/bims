@include('layouts.headSecretary')
<style>
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
  .card-body {    
    padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x)!important;
  }

  .card-title {
    display: flex;
    flex-direction: column!important;
  }
</style>

<body>
    @include('layouts.headerSecretary')

    @include('layouts.sidebarSecretary')
    
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
                  <div class="row g-3">
                    {{-- RESIDENT --}}
                    <div class="col-xxl-4 col-md-4">
                      <div class="card info-card sales-card">
                        <a href="{{ action('App\Http\Controllers\regValidation@residentsRec') }}" style="text-decoration: none;">
                        <div class="card-body">
                          <h5 class="card-title">Registered Population <span>| Total</span></h5>
          
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                              <h6>{{ $totalPopulation }}</h6>
                            </div>
                          </div>
                        </div>
                        </a>
                      </div>
                    </div>
                    {{-- CERTIFICATIONS --}}
                    <div class="col-xxl-4 col-md-4">
                      <div class="card info-card sales-card">
                        <!-- Wrap the entire card in a link to make it clickable -->
                        <a href="{{ action('App\Http\Controllers\regValidation@barangayCert') }}" style="text-decoration: none;">
                          <div class="card-body">
                            <h5 class="card-title">Pending Certifications <span>| Total</span></h5>
                    
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bxs-certification"></i>
                              </div>
                              <div class="ps-3">
                                {{-- Change the color of the number based on its value --}}
                                <h6 style="color: {{ $totalCertificates >= 1 ? 'red' : '#012970' }}">{{ $totalCertificates }}</h6>
                    
                                {{-- Conditional text and color for the status (Low, Moderate, High, or Pending) --}}
                                @if ($totalCertificates == 0)
                                  <span class="text-muted small pt-2 ps-1">Pending</span>
                                @elseif ($totalCertificates >= 1 && $totalCertificates <= 15)
                                  <span class="text-success small pt-1 fw-bold">Low</span>
                                  <span class="text-muted small pt-2 ps-1">Pending</span>
                                @elseif ($totalCertificates >= 16 && $totalCertificates <= 30)
                                  <span class="text-warning small pt-1 fw-bold">Moderate</span>
                                  <span class="text-muted small pt-2 ps-1">Pending</span>
                                @elseif ($totalCertificates > 30)
                                  <span class="text-danger small pt-1 fw-bold">High</span>
                                  <span class="text-muted small pt-2 ps-1">Pending</span>
                                @endif
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                                       
                    {{-- CLEARANCES --}}
                    <div class="col-xxl-4 col-md-4">
                      <div class="card info-card sales-card">
                        <a href="{{ action('App\Http\Controllers\regValidation@barangayClearance') }}" style="text-decoration: none;">
                        <div class="card-body">
                          <h5 class="card-title">Pending Clearances<span>| Total</span></h5>
                    
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bx bx-file"></i>
                            </div>
                            <div class="ps-3">
                              <h6 style="color: {{ $totalClearances >= 1 ? 'red' : '#012970' }}">{{ $totalClearances }}</h6>
                              {{-- Conditional text and color based on totalClearances --}}
                              @if ($totalClearances == 0)
                                <span class="text-muted small pt-2 ps-1">Pending</span>
                              @elseif ($totalClearances >= 1 && $totalClearances <= 15)
                                <span class="text-success small pt-1 fw-bold">Low</span> 
                                <span class="text-muted small pt-2 ps-1">Pending</span>
                              @elseif ($totalClearances >= 16 && $totalClearances <= 30)
                                <span class="text-warning small pt-1 fw-bold">Moderate</span> 
                                <span class="text-muted small pt-2 ps-1">Pending</span>
                              @elseif ($totalClearances > 30)
                                <span class="text-danger small pt-1 fw-bold">High</span> 
                                <span class="text-muted small pt-2 ps-1">Pending</span>
                              @endif
                            </div>
                          </div>
                        </div>
                        </a>
                      </div>
                    </div>
                    {{-- BLOTTER --}}
                    <div class="col-xxl-6 col-md-6">
                      <div class="card info-card sales-card">
                        <a href="{{ action('App\Http\Controllers\regValidation@dbBlotter') }}" style="text-decoration: none;">
                        <div class="card-body">
                          <h5 class="card-title">Pending Blotter <span>| Total</span></h5>
                    
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bx bx-folder-open"></i>
                            </div>
                            <div class="ps-3">
                              {{-- Change the color of the number based on its value --}}
                              <h6 style="color: {{ $totalBlotters >= 1 ? 'red' : '#012970' }}">{{ $totalBlotters }}</h6>
                    
                              {{-- Conditional text and color for the status (Low, Moderate, High, or Pending) --}}
                              @if ($totalBlotters == 0)
                                <span class="text-muted small pt-2 ps-1">Pending</span>
                              @elseif ($totalBlotters >= 1 && $totalBlotters <= 15)
                                <span class="text-success small pt-1 fw-bold">Low</span> 
                                <span class="text-muted small pt-2 ps-1">Pending</span>
                              @elseif ($totalBlotters >= 16 && $totalBlotters <= 30)
                                <span class="text-warning small pt-1 fw-bold">Moderate</span> 
                                <span class="text-muted small pt-2 ps-1">Pending</span>
                              @elseif ($totalBlotters > 30)
                                <span class="text-danger small pt-1 fw-bold">High</span> 
                                <span class="text-muted small pt-2 ps-1">Pending</span>
                              @endif
                            </div>
                          </div>
                        </div>
                        </a>
                      </div>
                    </div>
                    {{-- BUSINESS PERMIT --}}
                    <div class="col-xxl-6 col-md-6">
                      <div class="card info-card sales-card">
                        <a href="{{ action('App\Http\Controllers\regValidation@businessPermit') }}" style="text-decoration: none;">
                        <div class="card-body">
                          <h5 class="card-title">Pending Business Permits <span>| Total</span></h5>
                    
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bx bxs-book-open"></i>
                            </div>
                            <div class="ps-3">
                              {{-- Change the color of the number based on its value --}}
                              <h6 style="color: {{ $totalBusinessPermits >= 1 ? 'red' : '#012970' }}">{{ $totalBusinessPermits }}</h6>
                    
                              {{-- Conditional text and color for the status (Low, Moderate, High, or Pending) --}}
                              @if ($totalBusinessPermits == 0)
                                <span class="text-muted small pt-2 ps-1">Pending</span>
                              @elseif ($totalBusinessPermits >= 1 && $totalBusinessPermits <= 15)
                                <span class="text-success small pt-1 fw-bold">Low</span> 
                                <span class="text-muted small pt-2 ps-1">Pending</span>
                              @elseif ($totalBusinessPermits >= 16 && $totalBusinessPermits <= 30)
                                <span class="text-warning small pt-1 fw-bold">Moderate</span> 
                                <span class="text-muted small pt-2 ps-1">Pending</span>
                              @elseif ($totalBusinessPermits > 30)
                                <span class="text-danger small pt-1 fw-bold">High</span> 
                                <span class="text-muted small pt-2 ps-1">Pending</span>
                              @endif
                            </div>
                          </div>
                        </div>
                        </a>
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
  
          </div>
          <!-- End Right side columns -->
          </section>
  
  
  
  
    </main>

    @include('layouts.footerSecretary')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
    
</body>


