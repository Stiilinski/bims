<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/dbBrgyCap') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dashboardCap') }}">
            <i class="bi bi-grid"></i>
            <span>Population Report</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/captainDb/certificateReport') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@certReport') }}">
            <i class="bi bi-grid"></i>
            <span>Documentation Report</span>
            </a>
        </li>
    </ul>
  </aside><!-- End Sidebar-->
  