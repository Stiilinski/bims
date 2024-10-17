@include('layouts.headHealthWorkers')
<style>
    .card-body {
        overflow: auto;
    }
    
    .pagetitle {
        display: flex;
        justify-content: space-between;
    }

    /* .form-control {
        width: 450px;
    } */

    .modal-body {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .personalInfo {
        display: flex;
        justify-content: space-evenly;
        gap: 10px;
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

    .signature-container, .edit_signature-container {
        position: relative;
    }

    #signaturePad, #signaturePad1, #signaturePad2,
    #edit_signaturePad1, #edit_signaturePad2 {
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

    .inputGroupContainer {
        width: 100%;
        border: #ccc 1px solid;
        border-radius: 0.375rem;
        display: flex;
        flex-direction: column;
        padding-bottom: 10px;
        height: 100%;
    }

    .titleCaseFinding {
        width: 100%;
        border-bottom: #ccc 1px solid;
        padding: 10px;
        background-color: #acabab
    }

    .inputField1,.inputField2 {
        width: 100%;
    }

    .contentCon {
        padding: 15px;
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
                    <th scope="col" style="display: none;">Id</th>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">BirthDate</th>
                    <th scope="col">Civil Status</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($risk as $index => $risks)
                        </tr>
                            <td style="display: none;">{{ $risks->risk_id }}</td>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $risks->resident->res_lname }}, {{ $risks->resident->res_fname }} {{ $risks->resident->res_mname ?? '' }} {{ $risks->resident->res_suffix ?? '' }}</td>
                            <td>{{ $risks->resident->res_bdate}}</td>
                            <td>{{ $risks->resident->res_civil}}</td>
                            <td>{{ $risks->resident->res_sex }}</td>
                            <td>{{ $risks->risk_status }}</td>
                            <td>
                                <a href="{{ route('riskAssessmentForm', ['risk_id' => $risks->risk_id]) }}" class="btn btn-primary">View</a>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><button class="dropdown-item" type="button" onclick="openEditModal({{ $risks->risk_id }})">Edit</button></li>
                                        {{-- <li><button class="dropdown-item" type="button" onclick="updateFpStatus({{ $risks->risk_id }}, 'Archive')">Archive</button></li> --}}
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
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
            <form method="POST" action="{{ route('regValidation.riskInput') }}" class="riskInputForm" id="riskInputForm" autocomplete="off"> <!-- Horizontal Form -->
                @csrf
                <div class="modal-body">
                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>Personal Information</span>
                        </div>
                        <div class="contentCon">
                            <div class="personalInfo">
                                <div class="inputField1"> 
                                    <div class="column mb-3">
                                        <label for="inputDateAssessment" class="col-sm-5 col-form-label">Date Of Assesment</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="inputDateAssessment" name="inputDateAssessment">
                                            <span class="text-danger error-text inputDateAssessment_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3 pt-2">
                                        <label for="fullName" class="form-label">Full Name</label>
                                        <select id="fullName" class="form-control" style="width: 84%;" name="fullName" onchange="updateResidentDetails(this)">
                                            <option value="">Select...</option>
                                            @foreach($residents as $resident)
                                                <option value="{{ $resident->res_id }}">
                                                    {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text fullName_error"></span>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="inputbDate" class="col-sm-5 col-form-label">Birth Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="inputbDate" name="inputbDate" readonly>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="inputBox" class="col-sm-5 col-form-label">Age</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputBox" name="qtBox" readonly>
                                        </div>
                                    </div>
                                    

                                    <div class="column mb-3">
                                        <label for="inputSex" class="col-sm-5 col-form-label">Sex</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSex" name="inputSex" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="inputField2"> 
                                    <div class="column mb-3">
                                        <label for="inputCivil" class="col-sm-5 col-form-label">Civil Status</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputCivil" name="inputCivil" readonly>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="inputAddress" class="col-sm-5 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputAddress" name="inputAddress" readonly>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="inputOccupation" class="col-sm-5 col-form-label">Occupation</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputOccupation" name="inputOccupation" readonly>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="inputContact" class="col-sm-5 col-form-label">Contact Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputContact" name="inputContact" readonly>
                                        </div>
                                    </div>

                                    {{-- <div class="column mb-3">
                                        <label for="inputEd" class="col-sm-5 col-form-label">Educational Attainment</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEd" name="inputEd" readonly>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="personalInfo">
                        <div class="inputField1" style="gap: 10px; display:flex; flex-direction:column;">
                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    <span>Family History</span>
                                </div>
                                <div class="contentCon">
                                    <p>Does Patient Have First Degree Relative With:</p>
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
                            </div>

                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    <span>Obesity</span>
                                </div>
                                <div class="contentCon">
                                    <!-- OBESITY -->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-5 pt-0">Obesity:</legend>
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
                                        <legend class="col-form-label col-sm-5 pt-0">Central Adiposity:</legend>
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
                                        <label for="inputWc" class="col-sm-12 col-form-label">Waist Circumference (cm)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputWc" name="inputWc" style="width:400px;">
                                        </div>
                                    </div>

                                    
                                    <!-- RAISED BP -->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-5 pt-0">Raised BP</legend>
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
                            </div>
                        </div>{{--END OF LEFT SIDE--}}


                        <div class="inputField2" style="gap: 10px; display:flex; flex-direction:column;">
                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    <span>Smoking (Tobacco/Cigarette)</span>
                                </div>

                                <div class="contentCon">
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
                            </div>

                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    <span>Alcohol Intake</span>
                                </div>
                                <div class="contentCon" style="display: flex; flex-direction:column">
                                    <div class="smoker1">    
                                        <!-- ALCOHOL INTAKE-->
                                        <fieldset class="row mb-5">
                                            <div class="col-sm-12" style="display: flex;">
                                                <legend class="col-form-label col-sm-5 pt-0">Alcohol Intake:</legend>
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
                                            <legend class="col-form-label col-sm-5 pt-0">Excessive Alcohol Intake</legend>
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

                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    <span>High Fat/Salt Food Intake</span>
                                </div>
                                <div class="contentCon">
                                    <p>Eats processed/fast foods(e.g. Instant noodles, hamburgers, fries, fried chicken skin, etc.) Weekly</p>
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

                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    <span>Dietary Fiber Intake</span>
                                </div>
                                <div class="contentCon">
                                    <!--DIETARY FIBER INTAKE-->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-7 pt-0">3 Servings of Vegetable Daily:</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="vegetables" id="vegetables_yes" value="Yes">
                                                <label class="form-check-label" for="vegetables_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="vegetables" id="vegetables_no" value="No">
                                                <label class="form-check-label" for="vegetables_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-7 pt-0">2 - 3 Servings of Fruit Daily:</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="fruits" id="fruits_yes" value="Yes">
                                                <label class="form-check-label" for="fruits_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="fruits" id="fruits_no" value="No">
                                                <label class="form-check-label" for="fruits_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    <span>Physical Activity</span>
                                </div>
                                <div class="contentCon">
                                    <p>Does at least 75mins/week of vigorous-intensity physical activity of 2 ½ hrs/week of moderate-intensity physical activity?</p>
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

                    <div class="inputGroupContainer" style="width:100%; margin-top:5px;">
                        <div class="titleCaseFinding">
                            <span>Signatures</span>
                        </div>
                        <div class="contentCon">
                            <div class="column mb-3">
                                <label for="inputAssessed" class="col-sm-5 col-form-label">Assessed By:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputAssessed" name="inputAssessed" value="{{ $LoggedUserInfo ['em_id']}}" style="width:100%;">
                                </div>
                            </div>

                            <div class="signature-container">
                                <label for="signaturePad1" class="form-label">Name & Signature</label>
                                <canvas id="signaturePad1" name="signaturePad1"></canvas>
                                <input type="hidden" id="signature1" name="signature1">
                                <button type="button" id="clearSignature1" class="btn btn-danger mt-2">Clear</button>
                            </div>
                            
                            <div class="signature-container">
                                <label for="signaturePad2" class="form-label">Name & Signature</label>
                                <canvas id="signaturePad2" name="signaturePad2"></canvas>
                                <input type="hidden" id="signature2" name="signature2">
                                <button type="button" id="clearSignature2" class="btn btn-danger mt-2">Clear</button>
                            </div>
                        </div>
                    </div>

                    <div class="inputGroupContainer" style="width:100%; margin-top:5px; display: flex; flex-direction:column; gap:10px;">
                        <div class="titleCaseFinding">
                            <span>Questionnaire</span>
                        </div>
                        <div class="contentCon">
                            <!-- Questionnaire -->
                            <fieldset class="row mb-3">
                                <p><b>Questionnaire to Determine Probable Angina, Heart Attack, Stroke or Transient Ischemic Attack Angina or Heart Attack</b></p>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="result" id="result_yes" value="Yes">
                                        <label class="form-check-label" for="result_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="result" id="result_no" value="No">
                                        <label class="form-check-label" for="result_no">No</label>
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
                    </div>

                    <div class="contentCon" style="width:100%; margin-top:5px; display: flex; flex-direction:row; gap:10px;">
                       <div class="lefts" style="display: flex; flex-direction:column; width:100%; gap:10px;">
                            <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Presence or absence of diabetes</span>
                            </div>
                                <div class="contentCon">
                                    <p>1. Was patient diagnosed as having diabetes?</p>
                                    {{-- Yes Diabetes --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-12 offset-sm-0">
                                            <div class="form-check">
                                            <input class="form-check-input" name="diaDiabetes[]" type="checkbox" id="yesDiabetes" value="Yes">
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
                                            <input class="form-check-input" name="diaDiabetes[]" type="checkbox" id="noDiabetes" value="No">
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
                                            <input class="form-check-input" name="diaDiabetes[]" type="checkbox" id="dkDiabetes" value="Do not know">
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
                            </div>
                            
                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    Risk
                                </div>
                                <div class="contentCon">
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
                       </div>

                       
                       <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>Presence or absence of diabetes</span>
                        </div>
                        <div class="contentCon">   
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
                    </div>
                </div>
                <div class="alertCon">
                    <div id="alert-container"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form><!-- End Horizontal Form -->
          </div>
        </div>
      </div><!-- End Extra Large Modal-->

    <!-- EDIT Large Modal -->
    <div class="modal fade" id="editRaModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDIT CVD/NCD RISK ASSESSMENT FORM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="edit_riskInputForm" id="edit_riskInputForm" autocomplete="off"> <!-- Horizontal Form -->
                @csrf
                <div class="modal-body">
                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>Personal Information</span>
                        </div>
                        <div class="contentCon">
                            <div class="personalInfo">
                                <div class="inputField1"> 
                                    <input type="hidden" class="form-control" id="edit_riskId" name="edit_riskId">
                                    <div class="column mb-3">
                                        <label for="edit_inputDateAssessment" class="col-sm-5 col-form-label">Date Of Assesment</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="edit_inputDateAssessment" name="edit_inputDateAssessment">
                                            <span class="text-danger error-text edit_inputDateAssessment_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3 pt-2">
                                        <label for="edit_fullName" class="form-label">Full Name</label>
                                        <select id="edit_fullName" class="form-control" style="width: 84%;" name="edit_fullName" onchange="updateResidentDetails(this)">
                                            <option value="">Select...</option>
                                            @foreach($residents as $resident)
                                                <option value="{{ $resident->res_id }}">
                                                    {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text fullName_error"></span>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="inputbDate" class="col-sm-5 col-form-label">Birth Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="edit_inputbDate" name="edit_inputbDate" readonly>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_inputAge" class="col-sm-5 col-form-label">Age</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="edit_inputAge" name="edit_inputAge" readonly>
                                        </div>
                                    </div>
                                    

                                    <div class="column mb-3">
                                        <label for="edit_inputSex" class="col-sm-5 col-form-label">Sex</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="edit_inputSex" name="edit_inputSex" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="inputField2"> 
                                    <div class="column mb-3">
                                        <label for="edit_inputCivil" class="col-sm-5 col-form-label">Civil Status</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="edit_inputCivil" name="edit_inputCivil" readonly>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_inputAddress" class="col-sm-5 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="edit_inputAddress" name="edit_inputAddress" readonly>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_inputOccupation" class="col-sm-5 col-form-label">Occupation</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="edit_inputOccupation" name="edit_inputOccupation" readonly>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_inputContact" class="col-sm-5 col-form-label">Contact Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="edit_inputContact" name="edit_inputContact" readonly>
                                        </div>
                                    </div>
{{-- 
                                    <div class="column mb-3">
                                        <label for="edit_inputEd" class="col-sm-5 col-form-label">Educational Attainment</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="edit_inputEd" name="edit_inputEd" readonly>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="personalInfo">
                        <div class="inputField1" style="gap: 10px; display:flex; flex-direction:column;">
                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    <span>Family History</span>
                                </div>
                                <div class="contentCon">
                                    <p>Does Patient Have First Degree Relative With:</p>
                                    <!-- Hypertension -->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-5 pt-0">Hypertension:</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_hypertension" id="edit_hypertension_yes" value="Yes">
                                                <label class="form-check-label" for="edit_hypertension_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_hypertension" id="edit_hypertension_no" value="No">
                                                <label class="form-check-label" for="edit_hypertension_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- Stroke -->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-5 pt-0">Stroke:</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_stroke" id="edit_stroke_yes" value="Yes">
                                                <label class="form-check-label" for="edit_stroke_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_stroke" id="edit_stroke_no" value="No">
                                                <label class="form-check-label" for="edit_stroke_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- Heart Attack -->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-5 pt-0">Heart Attack:</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_heart_attack" id="edit_heart_attack_yes" value="Yes">
                                                <label class="form-check-label" for="edit_heart_attack_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_heart_attack" id="edit_heart_attack_no" value="No">
                                                <label class="form-check-label" for="edit_heart_attack_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- Diabetes -->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-5 pt-0">Diabetes:</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_diabetes" id="edit_diabetes_yes" value="Yes">
                                                <label class="form-check-label" for="edit_diabetes_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_diabetes" id="edit_diabetes_no" value="No">
                                                <label class="form-check-label" for="edit_diabetes_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- Asthma -->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-5 pt-0">Asthma:</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_asthma" id="edit_asthma_yes" value="Yes">
                                                <label class="form-check-label" for="edit_asthma_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_asthma" id="edit_asthma_no" value="No">
                                                <label class="form-check-label" for="edit_asthma_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- Cancer -->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-5 pt-0">Cancer:</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_cancer" id="edit_cancer_yes" value="Yes">
                                                <label class="form-check-label" for="edit_cancer_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_cancer" id="edit_cancer_no" value="No">
                                                <label class="form-check-label" for="edit_cancer_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- Kidney Disease -->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-5 pt-0">Kidney Disease:</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_kidney_disease" id="edit_kidney_disease_yes" value="Yes">
                                                <label class="form-check-label" for="edit_kidney_disease_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_kidney_disease" id="edit_kidney_disease_no" value="No">
                                                <label class="form-check-label" for="edit_kidney_disease_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    <span>Obesity</span>
                                </div>
                                <div class="contentCon">
                                    <!-- OBESITY -->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-5 pt-0">Obesity:</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_obesity" id="edit_obesity_yes" value="Yes">
                                                <label class="form-check-label" for="edit_obesity_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_obesity" id="edit_obesity_no" value="No">
                                                <label class="form-check-label" for="edit_obesity_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="inputGroup">
                                        <div class="column mb-3">
                                            <label for="edit_inputOHt" class="col-sm-12 col-form-label">Height (cm)</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control bmiInput" id="edit_inputOHt" name="edit_inputOHt">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_inputOWt" class="col-sm-12 col-form-label">Weight (kg)</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control bmiInput" id="edit_inputOWt" name="edit_inputOWt">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_inputBmi" class="col-sm-5 col-form-label">BMI</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control bmiInput" id="edit_inputBmi" name="edit_inputBmi" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- ADIPOSITY -->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-5 pt-0">Central Adiposity:</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_adposity" id="edit_adposity_yes" value="Yes">
                                                <label class="form-check-label" for="edit_adposity_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_adposity" id="edit_adposity_no" value="No">
                                                <label class="form-check-label" for="edit_adposity_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="column mb-3">
                                        <label for="edit_inputWc" class="col-sm-12 col-form-label">Waist Circumference (cm)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="edit_inputWc" name="edit_inputWc" style="width:400px;">
                                        </div>
                                    </div>

                                    
                                    <!-- RAISED BP -->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-5 pt-0">Raised BP</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_raisedBp" id="edit_raisedBp_yes" value="Yes">
                                                <label class="form-check-label" for="edit_raisedBp_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_raisedBp" id="edit_raisedBp_no" value="No">
                                                <label class="form-check-label" for="edit_raisedBp_no">No</label>
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
                                                        <input type="text" class="form-control bmiInput" id="edit_inputSystolic1" name="edit_inputSystolic1" placeholder="1st">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control bmiInput" id="edit_inputSystolic2" name="edit_inputSystolic2" placeholder="2nd">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control bmiInput" id="edit_inputSystolic3" name="edit_inputSystolic3" placeholder="Average">
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
                                                        <input type="text" class="form-control bmiInput" id="edit_inputDiastolic1" name="edit_inputDiastolic1" placeholder="1st">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control bmiInput" id="edit_inputDiastolic2" name="edit_inputDiastolic2" placeholder="2nd">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control bmiInput" id="edit_inputDiastolic3" name="edit_inputDiastolic3" placeholder="Average">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <p>Always get the average of two readings Obtained at least 2 minutes apart.</p>
                                    </div>
                                </div>
                            </div>
                        </div>{{--END OF LEFT SIDE--}}


                        <div class="inputField2" style="gap: 10px; display:flex; flex-direction:column;">
                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    <span>Smoking (Tobacco/Cigarette)</span>
                                </div>

                                <div class="contentCon">
                                    <div class="smokerChoice">
                                        <div class="smoker1">    
                                            {{-- NEVER SMOKE --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-12 offset-sm-0">
                                                    <div class="form-check">
                                                    <input class="form-check-input" name="edit_smokerFaq[]" type="checkbox" id="edit_neverSmoke" value="Never Smoke">
                                                        <label class="form-check-label" for="edit_neverSmoke">
                                                            Never Smoke
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- CURRENT SMOKER --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-12 offset-sm-0">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="edit_smokerFaq[]" type="checkbox" id="edit_currentSmoker" value="currentSmoker">
                                                        <label class="form-check-label" for="edit_currentSmoker">
                                                            Current Smoker
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- PASSIVE SMOKER --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-12 offset-sm-0">
                                                    <div class="form-check">
                                                    <input class="form-check-input" name="edit_smokerFaq[]" type="checkbox" id="edit_passiveSmoker" value="Passive Smoker">
                                                        <label class="form-check-label" for="edit_passiveSmoker">
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
                                                    <input class="form-check-input" name="edit_smokerFaq[]" type="checkbox" id="edit_moreYear" value="Stopped > A Year">
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
                                                    <input class="form-check-input" name="edit_smokerFaq[]" type="checkbox" id="edit_lessYear" value="Stopped < A Year">
                                                    <label class="form-check-label" for="lessYear">
                                                        Stopped < A Year
                                                    </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    <span>Alcohol Intake</span>
                                </div>
                                <div class="contentCon" style="display: flex; flex-direction:column">
                                    <div class="smoker1">    
                                        <!-- ALCOHOL INTAKE-->
                                        <fieldset class="row mb-5">
                                            <div class="col-sm-12" style="display: flex;">
                                                <legend class="col-form-label col-sm-5 pt-0">Alcohol Intake:</legend>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_alcoholIntake" id="edit_never_consumed" value="Never Consumed">
                                                    <label class="form-check-label" for="edit_never_consumed">Never Consumed</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_alcoholIntake" id="edit_alcohol_yes" value="Yes">
                                                    <label class="form-check-label" for="edit_alcohol_yes">Yes</label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="smoker2">
                                        <div class="titlePart">
                                            <legend class="col-form-label col-sm-5 pt-0">Excessive Alcohol Intake</legend>
                                            <p>In the past month, had 5 drinks in a row for male or 4 drink in a row for female in one occasion</p>
                                        </div>

                                        <!--EXCESSIVE ALCOHOL INTAKE-->
                                        <fieldset class="row mb-5">
                                            <div class="col-sm-12" style="display: flex;">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_exAlcoholIntake" id="edit_exAlcohol_yes" value="Yes">
                                                    <label class="form-check-label" for="edit_exAlcohol_yes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_exAlcoholIntake" id="edit_exAlcohol_no" value="No">
                                                    <label class="form-check-label" for="edit_exAlcohol_no">No</label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    <span>High Fat/Salt Food Intake</span>
                                </div>
                                <div class="contentCon">
                                    <p>Eats processed/fast foods(e.g. Instant noodles, hamburgers, fries, fried chicken skin, etc.) Weekly</p>
                                    <!--High Fat/Salt Food INTAKE-->
                                    <fieldset class="row mb-5">
                                        <div class="col-sm-12" style="display: flex;">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_fatSaltIntake" id="edit_fatSaltIntake_yes" value="Yes">
                                                <label class="form-check-label" for="edit_fatSaltIntake_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_fatSaltIntake" id="edit_fatSaltIntakel_no" value="No">
                                                <label class="form-check-label" for="edit_fatSaltIntake_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    <span>Dietary Fiber Intake</span>
                                </div>
                                <div class="contentCon">
                                    <!--DIETARY FIBER INTAKE-->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-7 pt-0">3 Servings of Vegetable Daily:</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_vegetables" id="edit_vegetables_yes" value="Yes">
                                                <label class="form-check-label" for="edit_vegetables_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_vegetables" id="edit_vegetables_no" value="No">
                                                <label class="form-check-label" for="edit_vegetables_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-7 pt-0">2 - 3 Servings of Fruit Daily:</legend>
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_fruits" id="edit_fruits_yes" value="Yes">
                                                <label class="form-check-label" for="edit_fruits_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_fruits" id="edit_fruits_no" value="No">
                                                <label class="form-check-label" for="edit_fruits_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    <span>Physical Activity</span>
                                </div>
                                <div class="contentCon">
                                    <p>Does at least 75mins/week of vigorous-intensity physical activity of 2 ½ hrs/week of moderate-intensity physical activity?</p>
                                    <!--DIETARY FIBER INTAKE-->
                                    <fieldset class="row mb-3">
                                        <div class="col-sm-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_physicalAct" id="edit_physicalAct_yes" value="Yes">
                                                <label class="form-check-label" for="edit_physicalAct_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_physicalAct" id="edit_physicalAct_no" value="No">
                                                <label class="form-check-label" for="edit_physicalAct_no">No</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="inputGroupContainer" style="width:100%; margin-top:5px;">
                        <div class="titleCaseFinding">
                            <span>Signatures</span>
                        </div>
                        <div class="contentCon">
                            <div class="column mb-3">
                                <label for="inputAssessed" class="col-sm-5 col-form-label">Assessed By:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edit_inputAssessed" name="edit_inputAssessed" value="{{ $LoggedUserInfo ['em_id']}}" style="width:100%;">
                                </div>
                            </div>

                            <div class="edit_signature-container">
                                <label for="edit_signaturePad1" class="form-label">Name & Signature</label>
                                <canvas id="edit_signaturePad1" name="edit_signaturePad1"></canvas>
                                <input type="hidden" id="edit_signature1" name="edit_signature1">
                                <button type="button" id="edit_clearSignature1" class="btn btn-danger mt-2">Clear</button>
                            </div>
                            
                            <div class="edit_signature-container">
                                <label for="edit_signaturePad2" class="form-label">Name & Signature</label>
                                <canvas id="edit_signaturePad2" name="edit_signaturePad2"></canvas>
                                <input type="hidden" id="edit_signature2" name="edit_signature2">
                                <button type="button" id="edit_clearSignature2" class="btn btn-danger mt-2">Clear</button>
                            </div>
                        </div>
                    </div>

                    <div class="inputGroupContainer" style="width:100%; margin-top:5px; display: flex; flex-direction:column; gap:10px;">
                        <div class="titleCaseFinding">
                            <span>Questionnaire</span>
                        </div>
                        <div class="contentCon">
                            <!-- Questionnaire -->
                            <fieldset class="row mb-3">
                                <p><b>Questionnaire to Determine Probable Angina, Heart Attack, Stroke or Transient Ischemic Attack Angina or Heart Attack</b></p>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_result" id="edit_result_yes" value="Yes">
                                        <label class="form-check-label" for="edit_result_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_result" id="edit_result_no" value="No">
                                        <label class="form-check-label" for="edit_result_no">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <p>1. Have you had any pain or discomfort or any pressure or heaviness in your chest? <i>Nakakarandam ka ba ng pananakit o kabigatan sa iyong dibdib?</i></p>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire1" id="edit_questionnaire1_yes" value="Yes">
                                        <label class="form-check-label" for="edit_questionnaire1_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire1" id="edit_questionnaire1_no" value="No">
                                        <label class="form-check-label" for="edit_questionnaire1_no">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <p>2. Do you get the pain in the center of the chest or left chest or left arm? <i>Ang sakit ba ay nasa gitna ng dibdib, sa kaliwang bahagi ng dibdib o sa kaliwang braso?</i></p>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire2" id="edit_questionnaire2_yes" value="Yes">
                                        <label class="form-check-label" for="edit_questionnaire1_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire2" id="edit_questionnaire2_no" value="No">
                                        <label class="form-check-label" for="edit_questionnaire2_no">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <p>3. Do you get it when you walk uphill or hurry? <i>Nararamdaman mo ba ito kung ikaw ay nagmamadali o naglalakad nang mabilis o paakyat?</i></p>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire3" id="edit_questionnaire3_yes" value="Yes">
                                        <label class="form-check-label" for="edit_questionnaire3_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire3" id="edit_questionnaire3_no" value="No">
                                        <label class="form-check-label" for="edit_questionnaire3_no">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <p>4. Do you slowdown if you get the pain while walking? <i>Tumitigil kaba sa paglalakad kapag sumasakit ang iyong dibdib?</i></p>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire4" id="edit_questionnaire4_yes" value="Yes">
                                        <label class="form-check-label" for="edit_questionnaire4_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire4" id="edit_questionnaire4_no" value="No">
                                        <label class="form-check-label" for="edit_questionnaire4_no">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <p>5. Does the pain goes away if stand still or if you have take a tablet under the tongue? <i>Nawawala ba ang sakit kapag ikaw ay di kumikilos o kapag naglalagay ng gamot sa ilalim ng iyong dila?</i></p>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire5" id="edit_questionnaire5_yes" value="Yes">
                                        <label class="form-check-label" for="edit_questionnaire5_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire5" id="edit_questionnaire5_no" value="No">
                                        <label class="form-check-label" for="edit_questionnaire5_no">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <p>6. Does the pain go away less than 10 seconds? <i>Nawawala ba ang sakit sa loob ng 10 minuto?</i></p>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire6" id="edit_questionnaire6_yes" value="Yes">
                                        <label class="form-check-label" for="edit_questionnaire6_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire6" id="edit_questionnaire6_no" value="No">
                                        <label class="form-check-label" for="edit_questionnaire6_no">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <p>7. Have you ever had a severe chest pain across the front of your chest lasting for half an hour of more? <i>Nakaramdam ka na ba ng pananakit ng dibdib na tumagal ng kalahating oras o higit pa?</i></p>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire7" id="edit_questionnaire7_yes" value="Yes">
                                        <label class="form-check-label" for="edit_questionnaire7_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire7" id="edit_questionnaire7_no" value="No">
                                        <label class="form-check-label" for="edit_questionnaire7_no">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <p>IF the answer to Questions 3 or 4 or 5 or 6 or 7 is YES, patient may have angina or heart attack and needs to see the doctor</p>
                            
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-10 pt-0"><p><b>Stroke and TIA</b></p></legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaireStroke" id="edit_questionnaireStroke_yes" value="Yes">
                                        <label class="form-check-label" for="edit_questionnaireStroke_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaireStroke" id="edit_questionnaireStroke_no" value="No">
                                        <label class="form-check-label" for="edit_questionnaireStroke_no">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3">
                                <p>8. Have you ever had any of the following: difficulty in talking, weakness of arm and or leg on one side of the body or numbness on one side of the body? <i>Nakaramdam ka na ba ng mga sumusunod: Hirap sa pagsasalita, paghihina sa braso at/o ng binti o pamamanhid sa kalahating bahagi ng katawan?</i></p>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire8" id="edit_questionnaire8_yes" value="Yes">
                                        <label class="form-check-label" for="edit_questionnaire8_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_questionnaire8" id="edit_questionnaire8_no" value="No">
                                        <label class="form-check-label" for="edit_questionnaire8_no">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <p>IF the answer to Questions 8 is YES, the patient may have had TIA or Stroke and needs to see the doctor</p>
                        </div>
                    </div>

                    <div class="contentCon" style="width:100%; margin-top:5px; display: flex; flex-direction:row; gap:10px;">
                        <div class="lefts" style="display: flex; flex-direction:column; width:100%; gap:10px;">
                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    <span>Presence or absence of diabetes</span>
                                </div>
                                <div class="contentCon">
                                    <p>1. Was patient diagnosed as having diabetes?</p>
                                    {{-- Yes Diabetes --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-12 offset-sm-0">
                                            <div class="form-check">
                                            <input class="form-check-input" name="edit_diaDiabetes[]" type="checkbox" id="edit_yesDiabetes" value="Yes">
                                                <label class="form-check-label" for="edit_yesDiabetes">
                                                    Yes
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- No Diabetes --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-12 offset-sm-0">
                                            <div class="form-check">
                                            <input class="form-check-input" name="edit_diaDiabetes[]" type="checkbox" id="edit_noDiabetes" value="No">
                                                <label class="form-check-label" for="edit_noDiabetes">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Don't Know Diabetes --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-12 offset-sm-0">
                                            <div class="form-check">
                                            <input class="form-check-input" name="edit_diaDiabetes[]" type="checkbox" id="edit_dkDiabetes" value="Do not know">
                                                <label class="form-check-label" for="edit_dkDiabetes">
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
                                                <input class="form-check-input" type="radio" name="edit_medications" id="edit_withMedication" value="With Medication">
                                                <label class="form-check-label" for="edit_withMedication">With Medication</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_medications" id="edit_withoutMedication" value="Without Medication">
                                                <label class="form-check-label" for="edit_withoutMedication">Without Medication</label>
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
                                                <input class="form-check-input" type="radio" name="edit_polyphagia" id="edit_polyphagiaYes" value="Yes">
                                                <label class="form-check-label" for="edit_polyphagiaYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_polyphagia" id="edit_polyphagiaNo" value="No">
                                                <label class="form-check-label" for="edit_polyphagiaNo">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-3 pt-0">Polydipsia</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_polydipsia" id="edit_polydipsiaYes" value="Yes">
                                                <label class="form-check-label" for="edit_polydispiaYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_polydipsia" id="edit_polydipsiao" value="No">
                                                <label class="form-check-label" for="edit_polydipsiaNo">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-3 pt-0">Polyuria</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_polyuria" id="edit_polyuriaYes" value="Yes">
                                                <label class="form-check-label" for="edit_polyuriaYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_polyuria" id="edit_polyuriaNo" value="No">
                                                <label class="form-check-label" for="edit_polyuriaNo">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <p>if two or more of the above symptoms are present perform a blood glocuse test</p>
                                </div>
                            </div>
                            
                            <div class="inputGroupContainer">
                                <div class="titleCaseFinding">
                                    Risk
                                </div>
                                <div class="contentCon">
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-10 pt-0"><h5><b>Risk Level</b></h5></legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_riskLevel" id="edit_riskLevel1" value="<10">
                                                <label class="form-check-label" for="edit_riskLevel1"> &#60 10% </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_riskLevel" id="edit_riskLevel2" value="10% To < 20%">
                                                <label class="form-check-label" for="edit_riskLevel2">10% To &#60 20%</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_riskLevel" id="edit_riskLevel3" value="20% To < 30%">
                                                <label class="form-check-label" for="edit_riskLevel3">20% To &#60 30%</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_riskLevel" id="edit_riskLevel4" value="≤ 30%">
                                                <label class="form-check-label" for="edit_riskLevel4">&#8804 30%</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                
        
                                    <div class="rightCorner">
                                        <div class="column mb-3">
                                            <label for="inputRaFinding" class="col-sm-5 col-form-label">Findings</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="edit_inputRaFinding" name="edit_inputRaFinding">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_inputStatus" class="form-label">Status</label>
                                        <select id="edit_inputStatus" class="form-select" name="edit_inputStatus">
                                            <option selected disabled>Choose...</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Archived">Archived</option>
                                        </select>
                                        <span class="text-danger error-text edit_inputStatus_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Presence or absence of diabetes</span>
                            </div>
                            <div class="contentCon">   
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-10 pt-0"><h5><b>Raised Blood Glocuse</b></h5></legend>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="edit_rbg" id="edit_rbgYes" value="Yes">
                                            <label class="form-check-label" for="edit_rbgYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="edit_rbg" id="edit_rbgNo" value="No">
                                            <label class="form-check-label" for="edit_rbgNo">No</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="inputGroup">
                                    <div class="column mb-3">
                                        <label for="inputFbs" class="col-sm-12 col-form-label">FBS/RBS</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control bloodGlocuse" id="edit_inputFbs" name="edit_inputFbs">
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="inputDateTakenFbs" class="col-sm-12 col-form-label">Date Taken</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control bloodGlocuse" id="edit_inputDateTakenFbs" name="edit_inputDateTakenFbs">
                                        </div>
                                    </div>
                                </div>
                                <p>If YES perform Urine Test for Ketones</p>

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-10 pt-0"><h5><b>Raised Blood Lipids</b></h5></legend>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="edit_rbl" id="edit_rblYes" value="Yes">
                                            <label class="form-check-label" for="edit_rblYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="edit_rbl" id="edit_rblNo" value="No">
                                            <label class="form-check-label" for="edit_rblNo">No</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="inputGroup">
                                    <div class="column mb-3">
                                        <label for="inputChol" class="col-sm-12 col-form-label">Total Cholesterol</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control bloodGlocuse" id="edit_inputChol" name="edit_inputChol">
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="inputDateTakenChol" class="col-sm-12 col-form-label">Date Taken</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control bloodGlocuse" id="edit_inputDateTakenChol" name="edit_inputDateTakenChol">
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-10 pt-0"><h5><b>Presence of Urine Ketones</b></h5></legend>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="edit_ketones" id="edit_ketonesYes" value="Yes">
                                            <label class="form-check-label" for="edit_ketonesYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="edit_ketones" id="edit_ketonesNo" value="No">
                                            <label class="form-check-label" for="edit_ketonesNo">No</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="inputGroup">
                                    <div class="column mb-3">
                                        <label for="inputUrket" class="col-sm-12 col-form-label">Urine Ketone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control bloodGlocuse" id="edit_inputUrket" name="edit_inputUrket">
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="inputDateTakenUrket" class="col-sm-12 col-form-label">Date Taken</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control bloodGlocuse" id="edit_inputDateTakenUrket" name="edit_inputDateTakenUrket">
                                        </div>
                                    </div>
                                </div>
                                
                                <hr>

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-10 pt-0"><h5><b>Presence of Urine Protein</b></h5></legend>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="edit_protein" id="edit_proteinYes" value="Yes">
                                            <label class="form-check-label" for="edit_proteinYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="edit_protein" id="edit_proteinNo" value="No">
                                            <label class="form-check-label" for="edit_proteinNo">No</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="inputGroup">
                                    <div class="column mb-3">
                                        <label for="inputProtein" class="col-sm-12 col-form-label">Urine Protein</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control bloodGlocuse" id="edit_inputProtein" name="edit_inputProtein">
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="inputDateTakenPro" class="col-sm-12 col-form-label">Date Taken</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control bloodGlocuse" id="edit_inputDateTakenPro" name="edit_inputDateTakenPro">
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-10 pt-0"><h5><b>Management</b></h5></legend>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="edit_raManagement" id="edit_lifestyle" value="Lifestyle Modification">
                                            <label class="form-check-label" for="edit_lifestyle">Lifestyle Modification</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="edit_raManagement" id="edit_medication" value="Medication">
                                            <label class="form-check-label" for="edit_medication">Medication</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="column mb-3">
                                    <label for="inputRaFfUp" class="col-sm-5 col-form-label">Follow Up</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="edit_inputRaFfUp" name="edit_inputRaFfUp">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alertCon">
                    <div id="alert-container3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form><!-- End Horizontal Form -->
            </div>
        </div>
    </div><!-- End EDIT Large Modal-->

</main><!-- End #main Family Planning Naka Darren-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    // Initialize resident data from PHP
    var residentData = @json($residents);
</script>
<script>
//*********************************************************
    $(document).ready(function () {
        $('#fullName').selectize({
            sortField: 'text'
        });
    });

    // When submitting the form, store the signature data (base64) in the hidden fields
    document.getElementById('riskInputForm').addEventListener('submit', function () {
        document.getElementById('signature1').value = signaturePad1.toDataURL(); // base64 image data
        document.getElementById('signature2').value = signaturePad2.toDataURL(); // base64 image data
    });

    // Get input elements
        const inputHeight = document.getElementById('inputOHt');
        const inputWeight = document.getElementById('inputOWt');
        const inputBMI = document.getElementById('inputBmi');
        const radioObesityYes = document.getElementById('obesity_yes');
        const radioObesityNo = document.getElementById('obesity_no');

    // Add event listeners to input fields for BMI calculation
        inputHeight.addEventListener('input', calculateBMI);
        inputWeight.addEventListener('input', calculateBMI);

    function calculateBMI() 
    {
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

    // Get input elements
        const edit_inputHeight = document.getElementById('edit_inputOHt');
        const edit_inputWeight = document.getElementById('edit_inputOWt');
        const edit_inputBMI = document.getElementById('edit_inputBmi');
        const edit_radioObesityYes = document.getElementById('edit_obesity_yes');
        const edit_radioObesityNo = document.getElementById('edit_obesity_no');

    // Add event listeners to input fields for BMI calculation
        edit_inputHeight.addEventListener('input', edit_calculateBMI);
        edit_inputWeight.addEventListener('input', edit_calculateBMI);

    function edit_calculateBMI() 
    {
        // Retrieve height and weight values
        const edit_height = parseFloat(edit_inputHeight.value);
        const edit_weight = parseFloat(edit_inputWeight.value);

        // Calculate BMI
        if (edit_height && edit_weight) {
            const edit_bmi = edit_weight / ((edit_height / 100) ** 2); // BMI formula (height in cm converted to meters)
            edit_inputBMI.value = edit_bmi.toFixed(1); // Display BMI with one decimal place

            // Automatically check "Yes" for Obesity if BMI is >= 25.0
            if (edit_bmi >= 25.0) {
                edit_radioObesityYes.checked = true;
            } else {
                edit_radioObesityNo.checked = true;
            }
        } else {
            edit_inputBMI.value = ''; // Clear BMI field if height or weight is not entered
            edit_radioObesityYes.checked = false; // Uncheck "Yes" for Obesity if BMI cannot be calculated
        }
    }

    function updateResidentDetails(selectElement) 
    {
        const selectedId = selectElement.value;

        if (selectedId) 
        {
            // Get resident data using the selected value (if available from backend)
            const residentInfo = residentData.find(resident => resident.res_id == selectedId);

            if (residentInfo) 
            {
                document.getElementById('inputAddress').value = residentInfo.res_address;
                document.getElementById('inputbDate').value = residentInfo.res_bdate;

                // Calculate age from the birthdate
                const birthDate = new Date(residentInfo.res_bdate);
                const age = calculateAge(birthDate);
                document.getElementById('inputBox').value = age;

                document.getElementById('inputOccupation').value = residentInfo.res_occupation;
                document.getElementById('inputContact').value = residentInfo.res_contact;
                document.getElementById('inputCivil').value = residentInfo.res_civil;
                //document.getElementById('inputEd').value = residentInfo.res_education;
                document.getElementById('inputSex').value = residentInfo.res_sex;
            }
        } 
        else 
        {
            // Clear fields if no resident is selected
            document.getElementById('inputAddress').value = '';
            document.getElementById('inputbDate').value = '';
            document.getElementById('inputBox').value = '';
            document.getElementById('inputOccupation').value = '';
            document.getElementById('inputContact').value = '';
            document.getElementById('inputCivil').value = '';
            // document.getElementById('inputEd').value = '';
            document.getElementById('inputSex').value = '';
        }
    }

    function calculateAge(birthDate) 
    {
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDifference = today.getMonth() - birthDate.getMonth();

        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        return age;
    }




    //FOR SIGNATURE EDIT
    document.addEventListener("DOMContentLoaded", function() {
        var canvas = document.getElementById('edit_signaturePad1');
        var signaturePad = new SignaturePad(canvas);

        function resizeCanvas() {
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
            signaturePad.clear(); // otherwise isEmpty() might return incorrect value
        }

        // Resize canvas when modal is shown
        var modal = document.getElementById('editRaModal');
        modal.addEventListener('shown.bs.modal', function () {
            resizeCanvas();
        });

        // Resize canvas on window resize
        window.addEventListener("resize", resizeCanvas);
        
        // Clear signature pad on button click
        document.getElementById('edit_clearSignature1').addEventListener('click', function() {
            signaturePad.clear();
        });
    });



    document.addEventListener("DOMContentLoaded", function() {
        var canvas = document.getElementById('edit_signaturePad2');
        var signaturePad = new SignaturePad(canvas);

        function resizeCanvas() {
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
            signaturePad.clear(); // otherwise isEmpty() might return incorrect value
        }

        // Resize canvas when modal is shown
        var modal = document.getElementById('editRaModal');
        modal.addEventListener('shown.bs.modal', function () {
            resizeCanvas();
        });

        // Resize canvas on window resize
        window.addEventListener("resize", resizeCanvas);
        
        // Clear signature pad on button click
        document.getElementById('edit_clearSignature2').addEventListener('click', function() {
            signaturePad.clear();
        });
    });


//*********************************************************

// CRUD
    //iNSERT
    $(function(){      
        $("#riskInputForm").on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function(){
                    $(document).find('span.error-text').text('');
                },
                success: function(data){
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val){
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        // Clear the form
                        $('#riskInputForm')[0].reset();

                        // Create and append the success alert
                        const alertHtml = `
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                ${data.msg} 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

                        // Append the alert to your alert container
                        $('#alert-container').append(alertHtml);

                        // Remove alert after 3 seconds
                        setTimeout(() => {
                            $('.alert').alert('close');
                            location.reload();
                        }, 1000);

                    }
                },
                error: function(xhr) {
                    const alertHtml = `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle me-1"></i>
                            Failed to add new Record. Please try again. 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
                    
                    $('#alert-container').append(alertHtml);

                        // Remove alert after 3 seconds
                        setTimeout(() => {
                            $('.alert').alert('close');
                        }, 3000);

                }
            });
        });
    });

    //display data dstb
    function openEditModal(risk_id) {
        $.ajax({
            url: `/riskDisp/${risk_id}`,
            method: 'GET',
            success: function(response) {
                if (response.status === 1) 
                {
                    //Textbox
                        $('#edit_riskId').val(response.data.risk_id);
                        $('#edit_inputDateAssessment').val(response.data.risk_dateAss);
                        let fullName = `${response.data.resident.res_lname}, ${response.data.resident.res_fname} ${response.data.resident.res_mname ?? ''} ${response.data.resident.res_suffix ?? ''}`;
                        $('#edit_fullName').val(response.data.resident.res_id);
                        $('#edit_inputbDate').val(response.data.resident.res_bdate);
                        // Calculate the age
                            let birthDate = new Date(response.data.resident.res_bdate);
                            let age = calculateAge(birthDate);
                        
                        // Set age in the input field
                        $('#edit_inputAge').val(age);
                        $('#edit_inputSex').val(response.data.resident.res_sex);
                        $('#edit_inputCivil').val(response.data.resident.res_civil);
                        $('#edit_inputAddress').val(response.data.resident.res_address);
                        $('#edit_inputOccupation').val(response.data.resident.res_occupation);
                        $('#edit_inputContact').val(response.data.resident.res_contact);
                        // $('#edit_inputSex').val(response.data.resident.res_sex);
                        $('#edit_inputOHt').val(response.data.risk_obHt);
                        $('#edit_inputOWt').val(response.data.risk_obWt);
                        $('#edit_inputBmi').val(response.data.risk_obBmi);
                        $('#edit_inputWc').val(response.data.risk_obWc);
                        $('#edit_inputSystolic1').val(response.data.risk_obSysFirst);
                        $('#edit_inputSystolic2').val(response.data.risk_obSysSec);
                        $('#edit_inputSystolic3').val(response.data.risk_obSysAve);
                        $('#edit_inputDiastolic1').val(response.data.risk_obDiaFirst);
                        $('#edit_inputDiastolic2').val(response.data.risk_obDiaSec);
                        $('#edit_inputDiastolic3').val(response.data.risk_obDiaAve);
                        $('#edit_inputFbs').val(response.data.risk_gloFbs);
                        $('#edit_inputDateTakenFbs').val(response.data.risk_gloDate);
                        $('#edit_inputChol').val(response.data.risk_lipChol);
                        $('#edit_inputDateTakenChol').val(response.data.risk_lipDate);
                        $('#edit_inputUrket').val(response.data.risk_ketone);
                        $('#edit_inputDateTakenUrket').val(response.data.risk_urDate);
                        $('#edit_inputProtein').val(response.data.risk_protein);
                        $('#edit_inputDateTakenPro').val(response.data.risk_proDate);
                        $('#edit_inputRaFfUp').val(response.data.risk_followUp);
                        $('#edit_inputRaFinding').val(response.data.risk_findings);
                        $('#edit_inputStatus').val(response.data.risk_status);



                    

                      
                    // Radio
                        let hypertension = response.data.risk_fhHypertension;
                            $('#edit_hypertension_yes').prop('checked', false);
                            $('#edit_hypertension_no').prop('checked', false);
                            if (hypertension === 'Yes') {
                                $('#edit_hypertension_yes').prop('checked', true);
                            } 
                            else if (hypertension === 'No') {
                                $('#edit_hypertension_no').prop('checked', true);
                            }

                        let stroke = response.data.risk_fhStroke;
                            $('#edit_stroke_yes').prop('checked', false);
                            $('#edit_stroke_no').prop('checked', false);
                            if (stroke === 'Yes') {
                                $('#edit_stroke_yes').prop('checked', true);
                            } 
                            else if (stroke === 'No') {
                                $('#edit_stroke_no').prop('checked', true);
                            }

                        let heartAttack = response.data.risk_fhHeartAttack;
                            $('#edit_heart_attack_yes').prop('checked', false);
                            $('#edit_heart_attack_no').prop('checked', false);
                            if (heartAttack === 'Yes') {
                                $('#edit_heart_attack_yes').prop('checked', true);
                            } 
                            else if (heartAttack === 'No') {
                                $('#edit_heart_attack_no').prop('checked', true);
                            }
                        
                        let diabetes = response.data.risk_fhDiabetes;
                            $('#edit_diabetes_yes').prop('checked', false);
                            $('#edit_diabetes_no').prop('checked', false);
                            if (diabetes === 'Yes') {
                                $('#edit_diabetes_yes').prop('checked', true);
                            } 
                            else if (diabetes === 'No') {
                                $('#edit_diabetes_no').prop('checked', true);
                            }

                        let asthma = response.data.risk_fhAsthma;
                            $('#edit_asthma_yes').prop('checked', false);
                            $('#edit_asthma_no').prop('checked', false);
                            if (asthma === 'Yes') {
                                $('#edit_asthma_yes').prop('checked', true);
                            } 
                            else if (asthma === 'No') {
                                $('#edit_asthma_no').prop('checked', true);
                            }

                        let cancer = response.data.risk_fhCancer;
                            $('#edit_cancer_yes').prop('checked', false);
                            $('#edit_cancer_no').prop('checked', false);
                            if (cancer === 'Yes') {
                                $('#edit_cancer_yes').prop('checked', true);
                            } 
                            else if (cancer === 'No') {
                                $('#edit_cancer_no').prop('checked', true);
                            }

                        let kidney = response.data.risk_fhKidney;
                            $('#edit_kidney_disease_yes').prop('checked', false);
                            $('#edit_kidney_disease_no').prop('checked', false);
                            if (kidney === 'Yes') {
                                $('#edit_kidney_disease_yes').prop('checked', true);
                            } 
                            else if (kidney === 'No') {
                                $('#edit_kidney_disease_no').prop('checked', true);
                            }
                        let obesity = response.data.risk_obObesity;
                            $('#edit_obesity_yes').prop('checked', false);
                            $('#edit_obesity_no').prop('checked', false);
                            if (obesity === 'Yes') {
                                $('#edit_obesity_yes').prop('checked', true);
                            } 
                            else if (obesity === 'No') {
                                $('#edit_obesity_no').prop('checked', true);
                            }
                        let adiposity = response.data.risk_obAdiposity;
                            $('#edit_adposity_yes').prop('checked', false);
                            $('#edit_adposity_no').prop('checked', false);
                            if (adiposity === 'Yes') {
                                $('#edit_adposity_yes').prop('checked', true);
                            } 
                            else if (adiposity === 'No') {
                                $('#edit_adposity_no').prop('checked', true);
                            }
                        let raisedBp = response.data.risk_obBp;
                            $('#edit_raisedBp_yes').prop('checked', false);
                            $('#edit_raisedBp_no').prop('checked', false);
                            if (raisedBp === 'Yes') {
                                $('#edit_raisedBp_yes').prop('checked', true);
                            } 
                            else if (raisedBp === 'No') {
                                $('#edit_raisedBp_no').prop('checked', true);
                            }
                        let alcohol = response.data.risk_alIntake;
                            $('#edit_never_consumed').prop('checked', false);
                            $('#edit_alcohol_yes').prop('checked', false);
                            if (alcohol === 'Never Consumed') {
                                $('#edit_never_consumed').prop('checked', true);
                            } 
                            else if (alcohol === 'Yes') {
                                $('#edit_alcohol_yes').prop('checked', true);
                            }
                        let exAlcohol = response.data.risk_alExcessive;
                            $('#edit_exAlcohol_yes').prop('checked', false);
                            $('#edit_exAlcohol_no').prop('checked', false);
                            if (raisedBp === 'Yes') {
                                $('#edit_exAlcohol_yes').prop('checked', true);
                            } 
                            else if (raisedBp === 'No') {
                                $('#edit_exAlcohol_no').prop('checked', true);
                            }
                        let highFat = response.data.risk_highFat;
                            $('#edit_fatSaltIntake_yes').prop('checked', false);
                            $('#edit_fatSaltIntake_no').prop('checked', false);
                            if (highFat === 'Yes') {
                                $('#edit_fatSaltIntake_yes').prop('checked', true);
                            } 
                            else if (highFat === 'No') {
                                $('#edit_fatSaltIntake_no').prop('checked', true);
                            }
                        let vege = response.data.risk_dfVege;
                            $('#edit_vegetables_yes').prop('checked', false);
                            $('#edit_vegetables_no').prop('checked', false);
                            if (vege === 'Yes') {
                                $('#edit_vegetables_yes').prop('checked', true);
                            } 
                            else if (vege === 'No') {
                                $('#edit_vegetables_no').prop('checked', true);
                            }
                        let fruit = response.data.risk_dfFruit;
                            $('#edit_fruits_yes').prop('checked', false);
                            $('#edit_fruits_no').prop('checked', false);
                            if (vege === 'Yes') {
                                $('#edit_fruits_yes').prop('checked', true);
                            } 
                            else if (vege === 'No') {
                                $('#edit_fruits_no').prop('checked', true);
                            }
                        let phyAct = response.data.risk_Pa;
                            $('#edit_physicalAct_yes').prop('checked', false);
                            $('#edit_physicalAct_no').prop('checked', false);
                            if (phyAct === 'Yes') {
                                $('#edit_physicalAct_yes').prop('checked', true);
                            } 
                            else if (phyAct === 'No') {
                                $('#edit_physicalAct_no').prop('checked', true);
                            }
                        let result1 = response.data.risk_qResult;
                            $('#edit_result_yes').prop('checked', false);
                            $('#edit_result_no').prop('checked', false);
                            if (result1 === 'Yes') {
                                $('#edit_result_yes').prop('checked', true);
                            } 
                            else if (result1 === 'No') {
                                $('#edit_result_yes').prop('checked', true);
                            }
                        let rq1 = response.data.risk_q1;
                            $('#edit_questionnaire1_yes').prop('checked', false);
                            $('#edit_questionnaire1_no').prop('checked', false);
                            if (rq1 === 'Yes') {
                                $('#edit_questionnaire1_yes').prop('checked', true);
                            } 
                            else if (rq1 === 'No') {
                                $('#edit_questionnaire1_no').prop('checked', true);
                            }
                        let rq2 = response.data.risk_q2;
                            $('#edit_questionnaire2_yes').prop('checked', false);
                            $('#edit_questionnaire2_no').prop('checked', false);
                            if (rq2 === 'Yes') {
                                $('#edit_questionnaire2_yes').prop('checked', true);
                            } 
                            else if (rq2 === 'No') {
                                $('#edit_questionnaire2_no').prop('checked', true);
                            }
                        let rq3 = response.data.risk_q3;
                            $('#edit_questionnaire3_yes').prop('checked', false);
                            $('#edit_questionnaire3_no').prop('checked', false);
                            if (rq3 === 'Yes') {
                                $('#edit_questionnaire3_yes').prop('checked', true);
                            } 
                            else if (rq3 === 'No') {
                                $('#edit_questionnaire3_no').prop('checked', true);
                            }
                        let rq4 = response.data.risk_q4;
                            $('#edit_questionnaire4_yes').prop('checked', false);
                            $('#edit_questionnaire4_no').prop('checked', false);
                            if (rq4 === 'Yes') {
                                $('#edit_questionnaire4_yes').prop('checked', true);
                            } 
                            else if (rq4 === 'No') {
                                $('#edit_questionnaire4_no').prop('checked', true);
                            }
                        let rq5 = response.data.risk_q5;
                            $('#edit_questionnaire5_yes').prop('checked', false);
                            $('#edit_questionnaire5_no').prop('checked', false);
                            if (rq5 === 'Yes') {
                                $('#edit_questionnaire5_yes').prop('checked', true);
                            } 
                            else if (rq5 === 'No') {
                                $('#edit_questionnaire5_no').prop('checked', true);
                            }
                        let rq6 = response.data.risk_q6;
                            $('#edit_questionnaire6_yes').prop('checked', false);
                            $('#edit_questionnaire6_no').prop('checked', false);
                            if (rq6 === 'Yes') {
                                $('#edit_questionnaire6_yes').prop('checked', true);
                            } 
                            else if (rq6 === 'No') {
                                $('#edit_questionnaire6_no').prop('checked', true);
                            }
                        let rq7 = response.data.risk_q7;
                            $('#edit_questionnaire7_yes').prop('checked', false);
                            $('#edit_questionnaire7_no').prop('checked', false);
                            if (rq7 === 'Yes') {
                                $('#edit_questionnaire7_yes').prop('checked', true);
                            } 
                            else if (rq7 === 'No') {
                                $('#edit_questionnaire7_no').prop('checked', true);
                            }
                        let result2 = response.data.risk_qStrokeResult;
                            $('#edit_questionnaireStroke_yes').prop('checked', false);
                            $('#edit_questionnaireStroke_no').prop('checked', false);
                            if (result2 === 'Yes') {
                                $('#edit_questionnaireStroke_yes').prop('checked', true);
                            } 
                            else if (result2 === 'No') {
                                $('#edit_questionnaireStroke_no').prop('checked', true);
                            }
                        let rq8 = response.data.risk_q8Stroke;
                            $('#edit_questionnaire8_yes').prop('checked', false);
                            $('#edit_questionnaire8_no').prop('checked', false);
                            if (rq8 === 'Yes') {
                                $('#edit_questionnaire8_yes').prop('checked', true);
                            } 
                            else if (rq8 === 'No') {
                                $('#edit_questionnaire8_no').prop('checked', true);
                            }

                        let dieMed = response.data.risk_diaMed;
                            $('#edit_withMedication').prop('checked', false);
                            $('#edit_withoutMedication').prop('checked', false);
                            if (dieMed === 'With Medication') {
                                $('#edit_withMedication').prop('checked', true);
                            } 
                            else if (dieMed === 'Without Medication') {
                                $('#edit_withoutMedication').prop('checked', true);
                            }
                        let symp1 = response.data.risk_diaSymp1;
                            $('#edit_polyphagiaYes').prop('checked', false);
                            $('#edit_polyphagiaNo').prop('checked', false);
                            if (rq8 === 'Yes') {
                                $('#edit_polyphagiaYes').prop('checked', true);
                            } 
                            else if (rq8 === 'No') {
                                $('#edit_polyphagiaNo').prop('checked', true);
                            }
                        let symp2 = response.data.risk_diaSymp2;
                            $('#edit_polydipsiaYes').prop('checked', false);
                            $('#edit_polydipsiaNo').prop('checked', false);
                            if (symp2 === 'Yes') {
                                $('#edit_polydipsiaYes').prop('checked', true);
                            } 
                            else if (symp2 === 'No') {
                                $('#edit_polydipsiaNo').prop('checked', true);
                            }
                        let symp3 = response.data.risk_diaSymp3;
                            $('#edit_polyuriaYes').prop('checked', false);
                            $('#edit_polyuriaNo').prop('checked', false);
                            if (symp3 === 'Yes') {
                                $('#edit_polyuriaYes').prop('checked', true);
                            } 
                            else if (symp3 === 'No') {
                                $('#edit_polyuriaNo').prop('checked', true);
                            }
                        let riskLvl = response.data.risk_level;
                            $('#edit_riskLevel1').prop('checked', false);
                            $('#edit_riskLevel2').prop('checked', false);
                            $('#edit_riskLevel3').prop('checked', false);
                            $('#edit_riskLevel4').prop('checked', false);
                            if (riskLvl === '<10') {
                                $('#edit_riskLevel1').prop('checked', true);
                            } 
                            else if (riskLvl === '10% To < 20%') {
                                $('#edit_riskLevel2').prop('checked', true);
                            }
                            else if (riskLvl === '20% To < 30%') {
                                $('#edit_riskLevel3').prop('checked', true);
                            }
                            else if (riskLvl === '≤ 30%') {
                                $('#edit_riskLevel4').prop('checked', true);
                            }
                        let rbg = response.data.risk_glocuse;
                            $('#edit_rbgYes').prop('checked', false);
                            $('#edit_rbgNo').prop('checked', false);
                            if (rbg === 'Yes') {
                                $('#edit_rbgYes').prop('checked', true);
                            } 
                            else if (rbg === 'No') {
                                $('#edit_rbgNo').prop('checked', true);
                            }
                        let lipids = response.data.risk_lipids;
                            $('#edit_rblYes').prop('checked', false);
                            $('#edit_rblNo').prop('checked', false);
                            if (lipids === 'Yes') {
                                $('#edit_rblYes').prop('checked', true);
                            } 
                            else if (lipids === 'No') {
                                $('#edit_rblNo').prop('checked', true);
                            }
                        let ketones = response.data.risk_urKetones;
                            $('#edit_ketonesYes').prop('checked', false);
                            $('#edit_ketonesNo').prop('checked', false);
                            if (ketones === 'Yes') {
                                $('#edit_ketonesYes').prop('checked', true);
                            } 
                            else if (ketones === 'No') {
                                $('#edit_ketonesNo').prop('checked', true);
                            }
                        let protein = response.data.risk_urProtein;
                            $('#edit_proteinYes').prop('checked', false);
                            $('#edit_proteinNo').prop('checked', false);
                            if (protein === 'Yes') {
                                $('#edit_proteinYes').prop('checked', true);
                            } 
                            else if (protein === 'No') {
                                $('#edit_proteinNo').prop('checked', true);
                            }
                        let manage = response.data.risk_management;
                            $('#edit_lifestyle').prop('checked', false);
                            $('#edit_medication').prop('checked', false);
                            if (manage === 'Lifestyle Modification') {
                                $('#edit_lifestyle').prop('checked', true);
                            } 
                            else if (manage === 'Medication') {
                                $('#edit_medication').prop('checked', true);
                            }

                    
                    // Checkbox
                        if (response.data.risk_smoker) 
                        {
                            let smoker = JSON.parse(response.data.risk_smoker);
                            $('input[name="edit_smokerFaq[]"]').prop('checked', false);
                            
                            smoker.forEach(function(value) 
                            {
                                $('input[name="edit_smokerFaq[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_smokerFaq[]"]').prop('checked', false);
                        }

                        if (response.data.risk_Diabetes) 
                        {
                            let diabetes = JSON.parse(response.data.risk_Diabetes);
                            $('input[name="edit_diaDiabetes[]"]').prop('checked', false);
                            
                            diabetes.forEach(function(value) 
                            {
                                $('input[name="edit_diaDiabetes[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_diaDiabetes[]"]').prop('checked', false);
                        }

                    // Open the modal
                        $('#editRaModal').modal('show');
                } 
                else 
                {
                    alert('Record not found');
                }
            },
            error: function() {
                alert('Failed to fetch data');
            }
        });
    }

    // uPDATE
    $(document).on('submit', '#edit_riskInputForm', function (e) {
        e.preventDefault(); // Prevent default form submission behavior

        var risk_id = $('#edit_riskId').val(); 

        // Create a FormData object with the form fields
        var formData = new FormData();
        // TextBoxes
            formData.append('edit_riskId', risk_id);
            formData.append('edit_inputDateAssessment', $('#edit_inputDateAssessment').val());
            formData.append('edit_fullName', $('#edit_fullName').val());
            formData.append('edit_inputOHt', $('#edit_inputOHt').val());
            formData.append('edit_inputOWt', $('#edit_inputOWt').val());
            formData.append('edit_inputBmi', $('#edit_inputBmi').val());
            formData.append('edit_inputWc', $('#edit_inputWc').val());
            formData.append('edit_inputSystolic1', $('#edit_inputSystolic1').val());
            formData.append('edit_inputSystolic2', $('#edit_inputSystolic2').val());
            formData.append('edit_inputSystolic3', $('#edit_inputSystolic3').val());
            formData.append('edit_inputDiastolic1', $('#edit_inputDiastolic1').val());
            formData.append('edit_inputDiastolic2', $('#edit_inputDiastolic2').val());
            formData.append('edit_inputDiastolic3', $('#edit_inputDiastolic3').val());
            formData.append('edit_inputAssessed', $('#edit_inputAssessed').val());
            formData.append('edit_inputFbs', $('#edit_inputFbs').val());
            formData.append('edit_inputDateTakenFbs', $('#edit_inputDateTakenFbs').val());
            formData.append('edit_inputChol', $('#edit_inputChol').val());
            formData.append('edit_inputDateTakenChol', $('#edit_inputDateTakenChol').val());
            formData.append('edit_inputUrket', $('#edit_inputUrket').val());
            formData.append('edit_inputDateTakenUrket', $('#edit_inputDateTakenUrket').val());
            formData.append('edit_inputProtein', $('#edit_inputProtein').val());
            formData.append('edit_inputDateTakenPro', $('#edit_inputDateTakenPro').val());
            formData.append('edit_inputRaFfUp', $('#edit_inputRaFfUp').val());
            formData.append('edit_inputRaFinding', $('#edit_inputRaFinding').val());
            formData.append('edit_inputStatus', $('#edit_inputStatus').val());
        //FOR CHECKBOXES
            // Personal Info
                var checkSmoker = [];
                    $('input[name="edit_smokerFaq[]"]:checked').each(function() {
                        checkSmoker.push($(this).val());
                    });
                    
                    if (checkSmoker.length > 0) {
                        formData.append('edit_smokerFaq', JSON.stringify(checkSmoker));
                    } else {
                        formData.append('edit_smokerFaq', JSON.stringify([])); 
                    }
                var checkDiabetes = [];
                    $('input[name="edit_diaDiabetes[]"]:checked').each(function() {
                        checkDiabetes.push($(this).val());
                    });
                    
                    if (checkDiabetes.length > 0) {
                        formData.append('edit_diaDiabetes', JSON.stringify(checkDiabetes));
                    } else {
                        formData.append('edit_diaDiabetes', JSON.stringify([])); 
                    }

        // FOR RADIO BUTTONS
            // Hypertension
                var checkHypertension = $('input[name="edit_hypertension"]:checked').val();
                if (checkHypertension) {
                    formData.append('edit_hypertension', checkHypertension);
                }

            // Stroke
                var checkStroke = $('input[name="edit_stroke"]:checked').val();
                if (checkStroke) {
                    formData.append('edit_stroke', checkStroke);
                }

            // Heart Attack
                var checkHeartAttack = $('input[name="edit_heart_attack"]:checked').val();
                if (checkHeartAttack) {
                    formData.append('edit_heart_attack', checkHeartAttack);
                }

            // Diabetes
                var checkDiabetes = $('input[name="edit_diabetes"]:checked').val();
                if (checkDiabetes) {
                    formData.append('edit_diabetes', checkDiabetes);
                }

            // Asthma
                var checkAsthma = $('input[name="edit_asthma"]:checked').val();
                if (checkAsthma) {
                    formData.append('edit_asthma', checkAsthma);
                }

            // Cancer
                var checkCancer = $('input[name="edit_cancer"]:checked').val();
                if (checkCancer) {
                    formData.append('edit_cancer', checkCancer);
                }

            // Kidney Disease
                var checkKidney = $('input[name="edit_kidney_disease"]:checked').val();
                if (checkKidney) {
                    formData.append('edit_kidney_disease', checkKidney);
                }

            // Obesity
                var checkObesity = $('input[name="edit_obesity"]:checked').val();
                if (checkObesity) {
                    formData.append('edit_obesity', checkObesity);
                }

            // Adiposity
                var checkAdiposity = $('input[name="edit_adposity"]:checked').val();
                if (checkAdiposity) {
                    formData.append('edit_adposity', checkAdiposity);
                }

            // Raised Blood Pressure
                var checkRaisedBp = $('input[name="edit_raisedBp"]:checked').val();
                if (checkRaisedBp) {
                    formData.append('edit_raisedBp', checkRaisedBp);
                }

            // Alcohol Intake
                var checkAlcoholIntake = $('input[name="edit_alcoholIntake"]:checked').val();
                if (checkAlcoholIntake) {
                    formData.append('edit_alcoholIntake', checkAlcoholIntake);
                }

            // Excessive Alcohol Intake
                var checkExAlcoholIntake = $('input[name="edit_exAlcoholIntake"]:checked').val();
                if (checkExAlcoholIntake) {
                    formData.append('edit_exAlcoholIntake', checkExAlcoholIntake);
                }

            // High Fat Intake
                var checkFatSaltIntake = $('input[name="edit_fatSaltIntake"]:checked').val();
                if (checkFatSaltIntake) {
                    formData.append('edit_fatSaltIntake', checkFatSaltIntake);
                }

            // Vegetables Intake
                var checkVegetables = $('input[name="edit_vegetables"]:checked').val();
                if (checkVegetables) {
                    formData.append('edit_vegetables', checkVegetables);
                }

            // Fruits Intake
                var checkFruits = $('input[name="edit_fruits"]:checked').val();
                if (checkFruits) {
                    formData.append('edit_fruits', checkFruits);
                }

            // Physical Activity
                var checkPhysicalAct = $('input[name="edit_physicalAct"]:checked').val();
                if (checkPhysicalAct) {
                    formData.append('edit_physicalAct', checkPhysicalAct);
                }

            // Result
                var checkResult = $('input[name="edit_result"]:checked').val();
                if (checkResult) {
                    formData.append('edit_result', checkResult);
                }

            // Questionnaire Responses
                var checkQuestionnaire1 = $('input[name="edit_questionnaire1"]:checked').val();
                if (checkQuestionnaire1) {
                    formData.append('edit_questionnaire1', checkQuestionnaire1);
                }

                var checkQuestionnaire2 = $('input[name="edit_questionnaire2"]:checked').val();
                if (checkQuestionnaire2) {
                    formData.append('edit_questionnaire2', checkQuestionnaire2);
                }

                var checkQuestionnaire3 = $('input[name="edit_questionnaire3"]:checked').val();
                if (checkQuestionnaire3) {
                    formData.append('edit_questionnaire3', checkQuestionnaire3);
                }

                var checkQuestionnaire4 = $('input[name="edit_questionnaire4"]:checked').val();
                if (checkQuestionnaire4) {
                    formData.append('edit_questionnaire4', checkQuestionnaire4);
                }

                var checkQuestionnaire5 = $('input[name="edit_questionnaire5"]:checked').val();
                if (checkQuestionnaire5) {
                    formData.append('edit_questionnaire5', checkQuestionnaire5);
                }

                var checkQuestionnaire6 = $('input[name="edit_questionnaire6"]:checked').val();
                if (checkQuestionnaire6) {
                    formData.append('edit_questionnaire6', checkQuestionnaire6);
                }

                var checkQuestionnaire7 = $('input[name="edit_questionnaire7"]:checked').val();
                if (checkQuestionnaire7) {
                    formData.append('edit_questionnaire7', checkQuestionnaire7);
                }

                var checkQuestionnaireStroke = $('input[name="edit_questionnaireStroke"]:checked').val();
                if (checkQuestionnaireStroke) {
                    formData.append('edit_questionnaireStroke', checkQuestionnaireStroke);
                }

                var checkQuestionnaire8 = $('input[name="edit_questionnaire8"]:checked').val();
                if (checkQuestionnaire8) {
                    formData.append('edit_questionnaire8', checkQuestionnaire8);
                }   

            // Diabetes Symptoms and Management
                var checkMedications = $('input[name="edit_medications"]:checked').val();
                if (checkMedications) {
                    formData.append('edit_medications', checkMedications);
                }
                var checkPolyphagia = $('input[name="edit_polyphagia"]:checked').val();
                if (checkPolyphagia) {
                    formData.append('edit_polyphagia', checkPolyphagia);
                }
                var checkPolydipsia = $('input[name="edit_polydipsia"]:checked').val();
                if (checkPolydipsia) {
                    formData.append('edit_polydipsia', checkPolydipsia);
                }
                var checkPolyuria = $('input[name="edit_polyuria"]:checked').val();
                if (checkPolyuria) {
                    formData.append('edit_polyuria', checkPolyuria);
                }
                var checkRbg = $('#edit_rbg').val();
                if (checkRbg) {
                    formData.append('edit_rbg', checkRbg);
                }
                var checkRbl = $('#edit_rbl').val();
                if (checkRbl) {
                    formData.append('edit_rbl', checkRbl);
                }
                var checkKetones = $('#edit_ketones').val();
                if (checkKetones) {
                    formData.append('edit_ketones', checkKetones);
                }
                var checkProtein = $('#edit_protein').val();
                if (checkProtein) {
                    formData.append('edit_protein', checkProtein);
                }

            // Risk Management
                var checkRaManagement = $('#edit_raManagement').val();
                if (checkRaManagement) {
                    formData.append('edit_raManagement', checkRaManagement);
                }

            // Risk Level
                var checkRiskLevel = $('#edit_riskLevel').val();
                if (checkRiskLevel) {
                    formData.append('edit_riskLevel', checkRiskLevel);
                }
            // Signature
                // Get the signature from the first canvas
                var canvas1 = document.getElementById('edit_signaturePad1');
                var signature1 = canvas1.toDataURL(); // Convert to base64

                // Append to formData
                if (signature1) {
                    formData.append('edit_signature1', signature1);
                }

                // Get the signature from the second canvas
                var canvas2 = document.getElementById('edit_signaturePad2');
                var signature2 = canvas2.toDataURL(); // Convert to base64

                // Append to formData
                if (signature2) {
                    formData.append('edit_signature2', signature2);
                }
                
            //END OF FORMDATA APPEND

        $.ajax({
            type: "POST",
            url: "/updateRisk/" + risk_id, // URL to handle the update
            data: formData,
            dataType: "json",
            contentType: false, // Needed for FormData
            processData: false, // Needed for FormData
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
            },
            success: function(response) {
                if (response.status === 400) {
                    $('#alert-container3').html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i> Validation Error. Please check the fields.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                } else if (response.status === 404) {
                    $('#alert-container3').html(`
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i> Record Not Found.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                } else {
                    $('#alert-container3').html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i> Record updated successfully!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                    // $('#editRaModal').modal('hide');
                    // location.reload();
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error response for debugging
                alert("An error occurred. Please check the console for more details.");
            }
        });
    });

    // 
// END OF CRUD
</script>
  @include('layouts.footerHealthWorkers')
</body>

</html>