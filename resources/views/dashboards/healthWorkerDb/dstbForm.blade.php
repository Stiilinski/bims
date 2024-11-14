@include('layouts.headHealthWorkers')
<style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap");
    * {
        font-family: Inter;
    }

    .header {
        font-size: 14px!important;
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
        width: 100%;
        padding: 10px
    }

    .card *{
        font-size: 10px!important;
    }

    .headerForm h3 {
        text-align: center;
        font-size: 1.5rem;
    }

    .headerForm span {
        text-align: justify;
        font-size: 14px;
    }

    .headerForm {
        height: 150px;
    }

    .patient-signature {
        float: right;
        border-top: 2px solid black;
        padding: 0px 20px 0px 20px;
        margin-right: 10px;
        margin-top: 20px
    }

    .content {
        width: 100%;
        display: flex;
        flex-direction: column;
        margin-top: -30px;
    }

    .firstContent {
        display: flex;
        flex-direction: column;
    }

    .noti {
        font-weight: bold;
        color: rgb(244, 255, 255);
        background-color: rgb(50, 50, 50);
        width: 100%;
    }

    .noti span {
        padding: 5px;
    }

    .patient-info {
        width: 100%;
        display: flex;
        flex-direction: row;
    }

    .data1,
    .data2,
    .data3,
    .data4 {
        width: 100%;
        border: 1px solid black;
    }

    .data1 input,
    .data2 input,
    .data3 input,
    .data4 input {
        width: 100%;
        border: none;
        outline: none;
        padding: 5px 0px;
        font-size: 16px;
        text-align: center;
    }

    .data1 span,
    .data2 span,
    .data3 span,
    .data4 span {
        display: flex;
        width: 100%;
        font-weight: bold;
        margin-top: 0;
        padding: 5px;
        background-color: rgb(188, 188, 188);
    }

    .patient-demographic {
        width: 100%;
        margin-top: -5px;
    }

    .patient1 {
        margin-top: -15px;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .fullname {
        font-weight: 300;
    }

    #referredtoTxt {
        font-weight: 300;
        font-size: 12px;
        height: 76.5%;
        overflow: hidden;
        margin-left: 0px;
        width: 100%;
        resize: none;
    }
    .dob {
        font-weight: 300;
        font-size: 13px;
    }
    .sex {
        font-weight: 300;
        font-size: 13px;
    }

    .patient-demographic span {
        font-weight: bold;
    }

    .demo1 {
        width: 99.8%;
        border: 1px solid black;
    }

    .demo1 span {
        margin-top: 0;
        padding: 5px;
        background-color: rgb(188, 188, 188);
    }

    .demo1 input {
        margin-top: -10px;
        width: 100%;
        border: none;
        outline: none;
        padding: 5px 0px;
        font-size: 16px;
        text-align: center;
    }

    .demo2 {
        width: 100%;
        display: flex;
        flex-direction: row;
    }

    .info1 {
        width: 40%;
        border: 1px solid black;
    }

    .info3,
    .info4 {
        width: 20%;
        border: 1px solid black;
    }

    .info2 {
        width: 30%;
        border: 1px solid black;
    }

    .info1 p,
    .info2 p,
    .info3 p,
    .info4 span {
        margin-top: 0;
        padding: 5px;
        background-color: rgb(188, 188, 188);
    }

    .info1 input,
    .info2 input,
    .info3 input,
    .info4 input {
        margin-top: -10px;
        width: 100%;
        border: none;
        outline: none;
        padding: 5px 0px;
        font-size: 16px;
        text-align: center;
    }

    .patient2 {
        margin-top: -10px;
        width: 100%;
        display: flex;
        flex-direction: row;
    }

    .address {
        font-weight: 300;
        font-size: 14px;
    }
    .current-address {
        font-weight: 300;
        font-size: 14px;
    }

    .demo3,
    .demo4 {
        margin-top: 10px;
        width: 100%;
        border: 1px solid black;
    }

    .demo3 p,
    .demo4 span {
        margin-top: 0;
        padding: 5px;
        background-color: rgb(188, 188, 188);
    }

    .demo3 input,
    .demo4 input {
        margin-top: -10px;
        width: 100%;
        border: none;
        outline: none;
        padding: 5px 0px;
        font-size: 16px;
        text-align: center;
    }

    .patient3 {
        margin-top: -10px;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .contact {
        font-weight: 300;
        font-size: 14px;
    }

    .demo-1,
    .demo-2,
    .demo-3,
    .demo-4 {
        margin-top: 10px;
        width: 100%;
        border: 1px solid black;
    }

    .demo-1 p,
    .demo-2 p,
    .demo-3 p,
    .demo-4 span {
        margin-top: 0;
        padding: 5px;
        background-color: rgb(188, 188, 188);
    }

    .demo-1 input,
    .demo-2 input,
    .demo-3 input,
    .demo-4 input {
        margin-top: -10px;
        width: 100%;
        border: none;
        outline: none;
        padding: 5px 0px;
        font-size: 16px;
        text-align: center;
    }

    .Screening {
        width: 100%;
        margin-top: -5px;
    }

    .Screening span {
        font-weight: bold;
    }

    .ScreeningInformation {
        width: 100%;
        margin-top: -25px;
        display: flex;
        flex-direction: row;
    }

    .screen1 {
        width: 42%;
        display: flex;
        flex-direction: column;
    }
    .screen2 {
        width: 29%;
    }
    .mode {
        display: flex;
        flex-direction: row;
        justify-content: center;
        margin-top: -10px;
    }
    .screen3 {
        width: 29%;
    }
    .screen3 input {
        margin-top: -10px;
        width: 100%;
        border: none;
        outline: none;
        padding: 5px 0px;
        font-size: 16px;
        text-align: center;
    }



    .screen-2 {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 0px;
        padding: 5px;
    }

    .screen-2 input {
        width: 20px;
    }

    .screen1,
    .screen2,
    .screen3 {
        margin-top: 10px;
        border: 1px solid black;
    }
    .screen1 p,
    .screen2 p,
    .screen3 span {
        margin-top: 0;
        padding: 5px;
        background-color: rgb(188, 188, 188);
    }
    .address1 {
        margin-top: 8px;
    }
    .address1 label {
        margin-left: -5px;
        margin-right: 5px;
    }

    .Laboratory {
        width: 100%;
        margin-top: -5px;
    }

    .LaboratoryTest {
        width: 100%;
        display: flex;
        flex-direction: row;
    }

    .test {
        align-items: center;
        width: 100%;
        display: flex;
        flex-direction: row;
        border: 1px solid black;
        font-size: 12px;
    }
    .test input {
        outline: none;
        border: none;
    }
    .test span {
        text-align: center;
        width: 100%;
        margin-top: 2px;
        margin-bottom: 2px;
    }

    .name-test {
        align-items: center;
        width: 100%;
        display: flex;
        flex-direction: row;
        border: 1px solid black;
        background-color: rgb(188, 188, 188);
    }

    .name-test span {
        margin-top: 2px;
        margin-bottom: 2px;
        padding-left: 8px;
        font-weight: bold;
    }

    .Date {
        width: 100%;
        display: flex;
        flex-direction: row;
    }

    .date1 {
        align-items: center;
        width: 100%;
        display: flex;
        flex-direction: row;
        border: 1px solid black;
        padding-left: 8px;
    }

    .date1 input {
        width: 100%;
        outline: none;
        border: none;
        text-align: center;
    }
    .date-test {
        width: 100%;
        background-color: rgb(188, 188, 188);
        font-weight: bold;
    }
    .date1 span {
        width: 100%;
        margin-bottom: 2px;
        margin-top: 2px;
    }

    .Result {
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .result1 {
        align-items: center;
        width: 100%;
        display: flex;
        flex-direction: row;
        border: 1px solid black;
        padding-left: 8px;
    }
    .result1 input {
        width: 100%;
        outline: none;
        border: none;
        text-align: center;
    }
    .result1 span {
        width: 100%;
        margin-bottom: 2px;
        margin-top: 2px;
    }
    .result-test {
        width: 100%;
        background-color: rgb(188, 188, 188);
        font-weight: bold;
    }
    .lab span {
        font-weight: bold;
    }

    .Diagnosis {
        width: 100%;
        margin-top: -5px;
    }
    .Diagnosis span {
        font-weight: bold;
    }

    .diagnos {
        width: 100%;
        margin-top: -15px;
        display: flex;
        flex-direction: row;
    }

    .diagnos1 {
        display: flex;
        flex-direction: column;
        width: 20%;
        border: 1px solid black;
    }
    .diagnos-name span {
        margin-top: 2px;
        margin-bottom: 2px;
        padding-left: 8px;
    }
    .diagnos-name {
        background-color: rgb(188, 188, 188);
    }
    .diagnosis {
        margin-top: 15px;
        width: 100%;
        display: flex;
        flex-direction: column;
        margin-left: 85px;
    }
    .diagnos2 {
        width: 20%;
        border: 1px solid black;
        display: flex;
        flex-direction: column;
    }
    .diagnos3 {
        width: 20%;
        border: 1px solid black;
    }
    .diagnos4 {
        width: 40%;
        border: 1px solid black;
    }
    .diagnos4 span {
        margin-top: 0px;
        padding: 2px 0px 2px 8px;
        background-color: rgb(188, 188, 188);
    }
    .diagnos4 textarea {
        margin-top: 2px;
        margin-bottom: 3px;
        width: 98%;
        padding-left: 5px;
        margin-left: 2.5px;
        outline: none;
        border: none;
    }

    .date-diagnos {
        width: 100%;
        border-bottom: 1px solid black;
    }
    .case-number {
        width: 100%;
        border-top: 1px solid black;
    }

    .date-diagnos p,
    .case-number span {
        margin-top: 0px;
        padding-top: 2px;
        padding-bottom: 2px;
        padding-left: 8px;
        margin-bottom: 2px;
        background-color: rgb(188, 188, 188);
    }

    .date-diagnos input,
    .case-number input {
        margin-top: 2px;
        margin-bottom: 3px;
        width: 95%;
        text-align: center;
        outline: none;
        border: none;
    }
    .date-noti {
        border-bottom: 1px solid black;
        width: 100%;
    }
    .att-physician {
        width: 100%;
        border-top: 1px solid black;
    }

    .date-noti p,
    .att-physician span {
        margin-top: 0;
        padding-top: 2px;
        padding-bottom: 2px;
        padding-left: 8px;
        margin-bottom: 2px;
        background-color: rgb(188, 188, 188);
    }

    .date-noti input,
    .att-physician input {
        margin-top: 2px;
        margin-bottom: 3px;
        width: 95%;
        text-align: center;
        outline: none;
        border: none;
    }

    .TBClass {
        width: 100%;
        margin-top: -5px;
    }

    .TBClassification {
        width: 100%;
        display: flex;
        flex-direction: row;
        margin-top: -15px;
    }
    .TBClass span {
        font-weight: bold;
    }

    .TBClass1,
    .TBClass2,
    .TBClass3 {
        border: 1px solid black;
    }

    .TBClass1 {
        width: 37%;
    }
    .TBClass2 {
        width: 45%;
    }
    .TBClass3 {
        width: 18%;
    }

    .Bacterio-Stat {
        width: 100%;
        border-bottom: 1px solid black;
        display: flex;
        flex-direction: column;
    }

    .BacterioStatus {
        gap: 40px;
        margin-left: 15px;
        display: flex;
        flex-direction: row;
        margin-bottom: 5px;
    }
    .name-site span {
        padding-left: 8px;
        background-color: rgb(188, 188, 188);
        margin-top: 0;
        padding-top: 2px;
        padding-bottom: 2px;
    }
    .bacterio-name span {
        padding-left: 8px;
        background-color: rgb(188, 188, 188);
        margin-top: 0;
        padding-top: 2px;
        padding-bottom: 2px;
    }
    .AnatoSite {
        width: 100%;
        border-top: 1px solid black;
        display: flex;
        flex-direction: column;
        padding-bottom: 2px;
    }

    .specificSite {
        width: 46%;
        border-bottom: 1px solid black;
        border-top: none;
        border-left: none;
        border-right: none;
    }
    .sites {
        display: flex;
        flex-direction: row;
        gap: 35px;
        margin-left: 15px;
    }

    .TBClass2 {
        display: flex;
        flex-direction: column;
    }
    .DRStatus {
        display: flex;
        flex-direction: row;
        gap: 15px;
        padding-left: 20px;
    }
    .statusType {
        width: 110px;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: 1px solid black;
    }
    .DRType {
        display: flex;
        margin-top: 5px;
        flex-direction: row;
        gap: 2px;
    }
    .name-label span {
        padding-left: 8px;
        background-color: rgb(188, 188, 188);
        margin-top: 0;
        padding-top: 2px;
        padding-bottom: 2px;
    }
    .name-group span {
        padding-left: 8px;
        background-color: rgb(188, 188, 188);
        margin-top: 0;
        padding-top: 2px;
        padding-bottom: 2px;
    }
    .TBClass3 {
        display: flex;
        flex-direction: column;
    }
    .RegGrouspan {
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .Grouspan {
        display: flex;
        flex-direction: row;
    }
    .Groups {
        padding-left: 10px;
    }
    .Group1,
    .Group2 {
        display: flex;
        margin-top: 5px;
        flex-direction: row;
        gap: 2px;
    }

    .footer {
        margin-top: -4px;
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: flex-end;

    }
    .footer span {
        width: 100%;
    }

    .page {
        text-align: center;
        font-size: 13px;
        font-weight: bold;
    }
    .form {
        font-size: 12px;
    }
    .ver {
        font-size: 12px;
        text-align: right;
    }

    .testName {
        display: flex;
        justify-content: center;
    }
    .anato-type {
        font-size: 15px;
    }

/* PRINT PART */

@media print {
    /* Set page orientation to landscape */
    @page {
        size: landscape;
        margin: 1mm; /* Set margins */
    }

    .content {
        margin-top: -90px;
    }

    .patient-signature {
        margin-top: 0px!important;
    }

    .footer {
        position: absolute;
        bottom: -35px;
        left: 0;
        border-top: none;
        padding: 10mm;
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

    /* Ensure main content is visible during print */
    .main {
        visibility: visible !important;
        display: block !important;
        margin: 0;
        padding: 0;
    }

    /* Hide unnecessary elements like page title, buttons, and other non-printable content */
    .header, .pagetitle, .btnArea, .sidebar {
        display: none !important; /* Hide page title and button area */
    }

    /* Make sure the card is visible and takes up the full page */
    .card {
        width: 100%; /* Ensure the card takes full width of the page */
        position: absolute;
        top: 0;
        left: 0;
        visibility: visible !important;
        background-color: #fff;
        box-shadow: none;
        display: block;
        padding: 10mm; /* Adjust padding to prevent clipping */
        box-sizing: border-box;
    }

    .card-body * {
        width: 100%;
        padding: 0;
        background-color: #fff;
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
            <h1>DSTB</h1>
            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ action('App\Http\Controllers\regValidation@dstb') }}">DSTB</a></li>
                  <li class="breadcrumb-item active">DSTB Form</li>
                </ol>
              </nav>
        </div>
        <div class="btnArea">
            <button type="button" class="btn btn-primary" id="print"><i class="bi bi-printer-fill"></i> Print</button>
        </div>
    </div><!-- End Page Title -->
  
    <div class="card">
        <div class="headerForm">
            <h3 style="font-size: 14px!important;">FORM 4B. DS-TB TREATMENT FORM</h3>
            <p>Privacy Notice: It has been explained to me that all information in this form shall only be used for the purposes of clinical management, program management, and/or provision of psychosocial and financial support. If I have any query on or wish to revoke this authorization, I shall notify the facility head or contact ntp.helpdesk@doh.gov.ph or (02)8230 - 9626. All information collected shall remain secured and confidential and only authorized personnel
                shall have access to them.
            </p>
            <div class="patient-signature">
                <span>Patient's Signature over Printed Full Name</span>
            </div>
       </div>
       <div class="content">
            {{-- I. Case Finding/ Notification --}}
            <div class="firstContent">
                <div class="noti">
                    <span>I. Case Finding/ Notification</span>
                </div>

                <div class="patient-info">
                    <div class="data1">
                        <span>Name of Diagnosing Facility:</span>
                        <input type="text" name="facility" id="facility" value="{{ $dstb->dstb_inputDiagnosingFac ?? '' }}" readonly>
                    </div>
                    <div class="data2">
                        <span>NTP Facility Code:</span>
                        <input type="text" name="code" id="code" value="{{ $dstb->dstb_inputNtpCode ?? '' }}" readonly>
                    </div>
                    <div class="data3">
                        <span>Province/ HUC:</span>
                        <input type="text" name="province" id="province" value="{{ $dstb->dstb_inputProvinceHuc ?? '' }}" readonly>
                    </div>
                    <div class="data4">
                        <span>Region:</span>
                        <input type="text" name="region" id="region" value="{{ $dstb->dstb_inputRegion ?? '' }}" readonly>
                    </div>
                </div>
            </div>

            {{-- A. Patient Demographic --}}
            <div class="firstContent">
                <div class="noti">
                    <span>A. Patient Demographic</span>
                </div>
                <div class="patient-info">
                    <div class="data1">
                        <span>Patient's Full Name</span>
                        <input type="text" name="fullname" id="fullname" value="{{ $dstb->resident->res_lname ?? '' }}, {{ $dstb->resident->res_fname ?? '' }} {{ $dstb->resident->res_mname ?? '' }} {{ $dstb->resident->res_suffix ?? '' }}" readonly>
                    </div>
                    <div class="data2">
                        <span>Date of Birth (MM/DD/YYYY)</span>
                        <input type="text" name="dob" id="dob"  value="{{ $dstb->resident->res_bdate ? date('m/d/Y', strtotime($dstb->resident->res_bdate)) : '' }}"readonly>
                    </div>
                    <div class="data3">
                        <span>Age:</span>
                        <input type="text" name="age" id="age" readonly>    
                    </div>
                    <div class="data4">
                        <span>Sex (M/F)</span>
                        <input type="text" name="sex" id="sex" value="{{ $dstb->resident->res_sex ?? '' }}" readonly>
                    </div>
                    <div class="data4">
                        <span>Civil Status:</span>
                        <input type="text" name="civilstat" id="civilstat" value="{{ $dstb->resident->res_civil?? '' }}" readonly>
                    </div>
                </div>
                <div class="patient-info">
                    <div class="data1">
                        <span>Permanent Address</span>
                        <input type="text" name="address" id="address" value="{{ $dstb->dstb_permAdd ?? '' }}" readonly>
                    </div>
                    <div class="data2">
                        <span>Current Address (House No., Street, Barangay, City, Municipality, Province, Region, & Zip Code)</span>
                        <input type="text" name="current" id="current" value="{{ $dstb->resident->res_address ?? '' }}" readonly>
                    </div>
                </div>
                <div class="patient-info">
                    <div class="data1">
                        <span>Contact Number (include area code)</span>
                        <input type="text" name="contact" id="contact" value="{{ $dstb->resident->res_contact ?? '' }}" readonly>
                    </div>
                    <div class="data2">
                        <span>Other Contact Information:</span>
                        <input type="text" name="othercontact" id="othercontact" value="{{ $dstb->dstb_inputOtherNum ?? '' }}" readonly>
                    </div>
                    <div class="data1">
                        <span>PhilHealth No.:</span>
                        <input type="text" name="philHealth" id="philHealth" value="{{ $dstb->dstb_inputPhilHealth ?? '' }}" readonly>
                    </div>
                    <div class="data2">
                        <span>Nationality:</span>
                        <input type="text" name="nationality" id="nationality" value="{{ $dstb->resident->res_citizen ?? '' }}" readonly>
                    </div>
                </div>
            </div>

            {{-- B. Screening Information --}}
            <div class="firstContent">
                <div class="noti">
                    <span>B. Screening Information</span>
                </div>

                <div class="patient-info">
                    <div class="data1">
                        <span>Referred by: (Name & Location)</span>
                        <div class="screen-2">
                            <input type="checkbox" name="public" id="public" {{ in_array('Public', $checkboxValues ?? []) ? 'checked' : '' }} disabled>
                            <label for="public">public</label>

                            <input type="checkbox" name="otherpublic" id="otherpublic" {{ in_array('Other Public', $checkboxValues ?? []) ? 'checked' : '' }} disabled>
                            <label for="otherpublic">other public</label>
                    
                            <input type="checkbox" name="private" id="private" {{ in_array('Private', $checkboxValues ?? []) ? 'checked' : '' }} disabled>
                            <label for="private">private</label>
                    
                            <input type="checkbox" name="community" id="community" {{ in_array('Community', $checkboxValues ?? []) ? 'checked' : '' }} disabled>
                            <label for="community">community</label>
                        </div>
                    </div>

                    <div class="data2">
                        <span>Mode of Screening:</span>
                        <div class="screen-2">
                            <input type="checkbox" name="pcf" id="pcf" {{ in_array('PCF', $checkboxScreen ?? []) ? 'checked' : '' }} disabled>
                            <label for="pcf">PCF</label>

                            <input type="checkbox" name="acf" id="acf" {{ in_array('ACF', $checkboxScreen ?? []) ? 'checked' : '' }} disabled>
                            <label for="acf">ACF</label>

                            <input type="checkbox" name="icf" id="icf" {{ in_array('ICF', $checkboxScreen ?? []) ? 'checked' : '' }} disabled>
                            <label for="icf">ICF</label>

                            <input type="checkbox" name="ecf" id="ecf" {{ in_array('ECF', $checkboxScreen ?? []) ? 'checked' : '' }} disabled>
                            <label for="ecf">ECF</label>
                        </div>
                    </div>

                    <div class="data3">
                        <span>Date of Screening (MM/DD/YYY)</span>
                        <input type="date" name="datescreening" id="datescreening" value="{{ $dstb->dstb_dateScreening ?? '' }}" readonly>
                    </div>
                    
                </div>
            </div>

            {{-- C. Laboratory Tests --}}
            <div class="firstContent">
                <div class="noti">
                    <span>C. Laboratory Tests</span>
                </div>

                <div class="LaboratoryTest">
                    <div class="name-test">
                        <span>Name of Test:</span>
                    </div>
                    <div class="test testName">
                         <span><input type="checkbox" name="ultra" id="ultra" {{ in_array('Xpert MTB/RIF', $checkboxTest ?? []) ? 'checked' : '' }} disabled><label for="ultra"><span>Xpert MTB/RIF</span></label></span>
                    </div>
                    <div class="test testName">
                        <span><input type="checkbox" name="ultra" id="ultra" {{ in_array('Smear Microscopy/ TB Lamp', $checkboxTest ?? []) ? 'checked' : '' }} disabled><label for="ultra"><span>Smear Microscopy/TB LAMP</span></label></span>
                    </div>
                    <div class="test testName">
                        <span><input type="checkbox" name="ultra" id="ultra" {{ in_array('Chest X-ray', $checkboxTest ?? []) ? 'checked' : '' }} disabled><label for="ultra"><span>Chest X-ray</span></label></span>
                    </div>
                    <div class="test testName">
                        <span><input type="checkbox" name="ultra" id="ultra" {{ in_array('Tuberculin Skin Test', $checkboxTest ?? []) ? 'checked' : '' }} disabled><label for="ultra"><span>Tuberculin Skin Test</span></label></span>
                    </div>
                    <div class="test">
                        <span>Other:</span>
                        <input type="text" name="specifyTest" id="specifyTest"  value="{{ $dstb->dstb_othersDetails ?? '' }}" readonly>
                    </div>
                </div>
                <div class="Date">
                    <div class="date1 date-test">
                        <span>Date <span class="dob">(MM/DD/YYYY)</span>:</span>
                    </div>
                    <div class="date1">
                        <span class="dob">Collection</span>
                        <input type="date" name="xpert" id="xpert" value="{{ $dstb->dstb_dateTestXpert ?? '' }}" readonly>
                    </div>
                    <div class="date1">
                        <span class="dob">Collection</span>
                        <input type="date" name="smear" id="smear" value="{{ $dstb->dstb_dateTestSmear ?? '' }}" readonly>
                    </div>
                    <div class="date1">
                        <span class="dob">Examination</span>
                        <input type="date" name="chest" id="chest" value="{{ $dstb->dstb_dateTestChest ?? '' }}" readonly>
                    </div>
                    <div class="date1">
                        <span class="dob">Reading</span>
                        <input type="date" name="tuberculin" id="tuberculin" value="{{ $dstb->dstb_dateTestTuborculin ?? '' }}" readonly>
                    </div>
                    <div class="date1">
                        <input type="date" name="othertest" id="othertest" value="{{ $dstb->dstb_dateTestOther ?? '' }}" readonly>
                    </div>
                </div>
                <div class="Result">
                    <div class="result1 result-test">
                        <span>Result:</span>
                    </div>
                    <div class="result1">
                        <input type="text" name="xpertResult" id="expertResult" value="{{ $dstb->dstb_resultTestXpert ?? '' }}" readonly>
                    </div>
                    <div class="result1">
                        <input type="text" name="smearResult" id="smearResult" value="{{ $dstb->dstb_resultTestSmear ?? '' }}" readonly>
                    </div>
                    <div class="result1">
                        <input type="text" name="chestResult" id="chestResult" value="{{ $dstb->dstb_resultTestChest ?? '' }}" readonly>
                    </div>
                    <div class="result1">
                        <input type="text" name="tuberResult" id="tuberResult" value="{{ $dstb->dstb_resultTestTuborculin ?? '' }}" readonly>
                    </div>
                    <div class="result1">
                        <input type="text" name="otherResult" id="otherResult" value="{{ $dstb->dstb_resultTestOther ?? '' }}" readonly>
                    </div>
                </div>
            </div>

            {{-- D. Diagnosis --}}
            <div class="firstContent">
                <div class="noti">
                    <span>Diagnosis</span>
                </div>
                <div class="patient-info">
                    <div class="data1">
                        <span>Diagnosis:</span>
                        <div class="screen-2">
                            <input type="radio" name="tbDiagnosis" id="tbdisease" {{ $dstb->dstb_tuberculosis == 'TB Disease' ? 'checked' : '' }} disabled>
                            <label for="tbdisease">TB Disease</label>
                            <input type="radio" name="tbDiagnosis" id="tbinfection" {{ $dstb->dstb_tuberculosis == 'TB Infection' ? 'checked' : '' }} disabled>
                            <label for="tbinfection">TB Infection</label>
                        </div>
                    </div>
                    <div class="data2">
                        <div class="date-diagnos">
                            <span>Date of Diagnosis (MM/DD/YYYY)</span>
                            <input type="date" name="DoDiagnos" id="DoDiagnos" value="{{ $dstb->dstb_dateDiagnosis ?? '' }}" readonly>
                        </div>
                        <div class="case-number">
                            <span>TB Case Number:</span>
                            <input type="text" name="case-number" id="case-number" value="{{ $dstb->dstb_tbCaseNumber ?? '' }}" readonly>
                        </div>
                    </div>
                    <div class="data3">
                        <div class="date-noti">
                            <span>Date of Notification (MM/DD/YYYY)</span>
                            <input type="date" name="dateNoti" id="dateNoti" value="{{ $dstb->dstb_dateNotification ?? '' }}" readonly>
                        </div>
                        <div class="att-physician">
                            <span>Attending Physician:</span>
                            <input type="text" name="attPhysi" id="attPhysi" value="{{ $dstb->dstb_attendingPhysician ?? '' }}" readonly>
                        </div>
                    </div>
                    <div class="data3">
                        <span>Referred To</span>
                        <textarea name="referredtoTxt" id="referredtoTxt" value="asdasfsd" readonly>
                            Name: {{ $dstb->dstb_referredToName ?? '' }}
                            Address: {{ $dstb->dstb_referredToAddress ?? '' }}
                            Facility Code: {{ $dstb->dstb_referredToFcode ?? '' }}
                            Province/HUC: {{ $dstb->dstb_referredToProvHuc ?? '' }}
                            Region: {{ $dstb->dstb_referredToRegion ?? '' }}
                        </textarea>
                    </div>
                </div>
            </div>

            {{-- E. TB Disease Classification --}}
            <div class="firstContent">
                <div class="noti">
                    <span>E. TB Disease Classification</span>
                </div>
                <div class="patient-info">
                    <div class="data1">
                        <span>Bacteriological Status:</span>
                        <div class="screen-2">
                            <div class="bacStat">
                                <input type="radio" name="bacStatus" id="bacConfirmed" {{ $dstb->dstb_bacteriologicalStatus == 'Bacteriologically-Confirmed TB' ? 'checked' : '' }} disabled>
                                <label for="bacConfirmed">Bacteriologically-confirmed TB</label>
                            </div>
                            <div class="bacStat">
                                <input type="radio" name="bacStatus" id="ClinicalDiag" {{ $dstb->dstb_bacteriologicalStatus == 'Clinically-Diagnosed TB' ? 'checked' : '' }} disabled>
                                <label for="ClinicalDiag">Clinically-diagnosed TB</label>
                            </div>
                        </div>
                        <span>Anatomical Site:</span>
                        <div style="width:100%important">
                            <div class="screen-2 d-flex" style="gap: 15px;">
                                <div class="d-flex" style="align-items:center;">
                                    <input type="radio" name="pulmo" id="pulmo" style="width: 15px!important;" {{ $dstb->dstb_pulmonarySite == 'Pulmonary' ? 'checked' : '' }} disabled>
                                    <label for="pulmo">Pulmonary</label>
                                </div>
                                <div class="d-flex" style="align-items:center;">
                                    <input type="radio" name="xtrapulmo" id="xtrapulmo" style="width: 15px!important;" {{ $dstb->dstb_pulmonarySite == 'Extra Pulmonary' ? 'checked' : '' }} disabled>
                                    <label for="xtrapulmo">Extra-pulmonary</label>
                                </div>
                                <div>
                                    <label for="pulmoSite">SITE:</label>
                                    <input class="specificSite" type="text" name="pulmoSite" id="pulmoSite" style="width: 150px!important; text-align:left;" value="{{ $dstb->dstb_specificPulmonarySite ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="data2">
                        <span>Drug Resistance Bacteriological Status:</span>
                        <div class="d-flex">
                            <div class="row">
                                <div class="d-flex" style="align-items:center;">
                                    <input style="width: 15px;" type="checkbox" name="DRType1" id="DRType1" {{ in_array('Drug-susceptible', $checkboxDrug ?? []) ? 'checked' : '' }} disabled>
                                    <label for="DRType1">Drug-susceptible</label>
                                </div>
                                <div class="d-flex" style="align-items:center;">
                                    <input style="width: 15px;" type="checkbox" name="DRType2" id="DRType2" {{ in_array('Bacteriologically-confirmed RR-TB', $checkboxDrug ?? []) ? 'checked' : '' }} disabled>
                                    <label for="DRType2">Bacteriologically-confirmed RR-TB</label>
                                </div>
                                <div class="d-flex" style="align-items:center;">
                                    <input style="width: 15px;" type="checkbox" name="DRType3" id="DRType3" {{ in_array('Bacteriologically-confirmed MDR-TB', $checkboxDrug ?? []) ? 'checked' : '' }} disabled>
                                    <label for="DRType3">Bacteriologically-confirmed MDR-TB</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-flex" style="align-items:center;">
                                    <input style="width: 15px;" type="checkbox" name="DRType4" id="DRType4" {{ in_array('Bacteriologically-confirmed XDR-TB', $checkboxDrug ?? []) ? 'checked' : '' }} disabled>
                                    <label for="DRType4">Bacteriologically-confirmed XDR-TB</label>
                                </div>
                                <div class="d-flex" style="align-items:center;">
                                    <input style="width: 15px;" type="checkbox" name="DRType5" id="DRType5" {{ in_array('Clinically-diagnosed MDR-TB', $checkboxDrug ?? []) ? 'checked' : '' }} disabled>
                                    <label for="DRType5">Clinically-diagnosed MDT-TB</label>
                                </div>
                                <div class="d-flex" style="align-items:center;">
                                    <input style="width: 15px;" type="checkbox" name="DRType6" id="DRType6" disabled>
                                    <label for="DRType6">Other Drug-resistant TB</label>

                                    <input style="width: 145px; text-align:left; border-bottom: #000 solid 1px;" class="statusType" type="text" name="otherType" id="otherType" value="{{ $dstb->dstb_drugResistanceSpecific ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="data3">
                        <span>Registration Group:</span>
                        <div class="d-flex">
                            <div class="row">
                                <div class="d-flex" style="align-items:center;">
                                    <input style="width: 15px;" type="checkbox" name="RegGroup1" id="RegGroup1" {{ in_array('New', $checkboxReg ?? []) ? 'checked' : '' }} disabled>
                                    <label for="RegGroup1">New</label>
                                </div>
                                <div class="d-flex" style="align-items:center;">
                                    <input style="width: 15px;" type="checkbox" name="RegGroup2" id="RegGroup2" {{ in_array('Relapse', $checkboxReg ?? []) ? 'checked' : '' }} disabled>
                                    <label for="RegGroup2">Relapse</label>
                                </div>
                                <div class="d-flex" style="align-items:center;">
                                    <input style="width: 15px;" type="checkbox" name="RegGroup3" id="RegGroup3" {{ in_array('TALF', $checkboxReg ?? []) ? 'checked' : '' }} disabled>
                                    <label for="RegGroup3">TALF</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-flex" style="align-items:center;">
                                    <input style="width: 15px;" type="checkbox" name="RegGroup4" id="RegGroup4" {{ in_array('TAF', $checkboxReg ?? []) ? 'checked' : '' }} disabled>
                                    <label for="RegGroup4">TAF</label>
                                </div>
                                <div class="d-flex" style="align-items:center;">
                                    <input style="width: 15px;" type="checkbox" name="RegGroup5" id="RegGroup5" {{ in_array('PTOU', $checkboxReg ?? []) ? 'checked' : '' }} disabled>
                                    <label for="RegGroup5">PTOU</label>
                                </div>
                                <div class="d-flex" style="align-items:center;">
                                    <input style="width: 15px;" type="checkbox" name="RegGroup6" id="RegGroup6" {{ in_array('Unknown', $checkboxReg ?? []) ? 'checked' : '' }} disabled>
                                    <label for="RegGroup6">Unknown History</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer d-flex" style="justify-content: space-between;">
                <p class="form">Form 4b. DS-TB Treatment Card</span>
                <p class="page">PAGE 1 OF 4</span>
                <p class="ver">v050120</span>
            </div>
                </div>
            </div>
       </div>

    </div><!-- End #main -->
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
        const dobInput = document.getElementById('dob');
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