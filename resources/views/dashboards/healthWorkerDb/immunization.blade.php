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
        <h1>Immunization Records</h1>
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
                    <th scope="col">Family Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">BirthDate</th>
                    <th scope="col">Time</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($epi as $index => $epis)
                        </tr>
                            <td style="display: none;">{{ $epis->epi_id }}</td>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $epis->epi_lname }}</td>
                            <td>{{ $epis->epi_fname}}</td>
                            <td>{{ $epis->epi_mname }}{{ $epis->epi_suffix ? ', ' . $epis->epi_suffix : '' }}</td>
                            <td>{{ $epis->epi_bdate}}</td>
                            <td>{{ $epis->epi_time}}</td>
                            <td>{{ $epis->epi_sex }}</td>
                            <td>{{ $epis->epi_status }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('epiForm', ['epi_id' => $epis->epi_id]) }}">View</a></li>
                                        <li><button class="dropdown-item" type="button" onclick="openEditModal({{ $epis->epi_id }})">Edit</button></li>
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
                    <h5 class="modal-title">Immunization Record Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('regValidation.inputImmu') }}" class="immuForm" id="immuForm" autocomplete="off"> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Infant's Information</span>
                            </div>
                            <div class="inputArea">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="immuLname" class="col-sm-8 col-form-label">Last Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="immuLname" name="immuLname">
                                        </div>
                                        <span class="text-danger error-text immuLname_error"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="immuFname" class="col-sm-8 col-form-label">First Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="immuFname" name="immuFname">
                                        </div>
                                        <span class="text-danger error-text immuFname_error"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="immuMname" class="col-sm-8 col-form-label">Middle Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="immuMname" name="immuMname">
                                        </div>
                                        <span class="text-danger error-text immuMname_error"></span>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="immuSuffix" class="col-sm-8 col-form-label">Suffix</label>
                                        <div class="col-sm-12">
                                            <select id="immuSuffix" class="form-select" name="immuSuffix">
                                                <option value="">Select a suffix</option>
                                                <option value="Jr">Jr.</option>
                                                <option value="Sr">Sr.</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                                <option value="V">V</option>
                                            </select>
                                        </div>
                                        <span class="text-danger error-text immuSuffix_error"></span>
                                    </div>

                                    
                                    <fieldset class="col-md-2">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Sex</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuSex" id="immuMale" value="Male">
                                                <label class="form-check-label" for="immuMale">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuSex" id="immuFemale" value="Female">
                                                <label class="form-check-label" for="immuFemale">Female</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text immuSex_error"></span>
                                    </fieldset>

                                    <fieldset class="col-md-2">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">NHTS</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuNhts" id="immuNhtsYes" value="Yes">
                                                <label class="form-check-label" for="immuNhtsYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuNhts" id="immuNhtsNo" value="No">
                                                <label class="form-check-label" for="immuNhtsNo">No</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text immuNhts_error"></span>
                                    </fieldset>

                                    <div class="col-md-2">
                                        <label for="immuBday" class="col-sm-12 col-form-label">Birthday</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" id="immuBday" name="immuBday">
                                        </div>
                                        <span class="text-danger error-text immuBday_error"></span>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="immuTime" class="col-sm-12 col-form-label">Time</label>
                                        <div class="col-sm-12">
                                            <input type="time" class="form-control " id="immuTime" name="immuTime">
                                        </div>
                                        <span class="text-danger error-text immuTime_error"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="immuAddress" class="col-sm-12 col-form-label">Address</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="immuAddress" name="immuAddress">
                                        </div>
                                        <span class="text-danger error-text immuAddress_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Parent's Information</span>
                            </div>
                            <div class="inputArea">
                                <div class="row g-3">

                                    <fieldset class="col-md-12">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">
                                            Does The Mother Live Here?
                                        </legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="momLive" id="momLiveYes" value="Yes" checked>
                                                <label class="form-check-label" for="momLiveYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="momLive" id="momLiveNo" value="No">
                                                <label class="form-check-label" for="momLiveNo">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="col-md-6 pt-2" id="selectMotherContainer">
                                        <label for="inputImmuMother" class="form-label">Mother's Name</label>
                                        <select id="inputImmuMother" class="form-control" name="inputImmuMother">
                                            <option value="">Select...</option>
                                            @foreach($residents as $resident)
                                                <option value="{{ $resident->res_id }}">
                                                    {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text inputImmuMother_error"></span>
                                    </div>

                                    <div class="col-md-6" style="display: none;" id="inputMotherContainer">
                                        <label for="urMotherName" class="col-sm-8 col-form-label">Mother's Full Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="urMotherName" name="urMotherName">
                                        </div>
                                        <span class="text-danger error-text urMotherName_error"></span>
                                    </div>

                                    <div class="col-md-2" id="ageContainer">
                                        <label for="immuAge" class="col-sm-5 col-form-label">Age</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="immuAge" name="immuAge">
                                        </div>
                                        <span class="text-danger error-text immuAge_error"></span>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="immuFp" class="col-sm-8 col-form-label">FP</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="immuFp" name="immuFp">
                                        </div>
                                        <span class="text-danger error-text immuFp_error"></span>
                                    </div>

                                    <fieldset class="col-md-12">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Does The Father Live Here?</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dadLive" id="dadLiveYes" value="Yes" checked>
                                                <label class="form-check-label" for="dadLiveYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dadLive" id="dadLiveNo" value="No">
                                                <label class="form-check-label" for="dadLiveNo">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="col-md-6" id="selectFatherContainer">
                                        <label for="inputImmuFather" class="form-label">Father's Name</label>
                                        <select id="inputImmuFather" class="form-control" name="inputImmuFather">
                                            <option value="">Select...</option>
                                            @foreach($residents as $resident)
                                                <option value="{{ $resident->res_id }}">
                                                    {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text inputImmuFather_error"></span>
                                    </div>

                                    <div class="col-md-6" style="display: none;" id="inputFatherContainer">
                                        <label for="urFatherName" class="col-sm-8 col-form-label">Father's Full Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="urFatherName" name="urFatherName">
                                        </div>
                                        <span class="text-danger error-text urFatherName_error"></span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Infants's Follow Up Information</span>
                            </div>
                            <div class="inputArea">
                                <div class="row g-3">   
                                    <div class="col-md-3">
                                        <label for="immuPlaceDel" class="col-sm-8 col-form-label">Place of Delivery</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="immuPlaceDel" name="immuPlaceDel">
                                        </div>
                                        <span class="text-danger error-text immuPlaceDel_error"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="immuTtRec" class="col-sm-8 col-form-label">TT Received</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control " id="immuTtRec" name="immuTtRec">
                                        </div>
                                        <span class="text-danger error-text immuTtRec_error"></span>
                                    </div>

                                    <fieldset class="col-md-4">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Breastfeeding</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuBreastFeed" id="immuBfYes" value="Yes">
                                                <label class="form-check-label" for="immuBfYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuBreastFeed" id="immuBfTime" value="Time">
                                                <label class="form-check-label" for="immuBfTime">Time</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuBreastFeed" id="immuBfMix" value="Mix">
                                                <label class="form-check-label" for="immuBfMix">Mix</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuBreastFeed" id="immuBfNo" value="No">
                                                <label class="form-check-label" for="immuBfNo">No</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text immuBreastFeed_error"></span>
                                    </fieldset>
                                
                                    <fieldset class="col-md-2">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">New Born Screening</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuScreen" id="immuScreenYes" value="Yes">
                                                <label class="form-check-label" for="immuScreenYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuScreen" id="immuScreenNo" value="No">
                                                <label class="form-check-label" for="immuScreenNo">No</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text immuScreen_error"></span>
                                    </fieldset>

                                    <div class="col-md-3">
                                        <label for="immuDateNbs" class="col-sm-8 col-form-label">Date of NBS</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control " id="immuDateNbs" name="immuDateNbs">
                                        </div>
                                        <span class="text-danger error-text immuDateNbs_error"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="immuBirthOrder" class="col-sm-8 col-form-label">Birth Order</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control " id="immuBirthOrder" name="immuBirthOrder">
                                        </div>
                                        <span class="text-danger error-text immuBirthOrder_error"></span>
                                    </div>

                                    <div class="col-md-3" style="display: none;">
                                        <label for="immuEmp" class="col-sm-8 col-form-label">Employee</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control " id="immuEmp" name="immuEmp" value="{{ $LoggedUserInfo['em_id'] }}">
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
                </form>
            </div>
        </div>
    </div><!-- End OF SIDE A-->


    {{-- EDIT SIDE A --}}
    <div class="modal fade" id="EditExtralargeModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT Immunization Record Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="edit_immuForm" id="edit_immuForm" autocomplete="off"> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Infant's Information</span>
                            </div>
                            <div class="inputArea">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="edit_immuLname" class="col-sm-8 col-form-label">Last Name</label>
                                        <div class="col-sm-12">
                                            <input type="hidden" class="form-control" id="edit_immuId" name="edit_immuId">
                                            <input type="text" class="form-control" id="edit_immuLname" name="edit_immuLname">
                                        </div>
                                        <span class="text-danger error-text edit_immuLname_error"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_immuFname" class="col-sm-8 col-form-label">First Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_immuFname" name="edit_immuFname">
                                        </div>
                                        <span class="text-danger error-text edit_immuFname_error"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_immuMname" class="col-sm-8 col-form-label">Middle Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_immuMname" name="edit_immuMname">
                                        </div>
                                        <span class="text-danger error-text edit_immuMname_error"></span>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="edit_immuSuffix" class="col-sm-8 col-form-label">Suffix</label>
                                        <div class="col-sm-12">
                                            <select id="edit_immuSuffix" class="form-select" name="edit_immuSuffix">
                                                <option value="">Select a suffix</option>
                                                <option value="Jr">Jr.</option>
                                                <option value="Sr">Sr.</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                                <option value="V">V</option>
                                            </select>
                                        </div>
                                        <span class="text-danger error-text edit_immuSuffix_error"></span>
                                    </div>

                                    
                                    <fieldset class="col-md-2">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Sex</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_immuSex" id="edit_immuMale" value="Male">
                                                <label class="form-check-label" for="edit_immuMale">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_immuSex" id="edit_immuFemale" value="Female">
                                                <label class="form-check-label" for="edit_immuFemale">Female</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text edit_immuSex_error"></span>
                                    </fieldset>

                                    <fieldset class="col-md-2">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">NHTS</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_immuNhts" id="edit_immuNhtsYes" value="Yes">
                                                <label class="form-check-label" for="edit_immuNhtsYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_immuNhts" id="edit_immuNhtsNo" value="No">
                                                <label class="form-check-label" for="edit_immuNhtsNo">No</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text edit_immuNhts_error"></span>
                                    </fieldset>

                                    <div class="col-md-2">
                                        <label for="edit_immuBday" class="col-sm-12 col-form-label">Birthday</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" id="edit_immuBday" name="edit_immuBday">
                                        </div>
                                        <span class="text-danger error-text edit_immuBday_error"></span>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="edit_immuTime" class="col-sm-12 col-form-label">Time</label>
                                        <div class="col-sm-12">
                                            <input type="time" class="form-control " id="edit_immuTime" name="edit_immuTime">
                                        </div>
                                        <span class="text-danger error-text edit_immuTime_error"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_immuAddress" class="col-sm-12 col-form-label">Address</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_immuAddress" name="edit_immuAddress">
                                        </div>
                                        <span class="text-danger error-text edit_immuAddress_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Parent's Information</span>
                            </div>
                            <div class="inputArea">
                                <div class="row g-3">

                                    <fieldset class="col-md-12">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">
                                            Does The Mother Live Here?
                                        </legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_momLive" id="edit_momLiveYes" value="Yes" checked>
                                                <label class="form-check-label" for="edit_momLiveYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_momLive" id="edit_momLiveNo" value="No">
                                                <label class="form-check-label" for="edit_momLiveNo">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="col-md-6 pt-2" id="edit_selectMotherContainer">
                                        <label for="edit_inputImmuMother" class="form-label">Mother's Name</label>
                                        <select id="edit_inputImmuMother" class="form-control" name="edit_inputImmuMother">
                                            <option value="">Select...</option>
                                            @foreach($residents as $resident)
                                                <option value="{{ $resident->res_id }}">
                                                    {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text edit_inputImmuMother_error"></span>
                                    </div>

                                    <div class="col-md-6" style="display: none;" id="edit_inputMotherContainer">
                                        <label for="edit_urMotherName" class="col-sm-8 col-form-label">Mother's Full Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_urMotherName" name="edit_urMotherName">
                                        </div>
                                        <span class="text-danger error-text edit_urMotherName_error"></span>
                                    </div>

                                    <div class="col-md-2" id="edit_ageContainer">
                                        <label for="edit_immuAge" class="col-sm-5 col-form-label">Age</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_immuAge" name="edit_immuAge">
                                        </div>
                                        <span class="text-danger error-text edit_immuAge_error"></span>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="edit_immuFp" class="col-sm-8 col-form-label">FP</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_immuFp" name="edit_immuFp">
                                        </div>
                                        <span class="text-danger error-text edit_immuFp_error"></span>
                                    </div>

                                    <fieldset class="col-md-12">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Does The Father Live Here?</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_dadLive" id="edit_dadLiveYes" value="Yes" checked>
                                                <label class="form-check-label" for="edit_dadLiveYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_dadLive" id="edit_dadLiveNo" value="No">
                                                <label class="form-check-label" for="edit_dadLiveNo">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="col-md-6" id="edit_selectFatherContainer">
                                        <label for="edit_inputImmuFather" class="form-label">Father's Name</label>
                                        <select id="edit_inputImmuFather" class="form-control" name="edit_inputImmuFather">
                                            <option value="">Select...</option>
                                            @foreach($residents as $resident)
                                                <option value="{{ $resident->res_id }}">
                                                    {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text edit_inputImmuFather_error"></span>
                                    </div>

                                    <div class="col-md-6" style="display: none;" id="edit_inputFatherContainer">
                                        <label for="edit_urFatherName" class="col-sm-8 col-form-label">Father's Full Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_urFatherName" name="edit_urFatherName">
                                        </div>
                                        <span class="text-danger error-text edit_urFatherName_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Infants's Follow Up Information</span>
                            </div>
                            <div class="inputArea">
                                <div class="row g-3">   
                                    <div class="col-md-3">
                                        <label for="edit_immuPlaceDel" class="col-sm-8 col-form-label">Place of Delivery</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_immuPlaceDel" name="edit_immuPlaceDel">
                                        </div>
                                        <span class="text-danger error-text edit_immuPlaceDel_error"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_immuTtRec" class="col-sm-8 col-form-label">TT Received</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control " id="edit_immuTtRec" name="edit_immuTtRec">
                                        </div>
                                        <span class="text-danger error-text edit_immuTtRec_error"></span>
                                    </div>

                                    <fieldset class="col-md-4">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Breastfeeding</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_immuBreastFeed" id="edit_immuBfYes" value="Yes">
                                                <label class="form-check-label" for="edit_immuBfYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_immuBreastFeed" id="edit_immuBfTime" value="Time">
                                                <label class="form-check-label" for="edit_immuBfTime">Time</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_immuBreastFeed" id="edit_immuBfMix" value="Mix">
                                                <label class="form-check-label" for="edit_immuBfMix">Mix</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_immuBreastFeed" id="edit_immuBfNo" value="No">
                                                <label class="form-check-label" for="edit_immuBfNo">No</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text edit_immuBreastFeed_error"></span>
                                    </fieldset>
                                
                                    <fieldset class="col-md-2">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">New Born Screening</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_immuScreen" id="edit_immuScreenYes" value="Yes">
                                                <label class="form-check-label" for="edit_immuScreenYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_immuScreen" id="edit_immuScreenNo" value="No">
                                                <label class="form-check-label" for="edit_immuScreenNo">No</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text edit_immuScreen_error"></span>
                                    </fieldset>

                                    <div class="col-md-3">
                                        <label for="edit_immuDateNbs" class="col-sm-8 col-form-label">Date of NBS</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control " id="edit_immuDateNbs" name="edit_immuDateNbs">
                                        </div>
                                        <span class="text-danger error-text edit_immuDateNbs_error"></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_immuBirthOrder" class="col-sm-8 col-form-label">Birth Order</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control " id="edit_immuBirthOrder" name="edit_immuBirthOrder">
                                        </div>
                                        <span class="text-danger error-text edit_immuBirthOrder_error"></span>
                                    </div>

                                    <div class="col-md-3" style="display: none;">
                                        <label for="edit_immuEmp" class="col-sm-8 col-form-label">Employee</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control " id="edit_immuEmp" name="edit_immuEmp" value="{{ $LoggedUserInfo['em_id'] }}">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_immuStatus" class="col-sm-8 col-form-label">Status</label>
                                        <div class="col-sm-12">
                                            <select id="edit_immuStatus" class="form-select" name="edit_immuStatus">
                                                <option value="">Select a Status</option>
                                                <option value="Partially Completed">Partially Completed</option>
                                                <option value="Completed">Completed</option>
                                                <option value="Archive">Archive</option>
                                            </select>
                                        </div>
                                        <span class="text-danger error-text edit_immuStatus_error"></span>
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
                </form>
            </div>
        </div>
    </div>
    {{-- END OF EDIT SIDE A --}}

</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
// INSERT FORM
    //MOTHER SELECT
    $(document).ready(function () {
        $('#inputImmuMother').selectize({
            sortField: 'text'
        });
    });

    //FATHER SELECT
    $(document).ready(function () {
        $('#inputImmuFather').selectize({
            sortField: 'text'
        });
    });


    // Parents Residency
    $(document).ready(function() {
        // Show or hide fields based on initial state
        toggleParentFields();

        // Listen for changes on the Mother's residence radio buttons
        $('input[name="momLive"]').change(function() {
            toggleParentFields();
        });

        // Listen for changes on the Father's residence radio buttons
        $('input[name="dadLive"]').change(function() {
            toggleParentFields();
        });

        function toggleParentFields() {
            // Mother's Name toggle
            if ($('input[name="momLive"]:checked').val() === "Yes") {
                $('#selectMotherContainer').show();
                $('#inputMotherContainer').hide();
                $('#ageContainer').hide();
            } else {
                $('#selectMotherContainer').hide();
                $('#inputMotherContainer').show();
                $('#ageContainer').show();
            }

            // Father's Name toggle
            if ($('input[name="dadLive"]:checked').val() === "Yes") {
                $('#selectFatherContainer').show();
                $('#inputFatherContainer').hide();
            } else {
                $('#selectFatherContainer').hide();
                $('#inputFatherContainer').show();
            }
        }
    });
    // End of Parents Residency
// END OF INSERT FORM

// EDIT FORM
    //MOTHER SELECT
    $(document).ready(function () {
        $('#edit_inputImmuMother').selectize({
            sortField: 'text'
        });
    });

    //FATHER SELECT
    $(document).ready(function () {
        $('#edit_inputImmuFather').selectize({
            sortField: 'text'
        });
    });

    // Parents Residency
    $(document).ready(function() {
        // Show or hide fields based on initial state
        toggleParentFields();

        // Listen for changes on the Mother's residence radio buttons
        $('input[name="edit_momLive"]').change(function() {
            toggleParentFields();
        });

        // Listen for changes on the Father's residence radio buttons
        $('input[name="edit_dadLive"]').change(function() {
            toggleParentFields();
        });

        function toggleParentFields() {
            // Mother's Name toggle
            if ($('input[name="edit_momLive"]:checked').val() === "Yes") {
                $('#edit_selectMotherContainer').show();
                $('#edit_inputMotherContainer').hide();
                $('#edit_ageContainer').hide();
            } else {
                $('#edit_selectMotherContainer').hide();
                $('#edit_inputMotherContainer').show();
                $('#edit_ageContainer').show();
            }

            // Father's Name toggle
            if ($('input[name="edit_dadLive"]:checked').val() === "Yes") {
                $('#edit_selectFatherContainer').show();
                $('#edit_inputFatherContainer').hide();
            } else {
                $('#edit_selectFatherContainer').hide();
                $('#edit_inputFatherContainer').show();
            }
        }
    });
    // End of Parents Residency
// END OF EDIT FORM



    //CRUD
    //iNSERT
    $(function(){      
            $("#immuForm").on('submit', function(e){
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
                            $('#immuForm')[0].reset();

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

    //display data dstb
    function openEditModal(immu_id) {
        $.ajax({
            url: `/immuDisp/${immu_id}`,
            method: 'GET',
            success: function(response) {
                if (response.status === 1) {
                    // Set textbox values
                        $('#edit_immuId').val(response.data.epi_id);
                        $('#edit_immuLname').val(response.data.epi_lname);
                        $('#edit_immuFname').val(response.data.epi_fname);
                        $('#edit_immuMname').val(response.data.epi_mname);
                        $('#edit_immuBday').val(response.data.epi_bdate);
                        $('#edit_immuTime').val(response.data.epi_time);
                        $('#edit_immuAddress').val(response.data.epi_address);
                        $('#edit_immuAge').val(response.data.epi_motherAge);
                        $('#edit_immuFp').val(response.data.epi_fp);
                        $('#edit_immuPlaceDel').val(response.data.epi_delPlace);
                        $('#edit_immuTtRec').val(response.data.epi_ttReceived);
                        $('#edit_immuDateNbs').val(response.data.epi_dateNbs);
                        $('#edit_immuBirthOrder').val(response.data.epi_birthOrder);

                    // Set select values
                        $('#edit_immuSuffix').val(response.data.epi_suffix);
                        $('#edit_immuStatus').val(response.data.epi_status);

                    // Mother information
                        if (response.data.mother_id) {
                            $('#edit_selectMotherContainer').show();
                            $('#edit_inputMotherContainer').hide();
                            const selectizeEditInputMother = $('#edit_inputImmuMother')[0].selectize;
                            selectizeEditInputMother.setValue(response.data.mother_id);
                        } else {
                            $('#edit_selectMotherContainer').hide();
                            $('#edit_inputMotherContainer').show();
                            $('#edit_ageContainer').show();
                            $('#edit_urMotherName').val(response.data.epi_motherName);
                            $('#edit_momLiveNo').prop('checked', true);
                        }

                    // Father information
                        if (response.data.father_id) {
                            $('#edit_selectFatherContainer').show();
                            $('#edit_inputFatherContainer').hide();
                            $('#edit_dadLiveYes').prop('checked', true);
                            const selectizeEditInputFather = $('#edit_inputImmuFather')[0].selectize;
                            selectizeEditInputFather.setValue(response.data.father_id);
                        } else {
                            $('#edit_selectFatherContainer').hide();
                            $('#edit_inputFatherContainer').show();
                            $('#edit_urFatherName').val(response.data.epi_fatherName);
                            $('#edit_dadLiveNo').prop('checked', true);
                        }

                    // Set radio button values
                        $('#edit_immuMale').prop('checked', response.data.epi_sex === 'Male');
                        $('#edit_immuFemale').prop('checked', response.data.epi_sex === 'Female');
                        $('#edit_immuNhtsYes').prop('checked', response.data.epi_nhts === 'Yes');
                        $('#edit_immuNhtsNo').prop('checked', response.data.epi_nhts === 'No');
                        $('#edit_immuBfYes').prop('checked', response.data.epi_breastFeed === 'Yes');
                        $('#edit_immuBfTime').prop('checked', response.data.epi_breastFeed === 'Time');
                        $('#edit_immuBfMix').prop('checked', response.data.epi_breastFeed === 'Mix');
                        $('#edit_immuBfNo').prop('checked', response.data.epi_breastFeed === 'No');
                        $('#edit_immuScreenYes').prop('checked', response.data.epi_newBornSc === 'Yes');
                        $('#edit_immuScreenNo').prop('checked', response.data.epi_newBornSc === 'No');

                    // Open the modal
                    $('#EditExtralargeModal').modal('show');
                } else {
                    alert('Record not found');
                }
            },
            error: function() {
                alert('Failed to fetch data');
            }
        });
    }
    // uPDATE
    $(document).on('submit', '#edit_immuForm', function (e) {
        e.preventDefault(); // Prevent default form submission behavior

        var immu_id = $('#edit_immuId').val(); 

        // Create a FormData object with the form fields
        var formData = new FormData();
        // TextBoxes
            formData.append('edit_immuId', immu_id);
            formData.append('edit_immuLname', $('#edit_immuLname').val());
            formData.append('edit_immuFname', $('#edit_immuFname').val());
            formData.append('edit_immuMname', $('#edit_immuMname').val());
            formData.append('edit_immuSuffix', $('#edit_immuSuffix').val());
            formData.append('edit_immuBday', $('#edit_immuBday').val());
            formData.append('edit_immuTime', $('#edit_immuTime').val());
            formData.append('edit_immuAddress', $('#edit_immuAddress').val());
            formData.append('edit_inputImmuMother', $('#edit_inputImmuMother').val());
            formData.append('edit_urMotherName', $('#edit_urMotherName').val());
            formData.append('edit_immuAge', $('#edit_immuAge').val());
            formData.append('edit_immuFp', $('#edit_immuFp').val());
            formData.append('edit_inputImmuFather', $('#edit_inputImmuFather').val());
            formData.append('edit_urFatherName', $('#edit_urFatherName').val());
            formData.append('edit_immuPlaceDel', $('#edit_immuPlaceDel').val());
            formData.append('edit_immuTtRec', $('#edit_immuTtRec').val());
            formData.append('edit_immuDateNbs', $('#edit_immuDateNbs').val());
            formData.append('edit_immuBirthOrder', $('#edit_immuBirthOrder').val());
            formData.append('edit_immuStatus', $('#edit_immuStatus').val());

        // FOR RADIO BUTTONS
            // Sex
                var sex = $('input[name="edit_immuSex"]:checked').val();
                if (sex) {
                    formData.append('edit_immuSex', sex);
                }

            // Alcohol
                var nhts= $('input[name="edit_immuNhts"]:checked').val();
                if (nhts) {
                    formData.append('edit_immuNhts', nhts);
                }

            // Alcohol
                var bFeed= $('input[name="edit_immuBreastFeed"]:checked').val();
                if (bFeed) {
                    formData.append('edit_immuBreastFeed', bFeed);
                }
        
            // Alcohol
            var screen= $('input[name="edit_immuScreen"]:checked').val();
                if (screen) {
                    formData.append('edit_immuScreen', screen);
                }

        $.ajax({
            type: "POST",
            url: "/updateImmu/" + immu_id, // URL to handle the update
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


</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>