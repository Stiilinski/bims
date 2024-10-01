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

    .wrapGroup {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .rowGroup {
        display: flex;
        justify-content: space-evenly;
        gap: 10px;
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
        /* border: #dee2e6 solid 1px; */
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
        display: flex;
        justify-content: space-between
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

    .ifYes, .ifNo {
        display: none;
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
        <h1>Dengue</h1>
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
                    <th scope="col">Status</th>
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
                    <th>Recover</th>
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
                    <h5 class="modal-title">Epidemiological Questionaire For Dengue Hemorrhagic Fever</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Dengue Form</span>
                            </div>
                            <div class="inputArea">
                                <div class="rowFirst columnGroup familyPlaningCon"> 
                                    
                                    <div class="columnCon">

                                        <div class="column mb-3 pName">
                                            <label for="dengueFullName" class="form-label">Name</label>
                                            <select id="dengueFullName" class="form-select pNames" name="dengueFullName">
                                                <option selected disabled>Choose...</option>
                                                <option value="1">John Doe</option>
                                                <option value="2">Jane Smith</option>
                                                <option value="3">Michael Johnson</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="dengueDOB" class="col-sm-8 col-form-label">Date of Birth</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" style="width: 200px" id="dengueDOB" name="dengueDOB" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="dengueAge" class="col-sm-5 col-form-label">Age</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control briefField" id="dengueAge" name="dengueAge" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="dengueSex" class="col-sm-8 col-form-label">Sex</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 200px" id="dengueSex" name="dengueSex" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="dengueStatus" class="col-sm-8 col-form-label">Status</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control mediumField" id="dengueStatus" name="dengueStatus" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="dengueAddress" class="col-sm-8 col-form-label">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="dengueAddress" name="dengueAddress" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="dengueOcc" class="col-sm-8 col-form-label">Occupation</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="dengueOcc" name="dengueOcc" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Dengue Symptoms</span>
                            </div>
                            <div class="inputArea">
                                <div class="rowFirst columnGroup familyPlaningCon">                                                
                                    <div class="columnCon" style="width: 100%">                                       
                                            <div class="column mb-3">
                                                <label for="dengueDateSymp" class="col-sm-8 col-form-label">Date of Onset Symptoms</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control mediumField" id="dengueDateSymp" name="dengueDateSymp">
                                                </div>
                                            </div>
    
                                            <div class="column mb-3">
                                                <label for="dengueScPl" class="col-sm-8 col-form-label">School/Places</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="dengueScPl" name="dengueScPl">
                                                </div>
                                            </div>
    
                                            <div class="column mb-3">
                                                <label for="dengueInSymp" class="col-sm-8 col-form-label">Initial Symptoms</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="dengueInSymp" name="dengueInSymp">
                                                </div>
                                            </div>
    
                                            <div class="column mb-3">
                                                <label for="dengueDateFever" class="col-sm-10 col-form-label">Date of Onset Fever</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control mediumField" id="dengueDateFever" name="dengueDateFever" >
                                                </div>
                                            </div>
    
                                            <div class="column mb-3">
                                                <label for="dengueTempHigh" class="col-sm-5 col-form-label">High</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control shortField" id="dengueTempHigh" name="dengueTempHigh" placeholder="38.6 - 41" >
                                                </div>
                                            </div>
    
                                            <div class="column mb-3">
                                                <label for="dengueTempMod" class="col-sm-5 col-form-label">Moderate</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control shortField" id="dengueTempMod" name="dengueTempMod" placeholder="38.1 - 38.5" >
                                                </div>
                                            </div>
    
                                            <div class="column mb-3">
                                                <label for="dengueTempSli" class="col-sm-5 col-form-label">Slight</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control shortField" id="dengueTempSli" name="dengueTempSli" placeholder="37.5 - 35" >
                                                </div>
                                            </div>
                                    </div>

                                </div>
                            </div>   
                        </div>

                        <div class="rowConWhole">
                            <div class="inputGroupContainer" style="width:50%">
                                <div class="titleCaseFinding">
                                    <span>Dengue Signs & Symptoms</span>
                                </div>

                                <div class="inputArea">
                                    <div class="rowGroup familyPlaningCon"> 
                                        <div class="rowCon" style="width: 100%">
                                        
                                            <div class="column mb-3">
                                                <label for="dengueStartDateSymp" class="col-sm-8 col-form-label">Start Date of Fever</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control" id="dengueStartDateSymp" name="dengueStartDateSymp">
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="dengueDurFev" class="col-sm-8 col-form-label">Duration of Fever</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control shortField" id="dengueDurFev" name="dengueDurFev">
                                                </div>
                                            </div>

                                            <fieldset class="row mb-3 diagnosisArea">
                                                <legend class="col-form-label col-sm-12 pt-0">Signs & Symptoms</legend>
                                                
                                                <div class="col-sm-12 d-flex" style="gap: 10px">
                                                    <div class="rightCorner" style="width: 50%">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueHeadAche" value="Headache">
                                                            <label class="form-check-label" for="dengueHeadAche">Headache - Labad sa Ulo</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueRetroPain" value="Retro-Ocular Pain">
                                                            <label class="form-check-label" for="dengueRetroPain">Retro-Ocular Pain - Sakit Ang Palibot Sa Mata</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueJointPain" value="Joint Pain">
                                                            <label class="form-check-label" for="dengueJointPain">Joint Pain - Sakit Ang Lutahan</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueJointSwelling" value="Joint Swelling">
                                                            <label class="form-check-label" for="dengueJointSwelling">Joint Swelling - Namaga Ang Mga Lutahan</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueMusclePain" value="Muscle Pain">
                                                            <label class="form-check-label" for="dengueMusclePain">Muscle Pain - Sakit Ang Kaunuran</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueSoreThroat" value="Sore Throat">
                                                            <label class="form-check-label" for="dengueSoreThroat">Sore Throat - Sakit/Karat Ang Tutonlan</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueNoseBleeding" value="Nose Bleeding">
                                                            <label class="form-check-label" for="dengueNoseBleeding">Nose Bleeding - Sunggo</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueHepa" value="Hepatomegaly">
                                                            <label class="form-check-label" for="dengueHepa">Hepatomegaly - Bugon Sa Tuo Ubos Gusok</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueNausea" value="Nausea">
                                                            <label class="form-check-label" for="dengueNausea">Nausea - Luod/Kasukaon</label>
                                                        </div>
                                                    </div>

                                                    <div class="leftCorner" style="width: 50%">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueVomiting" value="Vomiting">
                                                            <label class="form-check-label" for="dengueVomiting">Vomiting - Nagsuka</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueDiarreha" value="Diarreha">
                                                            <label class="form-check-label" for="dengueDiarreha">Diarreha - Nagkalibang</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="denguePetechiae" value="Petechiae">
                                                            <label class="form-check-label" for="denguePetechiae">Petechiae - Pintik-pintik Nga Pula Sa Panit</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueGumBleeding" value="Gum Bleeding">
                                                            <label class="form-check-label" for="dengueGumBleeding">Gum Bleeding - Nagdugo Ang Lagus</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueEcohymosis" value="Ecohymosis">
                                                            <label class="form-check-label" for="dengueEcohymosis">Ecohymosis - Lagum-lagum Ang Panit</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueMaculo" value="Maculo Popular Rash">
                                                            <label class="form-check-label" for="dengueMaculo">Maculo Popular Rash - Panurok</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueAbdominalPain" value="Abdominal Pain">
                                                            <label class="form-check-label" for="dengueAbdominalPain">Abdominal Pain - Sakit Sa Tiyan</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="dengueSignSymp[]" id="dengueGiBleeding" value="G.I Bleeding">
                                                            <label class="form-check-label" for="dengueGiBleeding">G.I Bleeding - Suka Ug Itom Murag Dinuguan/Nalibang Ug Itom Murag Dinuguan</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>   
                                </div>
                            </div>

                            <div class="inputGroupContainer" style="width:50%">
                                <div class="titleCaseFinding">
                                    <span>Treatment & Condition</span>
                                </div>

                                <div class="inputArea">
                                    <div class="rowFirst columnGroup familyPlaningCon"> 

                                        <div class="column mb-3">
                                            <label for="dengueMedTake" class="col-sm-8 col-form-label">Medication Taken</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="dengueMedTake" name="dengueMedTake">
                                            </div>
                                        </div>

                                        <fieldset class="row mb-3">
                                            <legend class="col-form-label col-sm-8 pt-0">Hospitalized</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="dengueHosp" id="dengueHospYes" value="Yes">
                                                    <label class="form-check-label" for="dengueHospYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="dengueHosp" id="dengueHospNo" value="No">
                                                    <label class="form-check-label" for="dengueHospNo">No</label>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <div class="ifYes">
                                            <div class="column mb-3">
                                                <label for="dengueWhen" class="col-sm-8 col-form-label">When?</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control mediumField" id="dengueWhen" name="dengueWhen">
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="dengueHowLong" class="col-sm-8 col-form-label">How Long?</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control mediumField" id="dengueHowLong" name="dengueHowLong">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ifNo">
                                            <div class="column mb-3">
                                                <label for="dengueIncDate" class="col-sm-8 col-form-label">Inclusive Date</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control mediumField" id="dengueIncDate" name="dengueIncDate">
                                                </div>
                                            </div>
                                        </div>

                                        <fieldset class="row mb-3">
                                            <legend class="col-form-label col-sm-8 pt-0">Outcome</legend>
                                            <div class="col-sm-10">

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="dengueOutcome" id="dengueRecovered" value="Recovered">
                                                    <label class="form-check-label" for="dengueRecovered">Recovered</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="dengueOutcome" id="dengueNotImp" value="Not Improved">
                                                    <label class="form-check-label" for="dengueNotImp">Not Improved</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="dengueOutcome" id="dengueDied" value="Died">
                                                    <label class="form-check-label" for="dengueDied">Died</label>
                                                </div>

                                            </div>
                                        </fieldset>

                                        <fieldset class="row mb-3">
                                            <legend class="col-form-label col-sm-8 pt-0">History of Travel</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="dengueTravelHist" id="dengueTravelHistYes" value="Yes">
                                                    <label class="form-check-label" for="dengueTravelHistYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="dengueTravelHist" id="dengueTravelHistNo" value="No">
                                                    <label class="form-check-label" for="dengueTravelHistNo">No</label>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <div class="column mb-3">
                                            <label for="dengueTravelWhere" class="col-sm-8 col-form-label">Where</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control mediumField" id="dengueTravelWhere" name="dengueTravelWhere">
                                            </div>
                                        </div>

                                        <fieldset class="row mb-3">
                                            <legend class="col-form-label col-sm-10 pt-0">Exposed to Person Similar Manifestation</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="dengueExpPer" id="dengueExpPerYes" value="Yes">
                                                    <label class="form-check-label" for="dengueExpPerYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="dengueExpPer" id="dengueExpPerNo" value="No">
                                                    <label class="form-check-label" for="dengueExpPerNo">No</label>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="row mb-3" style="width: 100%">
                                            <legend class="col-form-label col-sm-12 pt-0">Tests</legend>
                                            
                                            <div class="row-sm-12" style="display: flex; gap:20px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="dengueTests[]" id="dengueCbc" value="CBC">
                                                    <label class="form-check-label" for="dengueCbc">CBC</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="dengueTests[]" id="denguePlatelet" value="Platelet">
                                                    <label class="form-check-label" for="denguePlatelet">Platelet</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="dengueTests[]" id="dengueNs" value="Dengue NS 1">
                                                    <label class="form-check-label" for="dengueNs">Dengue NS 1</label>
                                                </div>
                                            </div>
                                    
                                        </fieldset>

                                    </div>
                                </div>  

                            </div>
                        </div>

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Name & Address of Contacts</span>
                            </div>

                            <div class="inputArea" style="width: 100%">
                                <div class="rowFirst columnGroup familyPlaningCon" style="width: 100%"> 
                                    <div id="fields-container" class="columnCon" style="width: 100%;">
                                        <!-- First set of input fields -->
                                        <div class="field-set mb-3 d-flex" style="width: 100%; justify-content: center!important; gap:15px;">
                                            <div class="column mb-3">
                                                <label for="dengueNameContact" class="col-sm-5 col-form-label">Names</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="dengueNameContact[]" placeholder="Name...">
                                                </div>
                                            </div>
                                            <div class="column mb-3">
                                                <label for="dengueAddressContact" class="col-sm-5 col-form-label">Address</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="dengueAddressContact[]" placeholder="Address...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btnArea" style="width: 100%; display: flex; justify-content: flex-end;">
                                        <button type="button" class="btn btn-primary" onclick="addFields()">Add More</button>
                                    </div>
                                </div>
                            </div>
                               
                        </div>

                        <div class="rowConWhole">
                            <div class="inputGroupContainer" style="width:50%">
                                <div class="titleCaseFinding">
                                    <span>Presence of Animals in your house or within the neighborhood 10 meters from your house</span>
                                </div>

                                <div class="inputArea">
                                    <div class="rowFirst columnGroup familyPlaningCon"> 

                                        <fieldset class="row mb-3" style="width: 100%">                                        
                                            <div class="row-sm-12" style="display: flex; gap:20px; flex-wrap:wrap;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="dengueAnimalPres[]" id="dengueAnimalChicken" value="Chicken">
                                                    <label class="form-check-label" for="dengueAnimalChicken">Chicken</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="dengueAnimalPres[]" id="dengueAnimalBirds" value="Birds">
                                                    <label class="form-check-label" for="dengueAnimalBirds">Birds</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="dengueAnimalPres[]" id="dengueAnimalRats" value="Rats">
                                                    <label class="form-check-label" for="dengueAnimalRats">Rats</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="dengueAnimalPres[]" id="dengueAnimalMosquito" value="Mosquito">
                                                    <label class="form-check-label" for="dengueAnimalMosquito">Mosquito</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="dengueAnimalPres[]" id="dengueAnimalCat" value="Cat">
                                                    <label class="form-check-label" for="dengueAnimalCat">Cat</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="dengueAnimalPres[]" id="dengueAnimalFlies" value="Flies">
                                                    <label class="form-check-label" for="dengueAnimalFlies">Flies</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="dengueAnimalPres[]" id="dengueAnimalDog" value="Dog">
                                                    <label class="form-check-label" for="dengueAnimalDog">Dog</label>
                                                </div>

                                                <div class="column mb-3">
                                                    <label for="dengueAddressContact" class="col-sm-12 col-form-label">Other Forms of Birds(Specify)</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="dengueAnimalPres[]" placeholder="Specify...">
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>

                                    </div>
                                </div>  
                            </div>

                            <div class="inputGroupContainer" style="width:50%">
                                <div class="titleCaseFinding">
                                    <span>Presencce of Water Containers Inside Your house</span>
                                </div>

                                <div class="inputArea">
                                    <div class="rowFirst columnGroup familyPlaningCon"> 

                                        <fieldset class="row mb-3" style="width: 100%">                                        
                                            <div class="row-sm-12" style="display: flex; gap:20px; flex-wrap:wrap;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="dengueWaterCon[]" id="dengueWaterConFb" value="Flower Vase">
                                                    <label class="form-check-label" for="dengueWaterConFb">Flower Vase</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="dengueWaterCon[]" id="dengueWaterConStore" value="Water Storage Container">
                                                    <label class="form-check-label" for="dengueWaterConStore">Water Storage Container</label>
                                                </div>
                                                <div class="column mb-3">
                                                    <label for="dengueAddressContact" class="col-sm-12 col-form-label">Others(Specify)</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="dengueWaterCon[]" placeholder="Specify...">
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>

                                    </div>
                                </div>  
                            </div>
                        </div>

                        <div class="inputGroupContainer" style="width:100%">
                            <div class="titleCaseFinding">
                                <span>Presence of Water Containers outside your house or w/in the neighborhood 10 meters from your house</span>
                            </div>

                            <div class="inputArea">
                                <div class="rowFirst columnGroup familyPlaningCon"> 

                                    <fieldset class="row mb-3" style="width: 100%">                                        
                                        <div class="row-sm-12" style="display: flex; gap:20px; flex-wrap:wrap;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dengueWaterContainers[]" id="dengueWcTinCan" value="Tin Cans">
                                                <label class="form-check-label" for="dengueWcTinCan">Tin Cans</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dengueWaterContainers[]" id="dengueWcUsedTires" value="Used Tires">
                                                <label class="form-check-label" for="dengueWcUsedTires">Used Tires</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dengueWaterContainers[]" id="dengueWcShell" value="Coconut Shells / Husk">
                                                <label class="form-check-label" for="dengueWcShell">Coconut Shells / Husk</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dengueWaterContainers[]" id="dengueWcDrums" value="Drums">
                                                <label class="form-check-label" for="dengueWcDrums">Drums</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dengueWaterContainers[]" id="dengueWcLagoons" value="Lagoons">
                                                <label class="form-check-label" for="dengueWcLagoons">Lagoons</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dengueWaterContainers[]" id="dengueWcBamboo" value="Bamboo Poles">
                                                <label class="form-check-label" for="dengueWcBamboo">Bamboo Poles</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dengueWaterContainers[]" id="dengueWcWater" value="Water Jars">
                                                <label class="form-check-label" for="dengueWcWater">Water Jars</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dengueWaterContainers[]" id="dengueWcCanals" value="Canals">
                                                <label class="form-check-label" for="dengueWcCanals">Canals</label>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="dengueWcOthers" class="col-sm-12 col-form-label">Others (Specify)</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="dengueWcOthers" name="dengueWaterContainers[]" placeholder="Specify...">
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-12 pt-0">Presence of Windows and Door Screen in the House:</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dengueDoor" id="dengueDoorYes" value="Yes">
                                                <label class="form-check-label" for="dengueDoorYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dengueDoor" id="dengueDoorNo" value="No">
                                                <label class="form-check-label" for="dengueDoorNo">No</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>  
                        </div>

                        <div class="inputGroupContainer" style="width:100%">
                            <div class="titleCaseFinding">
                                <span>Administrative Details</span>
                            </div>

                            <div class="inputArea">
                                <div class="wrapGroup"> 

                                    <div class="column mb-3 pName">
                                        <label for="dengueByName" class="form-label">Name</label>
                                        <select id="dengueByName" class="form-select pNames" name="dengueByName">
                                            <option selected disabled>Choose...</option>
                                            <option value="1">John Doe</option>
                                            <option value="2">Jane Smith</option>
                                            <option value="3">Michael Johnson</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="dengueAdDate" class="col-sm-8 col-form-label">Date</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" id="dengueAdDate" name="dengueAdDate">
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="dengueAdBrgy" class="col-sm-8 col-form-label">Barangay</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="dengueAdBrgy" name="dengueAdBrgy">
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="dengueAdSitio" class="col-sm-8 col-form-label">Sitio</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="dengueAdSitio" name="dengueAdSitio">
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="dengueAdMunicipality" class="col-sm-8 col-form-label">Municipality</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="dengueAdMunicipality" name="dengueAdMunicipality">
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
    //PATIENT SELECT
    $(document).ready(function() {
        $('#dengueFullName').select2({
            placeholder: "Choose...",
            allowClear: true
        });

        // Initialize Select2 on modal show
        $('#ExtralargeModal').on('shown.bs.modal', function () {
            $('#dengueFullName').select2({
                dropdownParent: $('#ExtralargeModal')
            });
        });
    });


    //HOSPITALIZED OR NOT
        document.addEventListener('DOMContentLoaded', function() {
            const yesRadio = document.getElementById('dengueHospYes');
            const noRadio = document.getElementById('dengueHospNo');
            const ifYes = document.querySelector('.ifYes');
            const ifNo = document.querySelector('.ifNo');

            function toggleSections() {
                if (yesRadio.checked) {
                    ifYes.style.display = 'block';
                    ifNo.style.display = 'none';
                } else if (noRadio.checked) {
                    ifYes.style.display = 'none';
                    ifNo.style.display = 'block';
                }
            }

            yesRadio.addEventListener('change', toggleSections);
            noRadio.addEventListener('change', toggleSections);

            // Initialize display based on current radio button state
            toggleSections();
        });

    
    //ADD MORE BTN
    function addFields() 
    {
        // Get the container where the new fields will be added
        const container = document.getElementById('fields-container');
        
        // Clone the first set of fields
        const newFieldSet = container.querySelector('.field-set').cloneNode(true);

        // Clear the values of the cloned fields
        const inputs = newFieldSet.querySelectorAll('input');
        inputs.forEach(input => input.value = '');

        // Append the cloned field set to the container
        container.appendChild(newFieldSet);
    }
</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>