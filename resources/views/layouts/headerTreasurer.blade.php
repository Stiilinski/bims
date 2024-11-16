<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ action('App\Http\Controllers\regValidation@dbTreasurer') }}" class="logo d-flex align-items-center">
        <img src="/images/logo.png" alt="brgy logo">
        <span class="d-none d-lg-block">B.I.M.S.</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">
          @if($LoggedUserInfo)
              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                  <img src="/storage/{{ $LoggedUserInfo['em_picture']}}" class="rounded-circle" alt="employee profile" style="width: 35px!important;">

                  <span class="d-none d-md-block dropdown-toggle ps-2">{{ substr($LoggedUserInfo['em_fname'], 0, 1) . '. ' . $LoggedUserInfo['em_lname'] }}</span>
              </a>
          @endif
            <!-- End Profile Iamge Icon -->
            <input type="hidden" name="idVal" value="{{ $LoggedUserInfo['em_id']}}">
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ $LoggedUserInfo['em_fname'] . ' ' . $LoggedUserInfo['em_lname'] }}</h6>
              <span>{{ $LoggedUserInfo['em_position']}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ action('App\Http\Controllers\regValidation@employeeProfile', ['em_id' => $LoggedUserInfo['em_id']]) }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('regValidation.logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->