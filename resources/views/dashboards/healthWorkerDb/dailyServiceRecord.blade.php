@include('layouts.headHealthWorkers')
<style>
    .card-body {
        overflow: auto;
    }
    
    .pagetitle {
        display: flex;
        justify-content: space-between;
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
    }

    .modal-body {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .personalInfo {
        display: flex;
        justify-content: space-evenly;
        width: 100%;
    }

    .inputGroup {
        display: flex;
        justify-content: flex-start;
        width: 100%;
    }

    .grpField {
        width: 100%!important;
    }

    .grpField2 {
        width: 100%!important;
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

    .inputGroup2 {
        display: flex;
        width: 100%!important;
        overflow: hidden;
        justify-content: space-between;
        align-items: center;
        
    }
    .inputField1, .inputField2 {
       width: 100%;
    }

    .inputField3 {
        display: flex;
        flex-direction: column;
    }

    .medicines {
        width: 70%!important;
    }

    .quants {
        width: 300px!important;
    }

    .signature-container {
        position: relative;
    }

    #signaturePad, #signaturePad1, #signaturePad2 {
        width: 100%;
        height: 200px;
        border: 1px solid #ccc;
    }

    .edit_signature-container {
        position: relative;
    }

    #edit_signaturePad, #edit_signaturePad1, #edit_signaturePad2 {
        width: 100%;
        height: 200px;
        border: 1px solid #ccc;
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
        <h1>Daily Service Record</h1>
        <div class="btnArea">
            <a href="{{ action('App\Http\Controllers\regValidation@dailyForm') }}" type="button" class="btn btn-primary">View Full Record</a>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">New Record</button>  
        </div>
    </div><!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
            <table class="table table-striped datatable">
                <thead>
                    <tr>
                        <th scope="col" style="display: none;">ID</th>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">BirthDate</th>
                        <th scope="col">Civil Status</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dsr as $index => $dsrs)
                        </tr>
                            <td style="display: none;">{{ $dsrs->dsr_id }}</td>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $dsrs->resident->res_lname }}, {{ $dsrs->resident->res_fname }} {{ $dsrs->resident->res_mname ?? '' }} {{ $dsrs->resident->res_suffix ?? '' }}</td>
                            <td>{{ $dsrs->resident->res_bdate}}</td>
                            <td>{{ $dsrs->resident->res_civil}}</td>
                            <td>{{ $dsrs->resident->res_sex }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><button class="dropdown-item" type="button" onclick="openEditModal({{ $dsrs->dsr_id }})">Edit</button></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>    
            </table>
        </div>
    </div>

    <!-- DSR Form -->
    <div class="modal fade" id="ExtralargeModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daily Service Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('regValidation.inputDsr')}}" class="dsrForm" id="dsrForm" autocomplete="off"> <!-- Horizontal Form -->
                @csrf
                <div class="modal-body">

                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>Patient Information</span>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="inputDate" class="col-sm-5 col-form-label">Date Visit</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputDate" name="inputDate">
                                </div>
                                <span class="text-danger error-text inputDate_error"></span>
                            </div>

                            <div class="col-md-6 pt-2">
                                <label for="inputPatientName" class="form-label">Patient Full Name</label>
                                <select id="inputPatientName" class="form-control" name="inputPatientName" onchange="updateResidentDetails(this)">
                                    <option value="">Select...</option>
                                    @foreach($residents as $resident)
                                        <option value="{{ $resident->res_id }}">
                                            {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text inputPatientName_error"></span>
                            </div>
                        
                            <div class="col-md-6">
                                <label for="inputBdate" class="col-sm-5 col-form-label">BirthDate</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputBdate" name="inputBdate" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputSex" class="col-sm-5 col-form-label">Sex</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSex" name="inputSex" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputPurok" class="col-sm-5 col-form-label">Purok</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPurok" name="inputPurok" readonly>
                                    <input type="hidden" class="form-control" id="inputEmId" name="inputEmId" value="{{ $LoggedUserInfo['em_id']}}" readonly>
                                </div>
                            </div>
                        </div> 
                    </div>  

                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>Vital Signs and Measurements</span>
                        </div>
                        <div class="row g-3">

                            <div class="col-md-3">
                                <label for="inputBp" class="col-sm-2 col-form-label">BP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputBp" name="inputBp">
                                </div>
                                <span class="text-danger error-text inputBp_error"></span>
                            </div>

                            <div class="col-md-3">
                                <label for="inputTemp" class="col-sm-2 col-form-label">Temperature</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputTemp" name="inputTemp">
                                </div>
                                <span class="text-danger error-text inputTemp_error"></span>
                            </div>

                            <div class="col-md-3">
                                <label for="inputHeight" class="col-sm-2 col-form-label">Height</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputHeight" name="inputHeight">
                                </div>
                                <span class="text-danger error-text inputHeight_error"></span>
                            </div>

                            <div class="col-md-3">
                                <label for="inputWeight" class="col-sm-2 col-form-label">Weight</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputWeight" name="inputWeight">
                                </div>
                                <span class="text-danger error-text inputWeight_error"></span>
                            </div>

                            <div class="col-md-12">
                                <label for="inputComplaints" class="col-sm-2 col-form-label">Complaints</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="inputComplaints" name="inputComplaints">
                                </div>
                                <span class="text-danger error-text inputComplaints_error"></span>
                            </div>

                        </div>
                    </div>

                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>Habit</span>
                        </div>
                        <div class="inputArea">
                            <div class="habitInfo">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Smoker</legend>
                                    <div class="col-sm-10 d-flex" style="gap: 20px;">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="smoker" id="smokerYes" value="Yes" checked>
                                        <label class="form-check-label" for="smokerYes">
                                            Yes
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="smoker" id="smokerNo" value="No">
                                        <label class="form-check-label" for="smokerNo">
                                            No
                                        </label>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text smoker_error"></span>
                                </fieldset>

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Alcohol</legend>
                                    <div class="col-sm-10 d-flex" style="gap: 20px;">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="alcohol" id="alcoholYes" value="Yes" checked>
                                        <label class="form-check-label" for="alcoholYes">
                                            Yes
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="alcohol" id="alcoholNo" value="No">
                                        <label class="form-check-label" for="alcoholNo">
                                            No
                                        </label>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text alcohol_error"></span>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>Medicine</span>
                        </div>

                        <div class="row g-3">

                            <div class="col-md-8 pt-2">
                                {{-- <input type="hidden" name="edit_dengueId" id="edit_dengueId"> --}}
                                <label for="inputMed" class="form-label">Medicine Given</label>
                                <select id="inputMed" class="form-control" name="inputMed">
                                    <option value="">Select...</option>
                                    @foreach($medicines as $medicine)
                                        <option value="{{ $medicine->med_id }}">
                                            {{ $medicine->med_id }} - {{ $medicine->med_prod }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text inputMed_error"></span>
                            </div>

                            <div class="col-md-4">
                                <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="inputQuantity" name="inputQuantity">
                                </div>
                                <span class="text-danger error-text inputQuantity_error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>Patient Signature</span>
                        </div>
                        <div class="inputArea">
                            <div class="habitInfo">
                                <div class="signature-container">
                                    <canvas id="signaturePad" name="signaturePad"></canvas>
                                    <input type="hidden" name="signature_valid" id="signature_valid" value="0">
                                    <input type="hidden" id="signaturePad_1" name="signaturePad_1">
                                    <button type="button" id="clearSignature" class="btn btn-danger mt-2">Clear</button>
                                </div>
                                <span class="text-danger error-text signature_valid_error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>LGU Signature</span>
                        </div>
                        <div class="inputArea">
                            <div class="habitInfo">
                                <div class="signature-container">
                                    <canvas id="signaturePad1" name="signaturePad1"></canvas>
                                    <input type="hidden" id="signaturePad_2" name="signaturePad_2">
                                    <button type="button" id="clearSignature1" class="btn btn-danger mt-2">Clear</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>BRGY. Signature</span>
                        </div>
                        <div class="inputArea">
                            <div class="habitInfo">
                                <div class="signature-container">
                                    <canvas id="signaturePad2" name="signaturePad2"></canvas>
                                    <input type="hidden" id="signaturePad_3" name="signaturePad_3">
                                    <button type="button" id="clearSignature2" class="btn btn-danger mt-2">Clear</button>
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
    <!-- End OF DSR A-->

    {{-- EDIT FORM --}}
    <div class="modal fade" id="EditExtralargeModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDIT Daily Service Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="edit_dsrForm" id="edit_dsrForm" autocomplete="off"> 
                @csrf
                <div class="modal-body">
                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>Patient Information</span>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="edit_inputDate" class="col-sm-5 col-form-label">Date Visit</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="edit_inputDate" name="edit_inputDate">
                                </div>
                                <span class="text-danger error-text edit_inputDate_error"></span>
                            </div>

                            <div class="col-md-6 pt-2">
                                <input type="hidden" name="edit_dsrId" id="edit_dsrId">
                                <label for="edit_inputPatientName" class="form-label">Patient Full Name</label>
                                <select id="edit_inputPatientName" class="form-control" name="edit_inputPatientName" onchange="edit_updateResidentDetails(this)">
                                    <option value="">Select...</option>
                                    @foreach($residents as $resident)
                                        <option value="{{ $resident->res_id }}">
                                            {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text edit_inputPatientName_error"></span>
                            </div>
                        
                            <div class="col-md-6">
                                <label for="edit_inputBdate" class="col-sm-5 col-form-label">BirthDate</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="edit_inputBdate" name="edit_inputBdate" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="edit_inputSex" class="col-sm-5 col-form-label">Sex</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edit_inputSex" name="edit_inputSex" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="edit_inputPurok" class="col-sm-5 col-form-label">Purok</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edit_inputPurok" name="edit_inputPurok" readonly>
                                    <input type="hidden" class="form-control" id="edit_inputEmId" name="edit_inputEmId" value="{{ $LoggedUserInfo['em_id']}}" readonly>
                                </div>
                            </div>
                        </div> 
                    </div>  

                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>Vital Signs and Measurements</span>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="edit_inputBp" class="col-sm-2 col-form-label">BP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edit_inputBp" name="edit_inputBp">
                                </div>
                                <span class="text-danger error-text edit_inputBp_error"></span>
                            </div>

                            <div class="col-md-3">
                                <label for="edit_inputTemp" class="col-sm-2 col-form-label">Temperature</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edit_inputTemp" name="edit_inputTemp">
                                </div>
                                <span class="text-danger error-text edit_inputTemp_error"></span>
                            </div>

                            <div class="col-md-3">
                                <label for="edit_inputHeight" class="col-sm-2 col-form-label">Height</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edit_inputHeight" name="edit_inputHeight">
                                </div>
                                <span class="text-danger error-text edit_inputHeight_error"></span>
                            </div>

                            <div class="col-md-3">
                                <label for="edit_inputWeight" class="col-sm-2 col-form-label">Weight</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edit_inputWeight" name="edit_inputWeight">
                                </div>
                                <span class="text-danger error-text edit_inputWeight_error"></span>
                            </div>

                            <div class="col-md-12">
                                <label for="edit_inputComplaints" class="col-sm-2 col-form-label">Complaints</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="edit_inputComplaints" name="edit_inputComplaints">
                                </div>
                                <span class="text-danger error-text edit_inputComplaints_error"></span>
                            </div>

                        </div>
                    </div>

                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>Habit</span>
                        </div>
                        <div class="inputArea">
                            <div class="habitInfo">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Smoker</legend>
                                    <div class="col-sm-10 d-flex" style="gap: 20px;">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="edit_smoker" id="edit_smokerYes" value="Yes" checked>
                                        <label class="form-check-label" for="edit_smokerYes">
                                            Yes
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="edit_smoker" id="edit_smokerNo" value="No">
                                        <label class="form-check-label" for="edit_smokerNo">
                                            No
                                        </label>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text smoker_error"></span>
                                </fieldset>

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Alcohol</legend>
                                    <div class="col-sm-10 d-flex" style="gap: 20px;">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="edit_alcohol" id="edit_alcoholYes" value="Yes" checked>
                                        <label class="form-check-label" for="edit_alcoholYes">
                                            Yes
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="edit_alcohol" id="edit_alcoholNo" value="No">
                                        <label class="form-check-label" for="edit_alcoholNo">
                                            No
                                        </label>
                                        </div>
                                    </div>
                                    <span class="text-danger error-text edit_alcohol_error"></span>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>Medicine</span>
                        </div>

                        <div class="row g-3">

                            <div class="col-md-8 pt-2">
                                {{-- <input type="hidden" name="edit_dengueId" id="edit_dengueId"> --}}
                                <label for="edit_inputMed" class="form-label">Medicine Given</label>
                                <select id="edit_inputMed" class="form-control" name="edit_inputMed">
                                    <option value="">Select...</option>
                                    @foreach($medicines as $medicine)
                                        <option value="{{ $medicine->med_id }}">
                                            {{ $medicine->med_id }} - {{ $medicine->med_prod }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text edit_inputMed_error"></span>
                            </div>

                            <div class="col-md-4">
                                <label for="edit_inputQuantity" class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="edit_inputQuantity" name="edit_inputQuantity">
                                </div>
                                <span class="text-danger error-text edit_inputQuantity_error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>Patient Signature</span>
                        </div>
                        <div class="inputArea">
                            <div class="habitInfo">
                                <div class="edit_signature-container">
                                    <canvas id="edit_signaturePad" name="edit_signaturePad"></canvas>
                                    <input type="hidden" name="edit_signature_valid" id="edit_signature_valid" value="0">
                                    <input type="hidden" id="edit_signaturePad_1" name="edit_signaturePad_1">
                                    <button type="button" id="edit_clearSignature" class="btn btn-danger mt-2">Clear</button>
                                </div>
                                <span class="text-danger error-text edit_signature_valid_error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>LGU Signature</span>
                        </div>
                        <div class="inputArea">
                            <div class="habitInfo">
                                <div class="edit_signature-container">
                                    <canvas id="edit_signaturePad1" name="edit_signaturePad1"></canvas>
                                    <input type="hidden" id="edit_signaturePad_2" name="edit_signaturePad_2">
                                    <button type="button" id="edit_clearSignature1" class="btn btn-danger mt-2">Clear</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="inputGroupContainer">
                        <div class="titleCaseFinding">
                            <span>BRGY. Signature</span>
                        </div>
                        <div class="inputArea">
                            <div class="habitInfo">
                                <div class="edit_signature-container">
                                    <canvas id="edit_signaturePad2" name="edit_signaturePad2"></canvas>
                                    <input type="hidden" id="edit_signaturePad_3" name="edit_signaturePad_3">
                                    <button type="button" id="edit_clearSignature2" class="btn btn-danger mt-2">Clear</button>
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
    {{-- END OF EDIT FORM --}}


</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script>
// ***********************************************************
    const residentData = {
        @foreach($residents as $resident)
            "{{ $resident->res_id }}": {
                res_bdate: "{{ addslashes($resident->res_bdate) }}",
                res_sex: "{{ $resident->res_sex }}",
                res_purok: "{{ $resident->res_purok }}"
            },
        @endforeach
    };

    $(document).ready(function () {
        $('#inputPatientName').selectize({
            sortField: 'text'
        });
    });

    $(document).ready(function () {
        $('#inputMed').selectize({
            sortField: 'text'
        });
    });

    function updateResidentDetails(selectElement) {
        const selectedId = selectElement.value;

        if (selectedId) {
            const residentInfo = residentData[selectedId];
            console.log('Resident Info:', residentInfo);

            if (residentInfo) {
                document.getElementById('inputBdate').value = residentInfo.res_bdate;
                document.getElementById('inputSex').value = residentInfo.res_sex;
                document.getElementById('inputPurok').value = residentInfo.res_purok;
            }
        } else {
            // Clear fields if no resident is selected
            document.getElementById('inputBdate').value = '';
            document.getElementById('inputSex').value = '';
            document.getElementById('inputPurok').value = '';
        }
    }

    const signaturePad = document.getElementById('signaturePad');
    const signatureValidInput = document.getElementById('signature_valid');
    const clearSignatureButton = document.getElementById('clearSignature');
    const errorText = document.querySelector('.signaturePad_error');

    function updateSignatureValidity() {
        const context = signaturePad.getContext('2d');
        const pixelData = context.getImageData(0, 0, signaturePad.width, signaturePad.height).data;
        const isSignatureValid = Array.from(pixelData).some(channel => channel !== 0);

        signatureValidInput.value = isSignatureValid ? '1' : '0';
    }

    signaturePad.addEventListener('mouseup', updateSignatureValidity);
    signaturePad.addEventListener('touchend', updateSignatureValidity);

    clearSignatureButton.addEventListener('click', function() {
        const context = signaturePad.getContext('2d');
        context.clearRect(0, 0, signaturePad.width, signaturePad.height);
        signatureValidInput.value = '0';
    });

    const blankSignature = signaturePad.toDataURL();
    const blankSignature1 = signaturePad1.toDataURL();
    const blankSignature2 = signaturePad2.toDataURL();

    document.getElementById('dsrForm').addEventListener('submit', function(e) {
        if (signatureValidInput.value === '0') {
            e.preventDefault();
            errorText.innerText = 'Signature is required.';
        }
        if (signaturePad.toDataURL() !== blankSignature) {
            document.getElementById('signaturePad_1').value = signaturePad.toDataURL();
        }
        if (signaturePad1.toDataURL() !== blankSignature1) {
            document.getElementById('signaturePad_2').value = signaturePad1.toDataURL();
        }
        else {
            document.getElementById('signaturePad_2').value = null;
        }
        if (signaturePad2.toDataURL() !== blankSignature2) {
            document.getElementById('signaturePad_3').value = signaturePad2.toDataURL();
        }
        else{
            document.getElementById('signaturePad_2').value = null;
        }
    });
// ***********************************************************
//*******************EDIT PART************************
    function edit_updateResidentDetails(edit_selectElement) 
    {
        const edit_selectedId = edit_selectElement.value;

        if (edit_selectedId) {
            const edit_residentInfo = residentData[edit_selectedId];
            if (edit_residentInfo) {
                
                document.getElementById('edit_inputBdate').value = edit_residentInfo.res_bdate;
                document.getElementById('edit_inputSex').value = edit_residentInfo.res_sex;
                document.getElementById('edit_inputPurok').value = edit_residentInfo.res_purok;
            }
        } else {
            // Clear fields if no resident is selected
            document.getElementById('edit_inputBdate').value = '';
            document.getElementById('edit_inputSex').value = '';
            document.getElementById('edit_inputPurok').value = '';
        }
    }


    const edit_signaturePad = document.getElementById('edit_signaturePad');
    const edit_signatureValidInput = document.getElementById('edit_signature_valid');
    const edit_clearSignatureButton = document.getElementById('edit_clearSignature');
    const edit_errorText = document.querySelector('.edit_signaturePad_error');

    function edit_updateSignatureValidity() 
    {
        const context = edit_signaturePad.getContext('2d');
        const pixelData = context.getImageData(0, 0, edit_signaturePad.width, edit_signaturePad.height).data;
        const isSignatureValid = Array.from(pixelData).some(channel => channel !== 0);

        edit_signatureValidInput.value = isSignatureValid ? '1' : '0';
    }

    edit_signaturePad.addEventListener('mouseup', edit_updateSignatureValidity);
    edit_signaturePad.addEventListener('touchend', edit_updateSignatureValidity);

    clearSignatureButton.addEventListener('click', function() {
        const context = edit_signaturePad.getContext('2d');
        context.clearRect(0, 0, edit_signaturePad.width, edit_signaturePad.height);
        edit_signatureValidInput.value = '0';
    });

    const edit_blankSignature = edit_signaturePad.toDataURL();
    const edit_blankSignature1 = edit_signaturePad1.toDataURL();
    const edit_blankSignature2 = edit_signaturePad2.toDataURL();

    document.getElementById('edit_dsrForm').addEventListener('submit', function(e) {
        if (edit_signatureValidInput.value === '0') {
            e.preventDefault();
            errorText.innerText = 'Signature is required.';
        }
        if (edit_signaturePad.toDataURL() !== edit_blankSignature) {
            document.getElementById('edit_signaturePad_1').value = edit_signaturePad.toDataURL();
        }
        if (edit_signaturePad1.toDataURL() !== edit_blankSignature1) {
            document.getElementById('edit_signaturePad_2').value = edit_signaturePad1.toDataURL();
        }
        else {
            document.getElementById('edit_signaturePad_2').value = null;
        }
        if (edit_signaturePad2.toDataURL() !== edit_blankSignature2) {
            document.getElementById('edit_signaturePad_3').value = edit_signaturePad2.toDataURL();
        }
        else{
            document.getElementById('edit_signaturePad_2').value = null;
        }
    });

    //FOR SIGNATURE EDIT
    document.addEventListener("DOMContentLoaded", function() {
        var canvas = document.getElementById('edit_signaturePad');
        var signaturePad = new SignaturePad(canvas);

        function resizeCanvas() {
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
            signaturePad.clear(); // otherwise isEmpty() might return incorrect value
        }

        // Resize canvas when modal is shown
        var modal = document.getElementById('EditExtralargeModal');
        modal.addEventListener('shown.bs.modal', function () {
            resizeCanvas();
        });

        // Resize canvas on window resize
        window.addEventListener("resize", resizeCanvas);
        
        // Clear signature pad on button click
        document.getElementById('edit_clearSignature').addEventListener('click', function() {
            signaturePad.clear();
        });
    });

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
        var modal = document.getElementById('EditExtralargeModal');
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
        var modal = document.getElementById('EditExtralargeModal');
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

//*******************END OF EDIT PART*****************

//CRUD
    //iNSERT
        $(function(){      
            $("#dsrForm").on('submit', function(e){
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
                            $('#dsrForm')[0].reset();

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
        function openEditModal(dsr_id) 
        {
            $.ajax({
                url: `/dsrDisp/${dsr_id}`,
                method: 'GET',
                success: function(response) {
                    if (response.status === 1) 
                    {
                        //Textbox
                            $('#edit_dsrId').val(response.data.dsr_id);

                            let fullName = `${response.data.resident.res_lname}, ${response.data.resident.res_fname} ${response.data.resident.res_mname ?? ''} ${response.data.resident.res_suffix ?? ''}`;
                            $('#edit_inputPatientName').val(response.data.resident.res_id);

                            $('#edit_inputDate').val(response.data.dsr_dateVisit);
                            $('#edit_inputBdate').val(response.data.resident.res_bdate);
                            $('#edit_inputSex').val(response.data.resident.res_sex);
                            $('#edit_inputPurok').val(response.data.resident.res_purok);

                            $('#edit_inputBp').val(response.data.dsr_bp);
                            $('#edit_inputTemp').val(response.data.dsr_temp);
                            $('#edit_inputHeight').val(response.data.dsr_ht);
                            $('#edit_inputWeight').val(response.data.dsr_wt);
                            $('#edit_inputComplaints').val(response.data.dsr_complaint);
                            let medName = `${response.data.medicine.med_prod}`;
                            $('#edit_inputMed').val(response.data.med_id);
                            $('#edit_inputQuantity').val(response.data.dsr_qt);
                        // Radio
                            let smoker = response.data.dsr_smoke;
                                $('#edit_smokerYes').prop('checked', false);
                                $('#edit_smokerNo').prop('checked', false);
                                if (smoker === 'Yes') {
                                    $('#edit_smokerYes').prop('checked', true);
                                } 
                                else if (smoker === 'No') {
                                    $('#edit_smokerNo').prop('checked', true);
                                }

                            let alcohol = response.data.dsr_alcohol;
                                $('#edit_alcoholYes').prop('checked', false);
                                $('#edit_alcoholNo').prop('checked', false);
                                if (alcohol === 'Yes') {
                                    $('#edit_alcoholYes').prop('checked', true);
                                } 
                                else if (alcohol === 'No') {
                                    $('#edit_alcoholNo').prop('checked', true);
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
        $(document).on('submit', '#edit_dsrForm', function (e) {
            e.preventDefault(); // Prevent default form submission behavior

            var dsr_id = $('#edit_dsrId').val(); 

            // Create a FormData object with the form fields
            var formData = new FormData();
            // TextBoxes
                formData.append('edit_dsrId', dsr_id);
                formData.append('edit_inputDate', $('#edit_inputDate').val());
                formData.append('edit_inputPatientName', $('#edit_inputPatientName').val());
                formData.append('edit_inputBp', $('#edit_inputBp').val());
                formData.append('edit_inputTemp', $('#edit_inputTemp').val());
                formData.append('edit_inputHeight', $('#edit_inputHeight').val());
                formData.append('edit_inputWeight', $('#edit_inputWeight').val());
                formData.append('edit_inputComplaints', $('#edit_inputComplaints').val());
                formData.append('edit_inputMed', $('#edit_inputMed').val());
                formData.append('edit_inputQuantity', $('#edit_inputQuantity').val());
                formData.append('edit_inputEmId', $('#edit_inputEmId').val());

            // FOR RADIO BUTTONS
                // Smoke
                    var checkSmoker = $('input[name="edit_smoker"]:checked').val();
                    if (checkSmoker) {
                        formData.append('edit_smoker', checkSmoker);
                    }

                // Alcohol
                    var checkAlcohol= $('input[name="edit_alcohol"]:checked').val();
                    if (checkAlcohol) {
                        formData.append('edit_alcohol', checkAlcohol);
                    }

            // Signature
                // Patient
                    var canvas = document.getElementById('edit_signaturePad');
                    var signature = canvas.toDataURL(); // Convert to base64

                // Append to Patient Signature
                    if (signature) {
                        formData.append('edit_signaturePad_1', signature);
                    }

                // LGU
                    var canvas1 = document.getElementById('edit_signaturePad1');
                    var signature1 = canvas1.toDataURL(); // Convert to base64

                // Append to LGU Signature
                    if (signature1) {
                        formData.append('edit_signaturePad_2', signature1);
                    }

                // BRGY
                    var canvas2 = document.getElementById('edit_signaturePad2');
                    var signature2 = canvas2.toDataURL(); // Convert to base64

                // Append to BRGY Signature
                    if (signature2) {
                        formData.append('edit_signaturePad_3', signature2);
                    }
                    
                //END OF FORMDATA APPEND

            $.ajax({
                type: "POST",
                url: "/updateDsr/" + dsr_id, // URL to handle the update
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