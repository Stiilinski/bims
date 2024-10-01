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
        gap: 10px
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

    .columnCon {
        width: 100%;
        border: #dee2e6 solid 1px;
        padding: 10px;
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        justify-content: flex-start;

    }

    .rowCon {
        width: 32.8%;
        border: #dee2e6 solid 1px;
        padding: 10px;
    }

    .rowConWhole {
        width: 100%;
        border: #dee2e6 solid 1px;
        padding: 10px;
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
                    <h5 class="modal-title">Rural Health Unit Refferal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Rural Health Unit Referral Form</span>
                            </div>
                            <div class="inputArea">
                                <div class="rowFirst columnGroup familyPlaningCon"> 
                                    
                                    <div class="columnCon">

                                        <div class="column mb-3 pName">
                                            <label for="inputReferName" class="form-label">Name</label>
                                            <select id="inputReferName" class="form-select pNames" name="inputReferName">
                                                <option selected disabled>Choose...</option>
                                                <option value="1">John Doe</option>
                                                <option value="2">Jane Smith</option>
                                                <option value="3">Michael Johnson</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="referAge" class="col-sm-5 col-form-label">Age</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control briefField" id="referAge" name="referAge" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="referDob" class="col-sm-8 col-form-label">Date of Birth</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" style="width: 200px" id="referDob" name="referDob" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="referGender" class="col-sm-8 col-form-label">Gender</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 200px" id="referGender" name="referGender" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="referCivil" class="col-sm-8 col-form-label">Status</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control mediumField" id="referCivil" name="referCivil" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="referAddress" class="col-sm-8 col-form-label">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="referAddress" name="referAddress" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="referEa" class="col-sm-8 col-form-label">Education Attainment</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="referEa" name="referEa" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="referFnum" class="col-sm-8 col-form-label">Family #</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control mediumField" id="referFnum" name="referFnum">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="referFrom" class="col-sm-8 col-form-label">Reffered From</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control mediumField" id="referFrom" name="referFrom">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="referTo" class="col-sm-8 col-form-label">Reffered To</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control mediumField" id="referTo" name="referTo">
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="referSubFind" class="col-sm-8 col-form-label">Subjective Findings</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="referSubFind" name="referSubFind">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="rowCon" style="width: 100%">
                                        <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
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
                                            </div>
                                        </fieldset>

                                        <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
                                            <legend class="col-form-label col-sm-5 pt-0" style="font-size: 14px;">Dependent:</legend>
                                            <div class="col-sm-5">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="referPhDep" id="referPhDepYes" value="Yes">
                                                    <label class="form-check-label" for="referPhDepYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="referPhDep" id="rreferPhDepNo" value="No">
                                                    <label class="form-check-label" for="referPhDepMemNo">No</label>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="row mb-3" style="width: 450px; justify-content: space-between; flex-wrap:nowrap">
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

                                        <div class="column mb-3 d-flex" style="">
                                            <label for="referPhic" class="col-sm-2 col-form-label">PHIC #</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control mediumField" id="referPhic" name="referPhic">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rowCon" style="width: 100%">
                                        <b>Objective Findings</b>
                                        <div class="columnCon">
                                            <div class="column mb-3">
                                                <label for="referTemp" class="col-sm-5 col-form-label">Temp</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control shortField" id="referTemp" name="referTemp">
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="referPulse" class="col-sm-8 col-form-label">Pulse Rate</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control shortField" id="referPulse" name="referPulse" >
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="referResp" class="col-sm-8 col-form-label">Respiratory Rate</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control shortField" id="referResp" name="referResp">
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="referBp" class="col-sm-8 col-form-label">Blood Pressure</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control shortField" id="referBp" name="referBp">
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="referWeight" class="col-sm-5 col-form-label">Weight</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control shortField" id="referWeight" name="referWeight">
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="referReason" class="col-sm-5 col-form-label">Reason for Referral</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control longField" id="referReason" name="referReason">
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="referDiagnosis" class="col-sm-5 col-form-label">Diagnosis</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control longField" id="referDiagnosis" name="referDiagnosis">
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="referTreatment" class="col-sm-5 col-form-label">Treatment</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control longField" id="referTreatment" name="referTreatment">
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="referRfngLvl" class="col-sm-5 col-form-label">Referring Level</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="referRfngLvl" name="referRfngLvl">
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="referRfLvl" class="col-sm-5 col-form-label">Refered Level</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="referRfLvl" name="referRfLvl">
                                                </div>
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
        $('#inputClient').select2({
            placeholder: "Choose...",
            allowClear: true
        });

        // Initialize Select2 on modal show
        $('#ExtralargeModal').on('shown.bs.modal', function () {
            $('#inputClient').select2({
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
</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>