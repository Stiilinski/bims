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
              {{-- HEALTH --}}
                <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="row">
                    {{-- CARDS --}}
                      <!-- Service Card -->
                        <div class="col-xxl-4 col-md-6 mt-4 mb-4">
                          <div class="card info-card sales-card" onclick="showDsrGraphModal()">
                            <div class="card-body">
                              <h5 class="card-title"> Service <span>Total</span></h5>

                              <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  <i class="ri-health-book-fill"></i>
                                </div>
                                <div class="ps-3">
                                  <h6>{{ $totalDsr }}</h6>

                                  @if ($dsrChange >= 0)
                                      <span class="text-success small pt-1 fw-bold">{{ $dsrChange }}%</span> 
                                      <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-up-square" style="color: #19a987"></i></span>
                                  @else
                                      <span class="text-danger small pt-1 fw-bold">{{ abs($dsrChange) }}%</span> 
                                      <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-down-square" style="color: #ae344a"></i></span>
                                  @endif
                              </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      <!-- End Service Card -->

                      {{-- Service Graph --}}
                        <div class="modal fade" id="dsrModal" tabindex="-1" aria-labelledby="dsrModal" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="dsrModal">Daily Service Record Details (Monthly Comparison)</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <canvas id="populationDsrChart"></canvas>
                                  </div>
                              </div>
                          </div>
                        </div>
                      {{-- End of Service Graph --}}

                      <!-- Diabetes Card -->
                        <div class="col-xxl-4 col-md-6 mt-4 mb-4">
                          <div class="card info-card sales-card" onclick="showDiabetesGraphModal()">
                            <div class="card-body">
                              <h5 class="card-title">Diabetes <span>Total</span></h5>

                              <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  <i class="ri-heart-2-fill"></i>
                                </div>
                                <div class="ps-3">
                                  <h6>{{ $totalDiabetes }}</h6>

                                  @if ($dsrChange >= 0)
                                      <span class="text-success small pt-1 fw-bold">{{ $diabetesChange }}%</span> 
                                      <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-up-square" style="color: #19a987"></i></span>
                                  @else
                                      <span class="text-danger small pt-1 fw-bold">{{ abs($diabetesChange) }}%</span> 
                                      <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-down-square" style="color: #ae344a"></i></span>
                                  @endif
                              </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      <!-- End Diabetes Card -->
                      
                      {{-- Diabetes Graph --}}
                        <div class="modal fade" id="diabetesModal" tabindex="-1" aria-labelledby="diabetesModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="diabetesModalLabel">Diabetes Details (Monthly Comparison)</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <canvas id="populationDiabetesChart"></canvas>
                                  </div>
                              </div>
                          </div>
                        </div>
                      {{-- End of Diabetes Graph --}}

                      <!-- Family Planning Card -->
                        <div class="col-xxl-4 col-md-6 mt-4 mb-4">
                          <div class="card info-card sales-card" onclick="showFpGraphModal()">
                            <div class="card-body">
                              <h5 class="card-title">Family Planning <span>Total</span></h5>
                              <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  <i class="ri-heart-add-fill"></i>
                                </div>
                                <div class="ps-3">
                                  <h6>{{ $totalFamilyPlanning}}</h6>

                                  @if ($dsrChange >= 0)
                                      <span class="text-success small pt-1 fw-bold">{{ $fpChange }}%</span> 
                                      <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-up-square" style="color: #19a987"></i></span>
                                  @else
                                      <span class="text-danger small pt-1 fw-bold">{{ abs($fpChange) }}%</span> 
                                      <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-down-square" style="color: #ae344a"></i></span>
                                  @endif
                              </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      <!-- End Family Planning Card -->

                      {{-- Family Planning Graph --}}
                        <div class="modal fade" id="fpModal" tabindex="-1" aria-labelledby="fpModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="fpModalLabel">Family Planning Details (Monthly Comparison)</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <canvas id="populationFpChart"></canvas>
                                  </div>
                              </div>
                          </div>
                        </div>
                      {{-- End of Family Planning Graph --}}

                      <!-- Pregnancy Card -->
                        <div class="col-xxl-4 col-md-6 mt-4 mb-4">
                          <div class="card info-card sales-card" onclick="showPregGraphModal()">
                            <div class="card-body">
                              <h5 class="card-title">Pregnancy Cases <span>Total</span></h5>

                              <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  <i class="ri-hearts-fill"></i>
                                </div>
                                <div class="ps-3">
                                   <h6>{{ $maternal }}</h6>
                                   @if ($pregChange >= 0)
                                        <span class="text-success small pt-1 fw-bold">{{ $pregChange }}%</span> 
                                        <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-up-square" style="color: #19a987"></i></span>
                                    @else
                                        <span class="text-danger small pt-1 fw-bold">{{ abs($pregChange) }}%</span> 
                                        <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-down-square" style="color: #ae344a"></i></span>
                                    @endif
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      <!-- End Pregnancy Card -->

                        {{-- Pregnancy Graph --}}
                            <div class="modal fade" id="pregModal" tabindex="-1" aria-labelledby="pregModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="pregModalLabel">Pregnancy Details (Monthly Comparison)</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <canvas id="populationPregChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- End of Pregnancy Graph --}}

                      <!-- TB Card -->
                        <div class="col-xxl-4 col-md-6 mt-4 mb-4">
                          <div class="card info-card sales-card" onclick="showTbGraphModal()">
                            <div class="card-body">
                              <h5 class="card-title">TB Cases <span>Total</span></h5>

                              <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  <i class="ri-lungs-fill"></i>
                                </div>
                                <div class="ps-3">
                                  <h6>{{ $tb}}</h6>

                                  @if ($dsrChange >= 0)
                                      <span class="text-success small pt-1 fw-bold">{{ $tbChange }}%</span> 
                                      <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-up-square" style="color: #19a987"></i></span>
                                  @else
                                      <span class="text-danger small pt-1 fw-bold">{{ abs($tbChange) }}%</span> 
                                      <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-down-square" style="color: #ae344a"></i></span>
                                  @endif
                              </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      <!-- End TB Card -->

                      {{-- TB Graph --}}
                        <div class="modal fade" id="tbModal" tabindex="-1" aria-labelledby="tbModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="tbModalLabel">TB Details (Monthly Comparison)</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <canvas id="populationTbChart"></canvas>
                                  </div>
                              </div>
                          </div>
                        </div>
                      {{-- End of TB Graph --}}

                      <!-- Dengue Card -->
                        <div class="col-xxl-4 col-md-6 mt-4 mb-4">
                          <div class="card info-card sales-card" onclick="showDengueGraphModal()">
                            <div class="card-body">
                              <h5 class="card-title">Dengue Cases <span>Total</span></h5>

                              <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  <i class="ri-heart-pulse-fill"></i>
                                </div>
                                <div class="ps-3">
                                  <h6>{{ $dengue }}</h6>

                                  @if ($dengueChange >= 0)
                                      <span class="text-success small pt-1 fw-bold">{{ $dengueChange }}%</span> 
                                      <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-up-square" style="color: #19a987"></i></span>
                                  @else
                                      <span class="text-danger small pt-1 fw-bold">{{ abs($dengueChange) }}%</span> 
                                      <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-down-square" style="color: #ae344a"></i></span>
                                  @endif
                              </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      <!-- End Dengue Card -->

                      {{-- Dengue Graph --}}
                        <div class="modal fade" id="dengueModal" tabindex="-1" aria-labelledby="dengueModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="dengueModalLabel">Dengue Details (Monthly Comparison)</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <canvas id="populationDengueChart"></canvas>
                                  </div>
                              </div>
                          </div>
                        </div>
                      {{-- End of Dengue Graph --}}
                    {{-- END OF CARDS --}}

                    {{-- GRAPH --}}
                      <div class="card">
                        <div class="card-body">
                          <div class="titleCard">
                            <h4>Service Recipients as of {{ date('Y') }}</h4>
                          </div>
                          <!-- Line Chart -->
                          <div class="dropdown">
                            <button class="dots-icon" onclick="toggleDropdownService()">⋮</button>
                            <div class="dropdown-content" id="dataDropdownService">
                                <a href="#" onclick="loadYearlyServiceData()">Yearly Data</a>
                                <a href="#" onclick="loadMonthlyServiceData()">Monthly Data</a>
                            </div>
                          </div>
                          <canvas id="wholeServiceChart"></canvas>
                          <!-- End Line Chart -->
                        </div>
                      </div>
                    {{-- END OF GRAPH --}}
                  </div>
                </div>
              {{-- REFERRAL --}}
                <div class="tab-pane fade" id="bordered-referred" role="tabpanel" aria-labelledby="referred-tab">
                  <div class="row">
                    <!-- RHU Card -->
                      <div class="col-xxl-6 col-md-6 mt-4 mb-4">
                        <div class="card info-card sales-card" onclick="showRhuGraphModal()">
                          <div class="card-body">
                            <h5 class="card-title"> RHU <span>Total</span></h5>
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-health"></i>
                              </div>
                              <div class="ps-3">
                                <h6>{{ $totalRhu }}</h6>

                                @if ($rhuChange >= 0)
                                    <span class="text-success small pt-1 fw-bold">{{ $rhuChange }}%</span> 
                                    <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-up-square" style="color: #19a987"></i></span>
                                @else
                                    <span class="text-danger small pt-1 fw-bold">{{ abs($rhuChange) }}%</span> 
                                    <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-down-square" style="color: #ae344a"></i></span>
                                @endif
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!-- End RHU Card -->

                    {{-- RHU Graph --}}
                      <div class="modal fade" id="rhuModal" tabindex="-1" aria-labelledby="rhuModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="rhuModalLabel">RHU Details (Monthly Comparison)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <canvas id="populationRhuChart"></canvas>
                                </div>
                            </div>
                        </div>
                      </div>
                    {{-- End of RHU Graph --}}

                    <!-- Destrict Card -->
                      <div class="col-xxl-6 col-md-6 mt-4 mb-4">
                        <div class="card info-card sales-card" onclick="showDestrictGraphModal()">
                          <div class="card-body">
                            <h5 class="card-title">Destrict <span>Total</span></h5>

                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class=" ri-hospital-fill"></i>
                              </div>
                              <div class="ps-3">
                                <h6>{{ $totalDes}}</h6>

                                @if ($rhuChange >= 0)
                                    <span class="text-success small pt-1 fw-bold">{{ $destrictChange }}%</span> 
                                    <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-up-square" style="color: #19a987"></i></span>
                                @else
                                    <span class="text-danger small pt-1 fw-bold">{{ abs($destrictChange) }}%</span> 
                                    <span class="text-muted small pt-2 ps-1"><i class="bx bxs-caret-down-square" style="color: #ae344a"></i></span>
                                @endif
                            </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    <!-- End Destrict Card -->

                    {{-- Destrict Graph --}}
                      <div class="modal fade" id="desModal" tabindex="-1" aria-labelledby="desModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="desModalLabel">Destrict Details (Monthly Comparison)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <canvas id="populationDesChart"></canvas>
                                </div>
                            </div>
                        </div>
                      </div>
                    {{-- End of Destrict Graph --}}

                    {{-- RHU and Destrict Comparison Graph --}}
                    <div class="card mt-4 mb-4">
                        <div class="card-body">
                            <div class="titleCard">
                                <h4>RHU and Destrict Monthly Comparison as of {{ date('Y') }}</h4>
                            </div>
                            
                            <!-- Dropdown for Data Selection -->
                            <div class="dropdown">
                                <button class="dots-icon" onclick="toggleDropdownRef()">⋮</button>
                                <div class="dropdown-content" id="dataDropdownRef">
                                    <a href="#" onclick="loadYearlyDataRef()">Yearly Data</a>
                                    <a href="#" onclick="loadMonthlyDataRef()">Monthly Data</a>
                                </div>
                            </div>
                            
                            <!-- Line Chart -->
                            <canvas id="rhuDestrictChart"></canvas>
                        </div>
                    </div>
                    {{-- End of RHU and Destrict Comparison Graph --}}

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
// POPULATION DASHBOARD
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

