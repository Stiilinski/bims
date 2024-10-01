@include('layouts.headHealthWorkers')
<style>
    .card-body {
        overflow: auto;
    }
    
    .pagetitle {
        display: flex;
        justify-content: space-between;
    }

    .form-control {
        width: 450px;
    }

    .modal-body {
        display: flex;
        flex-direction: column
    }

    .personalInfo {
        display: flex;
        justify-content: space-evenly;
    }

    .inputGroup {
        display: flex;
        justify-content: space-evenly;
    }

    .grpField {
        width: 150px!important;
    }

    .bmiInput {
        width: 100px!important;
    }

    .smokers {
        border: solid 1px #dee2e6;
        display: flex;
        align-items: center;
        padding: 10px;
        margin-left: 2px;
        border-radius: 0.375rem;
        width: 100%;
    }

    .smokersCon {
    
    }

    .grpField2 {
        width: 100%!important;
    }

    .inputGroup2 {
        display: flex;
        width: 100%!important;
        overflow: hidden;
        justify-content: space-between;
        align-items: center;
        
    }

    .medicines {
        width: 70%!important;
    }

    .quants {
        width: 300px!important;
    }

    .signature-container {
        position: relative;
    }

    #signaturePad, #signaturePad1, #signaturePad2 {
        width: 100%;
        height: 100px;
        border: 1px solid #ccc;
    }

    .yearSupply {
        display: flex;
        justify-content: center;
        align-items: center;
        
    }

    .yearMed {
        font-weight: 700!important;
    }


    .select2-selection {
        border: none!important;
    }

    .select2-container--default {
        height: 37.6px!important;
        padding: .375rem 2.25rem .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        border: #dee2e6 solid 1px;
        border-radius: 0.375rem; 
        background-color: #fff;
    }

    .familyHistoryCon {
        border: #dee2e6 solid 1px;
        border-radius: 0.375rem; 
        padding: 10px;
        width: 450px;
    }

    .smokerChoice {
        display: flex;
        justify-content: space-evenly
    }

    .rightCornerCon {
        border: #dee2e6 solid 1px;
        border-radius: 0.375rem; 
        padding: 10px;
        width: 450px;
    }

    .rightContentCon, .leftContentCon {
        border: #dee2e6 solid 1px;
        border-radius: 0.375rem; 
        padding: 10px;
        width: 100%;
    }

    .bloodGlocuse {
        width: 250px;
    }

