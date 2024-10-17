<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - Barangay Information Management System</title>
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
<style>
  *{
    font-family: inter!important;
  }
  html {
    height: 100%;
  }
  body {
    min-height: 100%!important;
  }
  .row {
    display: flex;
    justify-content: flex-end;
  }
  .mainContainer
  {
    background-image: url(/assets/img/ward2.png);
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    justify-content: flex-end;
    min-height: 100vh;
  }
  .card {
    width: 38%;
    border-radius: 0;
    margin: 0;  
    background: #fff;
  }
  .container {
    height: 100%;
    width: 62%;
  }
  .logo {
    display: flex;
    justify-content: center;
  }

  .pt-5 {
    padding-left: 80px;
  }

  .brgy {
    font-size: 96px!important; 
    font-weight:900;
    text-align: left;
    color: #fff;
  }
  .Official2,  .Official1{
    margin-bottom: -50px!important;
  }

  .login h5 {
    color: #012970;
    font-size: 35px;
    font-weight: 700;
  }

  .custom-padding {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

  
  @media (max-width: 1061px) {
    body {
      height: 100%;
    }
    .container {
        display: none;
    }
    .mainContainer {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 10px;
    }
    .card {
      height: 100%!important;
      width: 40%!important;
      border-radius: 15px;
    }
    p {
      font-size: 12px!important;
    }
    .login h5 {
      font-size: 16px!important;
    }
    .custom-padding {
        gap: 5px;
    }
    .logoPic {
      max-height:20%!important; 
      max-width:20%!important;
    }
    .pt-4 {
      padding-top: 0px!important;
    }
  }

  @media (max-width: 753px) 
  {
    p {
      font-size: 10px!important;
    }
    .login h5 {
      font-size: 10px!important;
    }
    .custom-padding {
        gap: 5px;
        margin-top: -20px;
    }
    .logoPic {
      max-height:15%!important; 
      max-width:15%!important;
    }
    .pt-4 {
      padding-top: 0px!important;
    }

    .login{
      padding-bottom: 0px!important;
    }
    .card {
      width: 40%!important;
    }
    .form-label {
      font-size: 10px;
    }
  }
</style>
</head>

<body>
  <div class="mainContainer">
    <div class="container">
      <div class="pt-5">
        <div class="brgy Official1">Hello</div>
        <div class="brgy Official2">Barangay</div>
        <div class="brgy Official3">Official!</div>
        <p style="color: #cecccc; text-align:center; width:90%; font-size:25px;"><i>"Service is the act of providing support, assitance, or expertise
          to meet the needs of others, often enhancing their experience or solving problems."</i></p>
      </div>
    </div>
    <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-center" style="align-items: center;">
            <a href="{{Route('login')}}" class="logo d-flex align-items-center w-auto">
              <img src="assets/img/ward2logo.png" alt="" class="logoPic" style="max-height: 50%; max-width:30%">
              <span class="d-none d-lg-block" style="font-size: 78px; color: #F85BF6; font-weight:800;">B.I.M.S</span>
            </a>
          </div><!-- End Logo -->
          <div class="pt-4">
            <div class="login text-center pb-2 fs-4" ><h5>Login to Your Account</h5></div>
            <p class="text-center" style="font-size: 25px; color:#004C8C;">Enter your Employee ID & Password to login</p>
          </div>
  
          @if ($errors->has('fail'))
          <div class="alert alert-danger">
              {{ $errors->first('fail') }}
          </div>
          @endif
  
          <form class="row custom-padding pt-2 needs-validation" action="{{ route('regValidation.check') }}" method="POST">
            @csrf
            <div class="col-12">
              <label for="employeeId" class="form-label">Employee ID</label>
                <input type="text" name="employeeId" class="form-control" id="employeeId" placeholder="Enter Employee ID" required>
                <span class="text-danger">@error('employeeId') {{ $message }} @enderror</span>
            </div>
  
            <div class="col-12">
              <label for="passwords" class="form-label">Password</label>
              <input type="password" name="passwords" class="form-control" id="passwords" placeholder="Enter Password" required>
              <span class="text-danger">@error('passwords') {{ $message }} @enderror</span>
            </div>
  
            <div class="col-12">
              <button class="btn btn-primary w-100" type="submit">Login</button>
            </div>
            <div class="col-12">
              <p class="small mb-0">Don't have account? <a href="{{Route('register')}}">Create an account</a></p>
            </div>
          </form>
        </div>
    </div>
  </div>
  
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
  <script src="assets/js/main.js"></script>

</body>

</html>