@include('layouts.headHealthWorkers')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap");
    * {
        font-family: Inter;
    }

    html {
        padding: 0;
        margin: 0;
    }

    .toggle-sidebar-btn {
        display: none;
    }
    
    .container {
        max-width: 100% !important;
        margin-top: 80px;
        padding-bottom: 10px;
    }

    .pagetitle {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pagetitle *{
        font-size: 16px;
    }

    .content {
        margin: 50px 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .content label {
        font-weight: bold;
    }

    .header-form {
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        padding-bottom: 75px;
        padding-right: 180px;
    }
    .header-form.logo-form {
        justify-content: center;
    }
    .logo-form {
        justify-content: center;
        display: flex;
        width: 20%;
        padding: 0px 110px 0 110px;
    }
    .logo-form img {
        border-radius: 50%;
        width: 100px;
        height: 100px;
    }

    .title-form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        width: 50%;
    }

    .title-form h1,
    h4 {
        width: 100%;
        font-family: Playfair Display;
        font-weight: 900;
    }
    .title-form h1 {
        margin-top: 0px;
        margin-bottom: 10px;
        font-size: 41px;
    }
    .title-form h4 {
        margin-bottom: 2px;
        margin-top: 0;
        font-size: 20px;
        word-spacing: 5px;
        letter-spacing: -2px;
    }

    .content-form {
        justify-content: center;
        align-items: center;
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .content-form input {
        font-weight: 500;
        padding-left: 5px;
    }
    .content-form label {
        padding-left: 5px;
    }
    .form-1 {
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .form-1 input {
        border-top: none;
        border-bottom: 1px solid black;
        border-left: none;
        border-right: none;
        outline: none;
    }
    .form1 input {
        width: 450px;
    }
    .form2 input {
        width: 100px;
    }
    .form3 input {
        width: 150px;
    }
    .form4 input {
        width: 100px;
    }
    .form5 input {
        width: 100px;
    }

    .form-2 {
        margin-top: 5px;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .form-2 input {
        border-top: none;
        border-bottom: 1px solid black;
        border-left: none;
        border-right: none;
        outline: none;
    }
    .form6 input {
        width: 420px;
    }
    .form7 input {
        width: 360px;
    }
    .form8 input {
        width: 100px;
    }

    .form-3 {
        margin-top: 5px;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .form-3 input {
        border-top: none;
        border-bottom: 1px solid black;
        border-left: none;
        border-right: none;
        outline: none;
    }
    .form9 input {
        width: 250px;
    }
    .form10 input {
        width: 200px;
    }

    .SubjectFindings {
        margin-top: 5px;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .findings {
        display: flex;
        flex-direction: column;
    }

    .findings textarea {
        font-size: 16px;
        outline: none;
        font-weight: 500;
        border: none;
        padding-left: 5px;
    }

    .PhilMember {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-left: 132px;
        padding: 6px 10px;
        width: 280px;
        border: 1px solid black;
    }
    .phil1 input {
        width: 110px;
        border: none;
        outline: none;
    }
    .phil4 input {
        width: 205px;
        border: none;
        outline: none;
    }

    .ObjectiveFindings {
        margin-top: 5px;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .objective {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .obj-form1 {
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .obj-form1 input {
        border: none;
        outline: none;
    }
    .obj-form2 {
        margin-top: 5px;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .obj-form2 input {
        border-top: none;
        border-bottom: 1px solid black;
        border-left: none;
        border-right: none;
        outline: none;
        width: 133.5px;
    }
    .obj-form3 {
        margin-top: 5px;
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .obj-form3 input {
        border-top: none;
        border-bottom: 1px solid black;
        border-left: none;
        border-right: none;
        outline: none;
        width: 100%;
        margin-left: 5px;
    }
    .reason {
        display: flex;
        flex-direction: row;
        margin-top: 20px;
    }
    .reason label {
        width: 190px;
    }
    .Diagnosis,
    .Treatment {
        margin-top: 20px;
        display: flex;
        flex-direction: row;
    }

    .obj-form4 {
        display: flex;
        flex-direction: row;
        margin-top: 45px;
        width: 100%;
        gap: 540px;
    }
    .Level1 {
        align-items: flex-end;
        justify-content: right;
        width: 100%;
    }
    .Level {
        width: 100%;
    }
    .obj4 {
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .obj4 input {
        width: 350px;
        border-top: none;
        border-bottom: 1px solid black;
        border-left: none;
        border-right: none;
        outline: none;
        margin-left: 5px;
    }
    .obj4 {
        text-align: center;
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .obj4 input {
        width: 350px;
        border-top: none;
        border-bottom: 1px solid black;
        border-left: none;
        border-right: none;
        outline: none;
        margin-left: 5px;
    }

    .form-date {
        width: 100%;
        text-align: right;
    }

    .form-date input {
        margin-right: 3px;
        width: 180px;
        text-align: center;
        border-top: none;
        border-bottom: 1px solid black;
        border-left: none;
        border-right: none;
        outline: none;
        margin-bottom: 5px;
        padding-bottom: 3px;
        margin-left: 5px;
    }
</style>
<body>
    @include('layouts.headerHealthWorkers')

    <div class="container">
        <div class="pagetitle">
            <div class="pageArea">
                <h1>R.H.U Form</h1>
                <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ action('App\Http\Controllers\regValidation@rhu') }}">RHU</a></li>
                      <li class="breadcrumb-item active">RHU Form</li>
                    </ol>
                  </nav>
            </div>
            <div class="btnArea">
                <button type="button" class="btn btn-primary"><i class="bi bi-printer-fill"></i> Print</button>
            </div>
        </div><!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <div class="content">
                    <div class="header-form">
                        <div class="logo-form">
                            <img src="/assets/img/seal.jpg" alt="">
                        </div>
                        <div class="title-form">
                            <h1>RURAL HEALTH UNIT</h1>
                            <h4>MINGLANILLA, CEBU</h4>
                            <h4>CLINICAL REFERRAL SLIP</h4>
                        </div>
                    </div>
                    <div class="content-form">
                        <div class="the-content">
                            <div class="form-date">
                                <label for="RhuDate">Date:</label>
                                <input type="date" name="RhuDate" id="RhuDate">
                            </div>
                            <div class="form-1">
                                <div class="form1">
                                    <label for="patientName">Name:</label>
                                    <input type="text" name="patientName" id="patientName" value="{{ $rhu->resident->res_lname ?? '' }}, {{ $rhu->resident->res_fname ?? '' }} {{ $rhu->resident->res_mname ?? '' }} {{ $rhu->resident->res_suffix ?? '' }}" readonly>
                                </div>
                                <div class="form2">
                                    <label for="patientAge">Age:</label>
                                    <input type="text" name="patientAge" id="patientAge">
                                </div>
                                <div class="form3">
                                    <label for="patientBD">Birthday:</label>
                                    <input type="text" name="patientBD" id="patientBD" value="{{ $rhu->resident->res_bdate ?? '' }}" readonly>
                                </div>
                                <div class="form4">
                                    <label for="patientGender">Gender:</label>
                                    <input type="text" name="patientGender" id="patientGender" value="{{ $rhu->resident->res_sex ?? '' }}" readonly>
                                </div>
                                <div class="form5">
                                    <label for="patientStat">Status:</label>
                                    <input type="text" name="patientStat" id="patientStat" value="{{ $rhu->resident->res_civil ?? '' }}" readonly>
                                </div>
                            </div>
                            <div class="form-2">
                                <div class="form6">
                                    <label for="patientAddress">Address:</label>
                                    <input type="text" name="patientAddress" id="patientAddress" value="{{ $rhu->resident->res_address ?? '' }}" readonly>
                                </div> 
                                <div class="form7">   
                                    <label for="patientEdu">Educational Attainment:</label>
                                    <input type="text" name="patientEdu" id="patientEdu">
                                </div> 
                                <div class="form8">   
                                    <label for="patientFam">Family #:</label>
                                    <input type="text" name="patientFam" id="patientFam" value="{{ $rhu->rhu_familyNum ?? '' }}" readonly>
                                </div> 
                            </div>
                            <div class="form-3">
                                <div class="form9">
                                    <label for="patientRefFrom">Referred From:</label>
                                    <input type="text" name="patientRefFrom" id="patientRefFrom" value="{{ $rhu->employee->em_fname ?? '' }} {{ $rhu->employee->em_mname ?? '' }} {{ $rhu->employee->em_lname ?? '' }} " readonly>
                                </div>   
                                <div class="form10">
                                    <label for="patientRefTo">Referred To:</label>
                                    <input type="text" name="patientRefTo" id="patientRefTo" value="{{ $rhu->rhu_referredTo ?? '' }}" readonly>
                                </div>
                            </div>
                            <div class="SubjectFindings">
                                <div class="findings">
                                    <label for="SubjFind">Subjective Findings:</label>
                                    <textarea name="SubjFind" id="SubjFind" cols="90" rows="6" readonly style="resize: none;">{{ $rhu->rhu_subjectFinding ?? '' }}</textarea>
                                </div>
                                <div class="PhilMember">
                                    <div class="phil1">
                                        <label for="PhilMem">Philhealth Member:</label>
                                        <input type="text" name="PhilMem" id="PhilMem" value="{{ $rhu->rhu_phMember ?? '' }}" readonly>
                                    </div>      
                                    <div class="phil2">   
                                        <label for="Depend">Dependent:</label>
                                        <input type="radio" name="Depend" value="Yes" id="Depend" {{ $rhu->rhu_dependent == 'Yes' ? 'checked' : '' }} disabled><b>Yes</b>
                                        <input type="radio" name="Depend" value="No" id="DependNo" {{ $rhu->rhu_dependent == 'No' ? 'checked' : '' }} disabled><b>No</b>
                                    </div>      
                                    <div class="phil3">  
                                        <label for="PriIndi">Private/Indigent: </label>
                                        <input type="radio" name="PriIndi" value="Yes" id="PriIndi" {{ $rhu->rhu_private == 'Yes' ? 'checked' : '' }} disabled><b>Yes</b>
                                        <input type="radio" name="PriIndi" value="No" id="PriNo" {{ $rhu->rhu_private == 'No' ? 'checked' : '' }} disabled><b>No</b>
                                    </div>      
                                    <div class="phil4">  
                                        <label for="Phic">PHIC #:</label>
                                        <input type="text" name="Phic" id="Phic" value="{{ $rhu->rhu_phicNum ?? '' }}" readonly>
                                    </div>  
                                </div>
                            </div>
                            <div class="ObjectiveFindings">
                                <div class="objective">
                                    <div class="obj-form1">
                                        <label for="ObjFind">Objective Findings:</label>
                                        <input type="text" name="ObjFind" id="ObjFind" value="{{-- $rhu->rhu_phicNum ?? '' --}}" readonly>
                                    </div>
                                    <div class="obj-form2">
                                        <label for="ObjTemp">Temperature:</label>
                                        <input type="text" name="ObjTemp" id="ObjTemp" value="{{ $rhu->rhu_temp ?? '' }}" readonly>;
                                        <label for="PulRate">Pulse Rate:</label>
                                        <input type="text" name="PulRate" id="PulRate" value="{{ $rhu->rhu_pr ?? '' }}" readonly>;
                                        <label for="ResRate">Respiratory Rate:</label>
                                        <input type="text" name="ResRate" id="ResRate" value="{{ $rhu->rhu_rr ?? '' }}" readonly>;
                                        <label for="BloodPre">Blood Pressure:</label>
                                        <input type="text" name="BloodPre" id="BloodPre" value="{{ $rhu->rhu_bp ?? '' }}" readonly>;
                                        <label for="Weight">Weight:</label>
                                        <input type="text" name="Weight" id="Weight" value="{{ $rhu->rhu_wt ?? '' }}" readonly>;
                                    </div>
                                    <div class="obj-form3">
                                        <div class="reason">
                                            <label for="Reason">Reason for Referral:</label>
                                            <input type="text" name="Reason" id="Reason" value="{{ $rhu->rhu_reason ?? '' }}" readonly>
                                        </div>
                                        <div class="Diagnosis">
                                            <label for="Diagnose">Diagnosis: </label>
                                            <input type="text" name="Diagnose" id="Diagnose" value="{{ $rhu->rhu_diagnosis ?? '' }}" readonly>
                                        </div>
                                        <div class="Treatment">
                                            <label for="Treat">Treatment: </label>
                                            <input type="text" name="Treat" id="Treat" value="{{ $rhu->rhu_treatment ?? '' }}" readonly>
                                        </div>
                                    </div>
                                    <div class="obj-form4">
                                        <div class="Level1">
                                            <div class="obj4">
                                                <input type="text" name="referringLvl" id="referringLvl" value="{{ $rhu->rhu_referringLvl ?? '' }}" readonly>
                                                <label for="referringLvl">Referring Level</label>
                                            </div>
                                        </div>
                                        <div class="Level">
                                            <div class="obj4">
                                                <input type="text" name="referredLvl" id="referredLvl" value="{{ $rhu->rhu_referredLvl ?? '' }}" readonly>
                                                <label for="referredLvl">Referred Level</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('layouts.footerHealthWorkers')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#dob').inputmask('99/99/9999'); // This will set the format to MM/DD/YYYY
      });
  
      function calculateAge(dob) {
          const birthDate = new Date(dob);
          const today = new Date();
          let age = today.getFullYear() - birthDate.getFullYear();
          const monthDifference = today.getMonth() - birthDate.getMonth();
  
          // Adjust age if the birthday hasn't occurred yet this year
          if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
              age--;
          }
          return age;
      }
  
      // Calculate age when the DOM is fully loaded
      document.addEventListener('DOMContentLoaded', function() {
          const dobInput = document.getElementById('patientBD');
          const ageInput = document.getElementById('patientAge');
  
          // Calculate and set age initially
          const dobValue = dobInput.value;
          if (dobValue) {
              ageInput.value = calculateAge(dobValue);
          }
      });
  
    </script>  
</body>
</html>