</style>
<body>

  <!-- ======= Header ======= -->
    @include('layouts.headerHealthWorkers')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('layouts.sidebarHealthWorkers')
  <!-- End Sidebar -->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>CVD/NCD Risk Assessment Form</h1>
        <div class="btnArea">
            <button type="button" class="btn btn-primary"><i class="bi bi-printer-fill"></i> Print</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">New Record</button>  
        </div>
    </div><!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
            <!-- Table with stripped rows -->
            <table class="table table-striped datatable">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">BirthDate</th>
                    <th scope="col">Age</th>
                    <th scope="col">Civil Status</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Address</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
          <!-- End Table with stripped rows -->
        </div>
    </div>

      <!-- Extra Large Modal -->
      <div class="modal fade" id="ExtralargeModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">CVD/NCD RISK ASSESSMENT FORM</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form> <!-- Horizontal Form -->
            @csrf
                <div class="modal-body">
                    <div class="titlePart">
                        <h3>Personal Information</h3>
                    </div>
                    <div class="personalInfo">
                        <div class="inputField1"> 
                            <div class="column mb-3">
                                <label for="inputDateAssessment" class="col-sm-5 col-form-label">Date Of Assesment</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputDateAssessment" name="inputDateAssessment">
                                </div>
                            </div>

                            <div class="column mb-3" style="display: flex; flex-direction: column;">
                                <label for="fullName" class="form-label">Full Name</label>
                                <select id="fullName" class="form-select" name="fullName">
                                    <option selected disabled>Choose...</option>
                                    <option value="1">John Doe</option>
                                    <option value="2">Jane Smith</option>
                                    <option value="3">Michael Johnson</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>

                            <div class="column mb-3">
                                <label for="inputbDate" class="col-sm-5 col-form-label">Birth Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputbDate" name="inputbDate">
                                </div>
                            </div>

                            <div class="column mb-3">
                                <label for="inputBox" class="col-sm-5 col-form-label">Age</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputBox" name="qtBox">
                                </div>
                            </div>
                            

                            <div class="column mb-3">
                                <label for="inputSex" class="col-sm-5 col-form-label">Sex</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSex" name="inputSex">
                                </div>
                            </div>
                        </div>

                        <div class="inputField2"> 
                            <div class="column mb-3">
                                <label for="inputCivil" class="col-sm-5 col-form-label">Civil Status</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputCivil" name="inputCivil">
                                </div>
                            </div>

                            <div class="column mb-3">
                                <label for="inputAddress" class="col-sm-5 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputAddress" name="inputAddress">
                                </div>
                            </div>

                            <div class="column mb-3">
                                <label for="inputOccupation" class="col-sm-5 col-form-label">Occupation</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputOccupation" name="inputOccupation">
                                </div>
                            </div>

                            <div class="column mb-3">
                                <label for="inputContact" class="col-sm-5 col-form-label">Contact Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputContact" name="inputContact">
                                </div>
                            </div>

                            <div class="column mb-3">
                                <label for="inputEd" class="col-sm-5 col-form-label">Educational Attainment</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEd" name="inputEd">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="personalInfo">
                        <div class="inputField1" style="gap: 10px; display:flex; flex-direction:column;">
                            <div class="familyHistoryCon">
                                <div class="titlePart">
                                    <h3>Family History</h3>
                                    <p>Does Patient Have First Degree Relative With:</p>
                                </div>

                                <!-- Hypertension -->
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-5 pt-0">Hypertension:</legend>
                                    <div class="col-sm-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hypertension" id="hypertension_yes" value="Yes">
                                            <label class="form-check-label" for="hypertension_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hypertension" id="hypertension_no" value="No">
                                            <label class="form-check-label" for="hypertension_no">No</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <!-- Stroke -->
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-5 pt-0">Stroke:</legend>
                                    <div class="col-sm-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="stroke" id="stroke_yes" value="Yes">
                                            <label class="form-check-label" for="stroke_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="stroke" id="stroke_no" value="No">
                                            <label class="form-check-label" for="stroke_no">No</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <!-- Heart Attack -->
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-5 pt-0">Heart Attack:</legend>
                                    <div class="col-sm-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="heart_attack" id="heart_attack_yes" value="Yes">
                                            <label class="form-check-label" for="heart_attack_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="heart_attack" id="heart_attack_no" value="No">
                                            <label class="form-check-label" for="heart_attack_no">No</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <!-- Diabetes -->
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-5 pt-0">Diabetes:</legend>
                                    <div class="col-sm-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="diabetes" id="diabetes_yes" value="Yes">
                                            <label class="form-check-label" for="diabetes_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="diabetes" id="diabetes_no" value="No">
                                            <label class="form-check-label" for="diabetes_no">No</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <!-- Asthma -->
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-5 pt-0">Asthma:</legend>
                                    <div class="col-sm-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="asthma" id="asthma_yes" value="Yes">
                                            <label class="form-check-label" for="asthma_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="asthma" id="asthma_no" value="No">
                                            <label class="form-check-label" for="asthma_no">No</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <!-- Cancer -->
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-5 pt-0">Cancer:</legend>
                                    <div class="col-sm-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="cancer" id="cancer_yes" value="Yes">
                                            <label class="form-check-label" for="cancer_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="cancer" id="cancer_no" value="No">
                                            <label class="form-check-label" for="cancer_no">No</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <!-- Kidney Disease -->
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-5 pt-0">Kidney Disease:</legend>
                                    <div class="col-sm-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="kidney_disease" id="kidney_disease_yes" value="Yes">
                                            <label class="form-check-label" for="kidney_disease_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="kidney_disease" id="kidney_disease_no" value="No">
                                            <label class="form-check-label" for="kidney_disease_no">No</label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="familyHistoryCon">
                                <!-- OBESITY -->
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-5 pt-0"><h5>Obesity:</h5></legend>
                                    <div class="col-sm-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="obesity" id="obesity_yes" value="Yes">
                                            <label class="form-check-label" for="obesity_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="obesity" id="obesity_no" value="No">
                                            <label class="form-check-label" for="obesity_no">No</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="inputGroup">
                                    <div class="column mb-3">
                                        <label for="inputOHt" class="col-sm-12 col-form-label">Height (cm)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control bmiInput" id="inputOHt" name="inputOHt">
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="inputOWt" class="col-sm-12 col-form-label">Weight (kg)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control bmiInput" id="inputOWt" name="inputOWt">
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="inputBmi" class="col-sm-5 col-form-label">BMI</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control bmiInput" id="inputBmi" name="inputBmi" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- ADIPOSITY -->
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-5 pt-0"><h5>Central Adiposity:</h5></legend>
                                    <div class="col-sm-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="adposity" id="adposity_yes" value="Yes">
                                            <label class="form-check-label" for="adposity_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="adposity" id="adposity_no" value="No">
                                            <label class="form-check-label" for="adposity_no">No</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="column mb-3">
                                    <label for="inputOHt" class="col-sm-12 col-form-label">Waist Circumference (cm)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputOHt" name="inputOHt" style="width:400px;">
                                    </div>
                                </div>

                                
                                <!-- RAISED BP -->
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-5 pt-0"><h5>Raised BP</h5></legend>
                                    <div class="col-sm-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="raisedBp" id="raisedBp_yes" value="Yes">
                                            <label class="form-check-label" for="raisedBp_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="raisedBp" id="raisedBp_no" value="No">
                                            <label class="form-check-label" for="raisedBp_no">No</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="inputGroup" style="display: flex; flex-direction:column; gap:10px;">
                                    <div class="row">
                                        <!-- Systolic -->
                                        <div class="col-sm-12 mb-3">
                                            <label for="inputSystolic1" class="col-form-label">Systolic:</label>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control bmiInput" id="inputSystolic1" name="inputSystolic1" placeholder="1st">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control bmiInput" id="inputSystolic2" name="inputSystolic2" placeholder="2nd">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control bmiInput" id="inputSystolic3" name="inputSystolic3" placeholder="Average">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Diastolic -->
                                        <div class="col-sm-12 mb-3">
                                            <label for="inputDiastolic1" class="col-form-label">Diastolic:</label>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control bmiInput" id="inputDiastolic1" name="inputDiastolic1" placeholder="1st">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control bmiInput" id="inputDiastolic2" name="inputDiastolic2" placeholder="2nd">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control bmiInput" id="inputDiastolic3" name="inputDiastolic3" placeholder="Average">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <p>Always get the average of two readings Obtained at least 2 minutes apart.</p>
                                </div>
                            </div>
                        </div>{{--END OF LEFT SIDE--}}


                        <div class="inputField2" style="gap: 10px; display:flex; flex-direction:column;">
                            <div class="rightCornerCon">
                                <div class="titlePart">
                                    <h3>Smoking (Tobacco/Cigarette)</h3>
                                </div>

                                <div class="smokerChoice">
                                    <div class="smoker1">    
                                        {{-- NEVER SMOKE --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-12 offset-sm-0">
                                                <div class="form-check">
                                                <input class="form-check-input" name="smokerFaq[]" type="checkbox" id="neverSmoke" value="Never Smoke">
                                                    <label class="form-check-label" for="neverSmoke">
                                                        Never Smoke
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- CURRENT SMOKER --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-12 offset-sm-0">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="smokerFaq[]" type="checkbox" id="currentSmoker" value="currentSmoker">
                                                    <label class="form-check-label" for="currentSmoker">
                                                        Current Smoker
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- PASSIVE SMOKER --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-12 offset-sm-0">
                                                <div class="form-check">
                                                <input class="form-check-input" name="smokerFaq[]" type="checkbox" id="passiveSmoker" value="Passive Smoker">
                                                    <label class="form-check-label" for="passiveSmoker">
                                                        Passive Smoker
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="smoker2">
                                        {{-- MORE THAN A YEAR --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-12 offset-sm-0">
                                                <div class="form-check">
                                                <input class="form-check-input" name="smokerFaq[]" type="checkbox" id="moreYear" value="Stopped > A Year">
                                                    <label class="form-check-label" for="moreYear">
                                                        Stopped > A Year
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- LESS THAN A YEAR --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-12 offset-sm-0">
                                                <div class="form-check">
                                                <input class="form-check-input" name="smokerFaq[]" type="checkbox" id="lessYear" value="Stopped < A Year">
                                                <label class="form-check-label" for="lessYear">
                                                    Stopped < A Year
                                                </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="rightCornerCon">
                                <div class="titlePart">
                                    <h3>Alcohol Intake</h3>
                                </div>

                                <div class="alcoholChoice" style="display: flex; flex-direction:column">
                                    <div class="smoker1">    
                                        <!-- ALCOHOL INTAKE-->
                                        <fieldset class="row mb-5">
                                            <div class="col-sm-12" style="display: flex;">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="alcoholIntake" id="never_consumed" value="Never Consumed">
                                                    <label class="form-check-label" for="never_consumed">Never Consumed</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="alcoholIntake" id="alcohol_yes" value="Yes">
                                                    <label class="form-check-label" for="alcohol_yes">Yes</label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="smoker2">
                                        <div class="titlePart">
                                            <h3>Excessive Alcohol Intake</h3>
                                            <p>In the past month, had 5 drinks in a row for male or 4 drink in a row for female in one occasion</p>
                                        </div>

                                        <!--EXCESSIVE ALCOHOL INTAKE-->
                                        <fieldset class="row mb-5">
                                            <div class="col-sm-12" style="display: flex;">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="exAlcoholIntake" id="exAlcohol_yes" value="Yes">
                                                    <label class="form-check-label" for="exAlcohol_yes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="exAlcoholIntake" id="exAlcohol_no" value="No">
                                                    <label class="form-check-label" for="exAlcohol_no">No</label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <div class="rightCornerCon">
                                <div class="smoker2">
                                    <div class="titlePart">
                                        <h3>High Fat/Salt Food Intake</h3>
                                        <p>Eats processed/fast foods(e.g. Instant noodles, hamburgers, fries, fried chicken skin, etc.) Weekly</p>
                                    </div>

                                    <!--High Fat/Salt Food INTAKE-->
                                    <fieldset class="row mb-5">
                                        <div class="col-sm-12" style="display: flex;">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="fatSaltIntake" id="fatSaltIntake_yes" value="Yes">
                                                <label class="form-check-label" for="fatSaltIntake_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="fatSaltIntake" id="fatSaltIntakel_no" value="No">
                                                <label class="form-check-label" for="fatSaltIntake_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="rightCornerCon">
                                <div class="smoker2">
                                    <div class="titlePart">
                                        <h3>Dietary Fiber Intake</h3>
                                    </div>

                                    <!--DIETARY FIBER INTAKE-->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-7 pt-0">3 Servings of Vegetable Daily:</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hypertension" id="hypertension_yes" value="Yes">
                                                <label class="form-check-label" for="hypertension_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hypertension" id="hypertension_no" value="No">
                                                <label class="form-check-label" for="hypertension_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-7 pt-0">2 - 3 Servings of Fruit Daily:</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hypertension" id="hypertension_yes" value="Yes">
                                                <label class="form-check-label" for="hypertension_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hypertension" id="hypertension_no" value="No">
                                                <label class="form-check-label" for="hypertension_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="rightCornerCon">
                                <div class="smoker2">
                                    <div class="titlePart">
                                        <h3>Physical Activity</h3>
                                        <p>Does at least 75mins/week of vigorous-intensity physical activity of 2 ½ hrs/week of moderate-intensity physical activity?</p>
                                    </div>

                                    <!--DIETARY FIBER INTAKE-->
                                    <fieldset class="row mb-3">
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="physicalAct" id="physicalAct_yes" value="Yes">
                                                <label class="form-check-label" for="physicalAct_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="physicalAct" id="physicalAct_no" value="No">
                                                <label class="form-check-label" for="physicalAct_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="rightCornerCon" style="width:100%; margin-top:5px;">
                        <div class="smoker2">
                            <div class="column mb-3">
                                <label for="inputAssessed" class="col-sm-5 col-form-label">Assessed By:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputAssessed" name="inputAssessed" style="width:100%;">
                                </div>
                            </div>

                            <div class="signature-container">
                                <label for="signaturePad1" class="form-label">Name & Signature</label>
                                <canvas id="signaturePad1" name="signaturePad1"></canvas>
                                <button type="button" id="clearSignature1" class="btn btn-danger mt-2">Clear</button>
                            </div>
                            
                            <div class="signature-container">
                                <label for="signaturePad2" class="form-label">Name & Signature</label>
                                <canvas id="signaturePad2" name="signaturePad2"></canvas>
                                <button type="button" id="clearSignature2" class="btn btn-danger mt-2">Clear</button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="rightCornerCon" style="width:100%; margin-top:5px; display: flex; flex-direction:column; gap:10px;">
                        <!-- Questionnaire -->
                        <fieldset class="row mb-3">
                            <p><b>Questionnaire to Determine Probable Angina, Heart Attack, Stroke or Transient Ischemic Attack Angina or Heart Attack</b></p>
                            <div class="col-sm-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire" id="questionnaire_yes" value="Yes">
                                    <label class="form-check-label" for="questionnaire_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire" id="questionnaire_no" value="No">
                                    <label class="form-check-label" for="questionnaire_no">No</label>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="row mb-3">
                            <p>1. Have you had any pain or discomfort or any pressure or heaviness in your chest? <i>Nakakarandam ka ba ng pananakit o kabigatan sa iyong dibdib?</i></p>
                            <div class="col-sm-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire1" id="questionnaire1_yes" value="Yes">
                                    <label class="form-check-label" for="questionnaire1_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire1" id="questionnaire1_no" value="No">
                                    <label class="form-check-label" for="questionnaire1_no">No</label>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="row mb-3">
                            <p>2. Do you get the pain in the center of the chest or left chest or left arm? <i>Ang sakit ba ay nasa gitna ng dibdib, sa kaliwang bahagi ng dibdib o sa kaliwang braso?</i></p>
                            <div class="col-sm-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire2" id="questionnaire2_yes" value="Yes">
                                    <label class="form-check-label" for="questionnaire1_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire2" id="questionnaire2_no" value="No">
                                    <label class="form-check-label" for="questionnaire2_no">No</label>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="row mb-3">
                            <p>3. Do you get it when you walk uphill or hurry? <i>Nararamdaman mo ba ito kung ikaw ay nagmamadali o naglalakad nang mabilis o paakyat?</i></p>
                            <div class="col-sm-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire3" id="questionnaire3_yes" value="Yes">
                                    <label class="form-check-label" for="questionnaire3_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire3" id="questionnaire3_no" value="No">
                                    <label class="form-check-label" for="questionnaire3_no">No</label>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="row mb-3">
                            <p>4. Do you slowdown if you get the pain while walking? <i>Tumitigil kaba sa paglalakad kapag sumasakit ang iyong dibdib?</i></p>
                            <div class="col-sm-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire4" id="questionnaire4_yes" value="Yes">
                                    <label class="form-check-label" for="questionnaire4_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire4" id="questionnaire4_no" value="No">
                                    <label class="form-check-label" for="questionnaire4_no">No</label>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="row mb-3">
                            <p>5. Does the pain goes away if stand still or if you have take a tablet under the tongue? <i>Nawawala ba ang sakit kapag ikaw ay di kumikilos o kapag naglalagay ng gamot sa ilalim ng iyong dila?</i></p>
                            <div class="col-sm-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire5" id="questionnaire5_yes" value="Yes">
                                    <label class="form-check-label" for="questionnaire5_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire5" id="questionnaire5_no" value="No">
                                    <label class="form-check-label" for="questionnaire5_no">No</label>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="row mb-3">
                            <p>6. Does the pain go away less than 10 seconds? <i>Nawawala ba ang sakit sa loob ng 10 minuto?</i></p>
                            <div class="col-sm-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire6" id="questionnaire6_yes" value="Yes">
                                    <label class="form-check-label" for="questionnaire6_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire6" id="questionnaire6_no" value="No">
                                    <label class="form-check-label" for="questionnaire6_no">No</label>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="row mb-3">
                            <p>7. Have you ever had a severe chest pain across the front of your chest lasting for half an hour of more? <i>Nakaramdam ka na ba ng pananakit ng dibdib na tumagal ng kalahating oras o higit pa?</i></p>
                            <div class="col-sm-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire7" id="questionnaire7_yes" value="Yes">
                                    <label class="form-check-label" for="questionnaire7_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire7" id="questionnaire7_no" value="No">
                                    <label class="form-check-label" for="questionnaire7_no">No</label>
                                </div>
                            </div>
                        </fieldset>

                        <p>IF the answer to Questions 3 or 4 or 5 or 6 or 7 is YES, patient may have angina or heart attack and needs to see the doctor</p>
                        
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-10 pt-0"><p><b>Stroke and TIA</b></p></legend>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaireStroke" id="questionnaireStroke_yes" value="Yes">
                                    <label class="form-check-label" for="questionnaireStroke_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaireStroke" id="questionnaireStroke_no" value="No">
                                    <label class="form-check-label" for="qquestionnaireStroke_no">No</label>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="row mb-3">
                            <p>8. Have you ever had any of the following: difficulty in talking, weakness of arm and or leg on one side of the body or numbness on one side of the body? <i>Nakaramdam ka na ba ng mga sumusunod: Hirap sa pagsasalita, paghihina sa braso at/o ng binti o pamamanhid sa kalahating bahagi ng katawan?</i></p>
                            <div class="col-sm-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire8" id="questionnaire8_yes" value="Yes">
                                    <label class="form-check-label" for="questionnaire8_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionnaire8" id="questionnaire8_no" value="No">
                                    <label class="form-check-label" for="questionnaire8_no">No</label>
                                </div>
                            </div>
                        </fieldset>

                        <p>IF the answer to Questions 8 is YES, the patient may have had TIA or Stroke and needs to see the doctor</p>
                    </div>

                    <hr>

                    <div class="contentCon" style="width:100%; margin-top:5px; display: flex; flex-direction:row; gap:10px;">
                       <div class="rightContentCon">
                            <h5>Presence or absence of diabetes</h5>
                            <p>1. Was patient diagnosed as having diabetes?</p>
                            {{-- Yes Diabetes --}}
                            <div class="row mb-3">
                                <div class="col-sm-12 offset-sm-0">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="yesDiabetes" value="Yes">
                                        <label class="form-check-label" for="yesDiabetes">
                                            Yes
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- No Diabetes --}}
                            <div class="row mb-3">
                                <div class="col-sm-12 offset-sm-0">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="noDiabetes" value="No">
                                        <label class="form-check-label" for="noDiabetes">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- Don't Know Diabetes --}}
                            <div class="row mb-3">
                                <div class="col-sm-12 offset-sm-0">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="dkDiabetes" value="Do not know">
                                        <label class="form-check-label" for="dkDiabetes">
                                            Do not know
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- Medication--}}
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-3 pt-0">Medication</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="medications" id="withMedication" value="With Medication">
                                        <label class="form-check-label" for="withMedication">With Medication</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="medications" id="withoutMedication" value="Without Medication">
                                        <label class="form-check-label" for="withoutMedication">Without Medication</label>
                                    </div>
                                </div>
                            </fieldset>
                            <p>If No or Do Not Know, proceed to question 2</p>
                            <p>2. Does patient have following symptoms?</p>
                            {{-- symptoms--}}
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-3 pt-0">Polyphagia</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="polyphagia" id="polyphagiaYes" value="Yes">
                                        <label class="form-check-label" for="polyphagiaYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="polyphagia" id="polyphagiaNo" value="No">
                                        <label class="form-check-label" for="polyphagiaNo">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-3 pt-0">Polydipsia</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="polydipsia" id="polydipsiaYes" value="Yes">
                                        <label class="form-check-label" for="polydispiaYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="polydipsia" id="polydipsiao" value="No">
                                        <label class="form-check-label" for="polydipsiaNo">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-3 pt-0">Polyuria</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="polyuria" id="polyuriaYes" value="Yes">
                                        <label class="form-check-label" for="polyuriaYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="polyuria" id="polyuriaNo" value="No">
                                        <label class="form-check-label" for="polyuriaNo">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <p>if two or more of the above symptoms are present perform a blood glocuse test</p>
                       </div>

                       <div class="leftContentCon">
                            
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-10 pt-0"><h5><b>Raised Blood Glocuse</b></h5></legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rbg" id="rbgYes" value="Yes">
                                        <label class="form-check-label" for="rbgYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rbg" id="rbgNo" value="No">
                                        <label class="form-check-label" for="rbgNo">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="inputGroup">
                                <div class="column mb-3">
                                    <label for="inputFbs" class="col-sm-12 col-form-label">FBS/RBS</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control bloodGlocuse" id="inputFbs" name="inputFbs">
                                    </div>
                                </div>

                                <div class="column mb-3">
                                    <label for="inputDateTakenFbs" class="col-sm-12 col-form-label">Date Taken</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control bloodGlocuse" id="inputDateTakenFbs" name="inputDateTakenFbs">
                                    </div>
                                </div>
                            </div>
                            <p>If YES perform Urine Test for Ketones</p>

                            <hr>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-10 pt-0"><h5><b>Raised Blood Lipids</b></h5></legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rbl" id="rblYes" value="Yes">
                                        <label class="form-check-label" for="rblYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rbl" id="rblNo" value="No">
                                        <label class="form-check-label" for="rblNo">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="inputGroup">
                                <div class="column mb-3">
                                    <label for="inputChol" class="col-sm-12 col-form-label">Total Cholesterol</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control bloodGlocuse" id="inputChol" name="inputChol">
                                    </div>
                                </div>

                                <div class="column mb-3">
                                    <label for="inputDateTakenChol" class="col-sm-12 col-form-label">Date Taken</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control bloodGlocuse" id="inputDateTakenChol" name="inputDateTakenChol">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-10 pt-0"><h5><b>Presence of Urine Ketones</b></h5></legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ketones" id="ketonesYes" value="Yes">
                                        <label class="form-check-label" for="ketonesYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ketones" id="ketonesNo" value="No">
                                        <label class="form-check-label" for="ketonesNo">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="inputGroup">
                                <div class="column mb-3">
                                    <label for="inputUrket" class="col-sm-12 col-form-label">Urine Ketone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control bloodGlocuse" id="inputUrket" name="inputUrket">
                                    </div>
                                </div>

                                <div class="column mb-3">
                                    <label for="inputDateTakenUrket" class="col-sm-12 col-form-label">Date Taken</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control bloodGlocuse" id="inputDateTakenUrket" name="inputDateTakenUrket">
                                    </div>
                                </div>
                            </div>
                            
                            <hr>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-10 pt-0"><h5><b>Presence of Urine Protein</b></h5></legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="protein" id="proteinYes" value="Yes">
                                        <label class="form-check-label" for="proteinYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="protein" id="proteinNo" value="No">
                                        <label class="form-check-label" for="proteinNo">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="inputGroup">
                                <div class="column mb-3">
                                    <label for="inputProtein" class="col-sm-12 col-form-label">Urine Protein</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control bloodGlocuse" id="inputProtein" name="inputProtein">
                                    </div>
                                </div>

                                <div class="column mb-3">
                                    <label for="inputDateTakenPro" class="col-sm-12 col-form-label">Date Taken</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control bloodGlocuse" id="inputDateTakenPro" name="inputDateTakenPro">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-10 pt-0"><h5><b>Management</b></h5></legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="raManagement" id="lifestyle" value="Lifestyle Modification">
                                        <label class="form-check-label" for="lifestyle">Lifestyle Modification</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="raManagement" id="medication" value="Medication">
                                        <label class="form-check-label" for="medication">Medication</label>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="column mb-3">
                                <label for="inputRaFfUp" class="col-sm-5 col-form-label">Follow Up</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputRaFfUp" name="inputRaFfUp">
                                </div>
                            </div>
                       </div>
                    </div>

                    <div class="leftContentCon" style="margin-top: 10px; display:flex; gap:10px;">
                        <div class="leftCorner">
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-10 pt-0"><h5><b>Risk Level</b></h5></legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="riskLevel" id="riskLevel1" value="<10">
                                        <label class="form-check-label" for="riskLevel1"> &#60 10% </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="riskLevel" id="riskLevel2" value="10% To < 20%">
                                        <label class="form-check-label" for="riskLevel2">10% To &#60 20%</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="riskLevel" id="riskLevel3" value="20% To < 30%">
                                        <label class="form-check-label" for="riskLevel3">20% To &#60 30%</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="riskLevel" id="riskLevel4" value="≤ 30%">
                                        <label class="form-check-label" for="riskLevel4">&#8804 30%</label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="rightCorner">
                            <div class="column mb-3">
                                <label for="inputRaFinding" class="col-sm-5 col-form-label">Findings</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputRaFinding" name="inputRaFinding">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary">Save</button>
            </div>
        </form><!-- End Horizontal Form -->
          </div>
        </div>
      </div><!-- End Extra Large Modal-->

