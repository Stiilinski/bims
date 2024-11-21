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

    .customCon {
        width: 100%;
        padding: 10px;
        display: flex;
        justify-content: flex-start;
    }

    .columnCon {
        width: 100%;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .rowCon {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .rowConWhole {
        width: 100%;
        display: flex;
        justify-content: space-between
    }

    .familyPlaningCon {
        padding: 10px
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

    .grpField {
        display: flex;
        flex-direction: column;
    }
    
    .row {
        padding: 10px;
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
        <h1>Maternal Health Record</h1>
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
                    <th scope="col" style="display: none;">ID</th>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">BirthDate</th>
                    <th scope="col">Occupation</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($maternal as $index => $maternals)
                        </tr>
                            <td style="display: none;">{{ $maternals->mat_id }}</td>
                            <td>{{ $index + 1 }}</td>
                            
                            <td>
                                @if($maternals->maiden_id)
                                    {{ $maternals->maiden->res_lname }}, {{ $maternals->maiden->res_fname }} 
                                    @if($maternals->maiden->res_mname && !in_array($maternals->maiden->res_mname, ['N/A', '', null]))
                                        {{ $maternals->maiden->res_mname }}
                                    @endif
                                    @if($maternals->maiden->res_suffix && !in_array($maternals->maiden->res_suffix, ['N/A', '', null]))
                                        {{ $maternals->maiden->res_suffix }}
                                    @endif
                                @elseif($maternals->mat_urMaiden)
                                    {{ $maternals->mat_urMaiden }}
                                @else
                                    N/A
                                @endif
                            </td>

                            <td>
                                @if($maternals->maiden_id)
                                    {{ $maternals->maiden->res_bdate}}
                                @elseif($maternals->mat_urBdate)
                                    {{ $maternals->mat_urBdate }}
                                @endif
                            </td>

                            <td>
                                @if($maternals->maiden_id)
                                    {{ $maternals->maiden->res_occupation}}
                                @elseif($maternals->mat_urOcc)
                                    {{ $maternals->mat_urOcc }}
                                @endif
                            </td>

                            <td>
                                @if($maternals->maiden_id)
                                    {{ $maternals->maiden->res_address}}
                                @elseif($maternals->mat_urAddress)
                                    {{ $maternals->mat_urAddress }}
                                @endif
                            </td>

                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('matView', ['mat_id' => $maternals->mat_id]) }}">View</a></li>
                                        <li><button class="dropdown-item" type="button" onclick="openEditModal({{ $maternals->mat_id }})">Edit</button></li>
                                        <li><a class="dropdown-item" href="{{ route('matAnte', ['mat_id' => $maternals->mat_id]) }}">Ante-Partum Visits</a></li>
                                        <li><a class="dropdown-item" href="{{ route('matPost', ['mat_id' => $maternals->mat_id]) }}">Post-Partum Visits</a></li>
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

      <!-- FORM A -->
    <div class="modal fade" id="ExtralargeModal" tabindex="-1">
        <div class="modal-dialog custom-modal-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Maternal Health Record Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('regValidation.inputMform1')}}" class="maternalF1" id="maternalF1" autocomplete="off"> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Patient Information I.</span>
                            </div>
                            <div class="row g-3">
                                {{-- No.1 --}}
                                    <input type="hidden" class="form-control" id="empId" name="empId" value="{{ $LoggedUserInfo['em_id'] }}">
                                    <div class="col-md-6">
                                        <label for="maternalClinic" class="col-sm-8 col-form-label">Name of Clinic</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="maternalClinic" name="maternalClinic">
                                        </div>
                                        <span class="text-danger error-text maternalClinic_error"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="maternalBloodType" class="col-sm-12 col-form-label">Blood Type</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" id="maternalBloodType" name="maternalBloodType">
                                                <option value="" selected disabled>Select Blood Type</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                        <span class="text-danger error-text maternalBloodType_error"></span>
                                    </div>
                                    

                                    <div class="col-md-3">
                                        <label for="maternalFamNum" class="col-sm-12 col-form-label">Family No.</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control briefField" id="maternalFamNum" name="maternalFamNum">
                                        </div>
                                        <span class="text-danger error-text maternalFamNum_error"></span>
                                    </div>
                                {{-- No.2 --}} 
                                    <!-- Maiden Name Section -->
                                        <div class="col-md-12 pt-2" style="gap: 20px; align-items:center;">
                                            <label class="form-label">Is Maiden a Resident?</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="isMaidenResident" id="maidenYes" value="Yes" onclick="toggleMaidenFields(true)" checked>
                                                    <label class="form-check-label" for="maidenYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="isMaidenResident" id="maidenNo" value="No" onclick="toggleMaidenFields(false)">
                                                    <label class="form-check-label" for="maidenNo">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 pt-2" style="gap: 20px; align-items:center;" id="maidenSelectContainer">
                                            <label for="inputMaidenName" class="form-label">Maiden Name</label>
                                            <select id="inputMaidenName" class="form-control" name="inputMaidenName" onchange="updateResidentDetails(this)">
                                                <option value="" selected disabled>Select Maiden</option>
                                                @foreach($residents as $resident)
                                                    <option value="{{ $resident->res_id }}">
                                                        {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} 
                                                        @if($resident->res_mname && !in_array($resident->res_mname, ['N/A', '', null]))
                                                            {{ $resident->res_mname }} 
                                                        @endif
                                                        @if($resident->res_suffix && !in_array($resident->res_suffix, ['N/A', '', null]))
                                                            {{ $resident->res_suffix }} 
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text inputMaidenName_error"></span>
                                        </div>

                                        <div class="col-md-6" id="maidenInputContainer" style="display:none;">
                                            <label for="maternalMaiden" class="col-sm-12 col-form-label">Maiden Name</label>
                                            <input type="text" class="form-control" id="maternalMaiden" name="maternalMaiden" placeholder="Family, First Middle">
                                            <span class="text-danger error-text maternalMaiden_error"></span>
                                        </div>

                                        <div class="col-md-2" id="maternalBdateCon" style="display:none;">
                                            <label for="maternalBdate" class="col-sm-5 col-form-label">Birthdate</label>
                                            <input type="date" class="form-control" id="maternalBdate" name="maternalBdate" onchange="calculateAge()">
                                            <span class="text-danger error-text maternalBdate_error"></span>
                                        </div>

                                        <div class="col-md-2" id="maternalAgeCon" style="display:none;">
                                            <label for="maternalAge" class="col-sm-5 col-form-label">Age</label>
                                            <input type="text" class="form-control" id="maternalAge" name="maternalAge" readonly>
                                        </div>

                                        <div class="col-md-2" id="maternalOccCon" style="display:none;">
                                            <label for="maternalOccupation" class="col-sm-8 col-form-label">Occupation</label>
                                            <input type="text" class="form-control" id="maternalOccupation" name="maternalOccupation">
                                            <span class="text-danger error-text maternalOccupation_error"></span>
                                        </div>

                                    <!-- Husband's Name Section -->
                                        <div class="col-md-12 pt-2" style="gap: 20px; align-items:center;">
                                            <label class="form-label">Is Husband a Resident?</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="isHusbandResident" id="husbandYes" value="Yes" onclick="toggleHusbandFields(true)" checked>
                                                    <label class="form-check-label" for="husbandYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="isHusbandResident" id="husbandNo" value="No" onclick="toggleHusbandFields(false)">
                                                    <label class="form-check-label" for="husbandNo">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 pt-2" id="husbandSelectContainer">
                                            <label for="inputMaternalHname" class="form-label">Husband's Name</label>
                                            <select id="inputMaternalHname" class="form-control" name="inputMaternalHname" onchange="updateResidentDetails(this)">
                                                <option value="">Select...</option>
                                                @foreach($residents as $resident)
                                                    <option value="{{ $resident->res_id }}">
                                                        {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} 
                                                        @if($resident->res_mname && !in_array($resident->res_mname, ['N/A', '', null]))
                                                            {{ $resident->res_mname }} 
                                                        @endif
                                                        @if($resident->res_suffix && !in_array($resident->res_suffix, ['N/A', '', null]))
                                                            {{ $resident->res_suffix }} 
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text inputMaternalHname_error"></span>
                                        </div>

                                        <div class="col-md-6" id="husbandInputContainer" style="display:none;">
                                            <label for="urMaternalHusband" class="col-sm-12 col-form-label">Husband's Name</label>
                                            <input type="text" class="form-control" id="urMaternalHusband" name="urMaternalHusband">
                                            <span class="text-danger error-text urMaternalHusband_error"></span>
                                        </div>

                                        <div class="col-md-4" id="maternalAddCon" style="display:none;">
                                            <label for="maternalAddress" class="col-sm-8 col-form-label">Address</label>
                                            <input type="text" class="form-control" id="maternalAddress" name="maternalAddress">
                                            <span class="text-danger error-text maternalAddress_error"></span>
                                        </div>

                                        <fieldset class="col-md-12">
                                            <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Risk?</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="maternalRisk" id="maternalRiskYes" value="Yes">
                                                    <label class="form-check-label" for="maternalRiskYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="maternalRisk" id="maternalRiskNo" value="No">
                                                    <label class="form-check-label" for="maternalRiskNo">No</label>
                                                </div>
                                            </div>
                                            <span class="text-danger error-text maternalRisk_error"></span>
                                        </fieldset>
                                {{-- No.3 --}}  
                                    <div class="col-md-2">
                                        <label for="maternalLmp" class="col-sm-8 col-form-label">LMP</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" id="maternalLmp" name="maternalLmp">
                                        </div>
                                        <span class="text-danger error-text maternalLmp_error"></span>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="maternalEdc" class="col-sm-8 col-form-label">EDC</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" id="maternalEdc" name="maternalEdc">
                                        </div>
                                        <span class="text-danger error-text maternalEdc_error"></span>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="maternalG" class="col-sm-8 col-form-label">G</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="maternalG" name="maternalG">
                                        </div>
                                        <span class="text-danger error-text maternalG_error"></span>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="maternalT" class="col-sm-8 col-form-label">T</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="maternalT" name="maternalT">
                                        </div>
                                        <span class="text-danger error-text maternalT_error"></span>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="maternalP" class="col-sm-8 col-form-label">P</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="maternalP" name="maternalP">
                                        </div>
                                        <span class="text-danger error-text maternalP_error"></span>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="maternalA" class="col-sm-8 col-form-label">A</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="maternalA" name="maternalA">
                                        </div>
                                        <span class="text-danger error-text maternalA_error"></span>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="maternalL" class="col-sm-8 col-form-label">L</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control briefField" id="maternalL" name="maternalL">
                                        </div>
                                        <span class="text-danger error-text maternalL_error"></span>
                                    </div>
                            </div>   
                        </div>


                        <div class="row g-3" style="">
                            <div class="col-md-4">
                                <div class="inputGroupContainer">
                                    <div class="titleCaseFinding">
                                        <span>OBSTETRICAL HISTORY</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label for="maternalChildAl" class="col-sm-8 col-form-label">Number of Children Alive</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="maternalChildAl" name="maternalChildAl">
                                            </div>
                                            <span class="text-danger error-text maternalChildAl_error"></span>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="maternalLivChild" class="col-sm-8 col-form-label">Number of Living Children Alive</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="maternalLivChild" name="maternalLivChild">
                                            </div>
                                            <span class="text-danger error-text maternalLivChild_error"></span>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="maternalAbort" class="col-sm-8 col-form-label">Number of Abortion</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="maternalAbort" name="maternalAbort">
                                            </div>
                                            <span class="text-danger error-text maternalAbort_error"></span>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="maternalStillBirth" class="col-sm-8 col-form-label">Number of Still Births/Fetal Deaths</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="maternalStillBirth" name="maternalStillBirth">
                                            </div>
                                            <span class="text-danger error-text maternalStillBirth_error"></span>
                                        </div>

                                        <fieldset class="col-md-12">
                                            <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Previous Caesarian Section</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="maternalCaesarian" id="maternalCaesarianYes" value="Yes">
                                                    <label class="form-check-label" for="maternalCaesarianYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="maternalCaesarian" id="maternalCaesarianNo" value="No">
                                                    <label class="form-check-label" for="maternalCaesarianNo">No</label>
                                                </div>
                                            </div>
                                            <span class="text-danger error-text maternalCaesarian_error"></span>
                                        </fieldset>

                                        <fieldset class="col-md-12">
                                            <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Postpartum Hemorrhage</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="maternalHemorr" id="maternalHemorrYes" value="Yes">
                                                    <label class="form-check-label" for="maternalHemorrYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="maternalHemorr" id="maternalHemorrNo" value="No">
                                                    <label class="form-check-label" for="maternalHemorrNo">No</label>
                                                </div>
                                            </div>
                                            <span class="text-danger error-text maternalHemorr_error"></span>
                                        </fieldset>

                                        <fieldset class="col-md-12">
                                            <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Placental Previa / Abruptio</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="maternalAbruptio" id="maternalAbruptioYes" value="Yes">
                                                    <label class="form-check-label" for="maternalAbruptioYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="maternalAbruptio" id="maternalAbruptioNo" value="No">
                                                    <label class="form-check-label" for="maternalAbruptioNo">No</label>
                                                </div>
                                            </div>
                                            <span class="text-danger error-text maternalAbruptio_error"></span>
                                        </fieldset>

                                        <div class="col-md-12">
                                            <label for="maternalOthers" class="col-sm-8 col-form-label">Others / Specify</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="maternalOthers" name="maternalOthers">
                                            </div>
                                            <span class="text-danger error-text maternalOthers_error"></span>
                                        </div>
                                    </div>   
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="inputGroupContainer">
                                    <div class="titleCaseFinding">
                                        <span>PRESENT HEALTH PROBLEMS</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="columnGroup"> 
                                            <div class="columnCon">
                                                <fieldset class="row mb-3" style="width:100%;">
                                                    <legend class="col-form-label col-sm-5 pt-0">TB:</legend>
                                                    <div class="col-sm-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="maternalTb" id="maternalTb_yes" value="Yes">
                                                            <label class="form-check-label" for="maternalTb_yes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="maternalTb" id="maternalTb_no" value="No">
                                                            <label class="form-check-label" for="maternalTb_no">No</label>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger error-text maternalTb_error"></span>
                                                </fieldset>

                                                <fieldset class="row mb-3" style="width:100%;">
                                                    <legend class="col-form-label col-sm-5 pt-0">Heart Disease:</legend>
                                                    <div class="col-sm-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="maternalHeart" id="maternalHeart_yes" value="Yes">
                                                            <label class="form-check-label" for="maternalHeart_yes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="maternalHeart" id="maternalHeart_no" value="No">
                                                            <label class="form-check-label" for="maternalHeart_no">No</label>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger error-text maternalHeart_error"></span>
                                                </fieldset>

                                                <fieldset class="row mb-3" style="width:100%;">
                                                    <legend class="col-form-label col-sm-5 pt-0">Diabetes:</legend>
                                                    <div class="col-sm-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="maternalDiabetes" id="maternalDiabetes_yes" value="Yes">
                                                            <label class="form-check-label" for="maternalDiabetes_yes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="maternalDiabetes" id="maternalDiabetes_no" value="No">
                                                            <label class="form-check-label" for="maternalDiabetes_no">No</label>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger error-text maternalDiabetes_error"></span>
                                                </fieldset>

                                                <fieldset class="row mb-3" style="width:100%;">
                                                    <legend class="col-form-label col-sm-5 pt-0">Brochial Asthma:</legend>
                                                    <div class="col-sm-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="maternalAsthma" id="maternalAsthma_yes" value="Yes">
                                                            <label class="form-check-label" for="maternalAsthma_yes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="maternalAsthma" id="maternalAsthma_no" value="No">
                                                            <label class="form-check-label" for="maternalAsthma_no">No</label>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger error-text maternalAsthma_error"></span>
                                                </fieldset>

                                                <fieldset class="row mb-3" style="width:100%;">
                                                    <legend class="col-form-label col-sm-5 pt-0">Goiter:</legend>
                                                    <div class="col-sm-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="maternalGoiter" id="maternalGoiter_yes" value="Yes">
                                                            <label class="form-check-label" for="maternalGoiter_yes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="maternalGoiter" id="maternalGoiter_no" value="No">
                                                            <label class="form-check-label" for="maternalGoiter_no">No</label>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger error-text maternalGoiter_error"></span>
                                                </fieldset>

                                                <fieldset class="row mb-3" style="width:100%;">
                                                    <legend class="col-form-label col-sm-5 pt-0">Date Tetanus Toxoid:</legend>
                                                    <div class="col-sm-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="maternalTetanus" id="maternalTetanus_yes" value="Yes">
                                                            <label class="form-check-label" for="maternalTetanus_yes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="maternalTetanus" id="maternalTetanus_no" value="No">
                                                            <label class="form-check-label" for="maternalTetanus_no">No</label>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger error-text maternalTetanus_error"></span>
                                                </fieldset>
                                            </div>

                                            <div class="row g-3 givenSection" style="display: none;">                                        
                                                <label for="maternalGiven" class="col-sm-8 col-form-label" style="font-size:20px;">Given</label>
                                                <div class="col-md-6">
                                                    <label for="maternalGiven1" class="col-sm-8 col-form-label">1</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control " id="maternalGiven1" name="maternalGiven1">
                                                    </div>
                                                    <span class="text-danger error-text maternalGiven1_error"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="maternalGiven2" class="col-sm-8 col-form-label">2</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control " id="maternalGiven2" name="maternalGiven2">
                                                    </div>
                                                    <span class="text-danger error-text maternalGiven2_error"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="maternalGiven3" class="col-sm-8 col-form-label">3</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control " id="maternalGiven3" name="maternalGiven3">
                                                    </div>
                                                    <span class="text-danger error-text maternalGiven3_error"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="maternalGiven4" class="col-sm-8 col-form-label">4</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control " id="maternalGiven4" name="maternalGiven4">
                                                    </div>
                                                    <span class="text-danger error-text maternalGiven4_error"></span>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="maternalGiven5" class="col-sm-8 col-form-label">5</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control " id="maternalGiven5" name="maternalGiven5">
                                                    </div>
                                                    <span class="text-danger error-text maternalGiven5_error"></span>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="maternalGivenTtl" class="col-sm-8 col-form-label">TTL</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control " id="maternalGivenTtl" name="maternalGivenTtl">
                                                    </div>
                                                    <span class="text-danger error-text maternalGivenTtl_error"></span>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4" style="gap:10px; display:flex; flex-direction:column;">
                                <div class="inputGroupContainer" style="height: 300px;">
                                    <div class="titleCaseFinding">
                                        <span>FAMILY PLANNING</span>
                                    </div>
                                    <div class="row g-3">
                                        <fieldset class="col-md-12">
                                            <legend class="col-form-label col-sm-8 pt-0">Has FP Been Practice:</legend>
                                            <div class="col-sm-7">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="maternalFp" id="maternalFp_yes" value="Yes">
                                                    <label class="form-check-label" for="maternalFp_yes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="maternalFp" id="maternalFp_no" value="No">
                                                    <label class="form-check-label" for="maternalFp_no">No</label>
                                                </div>
                                            </div>
                                            <span class="text-danger error-text maternalFp_error"></span>
                                        </fieldset>

                                        <div id="fpMethodSection" class="col-md-12" style="display:none;">
                                            <label for="maternalFpMethod" class="col-sm-12 col-form-label">If YES, what method?</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="maternalFpMethod" name="maternalFpMethod">
                                            </div>
                                            <span class="text-danger error-text maternalFpMethod_error"></span>
                                        </div>

                                        <fieldset id="fpPracSection" class="col-md-12" style="display:none; width:100%;">
                                            <legend class="col-form-label col-sm-8 pt-0">If NO, Willing to Practice:</legend>
                                            <div class="col-sm-7">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="maternalFpPrac" id="maternalFpPrac_yes" value="Yes">
                                                    <label class="form-check-label" for="maternalFpPrac_yes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="maternalFpPrac" id="maternalFpPrac_no" value="No">
                                                    <label class="form-check-label" for="maternalFpPrac_no">No</label>
                                                </div>
                                            </div>
                                            <span class="text-danger error-text maternalFpPrac_error"></span>
                                        </fieldset>
                                    </div>   
                                </div>

                                <div class="inputGroupContainer" style="height:600px;">
                                    <div class="titleCaseFinding">
                                        <span>RISK FACTORS FOR PREGNANT WOMEN</span>
                                    </div>
                                    <div class="row g-3">
                                        <fieldset class="col-md-12 diagnosisArea">
                                            <div class="col-sm-12" style="gap: 10px">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="maternalRiskFactors[]" id="maternalRiskAge" value="Age Less Than or Greater Than 35">
                                                    <label class="form-check-label" for="maternalRiskAge">Age Less Than or Greater Than 35</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="maternalRiskFactors[]" id="maternalRiskHt" value="Less Than 145 cm (4'9) Tall">
                                                    <label class="form-check-label" for="maternalRiskHt">Less Than 145 cm (4'9) Tall</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="maternalRiskFactors[]" id="maternalRiskMoreBaby" value="Having A Fourth (or more) Baby">
                                                    <label class="form-check-label" for="maternalRiskMoreBaby">Having A Fourth (or more) Baby</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="maternalRiskFactors[]" id="maternalRiskCeasarian" value="Previous Ceasarian Section">
                                                    <label class="form-check-label" for="maternalRiskCeasarian">Previous Ceasarian Section</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="maternalRiskFactors[]" id="maternalRiskHemorrhage" value="Post Partum Hemorrhage">
                                                    <label class="form-check-label" for="maternalRiskHemorrhage">Post Partum Hemorrhage</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="maternalRiskFactors[]" id="maternalRiskMiscarriage" value="3 Consecutive Miscarriage / Still Born">
                                                    <label class="form-check-label" for="maternalRiskMiscarriage">3 Consecutive Miscarriage / Still Born</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="maternalRiskFactors[]" id="maternalRiskTB" value="TB">
                                                    <label class="form-check-label" for="maternalRiskTB">TB</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="maternalRiskFactors[]" id="maternalRiskHeart" value="Heart Disease">
                                                    <label class="form-check-label" for="maternalRiskHeart">Heart Disease</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="maternalRiskFactors[]" id="maternalRiskDiabetes" value="Diabetes">
                                                    <label class="form-check-label" for="maternalRiskDiabetes">Diabetes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="maternalRiskFactors[]" id="maternalRiskAsthma" value="Bronchial Asthma">
                                                    <label class="form-check-label" for="maternalRiskAsthma">Bronchial Asthma</label>
                                                </div>
                                            </div>
                                        </fieldset>
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
    </div>
    <!-- End OF FORM A-->

    <!-- EDIT FORM A -->
    <div class="modal fade" id="EditExtralargeModal" tabindex="-1">
        <div class="modal-dialog custom-modal-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT Maternal Health Record Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="edit_maternalF1" id="edit_maternalF1" autocomplete="off"> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Patient Information I.</span>
                            </div>
                            <div class="row g-3">
                                {{-- No.1 --}}
                                    <input type="hidden" class="form-control" id="edit_matId" name="edit_matId">
                                    <input type="hidden" class="form-control" id="edit_empId" name="edit_empId" value="{{ $LoggedUserInfo['em_id'] }}">
                                    <div class="col-md-6">
                                        <label for="edit_maternalClinic" class="col-sm-8 col-form-label">Name of Clinic</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_maternalClinic" name="edit_maternalClinic">
                                        </div>
                                        <span class="text-danger error-text edit_maternalClinic_error"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_maternalBloodType" class="col-sm-12 col-form-label">Blood Type</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" id="edit_maternalBloodType" name="edit_maternalBloodType">
                                                <option value="" selected disabled>Select Blood Type</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                        <span class="text-danger error-text edit_maternalBloodType_error"></span>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label for="edit_maternalFamNum" class="col-sm-12 col-form-label">Family No.</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control briefField" id="edit_maternalFamNum" name="edit_maternalFamNum">
                                        </div>
                                        <span class="text-danger error-text edit_maternalFamNum_error"></span>
                                    </div>
                                {{-- No.2 --}} 
                                    <!-- Maiden Name Section -->
                                        <div class="col-md-12 pt-2" style="gap: 20px; align-items:center;">
                                            <label class="form-label">Is Maiden a Resident?</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_isMaidenResident" id="edit_maidenYes" value="Yes" onclick="edit_toggleMaidenFields(true)" checked>
                                                    <label class="form-check-label" for="edit_maidenYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_isMaidenResident" id="edit_maidenNo" value="No" onclick="edit_toggleMaidenFields(false)">
                                                    <label class="form-check-label" for="edit_maidenNo">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 pt-2" style="gap: 20px; align-items:center;" id="edit_maidenSelectContainer">
                                            <label for="edit_inputMaidenName" class="form-label">Maiden Name</label>
                                            <select id="edit_inputMaidenName" class="form-control" name="edit_inputMaidenName">
                                                <option value="" selected disabled>Select Maiden</option>
                                                @foreach($residents as $resident)
                                                    <option value="{{ $resident->res_id }}">
                                                        {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} 
                                                        @if($resident->res_mname && !in_array($resident->res_mname, ['N/A', '', null]))
                                                            {{ $resident->res_mname }} 
                                                        @endif
                                                        @if($resident->res_suffix && !in_array($resident->res_suffix, ['N/A', '', null]))
                                                            {{ $resident->res_suffix }} 
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text edit_inputMaidenName_error"></span>
                                        </div>

                                        <div class="col-md-6" id="edit_maidenInputContainer" style="display:none;">
                                            <label for="edit_maternalMaiden" class="col-sm-12 col-form-label">Maiden Name</label>
                                            <input type="text" class="form-control" id="edit_maternalMaiden" name="edit_maternalMaiden" placeholder="Family, First Middle">
                                            <span class="text-danger error-text edit_maternalMaiden_error"></span>
                                        </div>

                                        <div class="col-md-2" id="edit_maternalBdateCon" style="display:none;">
                                            <label for="edit_maternalBdate" class="col-sm-5 col-form-label">Birthdate</label>
                                            <input type="date" class="form-control" id="edit_maternalBdate" name="edit_maternalBdate">
                                            <span class="text-danger error-text edit_maternalBdate_error"></span>
                                        </div>

                                        <div class="col-md-2" id="edit_maternalAgeCon" style="display:none;">
                                            <label for="edit_maternalAge" class="col-sm-5 col-form-label">Age</label>
                                            <input type="text" class="form-control" id="edit_maternalAge" name="edit_maternalAge" readonly>
                                        </div>

                                        <div class="col-md-2" id="edit_maternalOccCon" style="display:none;">
                                            <label for="edit_maternalOccupation" class="col-sm-8 col-form-label">Occupation</label>
                                            <input type="text" class="form-control" id="edit_maternalOccupation" name="edit_maternalOccupation">
                                            <span class="text-danger error-text edit_maternalOccupation_error"></span>
                                        </div>

                                    <!-- Husband's Name Section -->
                                        <div class="col-md-12 pt-2" style="gap: 20px; align-items:center;">
                                            <label class="form-label">Is Husband a Resident?</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_isHusbandResident" id="edit_husbandYes" value="Yes" onclick="edit_toggleHusbandFields(true)" checked>
                                                    <label class="form-check-label" for="edit_husbandYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_isHusbandResident" id="edit_husbandNo" value="No" onclick="edit_toggleHusbandFields(false)">
                                                    <label class="form-check-label" for="edit_husbandNo">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 pt-2" id="edit_husbandSelectContainer">
                                            <label for="edit_inputMaternalHname" class="form-label">Husband's Name</label>
                                            <select id="edit_inputMaternalHname" class="form-control" name="edit_inputMaternalHname">
                                                <option value="">Select...</option>
                                                @foreach($residents as $resident)
                                                    <option value="{{ $resident->res_id }}">
                                                        {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} 
                                                        @if($resident->res_mname && !in_array($resident->res_mname, ['N/A', '', null]))
                                                            {{ $resident->res_mname }} 
                                                        @endif
                                                        @if($resident->res_suffix && !in_array($resident->res_suffix, ['N/A', '', null]))
                                                            {{ $resident->res_suffix }} 
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text edit_inputMaternalHname_error"></span>
                                        </div>

                                        <div class="col-md-6" id="edit_husbandInputContainer" style="display:none;">
                                            <label for="edit_urMaternalHusband" class="col-sm-12 col-form-label">Husband's Name</label>
                                            <input type="text" class="form-control" id="edit_urMaternalHusband" name="edit_urMaternalHusband">
                                            <span class="text-danger error-text edit_urMaternalHusband_error"></span>
                                        </div>

                                        <div class="col-md-4" id="edit_maternalAddCon" style="display:none;">
                                            <label for="edit_maternalAddress" class="col-sm-8 col-form-label">Address</label>
                                            <input type="text" class="form-control" id="edit_maternalAddress" name="edit_maternalAddress">
                                            <span class="text-danger error-text edit_maternalAddress_error"></span>
                                        </div>

                                        <fieldset class="col-md-12">
                                            <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Risk?</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_maternalRisk" id="edit_maternalRiskYes" value="Yes">
                                                    <label class="form-check-label" for="edit_maternalRiskYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_maternalRisk" id="edit_maternalRiskNo" value="No">
                                                    <label class="form-check-label" for="edit_maternalRiskNo">No</label>
                                                </div>
                                            </div>
                                            <span class="text-danger error-text edit_maternalRisk_error"></span>
                                        </fieldset>
                                {{-- No.3 --}}  
                                    <div class="col-md-2">
                                        <label for="edit_maternalLmp" class="col-sm-8 col-form-label">LMP</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" id="edit_maternalLmp" name="edit_maternalLmp">
                                        </div>
                                        <span class="text-danger error-text edit_maternalLmp_error"></span>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="edit_maternalEdc" class="col-sm-8 col-form-label">EDC</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" id="edit_maternalEdc" name="edit_maternalEdc">
                                        </div>
                                        <span class="text-danger error-text edit_maternalEdc_error"></span>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="edit_maternalG" class="col-sm-8 col-form-label">G</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="edit_maternalG" name="edit_maternalG">
                                        </div>
                                        <span class="text-danger error-text edit_maternalG_error"></span>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="edit_maternalT" class="col-sm-8 col-form-label">T</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="edit_maternalT" name="edit_maternalT">
                                        </div>
                                        <span class="text-danger error-text edit_maternalT_error"></span>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="edit_maternalP" class="col-sm-8 col-form-label">P</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="edit_maternalP" name="edit_maternalP">
                                        </div>
                                        <span class="text-danger error-text edit_maternalP_error"></span>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="edit_maternalA" class="col-sm-8 col-form-label">A</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="edit_maternalA" name="edit_maternalA">
                                        </div>
                                        <span class="text-danger error-text edit_maternalA_error"></span>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="edit_maternalL" class="col-sm-8 col-form-label">L</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="edit_maternalL" name="edit_maternalL">
                                        </div>
                                        <span class="text-danger error-text edit_maternalL_error"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_maternalStatus" class="col-sm-12 col-form-label">Status</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" id="edit_maternalStatus" name="edit_maternalStatus">
                                                <option value="" selected disabled>Select Status</option>
                                                <option value="Completed">Completed</option>
                                                <option value="Archive">Archive</option>
                                            </select>
                                        </div>
                                        <span class="text-danger error-text edit_maternalStatus_error"></span>
                                    </div>
                            </div>   
                        </div>


                        <div class="row g-3" style="">
                            <div class="col-md-4">
                                <div class="inputGroupContainer">
                                    <div class="titleCaseFinding">
                                        <span>OBSTETRICAL HISTORY</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label for="edit_maternalChildAl" class="col-sm-8 col-form-label">Number of Children Alive</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_maternalChildAl" name="edit_maternalChildAl">
                                            </div>
                                            <span class="text-danger error-text edit_maternalChildAl_error"></span>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="edit_maternalLivChild" class="col-sm-8 col-form-label">Number of Living Children Alive</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_maternalLivChild" name="edit_maternalLivChild">
                                            </div>
                                            <span class="text-danger error-text edit_maternalLivChild_error"></span>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="edit_maternalAbort" class="col-sm-8 col-form-label">Number of Abortion</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_maternalAbort" name="edit_maternalAbort">
                                            </div>
                                            <span class="text-danger error-text edit_maternalAbort_error"></span>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="edit_maternalStillBirth" class="col-sm-8 col-form-label">Number of Still Births/Fetal Deaths</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_maternalStillBirth" name="edit_maternalStillBirth">
                                            </div>
                                            <span class="text-danger error-text edit_maternalStillBirth_error"></span>
                                        </div>

                                        <fieldset class="col-md-12">
                                            <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Previous Caesarian Section</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_maternalCaesarian" id="edit_maternalCaesarianYes" value="Yes">
                                                    <label class="form-check-label" for="edit_maternalCaesarianYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_maternalCaesarian" id="edit_maternalCaesarianNo" value="No">
                                                    <label class="form-check-label" for="edit_maternalCaesarianNo">No</label>
                                                </div>
                                            </div>
                                            <span class="text-danger error-text edit_maternalCaesarian_error"></span>
                                        </fieldset>

                                        <fieldset class="col-md-12">
                                            <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Postpartum Hemorrhage</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_maternalHemorr" id="edit_maternalHemorrYes" value="Yes">
                                                    <label class="form-check-label" for="edit_maternalHemorrYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_maternalHemorr" id="edit_maternalHemorrNo" value="No">
                                                    <label class="form-check-label" for="edit_maternalHemorrNo">No</label>
                                                </div>
                                            </div>
                                            <span class="text-danger error-text edit_maternalHemorr_error"></span>
                                        </fieldset>

                                        <fieldset class="col-md-12">
                                            <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Placental Previa / Abruptio</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_maternalAbruptio" id="edit_maternalAbruptioYes" value="Yes">
                                                    <label class="form-check-label" for="edit_maternalAbruptioYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_maternalAbruptio" id="edit_maternalAbruptioNo" value="No">
                                                    <label class="form-check-label" for="edit_maternalAbruptioNo">No</label>
                                                </div>
                                            </div>
                                            <span class="text-danger error-text edit_maternalAbruptio_error"></span>
                                        </fieldset>

                                        <div class="col-md-12">
                                            <label for="edit_maternalOthers" class="col-sm-8 col-form-label">Others / Specify</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_maternalOthers" name="edit_maternalOthers">
                                            </div>
                                            <span class="text-danger error-text edit_maternalOthers_error"></span>
                                        </div>
                                    </div>   
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="inputGroupContainer">
                                    <div class="titleCaseFinding">
                                        <span>PRESENT HEALTH PROBLEMS</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="columnGroup"> 
                                            <div class="columnCon">
                                                <fieldset class="row mb-3" style="width:100%;">
                                                    <legend class="col-form-label col-sm-5 pt-0">TB:</legend>
                                                    <div class="col-sm-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_maternalTb" id="edit_maternalTb_yes" value="Yes">
                                                            <label class="form-check-label" for="edit_maternalTb_yes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_maternalTb" id="edit_maternalTb_no" value="No">
                                                            <label class="form-check-label" for="edit_maternalTb_no">No</label>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger error-text edit_maternalTb_error"></span>
                                                </fieldset>

                                                <fieldset class="row mb-3" style="width:100%;">
                                                    <legend class="col-form-label col-sm-5 pt-0">Heart Disease:</legend>
                                                    <div class="col-sm-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_maternalHeart" id="edit_maternalHeart_yes" value="Yes">
                                                            <label class="form-check-label" for="edit_maternalHeart_yes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_maternalHeart" id="edit_maternalHeart_no" value="No">
                                                            <label class="form-check-label" for="edit_maternalHeart_no">No</label>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger error-text edit_maternalHeart_error"></span>
                                                </fieldset>

                                                <fieldset class="row mb-3" style="width:100%;">
                                                    <legend class="col-form-label col-sm-5 pt-0">Diabetes:</legend>
                                                    <div class="col-sm-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_maternalDiabetes" id="edit_maternalDiabetes_yes" value="Yes">
                                                            <label class="form-check-label" for="edit_maternalDiabetes_yes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_maternalDiabetes" id="edit_maternalDiabetes_no" value="No">
                                                            <label class="form-check-label" for="edit_maternalDiabetes_no">No</label>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger error-text edit_maternalDiabetes_error"></span>
                                                </fieldset>

                                                <fieldset class="row mb-3" style="width:100%;">
                                                    <legend class="col-form-label col-sm-5 pt-0">Brochial Asthma:</legend>
                                                    <div class="col-sm-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_maternalAsthma" id="edit_maternalAsthma_yes" value="Yes">
                                                            <label class="form-check-label" for="edit_maternalAsthma_yes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_maternalAsthma" id="edit_maternalAsthma_no" value="No">
                                                            <label class="form-check-label" for="edit_maternalAsthma_no">No</label>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger error-text edit_maternalAsthma_error"></span>
                                                </fieldset>

                                                <fieldset class="row mb-3" style="width:100%;">
                                                    <legend class="col-form-label col-sm-5 pt-0">Goiter:</legend>
                                                    <div class="col-sm-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_maternalGoiter" id="edit_maternalGoiter_yes" value="Yes">
                                                            <label class="form-check-label" for="edit_maternalGoiter_yes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_maternalGoiter" id="edit_maternalGoiter_no" value="No">
                                                            <label class="form-check-label" for="edit_maternalGoiter_no">No</label>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger error-text edit_maternalGoiter_error"></span>
                                                </fieldset>

                                                <fieldset class="row mb-3" style="width:100%;">
                                                    <legend class="col-form-label col-sm-5 pt-0">Date Tetanus Toxoid:</legend>
                                                    <div class="col-sm-7">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_maternalTetanus" id="edit_maternalTetanus_yes" value="Yes">
                                                            <label class="form-check-label" for="edit_maternalTetanus_yes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_maternalTetanus" id="edit_maternalTetanus_no" value="No">
                                                            <label class="form-check-label" for="edit_maternalTetanus_no">No</label>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger error-text edit_maternalTetanus_error"></span>
                                                </fieldset>
                                            </div>

                                            <div class="row g-3 edit_givenSection" id="edit_givenSection" style="display: none;">                                        
                                                <label for="maternalGiven" class="col-sm-8 col-form-label" style="font-size:20px;">Given</label>
                                                <div class="col-md-6">
                                                    <label for="edit_maternalGiven1" class="col-sm-8 col-form-label">1</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control " id="edit_maternalGiven1" name="edit_maternalGiven1">
                                                    </div>
                                                    <span class="text-danger error-text edit_maternalGiven1_error"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="edit_maternalGiven2" class="col-sm-8 col-form-label">2</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control " id="edit_maternalGiven2" name="edit_maternalGiven2">
                                                    </div>
                                                    <span class="text-danger error-text edit_maternalGiven2_error"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="edit_maternalGiven3" class="col-sm-8 col-form-label">3</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control " id="edit_maternalGiven3" name="edit_maternalGiven3">
                                                    </div>
                                                    <span class="text-danger error-text edit_maternalGiven3_error"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="edit_maternalGiven4" class="col-sm-8 col-form-label">4</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control " id="edit_maternalGiven4" name="edit_maternalGiven4">
                                                    </div>
                                                    <span class="text-danger error-text edit_maternalGiven4_error"></span>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="edit_maternalGiven5" class="col-sm-8 col-form-label">5</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control " id="edit_maternalGiven5" name="edit_maternalGiven5">
                                                    </div>
                                                    <span class="text-danger error-text edit_maternalGiven5_error"></span>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="edit_maternalGivenTtl" class="col-sm-8 col-form-label">TTL</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control " id="edit_maternalGivenTtl" name="edit_maternalGivenTtl">
                                                    </div>
                                                    <span class="text-danger error-text edit_maternalGivenTtl_error"></span>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4" style="gap:10px; display:flex; flex-direction:column;">
                                <div class="inputGroupContainer" style="height: 300px;">
                                    <div class="titleCaseFinding">
                                        <span>FAMILY PLANNING</span>
                                    </div>
                                    <div class="row g-3">
                                        <fieldset class="col-md-12">
                                            <legend class="col-form-label col-sm-8 pt-0">Has FP Been Practice:</legend>
                                            <div class="col-sm-7">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_maternalFp" id="edit_maternalFp_yes" value="Yes">
                                                    <label class="form-check-label" for="edit_maternalFp_yes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_maternalFp" id="edit_maternalFp_no" value="No">
                                                    <label class="form-check-label" for="edit_maternalFp_no">No</label>
                                                </div>
                                            </div>
                                            <span class="text-danger error-text edit_maternalFp_error"></span>
                                        </fieldset>

                                        <div id="edit_fpMethodSection" class="col-md-12" style="display:none;">
                                            <label for="edit_maternalFpMethod" class="col-sm-12 col-form-label">If YES, what method?</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_maternalFpMethod" name="edit_maternalFpMethod">
                                            </div>
                                            <span class="text-danger error-text edit_maternalFpMethod_error"></span>
                                        </div>

                                        <fieldset id="edit_fpPracSection" class="col-md-12" style="display:none; width:100%;">
                                            <legend class="col-form-label col-sm-8 pt-0">If NO, Willing to Practice:</legend>
                                            <div class="col-sm-7">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_maternalFpPrac" id="edit_maternalFpPrac_yes" value="Yes">
                                                    <label class="form-check-label" for="edit_maternalFpPrac_yes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_maternalFpPrac" id="edit_maternalFpPrac_no" value="No">
                                                    <label class="form-check-label" for="edit_maternalFpPrac_no">No</label>
                                                </div>
                                            </div>
                                            <span class="text-danger error-text edit_maternalFpPrac_error"></span>
                                        </fieldset>
                                    </div>   
                                </div>

                                <div class="inputGroupContainer" style="height:600px;">
                                    <div class="titleCaseFinding">
                                        <span>RISK FACTORS FOR PREGNANT WOMEN</span>
                                    </div>
                                    <div class="row g-3">
                                        <fieldset class="col-md-12 diagnosisArea">
                                            <div class="col-sm-12" style="gap: 10px">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_maternalRiskFactors[]" id="edit_maternalRiskAge" value="Age Less Than or Greater Than 35">
                                                    <label class="form-check-label" for="edit_maternalRiskAge">Age Less Than or Greater Than 35</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_maternalRiskFactors[]" id="edit_maternalRiskHt" value="Less Than 145 cm (4'9) Tall">
                                                    <label class="form-check-label" for="edit_maternalRiskHt">Less Than 145 cm (4'9) Tall</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_maternalRiskFactors[]" id="edit_maternalRiskMoreBaby" value="Having A Fourth (or more) Baby">
                                                    <label class="form-check-label" for="edit_maternalRiskMoreBaby">Having A Fourth (or more) Baby</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_maternalRiskFactors[]" id="edit_maternalRiskCeasarian" value="Previous Ceasarian Section">
                                                    <label class="form-check-label" for="edit_maternalRiskCeasarian">Previous Ceasarian Section</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_maternalRiskFactors[]" id="edit_maternalRiskHemorrhage" value="Post Partum Hemorrhage">
                                                    <label class="form-check-label" for="edit_maternalRiskHemorrhage">Post Partum Hemorrhage</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_maternalRiskFactors[]" id="edit_maternalRiskMiscarriage" value="3 Consecutive Miscarriage / Still Born">
                                                    <label class="form-check-label" for="edit_maternalRiskMiscarriage">3 Consecutive Miscarriage / Still Born</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_maternalRiskFactors[]" id="edit_maternalRiskTB" value="TB">
                                                    <label class="form-check-label" for="edit_maternalRiskTB">TB</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_maternalRiskFactors[]" id="edit_maternalRiskHeart" value="Heart Disease">
                                                    <label class="form-check-label" for="edit_maternalRiskHeart">Heart Disease</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_maternalRiskFactors[]" id="edit_maternalRiskDiabetes" value="Diabetes">
                                                    <label class="form-check-label" for="edit_maternalRiskDiabetes">Diabetes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_maternalRiskFactors[]" id="edit_maternalRiskAsthma" value="Bronchial Asthma">
                                                    <label class="form-check-label" for="edit_maternalRiskAsthma">Bronchial Asthma</label>
                                                </div>
                                            </div>
                                        </fieldset>
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
    </div>
    <!-- End OF SIDE A-->


</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

<script>
// FOR CREATE PART
    //MAIDEN SELECT
    $(document).ready(function () {
        $('#inputMaidenName').selectize({
            placeholder: 'Select Maiden',
            sortField: 'text'
        });
    });
    
    //HUSBAND SELECT
    $(document).ready(function () {
        $('#inputMaternalHname').selectize({
            placeholder: 'Select Husband',
            sortField: 'text'
        });
    });
    

    document.addEventListener('DOMContentLoaded', (event) => {
        const yesRadio = document.getElementById('maternalTetanus_yes');
        const noRadio = document.getElementById('maternalTetanus_no');
        const givenSection = document.querySelector('.givenSection');

        function toggleSection() {
            if (yesRadio.checked) {
                givenSection.style.display = 'flex';
            } else {
                givenSection.style.display = 'none';
                document.getElementById('maternalGiven1').value = '';
                document.getElementById('maternalGiven2').value = '';
                document.getElementById('maternalGiven3').value = '';
                document.getElementById('maternalGiven4').value = '';
                document.getElementById('maternalGiven5').value = '';
                document.getElementById('maternalGivenTtl').value = '';
            }
        }

        // Set initial state
        toggleSection();

        // Add event listeners
        yesRadio.addEventListener('change', toggleSection);
        noRadio.addEventListener('change', toggleSection);
    });

    document.addEventListener('DOMContentLoaded', function() {
        const fpYesRadio = document.getElementById('maternalFp_yes');
        const fpNoRadio = document.getElementById('maternalFp_no');
        const fpMethodSection = document.getElementById('fpMethodSection');
        const fpPracSection = document.getElementById('fpPracSection');

        function toggleSections() {
            if (fpYesRadio.checked) {
                fpMethodSection.style.display = 'block';
                document.getElementById('maternalFpPrac_yes').checked = false;
                document.getElementById('maternalFpPrac_no').checked = false;
                fpPracSection.style.display = 'none';
            } else if (fpNoRadio.checked) {
                fpMethodSection.style.display = 'none';
                document.getElementById('maternalFpMethod').value = '';
                fpPracSection.style.display = 'block';
            } else {
                fpMethodSection.style.display = 'none';
                fpPracSection.style.display = 'none';
            }
        }

        fpYesRadio.addEventListener('change', toggleSections);
        fpNoRadio.addEventListener('change', toggleSections);
    });

    function toggleMaidenFields(isResident) {
        // Show or hide Maiden select/input fields based on resident status
        document.getElementById('maidenSelectContainer').style.display = isResident ? 'block' : 'none';
        document.getElementById('maidenInputContainer').style.display = isResident ? 'none' : 'block';

        // Access the Selectize instance for inputMaidenName
        const maidenSelect = $('#inputMaidenName')[0].selectize;

        // Clear the values in both fields
        document.getElementById('maternalMaiden').value = '';

        // Show/hide birthdate, occupation, and age fields
        document.getElementById('maternalBdateCon').style.display = isResident ? 'none' : 'block';
        document.getElementById('maternalOccCon').style.display = isResident ? 'none' : 'block';
        document.getElementById('maternalAgeCon').style.display = isResident ? 'none' : 'block';

        // Clear the select input if switching away from resident
        if (!isResident) {
            maidenSelect.clear();
        }
    }

    function toggleHusbandFields(isResident) {
        // Show or hide Husband select/input fields based on resident status
        document.getElementById('husbandSelectContainer').style.display = isResident ? 'block' : 'none';
        document.getElementById('husbandInputContainer').style.display = isResident ? 'none' : 'block';

        // Access the Selectize instance for inputMaternalHname
        const husbandSelect = $('#inputMaternalHname')[0].selectize;

        // Clear the values in both fields
        if (isResident) {
            husbandSelect.clear();  // Clear selected value in Selectize for resident
        } else {
            husbandSelect.clear();  // Also clear if toggling away from resident
        }
        document.getElementById('urMaternalHusband').value = '';  // Clear input field
        document.getElementById('maternalAddCon').style.display = isResident ? 'none' : 'block';
    }

    // Auto-calculate age based on birthdate
    document.getElementById('maternalBdate').addEventListener('change', function () {
        const birthdate = new Date(this.value);
        const today = new Date();
        let age = today.getFullYear() - birthdate.getFullYear();
        const monthDiff = today.getMonth() - birthdate.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthdate.getDate())) {
            age--;
        }
        document.getElementById('maternalAge').value = age;
    });

// FOR EDIT PART
    //MAIDEN SELECT
    $(document).ready(function () {
        $('#edit_inputMaidenName').selectize({
            sortField: 'text'
        });
    });
    
    //HUSBAND SELECT
    $(document).ready(function () {
        $('#edit_inputMaternalHname').selectize({
            sortField: 'text'
        });
    });
    

    document.addEventListener('DOMContentLoaded', (event) => {
        const edit_yesRadio = document.getElementById('edit_maternalTetanus_yes');
        const edit_noRadio = document.getElementById('edit_maternalTetanus_no');
        const edit_givenSection = document.querySelector('.edit_givenSection');

        function edit_toggleSection() {
            if (edit_yesRadio.checked) {
                edit_givenSection.style.display = 'flex';
            } else {
                edit_givenSection.style.display = 'none';
                document.getElementById('edit_maternalGiven1').value = '';
                document.getElementById('edit_maternalGiven2').value = '';
                document.getElementById('edit_maternalGiven3').value = '';
                document.getElementById('edit_maternalGiven4').value = '';
                document.getElementById('edit_maternalGiven5').value = '';
                document.getElementById('edit_maternalGivenTtl').value = '';
            }
        }

        // Set initial state
        edit_toggleSection();

        // Add event listeners
        edit_yesRadio.addEventListener('change', edit_toggleSection);
        edit_noRadio.addEventListener('change', edit_toggleSection);
    });

    document.addEventListener('DOMContentLoaded', function() {
        const edit_fpYesRadio = document.getElementById('edit_maternalFp_yes');
        const edit_fpNoRadio = document.getElementById('edit_maternalFp_no');
        const edit_fpMethodSection = document.getElementById('edit_fpMethodSection');
        const edit_fpPracSection = document.getElementById('edit_fpPracSection');

        function edit_toggleSections() {
            if (edit_fpYesRadio.checked) {
                edit_fpMethodSection.style.display = 'block';
                document.getElementById('edit_maternalFpPrac_yes').checked = false;
                document.getElementById('edit_maternalFpPrac_no').checked = false;
                edit_fpPracSection.style.display = 'none';
            } else if (edit_fpNoRadio.checked) {
                edit_fpMethodSection.style.display = 'none';
                document.getElementById('edit_maternalFpMethod').value = '';
                edit_fpPracSection.style.display = 'block';
            } else {
                edit_fpMethodSection.style.display = 'none';
                edit_fpPracSection.style.display = 'none';
            }
        }

        edit_fpYesRadio.addEventListener('change', edit_toggleSections);
        edit_fpNoRadio.addEventListener('change', edit_toggleSections);

        edit_toggleSections();
    });

    function edit_toggleMaidenFields(isResident) {
        // Show or hide Maiden select/input fields based on resident status
        document.getElementById('edit_maidenSelectContainer').style.display = isResident ? 'block' : 'none';
        document.getElementById('edit_maidenInputContainer').style.display = isResident ? 'none' : 'block';

        // Access the Selectize instance for inputMaidenName
        const maidenSelect = $('#edit_inputMaidenName')[0].selectize;

        // Clear the values in both fields
        document.getElementById('edit_maternalMaiden').value = '';
        document.getElementById('edit_maternalBdate').value = '';
        document.getElementById('edit_maternalAge').value = '';
        document.getElementById('edit_maternalOccupation').value = '';


        // Show/hide birthdate, occupation, and age fields
        document.getElementById('edit_maternalBdateCon').style.display = isResident ? 'none' : 'block';
        document.getElementById('edit_maternalOccCon').style.display = isResident ? 'none' : 'block';
        document.getElementById('edit_maternalAgeCon').style.display = isResident ? 'none' : 'block';

        // Clear the select input if switching away from resident
        if (!isResident) {
            maidenSelect.clear();
        }
    }

    function edit_toggleHusbandFields(isResident) {
        // Show or hide Husband select/input fields based on resident status
        document.getElementById('edit_husbandSelectContainer').style.display = isResident ? 'block' : 'none';
        document.getElementById('edit_husbandInputContainer').style.display = isResident ? 'none' : 'block';

        // Access the Selectize instance for inputMaternalHname
        const husbandSelect = $('#edit_inputMaternalHname')[0].selectize;

        // Clear the values in both fields
        if (isResident) {
            husbandSelect.clear();  // Clear selected value in Selectize for resident
        } else {
            husbandSelect.clear();  // Also clear if toggling away from resident
        }
        document.getElementById('edit_urMaternalHusband').value = '';  // Clear input field
        document.getElementById('edit_maternalAddress').value = '';

        document.getElementById('edit_maternalAddCon').style.display = isResident ? 'none' : 'block';
    }

    document.getElementById('edit_maternalBdate').addEventListener('change', function () {
        const birthdate = new Date(this.value);  // Get the selected birthdate
        const today = new Date();  // Get today's date
        let age = today.getFullYear() - birthdate.getFullYear();  // Basic year difference

        const monthDiff = today.getMonth() - birthdate.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthdate.getDate())) {
            age--;  // Subtract one if the birthday hasn't occurred yet this year
        }

        // Set the calculated age in the 'edit_maternalAge' field
        document.getElementById('edit_maternalAge').value = age;
    });

    function calculateAge(birthdate) {
        const today = new Date();
        const birthDate = new Date(birthdate);
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();

        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        return age;
    }


// CRUD
    //iNSERT
    $(function(){      
        $("#maternalF1").on('submit', function(e){
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
                        $('#maternalF1')[0].reset();

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
                error: function(xhr) 
                {
                    const alertHtml = `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle me-1"></i>
                            Failed to add new Record. Please try again. 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
                    
                    $('#alert-container').append(alertHtml);
                    // Remove alert after 3 seconds
                    setTimeout(() => 
                    {
                        $('.alert').alert('close');
                    }, 3000);
                }
            });
        });
    });
    //dISPLAY
    function openEditModal(mat_id) {
        $.ajax({
            url: `/matDisp/${mat_id}`,
            method: 'GET',
            success: function(response) {
                if (response.status === 1) 
                {
                    //Textbox
                        $('#edit_matId').val(response.data.mat_id);
                        $('#edit_maternalClinic').val(response.data.mat_clinic);
                        $('#edit_maternalBloodType').val(response.data.mat_bType);
                        $('#edit_maternalFamNum').val(response.data.mat_fNum);
                        $('#edit_maternalLmp').val(response.data.mat_lmp);
                        $('#edit_maternalEdc').val(response.data.mat_edc);
                        $('#edit_maternalG').val(response.data.mat_g);
                        $('#edit_maternalT').val(response.data.mat_t);
                        $('#edit_maternalP').val(response.data.mat_p);
                        $('#edit_maternalA').val(response.data.mat_a);
                        $('#edit_maternalL').val(response.data.mat_l);
                        $('#edit_maternalChildAl').val(response.data.mat_childAlive);
                        $('#edit_maternalLivChild').val(response.data.mat_livingChildAlive);
                        $('#edit_maternalAbort').val(response.data.mat_abortion);
                        $('#edit_maternalStillBirth').val(response.data.mat_fDeaths);
                        $('#edit_maternalOthers').val(response.data.mat_others);
                        $('#edit_maternalGiven1').val(response.data.mat_date1);
                        $('#edit_maternalGiven2').val(response.data.mat_date2);
                        $('#edit_maternalGiven3').val(response.data.mat_date3);
                        $('#edit_maternalGiven4').val(response.data.mat_date4);
                        $('#edit_maternalGiven5').val(response.data.mat_date5);
                        $('#edit_maternalGivenTtl').val(response.data.mat_total);
                        $('#edit_maternalFpMethod').val(response.data.mat_fpMethod);
                        $('#edit_empId').val(response.data.em_id);
                        $('#edit_maternalStatus').val(response.data.mat_status);


                    // Maiden
                        if (response.data.maiden_id) {
                            $('#edit_maidenSelectContainer').show();
                            $('#edit_maidenInputContainer').hide();
                            const selectizeEditInputMother = $('#edit_inputMaidenName')[0].selectize;
                            selectizeEditInputMother.setValue(response.data.maiden_id);
                        } else {
                            $('#edit_maidenSelectContainer').hide();
                            $('#edit_maidenInputContainer').show();
                            $('#edit_maternalBdateCon').show();
                            $('#edit_maternalAgeCon').show();
                            $('#edit_maternalOccCon').show();

                            $('#edit_maternalMaiden').val(response.data.mat_urMaiden);
                            $('#edit_maternalBdate').val(response.data.mat_urBdate);
                            const age = calculateAge(response.data.mat_urBdate);
                            $('#edit_maternalAge').val(age);
                            $('#edit_maternalOccupation').val(response.data.mat_urOcc);
                            $('#edit_maidenNo').prop('checked', true);
                        }

                    // Husband
                        if (response.data.husband_id) {
                            $('#edit_husbandSelectContainer').show();
                            $('#edit_husbandInputContainer').hide();
                            const selectizeEditInputFather = $('#edit_inputMaternalHname')[0].selectize;
                            selectizeEditInputFather.setValue(response.data.husband_id);
                        } else {
                            $('#edit_husbandSelectContainer').hide();
                            $('#edit_husbandInputContainer').show();
                            $('#edit_maternalAddCon').show();

                            $('#edit_urMaternalHusband').val(response.data.mat_urHusband);
                            $('#edit_maternalAddress').val(response.data.mat_urAddress);
                            $('#edit_husbandNo').prop('checked', true);
                        }

                    // Radio
                        let matRisk = response.data.mat_risk;
                        $('#edit_maternalRiskYes').prop('checked', false);
                        $('#edit_maternalRiskNo').prop('checked', false);
                        if (matRisk === 'Yes') {
                            $('#edit_maternalRiskYes').prop('checked', true);
                        } else if (matRisk === 'No') {
                            $('#edit_maternalRiskNo').prop('checked', true);
                        }

                        // Example for "mat_cSection" column (maternalCaesarian)
                        let matCSection = response.data.mat_cSection;
                        $('#edit_maternalCaesarianYes').prop('checked', false);
                        $('#edit_maternalCaesarianNo').prop('checked', false);
                        if (matCSection === 'Yes') {
                            $('#edit_maternalCaesarianYes').prop('checked', true);
                        } else if (matCSection === 'No') {
                            $('#edit_maternalCaesarianNo').prop('checked', true);
                        }

                        // Example for "mat_ppHemorr" column (maternalHemorr)
                        let matHemorrhage = response.data.mat_ppHemorr;
                        $('#edit_maternalHemorrYes').prop('checked', false);
                        $('#edit_maternalHemorrNo').prop('checked', false);
                        if (matHemorrhage === 'Yes') {
                            $('#edit_maternalHemorrYes').prop('checked', true);
                        } else if (matHemorrhage === 'No') {
                            $('#edit_maternalHemorrNo').prop('checked', true);
                        }

                        // Example for "mat_abruptio" column (maternalAbruptio)
                        let matAbruptio = response.data.mat_abruptio;
                        $('#edit_maternalAbruptioYes').prop('checked', false);
                        $('#edit_maternalAbruptioNo').prop('checked', false);
                        if (matAbruptio === 'Yes') {
                            $('#edit_maternalAbruptioYes').prop('checked', true);
                        } else if (matAbruptio === 'No') {
                            $('#edit_maternalAbruptioNo').prop('checked', true);
                        }

                        // Example for "mat_tb" column (maternalTb)
                        let matTb = response.data.mat_tb;
                        $('#edit_maternalTb_yes').prop('checked', false);
                        $('#edit_maternalTb_no').prop('checked', false);
                        if (matTb === 'Yes') {
                            $('#edit_maternalTb_yes').prop('checked', true);
                        } else if (matTb === 'No') {
                            $('#edit_maternalTb_no').prop('checked', true);
                        }

                        // Example for "mat_hd" column (maternalHeart)
                        let matHeart = response.data.mat_hd;
                        $('#edit_maternalHeart_yes').prop('checked', false);
                        $('#edit_maternalHeart_no').prop('checked', false);
                        if (matHeart === 'Yes') {
                            $('#edit_maternalHeart_yes').prop('checked', true);
                        } else if (matHeart === 'No') {
                            $('#edit_maternalHeart_no').prop('checked', true);
                        }

                        // Example for "mat_diabetes" column (maternalDiabetes)
                        let matDiabetes = response.data.mat_diabetes;
                        $('#edit_maternalDiabetes_yes').prop('checked', false);
                        $('#edit_maternalDiabetes_no').prop('checked', false);
                        if (matDiabetes === 'Yes') {
                            $('#edit_maternalDiabetes_yes').prop('checked', true);
                        } else if (matDiabetes === 'No') {
                            $('#edit_maternalDiabetes_no').prop('checked', true);
                        }

                        // Example for "mat_ba" column (maternalAsthma)
                        let matAsthma = response.data.mat_ba;
                        $('#edit_maternalAsthma_yes').prop('checked', false);
                        $('#edit_maternalAsthma_no').prop('checked', false);
                        if (matAsthma === 'Yes') {
                            $('#edit_maternalAsthma_yes').prop('checked', true);
                        } else if (matAsthma === 'No') {
                            $('#edit_maternalAsthma_no').prop('checked', true);
                        }

                        // Example for "mat_goiter" column (maternalGoiter)
                        let matGoiter = response.data.mat_goiter;
                        $('#edit_maternalGoiter_yes').prop('checked', false);
                        $('#edit_maternalGoiter_no').prop('checked', false);
                        if (matGoiter === 'Yes') {
                            $('#edit_maternalGoiter_yes').prop('checked', true);
                        } else if (matGoiter === 'No') {
                            $('#edit_maternalGoiter_no').prop('checked', true);
                        }

                        // Example for "mat_tetanus" column (maternalTetanus)
                        let matTetanus = response.data.mat_tetanus;
                        $('#edit_maternalTetanus_yes').prop('checked', false);
                        $('#edit_maternalTetanus_no').prop('checked', false);
                        if (matTetanus === 'Yes') {
                            $('#edit_maternalTetanus_yes').prop('checked', true);
                            $('#edit_givenSection').show();
                        } else if (matTetanus === 'No') {
                            $('#edit_maternalTetanus_no').prop('checked', true);
                            $('#edit_givenSection').hide();
                        }

                        // Example for "mat_fp" column (maternalFp)
                        let matFp = response.data.mat_fp;  // This is the value from the database
                        $('#edit_maternalFp_yes').prop('checked', false);
                        $('#edit_maternalFp_no').prop('checked', false);
                        if (matFp === 'Yes') {
                            $('#edit_maternalFp_yes').prop('checked', true); // Check the "Yes" radio button
                            $('#edit_fpMethodSection').show();  // Show the FP method section
                            $('#edit_fpPracSection').hide();   // Hide the "Willing to Practice" section
                        } else if (matFp === 'No') {
                            $('#edit_maternalFp_no').prop('checked', true); // Check the "No" radio button
                            $('#edit_fpMethodSection').hide();  // Hide the FP method section
                            $('#edit_fpPracSection').show();   // Show the "Willing to Practice" section
                        }

                        // Example for "mat_fpWilling" column (maternalFpPrac)
                        let matFpPrac = response.data.mat_fpWilling;
                        $('#edit_maternalFpPrac_yes').prop('checked', false);
                        $('#edit_maternalFpPrac_no').prop('checked', false);
                        if (matFpPrac === 'Yes') {
                            $('#edit_maternalFpPrac_yes').prop('checked', true);
                        } else if (matFpPrac === 'No') {
                            $('#edit_maternalFpPrac_no').prop('checked', true);
                        }
                        
                        // Checkbox
                            if (response.data.mat_riskFactor) 
                            {
                                let riskFactor = JSON.parse(response.data.mat_riskFactor);
                                $('input[name="edit_maternalRiskFactors[]"]').prop('checked', false);
                                
                                riskFactor.forEach(function(value) 
                                {
                                    $('input[name="edit_maternalRiskFactors[]"][value="' + value + '"]').prop('checked', true);
                                });
                            } 
                            else 
                            {
                                $('input[name="edit_maternalRiskFactors[]"]').prop('checked', false);
                            }
                    // Open the modal
                        $('#EditExtralargeModal').modal('show');
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
    $(document).on('submit', '#edit_maternalF1', function (e) {
        e.preventDefault(); // Prevent default form submission behavior

        var mat_id = $('#edit_matId').val(); 

        // Create a FormData object with the form fields
        var formData = new FormData();
        // TextBoxes
            formData.append('edit_matId', mat_id); // Assuming mat_id is passed or available
            formData.append('edit_maternalClinic', $('#edit_maternalClinic').val());
            formData.append('edit_maternalBloodType', $('#edit_maternalBloodType').val());
            formData.append('edit_maternalFamNum', $('#edit_maternalFamNum').val());
            formData.append('edit_maternalLmp', $('#edit_maternalLmp').val());
            formData.append('edit_maternalEdc', $('#edit_maternalEdc').val());
            formData.append('edit_maternalG', $('#edit_maternalG').val());
            formData.append('edit_maternalT', $('#edit_maternalT').val());
            formData.append('edit_maternalP', $('#edit_maternalP').val());
            formData.append('edit_maternalA', $('#edit_maternalA').val());
            formData.append('edit_maternalL', $('#edit_maternalL').val());
            formData.append('edit_maternalChildAl', $('#edit_maternalChildAl').val());
            formData.append('edit_maternalLivChild', $('#edit_maternalLivChild').val());
            formData.append('edit_maternalAbort', $('#edit_maternalAbort').val());
            formData.append('edit_maternalStillBirth', $('#edit_maternalStillBirth').val());
            formData.append('edit_maternalOthers', $('#edit_maternalOthers').val());
            formData.append('edit_maternalGiven1', $('#edit_maternalGiven1').val());
            formData.append('edit_maternalGiven2', $('#edit_maternalGiven2').val());
            formData.append('edit_maternalGiven3', $('#edit_maternalGiven3').val());
            formData.append('edit_maternalGiven4', $('#edit_maternalGiven4').val());
            formData.append('edit_maternalGiven5', $('#edit_maternalGiven5').val());
            formData.append('edit_maternalGivenTtl', $('#edit_maternalGivenTtl').val());
            formData.append('edit_maternalFpMethod', $('#edit_maternalFpMethod').val());
            formData.append('edit_empId', $('#edit_empId').val());
            formData.append('edit_maternalStatus', $('#edit_maternalStatus').val());
            // Maiden details (if applicable)
            formData.append('edit_inputMaidenName', $('#edit_inputMaidenName').val());
            formData.append('edit_maternalMaiden', $('#edit_maternalMaiden').val());
            formData.append('edit_maternalBdate', $('#edit_maternalBdate').val());
            formData.append('edit_maternalAge', $('#edit_maternalAge').val());
            formData.append('edit_maternalOccupation', $('#edit_maternalOccupation').val());

            // Husband details (if applicable)
            formData.append('edit_inputMaternalHname', $('#edit_inputMaternalHname').val());
            formData.append('edit_urMaternalHusband', $('#edit_urMaternalHusband').val());
            formData.append('edit_maternalAddress', $('#edit_maternalAddress').val());


        // FOR CHECKBOXES
            // Personal Info
                var checkRisk = [];
                    $('input[name="edit_maternalRiskFactors[]"]:checked').each(function() {
                        checkRisk.push($(this).val());
                    });
                    
                    if (checkRisk.length > 0) 
                    {
                        formData.append('edit_maternalRiskFactors', JSON.stringify(checkRisk));
                    } 
                    else 
                    {
                        formData.append('edit_maternalRiskFactors', JSON.stringify([])); 
                    }

        // FOR RADIO BUTTONS
            // Append maternal risk if selected
            var checkMatRisk = $('input[name="edit_maternalRisk"]:checked').val();
            if (checkMatRisk) {
                formData.append('edit_maternalRisk', checkMatRisk);
            }

            // Append Caesarian section if selected
            var checkCaesarian = $('input[name="edit_maternalCaesarian"]:checked').val();
            if (checkCaesarian) {
                formData.append('edit_maternalCaesarian', checkCaesarian);
            }

            // Append Hemorrhage risk if selected
            var checkHemorrhage = $('input[name="edit_maternalHemorr"]:checked').val();
            if (checkHemorrhage) {
                formData.append('edit_maternalHemorr', checkHemorrhage);
            }

            // Append Abruptio Placentae if selected
            var checkAbruptio = $('input[name="edit_maternalAbruptio"]:checked').val();
            if (checkAbruptio) {
                formData.append('edit_maternalAbruptio', checkAbruptio);
            }

            // Append Tuberculosis if selected
            var checkTb = $('input[name="edit_maternalTb"]:checked').val();
            if (checkTb) {
                formData.append('edit_maternalTb', checkTb);
            }

            // Append Heart disease if selected
            var checkHeartDisease = $('input[name="edit_maternalHeart"]:checked').val();
            if (checkHeartDisease) {
                formData.append('edit_maternalHeart', checkHeartDisease);
            }

            // Append Diabetes if selected
            var checkDiabetes = $('input[name="edit_maternalDiabetes"]:checked').val();
            if (checkDiabetes) {
                formData.append('edit_maternalDiabetes', checkDiabetes);
            }

            // Append Asthma if selected
            var checkAsthma = $('input[name="edit_maternalAsthma"]:checked').val();
            if (checkAsthma) {
                formData.append('edit_maternalAsthma', checkAsthma);
            }

            // Append Goiter if selected
            var checkGoiter = $('input[name="edit_maternalGoiter"]:checked').val();
            if (checkGoiter) {
                formData.append('edit_maternalGoiter', checkGoiter);
            }

            // Append Tetanus if selected
            var checkTetanus = $('input[name="edit_maternalTetanus"]:checked').val();
            if (checkTetanus) {
                formData.append('edit_maternalTetanus', checkTetanus);
            }

            // Append Family Planning if selected
            var checkFp = $('input[name="edit_maternalFp"]:checked').val();
            if (checkFp) {
                formData.append('edit_maternalFp', checkFp);
            }

            // Append Willing to practice Family Planning if selected
            var checkFpPrac = $('input[name="edit_maternalFpPrac"]:checked').val();
            if (checkFpPrac) {
                formData.append('edit_maternalFpPrac', checkFpPrac);
            }


                
            //END OF FORMDATA APPEND

        $.ajax({
            type: "POST",
            url: "/updateMat/" + mat_id, // URL to handle the update
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
//END OF CRUD
</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>