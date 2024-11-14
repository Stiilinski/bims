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
        background-color: #acabab;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
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
        gap: 6px;
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

    .row {
        padding: 10px;
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
        padding: 10px;
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        justify-content: flex-start;

    }

    .rowCon {
        width: 32.8%;
        /* border: #dee2e6 solid 1px; */
        padding: 10px;
    }

    .rowConWhole {
        width: 100%;
        /* border: #dee2e6 solid 1px; */
        padding: 10px;
    }

    .additionalCon {
        width: 90%;
        display: flex;
        flex-direction: column;
        /* border: #dee2e6 solid 1px; */
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
        <h1>R.H.U Referral</h1>
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
                    @foreach($rhu as $index => $rhus)
                    <tr>
                        <td style="display: none;">{{ $rhus->rhu_id }}</td>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $rhus->resident->res_lname }}, {{ $rhus->resident->res_fname }} {{ $rhus->resident->res_mname ?? '' }} {{ $rhus->resident->res_suffix ?? '' }}</td>
                        <td>{{ $rhus->resident->res_bdate}}</td>
                        <td>{{ $rhus->resident->res_sex }}</td>
                        <td>{{ $rhus->resident->res_purok }}</td>
                        <td>{{ $rhus->rhu_status }}</td>
                        <td>
                            <a href="{{ route('rhuForm', ['rhu_id' => $rhus->rhu_id]) }}" class="btn btn-primary">View</a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" type="button" onclick="openEditModal({{ $rhus->rhu_id }})">Edit</button></li>
                                    {{-- <li><button class="dropdown-item" type="button" onclick="updateDstbStatus({{ $rhus->rhu_id }}, 'Archive')">Archive</button></li> --}}
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
                    <h5 class="modal-title">Rural Health Unit Refferal Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{route('regValidation.rhuInput')}}" class="rhuInput" id="rhuInput" autocomplete="off"> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="inputArea">
                            <div class="rowFirst columnGroup familyPlaningCon"> 
                                <div class="inputGroupContainer">
                                    <div class="titleCaseFinding">
                                        <span>Personal Information</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-5 pt-2">
                                            <label for="rhuFullName" class="form-label">Patient Full Name</label>
                                            <select id="rhuFullName" class="form-control" name="rhuFullName" onchange="updateResidentDetails(this)">
                                                <option value="">Select...</option>
                                                @foreach($residents as $resident)
                                                    <option value="{{ $resident->res_id }}">
                                                        {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text rhuFullName_error"></span>
                                        </div>
                                        <div class="col-md-1">
                                            <label for="referAge" class="col-sm-5 col-form-label">Age</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control briefField" id="referAge" name="referAge" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="referDob" class="col-sm-8 col-form-label">Date of Birth</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" id="referDob" name="referDob" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="referGender" class="col-sm-8 col-form-label">Gender</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="referGender" name="referGender" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="referCivil" class="col-sm-8 col-form-label">Status</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control mediumField" id="referCivil" name="referCivil" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="referAddress" class="col-sm-8 col-form-label">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="referAddress" name="referAddress" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="referEa" class="col-sm-8 col-form-label">Education Attainment</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="referEa" name="referEa" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="inputGroupContainer">
                                    <div class="titleCaseFinding">
                                        <span>Referred Information</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="referFnum" class="col-sm-8 col-form-label">Family #</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="referFnum" name="referFnum">
                                                <span class="text-danger error-text referFnum_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="referFrom" class="col-sm-8 col-form-label">Referred From</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="referFrom" name="referFrom" value="{{$LoggedUserInfo['em_id']}}">
                                                <span class="text-danger error-text referFrom_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="referTo" class="col-sm-8 col-form-label">Referred To</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="referTo" name="referTo">
                                                <span class="text-danger error-text referTo_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="referSubFind" class="col-sm-8 col-form-label">Subjective Findings</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="referSubFind" name="referSubFind">
                                                <span class="text-danger error-text referSubFind_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="inputGroupContainer">
                                    <div class="titleCaseFinding">
                                        <span>PhilHealth Information</span>
                                    </div>
                                    <div class="rowCon" style="width: 100%">
                                        <fieldset class="row mb-3" style="width: 30%; justify-content: space-between; flex-wrap:wrap">
                                            <legend class="col-form-label col-sm-5 pt-0" style="font-size: 14px;">PhilHealth Member:</legend>
                                            <div class="col-sm-5">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="referPhMem" id="referPhMemYes" value="Yes">
                                                    <label class="form-check-label" for="referPhMemYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="referPhMem" id="referPhMemNo" value="No">
                                                    <label class="form-check-label" for="referPhMemNo">No</label>
                                                </div>
                                                <span class="text-danger error-text referPhMem_error"></span>
                                            </div>
                                        </fieldset>

                                        <fieldset class="row mb-3" style="width: 30%; justify-content: space-between; flex-wrap:wrap">
                                            <legend class="col-form-label col-sm-5 pt-0" style="font-size: 14px;">Dependent:</legend>
                                            <div class="col-sm-5">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="referPhDep" id="referPhDepYes" value="Yes">
                                                    <label class="form-check-label" for="referPhDepYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="referPhDep" id="referPhDepNo" value="No">
                                                    <label class="form-check-label" for="referPhDepNo">No</label>
                                                    <span class="text-danger error-text referPhDep_error"></span>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="row mb-3" style="width: 30%; justify-content: space-between; flex-wrap:wrap">
                                            <legend class="col-form-label col-sm-5 pt-0" style="font-size: 14px;">Private/Indigent:</legend>
                                            <div class="col-sm-5">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="referPhPri" id="referPhPriYes" value="Yes">
                                                    <label class="form-check-label" for="referPhPriYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="referPhPri" id="referPhPriNo" value="No">
                                                    <label class="form-check-label" for="referPhPriNo">No</label>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <div class="column mb-3 d-flex">
                                            <label for="referPhic" class="col-sm-2 col-form-label">PHIC #</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="referPhic" name="referPhic">
                                                <span class="text-danger error-text referPhic_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="inputGroupContainer">
                                    <div class="titleCaseFinding">
                                        <span>Objective Findings</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-2">
                                            <label for="referTemp" class="col-sm-5 col-form-label">Temp</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="referTemp" name="referTemp">
                                                <span class="text-danger error-text referTemp_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="referPulse" class="col-sm-8 col-form-label">Pulse Rate</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control shortField" id="referPulse" name="referPulse" >
                                                <span class="text-danger error-text referPulse_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="referResp" class="col-sm-8 col-form-label">Respiratory Rate</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control shortField" id="referResp" name="referResp">
                                                <span class="text-danger error-text referResp_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="referBp" class="col-sm-8 col-form-label">Blood Pressure</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control shortField" id="referBp" name="referBp">
                                                <span class="text-danger error-text referBp_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="referWeight" class="col-sm-5 col-form-label">Weight</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control shortField" id="referWeight" name="referWeight">
                                                <span class="text-danger error-text referWeight_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="referReason" class="col-sm-12 col-form-label">Reason for Referral</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control longField" id="referReason" name="referReason">
                                                <span class="text-danger error-text referReason_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="referDiagnosis" class="col-sm-5 col-form-label">Diagnosis</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control longField" id="referDiagnosis" name="referDiagnosis">
                                                <span class="text-danger error-text referDiagnosis_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="referTreatment" class="col-sm-5 col-form-label">Treatment</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control longField" id="referTreatment" name="referTreatment">
                                                <span class="text-danger error-text referTreatment_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="referRfngLvl" class="col-sm-8 col-form-label">Referring Level</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="referRfngLvl" name="referRfngLvl">
                                                <span class="text-danger error-text referRfngLvl_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="referRfLvl" class="col-sm-8 col-form-label">Refered Level</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="referRfLvl" name="referRfLvl">
                                                <span class="text-danger error-text referRfLvl_error"></span>
                                            </div>
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
    </div><!-- End OF SIDE A-->

    <!-- SIDE A -->
    <div class="modal fade" id="editRhuModal" tabindex="-1">
        <div class="modal-dialog custom-modal-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT Rural Health Unit Refferal Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="edit_rhuInput" id="edit_rhuInput" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="inputArea">
                            <div class="rowFirst columnGroup familyPlaningCon"> 
                                <div class="inputGroupContainer">
                                    <div class="titleCaseFinding">
                                        <span>Personal Information</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-4 pt-2">
                                            <input type="hidden" name="edit_referId" id="edit_referId">
                                            <label for="edit_rhuFullName" class="form-label">Patient Full Name</label>
                                            <select id="edit_rhuFullName" class="form-control" name="edit_rhuFullName" onchange="updateResidentDetails(this)">
                                                <option value="">Select...</option>
                                                @foreach($residents as $resident)
                                                    <option value="{{ $resident->res_id }}">
                                                        {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text edit_rhuFullName_error"></span>
                                        </div>
                                        <div class="col-md-1">
                                            <label for="edit_referAge" class="col-sm-5 col-form-label">Age</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control briefField" id="edit_referAge" name="edit_referAge" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_referDob" class="col-sm-8 col-form-label">Date of Birth</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" id="edit_referDob" name="edit_referDob" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_referGender" class="col-sm-8 col-form-label">Gender</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_referGender" name="edit_referGender" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_referCivil" class="col-sm-8 col-form-label">Status</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control mediumField" id="edit_referCivil" name="edit_referCivil" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_referAddress" class="col-sm-8 col-form-label">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_referAddress" name="edit_referAddress" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_referEa" class="col-sm-8 col-form-label">Education Attainment</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_referEa" name="edit_referEa" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="inputGroupContainer">
                                    <div class="titleCaseFinding">
                                        <span>Referred Information</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="edit_referFnum" class="col-sm-8 col-form-label">Family #</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_referFnum" name="edit_referFnum">
                                                <span class="text-danger error-text edit_referFnum_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_referFrom" class="col-sm-8 col-form-label">Referred From</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_referFrom" name="edit_referFrom" value="{{$LoggedUserInfo['em_id']}}">
                                                <span class="text-danger error-text edit_referFrom_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_referTo" class="col-sm-8 col-form-label">Referred To</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_referTo" name="edit_referTo">
                                                <span class="text-danger error-text edit_referTo_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_referSubFind" class="col-sm-8 col-form-label">Subjective Findings</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_referSubFind" name="edit_referSubFind">
                                                <span class="text-danger error-text edit_referSubFind_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="inputGroupContainer">
                                    <div class="titleCaseFinding">
                                        <span>PhilHealth Information</span>
                                    </div>
                                    <div class="rowCon" style="width: 100%">
                                        <fieldset class="row mb-3" style="width: 30%; justify-content: space-between; flex-wrap:wrap">
                                            <legend class="col-form-label col-sm-5 pt-0" style="font-size: 14px;">PhilHealth Member:</legend>
                                            <div class="col-sm-5">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_referPhMem" id="edit_referPhMemYes" value="Yes">
                                                    <label class="form-check-label" for="edit_referPhMemYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_referPhMem" id="edit_referPhMemNo" value="No">
                                                    <label class="form-check-label" for="edit_referPhMemNo">No</label>
                                                </div>
                                                <span class="text-danger error-text edit_referPhMem_error"></span>
                                            </div>
                                        </fieldset>

                                        <fieldset class="row mb-3" style="width: 30%; justify-content: space-between; flex-wrap:wrap">
                                            <legend class="col-form-label col-sm-5 pt-0" style="font-size: 14px;">Dependent:</legend>
                                            <div class="col-sm-5">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_referPhDep" id="edit_referPhDepYes" value="Yes">
                                                    <label class="form-check-label" for="edit_referPhDepYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_referPhDep" id="edit_referPhDepNo" value="No">
                                                    <label class="form-check-label" for="edit_referPhDepNo">No</label>
                                                    <span class="text-danger error-text edit_referPhDep_error"></span>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="row mb-3" style="width: 30%; justify-content: space-between; flex-wrap:wrap">
                                            <legend class="col-form-label col-sm-5 pt-0" style="font-size: 14px;">Private/Indigent:</legend>
                                            <div class="col-sm-5">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_referPhPri" id="edit_referPhPriYes" value="Yes">
                                                    <label class="form-check-label" for="edit_referPhPriYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_referPhPri" id="edit_referPhPriNo" value="No">
                                                    <label class="form-check-label" for="edit_referPhPriNo">No</label>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <div class="column mb-3 d-flex">
                                            <label for="edit_referPhic" class="col-sm-2 col-form-label">PHIC #</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="edit_referPhic" name="edit_referPhic">
                                                <span class="text-danger error-text edit_referPhic_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="inputGroupContainer">
                                    <div class="titleCaseFinding">
                                        <span>Objective Findings</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-2">
                                            <label for="edit_referTemp" class="col-sm-5 col-form-label">Temp</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_referTemp" name="edit_referTemp">
                                                <span class="text-danger error-text edit_referTemp_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_referPulse" class="col-sm-8 col-form-label">Pulse Rate</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control shortField" id="edit_referPulse" name="edit_referPulse" >
                                                <span class="text-danger error-text edit_referPulse_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_referResp" class="col-sm-8 col-form-label">Respiratory Rate</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control shortField" id="edit_referResp" name="edit_referResp">
                                                <span class="text-danger error-text edit_referResp_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_referBp" class="col-sm-8 col-form-label">Blood Pressure</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control shortField" id="edit_referBp" name="edit_referBp">
                                                <span class="text-danger error-text edit_referBp_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_referWeight" class="col-sm-5 col-form-label">Weight</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control shortField" id="edit_referWeight" name="edit_referWeight">
                                                <span class="text-danger error-text edit_referWeight_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_referReason" class="col-sm-12 col-form-label">Reason for Referral</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control longField" id="edit_referReason" name="edit_referReason">
                                                <span class="text-danger error-text edit_referReason_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_referDiagnosis" class="col-sm-5 col-form-label">Diagnosis</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control longField" id="edit_referDiagnosis" name="edit_referDiagnosis">
                                                <span class="text-danger error-text edit_referDiagnosis_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_referTreatment" class="col-sm-5 col-form-label">Treatment</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control longField" id="edit_referTreatment" name="edit_referTreatment">
                                                <span class="text-danger error-text edit_referTreatment_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_referRfngLvl" class="col-sm-8 col-form-label">Referring Level</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_referRfngLvl" name="edit_referRfngLvl">
                                                <span class="text-danger error-text edit_referRfngLvl_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_referRfLvl" class="col-sm-8 col-form-label">Refered Level</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_referRfLvl" name="edit_referRfLvl">
                                                <span class="text-danger error-text edit_referRfLvl_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_referStatus" class="form-label">Status</label>
                                            <div class="col-sm-12">
                                                <select id="edit_referStatus" class="form-select" name="edit_referStatus">
                                                    <option disabled selected>Choose...</option>
                                                    <option value="Completed">Completed</option>
                                                    <option value="Archive">Archive</option>
                                                </select>
                                            </div>
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
//CLIENT SELECT
    $(document).ready(function () {
        $('#rhuFullName').selectize({
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
                document.getElementById('referAddress').value = residentInfo.res_address;
                document.getElementById('referDob').value = residentInfo.res_bdate;

                // Calculate age from the birth date
                const birthDate = new Date(residentInfo.res_bdate);
                const age = calculateAge(birthDate);
                document.getElementById('referAge').value = age;

                document.getElementById('referGender').value = residentInfo.res_sex;
                document.getElementById('referCivil').value = residentInfo.res_civil;
                // document.getElementById('referEa').value = residentInfo.res_occupation;
            }
        } else {
            // Clear fields if no resident is selected
            document.getElementById('referAddress').value = '';
            document.getElementById('referDob').value = '';
            document.getElementById('referAge').value = '';
            document.getElementById('referGender').value = '';
            document.getElementById('referCivil').value = '';
            // document.getElementById('rhuOcc').value = '';
        }
    }

//insert rhu
    $(function(){      
        $("#rhuInput").on('submit', function(e){
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
                        $('#rhuInput')[0].reset();

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
                            Failed to add RHU Record. Please try again. 
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
    function openEditModal(rhu_id) {
        $.ajax({
            url: `/rhu/${rhu_id}`,
            method: 'GET',
            success: function(response) {
                if (response.status === 1) 
                {       
                    $('#edit_referId').val(response.data.rhu_id);
                    //patient info
                        let fullName = `${response.data.resident.res_lname}, ${response.data.resident.res_fname} ${response.data.resident.res_mname ?? ''} ${response.data.resident.res_suffix ?? ''}`;
                        $('#edit_rhuFullName').val(response.data.resident.res_id);
                        $('#edit_referDob').val(response.data.resident.res_bdate);
                        let birthDate = new Date(response.data.resident.res_bdate);
                        let age = calculateAge(birthDate);
                        $('#edit_referAge').val(age);
                        $('#edit_referGender').val(response.data.resident.res_sex);
                        $('#edit_referCivil').val(response.data.resident.res_civil);
                        $('#edit_referAddress').val(response.data.resident.res_address);
                        // $('#edit_referEa').val(response.data.resident.res_contact);

                    //Referred Info
                        $('#edit_referFnum').val(response.data.rhu_familyNum);
                        $('#edit_referTo').val(response.data.rhu_referredTo);
                        $('#edit_referFrom').val(response.data.em_id);
                        $('#edit_referSubFind').val(response.data.rhu_subjectFinding);

                    // PhilHealth Info
                        let phMem = response.data.rhu_phMember;
                            $('#edit_referPhMemYes').prop('checked', false);
                            $('#edit_referPhMemNo').prop('checked', false);
                            if (phMem === 'Yes') 
                            {
                                $('#edit_referPhMemYes').prop('checked', true);
                            } 
                            else if (phMem === 'No') 
                            {
                                $('#edit_referPhMemNo').prop('checked', true);
                            }
                        let dependent = response.data.rhu_dependent;
                            $('#edit_referPhDepYes').prop('checked', false);
                            $('#edit_referPhDepNo').prop('checked', false);
                            if (dependent === 'Yes') 
                            {
                                $('#edit_referPhDepYes').prop('checked', true);
                            } 
                            else if (dependent === 'No') 
                            {
                                $('#edit_referPhDepNo').prop('checked', true);
                            }
                        let private = response.data.rhu_private;
                            $('#edit_referPhPriYes').prop('checked', false);
                            $('#edit_referPhPriNo').prop('checked', false);
                            if (private === 'Yes') 
                            {
                                $('#edit_referPhPriYes').prop('checked', true);
                            } 
                            else if (private === 'No') 
                            {
                                $('#edit_referPhPriNo').prop('checked', true);
                            }
                        $('#edit_referPhic').val(response.data.rhu_phicNum);
                    // Objective Findings
                        $('#edit_referTemp').val(response.data.rhu_temp); 
                        $('#edit_referPulse').val(response.data.rhu_pr);
                        $('#edit_referResp').val(response.data.rhu_rr); 
                        $('#edit_referBp').val(response.data.rhu_bp);
                        $('#edit_referWeight').val(response.data.rhu_wt); 
                        $('#edit_referReason').val(response.data.rhu_reason);
                        $('#edit_referDiagnosis').val(response.data.rhu_diagnosis); 
                        $('#edit_referTreatment').val(response.data.rhu_treatment);
                        $('#edit_referRfngLvl').val(response.data.rhu_referringLvl); 
                        $('#edit_referRfLvl').val(response.data.rhu_referredLvl);
                        $('#edit_referStatus').val(response.data.rhu_status);
                    // Open the modal
                        $('#editRhuModal').modal('show');
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
    $(document).on('submit', '#edit_rhuInput', function (e) {
        e.preventDefault(); // Prevent default form submission behavior

        var rhu_id = $('#edit_referId').val(); // Assuming the ID is based on the selected resident's full name

        // Create a FormData object with the form fields
        var formData = new FormData();
        formData.append('edit_rhuFullName', $('#edit_rhuFullName').val());
        formData.append('edit_referFnum', $('#edit_referFnum').val());
        formData.append('edit_referFrom', $('#edit_referFrom').val());
        formData.append('edit_referTo', $('#edit_referTo').val());
        formData.append('edit_referSubFind', $('#edit_referSubFind').val());
        formData.append('edit_referPhic', $('#edit_referPhic').val());
        formData.append('edit_referTemp', $('#edit_referTemp').val());
        formData.append('edit_referPulse', $('#edit_referPulse').val());
        formData.append('edit_referResp', $('#edit_referResp').val());
        formData.append('edit_referBp', $('#edit_referBp').val());
        formData.append('edit_referWeight', $('#edit_referWeight').val());
        formData.append('edit_referReason', $('#edit_referReason').val());
        formData.append('edit_referDiagnosis', $('#edit_referDiagnosis').val());
        formData.append('edit_referTreatment', $('#edit_referTreatment').val());
        formData.append('edit_referRfngLvl', $('#edit_referRfngLvl').val());
        formData.append('edit_referRfLvl', $('#edit_referRfLvl').val());
        formData.append('edit_referStatus', $('#edit_referStatus').val());

        // FOR RADIO BUTTONS (edit_referPhMem, edit_referPhDep, edit_referPhPri)
        var referPhMem = $('input[name="edit_referPhMem"]:checked').val();
        if (referPhMem) {
            formData.append('edit_referPhMem', referPhMem);
        }

        var referPhDep = $('input[name="edit_referPhDep"]:checked').val();
        if (referPhDep) {
            formData.append('edit_referPhDep', referPhDep);
        }

        var referPhPri = $('input[name="edit_referPhPri"]:checked').val();
        if (referPhPri) {
            formData.append('edit_referPhPri', referPhPri);
        }

        // Send the AJAX request
        $.ajax({
            type: "POST",
            url: "/updateRhu/" + rhu_id, // URL to handle the update
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
                            <i class="bi bi-exclamation-triangle me-1"></i> RHU Record Not Found.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                } else {
                    $('#alert-container3').html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i> RHU record updated successfully!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                    $('#editRhuModal').modal('hide');
                    location.reload(); // Reload the page to reflect changes
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error response for debugging
                alert("An error occurred. Please check the console for more details.");
            }
        });
    });

</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>