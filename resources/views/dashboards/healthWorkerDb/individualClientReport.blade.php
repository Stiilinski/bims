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

    .modal-body {
        display: flex;
        flex-direction: column
    }

    .personalInfo {
        display: flex;
        justify-content: space-evenly;
    }

    .inputGroup {
        display: flex;
        justify-content: space-evenly;
    }

    .grpField {
        width: 150px!important;
    }

    .smokers {
        border: solid 1px #dee2e6;
        display: flex;
        align-items: center;
        padding: 10px;
        margin-left: 2px;
        border-radius: 0.375rem;
        width: 100%;
    }

    .smokersCon {
    
    }

    .grpField2 {
        width: 100%!important;
    }

    .inputGroup2 {
        display: flex;
        width: 100%!important;
        overflow: hidden;
        justify-content: space-between;
        align-items: center;
        
    }

    .medicines {
        width: 70%!important;
    }

    .quants {
        width: 300px!important;
    }

    .signature-container {
        position: relative;
    }

    #signaturePad {
        width: 100%;
        height: 200px;
        border: 1px solid #ccc;
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

    .personalInfo2 {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .infos, .info, .iinfo2 {
        font-size: 18px;
        display: flex;
        align-items: center;
        height: 100%!important;        
    }

    .personInfo2 {
        display: flex;
        align-items: center;
    }

    .info1 {
        justify-content: space-between;
    }

    .pName {
        width: 420px;
        display: flex;
        align-items: center;
        font-size: 20px;
        gap: 10px;
    }

    .titleCard {
        font-weight: 700;
    }

    .cardTitle {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px;
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
        <h1>Individual Client Treatment Report</h1>
        <div class="btnArea">
            <button type="button" class="btn btn-primary"><i class="bi bi-printer-fill"></i> Print</button>
        </div>
    </div><!-- End Page Title -->
    
    <div class="column mb-3 pName">
        <label for="searchPatient" class="form-label">Name</label>
        <select id="searchPatient" class="form-select pNames" name="searchPatient">
            <option selected disabled>Choose...</option>
            <option value="1">John Doe</option>
            <option value="2">Jane Smith</option>
            <option value="3">Michael Johnson</option>
            <!-- Add more options as needed -->
        </select>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="cardTitle"><h2 class="titleCard">Individual Client Treatment Report</h2></div>

            <div class="personalInfo2">
                <div class="personInfo2 info1 mb-3">
                    <div class="iinfo2">
                        <span class="infos">Patient:</span><span class="info">Name</span>
                    </div>
                    <div class="iinfo2">
                        <span class="infos">Adult:</span><span class="info">Name</span>
                    </div>
                </div>

                <div class="personInfo2 mb-3">
                    <span class="infos">Age:</span><span class="info">Name</span>
                </div>
                
                <div class="personInfo2 mb-3">
                    <span class="infos">Birthday:</span><span class="info">Name</span>
                </div>

                <div class="personInfo2 mb-3">
                    <span class="infos">Civil Status:</span><span class="info">Name</span>
                </div>

                <div class="personInfo2 mb-3">
                    <span class="infos">Address:</span><span class="info">Name</span>
                </div>

                <div class="personInfo2 mb-3">
                    <span class="infos">Contact Number:</span><span class="info">Name</span>
                </div>
            </div>
            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Complaints/Findings</th>
                    <th scope="col">Treatment</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Height</th>
                    <th scope="col">Temperature</th>                    
                    <th scope="col">LGU</th>
                    <th scope="col">BRGY.</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
          <!-- End Table with stripped rows -->
        </div>
    </div>
</main><!-- End #main -->



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    //SEARCH PATIENT SELECT
    $(document).ready(function() {
        $('#searchPatient').select2({
            placeholder: "Choose...",
            allowClear: false
        });

        // Initialize Select2 on modal show
        $('#ExtralargeModal').on('shown.bs.modal', function () {
            $('#searchPatient').select2({
                dropdownParent: $('#ExtralargeModal')
            });
        });
    });
</script>


  @include('layouts.footerHealthWorkers')
</body>

</html>