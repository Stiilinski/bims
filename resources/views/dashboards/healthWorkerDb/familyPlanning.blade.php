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

    .averageField {
        width: 450px!important;
    }

    .mediumField {
        width: 300px;
    }

    .shortField {
        width: 250px;
    }

    .briefField {
        width: 100px;
    }

    .modal-body {
        display: flex;
        flex-direction: column;
    }

    .custom-modal-width {
        max-width: 95%; 
        width: 95%;
    }

    .signature-container {
        position: relative;
    }

    #signaturePad {
        width: 100%;
        height: 200px;
        border: 1px solid #ccc;
    }

    .inputGroupContainer {
        width: 100%;
        border: #ccc 1px solid;
        border-radius: 0.375rem;
        display: flex;
        flex-direction: column;
        padding-bottom: 10px;
    }

    .titleCaseFinding {
        width: 100%;
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

    .columnGrp, .pName {
        display: flex;
        flex-direction: column;
        gap: 6px;
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

    .pNames {
        width: 450px;
    }

    .rowGroup {
        display: flex;
        justify-content: space-evenly;
        gap: 10px
    }

    .columnGroup {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: flex-start;
        gap: 10px
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

    .leftCons, .centerCons, .rightCons {
        border: #dee2e6 solid 1px;
        padding: 10px
    }

    .columnCon {
        width: 100%;
        border: #dee2e6 solid 1px;
        padding: 10px;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;

    }

    .rowCon {
        width: 32.8%;
        border: #dee2e6 solid 1px;
        padding: 10px;
    }

    .rowConWhole {
        width: 100%;
        border: #dee2e6 solid 1px;
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

    .familyPlaningCon {
        padding: 10px
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

    .inputClusterContainer {
        display: flex;
        width: 100%;
        border: #dee2e6 solid 1px;
        justify-content: space-between;
        flex-wrap:wrap;
        padding: 10px;
        position: relative; 
        gap: 5px;
    }

    .inputClusterContainer::before {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        border-left: 1px solid #dee2e6; /* Vertical line style */
        height: 100%;
        z-index: 1; /* Ensure it is above other content */
    }

    .inputHalfGroupCon {
        width: 48%;
        border: #ccc 1px solid;
        border-radius: 0.375rem;
        display: flex;
        flex-direction: column;
        padding-bottom: 10px;
    }

    .formGrpCheckBox {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 15px;
    }

    .fieldSetGrp {
        display: flex;
        flex-direction: column;
        padding-left: 15px;
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
        <h1>Family Planning</h1>
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
                    @foreach($fp as $index => $fps)
                    </tr>
                        <td style="display: none;">{{ $fps->fp_id }}</td>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $fps->client->res_lname }}, {{ $fps->client->res_fname }} {{ $fps->client->res_mname ?? '' }} {{ $fps->client->res_suffix ?? '' }}</td>
                        <td>{{ $fps->client->res_bdate}}</td>
                        <td>{{ $fps->client->res_sex }}</td>
                        <td>{{ $fps->client->res_purok }}</td>
                        <td>{{ $fps->fp_status }}</td>
                        <td>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FirstModal" data-fp-id="{{ $fps->fp_id }}">+ Side B</button>
                            <a href="{{ route('fpForm', ['fp_id' => $fps->fp_id]) }}" class="btn btn-primary">View</a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" type="button" onclick="openEditModal({{ $fps->fp_id }})">Edit</button></li>
                                    <li><button class="dropdown-item" type="button" onclick="updateFpStatus({{ $fps->fp_id }}, 'Archive')">Archive</button></li>
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

      <!-- SIDE A -->
    <div class="modal fade" id="ExtralargeModal" tabindex="-1">
        <div class="modal-dialog custom-modal-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Family Planning Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('regValidation.fpInput') }}" class="fpInputForm" id="fpInputForm" autocomplete="off"> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Personal Information</span>
                            </div>
                            <div class="inputArea">
                                <div class="rowFirst columnGroup familyPlaningCon"> 
                                    <div class="columnCon">
                                        <input type="hidden" class="form-control" id="em_id" name="em_id" value="<?php echo $LoggedUserInfo['em_id'] ?>" readonly>
                                        <div class="column mb-3 pt-2">
                                            <label for="inputClient" class="form-label">Name of Client</label>
                                            <select id="inputClient" class="form-control averageField" name="inputClient" style="width: 100%" onchange="updateResidentDetails(this)">
                                                <option value="">Select...</option>
                                                @foreach($residents as $resident)
                                                    <option value="{{ $resident->res_id }}">
                                                        {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text inputClient_error"></span>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpDob" class="col-sm-5 col-form-label">Date of Birth</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control shortField" id="fpDob" name="fpDob" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpAge" class="col-sm-5 col-form-label">Age</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control briefField" id="fpAge" name="fpAge" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpEa" class="col-sm-8 col-form-label">Educational Attainment</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control mediumField" id="fpEa" name="fpEa" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpOcc" class="col-sm-8 col-form-label">Occupation</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 200px;" id="fpOcc" name="fpOcc" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpAdd" class="col-sm-8 col-form-label">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 328px;" id="fpAdd" name="fpAdd" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpCn" class="col-sm-8 col-form-label">Contact Number</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 328px;" id="fpCn" name="fpCn" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpCs" class="col-sm-8 col-form-label">Civil Status</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 328px;" id="fpCs" name="fpCs" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpReligion" class="col-sm-8 col-form-label">Religion</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 328px;" id="fpReligion" name="fpReligion" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="columnCon">                                       
                                        <div class="column mb-3 pt-2">
                                            <label for="inputSpouse" class="form-label">Name of Spouse</label>
                                            <select id="inputSpouse" class="form-control averageField" name="inputSpouse" style="width: 100%" onchange="updateSpouseDetails(this)">
                                                <option value="">Select...</option>
                                                @foreach($residents as $resident)
                                                    <option value="{{ $resident->res_id }}">
                                                        {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text inputSpouse_error"></span>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpSpouseDob" class="col-sm-5 col-form-label">Date of Birth</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control shortField" id="fpSpouseDob" name="fpSpouseDob">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpSpouseAge" class="col-sm-5 col-form-label">Age</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control briefField" id="fpSpouseAge" name="fpSpouseAge">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpSpouseOcc" class="col-sm-8 col-form-label">Occupation</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="fpSpouseOcc" name="fpSpouseOcc">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="columnCon" style="justify-content: space-between;">
                                        <div class="column mb-3">
                                            <label for="fpLiveChild" class="col-sm-8 col-form-label">No. of Living Children</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="fpLiveChild" name="fpLiveChild">
                                                <span class="text-danger error-text fpLiveChild_error"></span>
                                            </div>
                                        </div>

                                        <fieldset class="column mb-3" style="padding: 10px;">
                                            <legend class="col-form-label col-sm-12 pt-0">Plan To Have More Children?</legend>
                                            <div class="col-sm-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="children" id="children_yes" value="Yes">
                                                    <label class="form-check-label" for="children_yes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="children" id="children_no" value="No">
                                                    <label class="form-check-label" for="children_no">No</label>
                                                </div>
                                            </div>
                                            <span class="text-danger error-text children_error"></span>
                                        </fieldset>

                                        <div class="column mb-3">
                                            <label for="fpIncome" class="col-sm-8 col-form-label">Average Monthly Income</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="fpIncome" name="fpIncome">
                                                <span class="text-danger error-text fpIncome_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="columnCon">
                                        <div class="rowCon">
                                            <fieldset class="column mb-3" style="padding: 10px;">
                                                <legend class="col-form-label col-sm-12 pt-0">Client Type</legend>
                                                <div class="col-sm-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpClientType" id="clientNew" value="New Acceptor">
                                                        <label class="form-check-label" for="clientNew">New Acceptor</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpClientType" id="clientCurrent" value="Current User">
                                                        <label class="form-check-label" for="clientCurrent">Current User</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpClientType_error"></span>
                                            </fieldset>
                                            <hr>
                                            <fieldset class="column mb-3" style="padding: 10px;">
                                                <legend class="col-form-label col-sm-12 pt-0">Client Type (Follow Up)</legend>
                                                <div class="col-sm-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpClientTypeff" id="fpCm" value="Changing Method">
                                                        <label class="form-check-label" for="fpCm">Changing Method</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpClientTypeff" id="fpCc" value="Changing Clinic">
                                                        <label class="form-check-label" for="fpCc">Changing Clinic</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpClientTypeff" id="fpDr" value="Dropout/Restart">
                                                        <label class="form-check-label" for="fpDr">Dropout/Restart</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpClientTypeff_error"></span>
                                            </fieldset>
                                        </div>

                                        <div class="rowCon">
                                            <fieldset class="column mb-3" style="padding: 10px;">
                                                <legend class="col-form-label col-sm-12 pt-0">Reason for FP</legend>
                                                <div class="col-sm-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpReasonFp" id="fpSpacing" value="Spacing">
                                                        <label class="form-check-label" for="fpSpacing">Spacing</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpReasonFp" id="fpLimiting" value="Limiting">
                                                        <label class="form-check-label" for="fpLimiting">Limiting</label>
                                                    </div>
                                                    <span class="text-danger error-text fpReasonFp_error"></span>
                                                </div>
                                                <div class="column mb-3" style="display: flex; justify-content:flex-start; align-items:center">
                                                    <label class="col-sm-2" for="fpReasonOtherFp">Others:</label>
                                                    <input class="form-control shortField" type="text" name="fpReasonOtherFp" id="fpReasonOtherFp" placeholder="Specify...">
                                                    <span class="text-danger error-text fpReasonOtherFp_error"></span>
                                                </div>
                                            </fieldset>

                                            <hr>

                                            <fieldset class="column mb-3" style="padding: 10px;">
                                                <legend class="col-form-label col-sm-12 pt-0">Reason</legend>
                                                <div class="col-sm-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpReason" id="fpMed" value="Medical Condition">
                                                        <label class="form-check-label" for="fpMed">Medical Condition</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpReason" id="fpSide" value="Side Effects">
                                                        <label class="form-check-label" for="fpSide">Side Effects</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpReason_error"></span>
                                            </fieldset>
                                            <div class="column mb-3" style="display: flex; justify-content:flex-start; align-items:center">
                                                <label class="col-sm-5" for="fpReasonSpecifySs">Side Effects (Specify)</label>
                                                <input class="form-control shortField" type="text" name="fpReasonSpecifySs" id="fpReasonSpecifySs" placeholder="Specify...">
                                                <span class="text-danger error-text fpReasonSpecifySs_error"></span>
                                            </div>
                                        </div>

                                        <div class="rowCon">
                                            <fieldset class="row mb-3 diagnosisArea">
                                                <legend class="col-form-label col-sm-12 pt-0">Method Currently Used(For Changing Methods):</legend>
                                                <div class="formGrpCheckBox">
                                                    <div class="grp1">
                                                        <!-- Checkboxes for methods -->
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="ccc" name="method[]" value="COC">
                                                            <label class="form-check-label" for="ccc">COC</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="pop" name="method[]" value="POP">
                                                            <label class="form-check-label" for="pop">POP</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="injectable" name="method[]" value="Injectable">
                                                            <label class="form-check-label" for="injectable">Injectable</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="implant" name="method[]" value="Implant">
                                                            <label class="form-check-label" for="implant">Implant</label>
                                                        </div>
                                                    </div>

                                                    <div class="grp2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="condom" name="method[]" value="Condom">
                                                            <label class="form-check-label" for="condom">Condom</label>
                                                        </div>
                                                    
                                                        <!-- IUD checkbox with conditional logic -->
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="iud" name="method[]" value="IUD" onchange="toggleIntervalPostPartum(this)">
                                                            <label class="form-check-label" for="iud">IUD</label>
                                                        </div>
                                                    
                                                        <!-- Interval and Post-Partum checkboxes (Initially disabled) -->
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="interval" name="methodIud[]" value="Interval" disabled>
                                                            <label class="form-check-label" for="interval">Interval</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="postpartum" name="methodIud[]" value="Post-Partum" disabled>
                                                            <label class="form-check-label" for="postpartum">Post-Partum</label>
                                                        </div>
                                                        <span class="text-danger error-text methodIud_error"></span>
                                                    </div>
                                                    
                                                    <div class="grp3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="sdm" name="method[]" value="SDM">
                                                            <label class="form-check-label" for="sdm">SDM</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="bom" name="method[]" value="BOM/CMM">
                                                            <label class="form-check-label" for="bom">BOM/CMM</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="bbt" name="method[]" value="BBT">
                                                            <label class="form-check-label" for="bbt">BBT</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="stm" name="method[]" value="STM">
                                                            <label class="form-check-label" for="stm">STM</label>
                                                        </div>
                                                    </div>

                                                    <div class="grp4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="lam" name="method[]" value="LAM">
                                                            <label class="form-check-label" for="lam">LAM</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="others" name="method[]" onchange="toggleOthers(this)">
                                                            <label class="form-check-label" for="others">Others</label>
                                                        </div>
                                                        <span class="text-danger error-text method_error"></span>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control mediumField" id="other_specify" name="other_specify" placeholder="Specify..." disabled>
                                                            <span class="text-danger error-text other_specify_error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>

                        <div class="inputClusterContainer">
                            <div class="inputHalfGroupCon">
                                <div class="titleCaseFinding">
                                    <span>Medical History</span>
                                </div>
                                <div class="inputArea">
                                    <div class="rowGroup"> 
                                        <div class="rowConWhole" style="border: none;">
                                            <p>Does the client have any of the following?</p>


                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Severe Headaches / Migraine:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpMigraine" id="fpMigraineYes" value="Yes">
                                                        <label class="form-check-label" for="fpMigraineYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpMigraine" id="fpMigraineNo" value="No">
                                                        <label class="form-check-label" for="fpMigraineNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpMigraine_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">History of Stroke / Heart Attack / Hypertension:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpStroke" id="fpStrokeYes" value="Yes">
                                                        <label class="form-check-label" for="fpStrokeYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpStroke" id="fpStrokeNo" value="No">
                                                        <label class="form-check-label" for="fpStrokeNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpStroke_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 " style="font-size: 14px;">Non-Traumatic Hematoma / Frequent Bruising / Gum Bleeding:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpHematoma" id="fpHematomaYes" value="Yes">
                                                        <label class="form-check-label" for="fpHematomaYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpHematoma" id="fpHematomaNo" value="No">
                                                        <label class="form-check-label" for="fpHematomaNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpHematoma_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Current or History of Breast Cancer / Breast Mass:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpBreast" id="fpBreastYes" value="Yes">
                                                        <label class="form-check-label" for="fpBreastYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpBreast" id="fpBreastNo" value="No">
                                                        <label class="form-check-label" for="fpBreastNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpBreast_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Severe Chest Pain:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpChest" id="fpChestYes" value="Yes">
                                                        <label class="form-check-label" for="fpChestYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpChest" id="fpChestNo" value="No">
                                                        <label class="form-check-label" for="fpChestNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpChest_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Cough For More Than 14 Days:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpCough" id="fpCoughYes" value="Yes">
                                                        <label class="form-check-label" for="fpCoughYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpCough" id="fpCoughNo" value="No">
                                                        <label class="form-check-label" for="fpCoughNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpCough_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Jaundice:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpJaundice" id="fpJaundiceYes" value="Yes">
                                                        <label class="form-check-label" for="fpJaundiceYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpJaundice" id="fpJaundiceNo" value="No">
                                                        <label class="form-check-label" for="fpJaundiceNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpJaundice_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Unexplained Vaginal Bleeding:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpVBleed" id="fpVBleedYes" value="Yes">
                                                        <label class="form-check-label" for="fpVBleedYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpVBleed" id="fpVBleedNo" value="No">
                                                        <label class="form-check-label" for="fpVBleedNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpVBleed_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Abnormal Vaginal Discharge:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpDischarge" id="fpDischargeYes" value="Yes">
                                                        <label class="form-check-label" for="fpDischargeYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpDischarge" id="fpDischargeNo" value="No">
                                                        <label class="form-check-label" for="fpDischargeNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpDischarge_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Intake of Phenobarbital(Anti-Seizure) / Rifampicin(Anti-TB):</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpIntake" id="fpIntakeYes" value="Yes">
                                                        <label class="form-check-label" for="fpIntakeYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpIntake" id="fpIntakeNo" value="No">
                                                        <label class="form-check-label" for="fpIntakeNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpIntake_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Is The Client A Smoker:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpSmoker" id="fpSmokerYes" value="Yes">
                                                        <label class="form-check-label" for="fpSmokerYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpSmoker" id="fpSmokerNo" value="No">
                                                        <label class="form-check-label" for="fpSmokerNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpSmoker_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap: nowrap;">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">With Disability?:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpDisability" id="fpDisabilityYes" value="Yes">
                                                        <label class="form-check-label" for="fpDisabilityYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpDisability" id="fpDisabilityNo" value="No">
                                                        <label class="form-check-label" for="fpDisabilityNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpDisability_error"></span>
                                            </fieldset>

                                            <div class="input-group">
                                                <input type="text" class="form-control" id="disabilityDetails" name="disabilityDetails" placeholder="If YES Please Specify..." disabled>
                                                <span class="text-danger error-text disabilityDetails_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div> {{--End of Medical History--}}

                            <div class="inputHalfGroupCon" style="height:375px!important;">
                                <div class="titleCaseFinding">
                                    <span>Risks For Violence Against Women</span>
                                </div>
                                <div class="inputArea">
                                    <div class="rowGroup"> 
                                        <div class="rowConWhole" style="border: none;">
                                            
                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Unpleasant Relationship With Partner:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpUnpleasant" id="fpUnpleasantYes" value="Yes">
                                                        <label class="form-check-label" for="fpUnpleasantYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpUnpleasant" id="fpUnpleasantNo" value="No">
                                                        <label class="form-check-label" for="fpUnpleasantNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpUnpleasant_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Partner Does Not Approve of the Visit to FP Clinic:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpNotApprove" id="fpNotApproveYes" value="Yes">
                                                        <label class="form-check-label" for="fpNotApproveYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpNotApprove" id="fpNotApproveNo" value="No">
                                                        <label class="form-check-label" for="fpNotApproveNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpNotApprove_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">History of Domestic Violence / VAW:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpVaw" id="fpVawYes" value="Yes">
                                                        <label class="form-check-label" for="fpVawYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpVaw" id="fpVawNo" value="No">
                                                        <label class="form-check-label" for="fpVawNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpVaw_error"></span>
                                            </fieldset>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Reffered To:</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpRefferedVaw[]" id="fpRefferedVawDswd" value="DSWD">
                                                            <label class="form-check-label" for="fpRefferedVawDswd">DSWD</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpRefferedVaw[]" id="fpRefferedVawWcpu" value="WCPU">
                                                            <label class="form-check-label" for="fpRefferedVawWcpu">WCPU</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpRefferedVaw[]" id="fpRefferedVawNgo" value="NGOs">
                                                            <label class="form-check-label" for="fpRefferedVawNgo">NGOs</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpRefferedVaw[]" id="fpOtherVaw" value="None">
                                                            <label class="form-check-label" for="fpOtherVaw">Others</label>
                                                        </div>
                                                        <span class="text-danger error-text fpRefferedVaw_error"></span>
                                                    </div>
                                                    <div class="column mb-3">
                                                        <input type="text" class="form-control" id="othersVaw" name="othersVaw" style="width: 250px;" placeholder="Specify..." disabled>
                                                        <span class="text-danger error-text othersVaw_error"></span>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>   
                            </div> {{--End of VIOLENCE AGAINST WOMEN--}}

                            <div class="inputHalfGroupCon" style="height:750px!important;">
                                <div class="titleCaseFinding">
                                    <span>Obstetrical History</span>
                                </div>
                                <div class="inputArea">
                                    <div class="rowGroup"> 
                                        <div class="rowConWhole" style="border: none;">

                                            <div class="row mb-3 align-items-center">
                                                <label for="fpOcc" class="col-sm-4 col-form-label">Number of Pregnancies:</label>
                                                <div class="col-sm-8 d-flex" style="gap: 10px; flex-wrap:wrap;">
                                                    <input type="number" class="form-control " style="width: 150px" id="fpNumG" name="fpNumG" placeholder="G">
                                                    <input type="number" class="form-control " style="width: 150px" id="fpNumP" name="fpNumP" placeholder="P">
                                                    <input type="number" class="form-control " style="width: 150px" id="fpNumFullTerm" name="fpNumFullTerm" placeholder="Full Term">
                                                    <input type="number" class="form-control " style="width: 150px" id="fpNumPremature" name="fpNumPremature" placeholder="Premature">
                                                    <input type="number" class="form-control " style="width: 150px" id="fpNumAbortion" name="fpNumAbortion" placeholder="Abortion">
                                                    <input type="number" class="form-control " style="width: 150px" id="fpNumLivingChildren" name="fpNumLivingChildren" placeholder="Living Children">
                                                </div>
                                            </div>

                                            <div class="row mb-3 align-items-center">
                                                <label for="fpOcc" class="col-sm-4 col-form-label">Date of Last Delivery:</label>
                                                <div class="col-sm-8 d-flex" style="gap: 10px; flex-wrap:wrap;">
                                                    <input type="date" class="form-control " style="width: 150px" id="dateLastDelivery" name="dateLastDelivery">
                                                </div>
                                            </div>

                                            <fieldset class="row mb-3" style=" flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-4 pt-0">Type of Delivery:</legend>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="deliveryType" id="deliveryVaginal" value="Vaginal">
                                                        <label class="form-check-label" for="deliveryVaginal">Vaginal</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="deliveryType" id="deliveryCSection" value="Cesarean Section">
                                                        <label class="form-check-label" for="deliveryCSection">Cesarean Section</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <div class="row mb-3 align-items-center">
                                                <label for="fpOcc" class="col-sm-4 col-form-label">Last Menstrual Period:</label>
                                                <div class="col-sm-8 d-flex" style="gap: 10px; flex-wrap:wrap;">
                                                    <input type="date" class="form-control " style="width: 150px" id="dateLastPeriod" name="dateLastPeriod">
                                                </div>
                                            </div>

                                            <div class="row mb-3 align-items-center">
                                                <label for="fpOcc" class="col-sm-4 col-form-label">Previous Menstrual Period:</label>
                                                <div class="col-sm-8 d-flex" style="gap: 10px; flex-wrap:wrap;">
                                                    <input type="date" class="form-control " style="width: 150px" id="datePrevPeriod" name="datePrevPeriod">
                                                </div>
                                            </div>

                                            <fieldset class="row mb-3 align-items-center" style=" flex-wrap:nowrap">
                                                <label for="nameOfTest" class="col-sm-4 col-form-label">Menstrual Flow:</label>
                                                <div class="col-sm-12">
                                                    <div class="checkbox-container" style="flex-direction:column;">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpMenstrualFlow[]" id="fpFlowScanty" value="Scanty (1 - 2 Pads Per Day)">
                                                            <label class="form-check-label" for="fpRefferedVawDswd">Scanty (1 - 2 Pads Per Day)</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpMenstrualFlow[]" id="fpFlowModerate" value="Moderate (3 - 5 Pads Per Day)">
                                                            <label class="form-check-label" for="fpFlowModerate">Moderate (3 - 5 Pads Per Day)</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpMenstrualFlow[]" id="fpFlowHeavy" value="Heavy (> 5 Pads Per Day)">
                                                            <label class="form-check-label" for="fpFlowHeavy">Heavy (> 5 Pads Per Day)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3" style=" flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-4 pt-0">Dysmenorrhea:</legend>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpDys" id="dysYes" value="Yes">
                                                        <label class="form-check-label" for="dysYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpDys" id="dysNo" value="No">
                                                        <label class="form-check-label" for="dysNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3" style=" flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-4 pt-0">Hydatidiform Mole:</legend>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpHyda" id="hydaYes" value="Yes">
                                                        <label class="form-check-label" for="hydaYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpHyda" id="hydaNo" value="No">
                                                        <label class="form-check-label" for="hydaNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3" style=" flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-4 pt-0">History of Ectopic Pregnancy:</legend>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpEcto" id="ectoYes" value="Yes">
                                                        <label class="form-check-label" for="ectoYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpEcto" id="ectoNo" value="No">
                                                        <label class="form-check-label" for="ectoNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>   
                            </div> {{--End of OBSTETRICAL HISTORY--}}

                            <div class="inputHalfGroupCon" style="height:1434px!important; margin-top:-335px">
                                <div class="titleCaseFinding">
                                    <span>Physical Examination</span>
                                </div>
                                <div class="inputArea">
                                    <div class="rowGroup"> 
                                        <div class="rowConWhole" style="border: none;">
                                            
                                            <div class="rowGroup">
                                                <div class="column mb-3">
                                                    <label for="fpinputOHt" class="col-sm-12 col-form-label">Height (m)</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control briefField" id="fpinputOHt" name="fpinputOHt">
                                                    </div>
                                                </div>
            
                                                <div class="column mb-3">
                                                    <label for="fpinputOWt" class="col-sm-12 col-form-label">Weight (kg)</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control briefField" id="fpinputOWt" name="fpinputOWt">
                                                    </div>
                                                </div>
            
                                                <div class="column mb-3">
                                                    <label for="fpinputBp" class="col-sm-5 col-form-label">BP</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control briefField" id="fpinputBp" name="fpinputBp">
                                                    </div>
                                                </div>

                                                <div class="column mb-3">
                                                    <label for="fpinputPr" class="col-sm-10 col-form-label">Pulse Rate</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control briefField" id="fpinputPr" name="fpinputPr">
                                                    </div>
                                                </div>
                                            </div>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Skin:</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeSkin[]" id="fpPeSkinNormal" value="Normal">
                                                            <label class="form-check-label" for="fpPeSkinNormal">Normal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeSkin[]" id="fpPeSkinPale" value="Pale">
                                                            <label class="form-check-label" for="fpPeSkinPale">Pale</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeSkin[]" id="fpPeSkinYellow" value="Yellowish">
                                                            <label class="form-check-label" for="fpPeSkinYellow">Yellowish</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeSkin[]" id="fpPeSkinHema" value="Hematoma">
                                                            <label class="form-check-label" for="fpPeSkinHema">Hematoma</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Conjuctiva:</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeConj[]" id="fpPeConjNormal" value="Normal">
                                                            <label class="form-check-label" for="fpPeConjNormal">Normal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeConj[]" id="fpPeConjPale" value="Pale">
                                                            <label class="form-check-label" for="fpPeConjPale">Pale</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeConj[]" id="fpPeConjYellow" value="Yellowish">
                                                            <label class="form-check-label" for="fpPeConjYellow">Yellowish</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Neck:</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeNeck[]" id="fpPeNeckNormal" value="Normal">
                                                            <label class="form-check-label" for="fpPeNeckNormal">Normal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeNeck[]" id="fpPeNeckNm" value="Neck Mass">
                                                            <label class="form-check-label" for="fpPeNeckNm">Neck Mass</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeNeck[]" id="fpPeNeckEnlarge" value="Enlarge Lymph Nodes">
                                                            <label class="form-check-label" for="fpPeNeckEnlarge">Enlarge Lymph Nodes</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Breast:</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeBreast[]" id="fpPeBreastNormal" value="Normal">
                                                            <label class="form-check-label" for="fpPeBreastNormal">Normal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeBreast[]" id="fpPeBreastMass" value="Mass">
                                                            <label class="form-check-label" for="fpPeBreastMass">Mass</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeBreast[]" id="fpPeBreastNd" value="Nipple Discharge">
                                                            <label class="form-check-label" for="fpPeBreastNd">Nipple Discharge</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Abdomen:</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeAbdomen[]" id="fpPeAbdomenNormal" value="Normal">
                                                            <label class="form-check-label" for="fpPeAbdomenNormal">Normal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeAbdomen[]" id="fpPeAbdomenAm" value="Abdominal Mass">
                                                            <label class="form-check-label" for="fpPeAbdomenAm">Abdominal Mass</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeAbdomen[]" id="fpPeAbdomenVar" value="Varicosities">
                                                            <label class="form-check-label" for="fpPeAbdomenVar">Varicosities</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Extremities:</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeExtremities[]" id="fpPeExtremitiesNormal" value="Normal">
                                                            <label class="form-check-label" for="fpPeExtremitiesNormal">Normal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeExtremities[]" id="fpPeExtremitiesEd" value="Edema">
                                                            <label class="form-check-label" for="fpPeExtremitiesEd">Edema</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPeExtremities[]" id="fpPeExtremitiesVar" value="Varicosities">
                                                            <label class="form-check-label" for="fpPeExtremitiesVar">Varicosities</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Pelvic Examination:</label>
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">(<i>For IUD Acceptors</i>)</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container" style="flex-direction: column;">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPelExIud[]" id="fpPelExIudNormal" value="Normal">
                                                            <label class="form-check-label" for="fpPelExIudNormal">Normal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPelExIud[]" id="fpPelExIudMass" value="Mass">
                                                            <label class="form-check-label" for="fpPelExIudMass">Mass</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPelExIud[]" id="fpPelExIudAd" value="Abdominal Discharge">
                                                            <label class="form-check-label" for="fpPelExIudAd">Abdominal Discharge</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPelExIud[]" id="fpPelExIudCa" value="Cervical Abnormalities">
                                                            <label class="form-check-label" for="fpPelExIudCa">Cervical Abnormalities</label>
                                                        </div>

                                                            <div class="fieldSetGrp">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="fpPelExIudCab[]" id="fpPelExIudCabWarts" value="Warts" disabled>
                                                                    <label class="form-check-label" for="fpPelExIudCabWarts">Warts</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="fpPelExIudCab[]" id="fpPelExIudCabCyst" value="Polyp or Cyst" disabled>
                                                                    <label class="form-check-label" for="fpPelExIudCabCyst">Polyp or Cyst</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="fpPelExIudCab[]" id="fpPelExIudCabInf" value="Inflammation or Erosion" disabled>
                                                                    <label class="form-check-label" for="fpPelExIudCabInf">Inflammation or Erosion</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="fpPelExIudCab[]" id="fpPelExIudCabBloody" value="Bloody Discharge" disabled>
                                                                    <label class="form-check-label" for="fpPelExIudCabBloody">Bloody Discharge</label>
                                                                </div>
                                                            </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPelExIud[]" id="fpPelExIudCc" value="Cervical Consistency">
                                                            <label class="form-check-label" for="fpPelExIudCc">Cervical Consistency</label>
                                                        </div>

                                                            <div class="fieldSetGrp">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="fpPelExIudCerCon[]" id="fpPelExIudCcFirm" value="Firm" disabled>
                                                                    <label class="form-check-label" for="fpPelExIudCcFirm">Firm</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="fpPelExIudCerCon[]" id="fpPelExIudCcSoft" value="Soft" disabled>
                                                                    <label class="form-check-label" for="fpPelExIudCcSoft">Soft</label>
                                                                </div>
                                                            </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPelExIud[]" id="fpPelExIudCt" value="Cervical Tenderness" >
                                                            <label class="form-check-label" for="fpPelExIudCt">Cervical Tenderness</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPelExIud[]" id="fpPelExIudAmt" value="Adnexal Mass / Tenderness" >
                                                            <label class="form-check-label" for="fpPelExIudAmt">Adnexal Mass / Tenderness</label>
                                                        </div>


                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="fpPelExIud[]" id="fpPelExIudUp" value="Uterine Position">
                                                            <label class="form-check-label" for="fpPelExIudUp">Uterine Position</label>
                                                        </div>

                                                            <div class="fieldSetGrp">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="fpPelExIudUtPo[]" id="fpPelExIudUtPoMid" value="Mid" disabled>
                                                                    <label class="form-check-label" for="fpPelExIudUtPoMid">Mid</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="fpPelExIudUtPo[]" id="fpPelExIudUtPoAf" value="Anteflexed" disabled>
                                                                    <label class="form-check-label" for="fpPelExIudUtPoAf">Anteflexed</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="fpPelExIudUtPo[]" id="fpPelExIudUtPoRf" value="Retroflexed" disabled>
                                                                    <label class="form-check-label" for="fpPelExIudUtPoRf">Retroflexed</label>
                                                                </div>
                                                            </div>
                                                        
                                                        <div class="column mb-3">
                                                            <label for="fpPelExUd" class="col-sm-12 col-form-label">Uterine Depth(cm)</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control shortField" id="fpPelExUd" name="fpPelExUd">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>   
                            </div> {{--End of PHYSICAL EXAMINATION--}}

                            <div class="inputHalfGroupCon" style="height:375px!important; margin-top:-350px">
                                <div class="titleCaseFinding">
                                    <span>Risks For Sexually Transmitted Infections</span>
                                </div>
                                <div class="inputArea">
                                    <div class="rowGroup"> 
                                        <div class="rowConWhole" style="border: none;">
                                            <p><i>Does the client or the client's partner have the following?</i></p>
                                            
                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Abnormal Discharge From The Genital Area:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="stiFaqAd" id="stiFaqAdYes" value="Yes">
                                                        <label class="form-check-label" for="stiFaqAdYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="stiFaqAd" id="stiFaqAdNo" value="No">
                                                        <label class="form-check-label" for="stiFaqAdNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;"><i>if "YES" please indicate it from the genital area</i></legend>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="stiFaqGenital" id="stiFaqGenitalPenis" value="Penis">
                                                        <label class="form-check-label" for="stiFaqGenitalPenis">Penis</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="stiFaqGenital" id="stiFaqGenitalVagina" value="Vagina">
                                                        <label class="form-check-label" for="stiFaqGenitalVagina">Vagina</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Sores or Ulcer in the Genital Area:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="stiFaqSu" id="stiFaqSuYes" value="Yes">
                                                        <label class="form-check-label" for="stiFaqSuYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="stiFaqSu" id="stiFaqSuNo" value="No">
                                                        <label class="form-check-label" for="stiFaqSuNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Pain or Burning Sensation in the Genital Area:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="stiFaqPb" id="stiFaqPbYes" value="Yes">
                                                        <label class="form-check-label" for="stiFaqPbYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="stiFaqPb" id="stiFaqPbNo" value="No">
                                                        <label class="form-check-label" for="stiFaqPbNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">History of Treatment for Sexually Transmitted Infection:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="stiFaqTreatment" id="stiFaqTreatmentYes" value="Yes">
                                                        <label class="form-check-label" for="stiFaqTreatmentYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="stiFaqTreatment" id="stiFaqTreatmentNo" value="No">
                                                        <label class="form-check-label" for="stiFaqTreatmentNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">HIV / AIDS / Pelvic Inflammatory Diseases:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="stiFaqHiv" id="stiFaqHivYes" value="Yes">
                                                        <label class="form-check-label" for="stiFaqHivYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="stiFaqHiv" id="stiFaqHivNo" value="No">
                                                        <label class="form-check-label" for="stiFaqHivNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>   
                            </div> {{--End of STI--}}
                        </div>

                        <div class="rowCon" style="width: 100%">
                            <p><b>How to be Reasonably Sure Client is Not Pregnant</b></p>

                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 12px;">1.) Did you have a baby less than (6) months ago, are you fully or nearly-fully breastfeeding, and have you had no menstrual period since then?</legend>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fpFaq1" id="fpFaq1Yes" value="Yes">
                                        <label class="form-check-label" for="fpFaq1Yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fpFaq1" id="fpFaq1No" value="No">
                                        <label class="form-check-label" for="fpFaq1No">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 12px;">2.) Have you abstained from sexual intercourse since your last menstrual period or delivery?</legend>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fpFaq2" id="fpFaq2Yes" value="Yes">
                                        <label class="form-check-label" for="fpFaq2Yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fpFaq2" id="fpFaq2No" value="No">
                                        <label class="form-check-label" for="fpFaq2No">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 12px;">3.) Have you had a baby in the last four (4) weeks?</legend>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fpFaq3" id="fpFaq3Yes" value="Yes">
                                        <label class="form-check-label" for="fpFaq3Yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fpFaq3" id="fpFaq3No" value="No">
                                        <label class="form-check-label" for="fpFaq3No">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 12px;">4.) Did your last menstrual period start within the past seven (7) days?</legend>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fpFaq4" id="fpFaq4Yes" value="Yes">
                                        <label class="form-check-label" for="fpFaq4Yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fpFaq4" id="fpFaq4No" value="No">
                                        <label class="form-check-label" for="fpFaq4No">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 12px;">5.) Have you had a miscarriage or abortion in the last seven (7) years?</legend>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fpFaq5" id="fpFaq5Yes" value="Yes">
                                        <label class="form-check-label" for="fpFaq5Yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fpFaq5" id="fpFaq5No" value="No">
                                        <label class="form-check-label" for="fpFaq5No">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 12px;">6.) Have you been using a reliable contraceptive method consistently and correctly?</legend>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fpFaq6" id="fpFaq6Yes" value="Yes">
                                        <label class="form-check-label" for="fpFaq6Yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fpFaq6" id="fpFaq6No" value="No">
                                        <label class="form-check-label" for="fpFaq6No">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <p>if the client answered YES to at least one of the questions and she is free of signs or symptoms of pregnancy, provide client with desired method.</p>
                            <p>if the client answered NO to all the questions, pregnancy cannot be ruled out. The client should await menses or use a pregnancy test.</p>

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
    </div><!-- End OF SIDE A-->

    {{-- SIDE A EDIT --}}
    <div class="modal fade" id="editFpModal" tabindex="-1">
        <div class="modal-dialog custom-modal-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Family Planning Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="edit_fpInputForm" id="edit_fpInputForm" autocomplete="off"> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Personal Information</span>
                            </div>
                            <div class="inputArea">
                                <div class="rowFirst columnGroup familyPlaningCon"> 
                                    <div class="columnCon">
                                        <input type="hidden" class="form-control" id="edit_em_id" name="edit_em_id" value="<?php echo $LoggedUserInfo['em_id'] ?>" readonly>
                                        <input type="hidden" class="form-control" id="edit_fp_id" name="edit_fp_id" readonly>
                                        <div class="column mb-3 pt-2">
                                            <label for="edit_inputClient" class="form-label">Name of Client</label>
                                            <select id="edit_inputClient" class="form-control averageField" name="edit_inputClient" style="width: 100%" onchange="updateResidentDetails(this)">
                                                <option value="">Select...</option>
                                                @foreach($residents as $resident)
                                                    <option value="{{ $resident->res_id }}">
                                                        {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text edit_inputClient_error"></span>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_fpDob" class="col-sm-5 col-form-label">Date of Birth</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control shortField" id="edit_fpDob" name="edit_fpDob"> <!-- Example value -->
                                            </div>
                                        </div>
                                        
                                        <div class="column mb-3">
                                            <label for="edit_fpAge" class="col-sm-5 col-form-label">Age</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control briefField" id="edit_fpAge" name="edit_fpAge" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_fpEa" class="col-sm-8 col-form-label">Educational Attainment</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control mediumField" id="edit_fpEa" name="edit_fpEa" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_fpOcc" class="col-sm-8 col-form-label">Occupation</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 200px;" id="edit_fpOcc" name="edit_fpOcc" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_fpAdd" class="col-sm-8 col-form-label">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 328px;" id="edit_fpAdd" name="edit_fpAdd" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_fpCn" class="col-sm-8 col-form-label">Contact Number</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 328px;" id="edit_fpCn" name="edit_fpCn" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_fpCs" class="col-sm-8 col-form-label">Civil Status</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 328px;" id="edit_fpCs" name="edit_fpCs" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_fpReligion" class="col-sm-8 col-form-label">Religion</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 328px;" id="edit_fpReligion" name="edit_fpReligion" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="columnCon">                                       
                                        <div class="column mb-3 pt-2">
                                            <label for="edit_inputSpouse" class="form-label">Name of Spouse</label>
                                            <select id="edit_inputSpouse" class="form-control averageField" name="edit_inputSpouse" style="width: 100%" onchange="updateSpouseDetails(this)">
                                                <option value="">Select...</option>
                                                @foreach($residents as $resident)
                                                    <option value="{{ $resident->res_id }}">
                                                        {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text edit_inputSpouse_error"></span>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_fpSpouseDob" class="col-sm-5 col-form-label">Date of Birth</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control shortField" id="edit_fpSpouseDob" name="edit_fpSpouseDob">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_fpSpouseAge" class="col-sm-5 col-form-label">Age</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control briefField" id="edit_fpSpouseAge" name="edit_fpSpouseAge">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_fpSpouseOcc" class="col-sm-8 col-form-label">Occupation</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_fpSpouseOcc" name="edit_fpSpouseOcc">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="columnCon" style="justify-content: space-between;">
                                        <div class="column mb-3">
                                            <label for="edit_fpLiveChild" class="col-sm-8 col-form-label">No. of Living Children</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="edit_fpLiveChild" name="edit_fpLiveChild">
                                                <span class="text-danger error-text fpLiveChild_error"></span>
                                            </div>
                                        </div>

                                        <fieldset class="column mb-3" style="padding: 10px;">
                                            <legend class="col-form-label col-sm-12 pt-0">Plan To Have More Children?</legend>
                                            <div class="col-sm-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_children" id="edit_children_yes" value="Yes">
                                                    <label class="form-check-label" for="children_yes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_children" id="edit_children_no" value="No">
                                                    <label class="form-check-label" for="children_no">No</label>
                                                </div>
                                            </div>
                                            <span class="text-danger error-text edit_children_error"></span>
                                        </fieldset>

                                        <div class="column mb-3">
                                            <label for="edit_fpIncome" class="col-sm-8 col-form-label">Average Monthly Income</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="edit_fpIncome" name="edit_fpIncome">
                                                <span class="text-danger error-text edit_fpIncome_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="columnCon">
                                        <div class="rowCon">
                                            <fieldset class="column mb-3" style="padding: 10px;">
                                                <legend class="col-form-label col-sm-12 pt-0">Client Type</legend>
                                                <div class="col-sm-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpClientType" id="edit_clientNew" value="New Acceptor">
                                                        <label class="form-check-label" for="edit_clientNew">New Acceptor</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpClientType" id="edit_clientCurrent" value="Current User">
                                                        <label class="form-check-label" for="edit_clientCurrent">Current User</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text edit_fpClientType_error"></span>
                                            </fieldset>
                                            <hr>
                                            <fieldset class="column mb-3" style="padding: 10px;">
                                                <legend class="col-form-label col-sm-12 pt-0">Client Type (Follow Up)</legend>
                                                <div class="col-sm-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpClientTypeff" id="edit_fpCm" value="Changing Method">
                                                        <label class="form-check-label" for="fpCm">Changing Method</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpClientTypeff" id="edit_fpCc" value="Changing Clinic">
                                                        <label class="form-check-label" for="fpCc">Changing Clinic</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpClientTypeff" id="edit_fpDr" value="Dropout/Restart">
                                                        <label class="form-check-label" for="fpDr">Dropout/Restart</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpClientTypeff_error"></span>
                                            </fieldset>
                                        </div>

                                        <div class="rowCon">
                                            <fieldset class="column mb-3" style="padding: 10px;">
                                                <legend class="col-form-label col-sm-12 pt-0">Reason for FP</legend>
                                                <div class="col-sm-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpReasonFp" id="edit_fpSpacing" value="Spacing">
                                                        <label class="form-check-label" for="fpSpacing">Spacing</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpReasonFp" id="edit_fpLimiting" value="Limiting">
                                                        <label class="form-check-label" for="fpLimiting">Limiting</label>
                                                    </div>
                                                    <span class="text-danger error-text fpReasonFp_error"></span>
                                                </div>
                                                <div class="column mb-3" style="display: flex; justify-content:flex-start; align-items:center">
                                                    <label class="col-sm-2" for="fpReasonOtherFp">Others:</label>
                                                    <input class="form-control shortField" type="text" name="edit_fpReasonOtherFp" id="edit_fpReasonOtherFp" placeholder="Specify...">
                                                    <span class="text-danger error-text edit_fpReasonOtherFp_error"></span>
                                                </div>
                                            </fieldset>

                                            <hr>

                                            <fieldset class="column mb-3" style="padding: 10px;">
                                                <legend class="col-form-label col-sm-12 pt-0">Reason</legend>
                                                <div class="col-sm-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpReason" id="edit_fpMed" value="Medical Condition">
                                                        <label class="form-check-label" for="fpMed">Medical Condition</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpReason" id="edit_fpSide" value="Side Effects">
                                                        <label class="form-check-label" for="fpSide">Side Effects</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpReason_error"></span>
                                            </fieldset>
                                            <div class="column mb-3" style="display: flex; justify-content:flex-start; align-items:center">
                                                <label class="col-sm-5" for="fpReasonSpecifySs">Side Effects (Specify)</label>
                                                <input class="form-control shortField" type="text" name="edit_fpReasonSpecifySs" id="edit_fpReasonSpecifySs" placeholder="Specify...">
                                                <span class="text-danger error-text edit_fpReasonSpecifySs_error"></span>
                                            </div>
                                        </div>

                                        <div class="rowCon">
                                            <fieldset class="row mb-3 diagnosisArea">
                                                <legend class="col-form-label col-sm-12 pt-0">Method Currently Used(For Changing Methods):</legend>
                                                <div class="formGrpCheckBox">
                                                    <div class="grp1">
                                                        <!-- Checkboxes for methods -->
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="ccc" name="edit_method[]" value="COC">
                                                            <label class="form-check-label" for="ccc">COC</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="pop" name="edit_method[]" value="POP">
                                                            <label class="form-check-label" for="pop">POP</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="injectable" name="edit_method[]" value="Injectable">
                                                            <label class="form-check-label" for="injectable">Injectable</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="implant" name="edit_method[]" value="Implant">
                                                            <label class="form-check-label" for="implant">Implant</label>
                                                        </div>
                                                    </div>

                                                    <div class="grp2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="condom" name="edit_method[]" value="Condom">
                                                            <label class="form-check-label" for="condom">Condom</label>
                                                        </div>
                                                    
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="edit_iud" name="edit_method[]" value="IUD">
                                                            <label class="form-check-label" for="iud">IUD</label>
                                                        </div>
                                                    
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="edit_interval" name="edit_methodIud[]" value="Interval">
                                                            <label class="form-check-label" for="interval">Interval</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="edit_postpartum" name="edit_methodIud[]" value="Post-Partum">
                                                            <label class="form-check-label" for="postpartum">Post-Partum</label>
                                                        </div>
                                                        <span class="text-danger error-text methodIud_error"></span>
                                                    </div>
                                                    
                                                    <div class="grp3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="sdm" name="edit_method[]" value="SDM">
                                                            <label class="form-check-label" for="sdm">SDM</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="bom" name="edit_method[]" value="BOM/CMM">
                                                            <label class="form-check-label" for="bom">BOM/CMM</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="bbt" name="edit_method[]" value="BBT">
                                                            <label class="form-check-label" for="bbt">BBT</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="stm" name="edit_method[]" value="STM">
                                                            <label class="form-check-label" for="stm">STM</label>
                                                        </div>
                                                    </div>

                                                    <div class="grp4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="lam" name="edit_method[]" value="LAM">
                                                            <label class="form-check-label" for="lam">LAM</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="others" name="edit_method[]" onchange="toggleOthers(this)">
                                                            <label class="form-check-label" for="others">Others</label>
                                                        </div>
                                                        <span class="text-danger error-text method_error"></span>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control mediumField" id="edit_other_specify" name="edit_other_specify" placeholder="Specify...">
                                                            <span class="text-danger error-text other_specify_error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>

                        <div class="inputClusterContainer">
                            <div class="inputHalfGroupCon">
                                <div class="titleCaseFinding">
                                    <span>Medical History</span>
                                </div>
                                <div class="inputArea">
                                    <div class="rowGroup"> 
                                        <div class="rowConWhole" style="border: none;">
                                            <p>Does the client have any of the following?</p>


                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Severe Headaches / Migraine:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpMigraine" id="edit_fpMigraineYes" value="Yes">
                                                        <label class="form-check-label" for="fpMigraineYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpMigraine" id="edit_fpMigraineNo" value="No">
                                                        <label class="form-check-label" for="fpMigraineNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text edit_fpMigraine_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">History of Stroke / Heart Attack / Hypertension:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpStroke" id="edit_fpStrokeYes" value="Yes">
                                                        <label class="form-check-label" for="edit_fpStrokeYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpStroke" id="edit_fpStrokeNo" value="No">
                                                        <label class="form-check-label" for="edit_fpStrokeNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text edit_fpStroke_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 " style="font-size: 14px;">Non-Traumatic Hematoma / Frequent Bruising / Gum Bleeding:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpHematoma" id="edit_fpHematomaYes" value="Yes">
                                                        <label class="form-check-label" for="edit_fpHematomaYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpHematoma" id="edit_fpHematomaNo" value="No">
                                                        <label class="form-check-label" for="edit_fpHematomaNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text edit_fpHematoma_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Current or History of Breast Cancer / Breast Mass:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpBreast" id="edit_fpBreastYes" value="Yes">
                                                        <label class="form-check-label" for="edit_fpBreastYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpBreast" id="edit_fpBreastNo" value="No">
                                                        <label class="form-check-label" for="edit_fpBreastNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text edit_fpBreast_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Severe Chest Pain:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpChest" id="edit_fpChestYes" value="Yes">
                                                        <label class="form-check-label" for="edit_fpChestYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpChest" id="edit_fpChestNo" value="No">
                                                        <label class="form-check-label" for="edit_fpChestNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text edit_fpChest_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Cough For More Than 14 Days:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpCough" id="edit_fpCoughYes" value="Yes">
                                                        <label class="form-check-label" for="fpCoughYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpCough" id="edit_fpCoughNo" value="No">
                                                        <label class="form-check-label" for="edit_fpCoughNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text fpCough_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Jaundice:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpJaundice" id="edit_fpJaundiceYes" value="Yes">
                                                        <label class="form-check-label" for="edit_fpJaundiceYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpJaundice" id="edit_fpJaundiceNo" value="No">
                                                        <label class="form-check-label" for="edit_fpJaundiceNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text edit_fpJaundice_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Unexplained Vaginal Bleeding:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpVBleed" id="edit_fpVBleedYes" value="Yes">
                                                        <label class="form-check-label" for="edit_fpVBleedYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpVBleed" id="edit_fpVBleedNo" value="No">
                                                        <label class="form-check-label" for="edit_fpVBleedNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text edit_fpVBleed_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Abnormal Vaginal Discharge:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpDischarge" id="edit_fpDischargeYes" value="Yes">
                                                        <label class="form-check-label" for="edit_fpDischargeYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpDischarge" id="edit_fpDischargeNo" value="No">
                                                        <label class="form-check-label" for="edit_fpDischargeNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text edit_fpDischarge_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Intake of Phenobarbital(Anti-Seizure) / Rifampicin(Anti-TB):</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpIntake" id="edit_fpIntakeYes" value="Yes">
                                                        <label class="form-check-label" for="edit_fpIntakeYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpIntake" id="edit_fpIntakeNo" value="No">
                                                        <label class="form-check-label" for="edit_fpIntakeNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text edit_fpIntake_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Is The Client A Smoker:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpSmoker" id="edit_fpSmokerYes" value="Yes">
                                                        <label class="form-check-label" for="edit_fpSmokerYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpSmoker" id="edit_fpSmokerNo" value="No">
                                                        <label class="form-check-label" for="edit_fpSmokerNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text edit_fpSmoker_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap: nowrap;">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">With Disability?:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpDisability" id="edit_fpDisabilityYes" value="Yes">
                                                        <label class="form-check-label" for="edit_fpDisabilityYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpDisability" id="edit_fpDisabilityNo" value="No">
                                                        <label class="form-check-label" for="edit_fpDisabilityNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text edit_fpDisability_error"></span>
                                            </fieldset>

                                            <div class="input-group">
                                                <input type="text" class="form-control" id="edit_disabilityDetails" name="edit_disabilityDetails" placeholder="If YES Please Specify...">
                                                <span class="text-danger error-text edit_disabilityDetails_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div> {{--End of Medical History--}}

                            <div class="inputHalfGroupCon" style="height:375px!important;">
                                <div class="titleCaseFinding">
                                    <span>Risks For Violence Against Women</span>
                                </div>
                                <div class="inputArea">
                                    <div class="rowGroup"> 
                                        <div class="rowConWhole" style="border: none;">
                                            
                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Unpleasant Relationship With Partner:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpUnpleasant" id="edit_fpUnpleasantYes" value="Yes">
                                                        <label class="form-check-label" for="edit_fpUnpleasantYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpUnpleasant" id="edit_fpUnpleasantNo" value="No">
                                                        <label class="form-check-label" for="edit_fpUnpleasantNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text edit_fpUnpleasant_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Partner Does Not Approve of the Visit to FP Clinic:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpNotApprove" id="edit_fpNotApproveYes" value="Yes">
                                                        <label class="form-check-label" for="edit_fpNotApproveYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpNotApprove" id="edit_fpNotApproveNo" value="No">
                                                        <label class="form-check-label" for="edit_fpNotApproveNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text edit_fpNotApprove_error"></span>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">History of Domestic Violence / VAW:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpVaw" id="edit_fpVawYes" value="Yes">
                                                        <label class="form-check-label" for="edit_fpVawYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpVaw" id="edit_fpVawNo" value="No">
                                                        <label class="form-check-label" for="edit_fpVawNo">No</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger error-text edit_fpVaw_error"></span>
                                            </fieldset>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Reffered To:</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpRefferedVaw[]" id="fpRefferedVawDswd" value="DSWD">
                                                            <label class="form-check-label" for="fpRefferedVawDswd">DSWD</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpRefferedVaw[]" id="fpRefferedVawWcpu" value="WCPU">
                                                            <label class="form-check-label" for="fpRefferedVawWcpu">WCPU</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpRefferedVaw[]" id="fpRefferedVawNgo" value="NGOs">
                                                            <label class="form-check-label" for="fpRefferedVawNgo">NGOs</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpRefferedVaw[]" id="fpOtherVaw" value="None">
                                                            <label class="form-check-label" for="fpOtherVaw">Others</label>
                                                        </div>
                                                        <span class="text-danger error-text edit_fpRefferedVaw_error"></span>
                                                    </div>
                                                    <div class="column mb-3">
                                                        <input type="text" class="form-control" id="edit_othersVaw" name="edit_othersVaw" style="width: 250px;" placeholder="Specify...">
                                                        <span class="text-danger error-text edit_othersVaw_error"></span>
                                                    </div>
                                                </div>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>   
                            </div> {{--End of VIOLENCE AGAINST WOMEN--}}

                            <div class="inputHalfGroupCon" style="height:750px!important;">
                                <div class="titleCaseFinding">
                                    <span>Obstetrical History</span>
                                </div>
                                <div class="inputArea">
                                    <div class="rowGroup"> 
                                        <div class="rowConWhole" style="border: none;">

                                            <div class="row mb-3 align-items-center">
                                                <label for="fpOcc" class="col-sm-4 col-form-label">Number of Pregnancies:</label>
                                                <div class="col-sm-8 d-flex" style="gap: 10px; flex-wrap:wrap;">
                                                    <input type="number" class="form-control " style="width: 150px" id="edit_fpNumG" name="edit_fpNumG" placeholder="G">
                                                    <input type="number" class="form-control " style="width: 150px" id="edit_fpNumP" name="edit_fpNumP" placeholder="P">
                                                    <input type="number" class="form-control " style="width: 150px" id="edit_fpNumFullTerm" name="edit_fpNumFullTerm" placeholder="Full Term">
                                                    <input type="number" class="form-control " style="width: 150px" id="edit_fpNumPremature" name="edit_fpNumPremature" placeholder="Premature">
                                                    <input type="number" class="form-control " style="width: 150px" id="edit_fpNumAbortion" name="edit_fpNumAbortion" placeholder="Abortion">
                                                    <input type="number" class="form-control " style="width: 150px" id="edit_fpNumLivingChildren" name="edit_fpNumLivingChildren" placeholder="Living Children">
                                                </div>
                                            </div>

                                            <div class="row mb-3 align-items-center">
                                                <label for="fpOcc" class="col-sm-4 col-form-label">Date of Last Delivery:</label>
                                                <div class="col-sm-8 d-flex" style="gap: 10px; flex-wrap:wrap;">
                                                    <input type="date" class="form-control " style="width: 150px" id="edit_dateLastDelivery" name="edit_dateLastDelivery">
                                                </div>
                                            </div>

                                            <fieldset class="row mb-3" style=" flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-4 pt-0">Type of Delivery:</legend>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_deliveryType" id="edit_deliveryVaginal" value="Vaginal">
                                                        <label class="form-check-label" for="edit_deliveryVaginal">Vaginal</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_deliveryType" id="edit_deliveryCSection" value="Cesarean Section">
                                                        <label class="form-check-label" for="edit_deliveryCSection">Cesarean Section</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <div class="row mb-3 align-items-center">
                                                <label for="fpOcc" class="col-sm-4 col-form-label">Last Menstrual Period:</label>
                                                <div class="col-sm-8 d-flex" style="gap: 10px; flex-wrap:wrap;">
                                                    <input type="date" class="form-control " style="width: 150px" id="edit_dateLastPeriod" name="edit_dateLastPeriod">
                                                </div>
                                            </div>

                                            <div class="row mb-3 align-items-center">
                                                <label for="fpOcc" class="col-sm-4 col-form-label">Previous Menstrual Period:</label>
                                                <div class="col-sm-8 d-flex" style="gap: 10px; flex-wrap:wrap;">
                                                    <input type="date" class="form-control " style="width: 150px" id="edit_datePrevPeriod" name="edit_datePrevPeriod">
                                                </div>
                                            </div>

                                            <fieldset class="row mb-3 align-items-center" style=" flex-wrap:nowrap">
                                                <label for="nameOfTest" class="col-sm-4 col-form-label">Menstrual Flow:</label>
                                                <div class="col-sm-12">
                                                    <div class="checkbox-container" style="flex-direction:column;">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpMenstrualFlow[]" id="fpFlowScanty" value="Scanty (1 - 2 Pads Per Day)">
                                                            <label class="form-check-label" for="fpRefferedVawDswd">Scanty (1 - 2 Pads Per Day)</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpMenstrualFlow[]" id="fpFlowModerate" value="Moderate (3 - 5 Pads Per Day)">
                                                            <label class="form-check-label" for="fpFlowModerate">Moderate (3 - 5 Pads Per Day)</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpMenstrualFlow[]" id="fpFlowHeavy" value="Heavy (> 5 Pads Per Day)">
                                                            <label class="form-check-label" for="fpFlowHeavy">Heavy (> 5 Pads Per Day)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3" style=" flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-4 pt-0">Dysmenorrhea:</legend>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpDys" id="edit_dysYes" value="Yes">
                                                        <label class="form-check-label" for="edit_dysYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpDys" id="edit_dysNo" value="No">
                                                        <label class="form-check-label" for="edit_dysNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3" style=" flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-4 pt-0">Hydatidiform Mole:</legend>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpHyda" id="edit_hydaYes" value="Yes">
                                                        <label class="form-check-label" for="edit_hydaYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpHyda" id="edit_hydaNo" value="No">
                                                        <label class="form-check-label" for="edit_hydaNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3" style=" flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-4 pt-0">History of Ectopic Pregnancy:</legend>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpEcto" id="edit_ectoYes" value="Yes">
                                                        <label class="form-check-label" for="edit_ectoYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_fpEcto" id="edit_ectoNo" value="No">
                                                        <label class="form-check-label" for="edit_ectoNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>   
                            </div> {{--End of OBSTETRICAL HISTORY--}}

                            <div class="inputHalfGroupCon" style="height:1434px!important; margin-top:-335px">
                                <div class="titleCaseFinding">
                                    <span>Physical Examination</span>
                                </div>
                                <div class="inputArea">
                                    <div class="rowGroup"> 
                                        <div class="rowConWhole" style="border: none;">
                                            
                                            <div class="rowGroup">
                                                <div class="column mb-3">
                                                    <label for="fpinputOHt" class="col-sm-12 col-form-label">Height (m)</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control briefField" id="edit_fpinputOHt" name="edit_fpinputOHt">
                                                    </div>
                                                </div>
            
                                                <div class="column mb-3">
                                                    <label for="fpinputOWt" class="col-sm-12 col-form-label">Weight (kg)</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control briefField" id="edit_fpinputOWt" name="edit_fpinputOWt">
                                                    </div>
                                                </div>
            
                                                <div class="column mb-3">
                                                    <label for="fpinputBp" class="col-sm-5 col-form-label">BP</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control briefField" id="edit_fpinputBp" name="edit_fpinputBp">
                                                    </div>
                                                </div>

                                                <div class="column mb-3">
                                                    <label for="fpinputPr" class="col-sm-10 col-form-label">Pulse Rate</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control briefField" id="edit_fpinputPr" name="edit_fpinputPr">
                                                    </div>
                                                </div>
                                            </div>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Skin:</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeSkin[]" id="fpPeSkinNormal" value="Normal">
                                                            <label class="form-check-label" for="fpPeSkinNormal">Normal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeSkin[]" id="fpPeSkinPale" value="Pale">
                                                            <label class="form-check-label" for="fpPeSkinPale">Pale</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeSkin[]" id="fpPeSkinYellow" value="Yellowish">
                                                            <label class="form-check-label" for="fpPeSkinYellow">Yellowish</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeSkin[]" id="fpPeSkinHema" value="Hematoma">
                                                            <label class="form-check-label" for="fpPeSkinHema">Hematoma</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Conjuctiva:</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeConj[]" id="fpPeConjNormal" value="Normal">
                                                            <label class="form-check-label" for="fpPeConjNormal">Normal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeConj[]" id="fpPeConjPale" value="Pale">
                                                            <label class="form-check-label" for="fpPeConjPale">Pale</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeConj[]" id="fpPeConjYellow" value="Yellowish">
                                                            <label class="form-check-label" for="fpPeConjYellow">Yellowish</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Neck:</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeNeck[]" id="fpPeNeckNormal" value="Normal">
                                                            <label class="form-check-label" for="fpPeNeckNormal">Normal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeNeck[]" id="fpPeNeckNm" value="Neck Mass">
                                                            <label class="form-check-label" for="fpPeNeckNm">Neck Mass</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeNeck[]" id="fpPeNeckEnlarge" value="Enlarge Lymph Nodes">
                                                            <label class="form-check-label" for="fpPeNeckEnlarge">Enlarge Lymph Nodes</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Breast:</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeBreast[]" id="fpPeBreastNormal" value="Normal">
                                                            <label class="form-check-label" for="fpPeBreastNormal">Normal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeBreast[]" id="fpPeBreastMass" value="Mass">
                                                            <label class="form-check-label" for="fpPeBreastMass">Mass</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeBreast[]" id="fpPeBreastNd" value="Nipple Discharge">
                                                            <label class="form-check-label" for="fpPeBreastNd">Nipple Discharge</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Abdomen:</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeAbdomen[]" id="fpPeAbdomenNormal" value="Normal">
                                                            <label class="form-check-label" for="fpPeAbdomenNormal">Normal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeAbdomen[]" id="fpPeAbdomenAm" value="Abdominal Mass">
                                                            <label class="form-check-label" for="fpPeAbdomenAm">Abdominal Mass</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeAbdomen[]" id="fpPeAbdomenVar" value="Varicosities">
                                                            <label class="form-check-label" for="fpPeAbdomenVar">Varicosities</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Extremities:</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeExtremities[]" id="fpPeExtremitiesNormal" value="Normal">
                                                            <label class="form-check-label" for="fpPeExtremitiesNormal">Normal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeExtremities[]" id="fpPeExtremitiesEd" value="Edema">
                                                            <label class="form-check-label" for="fpPeExtremitiesEd">Edema</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPeExtremities[]" id="fpPeExtremitiesVar" value="Varicosities">
                                                            <label class="form-check-label" for="fpPeExtremitiesVar">Varicosities</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="column mb-3">
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">Pelvic Examination:</label>
                                                <label for="nameOfTest" class="col-sm-12 col-form-label">(<i>For IUD Acceptors</i>)</label>
                                                <div class="col-sm-12 nameOfTest">
                                                    <div class="checkbox-container" style="flex-direction: column;">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPelExIud[]" id="fpPelExIudNormal" value="Normal">
                                                            <label class="form-check-label" for="fpPelExIudNormal">Normal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPelExIud[]" id="fpPelExIudMass" value="Mass">
                                                            <label class="form-check-label" for="fpPelExIudMass">Mass</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPelExIud[]" id="fpPelExIudAd" value="Abdominal Discharge">
                                                            <label class="form-check-label" for="fpPelExIudAd">Abdominal Discharge</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPelExIud[]" id="fpPelExIudCa" value="Cervical Abnormalities">
                                                            <label class="form-check-label" for="fpPelExIudCa">Cervical Abnormalities</label>
                                                        </div>

                                                            <div class="fieldSetGrp">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="edit_fpPelExIudCab[]" id="fpPelExIudCabWarts" value="Warts">
                                                                    <label class="form-check-label" for="fpPelExIudCabWarts">Warts</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="edit_fpPelExIudCab[]" id="fpPelExIudCabCyst" value="Polyp or Cyst">
                                                                    <label class="form-check-label" for="fpPelExIudCabCyst">Polyp or Cyst</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="edit_fpPelExIudCab[]" id="fpPelExIudCabInf" value="Inflammation or Erosion">
                                                                    <label class="form-check-label" for="fpPelExIudCabInf">Inflammation or Erosion</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="edit_fpPelExIudCab[]" id="fpPelExIudCabBloody" value="Bloody Discharge">
                                                                    <label class="form-check-label" for="fpPelExIudCabBloody">Bloody Discharge</label>
                                                                </div>
                                                            </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPelExIud[]" id="edit_fpPelExIudCc" value="Cervical Consistency">
                                                            <label class="form-check-label" for="fpPelExIudCc">Cervical Consistency</label>
                                                        </div>

                                                            <div class="fieldSetGrp">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="edit_fpPelExIudCerCon[]" id="fpPelExIudCcFirm" value="Firm">
                                                                    <label class="form-check-label" for="fpPelExIudCcFirm">Firm</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="edit_fpPelExIudCerCon[]" id="fpPelExIudCcSoft" value="Soft">
                                                                    <label class="form-check-label" for="fpPelExIudCcSoft">Soft</label>
                                                                </div>
                                                            </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPelExIud[]" id="fpPelExIudCt" value="Cervical Tenderness" >
                                                            <label class="form-check-label" for="fpPelExIudCt">Cervical Tenderness</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPelExIud[]" id="fpPelExIudAmt" value="Adnexal Mass / Tenderness" >
                                                            <label class="form-check-label" for="fpPelExIudAmt">Adnexal Mass / Tenderness</label>
                                                        </div>


                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_fpPelExIud[]" id="edit_fpPelExIudUp" value="Uterine Position">
                                                            <label class="form-check-label" for="fpPelExIudUp">Uterine Position</label>
                                                        </div>

                                                            <div class="fieldSetGrp">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="edit_fpPelExIudUtPo[]" id="fpPelExIudUtPoMid" value="Mid">
                                                                    <label class="form-check-label" for="fpPelExIudUtPoMid">Mid</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="edit_fpPelExIudUtPo[]" id="fpPelExIudUtPoAf" value="Anteflexed">
                                                                    <label class="form-check-label" for="fpPelExIudUtPoAf">Anteflexed</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="edit_fpPelExIudUtPo[]" id="fpPelExIudUtPoRf" value="Retroflexed">
                                                                    <label class="form-check-label" for="fpPelExIudUtPoRf">Retroflexed</label>
                                                                </div>
                                                            </div>
                                                        
                                                        <div class="column mb-3">
                                                            <label for="fpPelExUd" class="col-sm-12 col-form-label">Uterine Depth(cm)</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control shortField" id="edit_fpPelExUd" name="edit_fpPelExUd">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>   
                            </div> {{--End of PHYSICAL EXAMINATION--}}

                            <div class="inputHalfGroupCon" style="height:375px!important; margin-top:-350px">
                                <div class="titleCaseFinding">
                                    <span>Risks For Sexually Transmitted Infections</span>
                                </div>
                                <div class="inputArea">
                                    <div class="rowGroup"> 
                                        <div class="rowConWhole" style="border: none;">
                                            <p><i>Does the client or the client's partner have the following?</i></p>
                                            
                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Abnormal Discharge From The Genital Area:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_stiFaqAd" id="edit_stiFaqAdYes" value="Yes">
                                                        <label class="form-check-label" for="edit_stiFaqAdYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_stiFaqAd" id="edit_stiFaqAdNo" value="No">
                                                        <label class="form-check-label" for="edit_stiFaqAdNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;"><i>if "YES" please indicate it from the genital area</i></legend>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_stiFaqGenital" id="edit_stiFaqGenitalPenis" value="Penis">
                                                        <label class="form-check-label" for="edit_stiFaqGenitalPenis">Penis</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_stiFaqGenital" id="edit_stiFaqGenitalVagina" value="Vagina">
                                                        <label class="form-check-label" for="edit_stiFaqGenitalVagina">Vagina</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Sores or Ulcer in the Genital Area:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_stiFaqSu" id="edit_stiFaqSuYes" value="Yes">
                                                        <label class="form-check-label" for="edit_stiFaqSuYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_stiFaqSu" id="edit_stiFaqSuNo" value="No">
                                                        <label class="form-check-label" for="edit_stiFaqSuNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">Pain or Burning Sensation in the Genital Area:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_stiFaqPb" id="edit_stiFaqPbYes" value="Yes">
                                                        <label class="form-check-label" for="edit_stiFaqPbYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_stiFaqPb" id="edit_stiFaqPbNo" value="No">
                                                        <label class="form-check-label" for="edit_stiFaqPbNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">History of Treatment for Sexually Transmitted Infection:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_stiFaqTreatment" id="edit_stiFaqTreatmentYes" value="Yes">
                                                        <label class="form-check-label" for="edit_stiFaqTreatmentYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_stiFaqTreatment" id="edit_stiFaqTreatmentNo" value="No">
                                                        <label class="form-check-label" for="edit_stiFaqTreatmentNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 14px;">HIV / AIDS / Pelvic Inflammatory Diseases:</legend>
                                                <div class="col-sm-5">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_stiFaqHiv" id="edit_stiFaqHivYes" value="Yes">
                                                        <label class="form-check-label" for="edit_stiFaqHivYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_stiFaqHiv" id="edit_stiFaqHivNo" value="No">
                                                        <label class="form-check-label" for="edit_stiFaqHivNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>   
                            </div> {{--End of RISKS--}}
                        </div>

                        <div class="rowCon" style="width: 100%">
                            <p><b>How to be Reasonably Sure Client is Not Pregnant</b></p>

                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 12px;">1.) Did you have a baby less than (6) months ago, are you fully or nearly-fully breastfeeding, and have you had no menstrual period since then?</legend>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_fpFaq1" id="edit_fpFaq1Yes" value="Yes">
                                        <label class="form-check-label" for="edit_fpFaq1Yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_fpFaq1" id="edit_fpFaq1No" value="No">
                                        <label class="form-check-label" for="edit_fpFaq1No">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 12px;">2.) Have you abstained from sexual intercourse since your last menstrual period or delivery?</legend>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_fpFaq2" id="edit_fpFaq2Yes" value="Yes">
                                        <label class="form-check-label" for="edit_fpFaq2Yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_fpFaq2" id="edit_fpFaq2No" value="No">
                                        <label class="form-check-label" for="edit_fpFaq2No">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 12px;">3.) Have you had a baby in the last four (4) weeks?</legend>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_fpFaq3" id="edit_fpFaq3Yes" value="Yes">
                                        <label class="form-check-label" for="edit_fpFaq3Yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_fpFaq3" id="edit_fpFaq3No" value="No">
                                        <label class="form-check-label" for="edit_fpFaq3No">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 12px;">4.) Did your last menstrual period start within the past seven (7) days?</legend>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_fpFaq4" id="edit_fpFaq4Yes" value="Yes">
                                        <label class="form-check-label" for="edit_fpFaq4Yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_fpFaq4" id="edit_fpFaq4No" value="No">
                                        <label class="form-check-label" for="edit_fpFaq4No">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 12px;">5.) Have you had a miscarriage or abortion in the last seven (7) years?</legend>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_fpFaq5" id="edit_fpFaq5Yes" value="Yes">
                                        <label class="form-check-label" for="edit_fpFaq5Yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_fpFaq5" id="edit_fpFaq5No" value="No">
                                        <label class="form-check-label" for="edit_fpFaq5No">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                <legend class="col-form-label col-sm-12 pt-0" style="font-size: 12px;">6.) Have you been using a reliable contraceptive method consistently and correctly?</legend>
                                <div class="col-sm-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_fpFaq6" id="edit_fpFaq6Yes" value="Yes">
                                        <label class="form-check-label" for="edit_fpFaq6Yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_fpFaq6" id="edit_fpFaq6No" value="No">
                                        <label class="form-check-label" for="edit_fpFaq6No">No</label>
                                    </div>
                                </div>
                            </fieldset>

                            <p>if the client answered YES to at least one of the questions and she is free of signs or symptoms of pregnancy, provide client with desired method.</p>
                            <p>if the client answered NO to all the questions, pregnancy cannot be ruled out. The client should await menses or use a pregnancy test.</p>

                            <hr>

                            <div class="column mb-3">
                                <label for="edit_fpStatus" class="form-label">Status</label>
                                <select id="edit_fpStatus" class="form-select" name="edit_fpStatus">
                                    <option selected disabled>Choose...</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Reviewed">Reviewed</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Archived">Archived</option>
                                </select>
                                <span class="text-danger error-text edit_fpStatus_error"></span>
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
    </div>
    {{-- END OF SIDE A EDIT --}}

    {{-- SIDE B --}}
    <div class="modal fade" id="FirstModal" tabindex="-1" aria-labelledby="FirstModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Family Planning Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('regValidation.fpSideB') }}" class="sideBInputForm" id="sideBInputForm" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="fp_id" name="fp_id">
                        <input type="hidden" class="form-control" id="sideBEm_id" name="sideBEm_id" value="{{ $LoggedUserInfo['em_id'] }}">
                        <div class="column mb-3">
                            <label for="fpDateVisit" class="col-sm-10 col-form-label">Date of Visit</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="fpDateVisit" name="fpDateVisit">
                                <span class="text-danger error-text fpDateVisit_error"></span>
                            </div>
                        </div>

                        <div class="column mb-3">
                            <label for="fpMedFind" class="col-sm-10 col-form-label">Medical Findings</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fpMedFind" name="fpMedFind">
                                <span class="text-danger error-text fpMedFind_error"></span>
                            </div>
                        </div>

                        <div class="column mb-3">
                            <label for="fpMetAcc" class="col-sm-10 col-form-label">Method Accepted</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fpMetAcc" name="fpMetAcc">
                                <span class="text-danger error-text fpMetAcc_error"></span>
                            </div>
                        </div>

                        <div class="column mb-3">
                            <label for="fpDateFfVisit" class="col-sm-10 col-form-label">Date of Follow-up Visit</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="fpDateFfVisit" name="fpDateFfVisit">
                                <span class="text-danger error-text fpDateFfVisit_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="alertCon">
                        <div id="alert-container4"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> {{--End OF SIDE B --}}


</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script>
// **********
    //CLIENT SELECT
    $(document).ready(function () {
        $('#inputClient').selectize({
            sortField: 'text'
        });
    });

    //SPOUSE SELECT
    $(document).ready(function () {
        $('#inputSpouse').selectize({
            sortField: 'text'
        });
    });


    //FOR IUD
    function toggleIntervalPostPartum(checkbox) {
        const interval = document.getElementById('interval');
        const postpartum = document.getElementById('postpartum');

        if (checkbox.checked) {
            interval.disabled = false;
            postpartum.disabled = false;
        } else {
            interval.disabled = true;
            postpartum.disabled = true;
            interval.checked = false;
            postpartum.checked = false;
        }
    }

    //FOR IUD
    function toggleOthers(checkbox) {
        var otherSpecifyField = document.getElementById('other_specify');
        if (checkbox.checked) {
            otherSpecifyField.disabled = false;
        } else {
            otherSpecifyField.disabled = true;
            otherSpecifyField.value = ''; 
        }
    }

    //FOR DISABLITY MEDICAL HISTORY
    function handleDisabilityChange() {
        const disabilityYes = document.getElementById('fpDisabilityYes');
        const disabilityNo = document.getElementById('fpDisabilityNo');
        const disabilityDetails = document.getElementById('disabilityDetails');

        // Add event listeners to radio buttons
        disabilityYes.addEventListener('change', function() {
            disabilityDetails.disabled = !this.checked;
        });

        disabilityNo.addEventListener('change', function() {
            disabilityDetails.disabled = this.checked;
            disabilityDetails.value = "";
        });
    }

    document.addEventListener('DOMContentLoaded', handleDisabilityChange);


    //FOR OTHER VAW
    document.getElementById('fpOtherVaw').addEventListener('change', function() {
        var othersDetailsInput = document.getElementById('othersVaw');
        if (this.checked) {
            othersDetailsInput.disabled = false;
        } else {
            othersDetailsInput.disabled = true;
            othersDetailsInput.value = ''; // Clear the input value
        }
    });

    //FOR UTERINE POSITION
    document.getElementById('fpPelExIudUp').addEventListener('change', function() {
        var othersDetailsInput1 = document.getElementById('fpPelExIudUtPoMid');
        var othersDetailsInput2 = document.getElementById('fpPelExIudUtPoAf');
        var othersDetailsInput3 = document.getElementById('fpPelExIudUtPoRf');

        if (this.checked) {
            othersDetailsInput1.disabled = false;
            othersDetailsInput2.disabled = false;
            othersDetailsInput3.disabled = false;
        } else {
            othersDetailsInput1.disabled = true;
            othersDetailsInput2.disabled = true;
            othersDetailsInput3.disabled = true;
            othersDetailsInput1.checked = false;
            othersDetailsInput2.checked = false;
            othersDetailsInput3.checked = false;
        }
    });

    //FOR CERVICAL CONSISTENCY
    document.getElementById('fpPelExIudCc').addEventListener('change', function() {
        var othersDetailsInput1 = document.getElementById('fpPelExIudCcFirm');
        var othersDetailsInput2 = document.getElementById('fpPelExIudCcSoft');

        if (this.checked) {
            othersDetailsInput1.disabled = false;
            othersDetailsInput2.disabled = false;
        } else {
            othersDetailsInput1.disabled = true;
            othersDetailsInput2.disabled = true;
            othersDetailsInput1.checked = false;
            othersDetailsInput2.checked = false;
        }
    });

    //FOR UTERINE POSITION
    document.getElementById('fpPelExIudCa').addEventListener('change', function() {
        var othersDetailsInput1 = document.getElementById('fpPelExIudCabWarts');
        var othersDetailsInput2 = document.getElementById('fpPelExIudCabCyst');
        var othersDetailsInput3 = document.getElementById('fpPelExIudCabInf');
        var othersDetailsInput4 = document.getElementById('fpPelExIudCabBloody');

        if (this.checked) {
            othersDetailsInput1.disabled = false;
            othersDetailsInput2.disabled = false;
            othersDetailsInput3.disabled = false;
            othersDetailsInput4.disabled = false;
        } else {
            othersDetailsInput1.disabled = true;
            othersDetailsInput2.disabled = true;
            othersDetailsInput3.disabled = true;
            othersDetailsInput4.disabled = true;
            othersDetailsInput1.checked = false;
            othersDetailsInput2.checked = false;
            othersDetailsInput3.checked = false;
            othersDetailsInput4.checked = false;
        }
    });

    //FOR RESIDENTS...
    const residentData = {
        @foreach($residents as $resident)
            "{{ $resident->res_id }}": {
                res_address: "{{ addslashes($resident->res_address) }}",
                res_bdate: "{{ $resident->res_bdate }}",
                res_occupation: "{{ $resident->res_occupation }}",
                res_contact: "{{ $resident->res_contact }}",
                res_civil: "{{ $resident->res_civil }}",
                res_education: "{{ $resident->res_education ?? '' }}", // Assuming education field exists
                res_religion: "{{ $resident->res_religion ?? '' }}" // Assuming religion field exists
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
                document.getElementById('fpAdd').value = residentInfo.res_address;
                document.getElementById('fpDob').value = residentInfo.res_bdate;

                // Calculate age from the birth date
                const birthDate = new Date(residentInfo.res_bdate);
                const age = calculateAge(birthDate);
                document.getElementById('fpAge').value = age;

                document.getElementById('fpOcc').value = residentInfo.res_occupation;
                document.getElementById('fpCn').value = residentInfo.res_contact;
                document.getElementById('fpCs').value = residentInfo.res_civil;
                document.getElementById('fpEa').value = residentInfo.res_education;
                document.getElementById('fpReligion').value = residentInfo.res_religion;
            }
        } else {
            // Clear fields if no resident is selected
            document.getElementById('fpAdd').value = '';
            document.getElementById('fpDob').value = '';
            document.getElementById('fpAge').value = '';
            document.getElementById('fpOcc').value = '';
            document.getElementById('fpCn').value = '';
            document.getElementById('fpCs').value = '';
            document.getElementById('fpEa').value = '';
            document.getElementById('fpReligion').value = '';
        }
    }

    function updateSpouseDetails(selectElement) {
        const selectedId = selectElement.value;

        if (selectedId) {
            const residentInfo = residentData[selectedId];

            if (residentInfo) {
                document.getElementById('fpSpouseDob').value = residentInfo.res_bdate;

                // Calculate age from the birth date
                const birthDate = new Date(residentInfo.res_bdate);
                const age = calculateAge(birthDate);
                document.getElementById('fpSpouseAge').value = age;

                document.getElementById('fpSpouseOcc').value = residentInfo.res_occupation;
            }
        } else {
            // Clear fields if no resident is selected
            document.getElementById('fpSpouseDob').value = '';
            document.getElementById('fpSpouseAge').value = '';
            document.getElementById('fpSpouseOcc').value = '';
        }
    }

    function calculateAge() {
        const dob = new Date(document.getElementById('edit_fpDob').value);
        const dobSpouse = new Date(document.getElementById('edit_fpSpouseDob').value);
        const today = new Date();

        // Function to calculate age from a given date
        function getAge(birthDate) {
            if (!isNaN(birthDate)) {
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDifference = today.getMonth() - birthDate.getMonth();

                // Adjust age if the birthday hasn't occurred yet this year
                if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                return age;
            }
            return ''; // Return empty string if the date is invalid
        }

        // Calculate ages
        const age = getAge(dob);
        const spouseAge = getAge(dobSpouse);

        // Set the values in the respective input fields
        document.getElementById('edit_fpAge').value = age;
        document.getElementById('edit_fpSpouseAge').value = spouseAge;
    }

    // Calculate age on date change
    document.getElementById('edit_fpDob').addEventListener('change', calculateAge);
    document.getElementById('edit_fpSpouseDob').addEventListener('change', calculateAge);

    // Calculate age on page load if DOB has a value
    window.onload = function() {
        calculateAge();
    };

    // When the modal is about to be shown
    $('#FirstModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var fp_id = button.data('fp-id'); // Extract info from data-* attributes

        // Update the modal's input field with the fp_id
        var modal = $(this);
        modal.find('#fp_id').val(fp_id); // Set the fp_id value in the input field
    });
//******************

    //iNSERT
    $(function(){      
        $("#fpInputForm").on('submit', function(e){
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
                        $('#fpInputForm')[0].reset();

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

    //eDIT Form
    function openEditModal(fp_id) {
        $.ajax({
            url: `/fpEdit/${fp_id}`,
            method: 'GET',
            success: function(response) {
                if (response.status === 1) 
                {
                    $('#edit_fp_id').val(response.data.fp_id);
                    //Client info
                        let fullName = `${response.data.client.res_lname}, ${response.data.client.res_fname} ${response.data.client.res_mname ?? ''} ${response.data.client.res_suffix ?? ''}`;
                        $('#edit_inputClient').val(response.data.client.res_id);
                        $('#edit_fpDob').val(response.data.client.res_bdate);
                        // $('#edit_fpEa').val(response.data.client.res_permAdd);
                        $('#edit_fpOcc').val(response.data.client.res_occupation);
                        $('#edit_fpAdd').val(response.data.client.res_address);
                        $('#edit_fpCn').val(response.data.client.res_contact);
                        $('#edit_fpCs').val(response.data.client.res_civil);
                        // $('#edit_fpReligion').val(response.data.client.res_citizen);

                    //Spouse Info
                        let fullNameSpouse = `${response.data.spouse.res_lname}, ${response.data.spouse.res_fname} ${response.data.spouse.res_mname ?? ''} ${response.data.spouse.res_suffix ?? ''}`;
                        $('#edit_inputSpouse').val(response.data.spouse.res_id);
                        $('#edit_fpSpouseDob').val(response.data.spouse.res_bdate);
                        $('#edit_fpSpouseOcc').val(response.data.spouse.res_occupation);
                    
                    //personal Client Info
                        $('#edit_fpLiveChild').val(response.data.fp_NoLivChild);
                        $('#edit_fpIncome').val(response.data.fp_monthlyIncome);
                        // radio
                            let plan = response.data.fp_planMoreChild;
                                $('#edit_children_yes').prop('checked', false);
                                $('#edit_children_no').prop('checked', false);
                                if (plan === 'Yes') {
                                    $('#edit_children_yes').prop('checked', true);
                                } 
                                else if (plan === 'No') {
                                    $('#edit_children_no').prop('checked', true);
                                }

                            let clientType = response.data.fp_clientType;
                                $('#edit_clientNew').prop('checked', false);
                                $('#edit_clientCurrent').prop('checked', false);
                                if (clientType === 'New Acceptor') {
                                    $('#edit_clientNew').prop('checked', true);
                                } 
                                else if (clientType === 'Current User') {
                                    $('#edit_clientCurrent').prop('checked', true);
                                }

                            let current = response.data.fp_ifCurrent;
                                $('#edit_fpCm').prop('checked', false);
                                $('#edit_fpCc').prop('checked', false);
                                $('#edit_fpDr').prop('checked', false);
                                if (current === 'Changing Method') {
                                    $('#edit_fpCm').prop('checked', true);
                                } 
                                else if (current === 'Changing Clinic') {
                                    $('#edit_fpCc').prop('checked', true);
                                }
                                else if (current === 'Dropout/Restart') {
                                    $('#edit_fpDr').prop('checked', true);
                                }

                            let reasonForFp = response.data.fp_reasonForFp;
                                $('#edit_fpSpacing').prop('checked', false);
                                $('#edit_fpLimiting').prop('checked', false);
                                if (reasonForFp === 'Spacing') {
                                    $('#edit_fpSpacing').prop('checked', true);
                                } 
                                else if (reasonForFp === 'Limiting') {
                                    $('#edit_fpLimiting').prop('checked', true);
                                }
                            $('#edit_fpReasonOtherFp').val(response.data.fp_reasonOthers);

                            let reasonFp = response.data.fp_reasonFp;
                                $('#edit_fpMed').prop('checked', false);
                                $('#edit_fpSide').prop('checked', false);
                                if (reasonFp === 'Medical Condition') {
                                    $('#edit_fpMed').prop('checked', true);
                                } 
                                else if (reasonFp === 'Side Effects') {
                                    $('#edit_fpSide').prop('checked', true);
                                }
                            $('#edit_fpReasonSpecifySs').val(response.data.fp_reasonOthers);

                        // checkbox
                            if (response.data.fp_methodCurUse) 
                            {
                                let drugRes = JSON.parse(response.data.fp_methodCurUse);
                                $('input[name="edit_method[]"]').prop('checked', false);
                                
                                drugRes.forEach(function(value) 
                                {
                                    $('input[name="edit_method[]"][value="' + value + '"]').prop('checked', true);
                                });
                            } 
                            else 
                            {
                                $('input[name="edit_method[]"]').prop('checked', false);
                            }

                            if (response.data.fp_methodIud) 
                            {
                                let drugRes = JSON.parse(response.data.fp_methodIud);
                                $('input[name="edit_methodIud[]"]').prop('checked', false);
                                
                                drugRes.forEach(function(value) 
                                {
                                    $('input[name="edit_methodIud[]"][value="' + value + '"]').prop('checked', true);
                                });
                            } 
                            else 
                            {
                                $('input[name="edit_methodIud[]"]').prop('checked', false);
                            }
                            $('#edit_other_specify').val(response.data.fp_otherMethod);

                    //Medical History
                        let editMigraine = response.data.fp_mhMigraine;
                            $('#edit_fpMigraineYes').prop('checked', false);
                            $('#edit_fpMigraineNo').prop('checked', false);
                            if (editMigraine === 'Yes') {
                                $('#edit_fpMigraineYes').prop('checked', true);
                            } 
                            else if (editMigraine === 'No') {
                                $('#edit_fpMigraineNo').prop('checked', true);
                            }

                        let editStroke = response.data.fp_mhStroke;
                            $('#edit_fpStrokeYes').prop('checked', false);
                            $('#edit_fpStrokeNo').prop('checked', false);
                            if (editStroke === 'Yes') {
                                $('#edit_fpStrokeYes').prop('checked', true);
                            } 
                            else if (editStroke === 'No') {
                                $('#edit_fpStrokeNo').prop('checked', true);
                            }

                        let editHema = response.data.fp_mhHematoma;
                            $('#edit_fpHematomaYes').prop('checked', false);
                            $('#edit_fpHematomaNo').prop('checked', false);
                            if (editHema === 'Yes') {
                                $('#edit_fpHematomaYes').prop('checked', true);
                            } 
                            else if (editHema === 'No') {
                                $('#edit_fpHematomaNo').prop('checked', true);
                            }

                        let editBreast = response.data.fp_mhBreast;
                            $('#edit_fpBreastYes').prop('checked', false);
                            $('#edit_fpBreastNo').prop('checked', false);
                            if (editBreast === 'Yes') {
                                $('#edit_fpBreastYes').prop('checked', true);
                            } 
                            else if (editBreast === 'No') {
                                $('#edit_fpBreastNo').prop('checked', true);
                            }

                        let editChest = response.data.fp_mhChestPain;
                            $('#edit_fpChestYes').prop('checked', false);
                            $('#edit_fpChestNo').prop('checked', false);
                            if (editChest === 'Yes') {
                                $('#edit_fpChestYes').prop('checked', true);
                            } 
                            else if (editChest === 'No') {
                                $('#edit_fpChestNo').prop('checked', true);
                            }

                        let editCough = response.data.fp_mhCough;
                            $('#edit_fpCoughYes').prop('checked', false);
                            $('#edit_fpCoughNo').prop('checked', false);
                            if (editCough === 'Yes') {
                                $('#edit_fpCoughYes').prop('checked', true);
                            } 
                            else if (editCough === 'No') {
                                $('#edit_fpCoughNo').prop('checked', true);
                            }

                        let editJaun = response.data.fp_mhJaundice;
                            $('#edit_fpJaundiceYes').prop('checked', false);
                            $('#edit_fpJaundiceNo').prop('checked', false);
                            if (editJaun === 'Yes') {
                                $('#edit_fpJaundiceYes').prop('checked', true);
                            } 
                            else if (editJaun === 'No') {
                                $('#edit_fpJaundiceNo').prop('checked', true);
                            }

                        let editBleed = response.data.fp_mhBleeding;
                            $('#edit_fpVBleedYes').prop('checked', false);
                            $('#edit_fpVBleedNo').prop('checked', false);
                            if (editBleed === 'Yes') {
                                $('#edit_fpVBleedYes').prop('checked', true);
                            } 
                            else if (editBleed === 'No') {
                                $('#edit_fpVBleedNo').prop('checked', true);
                            }

                        let editDischarge = response.data.fp_mhDischarge;
                            $('#edit_fpDischargeYes').prop('checked', false);
                            $('#edit_fpDischargeNo').prop('checked', false);
                            if (editDischarge === 'Yes') {
                                $('#edit_fpDischargeYes').prop('checked', true);
                            } 
                            else if (editDischarge === 'No') {
                                $('#edit_fpDischargeNo').prop('checked', true);
                            }

                        let editPheno = response.data.fp_mhPhenobarbital;
                            $('#edit_fpIntakeYes').prop('checked', false);
                            $('#edit_fpIntakeNo').prop('checked', false);
                            if (editPheno === 'Yes') {
                                $('#edit_fpIntakeYes').prop('checked', true);
                            } 
                            else if (editPheno === 'No') {
                                $('#edit_fpIntakeNo').prop('checked', true);
                            }

                        let editSmoker = response.data.fp_mhSmoker;
                            $('#edit_fpSmokerYes').prop('checked', false);
                            $('#edit_fpSmokerNo').prop('checked', false);
                            if (editSmoker === 'Yes') {
                                $('#edit_fpSmokerYes').prop('checked', true);
                            } 
                            else if (editSmoker === 'No') {
                                $('#edit_fpSmokerNo').prop('checked', true);
                            }

                        let editDisab = response.data.fp_mhDisablity;
                            $('#edit_fpDisabilityYes').prop('checked', false);
                            $('#edit_fpDisabilityNo').prop('checked', false);
                            if (editDisab === 'Yes') {
                                $('#edit_fpDisabilityYes').prop('checked', true);
                            } 
                            else if (editDisab === 'No') {
                                $('#edit_fpDisabilityNo').prop('checked', true);
                            }

                        $('#edit_disabilityDetails').val(response.data.spouse.fp_mhSpecific);

                    //OBSTETRICAL HISTORY
                        $('#edit_fpNumG').val(response.data.fp_ohNpG);
                        $('#edit_fpNumP').val(response.data.fp_ohNpP);
                        $('#edit_fpNumFullTerm').val(response.data.fp_ohNpFt);
                        $('#edit_fpNumPremature').val(response.data.fp_ohNpPre);
                        $('#edit_fpNumAbortion').val(response.data.fp_ohNpAbort);
                        $('#edit_fpNumLivingChildren').val(response.data.fp_ohNpLc);
                        $('#edit_dateLastDelivery').val(response.data.fp_ohDateLastDel);

                        let editDelType = response.data.fp_ohTypeDel;
                            $('#edit_deliveryVaginal').prop('checked', false);
                            $('#edit_deliveryCSection').prop('checked', false);
                            if (editDelType === 'Vaginal') {
                                $('#edit_deliveryVaginal').prop('checked', true);
                            } 
                            else if (editDelType === 'Cesarean Section') {
                                $('#edit_deliveryCSection').prop('checked', true);
                            }

                        $('#edit_dateLastPeriod').val(response.data.fp_ohLastPeriod);
                        $('#edit_datePrevPeriod').val(response.data.fp_ohPrevPeriod	);

                        if (response.data.fp_ohMensFlow) 
                        {
                            let mensFlow = JSON.parse(response.data.fp_ohMensFlow);
                            $('input[name="edit_fpMenstrualFlow[]"]').prop('checked', false);
                            
                            mensFlow.forEach(function(value) 
                            {
                                $('input[name="edit_fpMenstrualFlow[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_fpMenstrualFlow[]"]').prop('checked', false);
                        }

                        let editDys = response.data.fp_ohDysmenorrhea;
                            $('#edit_dysYes').prop('checked', false);
                            $('#edit_dysNo').prop('checked', false);
                            if (editDys === 'Yes') {
                                $('#edit_dysYes').prop('checked', true);
                            } 
                            else if (editDys === 'No') {
                                $('#edit_dysNo').prop('checked', true);
                            }

                        let editMole = response.data.fp_ohMole;
                            $('#edit_hydaYes').prop('checked', false);
                            $('#edit_hydaNo').prop('checked', false);
                            if (editMole === 'Yes') {
                                $('#edit_hydaYes').prop('checked', true);
                            } 
                            else if (editMole === 'No') {
                                $('#edit_hydaNo').prop('checked', true);
                            }

                        let editEcto = response.data.fp_ohEctopic;
                            $('#edit_ectoYes').prop('checked', false);
                            $('#edit_ectoNo').prop('checked', false);
                            if (editEcto === 'Yes') {
                                $('#edit_ectoYes').prop('checked', true);
                            } 
                            else if (editEcto === 'No') {
                                $('#edit_ectoNo').prop('checked', true);
                            }

                    //Risks
                        let riskDischarge = response.data.fp_riskDischarge;
                            $('#edit_stiFaqAdYes').prop('checked', false);
                            $('#edit_stiFaqAdNo').prop('checked', false);
                            if (riskDischarge === 'Yes') {
                                $('#edit_stiFaqAdYes').prop('checked', true);
                            } 
                            else if (riskDischarge === 'No') {
                                $('#edit_stiFaqAdNo').prop('checked', true);
                            }

                        let riskGenital = response.data.fp_riskGenital;
                            $('#edit_stiFaqGenitalPenis').prop('checked', false);
                            $('#edit_stiFaqGenitalVagina').prop('checked', false);
                            if (riskGenital === 'Penis') {
                                $('#edit_stiFaqGenitalPenis').prop('checked', true);
                            } 
                            else if (riskGenital === 'Vagina') {
                                $('#edit_stiFaqGenitalVagina').prop('checked', true);
                            }

                        let riskUlcer = response.data.fp_riskUlcer;
                            $('#edit_stiFaqSuYes').prop('checked', false);
                            $('#edit_stiFaqSuNo').prop('checked', false);
                            if (riskUlcer === 'Yes') {
                                $('#edit_stiFaqSuYes').prop('checked', true);
                            } 
                            else if (riskUlcer === 'No') {
                                $('#edit_stiFaqSuNo').prop('checked', true);
                            }

                        let riskBurning = response.data.fp_riskBurning;
                            $('#edit_stiFaqPbYes').prop('checked', false);
                            $('#edit_stiFaqPbNo').prop('checked', false);
                            if (riskBurning === 'Yes') {
                                $('#edit_stiFaqPbYes').prop('checked', true);
                            } 
                            else if (riskBurning === 'No') {
                                $('#edit_stiFaqPbNo').prop('checked', true);
                            }

                        let riskHitory = response.data.fp_riskHistory;
                            $('#edit_stiFaqTreatmentYes').prop('checked', false);
                            $('#edit_stiFaqTreatmentNo').prop('checked', false);
                            if (riskHitory === 'Yes') {
                                $('#edit_stiFaqTreatmentYes').prop('checked', true);
                            } 
                            else if (riskHitory === 'No') {
                                $('#edit_stiFaqTreatmentNo').prop('checked', true);
                            }

                        let riskHiv = response.data.fp_riskHiv;
                            $('#edit_stiFaqHivYes').prop('checked', false);
                            $('#edit_stiFaqHivNo').prop('checked', false);
                            if (riskHiv === 'Yes') {
                                $('#edit_stiFaqHivYes').prop('checked', true);
                            } 
                            else if (riskHiv === 'No') {
                                $('#edit_stiFaqHivNo').prop('checked', true);
                            }

                    //Violence Against Women
                        let vawPartner = response.data.fp_vawPartner;
                            $('#edit_fpUnpleasantYes').prop('checked', false);
                            $('#edit_fpUnpleasantNo').prop('checked', false);
                            if (vawPartner === 'Yes') {
                                $('#edit_fpUnpleasantYes').prop('checked', true);
                            } 
                            else if (vawPartner === 'No') {
                                $('#edit_fpUnpleasantNo').prop('checked', true);
                            }

                        let vawApprove = response.data.fp_vawApprove;
                            $('#edit_fpNotApproveYes').prop('checked', false);
                            $('#edit_fpNotApproveNo').prop('checked', false);
                            if (vawApprove === 'Yes') {
                                $('#edit_fpNotApproveYes').prop('checked', true);
                            } 
                            else if (vawApprove === 'No') {
                                $('#edit_fpNotApproveNo').prop('checked', true);
                            }

                        let vawHistory = response.data.fp_vawHistory;
                            $('#edit_fpVawYes').prop('checked', false);
                            $('#edit_fpVawNo').prop('checked', false);
                            if (vawHistory === 'Yes') {
                                $('#edit_fpVawYes').prop('checked', true);
                            } 
                            else if (vawHistory === 'No') {
                                $('#edit_fpVawNo').prop('checked', true);
                            }

                        if (response.data.fp_vawRefferedto) 
                        {
                            let fpReffered = JSON.parse(response.data.fp_vawRefferedto);
                            $('input[name="edit_fpRefferedVaw[]"]').prop('checked', false);
                            
                            fpReffered.forEach(function(value) 
                            {
                                $('input[name="edit_fpRefferedVaw[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_fpRefferedVaw[]"]').prop('checked', false);
                        }
                        $('#edit_othersVaw').val(response.data.fp_vawRefferedtoSpecific);
                           
                    //Physical Examination
                        $('#edit_fpinputOHt').val(response.data.fp_peHt);
                        $('#edit_fpinputOWt').val(response.data.fp_peWt);
                        $('#edit_fpinputBp').val(response.data.fp_peBp);
                        $('#edit_fpinputPr').val(response.data.fp_pePr);
                        if (response.data.fp_peSkin) 
                        {
                            let fpSkin = JSON.parse(response.data.fp_peSkin);
                            $('input[name="edit_fpPeSkin[]"]').prop('checked', false);
                            
                            fpSkin.forEach(function(value) 
                            {
                                $('input[name="edit_fpPeSkin[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_fpPeSkin[]"]').prop('checked', false);
                        }

                        if (response.data.fp_peConjuctiva) 
                        {
                            let fpConjuctiva = JSON.parse(response.data.fp_peConjuctiva);
                            $('input[name="edit_fpPeConj[]"]').prop('checked', false);
                            
                            fpConjuctiva.forEach(function(value) 
                            {
                                $('input[name="edit_fpPeConj[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_fpPeConj[]"]').prop('checked', false);
                        }

                        if (response.data.fp_peNeck) 
                        {
                            let fpNeck = JSON.parse(response.data.fp_peNeck);
                            $('input[name="edit_fpPeNeck[]"]').prop('checked', false);
                            
                            fpNeck.forEach(function(value) 
                            {
                                $('input[name="edit_fpPeNeck[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_fpPeNeck[]"]').prop('checked', false);
                        }

                        if (response.data.fp_peBreast) 
                        {
                            let fpBreast = JSON.parse(response.data.fp_peBreast);
                            $('input[name="edit_fpPeBreast[]"]').prop('checked', false);
                            
                            fpBreast.forEach(function(value) 
                            {
                                $('input[name="edit_fpPeBreast[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_fpPeBreast[]"]').prop('checked', false);
                        }

                        if (response.data.fp_peAbdomen) 
                        {
                            let fpBreast = JSON.parse(response.data.fp_peAbdomen);
                            $('input[name="edit_fpPeAbdomen[]"]').prop('checked', false);
                            
                            fpBreast.forEach(function(value) 
                            {
                                $('input[name="edit_fpPeAbdomen[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_fpPeAbdomen[]"]').prop('checked', false);
                        }

                        if (response.data.fp_peExtremities) 
                        {
                            let fpExtr = JSON.parse(response.data.fp_peExtremities);
                            $('input[name="edit_fpPeExtremities[]"]').prop('checked', false);
                            
                            fpExtr.forEach(function(value) 
                            {
                                $('input[name="edit_fpPeExtremities[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_fpPeExtremities[]"]').prop('checked', false);
                        }

                        if (response.data.fp_pelIud) 
                        {
                            let fpExtr = JSON.parse(response.data.fp_pelIud);
                            $('input[name="edit_fpPelExIud[]"]').prop('checked', false);
                            
                            fpExtr.forEach(function(value) 
                            {
                                $('input[name="edit_fpPelExIud[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_fpPelExIud[]"]').prop('checked', false);
                        }

                        if (response.data.fp_pelCab) 
                        {
                            let fpExtr = JSON.parse(response.data.fp_pelCab);
                            $('input[name="edit_fpPelExIudCab[]"]').prop('checked', false);
                            
                            fpExtr.forEach(function(value) 
                            {
                                $('input[name="edit_fpPelExIudCab[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_fpPelExIudCab[]"]').prop('checked', false);
                        }

                        if (response.data.fp_pelCc) 
                        {
                            let fpExtr = JSON.parse(response.data.fp_pelCc);
                            $('input[name="edit_fpPelExIudCerCon[]"]').prop('checked', false);
                            
                            fpExtr.forEach(function(value) 
                            {
                                $('input[name="edit_fpPelExIudCerCon[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_fpPelExIudCerCon[]"]').prop('checked', false);
                        }

                        if (response.data.fp_pelUp) 
                        {
                            let fpExtr = JSON.parse(response.data.fp_pelUp);
                            $('input[name="edit_fpPelExIudUtPo[]"]').prop('checked', false);
                            
                            fpExtr.forEach(function(value) 
                            {
                                $('input[name="edit_fpPelExIudUtPo[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_fpPelExIudUtPo[]"]').prop('checked', false);
                        }
                        $('#edit_fpPelExUd').val(response.data.fp_pelUd);

                    //FAQs
                        let q1 = response.data.fp_q1;
                            $('#edit_fpFaq1Yes').prop('checked', false);
                            $('#edit_fpFaq1No').prop('checked', false);
                            if (q1 === 'Yes') {
                                $('#edit_fpFaq1Yes').prop('checked', true);
                            } 
                            else if (q1 === 'No') {
                                $('#edit_fpFaq1No').prop('checked', true);
                            }

                        let q2 = response.data.fp_q2;
                            $('#edit_fpFaq2Yes').prop('checked', false);
                            $('#edit_fpFaq2No').prop('checked', false);
                            if (q2 === 'Yes') {
                                $('#edit_fpFaq2Yes').prop('checked', true);
                            } 
                            else if (q2 === 'No') {
                                $('#edit_fpFaq2No').prop('checked', true);
                            }

                        let q3 = response.data.fp_q3;
                            $('#edit_fpFaq3Yes').prop('checked', false);
                            $('#edit_fpFaq3No').prop('checked', false);
                            if (q3 === 'Yes') {
                                $('#edit_fpFaq3Yes').prop('checked', true);
                            } 
                            else if (q3 === 'No') {
                                $('#edit_fpFaq3No').prop('checked', true);
                            }

                        let q4 = response.data.fp_q4;
                            $('#edit_fpFaq4Yes').prop('checked', false);
                            $('#edit_fpFaq4No').prop('checked', false);
                            if (q4 === 'Yes') {
                                $('#edit_fpFaq4Yes').prop('checked', true);
                            } 
                            else if (q4 === 'No') {
                                $('#edit_fpFaq4No').prop('checked', true);
                            }

                        let q5 = response.data.fp_q5;
                            $('#edit_fpFaq5Yes').prop('checked', false);
                            $('#edit_fpFaq5No').prop('checked', false);
                            if (q5 === 'Yes') {
                                $('#edit_fpFaq5Yes').prop('checked', true);
                            } 
                            else if (q5 === 'No') {
                                $('#edit_fpFaq5No').prop('checked', true);
                            }

                        let q6 = response.data.fp_q6;
                            $('#edit_fpFaq6Yes').prop('checked', false);
                            $('#edit_fpFaq6No').prop('checked', false);
                            if (q6 === 'Yes') {
                                $('#edit_fpFaq6Yes').prop('checked', true);
                            } 
                            else if (q6 === 'No') {
                                $('#edit_fpFaq6No').prop('checked', true);
                            }
                        $('#edit_fpStatus').val(response.data.fp_status);

                    // Open the modal
                        calculateAge();
                        $('#editFpModal').modal('show');
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

    //uPDATE Form
    $(document).on('submit', '#edit_fpInputForm', function (e) {
        e.preventDefault(); // Prevent default form submission behavior

        var fp_id = $('#edit_fp_id').val(); 

        // Create a FormData object with the form fields
        var formData = new FormData();
        // TextBoxes
            // Personal Info
                formData.append('edit_inputClient', $('#edit_inputClient').val());
                formData.append('edit_inputSpouse', $('#edit_inputSpouse').val());
                formData.append('edit_em_id', $('#edit_em_id').val());
                formData.append('edit_fpLiveChild', $('#edit_fpLiveChild').val());
                formData.append('edit_fpIncome', $('#edit_fpIncome').val());
                formData.append('edit_fpReasonOtherFp', $('#edit_fpReasonOtherFp').val());
                formData.append('edit_fpReasonSpecifySs', $('#edit_fpReasonSpecifySs').val());
                formData.append('edit_other_specify', $('#edit_other_specify').val());
            // Medical History
                formData.append('edit_disabilityDetails', $('#edit_disabilityDetails').val());
            // Obstetrical History
                formData.append('edit_fpNumG', $('#edit_fpNumG').val());
                formData.append('edit_fpNumP', $('#edit_fpNumP').val());
                formData.append('edit_fpNumFullTerm', $('#edit_fpNumFullTerm').val());
                formData.append('edit_fpNumPremature', $('#edit_fpNumPremature').val());
                formData.append('edit_fpNumAbortion', $('#edit_fpNumAbortion').val());
                formData.append('edit_fpNumLivingChildren', $('#edit_fpNumLivingChildren').val());
                formData.append('edit_dateLastDelivery', $('#edit_dateLastDelivery').val());
                formData.append('edit_dateLastPeriod', $('#edit_dateLastPeriod').val());
                formData.append('edit_datePrevPeriod', $('#edit_datePrevPeriod').val());
            // Violence Against Women
                formData.append('edit_othersVaw', $('#edit_othersVaw').val());
            // Physical Examination
                formData.append('edit_fpinputOHt', $('#edit_fpinputOHt').val());
                formData.append('edit_fpinputOWt', $('#edit_fpinputOWt').val());
                formData.append('edit_fpinputBp', $('#edit_fpinputBp').val());
                formData.append('edit_fpinputPr', $('#edit_fpinputPr').val());
                formData.append('edit_fpPelExUd', $('#edit_fpPelExUd').val());
            // FAQs 
                formData.append('edit_fpStatus', $('#edit_fpStatus').val());


        //FOR CHECKBOXES
            // Personal Info
                var currentMethod = [];
                    $('input[name="edit_method[]"]:checked').each(function() {
                        currentMethod.push($(this).val());
                    });
                    
                    if (currentMethod.length > 0) {
                        formData.append('edit_method', JSON.stringify(currentMethod));
                    } else {
                        formData.append('edit_method', JSON.stringify([])); 
                    }

                var currentMethodIud = [];
                    $('input[name="edit_methodIud[]"]:checked').each(function() {
                        currentMethodIud.push($(this).val());
                    });
                    
                    if (currentMethodIud.length > 0) {
                        formData.append('edit_methodIud', JSON.stringify(currentMethodIud));
                    } else {
                        formData.append('edit_methodIud', JSON.stringify([])); 
                    }
            // Obstetrical History
                var menstFlow = [];
                    $('input[name="edit_fpMenstrualFlow[]"]:checked').each(function() {
                        menstFlow.push($(this).val());
                    });
                    
                    if (menstFlow.length > 0) {
                        formData.append('edit_fpMenstrualFlow', JSON.stringify(menstFlow));
                    } else {
                        formData.append('edit_fpMenstrualFlow', JSON.stringify([])); 
                    }
            // Violence Against Women
                var vawReffered = [];
                    $('input[name="edit_fpRefferedVaw[]"]:checked').each(function() {
                        vawReffered.push($(this).val());
                    });
                    
                    if (vawReffered.length > 0) {
                        formData.append('edit_fpRefferedVaw', JSON.stringify(vawReffered));
                    } else {
                        formData.append('edit_fpRefferedVaw', JSON.stringify([])); 
                    }
            // Physical Examination
                var fpSkins = [];
                    $('input[name="edit_fpPeSkin[]"]:checked').each(function() {
                        fpSkins.push($(this).val());
                    });
                    
                    if (fpSkins.length > 0) {
                        formData.append('edit_fpPeSkin', JSON.stringify(fpSkins));
                    } else {
                        formData.append('edit_fpPeSkin', JSON.stringify([])); 
                    }

                var fpConjs = [];
                    $('input[name="edit_fpPeConj[]"]:checked').each(function() {
                        fpConjs.push($(this).val());
                    });
                    
                    if (fpConjs.length > 0) {
                        formData.append('edit_fpPeConj', JSON.stringify(fpConjs));
                    } else {
                        formData.append('edit_fpPeConj', JSON.stringify([])); 
                    }

                var fpNecks = [];
                    $('input[name="edit_fpPeNeck[]"]:checked').each(function() {
                        fpNecks.push($(this).val());
                    });
                    
                    if (fpNecks.length > 0) {
                        formData.append('edit_fpPeNeck', JSON.stringify(fpNecks));
                    } else {
                        formData.append('edit_fpPeNeck', JSON.stringify([])); 
                    }

                var fpBreasts = [];
                    $('input[name="edit_fpPeBreast[]"]:checked').each(function() {
                        fpBreasts.push($(this).val());
                    });
                    
                    if (fpBreasts.length > 0) {
                        formData.append('edit_fpPeBreast', JSON.stringify(fpBreasts));
                    } else {
                        formData.append('edit_fpPeBreast', JSON.stringify([])); 
                    }
                var fpAbs = [];
                    $('input[name="edit_fpPeAbdomen[]"]:checked').each(function() {
                        fpAbs.push($(this).val());
                    });
                    
                    if (fpAbs.length > 0) {
                        formData.append('edit_fpPeAbdomen', JSON.stringify(fpAbs));
                    } else {
                        formData.append('edit_fpPeAbdomen', JSON.stringify([])); 
                    }
                var fpExtrem = [];
                    $('input[name="edit_fpPeExtremities[]"]:checked').each(function() {
                        fpExtrem.push($(this).val());
                    });
                    
                    if (fpExtrem.length > 0) {
                        formData.append('edit_fpPeExtremities', JSON.stringify(fpExtrem));
                    } else {
                        formData.append('edit_fpPeExtremities', JSON.stringify([])); 
                    }

                var fplExIud = [];
                    $('input[name="edit_fpPelExIud[]"]:checked').each(function() {
                        fplExIud.push($(this).val());
                    });
                    
                    if (fplExIud.length > 0) {
                        formData.append('edit_fpPelExIud', JSON.stringify(fplExIud));
                    } else {
                        formData.append('edit_fpPelExIud', JSON.stringify([])); 
                    }

                var fplExIudCab = [];
                    $('input[name="edit_fpPelExIudCab[]"]:checked').each(function() {
                        fplExIudCab.push($(this).val());
                    });
                    
                    if (fplExIudCab.length > 0) {
                        formData.append('edit_fpPelExIudCab', JSON.stringify(fplExIudCab));
                    } else {
                        formData.append('edit_fpPelExIudCab', JSON.stringify([])); 
                    }

                var fplExIudCc = [];
                    $('input[name="edit_fpPelExIudCerCon[]"]:checked').each(function() {
                        fplExIudCc.push($(this).val());
                    });
                    
                    if (fplExIudCc.length > 0) {
                        formData.append('edit_fpPelExIudCerCon', JSON.stringify(fplExIudCc));
                    } else {
                        formData.append('edit_fpPelExIudCerCon', JSON.stringify([])); 
                    }

                var fplExIudPo = [];
                    $('input[name="edit_fpPelExIudUtPo[]"]:checked').each(function() {
                        fplExIudPo.push($(this).val());
                    });
                    
                    if (fplExIudPo.length > 0) {
                        formData.append('edit_fpPelExIudUtPo', JSON.stringify(fplExIudPo));
                    } else {
                        formData.append('edit_fpPelExIudUtPo', JSON.stringify([])); 
                    }

        // FOR RADIO BUTTONS
            // Personal Info
                var upChildren = $('input[name="edit_children"]:checked').val();
                    if (upChildren) {
                        formData.append('edit_children', upChildren); 
                    }
                
                var upClient = $('input[name="edit_fpClientType"]:checked').val();
                    if (upClient) {
                        formData.append('edit_fpClientType', upClient); 
                    }

                var upClientFf = $('input[name="edit_fpClientTypeff"]:checked').val();
                    if (upClientFf) {
                        formData.append('edit_fpClientTypeff', upClientFf); 
                    }

                var upReasonFp = $('input[name="edit_fpReasonFp"]:checked').val();
                    if (upReasonFp) {
                        formData.append('edit_fpReasonFp', upReasonFp); 
                    }

                var upReason = $('input[name="edit_fpReason"]:checked').val();
                    if (upReason) {
                        formData.append('edit_fpReason', upReason); 
                    }
                
            // Medical History
                var upMigraine = $('input[name="edit_fpMigraine"]:checked').val();
                    if (upMigraine) {
                        formData.append('edit_fpMigraine', upMigraine); 
                    }

                var upStroke = $('input[name="edit_fpStroke"]:checked').val();
                    if (upStroke) {
                        formData.append('edit_fpStroke', upStroke); 
                    }

                var upHematoma = $('input[name="edit_fpHematoma"]:checked').val();
                    if (upHematoma) {
                        formData.append('edit_fpHematoma', upHematoma); 
                    }

                var upBreast = $('input[name="edit_fpBreast"]:checked').val();
                    if (upBreast) {
                        formData.append('edit_fpBreast', upBreast); 
                    }

                var upChest = $('input[name="edit_fpChest"]:checked').val();
                    if (upChest) {
                        formData.append('edit_fpChest', upChest); 
                    }

                var upCough = $('input[name="edit_fpCough"]:checked').val();
                    if (upCough) {
                        formData.append('edit_fpCough', upCough); 
                    }

                var upJaundice= $('input[name="edit_fpJaundice"]:checked').val();
                    if (upJaundice) {
                        formData.append('edit_fpJaundice', upJaundice); 
                    }

                var upBleed= $('input[name="edit_fpVBleed"]:checked').val();
                    if (upBleed) {
                        formData.append('edit_fpVBleed', upBleed); 
                    }

                var upDischarge= $('input[name="edit_fpDischarge"]:checked').val();
                    if (upDischarge) {
                        formData.append('edit_fpDischarge', upDischarge); 
                    }

                var upIntake= $('input[name="edit_fpIntake"]:checked').val();
                    if (upIntake) {
                        formData.append('edit_fpIntake', upIntake); 
                    }

                var upSmoker= $('input[name="edit_fpSmoker"]:checked').val();
                    if (upSmoker) {
                        formData.append('edit_fpSmoker', upSmoker); 
                    }
                
                var upDisability= $('input[name="edit_fpDisability"]:checked').val();
                    if (upDisability) {
                        formData.append('edit_fpDisability', upDisability); 
                    }
            // Obstetrical History
                var upDelType= $('input[name="edit_deliveryType"]:checked').val();
                    if (upDelType) {
                        formData.append('edit_deliveryType', upDelType); 
                    }

                var upDys= $('input[name="edit_fpDys"]:checked').val();
                    if (upDys) {
                        formData.append('edit_fpDys', upDys); 
                    }

                var upHyda= $('input[name="edit_fpHyda"]:checked').val();
                    if (upHyda) {
                        formData.append('edit_fpHyda', upHyda); 
                    }

                var upEcto= $('input[name="edit_fpEcto"]:checked').val();
                    if (upEcto) {
                        formData.append('edit_fpEcto', upEcto); 
                    }
            // Violence Against Women
                var upPartner= $('input[name="edit_fpUnpleasant"]:checked').val();
                    if (upPartner) {
                        formData.append('edit_fpUnpleasant', upPartner); 
                    }
                var upApprove= $('input[name="edit_fpNotApprove"]:checked').val();
                    if (upApprove) {
                        formData.append('edit_fpNotApprove', upApprove); 
                    }
                var upVaw= $('input[name="edit_fpVaw"]:checked').val();
                    if (upVaw) {
                        formData.append('edit_fpVaw', upVaw); 
                    }
            // Risks
                var upAbDis= $('input[name="edit_stiFaqAd"]:checked').val();
                    if (upAbDis) {
                        formData.append('edit_stiFaqAd', upAbDis); 
                    }

                var upGenitals= $('input[name="edit_stiFaqGenital"]:checked').val();
                    if (upGenitals) {
                        formData.append('edit_stiFaqGenital', upGenitals); 
                    }

                var upSores= $('input[name="edit_stiFaqSu"]:checked').val();
                    if (upSores) {
                        formData.append('edit_stiFaqSu', upSores); 
                    }

                var upBurn= $('input[name="edit_stiFaqPb"]:checked').val();
                    if (upBurn) {
                        formData.append('edit_stiFaqPb', upBurn); 
                    }

                var upTreatment= $('input[name="edit_stiFaqTreatment"]:checked').val();
                    if (upTreatment) {
                        formData.append('edit_stiFaqTreatment', upTreatment); 
                    }

                var upHiv= $('input[name="edit_stiFaqHiv"]:checked').val();
                    if (upHiv) {
                        formData.append('edit_stiFaqHiv', upHiv); 
                    }
            // FAQs
                var upFaq1= $('input[name="edit_fpFaq1"]:checked').val();
                    if (upFaq1) {
                        formData.append('edit_fpFaq1', upFaq1); 
                    }

                var upFaq2= $('input[name="edit_fpFaq2"]:checked').val();
                    if (upFaq2) {
                        formData.append('edit_fpFaq2', upFaq2); 
                    }

                var upFaq3= $('input[name="edit_fpFaq3"]:checked').val();
                    if (upFaq3) {
                        formData.append('edit_fpFaq3', upFaq3); 
                    }

                var upFaq4= $('input[name="edit_fpFaq4"]:checked').val();
                    if (upFaq4) {
                        formData.append('edit_fpFaq4', upFaq4); 
                    }

                var upFaq5= $('input[name="edit_fpFaq5"]:checked').val();
                    if (upFaq5) {
                        formData.append('edit_fpFaq5', upFaq5); 
                    }

                var upFaq6= $('input[name="edit_fpFaq6"]:checked').val();
                    if (upFaq6) {
                        formData.append('edit_fpFaq6', upFaq6); 
                    }
                    


            //END OF FORMDATA APPEND

        $.ajax({
            type: "POST",
            url: "/updateFp/" + fp_id, // URL to handle the update
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
                            <i class="bi bi-exclamation-triangle me-1"></i> FP Not Found.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                } else {
                    $('#alert-container3').html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i> FP updated successfully!
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

    //iNSERT SideB
    $(function(){      
        $("#sideBInputForm").on('submit', function(e){
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
                        $('#sideBInputForm')[0].reset();

                        // Create and append the success alert
                        const alertHtml = `
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                ${data.msg} 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

                        // Append the alert to your alert container
                        $('#alert-container4').append(alertHtml);

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
                    
                    $('#alert-container4').append(alertHtml);

                        // Remove alert after 3 seconds
                        setTimeout(() => {
                            $('.alert').alert('close');
                        }, 3000);

                }
            });
        });
    });

    //update status
    function updateFpStatus(fpId, newStatus) 
    {
        fetch('/update-fp-status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure you include the CSRF token for security
            },
            body: JSON.stringify({
                id: fpId,
                status: newStatus
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('FP Record status updated successfully');
                location.reload(); // Optionally, reload the page to reflect the changes
            } else {
                alert('Failed to update FP Record status');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>