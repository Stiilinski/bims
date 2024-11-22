@include('layouts.head')
<style>
      .container {
        max-width: 100%!important;
        margin-top: 80px; 
        padding-bottom:10px; 
    }

    .toggle-sidebar-btn {
        display: none;
    }
</style>
<body>

  <!-- ======= Header ======= -->
    <!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="
    @php
      // Retrieve the logged-in employee's position
      $em_position = $LoggedUserInfo->em_position ?? '';
    @endphp
    @if($em_position === 'Treasurer')
      {{ action('App\Http\Controllers\regValidation@dbTreasurer') }}
    @elseif($em_position === 'SK Kagawad')
      {{ action('App\Http\Controllers\regValidation@dbSk') }}
    @elseif($em_position === 'SK Chairman')
      {{ action('App\Http\Controllers\regValidation@dbSkChairman') }}
    @elseif($em_position === 'Secretary')
      {{ action('App\Http\Controllers\regValidation@dashboard') }}
    @elseif($em_position === 'Barangay Health Worker')
      {{ action('App\Http\Controllers\regValidation@dashboardHW') }}
    @elseif($em_position === 'System Admin')
      {{ action('App\Http\Controllers\regValidation@dbAdmin') }}
    @elseif($em_position === 'Barangay Captain')
      {{ action('App\Http\Controllers\regValidation@dashboardCap') }}
    @else
      {{ action('App\Http\Controllers\regValidation@dashboardCap') }} 
    @endif
  " class="logo d-flex align-items-center">
      <img src="/images/logo.png" alt="brgy logo">
      <span class="d-none d-lg-block">B.I.M.S.</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

 


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
  <!-- End Header -->



  <div id="container" class="container">
    <section class="section profile">
        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="
                    @php
                      // Retrieve the logged-in employee's position
                      $em_position = $LoggedUserInfo->em_position ?? '';
                    @endphp
                    @if($em_position === 'Treasurer')
                      {{ action('App\Http\Controllers\regValidation@dbTreasurer') }}
                    @elseif($em_position === 'SK Kagawad')
                      {{ action('App\Http\Controllers\regValidation@dbSk') }}
                    @elseif($em_position === 'SK Chairman')
                      {{ action('App\Http\Controllers\regValidation@dbSkChairman') }}
                    @elseif($em_position === 'Secretary')
                      {{ action('App\Http\Controllers\regValidation@dashboard') }}
                    @elseif($em_position === 'Barangay Health Worker')
                      {{ action('App\Http\Controllers\regValidation@dashboardHW') }}
                    @elseif($em_position === 'System Admin')
                      {{ action('App\Http\Controllers\regValidation@dbAdmin') }}
                    @elseif($em_position === 'Barangay Captain')
                      {{ action('App\Http\Controllers\regValidation@dashboardCap') }}
                    @else
                      {{ action('App\Http\Controllers\regValidation@dashboardCap') }} <!-- Default link -->
                    @endif
                  ">
                  Home
                  </a>
                </li>
                <li class="breadcrumb-item active">Profile</li>
              </ol>
            </nav>
          </div>
      
          <section class="section profile">
            <div class="row">
              <div class="col-xl-4">
      
                <div class="card">
                  <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
      
                    <img src="/storage/{{ $LoggedUserInfo['em_picture']}}" class="rounded-circle" alt="employee profile" style="width: 120px!important; height:120px!important;">
                    <h2>{{ $LoggedUserInfo['em_fname'] . ' ' . $LoggedUserInfo['em_lname'] }}</h2>
                    <h3>{{ $LoggedUserInfo['em_position'] }}</h3>
                  </div>
                </div>
      
              </div>
      
              <div class="col-xl-8">
      
                <div class="card">
                  <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
      
                      <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                      </li>
      
                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                      </li>
      
                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                      </li>
      
                    </ul>
                    <div class="tab-content pt-2">
      
                      <!-- Profile Overview Form -->
                      <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <h5 class="card-title">Profile Details</h5>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label ">Full Name</div>
                          <div class="col-lg-9 col-md-8">{{ $LoggedUserInfo['em_fname'] . ' ' . $LoggedUserInfo['em_lname'] }}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Position</div>
                          <div class="col-lg-9 col-md-8">{{ $LoggedUserInfo['em_position'] }}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Address</div>
                          <div class="col-lg-9 col-md-8">{{ $LoggedUserInfo['em_address'] }}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Email</div>
                          <div class="col-lg-9 col-md-8">{{ $LoggedUserInfo['em_email'] }}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Contact Number</div>
                          <div class="col-lg-9 col-md-8">{{ $LoggedUserInfo['em_contact'] }}</div>
                        </div>
      
                      </div><!--End Profile Overview Form -->
      
                      <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
      
                        <!-- Profile Edit Form -->
                        <form id="e_empForm" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                          <div class="row mb-3">
                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                            <div class="col-md-8 col-lg-9">
                                <img src="/storage/{{ $LoggedUserInfo['em_picture']}}" alt="employee profile" style="width: 120px!important; height:120px!important;">
                              <div class="pt-2">
                                <input name="picture" type="file" class="form-control" id="picture" value="{{ $LoggedUserInfo['em_fname'] }}">
                              </div>
                            </div>
                          </div>
      
                          <div class="row mb-3">
                            <label for="fname" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="fname" type="text" class="form-control" id="fname" value="{{ $LoggedUserInfo['em_fname'] }}">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="lname" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="lname" type="text" class="form-control" id="lname" value="{{ $LoggedUserInfo['em_lname'] }}">
                            </div>
                          </div>
      
                          <div class="row mb-3">
                            <label for="position" class="col-md-4 col-lg-3 col-form-label">Position</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="position" type="text" class="form-control" id="position" value="{{ $LoggedUserInfo['em_position'] }}">
                            </div>
                          </div>
      
                          <div class="row mb-3">
                            <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                            <div class="col-md-8 col-lg-9">
                              <select id="address" class="form-select" name="address">
                                <option value="" disabled>Select Purok</option>
                                <option value="Tugas" {{ $LoggedUserInfo['em_address'] == 'Tugas' ? 'selected' : '' }}>Tugas</option>
                                <option value="Tambis" {{ $LoggedUserInfo['em_address'] == 'Tambis' ? 'selected' : '' }}>Tambis</option>
                                <option value="Mahogany" {{ $LoggedUserInfo['em_address'] == 'Mahogany' ? 'selected' : '' }}>Mahogany</option>
                                <option value="Guyabano" {{ $LoggedUserInfo['em_address'] == 'Guyabano' ? 'selected' : '' }}>Guyabano</option>
                                <option value="Mansinitas" {{ $LoggedUserInfo['em_address'] == 'Mansinitas' ? 'selected' : '' }}>Mansinitas</option>
                                <option value="Ipil-ipil" {{ $LoggedUserInfo['em_address'] == 'Ipil-ipil' ? 'selected' : '' }}>Ipil-ipil</option>
                                <option value="Lubi" {{ $LoggedUserInfo['em_address'] == 'Lubi' ? 'selected' : '' }}>Lubi</option>
                              </select>

                            </div>
                          </div>
      
                          <div class="row mb-3">
                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="email" type="text" class="form-control" id="email" value="{{ $LoggedUserInfo['em_email'] }}">
                            </div>
                          </div>
      
                          <div class="row mb-3">
                            <label for="contact" class="col-md-4 col-lg-3 col-form-label">Contact Number</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="contact" type="text" class="form-control" id="contact" value="{{ $LoggedUserInfo['em_contact'] }}">
                            </div>
                          </div>

                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                          </div>
                        </form><!-- End Profile Edit Form -->
      
                      </div>
      
                      <div class="tab-pane fade pt-3" id="profile-change-password">
                        <!-- Change Password Form -->
                        <form id="changePasswordForm" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="currentPassword" type="password" class="form-control" id="currentPassword">
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="newPassword" type="password" class="form-control" id="newPassword">
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="renewPassword" type="password" class="form-control" id="renewPassword">
                                </div>
                            </div>
                        
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form><!-- End Change Password Form -->
      
                      </div>
      
                    </div><!-- End Bordered Tabs -->
      
                  </div>
                </div>
      
              </div>
            </div>
    </section>
  </div><!-- End #main -->

  @include('layouts.footer')
</body>

</html>