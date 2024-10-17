@include('layouts.head')

<body>

  <!-- ======= Header ======= -->
    @include('layouts.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('layouts.sidebar')
  <!-- End Sidebar -->

  <main id="main" class="main">
    <section class="section profile">
        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ action('App\Http\Controllers\regValidation@dashboardCap') }}">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->
      
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
                              <input name="address" type="text" class="form-control" id="address" value="{{ $LoggedUserInfo['em_address'] }}">
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
  </main><!-- End #main -->

  @include('layouts.footer')
</body>

</html>