// MEDICAL DASHBOARD
  function showDsrGraphModal() 
  {
    // Initialize Bootstrap modal
    const modal = new bootstrap.Modal(document.getElementById('dsrModal'));
    modal.show();

    // Destroy the existing chart instance if it exists
    if (window.populationDsrChart && typeof window.populationDsrChart.destroy === 'function') {
        window.populationDsrChart.destroy();
    }

    // Fetch current and previous year data
    const currentYearDsrData = @json($currentYearDsrData);
    const previousYearDsrData = @json($previousYearDsrData);

    // Get the canvas context
    const ctx = document.getElementById('populationDsrChart').getContext('2d');

    // Create a new Chart instance
    window.populationDsrChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [
                {
                    label: '{{ $currentYear }} Visits',
                    data: currentYearDsrData,
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0.1)',
                    fill: true
                },
                {
                    label: '{{ $previousYear }} Visits',
                    data: previousYearDsrData,
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
                            return `Served: ${context.raw}`;
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
                        text: 'Patients Served'
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

  function showDiabetesGraphModal() 
  {
    // Initialize Bootstrap modal
    const modal = new bootstrap.Modal(document.getElementById('diabetesModal'));
    modal.show();

    // Destroy the existing chart instance if it exists
    if (window.populationDiabetesChart && typeof window.populationDiabetesChart.destroy === 'function') {
        window.populationDiabetesChart.destroy();
    }

    // Fetch current and previous year data
    const currentYearDiabetesData = @json($currentYearDiabetesData);
    const previousYearDiabetesData = @json($previousYearDiabetesData);

    // Get the canvas context
    const ctx = document.getElementById('populationDiabetesChart').getContext('2d');

    // Create a new Chart instance
    window.populationDiabetesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [
                {
                    label: '{{ $currentYear }} Visits',
                    data: currentYearDiabetesData,
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0.1)',
                    fill: true
                },
                {
                    label: '{{ $previousYear }} Visits',
                    data: previousYearDiabetesData,
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
                            return `Diagnosed: ${context.raw}`;
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
                        text: 'Patients Diagnosed'
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

  function showFpGraphModal() 
  {
    // Initialize Bootstrap modal
    const modal = new bootstrap.Modal(document.getElementById('fpModal'));
    modal.show();

    // Destroy the existing chart instance if it exists
    if (window.populationFpChart && typeof window.populationFpChart.destroy === 'function') {
        window.populationFpChart.destroy();
    }

    // Fetch current and previous year data
    const currentYearFpData = @json($currentYearFpData);
    const previousYearFpData = @json($previousYearFpData);

    // Get the canvas context
    const ctx = document.getElementById('populationFpChart').getContext('2d');

    // Create a new Chart instance
    window.populationFpChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [
                {
                    label: '{{ $currentYear }} Visits',
                    data: currentYearFpData,
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0.1)',
                    fill: true
                },
                {
                    label: '{{ $previousYear }} Visits',
                    data: previousYearFpData,
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
                            return `Diagnosed: ${context.raw}`;
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
                        text: 'Visits'
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

  function showTbGraphModal() 
  {
    // Initialize Bootstrap modal
    const modal = new bootstrap.Modal(document.getElementById('tbModal'));
    modal.show();

    // Destroy the existing chart instance if it exists
    if (window.populationTbChart && typeof window.populationTbChart.destroy === 'function') {
        window.populationTbChart.destroy();
    }

    // Fetch current and previous year data
    const currentYearTbData = @json($currentYearTbData);
    const previousYearTbData = @json($previousYearTbData);

    // Get the canvas context
    const ctx = document.getElementById('populationTbChart').getContext('2d');

    // Create a new Chart instance
    window.populationTbChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [
                {
                    label: '{{ $currentYear }} Visits',
                    data: currentYearTbData,
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0.1)',
                    fill: true
                },
                {
                    label: '{{ $previousYear }} Visits',
                    data: previousYearTbData,
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
                            return `Diagnosed: ${context.raw}`;
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
                        text: 'Visits'
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

  function showPregGraphModal() {
    // Initialize Bootstrap modal
    const modal = new bootstrap.Modal(document.getElementById('pregModal'));
    modal.show();

    // Destroy the existing chart instance if it exists
    if (window.populationPregChart && typeof window.populationPregChart.destroy === 'function') {
        window.populationPregChart.destroy();
    }

    // Fetch current and previous year data
    const currentYearPregData = @json($currentYearPregData);
    const previousYearPregData = @json($previousYearPregData);
    const currentYearUnder20PregData = @json($currentYearUnder20PregData);
    const previousYearUnder20PregData = @json($previousYearUnder20PregData);
    const currentYearAbove20PregData = @json($currentYearAbove20PregData);
    const previousYearAbove20PregData = @json($previousYearAbove20PregData);

    // Get the canvas context
    const ctx = document.getElementById('populationPregChart').getContext('2d');

    // Create a new Chart instance
    window.populationPregChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [
                {
                    label: '{{ $currentYear }} Total Pregnancies',
                    data: currentYearPregData,
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0.1)',
                    fill: true
                },
                {
                    label: '{{ $previousYear }} Total Pregnancies',
                    data: previousYearPregData,
                    borderColor: 'red',
                    backgroundColor: 'rgba(255, 0, 0, 0.1)',
                    fill: true
                },
                {
                    label: '{{ $currentYear }} Under 20 Pregnancies',
                    data: currentYearUnder20PregData,
                    borderColor: 'green',
                    backgroundColor: 'rgba(0, 255, 0, 0.1)',
                    fill: true
                },
                {
                    label: '{{ $previousYear }} Under 20 Pregnancies',
                    data: previousYearUnder20PregData,
                    borderColor: 'darkgreen',
                    backgroundColor: 'rgba(0, 255, 0, 0.3)',
                    fill: true
                },
                {
                    label: '{{ $currentYear }} Above 20 Pregnancies',
                    data: currentYearAbove20PregData,
                    borderColor: 'orange',
                    backgroundColor: 'rgba(255, 165, 0, 0.1)',
                    fill: true
                },
                {
                    label: '{{ $previousYear }} Above 20 Pregnancies',
                    data: previousYearAbove20PregData,
                    borderColor: 'darkorange',
                    backgroundColor: 'rgba(255, 165, 0, 0.3)',
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
                            return `Pregnancies: ${context.raw}`;
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
                        text: 'Number of Pregnancies'
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


  function showDengueGraphModal() 
  {
    // Initialize Bootstrap modal
    const modal = new bootstrap.Modal(document.getElementById('dengueModal'));
    modal.show();

    // Destroy the existing chart instance if it exists
    if (window.populationDengueChart && typeof window.populationDengueChart.destroy === 'function') {
        window.populationDengueChart.destroy();
    }

    // Fetch current and previous year data
    const currentYearDengueData = @json($currentYearDengueData);
    const previousYearDengueData = @json($previousYearDengueData);

    // Get the canvas context
    const ctx = document.getElementById('populationDengueChart').getContext('2d');

    // Create a new Chart instance
    window.populationTbChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [
                {
                    label: '{{ $currentYear }} Visits',
                    data: currentYearDengueData,
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0.1)',
                    fill: true
                },
                {
                    label: '{{ $previousYear }} Visits',
                    data: previousYearDengueData,
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
                            return `Diagnosed: ${context.raw}`;
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
                        text: 'Visits'
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

  let wholeServiceChart;

  function loadYearlyServiceData() {
      const ctx = document.getElementById('wholeServiceChart').getContext('2d');
      const yearsService = @json($yearsService);
      const yearlyServiceData = @json($yearlyServiceData);

      if (wholeServiceChart) {
          wholeServiceChart.destroy();
      }

      wholeServiceChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: yearsService,
              datasets: [{
                  label: 'Service Recipients (Yearly)',
                  data: yearlyServiceData,
                  borderColor: 'rgba(75, 192, 192, 1)',
                  borderWidth: 2,
                  fill: false,
              }]
          },
          options: {
              scales: {
                  x: {
                      title: {
                          display: true,
                          text: 'Year'
                      }
                  },
                  y: {
                      beginAtZero: true,
                      title: {
                          display: true,
                          text: 'Number of Service Recipients'
                      }
                  }
              },
              plugins: {
                  legend: {
                      display: true,
                      position: 'top'
                  }
              }
          }
      });
  }

  function loadMonthlyServiceData() {
      const ctx = document.getElementById('wholeServiceChart').getContext('2d');
      const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
      const monthlyDataService = @json($currentYearDsrData);  // Adjust if data is in currentYearDataService

      if (wholeServiceChart) {
          wholeServiceChart.destroy();
      }

      wholeServiceChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: months,
              datasets: [{
                  label: 'Service Recipients (Monthly)',
                  data: monthlyDataService,
                  borderColor: 'rgba(255, 99, 132, 1)',
                  borderWidth: 2,
                  fill: false,
              }]
          },
          options: {
              scales: {
                  x: {
                      title: {
                          display: true,
                          text: 'Month'
                      }
                  },
                  y: {
                      beginAtZero: true,
                      title: {
                          display: true,
                          text: 'Number of Service Recipients'
                      }
                  }
              },
              plugins: {
                  legend: {
                      display: true,
                      position: 'top'
                  }
              }
          }
      });
  }

  function toggleDropdownService() {
      document.getElementById("dataDropdownService").classList.toggle("show");
  }

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
  loadYearlyServiceData();
// REFERRAL
  function showRhuGraphModal() 
  {
    // Initialize Bootstrap modal
    const modal = new bootstrap.Modal(document.getElementById('rhuModal'));
    modal.show();

    // Destroy the existing chart instance if it exists
    if (window.populationRhuChart && typeof window.populationRhuChart.destroy === 'function') {
        window.populationRhuChart.destroy();
    }

    // Fetch current and previous year data
    const currentYearRhuData = @json($currentYearRhuData);
    const previousYearRhuData = @json($previousYearRhuData);

    // Get the canvas context
    const ctx = document.getElementById('populationRhuChart').getContext('2d');

    // Create a new Chart instance
    window.populationRhuChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [
                {
                    label: '{{ $currentYear }} Referred',
                    data: currentYearRhuData,
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0.1)',
                    fill: true
                },
                {
                    label: '{{ $previousYear }} Referred',
                    data: previousYearRhuData,
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
                            return `Referred: ${context.raw}`;
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
                        text: 'Patients Referred'
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

  function showDestrictGraphModal() 
  {
    // Initialize Bootstrap modal
    const modal = new bootstrap.Modal(document.getElementById('desModal'));
    modal.show();

    // Destroy the existing chart instance if it exists
    if (window.populationDesChart && typeof window.populationDesChart.destroy === 'function') {
        window.populationDesChart.destroy();
    }

    // Fetch current and previous year data
    const currentYearDesData = @json($currentYearDestrictData);
    const previousYearDesData = @json($previousYearDestrictData);

    // Get the canvas context
    const ctx = document.getElementById('populationDesChart').getContext('2d');

    // Create a new Chart instance
    window.populationDesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [
                {
                    label: '{{ $currentYear }} Referred',
                    data: currentYearDesData,
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0.1)',
                    fill: true
                },
                {
                    label: '{{ $previousYear }} Referred',
                    data: previousYearDesData,
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
                            return `Referred: ${context.raw}`;
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
                        text: 'Patients Referred'
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


  let rhuDestrictChart;

  function loadYearlyDataRef() {
    const ctx = document.getElementById('rhuDestrictChart').getContext('2d');
    const yearlyDes = @json($yearlyDesData);
    const yearsRef = @json($yearsRef);
    const yearlyRef = @json($yearlyRefData);
    const yearsDes = @json($yearsRef);

    if (rhuDestrictChart) {
        rhuDestrictChart.destroy();
    }

    rhuDestrictChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: yearsRef,
            datasets: [
                {
                    label: 'RHU Referral (Yearly)',
                    data: yearlyRef,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false,
                },
                {
                    label: 'District Referral (Yearly)', // Add a label for the new dataset
                    data: yearlyDes, // Add the yearlyDes data
                    borderColor: 'rgba(255, 99, 132, 1)', // Choose a different color for distinction
                    borderWidth: 2,
                    fill: false,
                }
            ]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Year'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Service Recipients'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
}

function loadMonthlyDataRef() {
    const ctx = document.getElementById('rhuDestrictChart').getContext('2d');
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    const monthlyDataRef = @json($currentYearRhuData); 
    const monthlyDataDis = @json($currentYearDestrictData); 

    if (rhuDestrictChart) {
        rhuDestrictChart.destroy();
    }

    rhuDestrictChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [
                {
                    label: 'RHU Referral (Monthly)',
                    data: monthlyDataRef, // Use monthlyDataRef for the first dataset
                    borderColor: ' rgba(75, 192, 192, 1)', // Color for the first dataset
                    borderWidth: 2,
                    fill: false,
                },
                {
                    label: 'District Referral (Monthly)', // Add a label for the district data
                    data: monthlyDataDis, // Use monthlyDataDis for the second dataset
                    borderColor: 'rgba(255, 99, 132, 1)', 
                    borderWidth: 2,
                    fill: false,
                }
            ]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Month'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Service Recipients'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
}

  function toggleDropdownRef() {
      document.getElementById("dataDropdownRef").classList.toggle("show");
  }

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
  loadYearlyDataRef();
 
</script>

  
</body>

</html>