<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboards/dbHealthWorker') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dashboardHW') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/dailyServiceRecord*') ? '' : 'collapsed' }}" data-bs-target="#checkUp-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-file-text"></i><span>Check Up</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="checkUp-nav" class="nav-content collapse {{ Request::is('dashboards/healthWorkerDb/dailyServiceRecord*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/dailyServiceRecord') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dailyServiceRecord') }}">
                    <i class="bi bi-circle"></i>
                    <span>Daily Service Records</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/individualClientReport') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@indiClientReport') }}">
                    <i class="bi bi-circle"></i>
                    <span>Individual Client Treatment Report</span>
                </a>
            </li>
        </ul>
    </li><!-- End Check Up Nav -->
    
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#activities-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Activities</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="activities-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/optDeworming') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@optDeworming') }}">
                  <i class="bi bi-circle"></i>
                  <span>OPT</span>
              </a>
            </li>
        
            <li>
              <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/dstb') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dstb') }}">
                <i class="bi bi-circle"></i>
                <span>DS-TB</span>
              </a>
            </li>
            <li>
              <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/familyPlanning') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@familyPlanning') }}">
                <i class="bi bi-circle"></i><span>Family Planning</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/riskAssessment') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@riskAssessment') }}">
                  <i class="bi bi-circle"></i>
                  <span>Risk Assessment</span>
              </a>
          </li>
            <li>
              <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/dengue') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dengue') }}">
                  <i class="bi bi-circle"></i>
                  <span>Dengue</span>
              </a>
            </li>
            <li>
              <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/rhu') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@rhu') }}">
                    <i class="bi bi-circle"></i><span>Referred RHU</span>
                </a>
            </li>
            <li>
              <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/destrict') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@destrict') }}">
                    <i class="bi bi-circle"></i><span>Referred District</span>
                </a>
            </li>
        </ul>
    </li><!-- End Activities Nav -->
    

      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/calendar') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@calendar') }}">
          <i class="bi bi-calendar"></i>
          <span>Schedule</span>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/immunization') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@immunization') }}">
          <i class="bi bi-journal-text"></i>
          <span>Immunization</span>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/maternal') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@maternal') }}">
          <i class="bi bi-file-richtext"></i>
          <span>Maternal Health Record</span>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/dessegragation') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dessegragation') }}">
          <i class="bi bi-card-list"></i>
          <span>Dissagragation of Sex & Age</span>
        </a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/medicine*') ? '' : 'collapsed' }}" data-bs-target="#med-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bx-plus-medical"></i>
          <span>Medicines</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="med-nav" class="nav-content collapse {{ Request::is('dashboards/healthWorkerDb/medicine*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/medicine') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@medicineRecord') }}">
                    <i class="bi bi-circle"></i>
                    <span>Input Medecines</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboards/healthWorkerDb/medRelease') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@medRelease') }}">
                    <i class="bi bi-circle"></i>
                    <span>Release Medicine Records</span>
                </a>
            </li>
        </ul>
    </li><!-- End Check Up Nav -->
    </ul>
  </aside><!-- End Sidebar-->
  