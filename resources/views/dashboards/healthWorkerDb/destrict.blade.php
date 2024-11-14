@include('layouts.headHealthWorkers')
<style>
    .card-body {
        overflow: auto;
    }
    
    .pagetitle {
        display: flex;
        justify-content: space-between;
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

    .row {
        padding: 10px;
    }

    .rowCon {
        width: 32.8%;
        padding: 10px;
    }

    .rowConWhole {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 40px;
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
                    @foreach($destrict as $index => $destricts)
                    <tr>
                        <td style="display: none;">{{ $destricts->des_id }}</td>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $destricts->resident->res_lname }}, {{ $destricts->resident->res_fname }} {{ $destricts->resident->res_mname ?? '' }} {{ $destricts->resident->res_suffix ?? '' }}</td>
                        <td>{{ $destricts->resident->res_bdate}}</td>
                        <td>{{ $destricts->resident->res_sex }}</td>
                        <td>{{ $destricts->resident->res_purok }}</td>
                        <td>{{ $destricts->des_status }}</td>
                        <td>
                            <a href="{{ route('destForm', ['des_id' => $destricts->des_id]) }}" class="btn btn-primary">View</a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" type="button" onclick="openEditModal({{ $destricts->des_id }})">Edit</button></li>
                                    <li><button class="dropdown-item" type="button" onclick="updateDstbStatus({{ $destricts->des_id }}, 'Archive')">Archive</button></li>
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
                    <h5 class="modal-title">Destrict Refferal Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Horizontal Form -->
                <form method="POST" action="{{route('regValidation.desInput')}}" class="desInput" id="desInput" autocomplete="off"> 
                    @csrf
                    <div class="modal-body">
                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Patient Information I.</span>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6 pt-2">
                                    <label for="desFullName" class="form-label">Patient Full Name</label>
                                    <select id="desFullName" class="form-control" name="desFullName" onchange="updateResidentDetails(this)">
                                        <option value="">Select...</option>
                                        @foreach($residents as $resident)
                                            <option value="{{ $resident->res_id }}">
                                                {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text desFullName_error"></span>
                                </div>

                                <div class="col-md-6">
                                    <label for="destrictBdate" class="col-sm-5 col-form-label">Birthdate</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control shortField" id="destrictBdate" name="destrictBdate" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="destrictAge" class="col-sm-5 col-form-label">Age</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control briefField" id="destrictAge" name="destrictAge" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="destrictAddress" class="col-sm-8 col-form-label">Address</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="destrictAddress" name="destrictAddress" readonly>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        {{-- <div class="inputGroupContainer">
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
                        </div> --}}

                        <div class="rowConWhole">
                            <div class="inputGroupContainer" style="width: 668.01px;">
                                <div class="titleCaseFinding">
                                    <span>For CHU / RHU Personnel Only</span>
                                </div>
                                <div class="inputArea">
                                    <div class="rowFirst columnGroup familyPlaningCon"> 
                                        
                                        <div class="row g-3">
                                            <fieldset class="col-md-12">
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

                                            <div class="col-md-6">
                                                <label for="destrictDateConsult" class="col-sm-8 col-form-label">Date of Consultation</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control" id="destrictDateConsult" name="destrictDateConsult">
                                                </div>
                                            </div>

                                            <div class="col-md-6">   {{--MUST HAVE AM OR PM VALIDATION--}}
                                                <label for="destrictTimeConsult" class="col-sm-8 col-form-label">Consultation Time</label>
                                                <div class="col-sm-12">
                                                    <input type="time" class="form-control" id="destrictTimeConsult" name="destrictTimeConsult">
                                                </div>
                                            </div>

                                            <div class="row g-3">
                                                <div class="col-md-3">
                                                    <label for="destrictBloodPressure" class="col-sm-8 col-form-label">BP</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control briefField" id="destrictBloodPressure" name="destrictBloodPressure">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="destrictTemp" class="col-sm-8 col-form-label">Temp</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control briefField" id="destrictTemp" name="destrictTemp">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="destrictHeight" class="col-sm-8 col-form-label">Height</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control briefField" id="destrictHeight" name="destrictHeight">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="destrictWeight" class="col-sm-8 col-form-label">Weight</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control briefField" id="destrictWeight" name="destrictWeight">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
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
                            <div class="inputGroupContainer" style="width: 668.01px;">
                                <div class="titleCaseFinding">
                                    <span>For REFFERAL Transaction Only</span>
                                </div>
                            
                                <div class="row g-3">

                                    <div class="col-md-12">
                                        <label for="destrictRefFrom" class="col-sm-12 col-form-label">Reffered From</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="destrictRefFrom" name="destrictRefFrom">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="destrictRefTo" class="col-sm-12 col-form-label">Reffered To</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="destrictRefTo" name="destrictRefTo">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="destrictReasonRef" class="col-sm-12 col-form-label">Reasons For Refferal</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="destrictReasonRef" name="destrictReasonRef">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="destrictRefBy" class="col-sm-12 col-form-label">Reffered By</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="destrictRefBy" name="destrictRefBy">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Follow Up I.</span>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-12">
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

                                    <fieldset class="row g-3">
                                        <legend class="col-form-label col-sm-12 pt-0">Signs & Symptoms</legend>
                                            <div class="col-md-3">
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

                                            <div class="col-md-3">
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
                                    </fieldset>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label for="destrictChiefComp" class="col-sm-12 col-form-label">Chief Complaints</label>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Complaint" name="destrictChiefComp" id="destrictChiefComp" style="height: 275px; width: 100%;"></textarea>
                                            <label for="destrictChiefComp">Complaints</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Follow Up II.</span>
                            </div>

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label for="destrictDiagnosis" class="col-sm-12 col-form-label">Diagnosis</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="destrictDiagnosis" name="destrictDiagnosis">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="destrictMedication" class="col-sm-12 col-form-label">Medication Treatment</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="destrictMedication" name="destrictMedication">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="destrictLaboratory" class="col-sm-12 col-form-label">Laboratory Findings / Impression</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="destrictLaboratory" name="destrictLaboratory">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="destrictHealthCare" class="col-sm-12 col-form-label">Name of Health Care Provider</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="destrictHealthCare" name="destrictHealthCare" value="{{ $LoggedUserInfo['em_id'] }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="destrictLabTest" class="col-sm-12 col-form-label">Performed Laboratory Test</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="destrictLabTest" name="destrictLabTest">
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
    </div><!-- End OF SIDE A-->
    
    <!--EDIT SIDE A -->
    <div class="modal fade" id="editFormModal" tabindex="-1">
        <div class="modal-dialog custom-modal-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Destrict Refferal Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Horizontal Form -->
                <form class="edit_desInput" id="edit_desInput" autocomplete="off"> 
                    @csrf
                    <div class="modal-body">

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Patient Information I.</span>
                            </div>
                            <div class="row g-3">
                                <input type="hidden" class="form-control shortField" id="edit_desId" name="edit_desId" readonly>
                                <div class="col-md-6 pt-2">
                                    <label for="edit_desFullName" class="form-label">Patient Full Name</label>
                                    <select id="edit_desFullName" class="form-control" name="edit_desFullName" onchange="updateResidentDetails(this)">
                                        <option value="">Select...</option>
                                        @foreach($residents as $resident)
                                            <option value="{{ $resident->res_id }}">
                                                {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text edit_desFullName_error"></span>
                                </div>

                                <div class="col-md-6">
                                    <label for="edit_destrictBdate" class="col-sm-5 col-form-label">Birthdate</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control shortField" id="edit_destrictBdate" name="edit_destrictBdate" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="edit_destrictAge" class="col-sm-5 col-form-label">Age</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control briefField" id="edit_destrictAge" name="edit_destrictAge" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="edit_destrictAddress" class="col-sm-8 col-form-label">Address</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="edit_destrictAddress" name="edit_destrictAddress" readonly>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="rowConWhole">
                            <div class="inputGroupContainer" style="width: 668.01px;">
                                <div class="titleCaseFinding">
                                    <span>For CHU / RHU Personnel Only</span>
                                </div>
                                <div class="inputArea">
                                    <div class="rowFirst columnGroup familyPlaningCon"> 
                                        
                                        <div class="row g-3">
                                            <fieldset class="col-md-12">
                                                <legend class="col-form-label col-sm-8 pt-0">Mode of Transaction</legend>
                                                <div class="col-sm-10">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_destrictTransaction" id="edit_destrictWalkIn" value="Walk-In">
                                                        <label class="form-check-label" for="edit_destrictWalkIn">Walk-In</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_destrictTransaction" id="edit_destrictVisited" value="Visited">
                                                        <label class="form-check-label" for="edit_destrictVisited">Visited</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="edit_destrictTransaction" id="edit_destrictReferral" value="Referral">
                                                        <label class="form-check-label" for="edit_destrictReferral">Referral</label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <div class="col-md-6">
                                                <label for="edit_destrictDateConsult" class="col-sm-8 col-form-label">Date of Consultation</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control" id="edit_destrictDateConsult" name="edit_destrictDateConsult">
                                                </div>
                                            </div>

                                            <div class="col-md-6">   {{--MUST HAVE AM OR PM VALIDATION--}}
                                                <label for="edit_destrictTimeConsult" class="col-sm-8 col-form-label">Consultation Time</label>
                                                <div class="col-sm-12">
                                                    <input type="time" class="form-control" id="edit_destrictTimeConsult" name="edit_destrictTimeConsult">
                                                </div>
                                            </div>

                                            <div class="row g-3">
                                                <div class="col-md-3">
                                                    <label for="edit_destrictBloodPressure" class="col-sm-8 col-form-label">BP</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="edit_destrictBloodPressure" name="edit_destrictBloodPressure">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="edit_destrictTemp" class="col-sm-8 col-form-label">Temp</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="edit_destrictTemp" name="edit_destrictTemp">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="edit_destrictHeight" class="col-sm-8 col-form-label">Height</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="edit_destrictHeight" name="edit_destrictHeight">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="edit_destrictWeight" class="col-sm-8 col-form-label">Weight</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="edit_destrictWeight" name="edit_destrictWeight">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="edit_destrictAttProv" class="col-sm-12 col-form-label">Name of Attending Provider</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="edit_destrictAttProv" name="edit_destrictAttProv">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>

                            {{-- FOR REFFERAL ONLY --}}
                            <div class="inputGroupContainer" style="width: 668.01px;">
                                <div class="titleCaseFinding">
                                    <span>For REFFERAL Transaction Only</span>
                                </div>
                            
                                <div class="row g-3">

                                    <div class="col-md-12">
                                        <label for="edit_destrictRefFrom" class="col-sm-12 col-form-label">Reffered From</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_destrictRefFrom" name="edit_destrictRefFrom">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="edit_destrictRefTo" class="col-sm-12 col-form-label">Reffered To</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_destrictRefTo" name="edit_destrictRefTo">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="edit_destrictReasonRef" class="col-sm-12 col-form-label">Reasons For Refferal</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_destrictReasonRef" name="edit_destrictReasonRef">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="edit_destrictRefBy" class="col-sm-12 col-form-label">Reffered By</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_destrictRefBy" name="edit_destrictRefBy">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Follow Up I.</span>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-8 pt-0">Nature Of Visit</legend>
                                        <div class="col-sm-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_destrictNatVis" id="edit_destrictNatVisCase" value="New Consultation/Case">
                                                <label class="form-check-label" for="edit_destrictNatVisCase">New Consultation/Case</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_destrictNatVis" id="edit_destrictNatVisAdmission" value="New Admission">
                                                <label class="form-check-label" for="edit_destrictNatVisAdmission">New Admission</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_destrictNatVis" id="edit_destrictNatVisFollow" value="Follow-Up Visit">
                                                <label class="form-check-label" for="edit_destrictNatVisFollow">Follow-Up Visit</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="row g-3">
                                        <legend class="col-form-label col-sm-12 pt-0">Signs & Symptoms</legend>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_destrictTypeCon[]" id="edit_destrictTypeConGeneral" value="General">
                                                    <label class="form-check-label" for="edit_destrictTypeConGeneral">General</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_destrictTypeCon[]" id="edit_destrictTypeConPrenatal" value="Prenatal">
                                                    <label class="form-check-label" for="edit_destrictTypeConPrenatal">Prenatal</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_destrictTypeCon[]" id="edit_destrictTypeConDental" value="Dental Care">
                                                    <label class="form-check-label" for="edit_destrictTypeConDental">Dental Care</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_destrictTypeCon[]" id="edit_destrictTypeConChild" value="Child Care">
                                                    <label class="form-check-label" for="edit_destrictTypeConChild">Child Care</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_destrictTypeCon[]" id="edit_destrictTypeConNutrition" value="Child Nutrition">
                                                    <label class="form-check-label" for="edit_destrictTypeConNutrition">Child Nutrition</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_destrictTypeCon[]" id="edit_destrictTypeConInjury" value="Injury">
                                                    <label class="form-check-label" for="edit_destrictTypeConInjury">Injury</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_destrictTypeCon[]" id="edit_destrictTypeConAdult" value="Adult Immunization">
                                                    <label class="form-check-label" for="edit_destrictTypeConAdult">Adult Immunization</label>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_destrictTypeCon[]" id="edit_destrictTypeConFamily" value="Family Planning">
                                                    <label class="form-check-label" for="edit_destrictTypeConFamily">Family Planning</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_destrictTypeCon[]" id="edit_destrictTypeConPostpartum" value="Postpartum">
                                                    <label class="form-check-label" for="edit_destrictTypeConPostpartum">Postpartum</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_destrictTypeCon[]" id="edit_destrictTypeConTuberCulosis" value="TuberCulosis">
                                                    <label class="form-check-label" for="edit_destrictTypeConTuberCulosis">TuberCulosis</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_destrictTypeCon[]" id="edit_destrictTypeConChildIm" value="Child Immunization">
                                                    <label class="form-check-label" for="edit_destrictTypeConChildIm">Child Immunization</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_destrictTypeCon[]" id="edit_destrictTypeConSick" value="Sick Children">
                                                    <label class="form-check-label" for="edit_destrictTypeConSick">Sick Children</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_destrictTypeCon[]" id="edit_destrictTypeConFirecracker" value="Firecracker Injury">
                                                    <label class="form-check-label" for="edit_destrictTypeConFirecracker">Firecracker Injury</label>
                                                </div>
                                            </div>
                                    </fieldset>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label for="edit_destrictChiefComp" class="col-sm-12 col-form-label">Chief Complaints</label>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Complaints" name="edit_destrictChiefComp" id="edit_destrictChiefComp" style="height: 275px; width: 100%;"></textarea>
                                            <label for="edit_destrictChiefComp">Complaints</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Follow Up II.</span>
                            </div>

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label for="edit_destrictDiagnosis" class="col-sm-12 col-form-label">Diagnosis</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="edit_destrictDiagnosis" name="edit_destrictDiagnosis">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="edit_destrictMedication" class="col-sm-12 col-form-label">Medication Treatment</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="edit_destrictMedication" name="edit_destrictMedication">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="edit_destrictLaboratory" class="col-sm-12 col-form-label">Laboratory Findings / Impression</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="edit_destrictLaboratory" name="edit_destrictLaboratory">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="edit_destrictHealthCare" class="col-sm-12 col-form-label">Name of Health Care Provider</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="edit_destrictHealthCare" name="edit_destrictHealthCare" value="{{ $LoggedUserInfo['em_id'] }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="edit_destrictLabTest" class="col-sm-12 col-form-label">Performed Laboratory Test</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="edit_destrictLabTest" name="edit_destrictLabTest">
                                    </div>
                                </div>

                                <div class="col-md-6 pt-2">
                                    <label for="edit_desStatus" class="form-label">Status</label>
                                    <div class="col-sm-12">
                                        <select id="edit_desStatus" class="form-select" name="edit_desStatus">
                                            <option disabled selected>Choose...</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Archive">Archive</option>
                                        </select>
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
    </div><!-- End OF SIDE A-->

</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script type="text/javascript">
    // Initialize resident data from PHP
    var residentData = @json($residents);
</script>
<script>
    //Patient Name
    $(document).ready(function () {
        $('#desFullName').selectize({
            sortField: 'text'
        });
    });

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
                document.getElementById('destrictAddress').value = residentInfo.res_address;
                document.getElementById('destrictBdate').value = residentInfo.res_bdate;

                // Calculate age from the birth date
                const birthDate = new Date(residentInfo.res_bdate);
                const age = calculateAge(birthDate);
                document.getElementById('destrictAge').value = age;
            }
        } else {
            // Clear fields if no resident is selected
            document.getElementById('destrictAddress').value = '';
            document.getElementById('destrictBdate').value = '';
            document.getElementById('destrictAge').value = '';
        }
    }



