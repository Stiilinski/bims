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

    .inputGroupContainer{
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
                    <th>1</th>
                    <th>Stilinski</th>
                    <th>Stiles</th>
                    <th>Scott</th>
                    <th>1/20/2001</th>
                    <th>22</th>
                    <th>Male</th>
                    <th>Ipil-Ipil</th>
                    <th>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FirstModal">+ Side B</button>
                        <button type="button" class="btn btn-primary">Edit</button>
                        <button type="button" class="btn btn-primary">View</button>
                    </th>
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
                <form> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Personal Information</span>
                            </div>
                            <div class="inputArea">
                                <div class="rowFirst columnGroup familyPlaningCon"> 
                                    <div class="columnCon">
                                        <div class="column mb-3 pName">
                                            <label for="inputClient" class="form-label">Name of Client</label>
                                            <select id="inputClient" class="form-select pNames" name="client">
                                                <option selected disabled>Choose...</option>
                                                <option value="1">John Doe</option>
                                                <option value="2">Jane Smith</option>
                                                <option value="3">Michael Johnson</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpDob" class="col-sm-5 col-form-label">Date of Birth</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control shortField" id="fpDob" name="fpDob">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpAge" class="col-sm-5 col-form-label">Age</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control briefField" id="fpAge" name="fpAge">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpEa" class="col-sm-8 col-form-label">Educational Attainment</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control mediumField" id="fpEa" name="fpEa">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpOcc" class="col-sm-8 col-form-label">Occupation</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 200px;" id="fpOcc" name="fpOcc">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpAdd" class="col-sm-8 col-form-label">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 328px;" id="fpAdd" name="fpAdd">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpCn" class="col-sm-8 col-form-label">Contact Number</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 328px;" id="fpCn" name="fpCn">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpCs" class="col-sm-8 col-form-label">Civil Status</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 328px;" id="fpCs" name="fpCs">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="fpReligion" class="col-sm-8 col-form-label">Religion</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 328px;" id="fpReligion" name="fpReligion">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="columnCon">
                                        
                                        <div class="column mb-3 pName">
                                            <label for="inputSpouse" class="form-label">Name of Spouse</label>
                                            <select id="inputSpouse" class="form-select pNames" name="spouse">
                                                <option selected disabled>Choose...</option>
                                                <option value="1">John Doe</option>
                                                <option value="2">Jane Smith</option>
                                                <option value="3">Michael Johnson</option>
                                                <!-- Add more options as needed -->
                                            </select>
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
                                        </fieldset>

                                        <div class="column mb-3">
                                            <label for="fpIncome" class="col-sm-8 col-form-label">Average Monthly Income</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="fpIncome" name="fpIncome">
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
                                            </fieldset>
                                            <hr>
                                            <fieldset class="column mb-3" style="padding: 10px;">
                                                <legend class="col-form-label col-sm-12 pt-0">Client Type (Follow Up)</legend>
                                                <div class="col-sm-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpClientTypeff" id="fpCm" value="New Acceptor">
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
                                                </div>
                                                <div class="column mb-3" style="display: flex; justify-content:flex-start; align-items:center">
                                                    <label class="col-sm-2" for="fpReasonOther">Others:</label>
                                                    <input class="form-control shortField" type="text" name="fpReasonOtherFp" id="fpReasonOther" placeholder="Specify...">
                                                </div>
                                            </fieldset>

                                            <hr>

                                            <fieldset class="column mb-3" style="padding: 10px;">
                                                <legend class="col-form-label col-sm-12 pt-0">Reason</legend>
                                                <div class="col-sm-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpReason" id="fpMed" value="Spacing">
                                                        <label class="form-check-label" for="fpMed">Medical Condition</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fpReason" id="fpSide" value="Side Effects">
                                                        <label class="form-check-label" for="fpSide">Side Effects</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="column mb-3" style="display: flex; justify-content:flex-start; align-items:center">
                                                <label class="col-sm-5" for="fpReasonSpecifySs">Side Effects (Specify)</label>
                                                <input class="form-control shortField" type="text" name="fpReasonSpecifySs" id="fpReasonSpecifySs" placeholder="Specify...">
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
                                                            <input class="form-check-input" type="checkbox" id="interval" name="method[]" value="Interval" disabled>
                                                            <label class="form-check-label" for="interval">Interval</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="postpartum" name="method[]" value="Post-Partum" disabled>
                                                            <label class="form-check-label" for="postpartum">Post-Partum</label>
                                                        </div>
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
                                                        <div class="form-group">
                                                            <input type="text" class="form-control mediumField" id="other_specify" name="other_specify" placeholder="Specify..." disabled>
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
                                            </fieldset>

                                            <div class="input-group">
                                                <input type="text" class="form-control" id="disabilityDetails" placeholder="If YES Please Specify..." disabled>
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
                                                    </div>
                                                    <div class="column mb-3">
                                                        <input type="text" class="form-control" id="othersVaw" name="othersVaw" style="width: 250px;" placeholder="Specify..." disabled>
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

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
        </div>
    </div><!-- End OF SIDE A-->

    {{-- SIDE B --}}
    <div class="modal fade" id="FirstModal" tabindex="-1" aria-labelledby="FirstModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Family Planning Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                @csrf
                    <div class="modal-body">
                        <div class="column mb-3">
                            <label for="fpDateVisit" class="col-sm-10 col-form-label">Date of Visit</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="fpDateVisit" name="fpDateVisit">
                            </div>
                        </div>

                        <div class="column mb-3">
                            <label for="fpMedFind" class="col-sm-10 col-form-label">Medical Findings</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fpMedFind" name="fpMedFind">
                            </div>
                        </div>

                        <div class="column mb-3">
                            <label for="fpMetAcc" class="col-sm-10 col-form-label">Method Accepted</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fpMetAcc" name="fpMetAcc">
                            </div>
                        </div>

                        <div class="column mb-3">
                            <label for="fpDateFfVisit" class="col-sm-10 col-form-label">Date of Follow-up Visit</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="fpDateFfVisit" name="fpDateFfVisit">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Save</button>
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
<script>
    //CLIENT SELECT
    $(document).ready(function() {
        $('#inputClient').select2({
            placeholder: "Choose...",
            allowClear: true
        });

        // Initialize Select2 on modal show
        $('#ExtralargeModal').on('shown.bs.modal', function () {
            $('#inputClient').select2({
                dropdownParent: $('#ExtralargeModal')
            });
        });
    });

    //SPOUSE SELECT
    $(document).ready(function() {
        $('#inputSpouse').select2({
            placeholder: "Choose...",
            allowClear: true
        });

        // Initialize Select2 on modal show
        $('#ExtralargeModal').on('shown.bs.modal', function () {
            $('#inputSpouse').select2({
                dropdownParent: $('#ExtralargeModal')
            });
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
</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>