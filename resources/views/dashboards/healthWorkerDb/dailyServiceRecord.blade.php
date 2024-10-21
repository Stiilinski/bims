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
  
            <!-- Table with stripped rows -->
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
                                        {{-- <li><button class="dropdown-item" type="button" onclick="updateFpStatus({{ $dsrs->dsr_id }}, 'Archive')">Archive</button></li> --}}
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

      <!-- Extra Large Modal -->
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
                                {{-- <input type="hidden" name="edit_dengueId" id="edit_dengueId"> --}}
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
      </div><!-- End Extra Large Modal-->

        <!-- Extra Large Modal -->
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
                                    <input type="hidden" name="edit_dsrId" id="edit_dsrId">
                                    <label for="edit_inputPatientName" class="form-label">Patient Full Name</label>
                                    <select id="edit_inputPatientName" class="form-control" name="edit_inputPatientName" onchange="updateResidentDetails(this)">
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
        </div><!-- End Extra Large Modal-->



</main><!-- End #main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script type="text/javascript">
    // Initialize resident data from PHP
    var residentData = @json($residents);
</script>
<script>
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

    $(document).ready(function () {
        $('#edit_inputPatientName').selectize({
            sortField: 'text'
        });
    });

    $(document).ready(function () {
        $('#edit_inputMed').selectize({
            sortField: 'text'
        });
    });

    function updateResidentDetails(selectElement) {
        const selectedId = selectElement.value;

        if (selectedId) {
            const residentInfo = residentData[selectedId];

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

// CRUD
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
</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>