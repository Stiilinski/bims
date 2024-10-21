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
        width: 457px;
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
        margin-left: 50px;
        display: flex;
        flex-direction: column;
        width: 100%;
        gap: 10px;
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
        margin-left: 53%;
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
    th {
        font-size: 14px;
    }
    .titleHeader {
        font-size: 24px;
        font-weight: 700;
        display: flex;
        justify-content: center;
    }
</style>

<body>
  <!-- ======= Header ======= -->
    @include('layouts.headerHealthWorkers')
  <!-- End Header -->


<div id="container" class="container">

    <div class="pagetitle">
        <div class="pageArea">
            <h1>Daily Service Record</h1>
            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ action('App\Http\Controllers\regValidation@dailyServiceRecord') }}">Daily Service Record Form</a></li>
                  <li class="breadcrumb-item active">DSR Form</li>
                </ol>
            </nav>
        </div>
        <div class="btnArea">
            <button type="button" class="btn btn-primary"><i class="bi bi-printer-fill"></i> Print</button>
        </div>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body" style="width: 100%!important;">
            <div class="titleHeader">
                DAILY SERVICE RECORD
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col" style="display: none;">ID</th>
                    <th scope="col">NOS</th>
                    <th scope="col">Family Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">BirthDate</th>
                    <th scope="col">Age</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Purok</th>
                    <th scope="col">BP</th>
                    <th scope="col">Temp</th>
                    <th scope="col">HT</th>
                    <th scope="col">WT</th>
                    <th scope="col">Complaints</th>
                    <th scope="col">Smoker</th>
                    <th scope="col">Alcohol</th>
                    <th scope="col">Medicine Given</th>
                    <th scope="col">Signature of Patient</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($dsr as $index => $dsrs)
                        </tr>
                            <td style="display: none;">{{ $dsrs->dsr_id }}</td>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $dsrs->resident->res_lname ?? '' }}</td>
                            <td>{{ $dsrs->resident->res_fname ?? '' }}</td>
                            <td>{{ $dsrs->resident->res_mname ?? '' }},  {{ $dsrs->resident->res_suffix ?? '' }}</td>
                            <td class="bdate">{{ $dsrs->resident->res_bdate}}</td>
                            <td class="age"></td>
                            <td>{{ $dsrs->resident->res_sex }}</td>
                            <td>{{ $dsrs->resident->res_purok}}</td>
                            <td>{{ $dsrs->dsr_bp}}</td>
                            <td>{{ $dsrs->dsr_temp}}</td>
                            <td>{{ $dsrs->dsr_ht}}</td>
                            <td>{{ $dsrs->dsr_wt}}</td>
                            <td>{{ $dsrs->dsr_complaint}}</td>
                            <td>{{ $dsrs->dsr_smoke}}</td>
                            <td>{{ $dsrs->dsr_alcohol}}</td>
                            <td>{{ $dsrs->medicine->med_prod ?? '' }}</td>
                            <td><img src="/{{ $dsrs->dsr_signature }}" alt="signature Img" style="width: 100%; height: 50px;"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
  @include('layouts.footerHealthWorkers')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
  <script>
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
        const dobElements = document.querySelectorAll('.bdate');
        const ageElements = document.querySelectorAll('.age');

        dobElements.forEach(function(dobElement, index) {
            const dobValue = dobElement.textContent.trim(); // Get the text content of the birthdate cell
            if (dobValue) {
                const calculatedAge = calculateAge(dobValue);
                ageElements[index].textContent = calculatedAge; // Set the calculated age in the corresponding age cell
            }
        });
    });
  </script>
  
</body>

</html>