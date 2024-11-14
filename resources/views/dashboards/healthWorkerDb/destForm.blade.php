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

    .toggle-sidebar-btn {
        display: none;
    }
    
    .container {
        max-width: 100% !important;
        margin-top: 80px;
        padding-bottom: 10px;
    }

    .pagetitle {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pagetitle *{
        font-size: 16px;
    }

    .container input {
        font-size: 12px;
        padding-left: 20px;
        outline: none;
    }
    .container label {
        font-size: 12px;
    }
    .container textarea {
        font-size: 12px;
    }

    input[type="text"], textarea {
        padding-left: 10px!important; 
    }

    .content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .headers {
        display: flex;
        flex-direction: row;
        width: 100%;
        border: 2px solid black;
    }
    /* @media only screen and (max-width: 768px) {
        .headers {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    } */
    .portion1 {
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 55%;
        border-right: 1px solid black;
    }
    /* @media only screen and (max-width: 650px) {
        .portion1 {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-right: none;
            border-bottom: 1px solid black;
            width: 100%;
        }
    }
    @media only screen and (max-width: 768px) {
        .portion1 {
            display: flex;
            justify-content: center;
            border-right: none;
            border-bottom: 1px solid black;
            width: 100%;
        }
    } */
    .port1 img {
        margin: 2px 0;
        height: 65px;
        width: 65px;
        padding-left: 4px;
    }
    .portion2 {
        display: flex;
        flex-direction: row;
        width: 45%;
    }
    /* @media only screen and (max-width: 768px) {
        .portion2 {
            width: 100%;
        }
    }
    @media only screen and (max-width: 650px) {
        .portion2 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
    } */
    .port2 p,
    .port2 h5 {
        text-align: left;
        font-weight: 400;
        letter-spacing: 2px;
        margin-top: -2px;
        margin-bottom: -2px;
        margin-left: 8px;
    }
    .port2 p {
        font-size: 14px;
    }
    .portion2-1 {
        border-right: 1px solid black;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
    }
    /* @media only screen and (max-width: 768px) {
        .portion2-1 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
    }
    @media only screen and (max-width: 650px) {
        .portion2-1 {
            border-right: none;
        }
    } */
    .port3,
    .port5 {
        border-bottom: 1px solid black;
        width: 100%;
        text-align: center;
        letter-spacing: 1px;
    }
    .port3 h5,
    .port5 h5 {
        font-size: 12px;
    }
    .port4 input,
    .port6 input {
        width: 140px;
        outline: none;
        border: none;
    }

    .portion2-2 {
        justify-content: center;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .second-sec {
        width: 100%;
        display: flex;
        flex-direction: column;
        border-bottom: 2px solid black;
        border-right: 2px solid black;
        border-left: 2px solid black;
    }
    .port2 {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin-left: 2px;
    }
    .sec-port2 {
        margin-top: -15px;
        margin-left: 10px;
        font-size: 12px;
    }
    .sec-port1 {
        width: 100%;
        text-align: center;
    }
    .sec-port1 h4 {
        font-weight: bold;
        font-size: 14px;
        padding-top: 15px;
    }
    .sec-port1 h2 {
        font-weight: bold;
        font-size: 25px;
        padding-bottom: 15px;
    }
    .para p {
        padding-left: 75px;
        font-size: 12px;
        width: 100%;
        margin-top: -15px;
        margin-bottom: 0px;
    }
    /* @media only screen and (max-width: 768px) {
        .para p {
            margin: 0;
        }
    } */
    .third-sec {
        width: 100%;
        height: 146px;
        display: flex;
        border-left: 2px solid black;
        border-right: 2px solid black;
        border-top: 2px solid black;
        flex-direction: column;
    }
    /* @media only screen and (max-width: 768px) {
        .third-sec {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    } */
    .third-port1 {
        width: 100%;
        display: flex;
        flex-direction: column;
        border-left: 1px solid black;
        border-right: 1px solid black;
        border-bottom: 2px solid black;
    }
    .third-port1 p {
        font-size: 14px;
        margin-top: 0;
        margin-bottom: 0px;
        padding-left: 5px;
    }

    .individual {
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 100%;
    }
    .individual1 {
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 100%;
    }
    /* @media only screen and (max-width: 768px) {
        .individual1 {
            display: flex;
            flex-direction: row;
            width: 100%;
        }
    }
    @media only screen and (max-width: 768px) {
        .individual {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
    } */
    /* @media only screen and (max-width: 768px) {
        .indivi {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
    } */
    .third-port2 {
        height: 100%;
        display: flex;
        flex-direction: row;
    }
    /* @media only screen and (max-width: 768px) {
        .third-port2 {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    } */
    .indi {
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    /* @media only screen and (max-width: 768px) {
        .indi,
        .indi2,
        .indi3 {
            width: 100%;
        }
    } */
    .indi label {
        font-size: 12px;
        border-top: 2px solid black;
        width: 180px;
    }
    .indi input {
        padding: 1px;
        width: 100%;
        border-bottom: none;
    }

    .indi2 {
        height: 43px;
        width: 69%;
        display: flex;
        flex-direction: row;
    }
    .indi3 {
        height: 43px;
        width: 32%;
        display: flex;
        flex-direction: row;
    }
    .indivi {
        height: 100%;
        display: flex;
        flex-direction: row;
    }
    .indi2 input {
        width: 100%;
        border-top: 2px solid black;
    }
    .indi2 label {
        font-size: 12px;
        padding-left: 2px;
        border: 1px solid black;
        border-bottom: 2px solid black;
        border-top: 2px solid black;
        width: 210px;
    }
    .indi3 label {
        font-size: 12px;
        border: 1px solid black;
        padding: 1.5px;
    }
    .indi3 input {
        width: 100%;
        border-top: 2px solid black;
    }
    .indivi1 {
        height: 80px;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .indivi1 label {
        display: flex;
        flex-direction: column;
        padding-left: 2px;
        width: 182px;
        border-right: 2px solid black;
        border-left: 1px solid black;
    }
    .indivi1 textarea {
        outline: none;
        width: 100%;
        height: 100%;
        resize: none;
    }
    .fourth-sec {
        width: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid black;
    }
    .fourth-port {
        width: 100%;
        border-left: 1px solid black;
        border-right: 1px solid black;
        border-top: 2px solid black;
    }
    .fourth-port p {
        width: 100%;
        font-size: 14px;
        margin-top: 0;
        margin-bottom: 0px;
        padding-left: 5px;
    }
    .rhu {
        border-top: 2px solid black;
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .rhu1 {
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .mode {
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .mode1 {
        display: flex;
        border: 1px solid black;
        height: 100%;
        width: 100%;
    }
    .walk,
    .visit,
    .referral {
        display: flex;
        align-items: center;
        width: 100%;
        border-left: 1px solid black;
        margin-left: 10px;
        padding-left: 5px;
    }

    .rhu1 label {
        border: 1px solid black;
        align-items: center;
        padding-left: 2px;
        width: 180px;
        display: flex;
        flex-direction: row;
    }
    .mode1 input {
        margin-left: 10px;
    }

    .fourth-sec1 {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: row;
    }
    .date {
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .date label {
        border: 1px solid black;
        padding-left: 2px;
        width: 180px;
    }
    .date input {
        width: 100%;
    }
    .rhu2 {
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .time {
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .time label {
        border: 1px solid black;
        padding-left: 2px;
        width: 180px;
    }
    .time input {
        width: 100%;
    }
    .health {
        height: 50px;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .track {
        height: 100%;
        width: 50%;
    }
    .blood {
        height: 25.5px;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .blood input {
        width: 100%;
    }
    .blood label {
        display: flex;
        align-items: center;
        padding-left: 2px;
        border: 1px solid black;
        width: 260px;
    }
    .height {
        height: 25.5px;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .height input {
        width: 100%;
    }
    .height label {
        display: flex;
        align-items: center;
        border: 1px solid black;
        padding-left: 2px;
        width: 260px;
    }
    .temp {
        height: 25.5px;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .temp input {
        width: 100%;
    }
    .temp label {
        display: flex;
        align-items: center;
        border: 1px solid black;
        padding-left: 5px;
        width: 228px;
    }
    .weight {
        height: 25.5px;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .weight input {
        width: 100%;
    }
    .weight label {
        display: flex;
        align-items: center;
        border: 1px solid black;
        padding-left: 5px;
        width: 228px;
    }
    .provider {
        border-top: 1px solid black;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .provider input {
        width: 100%;
    }
    .provider label {
        border-left: 1px solid black;
        border-top: 1px solid black;
        border-right: 1px solid black;
        padding: 5px;
        width: 178px;
    }
    .head {
        border-left: 1px solid black;
        width: 100%;
        border-bottom: 1px solid black;
        border-top: 1px solid black;
    }
    .head p {
        height: 35.9px;
        padding-left: 5px;
        display: flex;
        align-items: center;
        margin: 0px 0;
    }
    .from {
        display: flex;
        flex-direction: row;
        border: 1px solid black;
    }
    .from input {
        border: none;
        margin-right: -1.1px;
        width: 100%;
        border-left: 1px solid black;
    }
    .from label {
        margin-bottom: -1px;
        padding-left: 10px;
        width: 150px;
        border-right: 1px solid black;
    }
    .referred {
        display: flex;
        flex-direction: row;
        border: 1px solid black;
    }
    .referred input {
        border: none;
        margin-right: -1.1px;
        width: 100%;
        border-left: 1px solid black;
    }
    .referred label {
        margin-bottom: -1px;
        padding-left: 10px;
        width: 150px;
        border-right: 1px solid black;
    }
    .reason {
        height: 126px;
        display: flex;
        flex-direction: row;
        border-left: 1px solid black;
        border-bottom: 1px solid black;
        border-top: 1px solid black;
    }
    .reason label {
        padding-left: 10px;
        width: 152px;
        border-right: 2px solid black;
        display: flex;
        align-items: center;
    }
    .reason textarea {
        height: 100%;
        border-top: none;
        border-left: none;
        border-bottom: none;
        border-right: 1px solid black;
        width: 100%;
        resize: none;
        outline: none;
    }
    .head p,
    .from input,
    .referred input {
        border-right: 1px solid black;
    }
    .by {
        display: flex;
        flex-direction: row;
        border-left: 1px solid black;
        border-bottom: 1px solid black;
        border-top: 1px solid black;
        border-right: 1px solid black;
    }
    .by label {
        display: flex;
        border-right: 1px solid black;
        align-items: center;
        padding: 14px 0;
        padding-left: 10px;
        width: 151px;
    }
    .by input {
        border: none;
        width: 100%;
        border-left: 1px solid black;
    }
    .fifth-sec {
        width: 100%;
        display: flex;
        flex-direction: row;
        border-bottom: 1px solid black;
        border-right: 2px solid black;
        border-left: 2px solid black;
    }
    .visits {
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .visittype {
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .type1 {
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 100%;
    }
    .type3 {
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 100%;
    }
    .type11 input {
        margin-left: 8px;
        display: flex;
        justify-content: center;
    }
    .type33 label {
        padding: 5px;
        margin-right: 8px;
        margin-left: 8px;
        border-left: 1px solid black;
    }
    .type11 label {
        padding: 5px;
        border-left: 1px solid black;
        margin-left: 8px;
    }
    .type33 {
        padding-left: 5px;
        display: flex;
        border: 1px solid black;
        width: 100%;
    }
    .type33 {
        padding-left: 10px;
    }
    .type11 label {
        width: 100%;
    }
    .type11 {
        height: 100%;
        border: 1px solid black;
        display: flex;
        width: 100%;
    }
    .type22 {
        padding-left: 5px;
        border: 1px solid black;
        display: flex;
        width: 100%;
    }
    .type22 input {
        margin-left: 3px;
    }
    .type22 label {
        padding: 2px;
        width: 100%;
        padding-left: 5px;
        margin-left: 8px;
        border-left: 1px solid black;
    }
    .visited {
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .visitss {
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .visitss label {
        padding: 17.7px;
        border-left: 1px solid black;
        align-items: center;
        width: 145px;
        justify-content: center;
        display: flex;
        border-bottom: 1px solid black;
    }
    .visitss textarea {
        padding: 10px;
        width: 100%;
        resize: none;
        border-left: 2px solid black;
        outline: none;
    }
    .purpose {
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .types {
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .consult {
        display: flex;
        flex-direction: column;
    }
    .consult label {
        display: flex;
        align-items: center;
        height: 100%;
        padding-left: 9px;
        width: 138px;
        border: 1px solid black;
    }
    .nature {
        align-items: center;
        display: flex;
    }
    .natures {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .nature label {
        display: flex;
        align-items: center;
        height: 100%;
        padding-left: 10px;
        width: 138px;
        border: 1px solid black;
    }
    .nat1 {
        padding-left: 7px;
        display: flex;
        flex-direction: row;
        gap: 6px;
        border: 1px solid black;
    }
    .nat1 input {
        margin-left: 2px;
        margin-right: 1px;
    }
    .nat1 label {
        padding: 2px;
        border-left: 1px solid black;
    }
    .sixth-sec {
        width: 100%;
        display: flex;
        flex-direction: column;
        border-bottom: 2px solid black;
        border-right: 2px solid black;
        border-left: 2px solid black;
    }
    .sixsec {
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .sixsec label {
        border-right: 2px solid black;
        padding-left: 10px;
        padding-right: 68.5px;
        display: flex;
        align-items: center;
    }
    .sixsec textarea {
        outline: none;
        border: none;
        padding: 10px;
        height: 100px;
        width: 100%;
        resize: none;
    }
    .seventh-sec {
        width: 100%;
        display: flex;
        flex-direction: row;
        border-bottom: 2px solid black;
        border-right: 2px solid black;
        border-left: 2px solid black;
    }
    .seven1 {
        width: 70%;
        display: flex;
        flex-direction: row;
    }
    .seven1 label {
        border-right: 2px solid black;
        padding-right: 56.5px;
        align-items: center;
        padding-left: 10px;
        display: flex;
    }
    .seven1 textarea {
        outline: none;
        resize: none;
        height: 100px;
        padding: 10px;
        border: none;
        width: 100%;
        border-right: 2px solid black;
    }
    .seven {
        width: 30%;
        display: flex;
        flex-direction: column;
    }
    .seven label {
        border-bottom: 2px solid black;
        text-align: center;
        padding: 5px 0;
    }
    .seven input {
        height: 100%;
        border: none;
        outline: none;
    }
    .eighth-sec {
        width: 100%;
        display: flex;
        flex-direction: row;
        border-bottom: 2px solid black;
        border-right: 2px solid black;
        border-left: 2px solid black;
    }
    .eight1 {
        display: flex;
        flex-direction: row;
        width: 70%;
    }
    .eight1 label {
        border-right: 2px solid black;
        padding-right: 58px;
        align-items: center;
        padding-left: 10px;
        display: flex;
    }
    .eight1 textarea {
        height: 100px;
        outline: none;
        resize: none;
        padding: 10px;
        border: none;
        width: 100%;
        border-right: 2px solid black;
    }
    .eight label {
        text-align: center;
        padding: 5px 0;
        border-bottom: 2px solid black;
    }
    .eight textarea {
        height: 70px;
        padding: 10px;
        outline: none;
        border: none;
        resize: none;
    }
    .eight {
        width: 30%;
        display: flex;
        flex-direction: column;
    }
    .ninth-sec {
        width: 100%;
        display: flex;
        justify-content: right;
        flex-direction: row;
        border-bottom: 2px solid black;
        border-right: 2px solid black;
        border-left: 2px solid black;
    }
    .ninth-sec p {
        margin-top: 0;
        margin-bottom: 0;
        margin-right: 5px;
        letter-spacing: 2px;
        font-size: 13px;
    }
    .nine1 {
        display: flex;
        flex-direction: row;
    }
    .form {
        border-left: 2px solid black;
        border-right: 2px solid black;
        padding: 0 10px;
        margin: 0 10px;
    }
/* PRINT */
@media print {
    /* Set page orientation to landscape */
    @page {
        size: portrait;
        margin: 1mm; /* Set margins */
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box; /* Ensure padding/border doesn't add extra space */
    }

    /* .port2 {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-left: 2px;
    }

    .port2 h5 {
        font-size: 14px!important;
    } */

    /* Ensure the body and all child elements are visible during printing */
    body {
        visibility: visible !important;
        background-color: #FFF;
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

    /* Make sure the card is visible and takes up the full page */
    .card {
        width: 1200px; /* Ensure the card takes full width of the page */
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
        padding: 5;
        background-color: #fff;
    }  
}


</style>
<body>
    @include('layouts.headerHealthWorkers')

    <div class="container">
        <div class="pagetitle">
            <div class="pageArea">
                <h1>Destrict Form</h1>
                <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ action('App\Http\Controllers\regValidation@destrict') }}">Destrict</a></li>
                      <li class="breadcrumb-item active">Destrict Form</li>
                    </ol>
                  </nav>
            </div>
            <div class="btnArea">
                <button type="button" class="btn btn-primary" id="print"><i class="bi bi-printer-fill"></i> Print</button>
            </div>
        </div><!-- End Page Title -->

        <div class="card">
            <div class="card-body" style="padding: 10px;">
                <div class="content">
                    <div class="headers">
                          <div class="portion1">
                            <div class="port1">
                                <img src="/assets/img/doh.png" alt="">
                            </div>
                            <div class="port2">
                                <p>Republic of the Philippines</p>
                                <h5>Department of Health</h5>
                                <p>Kagawaran ng Kalusugan</p>
                            </div>
                          </div>
                          <div class="portion2">
                            <div class="portion2-1">
                                <div class="port3">
                                    <h5>Family Serial Number</h5>
                                </div>
                                <div class="port4">
                                    <input type="text" name="Famcode" id="Famcode">
                                </div>
                            </div>
                            <div class="portion2-2">
                                <div class="port5">
                                    <h5>Facility Code</h5>
                                </div>
                                <div class="port6">
                                    <input type="text" name="Faccode" id="Faccode">
                                </div>
                            </div>
                          </div>
                    </div>
                    <div class="second-sec">
                        <div class="sec-port1">
                            <i><h4>Integrated Clinic Information System (iCLINICSYS)</h4></i>
                            <h2>INDIVIDUAL TREATEMENT RECORD</h2>
                        </div>
                        <div class="sec-port2">
                            <i><p>Instructions: <b>For old, returning and/or referred patient.</b> Please print legibly and mark appropriate boxes with <b>"X"</b>.</p></i>
                            <i class="para"><p><b>Para sa mga pasyente.</b> Mangyaring isulat nang malinaw at markahan ang naangkop na kahon ng <b>"X"</b>.</p></i>
                        </div>
                    </div>
                    <div class="third-sec">
                        <div class="third-port1">
                            <p><b>I. PATIENT INFORMATION</b> (IMPORMASYON NG PASYENTE)</p>
                        </div>
                        <div class="third-port2">
                            <div class="col">
                            <div class="individual">
                                <div class="indi">
                                    <label for="indiLastname"><b>Last Name</b><br><i>(Apelyido)</i></label>
                                    <input type="text" name="indiLastname" id="indiLastname" value="{{ $des->resident->res_lname ?? '' }}" readonly>
                                </div>
                                <div class="indi">
                                    <label for="indiFirstname"><b>First Name</b><br><i>(Pangalan)</i></label>
                                    <input type="text" name="indiFirstname" id="indiFirstname" value="{{ $des->resident->res_fname ?? '' }}" readonly>
                                </div>
                                <div class="indi" style="border-bottom:1px solid black;">
                                    <label for="indiMiddlename"><b>Middle Name</b><br><i>(Gitnang Pangalan)</i></label>
                                    <input class="bords" type="text" name="indiMiddlename" id="indiMiddlename" value="{{ $des->resident->res_mname ?? '' }}" readonly>
                                </div>
                            </div>
                            </div>
                            <div class="col">
                            <div class="individual1">
                                <div class="indivi">
                                    <div class="indi2">
                                        <label for="indiSuffix"><b>Suffix <br>(e.g Jr.,  Sr,. II, III)</b></label>
                                        <input type="text" name="indiSuffix" id="indiSuffix" value="{{ $des->resident->res_suffix ?? 'N/A' }}" readonly>
                                    </div>
                                    <div class="indi3">
                                        <label for="indiAge"><b>Age</b><br><i>(Edad)</i></label>
                                        <input type="hidden" name="patientBD" id="patientBD" value="{{ $des->resident->res_bdate ?? 'N/A' }}" readonly>
                                        <input type="text" name="indiAge" id="indiAge" readonly>
                                    </div>
                                </div>
                                <div class="indivi1">
                                    <label for="indiAddress"><b>Residential <br>Address <br></b><i>(Tirahan)</i></label>
                                    <textarea name="indiAddress" id="indiAddress" cols="30" rows="10" readonly>{{ $des->resident->res_address ?? 'N/A' }}</textarea>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="fourth-sec">
                        <div class="fourth-port">
                            <p><b>II. FOR CHU / RHU PERSONNEL ONLY</b>(PARA SA KINATAWAN NG CHU / RHU LAMANG)</p>
                        </div>
                        <div class="fourth-sec1">
                            <div class="rhu">
                                <div class="col">
                                <div class="rhu1">
                                    <label for="Transactions"><b>Mode of <br>Transaction</b></label>
                                    <div class="mode">
                                        <div class="mode1">
                                            <input type="radio" name="Transaction" id="walk" value="Walk-in" {{ $des->des_modTrans == 'Walk-In' ? 'checked' : '' }} disabled> <div class="walk" style="font-size:12px;">Walk-in</div>
                                        </div>
                                        <div class="mode1">
                                            <input type="radio" name="Transaction" id="visited" value="Visited" {{ $des->des_modTrans == 'Visited' ? 'checked' : '' }} disabled> <div class="visit" style="font-size:12px;">Visited</div>
                                        </div>
                                        <div class="mode1">
                                            <input type="radio" name="Transaction" id="referral" value="Referral" {{ $des->des_modTrans == 'Referral' ? 'checked' : '' }} disabled> <div class="referral" style="font-size:12px;">Referral</div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col">
                                <div class="rhu2">
                                    <div class="date">
                                        <label for="dateConsult"><b>Date of <br>Consultation</b></label>
                                        <input type="date" name="dateConsult" id="dateConsult" value="{{ $des->des_dateConsult ?? 'N/A' }}" readonly>
                                    </div>
                                    <div class="time">
                                        <label for="timeConsult"><b>Consultation <br>Time</b></label>
                                        <input type="time" name="timeConsult" id="timeConsult" value="{{ $des->des_consultTime ?? 'N/A' }}" readonly>
                                    </div>
                                    <div class="health">
                                        <div class="track">
                                            <div class="blood">
                                                <label for="BloodPress"><b>Blood Pressure</b></label>
                                                <input type="text" name="BloodPress" id="BloodPress" value="{{ $des->des_bp ?? 'N/A' }}" readonly>
                                            </div>
                                            <div class="height">
                                                <label for="Height"><b>Height(cm)</b></label>
                                                <input type="text" name="Height" id="Height" value="{{ $des->des_ht ?? 'N/A' }}" readonly>
                                            </div>
                                        </div>
                                        <div class="track">
                                            <div class="temp">
                                                <label for="Temp"><b>Temperature</b></label>
                                                <input type="text" name="Temp" id="Temp" value="{{ $des->des_temp ?? 'N/A' }}" readonly>
                                            </div>
                                            <div class="weight">
                                                <label for="Weight"><b>Weight(kg)</b></label>
                                                <input type="text" name="Weight" id="Weight" value="{{ $des->des_wt ?? 'N/A' }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="provider">
                                    <label for="provide"><b>Name of Attending <br>Provider</b></label>
                                    <input type="text" name="provide" id="provide" value="{{ $des->des_attProvider ?? 'N/A' }}" readonly>
                                </div>          
                            </div>
                            <div class="rhu">
                                <div class="head" style="font-size:12px;">
                                    <p><i><b>For REFERRAL Transaction only.</b></i></p>
                                </div>
                                <div class="from">
                                    <label for="from"><b>REFERRED <br>FROM</b></label>
                                    <input type="text" name="from" id="from" value="{{ $des->des_refFrom ?? 'N/A' }}" readonly>
                                </div>
                                <div class="referred">
                                    <label for="to"><b>REFERRED <br>TO</b></label>
                                    <input type="text" name="to" id="to" value="{{ $des->des_refTo ?? 'N/A' }}" readonly>
                                </div>
                                <div class="reason">
                                    <label for="reasons"><b>Reason(s) <br>for Referral</b></label>
                                    <textarea name="reasons" id="reasons" cols="30" rows="10" readonly>{{ $des->des_refReason ?? 'N/A' }}</textarea>
                                </div>
                                <div class="by">
                                    <label for="by"><b>Referral by</b></label>
                                    <input type="text" name="by" id="by" value="{{ $des->des_refBy ?? 'N/A' }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fifth-sec">
                        <div class="visits">
                            <div class="col">
                            <div class="types">
                                <div class="nature">
                                    <label for="nature"><b>Nature of Visit</b></la>
                                </div>
                                <div class="natures">
                                    <div class="nat1">
                                        <input type="radio" name="natures" id="firstnature" {{ $des->des_natVisit == 'New Consultation/Case' ? 'checked' : '' }} disabled>
                                        <label for="natures">New Consultation/Case</label>
                                    </div>
                                    <div class="nat1">
                                        <input type="radio" name="natures" id="secondnature" {{ $des->des_natVisit == 'New Admission' ? 'checked' : '' }} disabled>
                                        <label for="natures">New Admission</label>
                                    </div>
                                    <div class="nat1">
                                        <input type="radio" name="natures" id="thirdnature" {{ $des->des_natVisit == 'Follow-Up Visit' ? 'checked' : '' }} disabled>
                                        <label for="natures">Follow-Up Visit</label>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="purpose">
                                <div class="consult">
                                    <label for="type"><b>Type of <br>Consultation / <br>Purpose of visit</b></label>
                                </div>
                                <div class="visited">
                                    <div class="visittype">
                                        <div class="type1">
                                            <div class="type11">
                                                <input type="checkbox" name="types" id="firsttype" {{ in_array('General', $checkboxType ?? []) ? 'checked' : '' }} disabled>
                                                <label for="types">General</label>
                                            </div>
                                            <div class="type11">
                                                <input type="checkbox" name="types" id="secondtype" {{ in_array('Prenatal', $checkboxType ?? []) ? 'checked' : '' }} disabled>
                                                <label for="types">Prenatal</label>
                                            </div>
                                            <div class="type11">
                                                <input type="checkbox" name="types" id="thirdtype" {{ in_array('Dental Care', $checkboxType ?? []) ? 'checked' : '' }} disabled>
                                                <label for="types">Dental Care</label>
                                            </div>
                                            <div class="type11">
                                                <input type="checkbox" name="types" id="fourthtype" {{ in_array('Child Care', $checkboxType ?? []) ? 'checked' : '' }} disabled>
                                                <label for="types">Child Care</label>
                                            </div>
                                            <div class="type11">
                                                <input type="checkbox" name="types" id="fifthtype" {{ in_array('Child Nutrition', $checkboxType ?? []) ? 'checked' : '' }} disabled>
                                                <label for="types">Child Nutrition</label>
                                            </div>
                                            <div class="type11">
                                                <input type="checkbox" name="types" id="sixthtype" {{ in_array('Injury', $checkboxType ?? []) ? 'checked' : '' }} disabled>
                                                <label for="types">Injury</label>
                                            </div>
                                        </div>
                                        <div class="type3">
                                            <div class="type33">
                                                <input type="checkbox" name="types" id="seventhtype" {{ in_array('Family Planning', $checkboxType ?? []) ? 'checked' : '' }} disabled>
                                                <label for="types">Family Planning</label>
                                            </div>
                                            <div class="type33">
                                                <input type="checkbox" name="types" id="eighthtype" {{ in_array('Postpartum', $checkboxType ?? []) ? 'checked' : '' }} disabled>
                                                <label for="types">Postpartum</label>
                                            </div>
                                            <div class="type33">    
                                                <input type="checkbox" name="types" id="ninthtype" {{ in_array('TuberCulosis', $checkboxType ?? []) ? 'checked' : '' }} disabled>
                                                <label for="types">Tuberculosis</label>
                                            </div>
                                            <div class="type33">
                                                <input type="checkbox" name="types" id="tenthtype" {{ in_array('Child Immunization', $checkboxType ?? []) ? 'checked' : '' }} disabled>
                                                <label for="types">Child Immunization</label>
                                            </div>
                                            <div class="type33">
                                                <input type="checkbox" name="types" id="eleventhtype" {{ in_array('Sick Children', $checkboxType ?? []) ? 'checked' : '' }} disabled>
                                                <label for="types">Sick Children</label>
                                            </div>
                                            <div class="type33">
                                                <input type="checkbox" name="types" id="twelfthtype" {{ in_array('Firecracker Injury', $checkboxType ?? []) ? 'checked' : '' }} disabled>
                                                <label for="types">Firecracker Injury</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="type2">
                                        <div class="type22">
                                            <input type="checkbox" name="types" id="thirteenthtype" {{ in_array('Adult Immunization', $checkboxType ?? []) ? 'checked' : '' }} disabled>
                                            <label for="types">Adult Immunization</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="visitss">
                            <label for="complaint"><i><b>Chief <br>Complaints:</b></i></label>
                            <textarea name="complaint" id="complaint" cols="30" rows="10" readonly>{{ $des->des_complaint ?? 'N/A' }}</textarea>
                        </div>
                    </div>
                    <div class="sixth-sec">
                        <div class="sixsec">
                            <label for="Diagnose"><i><b>Diagnosis</b></i></label>
                            <textarea name="Diagnose" id="Diagnose" cols="30" rows="10" readonly>{{ $des->des_diagnosis ?? 'N/A' }}</textarea>
                        </div>
                    </div>
                    <div class="seventh-sec">
                        <div class="seven1">
                            <label for="medication"><i><b>Medication/ <br>Treatment:</b></i></label>
                            <textarea name="medication" id="medication" cols="30" rows="10" readonly>{{ $des->des_medTreatment ?? 'N/A' }}</textarea>
                        </div>
                        <div class="seven">
                            <label for="healthpro"><i><b>Name of Health Care Provider:</b></i></label>
                            <input type="text" name="healthpro" id="healthpro" value="{{ $des->employee->em_fname ?? '' }} {{ $des->employee->em_mname ?? '' }} {{ $des->employee->em_lname ?? '' }}" readonly>
                        </div>
                    </div>
                    <div class="eighth-sec">
                        <div class="eight1">
                            <label for="laboratory"><i><b>Laboratory <br>Findings / <br>Impression:</b></i></label>
                            <textarea name="laboratory" id="laboratory" cols="30" rows="10" readonly>{{ $des->des_labFindings ?? 'N/A' }}</textarea>
                        </div>
                        <div class="eight">
                            <label for="testlab"><i><b>Performed Laboratory Test:</b></i></label>
                            <textarea name="testlab" id="testlab" cols="30" rows="10" readonly>{{ $des->des_perfLabTest ?? 'N/A' }}</textarea>
                        </div>
                    </div>
                    <div class="ninth-sec">
                        <div class="nine1">
                            <p>Clinic Infomation System</p>
                            <p class="form"><b>FORM 2</b></p>
                            <p>Page 1</p>
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
          const dobInput = document.getElementById('patientBD');
          const ageInput = document.getElementById('indiAge');
  
          // Calculate and set age initially
          const dobValue = dobInput.value;
          if (dobValue) {
              ageInput.value = calculateAge(dobValue);
          }
      });
  
    </script>  
</body>
</html>

