@include('layouts.headHealthWorkers')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap");
    * {
        font-family: Inter;
    }

    html {
        padding: 0;
        margin: 0;
    }
    
    .container {
        max-width: 100%!important;
        margin-top: 80px; 
        padding-bottom:10px; 
    }

    .toggle-sidebar-btn {
        display: none;
    }

    .pagetitle {
        display: flex;
        justify-content: space-between
    }

    .card {
        display: flex;
        flex-direction: column;
        margin: 0 10px;
        align-items: center;
        padding: 10px
    }

    input {
        text-align: left!important;
        padding-left: 5px;
        font-size: 14px;
    }

    .content input {
        margin-left: 2px;
        padding-right: 2px;
        border-bottom: 1px solid black;
        border-top: none;
        border-left: none;
        border-right: none;
        outline: none;
    }
    .content {
        display: flex;
        gap: 8px;
        flex-direction: column;
    }
    .content input {
        letter-spacing: 2px;
    }
    .mainContainer input {
        text-align: center;
        padding-bottom: 2px;
    }
    .mainContainer {
        letter-spacing: 2px;
        gap: 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .section1 {
        display: flex;
        flex-direction: row;
    }

    .section1 input {
        border-bottom: 1px solid black;
        border-top: none;
        border-left: none;
        border-right: none;
        outline: none;
    }
    .sec input {
        width: 109px;
    }
    .resName {
        width: 700px;
    }
    .section2 {
        display: flex;
        flex-direction: row;
    }
    .section2 input {
        border-bottom: 1px solid black;
        border-top: none;
        border-left: none;
        border-right: none;
        outline: none;
    }
    .resAddress {
        width: 686px;
    }
    .resOccu {
        width: 392px;
    }

    #resPlace {
        width: 345px;
    }
    .section3 {
        display: flex;
        flex-direction: row;
    }
    .section3 input {
        border-bottom: 1px solid black;
        border-top: none;
        border-left: none;
        border-right: none;
        outline: none;
    }
    .resDate {
        width: 525px;
        text-align: center;
    }
    .resPlace {
        width: 435px;
    }
    .section4 {
        display: flex;
        flex-direction: column;
        width: 100%;
        gap: 10px;
    }

    #resIniSymp {
        width: 1112px;
    }

    #resFev {
        width: 350px;
    }

    .sec4-1 {
        display: flex;
        flex-direction: row;
        width: 100%;
    }
    .sec4-1 input {
        width: 84.5%;
    }
    .sec4-2 {
        display: flex;
        flex-direction: row;
        width: 100%;
    }
    .resFev {
        width: 400px;
        text-align: center;
    }
    .lvl input {
        width: 148px;
    }
    .sec4-3 {
        display: flex;
        flex-direction: row;
        gap: 120px;
        margin-left: 47%;
    }
    .section5 {
        display: flex;
        flex-direction: column;
        width: 100%;
        gap: 2px;
    }
    .sec5-1 {
        margin-left: 50px;
    }
    .sec5-1 input {
        width: 430px;
        text-align: center;
    }
    .section5 p {
        margin-left: 50px;
    }
    .sec5-2 {
        display: flex;
        flex-direction: row;
        gap: 400px;
        letter-spacing: 2px;
        margin-left: 50px;
        margin-bottom: 50px;
    }
    .sec5-2-1 {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .sec6 {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .sec6-1 input {
        width: 87.5%;
        letter-spacing: 2px;
    }
    .sec6-2-1 {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .sec6-2 {
        display: flex;
        flex-direction: row;
    }
    .sec6-2-2 {
        gap: 50px;
        margin-left: 50px;
        margin-top: 15px;
        display: flex;
        flex-direction: row;
    }
    .sec6-2-3 {
        margin-left: 50px;
        display: flex;
        flex-direction: row;
        gap: 55px;
    }
    .sec6-3 {
        display: flex;
        flex-direction: row;
        width: 100%;
    }
    .sec6-3-1 {
        margin-top: 15px;
        display: flex;
        flex-direction: row;
        gap: 55px;
        margin-left: 82px;
    }
    .sec6-4 {
        display: flex;
        flex-direction: row;
    }
    .sec6-4-1 {
        margin-left: 8px;
        gap: 50px;
        margin-top: 15px;
        display: flex;
        flex-direction: row;
    }
    .HosInclu {
        width: 380px;
    }
    .Where {
        width: 165px;
    }
    .sec6-5 {
        display: flex;
        flex-direction: row;
    }
    .sec6-5-1 {
        gap: 20px;
        margin-left: 10px;
        margin-top: 15px;
        display: flex;
        flex-direction: row;
    }
    .sec6-6 {
        display: flex;
        flex-direction: row;
    }
    .sec6-6-1 {
        display: flex;
        flex-direction: row;
        margin-top: 15px;
        margin-left: 25px;
        gap: 50px;
    }
    .sec7 {
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .sec7-1 {
        gap: 25px;
        text-align: center;
        width: 100%;
        display: flex;
        flex-direction: row;
        margin-bottom: 25px;
    }
    .sec7-1-1 {
        gap: 20px;
        width: 50%;
        display: flex;
        flex-direction: column;
    }
    .sec7-1-1 input {
        width: 640px;
    }


    .content1 input {
    margin-left: 2px;
    padding-right: 2px;
    border-bottom: 1px solid black;
    border-top: none;
    border-left: none;
    border-right: none;
    outline: none;
    }
    .content1 {
        display: flex;
        gap: 8px;
        flex-direction: column;
    }
    .content1 input {
        letter-spacing: 2px;
    }
    .container1 input {
        text-align: center;
        padding-bottom: 2px;
    }
    .container1 {
        letter-spacing: 2px;
        gap: 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    section {
        display: flex;
        flex-direction: column;
        margin-top: 60px;
    }
    .section51 {
        margin-bottom: 80px;
    }
    .inputs1 {
        gap: 156.2px;
        margin-left: 60px;
        display: flex;
        flex-direction: row;
    }
    .section11,
    .section31 {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .section2-input1 {
        margin-left: 60px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .input11 {
        display: flex;
        flex-direction: column;
    }
    .input41 {
        margin-left: 60px;
        gap: 50px;
        display: flex;
        flex-direction: row;
    }
    .input11,
    .input21,
    .input31 {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .section41 {
        display: flex;
        flex-direction: row;
    }
    .input1 {
        margin-left: 50px;
        gap: 50px;
        margin-top: 16px;
        display: flex;
        flex-direction: row;
    }
    .inputted1 {
        align-items: center;
        display: flex;
        flex-direction: row;
        gap: 100px;
    }
    .inputted1 input {
        width: 300px;
    }
    .inputt1 {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .one1 input {
        margin-left: 20px;
    }
    .two1 input {
        margin-left: 55px;
    }
    .three1 input {
        margin-left: 5px;
    }
    .four1 input {
        margin-left: 67px;
    }
    .five1 input {
        margin-left: 30px;
    }

    #resAge {
        width: 50px;
    }
/* PRINT */
@media print {
    /* Set page orientation to landscape */
    @page {
        size: portrait;
        margin: 5mm; /* Set margins */
    }

    .sec5-2 {
        gap: 100px!important;
    }

    #address0, #address1, #name0, #name1 {
        width: 450px!important;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box; /* Ensure padding/border doesn't add extra space */
    }
    /* Ensure the body and all child elements are visible during printing */
    body {
        visibility: visible !important;
        background-color: #fff;
        margin: 0;
        padding: 0;
    }

    /* Hide unnecessary elements like page title, buttons, and other non-printable content */
    .header, .pagetitle {
        display: none !important; /* Hide page title and button area */
    }

    .card-title, .nav {
        display: none !important;
    }

    .card {
        box-shadow: none;
    }

    /* Make sure the card is visible and takes up the full page */
    .mainContainer, .container1 {
        width: 1100px; /* Ensure the card takes full width of the page */
        position: absolute;
        top: 0;
        left: 0;
        visibility: visible !important;
        background-color: #fff;
        display: block;
        padding: 1mm; /* Adjust padding to prevent clipping */
        box-sizing: border-box;
    }

    .titleArea {
        text-align: center;
    }

    p.titleArea{
        font-size: 20px!important;
        font-weight: 700;
    }

    .mainContainer * {
        padding: 5;
        background-color: #fff;
        font-size: 12px!important;
    }  

    .resName {
        width: 460px!important;
    }

    .resDate {
        width: 100px!important;
    }

    .resPlace {
        width: 565px!important;
    }

    #resIniSymp {
        width: 830px!important;
    }

    .resFev {
        width: 100px!important;
    }

    .sec4-3 {
        margin-left: 36%!important;
    }
}
</style>

<body>
  <!-- ======= Header ======= -->
    @include('layouts.headerHealthWorkers')
  <!-- End Header -->


<div id="container" class="container">

    <div class="pagetitle">
        <div class="pageArea">
            <h1>Dengue</h1>
            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ action('App\Http\Controllers\regValidation@dengue') }}">Dengue Input Form</a></li>
                  <li class="breadcrumb-item active">Dengue Form</li>
                </ol>
            </nav>
        </div>
        <div class="btnArea">
            <button type="button" class="btn btn-primary" id="print"><i class="bi bi-printer-fill"></i> Print</button>
        </div>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body" style="width: 100%!important;">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Front Form</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Back Form</button>
                </li>
            </ul>

            <div class="tab-content pt-2" id="borderedTabContent">
                {{-- FORM 1 --}}
                <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="mainContainer">
                        <p class="titleArea">EPIDEMIOLOGICAL QUESTIONNAIRE FOR DENGUE HEMORRHAGIC FEVER</p>
                        <div class="content">
                            <div class="section1">
                                <label for="resName">Name:</label>
                                <input class="resName" type="text" name="resName" id="resName" value="{{ $dengue->resident->res_lname ?? '' }}, {{ $dengue->resident->res_fname ?? '' }} {{ $dengue->resident->res_mname ?? '' }} {{ $dengue->resident->res_suffix ?? '' }}" readonly>
                                <div class="sec">
                                    <label for="resDob">Date of Birth:</label>
                                    <input type="text" name="resDob" id="resDob" value="{{ $dengue->resident->res_bdate ?? '' }}" readonly>
                                    <label for="resAge">Age:</label>
                                    <input type="text" name="resAge" id="resAge" readonly>
                                    <label for="resSex">Sex:</label>
                                    <input type="text" name="resSex" id="resSex" value="{{ $dengue->resident->res_sex ?? '' }}" readonly>
                                </div>
                            </div>
                            <div class="section2">
                                <label for="resAddress">Address:</label>
                                <input class="resAddress"type="text" name="resAddress" id="resAddress" value="{{ $dengue->resident->res_address ?? '' }}" readonly>
                                <label for="resOccu">Occupation:</label>
                                <input class="resOccu"type="text" name="resOccu" id="resOccu" value="{{ $dengue->resident->res_occupation ?? '' }}" readonly>
                            </div>
                            <div class="section3">
                                <label for="resDateSym">Date of Onset of Symptoms:</label>
                                <input class="resDate"type="date" name="resDateSym" id="resDateSym" value="{{ $dengue->dengue_date ?? '' }}" readonly>
                                <label for="resPlace">School/Places:</label>
                                <input type="text" class="resPlace"name="resPlace" id="resPlace" value="{{ $dengue->dengue_place ?? '' }}" readonly>
                            </div>
                            <div class="section4">
                                <div class="sec4-1">
                                    <label for="resIniSymp">Initial Symptoms:</label>
                                    <input type="text" name="resIniSymp" id="resIniSymp" value="{{ $dengue->dengue_initialSymp ?? '' }}" readonly>
                                </div>
                                <div class="sec4-2">
                                    <label for="resFev">Date of Onset of Fever:</label>
                                    <input class="resFev" type="date" name="resFev" id="resFev" value="{{ $dengue->dengue_dateOnSetFever ?? '' }}" readonly>
                                    <div class="lvl">
                                        <label for="resHigh">High:</label>
                                        <input type="text" name="resHigh" id="resHigh" value="{{ $dengue->dengue_high ?? '' }}" readonly>
                                        <label for="resMode">Moderate:</label>
                                        <input type="text" name="resMode" id="resMode" value="{{ $dengue->dengue_moderate ?? '' }}" readonly>
                                        <label for="resSli">Slight:</label>
                                        <input type="text" name="resSli" id="resSli" value="{{ $dengue->dengue_slight ?? '' }}" readonly>
                                    </div>
                                </div>
                                <div class="sec4-3">
                                    <p>(38.6 - 41)</p>
                                    <p>(38.1 - 38.5)</p>
                                    <p>(37.5 - below)</p>
                                </div>
                            </div>
                            <div class="section5">
                                <div class="sec5-1">
                                    <label for="dateStart">Date start of Fever:</label>
                                    <input type="date" name="dateStart" id="dateStart" value="{{ $dengue->dengue_dateOfFever ?? '' }}" readonly>
                                </div>
                                <p>Sign and Symptoms:</p>
                                <div class="sec5-2">
                                    <div class="sec5-2-1">
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp1" id="Symp1" {{ in_array('Headache', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp1">Headache - Labad sa Ulo</label>
                                        </div>
                                        <div class="sec5-2-2">    
                                            <input type="checkbox" name="Symp2" id="Symp2" {{ in_array('Retro-Ocular Pain', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp2">Retro-Ocular Pain - Sakit ang Palibot sa Mata</label>
                                        </div>
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp3" id="Symp3" {{ in_array('Joint Pain', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp3">Joint Pain - Sakit ang Lutahan</label>
                                        </div>
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp4" id="Symp4" {{ in_array('Joint Swelling', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp4">Joint Swelling - Namaga ang mga Lutahan</label>
                                        </div>
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp5" id="Symp5" {{ in_array('Muscle Pain', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp5">Muscle Pain - Sakit ang Kaunoran</label>
                                        </div>
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp6" id="Symp6" {{ in_array('Sore Throat', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp6">Sore Throat - Sakit / Karat ang tutonlan</label>
                                        </div>    
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp7" id="Symp7" {{ in_array('Nose Bleeding', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp7">Nose Bleeding - Sunggo</label>
                                        </div>   
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp8" id="Symp8" {{ in_array('Hepatomegaly', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp8">Hepatomegaly - Bugon sa tuo ubos gusok</label>
                                        </div>
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp9" id="Symp9" {{ in_array('Nausea', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp9">Nausea - Luod / Kasukaon</label>
                                        </div>              
                                    </div>
                                    <div class="sec5-2-1">
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp10" id="Symp10" {{ in_array('Vomiting', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp10">Vomiting - Nagsuka</label>
                                        </div>
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp11" id="Symp11" {{ in_array('Diarreha', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp11">Diarrhea - Nagkalibang</label>
                                        </div>
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp12" id="Symp12" {{ in_array('Petechiae', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp12">Petechiae - Pintik-pintik nga pula sa panit</label>
                                        </div>
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp13" id="Symp13" {{ in_array('Gum Bleeding', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp13">Gum Bleeding - Nagdugo ang Lagos</label>
                                        </div>
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp14" id="Symp14" {{ in_array('Ecohymosis', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp14">Ecohymosis - Lagum-lagum sa Panit</label>
                                        </div>
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp15" id="Symp15" {{ in_array('Maculo Popular Rash', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp15">Maculo Popular Rash - Panurok</label>
                                        </div>
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp16" id="Symp16" {{ in_array('Abdominal Pain', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp16">Abdominal Pain - Sakit sa Tiyan</label>
                                        </div>
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp17" id="Symp17" {{ in_array('G.I Bleeding', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp17">G.I Bleeding - Suka ug itom murag dinuguan</label>
                                        </div>
                                        <div class="sec5-2-2">
                                            <input type="checkbox" name="Symp18" id="Symp18" {{ in_array('Rectal Bleeding', $checkBoxSigns ?? []) ? 'checked' : '' }} disabled>
                                            <label for="Symp18">Rectal Bleeding - Nalibang ug itom murag dinuguan</label>
                                        </div>                   
                                    </div>
                                </div>
                            </div>
                            <div class="sec6">
                                <div class="sec6-1">
                                    <label for="MedTaken">Medication Taken:</label>
                                    <input type="text" name="MedTaken" id="MedTaken" value="{{ $dengue->dengue_medTake ?? '' }}" readonly>
                                </div>
                                <div class="sec6-2">
                                    <p>Hospitalized:</p>
                                    <div class="sec6-2-1">
                                        <div class="sec6-2-2">
                                            <div>
                                                <input type="radio" name="Hospitalized" value="Yes" id="HosYes" {{ $dengue->dengue_hospitalized == 'Yes' ? 'checked' : '' }} disabled>Yes
                                            </div>
                                            <div>
                                                <label for="HosWhen">When?</label>
                                                <input type="date" name="HosWhen" id="HosWhen" value="{{ $dengue->dengue_hospWhen ?? '' }}" readonly>
                                            </div>
                                            <div>
                                                <label for="HosLong">How Long?</label>
                                                <input type="text" name="HosLong" id="HosLong" value="{{ $dengue->dengue_hospLong ?? '' }}" readonly>
                                                </div>
                                        </div>
                                        <div class="sec6-2-3">
                                            <div>
                                                <input type="radio" name="Hospitalized" value="No" id="HosNo" {{ $dengue->dengue_hospitalized == 'No' ? 'checked' : '' }} disabled>No
                                            </div>
                                            <div>
                                                <label for="HosInclu">Inclusive Date:</label>
                                                <input class="HosInclu" type="date" name="HosInluc" id="HosInclu" value="{{ $dengue->dengue_inclusiveDate ?? '' }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sec6-3">
                                    <p>Outcome:</p>
                                    <div class="sec6-3-1">
                                        <div>
                                            <input type="radio" name="outcome" id="Recovered" {{ $dengue->dengue_outcome == 'Recovered' ? 'checked' : '' }} disabled>
                                            <label for="outcome">Recovered</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="outcome" id="NotImprove" {{ $dengue->dengue_outcome == 'Not Improved' ? 'checked' : '' }} disabled>
                                            <label for="outcome">Not Improved</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="outcome" id="Died" {{ $dengue->dengue_outcome == 'Died' ? 'checked' : '' }} disabled>
                                            <label for="outcome">Died</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="sec6-4">
                                    <p>History of travel for the past two weeks: </p>
                                    <div class="sec6-4-1">
                                        <div>
                                            <input type="radio" name="history" id="HistoryYes" {{ $dengue->dengue_hisTravel == 'Yes' ? 'checked' : '' }} disabled>
                                            <label for="history">Yes</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="history" id="HistoryNo" {{ $dengue->dengue_hisTravel == 'No' ? 'checked' : '' }} disabled>
                                            <label for="history">No</label>
                                        </div>
                                        <div>
                                            <label for="Where">Where</label>
                                            <input class="Where" type="text" name="Where" id="Where" value="{{ $dengue->dengue_whereTravel ?? '' }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="sec6-5">
                                    <p>Exposed to Person of similar manifestation: </p>
                                    <div class="sec6-5-1">
                                        <div>
                                            <input type="radio" name="Exposed" id="ExposedYes" {{ $dengue->dengue_exposed == 'Yes' ? 'checked' : '' }} disabled>
                                            <label for="Exposed">Yes</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="Exposed" id="ExposedNo" {{ $dengue->dengue_exposed == 'No' ? 'checked' : '' }} disabled>
                                            <label for="Exposed">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="sec6-6">
                                    <p>Laboratory Test:</p>
                                    <div class="sec6-6-1">
                                        <div>
                                            <input type="checkbox" name="cbc" id="cbc" {{ in_array('CBC', $checkboxTest ?? []) ? 'checked' : '' }} disabled>
                                            <label for="cbc">CBC</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="platelet" id="platelet" {{ in_array('Platelet', $checkboxTest ?? []) ? 'checked' : '' }} disabled>
                                            <label for="platelet">Platelet</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="dengue" id="dengue" {{ in_array('Dengue NS 1', $checkboxTest ?? []) ? 'checked' : '' }} disabled>
                                            <label for="dengue">Dengue NS1</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sec7">
                                <p><b>Name and Address of Contacts</b></p>
                                <div class="sec7-1">
                                    <div class="sec7-1-1">
                                        <label for="name">Name</label>
                                        @foreach($name as $index => $names)
                                            <input type="text" name="dengue_nameContact[]" id="name{{ $index }}" value="{{ $names }}">
                                        @endforeach
                                    </div>
                                
                                    <div class="sec7-1-1">
                                        <label for="address">Address</label>
                                        @foreach($address as $index => $adds)
                                            <input type="text" name="dengue_addressContact[]" id="address{{ $index }}" value="{{ $adds }}">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                {{-- FORM 2 --}}
                <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="container1">
                        <div class="content1">
                            <section class="section11">
                                <div class="label1">
                                    <p>Presence of Animals in your house or within the neighborhood 10 meters from your house:</p>
                                </div>
                                <div class="inputs1">
                                    <div class="input11">
                                        <div>
                                            <input type="checkbox" name="chicken" id="chicken" {{ in_array('Chicken', $checkboxAnimals ?? []) ? 'checked' : '' }} disabled>
                                            <label for="chicken">Chicken</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="birds" id="birds" {{ in_array('Birds', $checkboxAnimals ?? []) ? 'checked' : '' }} disabled>
                                            <label for="birds">Birds</label>
                                        </div>
                                    </div>
                                    <div class="input21">
                                        <div>
                                            <input type="checkbox" name="rats" id="rats" {{ in_array('Rats', $checkboxAnimals ?? []) ? 'checked' : '' }} disabled>
                                            <label for="rats">Rats</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="mosquito" id="mosquito" {{ in_array('Mosquito', $checkboxAnimals ?? []) ? 'checked' : '' }} disabled>
                                            <label for="mosquito">Mosquito</label>
                                        </div>
                                    </div>
                                    <div class="input31">
                                        <div>
                                            <input type="checkbox" name="cat" id="cat" {{ in_array('Cat', $checkboxAnimals ?? []) ? 'checked' : '' }} disabled>
                                            <label for="cat">Cat</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="flies" id="flies" {{ in_array('Flies', $checkboxAnimals ?? []) ? 'checked' : '' }} disabled>
                                            <label for="flies">Flies</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input41">
                                    <div>
                                        <label for="others">Other forms of Birds (Specify)</label>
                                        <input type="text" name="others" id="others" value="{{ $dengue->dengue_animalsSpecify ?? '' }}" readonly>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="dog" id="dog" {{ in_array('Dog', $checkboxAnimals ?? []) ? 'checked' : '' }} disabled>
                                        <label for="dog">Dog</label>
                                    </div>
                                </div>
                            </section>
                            <section class="section21">
                                <div class="label1">
                                    <p>Presence of Water Containers inside your house:</p>
                                </div>
                                <div class="section2-input1">
                                    <div>
                                        <input type="checkbox" name="flower" id="flower" {{ in_array('Flower Vase', $checkboxWaterIn ?? []) ? 'checked' : '' }} disabled>
                                        <label for="flower">Flower Base</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="water" id="water" {{ in_array('Water Storage Container', $checkboxWaterIn ?? []) ? 'checked' : '' }} disabled>
                                        <label for="water">Water Storage Containers</label>
                                    </div>
                                    <div>
                                        <label for="others1">Others (Specify)</label>
                                        <input type="text" name="others1" id="others1" value="{{ $dengue->dengue_waterInSpecify ?? '' }}" readonly>
                                    </div>
                                </div>
                            </section>
                            <section class="section31">
                                <div class="label1">
                                    <p>Presence of Water Containers outside your house or w/in the neighborhood 10 meters from your house:</p>
                                </div>
                                <div class="inputs1">
                                    <div class="input11">
                                        <div>
                                            <input type="checkbox" name="tin" id="tin" {{ in_array('Tin Cans', $checkboxWaterOut ?? []) ? 'checked' : '' }} disabled>
                                            <label for="tin">Tin Cans</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="tire" id="tire" {{ in_array('Used Tires', $checkboxWaterOut ?? []) ? 'checked' : '' }} disabled>
                                            <label for="tire">Used Tires</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="coco" id="coco" {{ in_array('Coconut Shells / Husk', $checkboxWaterOut ?? []) ? 'checked' : '' }} disabled>
                                            <label for="coco">Coconut Shells/Husk</label>
                                        </div>
                                    </div>
                                    <div class="input21">
                                        <div>
                                            <input type="checkbox" name="drums" id="drums" {{ in_array('Drums', $checkboxWaterOut ?? []) ? 'checked' : '' }} disabled>
                                            <label for="drums">Drums</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="lagoon" id="lagoon" {{ in_array('Lagoons', $checkboxWaterOut ?? []) ? 'checked' : '' }} disabled>
                                            <label for="lagoon">Lagoons</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="bamboo" id="bamboo" {{ in_array('Bamboo Poles', $checkboxWaterOut ?? []) ? 'checked' : '' }} disabled>
                                            <label for="bamboo">Bamboo Poles</label>
                                        </div>
                                    </div>
                                    <div class="input31">
                                        <div>
                                            <input type="checkbox" name="jar" id="jar" {{ in_array('Water Jars', $checkboxWaterOut ?? []) ? 'checked' : '' }} disabled>
                                            <label for="jar">Water Jars</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="canal" id="canal" {{ in_array('Canals', $checkboxWaterOut ?? []) ? 'checked' : '' }} disabled>
                                            <label for="canal">Canals</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input41">
                                    <div>
                                        <label for="others2">Others (Specifiy)</label>
                                        <input type="text" name="others2" id="others2" value="{{ $dengue->dengue_waterOutSpecify ?? '' }}" readonly>
                                    </div>
                                </div>
                            </section>
                            <section class="section41">
                                <div class="label1">
                                    <p>Presence of Windows and Door Screen in the house:</p>
                                </div>
                                <div class="input1">
                                    <div>
                                        <input type="radio" name="windoor" id="Yes" {{ $dengue->dengue_doorWindow == 'Yes' ? 'checked' : '' }} disabled>
                                        <label for="windoor">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="windoor" id="No" {{ $dengue->dengue_doorWindow == 'No' ? 'checked' : '' }} disabled>
                                        <label for="windoor">No</label>
                                    </div>
                                </div>
                            </section>
                            <section class="section51">
                                <div class="inputted1">
                                    <div class="inputt1">
                                        <div class="one1">
                                            <label for="by">By:</label>
                                            <input type="text" name="by" id="by" value="{{ $dengue->em_id ?? '' }}" readonly>
                                        </div>
                                        <div class="three1">
                                            <label for="date">Date:</label>
                                            <input type="date" name="date" id="date" value="{{ $dengue->dengue_adminDate ?? '' }}" readonly>
                                        </div>
                                    </div>
                                    <div class="inputt1">
                                        <div class="five1">
                                            <label for="brgy">Barangay:</label>
                                            <input type="text" name="brgy" id="brgy" value="{{ $dengue->dengue_adminBrgy ?? '' }}" readonly>
                                        </div>
                                        <div class="four1">
                                            <label for="sitio">Sitio:</label>
                                            <input type="text" name="sitio" id="sitio" value="{{ $dengue->dengue_adminSitio ?? '' }}" readonly>
                                        </div>
                                        <div>
                                            <label for="munici">Municipality:</label>
                                            <input type="text" name="munici" id="munici" value="{{ $dengue->dengue_adminMunicipality ?? '' }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    
                </div>
            </div><!-- End Bordered Tabs -->
        </div>
    </div>
</div>
  @include('layouts.footerHealthWorkers')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
  <script>
    const printBtn = document.getElementById('print');
    printBtn.addEventListener('click', function() {
        window.print();
    }); 

    $(document).ready(function() {
      $('#dob').inputmask('99/99/9999'); // This will set the format to MM/DD/YYYY
    });

    function calculateAge(dob) {
        const birthDate = new Date(dob);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDifference = today.getMonth() - birthDate.getMonth();

        // Adjust age if the birthday hasn't occurred yet this year
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    // Calculate age when the DOM is fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        const dobInput = document.getElementById('resDob');
        const ageInput = document.getElementById('resAge');

        // Calculate and set age initially
        const dobValue = dobInput.value;
        if (dobValue) {
            ageInput.value = calculateAge(dobValue);
        }
    });
  </script>
  
</body>

</html>