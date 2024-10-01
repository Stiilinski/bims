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

    .longField {
        width: 1338px;
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
        gap: 10px;
        width: 100%;
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

    .customCon {
        width: 100%;
        padding: 10px;
        display: flex;
        justify-content: flex-start;
    }

    .columnCon {
        width: 100%;
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .rowCon {
        width: 32.8%;
        padding: 10px;
    }

    .rowConWhole {
        width: 100%;
        display: flex;
        justify-content: space-between
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

    .grpField {
        display: flex;
        flex-direction: column;
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
        <h1>Destrict Referral</h1>
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
                        <button type="button" class="btn btn-primary">View</button>
                        <button type="button" class="btn btn-primary">Edit</button>
                        <button type="button" class="btn btn-primary">Archive</button>
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
                    <h5 class="modal-title">Destrict Refferal Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Patient Information I.</span>
                            </div>
                            <div class="inputArea">
                                <div class="rowFirst columnGroup familyPlaningCon"> 
                                    <div class="columnCon">
                                        <div class="column mb-3 pName">
                                            <label for="inputDestrictName" class="form-label">Name</label>
                                            <select id="inputDestrictName" class="form-select pNames" name="inputDestrictName">
                                                <option selected disabled>Choose...</option>
                                                <option value="1">John Doe</option>
                                                <option value="2">Jane Smith</option>
                                                <option value="3">Michael Johnson</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="destrictBdate" class="col-sm-5 col-form-label">Birthdate</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control shortField" id="destrictBdate" name="destrictBdate" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="destrictAge" class="col-sm-5 col-form-label">Age</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control briefField" id="destrictAge" name="destrictAge" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="destrictAddress" class="col-sm-8 col-form-label">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="destrictAddress" name="destrictAddress" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="destrictMaiden" class="col-sm-8 col-form-label">Maiden Name (For Married Women)</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="destrictMaiden" name="destrictMaiden">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="destrictMother" class="col-sm-8 col-form-label">Mother's Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control " id="destrictMother" name="destrictMother">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="destrictSpouse" class="col-sm-8 col-form-label">Spouse Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control mediumField" id="destrictSpouse" name="destrictSpouse">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="destrictBlood" class="col-sm-10 col-form-label">Blood Type</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control briefField" id="destrictBlood" name="destrictBlood">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>   
                        </div>

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Patient Information II.</span>
                            </div>
                            <div class="inputArea">
                                <div class="columnGroup"> 
                                    <div class="customCon">
                                        <div class="grpField" style="width: 50%">
                                            <fieldset class="row mb-3">
                                                <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Employment Status</legend>
                                                <div class="col-sm-10">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictEmp" id="destrictEmpStudent" value="Student">
                                                        <label class="form-check-label" for="destrictEmpStudent">Student</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictEmp" id="destrictEmpEmployed" value="Employed">
                                                        <label class="form-check-label" for="destrictEmpEmployed">Employed</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictEmp" id="destrictEmpUnknown" value="Unknown">
                                                        <label class="form-check-label" for="destrictEmpUnknown">Unknown</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictEmp" id="destrictEmpRetired" value="Retired">
                                                        <label class="form-check-label" for="destrictEmpRetired">Retired</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictEmp" id="destrictEmpUnemployed" value="Unemployed">
                                                        <label class="form-check-label" for="destrictEmpUnemployed">Unemployed</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3">
                                                <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Family Member</legend>
                                                <div class="col-sm-10">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictFam" id="destrictFamFather" value="Father">
                                                        <label class="form-check-label" for="destrictFamFather">Father</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictFam" id="destrictFamMother" value="Mother">
                                                        <label class="form-check-label" for="destrictFamMother">Mother</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictFam" id="destrictFamSon" value="Son">
                                                        <label class="form-check-label" for="destrictFamSon">Son</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictFam" id="destrictFamDaughter" value="Daughter">
                                                        <label class="form-check-label" for="destrictFamDaughter">Daughter</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictFam" id="destrictFamOther" value="Other">
                                                        <label class="form-check-label" for="destrictFamOther">Other</label>
                                                    </div>
                                                    
                                                    <div class="column mb-3" id="otherFieldContainer" style="display: none;">
                                                        <label for="destrictFamOtherText" class="col-sm-8 col-form-label">Others (Specify)</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="destrictFamOtherText" name="destrictFam" placeholder="Specify...">
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3">
                                                <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">DSWD NHTS?</legend>
                                                <div class="col-sm-10">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictDswd" id="destrictDswdYes" value="Yes">
                                                        <label class="form-check-label" for="destrictDswdYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictDswd" id="destrictDswdNo" value="No">
                                                        <label class="form-check-label" for="destrictDswdNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3">
                                                <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">4Ps Member?</legend>
                                                <div class="col-sm-10">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrict4Ps" id="destrict4PsYes" value="Yes">
                                                        <label class="form-check-label" for="destrict4PsYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrict4Ps" id="destrict4PsNo" value="No">
                                                        <label class="form-check-label" for="destrict4PsNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="grpField" style="width: 50%">
                                            <fieldset class="row mb-3">
                                                <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">PhilHealth Member?</legend>
                                                <div class="col-sm-10">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictPh" id="destrictPhYes" value="Yes">
                                                        <label class="form-check-label" for="destrictPhYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictPh" id="destrictPhNo" value="No">
                                                        <label class="form-check-label" for="destrictPhNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3">
                                                <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Status Type</legend>
                                                <div class="col-sm-10">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictStatType" id="destrictStatTypeMember" value="Member">
                                                        <label class="form-check-label" for="destrictStatTypeMember">Member</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictStatType" id="destrictStatTypeDep" value="Dependent">
                                                        <label class="form-check-label" for="destrictStatTypeDep">Dependent</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3">
                                                <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">If Member, Please Indicate Category</legend>
                                                <div class="col-sm-10">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictIfMem" id="destrictIfMemPrivate" value="FE-Private">
                                                        <label class="form-check-label" for="destrictIfMemPrivate">FE-Private</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictIfMem" id="destrictIfMemGovernment" value="FE-Government">
                                                        <label class="form-check-label" for="destrictIfMemGovernment">FE-Government</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictIfMem" id="destrictIfMemIE" value="IE">
                                                        <label class="form-check-label" for="destrictIfMemIE">IE</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictIfMem" id="destrictIfMemOther" value="Other">
                                                        <label class="form-check-label" for="destrictIfMemOther">Other</label>
                                                    </div>
                                                    
                                                    <div class="column mb-3" id="otherFieldMemContainer" style="display: none;">
                                                        <label for="destrictIfMemOther" class="col-sm-8 col-form-label">Others (Specify)</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="destrictIfMemOther" name="destrictIfMem" placeholder="Specify...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3">
                                                <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Primary Care Benefits (PCB) Member</legend>
                                                <div class="col-sm-10">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictPcb" id="destrictPcbYes" value="Yes">
                                                        <label class="form-check-label" for="destrictPcbYes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictPcb" id="destrictPcbNo" value="No">
                                                        <label class="form-check-label" for="destrictPcbNo">No</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>

                        <div class="rowConWhole">
                            <div class="inputGroupContainer" style="width: 49.8%;">
                                <div class="titleCaseFinding">
                                    <span>For CHU / RHU Personnel Only</span>
                                </div>
                                <div class="inputArea">
                                    <div class="rowFirst columnGroup familyPlaningCon"> 
                                        
                                        <div class="columnCon">
                                            <fieldset class="row mb-3">
                                                <legend class="col-form-label col-sm-8 pt-0">Mode of Transaction</legend>
                                                <div class="col-sm-10">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictTransaction" id="destrictWalkIn" value="Walk-In">
                                                        <label class="form-check-label" for="destrictWalkIn">Walk-In</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictTransaction" id="destrictVisited" value="Visited">
                                                        <label class="form-check-label" for="destrictVisited">Visited</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictTransaction" id="destrictReferral" value="Referral">
                                                        <label class="form-check-label" for="destrictReferral">Referral</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <div class="column mb-3">
                                                <label for="destrictDateConsult" class="col-sm-8 col-form-label">Date of Consultation</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control" id="destrictDateConsult" name="destrictDateConsult">
                                                </div>
                                            </div>

                                            <div class="column mb-3">   {{--MUST HAVE AM OR PM VALIDATION--}}
                                                <label for="destrictTimeConsult" class="col-sm-8 col-form-label">Consultation Time</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="destrictTimeConsult" name="destrictTimeConsult">
                                                </div>
                                            </div>

                                            <div class="rowGroup">
                                                <div class="column mb-3">
                                                    <label for="destrictBloodPressure" class="col-sm-8 col-form-label">BP</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control briefField" id="destrictBloodPressure" name="destrictBloodPressure">
                                                    </div>
                                                </div>

                                                <div class="column mb-3">
                                                    <label for="destrictTemp" class="col-sm-8 col-form-label">Temp</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control briefField" id="destrictTemp" name="destrictTemp">
                                                    </div>
                                                </div>

                                                <div class="column mb-3">
                                                    <label for="destrictHeight" class="col-sm-8 col-form-label">Height</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control briefField" id="destrictHeight" name="destrictHeight">
                                                    </div>
                                                </div>

                                                <div class="column mb-3">
                                                    <label for="destrictWeight" class="col-sm-8 col-form-label">Weight</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control briefField" id="destrictWeight" name="destrictWeight">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="destrictAttProv" class="col-sm-12 col-form-label">Name of Attending Provider</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="destrictAttProv" name="destrictAttProv">
                                                </div>
                                            </div>

                                            

                                        </div>

                                    </div>
                                </div>   
                            </div>

                            {{-- FOR REFFERAL ONLY --}}
                            <div class="inputGroupContainer" style="width: 49.8%;">
                                <div class="titleCaseFinding">
                                    <span>For REFFERAL Transaction Only</span>
                                </div>
                                <div class="inputArea">
                                    <div class="rowFirst columnGroup familyPlaningCon"> 
                                        
                                        <div class="columnCon">

                                            <div class="column mb-3">
                                                <label for="destrictRefFrom" class="col-sm-12 col-form-label">Reffered From</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="destrictRefFrom" name="destrictRefFrom">
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="destrictRefTo" class="col-sm-12 col-form-label">Reffered To</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="destrictRefTo" name="destrictRefTo">
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="destrictReasonRef" class="col-sm-12 col-form-label">Reasons For Refferal</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="destrictReasonRef" name="destrictReasonRef">
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="destrictRefBy" class="col-sm-12 col-form-label">Reffered By</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="destrictRefBy" name="destrictRefBy">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>   
                            </div>
                        </div>

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Follow Up I.</span>
                            </div>
                            <div class="inputArea">
                                <div class="columnGroup"> 
                                    <div class="customCon">
                                        <div class="grpField" style="width: 50%">
                                            <fieldset class="row mb-3">
                                                <legend class="col-form-label col-sm-8 pt-0">Nature Of Visit</legend>
                                                <div class="col-sm-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictNatVis" id="destrictNatVisCase" value="New Consultation/Case">
                                                        <label class="form-check-label" for="destrictNatVisCase">New Consultation/Case</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictNatVis" id="destrictNatVisAdmission" value="New Admission">
                                                        <label class="form-check-label" for="destrictNatVisAdmission">New Admission</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="destrictNatVis" id="destrictNatVisFollow" value="Follow-Up Visit">
                                                        <label class="form-check-label" for="destrictNatVisFollow">Follow-Up Visit</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="row mb-3">
                                                <legend class="col-form-label col-sm-12 pt-0">Signs & Symptoms</legend>
                                                
                                                <div class="col-sm-12 d-flex" style="gap: 15px">
                                                    <div class="rightCorner">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="destrictTypeCon[]" id="destrictTypeConGeneral" value="General">
                                                            <label class="form-check-label" for="destrictTypeConGeneral">General</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="destrictTypeCon[]" id="destrictTypeConPrenatal" value="Prenatal">
                                                            <label class="form-check-label" for="destrictTypeConPrenatal">Prenatal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="destrictTypeCon[]" id="destrictTypeConDental" value="Dental Care">
                                                            <label class="form-check-label" for="destrictTypeConDental">Dental Care</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="destrictTypeCon[]" id="destrictTypeConChild" value="Child Care">
                                                            <label class="form-check-label" for="destrictTypeConChild">Child Care</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="destrictTypeCon[]" id="destrictTypeConNutrition" value="Child Nutrition">
                                                            <label class="form-check-label" for="destrictTypeConNutrition">Child Nutrition</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="destrictTypeCon[]" id="destrictTypeConInjury" value="Injury">
                                                            <label class="form-check-label" for="destrictTypeConInjury">Injury</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="destrictTypeCon[]" id="destrictTypeConAdult" value="Adult Immunization">
                                                            <label class="form-check-label" for="destrictTypeConAdult">Adult Immunization</label>
                                                        </div>
                                                    </div>

                                                    <div class="leftCorner" style="width: 50%">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="destrictTypeCon[]" id="destrictTypeConFamily" value="Family Planning">
                                                            <label class="form-check-label" for="destrictTypeConFamily">Family Planning</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="destrictTypeCon[]" id="destrictTypeConPostpartum" value="Postpartum">
                                                            <label class="form-check-label" for="destrictTypeConPostpartum">Postpartum</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="destrictTypeCon[]" id="destrictTypeConTuberCulosis" value="TuberCulosis">
                                                            <label class="form-check-label" for="destrictTypeConTuberCulosis">TuberCulosis</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="destrictTypeCon[]" id="destrictTypeConChildIm" value="Child Immunization">
                                                            <label class="form-check-label" for="destrictTypeConChildIm">Child Immunization</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="destrictTypeCon[]" id="destrictTypeConSick" value="Sick Children">
                                                            <label class="form-check-label" for="destrictTypeConSick">Sick Children</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="destrictTypeCon[]" id="destrictTypeConFirecracker" value="Firecracker Injury">
                                                            <label class="form-check-label" for="destrictTypeConFirecracker">Firecracker Injury</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="grpField" style="width: 50%">
                                            <div class="col-12">
                                                <label for="destrictChiefComp" class="col-sm-12 col-form-label">Chief Complaints</label>
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Address" id="destrictChiefComp" style="height: 275px; width: 100%;"></textarea>
                                                    <label for="destrictChiefComp">Complaints</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Follow Up II.</span>
                            </div>
                            <div class="inputArea">
                                <div class="columnGroup"> 
                                    <div class="columnCon" style="gap: 5px!important">

                                        <div class="column mb-3">
                                            <label for="destrictDiagnosis" class="col-sm-12 col-form-label">Diagnosis</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="destrictDiagnosis" name="destrictDiagnosis">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="destrictMedication" class="col-sm-12 col-form-label">Medication Treatment</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="destrictMedication" name="destrictMedication">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="destrictLaboratory" class="col-sm-12 col-form-label">Laboratory Findings / Impression</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="destrictLaboratory" name="destrictLaboratory">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="destrictHealthCare" class="col-sm-12 col-form-label">Name of Health Care Provider</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="destrictHealthCare" name="destrictHealthCare">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="destrictLaboratory" class="col-sm-12 col-form-label">Performed Laboratory Test</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="destrictLaboratory" name="destrictLaboratory">
                                            </div>
                                        </div>

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
    </div><!-- End OF SIDE A-->


</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    //CLIENT SELECT
    $(document).ready(function() {
        $('#inputDestrictName').select2({
            placeholder: "Choose...",
            allowClear: true
        });

        // Initialize Select2 on modal show
        $('#ExtralargeModal').on('shown.bs.modal', function () {
            $('#inputDestrictName').select2({
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


    document.addEventListener('DOMContentLoaded', function() {
        const otherRadio = document.getElementById('destrictFamOther');
        const otherFieldContainer = document.getElementById('otherFieldContainer');
        
        function toggleOtherField() {
            if (otherRadio.checked) {
                otherFieldContainer.style.display = 'block';
            } else {
                otherFieldContainer.style.display = 'none';
            }
        }
        
        // Initialize the visibility based on the current state of the radio button
        toggleOtherField();
        
        // Add event listeners to all radio buttons with the name "destrictFam"
        document.querySelectorAll('input[name="destrictFam"]').forEach(function(radio) {
            radio.addEventListener('change', toggleOtherField);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const otherRadio = document.getElementById('destrictIfMemOther');
        const otherFieldContainer = document.getElementById('otherFieldMemContainer');
        
        function toggleOtherField() {
            if (otherRadio.checked) {
                otherFieldContainer.style.display = 'block';
            } else {
                otherFieldContainer.style.display = 'none';
            }
        }
        
        // Initialize the visibility based on the current state of the radio button
        toggleOtherField();
        
        // Add event listeners to all radio buttons with the name "destrictFam"
        document.querySelectorAll('input[name="destrictIfMem"]').forEach(function(radio) {
            radio.addEventListener('change', toggleOtherField);
        });
    });
</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>