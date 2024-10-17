<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboards/dbBrgyCap') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dashboardCap') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboards/captainDb/residentRecCap') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@residentsRecCap') }}">
        <i class="bi bi-person"></i>
        <span>Resident Record</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboards/captainDb/dashboardCapCert') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dashboardCapCert') }}">
        <i class="bi bi-journal-text"></i>
        <span>Certifications</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboards/captainDb/dashboardCapBusiness') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dashboardCapBusiness') }}">
        <i class="bi bi-file-richtext"></i>
        <span>Business Permit</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboards/captainDb/dashboardCapClearance') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dashboardCapClearance') }}">
        <i class="bi bi-card-list"></i>
        <span>Barangay Clearance</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboards/captainDb/dashboardCapBlotter') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dashboardCapBlotter') }}">
        <i class="bi bi-file-text"></i>
        <span>Blotter Records</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboards/captainDb/dashboardCapPur') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dashboardCapPur') }}">
        <i class="bi bi-geo-alt"></i>
        <span>Purok</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboards/captainDb/dashboardCapRevenue') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dashboardCapRevenue') }}">
        <i class="bi bi-cash"></i>
        <span>Revenue</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-blank.html">
        <i class="bi bi-archive"></i>
        <span>Archive</span>
      </a>
    </li>
  </ul>
</aside><!-- End Sidebar-->
