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
                    <th scope="col">Full Name</th>
                    <th scope="col">BirthDate</th>
                    <th scope="col">Age</th>
                    <th scope="col">Purok</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    <th>1</th>
                    <th>Stilinski</th>
                    <th>1/20/2001</th>
                    <th>22</th>
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
                    <h5 class="modal-title">Maternal Health Record Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Patient Information I.</span>
                            </div>
                            <div class="row g-3">
                                {{-- No.1 --}}
                                    <div class="col-md-6">
                                        <label for="maternalClinic" class="col-sm-8 col-form-label">Name of Clinic</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control averageField" id="maternalClinic" name="maternalClinic">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="maternalBloodType" class="col-sm-12 col-form-label">Blood Type</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control briefField" id="maternalBloodType" name="maternalBloodType">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="maternalFamNum" class="col-sm-12 col-form-label">Family No.</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control briefField" id="maternalFamNum" name="maternalFamNum">
                                        </div>
                                    </div>
                               {{-- No.2 --}} 
                                    <div class="col-md-3 pt-2">
                                        <label for="inputMaternalPName" class="form-label">Patient Full Name</label>
                                        <select id="inputMaternalPName" class="form-control" name="inputMaternalPName">
                                            <option selected disabled>Choose...</option>
                                            <option value="1">John Doe</option>
                                            <option value="2">Jane Smith</option>
                                            <option value="3">Michael Johnson</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                   
                                    <div class="col-md-3">
                                        <label for="maternalMaiden" class="col-sm-12 col-form-label">Maiden Name (For Married Women)</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control mediumField" id="maternalMaiden" name="maternalMaiden" placeholder="Family, First Middle">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="maternalBdate" class="col-sm-5 col-form-label">Birthdate</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control shortField" id="maternalBdate" name="maternalBdate" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="maternalAge" class="col-sm-5 col-form-label">Age</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control briefField" id="maternalAge" name="maternalAge" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="maternalOccupation" class="col-sm-8 col-form-label">Occupation</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control shortField" id="maternalOccupation" name="maternalOccupation" readonly>
                                        </div>
                                    </div>
                                {{-- No.3 --}}   
                                    <div class="col-md-4">
                                        <label for="inputMaternalHname" class="form-label">Husband's Name</label>
                                        <select id="inputMaternalHname" class="form-control" name="inputMaternalHname">
                                            <option selected disabled>Choose...</option>
                                            <option value="1">John Doe</option>
                                            <option value="2">Jane Smith</option>
                                            <option value="3">Michael Johnson</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="maternalAddress" class="col-sm-8 col-form-label">Address</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control mediumField" id="maternalAddress" name="maternalAddress" readonly>
                                        </div>
                                    </div>

                                    <fieldset class="col-md-4">
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
                                    </fieldset>
                                {{-- No.4 --}}  
                                    <div class="col-md-1">
                                        <label for="maternalLmp" class="col-sm-8 col-form-label">LMP</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control mediumField" id="maternalLmp" name="maternalLmp">
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="maternalEdc" class="col-sm-8 col-form-label">EDC</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control mediumField" id="maternalEdc" name="maternalEdc">
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="maternalG" class="col-sm-8 col-form-label">G</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control briefField" id="maternalG" name="maternalG">
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="maternalT" class="col-sm-8 col-form-label">T</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control briefField" id="maternalT" name="maternalT">
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="maternalP" class="col-sm-8 col-form-label">P</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control briefField" id="maternalP" name="maternalP">
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="maternalA" class="col-sm-8 col-form-label">A</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control briefField" id="maternalA" name="maternalA">
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="maternalL" class="col-sm-8 col-form-label">L</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control briefField" id="maternalL" name="maternalL">
                                        </div>
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
                                        </div>

                                        <div class="col-md-12">
                                            <label for="maternalLivChild" class="col-sm-8 col-form-label">Number of Living Children Alive</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="maternalLivChild" name="maternalLivChild">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="maternalAbort" class="col-sm-8 col-form-label">Number of Abortion</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="maternalAbort" name="maternalAbort">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="maternalStillBirth" class="col-sm-8 col-form-label">Number of Still Births/Fetal Deaths</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="maternalStillBirth" name="maternalStillBirth">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="maternalCaesarian" class="col-sm-8 col-form-label">Previous Caesarian Section</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" id="maternalCaesarian" name="maternalCaesarian">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="maternalHemorr" class="col-sm-8 col-form-label">Postpartum Hemorrhage</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="maternalHemorr" name="maternalHemorr">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="maternalAbruptio" class="col-sm-8 col-form-label">Placental Previa / Abruptio</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="maternalAbruptio" name="maternalAbruptio">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="maternalOthers" class="col-sm-8 col-form-label">Others / Specify</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="maternalOthers" name="maternalOthers">
                                            </div>
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
                                                </fieldset>
                                            </div>

                                            <div class="columnCon givenSection" style="display: none;">                                        
                                                <label for="maternalGiven" class="col-sm-8 col-form-label" style="font-size:20px;">Given</label>
                                                <div class="column mb-3">
                                                    <label for="maternalGiven1" class="col-sm-8 col-form-label">1</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control shortField" id="maternalGiven1" name="maternalGiven1">
                                                    </div>
                                                </div>
                                                <div class="column mb-3">
                                                    <label for="maternalGiven2" class="col-sm-8 col-form-label">2</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control shortField" id="maternalGiven2" name="maternalGiven2">
                                                    </div>
                                                </div>
                                                <div class="column mb-3">
                                                    <label for="maternalGiven3" class="col-sm-8 col-form-label">3</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control shortField" id="maternalGiven3" name="maternalGiven3">
                                                    </div>
                                                </div>
                                                <div class="column mb-3">
                                                    <label for="maternalGiven4" class="col-sm-8 col-form-label">4</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control shortField" id="maternalGiven4" name="maternalGiven4">
                                                    </div>
                                                </div>
                                                <div class="column mb-3">
                                                    <label for="maternalGiven5" class="col-sm-8 col-form-label">5</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control shortField" id="maternalGiven5" name="maternalGiven5">
                                                    </div>
                                                </div>
                                                <div class="column mb-3">
                                                    <label for="maternalGivenTtl" class="col-sm-8 col-form-label">TTL</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control shortField" id="maternalGivenTtl" name="maternalGivenTtl">
                                                    </div>
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
                                        </fieldset>

                                        <div id="fpMethodSection" class="col-md-12" style="display:none;">
                                            <label for="maternalFpMethod" class="col-sm-12 col-form-label">If YES, what method?</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control mediumField" id="maternalFpMethod" name="maternalFpMethod">
                                            </div>
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
        $('#inputmaternalName').select2({
            placeholder: "Choose...",
            allowClear: true
        });

        // Initialize Select2 on modal show
        $('#ExtralargeModal').on('shown.bs.modal', function () {
            $('#inputmaternalName').select2({
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

    document.addEventListener('DOMContentLoaded', (event) => {
        const yesRadio = document.getElementById('maternalTetanus_yes');
        const noRadio = document.getElementById('maternalTetanus_no');
        const givenSection = document.querySelector('.givenSection');

        function toggleSection() {
            if (yesRadio.checked) {
                givenSection.style.display = 'flex';
            } else {
                givenSection.style.display = 'none';
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
                fpPracSection.style.display = 'none';
            } else if (fpNoRadio.checked) {
                fpMethodSection.style.display = 'none';
                fpPracSection.style.display = 'block';
            } else {
                fpMethodSection.style.display = 'none';
                fpPracSection.style.display = 'none';
            }
        }

        fpYesRadio.addEventListener('change', toggleSections);
        fpNoRadio.addEventListener('change', toggleSections);
    });
</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>