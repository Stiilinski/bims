@include('layouts.headHealthWorkers')
<style>
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
/* First Form */
    * {
        font-size: 12px;
    }

    .toggle-sidebar-btn {
        display: none;
    }

    .headerArea {
        display: flex;
        justify-content: space-between;
        font-size: 16px!important;
    }
    .headerArea b {
        font-size: 16px!important;
    }

    .form_plate {
        width: 100%!important;
        display: flex;
        flex-direction: column;
    }
    .row {
        display: flex;
        flex-direction: row;
        height: 100%!important;
    }

    .rowFirst, .rowSecond, .rowThird, 
    .rowFourth, .rowFifth, .rowSeventh {
        display: flex;
        flex-direction: row;
        height: 100%;
    }

    .rowSixth {
        display: flex;
        flex-direction: row;
        height: 100%;
        border: 2px solid;
        justify-content: space-evenly;
        padding: 10px;
    }

    .row>* {
        padding: 0!important;
    }

    .cellp_100 {
        width: 100%;
    }

    .cellp_80 {
        width: 80%;
    }

    .cellp_70 {
        width: 70%;
    }

    .cellp_65 {
        width: 60%;
    }

    .cellp_60 {
        width: 60%;
    }

    .cellp_50 {
        width: 100%;
    }

    .cellp_40 {
        width: 40%;
    }

    .cellp_35 {
        width: 35%;
    }

    .cellp_30 {
        width: 30%;
    }

    .cellp_25 {
        width: 25%;
    }

    .cellp_20 {
        width: 20%;
    }

    .cellp_15 {
        width: 15%;
    }

    .cellp_10 {
        width: 10%;
    }

    .cell_plate {
        width: 100%;
        border: 2px solid;
        border-top: none;
    }

    .cell_plates {
        width: 100%;
        border: 2px solid;
        border-top: none;
        height: 100%;
    }

    .flexer {
        display: flex;
    }

    .flexer_c {
        display: flex;
        flex-direction: column;
    }

    .justify {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    .justify_m {
        padding: 5px 0;
        align-items: center;
        display: flex;
    }

    input {
        border: none;
        box-sizing: border-box;
        text-indent: 5px;
    }

    .radio {
        margin: 0 10px;
    }

    .c1_radio {
        margin-left: 0px !important;
    }

    input:focus {
        outline: 0;
    }

    .bg_gr {
        background-color: gainsboro;
    }

    .ttl_bar {
        width: 100%;
        height: 30px;
        background-color: gainsboro;
        text-indent: 5px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        border-bottom: 2px solid;
    }

    .indent_5 {
        text-indent: 5px;
    }

    .border {
        border: 2px solid;
    }

    .b_top {
        border-top: 2px solid;
    }

    .b_bottom {
        border-bottom: 2px solid;
    }

    .nb_bottom {
        border-bottom: none !important;
    }

    .nb_right {
        border-right: none !important;
    }

    .nb_top {
        border-top: none !important;
    }

    .clearb {
        border: none !important;
    }

    .pad_top {
        padding-top: 5px;
    }

    .pad_tb {
        padding: 30px 0;
    }

    .pad_top10 {
        padding-top: 10px !important;
    }

    .pad_left {
        padding-left: 15px;
    }

    .pad_left_strong {
        padding-left: 25px;
    }

    .pad_left_hep {
        padding-left: 40px;
    }

    .pad_left_max {
        padding-left: 100px;
    }

    .inp_bar {
        width: 100%;
        height: 30px;
    }

    .width_fix {
        width: 100px;
    }

    .width_fix_s {
        width: 50px;
    }

    .width_fix_m {
        width: 100px;
    }

    .width_fix_ml {
        width: 165px;
    }

    .width_fix_l {
        width: 200px;
    }

    .width_fix_xl {
        width: 225px;
    }

    .align_end {
        text-align: end;
    }

    .custom_height {
        height: 280px !important;
    }

    .custom_height1 {
        height: 420px !important;
    }

    .custom_height2 {
        height: 200px !important;
    }

    .custom_height3 {
        height: 220px !important;
    }

    .custom_height4 {
        height: 740px !important;
    }

    .custom_height5 {
        height: 360px !important;
    }

    .custom_height6 {
        height: 266px !important;
    }

    /* .custom_height7 {
        height: 120px !important;
    } */

    .custom_heights1 {
        height: 416px !important;
    }

    .s_radio {
        height: 10px;
        width: 10px;
        margin: 5px 10px;
    }

    .pline {
        line-height: 1.5;
    }

    .centerfix {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    tr, th, thead, td, tbody {
        border: solid!important;
        padding-left:10px;
    }
    th {
        background-color: gainsboro;
    }

/* End of First Form */

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
    /* Ensure the body and all child elements are visible during printing */
    body {
        visibility: visible !important;
        background-color: #f6f9ff;
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
        padding: 1mm; /* Adjust padding to prevent clipping */
        box-sizing: border-box;
    }

    .card-body * {
        padding: 5;
        background-color: #fff;
        font-size: 10px!important;
    }  
    
    .rowFirst * {
        background-color: #dcdcdc!important;
    }

    .ttl_bar * {
        background-color: #dcdcdc!important;
        height: 100%!important;
    }

    .custom_height5 {
        height: 345px!important;
    }

    table th:nth-child(7), 
    table td:nth-child(7)  
    {
        display: none;
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
            <h1>Family Planning</h1>
            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ action('App\Http\Controllers\regValidation@familyPlanning') }}">Family Planning</a></li>
                  <li class="breadcrumb-item active">Family Planning Form</li>
                </ol>
              </nav>
        </div>
        <div class="btnArea">
            <button type="button" class="btn btn-primary" id="print"><i class="bi bi-printer-fill"></i> Print</button>
        </div>
    </div><!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Family Planning Forms</h5>

          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Side A Form</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Side B Form</button>
            </li>
          </ul>

          
            <div class="tab-content pt-2" id="borderedTabContent">
                {{-- FORM 1 --}}
                <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="headerArea">
                        <b>SIDE A</b>
                        <b>Family Planning (FP) FORM 1</b>
                        <b>ver. 3.0</b>
                    </div>
                    <form action="" class="form_plate">
                        <div class="rowFirst">
                            <div class="cellp_50">
                                <div class="cell_plates b_top nb_right bg_gr custom_height7">
                                    <p class="pad_left">
                                        <b>FAMILY PLANNING CLIENT ASSESSMENT RECORD</b><br>
                                        instructions for Physicians, Nurses and Midwives. <b>Make sure that the client is not <br>
                                        pregnant by using the questions listed in SIDE B.</b> Completely fill out or check  <br>
                                        the required information. Refer accordingly for any abnormal history/findings for <br>
                                        further medical evaluation
                                    </p>
                                </div>
                            </div>
                            <div class="cellp_50">
                                <div class="cell_plate b_top bg_gr custom_height7">
                                    <div class="pad_left_hep">
                                        <span class="justify_m"><b>CLIENT ID:</b>&nbsp;&nbsp;<input type="text" class="b_bottom width_fix_l bg_gr" readonly></span>
                                        <span class="justify_m"><b>PHILHEALTH NO.:</b>&nbsp;&nbsp;<input type="text" class="b_bottom width_fix_l bg_gr" readonly></span>
                                        <span class="justify_m">
                                            <b>NHTS?</b>
                                            <input type="radio" name="test3" value="" class="radio"><b>Yes</b>
                                            <input type="radio" name="test3" value="" class="radio"><b>No</b>
                                        </span>
                                        <span class="justify_m">
                                            <b>Pantawid Pamilya Pilipino Program (4Ps):</b>
                                            <input type="radio" name="test3" value="" class="radio"><b>Yes</b>
                                            <input type="radio" name="test3" value="" class="radio"><b>No</b>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rowSecond">
                            <div class="cellp_40">
                                <div class="cell_plate">
                                    <div class="ttl_bar">
                                        <span><b>NAME OF CLIENT:</b> (Last Name, Given Name, Middle Initial)</span>
                                    </div>
                                    <div class="inp_bar">
                                        <input type="text" name="" id="" class="form-control" value="{{ $fp->client->res_lname ?? '' }}, {{ $fp->client->res_fname ?? '' }} {{ $fp->client->res_mname ?? '' }} {{ $fp->client->res_suffix ?? '' }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="cellp_60 flexer">
                                <div class="cellp_35">
                                    <div class="cell_plate">
                                        <div class="ttl_bar">
                                            <span><b>Date of Birth:</b> (MM/DD/YYYY)</span>
                                        </div>
                                        <div class="inp_bar">
                                            <input type="date" class="form-control" value="{{ $fp->client->res_bdate ?? '' }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="cellp_15">
                                    <div class="cell_plate">
                                        <div class="ttl_bar">
                                            <b>Age</b>
                                        </div>
                                        <div class="inp_bar">
                                            <input type="text" class="form-control" value="{{ $age }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="cellp_25">
                                    <div class="cell_plate">
                                        <div class="ttl_bar">
                                            <b>Educ Attain.</b>
                                        </div>
                                        <div class="inp_bar">
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="cellp_25">
                                    <div class="cell_plate">
                                        <div class="ttl_bar">
                                            <b>Occupation</b>
                                        </div>
                                        <div class="inp_bar">
                                            <input type="text" class="form-control" value="{{ $fp->client->res_occupation ?? '' }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rowThird">
                            <div class="cellp_50">
                                <div class="cell_plate">
                                    <div class="ttl_bar">
                                        <span><b>Address:</b> (No., Street, Barangay, Municipality/City, Province)</span>
                                    </div>
                                    <div class="inp_bar">
                                        <input type="text" class="form-control" value="{{ $fp->client->res_address ?? '' }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="cellp_50 flexer">
                                <div class="cellp_40">
                                    <div class="cell_plate">
                                        <div class="ttl_bar">
                                            <b>Contact Number:</b>
                                        </div>
                                        <div class="inp_bar">
                                            <input type="text" class="form-control" value="{{ $fp->client->res_contact ?? '' }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="cellp_30">
                                    <div class="cell_plate">
                                        <div class="ttl_bar">
                                            <b>Civil Status:</b>
                                        </div>
                                        <div class="inp_bar">
                                            <input type="text" class="form-control" value="{{ $fp->client->res_civil ?? '' }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="cellp_40">
                                    <div class="cell_plate">
                                        <div class="ttl_bar">
                                            <b>Religion:</b>
                                        </div>
                                        <div class="inp_bar">
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rowFourth">
                            <div class="cellp_40">
                                <div class="cell_plate">
                                    <div class="ttl_bar">
                                        <span><b>NAME OF SPOUSE:</b> (Last Name, Given Name, Middle Initial)</span>
                                    </div>
                                    <div class="inp_bar">
                                        <input type="text" class="form-control" value="{{ $fp->spouse->res_lname ?? '' }}, {{ $fp->spouse->res_fname ?? '' }} {{ $fp->spouse->res_mname ?? '' }} {{ $fp->spouse->res_suffix ?? '' }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="cellp_60 flexer">
                                <div class="cellp_35">
                                    <div class="cell_plate">
                                        <div class="ttl_bar">
                                            <span><b>Date of Birth:</b> (MM/DD/YYYY)</span>
                                        </div>
                                        <div class="inp_bar">
                                            <input type="date" class="form-control" value="{{ $fp->spouse->res_bdate ?? '' }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="cellp_30">
                                    <div class="cell_plate">
                                        <div class="ttl_bar">
                                            <b>Age</b>
                                        </div>
                                        <div class="inp_bar">
                                            <input type="text" class="form-control" value=" {{ $ageSpouse }}"  readonly> readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="cellp_35">
                                    <div class="cell_plate">
                                        <div class="ttl_bar">
                                            <b>Occupation</b>
                                        </div>
                                        <div class="inp_bar">
                                            <input type="text" class="form-control" value="{{ $fp->spouse->res_occupation ?? '' }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rowFifth">
                            <div class="cellp_35">
                                <div class="cell_plate nb_right">
                                    <div class="ttl_bar">
                                        <b>NO OF LIVING CHILDREN:</b>
                                    </div>
                                    <div class="inp_bar">
                                        <input type="text" class="form-control" value="{{ $fp->fp_NoLivChild ?? '' }}" readonly>
                                    </div>
                                </div>
                            </div>
            
                            <div class="cellp_35">
                                <div class="cell_plate">
                                    <div class="ttl_bar">
                                        <b>PLAN TO HAVE MORE CHILDREN?</b>
                                    </div>
                                    <div class="inp_bar justify" style="gap:20px;">
                                        <span style="display: flex; justify-content:center; align-items:center"><input type="radio" {{ $fp->fp_planMoreChild == 'Yes' ? 'checked' : '' }} disabled><b>YES</b></span>
                                        <span style="display: flex; justify-content:center; align-items:center"><input type="radio" {{ $fp->fp_planMoreChild == 'No' ? 'checked' : '' }} disabled><b>NO</b></span>
                                    </div>
                                </div>
                            </div>
            
                            <div class="cellp_30">
                                <div class="cell_plate">
                                    <div class="ttl_bar">
                                        <b>AVERAGE MONTHLY INCOME:</b>
                                    </div>
                                    <div class="inp_bar">
                                        <input type="text" class="form-control" value="{{ $fp->fp_monthlyIncome ?? '' }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rowSixth">
                            {{-- CLIENT --}}
                            <div class="cellp_40">
                                <b>Type of Client</b>
                                <div class="flexer_c">
                                    <span class=""><input type="radio" name="test2" value="" class="radio"  {{ $fp->fp_clientType == 'New Acceptor' ? 'checked' : '' }} disabled> <b>New Acceptor</b></span>
                                    <span class=""><input type="radio" name="test2" value="" class="radio" {{ $fp->fp_clientType == 'Current User' ? 'checked' : '' }} disabled> <b>Current User</b></span>
                                </div>
                                <b>IF Current User</b>
                                <div class="flexer_c">
                                    <span class=""><input type="radio" name="test5" value="" class="radio" {{ $fp->fp_ifCurrent == 'Changing Method' ? 'checked' : '' }} disabled> <b>Changing Method</b></span>
                                    <span class=""><input type="radio" name="test5" value="" class="radio" {{ $fp->fp_ifCurrent == 'Changing Clinic' ? 'checked' : '' }} disabled> <b>Changing Clinic</b></span>
                                    <span class=""><input type="radio" name="test5" value="" class="radio" {{ $fp->fp_ifCurrent == 'Dropout/Restart' ? 'checked' : '' }} disabled> <b>Dropout/Restart</b></span>
                                </div>
                            </div>

                            {{-- REASON --}}
                            <div class="cellp_60">
                                <b>Reason for FP:</b>
                                <span class="justify_m">
                                    <input type="radio" name="test3" value="" class="radio" {{ $fp->fp_reasonForFp == 'Spacing' ? 'checked' : '' }} disabled>
                                    <b>spacing</b>
                                    <input type="radio" name="test3" value="" class="radio" {{ $fp->fp_reasonForFp == 'Limiting' ? 'checked' : '' }} disabled>
                                    <b>limiting</b>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <b>Others:</b>
                                    <input type="text" class="b_bottom width_fix" value="{{ $fp->fp_reasonOthers ?? '' }}" readonly>
                                </span>
                                <b>Reason:</b>
                                <div class="flexer_c">
                                    <span class="justify_m">
                                        <input type="radio" name="test4" value="" class="radio" {{ $fp->fp_reasonFp == 'Medical Condition' ? 'checked' : '' }} disabled>
                                        <b>medical condition</b>
                                        <input type="radio" name="test4" value="" class="radio" {{ $fp->fp_reasonFp == 'Side Effects' ? 'checked' : '' }} disabled>
                                        <b>side-effects:</b> <input type="text" class="b_bottom width_fix" value="{{ $fp->fp_sideEffects ?? '' }}" readonly>
                                    </span>
                                </div>
                            </div>

                            {{-- METHOD --}}
                            <div class="cellp_100 flexer">
                                <div class="cellp_100">
                                    <b>Method currently used</b>
                                    <div class="flexer">
                                        <div class="flexer_c pad_left">
                                            <span class=""><input type="checkbox" name="" value="" class="" {{ in_array('COC', $checkboxTest ?? []) ? 'checked' : '' }} disabled> <b>COC</b></span>
                                            <span class=""><input type="checkbox" name="" value="" class="" {{ in_array('POP', $checkboxTest ?? []) ? 'checked' : '' }} disabled> <b>POP</b></span>
                                            <span class=""><input type="checkbox" name="" value="" class="" {{ in_array('Injectable', $checkboxTest ?? []) ? 'checked' : '' }} disabled> <b>Injectable</b></span>
                                            <span class=""><input type="checkbox" name="" value="" class="" {{ in_array('Implant', $checkboxTest ?? []) ? 'checked' : '' }} disabled> <b>Implant</b></span>
                                        </div>
                                        <div class="flexer_c pad_left">
                                            <span class=""><input type="checkbox" name="" value="" class="" {{ in_array('IUD', $checkboxTest ?? []) ? 'checked' : '' }} disabled> <b>IUD</b></span>
                                            <span class="pad_left"><input type="checkbox" name="" value="" class="" {{ in_array('Interval', $checkboxTestIud ?? []) ? 'checked' : '' }} disabled> <b>Interval</b></span>
                                            <span class="pad_left"><input type="checkbox" name="" value="" class="" {{ in_array('Post-Partum', $checkboxTestIud ?? []) ? 'checked' : '' }} disabled> <b>Post-Partum</b></span>
                                            <span class=""><input type="checkbox" name="" value="" class="" {{ in_array('Condom', $checkboxTest ?? []) ? 'checked' : '' }} disabled> <b>Condom</b></span>
                                        </div>
                                        <div class="flexer_c pad_left">
                                            <span class=""><input type="checkbox" name="" value="" class="" {{ in_array('BOM/CMM', $checkboxTest ?? []) ? 'checked' : '' }} disabled> <b>BOM/CMM</b></span>
                                            <span class=""><input type="checkbox" name="" value="" class="" {{ in_array('BBT', $checkboxTest ?? []) ? 'checked' : '' }} disabled> <b>BBT</b></span>
                                            <span class=""><input type="checkbox" name="" value="" class="" {{ in_array('STM', $checkboxTest ?? []) ? 'checked' : '' }} disabled> <b>STM</b></span>
                                            <span class=""><input type="checkbox" name="" value="" class="" {{ in_array('SDM', $checkboxTest ?? []) ? 'checked' : '' }} disabled> <b>SDM</b></span>
                                        </div>
                                        <div class="flexer_c pad_left">
                                            <span class=""><input type="checkbox" name="" value="" class="" {{ in_array('LAM', $checkboxTest ?? []) ? 'checked' : '' }} disabled> <b>LAM</b></span>
                                            <span><b>Others:</b></span>
                                            <span class=""><b>specify:</b> <input type="text" class="b_bottom width_fix" value="{{ $fp->fp_otherMethod ?? '' }}" readonly></span> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rowSeventh flexer">
                            <div class="cellp_50">
                                <div class="cell_plate nb_right">
                                    <div class="ttl_bar">
                                        <span><b>I. MEDICAL HISTORY</b></span>
                                    </div>
                                    <div class="inp_bar flexer_c pad_tb pad_top10" style="height: 320px!important">
                                        <div class="cellp_100 flexer pad_top">
                                            &nbsp;&nbsp;&nbsp;Does the client have any of the following?
                                        </div>
                                        <div class="cellp_100 flexer pad_top">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sever headaches / migraine
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test9" value="" class="radio" {{ $fp->fp_mhMigraine == 'Yes' ? 'checked' : '' }} disabled><b>Yes</b>
                                                    <input type="radio" name="test9" value="" class="radio" {{ $fp->fp_mhMigraine == 'No' ? 'checked' : '' }} disabled><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;history of stroke / heart attack / hypertension
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test10" value="" class="radio" {{ $fp->fp_mhStroke == 'Yes' ? 'checked' : '' }} disabled><b>Yes</b>
                                                    <input type="radio" name="test10" value="" class="radio" {{ $fp->fp_mhStroke == 'No' ? 'checked' : '' }} disabled><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;non-traumatic hematoma / frequent bruisng or gum bleeding
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test11" value="" class="radio" {{ $fp->fp_mhHematoma == 'Yes' ? 'checked' : '' }} disabled><b>Yes</b>
                                                    <input type="radio" name="test11" value="" class="radio" {{ $fp->fp_mhHematoma == 'No' ? 'checked' : '' }} disabled><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;current or history of breast cancer / breast mass
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test12" value="" class="radio" {{ $fp->fp_mhBreast == 'Yes' ? 'checked' : '' }} disabled><b>Yes</b>
                                                    <input type="radio" name="test12" value="" class="radio" {{ $fp->fp_mhBreast == 'No' ? 'checked' : '' }} disabled><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;severe chest pain
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test13" value="" class="radio" {{ $fp->fp_mhChestPain == 'Yes' ? 'checked' : '' }} disabled><b>Yes</b>
                                                    <input type="radio" name="test13" value="" class="radio" {{ $fp->fp_mhChestPain == 'No' ? 'checked' : '' }} disabled><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cough for more than 14 days
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test14" value="" class="radio" {{ $fp->fp_mhCough == 'Yes' ? 'checked' : '' }} disabled><b>Yes</b>
                                                    <input type="radio" name="test14" value="" class="radio" {{ $fp->fp_mhCough == 'No' ? 'checked' : '' }} disabled><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;jaundice
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test15" value="" class="radio" {{ $fp->fp_mhJaundice == 'Yes' ? 'checked' : '' }} disabled><b>Yes</b>
                                                    <input type="radio" name="test15" value="" class="radio" {{ $fp->fp_mhJaundice == 'No' ? 'checked' : '' }} disabled><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;unexplained vaginal bleeding
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test16" value="" class="radio" {{ $fp->fp_mhBleeding == 'Yes' ? 'checked' : '' }} disabled><b>Yes</b>
                                                    <input type="radio" name="test16" value="" class="radio" {{ $fp->fp_mhBleeding == 'No' ? 'checked' : '' }} disabled><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;abnormal vaginal discharge
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test17" value="" class="radio" {{ $fp->fp_mhDischarge == 'Yes' ? 'checked' : '' }} disabled><b>Yes</b>
                                                    <input type="radio" name="test17" value="" class="radio" {{ $fp->fp_mhDischarge == 'No' ? 'checked' : '' }} disabled><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;intake of phenobarbital (anti-seizure) or rifampicin (anti-TB)
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test18" value="" class="radio" {{ $fp->fp_mhPhenobarbital == 'Yes' ? 'checked' : '' }} disabled><b>Yes</b>
                                                    <input type="radio" name="test18" value="" class="radio" {{ $fp->fp_mhPhenobarbital == 'No' ? 'checked' : '' }} disabled><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Is the client a SMOKER?
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test19" value="" class="radio" {{ $fp->fp_mhSmoker == 'Yes' ? 'checked' : '' }} disabled><b>Yes</b>
                                                    <input type="radio" name="test19" value="" class="radio" {{ $fp->fp_mhSmoker == 'No' ? 'checked' : '' }} disabled><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;With Disability?
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test20" value="" class="radio" {{ $fp->fp_mhDisablity == 'Yes' ? 'checked' : '' }} disabled><b>Yes</b>
                                                    <input type="radio" name="test20" value="" class="radio" {{ $fp->fp_mhDisablity == 'No' ? 'checked' : '' }} disabled><b>No</b> 
                                                </div>
                                            </div> 
                                        </div>
                                        <span class="pad_left_hep"><b>if YES please specify:</b> <input type="text" class="b_bottom width_fix" value="{{ $fp->fp_mhSpecific ?? '' }}" readonly></span>
                                    </div>
                                </div>
            
                                <div class="cell_plate nb_right">
                                    <div class="ttl_bar">
                                        <span><b>II. OBSTETRICAL HISTORY</b></span>
                                    </div>
                                    <div class="inp_bar flexer_c custom_height1 pad_left pad_tb pad_top10">
                                    <div class="flexer">
                                            <span class="justify_m" style="width: 100%;">Number of pregnancies: G<input type="text" class="b_bottom width_fix_s" value="{{ $fp->fp_ohNpG ?? '' }}" readonly> P<input type="text" class="b_bottom width_fix_s" value="{{ $fp->fp_ohNpP ?? '' }}" readonly></span>
                                        </div>
                                        <div class="flexer">
                                            <span class="justify_m"><input type="text" value="{{ $fp->fp_ohNpFt ?? '' }}" readonly class="b_bottom width_fix_s">&nbsp;Full term &nbsp;&nbsp;&nbsp;<input type="text" value="{{ $fp->fp_ohNpPre ?? '' }}" readonly class="b_bottom width_fix_s"> &nbsp;Premature</span>
                                        </div>
                                        <div class="flexer">
                                            <span class="justify_m"><input type="text" value="{{ $fp->fp_ohNpAbort ?? '' }}" readonly class="b_bottom width_fix_s">&nbsp;Abortion &nbsp;&nbsp;&nbsp;<input type="text" value="{{ $fp->fp_ohNpLc ?? '' }}" readonly class="b_bottom width_fix_s"> &nbsp;Living children</span>
                                        </div>
                                        <div class="flexer">
                                            <span class="justify_m"><span class="width_fix_ml">Date of last delivery</span><input type="date" value="{{ $fp->fp_ohDateLastDel ?? '' }}" readonly class="b_bottom width_fix_m"></span>
                                        </div>
                                        <div class="flexer">
                                            <span class="justify_m"><span class="width_fix_ml">Type of last delivery</span><input type="radio" name="test21" {{ $fp->fp_ohTypeDel == 'Vaginal' ? 'checked' : '' }} disabled class="radio">Vaginal<input type="radio" name="test21" {{ $fp->fp_ohTypeDel == 'Cesarean Section' ? 'checked' : '' }} disabled class="radio">Cesarean Section</span>
                                        </div>
                                        <div class="flexer">
                                            <span class="justify_m"><span class="width_fix_ml">Last menstrual period</span><input type="date" value="{{ $fp->fp_ohLastPeriod ?? '' }}" disabled  class="b_bottom width_fix_m"></span>
                                        </div>
                                        <div class="flexer">
                                            <span class="justify_m"><span class="width_fix_l">Previous menstrual period</span><input type="date" value="{{ $fp->fp_ohPrevPeriod ?? '' }}" disabled class="b_bottom width_fix_m"></span>
                                        </div>
                                        <div class="flexer_c">
                                            Menstrual flow:
                                            <div class="flexer_c pad_left_strong">
                                                <span class="justify_m"><input type="checkbox" {{ in_array('Scanty (1 - 2 Pads Per Day)', $checkboxFlow ?? []) ? 'checked' : '' }} disabled name="" value="" class="radio"> scanty (1-2 pads per day)</span>
                                                <span class="justify_m"><input type="checkbox" {{ in_array('Moderate (3 - 5 Pads Per Day)', $checkboxFlow ?? []) ? 'checked' : '' }} disabled name="" value="" class="radio"> moderate (3-5 pads per day)</span>
                                                <span class="justify_m"><input type="checkbox" {{ in_array('Heavy (> 5 Pads Per Day)', $checkboxFlow ?? []) ? 'checked' : '' }} disabled name="" value="" class="radio"> heavy (>5 pads per day)</span>
                                            </div>
                                        </div>
                                        <div class="flexer_c">
                                            <span class="justify_m"><input type="radio" name="test23" value="" class="" {{ $fp->fp_ohDysmenorrhea == 'Yes' ? 'checked' : '' }} disabled> Dysmenorrhea</span>
                                            <span class="justify_m"><input type="radio" name="test24" value="" class="" {{ $fp->fp_ohMole == 'Yes' ? 'checked' : '' }} disabled> Hydatidiform mole</span>
                                            <span class="justify_m"><input type="radio" name="test25" value="" class="" {{ $fp->fp_ohEctopic == 'Yes' ? 'checked' : '' }} disabled> History of ectopic pregnancy(>5 pads per day)</span>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="cell_plate custom_heights1 nb_right">
                                    <div class="ttl_bar">
                                        <span><b>III. RISK FOR SEXUALLY TRANSMITTED INFECTIONS</b></span>
                                    </div>
                                    <div class="inp_bar flexer_c custom_height2 pad_tb pad_top10">
                                        <div class="cellp_100 flexer pad_top">
                                            &nbsp;&nbsp;&nbsp;Does the client or the clients partner have any of the following?
                                        </div>
                                        <div class="cellp_100 flexer pad_top">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;abnormal discharge from the genital area <br>
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" {{ $fp->fp_riskDischarge == 'Yes' ? 'checked' : '' }} disabled name="test26" value="" class="radio"><b>Yes</b>
                                                    <input type="radio" {{ $fp->fp_riskDischarge == 'No' ? 'checked' : '' }} disabled name="test26" value="" class="radio"><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer pad_top pad_left_max">
                                            <span class="justify_m"><span class="width_fix_xl">if "YES" please indicate if from: </span><input type="radio" disabled {{ $fp->fp_riskGenital == 'Vagina' ? 'checked' : '' }} name="test31" value="" class="radio">Vagina&nbsp;&nbsp;<input type="radio" disabled {{ $fp->fp_riskGenital == 'Penis' ? 'checked' : '' }} name="test31" value="" class="radio">Penis</span>
                                        </div>
                                        <div class="cellp_100 flexer pad_top">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sores or ulcers in the genital area <br>
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test27" {{ $fp->fp_riskUlcer == 'Yes' ? 'checked' : '' }} disabled class="radio"><b>Yes</b>
                                                    <input type="radio" name="test27" {{ $fp->fp_riskUlcer == 'No' ? 'checked' : '' }} disabled class="radio"><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer pad_top">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pain or burning sensation in the genital area <br>
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test28" {{ $fp->fp_riskBurning == 'Yes' ? 'checked' : '' }} disabled class="radio"><b>Yes</b>
                                                    <input type="radio" name="test28" {{ $fp->fp_riskBurning == 'No' ? 'checked' : '' }} disabled class="radio"><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer pad_top">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;history of treatment for sexually transmitted infections <br>
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test29" {{ $fp->fp_riskHistory == 'Yes' ? 'checked' : '' }} disabled class="radio"><b>Yes</b>
                                                    <input type="radio" name="test29" {{ $fp->fp_riskHistory == 'No' ? 'checked' : '' }} disabled class="radio"><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer pad_top">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HIV / AIDS / Pelvic Inflammtory disease <br>
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test30" {{ $fp->fp_riskHiv == 'Yes' ? 'checked' : '' }} disabled class="radio"><b>Yes</b>
                                                    <input type="radio" name="test30" {{ $fp->fp_riskHiv == 'No' ? 'checked' : '' }} disabled class="radio"><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="cell_plate nb_right">  
                                    <div class="cellp_100 pad_tb">
                                        <div class=>
                                            <span class="pline">
                                                <p style="text-align: center;">
                                                    <i>
                                                        Implant = Progestin subdermal implant; IUD = Intrauterine device; <br>
                                                        BTL = Bilateral tubal ligation; NSV = No-scalpel vasectomy; COC = Combined oral <br>
                                                        contraceptives; POP = Progestin only pills; LAM = Lactational amenorrhea method; <br>
                                                        SDM = Standard days method; BBT = Basal dody temperature; BOM = Billings ovulation <br>
                                                        method; CMM = Cervical mucus method; STM = Symptothermal method
                                                    </i>
                                                </p>
                                                
                                            </span>
                                        </div>
                                    </div>
                                </div>
            
                            </div>
                            <div class="cellp_50">
                                <div class="cell_plate">
                                    <div class="ttl_bar">
                                        <span><b>IV. RISK FOR VIOLENCE AGAINST WOMEN (VAW)</b></span>
                                    </div>
                                    <div class="inp_bar flexer_c custom_height3">
                                        <div class="cellp_100 flexer pad_top">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;unpleasant relationship with partner
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test32" {{ $fp->fp_vawPartner == 'Yes' ? 'checked' : '' }} disabled class="radio"><b>Yes</b>
                                                    <input type="radio" name="test32" {{ $fp->fp_vawPartner == 'No' ? 'checked' : '' }} disabled class="radio"><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer pad_top">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;partner does not approve of the visit to FP clinic 
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test33" {{ $fp->fp_vawApprove == 'Yes' ? 'checked' : '' }} disabled class="radio"><b>Yes</b>
                                                    <input type="radio" name="test33" {{ $fp->fp_vawApprove == 'No' ? 'checked' : '' }} disabled class="radio"><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer pad_top">
                                            <div class="cellp_80 pad_left">
                                                •&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;history of domestic violence or VAW
                                            </div>
                                            <div class="cellp_20">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" name="test34" {{ $fp->fp_vawHistory == 'Yes' ? 'checked' : '' }} disabled class="radio"><b>Yes</b>
                                                    <input type="radio" name="test34" {{ $fp->fp_vawHistory == 'No' ? 'checked' : '' }} disabled class="radio"><b>No</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer pad_top">
                                            <div class="cellp_20 pad_left_hep ">
                                                Referred to:&nbsp;
                                            </div>
                                            <div class="cellp_80">
                                                <div class="flexer_c pad_left">
                                                    <span class="justify_m"><input type="checkbox" name="test35" {{ in_array('DSWD', $checkboxRef ?? []) ? 'checked' : '' }} disabled> DSWD</span>
                                                    <span class="justify_m"><input type="checkbox" name="test35" {{ in_array('WCPU', $checkboxRef ?? []) ? 'checked' : '' }} disabled> WCPU</span>
                                                    <span class="justify_m"><input type="checkbox" name="test35" {{ in_array('NGOs', $checkboxRef ?? []) ? 'checked' : '' }} disabled> NGOs</span>
                                                    <span class="justify_m"><input type="checkbox" name="test35" {{ in_array('None', $checkboxRef ?? []) ? 'checked' : '' }} disabled> Others:&nbsp;&nbsp;Specify:&nbsp;&nbsp;<input type="text" class="b_bottom width_fix_ml" value="{{ $fp->fp_vawRefferedtoSpecific ?? '' }}" readonly></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell_plate">
                                    <div class="ttl_bar">
                                        <span><b>V. PHYSICAL EXAMINATION</b></span>
                                    </div>
                                    <div class="inp_bar flexer custom_height4">
                                        <div class="cellp_50 pad_left">
                                            <div class="flexer_c">
                                                <span class="justify_m">Weight:&nbsp;&nbsp;<input type="text" value="{{ $fp->fp_peWt ?? '' }}" readonly class="b_bottom width_fix_s">&nbsp;kg</span>
                                                <span class="justify_m">Height:&nbsp;&nbsp;<input type="text" value="{{ $fp->fp_peHt ?? '' }}" readonly class="b_bottom width_fix_s">&nbsp;m</span>
                                                <b>SKIN</b>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Normal', $checkboxSkin ?? []) ? 'checked' : '' }} disabled> normal</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Pale', $checkboxSkin ?? []) ? 'checked' : '' }} disabled> pale</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Yellowish', $checkboxSkin ?? []) ? 'checked' : '' }} disabled> yellowish</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Hematoma', $checkboxSkin ?? []) ? 'checked' : '' }} disabled> hematoma</span>
            
                                                <b>CONJUNCTIVA:</b>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Normal', $checkboxConj ?? []) ? 'checked' : '' }} disabled> normal</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Pale', $checkboxConj ?? []) ? 'checked' : '' }} disabled> pale</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Yellowish', $checkboxConj ?? []) ? 'checked' : '' }} disabled> yellowish</span>
            
                                                <b>NECK:</b>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Normal', $checkboxNeck ?? []) ? 'checked' : '' }} disabled> normal</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Neck Mass', $checkboxNeck ?? []) ? 'checked' : '' }} disabled> neck mass</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Enlarge Lymph Nodes', $checkboxNeck ?? []) ? 'checked' : '' }} disabled> enlarged lymph nodes</span>
            
                                                <b>BREAST: </b>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Normal', $checkboxBreast ?? []) ? 'checked' : '' }} disabled> normal</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Mass', $checkboxBreast ?? []) ? 'checked' : '' }} disabled> mass</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Nipple Discharge', $checkboxBreast ?? []) ? 'checked' : '' }} disabled> nipple discharge</span>
                                                
                                                <b>ABDOMEN:</b>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Normal', $checkboxAbdo ?? []) ? 'checked' : '' }} disabled> normal</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Abdominal Mass', $checkboxAbdo ?? []) ? 'checked' : '' }} disabled> abdominal mass</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Varicosities', $checkboxAbdo ?? []) ? 'checked' : '' }} disabled> varicosities</span>
                                            </div>
                                        </div>
                                        <div class="cellp_50 pad_left">
                                            <div class="flexer_c">
                                                <span class="justify_m">Blood pressure:&nbsp;&nbsp;<input type="text" value="{{ $fp->fp_peBp ?? '' }}" readonly class="b_bottom width_fix_s">&nbsp;mmHg</span>
                                                <span class="justify_m">Pulse rate:&nbsp;&nbsp;<input type="text" value="{{ $fp->fp_pePr ?? '' }}" readonly  class="b_bottom width_fix_s">&nbsp;/min</span>
                                                <b>EXTREMITIES</b>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Normal', $checkboxExtr ?? []) ? 'checked' : '' }} disabled> normal</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Edema', $checkboxExtr ?? []) ? 'checked' : '' }} disabled> edema</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Varicosities', $checkboxExtr ?? []) ? 'checked' : '' }} disabled> varicosities</span>
                                                <b>PELVIC EXAMINATION</b>
                                                <i>(For IUD Acceptors)</i>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Normal', $checkboxIud ?? []) ? 'checked' : '' }} disabled> normal</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Mass', $checkboxIud ?? []) ? 'checked' : '' }} disabled> mass</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Abnormal Discharge', $checkboxIud ?? []) ? 'checked' : '' }} disabled> abnormal discharge</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Cervical Abnormalities', $checkboxIud ?? []) ? 'checked' : '' }} disabled> cervical abnormalities</span>
                                                        
                                                        <span class="justify_m pad_left_strong"><input type="checkbox" {{ in_array('Warts', $checkboxCab ?? []) ? 'checked' : '' }} disabled> warts</span>
                                                        <span class="justify_m pad_left_strong"><input type="checkbox" {{ in_array('Polyp or Cyst', $checkboxCab ?? []) ? 'checked' : '' }} disabled> polyp or cyst</span>
                                                        <span class="justify_m pad_left_strong"><input type="checkbox" {{ in_array('Inflammation or Erosion', $checkboxCab ?? []) ? 'checked' : '' }} disabled> inflammation or erosion</span>
                                                        <span class="justify_m pad_left_strong"><input type="checkbox" {{ in_array('Bloody Discharge', $checkboxCab ?? []) ? 'checked' : '' }} disabled> bloody discharge</span>
                                                    
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Cervical Consistency', $checkboxIud ?? []) ? 'checked' : '' }} disabled> cervical consistency</span>
                                                        
                                                        <span class="justify_m pad_left_hep"><input type="checkbox" {{ in_array('Firm', $checkboxCc ?? []) ? 'checked' : '' }} disabled>firm<input type="checkbox" {{ in_array('Soft', $checkboxCc ?? []) ? 'checked' : '' }} disabled class="radio">soft</span>
                                                    
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Cervical Tenderness', $checkboxIud ?? []) ? 'checked' : '' }} disabled> cervical tenderness</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Adnexal Mass / Tenderness', $checkboxIud ?? []) ? 'checked' : '' }} disabled> adnexal mass / tenderness</span>
                                                    <span class="justify_m"><input type="checkbox" {{ in_array('Uterine Position', $checkboxIud ?? []) ? 'checked' : '' }} disabled> uterine position:</span>
                                                        
                                                        <span class="justify_m pad_left_strong"><input type="checkbox" {{ in_array('Mid', $checkboxUp ?? []) ? 'checked' : '' }} disabled> mid</span>
                                                        <span class="justify_m pad_left_strong"><input type="checkbox" {{ in_array('Anteflexed', $checkboxUp ?? []) ? 'checked' : '' }} disabled> anteflexed</span>
                                                        <span class="justify_m pad_left_strong"><input type="checkbox" {{ in_array('Retroflexed', $checkboxUp ?? []) ? 'checked' : '' }} disabled> retroflexed</span>
                                                <span class="justify_m">uterine depth:&nbsp;&nbsp;<input type="text" value="{{ $fp->fp_pelUd ?? '' }}" readonly class="b_bottom width_fix_s">&nbsp;cm</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell_plate custom_height5">  
                                    <div class="cellp_100 pad_tb pad_top10">
                                        <div class="pad_left_hep d-flex" style="flex-direction: column;">
                                            <b style="width:100%;">ACKNOWLEDGEMENT:</b><br>
                                            <span class="pline" style="width:100%;">
                                                This is to certify that the Physician/Nurse/Midwife of the clinic has fully 
                                                explained to me the different methods available in family planning and I
                                                freely choose the&nbsp;<input type="text" class="b_bottom width_fix_l">&nbsp;method.
                                            </span>
                                        </div>
                                        <div class="cellp_100 flexer">
                                            <div class="cellp_50 pad_tb centerfix">
                                                <input type="text" class="b_bottom width_fix_l">
                                                Client Signature
                                            </div>
                                            <div class="cellp_50 pad_tb centerfix">
                                                <input type="date" class="b_bottom width_fix_l" id="date1" readonly>
                                                Date
                                            </div>
                                        </div>
                                        <div class="pad_left_hep">
                                            For WRA below 18 yrs. Old:<br>
                                            <span class="pline">
                                                I hereby consent&nbsp;<input type="text" class="b_bottom width_fix_l">&nbsp;to accept the Family Planning <br>
                                                method.
                                            </span>
                                        </div>
                                        <div class="cellp_100 flexer">
                                            <div class="cellp_50 pad_tb centerfix">
                                                <input type="text" class="b_bottom width_fix_l">
                                                Parent/Guardian Signature
                                            </div>
                                            <div class="cellp_50 pad_tb centerfix">
                                                <input type="date" class="b_bottom width_fix_l" id="date2" readonly>
                                                Date
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                
                {{-- FORM 2 --}}
                <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="headerArea">
                        <b>SIDE B</b>
                        <b>FP FORM 1</b>
                    </div>
                    <div class="form_plate">
                        <table class="table-bordered" style="border: solid;">
                            <thead>
                                <th colspan="6" style="text-align: center;"><b style="font-size: 16px!important;">FAMILY PLANNING CLIENT ASSESSMENT RECORD</b></th>
                                <tr>
                                    <th style="display: none;" scope="col">ID</th>
                                    <th scope="col" style="text-align: center">DATE OF VISIT <div style="font-size: smaller; color: gray;">(MM/DD/YYYY)</div></th>
                                    <th scope="col" style="text-align: center">MEDICAL FINDINGS <div style="font-size: smaller; color: gray;">(Medical observation, complaints/complication, service rendered/procedures,<br>laboratory examination, treatment and referrals)</div></th>
                                    <th scope="col" style="text-align: center">METHOD ACCEPTED</th>
                                    <th scope="col" style="text-align: center">NAME AND SIGNATURE OF SERVICE PROVIDER</th>
                                    <th scope="col" style="text-align: center">DATE OF FOLLOW-UP VISIT <div style="font-size: smaller; color: gray;">(MM/DD/YYYY)</div></th>
                                    <th scope="col" style="text-align: center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fpSideB as $index => $fps)
                                <tr>
                                    <td style="display: none;">{{$fps->sideB_id}}</td>
                                    <td>{{ $fps->sideB_dateVisit }}</td>
                                    <td>{{ $fps->sideB_MedFinds }}</td>
                                    <td>{{ $fps->sideB_metAcc }}</td>
                                    <td>{{ $fps->employee->em_lname }}, {{ $fps->employee->em_fname }}</td>
                                    <td>{{ $fps->sideB_followUpVisit }}</td>
                                    <td>
                                        <button class="btn btn-primary editButton" type="button" >Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>



                        <div class="modal fade" id="editFpModal" tabindex="-1">
                            <div class="modal-dialog custom-modal-width">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Family Planning Form</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="sideBInputForm" id="sideBInputForm" autocomplete="off">
                                        @csrf
                                            <div class="modal-body">
                                                    <input type="hidden" class="form-control" id="edit_fpSideB_id" name="edit_fpSideB_id">
                                                <div class="column mb-3">
                                                    <label for="fpDateVisit" class="col-sm-10 col-form-label">Date of Visit</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" id="edit_fpDateVisit" name="edit_fpDateVisit">
                                                        <span class="text-danger error-text edit_fpDateVisit_error"></span>
                                                    </div>
                                                </div>
                        
                                                <div class="column mb-3">
                                                    <label for="fpMedFind" class="col-sm-10 col-form-label">Medical Findings</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="edit_fpMedFind" name="edit_fpMedFind">
                                                        <span class="text-danger error-text edit_fpMedFind_error"></span>
                                                    </div>
                                                </div>
                        
                                                <div class="column mb-3">
                                                    <label for="fpMetAcc" class="col-sm-10 col-form-label">Method Accepted</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="edit_fpMetAcc" name="edit_fpMetAcc">
                                                        <span class="text-danger error-text edit_fpMetAcc_error"></span>
                                                    </div>
                                                </div>
                        
                                                <div class="column mb-3">
                                                    <label for="fpDateFfVisit" class="col-sm-10 col-form-label">Date of Follow-up Visit</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" id="edit_fpDateFfVisit" name="edit_fpDateFfVisit">
                                                        <span class="text-danger error-text edit_fpDateFfVisit_error"></span>
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
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="rowFirst">
                            <div class="cellp_100">
                                <div class="cell_plate">
                                    <div class="flexer_c custom_height9 pad_tb pad_top10">
                                        <div class="cellp_100 flexer pad_top">
                                            &nbsp;&nbsp;&nbsp;<b>How to be Reasonably sure a Client is Not Pregnant</b>
                                        </div>
                                        <div class="cellp_100 flexer pad_top d-flex" style="justify-content:space-between; align-items:center;">
                                            <div class="cellp_75 pad_left">
                                                1.&nbsp;&nbsp;Did you have a baby less than six (6) months ago, are you fully or <br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;nearly-fully breastfeeding, and have you had no menstrual period since then?
                                            </div>
                                            <div class="cellp_25">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" {{ $fp->fp_q1 == 'Yes' ? 'checked' : '' }} disabled class="radio"><b>Yes</b>
                                                    <input type="radio" {{ $fp->fp_q1 == 'No' ? 'checked' : '' }} disabled class="radio"><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer" style="justify-content:space-between; align-items:center;">
                                            <div class="cellp_75 pad_left">
                                                2.&nbsp;&nbsp;Have you abstained from sexual intercourse since your last menstrual period of delivery? <br><br>
                                            </div>
                                            <div class="cellp_25">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" {{ $fp->fp_q2 == 'Yes' ? 'checked' : '' }} disabled class="radio"><b>Yes</b>
                                                    <input type="radio"{{ $fp->fp_q2 == 'No' ? 'checked' : '' }} disabled class="radio"><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer" style="justify-content:space-between; align-items:center;">
                                            <div class="cellp_75 pad_left">
                                                3.&nbsp;&nbsp;Have you had a baby in the last four (4) weeks? <br><br>
                                            </div>
                                            <div class="cellp_25"> 
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" {{ $fp->fp_q3 == 'Yes' ? 'checked' : '' }} disabled class="radio"><b>Yes</b>
                                                    <input type="radio" {{ $fp->fp_q3 == 'No' ? 'checked' : '' }} disabled class="radio"><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer" style="justify-content:space-between; align-items:center;">
                                            <div class="cellp_75 pad_left">
                                                4.&nbsp;&nbsp;Did your last menstrual period start within the past seven (7) days?<br><br>
                                            </div>
                                            <div class="cellp_25">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" {{ $fp->fp_q4 == 'Yes' ? 'checked' : '' }} disabled class="radio"><b>Yes</b>
                                                    <input type="radio"{{ $fp->fp_q4 == 'No' ? 'checked' : '' }} disabled class="radio"><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer" style="justify-content:space-between; align-items:center;">
                                            <div class="cellp_75 pad_left">
                                                5.&nbsp;&nbsp;Have you had a miscarriage or abortion in the last seven (7) days?<br><br>
                                            </div>
                                            <div class="cellp_25">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" {{ $fp->fp_q5 == 'Yes' ? 'checked' : '' }} disabled class="radio"><b>Yes</b>
                                                    <input type="radio"{{ $fp->fp_q5 == 'No' ? 'checked' : '' }} disabled class="radio"><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 flexer" style="justify-content:space-between; align-items:center;">
                                            <div class="cellp_75 pad_left">
                                                6.&nbsp;&nbsp;Have you been using a reliable contraceptive method consistently and correctly?<br><br>
                                            </div>
                                            <div class="cellp_25">
                                                <div class="inp_bar justify s_radio">
                                                    <input type="radio" {{ $fp->fp_q6 == 'Yes' ? 'checked' : '' }} disabled class="radio"><b>Yes</b>
                                                    <input type="radio" {{ $fp->fp_q6 == 'No' ? 'checked' : '' }} disabled class="radio"><b>No</b> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cellp_100 pad_left pline">
                                            •&nbsp;&nbsp;&nbsp;&nbsp;If the client answered <b>YES</b> to at least one of the questions and she is free of signs symptoms of pregnancy, provide client with desired method. <br>
                                            •&nbsp;&nbsp;&nbsp;&nbsp;If the client answered <b>NO</b> to all of the questions, pregnancy cannot be ruled out. The client should await menses or use pregnancy test.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Bordered Tabs -->

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
        const dobInput = document.getElementById('dob');
        const ageInput = document.getElementById('age');

        // Calculate and set age initially
        const dobValue = dobInput.value;
        if (dobValue) {
            ageInput.value = calculateAge(dobValue);
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Get today's date in Asia/Manila timezone
        const today = new Date();
        const options = { timeZone: 'Asia/Manila', year: 'numeric', month: '2-digit', day: '2-digit' };
        const formatter = new Intl.DateTimeFormat('en-US', options);
        const parts = formatter.formatToParts(today);
        const year = parts.find(part => part.type === 'year').value;
        const month = parts.find(part => part.type === 'month').value;
        const day = parts.find(part => part.type === 'day').value;
        const formattedDate = `${year}-${month}-${day}`;

        // Set the value of the date input
        document.getElementById('date1').value = formattedDate;
        document.getElementById('date2').value = formattedDate;
    });

    // Open edit sideB modal
    $(document).on('click', '.editButton:contains("Edit")', function() {
        // Get the current row data
        var row = $(this).closest('tr');
        var sideB_id = row.find('td:eq(0)').text();
        var sideB_dateVisit = row.find('td:eq(1)').text();
        var sideB_medFinds = row.find('td:eq(2)').text();
        var sideB_metAcc = row.find('td:eq(3)').text();
        var sideB_followUpVisit = row.find('td:eq(5)').text();

        // Populate the modal fields with the selected data
        $('#edit_fpSideB_id').val(sideB_id);
        $('#edit_fpDateVisit').val(sideB_dateVisit);
        $('#edit_fpMedFind').val(sideB_medFinds);
        $('#edit_fpMetAcc').val(sideB_metAcc);
        $('#edit_fpDateFfVisit').val(sideB_followUpVisit);

        // Show the modal
        $('#editFpModal').modal('show');
    });

    //update SideB
    $(document).ready(function() {
        $(document).on('submit', '#sideBInputForm', function (e) {
            e.preventDefault(); // Prevent the form from submitting the default way
            
            var sideB_id = $('#edit_fpSideB_id').val(); // Get the sideB ID

            // Create a FormData object with the form fields
            var formData = new FormData();
            formData.append('edit_fpSideB_id', sideB_id);
            formData.append('edit_fpDateVisit', $('#edit_fpDateVisit').val());
            formData.append('edit_fpMedFind', $('#edit_fpMedFind').val());
            formData.append('edit_fpMetAcc', $('#edit_fpMetAcc').val());
            formData.append('edit_fpDateFfVisit', $('#edit_fpDateFfVisit').val());

            $.ajax({
                type: "POST",
                url: "/update-sideB/"+sideB_id, // URL to handle the update
                data: formData,
                dataType: "json",
                contentType: false, // Needed for FormData
                processData: false, // Needed for FormData
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
                },
                success: function(response) {
                    if (response.status === 400) {
                        $('#alert-container').html(`
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-1"></i> Validation Error. Please check the fields.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                    } else if (response.status === 404) {
                        $('#alert-container').html(`
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-1"></i> Record Not Found.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                    } else {
                        $('#alert-container').html(`
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i> Record updated successfully!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                        $('#editFpModal').modal('hide'); // Hide the modal
                        location.reload(); // Optionally reload the page to reflect changes
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log error response for debugging
                    alert("An error occurred. Please check the console for more details.");
                }
            });
        });
    });

  </script>
  
</body>

</html>