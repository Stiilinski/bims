<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center" style="width: 100%!important">

              <div class="d-flex justify-content-center py-4">
                <a href="{{Route('login')}}" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">B.I.M.S</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter the required personal details to create account</p>
                  </div>

                    <!-- Multi Columns Form -->
                    <form class="row g-3" id="mainForm" method="POST" action="{{ route('regValidation.save')}}"  autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name">
                            <span class="text-danger error-text fname_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
                            <span class="text-danger error-text lname_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" autocomplete="off">
                            <span class="text-danger error-text email_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" autocomplete="off">
                            <span class="text-danger error-text address_error"></span>
                        </div>

                        <div class="col-12">
                            <label for="profile" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="profile" name="profile" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                            <span class="text-danger error-text profile_error"></span>
                        </div>

                        <div class="col-6">
                            <label for="position" class="form-label">Employee Work Position</label>
                            <select id="position" class="form-select" name="position">
                                <option disabled selected>Choose...</option>
                                <option value="Barangay Captain">Barangay Captain</option>
                                <option value="Secretary">Secretary</option>
                                <option value="Treasurer">Treasurer</option>
                                <option value="System Admin">System Admin</option>
                                <option value="Barangay Health Worker">Barangay Health Worker</option>
                                <option value="Under Secretary">Under Secretary</option>
                                <option value="Under Treasurer">Under Treasurer</option>
                            </select>
                            <span class="text-danger error-text position_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="contact" class="form-label">Employee Contact</label>
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact">
                            <span class="text-danger error-text contact_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="employeeId" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="employeeId" name="employeeId" placeholder="Enter Employee ID">
                            <span class="text-danger error-text employeeId_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="passwords" class="form-label">Password</label>
                            <input type="password" class="form-control" id="passwords" name="passwords" placeholder="Enter Password">
                            <span class="text-danger error-text passwords_error"></span>
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                        <div class="col-12">
                            <p class="small mb-0">Already have an account? <a href="{{Route('login')}}">Log in</a></p>
                        </div>
                    </form><!-- End Multi Columns Form -->

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
  <script src="{{ asset('js/jquery-3.5.0.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  {{-- <script src="assets/js/main.js"></script> --}}

</body>

</html>