</main><!-- End #main Family Planning Naka Darren-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#fullName').select2({
            placeholder: "Choose...",
            allowClear: true
        });

        // Initialize Select2 on modal show
        $('#ExtralargeModal').on('shown.bs.modal', function () {
            $('#fullName').select2({
                dropdownParent: $('#ExtralargeModal')
            });
        });
    });
</script>

<script>
    // Get input elements
    const inputHeight = document.getElementById('inputOHt');
    const inputWeight = document.getElementById('inputOWt');
    const inputBMI = document.getElementById('inputBmi');
    const radioObesityYes = document.getElementById('obesity_yes');
    const radioObesityNo = document.getElementById('obesity_no');

    // Add event listeners to input fields for BMI calculation
    inputHeight.addEventListener('input', calculateBMI);
    inputWeight.addEventListener('input', calculateBMI);

    function calculateBMI() {
        // Retrieve height and weight values
        const height = parseFloat(inputHeight.value);
        const weight = parseFloat(inputWeight.value);

        // Calculate BMI
        if (height && weight) {
            const bmi = weight / ((height / 100) ** 2); // BMI formula (height in cm converted to meters)
            inputBMI.value = bmi.toFixed(1); // Display BMI with one decimal place

            // Automatically check "Yes" for Obesity if BMI is >= 25.0
            if (bmi >= 25.0) {
                radioObesityYes.checked = true;
            } else {
                radioObesityNo.checked = true;
            }
        } else {
            inputBMI.value = ''; // Clear BMI field if height or weight is not entered
            radioObesityYes.checked = false; // Uncheck "Yes" for Obesity if BMI cannot be calculated
        }
    }
</script>
  @include('layouts.footerHealthWorkers')
</body>

</html>