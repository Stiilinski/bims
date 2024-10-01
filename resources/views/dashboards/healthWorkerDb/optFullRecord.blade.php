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

    .smokersCon {
    
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

    .medicines {
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
        width: 250px;
    }

    .formGrp {
        width: 100%;
        display: flex;
        gap: 15px;
    }

    .custom-modal-width {
        max-width: 95%; 
        width: 95%;
    }

    .dataTables_wrapper {
        padding: 15px;
    }

    th {
        font-size: 12px!important;
        text-align: center!important;
    }

    td {
        font-size: 12px!important;
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
        <h1>OPT, Deworming & Vitamin A. Masterlists</h1>
        <div class="btnArea">
            <button type="button" class="btn btn-primary"><i class="bi bi-printer-fill"></i>Print</button>
        </div>
    </div><!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
            <div class="table-container">
                <table id="example" class="display">
                    <thead>
                        <tr>
                            <th rowspan="2">No.</th>
                            <th rowspan="2">Mother</th>
                            <th rowspan="2">Name of Child</th>
                            <th rowspan="2">DOB</th>
                            <th rowspan="2">SEX</th>
                            
                            <th colspan="2">AGE IN MOS</th>
                            <th colspan="2">Weight</th>
                            <th colspan="2">Height</th>
                            <th colspan="2">MUAC</th>
                            <th colspan="2">N.S</th>
                            <th colspan="2">Vitamin A.</th>
                            <th colspan="2">Deworming</th>

                            <th rowspan="2">Remarks</th>
                        </tr>
                        <tr>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>1st</th>
                            <th>2nd</th>
                            <th>1st</th>
                            <th>2nd</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($opts as $index => $opt)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $opt->resident->res_lname }}, {{ $opt->resident->res_fname }} {{ $opt->resident->res_mname ?? '' }} {{ $opt->resident->res_suffix ?? '' }}</td>
                            <td>{{ $opt->opt_childName }}</td>
                            <td>{{ $opt->opt_dob }}</td>
                            <td>{{ $opt->opt_sex }}</td>
                            <td>{{ $opt->opt_ageFirst }}</td>
                            <td>{{ $opt->opt_ageSec }}</td>
                            <td>{{ $opt->opt_wtFirst }}</td>
                            <td>{{ $opt->opt_wtSec }}</td>
                            <td>{{ $opt->opt_htFirst }}</td>
                            <td>{{ $opt->opt_htSec }}</td>
                            <td>{{ $opt->opt_muacFirst }}</td>
                            <td>{{ $opt->opt_muacSec }}</td>
                            <td>{{ $opt->opt_nsFirst }}</td>
                            <td>{{ $opt->opt_nsSec }}</td>
                            <td>{{ $opt->opt_vitFirst }}</td>
                            <td>{{ $opt->opt_vitSec }}</td>
                            <td>{{ $opt->opt_dewormtFirst }}</td>
                            <td>{{ $opt->opt_dewormSec }}</td>
                            <td>{{ $opt->opt_remarks }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
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
            <form method="POST"  class="optForm" id="optForm" autocomplete="off"> <!-- Horizontal Form -->
                @csrf
                <div class="modal-body">
                    <div class="personalInfo">
                        <div class="inputField1"> 

                            <div class="column mb-3" style="display: flex; flex-direction: column;">
                                <label for="motherName" class="form-label">Mother's Name</label>
                                <select id="motherName" class="form-select" name="motherName">
                                    <option selected disabled>Choose...</option>
                                    <option value="1">John Doe</option>
                                    <option value="2">Jane Smith</option>
                                    <option value="3">Michael Johnson</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>

                            <div class="column mb-3">
                                <label for="inputChildName" class="col-sm-5 col-form-label">Child's Name</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputChildName" name="inputChildName">
                                </div>
                            </div>
                            
                            <div class="column mb-3">
                                <label for="inputDate" class="col-sm-5 col-form-label">Date of Birth</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputDate" name="inputDate">
                                </div>
                            </div>

                            <div class="column mb-3">
                                <label for="inputSex" class="form-label">Sex</label>
                                <select id="inputSex" class="form-select" name="sex">
                                <option selected value="Male">Male</option>
                                <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="formGrp">
                                <div class="column mb-3">
                                    <label for="ageMonthFirst" class="col-sm-12 col-form-label">Age in Month (1st)</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control " id="ageMonthFirst" name="ageMonthFirst">
                                    </div>
                                </div>
                            </div>

                            <div class="formGrp">
                                <div class="column mb-3">
                                    <label for="weightFirst" class="col-sm-5 col-form-label">Weight (1st)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control " id="weightFirst" name="weightFirst">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="inputField2"> 
                            
                            <div class="formGrp">
                                <div class="column mb-3">
                                    <label for="heightFirst" class="col-sm-5 col-form-label">Height (1st)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="heightFirst" name="heightFirst">
                                    </div>
                                </div>
                            </div>

                            <div class="formGrp">
                                <div class="column mb-3">
                                    <label for="muacFirst" class="col-sm-5 col-form-label">MUAC (1st)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="muacFirst" name="muacFirst">
                                    </div>
                                </div>
                            </div>

                            <div class="formGrp">
                                <div class="column mb-3">
                                    <label for="nsFirst" class="col-sm-5 col-form-label">N.S (1st)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nsFirst" name="nsFirst">
                                    </div>
                                </div>
                            </div>

                            <div class="formGrp">
                                <div class="column mb-3">
                                    <label for="vitaminFirst" class="col-sm-5 col-form-label">Vitamin A (1st)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="vitaminFirst" name="vitaminFirst">
                                    </div>
                                </div>
                            </div>

                            <div class="formGrp">
                                <div class="column mb-3">
                                    <label for="dewormingirst" class="col-sm-5 col-form-label">Deworming (1st)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="dewormingirst" name="dewormingirst">
                                    </div>
                                </div>
                            </div>

                            <div class="column mb-3">
                                <label for="rem" class="col-sm-5 col-form-label">Remarks</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="rem" name="rem">
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
      </div><!-- End Extra Large Modal-->

        <!-- UPDATE Large Modal -->
        <div class="modal fade" id="updateOptModal" tabindex="-1" aria-labelledby="updateOptModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daily Service Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form> <!-- Horizontal Form -->
                @csrf
                    <div class="modal-body">
                        <div class="personalInfo">
                            <div class="inputField1"> 
    
                                <div class="column mb-3" style="display: flex; flex-direction: column;">
                                    <label for="motherName" class="form-label">Mother's Name</label>
                                    <select id="motherName" class="form-select" name="motherName">
                                        <option selected disabled>Choose...</option>
                                        <option value="1">John Doe</option>
                                        <option value="2">Jane Smith</option>
                                        <option value="3">Michael Johnson</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
    
                                <div class="column mb-3" style="display: flex; flex-direction: column;">
                                    <label for="childName" class="form-label">Child's Name</label>
                                    <select id="childName" class="form-select" name="childName">
                                        <option selected disabled>Choose...</option>
                                        <option value="1">John Doe</option>
                                        <option value="2">Jane Smith</option>
                                        <option value="3">Michael Johnson</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                
                                <div class="column mb-3">
                                    <label for="inputDate" class="col-sm-5 col-form-label">Date of Birth</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="inputDate" name="dateVisit">
                                    </div>
                                </div>
    
                                <div class="column mb-3">
                                    <label for="inputSex" class="form-label">Sex</label>
                                    <select id="inputSex" class="form-select" name="sex">
                                    <option selected value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    </select>
                                </div>
    
                                <div class="formGrp">
                                    <div class="column mb-3">
                                        <label for="ageMonthFirst" class="col-sm-12 col-form-label">Age in Month (1st)</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control shortForm" id="ageMonthFirst" name="ageMonthFirst">
                                        </div>
                                    </div>
    
                                    <div class="column mb-3">
                                        <label for="ageMonthSec" class="col-sm-12 col-form-label">Age in Month (2nd)</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control shortForm" id="ageMonthSec" name="ageMonthSec">
                                        </div>
                                    </div>
                                </div>
    
                                <div class="formGrp">
                                    <div class="column mb-3">
                                        <label for="weightFirst" class="col-sm-5 col-form-label">Weight (1st)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="weightFirst" name="weightFirst">
                                        </div>
                                    </div>
    
                                    <div class="column mb-3">
                                        <label for="weightSec" class="col-sm-5 col-form-label">Weight (2nd)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="weightSec" name="weightSec">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="inputField2"> 
                                
                                <div class="formGrp">
                                    <div class="column mb-3">
                                        <label for="heightFirst" class="col-sm-5 col-form-label">Height (1st)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="heightFirst" name="heightFirst">
                                        </div>
                                    </div>
    
                                    <div class="column mb-3">
                                        <label for="heightSec" class="col-sm-5 col-form-label">Height (2nd)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="heightSec" name="heightSec">
                                        </div>
                                    </div>
                                </div>
    
                                <div class="formGrp">
                                    <div class="column mb-3">
                                        <label for="muacFirst" class="col-sm-5 col-form-label">MUAC (1st)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="muacFirst" name="muacFirst">
                                        </div>
                                    </div>
    
                                    <div class="column mb-3">
                                        <label for="muacSec" class="col-sm-5 col-form-label">MUAC (2nd)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="muacSec" name="muacSec">
                                        </div>
                                    </div>
                                </div>
    
                                <div class="formGrp">
                                    <div class="column mb-3">
                                        <label for="nsFirst" class="col-sm-5 col-form-label">N.S (1st)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="nsFirst" name="nsFirst">
                                        </div>
                                    </div>
    
                                    <div class="column mb-3">
                                        <label for="nsSec" class="col-sm-5 col-form-label">N.S (2nd)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="nsSec" name="nsSec">
                                        </div>
                                    </div>
                                </div>
    
                                <div class="formGrp">
                                    <div class="column mb-3">
                                        <label for="vitaminFirst" class="col-sm-5 col-form-label">Vitamin A (1st)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="vitaminFirst" name="vitaminFirst">
                                        </div>
                                    </div>
    
                                    <div class="column mb-3">
                                        <label for="vitaminSec" class="col-sm-5 col-form-label">Vitamin A (2nd)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="vitaminSec" name="vitaminSec">
                                        </div>
                                    </div>
                                </div>
    
                                <div class="formGrp">
                                    <div class="column mb-3">
                                        <label for="dewormingirst" class="col-sm-5 col-form-label">Deworming (1st)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="dewormingirst" name="dewormingirst">
                                        </div>
                                    </div>
    
                                    <div class="column mb-3">
                                        <label for="dewormingSec" class="col-sm-5 col-form-label">Deworming A (2nd)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control shortForm" id="dewormingSec" name="dewormingSec">
                                        </div>
                                    </div>
                                </div>
    
                                <div class="column mb-3">
                                    <label for="rem" class="col-sm-5 col-form-label">Remarks</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="rem" name="rem">
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
        </div><!-- End UDPATE Large Modal-->

</main><!-- End #main -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#childName').select2({
            placeholder: "Choose...",
            allowClear: true
        });

        // Initialize Select2 on modal show
        $('#ExtralargeModal').on('shown.bs.modal', function () {
            $('#childName').select2({
                dropdownParent: $('#ExtralargeModal')
            });
        });
    });


    $(document).ready(function() {
        $('#motherName').select2({
            placeholder: "Choose...",
            allowClear: true
        });

        // Initialize Select2 on modal show
        $('#ExtralargeModal').on('shown.bs.modal', function () {
            $('#motherName').select2({
                dropdownParent: $('#ExtralargeModal')
            });
        });
    });
</script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

  @include('layouts.footerHealthWorkers')
</body>

</html>