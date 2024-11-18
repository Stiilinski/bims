<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/systemAdmin') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dbAdmin') }}">
            <i class="bi bi-grid"></i>
            <span>Register Employee</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/officials') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dbAdminOfficials') }}">
            <i class="bi bi-grid"></i>
            <span>Brgy. Officials</span>
            </a>
        </li>
    </ul>
  </aside><!-- End Sidebar-->
  