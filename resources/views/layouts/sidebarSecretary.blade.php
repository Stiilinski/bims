<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboards/dbSecretary') ? '' : 'collapsed' }}" a href="{{ action('App\Http\Controllers\regValidation@dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboards/secretariesDb/residentRec*') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@residentsRec') }}">
          <i class="bx bx-group"></i>
          <span>Resident Record</span>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboards/secretariesDb/dBCert*') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@barangayCert') }}">
          <i class="bx bxs-certification"></i>
          <span>Certifications</span>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboards/secretariesDb/dbBrgyClearance*') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@barangayClearance') }}">
          <i class="bx bx-file"></i>
          <span>BRGY. Clearance</span>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboards/secretariesDb/dbBlotter*') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dbBlotter') }}">
          <i class="bx bx-folder-open"></i>
          <span>Blotter</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboards/secretariesDb/dbBusinessPermit*') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@businessPermit') }}">
          <i class="bx bxs-book-open"></i>
          <span>Business Permit</span>
        </a>
      </li>
    </ul>
</aside>
<!-- End Sidebar-->
  