@include('layouts.headHealthWorkers')
<style>
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
        justify-content: space-between;
        align-items: center;
        width: 100%!important;
    }

    .pagetitle *{
        font-size: 16px;
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

    .content * {
        font-size: 12px!important
    }

    .content input * {
        text-align: left;
    }

    .container input {
        text-align: left;
    }
    .container {
        letter-spacing: 1px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .row {
        display: flex;
        width: 100%;
    }
    .cell {
        flex: 1;
        padding: 10px;
        border: 1px solid black;
        text-align: center;
        overflow-wrap: break-word;
    }
    .header {
        font-weight: bold;
    }
    .large-cell {
        flex: 1.4;
    }
    .medium-cell {
        flex: 1;
    }
    .small-cell {
        flex: 0.5;
    }
    .row input[type="text"] {
        width: 100%;
        border: none;
        outline: none;
        text-align: center;
        background-color: transparent;
    }
    .row input[type="date"] {
        width: 100%;
        border: none;
        outline: none;
        text-align: center;
        background-color: transparent;
    }
    .row textarea {
        width: 100%;
        border: none;
        outline: none;
        text-align: center;
        background-color: transparent;
        overflow: hidden;
        resize: none;
    }
    .sec-2 {
        display: flex;
        width: 100%;
    }
    .cell1,
    .cell2,
    .cell3 {
        border: 1px solid black;
        display: flex;
        flex-direction: column;
    }
    .cell1 {
        width: 40%;
    }
    .cell2 {
        width: 30%;
    }
    .cell3 {
        width: 30%;
    }
    .post1 {
        display: flex;
        justify-content: center;
        padding: 15px;
        border-bottom: 1px solid black;
    }
    .post2 {
        display: flex;
        justify-content: center;
        padding: 15px;
        border-bottom: 1px solid black;
    }
    .post3 {
        display: flex;
        justify-content: center;
        padding: 17px 5px;
        border-bottom: 1px solid black;
    }
    .post3 h6 {
        font-size: 13px;
    }
    .date1 {
        height: 58px;
        display: flex;
        flex-direction: row;
        padding: 15px 5px;
        border-bottom: 1px solid black;
        justify-content: center;
    }
    .date1 input {
        width: 350px;
        border-bottom: 1px solid black;
    }
    .date2 {
        height: 58px;
        display: flex;
        flex-direction: row;
        padding: 15px 5px;
        border-bottom: 1px solid black;
        justify-content: center;
    }
    .date2 input {
        width: 180px;
        border-bottom: 1px solid black;
    }
    .date3 {
        height: 58px;
        display: flex;
        flex-direction: row;
        padding: 15px 5px;
        border-bottom: 1px solid black;
        justify-content: center;
    }
    .date3 input {
        width: 200px;
        border-bottom: 1px solid black;
    }
    .given1 {
        height: 58px;
        display: flex;
        flex-direction: row;
        padding: 15px 5px;
        border-bottom: 1px solid black;
        justify-content: center;
    }
    .given1 input {
        width: 130px;
    }
    .given2 {
        height: 58px;
        display: flex;
        flex-direction: row;
        padding: 15.5px 5px;
        border-bottom: 1px solid black;
        justify-content: center;
    }
    .given2 h6 {
        font-size: 13px;
    }
    .given2 input {
        width: 230px;
    }
    .given3 {
        height: 58px;
        display: flex;
        flex-direction: row;
        padding: 15.5px 5px;
        border-bottom: 1px solid black;
        justify-content: center;
    }
    .given3 input {
        width: 90px;
    }
    .outcome {
        height: 58px;
        display: flex;
        flex-direction: row;
        padding: 15.5px 5px;
        border-bottom: 1px solid black;
        justify-content: center;
        gap: 15px;
    }
    .outcome h6 {
        margin-top: 5px;
        font-size: 13px;
    }
    .outcome input {
        font-size: 13px;
    }
    .child-name {
        height: 150px;
        display: flex;
        flex-direction: column;
        padding: 15.5px 5px;
        border-bottom: 1px solid black;
        justify-content: center;
        gap: 70px;
    }
    .chil {
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .chil input {
        width: 100px;
    }
    .div {
        display: flex;
        flex-direction: row;
    }
    .name-child input {
        width: 240px;
    }
    .child-stat {
        font-weight: bold;
        height: 58px;
        display: flex;
        flex-direction: row;
        padding: 15.5px 5px;
        border-bottom: 1px solid black;
        justify-content: center;
        font-size: 12px;
        gap: 30px;
    }
    .child-stat h6 {
        font-size: 12px;
    }
    .child-stat input {
        width: 40px;
    }
    .child-att {
        font-weight: bold;
        height: 58px;
        display: flex;
        flex-direction: row;
        padding: 15.5px 5px;
        border-bottom: 1px solid black;
        justify-content: center;
        font-size: 12px;
        gap: 5px;
    }
    .child-att h6 {
        margin-top: 5px;
        font-size: 12px;
    }
    .fathers {
        height: 150px;
        display: flex;
        flex-direction: column;
        padding: 15.5px 5px;
        border-bottom: 1px solid black;
        justify-content: center;
        gap: 70px;
    }
    .inter1 {
        flex-direction: column;
        display: flex;
        width: 100%;
    }
    .inter1 textarea {
        padding: 5px;
        letter-spacing: 1.5px;
        display: flex;
        width: 100%;
        resize: none;
        border: none;
        outline: none;
    }
    .inter2 {
        flex-direction: column;
        display: flex;
        width: 100%;
    }
    .inter2 textarea {
        padding: 5px;
        letter-spacing: 1.5px;
        display: flex;
        width: 100%;
        resize: none;
        border-top: none;
        border-left: none;
        border-right: none;
        outline: none;
        border-bottom: 1px solid black;
    }
    html {
        padding: 0;
        margin: 0;
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
    .container input {
        padding-bottom: 2px;
    }
    .container {
        letter-spacing: 1px;
        gap: 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .row {
        display: flex;
        width: 100%;
    }
    .cell {
        flex: 1;
        padding: 10px;
        border: 1px solid black;
        text-align: center;
    }
    .header {
        font-weight: bold;
    }
    .large-cell {
        flex: 2.4;
    }
    .medium-cell {
        flex: 1.5;
    }
    .sec-4 p {
        margin-bottom: 0px;
    }
    .sec-4 input[type="text"] {
        width: 100%;
        border: none;
        outline: none;
        text-align: center;
        background-color: transparent;
    }
    .sec-4 input[type="date"] {
        width: 100%;
        border: none;
        outline: none;
        text-align: center;
        background-color: transparent;
    }
    .sec-1 {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }
    .first-info {
        display: flex;
        width: 100%;
        gap: 120px;
    }
    .info1,
    .info2,
    .info3 {
        display: flex;
        text-align: center;
    }
    .info1 input {
        width: 390px;
    }
    .info2 input {
        width: 100px;
    }
    .info3 input {
        width: 100px;
    }
    .second-info {
        margin-top: 10px;
        display: flex;
        flex-direction: row;
    }
    .info4,
    .info5,
    .info6 {
        text-align: center;
        display: flex;
        flex-direction: column;
    }
    .info5,
    .info6 {
        width: 30%;
        margin: 0;
        padding: 0;
    }
    .info4 {
        width: 29.5%;
    }
    .info5 input,
    .info6 input {
        margin-left: 0;
    }
    .pat-info2 {
        display: flex;
        width: 100%;
        flex-direction: column;
    }
    .pat-info {
        display: flex;
        width: 100%;
        flex-direction: column;
    }
    .third-info {
        margin-top: 20px;
        display: flex;
        flex-direction: row;
        gap: 157px;
    }
    .info7,
    .info8,
    .info9 {
        text-align: center;
        display: flex;
    }
    .info7 input {
        width: 200px;
    }
    .info8 input,
    .info9 input {
        width: 250px;
    }
    .fourth-info {
        margin-top: 10px;
        display: flex;
        flex-direction: row;
    }
    .info10,
    .info11,
    .info12 {
        text-align: center;
        display: flex;
        flex-direction: column;
    }
    .info11 input,
    .info12 input {
        margin-left: 0;
    }
    .info11,
    .info12 {
        width: 30%;
        margin: 0;
        padding: 0;
    }
    .info10 {
        width: 28.5%;
    }
    .pat-info3 {
        display: flex;
        width: 100%;
        flex-direction: column;
    }
    .fifth-info {
        gap: 70px;
        margin-top: 20px;
        display: flex;
        flex-direction: row;
    }
    .info13,
    .info14 {
        display: flex;
        flex-direction: row;
    }
    .info13 {
        width: 75%;
    }
    .info14 {
        width: 25%;
    }
    .info13 input {
        width: 100%;
    }
    .info14-1 {
        display: flex;
        gap: 28px;
    }
    .sixth-info {
        margin-top: 10px;
        display: flex;
        flex-direction: row;
    }
    .info17 {
        gap: 20px;
        display: flex;
        flex-direction: row;
    }
    .info16 {
        margin-right: 75px;
    }
    .info15,
    .info16 {
        display: flex;
        flex-direction: row;
    }
    .info17-1,
    .info17-2,
    .info17-3,
    .info17-4,
    .info17-5 {
        display: flex;
        flex-direction: row;
    }
    .info17-1 input,
    .info17-2 input,
    .info17-3 input,
    .info17-4 input,
    .info17-5 input {
        width: 100px;
    }
    .sec-2 {
        display: flex;
        width: 100%;
    }
    .obste {
        display: flex;
        flex-direction: column;
    }
    .obs label {
        /* background-color: red; */
        width: 240px;
        margin: 0;
    }
    .obs {
        padding-left: 5px;
        border: 1px solid black;
    }
    .obs input {
        border-left: 1px solid black;
        border-bottom: none;
        width: 100px;
    }
    .sec-2-1 {
        display: flex;
    }
    .sec-2-2 {
        display: flex;
        flex-direction: column;
    }
    .obs-title {
        width: 100%;
        display: flex;
        justify-content: center;
        text-align: center;
        border: 1px solid black;
    }
    .pres-probs {
        width: 70%;
        display: flex;
        flex-direction: column;
    }
    .fam-planning {
        width: 30%;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .pres-probs-title {
        text-align: center;
        width: 100%;
        border: 1px solid black;
    }
    .pres {
        padding-left: 3.5px;
        display: flex;
        border: 1px solid black;
    }
    .pres label {
        padding: 1.5px;
        width: 40%;
    }
    .ques {
        display: flex;
        padding: 1.5px;
        width: 30%;
        justify-content: center;
        gap: 2px;
        border-left: 1px solid black;
    }
    .fam-title {
        text-align: center;
        border: 1px solid black;
        width: 100%;
    }
    .fam1 {
        display: flex;
        flex-direction: column;
    }
    .fam1-1 {
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 1px solid black;
        padding: 7px 0;
    }
    .fam1-1 p {
        margin-bottom: 0;
    }
    .fam1-2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 1px solid black;
        padding: 3.5px 0;
    }
    .fam1-2 p {
        margin-bottom: 0;
    }
    .sec-2-2-2 {
        display: flex;
        width: 100%;
    }
    .ttl {
        width: 100%;
        display: flex;
    }
    .given {
        width: 28.4%;
    }
    .given p {
        padding: 15.5px 5px;
        width: 100%;
        border: 1px solid black;
        margin-bottom: 0px;
        margin-top: 0px;
        display: flex;
        text-align: center;
    }
    .dos {
        display: flex;
    }
    .dos1 {
        border: 1px solid black;
        align-items: center;
        display: flex;
        flex-direction: column;
    }
    .dos1 input {
        border-top: 1px solid black;
        border-bottom: none;
        width: 96.4px;
        margin-left: 0;
    }
    .sec-3 {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .sec-3-1 {
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .factors {
        display: flex;
        flex-direction: row;
    }
    .factor1,
    .factor2 {
        width: 100%;
        display: flex;
        flex-direction: column;
        margin-left: 170px;
        gap: 10px;
    }
    .risk-title {
        justify-content: center;
        display: flex;
        text-align: center;
    }
    .sec-4 textarea {
        width: 100%;
        border: none;
        outline: none;
        text-align: center;
        background-color: transparent;
        overflow: hidden;
        resize: none;
    }

    .title-sec * {
        font-size: 16px!important;
        font-weight: 700!important;
    }

    .card {
        padding: 15px;
    }
/* ****************** */
@media print {
    /* Set page orientation to landscape */
    @page {
        size: portrait;
        margin: 1mm; /* Set margins */
    }

    /* Ensure the body and all child elements are visible during printing */
    body {
        visibility: visible !important;
        background-color: #fff;
        margin: 0;
        padding: 0;
    }

    /* Ensure main content is visible during print */
    .container {
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
        width: 1200px; /* Ensure the card takes full width of the page */
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
            <h1>Maternal Health Record</h1>
            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ action('App\Http\Controllers\regValidation@maternal') }}">Maternal Health Record</a></li>
                  <li class="breadcrumb-item active">Full Record</li>
                </ol>
              </nav>
        </div>
        <div class="btnArea">
            <button type="button" class="btn btn-primary" id="print"><i class="bi bi-printer-fill"></i> Print</button>
        </div>
    </div>
    <!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
            <div class="content">
                <div class="sec-1 col">
                    <div class="title-sec">
                        <h2>MATERNAL HEALTH RECORD</h2>
                    </div>
                    <div class="pat-info">
                        <div class="first-info">
                            <div class="info1">
                                <label for="clientname">NAME OF CLINIC: BHS</label>
                                <input type="text" name="clientname" id="clientname" value="{{ $maternal->mat_clinic }}">
                            </div>
                            <div class="info2">
                                <label for="typeblood">BLOOD TYPE:</label>
                                <input type="text" name="typeblood" id="typeblood" value="{{ $maternal->mat_bType }}">
                            </div>
                            <div class="info3">
                                <label for="famnum">FAMILY NO.:</label>
                                <input type="text" name="famnum" id="famnum" value="{{ $maternal->mat_fNum }}">
                            </div>
                        </div>
                        <div class="second-info">
                            <div class="second">
                                <p>MAIDEN NAME:</p>
                                </div>
                                @php
                                    $motherName = $maternal->mat_urMaiden ?? 
                                                trim(
                                                    ($maternal->maiden->res_lname ?? '') . ', ' . 
                                                    ($maternal->maiden->res_fname ?? '') . ' ' . 
                                                    ($maternal->maiden->res_mname && !in_array($maternal->maiden->res_mname, ['N/A', '', null]) ? $maternal->maiden->res_mname : '') . ' ' . 
                                                    ($maternal->maiden->res_suffix && !in_array($maternal->maiden->res_suffix, ['N/A', '', null]) ? $maternal->maiden->res_suffix : '')
                                                );
                                    $displayMother = $motherName ?: $maternal->maiden_id ?: 'N/A';
                                @endphp
                                
                                <div class="info4">
                                    <input type="text" name="fammaiden" id="fammaiden" value="{{ $displayMother }}" readonly>
                                    <label for="fammaiden"><i>FAMILY</i></label>
                                </div>
                                <div class="info5">
                                    <input type="text" name="firstmaiden" id="firstmaiden" readonly>
                                    <label for="firstmaiden"><i>FIRST</i></label>
                                </div>
                                <div class="info6">
                                    <input type="text" name="midmaiden" id="midmaiden" readonly>
                                    <label for="midmaiden"><i>MIDDLE</i></label>
                                </div>
                        </div>
                    </div>
                    <div class="pat-info2">
                        <div class="third-info">

                            @php
                                use Carbon\Carbon;
                            
                                // Initialize mother's birthdate as null
                                $motherBdate = $maternal->mat_urBdate ?? null;
                            
                                // If mother's birthdate (mat_urBdate) is not set, try using maiden's res_bdate
                                if (!$motherBdate && isset($maternal->maiden->res_bdate)) {
                                    $motherBdate = $maternal->maiden->res_bdate;
                                }
                            
                                // Calculate age if we have a valid birthdate
                                $age = null;
                                if ($motherBdate) {
                                    $age = Carbon::parse($motherBdate)->age;
                                }
                            @endphp
                            
                            <div class="info7">
                                <label for="age">AGE:</label>
                                <input type="text" name="age" id="age" value="{{ $age }}" readonly>
                            </div>
                            <div class="info8">
                                <label for="bdate">BIRTHDATE:</label>
                                <input type="text" name="bdate" id="bdate" value="{{ $motherBdate }}" readonly>
                            </div>
                            @php
                                // Set mother's occupation from mat_urOcc or maiden's res_occupation
                                $motherOcc = $maternal->mat_urOcc ?? null;
                            
                                // If mother's occupation is not set, try using maiden's res_occupation
                                if (!$motherOcc && isset($maternal->maiden->res_occupation)) {
                                    $motherOcc = $maternal->maiden->res_occupation;
                                }
                            @endphp
                            
                            <div class="info9">
                                <label for="occupation">OCCUPATION:</label>
                                <input type="text" name="occupation" id="occupation" value="{{ $motherOcc }}">
                            </div>
                        </div>
                        @php
                            // Combine husband's name fields if they exist, or set to 'N/A' if not
                            $fatherName = $maternal->mat_urHusband ?? 
                                        trim(
                                            ($maternal->husband->res_lname ?? '') . ', ' . 
                                            ($maternal->husband->res_fname ?? '') . ' ' . 
                                            ($maternal->husband->res_mname && !in_array($maternal->husband->res_mname, ['N/A', '', null]) ? $maternal->husband->res_mname : '') . ' ' . 
                                            ($maternal->husband->res_suffix && !in_array($maternal->husband->res_suffix, ['N/A', '', null]) ? $maternal->husband->res_suffix : '')
                                        );
                            // Determine what to display: father's name or husband_id, or 'N/A'
                            $displayFather = $fatherName ?: $maternal->husband_id ?: 'N/A';
                        @endphp
                        <div class="fourth-info">
                            <div class="fourth">
                                <p>HUSBAND NAME:</p>
                            </div>
                            <div class="info10">
                                <!-- Correctly assign $displayFather to the value attribute -->
                                <input type="text" name="famhus" id="famhus" value="{{ $displayFather }}" readonly>
                                <label for="famhus"><i>FAMILY</i></label>
                            </div>
                
                            <div class="info11">
                                <input type="text" name="firsthus" id="firsthus" readonly>
                                <label for="firstmaiden"><i>FIRST</i></label>
                            </div>
                            <div class="info12">
                                <input type="text" name="midhus" id="midhus" readonly>
                                <label for="midmaiden"><i>MIDDLE</i></label>
                            </div>
                        </div>
                    </div>
                    <div class="pat-info3">
                        <div class="fifth-info">
                            @php
                                $fatherAdd = $maternal->mat_urAddress ?? null;
                            
                                if (!$fatherAdd && isset($maternal->husband->res_address)) {
                                    $fatherAdd = $maternal->husband->res_address;
                                }
                            @endphp
                            <div class="info13">
                                <label for="address">ADDRESS:</label>
                                <input type="text" name="address" id="address" value="{{ $fatherAdd }}" readonly>
                            </div>
                            <div class="info14">
                                <div class="info14-1">
                                    <label for="risk">RISK:</label>
                                    <div style="gap:5px; display:flex;">
                                        <input type="radio" name="risk" id="riskYes" value="Yes" {{ $maternal->mat_risk == 'Yes' ? 'checked' : '' }} disabled>Yes
                                    </div>
                                    <div style="gap:5px; display:flex;">
                                        <input type="radio" name="risk" id="riskNo" value="No" {{ $maternal->mat_risk == 'No' ? 'checked' : '' }} disabled>No
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sixth-info">
                            <div class="info15">
                                <label for="lmp">LMP:</label>
                                <input type="date" name="lmp" id="lmp" value="{{ $maternal->mat_lmp }}" readonly>
                            </div>
                            <div class="info16">
                                <label for="edc">EDC:</label>
                                <input type="date" name="edc" id="edc" value="{{ $maternal->mat_edc }}" readonly>
                            </div>
                            <div class="info17">
                                <div class="info17-1">
                                    <label for="g">G:</label>
                                    <input type="text" name="g" id="g" value="{{ $maternal->mat_g }}" readonly>
                                </div>
                                <div class="info17-2">
                                    <label for="t">T:</label>
                                    <input type="text" name="t" id="t" value="{{ $maternal->mat_t }}" readonly>
                                </div>
                                <div class="info17-3">
                                    <label for="p">P:</label>
                                    <input type="text" name="p" id="p" value="{{ $maternal->mat_p }}" readonly>
                                </div>
                                <div class="info17-4">
                                    <label for="a">A:</label>
                                    <input type="text" name="a" id="a" value="{{ $maternal->mat_a }}" readonly>
                                </div>
                                <div class="info17-5">
                                    <label for="l">L:</label>
                                    <input type="text" name="l" id="l" value="{{ $maternal->mat_l }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sec-2 col mt-4">
                    <div class="sec-2-1">
                        <div class="obste">
                            <div class="obs-title">
                                <h5>OBSTETRICAL HISTORY</h5>
                            </div>
                            <div class="obs">
                                <label for="alive">No. of children alive</label>
                                <input type="text" name="alive" id="alive" value="{{$maternal->mat_childAlive}}" readonly>
                            </div>
                            <div class="obs">
                                <label for="living">No. of living children alive</label>
                                <input type="text" name="living" id="living" value="{{$maternal->mat_livingChildAlive}}" readonly>
                            </div>
                            <div class="obs">
                                <label for="abort">No. of abortion</label>
                                <input type="text" name="abort" id="abort" value="{{$maternal->mat_abortion}}" readonly>
                            </div>
                            <div class="obs">
                                <label for="fetal">No. of still births/fetal deaths</label>
                                <input type="text" name="fetal" id="fetal" value="{{$maternal->mat_fDeaths}}" readonly>
                            </div>
                            <div class="obs">
                                <label for="ceasar">Previous ceasarian section</label>
                                <input type="text" name="ceasar" id="ceasar" value="{{$maternal->mat_cSection}}" readonly>
                            </div>
                            <div class="obs">
                                <label for="hemor">Postpartum hemorrhage</label>
                                <input type="text" name="hemor" id="hemor" value="{{$maternal->mat_ppHemorr}}" readonly>
                            </div>
                            <div class="obs">
                                <label for="previa">Placental Previa / Abruptio</label>
                                <input type="text" name="previa" id="previa" value="{{$maternal->mat_abruptio}}" readonly>
                            </div>
                            <div class="obs">
                                <label for="alive">Others / (specify)</label>
                                <input type="text" name="others" id="others" value="{{$maternal->mat_others}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="sec-2-2 col">
                        <div class="sec-2-2-1" style="display:flex; flex-direction:row;">
                            <div class="pres-probs">
                                <div class="pres-probs-title">
                                    <h5>PRESENT HEALTH PROBLEMS</h5>
                                </div>
                                <div class="pres">
                                    <label for="tb">TB</label>
                                    <div class="ques">
                                        <input type="radio" name="tb" id="tbno" value="No"  {{ $maternal->mat_tb == 'No' ? 'checked' : '' }} disabled>No
                                    </div>
                                    <div class="ques">
                                        <input type="radio" name="tb" id="tbyes" value="Yes" {{ $maternal->mat_tb == 'Yes' ? 'checked' : '' }} disabled>Yes
                                    </div>
                                </div>
                                <div class="pres">
                                    <label for="heartdi">Heart Disease</label>
                                    <div class="ques">
                                        <input type="radio" name="heartdi" id="heartno" value="No" {{ $maternal->mat_hd == 'No' ? 'checked' : '' }} disabled>No
                                    </div>
                                    <div class="ques">
                                        <input type="radio" name="heartdi" id="heartyes" value="Yes" {{ $maternal->mat_hd == 'Yes' ? 'checked' : '' }} disabled>Yes
                                    </div>
                                </div>
                                <div class="pres">
                                    <label for="diabet">Diabetes</label>
                                    <div class="ques">
                                        <input type="radio" name="diabet" id="diano" value="No" {{ $maternal->mat_diabetes == 'No' ? 'checked' : '' }} disabled>No
                                    </div>
                                    <div class="ques">
                                        <input type="radio" name="diabet" id="diayes" value="Yes" {{ $maternal->mat_diabetes == 'Yes' ? 'checked' : '' }} disabled>Yes
                                    </div>
                                </div>
                                <div class="pres">
                                    <label for="bronchi">Bronchial Asthma</label>
                                    <div class="ques">
                                        <input type="radio" name="bronchi" id="bronno" value="No" {{ $maternal->mat_ba == 'No' ? 'checked' : '' }} disabled>No
                                    </div>
                                    <div class="ques">
                                        <input type="radio" name="bronchi" id="bronyes" value="Yes" {{ $maternal->mat_ba == 'Yes' ? 'checked' : '' }} disabled>Yes
                                    </div>
                                </div>
                                <div class="pres">
                                    <label for="goiter">Goiter</label>
                                    <div class="ques">
                                        <input type="radio" name="goiter" id="goitno" value="No" {{ $maternal->mat_goiter == 'No' ? 'checked' : '' }} disabled>No
                                    </div>
                                    <div class="ques">
                                        <input type="radio" name="goiter" id="goityes" value="Yes" {{ $maternal->mat_goiter == 'Yes' ? 'checked' : '' }} disabled>Yes
                                    </div>
                                </div>
                                <div class="pres">
                                    <label for="teta">Date Tetanus Toxoid</label>
                                    <div class="ques">
                                        <input type="radio" name="teta" id="tetno" value="No" {{ $maternal->mat_tetanus == 'No' ? 'checked' : '' }} disabled>No
                                    </div>
                                    <div class="ques">
                                        <input type="radio" name="teta" id="tetyes" value="Yes" {{ $maternal->mat_tetanus == 'Yes' ? 'checked' : '' }} disabled>Yes
                                    </div>
                                </div>
                            </div>
                            <div class="fam-planning">
                                <div class="fam-title">
                                    <h5>FAMILY PLANNING</h5>
                                </div>
                                <div class="fam1">
                                    <div class="fam1-1">
                                        <p>Has FP been practie?</p>
                                        <div class="answ">
                                            <input type="radio" name="fp" id="fpplayes" value="Yes" {{ $maternal->mat_fp == 'Yes' ? 'checked' : '' }} disabled>Yes
                                            <input type="radio" name="fp" id="fpplano" value="No" {{ $maternal->mat_fp == 'No' ? 'checked' : '' }} disabled>No
                                        </div>
                                        <p>If Yes, what method</p>
                                        <div class="method">
                                            <input type="text" name="method" id="method" value="{{$maternal->mat_fpMethod}}">
                                        </div>
                                    </div>
                                    <div class="fam1-2">
                                        <p>If No, willing to practice?</p>
                                        <div class="will">
                                            <input type="radio" name="willing" id="willingyes" value="Yes" {{ $maternal->mat_fpWilling == 'Yes' ? 'checked' : '' }} disabled>Yes
                                            <input type="radio" name="willing" id="willingno" value="No" {{ $maternal->mat_fpWilling == 'No' ? 'checked' : '' }} disabled>No
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sec-2-2-2">
                            <div class="ttl">
                                <div class="given">
                                    <p>Given</p>
                                </div>
                                <div class="dos">
                                    <div class="dos1">
                                        <label for="one">1</label>
                                        <input type="text" name="one" id="one" value="{{ $maternal->mat_date1 }}">
                                    </div>
                                    <div class="dos1">
                                        <label for="two">2</label>
                                        <input type="text" name="two" id="two" value="{{ $maternal->mat_date2 }}">
                                    </div>
                                    <div class="dos1">
                                        <label for="three">3</label>
                                        <input type="text" name="three" id="three" value="{{ $maternal->mat_date3 }}">
                                    </div>
                                    <div class="dos1">
                                        <label for="four">4</label>
                                        <input type="text" name="four" id="four" value="{{ $maternal->mat_date4 }}">
                                    </div>
                                    <div class="dos1">
                                        <label for="five">5</label>
                                        <input type="text" name="five" id="five" value="{{ $maternal->mat_date5 }}">
                                    </div>
                                    <div class="dos1">
                                        <label for="total">TTL</label>
                                        <input type="text" name="total" id="total" value="{{ $maternal->mat_total }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sec-3 col mt-4">
                    <div class="sec-3-1">
                        <div class="risk-title">
                            <h5>RISK FACTORS FOR PREGNANT WOMEN</h5>
                        </div>
                        <div class="factors mt-2">
                            <div class="factor1">
                                <div class="fac">
                                    <input type="checkbox" name="fac1" id="fac1" {{ in_array('Age Less Than or Greater Than 35', $checkboxRisk ?? []) ? 'checked' : '' }} disabled>
                                    <label for="fac1">Age less than or greater than 35</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac2" id="fac2" {{ in_array("Less Than 145 cm (4'9) Tall", $checkboxRisk ?? []) ? 'checked' : '' }} disabled>
                                    <label for="fac2">Less than 145 cm (4'9) tall</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac3" id="fac3" {{ in_array('Having A Fourth (or more) Baby', $checkboxRisk ?? []) ? 'checked' : '' }} disabled>
                                    <label for="fac3">Having a fourth (or more) baby</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac4" id="fac4" {{ in_array('Previous Ceasarian Section', $checkboxRisk ?? []) ? 'checked' : '' }} disabled>
                                    <label for="fac4">Previous ceasarian section</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac5" id="fac5" {{ in_array('Post Partum Hemorrhage', $checkboxRisk ?? []) ? 'checked' : '' }} disabled>
                                    <label for="fac5">Post partum hemorrhage</label>
                                </div>
                            </div>
                            <div class="factor2">
                            <div class="fac">
                                    <input type="checkbox" name="fac6" id="fac6" {{ in_array('3 Consecutive Miscarriage / Still Born', $checkboxRisk ?? []) ? 'checked' : '' }} disabled>
                                    <label for="fac6">3 consecutive miscarriage / still born</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac7" id="fac7" {{ in_array('TB', $checkboxRisk ?? []) ? 'checked' : '' }} disabled>
                                    <label for="fac7">TB</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac8" id="fac8" {{ in_array('Heart Disease', $checkboxRisk ?? []) ? 'checked' : '' }} disabled>
                                    <label for="fac8">Heart Disease</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac9" id="fac9" {{ in_array('Diabetes', $checkboxRisk ?? []) ? 'checked' : '' }} disabled>
                                    <label for="fac9">Diabetes</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac10" id="fac10" {{ in_array('Bronchial Asthma', $checkboxRisk ?? []) ? 'checked' : '' }} disabled>
                                    <label for="fac10">Bronchial Asthma</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sec-4 col">
                    <p class="row">Ante-Partum Visits:</p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col" style="display: none;">ID</th>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Complaint</th>
                                <th scope="col" style="display: none;">AOG</th>
                                <th scope="col" style="display: none;">HT</th>
                                <th scope="col" style="display: none;">WT</th>
                                <th scope="col" style="display: none;">BP</th>
                                <th scope="col" style="display: none;">FHT</th>
                                <th scope="col" style="display: none;">FHB</th>
                                <th scope="col" style="display: none;">PRESENTATION</th>
                            <th scope="col">Findings</th>
                            <th scope="col">Lab Result/ UTZ</th>
                            <th scope="col">Assessment Diagnosis</th>
                            <th scope="col">Treatment/Plan</th>
                            <th scope="col">Next Visits</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($ante as $index => $antes)
                                </tr>
                                    <td style="display: none;">{{ $antes->ap_id }}</td>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $antes->ap_dateVisit }}</td>
                                    <td>{{ $antes->ap_complaints }}</td>
                                        <td style="display: none;">{{ $antes->apf_aog }}</td>
                                        <td style="display: none;">{{ $antes->apf_ht }}</td>
                                        <td style="display: none;">{{ $antes->apf_wt }}</td>
                                        <td style="display: none;">{{ $antes->apf_bp }}</td>
                                        <td style="display: none;">{{ $antes->apf_fundal }}</td>
                                        <td style="display: none;">{{ $antes->apf_fhb }}</td>
                                        <td style="display: none;">{{ $antes->apf_presentation }}</td>
                                    <td>
                                        <b>AOG:</b> {{ $antes->apf_aog }}, <b>HT:</b> {{ $antes->apf_ht }}, <b>WT:</b> {{ $antes->apf_wt }},
                                        <b>BP:</b> {{ $antes->apf_bp }}, <b>FUNDAL HT:</b> {{ $antes->apf_fundal }}, <b>FHB:</b> {{ $antes->apf_fhb }},
                                        <b>PRESENTATION:</b> {{ $antes->apf_presentation }}
                                    </td>
                                    <td>{{ $antes->ap_labResult }}</td>
                                    <td>{{ $antes->ap_diagnosis }}</td>
                                    <td>{{ $antes->ap_treatment }}</td>
                                    <td>{{ $antes->ap_nextVisit }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="page-break-before: always;"></div>
                <div class="sec-2 col mt-5 mb-5">
                    <div class="cell1">
                        <div class="post1">
                            <h6>POSTPARTUM VISIT 1 (WITHIN 24HRS)</h6>
                        </div>
                        <div class="date1">
                            <h6>DATE OF 1ST VISIT: </h6>
                            @if($post->isNotEmpty()) <!-- Ensure there are records -->
                                <input type="date" value="{{ $post->first()->pp_dateVisit }}" readonly>
                            @else
                                <input type="date" value="" readonly>
                            @endif
                        </div>
                        <div class="given1">
                            <h6>FeSO4 GIVEN #:</h6>
                            @if($post->isNotEmpty()) <!-- Ensure there are records -->
                                <input type="text" value="{{ $post->first()->pp_feso }}" readonly>
                            @else
                                <input type="text" value="" readonly>
                            @endif
                            <h6>VITAMIN A#:</h6>
                            @if($post->isNotEmpty()) <!-- Ensure there are records -->
                                <input type="text" value="{{ $post->first()->pp_vitA }}" readonly>
                            @else
                                <input type="text" value="" readonly>
                            @endif
                        </div>
                        <div class="inter1">
                            <h6 style="padding:5px 0px 0px 5px;">INTERVENTION:</h6>
                            @if($post->isNotEmpty()) <!-- Ensure there are records -->
                                <textarea name="inter1" id="inter1" cols="65" rows="15" readonly>{{ $post->first()->ap_Intervention }}</textarea>
                            @else
                                <textarea name="inter1" id="inter1" cols="65" rows="15" readonly></textarea>
                            @endif
                            <div style="display:flex; flex-direction: row; margin-top:30px; width:100%;">
                                <h6 style="padding-left:5px;">DATE OF NEXT VISIT:</h6>
                                @if($post->isNotEmpty()) <!-- Ensure there are records -->
                                    <input style="width:300px;" type="text" value="{{ $post->first()->pp_dateNextVisit }}" readonly>
                                @else
                                    <input style="width:300px;" type="text" value="" readonly>
                                @endif
                            </div>
                        </div>
                    </div>                    
                    <div class="cell2">
                        <div class="post2">
                            <h6>DELIVERY & BIRTH</h6>
                        </div>
                        <div class="date2">
                            <h6>DELIVERY DATE & TIME:</h6>
                            <input type="text" value="{{ $delBirth->db_delDateTime ?? '' }}" readonly>
                        </div>
                        <div class="given2">
                            <h6>PLACE OF DELIVERY:</h6>
                            <input type="text" value="{{ $delBirth->db_placeDel ?? '' }}" readonly>
                        </div>
                        <div class="outcome">
                            <h6>TYPE & OUTCOME OF DELIVERY:</h6>
                            <div style="display:flex; flex-direction:row;">
                                <h6 style="margin-top:5px;">NSVD</h6>
                                <input type="radio" name="outcome" id="outcome1" {{ $delBirth && $delBirth->db_outcome == 'NSVD' ? 'checked' : '' }} disabled>
                            </div>
                            <div style="display:flex; flex-direction:row; justify-content:center;">
                                <h6 style="margin-top:5px;">CS</h6>
                                <input type="radio" name="outcome" id="outcome2" {{ $delBirth && $delBirth->db_outcome == 'CS' ? 'checked' : '' }} disabled>
                            </div>
                        </div>
                        <div class="child-name">
                            <h6>FULL NAME OF CHILD:</h6>
                            <div class="chil">
                                <div class="name-child">
                                    <input type="text" value="{{ $delBirth->db_childFullName ?? '' }}" readonly>
                                </div>
                                <div class="div">
                                    <h6>SEX:</h6>
                                    <input type="text" value="{{ $delBirth->db_sex ?? '' }}"readonly>
                                </div>
                            </div>
                        </div>
                        <div class="child-stat">
                            <div style="display: flex; flex-direction: row; margin-top:10px;">
                                <h6>BIRTH LENGTH:</h6>
                                <input type="text" value="{{ $delBirth->db_birthLt ?? '' }}"readonly>CM
                            </div>
                            <div style="display: flex; flex-direction: row; margin-top:10px;">
                                <h6>BIRTH WT:</h6>
                                <input type="text" value="{{ $delBirth->db_birthWt ?? '' }}"readonly>GRMS/KGS
                            </div>
                        </div>
                        <div class="child-att">
                            <h6>ATTENDANT AT BIRTH:</h6>
                            <div style="display:flex; flex-direction:row; gap:2px;">
                                <input type="checkbox" name="attendant1" id="attendant1" {{ $delBirth && strpos($delBirth->db_attendant, 'Doctor') !== false ? 'checked' : '' }} disabled>
                                <h6 style="margin-top:5px;">DOCTOR</h6>
                            </div>
                            <div style="display:flex; flex-direction:row; gap:2px;">
                                <input type="checkbox" name="attendant2" id="attendant2" {{ $delBirth && strpos($delBirth->db_attendant, 'Nurse') !== false ? 'checked' : '' }} disabled>
                                <h6 style="margin-top:5px;">NURSE</h6>
                            </div>
                            <div style="display:flex; flex-direction:row; gap:2px;">
                                <input type="checkbox" name="attendant3" id="attendant3" {{ $delBirth && strpos($delBirth->db_attendant, 'Midwife') !== false ? 'checked' : '' }} disabled>
                                <h6 style="margin-top:5px;">MIDWIFE</h6>
                            </div>
                        </div>
                        <div class="fathers">
                            <h6>FULL NAME OF CHILD'S FATHER:</h6>
                            <input type="text" value="{{ $delBirth->db_fatherFullName ?? '' }}" readonly>
                        </div>
                    </div>          
                    <div class="cell3">
                        <div class="post3">
                            <h6>POSTPARTUM VISIT 2 (WITHIN 7 DAYS OF DELIVERY)</h6>
                        </div>
                        <div class="date3">
                            <h6>DATE OF 2ND VISIT:</h6>
                            @if($post2)  <!-- Check if there is a second postpartum visit -->
                                <input type="text" value="{{ $post2->pp_dateVisit ?? '' }}">
                            @else
                                <input type="text" value="">
                            @endif
                        </div>
                        <div class="given3">
                            <h6>FeSO4 GIVEN #:</h6>
                            @if($post2)  <!-- Check if there is a second postpartum visit -->
                                <input type="text" value="{{ $post2->pp_feso ?? '' }}">
                            @else
                                <input type="text" value="">
                            @endif
                            <h6>VIT A#:</h6>
                            @if($post2)  <!-- Check if there is a second postpartum visit -->
                                <input type="text" value="{{ $post2->pp_vitA ?? '' }}">
                            @else
                                <input type="text" value="">
                            @endif
                        </div>
                        <div class="inter2">
                            <h6 style="padding:5px 0px 0px 5px;">INTERVENTION:</h6>
                            @if($post2)  <!-- Check if there is a second postpartum visit -->
                                <textarea name="inter2" id="inter2" cols="65" rows="15">{{ $post2->ap_Intervention ?? '' }}</textarea>
                            @else
                                <textarea name="inter2" id="inter2" cols="65" rows="15"></textarea>
                            @endif
                            <div style="display:flex; flex-direction: row; margin-top:30px;">
                                <h6 style="font-size:12px; padding-left: 5px;">DATE OF NEXT VISIT:(FP USED)</h6>
                                @if($post2)  <!-- Check if there is a second postpartum visit -->
                                    <input style="width:180px;" type="text" value="{{ $post2->pp_dateNextVisit ?? '' }}">
                                @else
                                    <input style="width:180px;" type="text" value="">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

<script>
    const printBtn = document.getElementById('print');
        printBtn.addEventListener('click', function() {
        window.print();
    }); 
</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>