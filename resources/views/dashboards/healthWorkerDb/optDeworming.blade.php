@include('layouts.headHealthWorkers')
<style>
    .card-body {
        overflow: auto;
    }
    
    .pagetitle {
        display: flex;
        justify-content: space-between;
    }

    .averageField {
        width: 450px;
    }

    .inputField1, .inputField2 {
        width: 50%;
    }

    .modal-body {
        display: flex;
        flex-direction: column
    }

    .personalInfo {
        display: flex;
        justify-content: space-evenly;
    }

    .inputGroup {
        display: flex;
        justify-content: space-evenly;
    }

    .grpField {
        width: 150px!important;
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

    .grpField2 {
        width: 100%!important;
    }

    .inputGroup2 {
        display: flex;
        width: 100%!important;
        overflow: hidden;
        justify-content: space-between;
        align-items: center;
        
    }

    .opt {
        width: 70%!important;
    }

    .quants {
        width: 300px!important;
    }

    .signature-container {
        position: relative;
    }

    #signaturePad {
        width: 100%;
        height: 200px;
        border: 1px solid #ccc;
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

    .table-container {
        width: 100%;
        overflow: auto;
    }
    .dataTable thead th {
        text-align: center;
    }

    .shortForm {
        width: 100%;
    }

    .custom-modal-width {
        max-width: 95%; 
        width: 95%;
    }

    select, .selectize-input {
        width: 84%!important;
    }

    .alertCon{
        padding: 10px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .alert-success {
        width: 100%;
    } 

    .mb-3 {
        width: 100%;
    }

    .formGrp {
        width: 100%;
        display: flex;
        justify-content: flex-start;
    }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<body>

  <!-- ======= Header ======= -->
    @include('layouts.headerHealthWorkers')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('layouts.sidebarHealthWorkers')
  <!-- End Sidebar -->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>OPT, Deworming & Vitamin A. Form</h1>
        <div class="btnArea">
            <a href="{{ action('App\Http\Controllers\regValidation@optFullRecord') }}"><button type="button" class="btn btn-primary">View All Records</button></a>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">New Record</button>  
        </div>
    </div><!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
            <div class="table-container">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <th scope="col" style="display: none;">ID</th>
                            <th scope="col">No.</th>
                            <th scope="col">Mother</th>
                            <th scope="col">Name of Child</th>
                            <th scope="col">DOB</th>
                            <th scope="col">SEX</th>
                            <th scope="col">Remarks</th>
                            <th scope="col" style="display: none;">Status</th>
                            <th scope="col">Actions</th>
                            {{-- Hidden Field --}}
                                <th scope="col" style="display: none;">age1</th>
                                <th scope="col" style="display: none;">age2</th>
                                <th scope="col" style="display: none;">wt1</th>
                                <th scope="col" style="display: none;">wt2</th>
                                <th scope="col" style="display: none;">ht1</th>
                                <th scope="col" style="display: none;">ht2</th>
                                <th scope="col" style="display: none;">muac1</th>
                                <th scope="col" style="display: none;">muac2</th>
                                <th scope="col" style="display: none;">ns1</th>
                                <th scope="col" style="display: none;">ns2</th>
                                <th scope="col" style="display: none;">vit1</th>
                                <th scope="col" style="display: none;">vit2</th>
                                <th scope="col" style="display: none;">dew1</th>
                                <th scope="col" style="display: none;">dew2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($opts as $index => $opt)
                        <tr>
                            <td style="display: none;">{{ $opt->opt_id }}</td>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $opt->resident->res_lname }}, {{ $opt->resident->res_fname }} {{ $opt->resident->res_mname ?? '' }} {{ $opt->resident->res_suffix ?? '' }}</td>
                            <td>{{ $opt->opt_childName}}</td>
                            <td>{{ $opt->opt_dob }}</td>
                            <td>{{ $opt->opt_sex }}</td>
                            <td>{{ $opt->opt_remarks}}</td>
                            <td style="display: none;">{{ $opt->opt_status}}</td>
                            <td>
                                @if ($opt->opt_status === 'Completed')
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button class="dropdown-item" type="button">Edit</button></li>
                                            <li><button class="dropdown-item" type="button" onclick="updateOptStatus({{ $opt->opt_id }}, 'Archive')">Archive</button></li>
                                        </ul>
                                    </div>
                                @else
                                    <button class="btn btn-primary SecForm" type="button">2nd Form</button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button class="dropdown-item" type="button">Edit</button></li>
                                            <li><button class="dropdown-item" type="button" onclick="updateOptStatus({{ $opt->opt_id }}, 'Archive')">Archive</button></li>
                                        </ul>
                                    </div>
                                @endif
                            </td>
                            {{-- Hidden Field --}}
                                <td style="display: none;">{{ $opt->opt_ageFirst}}</td>
                                <td style="display: none;">{{ $opt->opt_ageSec}}</td>
                                <td style="display: none;">{{ $opt->opt_wtFirst}}</td>
                                <td style="display: none;">{{ $opt->opt_wtSec}}</td>
                                <td style="display: none;">{{ $opt->opt_htFirst}}</td>
                                <td style="display: none;">{{ $opt->opt_htSec}}</td>
                                <td style="display: none;">{{ $opt->opt_muacFirst}}</td>
                                <td style="display: none;">{{ $opt->opt_muacSec}}</td>
                                <td style="display: none;">{{ $opt->opt_nsFirst}}</td>
                                <td style="display: none;">{{ $opt->opt_nsSec}}</td>
                                <td style="display: none;">{{ $opt->opt_vitFirst}}</td>
                                <td style="display: none;">{{ $opt->opt_vitSec}}</td>
                                <td style="display: none;">{{ $opt->opt_dewormtFirst}}</td>
                                <td style="display: none;">{{ $opt->opt_dewormSec}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>

      <!-- First Form Modal -->
      <div class="modal fade" id="ExtralargeModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">OPT First Form</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="alertCon">
                <div id="alert-container"></div>
            </div>
            <form method="POST" action="{{ route('regValidation.inputFirstOpt')}}" class="optForm" id="optForm" autocomplete="off"> <!-- Horizontal Form -->
                @csrf
                <div class="modal-body">
                    <div class="personalInfo">
                        <div class="inputField1"> 
                            <input type="hidden" class="form-control" id="inputEmpId" name="inputEmpId" value="<?php echo $LoggedUserInfo['em_id'] ?>">
                                
                            <div class="column mb-3 pName">
                                <label for="motherName" class="form-label">Mother's Name</label>
                                <select id="motherName" class="form-control" name="motherName">
                                    <option value="">Select...</option>
                                    @foreach($residents as $resident)
                                        <option value="{{ $resident->res_id }}">
                                            {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text motherName_error"></span>
                            </div>
                            

                            <div class="column mb-3">
                                <label for="inputChildName" class="col-sm-5 col-form-label">Child's Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputChildName" name="inputChildName">
                                    <span class="text-danger error-text inputChildName_error"></span>
                                </div>
                            </div>
                            
                            <div class="column mb-3">
                                <label for="inputDate" class="col-sm-5 col-form-label">Date of Birth</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputDate" name="inputDate">
                                    <span class="text-danger error-text inputDate_error"></span>
                                </div>
                            </div>

                            <div class="column mb-3">
                                <label for="inputSex" class="form-label">Sex</label>
                                <select id="inputSex" class="form-select" name="inputSex">
                                <option selected value="Male">Male</option>
                                <option value="Female">Female</option>
                                </select>
                                <span class="text-danger error-text inputSex_error"></span>
                            </div>

                            <div class="column mb-3">
                                <label for="ageMonthFirst" class="col-sm-12 col-form-label">Age in Month (1st)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ageMonthFirst" name="ageMonthFirst">
                                    <span class="text-danger error-text ageMonthFirst_error"></span>
                                </div>
                            </div>

                            <div class="column mb-3">
                                <label for="weightFirst" class="col-sm-5 col-form-label">Weight (1st)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " id="weightFirst" name="weightFirst">
                                    <span class="text-danger error-text weightFirst_error"></span>
                                </div>
                            </div>
                            
                        </div>

                        <div class="inputField2"> 
                            <div class="column mb-3">
                                <label for="heightFirst" class="col-sm-5 col-form-label">Height (1st)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="heightFirst" name="heightFirst">
                                    <span class="text-danger error-text heightFirst_error"></span>
                                </div>
                            </div>
                        
                            <div class="column mb-3">
                                <label for="muacFirst" class="col-sm-5 col-form-label">MUAC (1st)</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="muacFirst" name="muacFirst">
                                    <span class="text-danger error-text muacFirst_error"></span>
                                </div>
                            </div>
                        
                            <div class="column mb-3">
                                <label for="nsFirst" class="col-sm-5 col-form-label">N.S (1st)</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="nsFirst" name="nsFirst">
                                    <span class="text-danger error-text nsFirst_error"></span>
                                </div>
                            </div>
                        
                            <div class="column mb-3">
                                <label for="vitaminFirst" class="col-sm-5 col-form-label">Vitamin A (1st)</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="vitaminFirst" name="vitaminFirst">
                                    <span class="text-danger error-text vitaminFirst_error"></span>
                                </div>
                            </div>
                        
                            <div class="column mb-3">
                                <label for="dewormingFirst" class="col-sm-5 col-form-label">Deworming (1st)</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="dewormingFirst" name="dewormingFirst">
                                    <span class="text-danger error-text dewormingFirst_error"></span>
                                </div>
                            </div>
                            
                            <div class="column mb-3">
                                <label for="rem" class="col-sm-5 col-form-label">Remarks</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="rem" name="rem">
                                    <span class="text-danger error-text rem_error"></span>
                                </div>
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
      </div><!-- End First Form Modal-->

        <!-- Second Form Modal -->
        <div class="modal fade" id="secondFormModal" tabindex="-1" aria-labelledby="secondFormModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">OPT Second Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="alertCon">
                    <div id="alert-container1"></div>
                </div>
                <form id="optFormSec" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="personalInfo">
                            <div class="inputField1"> 
                                <input type="hidden" class="form-control" id="inputEmpId" name="inputEmpId" value="<?php echo $LoggedUserInfo['em_id'] ?>">
                                <input type="hidden" class="form-control" id="inputOptId" name="inputOptId">
                                
                                <div class="column mb-3">
                                    <label for="childFullName" class="col-sm-12 col-form-label">Child's Full Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="childFullName" name="childFullName" readonly>
                                    </div>
                                </div>

                                <div class="column mb-3">
                                    <label for="ageMonthSec" class="col-sm-12 col-form-label">Age in Month (2nd)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="ageMonthSec" name="ageMonthSec">
                                        <span class="text-danger error-text ageMonthSec_error"></span>
                                    </div>
                                </div>
    
                                <div class="column mb-3">
                                    <label for="weightSec" class="col-sm-5 col-form-label">Weight (2nd)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control " id="weightSec" name="weightSec">
                                        <span class="text-danger error-text weightSec_error"></span>
                                    </div>
                                </div>
                                 
                                <div class="column mb-3">
                                    <label for="heightSec" class="col-sm-5 col-form-label">Height (2nd)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="heightSec" name="heightSec">
                                        <span class="text-danger error-text heightSec_error"></span>
                                    </div>
                                </div>

                                <div class="column mb-3">
                                    <label for="muacSec" class="col-sm-5 col-form-label">MUAC (2nd)</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="muacSec" name="muacSec">
                                        <span class="text-danger error-text muacSec_error"></span>
                                    </div>
                                </div>
                            </div>
    
                            <div class="inputField2">
                                <div class="column mb-3">
                                    <label for="nsSec" class="col-sm-5 col-form-label">N.S (2nd)</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="nsSec" name="nsSec">
                                        <span class="text-danger error-text nsSec_error"></span>
                                    </div>
                                </div>
                            
                                <div class="column mb-3">
                                    <label for="vitaminSec" class="col-sm-5 col-form-label">Vitamin A (2nd)</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="vitaminSec" name="vitaminSec">
                                        <span class="text-danger error-text vitaminSec_error"></span>
                                    </div>
                                </div>
                            
                                <div class="column mb-3">
                                    <label for="dewormingSec" class="col-sm-5 col-form-label">Deworming (2nd)</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="dewormingSec" name="dewormingSec">
                                        <span class="text-danger error-text dewormingSec_error"></span>
                                    </div>
                                </div>

                                <div class="column mb-3">
                                    <label for="remarkSec" class="col-sm-5 col-form-label">Remark</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="remarkSec" name="remarkSec">
                                        <span class="text-danger error-text remarkSec_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div><!-- End Second Form Modal-->

        <!-- UPDATE Large Modal -->
        <div class="modal fade" id="editOptModal" tabindex="-1" aria-labelledby="editOptModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT OPT Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="alertCon">
                    <div id="alert-container2"></div>
                </div>
                <form id="editOptForm" autocomplete="off"> <!-- Horizontal Form -->
                @csrf
                    <div class="modal-body">
                        <div class="personalInfo">
                            <div class="inputField1"> 

                                <input type="hidden" class="form-control" id="edit_inputOptId" name="edit_inputOptId" readonly>
                                            
                                <div class="column mb-3">
                                    <label for="edit_motherName" class="form-label">Mother's Name</label>
                                    <select id="edit_motherName" class="form-control" name="edit_motherName">
                                        <option value="">Select...</option>
                                        @foreach($residents as $resident)
                                            <option value="{{ $resident->res_id }}">
                                                {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text edit_motherName_error"></span>
                                </div>
                                
                                <div class="column mb-3">
                                    <label for="edit_motherNameTxt" class="col-sm-5 col-form-label">Mother's Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="edit_motherNameTxt" name="edit_motherNameTxt" readonly>
                                        <span class="text-danger error-text edit_motherNameTxt_error"></span>
                                    </div>
                                </div>

                                <div class="column mb-3">
                                    <label for="edit_inputChildName" class="col-sm-5 col-form-label">Child's Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="edit_inputChildName" name="edit_inputChildName">
                                        <span class="text-danger error-text edit_inputChildName_error"></span>
                                    </div>
                                </div>
                                
                                <div class="column mb-3">
                                    <label for="edit_inputDate" class="col-sm-5 col-form-label">Date of Birth</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="edit_inputDate" name="edit_inputDate">
                                        <span class="text-danger error-text edit_inputDate_error"></span>
                                    </div>
                                </div>
    
                                <div class="column mb-3">
                                    <label for="edit_inputSex" class="form-label">Sex</label>
                                    <select id="edit_inputSex" class="form-select" name="edit_inputSex">
                                    <option selected value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    </select>
                                    <span class="text-danger error-text edit_inputSex_error"></span>
                                </div>
    
                                <div class="formGrp">
                                    <div class="column mb-3">
                                        <label for="edit_ageMonthFirst" class="col-sm-12 col-form-label">Age in Month (1st)</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control shortForm" id="edit_ageMonthFirst" name="edit_ageMonthFirst">
                                            <span class="text-danger error-text edit_ageMonthFirst_error"></span>
                                        </div>
                                    </div>
    
                                    <div class="column mb-3">
                                        <label for="edit_ageMonthSec" class="col-sm-12 col-form-label">Age in Month (2nd)</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control shortForm" id="edit_ageMonthSec" name="edit_ageMonthSec">
                                            <span class="text-danger error-text edit_ageMonthSec_error"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="formGrp">
                                    <div class="column mb-3">
                                        <label for="edit_weightFirst" class="col-sm-8 col-form-label">Weight (1st)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="edit_weightFirst" name="edit_weightFirst">
                                            <span class="text-danger error-text edit_weightFirst_error"></span>
                                        </div>
                                    </div>
    
                                    <div class="column mb-3">
                                        <label for="edit_weightSec" class="col-sm-8 col-form-label">Weight (2nd)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="edit_weightSec" name="edit_weightSec">
                                            <span class="text-danger error-text edit_weightSec_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="inputField2"> 
                                
                                <div class="formGrp">
                                    <div class="column mb-3">
                                        <label for="edit_heightFirst" class="col-sm-5 col-form-label">Height (1st)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="edit_heightFirst" name="edit_heightFirst">
                                            <span class="text-danger error-text edit_heightFirst_error"></span>
                                        </div>
                                    </div>
    
                                    <div class="column mb-3">
                                        <label for="edit_heightSec" class="col-sm-8 col-form-label">Height (2nd)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="edit_heightSec" name="edit_heightSec">
                                            <span class="text-danger error-text edit_heightSec_error"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="formGrp">
                                    <div class="column mb-3">
                                        <label for="edit_muacFirst" class="col-sm-5 col-form-label">MUAC (1st)</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control shortForm" id="edit_muacFirst" name="edit_muacFirst">
                                            <span class="text-danger error-text edit_muacFirst_error"></span>
                                        </div>
                                    </div>
    
                                    <div class="column mb-3">
                                        <label for="edit_muacSec" class="col-sm-8 col-form-label">MUAC (2nd)</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control shortForm" id="edit_muacSec" name="edit_muacSec">
                                            <span class="text-danger error-text edit_muacSec_error"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="formGrp">
                                    <div class="column mb-3">
                                        <label for="edit_nsFirst" class="col-sm-5 col-form-label">N.S (1st)</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control shortForm" id="edit_nsFirst" name="edit_nsFirst">
                                            <span class="text-danger error-text edit_nsFirst_error"></span>
                                        </div>
                                    </div>
    
                                    <div class="column mb-3">
                                        <label for="edit_nsSec" class="col-sm-5 col-form-label">N.S (2nd)</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control shortForm" id="edit_nsSec" name="edit_nsSec">
                                            <span class="text-danger error-text edit_nsSec_error"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="formGrp">
                                    <div class="column mb-3">
                                        <label for="edit_vitaminFirst" class="col-sm-8 col-form-label">Vitamin A (1st)</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control shortForm" id="edit_vitaminFirst" name="edit_vitaminFirst">
                                            <span class="text-danger error-text edit_vitaminFirst_error"></span>
                                        </div>
                                    </div>
    
                                    <div class="column mb-3">
                                        <label for="edit_vitaminSec" class="col-sm-8 col-form-label">Vitamin A (2nd)</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control shortForm" id="edit_vitaminSec" name="edit_vitaminSec">
                                            <span class="text-danger error-text edit_vitaminSec_error"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="formGrp">
                                    <div class="column mb-3">
                                        <label for="edit_dewormingFirst" class="col-sm-8 col-form-label">Deworming (1st)</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control shortForm" id="edit_dewormingFirst" name="edit_dewormingFirst">
                                            <span class="text-danger error-text edit_dewormingirst_error"></span>
                                        </div>
                                    </div>
    
                                    <div class="column mb-3">
                                        <label for="edit_dewormingSec" class="col-sm-8 col-form-label">Deworming (2nd)</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control shortForm" id="edit_dewormingSec" name="edit_dewormingSec">
                                            <span class="text-danger error-text edit_dewormingSec_error"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="column mb-3">
                                    <label for="edit_rem" class="col-sm-5 col-form-label">Remarks</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="edit_rem" name="edit_rem">
                                        <span class="text-danger error-text edit_rem_error"></span>
                                    </div>
                                </div>

                                <div class="column mb-3">
                                    <label for="edit_status" class="form-label">Status</label>
                                    <select id="edit_status" class="form-select" name="edit_status">
                                    <option value="Completed">Completed</option>
                                    <option value="Partially Completed">Partially Completed</option>
                                    </select>
                                    <span class="text-danger error-text edit_status_error"></span>
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
        </div><!-- End UDPATE Large Modal-->

</main><!-- End #main -->
{{-- script cdn --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
{{-- End of script cdn --}}
<script>
function calculateAgeInMonthsAndDays(dob) {
    const currentDate = new Date();  // Get today's date
    const dobDate = new Date(dob);   // Convert the DOB string to a Date object
    
    // Calculate difference in months
    let ageMonths = currentDate.getFullYear() * 12 + currentDate.getMonth() - (dobDate.getFullYear() * 12 + dobDate.getMonth());
    
    // Calculate the difference in days
    const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 0).getDate();  // Number of days in the current month
    const dayOfMonth = currentDate.getDate();
    const dobDay = dobDate.getDate();
    
    const days = dayOfMonth - dobDay;
    
    // If the DOB day is greater than today's day, subtract a full month
    if (dobDay > dayOfMonth) {
        ageMonths--;
    }
    
    // Now calculate the fractional part of the month for the remaining days
    const fractionOfMonth = days / daysInMonth;
    
    // Combine months and fractional part
    const ageInDecimal = ageMonths + fractionOfMonth;
    
    return ageInDecimal.toFixed(1);  // Return age with one decimal place
}

// Event listener for DOB input field
document.getElementById('inputDate').addEventListener('change', function() {
    const dob = this.value;  // Get the selected date of birth
    if (dob) {
        const age = calculateAgeInMonthsAndDays(dob);  // Calculate the age
        document.getElementById('ageMonthFirst').value = age;  // Set the value of the age field
    }
});



    //insert opt first form
    $(function(){      
        $("#optForm").on('submit', function(e){
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
                        $('#optForm')[0].reset();

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
    
    //open opt second form
    $(document).on('click', '.SecForm:contains("2nd Form")', function() {
        // Get the current row data
        var row = $(this).closest('tr');
        var opt_id = row.find('td:eq(0)').text();
        var opt_childName = row.find('td:eq(3)').text();
        var opt_remark = row.find('td:eq(6)').text();
        
        // Populate the modal fields with the selected data
        $('#inputOptId').val(opt_id);
        $('#childFullName').val(opt_childName);
        $('#remarkSec').val(opt_remark);
        // Show the modal
        $('#secondFormModal').modal('show');
    });

    //update opt second form
    $(document).on('submit', '#optFormSec', function (e) {
        e.preventDefault(); // Prevent default form submission behavior

        var opt_id = $('#inputOptId').val(); 

        // Create a FormData object with the form fields
        var formData = new FormData();
        formData.append('opt_id', opt_id);
        formData.append('ageMonthSec', $('#ageMonthSec').val()); // Use 'ageMonthSec' as expected in the controller
        formData.append('weightSec', $('#weightSec').val());     // Use 'weightSec'
        formData.append('heightSec', $('#heightSec').val());     // Use 'heightSec'
        formData.append('muacSec', $('#muacSec').val());         // Use 'muacSec'
        formData.append('nsSec', $('#nsSec').val());             // Use 'nsSec'
        formData.append('vitaminSec', $('#vitaminSec').val());   // Use 'vitaminSec'
        formData.append('dewormingSec', $('#dewormingSec').val());// Use 'dewormingSec'
        formData.append('remarkSec', $('#remarkSec').val());     // Use 'remarkSec'
        
        $.ajax({
            type: "POST",
            url: "/update-optSec/" + opt_id, // URL to handle the update
            data: formData,
            dataType: "json",
            contentType: false, // Needed for FormData
            processData: false, // Needed for FormData
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
            },
            success: function(response) {
                if (response.status === 400) {
                    $('#alert-container1').html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i> Validation Error. Please check the fields.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                } else if (response.status === 404) {
                    $('#alert-container1').html(`
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i> OPT Not Found.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                } else {
                    $('#alert-container1').html(`
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

    //open Edit opt 
    $(document).on('click', '.dropdown-item:contains("Edit")', function() {
        // Get the current row data
        var row = $(this).closest('tr');
        
        var opt_id = row.find('td:eq(0)').text();
        var opt_motherName = row.find('td:eq(2)').text();
        var opt_childName = row.find('td:eq(3)').text();
        var opt_dob = row.find('td:eq(4)').text();
        var opt_sex = row.find('td:eq(5)').text();
        var opt_age1 = row.find('td:eq(9)').text();
        var opt_age2 = row.find('td:eq(10)').text();
        var opt_wt1 = row.find('td:eq(11)').text();
        var opt_wt2 = row.find('td:eq(12)').text();
        var opt_ht1 = row.find('td:eq(13)').text();
        var opt_ht2 = row.find('td:eq(14)').text();
        var opt_muac1 = row.find('td:eq(15)').text();
        var opt_muac2 = row.find('td:eq(16)').text();
        var opt_ns1 = row.find('td:eq(17)').text();
        var opt_ns2 = row.find('td:eq(18)').text();
        var opt_vit1 = row.find('td:eq(19)').text();
        var opt_vit2 = row.find('td:eq(20)').text();
        var opt_dew1 = row.find('td:eq(21)').text();
        var opt_dew2 = row.find('td:eq(22)').text();
        var opt_remark = row.find('td:eq(6)').text();
        var opt_status = row.find('td:eq(7)').text();

        // Populate the modal fields with the selected data
        $('#edit_inputOptId').val(opt_id);
        
        // Other fields
        $('#edit_motherNameTxt').val(opt_motherName);
        $('#edit_inputChildName').val(opt_childName);
        $('#edit_inputDate').val(opt_dob);
        $('#edit_inputSex').val(opt_sex);
        $('#edit_ageMonthFirst').val(opt_age1);
        $('#edit_ageMonthSec').val(opt_age2);
        $('#edit_weightFirst').val(opt_wt1);
        $('#edit_weightSec').val(opt_wt2);
        $('#edit_heightFirst').val(opt_ht1);
        $('#edit_heightSec').val(opt_ht2);
        $('#edit_muacFirst').val(opt_muac1);
        $('#edit_muacSec').val(opt_muac2);
        $('#edit_nsFirst').val(opt_ns1);
        $('#edit_nsSec').val(opt_ns2);
        $('#edit_vitaminFirst').val(opt_vit1);
        $('#edit_vitaminSec').val(opt_vit2);
        $('#edit_dewormingFirst').val(opt_dew1);
        $('#edit_dewormingSec').val(opt_dew2);
        $('#edit_rem').val(opt_remark);
        $('#edit_status').val(opt_status);
        // Show the modal
        $('#editOptModal').modal('show');
    });

    //Edit opt 
    $(document).on('submit', '#editOptForm', function (e) {
        e.preventDefault(); // Prevent default form submission behavior

        var opt_id = $('#edit_inputOptId').val(); 

        // Create a FormData object with the form fields
        var formData = new FormData();
        formData.append('edit_inputOptId', $('#edit_inputOptId').val());
        formData.append('edit_motherName', $('#edit_motherName').val()); 
        formData.append('edit_inputChildName', $('#edit_inputChildName').val());
        formData.append('edit_inputDate', $('#edit_inputDate').val()); 
        formData.append('edit_inputSex', $('#edit_inputSex').val());
        formData.append('edit_ageMonthFirst', $('#edit_ageMonthFirst').val()); 
        formData.append('edit_ageMonthSec', $('#edit_ageMonthSec').val());
        formData.append('edit_weightFirst', $('#edit_weightFirst').val()); 
        formData.append('edit_weightSec', $('#edit_weightSec').val());
        formData.append('edit_heightFirst', $('#edit_heightFirst').val()); 
        formData.append('edit_heightSec', $('#edit_heightSec').val());  
        formData.append('edit_muacFirst', $('#edit_muacFirst').val()); 
        formData.append('edit_muacSec', $('#edit_muacSec').val());  
        formData.append('edit_nsFirst', $('#edit_nsFirst').val()); 
        formData.append('edit_nsSec', $('#edit_nsSec').val());  
        formData.append('edit_vitaminFirst', $('#edit_vitaminFirst').val()); 
        formData.append('edit_vitaminSec', $('#edit_vitaminSec').val()); 
        formData.append('edit_dewormingFirst', $('#edit_dewormingFirst').val()); 
        formData.append('edit_dewormingSec', $('#edit_dewormingSec').val()); 
        formData.append('edit_rem', $('#edit_rem').val());
        formData.append('edit_status', $('#edit_status').val());

        $.ajax({
            type: "POST",
            url: "/edit-optForm/" + opt_id, // URL to handle the update
            data: formData,
            dataType: "json",
            contentType: false, // Needed for FormData
            processData: false, // Needed for FormData
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
            },
            success: function(response) {
                if (response.status === 400) {
                    $('#alert-container2').html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i> Validation Error. Please check the fields.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                } else if (response.status === 404) {
                    $('#alert-container2').html(`
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i> OPT Not Found.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                } else {
                    $('#alert-container2').html(`
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
    function updateOptStatus(optId, newStatus) 
    {
        fetch('/update-opt-status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure you include the CSRF token for security
            },
            body: JSON.stringify({
                id: optId,
                status: newStatus
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('OPT status updated successfully');
                location.reload(); // Optionally, reload the page to reflect the changes
            } else {
                alert('Failed to update OPT status');
            }
        })
        .catch(error => console.error('Error:', error));
    }



    $(document).ready(function () {
        $('#motherName').selectize({
            sortField: 'text'
        });
    });

    $(document).ready(function () {
        $('#edit_motherName').selectize({
            sortField: 'text'
        });
    });
    
    function setCurrentDate() {
        // Get current date in Asia/Manila timezone
        var options = { timeZone: 'Asia/Manila', year: 'numeric', month: '2-digit', day: '2-digit' };
        var currentDate = new Date().toLocaleDateString('en-PH', options).split('/');

        // Rearrange to YYYY-MM-DD format
        var formattedDate = `${currentDate[2]}-${currentDate[0]}-${currentDate[1]}`;

        document.getElementById('muacFirst').value = formattedDate;
        document.getElementById('nsFirst').value = formattedDate;
        document.getElementById('vitaminFirst').value = formattedDate;
        document.getElementById('dewormingFirst').value = formattedDate;

        document.getElementById('muacSec').value = formattedDate;
        document.getElementById('nsSec').value = formattedDate;
        document.getElementById('vitaminSec').value = formattedDate;
        document.getElementById('dewormingSec').value = formattedDate;
    }

    window.onload = function() {
        setCurrentDate();
    };
</script>
  @include('layouts.footerHealthWorkers')
</body>

</html>