//insert destrict
    $(function(){      
        $("#desInput").on('submit', function(e){
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
                        $('#desInput')[0].reset();

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
                            Failed to add Destrict Record. Please try again. 
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
//display destrict
    function openEditModal(des_id) {
        $.ajax({
            url: `/destrict/${des_id}`,
            method: 'GET',
            success: function(response) {
                if (response.status === 1) 
                {       
                    $('#edit_desId').val(response.data.des_id);
                    //patient info
                        let fullName = `${response.data.resident.res_lname}, ${response.data.resident.res_fname} ${response.data.resident.res_mname ?? ''} ${response.data.resident.res_suffix ?? ''}`;
                        $('#edit_desFullName').val(response.data.resident.res_id);
                        $('#edit_destrictBdate').val(response.data.resident.res_bdate);
                        let birthDate = new Date(response.data.resident.res_bdate);
                        let age = calculateAge(birthDate);
                        $('#edit_destrictAge').val(age);
                        $('#edit_destrictAddress').val(response.data.resident.res_address);
                        $('#edit_destrictDateConsult').val(response.data.des_dateConsult);
                        $('#edit_destrictTimeConsult').val(response.data.des_consultTime);
                        $('#edit_destrictBloodPressure').val(response.data.des_bp);
                        $('#edit_destrictTemp').val(response.data.des_temp);
                        $('#edit_destrictHeight').val(response.data.des_ht);
                        $('#edit_destrictWeight').val(response.data.des_wt);
                        $('#edit_destrictAttProv').val(response.data.des_attProvider);
                        $('#edit_destrictRefFrom').val(response.data.des_refFrom);
                        $('#edit_destrictRefTo').val(response.data.des_refTo);
                        $('#edit_destrictReasonRef').val(response.data.des_refReason);
                        $('#edit_destrictRefBy').val(response.data.des_refBy);
                        $('#edit_destrictChiefComp').val(response.data.des_complaint);
                        $('#edit_destrictDiagnosis').val(response.data.des_diagnosis);
                        $('#edit_destrictMedication').val(response.data.des_medTreatment);
                        $('#edit_destrictLaboratory').val(response.data.des_labFindings);
                        $('#edit_destrictHealthCare').val(response.data.em_id);
                        $('#edit_destrictLabTest').val(response.data.des_perfLabTest);
                        $('#edit_desStatus').val(response.data.des_status);
                    // radio
                        let transaction = response.data.des_modTrans;
                            $('#edit_destrictWalkIn').prop('checked', false);
                            $('#edit_destrictVisited').prop('checked', false);
                            $('#edit_destrictReferral').prop('checked', false);
                            if (transaction === 'Walk-In') 
                            {
                                $('#edit_destrictWalkIn').prop('checked', true);
                            } 
                            else if (transaction === 'Visited') 
                            {
                                $('#edit_destrictVisited').prop('checked', true);
                            }
                            else if (transaction === 'Referral') 
                            {
                                $('#edit_destrictReferral').prop('checked', true);
                            }
                        let visit = response.data.des_natVisit;
                            $('#edit_destrictNatVisCase').prop('checked', false);
                            $('#edit_destrictNatVisAdmission').prop('checked', false);
                            $('#edit_destrictNatVisFollow').prop('checked', false);
                            if (visit === 'New Consultation/Case') 
                            {
                                $('#edit_destrictNatVisCase').prop('checked', true);
                            } 
                            else if (visit === 'New Admission') 
                            {
                                $('#edit_destrictNatVisAdmission').prop('checked', true);
                            }
                            else if (visit === 'Follow-Up Visit') 
                            {
                                $('#edit_destrictNatVisFollow').prop('checked', true);
                            }
                    // checkbox
                        if (response.data.des_signSymp) 
                        {
                            let signSymp = JSON.parse(response.data.des_signSymp);
                            $('input[name="edit_destrictTypeCon[]"]').prop('checked', false);
                            
                            signSymp.forEach(function(value) 
                            {
                                $('input[name="edit_destrictTypeCon[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_destrictTypeCon[]"]').prop('checked', false);
                        }

                    // Open the modal
                        $('#editFormModal').modal('show');
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

//update destrict
    $(document).on('submit', '#edit_desInput', function (e) {
        e.preventDefault(); // Prevent default form submission behavior

        var des_id = $('#edit_desId').val(); // Assuming the ID is based on the selected resident's full name

        // Create a FormData object with the form fields
            var formData = new FormData();
            formData.append('edit_desId', des_id);
            formData.append('edit_desFullName', $('#edit_desFullName').val());
            formData.append('edit_destrictDateConsult', $('#edit_destrictDateConsult').val());
            formData.append('edit_destrictTimeConsult', $('#edit_destrictTimeConsult').val());
            formData.append('edit_destrictBloodPressure', $('#edit_destrictBloodPressure').val());
            formData.append('edit_destrictTemp', $('#edit_destrictTemp').val());
            formData.append('edit_destrictHeight', $('#edit_destrictHeight').val());
            formData.append('edit_destrictWeight', $('#edit_destrictWeight').val());
            formData.append('edit_destrictAttProv', $('#edit_destrictAttProv').val());
            formData.append('edit_destrictRefFrom', $('#edit_destrictRefFrom').val());
            formData.append('edit_destrictRefTo', $('#edit_destrictRefTo').val());
            formData.append('edit_destrictReasonRef', $('#edit_destrictReasonRef').val());
            formData.append('edit_destrictRefBy', $('#edit_destrictRefBy').val());
            formData.append('edit_destrictChiefComp', $('#edit_destrictChiefComp').val());
            formData.append('edit_destrictDiagnosis', $('#edit_destrictDiagnosis').val());
            formData.append('edit_destrictMedication', $('#edit_destrictMedication').val());
            formData.append('edit_destrictLaboratory', $('#edit_destrictLaboratory').val());
            formData.append('edit_destrictHealthCare', $('#edit_destrictHealthCare').val());
            formData.append('edit_destrictLabTest', $('#edit_destrictLabTest').val());
            formData.append('edit_desStatus', $('#edit_desStatus').val());
        // FOR RADIO BUTTONS (edit_referPhMem, edit_referPhDep, edit_referPhPri)
            var transaction = $('input[name="edit_destrictTransaction"]:checked').val();
            if (transaction) {
                formData.append('edit_destrictTransaction', transaction);
            }

            var visit = $('input[name="edit_destrictNatVis"]:checked').val();
            if (visit) {
                formData.append('edit_destrictNatVis', visit);
            }
        
        //  FOR CHECKBOX
            var checkSigns = [];
                    $('input[name="edit_destrictTypeCon[]"]:checked').each(function() {
                        checkSigns.push($(this).val());
                    });
                    
                    if (checkSigns.length > 0) {
                        formData.append('edit_destrictTypeCon', JSON.stringify(checkSigns));
                    } else {
                        formData.append('edit_destrictTypeCon', JSON.stringify([])); 
                    }
        // Send the AJAX request
        $.ajax({
            type: "POST",
            url: "/updateDes/" + des_id, // URL to handle the update
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
                } 
                else if (response.status === 404) {
                    $('#alert-container3').html(`
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i> Destrict Record Not Found.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                } 
                else {
                    $('#alert-container3').html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i> Destrict record updated successfully!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                    
                    location.reload(); // Reload the page to reflect changes
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error response for debugging
                alert("An error occurred. Please check the console for more details.");
            }
        });
    });



//*******************************************************
    // document.addEventListener('DOMContentLoaded', function() {
    //     const otherRadio = document.getElementById('destrictFamOther');
    //     const otherFieldContainer = document.getElementById('otherFieldContainer');
        
    //     function toggleOtherField() {
    //         if (otherRadio.checked) {
    //             otherFieldContainer.style.display = 'block';
    //         } else {
    //             otherFieldContainer.style.display = 'none';
    //         }
    //     }

    //     toggleOtherField();

    //     document.querySelectorAll('input[name="destrictFam"]').forEach(function(radio) {
    //         radio.addEventListener('change', toggleOtherField);
    //     });
    // });

    // document.addEventListener('DOMContentLoaded', function() {
    //     const otherRadio = document.getElementById('destrictIfMemOther');
    //     const otherFieldContainer = document.getElementById('otherFieldMemContainer');
        
    //     function toggleOtherField() {
    //         if (otherRadio.checked) {
    //             otherFieldContainer.style.display = 'block';
    //         } else {
    //             otherFieldContainer.style.display = 'none';
    //         }
    //     }

    //     toggleOtherField();

    //     document.querySelectorAll('input[name="destrictIfMem"]').forEach(function(radio) {
    //         radio.addEventListener('change', toggleOtherField);
    //     });
    // });
</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>