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
                    <th style="display: none;" scope="col">ID</th>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">BirthDate</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Purok</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($dengue as $index => $dengues)
                    <tr>
                        <td style="display: none;">{{ $dengues->dengue_id }}</td>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $dengues->resident->res_lname }}, {{ $dengues->resident->res_fname }} {{ $dengues->resident->res_mname ?? '' }} {{ $dengues->resident->res_suffix ?? '' }}</td>
                        <td>{{ $dengues->resident->res_bdate}}</td>
                        <td>{{ $dengues->resident->res_sex }}</td>
                        <td>{{ $dengues->resident->res_purok }}</td>
                        <td>{{ $dengues->dengue_status }}</td>
                        <td>
                            <a href="{{ route('dengueForm', ['dengue_id' => $dengues->dengue_id]) }}" class="btn btn-primary">View</a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" type="button" onclick="openEditModal({{ $dengues->dengue_id }})">Edit</button></li>
                                    {{-- <li><button class="dropdown-item" type="button" onclick="updateDstbStatus({{ $dengues->dengue_id }}, 'Archive')">Archive</button></li> --}}
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
                    <h5 class="modal-title">Epidemiological Questionaire For Dengue Hemorrhagic Fever</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('regValidation.dengueInput')}}" class="dengueInput" id="dengueInput" autocomplete="off"> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Dengue Form</span>
                            </div>
                            <div class="inputArea">
                                <div class="rowFirst columnGroup familyPlaningCon"> 
                                    
                                    <div class="columnCon">

                                        <div class="col-md-4 pt-3">
                                            <label for="dengueFullName" class="form-label">Patient Full Name</label>
                                            <select id="dengueFullName" class="form-control" name="dengueFullName" style="width: 100%" onchange="updateResidentDetails(this)">
                                                <option value="">Select...</option>
                                                @foreach($residents as $resident)
                                                    <option value="{{ $resident->res_id }}">
                                                        {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text dengueFullName_error"></span>
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
                                                    <span class="text-danger error-text dengueDateSymp_error"></span>
                                                </div>
                                            </div>
    
                                            <div class="column mb-3">
                                                <label for="dengueScPl" class="col-sm-8 col-form-label">School/Places</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="dengueScPl" name="dengueScPl">
                                                    <span class="text-danger error-text dengueScPl_error"></span>
                                                </div>
                                            </div>
    
                                            <div class="column mb-3">
                                                <label for="dengueInSymp" class="col-sm-8 col-form-label">Initial Symptoms</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="dengueInSymp" name="dengueInSymp">
                                                    <span class="text-danger error-text dengueInSymp_error"></span>
                                                </div>
                                            </div>
    
                                            <div class="column mb-3">
                                                <label for="dengueDateFever" class="col-sm-10 col-form-label">Date of Onset Fever</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control mediumField" id="dengueDateFever" name="dengueDateFever">
                                                    <span class="text-danger error-text dengueDateFever_error"></span>
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
                                                        <input type="text" class="form-control" name="dengueAnimalSpecify" placeholder="Specify...">
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
                                                        <input type="text" class="form-control" name="dengueWaterConSpecific" placeholder="Specify...">
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
                                                    <input type="text" class="form-control" id="dengueWcOthers" name="dengueWaterContainersSpec" placeholder="Specify...">
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


                                    <div class="column mb-3">
                                        <label for="dengueByName" class="col-sm-8 col-form-label">By</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="dengueByName" name="dengueByName" value="{{ $LoggedUserInfo['em_id'] }}" readonly>
                                        </div>
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
                        <div class="alertCon">
                            <div id="alert-container"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
        </div>
    </div><!-- End OF SIDE A-->

    {{-- EDIT FORM --}}
    <div class="modal fade" id="EditExtralargeModal" tabindex="-1">
        <div class="modal-dialog custom-modal-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT Epidemiological Questionaire For Dengue Hemorrhagic Fever</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="edit_dengueInput" id="edit_dengueInput" autocomplete="off"> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Dengue Form</span>
                            </div>
                            <div class="inputArea">
                                <div class="rowFirst columnGroup familyPlaningCon"> 
                                    
                                    <div class="columnCon">

                                        <div class="col-md-4 pt-3">
                                            <input type="hidden" name="edit_dengueId" id="edit_dengueId">
                                            <label for="edit_dengueFullName" class="form-label">Patient Full Name</label>
                                            <select id="edit_dengueFullName" class="form-control" name="edit_dengueFullName" style="width: 100%" onchange="updateResidentDetails(this)">
                                                <option value="">Select...</option>
                                                @foreach($residents as $resident)
                                                    <option value="{{ $resident->res_id }}">
                                                        {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text edit_dengueFullName_error"></span>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_dengueDOB" class="col-sm-8 col-form-label">Date of Birth</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" style="width: 200px" id="edit_dengueDOB" name="dengueDOB" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_dengueAge" class="col-sm-5 col-form-label">Age</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control briefField" id="edit_dengueAge" name="dengueAge" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_dengueSex" class="col-sm-8 col-form-label">Sex</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="width: 200px" id="edit_dengueSex" name="dengueSex" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_dengueStatus" class="col-sm-8 col-form-label">Status</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control mediumField" id="edit_dengueStatus" name="dengueStatus" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_dengueAddress" class="col-sm-8 col-form-label">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_dengueAddress" name="dengueAddress" readonly>
                                            </div>
                                        </div>

                                        <div class="column mb-3">
                                            <label for="edit_dengueOcc" class="col-sm-8 col-form-label">Occupation</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_dengueOcc" name="dengueOcc" readonly>
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
                                                <label for="edit_dengueDateSymp" class="col-sm-8 col-form-label">Date of Onset Symptoms</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control mediumField" id="edit_dengueDateSymp" name="edit_dengueDateSymp">
                                                    <span class="text-danger error-text edit_dengueDateSymp_error"></span>
                                                </div>
                                            </div>
    
                                            <div class="column mb-3">
                                                <label for="edit_dengueScPl" class="col-sm-8 col-form-label">School/Places</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="edit_dengueScPl" name="edit_dengueScPl">
                                                    <span class="text-danger error-text edit_dengueScPl_error"></span>
                                                </div>
                                            </div>
    
                                            <div class="column mb-3">
                                                <label for="edit_dengueInSymp" class="col-sm-8 col-form-label">Initial Symptoms</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="edit_dengueInSymp" name="edit_dengueInSymp">
                                                    <span class="text-danger error-text edit_dengueInSymp_error"></span>
                                                </div>
                                            </div>
    
                                            <div class="column mb-3">
                                                <label for="edit_dengueDateFever" class="col-sm-10 col-form-label">Date of Onset Fever</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control mediumField" id="edit_dengueDateFever" name="edit_dengueDateFever">
                                                    <span class="text-danger error-text edit_dengueDateFever_error"></span>
                                                </div>
                                            </div>
    
                                            <div class="column mb-3">
                                                <label for="edit_dengueTempHigh" class="col-sm-8 col-form-label">High (38.6 - 41)</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control shortField" id="edit_dengueTempHigh" name="edit_dengueTempHigh">
                                                </div>
                                            </div>
    
                                            <div class="column mb-3">
                                                <label for="edit_dengueTempMod" class="col-sm-8 col-form-label">Moderate (38.1 - 38.5)</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control shortField" id="edit_dengueTempMod" name="edit_dengueTempMod">
                                                </div>
                                            </div>
    
                                            <div class="column mb-3">
                                                <label for="edit_dengueTempSli" class="col-sm-8 col-form-label">Slight (37.5 - 35)</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control shortField" id="edit_dengueTempSli" name="edit_dengueTempSli">
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
                                                <label for="edit_dengueStartDateSymp" class="col-sm-8 col-form-label">Start Date of Fever</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control" id="edit_dengueStartDateSymp" name="edit_dengueStartDateSymp">
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="edit_dengueDurFev" class="col-sm-8 col-form-label">Duration of Fever</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control shortField" id="edit_dengueDurFev" name="edit_dengueDurFev">
                                                </div>
                                            </div>

                                            <fieldset class="row mb-3 diagnosisArea">
                                                <legend class="col-form-label col-sm-12 pt-0">Signs & Symptoms</legend>
                                                
                                                <div class="col-sm-12 d-flex" style="gap: 10px">
                                                    <div class="rightCorner" style="width: 50%">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueHeadAche" value="Headache">
                                                            <label class="form-check-label" for="dengueHeadAche">Headache - Labad sa Ulo</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueRetroPain" value="Retro-Ocular Pain">
                                                            <label class="form-check-label" for="dengueRetroPain">Retro-Ocular Pain - Sakit Ang Palibot Sa Mata</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueJointPain" value="Joint Pain">
                                                            <label class="form-check-label" for="dengueJointPain">Joint Pain - Sakit Ang Lutahan</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueJointSwelling" value="Joint Swelling">
                                                            <label class="form-check-label" for="dengueJointSwelling">Joint Swelling - Namaga Ang Mga Lutahan</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueMusclePain" value="Muscle Pain">
                                                            <label class="form-check-label" for="dengueMusclePain">Muscle Pain - Sakit Ang Kaunuran</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueSoreThroat" value="Sore Throat">
                                                            <label class="form-check-label" for="dengueSoreThroat">Sore Throat - Sakit/Karat Ang Tutonlan</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueNoseBleeding" value="Nose Bleeding">
                                                            <label class="form-check-label" for="dengueNoseBleeding">Nose Bleeding - Sunggo</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueHepa" value="Hepatomegaly">
                                                            <label class="form-check-label" for="dengueHepa">Hepatomegaly - Bugon Sa Tuo Ubos Gusok</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueNausea" value="Nausea">
                                                            <label class="form-check-label" for="dengueNausea">Nausea - Luod/Kasukaon</label>
                                                        </div>
                                                    </div>

                                                    <div class="leftCorner" style="width: 50%">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueVomiting" value="Vomiting">
                                                            <label class="form-check-label" for="dengueVomiting">Vomiting - Nagsuka</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueDiarreha" value="Diarreha">
                                                            <label class="form-check-label" for="dengueDiarreha">Diarreha - Nagkalibang</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_denguePetechiae" value="Petechiae">
                                                            <label class="form-check-label" for="denguePetechiae">Petechiae - Pintik-pintik Nga Pula Sa Panit</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueGumBleeding" value="Gum Bleeding">
                                                            <label class="form-check-label" for="dengueGumBleeding">Gum Bleeding - Nagdugo Ang Lagus</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueEcohymosis" value="Ecohymosis">
                                                            <label class="form-check-label" for="dengueEcohymosis">Ecohymosis - Lagum-lagum Ang Panit</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueMaculo" value="Maculo Popular Rash">
                                                            <label class="form-check-label" for="dengueMaculo">Maculo Popular Rash - Panurok</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueAbdominalPain" value="Abdominal Pain">
                                                            <label class="form-check-label" for="dengueAbdominalPain">Abdominal Pain - Sakit Sa Tiyan</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="edit_dengueSignSymp[]" id="edit_dengueGiBleeding" value="G.I Bleeding">
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
                                            <label for="edit_dengueMedTake" class="col-sm-8 col-form-label">Medication Taken</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_dengueMedTake" name="edit_dengueMedTake">
                                            </div>
                                        </div>

                                        <fieldset class="row mb-3">
                                            <legend class="col-form-label col-sm-8 pt-0">Hospitalized</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_dengueHosp" id="edit_dengueHospYes" value="Yes">
                                                    <label class="form-check-label" for="edit_dengueHospYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_dengueHosp" id="edit_dengueHospNo" value="No">
                                                    <label class="form-check-label" for="edit_dengueHospNo">No</label>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <div class="edit_ifYes">
                                            <div class="column mb-3">
                                                <label for="edit_dengueWhen" class="col-sm-8 col-form-label">When?</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control mediumField" id="edit_dengueWhen" name="edit_dengueWhen">
                                                </div>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="edit_dengueHowLong" class="col-sm-8 col-form-label">How Long?</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control mediumField" id="edit_dengueHowLong" name="edit_dengueHowLong">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="edit_ifNo">
                                            <div class="column mb-3">
                                                <label for="edit_dengueIncDate" class="col-sm-8 col-form-label">Inclusive Date</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control mediumField" id="edit_dengueIncDate" name="edit_dengueIncDate">
                                                </div>
                                            </div>
                                        </div>

                                        <fieldset class="row mb-3">
                                            <legend class="col-form-label col-sm-8 pt-0">Outcome</legend>
                                            <div class="col-sm-10">

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_dengueOutcome" id="edit_dengueRecovered" value="Recovered">
                                                    <label class="form-check-label" for="edit_dengueRecovered">Recovered</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_dengueOutcome" id="edit_dengueNotImp" value="Not Improved">
                                                    <label class="form-check-label" for="edit_dengueNotImp">Not Improved</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_dengueOutcome" id="edit_dengueDied" value="Died">
                                                    <label class="form-check-label" for="edit_dengueDied">Died</label>
                                                </div>

                                            </div>
                                        </fieldset>

                                        <fieldset class="row mb-3">
                                            <legend class="col-form-label col-sm-8 pt-0">History of Travel</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_dengueTravelHist" id="edit_dengueTravelHistYes" value="Yes">
                                                    <label class="form-check-label" for="edit_dengueTravelHistYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_dengueTravelHist" id="edit_dengueTravelHistNo" value="No">
                                                    <label class="form-check-label" for="edit_dengueTravelHistNo">No</label>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <div class="column mb-3">
                                            <label for="edit_dengueTravelWhere" class="col-sm-8 col-form-label">Where</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control mediumField" id="edit_dengueTravelWhere" name="edit_dengueTravelWhere">
                                            </div>
                                        </div>

                                        <fieldset class="row mb-3">
                                            <legend class="col-form-label col-sm-10 pt-0">Exposed to Person Similar Manifestation</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_dengueExpPer" id="edit_dengueExpPerYes" value="Yes">
                                                    <label class="form-check-label" for="edit_dengueExpPerYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="edit_dengueExpPer" id="edit_dengueExpPerNo" value="No">
                                                    <label class="form-check-label" for="edit_dengueExpPerNo">No</label>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="row mb-3" style="width: 100%">
                                            <legend class="col-form-label col-sm-12 pt-0">Tests</legend>
                                            
                                            <div class="row-sm-12" style="display: flex; gap:20px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_dengueTests[]" id="edit_dengueCbc" value="CBC">
                                                    <label class="form-check-label" for="edit_dengueCbc">CBC</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_dengueTests[]" id="edit_denguePlatelet" value="Platelet">
                                                    <label class="form-check-label" for="edit_denguePlatelet">Platelet</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_dengueTests[]" id="edit_dengueNs" value="Dengue NS 1">
                                                    <label class="form-check-label" for="edit_dengueNs">Dengue NS 1</label>
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
                                    <div id="edit_fields-container" class="columnCon" style="width: 100%;">
                                        <!-- First set of input fields -->
                                        <div class="edit_field-set mb-3 d-flex" style="width: 100%; justify-content: center!important; gap:15px;">
                                            <div class="column mb-3">
                                                <label for="dengueNameContact" class="col-sm-5 col-form-label">Names</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="edit_dengueNameContact[]" id="edit_dengueNameContact" placeholder="Name...">
                                                </div>
                                            </div>
                                            <div class="column mb-3">
                                                <label for="dengueAddressContact" class="col-sm-5 col-form-label">Address</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="edit_dengueAddressContact[]" id="edit_dengueAddressContact" placeholder="Address...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btnArea" style="width: 100%; display: flex; justify-content: flex-end;">
                                        <button type="button" class="btn btn-primary" onclick="edit_addFields()">Add More</button>
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
                                                    <input class="form-check-input" type="checkbox" name="edit_dengueAnimalPres[]" id="edit_dengueAnimalChicken" value="Chicken">
                                                    <label class="form-check-label" for="edit_dengueAnimalChicken">Chicken</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_dengueAnimalPres[]" id="edit_dengueAnimalBirds" value="Birds">
                                                    <label class="form-check-label" for="edit_dengueAnimalBirds">Birds</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_dengueAnimalPres[]" id="edit_dengueAnimalRats" value="Rats">
                                                    <label class="form-check-label" for="edit_dengueAnimalRats">Rats</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_dengueAnimalPres[]" id="edit_dengueAnimalMosquito" value="Mosquito">
                                                    <label class="form-check-label" for="edit_dengueAnimalMosquito">Mosquito</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_dengueAnimalPres[]" id="edit_dengueAnimalCat" value="Cat">
                                                    <label class="form-check-label" for="edit_dengueAnimalCat">Cat</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_dengueAnimalPres[]" id="edit_dengueAnimalFlies" value="Flies">
                                                    <label class="form-check-label" for="edit_dengueAnimalFlies">Flies</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_dengueAnimalPres[]" id="edit_dengueAnimalDog" value="Dog">
                                                    <label class="form-check-label" for="edit_dengueAnimalDog">Dog</label>
                                                </div>

                                                <div class="column mb-3">
                                                    <label for="dengueAddressContact" class="col-sm-12 col-form-label">Other Forms of Birds(Specify)</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="edit_dengueAnimalSpecify" id="edit_dengueAnimalSpecify" placeholder="Specify...">
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
                                                    <input class="form-check-input" type="checkbox" name="edit_dengueWaterCon[]" id="edit_dengueWaterConFb" value="Flower Vase">
                                                    <label class="form-check-label" for="edit_dengueWaterConFb">Flower Vase</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="edit_dengueWaterCon[]" id="edit_dengueWaterConStore" value="Water Storage Container">
                                                    <label class="form-check-label" for="edit_dengueWaterConStore">Water Storage Container</label>
                                                </div>
                                                <div class="column mb-3">
                                                    <label for="dengueAddressContact" class="col-sm-12 col-form-label">Others(Specify)</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="edit_dengueWaterConSpecific" id="edit_dengueWaterConSpecific" placeholder="Specify...">
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
                                                <input class="form-check-input" type="checkbox" name="edit_dengueWaterContainers[]" id="edit_dengueWcTinCan" value="Tin Cans">
                                                <label class="form-check-label" for="edit_dengueWcTinCan">Tin Cans</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_dengueWaterContainers[]" id="edit_dengueWcUsedTires" value="Used Tires">
                                                <label class="form-check-label" for="edit_dengueWcUsedTires">Used Tires</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_dengueWaterContainers[]" id="edit_dengueWcShell" value="Coconut Shells / Husk">
                                                <label class="form-check-label" for="edit_dengueWcShell">Coconut Shells / Husk</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_dengueWaterContainers[]" id="edit_dengueWcDrums" value="Drums">
                                                <label class="form-check-label" for="edit_dengueWcDrums">Drums</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_dengueWaterContainers[]" id="edit_dengueWcLagoons" value="Lagoons">
                                                <label class="form-check-label" for="edit_dengueWcLagoons">Lagoons</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_dengueWaterContainers[]" id="edit_dengueWcBamboo" value="Bamboo Poles">
                                                <label class="form-check-label" for="edit_dengueWcBamboo">Bamboo Poles</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_dengueWaterContainers[]" id="edit_dengueWcWater" value="Water Jars">
                                                <label class="form-check-label" for="edit_dengueWcWater">Water Jars</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="edit_dengueWaterContainers[]" id="edit_dengueWcCanals" value="Canals">
                                                <label class="form-check-label" for="edit_dengueWcCanals">Canals</label>
                                            </div>

                                            <div class="column mb-3">
                                                <label for="edit_dengueWaterContainersSpec" class="col-sm-12 col-form-label">Others (Specify)</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="edit_dengueWaterContainersSpec" name="edit_dengueWaterContainersSpec" placeholder="Specify...">
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-12 pt-0">Presence of Windows and Door Screen in the House:</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_dengueDoor" id="edit_dengueDoorYes" value="Yes">
                                                <label class="form-check-label" for="edit_dengueDoorYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_dengueDoor" id="edit_dengueDoorNo" value="No">
                                                <label class="form-check-label" for="edit_dengueDoorNo">No</label>
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

                                    <div class="column mb-3">
                                        <label for="edit_dengueByName" class="col-sm-8 col-form-label">By</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_dengueByName" name="edit_dengueByName" value="{{ $LoggedUserInfo['em_id'] }}" readonly>
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_dengueAdDate" class="col-sm-8 col-form-label">Date</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" id="edit_dengueAdDate" name="edit_dengueAdDate">
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_dengueAdBrgy" class="col-sm-8 col-form-label">Barangay</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_dengueAdBrgy" name="edit_dengueAdBrgy">
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_dengueAdSitio" class="col-sm-8 col-form-label">Sitio</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_dengueAdSitio" name="edit_dengueAdSitio">
                                        </div>
                                    </div>

                                    <div class="column mb-3">
                                        <label for="edit_dengueAdMunicipality" class="col-sm-8 col-form-label">Municipality</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_dengueAdMunicipality" name="edit_dengueAdMunicipality">
                                        </div>
                                    </div>

                                    <div class="col-md-4 pt-3">
                                        <label for="edit_dengueStatuss" class="form-label">Status</label>
                                        <div class="col-sm-12">
                                            <select id="edit_dengueStatuss" class="form-select" name="edit_dengueStatuss">
                                                <option disabled selected>Choose...</option>
                                                <option value="Dengue Positive">Dengue Positive</option>
                                                <option value="Under Treatment">Under Treatment</option>
                                                <option value="Dengue Free">Dengue Free</option>
                                                <option value="Pending Diagnosis">Pending Diagnosis</option>
                                                <option value="Archive">Archive</option>
                                            </select>
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
<script type="text/javascript">
    // Initialize resident data from PHP
    var residentData = @json($residents);
</script>
<script>
// ***********************************************************
    //PATIENT SELECT
    $(document).ready(function () {
        $('#dengueFullName').selectize({
            sortField: 'text'
        });
    });

    function calculateAge(birthDate) {
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDifference = today.getMonth() - birthDate.getMonth();
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    function updateResidentDetails(selectElement) {
        const selectedId = selectElement.value;

        if (selectedId) {
            const residentInfo = residentData[selectedId];

            if (residentInfo) {
                document.getElementById('dengueAddress').value = residentInfo.res_address;
                document.getElementById('dengueDOB').value = residentInfo.res_bdate;

                // Calculate age from the birth date
                const birthDate = new Date(residentInfo.res_bdate);
                const age = calculateAge(birthDate);
                document.getElementById('dengueAge').value = age;

                document.getElementById('dengueSex').value = residentInfo.res_sex;
                document.getElementById('dengueStatus').value = residentInfo.res_civil;
                document.getElementById('dengueOcc').value = residentInfo.res_occupation;
            }
        } else {
            // Clear fields if no resident is selected
            document.getElementById('dengueAddress').value = '';
            document.getElementById('dengueDOB').value = '';
            document.getElementById('dengueAge').value = '';
            document.getElementById('dengueSex').value = '';
            document.getElementById('dengueStatus').value = '';
            document.getElementById('dengueOcc').value = '';
        }
    }

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

    //EDIT HOSPITALIZED OR NOT
    document.addEventListener('DOMContentLoaded', function() {
        const yesRadio = document.getElementById('edit_dengueHospYes');
        const noRadio = document.getElementById('edit_dengueHospNo');
        const ifYes = document.querySelector('.edit_ifYes');
        const ifNo = document.querySelector('.edit_ifNo');

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


    //EDIT ADD MORE BTN
    function edit_addFields() 
    {
        // Get the container where the new fields will be added
        const container = document.getElementById('edit_fields-container');
        
        // Clone the first set of fields
        const newFieldSet = container.querySelector('.edit_field-set').cloneNode(true);

        // Clear the values of the cloned fields
        const inputs = newFieldSet.querySelectorAll('input');
        inputs.forEach(input => input.value = '');

        // Append the cloned field set to the container
        container.appendChild(newFieldSet);
    }

// ***********************************************************


    //iNSERT
    $(function(){      
        $("#dengueInput").on('submit', function(e){
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
                        $('#dengueInput')[0].reset();

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

    //display data dstb
    function openEditModal(dengue_id) {
        $.ajax({
            url: `/dengueDisp/${dengue_id}`,
            method: 'GET',
            success: function(response) {
                if (response.status === 1) 
                {
                    // Textbox
                        $('#edit_dengueId').val(response.data.dengue_id);
                        let fullName = `${response.data.resident.res_lname}, ${response.data.resident.res_fname} ${response.data.resident.res_mname ?? ''} ${response.data.resident.res_suffix ?? ''}`;
                        $('#edit_dengueFullName').val(response.data.resident.res_id);
                        $('#edit_dengueDOB').val(response.data.resident.res_bdate);
                        let birthDate = new Date(response.data.resident.res_bdate);
                        let age = calculateAge(birthDate);
                        $('#edit_dengueAge').val(age);
                        $('#edit_dengueSex').val(response.data.resident.res_sex);
                        $('#edit_dengueStatus').val(response.data.resident.res_civil);
                        $('#edit_dengueAddress').val(response.data.resident.res_address);
                        $('#edit_dengueOcc').val(response.data.resident.res_occupation);
                        $('#edit_dengueDateSymp').val(response.data.dengue_date);
                        $('#edit_dengueScPl').val(response.data.dengue_place);
                        $('#edit_dengueInSymp').val(response.data.dengue_initialSymp);
                        $('#edit_dengueDateFever').val(response.data.dengue_dateOnSetFever);
                        $('#edit_dengueTempHigh').val(response.data.dengue_high);
                        $('#edit_dengueTempMod').val(response.data.dengue_moderate);
                        $('#edit_dengueTempSli').val(response.data.dengue_slight);
                        $('#edit_dengueStartDateSymp').val(response.data.dengue_dateOfFever);
                        $('#edit_dengueDurFev').val(response.data.dengue_durationFever);
                        $('#edit_dengueMedTake').val(response.data.dengue_medTake);
                        $('#edit_dengueIncDate').val(response.data.dengue_inclusiveDate);
                        $('#edit_dengueWhen').val(response.data.dengue_hospWhen);
                        $('#edit_dengueHowLong').val(response.data.dengue_hospLong);
                        $('#edit_dengueTravelWhere').val(response.data.dengue_whereTravel);
                        $('#edit_dengueAnimalSpecify').val(response.data.dengue_animalsSpecify);
                        $('#edit_dengueWaterConSpecific').val(response.data.dengue_waterInSpecify);
                        $('#edit_dengueWaterContainersSpec').val(response.data.dengue_waterOutSpecify);
                        $('#edit_dengueByName').val(response.data.em_id);
                        $('#edit_dengueAdDate').val(response.data.dengue_adminDate);
                        $('#edit_dengueAdBrgy').val(response.data.dengue_adminBrgy);
                        $('#edit_dengueAdSitio').val(response.data.dengue_adminSitio);
                        $('#edit_dengueAdMunicipality').val(response.data.dengue_adminMunicipality);
                        $('#edit_dengueStatuss').val(response.data.dengue_status);
                      
                    // Radio
                        let hospitalized = response.data.dengue_hospitalized;
                            $('#edit_dengueHospYes').prop('checked', false);
                            $('#edit_dengueHospNo').prop('checked', false);
                            if (hospitalized === 'Yes') 
                            {
                                $('#edit_dengueHospYes').prop('checked', true);
                            } 
                            else if (hospitalized === 'No') 
                            {
                                $('#edit_dengueHospNo').prop('checked', true);
                            }
                        let outcome = response.data.dengue_outcome;
                            $('#edit_dengueRecovered').prop('checked', false);
                            $('#edit_dengueNotImp').prop('checked', false);
                            $('#edit_dengueDied').prop('checked', false);
                            if (outcome === 'Recovered') 
                            {
                                $('#edit_dengueRecovered').prop('checked', true);
                            } 
                            else if (outcome === 'Not Improved') 
                            {
                                $('#edit_dengueNotImp').prop('checked', true);
                            }
                            else if (outcome === 'Died') 
                            {
                                $('#edit_dengueDied').prop('checked', true);
                            }
                        let travel = response.data.dengue_hisTravel;
                            $('#edit_dengueTravelHistYes').prop('checked', false);
                            $('#edit_dengueTravelHistNo').prop('checked', false);
                            if (travel === 'Yes') 
                            {
                                $('#edit_dengueTravelHistYes').prop('checked', true);
                            } 
                            else if (travel === 'No') 
                            {
                                $('#edit_dengueTravelHistNo').prop('checked', true);
                            }
                        let exposed = response.data.dengue_exposed;
                            $('#edit_dengueExpPerYes').prop('checked', false);
                            $('#edit_dengueExpPerNo').prop('checked', false);
                            if (exposed === 'Yes') 
                            {
                                $('#edit_dengueExpPerYes').prop('checked', true);
                            } 
                            else if (exposed === 'No') 
                            {
                                $('#edit_dengueExpPerNo').prop('checked', true);
                            }
                        let door = response.data.dengue_exposed;
                            $('#edit_dengueDoorYes').prop('checked', false);
                            $('#edit_dengueDoorNo').prop('checked', false);
                            if (door === 'Yes') 
                            {
                                $('#edit_dengueDoorYes').prop('checked', true);
                            } 
                            else if (door === 'No') 
                            {
                                $('#edit_dengueDoorNo').prop('checked', true);
                            }
                    
                    // Checkbox
                        if (response.data.dengue_signSymp) 
                        {
                            let sigmSymp = JSON.parse(response.data.dengue_signSymp);
                            $('input[name="edit_dengueSignSymp[]"]').prop('checked', false);
                            
                            sigmSymp.forEach(function(value) 
                            {
                                $('input[name="edit_dengueSignSymp[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_dengueSignSymp[]"]').prop('checked', false);
                        }
                        if (response.data.dengue_tests) 
                        {
                            let tests = JSON.parse(response.data.dengue_tests);
                            $('input[name="edit_dengueTests[]"]').prop('checked', false);
                            
                            tests.forEach(function(value) 
                            {
                                $('input[name="edit_dengueTests[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_dengueTests[]"]').prop('checked', false);
                        }
                        if (response.data.dengue_animals) 
                        {
                            let tests = JSON.parse(response.data.dengue_animals);
                            $('input[name="edit_dengueAnimalPres[]"]').prop('checked', false);
                            
                            tests.forEach(function(value) 
                            {
                                $('input[name="edit_dengueAnimalPres[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_dengueAnimalPres[]"]').prop('checked', false);
                        }
                        if (response.data.dengue_waterConIn) 
                        {
                            let inside = JSON.parse(response.data.dengue_waterConIn);
                            $('input[name="edit_dengueWaterCon[]"]').prop('checked', false);
                            
                            inside.forEach(function(value) 
                            {
                                $('input[name="edit_dengueWaterCon[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_dengueWaterCon[]"]').prop('checked', false);
                        }
                        if (response.data.dengue_waterConOut) 
                        {
                            let outside = JSON.parse(response.data.dengue_waterConOut);
                            $('input[name="edit_dengueWaterContainers[]"]').prop('checked', false);
                            
                            outside.forEach(function(value) 
                            {
                                $('input[name="edit_dengueWaterContainers[]"][value="' + value + '"]').prop('checked', true);
                            });
                        } 
                        else 
                        {
                            $('input[name="edit_dengueWaterContainers[]"]').prop('checked', false);
                        }
                    // Contact List
                        // Assuming `dengue_nameContact` and `dengue_addressContact` are stored as JSON arrays in the database
                        let names = JSON.parse(response.data.dengue_nameContact);
                        let addresses = JSON.parse(response.data.dengue_addressContact);

                        // Clear the container before appending new fields
                        $('#edit_fields-container').empty();

                        // Loop through the names and addresses to generate text fields
                        if (names && addresses && names.length === addresses.length) {
                            names.forEach((name, index) => {
                                // Generate new fieldset with name and address
                                let newFieldset = `
                                    <div class="edit_field-set mb-3 d-flex" style="width: 100%; justify-content: center!important; gap:15px;">
                                        <div class="column mb-3">
                                            <label for="edit_dengueNameContact_${index}" class="col-sm-5 col-form-label">Names</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="edit_dengueNameContact[]" id="edit_dengueNameContact_${index}" value="${name}" placeholder="Name...">
                                            </div>
                                        </div>
                                        <div class="column mb-3">
                                            <label for="edit_dengueAddressContact_${index}" class="col-sm-5 col-form-label">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="edit_dengueAddressContact[]" id="edit_dengueAddressContact_${index}" value="${addresses[index]}" placeholder="Address...">
                                            </div>
                                        </div>
                                    </div>
                                `;
                                
                                // Append new fields to the container
                                $('#edit_fields-container').append(newFieldset);
                            });
                        } else {
                            // If no values found, provide empty fields (optional)
                            $('#edit_fields-container').append(`
                                <div class="edit_field-set mb-3 d-flex" style="width: 100%; justify-content: center!important; gap:15px;">
                                    <div class="column mb-3">
                                        <label for="edit_dengueNameContact_0" class="col-sm-5 col-form-label">Names</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="edit_dengueNameContact[]" id="edit_dengueNameContact_0" placeholder="Name...">
                                        </div>
                                    </div>
                                    <div class="column mb-3">
                                        <label for="edit_dengueAddressContact_0" class="col-sm-5 col-form-label">Address</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="edit_dengueAddressContact[]" id="edit_dengueAddressContact_0" placeholder="Address...">
                                        </div>
                                    </div>
                                </div>
                            `);
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
    $(document).on('submit', '#edit_dengueInput', function (e) {
        e.preventDefault(); // Prevent default form submission behavior

        var dengue_id = $('#edit_dengueId').val(); 

        // Create a FormData object with the form fields
        var formData = new FormData();
        // TextBoxes
            formData.append('edit_dengueId', dengue_id);
            formData.append('edit_dengueFullName', $('#edit_dengueFullName').val());
            formData.append('edit_dengueDateSymp', $('#edit_dengueDateSymp').val());
            formData.append('edit_dengueScPl', $('#edit_dengueScPl').val());
            formData.append('edit_dengueInSymp', $('#edit_dengueInSymp').val());
            formData.append('edit_dengueDateFever', $('#edit_dengueDateFever').val());
            formData.append('edit_dengueTempHigh', $('#edit_dengueTempHigh').val());
            formData.append('edit_dengueTempMod', $('#edit_dengueTempMod').val());
            formData.append('edit_dengueTempSli', $('#edit_dengueTempSli').val());
            formData.append('edit_dengueStartDateSymp', $('#edit_dengueStartDateSymp').val());
            formData.append('edit_dengueDurFev', $('#edit_dengueDurFev').val());
            formData.append('edit_dengueMedTake', $('#edit_dengueMedTake').val());
            formData.append('edit_dengueIncDate', $('#edit_dengueIncDate').val());
            formData.append('edit_dengueWhen', $('#edit_dengueWhen').val());
            formData.append('edit_dengueHowLong', $('#edit_dengueHowLong').val());
            formData.append('edit_dengueTravelWhere', $('#edit_dengueTravelWhere').val());
            formData.append('edit_dengueAnimalSpecify', $('#edit_dengueAnimalSpecify').val());
            formData.append('edit_dengueWaterConSpecific', $('#edit_dengueWaterConSpecific').val());
            formData.append('edit_dengueWaterContainersSpec', $('#edit_dengueWaterContainersSpec').val());
            formData.append('edit_dengueByName', $('#edit_dengueByName').val());
            formData.append('edit_dengueAdDate', $('#edit_dengueAdDate').val());
            formData.append('edit_dengueAdBrgy', $('#edit_dengueAdBrgy').val());
            formData.append('edit_dengueAdSitio', $('#edit_dengueAdSitio').val());
            formData.append('edit_dengueAdMunicipality', $('#edit_dengueAdMunicipality').val());
            formData.append('edit_dengueStatuss', $('#edit_dengueStatuss').val());
        //FOR CHECKBOXES
            // Personal Info
                var checkSigns = [];
                    $('input[name="edit_dengueSignSymp[]"]:checked').each(function() {
                        checkSigns.push($(this).val());
                    });
                    
                    if (checkSigns.length > 0) {
                        formData.append('edit_dengueSignSymp', JSON.stringify(checkSigns));
                    } else {
                        formData.append('edit_dengueSignSymp', JSON.stringify([])); 
                    }
                var checkTests = [];
                    $('input[name="edit_dengueTests[]"]:checked').each(function() {
                        checkTests.push($(this).val());
                    });
                    
                    if (checkTests.length > 0) {
                        formData.append('edit_dengueTests', JSON.stringify(checkTests));
                    } else {
                        formData.append('edit_dengueTests', JSON.stringify([])); 
                    }
                var checkAnimal = [];
                    $('input[name="edit_dengueAnimalPres[]"]:checked').each(function() {
                        checkAnimal.push($(this).val());
                    });
                    
                    if (checkAnimal.length > 0) {
                        formData.append('edit_dengueAnimalPres', JSON.stringify(checkAnimal));
                    } else {
                        formData.append('edit_dengueAnimalPres', JSON.stringify([])); 
                    }
                var checkWaterIn = [];
                    $('input[name="edit_dengueWaterCon[]"]:checked').each(function() {
                        checkWaterIn.push($(this).val());
                    });
                    
                    if (checkWaterIn.length > 0) {
                        formData.append('edit_dengueWaterCon', JSON.stringify(checkWaterIn));
                    } else {
                        formData.append('edit_dengueWaterCon', JSON.stringify([])); 
                    }
                var checkWaterOut = [];
                    $('input[name="edit_dengueWaterContainers[]"]:checked').each(function() {
                        checkWaterOut.push($(this).val());
                    });
                    
                    if (checkWaterOut.length > 0) {
                        formData.append('edit_dengueWaterContainers', JSON.stringify(checkWaterOut));
                    } else {
                        formData.append('edit_dengueWaterContainers', JSON.stringify([])); 
                    }
        // For Contact Lists
        let contactDetails = {
            names: [],
            addresses: []
        };

        // Collect contact names and addresses
        $('#edit_fields-container .edit_field-set').each(function() {
            let name = $(this).find('input[name="edit_dengueNameContact[]"]').val();
            let address = $(this).find('input[name="edit_dengueAddressContact[]"]').val();

            // Push the values into arrays
            contactDetails.names.push(name);
            contactDetails.addresses.push(address);
        });

        // Convert to JSON strings and append to FormData
        formData.append('edit_dengueNameContact', JSON.stringify(contactDetails.names));
        formData.append('edit_dengueAddressContact', JSON.stringify(contactDetails.addresses));

        // FOR RADIO BUTTONS
                var radioHosp = $('input[name="edit_dengueHosp"]:checked').val();
                    if (radioHosp) {
                        formData.append('edit_dengueHosp', radioHosp);
                    }
                var radioOutcome = $('input[name="edit_dengueOutcome"]:checked').val();
                    if (radioOutcome) {
                        formData.append('edit_dengueOutcome', radioOutcome);
                    }
                var radioTravel = $('input[name="edit_dengueTravelHist"]:checked').val();
                    if (radioTravel) {
                        formData.append('edit_dengueTravelHist', radioTravel);
                    }
                var radioExposed = $('input[name="edit_dengueExpPer"]:checked').val();
                    if (radioExposed) {
                        formData.append('edit_dengueExpPer', radioExposed);
                    }
                var radioDoor = $('input[name="edit_dengueDoor"]:checked').val();
                    if (radioDoor) {
                        formData.append('edit_dengueDoor', radioDoor);
                    }

                
            //END OF FORMDATA APPEND

        $.ajax({
            type: "POST",
            url: "/updateDengue/" + dengue_id, // URL to handle the update
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