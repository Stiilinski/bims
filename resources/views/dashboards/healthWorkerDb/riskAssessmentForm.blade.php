@include('layouts.headHealthWorkers')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap");
    * {
        font-family: Inter;
        font-size: 12px;
    }
    p {
        margin-top: 7px!important;
    }
    input[type="radio"] {
        height: 12px;
        width: 12px
    }
    .container {
        max-width: 100%!important;
        margin-top: 80px; 
        padding: 10px; 
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

    .headerForm h3 {
        text-align: center;
        font-size: 1.5rem;
    }

    .headerForm p {
        text-align: justify;
        font-size: 14px;
    }

    .titleForm {
        font-size: 15px;
    }

    html {
        padding: 0;
        margin: 0;
    }
    .mainContent input {
        margin-left: 2px;
        padding-right: 2px;
        outline: none;
    }
    .mainContent {
        margin-top: 50px;
        display: flex;
        gap: 8px;
        flex-direction: column;
        align-items: center;
    }
    .mainContainer input {
        text-align: center;
        padding-bottom: 2px;
    }
    .mainContainer {
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .section1 {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
    .sections1 {
        display: flex;
        flex-direction: column;
        width: 35%;
    }

    .first-sec {
        display: flex;
        flex-direction: row;
    }
    .risk {
        border: 1px solid black;
        margin-bottom: 50px;
    }
    .risk label {
        margin-left: 4px;
    }
    .risk input {
        padding: 4px;
        width: 100px;
        border: none;
    }
    .title {
        display: flex;
        flex-direction: column;
        text-align: center;
        margin-top: -15px;
        margin-left: 30px;
    }
    .title p {
        margin-top: -10px;
    }
    .info {
        padding-left: 5px;
        border-top: 1px solid black;
        border-left: 1px solid black;
        border-right: 1px solid black;
        display: flex;
        flex-direction: column;
    }
    .information1 {
        display: flex;
        flex-direction: column;
    }
    .information1 input {
        width: 250px;
        height: 25px;
        border: none;
    }
    .information-sec {
        display: flex;
        flex-direction: row;
    }
    .information2 {
        display: flex;
        flex-direction: column;
    }
    .information2 label {
        padding-left: 5px;
    }
    .info2-1 {
        display: flex;
        flex-direction: row;
    }
    .age {
        border-top: 1px solid black;
        padding-bottom: 6px;
    }
    .age input {
        border: none;
        width: 70px;
    }
    .date {
        padding-bottom: 7px;
        border-top: 1px solid black;
        border-right: 1px solid black;
    }
    .date input {
        border: none;
    }
    .civil {
        border-bottom: 1px solid black;
        display: flex;
        flex-direction: column;
        border-top: 1px solid black;
        border-right: 1px solid black;
    }
    .civilstat {
        margin-top: 5px;
        margin-left: 5px;
        display: flex;
        flex-direction: row;
        gap: 15px;
    }
    .civilstat input {
        margin-top: 0;
    }
    .sex {
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }
    .sexx {
        margin-top: 2px;
        margin-left: 5px;
        gap: 10px;
        padding-bottom: 3px;
        display: flex;
        flex-direction: row;
    }
    .info2-2 input {
        height: 25px;
        width: 245px;
        border: none;
    }
    .info2-2 {
        display: flex;
        flex-direction: column;
    }
    .education {
        border-top: 1px solid black;
    }
    .third-sec {
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .third-sec1 {
        width: 90%;
    }
    .third-sec2 {
        width: 55%;
    }
    .fam1 {
        padding: 5px;
        border: 1px solid black;
        display: flex;
        flex-direction: column;
    }
    .fam1 p {
        margin-top: 0;
        margin-bottom: 2px;
    }
    .fam1-1 {
        display: flex;
        flex-direction: column;
        margin-top: 20px;
        width: 100%;
    }
    .famm1,
    .famm2,
    .famm3,
    .famm4,
    .famm5,
    .famm6,
    .famm7 {
        display: flex;
        flex-direction: row;
        gap: 20px;
    }
    .puts input {
        border: 1px solid black;
    }
    .famm1 label {
        margin-right: 11px;
    }
    .famm6 label {
        margin-right: 46.5px;
    }
    .famm5 label {
        margin-right: 44.5px;
    }
    .famm4 label {
        margin-right: 37.5px;
    }
    .famm3 label {
        margin-right: 16px;
    }
    .famm2 label {
        margin-right: 50.5px;
    }
    .fam2 {
        border-bottom: 1px solid black;
        border-left: 1px solid black;
        border-right: 1px solid black;
        padding: 5px;
        display: flex;
        flex-direction: column;
        height: 350px;
    }
    .fam2-2 {
        display: flex;
        flex-direction: column;
    }
    .fam2-1 {
        display: flex;
        flex-direction: row;
        gap: 20px;
    }
    .fam2-1 label {
        margin-right: 42px;
    }
    .faminformation {
        display: flex;
        flex-direction: row;
    }
    .height input,
    .weight input {
        width: 40px;
        font-size: 12px;
        height: 15px;
    }
    .height label,
    .weight label {
        font-size: 10px;
    }
    .faminfo1 {
        display: flex;
        flex-direction: column;
        gap: 5px;
        width: 50%;
        margin-top: 10px;
    }
    .bmi input {
        width: 50px;
        height: 20px;
        font-size: 12px;
    }
    .faminfo2 {
        margin-top: 10px;
    }
    .posts {
        width: 100%;
    }
    .posts p {
        margin-top: 2px;
        font-size: 9px;
        margin-bottom: 0px;
    }
    .obis {
        margin-left: 25px;
    }
    .faminformation1 {
        font-size: 11px;
        letter-spacing: 1px;
        text-align: center;
    }
    .fam2-3 {
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .adipos {
        margin-top: 5px;
        display: flex;
        flex-direction: row;
        gap: 15px;
    }
    .waist {
        margin-top: 10px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
    }
    .waist input {
        height: 20px;
        width: 35px;
        font-size: 10px;
    }
    .waist label {
        text-align: center;
        margin-left: 5px;
    }
    .bloodpre {
        margin-bottom: 10px;
        margin-top: 10px;
        display: flex;
        flex-direction: row;
        gap: 15px;
    }
    .bloodpre label {
        margin-right: 50px;
    }
    .tolic {
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .tolic1,
    .tolic2 {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }
    .tolic1 p {
        margin-right: 4px;
    }
    .tolic2 {
        margin-top: -6px;
    }
    .sys,
    .dia {
        display: flex;
        flex-direction: row;
        gap: 4px;
    }
    .sys input,
    .dia input {
        height: 20px;
        width: 38px;
    }
    .label {
        margin-left: 65px;
        margin-top: -15px;
        display: flex;
        flex-direction: row;
        gap: 30px;
        align-items: center;
        justify-content: center;
    }
    .context{
        margin-top: -12px;
    }
    .third-sec2 {
        width: 100%;
        display: flex;
        flex-direction: column;
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        height: 545px;
    }
    .smoke {
        padding: 3px;
        display: flex;
        flex-direction: column;
        border-bottom: 1px solid black;
    }
    .smoking {
        display: flex;
        flex-direction: row;
        gap: 40px;
    }
    .classes {
        margin-top: 5px;
        display: flex;
        flex-direction: column;
    }
    .alcoholic {
        padding: 3px;
        display: flex;
        flex-direction: column;
        border-bottom: 1px solid black;
    }
    .drink {
        display: flex;
        flex-direction: row;
        gap: 40px;
        margin-bottom: 3px;
    }
    .excess p {
        margin-top: 3px;
        margin-bottom: 0px;
    }
    .excessing {
        display: flex;
        flex-direction: row;
        justify-content: right;
        margin-right: 20px;
        gap: 20px;
    }
    .fats {
        display: flex;
        flex-direction: column;
        padding: 3px;
        border-bottom: 1px solid black;
    }
    .fatty {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .desc {
        /* margin-top: -5px; */
    }
    .opts {
        margin-top: -30px;
        display: flex;
        flex-direction: row;
        gap: 5px;
        justify-content: center;
        margin-right: 20px;
    }
    .fruity {
        padding: 3px;
        display: flex;
        flex-direction: column;
        border-bottom: 1px solid black;
    }
    .prot1,
    .prot2 {
        gap: 10px;
        display: flex;
        flex-direction: row;
    }
    .vege {
        display: flex;
        flex-direction: row;
    }
    .prot1 {
        margin-left: 10px;
    }
    .prot2 {
        margin-left: 30px;
    }
    .physical {
        display: flex;
        flex-direction: column;
        padding: 3px;
        border-bottom: 1px solid black;
    }

    .phy {
        display: flex;
        flex-direction: row;
        justify-content: right;
        margin-top: -30px;
        margin-right: 20px;
        gap: 15px;
    }
    .assess {
        display: flex;
        flex-direction: column;
        height: 220px;
        padding: 8px;
        gap: 30px;
    }
    .assessing {
        display: flex;
        flex-direction: column;
        margin-top: -25px
    }

    .signature{
        width: 250px;
    }

    .sig2 img{
        margin-top: 5px;
    }

    .assessing input {
        width: 220px;
        height: 20px;
        border-bottom: 1px solid black;
        border-top: none;
        border-left: none;
        border-right: none;
    }
    .sections2 {
        display: flex;
        flex-direction: column;
        border: 1px solid black;
        width: 885px;
    }
    .questions {
        padding: 5px;
        border-bottom: 1px solid black;
        display: flex;
        flex-direction: column;
        
    }
    .questionaire0 {
        display: flex;
        flex-direction: column;

    }
    .descrip p {
        margin-top: 0px;
        margin-bottom: 0px;
    }

    .arrangeRadio {
        display: flex;
    }

    .secondCon {
        display: flex;
        justify-content: space-between
    }

    .first {
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 20px;
        margin-right: 200px;
        margin-bottom: 5px;
    }
    .second {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 20px;
    }
    .skip p {
        margin-top: 2px;
        margin-bottom: 0px;
    }
    .third {
        display: flex;
        flex-direction: row;
        gap: 20px;
        margin-bottom: 0px;
    }
    .fourth {
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 20px;
        margin-right: 200px;
        margin-top: -17px;
    }
    .fifth {
        display: flex;
        flex-direction: row;
        justify-content: left;
        margin-left: 50px;
        gap: 20px;
        margin-top: -17px;
    }
    .sixth {
        display: flex;
        flex-direction: row;
        justify-content: right;
        margin-right: 70px;
        gap: 20px;
        margin-top: -17px;
    }
    .seventh {
        display: flex;
        flex-direction: row;
        gap: 20px;
    }
    .eighth {
        display: flex;
        flex-direction: row;
        gap: 20px;
        justify-content: right;
        margin-top: -17px;
        margin-right: 70px;
    }
    .ninth {
        display: flex;
        flex-direction: row;
        gap: 20px;
        margin-left: 110px;
        margin-top: -17px;
    }
    .answered {
        margin: 5px 0px;
    }
    .tenth {
        display: flex;
        flex-direction: row;
        gap: 20px;
        justify-content: right;
        margin-right: 70px;
        margin-top: -17px;
    }
    .foot p {
        margin-bottom: 0px;
    }
    .presence {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .pres {
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .prese1 {
        padding: 10px;
        width: 50%;
        border-right: 1px solid black;
        border-bottom: 1px solid black;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }
    .prese2 {
        width: 50%;
    }
    .ques9 {
        display: flex;
        justify-content: center;
    }
    .eleventh {
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 20px;
    }
    .without {
        display: flex;
        justify-content: center;
        gap: 20px;
    }
    .otherop p {
        margin-top: 1px;
        margin-bottom: 1px;
    }
    .tops p {
        margin-top: 0px;
    }
    .question10 {
        display: flex;
        flex-direction: column;
    }
    .polyy {
        margin-left: 20px;
        display: flex;
        flex-direction: row;
    }
    .twelveth,
    .thirteenth,
    .fourteenth {
        display: flex;
        flex-direction: row;
        gap: 20px;
        margin-left: 40px;
    }
    .thirteenth {
        margin-left: 45px;
    }
    .fourteenth {
        margin-left: 57px;
    }
    .prese2 {
        display: flex;
        flex-direction: column;
        border-bottom: 1px solid black;
    }
    .glucose {
        display: flex;
        flex-direction: column;
        padding: 10px;
        border-bottom: 1px solid black;
    }
    .glucose1 {
        display: flex;
        flex-direction: row;
        width: 100%;
    }
    .gluc {
        width: 50%;
        display: flex;
        flex-direction: row;
        gap: 20px;
        justify-content: right;
    }
    .inputs {
        display: flex;
        flex-direction: row;
        width: 100%;
    }
    .input1 {
        display: flex;
        flex-direction: row;
    }
    .input2 {
        margin-left: 45px;
        display: flex;
        flex-direction: row;
    }
    .input2 input {
        margin-left: 5px;
        font-size: 12px;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: 1px solid black;
        margin-bottom: 0px;
    }
    .input1 input {
        height: 20px;
        width: 40px;
    }
    .input1 label {
        margin-top: 12px;
    }
    .input2 label {
        margin-top: 12px;
    }
    .ifYes p {
        margin-top: 0px;
        margin-left: 20px;
    }
    .lipids {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .lipid {
        display: flex;
        flex-direction: row;
        gap: 20px;
        justify-content: right;
        margin-right: 68px;
        margin-top: -17px;
    }
    .input3 {
        display: flex;
        flex-direction: row;
        gap: 5px;
    }
    .input4 {
        display: flex;
        flex-direction: row;
        gap: 5px;
    }
    .input3 input {
        height: 20px;
        width: 40px;
    }
    .input3 label {
        margin-top: 5px;
        font-size: 11px;
        margin-right: 10px;
    }
    .input4 input {
        font-size: 12px;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: 1px solid black;
    }
    .input4 label {
        margin-top: 10px;
    }

    .ketone {
        display: flex;
        flex-direction: column;
        padding: 10px;
    }
    .urine {
        justify-content: right;
        gap: 20px;
        margin-right: 40px;
        margin-top: -17px;
        display: flex;
        flex-direction: row;
    }
    .keton {
        display: flex;
        flex-direction: row;
    }
    .keton1 {
        display: flex;
        flex-direction: row;
    }
    .keton1 input {
        height: 20px;
        width: 40px;
    }
    .keton1 label {
        margin-top: 5px;
    }
    .keton2 {
        display: flex;
        flex-direction: row;
    }
    .keton2 input {
        font-size: 12px;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: 1px solid black;
    }
    .keton2 label {
        margin-top: 10px;
    }
    .keton2 {
        margin-left: 25px;
    }
    .proteins {
        margin-top: 10px;
        display: flex;
        flex-direction: column;
    }
    .prote {
        display: flex;
        flex-direction: row;
        justify-content: right;
        margin-top: -17px;
        gap: 20px;
        margin-right: 40px;
    }
    .ketone3 {
        display: flex;
        flex-direction: row;
    }
    .ketone3 input {
        height: 20px;
        width: 40px;
    }
    .ketons {
        display: flex;
        flex-direction: row;
    }
    .quest {
        text-align: center;
    }
    .ketone3 label {
        margin-top: 5px;
    }
    .ketone4 {
        margin-left: 25px;
        display: flex;
        flex-direction: row;
    }
    .ketone4 label {
        margin-top: 10px;
    }
    .ketone4 input {
        font-size: 12px;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: 1px solid black;
    }
    .manage {
        padding: 5px;
        display: flex;
        flex-direction: column;
    }
    .management {
        display: flex;
        flex-direction: row;
        gap: 20px;
    }
    .manage input {
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: 1px solid black;
    }
    .section2 {
        padding: 5px;
        height: 100%;
        margin-top: -10px;
        gap: 30px;
        display: flex;
        flex-direction: row;
        border-bottom: 1px solid black;
        border-left: 1px solid black;
        border-right: 1px solid black;
        width: 1440px;
    }
    .findings input {
        width: 625px;
        border-bottom: 1px solid black;
        border-top: none;
        border-left: none;
        border-right: none;
    }

    .mainContent * {
        font-size: 10px;
    }

/* PRINT */
@media print {
    /* Set page orientation to landscape */
    @page {
        size: landscape;
        margin: 5mm; /* Set margins */
    }

    .section2 {
        width: 97.9%;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box; /* Ensure padding/border doesn't add extra space */
    }
    
    .info2-1, .info2-2 {
        width: 95%!important;
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

    .mainContent {
        margin-top: -5px!important;
    }

    /* Make sure the card is visible and takes up the full page */
    .card {
        width: 1450px;
        position: absolute;
        top: 0;
        left: 0;
        visibility: visible !important;
        background-color: #fff;
        box-shadow: none;
        display: block;
        padding: 5mm; /* Adjust padding to prevent clipping */
        box-sizing: border-box;
    }

    .card-body * {
        width: 100%;
        background-color: #fff;
        padding: 5px;
    }

    .second-sec {
        margin-top: -30px
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
            <h1>Risk Assessment Form</h1>
            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ action('App\Http\Controllers\regValidation@riskAssessment') }}">Risk Assessment</a></li>
                  <li class="breadcrumb-item active">Risk Assessment Form</li>
                </ol>
              </nav>
        </div>
        <div class="btnArea">
            <button type="button" class="btn btn-primary" id="print"><i class="bi bi-printer-fill"></i> Print</button>
        </div>
    </div><!-- End Page Title -->
  
    <div class="card">
        <div class="mainContainer">
            <div class="mainContent">
                <div class="section1">
                    <section class="sections1">
                        <div class="first-sec">
                            <div class="risk">
                                <label for="riskid">ID No.</label>
                                <input type="text" name="riskid" id="riskid">
                            </div>
                            <div class="title">
                                <h3><b class="titleForm">CVD/NCD RISK ASSESSMENT FORM</b></h3>
                                <p>For adults 20 years old above</p>
                            </div>
                        </div>
                        <div class="second-sec">
                            <div class="information-sec">
                                <div class="information1">
                                    <div class="info">
                                        <label for="dateass">Date of Assessment:</label>
                                        <input type="date" name="dateass" id="dateass" value="{{ $risk->risk_dateAss ?? '' }}" readonly>
                                    </div>
                                    <div class="info">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" id="name" value="{{ $risk->resident->res_lname ?? '' }}, {{ $risk->resident->res_fname ?? '' }}  @if($risk->resident->res_mname && !in_array($risk->resident->res_mname, ['N/A', '', null])) {{ $risk->resident->res_mname }} @endif @if($risk->resident->res_suffix && !in_array($risk->resident->res_suffix, ['N/A', '', null])) {{ $risk->resident->res_suffix }}  @endif"  readonly>
                                    </div>
                                    <div class="info">
                                        <label for="address">Address:</label>
                                        <input type="text" name="address" id="address" value="{{ $risk->resident->res_address ?? '' }}" readonly>
                                    </div>
                                    <div class="info">
                                        <label for="occu">Occupation:</label>
                                        <input type="text" name="occu" id="occu" value="{{ $risk->resident->res_occupation ?? '' }}" readonly>
                                    </div>
                                </div>
                                <div class="information2">
                                    <div class="info2-1">
                                        <div class="info2-1-1">
                                            <div class="date">
                                                <label for="bdate">Birth Date:</label>
                                                <input type="date" name="bdate" id="bdate" value="{{ $risk->resident->res_bdate ?? '' }}" readonly>
                                            </div>
                                            <div class="civil">
                                                <label for="civilstat">Civil Status:</label>
                                                <div class="civilstat">
                                                    <div>
                                                        <input type="radio" name="civilstat" id="single" value="Single" {{ $risk->resident->res_civil == 'Single' ? 'checked' : '' }} disabled>S
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="civilstat" id="married" value="Married" {{ $risk->resident->res_civil == 'Married' ? 'checked' : '' }} disabled>M
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="civilstat" id="widowed" value="Widowed" {{ $risk->resident->res_civil == 'Widowed' ? 'checked' : '' }} disabled>W
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="info2-1-2">
                                            <div class="age">
                                                <label for="age">Age: </label>
                                                <input type="text" name="age" id="age">
                                            </div>
                                            <div class="sex">
                                                <label for="sex">Sex:</label>
                                                <div class="sexx">
                                                    <div>
                                                        <input type="radio" name="sex" id="Male"  {{ $risk->resident->res_sex == 'Male' ? 'checked' : '' }} disabled>M
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="sex" id="Female" {{ $risk->resident->res_sex == 'Female' ? 'checked' : '' }} disabled>F
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info2-2">
                                        <div class="contact">
                                            <label for="conNumber">Contact Numbers:</label>
                                            <input type="text" name="conNumber" id="conNumber" value="{{ $risk->resident->res_contact ?? '' }}" readonly>
                                        </div>
                                        <div class="education">
                                            <label for="eduAttain">Educational Attainment:</label>
                                            <input type="text" name="eduAttain" id="eduAttain" value="{{ $risk->resident->res_educ ?? '' }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="third-sec">
                                <div class="third-sec1">
                                    <div class="fam1">
                                        <p><b>Family History</b></p>
                                        <p>Does patient have 1st degree relative with:</p>
                                        <div class="fam1-1">
                                            <div class="famm1">
                                                <label for="hyper">Hypertension</label>
                                                <div class="puts">
                                                    <input type="radio" name="hyper" id="hyperYes" value="Yes" {{ $risk->risk_fhHypertension == 'Yes' ? 'checked' : '' }} disabled>Yes
                                                </div>
                                                <div class="puts">
                                                    <input type="radio" name="hyper" id="hyperNo" value="No" {{ $risk->risk_fhHypertension == 'No' ? 'checked' : '' }} disabled>No
                                                </div>
                                            </div>
                                            <div class="famm2">
                                                <label for="stroke">Stroke</label>
                                                <div class="puts">
                                                    <input type="radio" name="stroke" id="strokeYes" value="Yes" {{ $risk->risk_fhStroke == 'Yes' ? 'checked' : '' }} disabled>Yes
                                                </div>
                                                <div class="puts">
                                                    <input type="radio" name="stroke" id="strokeNo" value="No" {{ $risk->risk_fhStroke == 'No' ? 'checked' : '' }} disabled>No
                                                </div>
                                            </div>
                                            <div class="famm3">
                                                <label for="heart">Heart Attack</label>
                                                <div class="puts">
                                                    <input type="radio" name="heart" id="heartYes" value="Yes" {{ $risk->risk_fhHeartAttack == 'Yes' ? 'checked' : '' }} disabled>Yes
                                                </div>
                                                <div class="puts">
                                                    <input type="radio" name="heart" id="heartNo" value="No" {{ $risk->risk_fhHeartAttack == 'No' ? 'checked' : '' }} disabled>No
                                                </div>
                                            </div>
                                            <div class="famm4">
                                                <label for="diabetes">Diabetes</label>
                                                <div class="puts">
                                                    <input type="radio" name="diabetes" id="diabetesYes" value="Yes" {{ $risk->risk_fhDiabetes == 'Yes' ? 'checked' : '' }} disabled>Yes
                                                </div>
                                                <div class="puts">
                                                    <input type="radio" name="diabetes" id="diabetesNo" value="No" {{ $risk->risk_fhDiabetes == 'No' ? 'checked' : '' }} disabled>No
                                                </div>
                                            </div>
                                            <div class="famm5">
                                                <label for="asthma">Asthma</label>
                                                <div class="puts">
                                                    <input type="radio" name="asthma" id="asthmaYes" value="Yes" {{ $risk->risk_fhAsthma == 'Yes' ? 'checked' : '' }} disabled>Yes
                                                </div>
                                                <div class="puts">
                                                    <input type="radio" name="asthma" id="asthmaNo" value="No" {{ $risk->risk_fhAsthma == 'No' ? 'checked' : '' }} disabled>No
                                                </div>
                                            </div>
                                            <div class="famm6">
                                                <label for="cancer">Cancer</label>
                                                <div class="puts">
                                                    <input type="radio" name="cancer" id="cancerYes" value="Yes" {{ $risk->risk_fhCancer == 'Yes' ? 'checked' : '' }} disabled>Yes
                                                </div>
                                                <div class="puts">
                                                    <input type="radio" name="cancer" id="cancerNo" value="No" {{ $risk->risk_fhCancer == 'No' ? 'checked' : '' }} disabled>No
                                                </div>
                                            </div>
                                            <div class="famm7">
                                                <label for="kidney">Kidney Disease</label>
                                                <div class="puts">
                                                    <input type="radio" name="kidney" id="kidneyYes" value="Yes" {{ $risk->risk_fhKidney == 'Yes' ? 'checked' : '' }} disabled>Yes
                                                </div>
                                                <div class="puts">
                                                    <input type="radio" name="kidney" id="kidneyNo" value="No" {{ $risk->risk_fhKidney == 'No' ? 'checked' : '' }} disabled>No
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fam2">
                                        <div class="fam2-1">
                                            <label for="obesity"><b>Obesity</b></label>
                                            <div>
                                                <input type="radio" name="obesity" id="obesityYes" value="Yes" {{ $risk->risk_obObesity == 'Yes' ? 'checked' : '' }} disabled>Yes
                                            </div>
                                            <div>
                                                <input type="radio" name="obesity" id="obesityNo" value="No" {{ $risk->risk_obObesity == 'No' ? 'checked' : '' }} disabled>No
                                            </div>
                                        </div>
                                        <div class="fam2-2">
                                            <div class="faminformation">
                                                <div class="faminfo1">
                                                    <div class="height">
                                                        <input type="text" name="height" id="height" value="{{ $risk->risk_obHt ?? '' }}" readonly>
                                                        <label for="height">HT (cm)</label>
                                                    </div>
                                                    <div class="weight">
                                                        <input type="text" name="weight" id="weight" value="{{ $risk->risk_obWt ?? '' }}" readonly>
                                                        <label for="weight">WT (kg)</label>
                                                    </div>
                                                </div>
                                                <div class="faminfo2">
                                                    <div class="bmi">
                                                        <input type="text" name="bmi" id="bmi" value="{{ $risk->risk_obBmi ?? '' }}" readonly>
                                                        <label for="bmi">BMI</label>
                                                    </div>
                                                    <div class="posts">
                                                        <p>Overweight: 23.0 - 24.9</p>
                                                        <p>Obese:<span class="obis">≥25.0</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="faminformation1">
                                                <p>BMI = [Wt (kg) + Ht (cm) 10,000]</p>
                                            </div>
                                        </div>
                                        <div class="fam2-3">
                                            <div class="adipos">
                                                <label for="adiposity"><b>Central Adiposity</b></label>
                                                <div>
                                                    <input type="radio" name="adiposity" id="adiposityYes" {{ $risk->risk_obAdiposity == 'Yes' ? 'checked' : '' }} disabled value="Yes">Yes
                                                </div>
                                                <div>
                                                    <input type="radio" name="adiposity" id="adiposityNo" {{ $risk->risk_obAdiposity == 'No' ? 'checked' : '' }} disabled value="No">No
                                                </div>
                                            </div>
                                            <div class="waist">
                                                <input type="text" name="waist" id="waist" value="{{ $risk->risk_obWc ?? '' }}" readonly>
                                                <label for="waist">Waist circumference (cm)</label>
                                            </div>
                                            <div class="bloodpre">
                                                <label for="raisebp"><b>Raise BP</b></label>
                                                <div>
                                                    <input type="radio" name="raisebp" id="raiseYes" value="Yes" {{ $risk->risk_obBp == 'Yes' ? 'checked' : '' }} disabled>Yes
                                                </div>
                                                <div>
                                                    <input type="radio" name="raisebp" id="raiseNo" value="No" {{ $risk->risk_obBp == 'No' ? 'checked' : '' }} disabled>No
                                                </div>
                                            </div>
                                            <div class="tolic">
                                                <div class="tolic1">
                                                    <p>Systolic</p>
                                                    <div class="sys">
                                                        <input type="text" name="sys1" id="sys1" value="{{ $risk->risk_obSysFirst ?? '' }}" readonly>
                                                        <input type="text" name="sys2" id="sys2" value="{{ $risk->risk_obSysSec ?? '' }}" readonly>
                                                        <input type="text" name="sys3" id="sysaverage" value="{{ $risk->risk_obSysAve ?? '' }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="tolic2">
                                                <p>Diastolic</p>
                                                    <div class="dia">
                                                        <input type="text" name="dia1" id="dia1" value="{{ $risk->risk_obDiaFirst ?? '' }}" readonly>
                                                        <input type="text" name="dia2" id="dia2" value="{{ $risk->risk_obDiaSec ?? '' }}" readonly>
                                                        <input type="text" name="dia3" id="diaaverage" value="{{ $risk->risk_obDiaAve ?? '' }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="label">
                                                    <p>1st</p>
                                                    <p>2nd</p>
                                                    <p>Average</p>
                                                </div>
                                                <div class="context">
                                                    <p>Always get the average of two readings Obtained at least 2 minutes apart.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="third-sec2">
                                    <div class="smoke">
                                        <label for="smoke"><b>Smoking (Tobacco/Cigarette)</b></label>
                                        <div class="smoking">
                                            <div class="classes">
                                                <div>
                                                <input type="checkbox" name="smoke" id="never" value="Never Smoke" {{ in_array('Never Smoke', $checkboxSmoker ?? []) ? 'checked' : '' }} disabled> Never Smoke
                                                </div>
                                                <div>
                                                <input type="checkbox" name="smoke" id="current" value="Current Smoke" {{ in_array('currentSmoker', $checkboxSmoker ?? []) ? 'checked' : '' }} disabled> Current Smoke
                                                </div>
                                                <div>
                                                <input type="checkbox" name="smoke" id="passive" value="Passive Smoke" {{ in_array('Passive Smoker', $checkboxSmoker ?? []) ? 'checked' : '' }} disabled> Passive Smoke
                                                </div>
                                            </div>
                                            <div class="classes">
                                                <div>
                                                <input type="checkbox" name="smoke" id="greater" value="Stopped > a year" {{ in_array('Stopped > A Year', $checkboxSmoker ?? []) ? 'checked' : '' }} disabled> Stopped > a year
                                                </div>
                                                <div>
                                                <input type="checkbox" name="smoke" id="less" value="Stopped < a year" {{ in_array('Stopped < A Year', $checkboxSmoker ?? []) ? 'checked' : '' }} disabled> Stopped < a year
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alcoholic">
                                        <label for="alcohol"><b>Alcohol Intake</b></label>
                                        <div class="drink">
                                            <div>
                                                <input type="radio" name="alcohol" id="nevercon" value="Never consumed" {{ $risk->risk_alIntake == 'Never Consumed' ? 'checked' : '' }} disabled> Never consumed
                                            </div>
                                            <div>
                                                <input type="radio" name="alcohol" id="Yescon" value="Yes" {{ $risk->risk_alIntake == 'Yes' ? 'checked' : '' }} disabled> Yes
                                            </div>
                                        </div>
                                        <div class="excess">
                                            <label for="excess"><b>Excessive Alcohol Intake</b></label>
                                            <p>In the past month, had 5 drinks in a row for male <br>or 4 drinks in a row for female in one occasion</p>
                                            <div class="excessing">
                                                <div>
                                                <input type="radio" name="excess" id="excessYes" value="Yes" {{ $risk->risk_alExcessive == 'Yes' ? 'checked' : '' }} disabled> Yes
                                                </div>
                                                <div>
                                                <input type="radio" name="excess" id="excessNo" value="No" {{ $risk->risk_alExcessive == 'No' ? 'checked' : '' }} disabled> No
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fats">
                                        <label for="highfat"><b>High Fat/High Salt Food Intake</b></label>
                                        <div class="fatty">
                                            <div class="desc">
                                            <p>Eats processed/fast foods (e.g. Instant <br>noodles, hamburgers, fries, fried chicken <br>skin, etc) and Ihaw-Ihaw (e.g. isaw, adidas, <br>etc.) weekly</p>
                                            </div>
                                            <div class="opts">
                                                <div>
                                                    <input type="radio" name="highfat" id="highfatYes" value="Yes" {{ $risk->risk_highFat == 'Yes' ? 'checked' : '' }} disabled> Yes
                                                </div>
                                                <div>
                                                    <input type="radio" name="highfat" id="highfatNo" value="No" {{ $risk->risk_highFat == 'No' ? 'checked' : '' }} disabled> No
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fruity">
                                        <label for="fiberss"><b>Dietary Fiber Intake:</b></label>
                                        <div class="vege">
                                            <label for="vege">3 servings of vegetables daily</label>
                                            <div class="prot1">
                                                <div>
                                                    <input type="radio" name="vege" id="vegeYes" value="Yes" {{ $risk->risk_dfVege == 'Yes' ? 'checked' : '' }} disabled> Yes
                                                </div>
                                                <div>
                                                    <input type="radio" name="vege" id="vegeNo" value="No" {{ $risk->risk_dfVege == 'No' ? 'checked' : '' }} disabled> No
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vege">
                                            <label for="fruits">2-3 servings of fruits daily</label>
                                            <div class="prot2">
                                                <div>
                                                    <input type="radio" name="fruits" id="fruitsYes" value="Yes" {{ $risk->risk_dfFruit == 'Yes' ? 'checked' : '' }} disabled> Yes
                                                </div>
                                                <div>
                                                    <input type="radio" name="fruits" id="fruitsNo" value="No" {{ $risk->risk_dfFruit == 'No' ? 'checked' : '' }} disabled> No
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="physical">
                                        <label for="physical"><b>Physical Activity</b></label>
                                        <div class="physic">
                                            <p>Does at least 75 mins/week of vigorous-intensity <br>physical activity of 2 1/2 hrs/week of moderate-<br>intensity physical activity?</p>
                                            <div class="phy">
                                                <div>
                                                    <input type="radio" name="physical" id="physicalYes" value="Yes" {{ $risk->risk_Pa == 'Yes' ? 'checked' : '' }} disabled> Yes
                                                </div>
                                                <div>
                                                    <input type="radio" name="physical" id="physicalNo" value="No" {{ $risk->risk_Pa == 'No' ? 'checked' : '' }} disabled> No
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="assess">
                                        <span class="assesss">Assessed by:</span>
                                        <div class="assessing">
                                            <img src="{{ asset(($risk->risk_signatureFirst ?? '')) }}" alt="Signature" class="signature sig1">
                                            <span>Name and Signature</span>
                                        </div>
                                        <div class="assessing">
                                            <img src="{{ asset(($risk->risk_signatureSecond ?? '')) }}" alt="Signature" srcset="" class="signature sig2">
                                            <span>Name and Signature</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="sections2">
                        <div class="questions">
                            <div class="descrip">
                                <p><b>Questionnaire to Determine Probable Angina, Heart Attack, Stroke or Transient Ischemic Attack</b></p>
                            </div>
                            <div class="questionaire0">
                                <div class="secondCon">
                                    <label for="ques"><b>Angina or Heart Attack</b></label>
                                    <div class="second">
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques" id="quesYes" value="Yes" {{ $risk->risk_qResult == 'Yes' ? 'checked' : '' }} disabled> Yes/Oo
                                        </div>
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques" id="quesNo" value="No" {{ $risk->risk_qResult == 'No' ? 'checked' : '' }} disabled> No/Hindi
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="questionaire0">
                                <div class="secondCon">
                                    <label for="ques1">1. Have you had any pain or discomfort or any pressure or heaviness in your chest? <br> <i>Nakakaramdan ka ba ng pananakit o kabigatan sa iyong dibdib?</i></label>
                                    <div class="second">
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques1" id="ques1Yes" value="Yes" {{ $risk->risk_q1 == 'Yes' ? 'checked' : '' }} disabled> Yes/Oo
                                        </div>
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques1" id="ques1No" value="No" {{ $risk->risk_q1 == 'No' ? 'checked' : '' }} disabled> No/Hindi
                                        </div>
                                    </div>
                                </div>
                                <div class="skip">
                                    <p>if NO, go to Question 8.</p>
                                </div>
                            </div>

                            <div class="questionaire0">
                                <div class="secondCon">
                                    <label for="ques2">2. Do you get the pain in the center of the chest or left chest or left arm? <i>Ang sakit ba ay nasa gitna ng dibdib, <br>sa kaliwang bahagi ng dibdib o kaliwang braso?</i></label>
                                    <div class="third">
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques2" id="ques2Yes" value="Yes" {{ $risk->risk_q2 == 'Yes' ? 'checked' : '' }} disabled> Yes/Oo
                                        </div>
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques2" id="ques2No" value="No" {{ $risk->risk_q2 == 'No' ? 'checked' : '' }} disabled> No/Hindi
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="questionaire0">
                                <div class="secondCon">
                                    <label for="ques3">3. Do you get it when you walk uphill or hurry? <i>Nararamdaman mo ba ito kung ikaw ay nagmamadali o naglalakad <br>nang mabilis o paakyat?</i></label>
                                    <div class="second">
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques3" id="ques3Yes" value="Yes" {{ $risk->risk_q3 == 'Yes' ? 'checked' : '' }} disabled> Yes/Oo
                                        </div>
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques3" id="ques3No" value="No" {{ $risk->risk_q3 == 'No' ? 'checked' : '' }} disabled> No/Hindi
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="questionaire0">
                                <div class="secondCon">
                                    <label for="ques4">4. Do you slowdown if you get the pain while walking? <i>Tumitigil ka ba sa paglalakad kapag sumasakit ang iyong <br>dibdib?</i></label>
                                    <div class="second">
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques4" id="ques4Yes" value="Yes" {{ $risk->risk_q4 == 'Yes' ? 'checked' : '' }} disabled> Yes/Oo
                                        </div>
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques4" id="ques4No" value="No"{{ $risk->risk_q4 == 'No' ? 'checked' : '' }} disabled> No/Hindi
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="questionaire0">
                                <div class="secondCon">
                                    <label for="ques5">5. Does the pain go away if you stand still or if you have take a tablet under the tongue? <i>Nawawala ba ang sakit <br>kapag ikaw ay di kumilos o kapag naglagay ka ng gamot sa ilalim ng iyong dila?</i></label>
                                    <div class="second">
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques5" id="ques5Yes" value="Yes" {{ $risk->risk_q5 == 'Yes' ? 'checked' : '' }} disabled> Yes/Oo
                                        </div>
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques5" id="ques5No" value="No" {{ $risk->risk_q5 == 'No' ? 'checked' : '' }} disabled> No/Hindi
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="questionaire0">
                                <div class="secondCon">
                                    <label for="ques6">6. Does the pain go away in less than 10 minutes? <i>Nawawala ba ang sakit sa loob ng 10 minuto?</i></label>
                                    <div class="second">
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques6" id="ques6Yes" value="Yes" {{ $risk->risk_q6 == 'Yes' ? 'checked' : '' }} disabled> Yes/Oo
                                        </div>
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques6" id="ques6No" value="No" {{ $risk->risk_q6 == 'No' ? 'checked' : '' }} disabled> No/Hindi
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="questionaire0">
                                <div class="secondCon">
                                    <label for="ques7">7. Have you ever had a severe chest pain across the front of your chest lasting for half an hour or more? <i>Nakaramdam <br>ka na ba ng pananakit ng dibdib na tumatagal ng kalahating oras o higit pa?</i></label>
                                    <div class="second">
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques7" id="ques7Yes" value="Yes" {{ $risk->risk_q7 == 'Yes' ? 'checked' : '' }} disabled> Yes/Oo
                                        </div>
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques7" id="ques7No" value="No" {{ $risk->risk_q7 == 'No' ? 'checked' : '' }} disabled> No/Hindi
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="answered">
                                <p>IF the answer to Questions 3 or 4 or 5 or 6 or 7 is YES, patient may have angina or heart attack and needs to see the doctor.</p>
                            </div>

                            <div class="questionaire0">
                                <div class="secondCon">
                                    <label for="stroke"><b>Stroke and TIA</b></label>
                                    <div class="second">
                                        <div class="arrangeRadio">
                                            <input type="radio" name="stroke" id="strokeYes" value="Yes" {{ $risk->risk_qStrokeResult == 'Yes' ? 'checked' : '' }} disabled> Yes/Oo
                                        </div>
                                        <div class="arrangeRadio">
                                            <input type="radio" name="stroke" id="strokeNo" value="No" {{ $risk->risk_qStrokeResult == 'No' ? 'checked' : '' }} disabled> No/Hindi
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="questionaire0">
                                <div class="secondCon">
                                    <label for="ques8">8. Have you ever had any of the following: difficulty in talking, weakness of arm and/or leg on one side of the body <br>of numbness on one side of the body? Nakaramdam ka na ba ng mga sumusunod: hirap sa pagsasalita, <br>paghihina ng braso at/o ng binti o pamamanhid sa kalahating bahagi ng katawan?</b></label>
                                    <div class="second">
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques8" id="ques8Yes" value="Yes" {{ $risk->risk_q8Stroke == 'Yes' ? 'checked' : '' }} disabled> Yes/Oo
                                        </div>
                                        <div class="arrangeRadio">
                                            <input type="radio" name="ques8" id="quest8No" value="No" {{ $risk->risk_q8Stroke == 'No' ? 'checked' : '' }} disabled> No/Hindi
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="foot">
                                <p>IF the answer to Question 8 is YES, the patient may have had a TIA or stroke and needs to see the doctor.</p>
                            </div>
                        </div>
                        <div class="presence">
                            <div class="pres">
                                <div class="prese1">
                                    <div class="tops">
                                        <p><b>Presence or absence of Diabetes</b></p>
                                    </div>
                                    <div class="ques9">
                                        <label for="ques9">1. Was the patient diagnosed as having diabetes?</label>
                                    </div>
                                    <div class="eleventh">
                                        <div>
                                            <input type="checkbox" name="ques9" id="ques9Yes" value="Yes" {{ in_array('Yes', $checkboxDiabetes ?? []) ? 'checked' : '' }} disabled> Yes
                                        </div>
                                        <div>
                                            <input type="checkbox" name="ques9" id="ques9No" value="No" {{ in_array('No', $checkboxDiabetes ?? []) ? 'checked' : '' }} disabled> No
                                        </div>
                                        <div>
                                            <input type="checkbox" name="ques9" id="questDoNot" value="Do not know" {{ in_array('Do not know', $checkboxDiabetes ?? []) ? 'checked' : '' }} disabled> Do not know
                                        </div>
                                    </div>
                                    <div class="without">
                                        <div><span><input type="radio" {{ $risk->risk_diaMed == 'With Medication' ? 'checked' : '' }} disabled> with medications</span></div>
                                        
                                        <div><span><input type="radio" {{ $risk->risk_diaMed == 'Without Medication' ? 'checked' : '' }} disabled> w/o medications</span></div>
                                    </div>
                                    <div class="otherop">
                                    <p>and perform Urine for Ketones.</p>
                                    <p>If No or Do not know, proceed to question 2</p>
                                    </div>
                                    <div class="question10">
                                        <div class="quest">
                                            <label for="ques10">2. Does patient have the following symptoms?</label>
                                        </div>
                                        <div class="polyy">
                                            <label for="polypha">Polyphagia</label>
                                            <div class="twelveth">
                                                <div>
                                                    <input type="radio" name="polypha" id="polyphaYes" value="Yes" {{ $risk->risk_diaSymp1 == 'Yes' ? 'checked' : '' }} disabled> Yes
                                                </div>
                                                <div>
                                                    <input type="radio" name="polypha" id="polyphaNo" value="No" {{ $risk->risk_diaSymp1 == 'No' ? 'checked' : '' }} disabled> No
                                                </div>
                                            </div>
                                        </div>
                                        <div class="polyy">
                                            <label for="polydip">Polydipsia</label>
                                            <div class="thirteenth">
                                                <div>
                                                    <input type="radio" name="polydip" id="polydipYes" value="Yes" {{ $risk->risk_diaSymp2 == 'Yes' ? 'checked' : '' }} disabled> Yes
                                                </div>
                                                <div>
                                                    <input type="radio" name="polydip" id="polydipNo" value="No" {{ $risk->risk_diaSymp2 == 'No' ? 'checked' : '' }} disabled> No
                                                </div>
                                            </div>
                                        </div>
                                        <div class="polyy">
                                            <label for="polyu">Polyuria</label>
                                            <div class="fourteenth">
                                                <div>
                                                    <input type="radio" name="polyu" id="polyuYes" value="Yes" {{ $risk->risk_diaSymp3 == 'Yes' ? 'checked' : '' }} disabled> Yes
                                                </div>
                                                <div>
                                                    <input type="radio" name="polyu" id="polyuNo" value="No" {{ $risk->risk_diaSymp3 == 'No' ? 'checked' : '' }} disabled> No
                                                </div>
                                            </div>
                                        </div>
                                        <p>If two or more of the above symptoms are present, <br>perform a blood glucose test.</p>
                                    </div>
                                </div>
                                <div class="prese2">
                                    <div class="glucose">
                                        <div class="glucose1"> 
                                            <label for="raisebg"><b>Raised Blood Glucose</b></label>
                                            <div class="gluc">
                                                <div>
                                                    <input type="radio" name="raisebg" id="raisebgYes" value="Yes" {{ $risk->risk_glocuse == 'Yes' ? 'checked' : '' }} disabled> Yes
                                                </div>
                                                <div>
                                                    <input type="radio" name="raisebg" id="raisebgNo" value="No" {{ $risk->risk_glocuse == 'No' ? 'checked' : '' }} disabled> No
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inputs">
                                            <div class="input3">
                                                <input type="text" name="fbs" id="fbs" value="{{ $risk->risk_gloFbs ?? '' }}" readonly> 
                                                <label for="fbs">FBS/RBS</label>
                                            </div>
                                            <div class="input2">
                                                <label for="datefbs">Date taken</label>
                                                <input type="date" name="datefbs" id="datefbs" value="{{ $risk->risk_gloDate ?? '' }}" readonly>
                                            </div>
                                        </div>
                                        <div class="ifYes">
                                            <p>if YES, perform Urine Test for Ketones</p>
                                        </div>
                                        <div class="lipids">
                                            <label for="raisebl"><b>Raised Blood Lipids</b></label>
                                            <div class="lipid">
                                                <div>
                                                    <input type="radio" name="raisebl" id="raiseblYes" value="Yes" {{ $risk->risk_lipids == 'Yes' ? 'checked' : '' }} disabled> Yes
                                                </div>
                                                <div>
                                                    <input type="radio" name="raisebl" id="raiseblNo" value="No" {{ $risk->risk_lipids == 'No' ? 'checked' : '' }} disabled> No
                                                </div>
                                            </div>
                                            <div class="inputs">
                                                <div class="input3">
                                                    <input type="text" name="choles" id="choles" value="{{ $risk->risk_lipChol ?? '' }}" readonly>
                                                    <label for="choles">Total Cholesterol</label>
                                                </div>
                                                <div class="input4">
                                                    <label for="datecholes">Date taken</label>
                                                    <input type="date" name="datecholes" id="datecholes" value="{{ $risk->risk_lipDate ?? '' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ketone">
                                        <div class="ketones">
                                            <label for="urine"><b>Presence of Urine Ketones</b></label>
                                            <div class="urine">
                                                <div>
                                                    <input type="radio" name="urine" id="urineYes" value="Yes" {{ $risk->risk_urKetones == 'Yes' ? 'checked' : '' }} disabled> Yes
                                                </div>
                                                <div>
                                                    <input type="radio" name="urine" id="urineNo" value="No" {{ $risk->risk_urKetones == 'No' ? 'checked' : '' }} disabled> No
                                                </div>
                                            </div>
                                            <div class="keton">
                                                <div class="input3">
                                                    <input type="text" name="ketone" id="ketone" value="{{ $risk->risk_ketone ?? '' }}" readonly>
                                                    <label for="ketone">Urine Ketone</label>
                                                </div>
                                                <div class="keton2">
                                                    <label for="dateketone">Date taken</label>
                                                    <input type="date" name="dateketone" id="dateketone" value="{{ $risk->risk_urDate ?? '' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="proteins">
                                            <label for="urineprot"><b>Presence of Urine Protein</b></label>
                                            <div class="prote">
                                                <div>
                                                    <input type="radio" name="urineprot" id="urineprotYes" value="Yes" {{ $risk->risk_urProtein == 'Yes' ? 'checked' : '' }} disabled> Yes
                                                </div>
                                                <div>
                                                    <input type="radio" name="urineprot" id="urineprotNo" value="No" {{ $risk->risk_urProtein == 'No' ? 'checked' : '' }} disabled> No
                                                </div>
                                            </div>
                                            <div class="ketons">
                                                <div class="input3">
                                                    <input type="text" name="protein" id="protein"  value="{{ $risk->risk_protein ?? '' }}" readonly>
                                                    <label for="protein">Urine Protein</label>
                                                </div>
                                                <div class="ketone4">
                                                    <label for="dateprot">Date taken</label>
                                                    <input type="date" name="dateprot" id="dateprot" value="{{ $risk->risk_proDate ?? '' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="manage">
                                <div class="management">
                                    <label for="manage"><b>Management:</b></label>
                                    <div>
                                        <input type="radio" name="lifestyle" id="lifestyle" {{ $risk->risk_management == 'Lifestyle Modification' ? 'checked' : '' }} disabled>
                                        <label for="lifestyle">Lifestyle Modification</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="medi" id="medi" {{ $risk->risk_management == 'Medication' ? 'checked' : '' }} disabled>
                                        <label for="medi">Lifestyle Modification</label>
                                    </div>
                                </div>
                                <br>
                                <label for="followup">Follow-up:</label>
                                <textarea name="followup" id="followup" style="width: 100%!important; border:none; outline:none; resize:none;" readonly>{{ $risk->risk_followUp ?? '' }}</textarea>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="section2">
                    <label for="level"><b>Risk Level:</b></label>
                    <div>
                        <input type="radio" name="level" id="lvl1" value="<10%" {{ $risk->risk_level == '<10' ? 'checked' : '' }} disabled> &lt;10%
                    </div>
                    <div>
                        <input type="radio" name="level" id="lvl2" value="10% to <20%" {{ $risk->risk_level == '10% To < 20%' ? 'checked' : '' }} disabled> 10% to &lt;20%
                    </div>
                    <div>
                        <input type="radio" name="level" id="lvl3" value="20% to <30%" {{ $risk->risk_level == '20% To < 30%' ? 'checked' : '' }} disabled> 20% to &lt;30%
                    </div>
                    <div>
                        <input type="radio" name="level" id="lvl4" value="≥30%" {{ $risk->risk_level == '≤ 30%' ? 'checked' : '' }} disabled> ≥30%
                    </div>
                    <div class="findings">
                        <label for="findings">Findings:</label>
                        <input type="text" name="findings" id="findings" style="text-align: left;" value="{{ $risk->risk_findings ?? '' }}" readonly>
                    </div>
                </div>
            </div>
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
        const dobInput = document.getElementById('bdate');
        const ageInput = document.getElementById('age');

        // Calculate and set age initially
        const dobValue = dobInput.value;
        if (dobValue) {
            ageInput.value = calculateAge(dobValue);
        }
    });
  </script>
  
</body>

</html>