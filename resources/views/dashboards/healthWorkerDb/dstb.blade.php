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

    .shortField {
        width: 250px;
    }

    .averageField {
        width: 350px;
    }

    .modal-body {
        display: flex;
        flex-direction: column
    }

    .signature-container {
        position: relative;
    }

    #signaturePad {
        width: 100%;
        height: 200px;
        border: 1px solid #ccc;
    }

    .caseFindingNotif, .patientDemographic, .screeningInfo, 
    .laboratoryTest, .diagnosisCon, .tbClassificationCon{
        width: 100%;
        border: #ccc 1px solid;
        border-radius: 0.375rem;
        display: flex;
        flex-direction: column;
    }

    .titleCaseFinding {
        border-bottom: #ccc 1px solid;
        padding: 10px;
        background-color: #acabab
    }

    .inputArea {
        padding: 10px;
        display: flex;
        justify-content: space-between
    }

    .modal-body {
        gap: 10px;
    }

    .columnGrp {
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 100%;
        padding: 10px
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

    .rowGroup {
        display: flex;
        justify-content: flex-start;
        gap: 20px;
    }

    .rowConWhole {
        gap: 10px
    }

    .rowGroupCen {
        display: flex;
        justify-content: Center;
        gap: 20px;
    }

    .dateColumn {
        width: 30%;
    }

    .inputAge, .inputSex {
        width: 150px;
    }

    .contact {
        width: 250px!important;
    }

    .refferedByCon {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .diagnosisArea {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .smokersCon {
        display: flex;
        justify-content: space-evenly;
    }

    .centerCons {
        border-left: #dee2e6 solid 1px;
        border-right: #dee2e6 solid 1px;
    }

    .leftCons, .centerCons, .rightCons {
        padding: 20px;
        width: 33.3%;
    }

    .leftConsDiagnosis, .centerConsDiagnosis, .rightConsDiagnosis {
        width: 25%;
        padding: 10px;
    }

    .leftConsClassification {
        width: 40%;
        padding: 10px;
    }

    .centerConsClassification{
        width: 30%;
        border-left: #dee2e6 solid 1px;
        border-right: #dee2e6 solid 1px;
        padding: 10px;
    }

    .rightConsClassification {
        width: 30%;
        padding: 10px;
    }

    .additionalCon {
        width: 90%;
        display: flex;
        flex-direction: column;
        border: #dee2e6 solid 1px;
        margin-left: 5%;
        padding: 10px;

    }

    .modeScreen {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }



    .checkbox-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    }


    .checkbox-container .form-check {
        display: flex;
        align-items: center;
        margin-right: 15px; 
    }


    .checkbox-container .form-check-label {
        margin-left: 5px;
    }

 
    .column.mb-3 {
        margin-top: 10px;
    }

    .dateOfTest, .resultLabTest {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .left, .right {
        width: 50%;
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
        <h1>DSTB</h1>
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
                    <th scope="col">Family Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">BirthDate</th>
                    <th scope="col">Age</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Purok</th>
                    <th scope="col">Action</th>
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
                    <h5 class="modal-title">DS-TB Treatment Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="caseFindingNotif">
                            <div class="titleCaseFinding">
                                <span>Case Finding / Notification</span>
                            </div>
                            <div class="inputArea">
                                <div class="left">
                                    <div class="column mb-3">
                                        <label for="inputDiagnosingFac" class="col-sm-10 col-form-label">Name of Diagnosing Facility</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputDiagnosingFac" name="inputDiagnosingFac">
                                            <span class="text-danger error-text inputDiagnosingFac_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="inputNtpCode" class="col-sm-5 col-form-label">NTP Facility Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputNtpCode" name="inputNtpCode">
                                            <span class="text-danger error-text inputNtpCode_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="right">
                                    <div class="column mb-3">
                                        <label for="inputProvinceHuc" class="col-sm-5 col-form-label">Province/HUC</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputProvinceHuc" name="inputProvinceHuc">
                                            <span class="text-danger error-text inputProvinceHuc_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="inputRegion" class="form-label">Region</label>
                                        <select id="inputRegion" class="form-select" name="inputRegion">
                                            <option selected disabled>Choose...</option>
                                            <option value="I">I</option>
                                            <option value="II.">II</option>
                                            <option value="III">III</option>
                                            <option value="IV - A">IV - A</option>
                                            <option value="MIMAROPA">MIMAROPA</option>
                                            <option value="V">V</option>
                                            <option value="VI">VI</option>
                                            <option value="VII">VII</option>
                                            <option value="VIII">VIII</option>
                                            <option value="IX">IX</option>
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                            <option value="XIII">XIII</option>
                                            <option value="NCR">NCR</option>
                                            <option value="CAR">CAR</option>
                                            <option value="BARM">BARM</option>
                                        </select>
                                        <span class="text-danger error-text inputRegion_error"></span>
                                    </div>
                                </div>
                            </div>   
                        </div>

                        <div class="patientDemographic">
                            <div class="titleCaseFinding">
                                <span>Patient Demographic</span>
                            </div>
                            <div class="inputArea columnGrp">
                                <div class="columnGrp">
                                    <div class="column mb-3 pt-2">
                                        <label for="inputPatient" class="form-label">Patient Full Name</label>
                                        <select id="inputPatient" class="form-control" name="inputPatient" style="width: 100%" onchange="updateResidentDetails(this)">
                                            <option value="">Select...</option>
                                            @foreach($residents as $resident)
                                                <option value="{{ json_encode($resident) }}">
                                                    {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text inputPatient_error"></span>
                                    </div>
                                    
                                        <div class="rowGroup">     
                                            <div class="column mb-3">
                                                <label for="inputDob" class="col-sm-10 col-form-label">Date of Birth</label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control shortField" id="inputDob" name="inputDob" readonly>
                                                    <span class="text-danger error-text inputDob_error"></span>
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="inputAge" class="col-sm-5 col-form-label">Age</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control shortField" id="inputAge" name="inputAge" readonly>
                                                    <span class="text-danger error-text inputAge_error"></span>
                                                </div>
                                            </div>

                                            
                                            <div class="column mb-3">
                                                <label for="inputSex" class="col-sm-5 col-form-label">Sex</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control shortField" id="inputSex" name="inputSex" readonly>
                                                    <span class="text-danger error-text inputSex_error"></span>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="rowGroup">      
                                        <div class="column mb-3">
                                            <label for="inputPermAdd" class="col-sm-5 col-form-label">Permanent Address</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control " id="inputPermAdd" name="inputPermAdd">
                                                <span class="text-danger error-text inputPermAdd_error"></span>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="inputCurAdd" class="col-sm-5 col-form-label">Current Address</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputCurAdd" name="inputCurAdd">
                                                <span class="text-danger error-text inputCurAdd_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rowGroup">      
                                        <div class="column mb-3">
                                            <label for="inputConNum" class="col-sm-10 col-form-label">Contact Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control shortField" id="inputConNum" name="inputConNum" readonly>
                                                <span class="text-danger error-text inputConNum_error"></span>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="inputOtherNum" class="col-sm-10 col-form-label">Other Contact Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control shortField" id="inputOtherNum" name="inputOtherNum">
                                                <span class="text-danger error-text inputOtherNum_error"></span>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="inputPhilHealth" class="col-sm-10 col-form-label">PhilHealth Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control shortField" id="inputPhilHealth" name="inputPhilHealth">
                                                <span class="text-danger error-text inputPhilHealth_error"></span>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="inputNat" class="col-sm-10 col-form-label">Nationality</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control shortField" id="inputNat" name="inputNat" readonly>
                                                <span class="text-danger error-text inputNat_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>

                        <div class="screeningInfo">
                            <div class="titleCaseFinding">
                                <span>Screening Information</span>
                            </div>
                            <div class="rowGroupCen screeningCons"> 
                                <div class="leftCons">
                                    <fieldset class="column mb-3 refferedByCon">
                                        <div class="inputPart">
                                            <div class="column mb-3">
                                                <label for="inputRefEmp" class="col-sm-10 col-form-label">Reffered By: (Name & Location)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control averageField" id="inputRefEmp" name="inputRefEmp" value="<?php echo $LoggedUserInfo['em_id'] ?>" readonly>
                                                    <span class="text-danger error-text inputRefEmp_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control averageField" id="inputRefLoc" name="inputRefLoc" placeholder="Enter Location">
                                                <span class="text-danger error-text inputRefLoc_error"></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="refferedBy" id="refferedByPublic" value="Public">
                                                <label class="form-check-label" for="refferedByPublic">
                                                    Public
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="refferedBy" id="refferedByOtherPublic" value="Other Public">
                                                <label class="form-check-label" for="refferedByOtherPublic">
                                                    Other Public
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="refferedBy" id="refferedByPrivate" value="Private">
                                                <label class="form-check-label" for="refferedByPrivate">
                                                    Private
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="refferedBy" id="refferedByCommunity" value="Community">
                                                <label class="form-check-label" for="refferedByCommunity">
                                                    Community
                                                </label>
                                            </div>
                                            <span class="text-danger error-text refferedBy_error"></span>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="centerCons">
                                    <fieldset class="column mb-3 refferedByCon">
                                            <label for="dateScreening" class="col-sm-12 col-form-label">Mode Of Screening</label> 
                                        <div class="col-sm-12 modeScreen">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="screeningMode" id="screeningModePcf" value="PCF">
                                                <label class="form-check-label" for="screeningModePcf">
                                                    PCF
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="screeningMode" id="screeningModeAcf" value="ACF">
                                                <label class="form-check-label" for="screeningModeAcf">
                                                    ACF
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="screeningMode" id="screeningModeIcf" value="ICF">
                                                <label class="form-check-label" for="screeningModeIcf">
                                                    ICF
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="screeningMode" id="screeningModeEcf" value="ECF">
                                                <label class="form-check-label" for="screeningModeEcf">
                                                    ECF
                                                </label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text screeningMode_error"></span>
                                    </fieldset>
                                </div>

                                <div class="rightCons">
                                    <div class="column mb-3">
                                        <label for="dateScreening" class="col-sm-12 col-form-label">Date of Screening</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control shortField" id="dateScreening" name="dateScreening">
                                            <span class="text-danger error-text dateScreening_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>

                        <div class="laboratoryTest">
                            <div class="titleCaseFinding">
                                <span>Laboratory Test</span>
                            </div>

                            <div class="inputArea columnGrp"> 
                                <fieldset class="column mb-3">
                                    <label for="nameOfTest" class="col-sm-12 col-form-label">Name of Test:</label>
                                    <div class="col-sm-12 nameOfTest">
                                        <div class="checkbox-container">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="testName[]" id="testXpertMTB" value="Xpert MTB/RIF">
                                                <label class="form-check-label" for="testXpertMTB">Xpert MTB/RIF</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="testName[]" id="testSmearMicroscopy" value="Smear Microscopy/ TB Lamp">
                                                <label class="form-check-label" for="testSmearMicroscopy">Smear Microscopy/ TB Lamp</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="testName[]" id="testChestXray" value="Chest X-ray">
                                                <label class="form-check-label" for="testChestXray">Chest X-ray</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="testName[]" id="testTuberculinSkinTest" value="Tuberculin Skin Test">
                                                <label class="form-check-label" for="testTuberculinSkinTest">Tuberculin Skin Test</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="testName[]" id="tbNone" value="None">
                                                <label class="form-check-label" for="tbNone">None</label>
                                            </div>
                                        </div>
                                        <div class="column mb-3">
                                            <label for="othersDetails" class="col-sm-12 col-form-label">Specify Other Test:</label>
                                            <input type="text" class="form-control" id="othersDetails" name="othersDetails" style="width: 250px;">
                                        </div>
                                    </div>
                                </fieldset>

                                <hr>

                                <div class="dateOfTest">
                                    <div class="column mb-3 dateColumn">
                                        <label for="dateTestXpert" class="col-sm-12 col-form-label">Date for Xpert MTB/RIF:</label>
                                        <input type="date" class="form-control" id="dateTestXpert" name="dateTestXpert" style="width: 250px;">
                                        <span class="text-danger error-text dateTestXpert_error"></span>
                                    </div>

                                    <div class="column mb-3 dateColumn">
                                        <label for="dateTestSmear" class="col-sm-12 col-form-label">Date for Smear Microscopy/TB LAMP:</label>
                                        <input type="date" class="form-control" id="dateTestSmear" name="dateTestSmear" style="width: 250px;">
                                        <span class="text-danger error-text dateTestSmear_error"></span>
                                    </div>

                                    <div class="column mb-3 dateColumn">
                                        <label for="dateTestChest" class="col-sm-12 col-form-label">Date for Chest X-Ray:</label>
                                        <input type="date" class="form-control" id="dateTestChest" name="dateTestChest" style="width: 250px;">
                                        <span class="text-danger error-text dateTestChest_error"></span>
                                    </div>

                                    <div class="column mb-3 dateColumn">
                                        <label for="dateTestTuborculin" class="col-sm-12 col-form-label">Date for Tuborculin Skin Test:</label>
                                        <input type="date" class="form-control" id="dateTestTuborculin" name="dateTestTuborculin" style="width: 250px;">
                                        <span class="text-danger error-text dateTestTuborculin_error"></span>
                                    </div>

                                    <div class="column mb-3 dateColumn">
                                        <label for="dateTestOther" class="col-sm-12 col-form-label">Date for Other Test:</label>
                                        <input type="date" class="form-control" id="dateTestOther" name="dateTestOther" style="width: 250px;">
                                        <span class="text-danger error-text dateTestOther_error"></span>
                                    </div>
                                </div>

                                <hr>

                                <div class="resultLabTest">
                                    <div class="column mb-3">
                                        <label for="resultTestXpert" class="col-sm-12 col-form-label">Result for Xpert MTB/RIF:</label>
                                        <input type="text" class="form-control" id="resultTestXpert" name="resultTestXpert" style="width: 250px;">
                                        <span class="text-danger error-text resultTestXpert_error"></span>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="resultTestSmear" class="col-sm-12 col-form-label">Result for Smear Microscopy/TB LAMP:</label>
                                        <input type="text" class="form-control" id="resultTestSmear" name="resultTestSmear" style="width: 250px;">
                                        <span class="text-danger error-text resultTestSmear_error"></span>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="resultTestChest" class="col-sm-12 col-form-label">Result for Chest X-Ray:</label>
                                        <input type="text" class="form-control" id="resultTestChest" name="resultTestChest" style="width: 250px;">
                                        <span class="text-danger error-text resultTestChest_error"></span>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="resultTestTuborculin" class="col-sm-12 col-form-label">Result for Tuborculin Skin Test:</label>
                                        <input type="text" class="form-control" id="resultTestTuborculin" name="resultTestTuborculin" style="width: 250px;">
                                        <span class="text-danger error-text resultTestTuborculin_error"></span>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="resultTestOther" class="col-sm-12 col-form-label">Result for Other Test:</label>
                                        <input type="text" class="form-control" id="resultTestOther" name="resultTestOther" style="width: 250px;">
                                        <span class="text-danger error-text resultTestOther_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rowConWhole d-flex">
                            {{-- diagnosis --}}
                            <div class="diagnosisCon" style="width: 50%">
                                <div class="titleCaseFinding">
                                    <span>Diagnosis</span>
                                </div>

                                <div class="columnGrp"> 
                                    <fieldset class="row mb-3 pt-3 diagnosisArea">
                                        <legend class="col-form-label col-sm-5 pt-0">Diagnosis:</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tuberculosis" id="tb_disease" value="TB Disease">
                                                <label class="form-check-label" for="tb_disease">TB Disease</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tuberculosis" id="tb_infection" value="TB Infection">
                                                <label class="form-check-label" for="tb_infection">TB Infection</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text tuberculosis_error"></span>
                                    </fieldset>


                                    <div class="column mb-3">
                                        <label for="dateDiagnosis" class="col-sm-12 col-form-label">Date of Diagnosis:</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" style="width: 100%;" id="dateDiagnosis" name="dateDiagnosis">
                                            <span class="text-danger error-text dateDiagnosis_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="tbCaseNum" class="col-sm-12 col-form-label">TB Case Number:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" style="width: 100%;" id="tbCaseNum" name="tbCaseNum">
                                            <span class="text-danger error-text tbCaseNum_error"></span>
                                        </div>
                                    </div>


                                    <div class="column mb-3">
                                        <label for="dateNotif" class="col-sm-12 col-form-label">Date of Notification:</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" style="width: 100%;" id="dateNotif" name="dateNotif">
                                            <span class="text-danger error-text dateNotif_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="attendingPhysician" class="col-sm-12 col-form-label">Attending Physician:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" style="width: 100%;" id="attendingPhysician" name="attendingPhysician">
                                            <span class="text-danger error-text attendingPhysician_error"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- reffered --}}
                            <div class="diagnosisCon" style="width: 50%">
                                <div class="titleCaseFinding">
                                    <span>Reffered To</span>
                                </div>

                                <div class="columnGrp"> 
                                    <div class="column mb-3">
                                        <label for="refferedToName" class="col-sm-12 col-form-label">Name:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" style="width: 100%;" id="refferedToName" name="refferedToName">
                                            <span class="text-danger error-text refferedToName_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="refferedToAddress" class="col-sm-12 col-form-label">Address:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" style="width: 100%;" id="refferedToAddress" name="refferedToAddress">
                                            <span class="text-danger error-text refferedToAddress_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="refferedToFcode" class="col-sm-12 col-form-label">Facility Code:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" style="width: 100%;" id="refferedToFcode" name="refferedToFcode">
                                            <span class="text-danger error-text refferedToFcode_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="refferedToProvHuc" class="col-sm-12 col-form-label">Province/HUC:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" style="width: 100%;" id="refferedToProvHuc" name="refferedToProvHuc">
                                            <span class="text-danger error-text refferedToProvHuc_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="refferedToRegion" class="form-label">Region</label>
                                        <select id="refferedToRegion" class="form-select" name="refferedToRegion">
                                            <option selected disabled>Choose...</option>
                                            <option value="I">I</option>
                                            <option value="II.">II</option>
                                            <option value="III">III</option>
                                            <option value="IV - A">IV - A</option>
                                            <option value="MIMAROPA">MIMAROPA</option>
                                            <option value="V">V</option>
                                            <option value="VI">VI</option>
                                            <option value="VII">VII</option>
                                            <option value="VIII">VIII</option>
                                            <option value="IX">IX</option>
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                            <option value="XIII">XIII</option>
                                            <option value="NCR">NCR</option>
                                            <option value="CAR">CAR</option>
                                            <option value="BARM">BARM</option>
                                        </select>
                                        <span class="text-danger error-text refferedToRegion_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tbClassificationCon">
                            <div class="titleCaseFinding">
                                <span>TB Disease Classification</span>
                            </div>

                            <div class="rowGroup"> 
                                <div class="leftConsClassification">
                                    <fieldset class="row mb-3 diagnosisArea">
                                        <legend class="col-form-label col-sm-8 pt-0">Bacteriological Status:</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Bacteriological" id="bacteriologically_Confirmed" value="Bacteriologically-Confirmed TB">
                                                <label class="form-check-label" for="bacteriologically_Confirmed">Bacteriologically-Confirmed TB</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Bacteriological" id="clinically_Diagnosed" value="Clinically-Diagnosed TB">
                                                <label class="form-check-label" for="clinically_Diagnosed">Clinically-Diagnosed TB</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text Bacteriological_error"></span>
                                    </fieldset>

                                    <hr>

                                    <fieldset class="row mb-3 diagnosisArea">
                                        <legend class="col-form-label col-sm-8 pt-0">Anatomical Site:</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pulmonarySite" id="anatomical_Pulmonary" value="Pulmonary">
                                                <label class="form-check-label" for="anatomical_Pulmonary">Pulmonary</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pulmonarySite" id="extra_pulmonary" value="Extra Pulmonary">
                                                <label class="form-check-label" for="extra_pulmonary">Extra Pulmonary</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-control mt-2" style="width: 250px;" type="text" id="pulmonarySite" name="pulmonarySite" placeholder="Site">
                                            </div>
                                        </div>
                                        <span class="text-danger error-text pulmonarySite_error"></span>
                                    </fieldset>

                                </div>

                                <div class="centerConsClassification">
                                    
                                    <fieldset class="row mb-3 diagnosisArea">
                                        <legend class="col-form-label col-sm-12 pt-0">Drug Resistance Bacteriological Status</legend>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="drugResistence[]" id="drug_susceptible" value="Drug-susceptible">
                                                <label class="form-check-label" for="drug_susceptible">Drug-susceptible</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="drugResistence[]" id="bacteriologically_confirmed_rr" value="Bacteriologically-confirmed RR-TB">
                                                <label class="form-check-label" for="bacteriologically_confirmed_rr">Bacteriologically-confirmed RR-TB</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="drugResistence[]" id="bacteriologically_confirmed_mdr" value="Bacteriologically-confirmed MDR-TB">
                                                <label class="form-check-label" for="bacteriologically_confirmed_mdr">Bacteriologically-confirmed MDR-TB</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="drugResistence[]" id="bacteriologically_confirmed_xdr" value="Bacteriologically-confirmed XDR-TB">
                                                <label class="form-check-label" for="bacteriologically_confirmed_xdr">Bacteriologically-confirmed XDR-TB</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="drugResistence[]" id="clinically_diagnosed_mdr" value="Clinically-diagnosed MDR-TB">
                                                <label class="form-check-label" for="clinically_diagnosed_mdr">Clinically-diagnosed MDR-TB</label>
                                            </div>

                                            <br>

                                            <div class="form-check">
                                                <label class="form-check-label" for="other_drug_resistant_tb">Other Drug-resistant TB:</label>
                                                <input class="form-control mt-2" style="width: 250px;" type="text" id="other_drug_resistant_tb_text" name="other_drug_resistant_tb_text" placeholder="Specify">
                                            </div>
                                        </div>
                                    </fieldset>

                                </div>

                                <div class="rightConsClassification">
                                    
                                    <fieldset class="row mb-3 diagnosisArea">
                                        <legend class="col-form-label col-sm-12 pt-0">Registration Group:</legend>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="registration[]" id="reg_new" value="New">
                                                <label class="form-check-label" for="reg_new">New</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="registration[]" id="reg_relapse" value="Relapse">
                                                <label class="form-check-label" for="reg_relapse">Relapse</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="registration[]" id="reg_talf" value="TALF">
                                                <label class="form-check-label" for="reg_talf">TALF</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="registration[]" id="reg_taf" value="TAF">
                                                <label class="form-check-label" for="reg_taf">TAF</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="registration[]" id="reg_ptou" value="PTOU">
                                                <label class="form-check-label" for="reg_ptou">PTOU</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="registration[]" id="reg_unknown" value="Unknown">
                                                <label class="form-check-label" for="reg_unknown">Unknown</label>
                                            </div>
                                        </div>
                                
                                    </fieldset>

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

</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#inputPatient').select2({
            placeholder: "Choose...",
            allowClear: true
        });

        // Initialize Select2 on modal show
        $('#ExtralargeModal').on('shown.bs.modal', function () {
            $('#inputPatient').select2({
                dropdownParent: $('#ExtralargeModal')
            });
        });
    });

    $(document).ready(function () {
        $('#inputPatient').selectize({
            sortField: 'text'
        });
    });


    function updateResidentDetails(selectElement) {
        const residentData = JSON.parse(selectElement.value);
        
        if (residentData) {
            document.getElementById('inputCurAdd').value = residentData.res_address;
            document.getElementById('inputDob').value = residentData.res_bdate;
            
            // Calculate age from the birth date
            const birthDate = new Date(residentData.res_bdate);
            const age = calculateAge(birthDate);
            document.getElementById('inputAge').value = age;
            
            document.getElementById('inputSex').value = residentData.res_sex;
            document.getElementById('inputConNum').value = residentData.res_contact;
            document.getElementById('inputNat').value = residentData.res_citizen;
        } else {
            document.getElementById('inputCurAdd').value = '';
            document.getElementById('inputDob').value = '';
            document.getElementById('inputAge').value = '';
            document.getElementById('inputSex').value = '';
            document.getElementById('inputConNum').value = '';
            document.getElementById('inputNat').value = '';
        }
    }

    function calculateAge(birthDate) {
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDifference = today.getMonth() - birthDate.getMonth();
        
        // Adjust age if the birth date hasn't occurred yet this year
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        
        return age;
    }

</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>