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
            <button type="button" class="btn btn-primary">View Full Record</button>
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
                    <th scope="col">Date Visit</th>
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
            <form> <!-- Horizontal Form -->
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
                                    <input type="date" class="form-control" id="inputDate" name="dateVisit">
                                </div>
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
                                    <input type="date" class="form-control" id="inputBdate" name="bDate" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputSex" class="col-sm-5 col-form-label">Sex</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSex" name="sex" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputPurok" class="col-sm-5 col-form-label">Purok</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPurok" name="purok" readonly>
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
                                    <input type="text" class="form-control" id="inputBp" name="bP">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputTemp" class="col-sm-2 col-form-label">Temperature</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputTemp" name="temp">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputHeight" class="col-sm-2 col-form-label">Height</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputHeight" name="ht">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputWeight" class="col-sm-2 col-form-label">Weight</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputWeight" name="wt">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="inputComplaints" class="col-sm-2 col-form-label">Complaints</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="inputComplaints" name="complaints">
                                </div>
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
                                    <input type="number" class="form-control" id="inputQuantity" name="quantity">
                                </div>
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
                                    <button type="button" id="clearSignature" class="btn btn-danger mt-2">Clear</button>
                                </div>
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
                                    <button type="button" id="clearSignature" class="btn btn-danger mt-2">Clear</button>
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
                                    <button type="button" id="clearSignature" class="btn btn-danger mt-2">Clear</button>
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

</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>