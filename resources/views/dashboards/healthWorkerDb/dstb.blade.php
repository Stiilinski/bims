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
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">New Record</button>  
        </div>
    </div><!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
  
            <!-- Table with stripped rows -->
            <table class="table table-striped datatable">
                <thead>
                <tr>
                    <th style="display: none;" scope="col">ID</th>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">BirthDate</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Purok</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($dstb as $index => $dstbs)
                    <tr>
                        <td style="display: none;">{{ $dstbs->dstb_id }}</td>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $dstbs->resident->res_lname }}, {{ $dstbs->resident->res_fname }} {{ $dstbs->resident->res_mname ?? '' }} {{ $dstbs->resident->res_suffix ?? '' }}</td>
                        <td>{{ $dstbs->resident->res_bdate}}</td>
                        <td>{{ $dstbs->resident->res_sex }}</td>
                        <td>{{ $dstbs->resident->res_purok }}</td>
                        <td>{{ $dstbs->dstb_status }}</td>
                        <td>
                            <a href="{{ route('dstbForm', ['dstb_id' => $dstbs->dstb_id]) }}" class="btn btn-primary">View</a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" type="button" onclick="openEditModal({{ $dstbs->dstb_id }})">Edit</button></li>
                                    <li><button class="dropdown-item" type="button" onclick="updateDstbStatus({{ $dstbs->dstb_id }}, 'Archive')">Archive</button></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- End Table with stripped rows -->
          
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
                <div class="alertCon">
                    <div id="alert-container"></div>
                </div>
                <form method="POST" action="{{ route('regValidation.dstbInput')}}" class="dstbForm" id="tbForm" autocomplete="off"> <!-- Horizontal Form -->
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
                                            <option value="II">II</option>
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
                                                <option value="{{ $resident->res_id }}">
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
                                                <input class="form-check-input" type="checkbox" name="refferedBy[]" id="refferedByPublic" value="Public">
                                                <label class="form-check-label" for="refferedByPublic">
                                                    Public
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="refferedBy[]" id="refferedByOtherPublic" value="Other Public">
                                                <label class="form-check-label" for="refferedByOtherPublic">
                                                    Other Public
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="refferedBy[]" id="refferedByPrivate" value="Private">
                                                <label class="form-check-label" for="refferedByPrivate">
                                                    Private
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="refferedBy[]" id="refferedByCommunity" value="Community">
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
                                                <input class="form-check-input" type="checkbox" name="screeningMode[]" id="screeningModePcf" value="PCF">
                                                <label class="form-check-label" for="screeningModePcf">
                                                    PCF
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="screeningMode[]" id="screeningModeAcf" value="ACF">
                                                <label class="form-check-label" for="screeningModeAcf">
                                                    ACF
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="screeningMode[]" id="screeningModeIcf" value="ICF">
                                                <label class="form-check-label" for="screeningModeIcf">
                                                    ICF
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="screeningMode[]" id="screeningModeEcf" value="ECF">
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
                                                <input class="form-control mt-2" style="width: 250px;" type="text" id="pulmonarySite" name="pulmonarySiteSpecifc" placeholder="Site">
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
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
        </div>
    </div><!-- End Extra Large Modal-->

    <!-- EDIT Extra Large Modal -->
    <<div class="modal fade" id="editDstbModal" tabindex="-1" aria-labelledby="editDstbModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT DS-TB Treatment Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="alertCon">
                    <div id="alert-container"></div>
                </div>
                <form id="editDstbForm" autocomplete="off"> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="caseFindingNotif">
                            <div class="titleCaseFinding">
                                <span>Case Finding / Notification</span>
                            </div>
                            <div class="inputArea">
                                <div class="left">
                                    <input type="hidden" class="form-control" id="edit_dstb_id" name="edit_dstb_id">
                                    <div class="column mb-3">
                                        <label for="Edit_inputDiagnosingFac" class="col-sm-10 col-form-label">Name of Diagnosing Facility</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Edit_inputDiagnosingFac" name="Edit_inputDiagnosingFac">
                                            <span class="text-danger error-text Edit_inputDiagnosingFac_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="Edit_inputNtpCode" class="col-sm-5 col-form-label">NTP Facility Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Edit_inputNtpCode" name="Edit_inputNtpCode">
                                            <span class="text-danger error-text Edit_inputNtpCode_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="right">
                                    <div class="column mb-3">
                                        <label for="Edit_inputProvinceHuc" class="col-sm-5 col-form-label">Province/HUC</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Edit_inputProvinceHuc" name="Edit_inputProvinceHuc">
                                            <span class="text-danger error-text Edit_inputProvinceHuc_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="Edit_inputRegion" class="form-label">Region</label>
                                        <select id="Edit_inputRegion" class="form-select" name="Edit_inputRegion">
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
                                        <span class="text-danger error-text Edit_inputRegion_error"></span>
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

                                        <div class="rowGroup">    
                                            <div class="column mb-3">
                                                <label for="Edit_inputPatient" class="col-sm-10 col-form-label">Patient Full Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control shortField" id="Edit_inputPatient" name="Edit_inputPatient" readonly>
                                                    <span class="text-danger error-text Edit_inputPatient_error"></span>
                                                </div>
                                            </div>
                                            
                                            <div class="column mb-3">
                                                <label for="Edit_inputDob" class="col-sm-10 col-form-label">Date of Birth</label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control shortField" id="Edit_inputDob" name="Edit_inputDob" readonly>
                                                    <span class="text-danger error-text Edit_inputDob_error"></span>
                                                </div>
                                            </div>
                                            
                                            <div class="column mb-3">
                                                <label for="Edit_inputSex" class="col-sm-5 col-form-label">Sex</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control shortField" id="Edit_inputSex" name="Edit_inputSex" readonly>
                                                    <span class="text-danger error-text Edit_inputSex_error"></span>
                                                </div>                            
                                            </div>
                                        </div>

                                    <div class="rowGroup">      
                                        <div class="column mb-3">
                                            <label for="Edit_inputPermAdd" class="col-sm-5 col-form-label">Permanent Address</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control " id="Edit_inputPermAdd" name="Edit_inputPermAdd">
                                                <span class="text-danger error-text Edit_inputPermAdd_error"></span>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="Edit_inputCurAdd" class="col-sm-5 col-form-label">Current Address</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Edit_inputCurAdd" name="Edit_inputCurAdd">
                                                <span class="text-danger error-text Edit_inputCurAdd_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rowGroup">      
                                        <div class="column mb-3">
                                            <label for="Edit_inputConNum" class="col-sm-10 col-form-label">Contact Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control shortField" id="Edit_inputConNum" name="Edit_inputConNum" readonly>
                                                <span class="text-danger error-text Edit_inputConNum_error"></span>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="Edit_inputOtherNum" class="col-sm-10 col-form-label">Other Contact Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control shortField" id="Edit_inputOtherNum" name="Edit_inputOtherNum">
                                                <span class="text-danger error-text Edit_inputOtherNum_error"></span>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="Edit_inputPhilHealth" class="col-sm-10 col-form-label">PhilHealth Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control shortField" id="Edit_inputPhilHealth" name="Edit_inputPhilHealth">
                                                <span class="text-danger error-text Edit_inputPhilHealth_error"></span>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="Edit_inputNat" class="col-sm-10 col-form-label">Nationality</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control shortField" id="Edit_inputNat" name="Edit_inputNat" readonly>
                                                <span class="text-danger error-text Edit_inputNat_error"></span>
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
                                                <label for="edit_inputRefEmp" class="col-sm-10 col-form-label">Reffered By: (Name & Location)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control averageField" id="edit_inputRefEmp" name="edit_inputRefEmp" value="<?php echo $LoggedUserInfo['em_id'] ?>" readonly>
                                                    <span class="text-danger error-text edit_inputRefEmp_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control averageField" id="edit_inputRefLoc" name="edit_inputRefLoc" placeholder="Enter Location">
                                                <span class="text-danger error-text edit_inputRefLoc_error"></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_refferedBy[]" id="edit_refferedByPublic" value="Public">
                                                <label class="form-check-label" for="edit_refferedByPublic">
                                                    Public
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_refferedBy[]" id="edit_refferedByOtherPublic" value="Other Public">
                                                <label class="form-check-label" for="edit_refferedByOtherPublic">
                                                    Other Public
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_refferedBy[]" id="edit_refferedByPrivate" value="Private">
                                                <label class="form-check-label" for="edit_refferedByPrivate">
                                                    Private
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_refferedBy[]" id="edit_refferedByCommunity" value="Community">
                                                <label class="form-check-label" for="edit_refferedByCommunity">
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
                                                <input class="form-check-input" type="checkbox" name="edit_screeningMode[]" id="edit_screeningModePcf" value="PCF">
                                                <label class="form-check-label" for="edit_screeningModePcf">
                                                    PCF
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_screeningMode[]" id="edit_screeningModeAcf" value="ACF">
                                                <label class="form-check-label" for="edit_screeningModeAcf">
                                                    ACF
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_screeningMode[]" id="edit_screeningModeIcf" value="ICF">
                                                <label class="form-check-label" for="edit_screeningModeIcf">
                                                    ICF
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_screeningMode[]" id="edit_screeningModeEcf" value="ECF">
                                                <label class="form-check-label" for="edit_screeningModeEcf">
                                                    ECF
                                                </label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text screeningMode_error"></span>
                                    </fieldset>
                                </div>

                                <div class="rightCons">
                                    <div class="column mb-3">
                                        <label for="edit_dateScreening" class="col-sm-12 col-form-label">Date of Screening</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control shortField" id="edit_dateScreening" name="edit_dateScreening">
                                            <span class="text-danger error-textedit_ dateScreening_error"></span>
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
                                                <input class="form-check-input" type="checkbox" name="edit_testName[]" id="edit_testXpertMTB" value="Xpert MTB/RIF">
                                                <label class="form-check-label" for="edit_testXpertMTB">Xpert MTB/RIF</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_testName[]" id="edit_testSmearMicroscopy" value="Smear Microscopy/ TB Lamp">
                                                <label class="form-check-label" for="edit_testSmearMicroscopy">Smear Microscopy/ TB Lamp</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_testName[]" id="edit_testChestXray" value="Chest X-ray">
                                                <label class="form-check-label" for="edit_testChestXray">Chest X-ray</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_testName[]" id="edit_testTuberculinSkinTest" value="Tuberculin Skin Test">
                                                <label class="form-check-label" for="edit_testTuberculinSkinTest">Tuberculin Skin Test</label>
                                            </div>
                                        </div>
                                        <div class="column mb-3">
                                            <label for="othersDetails" class="col-sm-12 col-form-label">Specify Other Test:</label>
                                            <input type="text" class="form-control" id="edit_othersDetails" name="edit_othersDetails" style="width: 250px;">
                                        </div>
                                    </div>
                                </fieldset>

                                <hr>

                                <div class="dateOfTest">
                                    <div class="column mb-3 dateColumn">
                                        <label for="edit_dateTestXpert" class="col-sm-12 col-form-label">Date for Xpert MTB/RIF:</label>
                                        <input type="date" class="form-control" id="edit_dateTestXpert" name="edit_dateTestXpert" style="width: 250px;">
                                        <span class="text-danger error-text edit_dateTestXpert_error"></span>
                                    </div>

                                    <div class="column mb-3 dateColumn">
                                        <label for="edit_dateTestSmear" class="col-sm-12 col-form-label">Date for Smear Microscopy/TB LAMP:</label>
                                        <input type="date" class="form-control" id="edit_dateTestSmear" name="edit_dateTestSmear" style="width: 250px;">
                                        <span class="text-danger error-text edit_dateTestSmear_error"></span>
                                    </div>

                                    <div class="column mb-3 dateColumn">
                                        <label for="edit_dateTestChest" class="col-sm-12 col-form-label">Date for Chest X-Ray:</label>
                                        <input type="date" class="form-control" id="edit_dateTestChest" name="edit_dateTestChest" style="width: 250px;">
                                        <span class="text-danger error-text edit_dateTestChest_error"></span>
                                    </div>

                                    <div class="column mb-3 dateColumn">
                                        <label for="edit_dateTestTuborculin" class="col-sm-12 col-form-label">Date for Tuborculin Skin Test:</label>
                                        <input type="date" class="form-control" id="edit_dateTestTuborculin" name="edit_dateTestTuborculin" style="width: 250px;">
                                        <span class="text-danger error-text edit_dateTestTuborculin_error"></span>
                                    </div>

                                    <div class="column mb-3 dateColumn">
                                        <label for="edit_dateTestOther" class="col-sm-12 col-form-label">Date for Other Test:</label>
                                        <input type="date" class="form-control" id="edit_dateTestOther" name="edit_dateTestOther" style="width: 250px;">
                                        <span class="text-danger error-text edit_dateTestOther_error"></span>
                                    </div>
                                </div>

                                <hr>

                                <div class="resultLabTest">
                                    <div class="column mb-3">
                                        <label for="edit_resultTestXpert" class="col-sm-12 col-form-label">Result for Xpert MTB/RIF:</label>
                                        <input type="text" class="form-control" id="edit_resultTestXpert" name="edit_resultTestXpert" style="width: 250px;">
                                        <span class="text-danger error-text edit_resultTestXpert_error"></span>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_resultTestSmear" class="col-sm-12 col-form-label">Result for Smear Microscopy/TB LAMP:</label>
                                        <input type="text" class="form-control" id="edit_resultTestSmear" name="edit_resultTestSmear" style="width: 250px;">
                                        <span class="text-danger error-text edit_resultTestSmear_error"></span>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_resultTestChest" class="col-sm-12 col-form-label">Result for Chest X-Ray:</label>
                                        <input type="text" class="form-control" id="edit_resultTestChest" name="edit_resultTestChest" style="width: 250px;">
                                        <span class="text-danger error-text edit_resultTestChest_error"></span>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_resultTestTuborculin" class="col-sm-12 col-form-label">Result for Tuborculin Skin Test:</label>
                                        <input type="text" class="form-control" id="edit_resultTestTuborculin" name="edit_resultTestTuborculin" style="width: 250px;">
                                        <span class="text-danger error-text edit_resultTestTuborculin_error"></span>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_resultTestOther" class="col-sm-12 col-form-label">Result for Other Test:</label>
                                        <input type="text" class="form-control" id="edit_resultTestOther" name="edit_resultTestOther" style="width: 250px;">
                                        <span class="text-danger error-text edit_resultTestOther_error"></span>
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
                                                <input class="form-check-input" type="radio" name="edit_tuberculosis" id="edit_tb_disease" value="TB Disease">
                                                <label class="form-check-label" for="tb_disease">TB Disease</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_tuberculosis" id="edit_tb_infection" value="TB Infection">
                                                <label class="form-check-label" for="tb_infection">TB Infection</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text edit_tuberculosis_error"></span>
                                    </fieldset>


                                    <div class="column mb-3">
                                        <label for="edit_dateDiagnosis" class="col-sm-12 col-form-label">Date of Diagnosis:</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" style="width: 100%;" id="edit_dateDiagnosis" name="edit_dateDiagnosis">
                                            <span class="text-danger error-text edit_dateDiagnosis_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_tbCaseNum" class="col-sm-12 col-form-label">TB Case Number:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" style="width: 100%;" id="edit_tbCaseNum" name="edit_tbCaseNum">
                                            <span class="text-danger error-text edit_tbCaseNum_error"></span>
                                        </div>
                                    </div>


                                    <div class="column mb-3">
                                        <label for="edit_dateNotif" class="col-sm-12 col-form-label">Date of Notification:</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" style="width: 100%;" id="edit_dateNotif" name="edit_dateNotif">
                                            <span class="text-danger error-text edit_dateNotif_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_attendingPhysician" class="col-sm-12 col-form-label">Attending Physician:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" style="width: 100%;" id="edit_attendingPhysician" name="edit_attendingPhysician">
                                            <span class="text-danger error-text edit_attendingPhysician_error"></span>
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
                                        <label for="edit_refferedToName" class="col-sm-12 col-form-label">Name:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" style="width: 100%;" id="edit_refferedToName" name="edit_refferedToName">
                                            <span class="text-danger error-text edit_refferedToName_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_refferedToAddress" class="col-sm-12 col-form-label">Address:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" style="width: 100%;" id="edit_refferedToAddress" name="edit_refferedToAddress">
                                            <span class="text-danger error-text edit_refferedToAddress_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_refferedToFcode" class="col-sm-12 col-form-label">Facility Code:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" style="width: 100%;" id="edit_refferedToFcode" name="edit_refferedToFcode">
                                            <span class="text-danger error-text edit_refferedToFcode_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_refferedToProvHuc" class="col-sm-12 col-form-label">Province/HUC:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" style="width: 100%;" id="edit_refferedToProvHuc" name="edit_refferedToProvHuc">
                                            <span class="text-danger error-text edit_refferedToProvHuc_error"></span>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_refferedToRegion" class="form-label">Region</label>
                                        <select id="edit_refferedToRegion" class="form-select" name="edit_refferedToRegion">
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
                                                <input class="form-check-input" type="radio" name="edit_Bacteriological" id="edit_bacteriologically_Confirmed" value="Bacteriologically-Confirmed TB">
                                                <label class="form-check-label" for="edit_bacteriologically_Confirmed">Bacteriologically-Confirmed TB</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_Bacteriological" id="edit_clinically_Diagnosed" value="Clinically-Diagnosed TB">
                                                <label class="form-check-label" for="edit_clinically_Diagnosed">Clinically-Diagnosed TB</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text Bacteriological_error"></span>
                                    </fieldset>

                                    <hr>

                                    <fieldset class="row mb-3 diagnosisArea">
                                        <legend class="col-form-label col-sm-8 pt-0">Anatomical Site:</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="edit_pulmonarySite" id="edit_anatomical_Pulmonary" value="Pulmonary">
                                                <label class="form-check-label" for="edit_anatomical_Pulmonary">Pulmonary</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="edit_pulmonarySite" id="edit_extra_pulmonary" value="Extra Pulmonary">
                                                <label class="form-check-label" for="edit_extra_pulmonary">Extra Pulmonary</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-control mt-2" style="width: 250px;" type="text" id="edit_specificPulmonarySite" name="edit_pulmonarySiteSpecifc" placeholder="Site">
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
                                                <input class="form-check-input" type="checkbox" name="edit_drugResistence[]" id="edit_drug_susceptible" value="Drug-susceptible">
                                                <label class="form-check-label" for="edit_drug_susceptible">Drug-susceptible</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_drugResistence[]" id="edit_bacteriologically_confirmed_rr" value="Bacteriologically-confirmed RR-TB">
                                                <label class="form-check-label" for="edit_bacteriologically_confirmed_rr">Bacteriologically-confirmed RR-TB</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_drugResistence[]" id="edit_bacteriologically_confirmed_mdr" value="Bacteriologically-confirmed MDR-TB">
                                                <label class="form-check-label" for="edit_bacteriologically_confirmed_mdr">Bacteriologically-confirmed MDR-TB</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_drugResistence[]" id="edit_bacteriologically_confirmed_xdr" value="Bacteriologically-confirmed XDR-TB">
                                                <label class="form-check-label" for="edit_bacteriologically_confirmed_xdr">Bacteriologically-confirmed XDR-TB</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_drugResistence[]" id="edit_clinically_diagnosed_mdr" value="Clinically-diagnosed MDR-TB">
                                                <label class="form-check-label" for="edit_clinically_diagnosed_mdr">Clinically-diagnosed MDR-TB</label>
                                            </div>

                                            <br>

                                            <div class="form-check">
                                                <label class="form-check-label" for="edit_other_drug_resistant_tb">Other Drug-resistant TB:</label>
                                                <input class="form-control mt-2" style="width: 250px;" type="text" id="edit_other_drug_resistant_tb_text" name="edit_other_drug_resistant_tb_text" placeholder="Specify">
                                            </div>
                                        </div>
                                    </fieldset>

                                </div>

                                <div class="rightConsClassification">
                                    
                                    <fieldset class="row mb-3 diagnosisArea">
                                        <legend class="col-form-label col-sm-12 pt-0">Registration Group:</legend>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_registration[]" id="edit_reg_new" value="New">
                                                <label class="form-check-label" for="edit_reg_new">New</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_registration[]" id="edit_reg_relapse" value="Relapse">
                                                <label class="form-check-label" for="edit_reg_relapse">Relapse</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_registration[]" id="edit_reg_talf" value="TALF">
                                                <label class="form-check-label" for="edit_reg_talf">TALF</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_registration[]" id="edit_reg_taf" value="TAF">
                                                <label class="form-check-label" for="edit_reg_taf">TAF</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_registration[]" id="edit_reg_ptou" value="PTOU">
                                                <label class="form-check-label" for="edit_reg_ptou">PTOU</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_registration[]" id="edit_reg_unknown" value="Unknown">
                                                <label class="form-check-label" for="edit_reg_unknown">Unknown</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="column mb-3">
                                        <label for="edit_inputStatus" class="form-label">Status</label>
                                        <select id="edit_inputStatus" class="form-select" name="edit_inputStatus">
                                            <option selected disabled>Choose...</option>
                                            <option value="Active TB">Active TB</option>
                                            <option value="Under Treatment">Under Treatment</option>
                                            <option value="Managing TB">Managing TB</option>
                                            <option value="In Recovery">In Recovery</option>
                                            <option value="TB Free">TB Free</option>
                                        </select>
                                        <span class="text-danger error-text edit_inputStatus_error"></span>
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
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
        </div>
    </div><!-- End EDIT Extra Large Modal-->

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


    const residentData = {
        @foreach($residents as $resident)
            "{{ $resident->res_id }}": {
                res_address: "{{ addslashes($resident->res_address) }}",
                res_bdate: "{{ $resident->res_bdate }}",
                res_sex: "{{ $resident->res_sex }}",
                res_contact: "{{ $resident->res_contact }}",
                res_citizen: "{{ $resident->res_citizen }}"
            },
        @endforeach
    };

    function calculateAge(birthDate) {
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDifference = today.getMonth() - birthDate.getMonth();
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    function updateResidentDetails(selectElement) {
        const selectedId = selectElement.value;

        if (selectedId) {
            const residentInfo = residentData[selectedId];

            if (residentInfo) {
                document.getElementById('inputCurAdd').value = residentInfo.res_address;
                document.getElementById('inputDob').value = residentInfo.res_bdate;

                // Calculate age from the birth date
                const birthDate = new Date(residentInfo.res_bdate);
                const age = calculateAge(birthDate);
                document.getElementById('inputAge').value = age;

                document.getElementById('inputSex').value = residentInfo.res_sex;
                document.getElementById('inputConNum').value = residentInfo.res_contact;
                document.getElementById('inputNat').value = residentInfo.res_citizen;
            }
        } else {
            // Clear fields if no resident is selected
            document.getElementById('inputCurAdd').value = '';
            document.getElementById('inputDob').value = '';
            document.getElementById('inputAge').value = '';
            document.getElementById('inputSex').value = '';
            document.getElementById('inputConNum').value = '';
            document.getElementById('inputNat').value = '';
        }
    }

    //insert dstb
    $(function(){      
        $("#tbForm").on('submit', function(e){
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
                        $('#tbForm')[0].reset();

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
                            Failed to add new Medicine. Please try again. 
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
    function openEditModal(dstb_id) {
        $.ajax({
            url: `/dstb/${dstb_id}`,
            method: 'GET',
            success: function(response) {
                if (response.status === 1) 
                {
                    //Case Finding
                        $('#edit_dstb_id').val(response.data.dstb_id);
                        $('#Edit_inputDiagnosingFac').val(response.data.dstb_inputDiagnosingFac);
                        $('#Edit_inputNtpCode').val(response.data.dstb_inputNtpCode);
                        $('#Edit_inputProvinceHuc').val(response.data.dstb_inputProvinceHuc);
                        $('#Edit_inputRegion').val(response.data.dstb_inputRegion);
                        
                    //patient info
                        let fullName = `${response.data.resident.res_lname}, ${response.data.resident.res_fname} ${response.data.resident.res_mname ?? ''} ${response.data.resident.res_suffix ?? ''}`;
                        $('#Edit_inputPatient').val(fullName);
                        $('#Edit_inputDob').val(response.data.resident.res_bdate);
                        $('#Edit_inputSex').val(response.data.resident.res_sex);
                        $('#Edit_inputPermAdd').val(response.data.dstb_permAdd);
                        $('#Edit_inputCurAdd').val(response.data.resident.res_address);
                        $('#Edit_inputConNum').val(response.data.resident.res_contact);
                        $('#Edit_inputOtherNum').val(response.data.dstb_inputOtherNum);
                        $('#Edit_inputPhilHealth').val(response.data.dstb_inputPhilHealth);
                        $('#Edit_inputNat').val(response.data.resident.res_citizen);


                    // Screening Info
                        $('#edit_inputRefLoc').val(response.data.dstb_inputRefLoc);
                        // if (response.data.dstb_refferedBy) 
                        // {
                        //     let referredBy = JSON.parse(response.data.dstb_refferedBy);
                        //     $('input[name="edit_refferedBy[]"]').prop('checked', false);
                            
                        //     referredBy.forEach(function(value) 
                        //     {
                        //         $('input[name="edit_refferedBy[]"][value="' + value + '"]').prop('checked', true);
                        //     });
                        // } 
                        // else 
                        // {
                        //     $('input[name="edit_refferedBy[]"]').prop('checked', false);
                        // }

                        if (response.data.dstb_refferedBy && response.data.dstb_refferedBy !== 'null') 
                        {
                            let referredBy = JSON.parse(response.data.dstb_refferedBy);
                            $('input[name="edit_refferedBy[]"]').prop('checked', false);

                            referredBy.forEach(function(value) 
                            {
                                $('input[name="edit_refferedBy[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_refferedBy[]"]').prop('checked', false);
                        }

                        let screeningMode = response.data.dstb_screeningMode;
                        if (screeningMode === 'PCF') {
                            $('#edit_screeningModePcf').prop('checked', true);
                        } else if (screeningMode === 'ACF') {
                            $('#edit_screeningModeAcf').prop('checked', true);
                        } else if (screeningMode === 'ICF') {
                            $('#edit_screeningModeIcf').prop('checked', true);
                        } else if (screeningMode === 'ECF') {
                            $('#edit_screeningModeEcf').prop('checked', true);
                        }

                        if (response.data.dstb_screeningMode) 
                        {
                            let screenMode = JSON.parse(response.data.dstb_screeningMode);
                            $('input[name="edit_screeningMode[]"]').prop('checked', false);
                            
                            screenMode.forEach(function(value) 
                            {
                                $('input[name="edit_screeningMode[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_screeningMode[]"]').prop('checked', false);
                        }
                        $('#edit_dateScreening').val(response.data.dstb_dateScreening);
                        
                    //LABORATORY TEST
                        if (response.data.dstb_testName) 
                        {
                            let testName = JSON.parse(response.data.dstb_testName);
                            $('input[name="edit_testName[]"]').prop('checked', false);
                            
                            testName.forEach(function(value) 
                            {
                                $('input[name="edit_testName[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_testName[]"]').prop('checked', false);
                        }
                        $('#edit_othersDetails').val(response.data.dstb_othersDetails || '');                    
                        $('#edit_dateTestXpert').val(response.data.dstb_dateTestXpert);
                        $('#edit_dateTestSmear').val(response.data.dstb_dateTestSmear);
                        $('#edit_dateTestChest').val(response.data.dstb_dateTestChest);
                        $('#edit_dateTestTuborculin').val(response.data.dstb_dateTestTuborculin);
                        $('#edit_dateTestOther').val(response.data.dstb_dateTestOther);                   
                        $('#edit_resultTestXpert').val(response.data.dstb_resultTestXpert);
                        $('#edit_resultTestSmear').val(response.data.dstb_resultTestSmear);
                        $('#edit_resultTestChest').val(response.data.dstb_resultTestChest);
                        $('#edit_resultTestTuborculin').val(response.data.dstb_resultTestTuborculin);
                        $('#edit_resultTestOther').val(response.data.dstb_resultTestOther);

                    //diagnosis
                        let editTb = response.data.dstb_tuberculosis;
                        if (editTb === 'TB Disease') {
                            $('#edit_tb_disease').prop('checked', true);
                        } 
                        else if (editTb === 'TB Infection') {
                            $('#edit_tb_infection').prop('checked', true);
                        }
                        $('#edit_dateDiagnosis').val(response.data.dstb_dateDiagnosis);
                        $('#edit_tbCaseNum').val(response.data.dstb_tbCaseNumber);
                        $('#edit_dateNotif').val(response.data.dstb_dateNotification);
                        $('#edit_attendingPhysician').val(response.data.dstb_attendingPhysician);

                    //reffered to
                        $('#edit_refferedToName').val(response.data.dstb_referredToName);
                        $('#edit_refferedToAddress').val(response.data.dstb_referredToAddress);
                        $('#edit_refferedToFcode').val(response.data.dstb_referredToFcode);
                        $('#edit_refferedToProvHuc').val(response.data.dstb_referredToProvHuc);
                        $('#edit_refferedToRegion').val(response.data.dstb_referredToRegion);
                    
                    //TB Disease Classification
                        let bacStatus = response.data.dstb_bacteriologicalStatus;
                        if (bacStatus === 'Bacteriologically-Confirmed TB') 
                        {
                            $('#edit_bacteriologically_Confirmed').prop('checked', true);
                        } 
                        else if (bacStatus === 'Clinically-Diagnosed TB') 
                        {
                            $('#edit_clinically_Diagnosed').prop('checked', true);
                        } 

                        let anatomicalSite = response.data.dstb_pulmonarySite;
                        if (anatomicalSite === 'Pulmonary') 
                        {
                            $('#edit_anatomical_Pulmonary').prop('checked', true);
                        } 
                        else if (anatomicalSite === 'Extra Pulmonary') 
                        {
                            $('#edit_extra_pulmonary').prop('checked', true);
                        }
                        $('#edit_specificPulmonarySite').val(response.data.dstb_specificPulmonarySite); 

                        if (response.data.dstb_drugResistance) 
                        {
                            let drugRes = JSON.parse(response.data.dstb_drugResistance);
                            $('input[name="edit_drugResistence[]"]').prop('checked', false);
                            
                            drugRes.forEach(function(value) 
                            {
                                $('input[name="edit_drugResistence[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_drugResistence[]"]').prop('checked', false);
                        }
                        $('#other_drug_resistant_tb_text').val(response.data.dstb_drugResistanceSpecific);
                        

                        if (response.data.dstb_registrationGroup) 
                        {
                            let regGroup = JSON.parse(response.data.dstb_registrationGroup);
                            $('input[name="edit_registration[]"]').prop('checked', false);
                            
                            regGroup.forEach(function(value) 
                            {
                                $('input[name="edit_registration[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_registration[]"]').prop('checked', false);
                        }
                        $('#edit_inputStatus').val(response.data.dstb_status);

                    // Open the modal
                        $('#editDstbModal').modal('show');
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

    //update data dstb
    $(document).on('submit', '#editDstbForm', function (e) {
        e.preventDefault(); // Prevent default form submission behavior

        var dstb_id = $('#edit_dstb_id').val(); 

        // Create a FormData object with the form fields
        var formData = new FormData();
        formData.append('Edit_inputDiagnosingFac', $('#Edit_inputDiagnosingFac').val());
        formData.append('Edit_inputNtpCode', $('#Edit_inputNtpCode').val());
        formData.append('Edit_inputProvinceHuc', $('#Edit_inputProvinceHuc').val());
        formData.append('Edit_inputRegion', $('#Edit_inputRegion').val());

        formData.append('Edit_inputPermAdd', $('#Edit_inputPermAdd').val());
        formData.append('Edit_inputOtherNum', $('#Edit_inputOtherNum').val());
        formData.append('Edit_inputPhilHealth', $('#Edit_inputPhilHealth').val());

        formData.append('edit_inputRefLoc', $('#edit_inputRefLoc').val());
        formData.append('edit_dateScreening', $('#edit_dateScreening').val());

        formData.append('edit_othersDetails', $('#edit_othersDetails').val());
        formData.append('edit_dateTestXpert', $('#edit_dateTestXpert').val());
        formData.append('edit_dateTestSmear', $('#edit_dateTestSmear').val());
        formData.append('edit_dateTestChest', $('#edit_dateTestChest').val());
        formData.append('edit_dateTestTuborculin', $('#edit_dateTestTuborculin').val());
        formData.append('edit_dateTestOther', $('#edit_dateTestOther').val());
        formData.append('edit_resultTestXpert', $('#edit_resultTestXpert').val());
        formData.append('edit_resultTestSmear', $('#edit_resultTestSmear').val());
        formData.append('edit_resultTestChest', $('#edit_resultTestChest').val());
        formData.append('edit_resultTestTuborculin', $('#edit_resultTestTuborculin').val());
        formData.append('edit_resultTestOther', $('#edit_resultTestOther').val());

        formData.append('edit_dateDiagnosis', $('#edit_dateDiagnosis').val());
        formData.append('edit_tbCaseNum', $('#edit_tbCaseNum').val());
        formData.append('edit_dateNotif', $('#edit_dateNotif').val());
        formData.append('edit_attendingPhysician', $('#edit_attendingPhysician').val());

        formData.append('edit_refferedToName', $('#edit_refferedToName').val());
        formData.append('edit_refferedToAddress', $('#edit_refferedToAddress').val());
        formData.append('edit_refferedToFcode', $('#edit_refferedToFcode').val());
        formData.append('edit_refferedToProvHuc', $('#edit_refferedToProvHuc').val());
        formData.append('edit_refferedToRegion', $('#edit_refferedToRegion').val());

        formData.append('edit_specificPulmonarySite', $('#edit_specificPulmonarySite').val());
        formData.append('edit_other_drug_resistant_tb_text', $('#edit_other_drug_resistant_tb_text').val());
        formData.append('edit_inputStatus', $('#edit_inputStatus').val());

        //FOR CHECKBOXES
            var refferedByArray = [];
            $('input[name="edit_refferedBy[]"]:checked').each(function() {
                refferedByArray.push($(this).val());
            });
            
            if (refferedByArray.length > 0) {
                formData.append('edit_refferedBy', JSON.stringify(refferedByArray));
            } else {
                formData.append('edit_refferedBy', JSON.stringify([])); 
            }

            var screenModeArray = [];
            $('input[name="edit_screeningMode[]"]:checked').each(function() {
                screenModeArray.push($(this).val());
            });
            
            if (screenModeArray.length > 0) {
                formData.append('edit_screeningMode', JSON.stringify(screenModeArray));
            } else {
                formData.append('edit_screeningMode', JSON.stringify([])); 
            }


            var testNameArray = [];
            $('input[name="edit_testName[]"]:checked').each(function() {
                testNameArray.push($(this).val());
            });
            
            if (testNameArray.length > 0) {
                formData.append('edit_testName', JSON.stringify(testNameArray));
            } else {
                formData.append('edit_testName', JSON.stringify([])); 
            }


            var drugResistanceArray = [];
            $('input[name="edit_drugResistence[]"]:checked').each(function() {
                drugResistanceArray.push($(this).val());
            });
            
            if (drugResistanceArray.length > 0) {
                formData.append('edit_drugResistence', JSON.stringify(drugResistanceArray));
            } else {
                formData.append('edit_drugResistence', JSON.stringify([])); 
            }


            var regGroupArray = [];
            $('input[name="edit_registration[]"]:checked').each(function() {
                regGroupArray.push($(this).val());
            });
            
            if (drugResistanceArray.length > 0) {
                formData.append('edit_registration', JSON.stringify(regGroupArray));
            } else {
                formData.append('edit_registration', JSON.stringify([])); 
            }

        // FOR RADIO BUTTONS
            var tbDiagnosis = $('input[name="edit_tuberculosis"]:checked').val();
            if (tbDiagnosis) {
                formData.append('edit_tuberculosis', tbDiagnosis); 
            }

            var tbStatus = $('input[name="edit_Bacteriological"]:checked').val();
            if (tbStatus) {
                formData.append('edit_Bacteriological', tbStatus); 
            }

            var tbAnatomical = $('input[name="edit_pulmonarySite"]:checked').val();
            if (tbAnatomical) {
                formData.append('edit_pulmonarySite', tbAnatomical); 
            }
        //END OF FORMDATA APPEND

        $.ajax({
            type: "POST",
            url: "/updateDstb/" + dstb_id, // URL to handle the update
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
                            <i class="bi bi-exclamation-triangle me-1"></i> OPT Not Found.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                } else {
                    $('#alert-container3').html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i> OPT updated successfully!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                    $('#optFormSec').modal('hide');
                    location.reload();
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error response for debugging
                alert("An error occurred. Please check the console for more details.");
            }
        });
    });

    //update status
    function updateDstbStatus(dstbId, newStatus) 
    {
        fetch('/update-dstb-status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure you include the CSRF token for security
            },
            body: JSON.stringify({
                id: dstbId,
                status: newStatus
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('DSTB status updated successfully');
                location.reload(); // Optionally, reload the page to reflect the changes
            } else {
                alert('Failed to update DSTB status');
            }
        })
        .catch(error => console.error('Error:', error));
    }



</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>